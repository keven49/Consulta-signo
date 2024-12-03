# Use a imagem oficial do PHP com Apache
FROM php:8.0-apache

# Copie os arquivos do projeto para o diretório do Apache
COPY . /var/www/html/

# Exponha a porta 80
EXPOSE 80