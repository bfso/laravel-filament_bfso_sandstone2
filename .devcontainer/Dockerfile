FROM mcr.microsoft.com/devcontainers/php:1-8.2-bullseye

# Install MariaDB client
RUN apt-get update && export DEBIAN_FRONTEND=noninteractive \
    && apt-get install -y mariadb-client libicu-dev libzip-dev zip \
    && apt-get clean -y && rm -rf /var/lib/apt/lists/*

# Install php-mysql driver
RUN docker-php-ext-configure intl
RUN docker-php-ext-install mysqli pdo pdo_mysql intl zip

# Enable php extensions
RUN docker-php-ext-enable intl zip

# Disable xdebug
RUN mv /usr/local/etc/php/conf.d/xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini.disabled
