#! /bin/bash

java -XX:+UseSerialGC -jar /webgoat-server-8.1.0.jar --server.address=0.0.0.0 --server.port=18080 &
pid=$!
/wait-for-tcp 127.0.0.1 9001
/wait-for-tcp 127.0.0.1 18080

#thisip=$(ifconfig eth0|egrep -oh "inet [0-9\.]+" |cut -d " " -f2)

set -e

# register
curl "http://127.0.0.1:18080/WebGoat/register.mvc"  --data-raw 'username=erikt2&password=erikt2&matchingPassword=erikt2&agree=agree' 2>&1 

#login test
curl -vv 'http://127.0.0.1:18080/WebGoat/login' --data-raw 'username=erikt2&password=erikt2' 2>&1 |grep welcome.mvc

kill $pid 

echo "export NODE_PATH=/home/wc/node_modules" >> /home/wc/.bashrc 
