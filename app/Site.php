<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    //
    use SoftDeletes;

    public function user()
    {
        return $this->hasOne('App\User', 'id','user_id');
    }
    public function employeeList()
    {
        return $this->hasMany('App\User', 'site_id','id');
    }
}
