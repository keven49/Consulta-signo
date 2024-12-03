# Use a imagem oficial do PHP com Apache
FROM php:8.0-apache

# Copie os arquivos do projeto para o diretório do Apache
COPY . /var/www/html/

# Exponha a porta 80
EXPOSE 8080

# Configure o Apache para escutar na porta 8080
RUN echo "Listen 8080" >> /etc/apache2/ports.conf

# Certifique-se de que o Apache esteja em execução em primeiro plano
CMD ["apache2-foreground"]