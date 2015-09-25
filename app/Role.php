<?php 

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;

class Role extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'label'];

    /**
     * Get the created date
     *
     * @return string
     */
    public function getCreatedAttribute()
    {
        return Date::parse($this->created_at)->format('d-m-Y');
    }

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
