<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
    ];

    /**
     * Define the application's command schedule.
     *
     * @param \Illuminate\Console\Scheduling\Schedule $schedule
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            $record = DB::table('users_tokens')->where('expires_at', '<=', Carbon::now()->toDateTimeString())->delete();
        })->weekly()->sundays()->at('00:00');
        $schedule->call(function () {
            $record = DB::table('password_resets')->where('created_at', '<=', Carbon::now()->subMinutes(60)->toDateTimeString())->delete();
        })->weekly()->sundays()->at('00:00');
    }

    /**
     * Register the commands for the application.
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
