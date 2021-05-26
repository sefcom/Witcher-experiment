
FROM puppeteer1337/java

COPY --chown=wc:wc webgoat-server-8.1.0.jar /
COPY wait-for-tcp /
COPY run1.sh /
COPY db_setup.sh / 
COPY javafilters.dat /app/javafilters.dat
RUN /db_setup.sh

COPY supervisord.conf /etc/supervisord.conf

CMD /usr/bin/supervisord; /bin/bash


