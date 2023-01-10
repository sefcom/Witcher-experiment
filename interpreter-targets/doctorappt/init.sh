#!/bin/bash

/usr/bin/pidproxy /var/run/mysqld/mysqld.pid /usr/sbin/mysqld &
mysql_pid=$!

until mysqladmin ping >/dev/null 2>&1; do
  echo -n "."; sleep 0.2
  ps -ef |grep mysql
done

mysql < /tmp/das.sql

if test $? -ne 0; then
	echo "ERROR: Failed to install das DB"
	exit 1
else
	echo "DAS DB installed"
fi

kill $mysql_pid
wait $mysql_pid