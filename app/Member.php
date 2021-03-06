<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class Member extends Authenticatable {
	use Notifiable;

	/**
	 * @var array
	 */
	protected $fillable = [
		'firstName', 'lastName', 'email', 'password', 'address_line_1', 'address_line_2', 'town', 'county', 'postcode', 'phone', 'DOB', 'membership_id',
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
	 * @return mixed
	 */
	public function membership() {
		return $this->hasOne('App\Membership', 'id', 'membership_id');
	}

	/**
	 * @param $query
	 * @param $name
	 * @return mixed
	 */
	public function scopeSearchNames($query, $name) {
		//concat first_name and last_name and query
		return $query->where(DB::raw('concat(firstName," ",lastName)'), 'LIKE', '%' . $name . '%');
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
