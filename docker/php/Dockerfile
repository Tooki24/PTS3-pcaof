FROM php:8-fpm

RUN apt-get -y update \
&& apt-get install -y libicu-dev unzip \
&& docker-php-ext-configure intl \
&& docker-php-ext-install intl

# Modules pour utiliser MySQL
RUN docker-php-ext-install mysqli pdo_mysql

# Installer composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php composer-setup.php
RUN php -r "unlink('composer-setup.php');"
RUN mv composer.phar /usr/local/bin/composer

# Installer la CLI Symfony
RUN curl -sS https://get.symfony.com/cli/installer | bash
RUN  mv /root/.symfony/bin/symfony /usr/local/bin/symfony
