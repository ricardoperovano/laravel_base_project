<?php

namespace App\Console\Commands;

use App\Utils\Helper;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class CreateRouterEntry extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'perovano:routes:create {class?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create default routes for resource';

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

        $class = $this->argument('class');

        if ($class) {
            $dash_class = Helper::camelCaseToDash($class);

            file_put_contents('routes/api.php', "\nRoute::group([ 'middleware' => ['auth.jwt'], 'prefix' => '$dash_class' ], function () {\n", FILE_APPEND);
            file_put_contents('routes/api.php', "\tRoute::get('/', '" . $class . "Controller@list');\n", FILE_APPEND);
            file_put_contents('routes/api.php', "\tRoute::get('/{" . lcfirst($class) . "}', '" . $class . "Controller@get');\n", FILE_APPEND);
            file_put_contents('routes/api.php', "\tRoute::post('/', '" . $class . "Controller@create');\n", FILE_APPEND);
            file_put_contents('routes/api.php', "\tRoute::put('/{" . lcfirst($class) . "}', '" . $class . "Controller@update');\n", FILE_APPEND);
            file_put_contents('routes/api.php', "\tRoute::delete('/{" . lcfirst($class) . "}', '" . $class . "Controller@delete');\n", FILE_APPEND);
            file_put_contents('routes/api.php', "});", FILE_APPEND);

            return;
        }

        $files = File::files('app/Models');
        $routes = "";
        $use  = "use Illuminate\Http\Request;\n";
        $use .= "use Illuminate\Support\Facades\Route;";

        foreach ($files as $path) {
            $class = pathinfo($path)['filename'];
            $dash_class = Helper::camelCaseToDash($class);

            $routes .= "\n\t/**\n";
            $routes .= "\t * $class\n";
            $routes .= "\t */";

            $routes .= "\n\tRoute::group(['prefix' => '$dash_class'], function () {\n";
            $routes .= "\t\tRoute::get('/', '" . $class . "Controller@list');\n";
            $routes .= "\t\tRoute::get('/{" . lcfirst($class) . "}', '" . $class . "Controller@get');\n";
            $routes .= "\t\tRoute::post('/', '" . $class . "Controller@create');\n";
            $routes .= "\t\tRoute::put('/{" . lcfirst($class) . "}', '" . $class . "Controller@update');\n";
            $routes .= "\t\tRoute::delete('/{" . lcfirst($class) . "}', '" . $class . "Controller@delete');\n";
            $routes .= "\t});\n";
        }

        $file_name = 'routes/api.php';

        /**
         * Clear File
         */
        file_put_contents($file_name, "");

        /**
         * File header and namespace
         */
        file_put_contents($file_name, "<?php\n\n", FILE_APPEND);
        file_put_contents($file_name, "$use\n", FILE_APPEND);


        file_put_contents($file_name, "\n\nRoute::post('login', 'Auth\APIController@login');", FILE_APPEND);
        file_put_contents($file_name, "\n\nRoute::post('register', 'Auth\APIController@register');", FILE_APPEND);

        file_put_contents($file_name, "\n\nRoute::group(['middleware' => 'auth.jwt'], function () {", FILE_APPEND);
        file_put_contents($file_name, "\n\tRoute::get('logout', 'Auth\APIController@logout');", FILE_APPEND);
        file_put_contents($file_name, "\n\tRoute::post('refresh', 'Auth\APIController@refresh');", FILE_APPEND);


        file_put_contents($file_name, "\n", FILE_APPEND);
        file_put_contents($file_name, $routes, FILE_APPEND);

        file_put_contents($file_name, "});\n", FILE_APPEND);
    }
}
