
FROM witcher
MAINTAINER tricke

COPY testdb.sql /db.sql
COPY install_db.sh /install_db.sh
RUN chmod +x /install_db.sh && /install_db.sh

COPY --chown=www-data:www-data code /app
#RUN chown www-data:www-data /app -R  # && find /app -type d -exec chmod 775 {} \; ; find /app -type f -exec chmod 664 {} \;

#COPY config/php.ini /etc/php/7.3/apache2/php.ini
#COPY config/php.ini /etc/php/7.3/cli/php.ini

CMD /netconf.sh && /usr/bin/supervisord

