<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    public function membership()
    {
        return $this->belongsToMany('App\Member');
    }
}
