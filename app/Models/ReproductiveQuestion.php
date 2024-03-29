<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class ReproductiveQuestion extends Model
{

    protected $table = 'reproductive_questions';
    protected $fillable = [
  "last_input",
  "s_0_1",
  "s_0_2",
  "s_0_3",
  "s_0_4",
  "gi_1_1",
  "gi_1_2",
  "gi_1_3_cc",
  "gi_1_3_uz",
  "gi_1_3",
  "gi_1_3_e",
  "gi_1_4",
  "gi_1_4_e",
  "gi_1_5",
  "gi_1_5_e",
  "pi_2_1",
  "pi_2_2",
  "pi_2_3",
  "pi_2_4",
  "pi_2_5",
  "pi_2_5_1",
  "pi_2_5_2",
  "fp_3_1",
  "fp_3_2_1",
  "fp_3_2_1_e",
  "fp_3_2_2",
  "fp_3_2_2_e",
  "fp_3_2_3",
  "fp_3_2_3_e",
  "fp_3_2_4",
  "fp_3_2_4_e",
  "fp_3_3_1",
  "fp_3_3_1_e",
  "fp_3_3_2",
  "fp_3_3_2_e",
  "fp_3_3_3",
  "fp_3_3_3_e",
  "fp_3_4",
  "fp_3_4_e",
  "dp_4_1",
  "dp_4_2",
  "dp_4_3_1",
  "dp_4_3_1_e",
  "dp_4_3_2",
  "dp_4_3_2_e",
  "dp_4_3_3",
  "dp_4_3_3_e",
  "dp_4_4_1",
  "dp_4_4_1_e",
  "dp_4_4_2",
  "dp_4_4_2_e",
  "dp_4_4_3",
  "dp_4_4_3_e",
  "dp_4_5",
  "dp_4_6_1",
  "dp_4_6_1_e",
  "dp_4_6_2",
  "dp_4_6_2_e",
  "dp_4_6_3",
  "dp_4_6_3_e",
  "dp_4_7_1",
  "dp_4_7_1_e",
  "dp_4_7_2",
  "dp_4_7_2_e",
  "dp_4_7_3",
  "dp_4_7_3_e",
  "dp_4_8_1",
  "dp_4_8_1_e",
  "dp_4_8_2",
  "dp_4_8_2_e",
  "dp_4_8_3",
  "dp_4_8_3_e",
  "dp_4_9_1",
  "dp_4_9_1_e",
  "dp_4_9_2",
  "dp_4_9_2_e",
  "dp_4_9_3",
  "dp_4_9_3_e",

  "dp_4_10",

  "dp_4_11_1",
  "dp_4_11_1_e",
  "dp_4_11_2",
  "dp_4_11_2_e",
  "dp_4_11_3",
  "dp_4_11_3_e",

  "dp_4_12_1",
  "dp_4_12_1_e",
  "dp_4_12_2",
  "dp_4_12_2_e",
  "dp_4_12_3",
  "dp_4_12_3_e",

  "dp_4_13_1",
  "dp_4_13_1_e",
  "dp_4_13_2",
  "dp_4_13_2_e",
  "dp_4_13_3",
  "dp_4_13_3_e",

  "cq_5_1",
  "cq_5_2_1",
  "cq_5_2_1_e",
  "cq_5_2_2",
  "cq_5_2_2_e",
  "cq_5_2_3",
  "cq_5_2_3_e",
  "cq_5_3",
  "cq_5_4",
  "cq_5_4_e",
  "cq_5_5",
  "cq_5_6_1",
  "cq_5_6_1_e",
  "cq_5_6_2",
  "cq_5_6_2_e",
  "cq_5_6_3",
  "cq_5_6_3_e",
  "cq_5_7",
  "cq_5_8",
  "cq_5_9",
  "cq_5_9_e",
  "cq_5_10",
  "cq_5_10_day",
  "cq_5_10_month",
  "cq_5_10_year",
  "rh_6_1",
  "rh_6_2_1",
  "rh_6_2_1_e",
  "rh_6_2_2",
  "rh_6_2_2_e",
  "rh_6_2_3",
  "rh_6_2_3_e",
  "rh_6_3_1",
  "rh_6_3_1_e",
  "rh_6_3_2",
  "rh_6_3_2_e",
  "rh_6_3_3",
  "rh_6_3_3_e",
  "rh_6_4_1",
  "rh_6_4_1_e",
  "rh_6_4_2",
  "rh_6_4_2_e",
  "rh_6_4_3",
  "rh_6_4_3_e",
  "rh_6_5",
  "rh_6_6_1",
  "rh_6_6_1_e",
  "rh_6_6_2",
  "rh_6_6_2_e",
  "rh_6_6_3",
  "rh_6_6_3_e",
  "rh_6_7_1",
  "rh_6_7_1_e",
  "rh_6_7_2",
  "rh_6_7_2_e",
  "rh_6_7_3",
  "rh_6_7_3_e",
  "rh_6_8_1",
  "rh_6_8_1_e",
  "rh_6_8_2",
  "rh_6_8_2_e",
  "rh_6_8_3",
  "rh_6_8_3_e",
  "rh_6_9",
  "rh_6_10_1",
  "rh_6_10_1_e",
  "rh_6_10_2",
  "rh_6_10_2_e",
  "rh_6_10_3",
  "rh_6_10_3_e",
  "rh_6_11_1",
  "rh_6_11_1_e",
  "rh_6_11_2",
  "rh_6_11_2_e",
  "rh_6_11_3",
  "rh_6_11_3_e",
  //2019-09-04
  "rh_6_12",
  "rh_6_13",
  "rh_6_13_e",
  //2019-09-04
  "bc_7_1",
  "bc_7_2",
  "bc_7_3",
  "bc_7_4_1",
  "bc_7_4_1_e",
  "bc_7_4_2",
  "bc_7_4_2_e",
  "bc_7_5_1",
  "bc_7_5_1_e",
  "bc_7_5_2",
  "bc_7_5_2_e",
  "bc_7_5_3",
  "bc_7_5_3_e",
  "bc_7_6",
  "bc_7_7_1",
  "bc_7_7_1_e",
  "bc_7_7_2",
  "bc_7_7_2_e",
  "bc_7_7_3",
  "bc_7_7_3_e",
  "bc_7_7_4",
  "bc_7_7_4_e",
  "bc_7_8_1",
  "bc_7_8_1_e",
  "bc_7_8_2",
  "bc_7_8_2_e",
  "bc_7_8_3",
  "bc_7_8_3_e",
  "bc_7_9",
  "bc_7_10_1",
  "bc_7_10_1_e",
  "bc_7_10_2",
  "bc_7_10_2_e",
  "bc_7_10_3",
  "bc_7_10_3_e",
  "bc_7_11",
  "bc_7_12_1",
  "bc_7_12_1_e",
  "bc_7_12_2",
  "bc_7_12_2_e",
  "bc_7_12_3",
  "bc_7_12_3_e",
  "prq_8_1",
  "prq_8_2",
  "prq_8_3",
  "rprq_9_1",
  "rprq_9_2",
  "rprq_9_3",
  "rprq_9_3_day",
  "rprq_9_3_month",
  "rprq_9_3_year",
  "rprq_9_4",
  "rprq_9_5",
  "rprq_9_6_1",
  "rprq_9_6_1_e",
  "rprq_9_6_2",
  "rprq_9_6_2_e",
  "rprq_9_6_3",
  "rprq_9_6_3_e",
  "rprq_9_7_1",
  "rprq_9_7_1_e",
  "rprq_9_7_2",
  "rprq_9_7_2_e",
  "rprq_9_7_3",
  "rprq_9_7_3_e",
  "rprq_9_8_1",
  "rprq_9_8_1_e",
  "rprq_9_8_2",
  "rprq_9_8_2_e",
  "rprq_9_8_3",
  "rprq_9_8_3_e",
  "rprq_9_9_1",
  "rprq_9_9_1_e",
  "rprq_9_9_2",
  "rprq_9_9_2_e",
  "rprq_9_9_3",
  "rprq_9_9_3_e",
  "pprq_10_1",
  "pprq_10_1_day",
  "pprq_10_1_month",
  "pprq_10_1_year",
  "pprq_10_2",
  "pprq_10_3",
  "pprq_10_4_1",
  "pprq_10_4_1_e",
  "pprq_10_4_2",
  "pprq_10_4_2_e",
  "pprq_10_4_3",
  "pprq_10_4_3_e",
  "pprq_10_5_1",
  "pprq_10_5_1_e",
  "pprq_10_5_2",
  "pprq_10_5_2_e",
  "pprq_10_5_3",
  "pprq_10_5_3_e",
  "pprq_10_6_1",
  "pprq_10_6_1_e",
  "pprq_10_6_2",
  "pprq_10_6_2_e",
  "pprq_10_6_3",
  "pprq_10_6_3_e",
  "pprq_10_7",
  "pprq_10_8_1",
  "pprq_10_8_1_e",
  "pprq_10_8_2",
  "pprq_10_8_2_e",
  "pprq_10_8_3",
  "pprq_10_8_3_e",
  "pprq_10_9",
  "pprq_10_9_e",
  "pprq_10_10_1",
  "pprq_10_10_1_e",
  "pprq_10_10_2",
  "pprq_10_10_2_e",
  "pprq_10_10_3",
  "pprq_10_10_3_e",
  "pprq_10_11",
  "pprq_10_11_e",
  "pprq_10_12",
  "pprq_10_12_e",
  "pprq_10_13",
  "pprq_10_14_1",
  "pprq_10_14_1_e",
  "pprq_10_14_2",
  "pprq_10_14_2_e",
  "pprq_10_14_3",
  "pprq_10_14_3_e",
  "pprq_10_15",
  "pprq_10_15_e",
  "pprq_10_16",
  "pprq_10_17_1",
  "pprq_10_17_1_e",
  "pprq_10_17_2",
  "pprq_10_17_2_e",
  "pprq_10_17_3",
  "pprq_10_17_3_e",
  "pprq_10_18",
  "pprq_10_19",
  "pprq_10_20",
  "pprq_10_20_e",
  "pprq_10_21",

  "pprq_10_22",
  "pprq_10_23",
  "pprq_10_23_e",
  "pprq_10_24",

  "fq_11_1",
  "fq_11_2",
  "fq_11_3",
  "fq_11_3_day",
  "fq_11_3_month",
  "fq_11_3_year",
  "fq_11_4",
  "fq_11_4_e",
  "fq_11_5",
  "fq_11_5_e",
  "fq_11_6",
  "fq_11_6_e",
  "fq_11_7",
  "fq_11_7_e",
  "fq_11_8",
  "fq_11_9_1",
  "fq_11_9_1_e",
  "fq_11_9_2",
  "fq_11_9_2_e",
  "fq_11_9_3",
  "fq_11_9_3_e",
  "fqi_12_1",
  "fqi_12_1_name",
  "fqi_12_1_father",
  "fqi_12_1_husband",
  "fqi_12_1_house_no",
  "fqi_12_1_road_no",
  "fqi_12_1_union_or_ward",
  "fqi_12_1_mouja_or_moholla",
  "fqi_12_1_village_or_area",
  "fqi_12_1_house_head",
  "fqi_12_1_mobile_no"

    ];
	//
    use SoftDeletes;

    public function user()
    {
        return $this->hasOne('App\User', 'id','user_id');
    }


    public function reproductive(){

    	return $this->hasOne('App\Models\Reproductive', 'id','reproductive_id');
    }

    public function surveillance()
    {
        return $this->hasOne('App\Models\Reproductive', 'id','surveillance_id');
    }

    public function filled($fillable_array, $input){

      foreach ($fillable_array as $key){
        if( isset($input[$key]) ){
          $this->setAttribute($key, $input[$key]);
        }else{
          $this->setAttribute($key, null);
        }
      }

    }

    public static function stepWiseNode($index = null)
    {

       $a=[
            [

              "s_0_1",
              "s_0_2",
              "s_0_3",
              "s_0_4",
              "gi_1_1",
              "gi_1_2",
              "gi_1_3_cc",
              "gi_1_3_uz",
              "gi_1_3",
              "gi_1_3_e",
              "gi_1_4",
              "gi_1_4_e",
              "gi_1_5",
              "gi_1_5_e",
              "pi_2_1",
              "pi_2_2",
              "pi_2_3",
              "pi_2_4",
              "pi_2_5",
              "pi_2_5_1",
              "pi_2_5_2",

            ],
            [


            "fp_3_1",
            "fp_3_2_1",
            "fp_3_2_1_e",
            "fp_3_2_2",
            "fp_3_2_2_e",
            "fp_3_2_3",
            "fp_3_2_3_e",
            "fp_3_2_4",
            "fp_3_2_4_e",
            "fp_3_3_1",
            "fp_3_3_1_e",
            "fp_3_3_2",
            "fp_3_3_2_e",
            "fp_3_3_3",
            "fp_3_3_3_e",
            "fp_3_4",
            "fp_3_4_e",
            "dp_4_1",
            "dp_4_2",
            "dp_4_3_1",
            "dp_4_3_1_e",
            "dp_4_3_2",
            "dp_4_3_2_e",
            "dp_4_3_3",
            "dp_4_3_3_e",
            "dp_4_4_1",
            "dp_4_4_1_e",
            "dp_4_4_2",
            "dp_4_4_2_e",
            "dp_4_4_3",
            "dp_4_4_3_e",
            "dp_4_5",
            "dp_4_6_1",
            "dp_4_6_1_e",
            "dp_4_6_2",
            "dp_4_6_2_e",
            "dp_4_6_3",
            "dp_4_6_3_e",
            "dp_4_7_1",
            "dp_4_7_1_e",
            "dp_4_7_2",
            "dp_4_7_2_e",
            "dp_4_7_3",
            "dp_4_7_3_e",
            "dp_4_8_1",
            "dp_4_8_1_e",
            "dp_4_8_2",
            "dp_4_8_2_e",
            "dp_4_8_3",
            "dp_4_8_3_e",
            "dp_4_9_1",
            "dp_4_9_1_e",
            "dp_4_9_2",
            "dp_4_9_2_e",
            "dp_4_9_3",
            "dp_4_9_3_e",
            

            "dp_4_10",

            "dp_4_11_1",
            "dp_4_11_1_e",
            "dp_4_11_2",
            "dp_4_11_2_e",
            "dp_4_11_3",
            "dp_4_11_3_e",

            "dp_4_12_1",
            "dp_4_12_1_e",
            "dp_4_12_2",
            "dp_4_12_2_e",
            "dp_4_12_3",
            "dp_4_12_3_e",

            "dp_4_13_1",
            "dp_4_13_1_e",
            "dp_4_13_2",
            "dp_4_13_2_e",
            "dp_4_13_3",
            "dp_4_13_3_e",


            "cq_5_1",
            "cq_5_2_1",
            "cq_5_2_1_e",
            "cq_5_2_2",
            "cq_5_2_2_e",
            "cq_5_2_3",
            "cq_5_2_3_e",
            "cq_5_3",
            "cq_5_4",
            "cq_5_4_e",
            "cq_5_5",
            "cq_5_6_1",
            "cq_5_6_1_e",
            "cq_5_6_2",
            "cq_5_6_2_e",
            "cq_5_6_3",
            "cq_5_6_3_e",
            "cq_5_7",
            "cq_5_8",
            "cq_5_9",
            "cq_5_9_e",
            "cq_5_10",
            "cq_5_10_day",
            "cq_5_10_month",
            "cq_5_10_year",

            ],
            [

              "rh_6_1",
  "rh_6_2_1",
  "rh_6_2_1_e",
  "rh_6_2_2",
  "rh_6_2_2_e",
  "rh_6_2_3",
  "rh_6_2_3_e",
  "rh_6_3_1",
  "rh_6_3_1_e",
  "rh_6_3_2",
  "rh_6_3_2_e",
  "rh_6_3_3",
  "rh_6_3_3_e",
  "rh_6_4_1",
  "rh_6_4_1_e",
  "rh_6_4_2",
  "rh_6_4_2_e",
  "rh_6_4_3",
  "rh_6_4_3_e",
  "rh_6_5",
  "rh_6_6_1",
  "rh_6_6_1_e",
  "rh_6_6_2",
  "rh_6_6_2_e",
  "rh_6_6_3",
  "rh_6_6_3_e",
  "rh_6_7_1",
  "rh_6_7_1_e",
  "rh_6_7_2",
  "rh_6_7_2_e",
  "rh_6_7_3",
  "rh_6_7_3_e",
  "rh_6_8_1",
  "rh_6_8_1_e",
  "rh_6_8_2",
  "rh_6_8_2_e",
  "rh_6_8_3",
  "rh_6_8_3_e",
  "rh_6_9",
  "rh_6_10_1",
  "rh_6_10_1_e",
  "rh_6_10_2",
  "rh_6_10_2_e",
  "rh_6_10_3",
  "rh_6_10_3_e",
  "rh_6_11_1",
  "rh_6_11_1_e",
  "rh_6_11_2",
  "rh_6_11_2_e",
  "rh_6_11_3",
  "rh_6_11_3_e",
  
  "rh_6_12",
  "rh_6_13",
  "rh_6_13_e",

  "bc_7_1",
  "bc_7_2",
  "bc_7_3",
  "bc_7_4_1",
  "bc_7_4_1_e",
  "bc_7_4_2",
  "bc_7_4_2_e",
  "bc_7_5_1",
  "bc_7_5_1_e",
  "bc_7_5_2",
  "bc_7_5_2_e",
  "bc_7_5_3",
  "bc_7_5_3_e",
  "bc_7_6",
  "bc_7_7_1",
  "bc_7_7_1_e",
  "bc_7_7_2",
  "bc_7_7_2_e",
  "bc_7_7_3",
  "bc_7_7_3_e",
  "bc_7_7_4",
  "bc_7_7_4_e",
  "bc_7_8_1",
  "bc_7_8_1_e",
  "bc_7_8_2",
  "bc_7_8_2_e",
  "bc_7_8_3",
  "bc_7_8_3_e",
  "bc_7_9",
  "bc_7_10_1",
  "bc_7_10_1_e",
  "bc_7_10_2",
  "bc_7_10_2_e",
  "bc_7_10_3",
  "bc_7_10_3_e",
  "bc_7_11",
  "bc_7_12_1",
  "bc_7_12_1_e",
  "bc_7_12_2",
  "bc_7_12_2_e",
  "bc_7_12_3",
  "bc_7_12_3_e",

            ],

            [

              "prq_8_1",
  "prq_8_2",
  "prq_8_3",
  "rprq_9_1",
  "rprq_9_2",
  "rprq_9_3",
  "rprq_9_3_day",
  "rprq_9_3_month",
  "rprq_9_3_year",
  "rprq_9_4",
  "rprq_9_5",
  "rprq_9_6_1",
  "rprq_9_6_1_e",
  "rprq_9_6_2",
  "rprq_9_6_2_e",
  "rprq_9_6_3",
  "rprq_9_6_3_e",
  "rprq_9_7_1",
  "rprq_9_7_1_e",
  "rprq_9_7_2",
  "rprq_9_7_2_e",
  "rprq_9_7_3",
  "rprq_9_7_3_e",
  "rprq_9_8_1",
  "rprq_9_8_1_e",
  "rprq_9_8_2",
  "rprq_9_8_2_e",
  "rprq_9_8_3",
  "rprq_9_8_3_e",
  "rprq_9_9_1",
  "rprq_9_9_1_e",
  "rprq_9_9_2",
  "rprq_9_9_2_e",
  "rprq_9_9_3",
  "rprq_9_9_3_e",
  "pprq_10_1",
  "pprq_10_1_day",
  "pprq_10_1_month",
  "pprq_10_1_year",
  "pprq_10_2",
  "pprq_10_3",
  "pprq_10_4_1",
  "pprq_10_4_1_e",
  "pprq_10_4_2",
  "pprq_10_4_2_e",
  "pprq_10_4_3",
  "pprq_10_4_3_e",
  "pprq_10_5_1",
  "pprq_10_5_1_e",
  "pprq_10_5_2",
  "pprq_10_5_2_e",
  "pprq_10_5_3",
  "pprq_10_5_3_e",
  "pprq_10_6_1",
  "pprq_10_6_1_e",
  "pprq_10_6_2",
  "pprq_10_6_2_e",
  "pprq_10_6_3",
  "pprq_10_6_3_e",
  "pprq_10_7",
  "pprq_10_8_1",
  "pprq_10_8_1_e",
  "pprq_10_8_2",
  "pprq_10_8_2_e",
  "pprq_10_8_3",
  "pprq_10_8_3_e",
  "pprq_10_9",
  "pprq_10_9_e",
  "pprq_10_10_1",
  "pprq_10_10_1_e",
  "pprq_10_10_2",
  "pprq_10_10_2_e",
  "pprq_10_10_3",
  "pprq_10_10_3_e",
  "pprq_10_11",
  "pprq_10_11_e",
  "pprq_10_12",
  "pprq_10_12_e",
  "pprq_10_13",
  "pprq_10_14_1",
  "pprq_10_14_1_e",
  "pprq_10_14_2",
  "pprq_10_14_2_e",
  "pprq_10_14_3",
  "pprq_10_14_3_e",
  "pprq_10_15",
  "pprq_10_15_e",
  "pprq_10_16",
  "pprq_10_17_1",
  "pprq_10_17_1_e",
  "pprq_10_17_2",
  "pprq_10_17_2_e",
  "pprq_10_17_3",
  "pprq_10_17_3_e",
  "pprq_10_18",
  "pprq_10_19",
  "pprq_10_20",
  "pprq_10_20_e",
  "pprq_10_21",
  "pprq_10_22",
  "pprq_10_23",
  "pprq_10_23_e",
  "pprq_10_24",

            ],

            [

              "fq_11_1",
  "fq_11_2",
  "fq_11_3",
  "fq_11_3_day",
  "fq_11_3_month",
  "fq_11_3_year",
  "fq_11_4",
  "fq_11_4_e",
  "fq_11_5",
  "fq_11_5_e",
  "fq_11_6",
  "fq_11_6_e",
  "fq_11_7",
  "fq_11_7_e",
  "fq_11_8",
  "fq_11_9_1",
  "fq_11_9_1_e",
  "fq_11_9_2",
  "fq_11_9_2_e",
  "fq_11_9_3",
  "fq_11_9_3_e",
  "fqi_12_1",
  "fqi_12_1_name",
  "fqi_12_1_father",
  "fqi_12_1_husband",
  "fqi_12_1_house_no",
  "fqi_12_1_road_no",
  "fqi_12_1_union_or_ward",
  "fqi_12_1_mouja_or_moholla",
  "fqi_12_1_village_or_area",
  "fqi_12_1_house_head",
  "fqi_12_1_mobile_no",
  "end_point"

            ]
        ];

        return isset($index)? $a[$index]:$a;

    }


   public static function searchForId($id, $array) {
    
    foreach ($array as $key => $val) {
    
          
          $child = array_search($id, $val);          
          if(gettype($child) == "integer"){ 
            return $key;
            break;
          }
          
       
    }
    return null;
  }

  public static function dataArray($id, $len){
    $all = [];
    for($i=0;$i<=$len;$i++){
        $a = self::stepWiseNode($i);
        foreach($a as $v){
          array_push($all,$v);
          if($v == $id) break;
        }
    }

    return $all;

  }

  public function questionTiming($init, $update){
    $start  = new Carbon($init);
    $end  = new Carbon($update);
    return $start->diffInMinutes($end);

  }


}