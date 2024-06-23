# Usa a imagem oficial do PHP com Apache
FROM php:7.4-apache

# Instala as extensões do PHP necessárias
RUN docker-php-ext-install mysqli

# Copia o código do projeto para o diretório padrão do Apache
COPY . /var/www/html/

# Define as permissões corretas para o diretório
RUN chown -R www-data:www-data /var/www/html/

# Expose a porta 80 para acessar o servidor Apache
EXPOSE 80
