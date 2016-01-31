FROM php:5.6-cli

# Install redis
RUN pecl install redis
RUN docker-php-ext-enable redis
# Install composer
RUN php -r "readfile('https://getcomposer.org/installer');" | php && mv composer.phar /bin/composer
# Set timezone
RUN echo "date.timezone = Europe/Stockholm" >> /usr/local/etc/php/php.ini
