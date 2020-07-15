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
            file_put_contents($file_name, "use Illuminate\\Database\\QueryException;\n", FILE_APPEND);
            file_put_contents($file_name, "use Illuminate\\Database\\Eloquent\\ModelNotFoundException;\n", FILE_APPEND);
            file_put_contents($file_name, "use Doctrine\Instantiator\Exception\InvalidArgumentException;\n\n", FILE_APPEND);
            file_put_contents($file_name, "/**\n", FILE_APPEND);
            file_put_contents($file_name, " * Class $class" . "Repository\n", FILE_APPEND);
            file_put_contents($file_name, " *\n", FILE_APPEND);
            file_put_contents($file_name, " * @package \App\Repositories\n", FILE_APPEND);
            file_put_contents($file_name, " */\n", FILE_APPEND);
            file_put_contents($file_name, "class " . $class . "Repository extends BaseRepository implements " . $class . "Contract {\n\n", FILE_APPEND);

            /**
             * Constructor
             */
            file_put_contents($file_name, "\t/**\n", FILE_APPEND);
            file_put_contents($file_name, "\t * " . $class . "Repository constructor.\n", FILE_APPEND);
            file_put_contents($file_name, "\t * @param $class \$model\n", FILE_APPEND);
            file_put_contents($file_name, "\t */\n", FILE_APPEND);
            file_put_contents($file_name, "\tpublic function __construct($class \$model)\n", FILE_APPEND);
            file_put_contents($file_name, "\t{\n", FILE_APPEND);
            file_put_contents($file_name, "\t\tparent::__construct(\$model);\n", FILE_APPEND);
            file_put_contents($file_name, "\t\t\$this->model = \$model;\n", FILE_APPEND);
            file_put_contents($file_name, "\t}\n\n", FILE_APPEND);

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
            file_put_contents($file_name, "\tpublic function list$class(int \$skip = 0, int \$take = 10, string \$orderBy = 'id', string \$orderDirection = 'asc', array \$relationships = [], array \$filter = [], \$columns = array('*'), \$search = [])\n\t{\n", FILE_APPEND);

            /**
             * List method scope
             */
            file_put_contents($file_name, "\t\treturn \$this->list(\$skip, \$take, \$orderBy, \$orderDirection, \$relationships, \$filter, \$columns, \$search);\n", FILE_APPEND);

            /**
             * Close list method
             */
            file_put_contents($file_name, "\t}\n\n", FILE_APPEND);


            /**
             * Open get method
             */

            file_put_contents($file_name, "\t/**\n", FILE_APPEND);
            file_put_contents($file_name, "\t * @param int \$id\n", FILE_APPEND);
            file_put_contents($file_name, "\t * @param array \$relationships\n", FILE_APPEND);
            file_put_contents($file_name, "\t * @return $class|mixed\n", FILE_APPEND);
            file_put_contents($file_name, "\t */\n", FILE_APPEND);
            file_put_contents($file_name, "\tpublic function find" . $class . "ById(int \$id, array \$relationships = [])\n\t{\n", FILE_APPEND);


            /**
             * Get method scope
             */
            file_put_contents($file_name, "\t\ttry {\n", FILE_APPEND);
            file_put_contents($file_name, "\t\t\treturn \$this->findOneOrFail(\$id, \$relationships);\n", FILE_APPEND);
            file_put_contents($file_name, "\t\t} catch (ModelNotFoundException \$e){\n", FILE_APPEND);
            file_put_contents($file_name, "\t\t\tthrow new ModelNotFoundException(\$e);\n", FILE_APPEND);
            file_put_contents($file_name, "\t\t}\n", FILE_APPEND);

            /**
             * Close get method
             */
            file_put_contents($file_name, "\t}", FILE_APPEND);



            /**
             * Open add method
             */

            file_put_contents($file_name, "\n\n\t/**", FILE_APPEND);
            file_put_contents($file_name, "\n\t * @param array \$params", FILE_APPEND);
            file_put_contents($file_name, "\n\t * @return $class|mixed", FILE_APPEND);
            file_put_contents($file_name, "\n\t */", FILE_APPEND);
            file_put_contents($file_name, "\n\tpublic function create$class(array \$params)\n\t{\n", FILE_APPEND);

            /**
             * Add method scope
             */
            file_put_contents($file_name, "\t\ttry {\n", FILE_APPEND);
            file_put_contents($file_name, "\t\t\treturn $class::create(\$params);\n", FILE_APPEND);
            file_put_contents($file_name, "\t\t} catch (QueryException \$e){\n", FILE_APPEND);
            file_put_contents($file_name, "\t\t\tthrow new InvalidArgumentException(\$e->getMessage());\n", FILE_APPEND);
            file_put_contents($file_name, "\t\t}\n", FILE_APPEND);

            /**
             * Close add method
             */
            file_put_contents($file_name, "\t}", FILE_APPEND);


            /**
             * Open update method
             */

            file_put_contents($file_name, "\n\n\t/**", FILE_APPEND);
            file_put_contents($file_name, "\n\t * @param array \$params", FILE_APPEND);
            file_put_contents($file_name, "\n\t * @return mixed", FILE_APPEND);
            file_put_contents($file_name, "\n\t */", FILE_APPEND);
            file_put_contents($file_name, "\n\tpublic function update$class(array \$params)\n\t{\n", FILE_APPEND);

            /**
             * Update method scope
             */
            file_put_contents($file_name, "\t\treturn \$this->find$class" . "ById(\$params['id'])->update(\$params);\n", FILE_APPEND);

            /**
             * Close update method
             */
            file_put_contents($file_name, "\t}", FILE_APPEND);


            /**
             * Open delete method
             */
            file_put_contents($file_name, "\n\n\t/**", FILE_APPEND);
            file_put_contents($file_name, "\n\t * @param \$id", FILE_APPEND);
            file_put_contents($file_name, "\n\t * @return bool|mixed", FILE_APPEND);
            file_put_contents($file_name, "\n\t */", FILE_APPEND);
            file_put_contents($file_name, "\n\tpublic function delete$class(\$id)\n\t{\n", FILE_APPEND);

            /**
             * Delete method scope
             */
            file_put_contents($file_name, "\t\treturn \$this->find$class" . "ById(\$id)->delete();\n", FILE_APPEND);

            /**
             * Close delete method
             */
            file_put_contents($file_name, "\t}\n", FILE_APPEND);


            file_put_contents($file_name, "}\n", FILE_APPEND);
        }
    }
}
