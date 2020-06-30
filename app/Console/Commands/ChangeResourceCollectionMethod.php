<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ChangeResourceCollectionMethod extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'perovano:collection:array {classes*}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Change default method resource collection for a class';

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

            $file_name = "app/Http/Resources/$class/$class" . "ResourceCollection.php";

            /**
             * Clear File
             */
            file_put_contents($file_name, "");

            /**
             * File header and namespace
             */
            file_put_contents($file_name, "<?php\n\n", FILE_APPEND);
            file_put_contents($file_name, "namespace App\Http\Resources\\$class;\n\n", FILE_APPEND);
            file_put_contents($file_name, "use Illuminate\Http\Resources\Json\ResourceCollection;\n\n", FILE_APPEND);
            file_put_contents($file_name, "class " . $class . "ResourceCollection extends ResourceCollection\n", FILE_APPEND);
            file_put_contents($file_name, "{\n", FILE_APPEND);


            file_put_contents($file_name, "\t/**\n", FILE_APPEND);
            file_put_contents($file_name, "\t * Transform the resource collection into an array.\n", FILE_APPEND);
            file_put_contents($file_name, "\t *\n", FILE_APPEND);
            file_put_contents($file_name, "\t * @param  \Illuminate\Http\Request  \$request\n", FILE_APPEND);
            file_put_contents($file_name, "\t * @return array\n", FILE_APPEND);
            file_put_contents($file_name, "\t*/\n", FILE_APPEND);

            file_put_contents($file_name, "\tpublic function toArray(\$request)\n\t{", FILE_APPEND);
            file_put_contents($file_name, "\n\t\treturn \$this->collection->transform(function(\$data){\n", FILE_APPEND);
            file_put_contents($file_name, "\t\t\treturn new " . $class . "Resource(\$data);\n", FILE_APPEND);
            file_put_contents($file_name, "\t\t})->toArray();\n", FILE_APPEND);
            file_put_contents($file_name, "\t}\n", FILE_APPEND);
            file_put_contents($file_name, "}", FILE_APPEND);
        }
    }
}
