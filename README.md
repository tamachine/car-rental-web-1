# Getting started

## Description
This is the frontend for Reykjavik Auto website

It consumes the 'Nave' API 

This project is using PHP 8.1 with TALL stack (Tailwind 3, Alpine, Livewire and Laravel 10) and Laravel mix 6

## Pre requisites
PHP 8.1, a database, composer and npm.

## Installation
Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/8.x/installation)

Clone the repository

    git clone git@bitbucket.org:scandinavian/reykjavik-auto-new.git

Switch to the repo folder

    cd reykjavik-auto-new

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Install composer dependencies

    composer install 
    
    IMPORTANT: There is a custom Translation loader that overrides the current one. It gets translations from the Nave API. When you execute 'composer install', it executes 'package:discover' and loads the translations service provider so you should have the API endpoint configured in order to load them or you can comment the line App\Providers\TranslationServiceProvider::class in config/app.php (providers) and uncomment it after the API credentials are correctly added to the .env file.

Install npm dependencies

    npm install

Create the assets

    npm run development

## Cache

There is a command to load/refresh the endpoints cache.

You can pre-load all the cache running:

    php artisan nave:cache --clear

The flag --clear will remove the current cache if exists

## Cron

There is a scheduled command to refresh cache every 2 hours

For local environment use: https://laravel.com/docs/9.x/scheduling#running-the-scheduler-locally

    php artisan schedule:work

For not local environment use: https://laravel.com/docs/9.x/scheduling#running-the-scheduler

    cd /path-to-your-project && php artisan schedule:run >> /dev/null 2>&1