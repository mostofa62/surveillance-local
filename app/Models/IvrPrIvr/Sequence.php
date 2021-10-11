<?php

namespace App\Models\IvrPrIvr;

trait Sequence {

	public static function gateSequence(){
        return
        [

        	
        	'q_1'=>[
                1=>'q_2',                
                3=>'submit',
                5=>'submit',
            ],
            
            'q_2'=>['q_3'],
            'q_3'=>['q_4'],
            'q_4'=>[
                1=>['q_5','q_5_dd','q_5_cc','q_5_mc'],
                3=>['q_5','q_5_dd','q_5_uz'],
                99=>['q_5'],
            ],
            'q_5'=>['q_6'],
            'q_5_dd'=>['q_6'],    
            'q_5_cc'=>['q_6'],
            'q_5_uz'=>['q_6'],
            'q_5_mc'=>['q_6'],
            
            'q_6'=>['q_7'],
            'q_7'=>['q_8'],
            'q_8'=>[
                1=>'q_9',
                3=>'submit',
                99=>'submit'
            ],
            'q_9'=>['q_10'],
            'q_10'=>[
                1=>'q_11',
                3=>'submit',
                99=>'submit'
            ],            
            'q_11'=>['submit'],


        ];

	}

    public static function gateReverseSequence(){
        return [

            'q_1'=>[                                           
                3=>['q_2','q_3','q_4'],
                5=>['q_2','q_3','q_4']
            ],

            'q_4'=>[
                3=>['q_5','q_5_dd','q_5_cc','q_5_mc'],
                1=>['q_5','q_5_dd','q_5_uz'],
                99=>['q_5_dd','q_5_cc','q_5_mc','q_5_uz'],                
            ],

            'q_8'=>[  
                99=>['q_9','q_10','q_11'],                            
                3=>['q_9','q_10','q_11']
            ],

            'q_10'=>[  
                99=>['q_11'],                            
                3=>['q_11']
            ],            
            

        ];

    }



    




}