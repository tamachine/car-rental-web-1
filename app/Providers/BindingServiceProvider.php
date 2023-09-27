<?php

namespace App\Providers;

use App\Interfaces\BlogAuthorRepositoryInterface;
use App\Interfaces\BlogCategoryRepositoryInterface;
use App\Interfaces\BlogPostRepositoryInterface;
use App\Interfaces\CarRepositoryInterface;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class BindingServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Route::bind('blog_post_slug', function ($value) {
            return $this->findOrfail(app(BlogPostRepositoryInterface::class)->findBySlug($value));
        });

       /* Route::bind('blog_author_slug', function ($value) {
            return $this->findOrfail(app(BlogAuthorRepositoryInterface::class)->findBySlug($value));
        });*/

        /*Route::bind('blog_category_slug', function ($value) {
            return $this->findOrfail(app(BlogCategoryRepositoryInterface::class)->findBySlug($value));
        });

        Route::bind('car_hashid', function ($value) {
            return $this->findOrfail(app(CarRepositoryInterface::class)->findBySlug($value));
        });*/
    }

    protected function findOrfail($result): object {
        if(is_null($result)) abort('404');

        return $result;
    }
}
