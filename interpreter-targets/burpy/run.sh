service mysql start;
mysql -u root < /example.sql
service mysql stop;

tail -f  /var/log/apache2/error.log &

supervisord
