#!/usr/bin/env python3
import re
import sys
import json
import argparse
import signal
import glob
import tqdm
import time
import shutil
import os.path
import logging
import tempfile
import subprocess

logging.basicConfig(format='[%(levelname)s] %(message)s', level=logging.INFO)

APPDIR="/app"

cc_single_exec_fn = "/tmp/testingcc_prepend.json"

# precovcode=f"""
# <?php
#
#   register_shutdown_function(function() {{
#         $jdata = json_encode(xdebug_get_code_coverage());
#
#         $jdataout = fopen("{cc_single_exec_fn}", "w") or die("Unable to open file!");
#         fwrite($jdataout, $jdata);
#         fclose($jdataout);
#
#   }});
#
#   xdebug_start_code_coverage(XDEBUG_CC_UNUSED | XDEBUG_CC_DEAD_CODE);
#
# ?>
# """
# postcovcode=""


class CodeCov:

    def __init__(self, out_jfn, startpoint_index=0):

        self.cc_allresults = {}
        self.out_json_filename = out_jfn
        self.startpoint_index = startpoint_index
        self.startpoint = ""

        if os.path.exists(out_jfn):
            with open(out_jfn, "r") as jf:
                self.cc_allresults = json.load(jf)
        if "completed" not in self.cc_allresults:
            self.cc_allresults["completed"] = []


    def process_input_queue(self, testdir, featureset, script_fn):
        cmd = ["/php/php-cgi-mysqli-afl","-d", "auto_prepend_file=/prepost.php"]
        script_path = os.path.dirname(script_fn)

        if os.path.exists(cc_single_exec_fn):
            os.remove(cc_single_exec_fn)

        last_time = 0
        maxfcnt = 0
        maxfindex = 2

        trace_dir = f"{testdir}/trace"



        if os.path.exists(trace_dir):
            shutil.rmtree(trace_dir, ignore_errors=False)

        os.makedirs(trace_dir, exist_ok=False)

        basedata = {}
        saved_diffs = set()

        for x in range(1,10):
            fcnt = len(glob.glob(f"{testdir}/fuzzer-{x}/queue/id*"))
            if fcnt > maxfcnt:
                maxfcnt = fcnt
                maxfindex = x
        if (maxfcnt != 2):
            print(f" Using tracing directory #{maxfindex} with {maxfcnt} inputs", end='\r')
        input_tqdm = tqdm.tqdm(glob.glob(f"{testdir}/fuzzer-{maxfindex}/queue/id*"), desc=f"{' '*8}Input", ncols=100, leave=False)
        input_cnt = 0
        for inpfn in input_tqdm:
            input_cnt += 1
            input_tqdm.set_description(f'{" "*8}{os.path.basename(inpfn)[:9]}')
            logging.debug(inpfn)
            my_env = os.environ
            #tmpfp, tmpfn = tempfile.mkstemp(dir=script_path, suffix=".phpcc")

            #code = open(script_fn, "r").read()
            #os.write(tmpfp, f"\n{precovcode}\n{code}\n{postcovcode}\n".encode("latin-1"))
            #os.close(tmpfp)
            sess_fn = "/tmp/sess_1anv2aurbl0gl0fmntcjirel2d"
            #(time.time() - last_time) > 290 or
            successful_login = False
            for loginrounds in range(0, 36):
                out = b""
                try :

                    if not os.path.exists(sess_fn) or os.path.getsize(sess_fn) < 400:
                        #outfile = open("/tmp/login_attempt.dat", "w")
                        out = subprocess.check_output(['/test/set_session_login.sh','localhost'])

                        #outfile.close()

                    if not os.path.exists(sess_fn):
                        print(f"Failed to get session, trying again, skipping {inpfn}")
                        print(out)
                        time.sleep(5)

                    elif os.path.getsize(sess_fn) < 400:
                        print(out)
                        time.sleep(5)
                    else:
                        successful_login = True
                        break

                except subprocess.CalledProcessError as cpe:
                    with open(f"{testdir}/error.log", "a+") as errlog:
                        errlog.write("-" * 80 + "\n")
                        if not os.path.exists(sess_fn):
                            errlog.write("Error logging in, session not found!\n")
                        elif os.path.getsize(sess_fn) < 400:
                            errlog.write("Error logging in, session too small!\n")
                        else:
                            errlog.write("Other error logging in\n")
                        errlog.write(f"Error message: {cpe}\n")

                    with open(f"{testdir}/error.log", "ab") as errlogbin:
                        errlogbin.write(out)

                    print(f"ERROR with set_session_login: {cpe}, sleeping will trying again in 5")
                    time.sleep(5)

                if loginrounds % 12 == 11:
                    try:
                        print(f"Attempting to reset DB")
                        subprocess.check_call(["/test/resetapp.sh"])
                    except Exception:
                        pass

            if not successful_login:
                with open(f"{testdir}/error.log", "a+") as errlog:
                    errlog.write("-" * 80 + "\n")
                    errlog.write("Error logging in, couldn't get successful login")


            assert successful_login

            my_env["LOGIN_COOKIE"] = "OpenEMR=1anv2aurbl0gl0fmntcjirel2d;"
            my_env["LD_PRELOAD"] ="/wclibs/libcgiwrapper.so"
            my_env["LD_LIBRARY_PATH"] = "/wclibs"
            my_env["SCRIPT_FILENAME"] = script_fn
            start_time = time.time()
            with open(inpfn,"rb") as input_file:
                p = subprocess.Popen(cmd, stdout=subprocess.PIPE, stderr=subprocess.PIPE, stdin=input_file, env=my_env)
                stdout = b""
                stderr = b""
                try:
                    stdout, stderr = p.communicate(timeout=180)
                except subprocess.TimeoutExpired:

                    pass
                finally:
                    if p:
                        p.kill()
                #sys.stdout.buffer.write(stdout)
                # if len(stderr) > 0:
                #     logging.debug(f"\033[31m{stderr.decode('cp1252')}\033[0m")

            #print(open(tmpfn).read())
            #os.remove(tmpfn)
            exec_comp = time.time() - start_time
            start_time = time.time()
            merge_time = 0
            if os.path.exists(cc_single_exec_fn):

                basecase = os.path.join(trace_dir,"cc0.json")
                if not os.path.exists(basecase):
                    basedata = json.load(open(cc_single_exec_fn))
                    json.dump(basedata, open(basecase, "w"), indent=2)
                else:
                    tempdata = json.load(open(cc_single_exec_fn))
                    os.remove(cc_single_exec_fn)

                    if tempdata == basedata:
                        continue

                    temploc = os.path.join(trace_dir,"test.json")
                    json.dump(tempdata, open(temploc, "w"), indent=2)

                    #diff - u / tmp / cc0.dat / tmp / cc${cnt}.dat > / tmp / cc${cnt}.patch
                    p = subprocess.Popen(["diff", "-u", basecase, temploc], stdout=subprocess.PIPE)

                    stdout, stderr = p.communicate()
                    testdiff = stdout

                    if len(testdiff) == 0:
                        continue
                    if testdiff.startswith(b"--- "):
                        testdiff = testdiff[testdiff.find(b"\n") + 1:]
                    if testdiff.startswith(b"+++ "):
                        testdiff = testdiff[testdiff.find(b"\n") + 1:]

                    if testdiff in saved_diffs:
                        #print("found match for patch, skipping it ")
                        continue
                    else:
                        # if memory becomes problem can switch to using a hash
                        saved_diffs.add(testdiff)

                    patchout_fn = os.path.join(trace_dir, f"cc{input_cnt}.patch")
                    open(patchout_fn, "wb").write(stdout)


                #self.merge_result(featureset, script_fn)
                merge_time = time.time() - start_time

            else:
                with open(f"{testdir}/error.log","a+") as errlog:
                    errlog.write("-"*80 + "\n")
                    errlog.write(f"{inpfn}\n")
                    errlog.write(f"CMD= cat {inpfn} | SCRIPT_FILENAME={script_fn} LOGIN_COOKIE='{my_env['LOGIN_COOKIE']}' LD_PRELOAD={my_env['LD_PRELOAD']} {' '.join(cmd)} \n" )
                    errlog.write(f"STDOUT: \n{stdout} \n")
                    errlog.write(f"STDERR: \n {stderr} \n")

                logging.error(f"""\033[31mPrinting results b/c did not find json file 
        cat {inpfn} | SCRIPT_FILENAME={script_fn} LOGIN_COOKIE='{my_env['LOGIN_COOKIE']}' LD_LIBRARY_PATH='{my_env['LD_LIBRARY_PATH']}' LD_PRELOAD={my_env['LD_PRELOAD']} {' '.join(cmd)}   \033[0m """)

                sys.stdout.buffer.write(stdout)
                if len(stderr) > 0:
                    logging.error(f"\033[31m{stderr.decode('cp1252')}\033[0m")


        input_tqdm.write(f'{" " * 16}Completed: {script_fn} with {input_cnt} inputs processed')
        input_tqdm.close()


            #exit(33)

    def add_featureset(self, featureset, script_fn):

        if featureset not in self.cc_allresults:
            self.cc_allresults[featureset] = {}
        if script_fn not in self.cc_allresults[featureset]:
            self.cc_allresults[featureset][script_fn] = {}

    def merge_result(self, featureset, script_fn):
        if not os.path.exists(cc_single_exec_fn):
            return self.cc_allresults

        with open(cc_single_exec_fn, "r") as jf:
            runj = json.load(jf)

        for module, ccres in runj.items():
            # if module == tmp_fn:
            #     module = script_fn

            if module not in self.cc_allresults[featureset][script_fn]:
                self.cc_allresults[featureset][script_fn][module] = {}

            for lineno, value in ccres.items():
                if lineno not in self.cc_allresults[featureset][script_fn][module]:
                    self.cc_allresults[featureset][script_fn][module][lineno] = value
                elif self.cc_allresults[featureset][script_fn][module][lineno] < value:
                    self.cc_allresults[featureset][script_fn][module][lineno] = value

    def findstartpoint(self, apptestdir, featureset):

        dateset = set()
        for testdir in glob.glob(f"{apptestdir}/{featureset}*"):
            test_info = os.path.basename(testdir).split("_")

            if len(test_info) < 7:
                # logging.error(f"Directory {testdir}, does not comply with expected format, skipping.")
                continue
            dateset.add("_".join(test_info[1:6]))
        dtlist = list(dateset)
        dtlist.sort()
        if self.startpoint_index < len(dtlist):
            self.startpoint = dtlist[self.startpoint_index]
        else:
            logging.error("Chosen start date cnt exceeds number of dates, continuing with date 0")
            self.startpoint = dtlist[0]

    def start_running(self, testdir):

        # for apptestdir in glob.glob(f"{basedir}/{testapp}-*"):
        #     cnt = 0
        #     featureset = os.path.basename(apptestdir).split("-")[1]
        #
        #     self.findstartpoint(apptestdir, featureset)
        #
        #     print(f"\n**** {featureset} ****\n")
        #
        #     #feat_tqdm.set_description(featureset)
        #     script_dir_mask = f"{apptestdir}/{featureset}_{self.startpoint}*"
        #     script_tqdm = tqdm.tqdm(glob.glob(script_dir_mask), desc=f"Script", ncols=100, leave=True)
        #
        #     for testdir in script_tqdm:

        test_info = os.path.basename(testdir).split("_")

        featureset = os.path.basename(testdir).split("_")[0]

        if featureset != test_info[0]:
            # print(f"\nNo Match = {featureset} and {test_info[0]} and {testdir}")
            return

        script_fn = f"{'_'.join(test_info[6:]).replace('+', '/')}"

        if not script_fn.startswith(APPDIR):
            script_fn = f"{APPDIR}/{script_fn}"

        #script_tqdm.set_description(f'{script_fn.replace("/app","")}')

        if os.path.isdir(testdir) and f"{featureset}+{script_fn}" not in self.cc_allresults["completed"]:

            print(f"{featureset}, script_fn={script_fn}, {testdir}")

            #self.add_featureset(featureset, script_fn)

            self.process_input_queue(testdir, featureset, script_fn)
            if os.path.exists(f"{testdir}/trace/cc0.json"):
                if os.path.exists(self.out_json_filename):
                    with open(self.out_json_filename, "r") as jf:
                        self.cc_allresults = json.load(jf)

                self.cc_allresults["completed"].append(f"{featureset}+{script_fn}")

                with open(self.out_json_filename, "w") as jf:
                    json.dump(self.cc_allresults, jf)
            else:
                with open(f"{testdir}/error.log", "a+") as errlog:
                    errlog.write(f"Error did not write out cc 0.json for ${testdir}")

        else:
            #script_tqdm.clear()
            print(f'{" " * 16}Skipped: {script_fn} {testdir} {os.path.isdir(testdir)}')

            # script_tqdm.clear()
            # if cnt > 0:
            #     print (f"Saving json file after finishing {featureset}\n")
            #     with open(self.out_json_filename, "w") as jf:
            #         json.dump(self.cc_allresults, jf)
            #     #subprocess.check_call(["/test/resetapp.sh"])



def main():
    parser = argparse.ArgumentParser(description="Run code coverage for a set of inputs")
    parser.add_argument('testdir', help="basedir of the results, where the openemr-EXWICHR directory lies")
    #parser.add_argument('testapp', help="basedir of the results, microtests, openemr, etc")

    parser.add_argument('--kms', action='store_true', help="Should we kill supervisord's process id 1?")

    parser.add_argument('-o', '--output', default="/results/code_coverage.json", help="Where to put the json output file, default is /results/code_cov.json")
    parser.add_argument('-s', '--startindex', default=0, type=int,
                        help="Out of the set of dates in for a particular script, which set to chose by order")
    args = parser.parse_args()

    # wait for other systems to wakey wakey
    time.sleep(5)

    if args.testdir.strip()[-1:] == "/":
        print("error testdir cannot end in /")
        exit(142)
    cc = CodeCov(args.output, args.startindex)
    cc.start_running(args.testdir)
    print("Completed Run!")
    if args.kms:
        try:
            pid = 1
            subprocess.check_call(["sudo", "kill", "-s", "3", "1"])
            #os.kill(pid, signal.SIGQUIT)
        except Exception as e:
            print(f'Could not kill supervisor: {e}\n')


if __name__ == "__main__":
    main()



