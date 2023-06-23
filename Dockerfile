FROM php:7.3.1

RUN sed -i -e 's/deb.debian.org/archive.debian.org/g' \
           -e 's|security.debian.org|archive.debian.org/|g' \
           -e '/stretch-updates/d' /etc/apt/sources.list

RUN apt-get update -y && apt-get install -y openssl zip unzip git
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN docker-php-ext-install pdo

WORKDIR /app
COPY .env.example .env
COPY . /app

RUN docker-php-ext-install pdo pdo_mysql mysqli

RUN composer update
RUN composer install

CMD php artisan key:generate
CMD php artisan migrate
CMD php artisan serve --host=0.0.0.0 --port=3002
EXPOSE 3002
