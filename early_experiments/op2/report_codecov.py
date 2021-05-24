#!/usr/bin/env python3
import argparse
import json
import os.path


def process_featureset(featurename, featurevalues, all_results):

    for scriptname, scripttrace in featurevalues.items():
        script_line_cnt = 0
        script_visit_cnt = 0
        for module, moduletrace in scripttrace.items():
            #if scriptname == module:
            for lineno, visitvalue in moduletrace.items():
                script_line_cnt += 1
                if visitvalue > 0:
                    script_visit_cnt += 1

        if scriptname not in all_results:
            all_results[scriptname] = {}
        all_results[scriptname][featurename] = {"visit": script_visit_cnt, "total": script_line_cnt}
        print( script_visit_cnt, script_line_cnt)
    return all_results


def start_eval(json_fn):
    jdata = {}

    if os.path.exists(json_fn):
        jdata = json.load(open(json_fn,"r"))
    else:
        print(f"ERROR: json file {json_fn} does not exist.")
        exit(102)
    all_results = {}
    featurenames = []
    for featurename, featurevalues in jdata.items():

        if featurename != "completed":
            featurenames.append(featurename)
            process_featureset(featurename, featurevalues, all_results)

    # Preprocess completed, starting with printing of report
    # Header
    row_out = [[""]]

    for fn in featurenames:
        row_out[0].append(fn)

    row_cnt = 1
    totssum = {}
    for scriptname, scriptvalues in all_results.items():
        row_out.append([f"{os.path.basename(scriptname)}"])
        maxvisits=0
        maxvisitor=""
        for fn in featurenames:
            if fn in scriptvalues and maxvisits <= int(scriptvalues[fn]['visit']):
                if maxvisits == int(scriptvalues[fn]['visit']):
                    maxvisitor = ""
                else:
                    maxvisitor = fn
                maxvisits = int(scriptvalues[fn]['visit'])
            if fn not in totssum:
                totssum[fn] = 0

        for fn in featurenames:
            if fn not in scriptvalues:
                row_out[row_cnt].append(f"{0:<5}   {0:<5}")
            else:
                scriptfeaturevals = scriptvalues[fn]
                totssum[fn] += int(scriptfeaturevals['visit'])
                if maxvisitor == fn:
                    row_out[row_cnt].append(f"\033[33m{scriptfeaturevals['visit']:<5}\033[0m   {scriptfeaturevals['total']:<5} || ")
                else:
                    row_out[row_cnt].append(f"{scriptfeaturevals['visit']:<5}   {scriptfeaturevals['total']:<5} || ")

        row_cnt += 1

    col_width = max(len(word) for row in row_out for word in row) + 2
    print("\n" + "Code Coverage Report".center(73))
    print("".join(f"{word}      ".center(col_width) for word in row_out[0]))
    print("-" *  73)
    for row in row_out[1:]:
        print("".join(word.ljust(col_width) for word in row))

    print(totssum)
    for fn in featurenames:
        print(f"{fn:<8} => {totssum[fn]:,}")

def main():
    parser = argparse.ArgumentParser(description="Run code coverage for a set of inputs")
    parser.add_argument('jsonfile', help="basedir of the results, where the openemr-EXWICHR directory lies")

    #parser.add_argument('-f', '--filter', default=["php","html"], nargs="+", help="File extensions to filter on")

    args = parser.parse_args()

    start_eval(args.jsonfile)



if __name__ == "__main__":
    main()


