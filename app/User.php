<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable {
	use Notifiable;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name', 'email', 'password',
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password', 'remember_token',
	];

	/**
	 * The attributes that should be cast to native types.
	 *
	 * @var array
	 */
	protected $casts = [
		'email_verified_at' => 'datetime',
	];

	/**
	 * relationship to Role
	 *
	 * @return void
	 */
	public function roles() {
		return $this
			->belongsToMany('App\Role')
			->withTimestamps();
	}
	/**
	 * checks role
	 *
	 * @param  mixed $role
	 *
	 * @return void
	 */
	public function hasRole($role) {
		if ($this->roles()->where('name', $role)->first()) {
			return true;
		}

		return false;
	}
}
