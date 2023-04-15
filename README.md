<p align="center">
<a href="https://laravel.com" target="_blank"><img src="/public/svg/site/logo.svg" width="250"></a>
<a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="300"></a>
</p>

# Linig On: An Online Home Service Application

## How to clone and run the project

```bash
npm install
npm run dev
npm run dev
composer install
cp .env.example .env
php artisan key:generate
```

## Commands Used

-   ##### Used Commands

```bash
composer create-project --prefer-dist laravel/laravel shop "8.*"
php artisan serve
```

-   ##### Making authentication using bootstrap

```bash
composer require laravel/ui:*
php artisan ui bootstrap --auth
php artisan migrate

npm install
npm run dev
npm run dev
```

-   ##### Making components

```bash
php artisan make:component ComponentName
```

-   ##### Making controller

```bash
php artisan make:model ControllerName -mcr
# without the 'Controller' name convention. just the name of the controller.
```

**Where:**

-   -m, --migration Create a new migration file for the model.
-   -c, --controller Create a new controller for the model.
-   -r, --resource Indicates if the generated controller should be a resource controller

-   ##### Migration

```bash
php artisan migrate:fresh
```

-   ##### Seeder

```bash
php artisan make:seeder ProductSeeder
php artisan make:seeder UserSeeder
php artisan db:seed
```
