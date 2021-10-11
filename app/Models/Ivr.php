<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

use App\Models\Ivr\QuestionText;
use App\Models\Ivr\Sequence;
use App\Models\Ivr\Status;


class Ivr extends Model
{

	protected $table = 'ivr';

	//
    use SoftDeletes;
    use QuestionText;
    use Sequence;
    use Status;

    public function user()
    {
        return $this->hasOne('App\User', 'id','user_id');
    }

    public function user_interviewer()
    {
        return $this->hasOne('App\User', 'id','interview_id');
    }

    public function schedule_desc()
    {
        return $this->hasOne('App\Models\IvrSchedule', 'ivr_id','id')->orderBy('id', 'desc');
    }

    public function question(){
        return $this->hasOne('App\Models\IvrQuestion', 'ivr_id','id');
    }

    public static function getGender($id = null){

        $data = [
            1=>'1-পুরুষ', 
            3=>'3-মহিলা', 
            5=>'5-উভলিঙ্গ (পুরুষ)',
            7=>'7-উভলিঙ্গ (মহিলা)'
        ];

        return isset($id)?$data[$id]:$data;
    }


    public static function get18UpDown(){

    	return[ 

            'bn'=>[ 1=>'1- ৬০ বছরের উপরে', 3=>'3-৬০ বছরের নিচে', 0=>'0-অস্বীকৃিত']]
            [session('language')];
    }


    public static function getPersonAge($limit =null, $start=5){
        $ages['en']=[];
        $ages['bn']=[];
        $limit = $limit == null ? 100:$limit;
        for ($i=$start;$i<=$limit; $i++){
            $ages['en'][$i]=$i;
            $ages['bn'][$i]=$i;
        }
        $ages['en'][201]="Dont know";
        $ages['bn'][201]="জানি না 201";

        return $ages[session('language')];
    }

    public static function getLastEducation(){
    	return[ 

            'bn'=>[
             	1 => '১- স্কুল না যেয়ে থাকলে',
				3 => '৩- প্রাইমারী স্কুল পাশ',
				5 => '৫- এস . এস . সি বা ও  লেভেল পাশ',
				7 => '৭ -এইচ. এস . সি বা এ লেভেল পাশ',
				9 => '৯- স্নাতক / ডিগ্রী বা তার বেশি',
				99 => '৯৯- অস্বীকৃিত',
                66=>'৬৬-অন্যান্য (উল্লেখ করুন)',

         ]]
            [session('language')];
    }


    public static function getYesNoDenied(){
    	return[ 

            'bn'=>[
             	1 => '১- হ্যাঁ',
				3 => '৩- না',
				99 => '৯৯- অস্বীকৃিত',

         ]]
            [session('language')];
    }

    //6-8-2020

    public static function getYesNo(){
        return[ 

            'bn'=>[
                1 => '১- হ্যাঁ',
                3 => '৩- না',               

         ]]
            [session('language')];
    }

    public static function getCovidSymptom(){
        return[ 

            'bn'=>[
                1 => '১- জ্বর',
                2 => '২- কাশি',
                3 => '৩- শ্বাস কষ্ট',
                4 => '৪- মাথা ব্যথা',
                5 => '৫- গায়ে ব্যথা',
                6 => '৬- গন্ধ না/ কম পাওয়া',
                7 => '৭- পাতলা পায়খানা',
                8 => '৮- দূর্বলতা',
                9 => '৯- অন্যান্য (উল্লেখ করুন)'                

         ]]
            [session('language')];
    }
    //end 6-8-2020

    public static function getYesNoEveryDay(){
    	return[ 

            'bn'=>[
             	1 => '১- প্রতিদিন',
				3 => '৩- না',
				99 => '৯৯- অস্বীকৃিত',

         ]]
            [session('language')];
    }

    public static function getLast12MonthAlchohol(){
    	return[ 

            'bn'=>[
             	1 => '১- প্রতিদিন',
				3 => '৩ - সপ্তাহে ৩- ৬ দিন',
				5 => '৫- সপ্তাহে ১ - ২  দিন',
				7 => '৭ - মাসে ১ - ৩ দিন',
				9 => '৯ - মাসে গড়ে  ১ দিনের কম',
				99 => '৯৯- অস্বীকৃিত',

         ]]
            [session('language')];

    }

    public static function getFoodHabitDay(){
        //$ages['en']=[];
        $ages['bn']=[];
        $limit = 7;
        for ($i=0;$i<=$limit; $i++){
            //$ages['en'][$i]=$i;
            $ages['bn'][$i]=$i;
        }
        //$ages['en'][888]="Dont know";
        $ages['bn'][99]="৯৯- অস্বীকৃিত";

        return $ages[session('language')];
    }


    public static function getFoodPresentatinNumber(){
        //$ages['en']=[];
        $ages['bn']=[];
        $limit = 50;
        for ($i=0;$i<=$limit; $i++){
            //$ages['en'][$i]=$i;
            $ages['bn'][$i]=$i;
        }
        //$ages['en'][888]="Dont know";
        $ages['bn'][99]="৯৯- অস্বীকৃিত";

        return $ages[session('language')];
    }

    public static function getSaltTakenInterval(){

    	return[ 

            'bn'=>[
             	1 => '১- প্রতিদিন',
				3 => '৩ - মাঝে মাঝে',
				5 => '৫- কখনো না',
				88 => '৮৮  - জানি না',
				99 => '৯৯- অস্বীকৃিত',

         ]]
            [session('language')];
    }

    public static function getLiveCityOrVillage(){

    	return[ 

            'bn'=>[
             	1 => '১- শহর',
				3 => '৩- গ্রাম',				

         ]]
            [session('language')];
    }


    public static function getHelanTime(){
        //$ages['en']=[];
        $ages['bn']=[];
        $limit = 24;
        for ($i=0;$i<=$limit; $i++){
            //$ages['en'][$i]=$i;
            $ages['bn'][$i]=$i;
        }
        //$ages['en'][888]="Dont know";
        $ages['bn'][99]="৯৯- অস্বীকৃিত";

        return $ages[session('language')];
    }

    public static function getHappyLevel(){

        return[ 

            'bn'=>[
                1 => '১- খুব অসন্তুষ্ট',
                2 => '২- অসন্তুষ্ট',
                3 => '৩- সন্তুষ্ট',
                4 => '৪- খুব সন্তুষ্ট',                

         ]]
            [session('language')];
    }

    public static function getHardLevel(){

        return[ 

            'bn'=>[
                1 => '১- খুব কঠিন',
                2 => '২- কঠিন', 
                3 => '৩- সহজ',
                4 => '৪- খুব সহজ',               

         ]]
            [session('language')];
    }

    public static function getOtherDontNoOnly(){
        return [ 
            'bn'=>[ 66=>'অন্যান্য (উল্লেখ করুন)',88=>'জানি না', 99=>'উত্তর দিতে অসম্মত']][session('language')];
    }

    public static function citycorporationlist($id=null){
        $dis=null;

        if( $id !=null ){
            $dis = $dis = \App\Area::select(DB::raw('id,concat(name," | ",eng_name) as name'))->where('type_id',7)->where('id',$id)->first();
        }else{

            $dis = \App\Area::select(DB::raw('id,concat(name," | ",eng_name) as name'))->where('type_id',7)->   pluck('name','id')->toArray();
        }

        return $dis;
    }

    public static function upazilalist($data, $id=null){
        $dis= [];
        if($data > 0){
            $dis = \App\Area::select(DB::raw('id,concat(name," | ",eng_name) as name'))->where('parent_id',$data)->where('type_id',6)->pluck('name','id')->toArray();
            
        }else if($id!=null){
            $dis = \App\Area::select(DB::raw('id,concat(name," | ",eng_name) as name'))->where('id',$id)->first();
        }

        return $dis;
    }

    public static function districtList($id=null){
        
        $dis=null;

        if( $id !=null ){
            $dis = \App\Area::select(DB::raw('id,concat(name," | ",eng_name) as name'))->where('type_id',5)->where('id',$id)->first();
        }else{

            $dis = \App\Area::select(DB::raw('id,concat(name," | ",eng_name) as name'))->where('type_id',5)->   pluck('name','id')->toArray();
        }
        

        return $dis;
        
    }


    public static function municipilList($data, $id=null){
        
        $dis= [];


        if($data > 0){
            $dis = \App\Area::select(DB::raw('id,eng_name as name'))->where('parent_id',$data)->where('type_id',9)->pluck('name','id')->toArray();
            
        }else if($id!=null){
            $dis = \App\Area::select(DB::raw('id,eng_name as name'))->where('id',$id)->where('type_id',9)->first();
        }

        

        return $dis;
        
    }


    public static function districtListLimit($id=null){
        
        $dis=null;

        if( $id !=null ){
            $dis = \App\Models\AreaLimit::select(DB::raw('area_id,concat(name," | ",eng_name) as name'))->where('area_id',$id)->first();
        }else{

            $dis = \App\Models\AreaLimit::select(DB::raw('area_id as id,concat(name," | ",eng_name) as name'))->   pluck('name','id')->toArray();
        }
        

        return $dis;
        
    }



}