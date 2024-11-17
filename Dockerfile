FROM php:8.1-cli

RUN apt-get update && apt-get install -y \
    git \
    zip \
    unzip \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app

COPY composer.json composer.lock ./
COPY src/ ./src/
COPY tests/ ./tests/
COPY phpunit.xml ./

RUN composer install --no-interaction --optimize-autoloader --no-dev

CMD ["./vendor/bin/phpunit"]