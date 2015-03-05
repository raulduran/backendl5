<?php namespace App\Console\Commands;

use App\Console\Commands\CustomGeneratorCommand;

class RepositoryMakeCommand extends CustomGeneratorCommand {

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

}
