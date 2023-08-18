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
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
