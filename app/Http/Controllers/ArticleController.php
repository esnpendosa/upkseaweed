<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a single article.
     */
    public function show($slug)
    {
        $article = Article::where('slug', $slug)->firstOrFail();
        
        // Dynamic View Counter
        $article->increment('views_count');

        return view('pages.articles.show', compact('article'));
    }

    /**
     * Increment Like Counter via Ajax/Form.
     */
    public function like($id)
    {
        $article = Article::findOrFail($id);
        $article->increment('likes_count');

        return back()->with('success', 'Thank you for your appreciation!');
    }

    /**
     * Store a new comment or reply.
     */
    public function comment(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email',
            'content' => 'required|string|min:5',
            'parent_id' => 'nullable|exists:comments,id',
        ]);

        Comment::create([
            'article_id' => $id,
            'parent_id' => $request->parent_id,
            'name' => $request->name,
            'email' => $request->email,
            'content' => $request->content,
            'is_approved' => true, // Auto-approve for demo, usually moderated
        ]);

        return back()->with('success', 'Your comment has been posted!');
    }
}
