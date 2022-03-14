FROM php:8.0-apache

# NOT WORK
# RUN apt update
# RUN apt install -y g++ libicu-dev libpq-dev libzip-dev zip zlib1g-dev
# RUN docker-php-ext-install intl apache pdo pdo_pgsql pgsql

ARG PORT
ENV PORT ${PORT}
# ref: https://qiita.com/nju33/items/fc85dc8071c99015bc92
ENV COMPOSER_ALLOW_SUPERUSER 1
ENV COMPOSER_NO_INTERACTION 1

RUN apt update \
        && apt install -y \
            g++ \
            libicu-dev \
            libpq-dev \
            libzip-dev \
            zip \
            zlib1g-dev \
            postgresql-client \
            libgmp-dev \
            npm \
        && docker-php-ext-install \
            intl \
            opcache \
            pdo \
            pdo_pgsql \
            pgsql \
            gmp

# SSL有効化
# RUN a2enmod ssl


WORKDIR /var/www/push_app

RUN npm install
RUN a2enmod rewrite
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install
RUN composer require minishlink/web-push

# Heroku利用のためのソースコピー
COPY ./src /var/www/push_app
COPY ./scripts /var/www/push_app/scripts
COPY ./apache/default.conf /etc/apache2/sites-enabled/000-default.conf

RUN rm -f /etc/apache2/mpm_event.*
RUN sed -i "s/Listen 80/Listen ${PORT:-80}/g" /etc/apache2/ports.conf
RUN sed -i "s/Listen 80/Listen ${PORT:-80}/g" /etc/apache2/apache2.conf
RUN sed -i "s/VirtualHost \*:80/VirtualHost \*:${PORT:-80}/g" /etc/apache2/sites-enabled/000-default.conf

CMD bash -c "./scripts/init_db.sh && ./scripts/run_server.sh"