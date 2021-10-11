<?php

namespace App\Models\Rammps;

trait Status{


	public static function getYesNo(){
        
        return[ 

            
                1 => '১- হ্যাঁ',
                3 => '৩- না',               

         ];
    }

    public static function getYNDN(){
    	return [
    		1 => '1- হ্যাঁ',
            3 => '3- না',
            88=>'88 - জানি না'
    	];
    }

    public static function covidTakenWilling(){
    	return [
			1 => '1 হ্যাঁ, অবশ্যই পুরোপুরি',
			2 => '2 সম্ভবত',
			3 => '3 অসম্ভব',
			4 => '4 অবশ্যই না',
			88 => '88 জানি না',
			99 => '99 উত্তর দিতে অস্বীকার'
		];
    }


	public static function getInitialStatus(){

        return [
			31 => ['রিং হচ্ছে ধরে নি'],
			32 => ['গ্রাহকের নাম্বার নয়'],
			33 => ['মোবাইল বন্ধ'],
			35 => ['শুরুতে লাইন কেটে গেছে'],
			36 => ['অসম্মত'],
		];

        

    }

    public static function getYNO(){
    	return [
			66=> '66 - অন্যান্য (উল্লেখ করুন)',
            88=>'88 - জানি না',
            99=>'99 - অস্বীকৃিত'
		];
    }

    public static function getMarialStutus(){

    	return [
			1 => '1 অবিবাহিত',
			3 => '3 বিবাহিত',
			5 => '5 বিধবা',
			7 => '7 বিপতিœক',
			9 => '9 তালাকপ্রাপ্ত',
			11 => '11 একসঙ্গে বসবাস',
			66 => '66 - অন্যান্য (উল্লেখ করুন)'
		];

    }


    public static function getOccupation(){
        return[
        	
            'bn'=> [
                1 =>'গৃহিণী | HouseWife  1',
                2 =>'ছাত্রী | Student 2',
                3 =>'কর্মজীবী | Job Holder 3',
                4 =>'বাড়িতে বসেই কাজ কবেন | Work at home 4',
                5 =>'গার্মেন্টস কর্মী | Garments Worker 5',
                6 =>'শিক্ষকতা | Teacher 6',
                7 =>'ব্যবসা | Business 7',
                8 =>'ডাক্তার | Doctor 8',
                9 =>'ইঞ্জিনিয়ার | Engineer 9',
                10 =>'কৃষিকাজ | Agriculture 10',
                11 =>'অবসরপ্রাপ্ত | Retired 11',
                12 =>'উকিল | lawyer 12',
                13 =>'দোকানদার | Shopkeeper  13',
                14 =>'আর্মি/নেভী/এয়ারফোর্স | Army/Navy/Air force 14',
                15 =>'দজি | Tailor  15',
                16 =>'জন-প্রতিনিধি | Public representative 16',
                17 =>'জেলে | fisherman 17',
                18 =>'দিনমজুর | Day laborer 18',
                19 =>'হোমিওপ্যাথি চিকিৎসক | 
Homeopathy Physicians  19',
                20 =>'পল্লী চিকিৎসক | Veterinarians 20',
                21 =>'কবিরাজ | Kaviraj 21',
                22 =>'ক্ষুদ্র ব্যবসায়ী | Small Business 22',
                23 =>'ভিক্ষুক | Beggar 23',
                24 =>'স¦-নিয়োজিত | Self-employed 24',
                25 =>'সরকারি চাকুরি | Government service 25',
                26 =>'বেসরকারি চাকুরি | Private job 26',
                27 =>'বেকার  | Unemployed 27',
                28=>'আউটসোর্সিয় | Out Sourcing 28',
                29=>'অনলাইন ব্যবসা | Online Business 29',
                30=>'পণ্য ডেলিভারি | Product Delivery 30',
                66 =>'অন্যান্য (উল্লেখ করুন) 66',
                99 =>'অস্বীকৃিত জানানো 99',
            ]]
            [session('language')];
    }


    public static function getMainRelation($unset=null){

    	$data =  [
			1 => '1 আমিই পরিবারের প্রধান',
			2 => '2 পত্নী',
			3 => '3 স্বামী',
			4 => '4 নিজের সন্তান',
			5 => '5 অন্য পক্ষের সন্তান',
			6 => '6 দত্তক সন্তান',
			7 => '7 পিতা/মাত',
			8 => '8 শ্বশুর/শ্বাশুরী',
			9 => '9 ভাই/বোনের সন্তান',
			10 => '10 দেবর/ননদ',
			11 => '11 শালা/শালি',
			12 => '12 দাদা/দাদি',
			13 => '13 নাতি-নাতনি',
			14 => '14 আশ্রিত',
			15 => '15 কোন সম্পর্ক নেই',
			66 => '66 অন্যান্য (উল্লেখ করুন ----)'
		];

		if(isset($unset)){ unset($data[$unset]); }
		return $data;
    }

    public static function whichVaccine(){
    	return [
			1 => '1 এস্ট্রাজেনেকা',
			2 => '2 কোভিশিল্ড',
			3 => '3 সিনোফার্ম',
			4 => '4 ফাইজার',
			5 => '5 মডার্না',
			6 => '6 জনসন অ্যান্ড জনসন',
			88 => '88 জানিনা',
			99 => '99 অস্বীকৃতি',
		];
    }





}