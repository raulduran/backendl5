<?php namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class UserForm extends Form
{
	public function buildForm()
	{
		$this
			->add('name', 'text', ['label' => trans('messages.name')])		
			->add('email', 'email', ['label' => trans('messages.email')])
			->add('role', 'select', [
				'choices' => [
					'admin' => trans('messages.role.admin'), 
					'manager' => trans('messages.role.manager'),
					'user' => trans('messages.role.user'), 
				],
				'label' => trans('messages.role')
			])
			->add('password', 'password', ['label' => trans('messages.password')])
			->add('task', 'hidden')
		;
	}
}