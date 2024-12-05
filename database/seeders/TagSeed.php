<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;


class TagSeed extends Seeder
{
    public function run()
    {
        \App\Models\Tag::factory()->count(150)->create();
    }
}
