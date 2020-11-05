FROM php:7.2-fpm

USER root

# Copy composer.lock and composer.json
COPY composer.lock composer.json /var/www/

# Set working directory
WORKDIR /var/www

# Install dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl \
    openssl \
    nginx

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install extensions
RUN docker-php-ext-install pdo_mysql mbstring zip exif pcntl
RUN docker-php-ext-configure gd --with-gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ --with-png-dir=/usr/include/
RUN docker-php-ext-install gd

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy existing application directory contents
COPY . /var/www

# Composer and initial artisan stuff
RUN composer install --working-dir="/var/www"
RUN composer update laravel/framework --working-dir="/var/www"
RUN composer dump-autoload --working-dir="/var/www"
RUN php artisan config:clear

# Change permissions
RUN chmod +rwx /var/www
RUN chmod -R 777 /var/www

# Expose port 9000 and start php-fpm server
RUN ["chmod", "+x", "post_deploy.sh"]
EXPOSE 80

CMD [ "sh", "./post_deploy.sh" ]