FROM php:7.3-fpm

RUN apt-get update && apt-get install -y lighttpd

COPY docker/lighttpd/lighttpd.conf /etc/lighttpd/lighttpd.conf
COPY docker/lighttpd/vhost.conf /etc/lighttpd/conf-enabled/10-simple-vhost.conf

RUN lighty-enable-mod fastcgi
RUN lighty-enable-mod fastcgi-php

COPY docker/lighttpd/fastcgi.conf /etc/lighttpd/conf-enabled/15-fastcgi-php.conf

RUN mkdir -p /run/lighttpd/
RUN chown www-data. /run/lighttpd/

EXPOSE 80

CMD php-fpm -D && lighttpd -D -f /etc/lighttpd/lighttpd.conf
