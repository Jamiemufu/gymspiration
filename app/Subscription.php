<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    
    public function member()
    {
        return $this->belongsTo('App\Member', 'id', 'member_id');
    }

    public function membership()
    {
        return $this->hasOne('App\Membership', 'id', 'membership_id');
    }

}
