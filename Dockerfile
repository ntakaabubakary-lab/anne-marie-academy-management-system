FROM php:8.2-apache
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
RUN apt-get update && apt-get install -y libicu-dev && docker-php-ext-install intl mysqli pdo pdo_mysql && rm -rf /var/lib/apt/lists/*
RUN a2enmod rewrite
WORKDIR /var/www/html
COPY composer.json composer.lock* ./
RUN composer install --no-dev --optimize-autoloader --no-interaction
COPY . /var/www/html/
RUN chown -R www-data:www-data /var/www/html && chmod -R 755 /var/www/html
RUN printf '<Directory /var/www/html/public>\n AllowOverride All\n Require all granted\n</Directory>\n' > /etc/apache2/conf-available/codeigniter.conf && a2enconf codeigniter
RUN sed -i 's#DocumentRoot /var/www/html#DocumentRoot /var/www/html/public#' /etc/apache2/sites-available/000-default.conf
EXPOSE 80
