<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Jobs\LongRunningJob;
use App\Models\Like;
use App\Models\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class RequestController extends Controller
{
    public function comment(CommentRequest $request)
    {
        try {
            $data = $request->validated();
            LongRunningJob::dispatch($data)->delay(now()->addMinutes(10));
        } catch (\Exception $e) {
            return response([$e->getMessage()], 422);
        }

        return response()->json(1);
    }

    public function like(Request $request, $id)
    {
        $query = Like::where('article_id', $id);
        if ($query->exists()) {
            $query->increment('count');
            $view = $query->first();

            Cache::put("article-like-{$view->id}", $view->count, 3600);
        } else {
            $view = new Like();
            $view->article_id = $id;
            $view->count = 1;

            $view = Cache::remember("article-like-{$view->id}", 3600, function () use ($view) {
                return $view->save();
            });
        }

        return response()->json($view->count);
    }

    public function view(Request $request, $id)
    {
        $query = View::where('article_id', $id);
        if ($query->exists()) {
            $query->increment('count');
            $view = $query->first()->count;
        } else {
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

        if ($query->exists()) {
            $view = $query->first();
            return response()->json($view->count);
        } else {
            response()->json(0);
        }
    }

    public function getLike($id)
    {
        $query = Like::where('article_id', $id);

        if ($query->exists()) {
            $like = $query->first();

            $count = Cache::get("article-like-{$like->id}", function () use ($like) {
                return $like->count;
            });

            return response()->json($count);
        } else {
            response()->json(0);
        }
    }
}
