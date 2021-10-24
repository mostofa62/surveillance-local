<?php

namespace App\Models\Rammps;

trait Sequence {


    public static function gateTabulerSeq(){
        return [
            'cdeath[name]'=>['cdeath[r_with_death]'],
            'cdeath[r_with_death]'=>['cdeath[g_of_covid]'],
            'cdeath[g_of_covid]'=>[
                1=>['cdeath[dyear]','cdeath[dmonth]','cdeath[dday]'],
                3=>['cdeath[dyear]','cdeath[dmonth]','cdeath[dday]'],
                5=>['cdeath[dyear]','cdeath[dmonth]','cdeath[dday]'],
                7=>['cdeath[dyear]','cdeath[dmonth]','cdeath[dday]'],
            ],

            'cdeath[dyear]'=>['cdeath[death_married]'],
            'cdeath[dmonth]'=>['cdeath[death_married]'],
            'cdeath[dday]'=>['cdeath[death_married]'],

            //pregnent part comes from women gender

            'cdeath[death_pregnant]'=>[
                1=>['cdeath[death_on_birth]'],
                3=>['cdeath[death_on_birth]'],
            ],

            'cdeath[death_on_birth]'=>[
                1=>['cdeath[death_2m_birth]'],
                3=>['cdeath[death_2m_birth]'],
            ],
            'cdeath[death_2m_birth]'=>[
                1=>'cdeath[death_symptoms_1]',
                3=>'cdeath[death_symptoms_1]'
            ],

            //symptoms
            'cdeath[death_symptoms_1]'=>['cdeath[death_location]'],
            'cdeath[death_symptoms_2]'=>['cdeath[death_location]'],
            'cdeath[death_symptoms_3]'=>['cdeath[death_location]'],
            'cdeath[death_symptoms_4]'=>['cdeath[death_location]'],

            'cdeath[death_location]'=>[
                'cdeath[death_reason_1]',
                'cdeath[death_reason_2]',
                'cdeath[death_reason_3]',
                'cdeath[death_reason_4]'
            ],

            'cdeath[death_reason_1]'=>['cdeath[death_detect_by]'],
            'cdeath[death_reason_2]'=>['cdeath[death_detect_by]'],
            'cdeath[death_reason_3]'=>['cdeath[death_detect_by]'],
            'cdeath[death_reason_4]'=>['cdeath[death_detect_by]'],


            'cdeath[death_detect_by]'=>['cdeath[death_covid_tested]'],

            'cdeath[death_covid_tested]'=>[
                1=>'cdeath[death_covid_result]',
                3=>'cdeath[death_has_fever]',
                88=>'cdeath[death_has_fever]'
            ],
            'cdeath[death_covid_result]'=>['cdeath[death_has_fever]'],

            'cdeath[death_has_fever]'=>[
                1=>'cdeath[death_fever_duration]',
                3=>'cdeath[death_covid_sickness]',
                88=>'cdeath[death_covid_sickness]'
            ],

            'cdeath[death_fever_duration]'=>['cdeath[death_covid_sickness]'],


            'cdeath[death_covid_sickness]'=>['cdeath[death_has_cough]'],

            'cdeath[death_has_cough]'=>['cdeath[death_has_taste]'],

            'cdeath[death_has_taste]'=>['cdeath[death_has_breating]'],

            'cdeath[death_has_breating]'=>['cdeath[death_has_contact]'],

            'cdeath[death_has_contact]'=>['cdeath[death_was_covidarea]'],


            
        ];
    }

    public static function gateTabulerRevSeq(){

        return [

            'cdeath[death_covid_tested]'=>[               
                3=>['cdeath[death_covid_result]'],
                88=>['cdeath[death_covid_result]']
            ],

            'cdeath[death_married]'=>[
                3=>[
                    'cdeath[death_pregnant]',
                    'cdeath[death_on_birth]',
                    'cdeath[death_2m_birth]'
                ]
            ],


        ];

    }


    public static function decesion_based_forward(){

        return[

            'cdeath[death_married]'=>[
                1=>[
                    [
                        'cdeath[g_of_covid]'=>[
                            3=>['cdeath[death_pregnant]'],
                            1001=>[
                            'cdeath[death_symptoms_1]',
                            'cdeath[death_symptoms_2]',
                            'cdeath[death_symptoms_3]',
                            'cdeath[death_symptoms_4]'
                            ]
                        ],

                    ],
                    
                ],
                3=>[
                    [
                        'cdeath[g_of_covid]'=>[
                            1001=>[
                                'cdeath[death_symptoms_1]',
                                'cdeath[death_symptoms_2]',
                                'cdeath[death_symptoms_3]',
                                'cdeath[death_symptoms_4]'
                            ]
                        ]

                    ],
                    
                ],
            ],



        ];
    }

	public static function gateSequence(){
        return
        [
        	's_1_consent'=>[

        		1=>['s_1_gender'],

        		//3=>['end_point',1],
                3=>['s_1_consent_n']
        	],

            's_1_consent_n'=>[
                1001=>['end_point',1]
            ],

            's_1_gender'=>['s_1_18up'],
            's_1_18up'=>[
                1=>['s_1_age'],
                3=>['end_point',3],
                99=>['end_point',3]
            ],
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
                1=>['s_3_add_death','cdeath[name][0]'],
                3=>['s_4_vac_possible']
            ],
            's_4_vac_possible'=>['s_4_vac_taken'],
            's_4_vac_taken'=>[
                1=>['s_4_vac_number'],
                3=>['s_4_vac_number']
            ],
            's_4_vac_number'=>['s_4_vac_which'],
            's_4_vac_which'=>['s_4_vac_suggested'],
            's_4_vac_suggested'=>['s_4_vac_ignorance_reason'],


        ];



    }

    public static function gateReverseSequence(){
        return [
            's_1_consent'=>[
                1=>['s_1_consent_n'],  

            ],              
    
            's_3_until_2018'=>[
                3=>['s_3_add_death','cdeath']
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