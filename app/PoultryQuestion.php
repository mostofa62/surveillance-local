<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class PoultryQuestion extends Model
{
    //
    use SoftDeletes;

    public function user()
    {
        return $this->hasOne('App\User', 'id','user_id');
    }
    public function encephalitis()
    {
        return $this->hasOne('App\Poultry', 'id','poultry_id');
    }
    public function surveillance()
    {
        return $this->hasOne('App\Poultry', 'id','surveillance_id');
    }
}
