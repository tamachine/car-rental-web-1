<?php

namespace App\Console;

use App\Services\NaveCache\NaveCache;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\App;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule->call(function () {
            
                app(NaveCache::class)->clearAndRun();
           
        })->everyTwoHours()->environments(['production']);

        $schedule->call(function () {
            
            app(NaveCache::class)->clearAndRun();
        
        })->everyFiveMinutes()->environments(['staging']);

    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
