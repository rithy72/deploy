<?php

namespace App\Console;

use App\Http\Controllers\Base\Logic\OtherLogic\DateTimeLogic;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Mail;

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
         $schedule->command('backup:run --only-db')->everyTenMinutes()->after(function (){
            $appname = config('app.name');
            $dir = storage_path('app');
            $complete = $dir.'\/'.$appname;
            $files = scandir($complete, SCANDIR_SORT_DESCENDING);
            $newest_file = $files[0];
            $body = 'This is the back up of Data'.DateTimeLogic::Instance()
                    ->GetCurrentDateTime(DateTimeLogic::SHOW_DATE_TIME_FORMAT);
            Mail::raw($body, function ($email) use ($complete, $newest_file){
                $email->from('Hy Touch System')
                    ->to('chansotheabo46@gmail.com')
                    ->attach($complete.'\/'.$newest_file)
                    ->subject('Database Backup');
            });
         });
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
