FROM php:8.3.4-fpm
WORKDIR /usr/local/src/products

RUN apt-get update && \
    apt-get install -y --no-install-recommends \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libpq-dev \
    libzip-dev && \
    apt-get install -y \
    git \
    unzip \
    zip \
    sqlite3 \
    openssh-client \
    default-mysql-client && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/*

RUN chown -R www-data:www-data .
RUN docker-php-ext-install pdo pdo_mysql sockets bcmath zip pcntl posix
RUN pecl install redis
RUN pecl install xdebug
RUN docker-php-ext-enable xdebug
COPY . .
RUN chmod +x ./wait-for-it.sh
COPY ./docker/dev.ini /usr/local/etc/php/conf.d/dev.ini

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer install
RUN chown -R www-data:www-data .
USER root
