<?php namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;

abstract class CustomGeneratorCommand extends GeneratorCommand {

	/**
	 * Text more info finish
	 *
	 * @var string
	 */
	protected $more_info = null;

	/**
	 * Build the class with the given name.
	 *
	 * @param  string  $name
	 * @return string
	 */
	protected function buildClass($name)
	{
		$this->setMoreInfo($name);

		$stub = $this->files->get($this->getStub());

		$stub = $this->replaceModel($stub, $name);

		return $this->replaceNamespace($stub, $name)->replaceClass($stub, $name);
	}

	/**
	 * Get the more info text.
	 *
	 * @return string
	 */
	protected function getMoreInfo()
	{
		return $this->more_info;
	}

	/**
	 * Replace the more info text.
	 *
	 * @param  string  $name
	 * @return void
	 */
	protected function setMoreInfo($name)
	{
		$model = $model = $this->getModel($name);

		$info = $this->getMoreInfo();

		$info  = str_replace('{{Model}}', ucfirst($model), $info);
		$info  = str_replace('{{Models}}', str_plural(ucfirst($model)), $info);
		$info  = str_replace('{{model}}', str_singular($model), $info);
		$info  = str_replace('{{models}}', str_plural($model), $info);

		$this->more_info = $info;
	}

	/**
	 * Get model name.
	 *
	 * @param  string  $name
	 * @return string
	 */
	protected function getModel($name)
	{
		$model = str_replace($this->getNamespace($name).'\\', '', $name);
		$model = str_replace($this->type, '', $model);
		$model = strtolower((str_singular($model)));

		return $model;
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
		$model = $this->getModel($name);

		$stub  = str_replace('{{Model}}', ucfirst($model), $stub);
		$stub  = str_replace('{{model}}', str_singular($model), $stub);
		$stub  = str_replace('{{models}}', str_plural($model), $stub);

		return $stub;
	}

	/**
	 * Print more info
	 *
	 * @return void	 
	 */
	public function moreInfo()
	{
		if ($this->more_info) $this->info($this->more_info);
	}

	/**
	 * Execute the console command.
	 *
	 * @return void
	 */
	public function fire()
	{
		$name = $this->parseName($this->getNameInput());

		if ($this->files->exists($path = $this->getPath($name)))
		{
			return $this->error($this->type.' already exists!');
		}

		$this->makeDirectory($path);

		$this->files->put($path, $this->buildClass($name));

		$this->info($this->type.' created successfully.');

		$this->moreInfo();
	}

}