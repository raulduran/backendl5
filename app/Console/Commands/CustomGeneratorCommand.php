<?php namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;

abstract class CustomGeneratorCommand extends GeneratorCommand {

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
		$model = strtolower((str_singular($model)));

		$stub  = str_replace('{{Model}}', ucfirst($model), $stub);
		$stub  = str_replace('{{model}}', str_singular($model), $stub);
		$stub  = str_replace('{{models}}', str_plural($model), $stub);

		return $stub;
	}

}