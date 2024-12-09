<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;

class RedisTestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'redis:go';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'redis description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Cache::put('example', 'Hello World');

        $str = Cache::get('example');
        dd($str);
    }
}
