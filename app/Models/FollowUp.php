<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Covic;

class FollowUp extends Model
{
    protected $table = 'covic19_general_follow_up';

    protected $fillable = [
        
        'fever',
        'fever_on_set',
        'fever_cessation',
        'cough',
        'cough_on_set',
        'cough_cessation',
        'respiratory_distress',
        'respiratory_distress_on_set',
        'respiratory_distress_cessation',
        'sore_throat',
        'sore_throat_on_set',
        'sore_throat_cessation',
        'email',
        'address'        

    ];

    public static function questionText(){


        return [
        
        'bn'=>[
            'name'=>'Name',
            'age'=>'Age',
            'mobile_no'=>'Mobile No',
            'fever'=>'Fever',
            'fever_on_set'=>'On Set Fever',
            'fever_cessation'=>'Fever Cessation',
            'cough'=>'Cough',
            'cough_on_set'=>'On Set Cough',
            'cough_cessation'=>'Cough Cessation',
            'respiratory_distress'=>'Respiratory Distress',
            'respiratory_distress_on_set'=>'On Set Respiratory Distress',
            'respiratory_distress_cessation'=>'Respiratory Distress Cessation',
            'sore_throat'=>'Sore Throat',
            'sore_throat_on_set'=>'On Set Sore Throat',
            'sore_throat_cessation'=>'Sore Throat Cessation',
            'email'=>'email',
            'address'=>'address',
        ]][session('language')];


    }

    public static function getYesNo(){
        return[ 

            'bn'=>[
                1=>'Yes', 2=>'No'            

         ]]
            [session('language')];
    }
    
    
    public function covicdata($mobile_no){
    	$model = Covic::where('mobile_no',$mobile_no)->first();
    	return isset($model)?$model : null;
    }


}
