<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Certification;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display the home page with products and certifications.
     */
    public function index()
    {
        $products = Product::where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('created_at', 'desc')
            ->get();

        $certifications = Certification::where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('created_at', 'desc')
            ->get();

        $articles = \App\Models\Article::orderBy('published_at', 'desc')
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();

        return view('pages.home', compact('products', 'certifications', 'articles'));
    }
}
