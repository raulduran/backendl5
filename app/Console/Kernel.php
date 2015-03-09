<?php namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel {

	/**
	 * The Artisan commands provided by your application.
	 *
	 * @var array
	 */
	protected $commands = [
		'App\Console\Commands\AllMakeCommand',
		'App\Console\Commands\AdminControllerMakeCommand',
		'App\Console\Commands\ApiControllerMakeCommand',
		'App\Console\Commands\RepositoryMakeCommand',
		'App\Console\Commands\RequestMakeCommand',
		'App\Console\Commands\FormMakeCommand',
		'App\Console\Commands\ModelMakeCommand',
		'App\Console\Commands\ViewsControllerMakeCommand',
	];

}
