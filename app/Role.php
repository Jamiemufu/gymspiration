<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model {
	/**
	 * relationship to user
	 *
	 * @return void
	 */
	public function users() {
		return $this
			->belongsToMany('App\User')
			->withTimestamps();
	}
}
