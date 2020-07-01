<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class CreateDefaultController extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'perovano:controller:create {classes*}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Controller and default methods';

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
            /**
             * Create class controller
             */
            Artisan::call("make:controller $class" . "Controller");

            $file_name = "app/Http/Controllers/$class" . "Controller.php";

            /**
             * Clear File
             */
            file_put_contents($file_name, "");

            /**
             * File header and namespace
             */
            file_put_contents($file_name, "<?php\n\n", FILE_APPEND);
            file_put_contents($file_name, "namespace App\Http\Controllers;\n\n", FILE_APPEND);
            file_put_contents($file_name, "use App\\Http\Requests\\$class\\Add" . $class . "Request;\n", FILE_APPEND);
            file_put_contents($file_name, "use App\\Http\Requests\\$class\\Update" . $class . "Request;\n", FILE_APPEND);
            file_put_contents($file_name, "use App\\Http\Resources\\$class\\" . $class . "Resource;\n", FILE_APPEND);
            file_put_contents($file_name, "use App\\Http\Resources\\$class\\" . $class . "ResourceCollection;\n", FILE_APPEND);
            file_put_contents($file_name, "use App\\Contracts\\" . $class . "Contract;\n", FILE_APPEND);
            file_put_contents($file_name, "use App\\Models\\" . $class . ";\n", FILE_APPEND);
            file_put_contents($file_name, "use Illuminate\Http\Request;\n\n", FILE_APPEND);
            file_put_contents($file_name, "/**\n", FILE_APPEND);
            file_put_contents($file_name, "* @group $class\n", FILE_APPEND);
            file_put_contents($file_name, "*/\n", FILE_APPEND);
            file_put_contents($file_name, "class " . $class . "Controller extends Controller\n", FILE_APPEND);
            file_put_contents($file_name, "{\n\n", FILE_APPEND);

            /**
             * Construct method
             */

            file_put_contents($file_name, "\t/**\n", FILE_APPEND);
            file_put_contents($file_name, "\t * " . $class . "Controller constructor.\n", FILE_APPEND);
            file_put_contents($file_name, "\t * @param Request \$request\n", FILE_APPEND);
            file_put_contents($file_name, "\t * @param " . $class . "Contract \$" . lcfirst($class) . "Repository\n", FILE_APPEND);
            file_put_contents($file_name, "\t */\n", FILE_APPEND);

            file_put_contents($file_name, "\tpublic function __construct(Request \$request, " . $class . "Contract \$" . lcfirst($class) . "Repository)\n", FILE_APPEND);
            file_put_contents($file_name, "\t{\n", FILE_APPEND);
            file_put_contents($file_name, "\t\tparent::__construct(\$request);\n\n", FILE_APPEND);

            file_put_contents($file_name, "\t\t/**\n", FILE_APPEND);
            file_put_contents($file_name, "\t\t * Get $class Repository.\n", FILE_APPEND);
            file_put_contents($file_name, "\t\t */\n", FILE_APPEND);
            file_put_contents($file_name, "\t\t\$this->repository = \$" . lcfirst($class) . "Repository;\n\n", FILE_APPEND);

            file_put_contents($file_name, "\t\t/**\n", FILE_APPEND);
            file_put_contents($file_name, "\t\t * Especify fields to return.\n", FILE_APPEND);
            file_put_contents($file_name, "\t\t * The Id field is automatically returned.\n", FILE_APPEND);
            file_put_contents($file_name, "\t\t * Example.: \$this->showColumns = array_merge(\$this->showColumns, [\"fieldName\" => \"Column Title\"]);\n", FILE_APPEND);
            file_put_contents($file_name, "\t\t */\n", FILE_APPEND);
            file_put_contents($file_name, "\t\t\$this->showColumns = array_merge(\$this->showColumns, [/*\"fieldName\" => \"Column Title\"*/]);\n", FILE_APPEND);
            file_put_contents($file_name, "\t}\n\n", FILE_APPEND);


            /**
             * Open list method
             */

            file_put_contents($file_name, "\t/**\n", FILE_APPEND);
            file_put_contents($file_name, "\t * Listar \n", FILE_APPEND);
            file_put_contents($file_name, "\t * Lista de $class \n", FILE_APPEND);
            file_put_contents($file_name, "\t * @queryParam take Quantidade de registros que será retornado Ex: 20 \n", FILE_APPEND);
            file_put_contents($file_name, "\t * @queryParam take Quantidade de registros que será retornado Ex: 20 \n", FILE_APPEND);
            file_put_contents($file_name, "\t * @queryParam skip Quantidade de registros para saltar Ex: 20 \n", FILE_APPEND);
            file_put_contents($file_name, "\t * @queryParam order Nome do campo para ordenar Ex: nome \n", FILE_APPEND);
            file_put_contents($file_name, "\t * @queryParam orderDirection Direção da ordenação Ex: asc, desc \n", FILE_APPEND);
            file_put_contents($file_name, "\t * @queryParam search Texto para ser utilizado como pesquisa entre os registros \n", FILE_APPEND);
            file_put_contents($file_name, "\t * @authenticated \n", FILE_APPEND);
            file_put_contents($file_name, "\t * \n", FILE_APPEND);
            file_put_contents($file_name, "\t * @return " . $class . "ResourceCollection\n", FILE_APPEND);
            file_put_contents($file_name, "\t */\n", FILE_APPEND);
            file_put_contents($file_name, "\tpublic function list()\n\t{\n", FILE_APPEND);


            /**
             * List method scope
             */
            file_put_contents($file_name, "\t\t\$resource = \$this->repository->list$class(\n\t\t\t\$this->skip,\n \t\t\t\$this->take,\n \t\t\t\$this->order,\n \t\t\t\$this->orderDirection,\n \t\t\t\$this->relationships,\n \t\t\tarray_merge(['empresa_id' => \$this->currentCompany()->id], \$this->filter),\n \t\t\tarray('*'),\n \t\t\t\$this->search\n\t\t);\n\n", FILE_APPEND);

            file_put_contents($file_name, "\t\t\$total_records = \$this->currentCompany(['" . lcfirst($class) . "s'])->" . lcfirst($class) . "s->count();\n", FILE_APPEND);
            file_put_contents($file_name, "\t\t\$total_filtered = \$this->search ? \$resource->count() : \$total_records;\n\n", FILE_APPEND);

            file_put_contents($file_name, "\t\t\$data = [\n", FILE_APPEND);
            file_put_contents($file_name, "\t\t\t'total_records'    => \$total_records,\n", FILE_APPEND);
            file_put_contents($file_name, "\t\t\t'total_filtered'   => \$total_filtered,\n", FILE_APPEND);
            file_put_contents($file_name, "\t\t\t'order'            => [\n\t\t\t\t'column' \t=> \$this->order, \n\t\t\t\t'direction' => \$this->orderDirection\n\t\t\t],\n", FILE_APPEND);
            file_put_contents($file_name, "\t\t\t'data'             => new " . $class . "ResourceCollection(\$resource),\n", FILE_APPEND);
            file_put_contents($file_name, "\t\t\t'columns'		    => \$this->showColumns,\n", FILE_APPEND);
            file_put_contents($file_name, "\t\t];\n\n", FILE_APPEND);
            file_put_contents($file_name, "\t\treturn \$this->responseJson(false, 200, \"\", \$data);\n", FILE_APPEND);

            /**
             * Close list method
             */
            file_put_contents($file_name, "\t}\n\n", FILE_APPEND);


            /**
             * Open get method
             */

            file_put_contents($file_name, "\t/**\n", FILE_APPEND);
            file_put_contents($file_name, "\t * Consultar \n", FILE_APPEND);
            file_put_contents($file_name, "\t * Esta rota retorna um $class especifico \n", FILE_APPEND);
            file_put_contents($file_name, "\t * \n", FILE_APPEND);
            file_put_contents($file_name, "\t * @urlParam " . lcfirst($class) . " required Id do $class \n", FILE_APPEND);
            file_put_contents($file_name, "\t * @authenticated \n", FILE_APPEND);
            file_put_contents($file_name, "\t * \n", FILE_APPEND);
            file_put_contents($file_name, "\t * @param int \$id\n", FILE_APPEND);
            file_put_contents($file_name, "\t * @return " . $class . "Resource\n", FILE_APPEND);
            file_put_contents($file_name, "\t */\n", FILE_APPEND);
            file_put_contents($file_name, "\tpublic function get(\$id)\n\t{\n", FILE_APPEND);


            /**
             * Get method scope
             */
            file_put_contents($file_name, "\t\t\$data = \$this->repository->find$class" . "ById(\$id); \n\n", FILE_APPEND);
            file_put_contents($file_name, "\t\treturn \$this->responseJson(false, 200, \"\", new " . $class . "Resource(\$data));\n", FILE_APPEND);

            /**
             * Close get method
             */
            file_put_contents($file_name, "\t}", FILE_APPEND);


            /**
             * Open add method
             */

            file_put_contents($file_name, "\n\n\t/**\n", FILE_APPEND);
            file_put_contents($file_name, "\t * Adicionar \n", FILE_APPEND);
            file_put_contents($file_name, "\t * Esta rota cria um novo $class \n", FILE_APPEND);
            file_put_contents($file_name, "\t * \n", FILE_APPEND);
            file_put_contents($file_name, "\t * @authenticated \n", FILE_APPEND);
            file_put_contents($file_name, "\t * ", FILE_APPEND);
            file_put_contents($file_name, "\n\t * @param Add" . $class . "Request \$request", FILE_APPEND);
            file_put_contents($file_name, "\n\t * @return \Illuminate\Http\JsonResponse", FILE_APPEND);
            file_put_contents($file_name, "\n\t */", FILE_APPEND);
            file_put_contents($file_name, "\n\tpublic function create(Add" . $class . "Request \$request)\n\t{\n", FILE_APPEND);

            /**
             * Add method scope
             */
            file_put_contents($file_name, "\t\t\$" . lcfirst($class) . " = \$this->repository->create$class(\n", FILE_APPEND);
            file_put_contents($file_name, "\t\t\tarray_merge(\$request->all(), [\n\t\t\t\t'empresa_id' => \$this->currentCompany()->id\n\t\t\t])\n", FILE_APPEND);
            file_put_contents($file_name, "\t\t);\n\n", FILE_APPEND);
            file_put_contents($file_name, "\t\treturn \$this->responseJson(false, 200, \"Registro Incluído com Sucesso\", new " . $class . "Resource(\$" . lcfirst($class) . "));\n", FILE_APPEND);

            /**
             * Close add method
             */
            file_put_contents($file_name, "\t}", FILE_APPEND);


            /**
             * Open update method
             */

            file_put_contents($file_name, "\n\n\t/**\n", FILE_APPEND);
            file_put_contents($file_name, "\t * Modificar \n", FILE_APPEND);
            file_put_contents($file_name, "\t * Esta rota faz alterações no cadastro de $class \n", FILE_APPEND);
            file_put_contents($file_name, "\t * @urlParam " . lcfirst($class) . " required Id do $class \n", FILE_APPEND);
            file_put_contents($file_name, "\t * \n", FILE_APPEND);
            file_put_contents($file_name, "\t * @authenticated \n", FILE_APPEND);
            file_put_contents($file_name, "\t * ", FILE_APPEND);
            file_put_contents($file_name, "\n\t * @param \App\Models\\$class \$" . lcfirst($class) . "", FILE_APPEND);
            file_put_contents($file_name, "\n\t * @param Update" . $class . "Request \$request", FILE_APPEND);
            file_put_contents($file_name, "\n\t * @return \Illuminate\Http\JsonResponse", FILE_APPEND);
            file_put_contents($file_name, "\n\t */", FILE_APPEND);
            file_put_contents($file_name, "\n\tpublic function update($class \$" . lcfirst($class) . ", Update" . $class . "Request \$request)\n\t{\n", FILE_APPEND);

            /**
             * Update method scope
             */
            file_put_contents($file_name, "\t\t\$this->repository->update$class(array_merge(request()->all(), [\"id\" => \$" . lcfirst($class) . "->id]));\n\n", FILE_APPEND);
            file_put_contents($file_name, "\t\treturn \$this->responseJson(false, 200, \"Registro Atualizado com Sucesso\", new " . $class . "Resource(\$" . lcfirst($class) . "->fresh()));\n", FILE_APPEND);

            /**
             * Close update method
             */
            file_put_contents($file_name, "\t}", FILE_APPEND);


            /**
             * Open delete method
             */
            file_put_contents($file_name, "\n\n\t/**\n", FILE_APPEND);
            file_put_contents($file_name, "\t * Excluir \n", FILE_APPEND);
            file_put_contents($file_name, "\t * Esta rota exclui o(s) registro(s) passado como parâmetro {" . lcfirst($class) . "} na url \n", FILE_APPEND);
            file_put_contents($file_name, "\t * @urlParam " . lcfirst($class) . " required Ids que serão excluídos separados por virgula Ex: 1,20,55 \n", FILE_APPEND);
            file_put_contents($file_name, "\t * \n", FILE_APPEND);
            file_put_contents($file_name, "\t * @authenticated \n", FILE_APPEND);
            file_put_contents($file_name, "\t * ", FILE_APPEND);
            file_put_contents($file_name, "\n\t * @param \App\Models\\$class \$" . lcfirst($class) . "", FILE_APPEND);
            file_put_contents($file_name, "\n\t * @return \Illuminate\Http\JsonResponse", FILE_APPEND);
            file_put_contents($file_name, "\n\t */", FILE_APPEND);
            file_put_contents($file_name, "\n\tpublic function delete($class \$" . lcfirst($class) . ")\n\t{\n", FILE_APPEND);

            /**
             * Delete method scope
             */
            file_put_contents($file_name, "\t\t\$this->repository->delete$class(\$" . lcfirst($class) . "->id);\n\n", FILE_APPEND);

            file_put_contents($file_name, "\t\treturn \$this->responseJson(false, 204, \"Registro Excluído com Sucesso\");\n", FILE_APPEND);

            /**
             * Close delete method
             */
            file_put_contents($file_name, "\t}", FILE_APPEND);


            /**
             * Close Class
             */
            file_put_contents($file_name, "\n}", FILE_APPEND);
        }
    }
}
