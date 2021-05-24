#!/usr/bin/env python3
import argparse
import json
import os.path
import tqdm
import glob
import subprocess
from collections import defaultdict

def process_featureset(featurename, featurevalues, all_results):

    for scriptname, scripttrace in featurevalues.items():
        script_line_cnt = 0
        script_visit_cnt = 0
        for module, moduletrace in scripttrace.items():
            if scriptname == module or True:
                for lineno, visitvalue in moduletrace.items():
                    script_line_cnt += 1
                    if visitvalue > 0:
                        script_visit_cnt += 1

        if scriptname not in all_results:
            all_results[scriptname] = {}
        all_results[scriptname][featurename] = {"visit": script_visit_cnt, "total": script_line_cnt}
        #print( script_visit_cnt, script_line_cnt)
    return all_results

def retneg2():
    return -2

def emptydict():
    return dict()

class Report_CodeCov:

    def __init__(self, startpoint_index=0, roundindex=0):

        self.all_results = {}
        self.startpoint_index = startpoint_index
        self.startpoint = ""
        self.script_names = set()
        self.featurenames = []
        self.round = roundindex

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
            print(f"Chosen start date cnt exceeds number of dates, continuing with date 0 {apptestdir} {featureset}")
            self.startpoint = dtlist[0]

    def start_running(self, basedir, testapp):

        basedir = f"{basedir}/ev{self.round}_*hr_*"
        for apptestdir in sorted(glob.glob(f"{basedir}/{testapp}*"), key=os.path.basename):

            cnt = 0
            featureset = os.path.basename(apptestdir).split("-")[1]

            self.findstartpoint(apptestdir, featureset)

            print(f"**** {featureset} Round: {self.round} {apptestdir} ****")
            # feat_tqdm.set_description(featureset)
            script_dir_mask = f"{apptestdir}/{featureset}_{self.startpoint}*/trace"
            script_tqdm = tqdm.tqdm(glob.glob(script_dir_mask), desc=f"Script", ncols=100, leave=False)
            if featureset not in self.all_results:
                self.featurenames.append(featureset)
                self.all_results[featureset] = defaultdict(emptydict)
            tcnt=0
            for trace_dir in script_tqdm:
                test_info = os.path.basename(trace_dir[:-6]).split("_")
                if len(test_info) < 7:
                    # logging.error(f"Directory {testdir}, does not comply with expected format, skipping.")
                    continue

                if featureset != test_info[0]:
                    # print(f"\nNo Match = {featureset} and {test_info[0]} and {testdir}")
                    continue
                script_fn = f"{'_'.join(test_info[6:]).replace('+', '/')}"

                self.script_names.add(script_fn)
                #print("\n" + trace_dir + "\n\t" + script_fn + f" script cnt={len(self.script_names)}")

                self.all_results[featureset][script_fn] = self.trace_eval(trace_dir)
                #print(f"\t{self.all_results[featureset][script_fn]}")
                onecnt=0

                tcnt +=1

                # if tcnt > 5:
                #     break
            #self.get_results()
            # break

    def trace_eval(self, trace_dir):
        jdata = {}

        tots = defaultdict(retneg2)
        basecase = f"{trace_dir}/cc0.json"
        patched_fn = f"{trace_dir}/patched_file.json"
        results_fn = f"{trace_dir}/cc_results.json"

        if os.path.exists(results_fn):
            try:
                tots = json.load(open(results_fn))
                return tots
            except Exception:
                pass

        if not os.path.exists(basecase):
            print (f"Basecase does not exist at {basecase}")

            assert(os.path.exists(basecase))

        jd = json.load(open(basecase))

        for fn in glob.glob(f"{trace_dir}/cc*"):
            if os.path.basename(fn) == "cc0.json":
                pass
            else:
                subprocess.check_call(["patch", basecase, fn, "-o", patched_fn], stdout=subprocess.DEVNULL)
                try:
                    jd = json.load(open(patched_fn))
                except json.decoder.JSONDecodeError as jde:
                    print(f"JSON decoding error {jde} of file {basecase} {fn} -o {patched_fn}")
                    import traceback
                    traceback.print_exc()
                    continue

            for mod, modval in jd.items():
                for lineno, lineval in modval.items():
                    basemod = os.path.basename(mod)
                    key = f"{basemod}+{lineno}"
                    if tots[key] < lineval:
                        tots[key] = lineval

        json.dump(tots, open(results_fn,"w"))

        return tots

    def get_results(self):

        all_results = {}
        featurenames = []

        # Preprocess completed, starting with printing of report
        # Header
        row_out = [[""]]
        self.featurenames.append("burp")

        burpd = json.load(open(f"/p/webcam/php7/tests/openemr/burp_trace{self.round}.dat","r"))
        self.all_results["burp"] = burpd

        featurenames = self.featurenames
        outfile = open("/p/webcam/results/trace_results.txt", "w")
        outfile.write(f"Scripts,")
        second_header_line = ","

        for fn in featurenames:
            outfile.write(f"{fn},{fn},")
            second_header_line += "visited, total,"
            row_out[0].append(fn)
        outfile.write("\n" + second_header_line + "\n")

        row_cnt = 1
        totssum = {}
        wincnt = {}
        tiecnt = {}


        for fn in featurenames:
            totssum[fn] = 0
            wincnt[fn] = 0
            tiecnt[fn] = 0

        for scriptname in list(self.script_names):
            row_out.append([f"{os.path.basename(scriptname)}"])
            outfile.write(f"{scriptname.replace('/app','')},")
            maxvisits=0
            maxvisitor=[]
            calculated_values = {}

            # aggregate visitation values
            for fn in featurenames:
                scriptvalues = self.all_results[fn][scriptname].values()
                thisvisitcnt = 0
                totalcnt = 0
                # if totalcnt == 0:
                #     import pdb
                #     pdb.set_trace()

                for modval in scriptvalues:
                    totalcnt += 1
                    if modval > 0:
                        thisvisitcnt += 1
                    assert modval != 0

                # if thisvisitcnt == 0:
                #     scriptvalues = self.all_results["WiCHR"][scriptname].values()
                #     for modval in scriptvalues:
                #         totalcnt += 1
                #         if modval > 0:
                #             thisvisitcnt += 1
                #         assert modval != 0
                #
                # if thisvisitcnt == 0:
                #     scriptvalues = self.all_results["WiCR"][scriptname].values()
                #     for modval in scriptvalues:
                #         totalcnt += 1
                #         if modval > 0:
                #             thisvisitcnt += 1
                #         assert modval != 0

                if fn == "burp":
                    totalcnt = 0

                calculated_values[fn] = {"visit":thisvisitcnt, "total": totalcnt}
                #print(f"\t{fn}:{scriptname}:{calculated_values[fn]['visit']}")
                outfile.write(f"{thisvisitcnt},{totalcnt},")
                if maxvisits <= thisvisitcnt:
                    if maxvisits == thisvisitcnt:
                        maxvisitor.append(fn)
                    else:
                        maxvisitor = [fn]
                    maxvisits = int(thisvisitcnt)

            outfile.write("\n")

            if len(maxvisitor) == 1:
                wincnt[maxvisitor[0]] += 1
            else:
                for mvisitor in maxvisitor:
                    tiecnt[mvisitor] += 1
            for fn in featurenames:
                scriptfeaturevals= calculated_values[fn]
                totssum[fn] += int(scriptfeaturevals['visit'])

                if fn in maxvisitor:
                    if len(maxvisitor) > 1:
                        row_out[row_cnt].append(f"\033[33m{scriptfeaturevals['visit']:<5}\033[0m   {scriptfeaturevals['total']:<5} || ")
                    else:
                        row_out[row_cnt].append(f"\033[32m{scriptfeaturevals['visit']:<5}\033[0m   {scriptfeaturevals['total']:<5} || ")
                else:
                    row_out[row_cnt].append(f"{scriptfeaturevals['visit']:<5}   {scriptfeaturevals['total']:<5} || ")

            row_cnt += 1

        outfile.close()

        col_width = max(len(word) for row in row_out for word in [row[0]]) + 2
        print("\n" + "Code Coverage Report".center(73))
        print(" " * col_width, end="")
        print("".join(f"{word}".center(17) for word in row_out[0][1:]))
        #print("".join(f"{word}      ".center(col_width) for word in row_out[0]))
        print("-" * (col_width+3) + "-"* 17 * len(row_out[0][1:]))
        for rowcnt, row in enumerate(row_out[1:]):
            print(f"{rowcnt+1:<3}  " + row[0].ljust(col_width), end="")
            print("".join(word for word in row[1:]))

        print(totssum)
        totalcnt = len(row_out[1:])
        print(f"              Lines       Won      |    Tie      |    Lost ")
        print(f"Featureset   Visited    Cnt   Pcnt |  Cnt   Pcnt |  Cnt   Pcnt")
        print( "--------------------------------------------------------------")

        fntotsmax=0
        for fn in featurenames:
            fntotsmax=max(fntotsmax, totssum[fn])

        for fn in sorted(featurenames):
            winpcnt = 0
            if wincnt[fn] > 0:
                winpcnt = wincnt[fn]/totalcnt*100
            lostcnt = totalcnt-(wincnt[fn]+tiecnt[fn])
            lostpcnt = 0
            if lostcnt > 0:
                lostpcnt = lostcnt / totalcnt * 100
            tiepcnt = 0
            if tiecnt[fn] > 0:
                tiepcnt = tiecnt[fn] /totalcnt * 100
            if totssum[fn] == fntotsmax:
                print(f"\033[32m", end="")

            print(f"{fn:<8} => {totssum[fn]: 7,}   {wincnt[fn]: 3} {winpcnt: 6.1f}% | "
                  f"{tiecnt[fn]:3} {tiepcnt: 6.1f}% | {lostcnt:3} {lostpcnt: 6.1f}% \033[0m")

        return totssum


def mann_whitney(fs1, fs2, thesums):
    vals = []
    rvals={fs1:[],fs2:[]}
    for tsindex in range(0, 5):
        ts = thesums[tsindex]
        for sumfn, sumval in ts.items():

            if sumfn == fs1 or sumfn == fs2:
                rvals[sumfn].append(str(sumval))
                vals.append((sumfn, sumval))

    outstr = ""
    outstr += ""
    outstr = f"""
x <- c({",".join(rvals[fs1])}) # {fs1}
y <- c({",".join(rvals[fs2])}) # {fs2}
res <- wilcox.test(x, y, alternative = "two.sided", exact = FALSE)
print('{fs1} v {fs2}')
print(res$p.value)
"""
    from operator import itemgetter
    fsum1 = []
    fsum2 = []
    print(f"{fs1} versus {fs2}")
    for indx, v in enumerate(sorted(vals, key=itemgetter(1))):
        print(f"{indx+1}: {v[0]} {v[1]}")
        if (v[0] == fs1):
            fsum1.append(indx+1)
        else:
            fsum2.append(indx+1)
    if sum(fsum1) > sum(fsum2):
        bestranker = fs1
    else:
        bestranker = fs2

    stat = min(sum(fsum1), sum(fsum2)) - (len(fsum1)*(len(fsum1)+1)/2)

    if stat > 1:
        print(f"\033[31mCrit Value = {stat}, no SSD between {fs1} and {fs2} \033[0m\n")
    else:
        print(f"\033[36mCrit Value = {stat}, and best ranker is {bestranker}\033[0m\n")
    return outstr


def main():
    parser = argparse.ArgumentParser(description="Run code coverage for a set of inputs")
    parser.add_argument('basedir', help="basedir of the results, where the openemr-EXWICHR directory lies")
    parser.add_argument('testapp', help="basedir of the results, microtests, openemr, etc")
    parser.add_argument('-s', '--startindex', default=0, type=int,
                        help="Out of the set of dates in for a particular script, which set to chose by order")

    #parser.add_argument('-f', '--filter', default=["php","html"], nargs="+", help="File extensions to filter on")

    args = parser.parse_args()
    thesums = []
    for ri in range(0, 5):
        repCC = Report_CodeCov(args.startindex, roundindex=ri)
        repCC.start_running(args.basedir, args.testapp)
        thesums.append(repCC.get_results())

    lastval = 10000000
    vals = []
    finalstr=""
    finalstr += mann_whitney("AFLHR", "burp", thesums)
    finalstr += mann_whitney("ExWiCR", "burp", thesums)
    finalstr += mann_whitney("WiCR", "burp", thesums)
    finalstr += mann_whitney("ExWiCHR", "burp", thesums)
    finalstr += mann_whitney("WiCHR", "burp", thesums)

    print("\n***** AFLHR ****")
    finalstr += mann_whitney("AFLHR", "ExWiCR", thesums)
    finalstr += mann_whitney("AFLHR", "WiCR", thesums)
    finalstr += mann_whitney("AFLHR", "ExWiCHR", thesums)
    finalstr += mann_whitney("AFLHR", "WiCHR", thesums)

    print("\n***** ExWICR ****")
    finalstr += mann_whitney("ExWiCR", "WiCR", thesums)
    finalstr += mann_whitney("ExWiCR", "ExWiCHR", thesums)
    finalstr += mann_whitney("ExWiCR", "WiCHR", thesums)


    print("\n***** WiCR ****")
    finalstr += mann_whitney("WiCR", "ExWiCHR", thesums)
    finalstr += mann_whitney("WiCR", "WiCHR", thesums)


    print("\n***** ExWICHR ****")
    finalstr += mann_whitney("ExWiCHR", "WiCHR", thesums)


    print(finalstr)

    for tsindex in range(0, 5):
        ts = thesums[tsindex]
        sumfns = ["burp", "AFLHR","ExWiCR","WiCR","ExWiCHR","WiCHR"]
        print(
            f"\\textbf{{Trial {tsindex}}}\t& {{{ts['burp']:7,}}}  & {{{ts['AFLHR']:7,}}}  & {{{ts['ExWiCR']:7,}}}  & {{{ts['WiCR']:7,}}}  &  {{{ts['ExWiCHR']:7,}}}  &  {{{ts['WiCHR']:7,}}}  \\\\")





if __name__ == "__main__":
    main()


