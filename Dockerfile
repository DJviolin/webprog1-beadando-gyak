FROM php:8.4.6-apache-bookworm

COPY ./src /var/www/html

RUN set -e \
	&& mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini" \
	&& docker-php-ext-install \
		pdo \
		pdo_mysql \
    && a2enmod rewrite \
	&& chown -R www-data:www-data /var/www/html
