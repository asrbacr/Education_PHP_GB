FROM php:8.2-fpm

COPY ./php.ini /usr/local/etc/php/conf.d/php-custom.ini
COPY ./mywww.conf /usr/local/etc/php-fpm.d/mywww.conf

WORKDIR /data

VOLUME /data

CMD ["php-fpm"]
