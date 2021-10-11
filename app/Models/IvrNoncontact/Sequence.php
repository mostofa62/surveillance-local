<?php

namespace App\Models\IvrNoncontact;

trait Sequence {

	public static function gateSequence(){
        return
        [

        	
        	'q_1'=>[
                1=>'q_2',                
                3=>'submit',
                5=>'submit'
            ],

            'q_2'=>[
                1=>'q_12',
                99=>'submit',
                3=>'submit',
            ],

            'q_12'=>[
                1=>'q_3',
                99=>'submit',
                3=>'submit',
            ],

            'q_3'=>['q_4'],
            'q_4'=>['q_5','q_5_dd','q_5_cc','q_5_uz','q_5_mc'],
            'q_5'=>['q_6'],
            'q_5_dd'=>['q_6'],    
            'q_5_cc'=>['q_6'],
            'q_5_uz'=>['q_6'],
            'q_5_mc'=>['q_6'],
            
            'q_6'=>['q_7','q_7_1'],            
            'q_7'=>['q_8','q_9'],
            'q_7_1'=>['q_8','q_9'],
            'q_8'=>['q_9'],            
            'q_9'=>['submit'],


        ];

	}

    public static function gateReverseSequence(){
        return [

            'q_1'=>[                              
                3=>['q_2','q_12','q_3','q_4'],
                5=>['q_2','q_12','q_3','q_4']
            ],

            'q_2'=>[  
                99=>['q_12','q_3','q_4'],                            
                3=>['q_12','q_3','q_4']
            ],

            'q_12'=>[  
                99=>['q_3','q_4'],                            
                3=>['q_3','q_4']
            ],            
            

        ];

    }



    




}