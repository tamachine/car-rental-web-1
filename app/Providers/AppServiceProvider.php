<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\HTMLLang;
use App\Services\WebPSupportChecker;

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

        $this->app->singleton(WebPSupportChecker::class, function ($app) {
            return new WebPSupportChecker();
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
