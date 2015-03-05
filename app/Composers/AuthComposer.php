<?php namespace App\Composers;

use Illuminate\Contracts\View\View;
use Illuminate\Auth\Guard;

class AuthComposer {

	protected $auth;

	public function __construct(Guard $auth)
	{
		$this->auth = $auth;
	}

	public function compose(View $view)
	{
		$view->with('auth', $this->auth->user());
	}

}