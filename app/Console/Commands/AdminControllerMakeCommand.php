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

	protected function createClass()
	{
		$name = $this->parseName($this->getNameInput());

		if ($this->files->exists($path = $this->getPath($name)))
		{
			return $this->error($this->type.' already exists!');
		}

		$this->makeDirectory($path);

		$this->files->put($path, $this->buildClass($name));

		$this->info($this->type.' created successfully.');
	}

	protected function createView($view, $name)
	{
		$name = $this->parseName($this->getNameInput());

		$stub = $this->files->get(__DIR__.'/stubs/'.$view.'.blade.stub');

		$path = config('view.paths') . $name . '/' . $view.'.blade.php';

		if ($this->files->exists($path))
		{
			return $this->error($this->type.' already exists!');
		}

		$this->makeDirectory($path);

		$this->files->put($path, $stub);
	}

	/**
	 * Execute the console command.
	 *
	 * @return void
	 */
	public function fire()
	{
		$this->createView('index');
		exit();
		$this->createClass();
	}

}