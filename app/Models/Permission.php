<?php

namespace App\Models;

class Permission extends ModelApp
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'label'];

    /**
     * Order fields allowed
     * @var array
     */
    protected $order_fields_allowed = ['id', 'name', 'created_at'];

    /**
     * Filters for search request
     * @var array
     */
    protected $filters_for_search = ['permissions.name', 'permissions.label'];

    /**
     * Roles relation
     * @return Roles
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}
