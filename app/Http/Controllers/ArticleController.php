<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\View\View;

class ArticleController extends Controller
{
    public function home(): View
    {
        $articles = Article::published()->with('category')
            ->latest('published_at')->take(6)->get();

        return view('home', compact('articles'));
    }

    public function index(): View
    {
        $articles = Article::published()->with('category')
            ->latest('published_at')->paginate(9);

        return view('articles.index', compact('articles'));
    }

    public function show(string $slug): View
    {
        $article = Article::published()->with('category')
            ->where('slug', $slug)->firstOrFail();

        $related = Article::published()->with('category')
            ->where('id', '!=', $article->id)
            ->when($article->category_id, fn ($query) =>
                $query->where('category_id', $article->category_id))
            ->latest('published_at')->take(3)->get();

        return view('articles.show', compact('article', 'related'));
    }
}
