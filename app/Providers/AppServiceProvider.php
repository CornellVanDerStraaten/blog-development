<?php

namespace App\Providers;

use App\Models\Article;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Custom binding for the 'article' parameter to allow oArticle
        Route::bind('article', function ($value) {
            return Article::findOrFail($value);
        });
    }
}
