# استخدام صورة richarvey/nginx-php-fpm بإصدار 8.2.4 كأساس
FROM richarvey/nginx-php-fpm:3.1.3

# نسخ جميع الملفات من المجلد الحالي إلى مجلد العمل في الصورة
COPY . .

# إعدادات الصورة
ENV SKIP_COMPOSER 1
ENV WEBROOT /var/www/html/public
ENV PHP_ERRORS_STDERR 1
ENV RUN_SCRIPTS 1
ENV REAL_IP_HEADER 1

# إعدادات Laravel
ENV APP_ENV production
ENV APP_DEBUG false
ENV LOG_CHANNEL stderr

# السماح لـ Composer بالتشغيل كمدير جذر
ENV COMPOSER_ALLOW_SUPERUSER 1

# تحديد الأمر الافتراضي لتشغيل الصورة
CMD ["/start.sh"]
