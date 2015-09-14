<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        \App\Console\Commands\AllMakeCommand::class,
        \App\Console\Commands\AdminControllerMakeCommand::class,
        \App\Console\Commands\ApiControllerMakeCommand::class,
        \App\Console\Commands\RepositoryMakeCommand::class,
        \App\Console\Commands\RequestMakeCommand::class,
        \App\Console\Commands\FormMakeCommand::class,
        \App\Console\Commands\ModelMakeCommand::class,
        \App\Console\Commands\ViewsControllerMakeCommand::class
    ];
}
