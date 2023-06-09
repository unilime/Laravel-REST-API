FROM php:7.3-fpm

RUN apt-get update && apt-get upgrade -y \
	&& apt-get install -y apt-utils

RUN apt-get update && apt-get install -y \
	libfreetype6-dev \
	libjpeg62-turbo-dev \
	libpng-dev \
	libjpeg-dev \
	libmcrypt-dev \
	libicu-dev \
	libxml2-dev \
    libldb-dev \
    libldap2-dev \
    libxml2-dev \
    libssl-dev \
    libxslt-dev \
    libpq-dev \
    libzip-dev \
    git \
    nano \
    htop \
    libsqlite3-dev \
    libsqlite3-0 \
    libc-client-dev \
    libkrb5-dev \
    curl \
    libcurl4-openssl-dev \
    zip unzip \
	&& docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
	&& docker-php-ext-install -j$(nproc) gd \
	&& apt-get update --fix-missing \
    && apt-get -y install curl software-properties-common \
    && curl -sL https://deb.nodesource.com/setup_12.x | bash - \
    && apt-get -y install nodejs \
    && apt-get clean && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*


RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin/ --filename=composer

RUN docker-php-ext-install -j$(nproc) \
	opcache intl ftp xsl bcmath calendar ctype dom zip session json hash sockets pdo \
	mbstring tokenizer pdo_mysql pdo_sqlite mysqli exif fileinfo gettext iconv pcntl posix simplexml xml xmlwriter

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /www

RUN chown -R www-data:www-data /www

RUN apt-get clean && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*
