<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ChangeDefaultReturnResource extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'perovano:resource:change {classes*}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Change default return for collection resource';

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
        /**
         * Get classes from user input
         */
        $classes = $this->argument('classes');

        foreach ($classes as $key => $class) {

            $file_name = "app/Http/Resources/$class/$class" . "Resource.php";

            /**
             * Clear File
             */
            file_put_contents($file_name, "");

            /**
             * File header and namespace
             */
            file_put_contents($file_name, "<?php\n\n", FILE_APPEND);
            file_put_contents($file_name, "namespace App\Http\Resources\\$class;\n\n", FILE_APPEND);
            file_put_contents($file_name, "use Illuminate\Http\Resources\Json\JsonResource;\n\n", FILE_APPEND);
            file_put_contents($file_name, "class " . $class . "Resource extends JsonResource\n", FILE_APPEND);
            file_put_contents($file_name, "{\n", FILE_APPEND);


            file_put_contents($file_name, "\t/**\n", FILE_APPEND);
            file_put_contents($file_name, "\t * Transform the resource into an array.\n", FILE_APPEND);
            file_put_contents($file_name, "\t *\n", FILE_APPEND);
            file_put_contents($file_name, "\t * @param  \Illuminate\Http\Request  \$request\n", FILE_APPEND);
            file_put_contents($file_name, "\t * @return array\n", FILE_APPEND);
            file_put_contents($file_name, "\t*/\n", FILE_APPEND);

            file_put_contents($file_name, "\tpublic function toArray(\$request)\n\t{", FILE_APPEND);


            file_put_contents($file_name, "\n\t\treturn \$this->resource;\n", FILE_APPEND);
            file_put_contents($file_name, "\t}\n", FILE_APPEND);
            file_put_contents($file_name, "}", FILE_APPEND);
        }
    }
}
