<?php

namespace App\Http\Controllers;

use App\Models\Article;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::with(['tags'])->orderBy('id', 'desc')->take(10)->get();
        return inertia('Articles/Index', compact('articles'));
    }

    public function all()
    {
        $articles = Article::with(['tags'])->paginate(12)->toArray();
        return inertia('Articles/All', compact('articles'));
    }

    public function show($id)
    {
        $article = Article::find($id)->with(['tags'])->latest()->first();
        return inertia('Articles/Show', compact('article'));
    }
}
