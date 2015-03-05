<?php namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputOption;

class AdminControllerMakeCommand extends GeneratorCommand {

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
	protected $description = 'Create a new resource controller class';

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
		if ($this->option('plain'))
		{
			return __DIR__.'/stubs/controller.plain.stub';
		}

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

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return array(
			array('plain', null, InputOption::VALUE_NONE, 'Generate an empty controller class.'),
		);
	}

	/**
	 * Build the class with the given name.
	 *
	 * @param  string  $name
	 * @return string
	 */
	protected function buildClass($name)
	{
		$stub = $this->files->get($this->getStub());

		$stub = $this->replaceModel($stub, $name);
		
		$stub = $this->replaceModelLower($stub, $name);

		return $this->replaceNamespace($stub, $name)->replaceClass($stub, $name);
	}

	/**
	 * Replace the model name for the given stub.
	 *
	 * @param  string  $stub
	 * @param  string  $name
	 * @return string
	 */
	protected function replaceModel($stub, $name)
	{
		$model = str_replace($this->getNamespace($name).'\\', '', $name);		
		$model = str_replace($this->type, '', $model);

		return str_replace('{{Model}}', $model, $stub);
	}

	/**
	 * Replace the model name for the given stub.
	 *
	 * @param  string  $stub
	 * @param  string  $name
	 * @return string
	 */
	protected function replaceModelLower($stub, $name)
	{
		$model = str_replace($this->getNamespace($name).'\\', '', $name);		
		$model = str_replace($this->type, '', $model);

		return str_replace('{{model}}', strtolower($model), $stub);
	}

}
