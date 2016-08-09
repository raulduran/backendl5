<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class PermissionForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('name', 'text', ['label' => trans('custom/app.name')])
            ->add('label', 'text', ['label' => trans('custom/app.label')])
            ->add('task', 'hidden')
        ;
    }
}