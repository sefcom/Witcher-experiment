#!/usr/bin/env bash

thepwd=$(pwd)
cd /app
sudo cp -r ${thepwd}/code/. .

sudo chown www-data:staff -R .

cd -



