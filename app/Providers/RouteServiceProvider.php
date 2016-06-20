<?php

namespace App\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to the controller routes in your routes file.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Array router models
     *
     * @var array
     */
    protected $models = [
        'users' => 'App\Models\User',
        'roles' => 'App\Models\Role',
        'permissions' => 'App\Models\Permission',
    ];

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function boot(Router $router)
    {
        parent::boot($router);

        $this->setRouterModels($router);
    }

    /**
     * Set router model
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    protected function setRouterModels(Router $router)
    {
        foreach ($this->models as $key => $model) {
            $router->model($key, $model);
        }
    }

    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function map(Router $router)
    {
        $router->group(['namespace' => $this->namespace], function ($router) {
            require app_path('Http/routes.php');
        });
    }
}
