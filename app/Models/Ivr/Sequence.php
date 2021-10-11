<?php

namespace App\Models\Ivr;

trait Sequence {

	public static function gateSequence(){
        return
        [

            's_0_1'=>['s_0_2'],
            's_0_2'=>[
                1=>'s_0_3',
                0=>['end_point',3],
                3=>['end_point',3],
            ],

            's_0_3'=>['di_1_1'],
            'di_1_1'=>[
                1=>['di_1_2','di_1_2_dd','di_1_2_cc','di_1_2_mc'],
                3=>['di_1_2','di_1_2_dd','di_1_2_uz'],
            ],
            'di_1_2_cc'=>['di_1_3'],
            'di_1_2_dd'=>['di_1_3'],
            'di_1_2_mc'=>['di_1_3'],
            'di_1_2_uz'=>['di_1_3'],
            'di_1_2'=>['di_1_3'],
            'di_1_3'=>['smk_2_1'],

            'smk_2_1'=>[
                1=>'smk_2_2',
                99=>'smk_2_3',
                3=>'smk_2_3',
            ],

            'smk_2_2'=>[
                1=>'smk_2_5',
                99=>'smk_2_4',
                3=>'smk_2_4',
            ],


            'smk_2_3'=>[
                1=>'smk_2_4',
                99=>'smk_2_5',
                3=>'smk_2_5',
            ],

            'smk_2_4'=>['smk_2_5'],

            'smk_2_5'=>[
                1=>'smk_2_6',
                99=>'smk_2_7',
                3=>'smk_2_7',
            ],

            'smk_2_6'=>[
                1=>'smk_2_9',
                99=>'smk_2_8',
                3=>'smk_2_8',
            ],

            'smk_2_7'=>[
                1=>'smk_2_8',
                99=>'smk_2_9',
                3=>'smk_2_9',
            ],

            'smk_2_8'=>['smk_2_9'],

            'smk_2_9'=>[

                1=>'smk_2_10',
                99=>'smk_2_11',
                3=>'smk_2_11',
            ],

            'smk_2_10'=>['smk_2_11'],
            'smk_2_11'=>['smk_2_12'],
            'smk_2_12'=>[
                1=>'smk_2_13',
                99=>['drk_3_1',1],
                3=>['drk_3_1',1],
            ],
            'smk_2_13'=>[
                1=>['drk_3_1',1],
                99=>['drk_3_1',1],
                3=>['drk_3_1',1],
            ],
            'drk_3_1'=>[
                1=>'drk_3_2',
                99=>'fd_4_1',
                3=>'fd_4_1',
            ],
            'drk_3_2'=>['drk_3_3'],

            'drk_3_3'=>['fd_4_1'],

            'fd_4_1'=>[
                7=>'fd_4_2',
                6=>'fd_4_2',
                5=>'fd_4_2',
                4=>'fd_4_2',
                3=>'fd_4_2',
                2=>'fd_4_2',
                1=>'fd_4_2',
                0=>'fd_4_3',
                99=>'fd_4_3',

            ],

            'fd_4_2'=>['fd_4_3'],

            'fd_4_3'=>[
                7=>'fd_4_4',
                6=>'fd_4_4',
                5=>'fd_4_4',
                4=>'fd_4_4',
                3=>'fd_4_4',
                2=>'fd_4_4',
                1=>'fd_4_4',
                0=>'fd_4_5',
                99=>'fd_4_5',                 
            ],

            'fd_4_4'=>['fd_4_5'],
            'fd_4_5'=>['fd_4_6'],
            'fd_4_6'=>['fd_4_7'],
            'fd_4_7'=>[
                1001=>['hq_5_1',2]
            ],

            'hq_5_1'=>[
                1=>'hq_5_2',
                99=>'hq_5_4',
                3=>'hq_5_4',
            ],

            'hq_5_2'=>[
                1=>'hq_5_3',
                99=>'hq_5_4',
                3=>'hq_5_4',
            ],

            'hq_5_3'=>['hq_5_4'],
            'hq_5_4'=>['op_6_1'],
            'op_6_1'=>['op_6_2'],
            //6-8-2020
            'op_6_2'=>[
                1=>['cov_7_s',3],
                2=>['cov_7_s',3],
                3=>['cov_7_s',3],
                4=>['cov_7_s',3],
            ],
            'cov_7_s'=>[
                1=>'cov_7_1',               
                3=>'end_point',
            ],
            'cov_7_1'=>['cov_7_2'],
            /*'cov_7_2'=>[
                1=>'cov_7_3',               
                3=>'end_point',
            ],*/
            'cov_7_2'=>['cov_7_3'],
            'cov_7_3'=>[
                0=>'end_point',
                1001=>[
                    'cov_7_4_1',
                    'cov_7_4_2',
                    'cov_7_4_3',
                    'cov_7_4_4',
                    'cov_7_4_5',
                    'cov_7_4_6',
                    'cov_7_4_7',
                    'cov_7_4_8',
                    'cov_7_4_9'
                ],
            ],
            'cov_7_4_1'=>['cov_7_5'],
            'cov_7_4_2'=>['cov_7_5'],
            'cov_7_4_3'=>['cov_7_5'],
            'cov_7_4_4'=>['cov_7_5'],
            'cov_7_4_5'=>['cov_7_5'],
            'cov_7_4_6'=>['cov_7_5'],
            'cov_7_4_7'=>['cov_7_5'],
            'cov_7_4_8'=>['cov_7_5'],
            'cov_7_4_9'=>['cov_7_5'],
            'cov_7_4_9_e'=>['cov_7_5'],
            'cov_7_5'=>[
                1=>'cov_7_6',               
                3=>'cov_7_7',
            ],
            'cov_7_6'=>['cov_7_7'],
            'cov_7_7'=>[
                1=>'cov_7_8',               
                3=>'cov_7_9',
            ],
            'cov_7_8'=>['cov_7_9'],

            'cov_7_9'=>[
                1=>'cov_7_10',               
                3=>'end_point',
            ],
            'cov_7_10'=>['end_point'],


        ];

    }

	public static function gateReverseSequence(){
        return [

            's_0_2'=>[
                0=>['s_0_3'],
                3=>['s_0_3'],
            ],

            'di_1_1'=>[
                3=>['di_1_2_dd','di_1_2_cc','di_1_2_mc'],
                1=>['di_1_2_dd','di_1_2_uz'],
            ],

        	'smk_2_1'=>[               
                99=>['smk_2_2'],
                3=>['smk_2_2'],
            ],

            'smk_2_2'=>[ 
            	1=>['smk_2_3', 'smk_2_4'],               
                99=>['smk_2_3'],
                3=>['smk_2_3'],
            ],

            'smk_2_3'=>[                
                99=>['smk_2_4'],
                3=>['smk_2_4'],
            ],

            'smk_2_5'=>[                
                99=>['smk_2_6'],
                3=>['smk_2_6'],
            ],

            'smk_2_6'=>[
                1=>['smk_2_7', 'smk_2_8'],   
                99=>['smk_2_7'],
                3=>['smk_2_7'],
            ],

            'smk_2_7'=>[                
                99=>['smk_2_8'],
                3=>['smk_2_8'],
            ],

            'smk_2_9'=>[                
                99=>['smk_2_10'],
                3=>['smk_2_10'],
            ],

            'smk_2_12'=>[                
                99=>['smk_2_13'],
                3=>['smk_2_13'],
            ],


            'drk_3_1'=>[                
                99=>['drk_3_2','drk_3_3'],
                3=>['drk_3_2','drk_3_3'],
            ],

            'fd_4_1'=>[
                0=>['fd_4_2'],
                99=>['fd_4_2'],                              
            ],

            'fd_4_3'=>[
                0=>['fd_4_4'], 
                99=>['fd_4_4'],                                
            ],

            'hq_5_1'=>[
                99=>['hq_5_2'],
                3=>['hq_5_2'],
            ],

            'hq_5_2'=>[
                99=>['hq_5_3'],
                3=>['hq_5_3'],
            ],

            //6-8-2020
            'cov_7_s'=>[
                3=>['cov_7_1','cov_7_2','cov_7_3','cov_7_4','cov_7_4_e','cov_7_5','cov_7_6','cov_7_7','cov_7_8','cov_7_9','cov_7_10'],                
            ],
            /*'cov_7_2'=>[
                3=>['cov_7_3','cov_7_4','cov_7_4_e','cov_7_5','cov_7_6','cov_7_7','cov_7_8','cov_7_9','cov_7_10'],                
            ],*/

            'cov_7_3'=>[
                0=>['cov_7_4_1','cov_7_4_2','cov_7_4_3','cov_7_4_4','cov_7_4_5','cov_7_4_6','cov_7_4_7','cov_7_4_8','cov_7_4_9','cov_7_4_9_e','cov_7_5','cov_7_6','cov_7_7','cov_7_8','cov_7_9','cov_7_10'],                
            ],

            'cov_7_5'=>[
                3=>['cov_7_6'],                
            ],

            'cov_7_7'=>[
                3=>['cov_7_8'],                
            ],

            'cov_7_9'=>[
                3=>['cov_7_10'],                
            ],

        ];

    }

	public static function stepWiseNode($index = null)
    {

       $a=[
            [
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
          	'smk_2_13'
            ],
            [
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
            ],

            [
            'hq_5_1',
            'hq_5_2',
            'hq_5_3',
            'hq_5_4',
            'op_6_1',
            'op_6_2',
            ],

            [
            'cov_7_s',
            'cov_7_1',
            'cov_7_2',
            'cov_7_3',
            'cov_7_4_1',            
            'cov_7_5',
            'cov_7_6',
            'cov_7_7',
            'cov_7_8',
            'cov_7_9',
            'cov_7_10'
            ]



        ];
        return isset($index)? $a[$index]:$a;
    }


    




}