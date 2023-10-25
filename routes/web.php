<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(), 
        'middleware' => [ 'localize', 'localizationRedirect','localeSessionRedirect' ]
    ],  function()
{ 

    /* main */
    Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');       
    Route::get(LaravelLocalization::transRoute('routes.cars'), [\App\Http\Controllers\CarsController::class, 'index'])->name('cars');   
    Route::get(LaravelLocalization::transRoute('routes.about'), [\App\Http\Controllers\AboutController::class, 'index'])->name('about');   
    Route::get(LaravelLocalization::transRoute('routes.contact'), [\App\Http\Controllers\ContactController::class, 'index'])->name('contact');   
    Route::get(LaravelLocalization::transRoute('routes.faq'), [\App\Http\Controllers\FaqController::class, 'index'])->name('faq');   
    Route::get(LaravelLocalization::transRoute('routes.blog'), [\App\Http\Controllers\BlogController::class, 'index'])->name('blog');   

    /* booking process */    
    Route::get(LaravelLocalization::transRoute('routes.{car_hashid}/insurances'), [\App\Http\Controllers\InsurancesController::class, 'index'])->name('insurances');   
    Route::get(LaravelLocalization::transRoute('routes.{car_hashid}/extras'), [\App\Http\Controllers\ExtrasController::class, 'index'])->name('extras');
    Route::get(LaravelLocalization::transRoute('routes.payment'), [\App\Http\Controllers\PaymentController::class, 'index'])->name('payment');   
    Route::get(LaravelLocalization::transRoute('routes.success'), [\App\Http\Controllers\SuccessController::class, 'index'])->name('success');  

    /* blog */        
    Route::get(LaravelLocalization::transRoute('routes.blog/post/{blog_post_slug}'), [\App\Http\Controllers\BlogPostController::class, 'index'])->name('blog.show');       
    Route::get(LaravelLocalization::transRoute('routes.blog/search'), [\App\Http\Controllers\BlogSearchStringController::class, 'index'])->name('blog.search.string');       
    Route::get(LaravelLocalization::transRoute('routes.blog/all'), [\App\Http\Controllers\BlogSearchAllController::class, 'index'])->name('blog.search.all');  
    Route::get(LaravelLocalization::transRoute('routes.blog/top-10'), [\App\Http\Controllers\BlogSearchTop10Controller::class, 'index'])->name('blog.search.top-10');     
    Route::get(LaravelLocalization::transRoute('routes.blog/category/{blog_category_slug}'), [\App\Http\Controllers\BlogSearchCategoryController::class, 'index'])->name('blog.search.category');    
    Route::get(LaravelLocalization::transRoute('routes.blog/author/{blog_author_slug}'), [\App\Http\Controllers\BlogSearchAuthorController::class, 'index'])->name('blog.search.author');     
    Route::get('blog/preview/{blog_post_slug}', [\App\Http\Controllers\BlogPostController::class, 'preview'])->name('blog.preview');        
    
    /* Privacy and terms */
    Route::get(LaravelLocalization::transRoute('routes.terms-and-conditions'), [\App\Http\Controllers\TermsAndConditionsController::class, 'index'])->name('terms'); 
    Route::get(LaravelLocalization::transRoute('routes.cancellation-policy'), [\App\Http\Controllers\CancellationPolicyController::class, 'index'])->name('cancellation'); 
    Route::get(LaravelLocalization::transRoute('routes.privacy-and-cookie-policy'), [\App\Http\Controllers\PrivacyAndCookiePolicyController::class, 'index'])->name('privacy'); 
    Route::get(LaravelLocalization::transRoute('routes.legal-notice'), [\App\Http\Controllers\LegalNoticeController::class, 'index'])->name('legal');     
});

