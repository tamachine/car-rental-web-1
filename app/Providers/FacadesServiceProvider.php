<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\CarsSearch\InitialValues;

class FacadesServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {

        $this->app->bind('Nave',function(){
            return new \App\Apis\Nave\Api();
        });

        $this->app->bind('CarSearchInitialValues', function ($app) {            
            return new InitialValues();
        });

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
