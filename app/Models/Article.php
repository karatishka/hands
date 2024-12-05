<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Article extends Model
{
    use HasFactory;

    protected $appends = ['short'];

    // Accessor для свойства short

    public function getShortAttribute()
    {
        return Str::limit($this->description, 100);
    }

    public function tags(): HasMany
    {
        return $this->hasMany(Tag::class);
    }
}

