FROM richarvey/php-apache-heroku:latest

# نسخ ملفات المشروع
COPY . /var/www/html

# إعدادات الـ Environment
ENV WEBROOT /var/www/html/public
ENV APP_ENV production

# تثبيت الـ Dependencies
RUN composer install --no-dev --optimize-autoloader

# صلاحيات الفولدرات
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache