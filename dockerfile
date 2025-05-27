FROM php:8.1-apache

# Install necessary PHP extensions (customize if needed)
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Copy app files into Apache web root
COPY . /var/www/html

# Set permissions
RUN chown -R www-data:www-data /var/www/html

# Enable mod_rewrite (Laravel/PHP apps often need it)
RUN a2enmod rewrite

# Custom Apache config
COPY apache-config.conf /etc/apache2/sites-enabled/000-default.conf

