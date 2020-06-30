<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class CreateDefaultRequests extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'perovano:request:create {classes*}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create default requests';

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
        $classes = $this->argument('classes');

        foreach ($classes as $class) {
            Artisan::call("make:request $class/Add" . $class . 'Request');
            Artisan::call("make:request $class/Update" . $class . 'Request');
        }
    }
}
