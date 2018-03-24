FROM php:fpm

LABEL maintainer "Artem Bondarchuk <arzek2015@gmail.com>"

RUN apt-get update &&\
    apt-get install --no-install-recommends --assume-yes --quiet ca-certificates curl git zlib1g-dev  &&\
    rm -rf /var/lib/apt/lists/*



RUN docker-php-ext-install zip
RUN apt-get update && apt-get install -y libpq-dev && docker-php-ext-install pdo pdo_pgsql
