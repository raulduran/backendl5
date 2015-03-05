<?php namespace App\Composers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class RouteComposer {

	protected $request;

	public function __construct(Request $request)
	{
		$this->request = $request;
	}

	protected function getRoute()
	{
		$route = array();

		$segments = $this->request->segments();

		if (count($segments)>1)
		{
			$route[] = $segments[1];
		}
		else
		{
			return ['current' => 'dashboard', 'table' => null];
		}

		// admin/users/2/edit
		if (count($segments)>3)
		{
			$route[] = $segments[3];
		}
		// admin/users/create or admin/users/2 or admin/users/delete
		else if (count($segments)==3)
		{
			$route[] = (is_numeric($segments[2])) ? 'show' : $segments[2];
		}
		// admin/users/
		else
		{
			$route[] = 'index';
		}

		return ['current' => implode('.', $route), 'table' => $segments[1]];
	}

	public function compose(View $view)
	{
		$view->with('route', $this->getRoute());
	}

}