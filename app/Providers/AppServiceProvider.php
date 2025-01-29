<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Event;
use Illuminate\Console\Events\Schedule;
use App\Listeners\ScheduleUpdateCreatureStats;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Registra manualmente il listener per l'evento di scheduling
        Event::listen(
            Schedule::class,
            ScheduleUpdateCreatureStats::class,
        );
    }
}
