FROM bkuhl/laravel-fpm-nginx:8

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN apk add --no-cache \
		$PHPIZE_DEPS \
		openssl-dev \
        libressl-dev \
    pkgconfig \
    mongo-c-driver-dev\
    && apk add bash

RUN pecl install mongodb
RUN docker-php-ext-enable mongodb

# Add default virtualhost
# Still needs work
COPY ./docker/config/default.conf /etc/nginx/conf.d/default.conf

COPY ./docker/config/php.ini /usr/local/etc/php/php.ini

WORKDIR /var/www/html

# Copy the application files to the container
ADD --chown=www-data:www-data  . /var/www/html

USER www-data

USER root
