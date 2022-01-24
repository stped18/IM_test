FROM php:8.0.5
RUN apt-get update -y && apt-get install -y openssl zip unzip git
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
WORKDIR /app
COPY . /app
RUN composer install
RUN composer require laravelcollective/html
RUN composer require google/cloud-translate
CMD php artisan serve --host=0.0.0.0 --port=8080
EXPOSE 8080
