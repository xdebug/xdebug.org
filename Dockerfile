FROM php:7.3-apache

COPY docker/php/vhost.conf /etc/apache2/sites-available/000-default.conf

RUN a2enmod rewrite && a2enmod headers