<?php

namespace App\Core\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel;

class ConsoleKernel extends Kernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        \App\Core\Console\Commands\CategorySearchCommand::class,
        \App\Core\Console\Commands\CategoryCreateCommand::class,
        \App\Core\Console\Commands\CategoryRemoveCommand::class,
        \App\Core\Console\Commands\MovieSearchNameCommand::class,
        \App\Core\Console\Commands\MovieCreateCommand::class,
        \App\Core\Console\Commands\MovieRemoveCommand::class,
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
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('app/Core/console.php');
    }
}
