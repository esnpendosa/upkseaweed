<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ChatbotController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [PageController::class, 'index'])->name('home');
Route::get('/statistics', [PageController::class, 'statistics'])->name('statistics');
Route::get('/trade-hub', [PageController::class, 'trade'])->name('trade');
Route::get('/education', [PageController::class, 'lms'])->name('lms');
Route::get('/regulations', [PageController::class, 'regulations'])->name('regulations');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/structure', [PageController::class, 'team'])->name('team');
Route::get('/products', [PageController::class, 'products'])->name('products');
Route::get('/certifications', [PageController::class, 'certifications'])->name('certifications');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');

// Legal & Compliance
Route::get('/privacy-policy', [PageController::class, 'privacy'])->name('privacy');
Route::get('/trade-compliance', [PageController::class, 'compliance'])->name('compliance');

// News & Engagement
Route::get('/news', [PageController::class, 'news'])->name('articles.index');
Route::get('/news/{slug}', [ArticleController::class, 'show'])->name('articles.show');
Route::post('/articles/{id}/like', [ArticleController::class, 'like'])->name('articles.like');
Route::post('/articles/{id}/comment', [ArticleController::class, 'comment'])->name('articles.comment');

Route::get('/sitemap.xml', function() {
    $articles = \App\Models\Article::all();
    return response()->view('sitemap', compact('articles'))->header('Content-Type', 'text/xml');
});

// AI Chatbot Routes
Route::prefix('api/chatbot')->group(function () {
    Route::get('/options', [ChatbotController::class, 'getOptions']);
    Route::post('/message', [ChatbotController::class, 'handleMessage']);
});
