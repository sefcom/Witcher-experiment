#!/usr/bin/env bash

echo "Deleting sessions"
sudo find /tmp -name 's???_*' -delete

echo "Dropping DB"

echo "drop database openemr " | sudo mysql

if [[ $? -ne 0 ]];then

    echo "Error with DB DROP"
    exit 33

fi

echo "DB Dropped, reloading data"
sudo mysql < /db.sql

if [[ $? -ne 0 ]];then

    echo "Error with DB LOAD"
    exit 34

fi

echo "DB reload completed"

