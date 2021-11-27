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

            'cdeath[dyear]'=>['cdeath[death_year]','cdeath[dmonth]'],
            'cdeath[dmonth]'=>['cdeath[death_year]','cdeath[dday]'],
            'cdeath[dday]'=>['cdeath[death_year]'],

            'cdeath[death_year]'=>['cdeath[death_married]'],
            

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
            'cdeath[death_symptoms_1]'=>[
                'cdeath[death_location]',
                'cdeath[death_symptoms_2]'
            ],
            
            'cdeath[death_symptoms_2]'=>[
                'cdeath[death_location]',
                'cdeath[death_symptoms_3]'
            ],
            
            'cdeath[death_symptoms_3]'=>[
                'cdeath[death_location]',
                'cdeath[death_symptoms_4]'
            ],
            
            'cdeath[death_symptoms_4]'=>['cdeath[death_location]'],

            'cdeath[death_location]'=>[
                'cdeath[death_reason_1]',
                'cdeath[death_reason_2]',
                'cdeath[death_reason_3]',
                'cdeath[death_reason_4]'
            ],

            /*'cdeath[death_reason_1]'=>['cdeath[death_detect_by]'],
            'cdeath[death_reason_2]'=>['cdeath[death_detect_by]'],
            'cdeath[death_reason_3]'=>['cdeath[death_detect_by]'],
            'cdeath[death_reason_4]'=>['cdeath[death_detect_by]'],*/

            'cdeath[death_reason_1]'=>['cdeath[death_violance]'],


            'cdeath[death_detect_by]'=>['cdeath[death_covid_symptoms]'],

            'cdeath[death_covid_symptoms]'=>['cdeath[death_covid_hospital]'],
            'cdeath[death_covid_hospital]'=>['cdeath[death_covid_hospital_a]'],
            

            'cdeath[death_covid_hospital_a]'=>['cdeath[death_covid_grave]'],



            'sibiling[g_of_death]'=>['sibiling[age_of_death]'],
            'sibiling[age_of_death]'=>['sibiling[year_of_death]'],
            'sibiling[year_of_death]'=>['sibiling[db_location_death]'],


            'sibiling[death_detect_by]'=>['sibiling[death_covid_symptoms]'],
            'sibiling[death_covid_symptoms]'=>['sibiling[death_covid_hospital]'],

            'sibiling[death_covid_hospital]'=>['sibiling[death_covid_hospital_a]'],

            'sibiling[death_covid_hospital_a]'=>['sibiling[death_covid_death_where]'],

            'sibiling[death_covid_death_where]'=>['sibiling[death_covid_grave]']





            
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




            'cdeath[death_violance]'=>[

                1001=>[
                    [

                        'cdeath[death_year]'=>[
                            2020=>['cdeath[death_detect_by]'],
                            2021=>['cdeath[death_detect_by]'],
                            2022=>['cdeath[death_detect_by]'],
                                
                        ],

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
                5=>[
                    's_1_gender',
                    's_1_age',
                    's_1_dd',
                    's_1_v_or_c',
                    's_1_cc',
                    's_1_mc',
                    's_1_uz',
                    's_1_ccuzmc_o',
                    's_1_ccuzmc_o_e',
                    's_1_name'
                ],

        		//3=>['end_point',1],
                3=>['s_1_consent_n']
        	],

            's_1_consent_n'=>[
                1001=>['end_point',1]
            ],

            's_1_gender'=>['s_1_age'],
                        
            's_1_dd'=>['s_1_v_or_c'],
            's_1_v_or_c'=>[
                1=>['s_1_cc','s_1_mc','s_1_ccuzmc_o','s_1_name'],
                3=>['s_1_uz','s_1_ccuzmc_o','s_1_name']
            ],
            

        	's_1_name'=>['s_2_education'],
            's_2_education'=>['s_2_marial_status'],
            's_2_marial_status'=>['s_2_occupation'],
        		
            's_2_occupation'=>['s_3_khana_m','s_3_khana_f'],
            's_3_khana_m'=>['s_3_khana_f'],
            's_3_khana_f'=>['s_3_relation_w_main'],
            's_3_relation_w_main'=>['s_3_khana_u_5'],
            's_3_khana_u_5'=>[
                's_3_child_health_decesion_1',
                's_3_your_health_decesion_1',
                's_3_until_2019'],
            's_3_child_health_decesion_1'=>['s_3_child_health_decesion_2'],
            's_3_child_health_decesion_2'=>['s_3_child_health_decesion_3'],
            's_3_child_health_decesion_3'=>[
                's_3_child_health_decesion_4'
            ],

            's_3_your_health_decesion_1'=>['s_3_your_health_decesion_2'],
            's_3_your_health_decesion_2'=>['s_3_your_health_decesion_3'],
            's_3_your_health_decesion_3'=>[
                's_3_your_health_decesion_4'
            ],

            's_3_until_2019'=>[
                1=>['s_3_until_2019_a','s_3_add_death','cdeath[name][0]','s_4_mother_a_or_d'],
                3=>['s_4_mother_a_or_d',3]
            ],

            's_4_mother_a_or_d'=>[
                1=>['s_4_mother_age'],
                3=>['s_4_mother_name'],
                88=>['s_4_mother_name']
            ],
            's_4_mother_age'=>['s_4_mother_location'],
            's_4_mother_location'=>['s_4_mother_name'],
            's_4_mother_name'=>['s_4_father_a_or_d'],
            's_4_mother_d_age'=>['s_4_mother_db_location'],
            's_4_mother_db_location'=>['s_4_mother_d_year'],

            's_4_mother_d_year'=>['mother_death_covid_death_where','s_4_father_a_or_d'],

            's_4_father_a_or_d'=>[
                1=>['s_4_father_age'],
                3=>['s_4_father_name'],
                88=>['s_4_father_name']
            ],      


            's_4_father_age'=>['s_4_father_location'],
            's_4_father_location'=>['s_4_father_name'],            
            's_4_father_d_age'=>['s_4_father_db_location'],
            's_4_father_db_location'=>['s_4_father_d_year'],

            's_4_father_d_year'=>['father_death_covid_death_where'],
            


            //mother father covid
            'mother_death_detect_by'=>['mother_death_covid_symptoms'],
            'mother_death_covid_symptoms'=>['mother_death_covid_hospital'],
            'mother_death_covid_hospital'=>['mother_death_covid_hospital_a'],
            'mother_death_covid_hospital_a'=>['mother_death_covid_grave'],            


            //father covid
            'father_death_detect_by'=>['father_death_covid_symptoms'],
            'father_death_covid_symptoms'=>['father_death_covid_hospital'],
            'father_death_covid_hospital'=>['father_death_covid_hospital_a'],
            'father_death_covid_hospital_a'=>['father_death_covid_grave'],            


            'father_death_covid_grave'=>['s_5_sibiling_alive'],

            's_5_sibiling_alive'=>['s_5_sibiling_dead_in_alive'],

            's_5_sibiling_dead_in_alive'=>['s_5_sibiling_dead_2019_a'],

            
            's_5_sibiling_dead_2019_a'=>['s_5_sibiling_dead_add','sibiling[g_of_death][0]'],


            's_6_vac_possible'=>['s_6_vac_taken'],
            's_6_vac_taken'=>[
                1=>['s_6_vac_number'],
                3=>['s_6_vac_ignorance_reason','end_point'],
                88=>['s_6_vac_ignorance_reason','end_point'],
                99=>['s_6_vac_ignorance_reason','end_point']
            ],
            's_6_vac_number'=>['s_6_vac_which'],
            's_6_vac_which'=>['s_6_vac_suggested'],
            's_6_vac_suggested'=>['s_7_owner_phone'],

            's_7_owner_phone'=>[
                1=>['s_7_qnty_of_sim'],
                1001=>['s_7_recharge_permission']
            ],
            's_7_qnty_of_sim'=>['s_7_recharge_permission'],
            's_7_recharge_permission'=>['s_7_random_access'],
            's_7_random_access'=>['end_point'],







        ];



    }

    public static function gateReverseSequence(){
        return [
            's_1_consent'=>[
                1=>['s_1_consent_n'],
                5=>['s_1_consent_n'],
                3=>['s_1_gender','s_1_18up','s_1_age','s_1_dd','s_1_v_or_c','s_1_uz','s_1_mc','s_1_cc','s_1_name'],                

            ], 
            's_1_v_or_c'=>[
                1=>['s_1_uz'],
                3=>['s_1_cc','s_1_mc'],
                88=>['s_1_uz','s_1_cc','s_1_mc','s_1_ccuzmc_o','s_1_ccuzmc_o_e','s_1_name'],
                99=>['s_1_uz','s_1_cc','s_1_mc','s_1_ccuzmc_o','s_1_ccuzmc_o_e','s_1_name']
            ],             
    
            's_3_until_2019'=>[
                3=>['s_3_until_2019_a','s_3_add_death','cdeath'],
                88=>['s_3_until_2019_a','s_3_add_death','cdeath']
            ],

            's_4_mother_a_or_d'=>[
                1=>['s_4_mother_d_age','s_4_mother_db_location','s_4_mother_d_year','m_death_covid_death_where','m_death_covid_death_where_e'],                
                3=>['s_4_mother_age','s_4_mother_location'],
                88=>['s_4_mother_age','s_4_mother_location']
            ],

            's_4_father_a_or_d'=>[
                1=>['s_4_father_d_age','s_4_father_db_location','s_4_father_d_year','f_death_covid_death_where','f_death_covid_death_where_e'],                
                3=>['s_4_father_age','s_4_father_location'],
                88=>['s_4_father_age','s_4_father_location']
            ],
            's_5_sibiling_dead_2019_a'=>[
                0=>['s_5_sibiling_dead_add','sibiling']
            ],

            's_6_vac_taken'=>[
                1=>['s_6_vac_ignorance_reason'],                
                3=>['s_6_vac_number','s_6_vac_which','s_6_vac_suggested'],
                88=>['s_6_vac_number','s_6_vac_which','s_6_vac_suggested'],
                99=>['s_6_vac_number','s_6_vac_which','s_6_vac_suggested']
            ],

            's_7_owner_phone'=>[
                1001=>['s_7_qnty_of_sim'],                
            ],

        ];

    }

    public static function combine_forward_logic(){
        return [
            //mother
            's_4_mother_a_or_d'=>[
                [3,88], // which value
                [
                    's_4_mother_db_location'=>[2,3,4],
                    's_4_mother_d_year'=>[2020,2021]
                ], //dependent souls
                ['mother_death_detect_by'] //what will loose
            ],

            's_4_mother_db_location'=>[
                [2,3,4], // which value
                [
                    's_4_mother_a_or_d'=>[3,88],
                    's_4_mother_d_year'=>[2020,2021]
                ], //dependent souls
                ['mother_death_detect_by'] //what will loose
            ],

            's_4_mother_d_year'=>[
                [2020,2021], // which value
                [
                    's_4_mother_a_or_d'=>[3,88],
                    's_4_mother_db_location'=>[2,3,4]
                ], //dependent souls
                ['mother_death_detect_by'] //what will loose
            ],


            //father
            's_4_father_a_or_d'=>[
                [3,88], // which value
                [
                    's_4_father_db_location'=>[2,3,4],
                    's_4_father_d_year'=>[2020,2021]
                ], //dependent souls
                ['father_death_detect_by'] //what will loose
            ],

            's_4_father_db_location'=>[
                [2,3,4], // which value
                [
                    's_4_father_a_or_d'=>[3,88],
                    's_4_father_d_year'=>[2020,2021]
                ], //dependent souls
                ['father_death_detect_by'] //what will loose
            ],

            's_4_father_d_year'=>[
                [2020,2021], // which value
                [
                    's_4_father_a_or_d'=>[3,88],
                    's_4_father_db_location'=>[2,3,4]
                ], //dependent souls
                ['father_death_detect_by'] //what will loose
            ],

            //siblings
            'sibiling[year_of_death]'=>[
                [2020,2021],
                [
                    'sibiling[db_location_death]'=>[2,3,4]
                ],
                ['sibiling[death_detect_by]']
            ],
            'sibiling[db_location_death]'=>[
                [2,3,4],
                [
                    'sibiling[year_of_death]'=>[2020,2021]
                ],
                ['sibiling[death_detect_by]']
            ]
            
        ];
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