FROM phpearth/php:7.4-nginx

# install composer from official image
COPY --from=composer /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# install composer dependencies
COPY ./composer.lock composer.lock
COPY ./composer.json composer.json
RUN composer install --no-scripts --no-autoloader --no-dev

# copy project files
COPY . .

# copy example files
RUN cp -p examples/* ./html

# generate autoload files
RUN composer dump-autoload --optimize