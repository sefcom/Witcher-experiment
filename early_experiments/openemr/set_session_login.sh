#! /bin/bash

if [[ -z ${1} ]];then
    echo "Error missing target location ip:port"
    exit 190
fi 

sudo chmod o+r /var/lib/php/sessions; sudo chmod 640 /var/lib/php/sessions/*

# let's wait for apache and mysql before attempting to login
for x in $(seq 12); do if pgrep -f /usr/sbin/apache2 > /dev/null; then if pgrep -f mysql > /dev/null; then break; else echo "Waiting for mysql..."; sleep 5; fi; else echo "Waiting for Apache..."; sleep 5; fi; done

for x in $(seq 12); do
    testerval=$(echo "select count(*) from users" |sudo mysql openemr)
    if [[ -z $testerval ]]; then
        echo "Got result $testerval from DB, sleeping for 5, maybe it'll wakey"
        sleep 5
    fi
done

curl -s "http://${1}/"
found=false;
for x in {0..10}; do

  timeout 1s /usr/bin/curl -s -L -b /tmp/cookies.txt -X $'POST' -H $'Content-Length: 107' --data-binary $'new_login_session_management=1&authProvider=TroubleMaker&authUser=admin&clearPass=password&languageChoice=1' "http://${1}/interface/main/main_screen.php?auth=login&site=default" > /tmp/lastlogin.dat
  src=$(ls -t /var/lib/php/sessions/|head -1)
  sudo chmod 640 /var/lib/php/sessions/*
  if grep '"admin";authPass' /var/lib/php/sessions/${src} >> /tmp/lastlogin.dat; then
      found=true
      break
  fi

done

if [[ $found == false ]];then
    /usr/bin/curl -v -s -L -b /tmp/cookies.txt -X $'POST' -H $'Content-Length: 107' --data-binary $'new_login_session_management=1&authProvider=TroubleMaker&authUser=admin&clearPass=password&languageChoice=1' "http://${1}/interface/main/main_screen.php?auth=login&site=default"

   echo "unable to login, ERROR, exiting. refer to /tmp/lastlogin.dat"
   exit 98
fi

echo "OpenEMR=$(echo $src | cut -d"_" -f2);" > /tmp/cookies.txt
curl -s -b /tmp/cookies.txt -X $'GET' -b "OpenEMR=$(echo $src | cut -d"_" -f2);" "http://${1}/interface/patient_file/summary/demographics.php?set_pid=2" > /tmp/setpatid.log

if [[ -z ${2} ]];then
   sessid="1anv2aurbl0gl0fmntcjirel2d"
   #cp /var/lib/php/sessions/${src} /tmp/save_${sessid}
   cp /var/lib/php/sessions/${src} /tmp/sess_${sessid}
   sudo chown wc:wc /tmp/sess_${sessid}
   echo "Writing out session sess_${sessid} with size of $(wc -c /tmp/sess_${sessid})"

   # this will cause problems if we ever go to multiple running at same time in a container
   if [[ $(ls /var/lib/php/sessions/sess_*|wc -l) -gt 60 ]]; then
       ls -t /var/lib/php/sessions/sess_* | tail -40|xargs sudo rm
   fi

else

   for cnt in $(seq ${2}|tr "\n" " "); do
       sessid=$(echo "00$(hexdump -n 12 -e '12/1 "%02x" 1 "\n"' /dev/urandom)")
       cp /var/lib/php/sessions/${src} /tmp/save_${sessid}
       cp /var/lib/php/sessions/${src} /tmp/sess_${sessid}
       sudo chown wc:wc /tmp/sess_*
       echo "Writing out session sess_${sessid}"
   done
   # this will cause problems if we ever go to multiple running at same time in a container
   if [[ $(ls /var/lib/php/sessions/sess_*|wc -l) -gt 60 ]]; then
       ls -t /var/lib/php/sessions/sess_* | tail -40|xargs sudo rm
   fi
fi




