<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RammpsQuestion extends Model
{

	protected $table = 'rammps_questions';


	public function filled($fillable_array, $input){

      foreach ($fillable_array as $key){
        if( isset($input[$key]) ){
          $this->setAttribute($key, $input[$key]);
        }else{
          $this->setAttribute($key, null);
        }
      }

    }
	


}