<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule->command('app:financial')->yearlyOn(1, 1, '00:00');
        $schedule->command('make:stockopname')->lastDayOfMonth('23:00');
        $schedule->command('app:remindernearcalib')->lastDayOfMonth('8:00');
        $schedule->command('clear:session')->everyTenMinutes();
        $schedule->command('app:email_reminder_calibraation_oneweek')
             ->dailyAt('08:00')
             ->when(function () {
                 return now()->dayOfWeek < 6;
             });
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
