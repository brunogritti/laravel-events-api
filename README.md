# Events API

Repository:

```git@github.com:brunogritti/laravel-events-api.git```

## Instaling

```
$ composer install
php artisan key:generate
php artisan migrate:fresh --seed

$ npm install
```

Create .env file

```cp .env.example .env```

- Create database and point it in .env


## Database setup

```
php artisan migrate
php artisan db:seed
```

## Permissions

```
$ chmod -R 777 storage
$ chmod -R 777 bootstrap/cache
```

## Cache cleaning

```
composer dump-autoload
php artisan config:clear
php artisan view:clear
php artisan cache:clear
```

# Run to create fake data

```
php artisan app:fake-data
```