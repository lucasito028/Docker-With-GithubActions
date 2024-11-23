FROM php:8.0-apache

# Habilitar o mod rewrite para permitir o funcionamento do PHP
RUN a2enmod rewrite

# Instalar dependências para conectar com MySQL
RUN apt-get update && apt-get install -y libzip-dev && docker-php-ext-install pdo pdo_mysql zip

COPY . /var/www/html/

# Expor a porta 80 para o acesso ao servidor web
EXPOSE 80