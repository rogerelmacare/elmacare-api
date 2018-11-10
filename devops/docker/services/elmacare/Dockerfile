FROM ubuntu:18.04

# Prepare environment
WORKDIR /var/www
ENV DEBIAN_FRONTEND noninteractive
ENV APACHE_RUN_USER www-data
ENV APACHE_RUN_GROUP www-data
ENV APACHE_LOG_DIR /var/log/apache2
ENV APACHE_PID_FILE /var/run/apache2.pid
ENV APACHE_RUN_DIR /var/run/apache2
ENV APACHE_LOCK_DIR /var/lock/apache2
ENV SHELL /bin/bash
ENV APP_ENV dev
ENV NODE_ENV dev


# Update the package repository
RUN apt-get update && apt-get install -y software-properties-common wget curl git tzdata iputils-ping locales zip unzip

# Configure timezone and locale
RUN echo "Europe/Madrid" > /etc/timezone
RUN export LANGUAGE=es_ES.UTF-8 && export LANG=es_ES.UTF-8 && export LC_ALL=es_ES.UTF-8 && locale-gen es_ES.UTF-8 && dpkg-reconfigure -f noninteractive tzdata locales

RUN LC_ALL=es_ES.UTF-8 add-apt-repository -y ppa:ondrej/php
RUN apt-get update

# Install dependencies
RUN apt-get install -y \
    apache2 \
    php7.2 \
    libapache2-mod-php7.2 \
    php7.2-cli \
    php7.2-common \
    php7.2-mbstring \
    php7.2-gd \
    php7.2-intl \
    php7.2-xml \
    php7.2-mysql \
    php7.2-soap \
    php7.2-zip \
    php7.2-memcached \
    php7.2-curl \
    php7.2-dev \
    php7.2-igbinary \
    php7.2-redis \
    php7.2-xdebug \
    php-apcu

# Add PHP configurations
ADD templates/xdebug.ini /etc/php/7.2/mods-available/xdebug.ini
ADD templates/apcu.ini /etc/php/7.2/mods-available/apcu.ini

# Add frontend apache virtual hosts
ADD templates/etc/apache2/sites-available/000-elmacare.conf /etc/apache2/sites-available/000-elmacare.conf

# Enable frontend apache virtual hosts
RUN a2dissite 000-default.conf \
    && a2ensite 000-elmacare.conf \
    && a2enmod rewrite actions alias proxy proxy_http headers expires ssl

ADD templates/etc/apache2/apache2.conf /etc/apache2/apache2.conf
ADD templates/etc/apache2/ports.conf /etc/apache2/ports.conf

# Composer
RUN curl -sS https://getcomposer.org/installer | php
RUN mv composer.phar /usr/bin/composer
RUN chmod 777 /usr/bin/composer

# NodeJS
RUN curl -sL https://deb.nodesource.com/setup_8.x | bash - \
    && apt-get install -y nodejs

# Yarn
RUN curl -sS https://dl.yarnpkg.com/debian/pubkey.gpg | apt-key add -
RUN echo "deb https://dl.yarnpkg.com/debian/ stable main" | tee /etc/apt/sources.list.d/yarn.list

#PHPUNIT
RUN wget https://phar.phpunit.de/phpunit-7.4.phar

RUN apt-get update
RUN apt-get install -y yarn

ADD templates/run.sh /run.sh
RUN chmod -v +x /run.sh

EXPOSE 80
EXPOSE 8080
CMD ["/run.sh"]