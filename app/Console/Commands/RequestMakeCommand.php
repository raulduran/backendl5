<?php

namespace App\Console\Commands;

use App\Console\Commands\CustomGeneratorCommand;

class RequestMakeCommand extends CustomGeneratorCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'bl5:request';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a request admin class';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Request';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__.'/stubs/request.stub';
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\Http\Requests';
    }
}
