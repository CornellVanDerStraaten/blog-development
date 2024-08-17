<?php

use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\GameController;
use App\Http\Controllers\Admin\GameReviewController;
use App\Http\Controllers\User\ArticleController as UserArticleController;
use App\Http\Controllers\User\WebsiteController;
use Illuminate\Support\Facades\Route;

Route::fallback(function () {
    return response()->view('404');
});
Route::name('user.')->group(function () {
    Route::get('/', [WebsiteController::class, 'index'])->name('frontpage');
    Route::get('/blogs', [UserArticleController::class, 'index'])->name('article.index');
    Route::get('/{slug}', [UserArticleController::class, 'show'])->name('article.show');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');

        Route::resource('articles', ArticleController::class);
        Route::resource('games', GameController::class);
        Route::resource('game-reviews', GameReviewController::class);
    });
});
