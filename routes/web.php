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
        'middleware' => [ 'localize', 'localizationRedirect' ]
    ],  function()
{ 

    Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');   
    
    Route::get(LaravelLocalization::transRoute('routes.cars'), [\App\Http\Controllers\CarsController::class, 'index'])->name('cars');   
    Route::get(LaravelLocalization::transRoute('routes.about'), [\App\Http\Controllers\AboutController::class, 'index'])->name('about');   
    Route::get(LaravelLocalization::transRoute('routes.contact'), [\App\Http\Controllers\ContactController::class, 'index'])->name('contact');   
    Route::get(LaravelLocalization::transRoute('routes.faq'), [\App\Http\Controllers\FaqController::class, 'index'])->name('faq');   
    Route::get(LaravelLocalization::transRoute('routes.blog'), [\App\Http\Controllers\BlogController::class, 'index'])->name('blog');   
    
});

