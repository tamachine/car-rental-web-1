<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\HTMLLang;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind('getHTMLLang', function ($app, $parameters) {
            $HTMLLang = new HTMLLang($parameters[0]);
            return $HTMLLang->getHTMLLang();
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
