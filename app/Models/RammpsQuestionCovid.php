<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RammpsQuestionCovid extends Model
{

	protected $table = 'rammps_questions_death';


	/*public function filled($fillable_array, $input){

      foreach ($fillable_array as $key){
        if( isset($input[$key]) ){
          $this->setAttribute($key, $input[$key]);
        }else{
          $this->setAttribute($key, null);
        }
      }

    }*/
	


}