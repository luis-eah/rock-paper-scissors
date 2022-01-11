FROM php:8.1-apache

ENV PHP_VERSION=8.1

RUN curl -sSk https://getcomposer.org/installer | php -- --disable-tls && \
       mv composer.phar /usr/local/bin/composer

RUN apt-get update
RUN apt-get -y install software-properties-common
# RUN add-apt-repository ppa:ondrej/php

RUN apt-get update -yqq && apt-get install -yq --no-install-recommends \
    apt-utils \
    apt-transport-https \
    curl \
    gnupg2 \
    wget \
    # php$PHP_VERSION-zip\
    unzip \
    zip \
    gzip

WORKDIR /var/www/


# COPY src/ /var/www/html/

