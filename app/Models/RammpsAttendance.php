<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class RammpsAttendance extends Model
{
	//
	protected $table = 'rammps_attendance';
    public $timestamps = false;

    protected $casts = [
        'attend_times' => 'array',
    ];
    
    //user
    public function user()
    {
        return $this->hasOne('App\User', 'id','user_id');
    }

    
  


	
}