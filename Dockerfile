FROM php:8.3-fpm

# تسطيب إضافات قاعدة البيانات للارافيل
RUN docker-php-ext-install pdo pdo_mysql