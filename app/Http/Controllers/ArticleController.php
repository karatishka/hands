<?php

namespace App\Http\Controllers;

class ArticleController extends Controller
{
    public function index()
    {
        return inertia('Articles/Index', []);
    }

    public function all()
    {
        return inertia('Articles/All', []);
    }

    public function show($id)
    {
        return inertia('Articles/Show', []);
    }
}
