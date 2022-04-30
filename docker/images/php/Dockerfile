#FROM php:7.4-fpm
#MAINTAINER abbosxon
#
#RUN apt-get update && apt-get install -y \
#        apt-transport-https \
#        curl \
#        wget \
#        git \
#        libfreetype6-dev \
#        libjpeg62-turbo-dev \
#        libmcrypt-dev \
#        libpng-dev \
#        libjpeg-dev \
#        zlib1g-dev \
#        libpq-dev \
#        libc-client-dev \
#        libkrb5-dev \
#        libxslt-dev \
#        libmagickwand-dev --no-install-recommends\
#        libmemcached-dev \
##          cron \
##          rsyslog \
#    && pecl install imagick \
#    && pecl install memcached \
#    && docker-php-ext-enable imagick \
#    && docker-php-ext-enable memcached \
##    && docker-php-ext-install -j$(nproc) iconv mcrypt mbstring mysqli pdo_mysql pdo_pgsql zip \
##    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ --with-png-dir=/usr/include/ \
##    && docker-php-ext-install gd \
##    && docker-php-ext-configure imap --with-kerberos --with-imap-ssl \
##    && docker-php-ext-install -j$(nproc) imap \
##    && docker-php-ext-install -j$(nproc) gd \
##    && docker-php-ext-install xsl \
##    && docker-php-ext-install opcache \
##    && docker-php-ext-enable opcache
#
#ADD php-opcache.ini /usr/local/etc/php/conf.d/zz-nextcloud-opcache.ini
#
##RUN apt-get install php7.4-fpm && service php7.4-fpm start
##RUN chown $USER:$USER /var/run/php/php7.4-fpm.sock
#
#RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
#    && apt-get update
## PhpDox
#RUN wget http://phpdox.de/releases/phpdox.phar \
#    && chmod +x phpdox.phar \
#    && mv phpdox.phar /usr/local/bin/phpdox
#
##Debug
#RUN yes | pecl install xdebug \
#    && echo "zend_extension=$(find /usr/local/lib/php/extensions/ -name xdebug.so)" > /usr/local/etc/php/conf.d/xdebug.ini \
#    && echo "xdebug.remote_enable=on" >> /usr/local/etc/php/conf.d/xdebug.ini \
#    && echo "xdebug.remote_autostart=off" >> /usr/local/etc/php/conf.d/xdebug.ini \
#    && rm /etc/localtime \
#    && ln -s /usr/share/zoneinfo/Asia/Almaty /etc/localtime \
#    && "date"
##    && crontab /etc/cron.d/root
#ADD php.ini /usr/local/etc/php/conf.d/40-custom.ini
#
#WORKDIR /var/www
#
#CMD php-fpm
##6& /usr/sbin/crond -f && service cron start && service rsyslog start


FROM php:7.4-fpm

RUN apt-get update && apt-get install -y libmcrypt-dev  \
    libzip-dev zip libxml2-dev libpq-dev libpng-dev calendar  \
    libjpeg-dev libfreetype6-dev libxslt-dev libgcrypt-dev wget unzip \
    libmagickwand-dev --no-install-recommends\
#    mysqlni ishlatish
    && docker-php-ext-install mysqli pdo pdo_mysql && docker-php-ext-enable pdo_mysql \
#    postgresga to'g'rilash
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install pdo_pgsql pgsql \
    && docker-php-ext-install calendar \
    && pecl install imagick \
    && docker-php-ext-enable imagick \
    && docker-php-ext-install zip \
    && pecl install mcrypt-1.0.3 \
    && docker-php-ext-enable mcrypt \
    && docker-php-ext-install sockets \
    && docker-php-ext-install soap \
    && docker-php-ext-configure gd --with-freetype=/usr/include/ --with-jpeg=/usr/include/ --with-freetype=/usr/include/ \
    && docker-php-ext-install gd \
    && docker-php-ext-install dom \
    && docker-php-ext-install pcntl \
    && docker-php-ext-install xsl

#RUN apt-get install php7.4-fpm && service php7.4-fpm start
#RUN chmod +x  /var/run/php/php7.4-fpm.sock


WORKDIR /var/www/textile-yii