#!/bin/sh


/usr/bin/pidproxy /var/run/mysqld/mysqld.pid /usr/sbin/mysqld &
mysql_pid=$!

until mysqladmin ping >/dev/null 2>&1; do
  echo -n "."; sleep 0.2
  ps -ef |grep mysql
done



/helpers/wait-for-tcp 127.0.0.1 3306

mysql < /home/rconfig/dump.sql

echo "update settings set timezone = 'America/Phoenix';" | mysql db

python3 /codecov_conversion.py &


# Start php
/etc/init.d/php7.3-fpm start

# Start nginx
nginx -g 'daemon off;'


kill $mysql_pid
wait $mysql_pid