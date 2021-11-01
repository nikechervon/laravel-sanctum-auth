FROM phpdockerio/php80-fpm

WORKDIR /var/www

# Fix debconf warnings upon build
ARG DEBIAN_FRONTEND=noninteractive

# Install selected extensions and other stuff
RUN apt-get update \
    && apt-get -y --no-install-recommends install php8.0-pgsql php8.0-mysql php8.0-redis \
    && apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

RUN chown 777 -Rf /var/www
