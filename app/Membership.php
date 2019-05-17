<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Membership extends Model {

	/**
	 * @return mixed
	 */
	public function member() {
		return $this->belongsTo('App\Member', 'id');
	}

}
