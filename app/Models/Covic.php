<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Covic extends Model
{

	protected $table = 'covic19_general';

    protected $fillable = [
        'name',
        'age',
        'age_type',
        'sex',
        'nationality',
        'passport_no',
        'flight_no',
        'seat_no',
        'country_from',
        'arrival_date',
        'mobile_no',

    ];

	use SoftDeletes;

    public function countryfrom(){
        return $this->hasOne('App\Country', 'id','country_from');
    }

	public static function getGender(){

    	return[ 

            'bn'=>[ 1=>'1-Male', 2=>'2-Female', 3=>'3-Others']]
            [session('language')];
    }


    public static function getAgeType(){

    	return[ 

            'bn'=>[ 1=>'1-Year', 2=>'2-Month']]
            [session('language')];
    }

    public static function countryList(){
        

            return \App\Country::select(DB::raw('id,country_name as name'))->pluck('name','id')->toArray();

    }

    public static function country($id){
        
            $dis = \App\Country::select(DB::raw('id,country_name as name'))->where('id',$id)->first();
            return isset($dis)?$dis->name:null;
        

        

    }


    
}
