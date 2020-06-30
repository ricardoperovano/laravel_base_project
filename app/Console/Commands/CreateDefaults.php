<?php

namespace App\Console\Commands;

use App\Utils\Helper;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;

class CreateDefaults extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'perovano:defaults:create {classes*}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create all helper classes for the application';

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

            Artisan::call('make:model Models\\\\' . $class . ' -m');
            Artisan::call('make:observer ' . $class . 'Observer --model=Models\\\\' . $class);
            Artisan::call('make:controller ' . $class . 'Controller');
            Artisan::call("make:resource $class/$class" . 'Resource');
            Artisan::call("make:resource $class/$class" . 'ResourceCollection --collection');
            Artisan::call("perovano:repository:create $class");
            Artisan::call("perovano:resource:change $class");
            Artisan::call("perovano:interface:create $class");
            Artisan::call("perovano:controller:create $class");
            Artisan::call("perovano:request:create $class");
            Artisan::call("perovano:collection:array $class");

            $this->refactorRequest($class);
        }

        Artisan::call("perovano:routes:create");
        Artisan::call("perovano:provider:create");
    }

    private function refactorRequest($class)
    {

        $file_name = "app/Http/Requests/$class/Add$class" . "Request.php";

        $requestFileContent = file_get_contents($file_name);
        $search = "return false;";
        $replace = "return auth()->user()->can('incluir_" . Helper::camelCaseToUnderscore($class) . "s');";
        $requestFileContent = str_replace($search, $replace, $requestFileContent);
        file_put_contents($file_name, $requestFileContent);

        /**
         * Update permission
         */
        $file_name = "app/Http/Requests/$class/Update$class" . "Request.php";

        $requestFileContent = file_get_contents($file_name);
        $search = "return false;";
        $replace = "return auth()->user()->can('editar_" . Helper::camelCaseToUnderscore($class) . "s');";
        $requestFileContent = str_replace($search, $replace, $requestFileContent);
        file_put_contents($file_name, $requestFileContent);
    }
}
