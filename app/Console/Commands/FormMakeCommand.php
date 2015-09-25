<?php

namespace App\Console\Commands;

use App\Console\Commands\CustomGeneratorCommand;

class FormMakeCommand extends CustomGeneratorCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'bl5:form';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a form admin class';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Form';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__.'/stubs/form.stub';
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\Forms';
    }
}
