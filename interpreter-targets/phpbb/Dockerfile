FROM puppeteer1337/php7

ADD quickinstall /app/

RUN chown www-data -R /app/

COPY entrypoint.sh /entrypoint.sh
RUN chmod 0755  /entrypoint.sh

COPY test_config.sqldump /test_config.sqldump

ENTRYPOINT /entrypoint.sh