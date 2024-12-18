<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\View;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::zh()->orderBy('id', 'desc')->take(10)->get();
        return inertia('Articles/Index', compact('articles'));
    }

    public function all()
    {
        $articles = Article::zh()->paginate(12)->toArray();
        return inertia('Articles/All', compact('articles'));
    }

    public function show($id)
    {
        $article = Article::findOrFail($id)->where('id', $id)->zh()->get()->first();

        return inertia('Articles/Show', compact('article'));
    }
}
