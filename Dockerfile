FROM php:7.2-apache

# Instala las dependencias necesarias
RUN apt-get update && apt-get install -y \
    libpq-dev \
    curl \
    unzip

# Instala las extensiones PHP necesarias
RUN docker-php-ext-install pdo pdo_mysql

RUN apt-get install  mariadb-server -y
# Habilita el módulo de Apache necesario para permitir reescritura de URL
RUN a2enmod rewrite

# Habilita el módulo de Apache necesario para configurar las cabeceras CORS
RUN a2enmod headers

# Configura las cabeceras CORS en el archivo de configuración de Apache
RUN echo "Header set Access-Control-Allow-Origin '*'" >> /etc/apache2/apache2.conf

# Reinicia el servicio de Apache
RUN service apache2 restart

# Expone el puerto 80 para el servidor web
EXPOSE 80
EXPOSE 3306
VOLUME ["/var/www/html"]
# Inicia el servidor Apache
CMD ["apache2-foreground"]
