<?php

namespace App\Http\Requests;

use App\Models\Article;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CommentRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        $article = Article::make()->orderBy('id')->pluck('id')->toArray();

        return [
            'subject' => 'required|string',
            'body' => 'required|string',
            'article_id' => ['required', Rule::in(array_values($article))],
        ];
    }
}
