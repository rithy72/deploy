<?php

namespace App\Console;

use App\Http\Controllers\Base\Logic\NotificationLogic;
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
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        //Backup Database
         $schedule->command('backup:run --only-db')->dailyAt('23:00')->timezone('Asia/Bangkok')
             ->withoutOverlapping()->after(function (){
              NotificationLogic::Instance()->SendBackupFile();
         });
         //Clear Old Backup File
        $schedule->command('backup:clear')->sundays()->withoutOverlapping();
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
