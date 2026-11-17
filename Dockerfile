# Site PHP de l'ASETAR08 servi par Apache.
# La base est configurée par les variables DB_HOST, DB_NAME, DB_USER, DB_PASSWORD.
FROM php:8.3-apache

RUN docker-php-ext-install pdo_mysql

# Comme chez l'hébergeur : tampon de sortie, sinon session_start() dans Header.php
# échoue (« headers already sent »).
RUN echo "output_buffering=4096" > "$PHP_INI_DIR/conf.d/asetar.ini"

COPY . /var/www/html/

# Les images envoyées depuis l'admin sont écrites dans images/ (monter un volume dessus).
RUN chown -R www-data:www-data /var/www/html/images

EXPOSE 80
