<?php

namespace App\Forms;

use App\Models\Role;
use Kris\LaravelFormBuilder\Form;

class UserForm extends Form
{
    protected function getRoles()
    {
        return Role::pluck('label', 'id')->toArray();
    }

    protected function getRolesSelected()
    {
        return !isset($this->model->id) ?: $this->model->roles()->pluck('id')->toArray();
    }

    public function buildForm()
    {
        $this
            ->add('name', 'text', ['label' => trans('messages.name')])
            ->add('email', 'email', ['label' => trans('messages.email')])
            ->add('roles', 'select', [
                'choices' => $this->getRoles(),
                'selected' => $this->getRolesSelected(),
                'label' => trans('messages.roles.index'),
                'attr' => [
                    'multiple' => true,
                    'id' => 'roles',
                    'name' => 'roles[]'
                ],
            ])
            ->add('password', 'password', [
                'value' => '',
                'label' => trans('messages.password')
            ])
            ->add('task', 'hidden')
        ;
    }
}
