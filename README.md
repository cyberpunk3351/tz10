# Laravel

[Report](https://docs.google.com/document/d/1XbW9LG7297kRN87uUFMzyCj5IDwij1AjgMz_ykZT-N4/edit?usp=sharing)

## 1. Laravel-9.3.7, Php 8.0
After clone project, you need install dependencies, "composer install".

You need start this command "php artisan passport:install" for generate secret key for token 

Need to add in .env this code:

```php
PASSPORT_LOGIN_ENDPOINT="you need change on your ip + /oauth/token"
PASSPORT_CLIENT_ID=2
PASSPORT_CLIENT_SECRET={paste code after start command php artisan passport:install}
```

## 2. NODE JS => 16.x 
For the front-end part to work, you need a nodejs(=> 16.x),
you need install dependencies "npm install",
after you need start "npm run dev" to build project 

### How it's work
Add data to the database. Use /api/datas, method POST

Index all data, use /api/datas, method GET

Update data, use /api/datas/{data}, method PATCH, with id of record in db
