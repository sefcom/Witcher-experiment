#!/bin/bash


if [ ${USE_INSTRUMENTED} == 1 ]; then
    cp -a /app/hms /root/hms_orig
    cp -a /root/app_instrumented/. /app/hms
    chown -R www-data:www-data /app
fi

/usr/bin/pidproxy /var/run/mysqld/mysqld.pid /usr/sbin/mysqld &
mysql_pid=$!

until mysqladmin ping >/dev/null 2>&1; do
  echo -n "."; sleep 0.2
  ps -ef |grep mysql
done

mysql < /tmp/db.preseed

if test $? -ne 0; then
	echo "ERROR: Failed to install das DB"
	exit 1
else
	echo "DAS DB installed"
fi

kill $mysql_pid
wait $mysql_pid
