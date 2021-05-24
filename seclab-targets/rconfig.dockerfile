FROM puppeteer1337/php7

RUN apt-get update && apt-get install -y php-fpm nginx php-mysql

ADD rconfig /home/rconfig
RUN chown www-data /home/rconfig -R

RUN rm -f /etc/nginx/sites-enabled/default
ADD nginx.conf /etc/nginx/sites-enabled/rconfig

COPY php.ini /etc/php/7.2/fpm/php.ini

ADD entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh

ADD exploit.py /exploit.py

COPY libcgiwrapper.so /lib/libcgiwrapper.so


EXPOSE 8080:8080

ENTRYPOINT /entrypoint.sh
