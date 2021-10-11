<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;


class IvrSchedule extends Model
{
	//
	protected $table = 'ivr_schedules';
    use SoftDeletes;
    //user
    public function user()
    {
        return $this->hasOne('App\User', 'id','user_id');
    }

    //ivr
    public function ivr()
    {
        return $this->hasOne('App\Models\Ivr', 'id','ivr_id');
    }


	
}