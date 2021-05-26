#! /bin/bash
PORT=$1
if [[ -z "$PORT" ]]; then
    PORT=18080
fi 
export WEBGOAT_PORT=${PORT}
export WEBGOAT_HSQLPORT=$(( ${PORT} + 921))

cd /tmp;
#export LD_PRELOAD=/wclibs/lib_db_fault_escalator.so
#export AFL_META_INFO_ID=${port}
#export SHOW_WITCH=1
#export STRICT=3
#export PORT=${port}

function finish {
  pkill -9 -P $$
  pkill -9 -f "server.port=${PORT}"
}

trap finish ctrl_c INT EXIT

set -x 

LD_PRELOAD=/wclibs/lib_db_fault_escalator.so AFL_META_INFO_ID=${PORT} STRICT=3 SHOW_WITCH=1 PORT=${PORT} /p/Witcher/java/jdksrc/build/linux-x86_64-normal-server-release/jdk/bin/java -XX:+UseSerialGC -XX:+WitcherInstrumentation -jar /webgoat-server-8.1.0.jar --server.address=0.0.0.0 --server.port=${PORT}


#cp  /p/Witcher/base/httpreqr/httpreqr.64 /httpreq; printf "\x00\x00" | AFL_META_INFO_ID=18080 /afl/afl-showmap -m 4G -o /tmp/mapout /httpreqr --url 'http://192.168.0.16:18080/WebGoat/SqlInjection/assignment5a'
#docker kill java;sleep 1;docker run -id --privileged --rm -v /var/run/docker.sock:/var/run/docker.sock -v /p:/p -v /home/etrickel/tmp:/home/etrickel/tmp --network=host -e DISPLAY=$DISPLAY --name java witcher/webgoat

