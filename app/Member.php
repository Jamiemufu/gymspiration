<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Member extends Model
{

    public function membership()
    {
        return $this->hasOne('App\Membership', 'id', 'membership_id');
    }

    public function scopeSearchNames($query, $name)
    {
        //concat first_name and last_name and search
        return $query->where(DB::raw('concat(firstName," ",lastName)'), 'LIKE', '%'.$name.'%');
    }

    public $timestamps = false;
    
}
