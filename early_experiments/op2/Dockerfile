
FROM webcam/php7
MAINTAINER tricke

COPY testdb.sql /db.sql
COPY install_db.sh /install_db.sh
RUN chmod +x /install_db.sh && /install_db.sh

COPY --chown=www-data:www-data code /app
#RUN chown www-data:www-data /app -R  # && find /app -type d -exec chmod 775 {} \; ; find /app -type f -exec chmod 664 {} \;

RUN usermod -a -G www-data wc
RUN mkdir /test
COPY --chown=wc:wc sifter_data.json /test/
COPY --chown=wc:wc test_data.json /test/
COPY --chown=wc:wc set_session_login.sh /test/

RUN chown wc:wc /test /app

COPY --chown=wc:wc php.ini /usr/local/lib/php.ini

COPY supervisord.conf /etc/supervisord.conf

CMD /netconf.sh && /usr/bin/supervisord

