#! /usr/bin/env python3

import os
import re
import glob
import tqdm
import time

import logging
import argparse
import subprocess

logging.basicConfig(format='[%(levelname)s] %(message)s', level=logging.INFO)
APPDIR="/app"

from collections import defaultdict
def retzero():
    return 0

class CodeCrash():


    def __init__(self):

        self.cc_allresults = {}

        self.startpoint_index = 0
        open("/tmp/sqlerrors.log", "w").write(f"Start {time.time()}\n")
        open("/tmp/non-sqlerrors.log", "w").write(f"Start {time.time()}\n")

    def process_input_queue(self, testdir, featureset, script_fn):
        cmd = ["/php/php-cgi-mysqli-afl", ]
        script_path = os.path.dirname(script_fn)
        crash_cnt =0
        segfs = 0
        basedata = {}
        saved_diffs = set()
        crashing_inputs = 0
        crash_cnts = defaultdict(retzero)
        input_tqdm = tqdm.tqdm(glob.glob(f"{testdir}/fuzzer-*/crashes/id*"), desc=f"{' ' * 8}Input", ncols=100,
                               leave=False)
        input_cnt = 0
        crashing_inputs = len(input_tqdm)
        for inpfn in input_tqdm:

            input_cnt += 1
            input_tqdm.set_description(f'{" " * 8}{os.path.basename(inpfn)[:9]}')
            #print(f"input_filename={inpfn}")
            my_env = os.environ
            # tmpfp, tmpfn = tempfile.mkstemp(dir=script_path, suffix=".phpcc")

            # code = open(script_fn, "r").read()
            # os.write(tmpfp, f"\n{precovcode}\n{code}\n{postcovcode}\n".encode("latin-1"))
            # os.close(tmpfp)
            sess_fn = "/tmp/sess_1anv2aurbl0gl0fmntcjirel2d"
            # (time.time() - last_time) > 290 or
            successful_login = False
            for _ in range(0, 5):
                if not os.path.exists(sess_fn) or os.path.getsize(sess_fn) < 400:
                    outfile = open("/tmp/login_attempt.dat", "w")
                    subprocess.check_call(['/test/set_session_login.sh', 'localhost'], stdout=outfile, stderr=outfile)

                    outfile.close()

                if os.path.getsize(sess_fn) < 400:
                    time.sleep(5)
                else:
                    successful_login = True
                    break

            assert successful_login

            my_env["LOGIN_COOKIE"] = "OpenEMR=1anv2aurbl0gl0fmntcjirel2d;"
            my_env["LD_PRELOAD"] = "/wclibs/libcgiwrapper.so"
            my_env["LD_LIBRARY_PATH"] = "/wclibs"
            my_env["SCRIPT_FILENAME"] = script_fn
            my_env["STRICT"] = "1"
            my_env["WC_INSTRUMENTATION"] = "1"
            #my_env["NO_WC_EXTRA"] = "1"

            sqlpatrn1 = re.compile(rb"query failed: (?P<query>.*)</p><p>Error")
            sqlpatrn2 = re.compile(rb"(?P<query>You have an error i.*)")

            with open(inpfn, "rb") as input_file:

                p = subprocess.Popen(cmd, stdout=subprocess.PIPE, stderr=subprocess.PIPE, stdin=input_file, env=my_env)
                stdout = b""
                stderr = b""
                try:
                    sgf=False
                    ret = p.wait(timeout=3)

                    if ret == -11 :
                        sgf = True
                        segfs+=1

                        #print("\n\nSEGFAULT detected\n\n")
                    # if inpfn.find("clinical_reports") > -1:
                    #     import ipdb
                    #     ipdb.set_trace()
                    del my_env["STRICT"]

                    stdout, stderr = p.communicate(timeout=3)
                    stdout = stdout + stderr
                    # if sgf:
                    #     import ipdb
                    #     ipdb.set_trace()
                    if stdout.find(b"You have an error i") :

                        search_res = re.search(sqlpatrn1, stdout)
                        if search_res:
                            open("/tmp/sqlerrors.log","a+").write(f"{input_file} , {search_res.group('query')}\n" )
                            #print(f"SQL crash found {input_file}\n\tSQL={search_res.group('query')} ")
                            crash_cnt += 1
                        else:
                            search_res = re.search(sqlpatrn2, stdout)
                            if search_res:
                                open("/tmp/sqlerrors.log", "a+").write(f"{input_file} , {search_res.group('query')}\n")
                                # print(f"SQL crash found {input_file}\n\tSQL={search_res.group('query')} ")
                                crash_cnt += 1

                            else:
                                open("/tmp/non-sqlerrors.log", "a+").write(f"{input_file} , {stdout}\n")
                    else:
                        if sgf:
                            open("/tmp/segf.log","a+").write(f"{input_file} , {stdout}")
                        else:
                            open("/tmp/non-sqlerrors.log", "a+").write(f"{input_file} , {stdout}\n")


                except subprocess.TimeoutExpired:

                    pass
                finally:
                    if p:
                        p.kill()

                if segfs > 0 or crash_cnt > 0:
                    return crashing_inputs,crash_cnt, segfs

        return crashing_inputs, crash_cnt, segfs

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

    def start_running(self, basedir, testapp, results):
        outstr = ""
        for apptestdir in glob.glob(f"{basedir}/{testapp}-*"):
            cnt = 0
            featureset = os.path.basename(apptestdir).split("-")[1]

            self.findstartpoint(apptestdir, featureset)

            #print(f"**** {featureset} ****")

            # feat_tqdm.set_description(featureset)
            script_dir_mask = f"{apptestdir}/{featureset}_{self.startpoint}*"
            script_tqdm = tqdm.tqdm(glob.glob(script_dir_mask), desc=f"Script", ncols=100, leave=False)
            outstr = f"{featureset}"
            found_crashes = 0
            found_segfs = 0
            scripts_with_crashes = 0

            for testdir in script_tqdm:

                test_info = os.path.basename(testdir).split("_")
                #print(f"{testdir}")
                if len(test_info) < 7:
                    # logging.error(f"Directory {testdir}, does not comply with expected format, skipping.")
                    continue

                if featureset != test_info[0]:
                    # print(f"\nNo Match = {featureset} and {test_info[0]} and {testdir}")
                    continue
                script_fn = f"{'_'.join(test_info[6:]).replace('+', '/')}"

                if not script_fn.startswith(APPDIR):
                    script_fn = f"{APPDIR}/{script_fn}"
                script_tqdm.set_description(f'{found_crashes}/{found_segfs} of {scripts_with_crashes}: {script_fn.replace("/app", "")}')

                if os.path.isdir(testdir) and f"{featureset}+{script_fn}":

                    logging.debug(f"{featureset}, script_fn={script_fn}")

                    # self.add_featureset(featureset, script_fn)
                    #if script_fn.find("clinical") > -1:
                    crash_inp, crash_cnt, segfs = self.process_input_queue(testdir, featureset, script_fn)
                    found_crashes += crash_cnt
                    found_segfs += segfs

                    if crash_inp > 0:
                        scripts_with_crashes += 1
                    if segfs > 0:
                        results[featureset] += 1
                        outstr += f"{scripts_with_crashes}:{script_fn:50s} : {crash_inp}/{crash_cnt}/{segfs}\n"


                    #self.cc_allresults["completed"].append(f"{featureset}+{script_fn}")
                    # if cnt % 10 == 9:
                    #     script_tqdm.set_description("Saving...")
                    cnt += 1
                else:
                    script_tqdm.clear()
                    #print(f'{" " * 16}Skipped: {script_fn} ')

            script_tqdm.clear()
            # if cnt > 0:
            #     print(f"Saving json file after finishing {featureset}\n")
                # subprocess.check_call(["/test/resetapp.sh"])

            #print(outstr)


def main():
    parser = argparse.ArgumentParser(description="Run code coverage for a set of inputs")
    parser.add_argument('basemask', help="the bask of the base to examine ")

    parser.add_argument('testapp', help="basedir of the results, microtests, openemr, etc")
    # parser.add_argument('-o', '--output', default="/results/code_coverage.json", help="Where to put the json output file, default is /results/code_cov.json")
    # parser.add_argument('-s', '--startindex', default=0, type=int,
    #                     help="Out of the set of dates in for a particular script, which set to chose by order")
    args = parser.parse_args()

    # wait for other systems to wakey wakey
    results = defaultdict(retzero)

    for evbase in glob.glob(f"{args.basemask}"):
        cc = CodeCrash()
        cc.start_running(evbase, args.testapp, results )

    for fs, val in results.items():
        print(f"{fs} : {val}")

    print("Completed Run!")


if __name__ == "__main__":
    main()


