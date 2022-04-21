<?php

namespace App\Models\Rammps;

trait Status{


    public static function getLastEducation(){
        return[ 

            
                1 => '১- স্কুল না যেয়ে থাকলে',
                2=>'২- প্রাইমারী  স্কুল পর্যায়',
                3 => '৩- প্রাইমারী স্কুল পাশ',
                5 => '৫- এস . এস . সি বা ও  লেভেল পাশ বা দাখিল',
                7 => '৭ -এইচ. এস . সি বা এ লেভেল পাশ বা  আলিম',
                9 => '৯- স্নাতক / ডিগ্রী / ফাজিল',
                11 => '১১ স্নাতকোত্তর / কামিল ',
                99 => '৯৯- অস্বীকৃিত',
                66=>'৬৬-অন্যান্য (উল্লেখ করুন)',

         ];
    }


    public static function getCallStatus(){

        return [             
                31=>'রিং হচ্ছে ধরে নি',
                32=>'ব্যস্ত', 
                33=>'মোবাইল বন্ধ',
                34=>'অসম্মত',
                35=>'শুরুতে লাইন কেটে গেছে',
                43 =>'লাইন কেটে গেছে / অস্পষ্ট',
                36=>'প্রযোজ্য নয় ( মালিককে দেয়া যাচ্ছে না )',
                37=>'গ্রাহকের নাম্বার নয়',
                45 => 'ভাষাগত সমস্যা'
            ];

        

    }

    public static function getDose(){

        return [
            1 => '১ - ১ম ডোজ',
            2 => '২ - ২য় ডোজ',
            3 =>' ৩ -বুস্টার ডোজ',
            88=>'88 - জানি না',
            99=>'99 - অস্বীকৃতী'            
        ];

        

    }


    public static function getForcedfinished(){
        return [
            51=>'অসম্পূর্ণ ( এপয়ন্মেন্ট সুযোগ নেই )'
        ];
    }

    public static function getScheduleSuveillance(){
        return [
            10 =>'শেষ হয়নি', 
            31=>'রিং হচ্ছে ধরে নি',
            33=>'মোবাইল বন্ধ',
            43 =>'লাইন কেটে গেছে / অস্পষ্ট',
            44 =>'আংশিক অসম্মত',
            45 => 'ভাষাগত সমস্যা',
            53 =>'অসম্পূর্ণ',
            54 => 'স্নোবল - সময় নির্ধারণ করুন',
            55 => 'স্নোবল - অস্বীকৃতি',
            56 =>'স্নোবল - বয়স্ক ব্যক্তি নাই',
            9 =>'স্নোবল - এখনই'

        ];
    }


	
	public static function getYesNoAnotherTime(){
        
        return[ 

            
                1 => '1- হ্যাঁ, এখনই ',
                3 => '3- না',
                5 => '5- হ্যাঁ, অন্য সময়ে***'               

         ];
    }


	public static function getYesNo(){
        
        return[ 

            
                1 => '1- হ্যাঁ',
                3 => '3- না',               

         ];
    }

    public static function getYearOfDeath(){
    	return [
    		2019=>'2019',
    		2020=>'2020',
    		2021=>'2021',
            2022=>'2022'
    	];
    }

    public static function getNumberRange($s=0,$e=20){
        return array_combine(range($s, $e), range($s, $e))+[88=>'88 - জানি না'];
    }

    public static function death_yearfm($s=1900){
        $e = date('Y');
        return array_combine(range($e, $s), range($e, $s))+[88=>'88 - জানি না'];
    }

    public static function getWhyNo(){

    	return [

			1 => '1 কোন কারণ বলেন নি/কিছু না বলে ফোন কেটে দিয়েছেন।',
			2 => '2 সময় নেই।',
			3 => '3 জরিপে আগ্রহ/ইচ্ছে নেই।',
			4 => '4 জরিপ সম্পর্কে কিছু বুঝতে পারেন নি।',
			5 => '5 পরিবারের সদস্যের মৃত্যু সম্পর্কে আলাপ করতে আগ্রহী নন।',
            6 => '6 প্রতারণার  ভয় / বিশ্বাসহীনতা',
            7 => '7 ভাষাগত সমস্যা',
            8 => '8 পারিবারিক সমস্যা',
			66 => '66 অন্যান্য (উল্লেখ করুন)',
    	];
    }

    public static function getYNDN(){
    	return [
    		1 => '1- হ্যাঁ',
            3 => '3- না',
            88=>'88 - জানি না'
    	];
    }

    public static function getYNIgnore(){
        return [
            1 => '1- হ্যাঁ',
            3 => '3- না',
            99=>'99 - অস্বীকৃতী'
        ];
    }

    public static function getYD(){
        return [
            1 => '1- হ্যাঁ',            
            99=>'99 - অস্বীকৃতী'
        ];
    }

    public static function getYNDNIgnore(){
        return [
            1 => '1- হ্যাঁ',
            3 => '3- না',
            88=>'88 - জানি না',
            99=>'99 - অস্বীকৃতী'
        ];
    }

    public static function getCovidResult(){
    	return [
    		1 => '1- পজিটিভ',
            3 => '3- নেগেটিভ',
            88=>'88 - জানি না'
    	];
    }



    public static function covidTakenWilling(){
    	return [
			1 => '1 হ্যাঁ, অবশ্যই নেব',
			2 => '2 সম্ভবত নেব',
			3 => '3 সম্ভবত নেব না',
			4 => '4 অবশ্যই নেব না',
			88 => '88 জানি না',
			99 => '99 উত্তর দিতে অস্বীকার'
		];
    }


	

    public static function getYNO(){
    	return [
			66=> '66 - অন্যান্য (উল্লেখ করুন)',
            88=>'88 - জানি না',
            99=>'99 - অস্বীকৃিত'
		];
    }

    public static function getMarialStutus($unset=null){

    	$data = [
			1 => '1 অবিবাহিত',
			3 => '3 বিবাহিত',
			5 => '5 বিধবা',
			7 => '7 বিপত্নীক',
			9 => '9 তালাকপ্রাপ্ত',
			11 => '11 একসঙ্গে বসবাস',
            13 => '13 আলাদা থাকেন',
			66 => '66 - অন্যান্য (উল্লেখ করুন)'
		];

        if(isset($unset)){
            unset($data[$unset]);
        }

        return $data;

    }


    public static function getOccupation(){
        return[
        	
            
                1 =>'গৃহিণী | HouseWife  1',
                2 =>'ছাত্রী / ছাত্রী | Student 2',
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
                14 =>'আর্মি/নেভী/এয়ারফোর্স/পুলিশ | Army/Navy/Air force/Police 14',
                15 =>'দর্জি | Tailor  15',
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
                28=>'আউটসোর্সিং/ফ্রীল্যান্সার | freelancer 28',
                29=>'অনলাইন ব্যবসা | Online Business 29',
                30=>'পণ্য ডেলিভারি | Product Delivery 30',
                31=>'বুয়া| Bua 31',
                32=>'ড্রাইভার/গাড়ী চালক| Driver 32',
                33=>'রিক্সা/ভ্যান চালক| Rickshaw Driver/Van Dirver 33',
                34=>'মাঝি|Boatman 34',
                35=>'কন্ডাক্টর|Conductor 35',
                36=>'মেকানিক (গাড়ী, যন্ত্রপাতি, ইলেকট্রিক)|Mechanic36',
                37=>'কার্পেন্টার/কাঠ মিস্ত্রি| Carpenter 37',
                38=>'কার মেকানিক|Car Mechanic 38',
                39=>'রাজ মিস্ত্রি|Mason 39',
                40=>'রং মিস্ত্রি|Painter',
                41=>'স্যানিটারি মিস্ত্রি/প্লাম্বার|Plumber 41',
                42=>'ইলেকট্রিশিয়ান|Eletrician 42',
                43=>'রাইড শেয়ারিং (পাঠাও/উবার)|Ride Sharing 43',
                44=>'শেফ/রাধুনি|Sheff 44',
                45=>'ব্যাংকার|Bangker 45',
                46=>'গায়ক/গায়িকা|Singer 46',
                47=>'বাড়িওয়ালা|Landlord 47',
                48=>'সিকিউরিটি গার্ড|Security Guard 48',
                49=>'মিউজিশিয়ান|Musician 49',
                50=>'তাঁতী|Weaver 50',
                51=>'স্বেচ্ছাসেবী|Volunteer 51',
                52=>'প্রবাসী|Immigrant 52',
                53=>'কম্পিউটার অপারেটর|Computer Operator 53',
                54=>'নির্মাণ শ্রমিক| Construction worker 54',
                55=>'নার্স/প্যারামেডিক|Nurse 55',
                56=>'পশু চিকিৎসক/ভেট| Veterinarians 56',
                57=>'ডেনটিস্ট|Dentist 57',
                58=>'ইমাম|Imam 58',
                59=>'সাংবাদিক|Journalist 59',
                60=>'মুহুরী/ভেন্ডার|Clerk 60',
                61=>'নাপিত/ নরসুন্দর (সেলুন)| hairdresser 61',
                //62=>'দিন মজুর|Dailly Labour 62',
                63=>'ডেকোরেটর|Decorator 63',
                64=>'খুচরা বিক্রেতা| Retailer 64',
                65=>'কশাই| Butcher 65',
                66 =>'অন্যান্য (উল্লেখ করুন) 66',
                99 =>'অস্বীকৃিত জানানো 99',
            ];
    }


    public static function getMainRelation($unset=null){

    	$data =  [
			1 => '1 আমিই পরিবারের প্রধান',
			2 => '2 স্ত্রী',
			3 => '3 স্বামী',
			4 => '4 নিজের সন্তান',
			5 => '5 অন্য পক্ষের সন্তান',
			6 => '6 দত্তক সন্তান',
			7 => '7 পিতা',
            8=> '8 মাতা',
			9 => '9 শ্বশুর/শ্বাশুরী',
			10 => '10 ভাই/বোনের সন্তান',
			11 => '11 দেবর/ননদ',
			12 => '12 শালা/শালি',
			13 => '13 দাদা/দাদি',
			14 => '14 নাতি-নাতনি',
			//15 => '15 আশ্রিত',
			16 => '16 কোন সম্পর্ক নেই',
            17 => '17 ভাই',
            18 => '18 বোন',
            19 => '19 চাচা / চাচী',
            20 => '20 নানা / নানী',
            21=>'ছেলের বউ 21',
            22=>'মেয়ের জামাই 22',
            23=>'ভাসুর/ননাস 23',
            24=>'দুলাভাই 24',
            25=>'খালা-খালু/ফুপা-ফুপু/মামা-মামী/চাচা-চাচি 25',
			66 => '66 অন্যান্য (উল্লেখ করুন)'
		];

		if(isset($unset)){ unset($data[$unset]); }
		return $data;
    }


    public static function s_3_child_health_decesion($unset=null){
        $data =  [
            1 => '1 উত্তর দাতা নিজেই',
            2 => '2 স্বামী/স্ত্রী/সঙ্গী',
            3 => '3 পরিবার প্রধান',
            4 => '4 বাবা',
            5 => '5 মা',
            6 => '6 বয়োজ্যেষ্ঠ (দাদা/দাদি, নানা/নানি',
            7 => '7 উপার্জনক্ষম ব্যক্তি',
            8 => '8 উত্তরদাতা এবং পরিবার যৌথভাবে',
            9 => '9 পরিবার',
            10 => '10 খালা-খালু/ফুপা-ফুপু/মামা-মামী/চাচা-চাচি',
            11 => '11 উত্তরদাতা এবং পরিবার/আত্মীয় যৌথভাবে',
            12 => '12 ছেলে / মেয়ে',
            13=>'13 ভাই/বোন',
            14=>'14 ভাসুর/জা',
            15=>'15 শ্যালক/শ্যালিকা',
            16=>'16 দুলাভাই',
            17=>'17 ভাবী',
            18=>'18 ছেলের বউ',
            19=>'19 মেয়ের জামাই',
            20=>'20 শ্বশুড়/শ্বাশুড়ী',
            21=>'21 ভাই/বোন-এর সস্তান',
            22=>'22 প্রতিবেশি',
            23=>'23 বাড়িওয়ালা',
            66 => '66 অন্য কেউ (উল্লেখ করুন)',
            99 => '99 অস্বীকৃতি'
        ];

        if(isset($unset)){ unset($data[$unset]); }
        return $data;
    }


    public static function s_7_owner_phone($unset=null){
        $data =  [
            1 => '1 উত্তর দাতা নিজের',
            2 => '2 উত্তরদাতা এবং স্বামী/সঙ্গী যৌথভাবে',
            3 => '3 উত্তরদাতা এবং পরিবার/আত্মীয় যৌথভাবে',
            4 => '4 উত্তরদাতা এবং অন্য কেউ যৌথভাবে',
            5 => '5 স্বামী / স্ত্রী /সঙ্গী',            
            6 => '6 পরিবার/আত্মীয়',            
            7 => '7 অন্য কেউ',
            8 => '8 অফিসের',            
            99 => '99 অস্বীকৃতি',
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
            7 => '7 ভেরসেল',
			88 => '88 জানিনা',
			99 => '99 অস্বীকৃতি',
		];
    }


    public static function whoSuggested(){
    	return 
    	[
			1 => '1 পিতা-মাতা',
			2 => '2 ভাই-বোন',
			3 => '3 জীবনসঙ্গী',
			4 => '4 ছেলে-মেয়ে',
			5 => '5 বন্ধু',
			6 => '6 সহকর্মী',
			7 => '7 সরকারী ঘোষণা',
			8 => '8 স্বাস্থ্যকর্মী',
			9 => '9 প্রতিবেশী',
			10 => '10 শিক্ষক',
			11 => '11 ইমাম',
			12 => '12 প্রিন্ট মিডিয়া',
			13 => '13 ইলেকট্রনিক মিডিয়া',
			14 => '14 সোশ্যাল মিডিয়া',
			15 => '15 নিজের',
            16 => '16 ডাক্তার',
            17 => '17 এলাকার গণ্য মান্য ব্যক্তি',
            18 => '18 বিদেশ যাওয়ার জন্য',
            19 => '19 মাইকিং',
            20 => '20 চেয়ারম্যান/মেম্বার/ জন প্রতিনিধি',
            21 => '21 আত্মীয়',
            22 => '22 শিক্ষা প্রতিষ্ঠান',
            23 => '23 কর্মস্থল',
            24 => '24 পরিবার',
            25 => '25 প্রতিষ্ঠান প্রধান',
            26 => '26 সহকর্মী',
			66 => '66 অন্যান্য (উল্লেখ করুন)',
		];


    }

    public static function ignoreReason(){

    	return [
			1 => '1 ইতিমধ্যেই কোভিড-১৯ হয়েছিলো এবং আমি বিশ্বাস করি আমি সুরক্ষিত',
			2 => '2 ভ্যাকসিন কার্যকর নয়',
			3 => '3 ভ্যাকসিন নিরাপদ  নয়/ক্ষতির কারণ/পার্শ্ব প্রতিক্রীয়া হতে পারে',
			4 => '4 ভ্যাকসিন ্েরথকে কোভিড-১৯ হওয়ার সম্ভাবনা আছে',
			5 => '5 ধর্মীয় আপত্তি/প্রথাগত বিশ্বাস',
			6 => '6 সংক্রমিত হওয়ার সম্ভাবনা কম',
			7 => '7 জীবনের জন্য হুমকি/মারাত্মক কম',
			8 => '8 ভ্যাকসিন অ্যালার্জিক',
			9 => '9 সুচ পছন্দ নয়',
			10 => '10 অন্যান্যদোর প্রথম টিকা না দেওয়া পর্যন্ত অপেক্ষা করা',
			11 => '11 অন্যান্য চিকিৎসা পদ্ধতির জন্য অপেক্ষা-',
			12 => '12 অন্য ভ্যাকসিনের জন্য অপেক্ষা-',
			13 => '13 শারীরিক অসুস্থতার/অবস্থার কারণে চিকিৎসকের অনুমতি না দেয়ায়',
            14 =>'14 রেজিস্ট্রেশন হয়নি',
            15=>'15 মেসেজ পাইনি',
            16 =>'16 বাচ্চা মাতৃদুগ্ধ পান করে তাই',
            17 =>'17 বয়স সীমায় পৌঁছায়নি',
            18 =>'18 টিকাকেন্দ্র বাসা থেকে অনেক দূরে',
            19 =>'19 ব্যাস্ততা',
            20 =>'20 কেন্দ্রে টিকার ঘাটতি',
            21 =>'21 স্বামী/স্ত্রীর অসম্মতি',
            22 =>'22 এনআইডি কার্ড নাই',
            23 =>'23 টিকা কেন্দ্রে ভীড়',
            24 =>'24 আগ্রহ নেই/ইচ্ছা নেই',
            25 =>'25 আলসেমি',
            26 =>'26 নেব না',
            27 =>'27 শারিরীক অসুস্থতা',
            28 =>'28 শারিরীক সমস্যা',
            29 =>'29 গর্ভবতী',
            30 =>'30 টিকার ব্যাপারে জানা নেই/কেউ বলে নাই',
            31 =>'31 ইনজেকশন ভয় পাই',
			66 => '66 অন্যান্য (উল্লেখ করুন )',
			88 => '88 জানি না',
			99 => '99 উত্তর দিতে অস্বীকৃতি'
		];
    }


    public static function death_symptoms(){
    	return [
			1 => '1 হৃদযন্ত্রের বিকলতা  ফেইলিওর',
			2 => '2 জটিল হৃদরোগ/ রক্তচাপজনিত রোগ',
			3 => '3 জটিল কিডনি/ডায়ালাইসিসের রোগী/বৃক্কের রোগ',
			4 => '4 জটিল লিভার বা যকৃতের রোগ',
			5 => '5 শ্বাসতন্ত্রের রোগ',
			6 => '6 ক্যানসার',
            7 => '7 কোন রোগ ছিল না',
            //8 => '8 বার্ধক্যজনিত কারণে',
            8 => '8 হাড়ে ব্যাথা/বাতরোগ',
            9 => '9 টিউমার',
            10 => '10 ব্রেন স্ট্রোক',
            11 => '11 বুকে ব্যথা',
            12 => '12 ডায়াবেটিস',
            13 => '13 অতিরিক্ত রক্তপাত',
            14 => '14 জ্বর',
            15 => '15 গলা ব্যাথা',
            16 => '16 গ্যাংগ্রীন',
            17 => '17 ঘাম',
            18 => '18 কাঁশি',
            19 => '19 খিঁচুনি/মৃগি রোগ',
            20 => '20 রক্তশূন্যতা',
            21 => '21 পেটে পানি জমা',
            22 => '22 পাইলস',
            23 => '23 শরীর অবশ',
            24 => '24 চর্ম রোগ',
            25 => '25 টিবি',
            26 => '26 প্রসাবে ইনফেকশন',
			66 => '66 অন্য রোগ (উল্লেখ করুন)',
            88 => '88 জানিনা'
		];
    }

    public static function covid_symptoms(){
        return [

            1 => '1 সবসময় জ্বর',
            2 => '2 কাপুনি',
            3 => '3 মাথা ব্যথা',
            4 => '4 গায়ে ব্যথা',
            5 => '5 শুকনা কাশি',
            6 => '6 ভেজা কাশি',
            7 => '7 শ্বাস কষ্ট',
            8 => '8 মাথা ঘোরানো/ঝিমঝিম ভাব',
            9 => '9 সর্দি',
            10 => '10 গলা ব্যথা',
            11 => '11 গন্ধ বা স্বাদ না পাওয়া',
            12 => '12 বমি বমি ভাব',
            13 => '13 দুর্বলতা',
            14 => '14 ডায়রিয়া',
            15 => '15 কিছুই হয় নি',
            16=>'16 খিচুনি',
            17=>'17 শ্বসনতন্ত্রের রোগ',
            18=>'18 এ্যাজমা',
            19=>'19 টিউমার',
            20=>'20 ব্রেইন স্ট্রোক',
            21=>'21 পিত্তে পাথর/গল ষ্টোন',
            22=>'22 হৃদরোগ',
            23=>'23 রক্তচাপজনিত রোগ',
            24=>'24 কিডনি রোগ',
            25=>'25 ক্যানসার',
            26=>'26 ডায়াবেটিস',
            27=>'27 শরীরে পানি জমা',
            28=>'28 হাড়ে ব্যাথা/বাত ব্যাথা',
            29=>'29 লিভার বা যকৃতের রোগ',
            30=>'30 সড়ক দুর্ঘটনা',
            31=>'31 পানিতে ডুবে',
            32=>'32 সাপের কামড়ে',
            33=>'33 বিষক্রিয়ায়',
            34=>'34 আত্মহত্যা',
            35=>'35 অরুচি',
            36=>'36 অবস',
            66 => '66 অন্যান্য (উল্লেখ করুন)',
            88 => '88 জানিনা'
        ];
    }


    public static function death_where(){
    	return [
			1 => '1 তার বাড়ীতে',
			2 => '2 স্বাস্থ্য সেবা কেন্দ্রে',
			3 => '3 স্বাস্থ্য সেবা কেন্দ্রের ইমারজেন্সি/ওপিডি',
			4 => '4 স্বাস্থ্য সেবা কেন্দ্রে নেয়ার পথে',
            5 => '5 আমার বাড়ীতে',
            6 => '6 ছেলের/মেয়ের বাড়িতে',
            7 => '7 বিদেশে',
            8 => '8 আত্মীয়ের বাড়িতে',
            9 => '9 কর্মক্ষেত্রে',
            10 =>'10 পানিতে ডুবে',
            11 =>'11 সড়কে দুর্ঘটনায়',
            12 =>'12 ছেলের/মেয়ের বাড়িতে',
            13 =>'13 বিদেশে',
            14 =>'14 আত্মীয়ের বাড়িতে',
            15 =>'15 কর্মক্ষেত্রে',
            16 =>'16 পানিতে ডুবে',
            17 =>'17 সড়কে দুর্ঘটনায়',
			66 => '66 অন্য কোথাও (উল্লেখ করুন)',
            88 => '88 জানিনা'

		];
    }

    public static function death_reason(){

    	return [
			1 => '1 বার্ধক্য জনিত রোগে মৃত্যু',
			2 => '2 স্বাভাবিক মৃত্যু',
			3 => '3 অজানা রোগে মৃত্যু',
			4 => '4 সংক্রামক রোগের কারণে',
			5 => '5 হৃদরোগ',
			6 => '6 শ্বসনতন্ত্রের রোগ',
			7 => '7 রক্তচাপজনিত রোগ',
			8 => '8 কিডনি রোগ',
			9 => '9 ক্যানসার',
			10 => '10 লিভার বা যকৃতের রোগ',
			11 => '11 স্ট্রোক',
			12 => '12 সড়ক দুর্ঘটনা',
			13 => '13 পানিতে ডুবে',
			14 => '14 সাপের কামড়ে',
			15 => '15 বিষক্রিয়ায়',
			16 => '16 আত্মহত্যা',
			17 => '17 কোভিড -১৯',
			18 => '18 মশাবাহিত রোগে',
			19 => '19 কলেরা',
			//20 => '20 প্রসবের সময় মৃত্যু',
			//21 => '21 গর্ভাবস্থা শেষ হওয়ার বা সন্তান প্রসবের দুই মাসের মধ্যে মৃত্যু',
			22 => '22 কোভিডআক্রান্ত হওয়ায় হাসপাতালে ভর্তি হতে না পারায়',
			23 => '23 অন্য রোগে আক্রান্ত ছিল, কিন্তু কোভিডের কারণে হাসপাতালে ভর্তি হতে না পারায়',
            24 => '24 করোনার উপসর্গ', 
            25 => '25 দুর্বলতা',
            26 => '26 ডায়রিয়া',
            27 => '27 গর্ভাবস্থায় মৃত্যু',
            28 => '28 থাইরয়েডের সমস্যায়',
            29 => '29 প্রিম্যাচিউর বাচ্চা',
            30 => '30 অরুচি',
            31 => '31 পিত্তে পাথর/গল ষ্টোন',
            32 => '32 হঠাৎ মৃত্যু',
			66 => '66 অন্যান্য (উল্লেখ করুন)',
            88 => '88 জানিনা'
		];
    }

    public static function getWhereMorDLived(){

		return [
			1 => '1 একই খানায়',
			2 => '2 একই গ্রামে/শহরে',
			3 => '3 একই জেলায়',
			4 => '4 অন্য জেলায়',
            88 => '88 জানিনা',
            99 => '99 অস্বীকৃতি'

		];
	}


	public static function get_death_before_symptoms(){

		return [

			1 => '1 সবসময় জ¦র',
			2 => '2 কাপুনি',
			3 => '3 মাথা ব্যথা',
			4 => '4 গায়ে ব্যথা',
			5 => '5 শুকনা কাশি',
			6 => '6 ভেজা কাশি',
			7 => '7 শ্বাস কষ্ট',
			8 => '8 মাথা ঘোড়ানো/ঝিমঝিম ভাব',
			9 => '9 সর্দি',
			10 => '10 গলা ব্যথা',
			11 => '11 গন্ধ বা স্বাদ না পাওয়া',
			66 => '66 অন্যান্য (উল্লেখ করুন)',
			88 => '88 জানিনা'
		];

	}

	public static function get_grave_where(){

		return [


				1 => '1 গোরস্থানে',
				2 => '2 পারিবারিক গোরস্থানে',
				3 => '3 কবর দেয়া হয় নি',
				4 => '4 পোড়ানো হয়েছিল',
                5 => '5 বিদেশে',
				66 => '66 অন্যান্য (উল্লেখ করুন)',
				88 => '88 জানিনা',
				99 => '99 অস্বীকৃতি'

		];
	}


    public static function get_live_with(){
        return [
            1 => '1 পরিবারের সাথে',
            3 => '3 পরিবার থেকে আলাদা',
            66 => '66 অন্যান্য',
        ];
    }


    public static function age_group(){


        return[
          'grp1'=>[18,29],
          'grp2'=>[30,39],
          'grp3'=>[40,49],
          'grp4'=>[50,150],
        ];

    }

    public static function age_boundary(){

        $d = file_get_contents("F:\\mostofa\\rammps\\boundary\\d_a.json");

        return json_decode($d,true);

        /*
        return [
            //male
            1=>[

              'c'=>[
                'grp1'=>[120,209],
                'grp2'=>[100,209],
                'grp3'=>[100,209],
                'grp4'=>[120,209],
              
              ],
              'v'=>[
                'grp1'=>[210,209],
                'grp2'=>[100,209],
                'grp3'=>[100,209],
                'grp4'=>[120,209],
              ],
              
              't'=>[
                
                'grp1'=>[210,209],
                'grp2'=>[100,209],
                'grp3'=>[100,209],
                'grp4'=>[120,209],
              
              ]

            ],

            //female

            3=>[

              'c'=>[
                'grp1'=>[120,209],
                'grp2'=>[100,209],
                'grp3'=>[100,209],
                'grp4'=>[120,209],
              
              ],
              'v'=>[
                'grp1'=>[120,209],
                'grp2'=>[100,209],
                'grp3'=>[100,209],
                'grp4'=>[120,209],
              ],
              
              't'=>[
                
                'grp1'=>[120,209],
                'grp2'=>[100,209],
                'grp3'=>[100,209],
                'grp4'=>[120,209],
              
              ]

            ],


        ];
        */
    }





}