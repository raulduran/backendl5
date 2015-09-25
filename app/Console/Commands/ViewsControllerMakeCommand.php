<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Symfony\Component\Console\Input\InputArgument;

class ViewsControllerMakeCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'bl5:views';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create the views index and show for admin controller class';

    /**
     * The filesystem instance.
     *
     * @var \Illuminate\Filesystem\Filesystem
     */
    protected $files;

    /**
     * Create a new controller creator command instance.
     *
     * @param  \Illuminate\Filesystem\Filesystem  $files
     * @return void
     */
    public function __construct(Filesystem $files)
    {
        parent::__construct();

        $this->files = $files;
    }

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
     * Get the stub file for the generator.
     *
     * @param string  $view
     * @return string
     */
    protected function getStub($view)
    {
        return __DIR__.'/stubs/'.$view.'.blade.stub';
    }

    /**
     * Build the directory for the class if necessary.
     *
     * @param  string  $path
     * @return string
     */
    protected function makeDirectory($path)
    {
        if (! $this->files->isDirectory(dirname($path))) {
            $this->files->makeDirectory(dirname($path), 0777, true, true);
        }
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
        $stub  = str_replace('{{model}}', str_singular($name), $stub);
        $stub  = str_replace('{{models}}', str_plural($name), $stub);

        return $stub;
    }

    public function createView($view)
    {
        $name = $this->getNameInput();

        $stub = $this->files->get($this->getStub($view));

        $stub = $this->replaceModel($stub, $name);

        $path = config('view.paths')[0] . '/'. $name . '/'. $view . '.blade.php';

        if ($this->files->exists($path)) {
            return false;
        }

        $this->makeDirectory($path);

        $this->files->put($path, $stub);

        $this->info('View '.$view.' for '.$name.' controller created successfully.');
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function fire()
    {
        $this->createView('index');
        $this->createView('show');
    }
}
