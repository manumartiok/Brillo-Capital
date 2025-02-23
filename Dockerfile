# Usamos una imagen base con PHP 8.1
FROM php:8.1-fpm

# Instalamos dependencias necesarias
RUN apt-get update && apt-get install -y libpng-dev libjpeg-dev libfreetype6-dev zip git && \
    docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install gd pdo pdo_mysql

# Instalamos Composer para manejar dependencias de PHP
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Establecemos el directorio de trabajo
WORKDIR /var/www

# Copiamos el archivo composer.json y ejecutamos Composer install
COPY composer.json composer.lock /var/www/
RUN composer install --no-autoloader

# Copiamos el resto del código del proyecto
COPY . /var/www

# Establecemos permisos para las carpetas de almacenamiento y caché
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# Exponemos el puerto 80
EXPOSE 80

# Comando para ejecutar el servidor de Laravel
CMD ["php-fpm"]
