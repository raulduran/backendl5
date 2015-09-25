<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Jenssegers\Date\Date;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword, HasRoles;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

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
     * Get From
     * @return string
     */
    public function getFromAttribute()
    {
        return Date::parse($this->created_at)->format('M. Y');
    }

    /**
     * Get Created
     * @return string
     */
    public function getCreatedAttribute()
    {
        return Date::parse($this->created_at)->format('d-m-Y');
    }

    /**
     * Get Avatar
     * @return string
     */
    public function getAvatarAttribute()
    {
        return "http://www.gravatar.com/avatar/".md5($this->email);
    }
}
