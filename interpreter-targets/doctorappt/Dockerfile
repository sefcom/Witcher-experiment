FROM witcherfuzz/phpwebfuzz

ARG USE_INSTRUMENTED

COPY das_instrumented /root/app_instrumented

ENV TZ=America/Los_Angeles
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone
RUN apt-get update
RUN apt-get install --yes python3 python3-pip software-properties-common apache2 mysql-server mysql-client

COPY das_instrumented /var/www/html/das
RUN chown -R www-data:www-data /var/www/html/das
COPY das/das.sql /tmp/das.sql
COPY init.sh /tmp/init.sh
COPY exploit.py /exploit.py

WORKDIR /home/wc
COPY lib_mysqludf_sys/install.sh lib_mysqludf_sys/lib_mysqludf_sys.sql ./
COPY lib_mysqludf_sys/lib_mysqludf_sys.so /usr/lib/mysql/plugin/
RUN chmod 500 install.sh
RUN bash install.sh

RUN if [ ${USE_INSTRUMENTED} == 1 ]; then mv /var/www/html/das /root/das_orig; cp -a /root/app_instrumented /var/www/html/das; chown www-data:www-data /var/www/html/das; fi

EXPOSE 80
RUN bash "/tmp/init.sh"
CMD ["supervisord"]
