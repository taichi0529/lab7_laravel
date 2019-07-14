# lab7_laravel

## Usage

```
git clone git@github.com:taichi0529/lab7_laravel.git
cd lab7_laravel/docker
docker-compose up -d
docker-compose exec php-apache composer install
cd ../src
cp .env.example .env
cd ../docker
docker-compose exec php-apache php artisan key:generate
```

http://localhost:8080/
