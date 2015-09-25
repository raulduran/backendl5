<?php

namespace App\Console\Commands;

use App\Console\Commands\CustomGeneratorCommand;

class ModelMakeCommand extends CustomGeneratorCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'bl5:model';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a model admin class';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Model';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__.'/stubs/model.stub';
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace;
    }
}
