<?php

namespace App\Console;

use App\Console\Commands\AddProviderClass;
use App\Console\Commands\ChangeDefaultReturnResource;
use App\Console\Commands\ChangeResourceCollectionMethod;
use App\Console\Commands\CreateDefaultController;
use App\Console\Commands\CreateDefaultRequests;
use App\Console\Commands\CreateDefaults;
use App\Console\Commands\CreateInterface;
use App\Console\Commands\CreateRepository;
use App\Console\Commands\CreateRouterEntry;
use App\Console\Commands\DefaultsAll;
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
        AddProviderClass::class,
        ChangeResourceCollectionMethod::class,
        CreateDefaultController::class,
        CreateDefaultRequests::class,
        CreateDefaults::class,
        CreateInterface::class,
        CreateRepository::class,
        CreateRouterEntry::class,
        ChangeDefaultReturnResource::class,
        DefaultsAll::class
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
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
