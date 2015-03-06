<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

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
	protected $fillable = ['name', 'role', 'email', 'password'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

	public function getFromAttribute()
	{
		return \Date::parse($this->created_at)->format('M. Y');
	}

	public function getCreatedAttribute()
	{
		return \Date::parse($this->created_at)->format('d-m-Y');
	}

	public function getRoleNameAttribute()
	{
		return trans('messages.role.'.$this->role);
	}

	public function getAvatarAttribute()
	{
		return "http://www.gravatar.com/avatar/".md5($this->email); 
	}

}