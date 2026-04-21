<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [PageController::class, 'index'])->name('home');
Route::get('/news/{slug}', [ArticleController::class, 'show'])->name('articles.show');

Route::get('/sitemap.xml', function() {
    $articles = \App\Models\Article::all();
    return response()->view('sitemap', compact('articles'))->header('Content-Type', 'text/xml');
});
