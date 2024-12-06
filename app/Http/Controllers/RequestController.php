<?php

namespace App\Http\Controllers;


use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    public function comment(CommentRequest $request)
    {
        //  sleep(600)
        //  метод исполняет логику в фоновом режиме
        try {
            Comment::create($request->validated());
        } catch (\Exception $exception) {
            return response([$exception->getMessage()], 422);
        }

        return response()->json(1);
    }

    public function like(Request $request)
    {
        return response()->json(1);
    }

    public function view(Request $request)
    {
        return response()->json(1);
    }
}
