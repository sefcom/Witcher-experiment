#!/bin/sh

sudo service mysql start

/helpers/wait-for-tcp 127.0.0.1:3306

mysql -e "CREATE DATABASE oscommerce;"
mysql -e "ALTER USER 'root'@'localhost' IDENTIFIED BY 'root'";
sudo service mysql stop

sleep 5

pkill -9 -f mysql



supervisord;
