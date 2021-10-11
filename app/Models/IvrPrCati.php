<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

use App\Models\IvrPrCati\QuestionText;
use App\Models\IvrPrCati\Sequence;
//use App\Models\IvrFollow\Status;

class IvrPrCati extends Model
{
    protected $table = 'ivr_pr_cati';

    //protected $primaryKey = 'ivr_id';

    use QuestionText;
    use Sequence;
    //use Status;

    public function user_interviewer()
    {
        return $this->hasOne('App\User', 'id','interview_id');
    }

    protected $fillable = [
        "q_1",
        "q_1_n",
        "q_1_n_e",
        "q_2",
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
        "q_8",
        'q_9',            
        'q_10',
        'q_11',
        'q_12'        

    ];

   

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
                5=>  '৫- যোগাযোগ করা সম্ভব হয়নি'

         ]]
            [session('language')];
    }

    public static function getLiveCityOrVillage(){

        return[ 

            'bn'=>[
                1 => '১- শহর',
                3 => '৩- গ্রাম',
                99 => '৯৯- অস্বীকৃিত',                

         ]]
            [session('language')];
    }

   

    public static function getGender($index=null){

    	$data = [ 

             1=>'1-পুরুষ', 3=>'3-মহিলা', 5=>'5-উভলিঙ্গ (পুরুষ)',7=>'7-উভলিঙ্গ (মহিলা)'
        ];
        return isset($index)?$data[$index]:$data;
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

        $ages['en'][202]="202 Denied";
        $ages['bn'][202]="অস্বীকৃিত 202";


        return $ages[session('language')];
    }

    public static function getLastEducation($index=null){
    	$data = [ 

            
             	1 => '১- স্কুল না যেয়ে থাকলে',
				3 => '৩- প্রাইমারী স্কুল পাশ',
				5 => '৫- এস . এস . সি বা ও  লেভেল পাশ',
				7 => '৭ -এইচ. এস . সি বা এ লেভেল পাশ',
				9 => '৯- স্নাতক / ডিগ্রী বা তার বেশি',
				99 => '৯৯- অস্বীকৃিত',
                66=>'৬৬-অন্যান্য (উল্লেখ করুন)',

         ];

         return isset($data[$index])?$data[$index]:$data;
            
    }

    public static function getRelatedTo($index=null){
        $data = [

            1 => 'বাবা 1',
            3 => 'মা 3',
            5 => 'মামা / চাচা / খালু 5',
            7 => 'মামী / চাচী  / খালা 7',
            9=> 'নিজেই - 9',
            66 => '৬৬ - অন্যান্য (উল্লেখ করুন) 66',
            99 => '৯৯ - অস্বীকৃিত জানানো 99'

        ];
        return isset($data[$index])?$data[$index]:$data;
    }

   

    public static function getOccupation($index=null){
        $data = [

            
            1 => '১ - গৃহিণী 1',
            2 => '২ - \'ছাত্রী / ছাত্র 2',
            3 => '৩ - কর্মজীবী  3',
            4 => '৪ - বাড়িতে বসেই কাজ করেন 4',
            5 => '৫ - গার্মেন্টস কর্মী 5',
            6 => '৬ - শিক্ষকতা 6',
            7 => '৭ - ব্যবসা  7',
            8 => '৮ - ডাক্তার  8',
            9 => '৯ - ইঞ্জিনিয়ার 9',
            10 => '১০ - কৃষিকাজ 10',
            11 => '১১ - অবসরপ্রাপ্ত 11',
            12 => '১২ - উকিল 12',
            13 => '১৩ - দোকানদার  13',
            14 => '১৪ - আর্মি/নেভী/এয়ারফোর্স  14',
            15 => '১৫ - দর্জি 15',
            16 => '১৬ - জন-প্রতিনিধি 16',
            17 => '১৭ - জেলে 17',
            18 => '১৮ - দিনমজুর 18',
            19 => '১৯ - হোমিওপ্যাথি চিকিৎসক 19',
            20 => '২০ - পল্লী চিকিৎসক 20',
            21 => '২১ - কবিরাজ 21',
            22 => '২২ - ক্ষুদ্র ব্যবসায়ী 22',
            23 => '২৩ - ভিক্ষুক 23',
            24 => '২৪ - স্বঃনিয়জিত 24',
            25 => '২৫ - সরকারি চাকুরি 25',
            26 => '২৬ - বেসরকারি চাকুরি 26',
            27 => '২৭ - বেকার 27',
            28 => '২৮ - রিকশা চালক 28',
            29 => '২৯ - ফ্রিলেন্স ওয়ার্কার  29 ',
            30 => '৩০ - ড্রাইভার 30 ',
            31 => '৩১ - বাবুর্চি 31',
            32 => '৩২ - পুলিশ 32 ',
            66 => '৬৬ - অন্যান্য (উল্লেখ করুন) 66',
            99 => '৯৯ - অস্বীকৃিত জানানো 99',

        ];

        return isset($data[$index])?$data[$index]:$data;
    }

    public static function getNow(){
        return [
            1 => 'এখনই যোগাযোগ করুন'
        ];
    }

    public static function getWhyNotInteresed($index = null){

        $data =  [
            1 => '1-ব্যস্ততা/ সময় নেই',
            2 => '2-অনাগ্রহী',
            3 => '3-ফোনে জরিপ বিশ্বাসহীনতা',
            4 => '4-ফোনে টাকা কাটার ভয়',
            5 => '5-বিকাশের মাধ্যমে প্রতারণার ভয়',
            6 => '6-জরিপ সম্পর্কে বুঝিনা/জরিপ বিষয়ে অজ্ঞতা',
            7 => '7-জরিপ সম্পর্কে প্রচারনার অভাব',
            8 => '8-পারিবারিক কারণ',
            9 => '9-ভাষাগত সমস্যা',
            10 => '10-জরিপে ব্যাবহৃত মোবাইল নম্বর বিষয়ক সন্দেহ',
            66 => '৬৬ - অন্যান্য (উল্লেখ করুন) 66',
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
