# Gunakan PHP 8.2 CLI Image dari Docker Hub
FROM php:8.2-cli

# Install dependencies yang diperlukan untuk Laravel
RUN apt-get update && apt-get install -y \
    unzip \
    git \
    curl \
    libzip-dev \
    zip \
    && docker-php-ext-install zip pdo pdo_mysql

# Install Composer (untuk manajemen dependensi Laravel)
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Tentukan direktori kerja di dalam container
WORKDIR /app

# Salin semua file project ke dalam container
COPY . .

# Install dependensi Laravel menggunakan Composer
RUN composer install --no-dev --optimize-autoloader

# Expose port yang akan digunakan
EXPOSE 8000

# Jalankan Laravel menggunakan artisan serve
CMD php artisan serve --host=0.0.0.0 --port=8000
 
