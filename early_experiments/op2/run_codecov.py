#!/usr/bin/env python3
import re
import sys
import json
import argparse
import glob
import tqdm
import time
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

    def __init__(self, out_jfn):

        self.cc_allresults = {}
        self.out_json_filename = out_jfn

        if os.path.exists(out_jfn):
            with open(out_jfn, "r") as jf:
                self.cc_allresults = json.load(jf)
        if "completed" not in self.cc_allresults:
            self.cc_allresults["completed"] = []

    def process_input_queue(self, testdir, featureset, script_fn):
        cmd = ["/php/php-cgi-mysqli-afl","-d", "auto_prepend_file=/tmp/prepost.php"]
        script_path = os.path.dirname(script_fn)

        if os.path.exists(cc_single_exec_fn):
            os.remove(cc_single_exec_fn)

        last_time = 0

        for inpfn in glob.glob(f"{testdir}/fuzzer-1/queue/id*"):

            logging.debug(inpfn)
            my_env = os.environ
            #tmpfp, tmpfn = tempfile.mkstemp(dir=script_path, suffix=".phpcc")

            #code = open(script_fn, "r").read()
            #os.write(tmpfp, f"\n{precovcode}\n{code}\n{postcovcode}\n".encode("latin-1"))
            #os.close(tmpfp)

            if (time.time() - last_time) > 600:
                outfile = open("/tmp/login_attempt.dat", "w")
                subprocess.check_call(['/p/webcam/php7/tests/openemr/set_session_login.sh','localhost'], stdout=outfile, stderr=outfile)

                outfile.close()
                last_time = time.time()

            my_env["LOGIN_COOKIE"] = "OpenEMR=1anv2aurbl0gl0fmntcjirel2d;"
            my_env["LD_PRELOAD"]="/wclibs/libcgiwrapper.so"
            my_env["SCRIPT_FILENAME"] = script_fn

            with open(inpfn,"rb") as input_file:
                p = subprocess.Popen(cmd, stdout=subprocess.PIPE, stderr=subprocess.PIPE, stdin=input_file, env=my_env)
                stdout = b""
                stderr = b""
                try:
                    stdout, stderr = p.communicate(timeout=10)
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

            if os.path.exists(cc_single_exec_fn):
                self.merge_result(featureset, script_fn)

                os.remove(cc_single_exec_fn)
            else:
                logging.error(f"\033[31mPrinting results b/c did not find json file\033[0m")
                sys.stdout.buffer.write(stdout)
                if len(stderr) > 0:
                    logging.error(f"\033[31m{stderr.decode('cp1252')}\033[0m")

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


    def start_running(self, basedir, testapp):

        for apptestdir in tqdm.tqdm(glob.glob(f"{basedir}/{testapp}-*"), desc="Feature Set",ascii=True, ncols=20):
            featureset = os.path.basename(apptestdir).split("-")[1]

            for testdir in tqdm.tqdm(glob.glob(f"{apptestdir}/*"), desc="      App", ascii=True, ncols=50):

                test_info = os.path.basename(testdir).split("_")

                if len(test_info) < 7:
                    # logging.error(f"Directory {testdir}, does not comply with expected format, skipping.")
                    continue

                if featureset != test_info[0]:
                    # print(f"\nNo Match = {featureset} and {test_info[0]} and {testdir}")
                    continue

                script_fn = f"{APPDIR}/{'_'.join(test_info[6:]).replace('+', '/')}"

                if os.path.isdir(testdir) and f"{featureset}+{script_fn}" not in self.cc_allresults["completed"]:

                    logging.debug(f"{featureset}, script_fn={script_fn}")

                    self.add_featureset(featureset, script_fn)

                    self.process_input_queue(testdir, featureset, script_fn)

                    self.cc_allresults["completed"].append(f"{featureset}+{script_fn}")

                    with open(self.out_json_filename , "w") as jf:
                        json.dump(self.cc_allresults, jf, indent=2)


def main():
    parser = argparse.ArgumentParser(description="Run code coverage for a set of inputs")
    parser.add_argument('basedir', help="basedir of the results, where the openemr-EXWICHR directory lies")
    parser.add_argument('testapp', help="basedir of the results, microtests, openemr, etc")
    parser.add_argument('-o', '--output', default="/results/code_coverage.json", help="Where to put the json output file, default is /results/code_cov.json")

    args = parser.parse_args()
    cc = CodeCov(args.output)
    cc.start_running(args.basedir, args.testapp)



if __name__ == "__main__":
    main()



