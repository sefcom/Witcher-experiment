#!/bin/bash

export MANUAL_SETUP="no"
export MYSQL_HOST="127.0.0.1"
export MYSQL_ROOT_USER="root"
export MYSQL_ROOT_PASS="root"
export MYSQL_USER="root"
export MYSQL_PASS="root"

/usr/bin/pidproxy /var/run/mysqld/mysqld.pid /usr/sbin/mysqld &
mysql_pid=$!

until mysqladmin ping >/dev/null 2>&1; do
  echo -n "."; sleep 0.2
  ps -ef |grep mysql
done

# Permit root login without password from outside container.
#mysql -e "GRANT ALL ON *.* TO root@'%' IDENTIFIED BY '' WITH GRANT OPTION"

# create the default database from the ADDed file.
mysql < /root/cc_create.sql

mysql witchercc -e "select count(*) from page"


# ln -s /wclibs/lib_db_fault_escalator.so /usr/lib/x86_64-linux-gnu/lib_db_fault_escalator.so

service mysql start;
mysql -e "CREATE DATABASE openemr;"
mysql -e "ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY 'root';"
cd /var/www/openemr

bash autoconfig.sh

chown -R www-data:www-data /var/www/openemr/

mysql -u root -p$MYSQL_ROOT_PASS < /var/www/openemr/add_portal.sql

mysql -u root -p$MYSQL_ROOT_PASS openemr -e "INSERT INTO product_registration (email, opt_out) values (NULL, 1);"

#mysql -u root -p$MYSQL_ROOT_PASS openemr -e "INSERT into user_settings (setting_user, setting_label, setting_value) values (1, 'global:new_tabs_layout','0');"


if [ ${USE_INSTRUMENTED} == 1 ]; then
    cd /var/www
    sudo mv /var/www/openemr /var/www/oe
    sudo mv /var/www/openemr_instrumented /var/www/openemr
fi

cd /var/www/openemr
sed 's/ type="email" autocomplete="on" \/>/ type="email" autocomplete="on" value="e@mail.com" \/>/g' -i /var/www/openemr/portal/index.php

sudo chmod 777 /var/www/openemr -R

sudo chmod 777 /tmp/tmp* -R
mkdir -p /var/instr && chmod 777 /var/instr

# Tell the MySQL daemon to shutdown.
#/etc/init.d/mysql stop
echo "MYSQL pid = $mysql_pid"
ps -ef |grep mysql
kill $mysql_pid
wait $mysql_pid
ps -ef |grep mysql
# Wait for the MySQL daemon to exit.

