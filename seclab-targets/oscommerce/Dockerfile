FROM puppeteer1337/php7

ADD oscommerce2/ /app/

RUN chmod -R 0777 /app/
COPY modified_code/admin_includes_application_top.php /app/admin/includes/application_top.php
COPY modified_code/includes_application_top.php /app/includes/application_top.php


COPY entrypoint.sh /entrypoint.sh

RUN chmod 0755  /entrypoint.sh

ENTRYPOINT /entrypoint.sh