# FROM ubuntu:18.04
#FROM puppeteer1337/php7
FROM witcher/phpwebfuzz

ARG USE_INSTRUMENTED
#ENV USE_INSTRUMENTED=$USE_INSTRUMENTED
#FROM witcher/php7
ENV DEBIAN_FRONTEND="noninteractive"
ENV TZ="Etc/UTC"
#RUN apt-get update && apt-get install -y sudo  php7.2-mysql

# Install OpenEMR
RUN wget https://sourceforge.net/projects/openemr/files/OpenEMR%20Ubuntu_debian%20Package/5.0.1/openemr-php7_5.0.1-2_all.deb/download -O /openemr-php7_5.0.1-2_all.deb
RUN dpkg -i /openemr-php7_5.0.1-2_all.deb || true
RUN apt-get update && apt-get install -y -f

# copy over with instrumented version
COPY --chown=www-data:www-data openemr_instrumented /var/www/openemr_instrumented

# Forget about the PHP installed with apt-get
#RUN a2dismod php7.4

# (Auto) Configure OpenEMR
WORKDIR /var/www/openemr
COPY etc/scripts/* /var/www/openemr/
COPY etc/scripts/utilities/* /root/
RUN echo "USE_INSTRUMENTATION=${USE_INSTRUMENTED} $USE_INSTRUMENTED " && sleep 5
RUN chmod 777 /var/www/openemr_instrumented -R
RUN chmod 500 autoconfig.sh /root/unlock_admin.sh
COPY --chown=www-data:www-data etc/globals.php /var/www/openemr/interface/globals.php

RUN chmod 0755 /root/run_setup.sh

WORKDIR /var/www

RUN /root/run_setup.sh

WORKDIR /var/www/openemr

CMD /usr/local/bin/supervisord -c /etc/supervisord.conf
