<?php

namespace App\Console;

<<<<<<< HEAD
use Illuminate\Support\Facades\App;
=======
>>>>>>> 5ea59c35788b9d5b4a0f0fb82902372b80fda386
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
        \App\Console\Commands\CSVCommand::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();

        $schedule->call(App::make(\App\Crons\Stat\Dir\StatCron::class))
             ->name('StatCron')
             ->daily()
             ->runInBackground();

        $schedule->command('queue:work --daemon --stop-when-empty --tries=3')
            ->withoutOverlapping();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
