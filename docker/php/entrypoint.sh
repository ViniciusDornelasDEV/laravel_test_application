#!/bin/bash

# Instala as dependências se necessário (opcional)
composer install --no-interaction --prefer-dist --optimize-autoloader

# Espera o MySQL subir (importante para evitar erro de conexão)
until php artisan migrate --force; do
  echo "Waiting for MySQL to be ready..."
  sleep 2
done

# Sobe o servidor
php artisan serve --host=0.0.0.0 --port=8000
