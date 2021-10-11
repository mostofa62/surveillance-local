<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SampleAck extends Model
{
    protected $table = 'covid_sample_ack';

    public static function getLabel(){

    	return [
    		'block1'=>'Sample Collection',
    		'stage1'=>'Team Sent',
    		'stage2'=>'Collected',
    		'stage3'=>'Arrived at IEDCR',

    		'block2'=>'Sample Testing',
    		'stage4'=>'Started',
    		'stage5'=>'Done',

    		'block3'=>'Report Circulate',
    		'stage6'=>'Signed',
    		'stage7'=>'Circulated',    		
    	];
    }
}
