<?php namespace App\Console\Commands;

use App\Console\Commands\CustomGeneratorCommand;

class AdminControllerMakeCommand extends CustomGeneratorCommand {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'bl5:controller';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Create a new admin controller class';

	/**
	 * The type of class being generated.
	 *
	 * @var string
	 */
	protected $type = 'Controller';

	/**
	 * Get the stub file for the generator.
	 *
	 * @return string
	 */
	protected function getStub()
	{
		return __DIR__.'/stubs/controller.stub';
	}

	/**
	 * Get the default namespace for the class.
	 *
	 * @param  string  $rootNamespace
	 * @return string
	 */
	protected function getDefaultNamespace($rootNamespace)
	{
		return $rootNamespace.'\Http\Controllers\Admin';
	}

}