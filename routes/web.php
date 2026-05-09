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

// Shared Hosting Fix: Storage Link & Fallback
Route::get('/storage-link', function () {
    try {
        $shortcut = public_path('storage');
        
        // Remove existing link or directory if it exists
        if (file_exists($shortcut) || is_link($shortcut)) {
            if (is_link($shortcut)) {
                @unlink($shortcut);
            } else {
                \Illuminate\Support\Facades\File::deleteDirectory($shortcut);
            }
        }
        
        \Illuminate\Support\Facades\Artisan::call('storage:link');
        return "Storage link created successfully!";
    } catch (\Exception $e) {
        return "Error: " . $e->getMessage();
    }
});

// Diagnostic route to check image existence
Route::get('/check-images', function() {
    $path = storage_path('app/public/hero/industrial.jpg');
    return [
        'industrial_exists' => \Illuminate\Support\Facades\File::exists($path),
        'storage_path' => storage_path('app/public'),
        'public_path' => public_path('storage'),
        'is_link' => is_link(public_path('storage')),
        'app_url' => config('app.url'),
    ];
});

Route::get('/media/{path}', function ($path) {
    $fullPath = storage_path('app/public/' . $path);
    
    if (!\Illuminate\Support\Facades\File::exists($fullPath)) {
        abort(404);
    }
    
    $file = \Illuminate\Support\Facades\File::get($fullPath);
    $type = \Illuminate\Support\Facades\File::mimeType($fullPath);
    
    return response($file)->header("Content-Type", $type);
})->where('path', '.*');
