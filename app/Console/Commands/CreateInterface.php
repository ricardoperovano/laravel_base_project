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

            /**
             * Open list method
             */

            file_put_contents($file_name, "\t/**\n", FILE_APPEND);
            file_put_contents($file_name, "\t * @param int \$skip\n", FILE_APPEND);
            file_put_contents($file_name, "\t * @param int \$take\n", FILE_APPEND);
            file_put_contents($file_name, "\t * @param string \$orderBy\n", FILE_APPEND);
            file_put_contents($file_name, "\t * @param string \$orderDirection\n", FILE_APPEND);
            file_put_contents($file_name, "\t * @param array \$relationships\n", FILE_APPEND);
            file_put_contents($file_name, "\t * @param array \$filter\n", FILE_APPEND);
            file_put_contents($file_name, "\t * @param array \$columns\n", FILE_APPEND);
            file_put_contents($file_name, "\t * @param string \$search\n", FILE_APPEND);
            file_put_contents($file_name, "\t * @return mixed\n", FILE_APPEND);
            file_put_contents($file_name, "\t */\n", FILE_APPEND);
            file_put_contents($file_name, "\tpublic function list$class(int \$skip = 0, int \$take = 10, string \$orderBy = 'id', string \$orderDirection = 'asc', array \$relationships = [], array \$filter = [], \$columns = array('*'), \$search = [], \$join = null);\n\n", FILE_APPEND);

            /**
             * Open get method
             */

            file_put_contents($file_name, "\t/**\n", FILE_APPEND);
            file_put_contents($file_name, "\t * @param int \$id\n", FILE_APPEND);
            file_put_contents($file_name, "\t * @param array \$relationships\n", FILE_APPEND);
            file_put_contents($file_name, "\t * @return $class|mixed\n", FILE_APPEND);
            file_put_contents($file_name, "\t */\n", FILE_APPEND);
            file_put_contents($file_name, "\tpublic function find" . $class . "ById(int \$id, array \$relationships = []);\n\n", FILE_APPEND);

            /**
             * Open add method
             */
            file_put_contents($file_name, "\t/**", FILE_APPEND);
            file_put_contents($file_name, "\n\t * @param array \$params", FILE_APPEND);
            file_put_contents($file_name, "\n\t * @return $class|mixed", FILE_APPEND);
            file_put_contents($file_name, "\n\t */", FILE_APPEND);
            file_put_contents($file_name, "\n\tpublic function create$class(array \$params);\n\n", FILE_APPEND);

            /**
             * Open update method
             */
            file_put_contents($file_name, "\t/**", FILE_APPEND);
            file_put_contents($file_name, "\n\t * @param array \$params", FILE_APPEND);
            file_put_contents($file_name, "\n\t * @return mixed", FILE_APPEND);
            file_put_contents($file_name, "\n\t */", FILE_APPEND);
            file_put_contents($file_name, "\n\tpublic function update$class(array \$params);\n\n", FILE_APPEND);

            /**
             * Open delete method
             */
            file_put_contents($file_name, "\t/**", FILE_APPEND);
            file_put_contents($file_name, "\n\t * @param \$id", FILE_APPEND);
            file_put_contents($file_name, "\n\t * @return bool|mixed", FILE_APPEND);
            file_put_contents($file_name, "\n\t */", FILE_APPEND);
            file_put_contents($file_name, "\n\tpublic function delete$class(\$id);\n\n", FILE_APPEND);

            file_put_contents($file_name, "}", FILE_APPEND);
        }
    }
}
