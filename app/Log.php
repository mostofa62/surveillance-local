<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{

    public function user()
    {
        return $this->hasOne('App\User', 'user_id','id');
    }
}