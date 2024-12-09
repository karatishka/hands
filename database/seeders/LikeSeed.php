<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;


class LikeSeed extends Seeder
{
    public function run()
    {
        \App\Models\Like::factory()->count(150)->create();
    }
}
