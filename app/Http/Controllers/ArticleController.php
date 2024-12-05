<?php

namespace App\Http\Controllers;

use App\Models\Article;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all()->sortByDesc('id')->take(10) ;
        return inertia('Articles/Index',compact('articles'));
    }

    public function all()
    {
        $articles = Article::all()->sortByDesc('id')->take(10)->toArray();
        return inertia('Articles/All', []);
    }

    public function show($id)
    {
        return inertia('Articles/Show', []);
    }
}
