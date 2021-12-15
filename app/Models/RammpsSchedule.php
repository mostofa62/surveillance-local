<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;


class RammpsSchedule extends Model
{
	//
	protected $table = 'rammps_schedules';
    use SoftDeletes;
    //user
    public function user()
    {
        return $this->hasOne('App\User', 'id','user_id');
    }

    //ivr
    public function rammps()
    {
        return $this->hasOne('App\Models\Rammps', 'id','rammps_id');
    }

    public function call_complete_initial_status(){
    return [
      31,32,33,34,35,36,37,43,45
    ];
  }


	
}