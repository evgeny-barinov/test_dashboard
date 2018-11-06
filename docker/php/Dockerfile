FROM php:7.2-fpm

RUN apt-get update && apt-get install -y --no-install-recommends apt-utils \
        openssl \
        libssl-dev \
        pkg-config \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libmcrypt-dev \
        libpng-dev \
        g++ \
        libicu-dev \
        libxslt1-dev \
        libxml2-dev \
        libc-dev \
        autoconf \
        libgeoip-dev \
    && docker-php-ext-install -j$(nproc) iconv pdo_mysql mysqli gd exif \
    intl xsl soap gettext sockets simplexml xmlwriter zip opcache \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    --with-png-dir=/usr/include/ --with-zlib-dir \
    && docker-php-ext-install -j$(nproc) gd