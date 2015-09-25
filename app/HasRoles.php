<?php

namespace App;

trait HasRoles
{
    /**
     * Role Relation
     * @return Roles
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    /**
     * Assing role to user
     * @param  string $role
     * @return User
     */
    public function assignRole($role)
    {
        return $this->roles()->save(
            Role::whereName($role)->firstOrFail()
        );
    }

    /**
     * Has Role?
     * @param  string
     * @return boolean
     */
    public function hasRole($role)
    {
        if (is_string($role)) {
            return $this->roles->contains('name', $role);
        }

        //intersect: Remove values no present
        return !! $role->intersect($this->roles)->count();
    }
}
