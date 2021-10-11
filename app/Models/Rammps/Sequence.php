<?php

namespace App\Models\Rammps;

trait Sequence {

	public static function gateSequence(){
        return
        [
        	's_1_consent'=>[

        		1=>['s_1_gender'],

        		3=>['end_point',1],
        	],

            's_1_gender'=>['s_1_18up'],
            's_1_18up'=>['s_1_age'],
            's_1_age'=>['s_1_dd'],
            's_1_dd'=>['s_1_v_or_c'],
            's_1_v_or_c'=>[
                1=>['s_1_cc','s_1_mc','s_1_ccuzmc_o'],
                3=>['s_1_uz','s_1_ccuzmc_o']
            ],

        	's_2_name'=>['s_2_education'],
            's_2_education'=>['s_2_marial_status'],
            's_2_marial_status'=>['s_2_occupation'],
        		
            's_2_occupation'=>['s_3_khana_m','s_3_khana_f'],
            's_3_khana_m'=>['s_3_khana_f'],
            's_3_khana_f'=>['s_3_relation_w_main'],
            's_3_relation_w_main'=>['s_3_khana_u_5'],
            's_3_khana_u_5'=>['s_3_until_2018'],
            's_3_until_2018'=>[
                1=>['s_3_add_death'],
                3=>['s_4_vac_possible']
            ],
            's_4_vac_possible'=>['s_4_vac_taken'],
            's_4_vac_taken'=>[
                1=>['s_4_vac_which']              
            ],


        ];



    }


    public static function stepWiseNode($index = null)
    {

       $a=[
            [
        	"s_1_consent",
          	"s_1_gender",
            's_1_18up',
            's_1_age',
            's_1_dd',
            's_1_v_or_c',
            's_1_cc',
            's_1_uz',
            's_1_mc',
            's_1_ccuzmc_o',
            's_1_ccuzmc_o_e'          	
            ],
            
            [
            's_2_1'

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




}