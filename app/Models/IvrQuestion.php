<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Ivr\Sequence;

class IvrQuestion extends Model
{


	use Sequence;
	protected $table = 'ivr_questions';
	
	protected $fillable = [
		"last_input",
		"s_0_1",
      	"s_0_2",
      	"s_0_3",
      	"di_1_1",
        "di_1_2",
        "di_1_2_e",
        "di_1_2_dd",
        "di_1_2_cc",
        "di_1_2_uz",
        "di_1_2_mc",
      	"di_1_3",
        "di_1_3_e",
      	'smk_2_1',
      	'smk_2_2',
      	'smk_2_3',
      	'smk_2_4',
      	'smk_2_5',
      	'smk_2_6',
      	'smk_2_7',
      	'smk_2_8',
      	'smk_2_9',
      	'smk_2_10',
      	'smk_2_11',
      	'smk_2_12',
      	'smk_2_13',
      	'drk_3_1',
        'drk_3_2',
        'drk_3_3',
        'fd_4_1',
        'fd_4_2',
        'fd_4_3',
        'fd_4_4',
        'fd_4_5',
        'fd_4_6',
        'fd_4_7',
        'hq_5_1',
        'hq_5_2',
        'hq_5_3',
        'hq_5_4',
        'op_6_1',
        'op_6_2',

        //5-8-2020
        'cov_7_s',
        'cov_7_1',
        'cov_7_2',
        'cov_7_3',
        'cov_7_4_1',
        'cov_7_4_2',
        'cov_7_4_3',
        'cov_7_4_4',
        'cov_7_4_5',
        'cov_7_4_6',
        'cov_7_4_7',
        'cov_7_4_8',
        'cov_7_4_9',
        'cov_7_4_9_e',
        
        'cov_7_5',
        'cov_7_6',
        'cov_7_7',
        'cov_7_8',
        'cov_7_9',
        'cov_7_10'

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

}