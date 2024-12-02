FROM php:8.4-fpm

# نصب وابستگی‌های مورد نیاز
RUN apt-get update && \
    apt-get install -y \
    libjpeg-dev \
    libpng-dev \
    libfreetype6-dev \
    zip \
    libzip-dev \
    libonig-dev \
    libpq-dev \
    ffmpeg \
    cron \
    supervisor \
    curl \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_mysql pdo_pgsql gd zip fileinfo pcntl sockets \
    && pecl install redis \
    && docker-php-ext-enable redis \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# نصب Node.js و npm
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - && \
    apt-get install -y nodejs

# نصب Composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
    php -r "if (hash_file('sha384', 'composer-setup.php') === 'dac665fdc30fdd8ec78b38b9800061b4150413ff2e3b6f88543c636f7cd84f6db9189d43a81e5503cda447da73c7e5b6') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" && \
    php composer-setup.php && \
    mv composer.phar /usr/local/bin/composer && \
    php -r "unlink('composer-setup.php');"

RUN echo "pm = dynamic" >> /usr/local/etc/php-fpm.d/www.conf && \
    echo "pm.max_children = 10" >> /usr/local/etc/php-fpm.d/www.conf && \
    echo "pm.start_servers = 5" >> /usr/local/etc/php-fpm.d/www.conf && \
    echo "pm.min_spare_servers = 5" >> /usr/local/etc/php-fpm.d/www.conf && \
    echo "pm.max_spare_servers = 10" >> /usr/local/etc/php-fpm.d/www.conf

COPY ./schedule.sh /usr/local/bin/schedule.sh
RUN chmod +x /usr/local/bin/schedule.sh
