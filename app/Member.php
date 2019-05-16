<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{

    public function subscription()
    {
        return $this->hasOne('App\Subscription', 'member_id');
    } 

    public function membership()
    {
        return $this->hasOne('App\Membership', 'id');
    }

    public $timestamps = false;
    
}
