<?php namespace App\Composers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class MenusComposer
{
    protected $menus;
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->menus = Config::get('menus');
    }

    public function compose(View $view)
    {
        $view->with(['menus' => $this->menus, 'active' => $this->request->segment(2)]);
    }
}
