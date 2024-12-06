<?php

namespace App\Console\Commands;

use App\Models\View as PageView;
use Illuminate\Console\Command;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\Facades\Cache;


class SavePageViewCounts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pageview:save';
    protected $description = 'Сохранить количество просмотров из кэша в базу данных.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $keys = Cache::getKeys(); // Получение всех ключей
        foreach ($keys as $key) {
            if (strpos($key, 'page_view_count:') === 0) { // Если это ключ счетчика
                $pageName = str_replace('page_view_count:', '', $key);
                $count = Cache::get($key);
                $pageView = PageView::firstOrCreate(['page_name' => $pageName]);
                $pageView->increment('view_count', $count);
                Cache::forget($key); // Удалить после сохранения
            }
        }
    }

    protected function schedule(Schedule $schedule)
    {
        $schedule->command('pageview:save')->everyFiveMinutes();
    }
}
