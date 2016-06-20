<?php

namespace App\Models;

use App\Models\Traits\HasRoles;
use App\Models\Traits\UserBootable;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Http\Request;
use Jenssegers\Date\Date;

class User extends ModelApp implements AuthenticatableContract, 
    AuthorizableContract, CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword, HasRoles, UserBootable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * Order fields allowed
     * @var array
     */
    protected $order_fields_allowed = ['id', 'name', 'role', 'created_at'];

    /**
     * Filters for search request
     * @var array
     */
    protected $filters_for_search = ['users.name', 'users.email'];

    /**
     * Get From
     * @return string
     */
    public function getFromAttribute()
    {
        return Date::parse($this->created_at)->format('M. Y');
    }

    /**
     * Get Avatar
     * @return string
     */
    public function getAvatarAttribute()
    {
        return "http://www.gravatar.com/avatar/".md5($this->email);
    }

    /**
     * Set Password as crypt
     * @param string $value
     */
    public function setPasswordAttribute($value)
    {
        if (!empty($value)) {
            $this->attributes['password'] = bcrypt($value);
        }
    }
}
