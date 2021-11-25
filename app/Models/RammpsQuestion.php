<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RammpsQuestion extends Model
{

	protected $table = 'rammps_questions';

  protected $fillable = [
      "last_input",
      "s_1_consent",
      "s_1_consent_n",
      "s_1_consent_n_e",
      "s_1_gender",      
      "s_1_age",
      "s_1_dd",
      "s_1_v_or_c",
      "s_1_cc",
      "s_1_uz",
      "s_1_mc",
      "s_1_ccuzmc_o",
      "s_1_ccuzmc_o_e",
      "s_1_name"
  ];

  protected $casts = [
        'section_answers' => 'array',
  ];


	public function filled($fillable_array, $input){

      foreach ($fillable_array as $key){
        if( isset($input[$key]) ){
          $this->setAttribute($key, $input[$key]);
        }else{
          $this->setAttribute($key, null);
        }
      }

  }

  public function unset_fillables($data){

    //var_dump($data);
    /*foreach($this->fillable as $v){

      if(array_key_exists($v, $data)){
        //echo "$v";
        unset($data[$v]);
      }
    }*/
    //var_dump($data);
   /* if(isset($data['_token']) || isset($data['rammps_id'])){
      unset($data['_token']);
      unset($data['rammps_id']);
    }*/
    if( isset($data['_token']) ){
      unset($data['_token']);
    }

    if( isset($data['call_status']) ){
      unset($data['call_status']);
    }

    if( isset($data['date']) ){
      unset($data['date']);
    }

    if( isset($data['time']) ){
      unset($data['time']);
    }

    //var_dump($data);

    return $data;

  }

  


  public function call_complete_question_status(){
    return [
      41,42,43,44,51
    ];

  }

  public static function getAnswersJson($data){

    

    if(isset($data['cdeath'])){

      $cdeath = $data['cdeath'];
      $cdeath_array = array();

      foreach ($cdeath as $k => $v) {

        foreach ($v as $x => $y) {
          $index = "cdeath[".$k."][".$x."]";
          $cdeath_array[$index] = $y;
        }
        
      }

      unset($data['cdeath']);

      $data = array_merge($data, $cdeath_array);


    }
    //var_dump($data);die();

    return $data;

  }

  
	


}