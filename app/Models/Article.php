<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Article extends Model
{
    use HasFactory;

    protected $appends = ['short'];

    // Accessor для свойства short

    public function getShortAttribute()
    {
        return Str::limit($this->description, 100); // Делаем короткое описание, обрезая до 100 символов
    }
}

