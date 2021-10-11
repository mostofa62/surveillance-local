<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class CovidPositive extends Model
{
  protected $table = 'covid_positive';

    protected $fillable = [
        'id', 'report_date', 'report_country', 'why_test1', 'why_test2', 'why_test3', 'why_test4', 'why_test5', 'why_test6', 'why_teste', 'unique_case', 'age', 'age_type', 'sex', 'diagnosed_country', 'province', 'residency_country', 'confirm_date', 'sns', 'sns_date',
         'comorbidity', 'comorbidity1', 'preg_time', 'comorbidity2', 'comorbidity3', 'comorbidity4', 'comorbidity5', 'comorbidity6', 'comorbidity7', 'comorbidity8', 'comorbidity9', 'comorbidity10', 'comorbiditye', 'comorboditye_txt', 'hospital_admission', 'hs_date', 'hs_3', 'hs_4', 'hs_5', 'hs_6',
          'hs_7',
         'exp_1', 'exp_2', 'exp_3', 'exp_4', 'exp_5', 'exp_6', 'exp_7', 'exp_8', 'exp_9', 'exp_10', 'exp_11', 'exp_12', 'exp_13', 'exp_14', 'exp_15', 'exp_16', 'exp_17', 'exp_18', 'exp_19', 'exp_20',
         'exp_21', 'exp_22', 'exp_23', 'exp_24', 'exp_25', 'exp_26', 'exp_27', 'exp_28', 'exp_29', 'exp_30', 'exp_31', 'exp_32', 'exp_33', 'exp_34', 'oc_1', 'oc_2', 'oc_2_date', 'oc_3', 'oc_3_date', 'oc_3_icu',
          'oc_3_ventilation', 'oc_3_oxy', 'oc_4', 'oc_4_ex', 'oc_4_date', 'oc_4_test_date', 'oc_5', 'oc_6'

    ];

  use SoftDeletes;

    public function countryfrom(){
        return $this->hasOne('App\Country', 'id','country_from');
    }

  public static function getGender(){

      return[

            'bn'=>[ 1=>'1-Male', 2=>'2-Female']]
            [session('language')];
    }

    public static function seeGender($id){

        return $id==1?'Male':'Female';
      }


    public static function getAgeType(){

      return[

            'bn'=>[ 1=>'1-Year', 2=>'2-Month',3=>'3-days']]
            [session('language')];
    }
    public static function seeAgeType($id){
      $res ;
      if($id == 1){
        $res = ' Y';
      }else if($id == 2){
        $res = ' M';
      }else {
        $res = " D";
      }
      return $res;
    }

    public static function countryList(){


            return \App\Country::select(DB::raw('id,country_name as name'))->pluck('name','id')->toArray();

    }

    public static function country($id){

            $dis = \App\Country::select(DB::raw('id,country_name as name'))->where('id',$id)->first();
            return isset($dis)?$dis->name:null;
    }

    public static function commonIP(){
      $cars = array("1-No", "2-Yes", "3-Unknown");
      return $cars;
    }
    public static function testResult(){
      $cars = array("1-Positive", "2-Negative", "3-Unknown");
      return $cars;
    }
}
