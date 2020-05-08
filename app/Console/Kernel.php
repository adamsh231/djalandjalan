<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Commands\ChangePartnerStatus::class,
        Commands\testRunServer::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('test:run')->everyMinute()->runInBackground()->thenPing('https://cronhub.io/ping/5c5e61a0-9115-11ea-8dab-cfde3f6d9647');
        $schedule->command('partner:status')->daily()->runInBackground()->thenPing('https://cronhub.io/ping/7971d220-9115-11ea-bc3c-d758864e59c3');
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
