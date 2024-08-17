<?php

namespace App\Providers;

use App\Models\Article;
use App\Models\Game;
use App\Models\GameReview;
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

        Route::bind('game', function ($value) {
            return Game::findOrFail($value);
        });

        Route::bind('game_review', function ($value) {
            return GameReview::findOrFail($value);
        });
    }
}
