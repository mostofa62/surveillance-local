<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class RammpsScheduleHistory extends Model
{
	//
	protected $table = 'rammps_schedules_pickhistory'; 
	public $timestamps = false;
	protected $fillable = [

		'current_id',
		'previous_id',
		'ivr_id',
	];   


	
}