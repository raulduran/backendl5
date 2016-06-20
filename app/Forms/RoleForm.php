<?php

namespace App\Forms;

use App\Models\Permission;
use Kris\LaravelFormBuilder\Form;

class RoleForm extends Form
{
    protected function getPermissions()
    {
        return Permission::pluck('label', 'id')->toArray();
    }

    protected function getPermissionsSelected()
    {
        return !isset($this->model->id) ?: $this->model->permissions()->pluck('id')->toArray();
    }

    public function buildForm()
    {
        $this
            ->add('name', 'text', ['label' => trans('messages.name')])
            ->add('label', 'text', ['label' => trans('messages.label')])
            ->add('permissions', 'select', [
                'choices' => $this->getPermissions(),
                'selected' => $this->getPermissionsSelected(),
                'label' => trans('messages.permissions.index'),
                'attr' => [
                    'multiple' => true,
                    'id' => 'permissions'
                ],
            ])
            ->add('task', 'hidden')
        ;
    }
}
