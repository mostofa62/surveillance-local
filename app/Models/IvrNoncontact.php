<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

use App\Models\IvrNoncontact\QuestionText;
use App\Models\IvrNoncontact\Sequence;

class IvrNoncontact extends Model
{
    protected $table = 'ivr_noncotact';

    protected $primaryKey = 'ivr_id';


    use QuestionText;
    use Sequence;
    //use Status;

    public function user_interviewer()
    {
        return $this->hasOne('App\User', 'id','interview_id');
    }


    protected $fillable = [
        "q_1",
        "q_2",
        "q_12",
        "q_3",
        "q_4",
        "q_5",
        "q_5_e",
        "q_5_dd",
        "q_5_cc",
        "q_5_uz",
        "q_5_mc",
        "q_6",
        "q_6_e",
        "q_7",
        'q_7_e',
        "q_7_1",
        'q_7_1_e',            
        'q_8',
        'q_9'       

    ];

    public static function getCATIORIVR($index){
        $data =[
            16=>'CATI',
            19=>'IVR'
        ];
        return isset($data[$index])?$data[$index]:null;
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

    public static function getYesNo(){
    	return[ 

            'bn'=>[
             	1 => '১- হ্যাঁ',
				3 => '৩- না'

         ]]
            [session('language')];
    }

    public static function getYesNoCom(){
        return[ 

            'bn'=>[
                1 => '১- হ্যাঁ',
                3 => '৩- না',
                5=>  '৫- পুনরায় যোগাযোগ করা সম্ভব হয়নি'

         ]]
            [session('language')];
    }


    public static function getGender($index=null){

    	$data = [ 

             1=>'1-পুরুষ', 3=>'3-মহিলা', 5=>'5-উভলিঙ্গ (পুরুষ)',7=>'7-উভলিঙ্গ (মহিলা)'
        ];
        return isset($index)?$data[$index]:$data;
    }

    public static function get18UpDown(){

    	return[ 

            'bn'=>[ 1=>'1-১৮ বছরের উপরে', 3=>'3-১৮ বছরের নিচে', 0=>'0-অস্বীকৃিত']]
            [session('language')];
    }

    public static function getPersonAge($limit =null, $start=10){
        $ages['en']=[];
        $ages['bn']=[];
        $limit = $limit == null ? 100:$limit;
        for ($i=$start;$i<=$limit; $i++){
            $ages['en'][$i]=$i;
            $ages['bn'][$i]=$i;
        }
        //$ages['en'][88]="Dont know";
        //$ages['bn'][88]="৮৮ জানি না 88";

        //$ages['en'][99]="99 Denied";
        //$ages['bn'][99]="৯৯- অস্বীকৃিত";


        return $ages[session('language')];
    }

    public static function getLastEducationDataP($index){
    	$data = [ 

            
             	1 => '১- স্কুল না যেয়ে থাকলে',
				3 => '৩- প্রাইমারী স্কুল পাশ',
				5 => '৫- এস . এস . সি বা ও  লেভেল পাশ',
				7 => '৭ -এইচ. এস . সি বা এ লেভেল পাশ',
				9 => '৯- স্নাতক / ডিগ্রী বা তার বেশি',
				99 => '৯৯- অস্বীকৃিত',
                66=>'৬৬-অন্যান্য (উল্লেখ করুন)',

         ];

         return isset($data[$index])?$data[$index]:null;
            
    }

    public static function getLastEducation($index=null){
        $data = [ 

            
                1 => '১- স্কুলে  যায় নাই',
                3 => '৩- প্রাথমিক শ্রেণী',
                5 => '৫- প্রাথমিক পাশ',
                6 => '৭- মাধ্যমিক শ্রেণী',
                7 => '৯- মাধ্যমিক পাশ',
                11 => '১১- উচ্চ মাধ্যমিক ও তদূর্ধ্ব',
                99 => '৯৯- অস্বীকৃিত',
                66=>'৬৬-অন্যান্য  (নির্দিষ্ট করুন)',

         ];


         return isset($data[$index])?$data[$index]:$data;
            
    }

    public static function getLastRefusalIssue($index=null){
        $data = [

            1 => '১- ফোন কলটি পাওয়ার কথা মনে করতে পারছি না 1',
            2 => '২- অচেনা ফোন নাম্বার 2',
            3 => '৩- ব্যস্ততা 3',
            4 => '৪- সময় ছিলনা  4',
            5 => '৫- অনাগ্রহী ছিলাম 5',
            6 => '৬- আমি / পরিবারের কেউ অসুস্থ ছিল 6',
            7 => '৭- পারবিারকি সমস্যা 7',
            8 => '৮- ভাষাগত সমস্যা 8',
            9 => '৯- জরিপটি  সর্ম্পকে টিভি , রেডিও , ফেসবুক  ইত্যাদি জায়গায় বিজ্ঞাপন  দেখেনি 9',
            10 => '১০- যোগাযোগ বিচ্ছিন্ন হয়ে গিয়েছিলো 10',
            11 => '১১- মোবাইললে কোথায় চাপ দিব বুঝিনি  11',
            12 => '১২- টাকা চুরির ভয় 12',
            66 => '৬৬- অন্যান্য  (নির্দিষ্ট করুন) 66',
        ];

        return isset($data[$index])?$data[$index]:$data;
    }

    public static function getAttractveIssue($index=null){
    	$data = [
    		1 => 'খুবই আগ্রহী হবো',
			2 => 'অনাগ্রহী হবো',
			3 => 'আদৌ আগ্রহী হবো না।',			
    	];
    	return isset($data[$index])?$data[$index]:$data;
    }

    public static function getOtherDontNoOnly($index=null){
        $data = [ 66=>'অন্যান্য (উল্লেখ করুন)',88=>'জানি না', 99=>'উত্তর দিতে অসম্মত'];
        return isset($data[$index])?$data[$index]:$data;
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
