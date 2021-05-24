#! /bin/sh

cd /home/wc
npm install fuzzyset

cd /tmp
wget https://github.com/WebGoat/WebGoat/releases/download/v8.1.0/webgoat-server-8.1.0.jar

cp /p/Witcher/java/tests/WebGoat/witcher_config.json /tests
thisip=$(ifconfig eth0|egrep -oh "inet [0-9\.]+" |cut -d " " -f2)
# register
curl "http://${thisip}:18080/WebGoat/register.mvc" \
  -H 'Connection: keep-alive' \
  -H 'Cache-Control: max-age=0' \
  -H 'Upgrade-Insecure-Requests: 1' \
  -H "Origin: http://${thisip}:18080" \
  -H 'Content-Type: application/x-www-form-urlencoded' \
  -H 'User-Agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36' \
  -H 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9' \
  -H 'Referer: http://${thisip}:18080/WebGoat/registration' \
  -H 'Accept-Language: en-US,en;q=0.9' \
  -H 'Cookie: JSESSIONID=LwNnO_pEaleeW28zhI9IbBuYHTvtY7_BdAGiONJm; ONA_SESSION_ID=34qdoqdcg1kjeih1n7up8f86kb' \
  --data-raw 'username=erikt2&password=erikt2&matchingPassword=erikt2&agree=agree' \
  --compressed \
  --insecure


echo "export NODE_PATH=/home/wc/node_modules" >> /home/wc/.bashrc 
