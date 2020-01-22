FROM php:7.4.1-fpm
WORKDIR "/application"

# Fix debconf warnings upon build
ARG DEBIAN_FRONTEND=noninteractive

# Install selected extensions and other stuff
RUN apt-get update \
    && apt-get -y --no-install-recommends install imagemagick php7.3-imagick php7.3-mysql php7.3-pgsql php7.3-sqlite nano php-redis php-bcmath php-zmq \
    && apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

COPY ./docker/php-fpm/php-ini-overrides.ini /etc/php/7.3/fpm/conf.d/99-overrides.ini
COPY ./ /application

RUN rm -rf /application/docker
