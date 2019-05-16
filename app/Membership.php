<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{

    public function subscription()
    {
        return $this->hasOne('App\Subscription', 'id');
    }

    public function member()
    {
        return $this->belongsTo('App\Member', 'id');
    }
    
}
