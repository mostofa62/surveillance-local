<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    //
    use SoftDeletes;

    public function user()
    {
        return $this->hasOne('App\User', 'id','user_id');
    }
    public function encephalitis()
    {
        return $this->hasOne('App\Encephality', 'id','encephality_id');
    }
    public function surveillance()
    {
        return $this->hasOne('App\Encephality', 'id','surveillance_id');
    }
    public function poultry()
    {
        return $this->hasOne('App\Poultry', 'id','poultry_id');
    }
    public function poultrySurveillance()
    {
        return $this->hasOne('App\Poultry', 'id','surveillance_id');
    }

    //reproductive
    public function reproductive()
    {
        return $this->hasOne('App\Models\Reproductive', 'id','reproductive_id');
    }
}
