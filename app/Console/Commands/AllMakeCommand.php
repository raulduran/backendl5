<?php namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputArgument;

class AllMakeCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'bl5:all';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create all resources for a entity';


    /**
     * Get the desired class name from the input.
     *
     * @return string
     */
    protected function getNameInput()
    {
        return strtolower(str_plural($this->argument('name')));
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return array(
            array('name', InputArgument::REQUIRED, 'The name of resource'),
        );
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function fire()
    {
        $name = $this->getNameInput();

        //Create controller
        $this->call('bl5:controller', ['name' => ucfirst($name).'Controller']);
        //Create views
        $this->call('bl5:views', ['name' => $name]);
        //Create request
        $this->call('bl5:request', ['name' => str_singular(ucfirst($name)).'Request']);
        //Create form
        $this->call('bl5:form', ['name' => str_singular(ucfirst($name)).'Form']);
        //Create repositroy
        $this->call('bl5:repository', ['name' => str_singular(ucfirst($name)).'Repository']);
        //Create model
        $this->call('bl5:model', ['name' => str_singular(ucfirst($name))]);
        //Migration table
        $this->call('make:migration:schema', ['name' => 'create_'.$name.'_table', '--schema' => 'name:string']);
    }
}
