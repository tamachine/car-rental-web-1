<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(\App\Interfaces\BlogPostRepositoryInterface::class, \App\Repositories\Nave\BlogPostRepository::class);    
        $this->app->bind(\App\Interfaces\PageRepositoryInterface::class, \App\Repositories\Nave\PageRepository::class);     
        $this->app->bind(\App\Interfaces\TranslationRepositoryInterface::class, \App\Repositories\Nave\TranslationRepository::class);     
        $this->app->bind(\App\Interfaces\ConfigRepositoryInterface::class, \App\Repositories\Nave\ConfigRepository::class);     
        $this->app->bind(\App\Interfaces\CarCategoryRepositoryInterface::class, \App\Repositories\Nave\CarCategoryRepository::class);     
        $this->app->bind(\App\Interfaces\LocationRepositoryInterface::class, \App\Repositories\Nave\LocationRepository::class);     
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
