FROM php:8.3-cli

# Instala dependências do sistema
RUN apt-get update && apt-get install -y \
    zip unzip git curl libpng-dev libonig-dev libxml2-dev \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

EXPOSE 8000

COPY ./docker/php/entrypoint.sh /entrypoint.sh
CMD ["/entrypoint.sh"]

