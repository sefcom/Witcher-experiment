
FROM webcam/php7
MAINTAINER tricke

#Hospital
COPY code/hospital /app
RUN chown www-data:www-data /app -R && find /app -type d -exec chmod 775 {} \; ; find /app -type f -exec chmod 664 {} \;

RUN usermod -a -G www-data wc
RUN mkdir /test
COPY sifter_data.json /test/
COPY test_data.json /test/

RUN chown wc:wc /test -R

COPY hms.sql /db.sql
COPY install_db.sh /install_db.sh
RUN chmod +x /install_db.sh && /install_db.sh

COPY supervisord.conf /etc/supervisord.conf

CMD /netconf.sh && /usr/bin/supervisord

