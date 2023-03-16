# FROM php:latest as php

# RUN apt-get update -y
# RUN apt-get install -y unzip libmariadb-dev libpq-dev libcurl4-gnutls-dev
# RUN docker-php-ext-install pdo pdo_mysql bcmath

# RUN pecl install -o -f redis \
#     && rm -rf /tmp/pear \
#     && docker-php-ext-enable redis \
#     && docker-php-ext-enable pdo pdo_mysql bcmath

# WORKDIR /var/www
# COPY . .

# # Install composer
# RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# ENV PORT=8000
# ENTRYPOINT [ "Docker/entrypoint.sh" ]


# # Node

# FROM node:14-alpine as node

# WORKDIR /var/www
# COPY . .

# RUN npm install --global cross-env
# RUN npm install 

# VOLUME [ "/var/www/node_modules" ]

FROM php:8.1.0-fpm-alpine

RUN apt-get update -y
RUN apt-get install -y unzip libmariadb-dev libpq-dev libcurl4-gnutls-dev
RUN docker-php-ext-install pdo pdo_mysql bcmath

RUN pecl install -o -f redis \
    && rm -rf /tmp/pear \
    && docker-php-ext-enable redis \
    && docker-php-ext-enable pdo pdo_mysql bcmath

WORKDIR /var/www
COPY . .


# Install Composer dependencies
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && composer install --no-dev --no-scripts --prefer-dist --no-autoloader --no-progress --no-suggest \
    && composer dump-autoload --no-dev --optimize --classmap-authoritative \
    && chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage /var/www/html/bootstrap/cache

ENV PORT=8000
ENTRYPOINT [ "Docker/entrypoint.sh" ]


# Node

FROM node:14-alpine as node

WORKDIR /var/www
COPY . .

RUN npm install --global cross-env
RUN npm install 

VOLUME [ "/var/www/node_modules" ]
