FROM php:7.3-apache
RUN apt-get update \
  && apt-get install -y \
    gcc \
    make \
    libpng-dev \
    git \
    unzip \
    vim \
    libmcrypt-dev \
    mariadb-client \
    curl \
    gnupg \
    libjpeg-dev \
    libfreetype6-dev \
    libxml2-dev \
    libzip-dev \
    libmemcached-dev \
    && docker-php-ext-install pdo_mysql mysqli mbstring opcache xml tokenizer zip \
    && docker-php-ext-configure gd --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install -j$(nproc) gd \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*
RUN pecl channel-update pecl.php.net && pecl install memcached mcrypt-1.0.2 && docker-php-ext-enable memcached mcrypt
RUN curl -s http://getcomposer.org/installer | php && \
    echo "export PATH=${PATH}:/var/www/vendor/bin" >> ~/.bashrc && \
    mv composer.phar /usr/local/bin/composer
RUN composer config -g repos.packagist composer https://packagist.jp && \
    composer global require hirak/prestissimo
RUN a2enmod rewrite
COPY ./sites-available/000-default.conf /etc/apache2/sites-available/000-default.conf
WORKDIR /var/www/
