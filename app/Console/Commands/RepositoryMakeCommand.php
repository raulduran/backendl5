<?php namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;

class RepositoryMakeCommand extends GeneratorCommand {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'bl5:repository';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Create a new repository class';

	/**
	 * The type of class being generated.
	 *
	 * @var string
	 */
	protected $type = 'Repository';

	/**
	 * Get the stub file for the generator.
	 *
	 * @return string
	 */
	protected function getStub()
	{
		return __DIR__.'/stubs/repository.stub';
	}

	/**
	 * Get the default namespace for the class.
	 *
	 * @param  string  $rootNamespace
	 * @return string
	 */
	protected function getDefaultNamespace($rootNamespace)
	{
		return $rootNamespace.'\Repositories';
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
