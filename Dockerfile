# Use the official PHP image as a base image
FROM php:7.4-apache

# Install necessary PHP extensions
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Copy the CodeIgniter project files to the container
COPY . /var/www/html/

# Set the working directory
WORKDIR /var/www/html/

# Set the correct permissions for the web server
RUN chown -R www-data:www-data /var/www/html

# Expose port 80
EXPOSE 80

# Start Apache server
CMD ["apache2-foreground"]
     