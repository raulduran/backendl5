<?php

namespace App\Models;

class Role extends ModelApp
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
    protected $filters_for_search = ['roles.id', 'roles.name', 'roles.label'];

    /**
     * Permissions relation
     * @return Permissions
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    /**
     * Save Permision in Role
     * @param  Permission $permission
     * @return Role
     */
    public function givePermissionTo(Permission $permission)
    {
        return $this->permissions()->save($permission);
    }
}
