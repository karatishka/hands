<?php

namespace App\Http\Controllers;


use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use App\Models\Like;
use App\Models\View;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    public function comment(CommentRequest $request)
    {
        //  sleep(600)
        //  метод исполняет логику в фоновом режиме
        try {
            Comment::create($request->validated());
        } catch (\Exception $e) {
            return response([$e->getMessage()], 422);
        }

        return response()->json(1);
    }

    public function like(Request $request, $id)
    {
        $query = Like::where('article_id', $id);
        if ($query->exists() ) {
            $query->increment('count');
            $view = $query->first();
        }
        else {
            $view = new Like();
            $view->article_id = $id;
            $view->count = 1;
            $view->save();
        }

        return response()->json($view->count);
    }

    public function view(Request $request, $id)
    {
        $query = View::where('article_id', $id);
        if ($query->exists() ) {
            $query->increment('count');
            $view = $query->first();
        }
        else {
            $view = new View();
            $view->article_id = $id;
            $view->count = 1;
            $view->save();
        }

        return response()->json($view->count);
    }

    public function getView($id)
    {
        $query = View::where('article_id', $id);

        if ($query->exists() ) {
            $view = $query->first();
            return response()->json($view->count);
        }
        else {
            response()->json(0);
        }
    }

    public function getLike($id)
    {
        $query = Like::where('article_id', $id);

        if ($query->exists() ) {
            $view = $query->first();
            return response()->json($view->count);
        }
        else {
            response()->json(0);
        }
    }
}
