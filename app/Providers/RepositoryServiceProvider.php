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
        $this->app->bind(\App\Interfaces\BlogAuthorRepositoryInterface::class, \App\Repositories\Nave\BlogAuthorRepository::class);                    
        $this->app->bind(\App\Interfaces\BlogCategoryRepositoryInterface::class, \App\Repositories\Nave\BlogCategoryRepository::class);                    
        $this->app->bind(\App\Interfaces\BlogTagRepositoryInterface::class, \App\Repositories\Nave\BlogTagRepository::class);                    
        $this->app->bind(\App\Interfaces\BlogPostRepositoryInterface::class, \App\Repositories\Nave\BlogPostRepository::class);                    
        $this->app->bind(\App\Interfaces\CarRepositoryInterface::class, \App\Repositories\Nave\CarRepository::class);     
        $this->app->bind(\App\Interfaces\CarCategoryRepositoryInterface::class, \App\Repositories\Nave\CarCategoryRepository::class);     
        $this->app->bind(\App\Interfaces\CarFiltersRepositoryInterface::class, \App\Repositories\Nave\CarFiltersRepository::class);     
        $this->app->bind(\App\Interfaces\CarenLocationRepositoryInterface::class, \App\Repositories\Nave\CarenLocationRepository::class);     
        $this->app->bind(\App\Interfaces\ConfigRepositoryInterface::class, \App\Repositories\Nave\ConfigRepository::class);             
        $this->app->bind(\App\Interfaces\ContactFormRepositoryInterface::class, \App\Repositories\Nave\ContactFormRepository::class);             
        $this->app->bind(\App\Interfaces\CurrencyRatesRepositoryInterface::class, \App\Repositories\Nave\CurrencyRatesRepository::class);             
        $this->app->bind(\App\Interfaces\FaqRepositoryInterface::class, \App\Repositories\Nave\FaqRepository::class);        
        $this->app->bind(\App\Interfaces\FaqCategoryRepositoryInterface::class, \App\Repositories\Nave\FaqCategoryRepository::class);      
        $this->app->bind(\App\Interfaces\LocationRepositoryInterface::class, \App\Repositories\Nave\LocationRepository::class);     
        $this->app->bind(\App\Interfaces\NewsletterUserRepositoryInterface::class, \App\Repositories\Nave\NewsletterUserRepository::class);             
        $this->app->bind(\App\Interfaces\PageRepositoryInterface::class, \App\Repositories\Nave\PageRepository::class);     
        $this->app->bind(\App\Interfaces\TranslationRepositoryInterface::class, \App\Repositories\Nave\TranslationRepository::class);     
        $this->app->bind(\App\Interfaces\TranslationGroupRepositoryInterface::class, \App\Repositories\Nave\TranslationGroupRepository::class);     

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
