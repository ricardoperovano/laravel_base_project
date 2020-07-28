<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CreateInterface extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'perovano:interface:create {classes*}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create default repository interface for models';

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

            $file_path = 'app/Contracts/';

            if (!is_dir($file_path)) mkdir($file_path);

            $file_name = $file_path . $class . 'Contract.php';

            /**
             * Clear File
             */
            file_put_contents($file_name, "");

            /**
             * Create model repositories interface
             */
            file_put_contents($file_name, "<?php\n\n", FILE_APPEND);
            file_put_contents($file_name, "namespace App\Contracts;\n\n", FILE_APPEND);
            file_put_contents($file_name, "/**\n", FILE_APPEND);
            file_put_contents($file_name, " * Interface " . $class . "Contract\n", FILE_APPEND);
            file_put_contents($file_name, " * @package App\Contracts\n", FILE_APPEND);
            file_put_contents($file_name, " */\n", FILE_APPEND);

            file_put_contents($file_name, "interface " . $class . "Contract{\n\n", FILE_APPEND);

            file_put_contents($file_name, "}", FILE_APPEND);
        }
    }
}
