<?php

namespace App\Models\Ivr;

trait Status {

	public static function getCallStatus(){

        return ['en'=>[ 2=>'Called but did not respond',3=>'Busy', 4=>'Switch off', 5=>'Have Not agreed',6=>'Call dropped',10=>'Not Eligible'],
            'bn'=>[ 2=>'রিং হচ্ছে ধরে নি',3=>'ব্যস্ত', 4=>'মোবাইল বন্ধ',5=>'অসম্মত',6=>'শুরুতে লাইন কেটে গেছে',10=>'প্রযোজ্য নয়',11=>'গ্রাহকের নাম্বার নয় ']][session('language')];

        

    }

    public static function getScheduleType(){
        return [
            'bn'=>[1=>'রিশিডিউল', 2=>'এপয়ন্টমেন্ট'],
        ][session('language')];
    }

    public static function getForcedfinished(){
        return [
            'bn'=>[8=>'আংশিক সম্পূর্ণ করুন']
        ][session('language')];
    }

    public static function getScheduleSuveillance(){
        return ['en'=>[0=>'Not Finished', 12=>'call Dropped/ Not Clear',7=>'Partially Done'],
            'bn'=>[0=>'শেষ হয়নি', 12=>'লাইন কেটে গেছে / অস্পষ্ট',7=>'আংশিক অসম্মত']][session('language')];
    }

     //6-8-2020
    public static function getKhanaNumber($s=0,$e=20){
         
        return [
            'bn'=>[array_combine(range($s,$e),range($s, $e))]
        ][session('language')];
    }
}