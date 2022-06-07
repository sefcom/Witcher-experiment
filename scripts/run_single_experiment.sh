#!/usr/bin/env bash
SCRIPTS_DIR="$(realpath $( cd "$( dirname "$0" )" > /dev/null && pwd ))"
BASE_DIR="$(realpath "${SCRIPTS_DIR}/..")"

function print_help(){
    printf "USAGE: ./run_experiment_cves.sh cve# sub_test [OPTIONS]\n"
    printf "\t--delete-all \t Delete the results from last run and start fresh\n"
    printf "\t--delete-sub \t Just delete the results for this sub test \n"
    printf "\t--delete-fuzz \t Just delete the fuzz coverage results \n"
    printf "\t--no-crawl   \t Skip crawling step \n"
    printf "\t--build      \t Rebuild the container \n"
    printf "\t--no-run     \t Do not kill and re-run the container \n"
    printf "\t--port       \t port of container  \n"
    printf "\t--burp      \t Exit so that Burp can be run vs container \n"
    printf "\t--burpplus BURP_PORT \t Load to Burp and Exit so that Burp can be run vs container \n"
    printf "\t--use_instrumented \t Uses Web Fuzz's instrumented version \n"
    printf "\t--no_fault_escalation \t Uses Disables fault escalation, used for code coverage comparison. \n"
    exit 0
}

if [[ "$1" == "--help" || "$1" == "-h" ]]; then
    print_help
fi

target_app_name=$(echo $1| cut -d"/" -f1);
app_user_role=$(echo $1| cut -d"/" -f2);
echo ${target_app_name}   ${app_user_role}
echo ${target_app_name}   ${app_user_role}
echo ${target_app_name}   ${app_user_role}
shift

if [[ -z "${app_user_role}" ]]; then
   printf "[\033[31mWitcher\033[0m] Error, the first parameter must have a user role of the form app_name/user_role.\n"
   exit 154
fi 
set -x
target_app_dpath="$(realpath $(find $BASE_DIR -maxdepth 2 -type d -name "$target_app_name"))"
echo ${target_app_dath}
echo ${app_user_role}
app_role_dpath="${target_app_dpath}/${app_user_role}"
echo ${app_role_dpath}

set +x


DO_DELETE_ALL=false
DO_DELETE_SUB=false
DO_DELETE_FUZZ=false
DO_CRAWL=true
DO_DOCKER_BUILD=false
DO_DOCKER_RUN=true
DO_BURP=false
DO_BURPPLUS=false
DO_WEBFUZZ=false
FAULT_ESCALATION_PARAM=""
BURP_PORT=8080
port=80
USE_INSTRUMENTED=0
DEBUG_VOLUME="-v /p:/p"

while [[ $# -gt 0 ]]
do
    # replace _ and - in parameter after 1st 2 characters
    key="$(sed -E 's/(..)[-_]/\1/g' <<< ${1})"

    case $key in
        --deleteall)
            DO_DELETE_ALL=true
            DO_DELETE_SUB=true
        ;;
        --deletesub|--delete)
            DO_DELETE_SUB=true
        ;;
        --deletefuzz)
            DO_DELETE_FUZZ=true
        ;;

        --nocrawl)
            DO_CRAWL=false
        ;;
        --build)
            DO_DOCKER_BUILD=true
        ;;
        --norun)
            DO_DOCKER_RUN=false
        ;;
        --burp)
            DO_BURP=true
        ;;
        --webfuzz|--wf)
            DO_WEBFUZZ=true
        ;;
        --burpplus)
            shift
            DO_BURPPLUS=true
            BURP_PORT=$1
            re='^[0-9]+$'
            if ! [[ $BURP_PORT =~ $re ]] ; then
               echo "error: Burp PORT is Not a number" >&2;
               exit 252
            fi
        ;;
        --port)
            shift
            port=$1
        ;;
        --useinstrumented|--useinstrumentation)
            USE_INSTRUMENTED=1
        ;;
        --nofaultescalation)
            FAULT_ESCALATION_PARAM="--no_fault_escalation"
        ;;
        -h|--help)
            print_help
        ;;
        *)
           echo "Uknown flag used "
        ;;
    esac
    shift # past argument or value
done


function _term() {
        children="$(ps -s $$ -o pid=)"

        if [ -z "$children" ];then
            printf "\n[WC] Trapped CTRL-C --> No children found  \n"
        else
            printf "\n[WC] Trapped CTRL-C --> killing all children %s \n" "$children"
            kill -9 $children
        fi
        if [ -f /tmp/witcher_exp_to.pid ];then
            timeout_pid="$(cat /tmp/witcher_exp_to.pid)"
            printf "\n[WC] Found timeout pid: %s  children: %s \n" "$timeout_pid" "$(pgrep -P $timeout_pid)"
            pkill -9 -P "$timeout_pid"
            kill -9 "$timeout_pid"
            rm -f /tmp/witcher_exp_to.pid
        fi
        exit 128
}

# trap ctrl-c and call ctrl_c()
trap _term INT TERM


if [[ ${DO_BURP} = false && ${DO_BURPPLUS} = false ]]; then
  if [ -d $target_app_dpath/$app_user_role ] && [ -f $target_app_dpath/$app_user_role/witcher_config.json ]; then
      printf "\033[32mWitcher test starting \033[0m\n"
  else

      printf "\033[31mCannot start Witcher test \033[0m\n"
      exit 1
  fi
fi

mkdir -p ${app_role_dpath}

cd "${app_role_dpath}" || exit 254

docker_image_name="puppeteer1337/${target_app_name,,}"
docker_container_name="${target_app_name,,}-${app_user_role,,}"

base_url_path=$(jq .base_url_path witcher_config.json|tr -d '"')
if [[ "$base_url_path" == "null" ]]; then
    base_url_path="/"
fi

if [[ ${DO_DELETE_ALL} = true ]]; then
    rm -rf ../ccov; rm -rf ../wcov; rm -rf ${app_role_dpath}/crawl-coverages ${app_role_dpath}/fuzz-coverages;

fi
if [[ ${DO_DELETE_SUB} = true ]]; then
    rm -f request_data.json; rm -rf WICHR; rm -rf coverages/*; rm -rf crawl-coverages; rm -rf fuzz-coverages
fi
if [[ ${DO_DELETE_FUZZ} = true ]]; then
    rm -rf WICHR; rm -rf EXWICHR; rm -rf coverages/*; rm -rf crawl-coverages; rm -rf fuzz-coverages
fi

if [[ ${DO_DOCKER_BUILD} = true ]]; then
    if docker build --build-arg USE_INSTRUMENTED=${USE_INSTRUMENTED} -t ${docker_image_name} .. ;then
        printf "[\033[32mWitcher\033[0m] Docker container build completed \n"
    else
        exit 253
    fi
fi

if [[ ${DO_DOCKER_RUN} = true ]]; then
    docker kill $docker_container_name;
    waitcnt=0
    while docker ps -a | grep ${docker_container_name} > /dev/null; do
        waitcnt=$(( $waitcnt + 1 ))
        echo "Docker kill issued, but waiting for container to be removed. ${waitcnt}"
        if [[ $waitcnt -ge 30 ]]; then
            printf "\033[38;5;1mWaited 5 minutes for removal of ${docker_container_name}, but it is still running."
            exit 91
        fi
        sleep 10;
    done
    mkdir -p ${app_role_dpath}/coverages
    echo "docker run -id --rm --privileged --shm-size=1G -e DISPLAY=$DISPLAY -v /tmp/.X11-unix:/tmp/.X11-unix  --name ${docker_container_name} ${DEBUG_VOLUME} -v ${BASE_DIR}:${BASE_DIR} -v $app_role_dpath/coverages:/tmp/coverages ${docker_image_name}"
    if docker run -id --rm --privileged --shm-size=1G -e DISPLAY=$DISPLAY -v /tmp/.X11-unix:/tmp/.X11-unix  --name ${docker_container_name} ${DEBUG_VOLUME} -v ${BASE_DIR}:${BASE_DIR} -v $app_role_dpath/coverages:/tmp/coverages ${docker_image_name}; then
        printf "[\033[32mWitcher\033[0m] Issued docker run \n"
    else
        exit 2
    fi
    
    if docker exec -it ${docker_container_name} bash -c "sudo chown www-data:wc /tmp/coverages; sudo chmod 777 /tmp/coverages"; then
        printf "[\033[32mWitcher\033[0m] Issued file permissions changes \n"
    else
        if docker exec -it ${docker_container_name} bash -c "touch /tmp/coverages/testfile && rm /tmp/coverages/testfile"; then
            printf "[\033[32mWitcher\033[0m] Could not change file permissions for /tmp/coverages, BUT could alter and remove test file. \n"
        else
            printf "[\033[32mWitcher\033[0m] Could alter coverages files and could not change file permissions for /tmp/coverages, probably b/c mounted as t9, change at host or mount locally. \n"
            exit 3
        fi
    fi

    ipaddr=$(docker inspect  ${docker_container_name} | jq '.[]|.NetworkSettings.Networks.bridge.IPAddress'|tr -d '"')
    ${SCRIPTS_DIR}/wait-for-tcp $ipaddr $port

    if [ -f ../setup.sh ]; then
        printf "[Witcher] running additional seutp after starting container\n"

        if USE_INSTRUMENTED=${USE_INSTRUMENTED} ../setup.sh ${app_user_role}; then
            printf "[\033[32mWitcher\033[0m] Setup completed successfully\n"
        else
            printf "[\033[31mWitcher\033[0m] Setup failed  \n"
            exit 252
        fi
    fi

    if docker exec -it -w "$(pwd)" -u wc  ${docker_container_name} bash -i -c 'touch /tmp/start_test.dat'; then
        printf "[\033[32mWitcher\033[0m] Created /tmp/start_test.dat \n"
    else
        exit 4
    fi
fi
echo ${docker_container_name}
echo ${docker_container_name}
echo ${docker_container_name}

ipaddr=$(docker inspect  ${docker_container_name} | jq '.[]|.NetworkSettings.Networks.bridge.IPAddress'|tr -d '"')

if [ -z $ipaddr ]; then
    printf "[\033[31mWitcher\033[0m] Failed to gather ipaddr \n"
    exit 5
else
    printf "[\033[32mWitcher\033[0m] IP address is $ipaddr \n"
fi

if [[ ${DO_BURPPLUS} = true ]]; then
    
    printf "[\033[32mWitcher\033[0m] Loading Priorruns to Burp \n"
    read -p "[Witcher] -<[{ About to load, turn intercept off, and press any key to resume }]>- "
    for f in $(find ${target_app_dpath} -maxdepth 2 -name request_data.json | grep "burpplus"); do
       python3 $SCRIPTS_DIR/burp-buff.py --burpproxy 127.0.0.1:$BURP_PORT --target-ip $ipaddr $f
       res=$?
       if [[ $res -ne 0 ]]; then
         printf "[\033[31mWitcher\033[0m] Failed to load $f into burp \n"
         exit 92
       fi
    done
    exit 0
fi

if [[ ${DO_WEBFUZZ} = true ]]; then

    printf "[\033[32mWitcher\033[0m] Loading Witcher Crawl to WEBFUZZ \n"

    python3 ${SCRIPTS_DIR}/webfuzz-buff.py ${app_role_dpath}

    docker cp ${app_role_dpath}/witcher_seeds.json ${docker_container_name}:/app

    jq '.direct.url' -r ${app_role_dpath}/witcher_config.json
    jq '.direct.postData' -r ${app_role_dpath}/witcher_config.json
    jq '.direct.getData' -r ${app_role_dpath}/witcher_config.json
    url_path=$(jq '.request_crawler.form_url' -r ${app_role_dpath}/witcher_config.json|cut -d"/" -f4-)

    echo docker exec -it -w /p/webfuzz-fuzzer/webFuzz/  ${docker_container_name} timeout 8h ./run1.sh /app/${target_app_name} /p/Witcher-experiment/interpreter-targets/${target_app_name} /${url_path} | xsel -i -b -p
    echo "docker exec -w /p/webfuzz-fuzzer/webFuzz/  ${docker_container_name} timeout 8h ./run1.sh /app/${target_app_name} /p/Witcher-experiment/interpreter-targets/${target_app_name} /${url_path} " COPIED to clipboard
    printf "[\033[32mWitcher\033[0m] starting webfuzz \n"

    exit 0
fi


if [[ ${DO_BURP} = true ]]; then
    printf "[\033[32mWitcher\033[0m] Exiting to run allow Burp \n"
    exit 0
fi

# get IP of container into witcher_config.json
if sed -r 's/(^.*url.*http:\/\/)[0-9\.]+(.*)/\1'"$ipaddr"'\2/' witcher_config.json > /tmp/tmpcfg.json; then
    printf "[\033[32mWitcher\033[0m] Fixed witcher_config.json \n"
else
    printf "[\033[31mWitcher\033[0m] Failed to fix witcher_config.json \n"
    exit 10
fi

cp /tmp/tmpcfg.json witcher_config.json

if [[ -f request_data.json ]]; then
    if sed  -r "s/(http:\/\/)[0-9\.]+(.*)/\1${ipaddr}\2/" request_data.json > /tmp/tmp_rd.json; then
	  printf "[\033[32mWitcher\033[0m] Fixed witcher_config.json \n"
	  jq . /tmp/tmp_rd.json > request_data.json
    else
	  printf "[\033[31mWitcher\033[0m] Failed to fix witcher_config.json \n"
	  exit 10
    fi
fi

if [[ ${DO_CRAWL} = true ]]; then
    printf "[\033[32mWitcher\033[0m] Starting CRAWL of ${docker_container_name} @ http://$ipaddr$base_url_path  \n"
    start_time="$(date +%s)"
    DURATION_SEC=$(( 4 * 60 * 60  - 2 ))
    diff=$(( $(date  +%s) - $start_time ))
    while [[ $diff -lt $DURATION_SEC ]]; do
        #timeout --signal KILL $(( $DURATION_SEC - $diff ))s  execute request_crawler http://$ipaddr$base_url_path "$(pwd)" &
        #--no-headless
        docker exec -it -w /helpers/request_crawler/  ${docker_container_name} touch /tmp/start_test.dat
        echo docker exec -it -w /helpers/request_crawler/ -u wc  ${docker_container_name} bash -i -c '"'timeout --signal KILL $(( $DURATION_SEC - $diff ))s  node main.js request_crawler http://localhost$base_url_path $(pwd) --no-headless >> ${app_role_dpath}/crawler.log '"'
        set -x
        echo
        docker exec -it -w /p/Witcher/base/helpers/request_crawler/  -u wc ${docker_container_name} bash -i -c "timeout --signal KILL $(( $DURATION_SEC - $diff ))s  node main.js request_crawler http://localhost$base_url_path $(pwd) --no-headless  >> ${app_role_dpath}/crawler.log "
        set +x
        exit 99
        docker exec -it -w /helpers/request_crawler/  ${docker_container_name} rm /tmp/coverages/execs.json

#        pid=$!
#        echo $pid >> /tmp/witcher_exp_to.pid
#        wait $pid
#        ret=$?;

        diff=$(( $(date  +%s) - $start_time ))
        if [[ $diff -lt $DURATION_SEC ]]; then
            printf "[\033[31mWitcher\033[0m] Error with crawler, restarting\n"
            sleep 5
        fi
    done
    # ret == 124, timeout occurred, ret == 130, user ctrl-c, ret == 137, received kill -9
    if [ $ret -eq 137 ] || [ $ret -eq 124 ] || [ $ret -eq 0 ]; then
        mkdir -p ../ccov && find . -name '*.cc.json' -exec cp {} ../ccov \; && echo "Crawl reached completion ";
        rm -rf crawl-coverages
        mkdir -p crawl-coverages
        cp -a coverages/. crawl-coverages
    else
        printf "[\033[31mWitcher\033[0m] Failed exit crawl properly\n"
        exit 15
    fi
fi

fcs_fpath=$(find ${app_role_dpath} -name 'fuzz_campaign_status.json'|head -1)
if [[ -f "$fcs_fpath" ]]; then 
    if sed  -ri "s/(http:\/\/)[0-9\.]+(.*)/\1${ipaddr}\2/" ${fcs_fpath}; then
	printf "[\033[32mWitcher\033[0m] Fixed ${fcs_fpath} \n"
    else
	printf "[\033[31mWitcher\033[0m] Failed to fix ${fcs_fpath} \n"
	exit 10
    fi
fi 

# fuzz app
if docker exec -it ${docker_container_name} bash -c "echo 1 >/proc/sys/kernel/sched_child_runs_first && echo core > /proc/sys/kernel/core_pattern"; then
    printf "[\033[32mWitcher\033[0m] Updated schedule_child_runs_first and core_pattern \n"
else
    printf "[\033[31mWitcher\033[0m] Failed to update /proc/sys/kernel/schedu_child_runs_first or /proc/sys/kernel/corepattern \n"
    exit 5
fi
if docker exec -it ${docker_container_name} bash -c 'for fn in /sys/devices/system/cpu/cpu*/cpufreq/scaling_gov*; do echo performance > $fn; done'; then
    printf "[\033[32mWitcher\033[0m] Updated scaling_gov \n"
else
    printf "[\033[31mWitcher\033[0m] Failed to update scaling_gov setting \n"
    #exit 6
fi

sudo chmod 666 ${app_role_dpath}/coverages/*
echo "starting fixup"
docker exec -it ${docker_container_name} bash -i -c 'cd /app; chown wc:www-data -R .; chmod o+r . -R;if [ -d /var/instr/ ]; then chmod 666 -R /var/instr/*; fi; echo HIHIHI '
echo "first cleanup is $?"

printf "[\033[32mWitcher\033[0m] Fuzz command : "
echo docker exec -it -w "$(pwd)" -u wc ${docker_container_name} bash -i -c 'p --testver WICHR ${FAULT_ESCALATION_PARAM}'
if docker exec -it -w "$(pwd)" -u wc ${docker_container_name} bash -i -c "p --testver WICHR ${FAULT_ESCALATION_PARAM}"; then
    mkdir -p ../wcov && find . -name '*.cc.json' -exec cp {} ../wcov \; && echo "Witcher results copied "
    rm -rf fuzz-coverages
    mkdir -p fuzz-coverages
    cp -a coverages/. fuzz-coverages
else
    printf "[\033[31mWitcher\033[0m] Exited fuzzer with an error \n"
    exit 20
fi

cd .. || exit 25
archive_fn="results-$target_app_name-$(date -d "today" +"%Y%m%d-%H%M").tar.gz"

find . -name 'fuzzer-master.out' -exec truncate --size=5M {} \;

printf "[Witcher] \033[32mTruncated all the fuzzer-master.outs, Creating archive for $(pwd)/${app_user_role} \033[0m \n"
echo tar cvzf "$archive_fn" $(pwd)/${app_user_role}
tar cvzf "$archive_fn" $(pwd)/${app_user_role}

if [ -f $archive_fn ]; then
    tar tzf $archive_fn > /tmp/tarresults.dat
    echo "$(wc -l /tmp/tarresults.dat) files archived "
    printf "[\033[32mWitcher\033[0m] Completed succesfully \n "
else
    printf "[\033[31mWitcher\033[0m] Failed to archive results \n"
    exit 30
fi

