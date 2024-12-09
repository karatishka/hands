<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;


class ViewSeed extends Seeder
{
    public function run()
    {
        \App\Models\View::factory()->count(150)->create();
    }
}
