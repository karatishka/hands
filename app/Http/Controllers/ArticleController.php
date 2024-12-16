<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Support\Facades\Cache;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Cache::remember('articles', 3600, function () {
            return Article::zh()->orderBy('id', 'desc')->take(6)->get();
        });
        return inertia('Articles/Index', compact('articles'));
    }

    public function all()
    {
        $articles = Article::zh()->orderBy('id', 'desc')->paginate(10)->toArray();
        return inertia('Articles/All', compact('articles'));
    }

    public function show($id)
    {
        $article = Article::findOrFail($id)->where('id', $id)->zh()->get()->first();

        return inertia('Articles/Show', compact('article'));
    }
}
