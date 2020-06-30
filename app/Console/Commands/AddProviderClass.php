<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class AddProviderClass extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'perovano:provider:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create an abstract class to provide all the repositories interface binds';

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
        $arrayString = "\tconst PROVIDERS = [\n";
        $use = "";
        foreach ($files as $path) {
            $class = pathinfo($path)['filename'];
            $use .= "use App\Repositories\\$class" . "Repository;\n";
            $use .= "use App\Contracts\\$class" . "Contract;\n";

            $arrayString .= "\t\t$class" . "Contract::class => " . $class . "Repository::class,\n";
        }

        $arrayString .= "\t];\n";

        $file_name = 'app/Utils/AppProviderMap.php';

        /**
         * Clear File
         */
        file_put_contents($file_name, "");

        /**
         * File header and namespace
         */
        file_put_contents($file_name, "<?php\n\n", FILE_APPEND);
        file_put_contents($file_name, "namespace App\Utils;\n\n", FILE_APPEND);
        file_put_contents($file_name, "$use\n", FILE_APPEND);
        file_put_contents($file_name, "abstract class AppProviderMap\n", FILE_APPEND);
        file_put_contents($file_name, "{\n", FILE_APPEND);
        file_put_contents($file_name, $arrayString, FILE_APPEND);
        file_put_contents($file_name, "}", FILE_APPEND);
    }
}
