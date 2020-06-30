<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;

class DefaultsAll extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'perovano:defaults:recreate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Recreates all stuffs automatically';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $files = File::files('app/Models');

        foreach ($files as $path) {
            $class = pathinfo($path)['filename'];
            Artisan::call("perovano:defaults:create $class");
        }
    }
}
