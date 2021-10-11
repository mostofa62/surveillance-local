<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class DengueDeath extends Model
{
    //
    use SoftDeletes;

    public function user()
    {
        return $this->hasOne('App\User', 'id','user_id');
    }
}
