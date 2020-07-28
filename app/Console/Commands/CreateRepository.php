<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CreateRepository extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'perovano:repository:create {classes*}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create repository';

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

            $file_path = 'app/Repositories/';

            if (!is_dir($file_path)) mkdir($file_path);

            $file_name = $file_path . $class . 'Repository.php';

            /**
             * Clear File
             */
            file_put_contents($file_name, "");

            /**
             * Create data access object
             */
            file_put_contents($file_name, "<?php\n\n", FILE_APPEND);
            file_put_contents($file_name, "namespace App\Repositories;\n\n", FILE_APPEND);
            file_put_contents($file_name, "use App\\Models\\$class;\n", FILE_APPEND);
            file_put_contents($file_name, "use App\\Contracts\\$class" . "Contract;\n", FILE_APPEND);

            file_put_contents($file_name, "/**\n", FILE_APPEND);
            file_put_contents($file_name, " * Class $class" . "Repository\n", FILE_APPEND);
            file_put_contents($file_name, " *\n", FILE_APPEND);
            file_put_contents($file_name, " * @package \App\Repositories\n", FILE_APPEND);
            file_put_contents($file_name, " */\n", FILE_APPEND);
            file_put_contents($file_name, "class " . $class . "Repository extends BaseRepository implements " . $class . "Contract {\n\n", FILE_APPEND);

            file_put_contents($file_name, "\tprotected \$model = $class::class;", FILE_APPEND);

            file_put_contents($file_name, "}\n", FILE_APPEND);
        }
    }
}
