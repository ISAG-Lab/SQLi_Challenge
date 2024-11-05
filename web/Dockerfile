# Use the official PHP image with Apache
FROM php:7.4-apache

# Enable mysqli extension
RUN docker-php-ext-install mysqli

# Copy website files
COPY . /var/www/html/

# Set proper permissions
RUN chown -R www-data:www-data /var/www/html
