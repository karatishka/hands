<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;


class ArticleSeed extends Seeder
{
    public function run()
    {
        \App\Models\Article::factory()->count(50)->create();
    }
}
