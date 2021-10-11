<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class IvrScheduleHistory extends Model
{
	//
	protected $table = 'ivr_schedules_pickhistory'; 
	public $timestamps = false;
	protected $fillable = [

		'current_id',
		'previous_id',
		'ivr_id',
	];   


	
}