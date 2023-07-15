FROM php:8.2.7-fpm-alpine3.18

RUN apk update && \
    apk add --no-cache \
    nodejs \
    npm

RUN docker-php-ext-install pdo pdo_mysql

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app

COPY . .

RUN composer install --no-interaction --no-dev --optimize-autoloader

RUN npm install && npm run build

RUN chmod +x entrypoint.sh

ENTRYPOINT [ "sh", "./entrypoint.sh" ]
