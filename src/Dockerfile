FROM php:8.2-apache

RUN a2enmod rewrite headers

WORKDIR /var/www/html


COPY src/ /var/www/html/

RUN printf '%s\n' \
  '<VirtualHost *:80>' \
  '  DocumentRoot /var/www/html' \
  '  <Directory /var/www/html>' \
  '    AllowOverride All' \
  '    Require all granted' \
  '  </Directory>' \
  '  DirectoryIndex index.php' \
  '</VirtualHost>' \
  > /etc/apache2/sites-available/000-default.conf

EXPOSE 80
