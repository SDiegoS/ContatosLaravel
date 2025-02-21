# Usando a imagem do nginx
FROM wyveo/nginx-php-fpm:latest

COPY . /usr/share/nginx/html
COPY nginx.conf /etc/nginx/conf.d/default.conf

# Definir diretório de trabalho
WORKDIR /usr/share/nginx/html

# Definir diretório de trabalho
RUN ln -s public html
RUN chown -R www-data:www-data /usr/share/nginx/html \
    && chmod -R 775 /usr/share/nginx/html/storage \
    && chmod -R 775 /usr/share/nginx/html/bootstrap/cache

# Instalar dependências do Laravel e extensões PHP necessárias
RUN apt update; \
    apt install vim -y \
    && apt install curl -y


# Expor a porta 80
EXPOSE 80
