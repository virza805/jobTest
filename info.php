<?php
/*
=========== >>>> = Backend (php artisan serve) = <<<<============

composer create-project laravel/laravel:^8.0 backendLaravel
cd backendLaravel
php artisan serve |=> for run this

composer require laravel/ui:^3.0 => for authantication
# php artisan ui vue --auth => for create authnatication folder
# npm install => npm run dev |npm install vue-loader@^15.9.7 --save-dev --legacy-peer-deps| npm run development
#  =>


# config/database.php |=> set 'charset' => 'utf8', 'collation' => 'utf8_unicode_ci', 
# backend |=>connect Database from .env file
# composer require laravel/passport => https://laravel.com/docs/8.x/passport
# php artisan migrate =>
# php artisan passport:install =>{
    Personal access client created successfully.
    Client ID: 970dbb74-46dc-429a-8a26-9b3ec3f9596b
    Client secret: oBq0DuET1RgamhLS0z06bljtA0bOUClkJwr2MQQk
    Password grant client created successfully.
    Client ID: 970dbb74-618f-448d-8381-00bd985e7e7d
    Client secret: evU8aMfEYI1jEgL2drg6j4BPS0zAfcd7PUNWt0FJ

    }php artisan passport:keys => if download github file then run this || php artisan passport:client --personal


php artisan passport:install --uuids
php artisan make:controller Api/AuthController =>
php artisan rout:list

php artisan make:request RegisterRequest =>
php artisan make:request LoginRequest =>

php artisan make:model Categories -mc
php artisan make:model Product -mc
php artisan migrate || php artisan migrate:fresh --seed





============ >>>> = Frontend || Client Site vueNuxt (npm run dev) = <<<<============


# npm init nuxt-app frontend => 
# cd frontend => 
# npm run dev => 
# npm install --save-dev sass sass-loader@10 -D => for scss

====== >>>> auth configaration <<<<=====

npm install --save-exact @nuxtjs/auth-next => https://auth.nuxtjs.org/guide/setup
npm install @nuxtjs/axios


# npm install --save vue-pagination-2 => 
#  => 
#  => 
#  => 
#  => 
#  => 
#  => 
#  => 
#  => 
#  => 























*/