FROM puppeteer1337/cve-2020-5192

# RUN apt-get update && apt-get install -y libmysqld-dev tzdata
COPY --chown=wc:wc index.php  /app/
COPY run.sh example.sql /

RUN chmod +x /run.sh

RUN rm /var/run/mysqld/mysqld.sock.lock

CMD /run.sh
