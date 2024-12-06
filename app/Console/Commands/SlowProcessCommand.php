<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SlowProcessCommand extends Command
{
    protected $signature = 'slow:process';
    protected $description = 'Выполняет медленный процесс с задержкой';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Запуск медленного процесса...');

        // Имитация медленного выполнения
        sleep(600); // Остановка исполнения на 10 минут
        $this->info('Медленный процесс завершен.');
    }
}
