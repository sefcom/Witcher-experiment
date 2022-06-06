#!/usr/bin/env bash

if [ ${USE_INSTRUMENTED} == 1 ]; then
    cp -a /app /root/lms_orig
    cp -a /root/app_instrumented/. /app
    chown -R www-data:www-data /app
fi

/usr/bin/pidproxy /var/run/mysqld/mysqld.pid /usr/sbin/mysqld &
mysql_pid=$!

until mysqladmin ping >/dev/null 2>&1; do
  echo -n "."; sleep 0.2
  ps -ef |grep mysql
done

mysql -e "CREATE DATABASE loginsystem;"
mysql -D loginsystem < /tmp/loginsystem.sql

if test $? -ne 0; then
	echo "ERROR: Failed to install DB"
	exit 1
else
	echo "DB installed"
fi

kill $mysql_pid
wait $mysql_pid

rm -f /tmp/loginsystem.sql