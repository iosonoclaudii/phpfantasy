<?php

namespace App\Listeners;

use Illuminate\Console\Scheduling\Schedule;

class ScheduleUpdateCreatureStats
{
    public function handle(Schedule $schedule)
    {
        $schedule->command('creature:update-stats')->everyMinute();
    }
}
