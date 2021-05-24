#!/usr/bin/env bash

test_name=$1
if [ -z $test_name ]; then
    printf "Error, must include which test this is for"
    exit 1
fi

SCRIPT_DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" &> /dev/null && pwd )"

target_test=$2
if [ -z $target_test ]; then
    target_test="wcov"
fi
echo $SCRIPT_DIR/$test_name
cd $SCRIPT_DIR/$test_name || (printf "\033[31mError cannot access $test_name \033[0m" && exit 33)

if [ -d $target_test ]; then
    target_deldir="$(pwd)/${target_test:?}"
    rm -rf "${target_deldir:?}"
fi

mkdir -p $target_test

for td in $(find . -name "coverages" |grep -v burp |cut -d "/" -f2 ); do
    if [[ $target_test == "wcov" && -f $td/crawl-coverages ]]; then
	    printf "\033[36mCopying to $target_test from $td/crawl-coverages\033[0m\n"

        for from_cc in $td/crawl-coverages/*; do
                backup_cc="$target_test/crawl_${td}_$(basename $from_cc)"
                cp -a $from_cc $backup_cc
        done
    else
        for from_cc in $td/coverages/*; do
                backup_cc="$target_test/crawl_${td}_$(basename $from_cc)"
                cp -a $from_cc $backup_cc
        done
    fi
done

for td in $(find . -name "coverages" |grep -v burp |cut -d "/" -f2 ); do
    echo $td

    if [[ $target_test == "wcov" && -f $td/fuzz-coverages ]]; then 
	    printf "\033[36mCopying to $target_test from $td/fuzz-coverages\033[0m\n"

        for from_cc in $td/fuzz-coverages/*; do
                backup_cc="$target_test/${td}_$(basename $from_cc)"
                cp -a $from_cc $backup_cc
        done
    elif [[ $target_test == "ccov" && -f $td/crawl-coverages ]]; then 	
        printf "\033[36mCopying to $target_test from $td/crawl-coverages\033[0m\n"
        for from_cc in $td/crawl-coverages/*; do
                backup_cc="$target_test/${td}_$(basename $from_cc)"
                cp -a $from_cc $backup_cc

        done
   else
        printf "\033[36mCopying to $target_test from $td/coverages\033[0m\n"
        for from_cc in $td/coverages/*; do
                backup_cc="$target_test/${td}_$(basename $from_cc)"
                cp -a $from_cc $backup_cc
        done
    fi 
#    echo $f

done

