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
            ->add('name', 'text', ['label' => trans('custom/app.name')])
            ->add('email', 'email', ['label' => trans('custom/app.email')])
            ->add('roles', 'select', [
                'choices' => $this->getRoles(),
                'selected' => $this->getRolesSelected(),
                'label' => trans('custom/app.roles.index'),
                'attr' => [
                    'multiple' => true,
                    'id' => 'roles',
                    'name' => 'roles[]'
                ],
            ])
            ->add('password', 'password', [
                'value' => '',
                'label' => trans('custom/app.password')
            ])
            ->add('task', 'hidden')
        ;
    }
}
