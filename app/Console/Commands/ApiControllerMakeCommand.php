<?php namespace App\Console\Commands;

use App\Console\Commands\CustomGeneratorCommand;

class ApiControllerMakeCommand extends CustomGeneratorCommand {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'bl5:apicontroller';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Create a new api controller class';

	/**
	 * The type of class being generated.
	 *
	 * @var string
	 */
	protected $type = 'Controller';

	/**
	 * Text more info finish
	 *
	 * @var string
	 */
	protected $more_info = "
		//Add routes in app/Http/routes.php into group api
		//{{Models}}
		Route::resource('{{models}}', 'Api\{{Models}}Controller', ['only' => ['index', 'show']]);";

	/**
	 * Get the stub file for the generator.
	 *
	 * @return string
	 */
	protected function getStub()
	{
		return __DIR__.'/stubs/api-controller.stub';
	}

	/**
	 * Get the default namespace for the class.
	 *
	 * @param  string  $rootNamespace
	 * @return string
	 */
	protected function getDefaultNamespace($rootNamespace)
	{
		return $rootNamespace.'\Http\Controllers\Api';
	}

}