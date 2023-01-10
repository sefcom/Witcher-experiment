FROM witcherfuzz/phpwebfuzz

RUN apt-get update

# RUN apt-get install -y php php-cli php-gd php-curl php-mysql php-ldap php-zip php-fileinfo php-fpm

RUN apt-get install -y nginx

ADD loginsystem/loginsystem /var/www/html
RUN chown www-data /var/www/html -R

RUN rm -f /etc/nginx/sites-enabled/default
ADD nginx.conf /etc/nginx/sites-enabled/loginsystem

ADD entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh


ADD ./exploit.py /exploit.py

WORKDIR /home/wc
COPY lib_mysqludf_sys/install.sh lib_mysqludf_sys/lib_mysqludf_sys.sql ./
COPY lib_mysqludf_sys/lib_mysqludf_sys.so /usr/lib/mysql/plugin/
RUN chmod 500 install.sh
RUN bash install.sh

RUN rm -f /var/run/mysqld/mysqld.sock.lock

ARG USE_INSTRUMENTED
COPY app_instrumented /root/app_instrumented

ADD ["loginsystem/SQL File/loginsystem.sql", "/tmp/loginsystem.sql"]
COPY init-loginmgmt.sh /root/init-loginmgmt.sh
RUN chmod +x /root/init-loginmgmt.sh && /root/init-loginmgmt.sh



EXPOSE 80

ENTRYPOINT ["supervisord"]
