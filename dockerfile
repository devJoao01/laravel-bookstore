FROM php:8.2-fpm

# Definir argumentos com valores padrão
ARG user=joao
ARG uid=1000

# Instalação de dependências e extensões PHP
RUN apt update && apt install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd \
    && apt clean \
    && rm -rf /var/lib/apt/lists/*

# Copiar o Composer do contêiner oficial para o contêiner PHP
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Criar usuário com os grupos www-data e root
RUN useradd -G www-data,root -u $uid -d /home/$user $user \
    && mkdir -p /home/$user/.composer \
    && chown -R $user:$user /home/$user

# Definir diretório de trabalho
WORKDIR /var/www

# Mudar para o usuário não-root
USER $user
