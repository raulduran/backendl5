<?php

namespace App\Models\Traits;

trait UserBootable {

    /**
     * Auto boot user functions
     * 
     * @return void
     */
    public static function bootUserBootable()
    {
        $request = request();

        static::saved(function ($model) use ($request) {

            //Set Roles
            if ($request->has('roles')) {
                $model->roles()->sync($request->get('roles', []));
            }

        });
    }

}