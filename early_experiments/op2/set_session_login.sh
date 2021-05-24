#! /bin/bash

if [[ -z ${1} ]];then
    echo "Error missing target location ip:port"
    exit 190
fi 

sudo chmod o+r /var/lib/php/sessions; sudo chmod 640 /var/lib/php/sessions/*

curl -v -k -X "http://${1}/"

for x in {0..10}; do

  timeout 1s /usr/bin/curl -s -k -L -b /tmp/cookies.txt -X $'POST' -H $'Content-Length: 107' --data-binary $'new_login_session_management=1&authProvider=TroubleMaker&authUser=admin&clearPass=password&languageChoice=1' "http://${1}/interface/main/main_screen.php?auth=login&site=default"
  src=$(ls -t /var/lib/php/sessions/|head -1)
  sudo chmod 640 /var/lib/php/sessions/*
  if grep '"admin";authPass' /var/lib/php/sessions/${src}; then
      break
  fi

done


echo "OpenEMR=$(echo $src | cut -d"_" -f2);" > /tmp/cookies.txt
curl -v -b /tmp/cookies.txt -v -k -X $'GET' -b "OpenEMR=$(echo $src | cut -d"_" -f2);" "http://${1}/interface/patient_file/summary/demographics.php?set_pid=2"

if [[ -z ${2} ]];then
   sessid="1anv2aurbl0gl0fmntcjirel2d"
   cp /var/lib/php/sessions/${src} /tmp/save_${sessid}
   cp /var/lib/php/sessions/${src} /tmp/sess_${sessid}

   echo "Writing out session sess_${sessid} with size of $(wc -c /tmp/sess_${sessid})"

else

   for cnt in $(seq ${2}|tr "\n" " "); do
       sessid=$(echo "00$(hexdump -n 12 -e '12/1 "%02x" 1 "\n"' /dev/urandom)")
       cp /var/lib/php/sessions/${src} /tmp/save_${sessid}
       cp /var/lib/php/sessions/${src} /tmp/sess_${sessid}
       echo "Writing out session sess_${sessid}"
   done
fi




