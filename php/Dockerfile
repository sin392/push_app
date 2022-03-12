FROM php:8.0-apache

# NOT WORK
# RUN apt update
# RUN apt install -y g++ libicu-dev libpq-dev libzip-dev zip zlib1g-dev
# RUN docker-php-ext-install intl apache pdo pdo_pgsql pgsql

RUN apt update \
        && apt install -y \
            g++ \
            libicu-dev \
            libpq-dev \
            libzip-dev \
            zip \
            zlib1g-dev \
            postgresql-client \
        && docker-php-ext-install \
            intl \
            opcache \
            pdo \
            pdo_pgsql \
            pgsql

# SSL有効化
# RUN a2enmod ssl

WORKDIR /var/www/push_app

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
