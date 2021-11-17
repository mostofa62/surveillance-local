<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Rammps\QuestionText;
use App\Models\Rammps\Status;
use App\Models\Rammps\Sequence;
class Rammps extends Model{


	protected $table = 'rammps';
	use QuestionText;
	use Status;
	use Sequence;

	public function user_interviewer()
    {
        return $this->hasOne('App\User', 'id','interview_id');
    }

    public static function getGender($id = null){

        $data = [
            1=>'1-পুরুষ', 
            3=>'3-মহিলা', 
            5=>'5-তৃতীয় লিঙ্গ (পুরুষ)',
            7=>'7-তৃতীয় লিঙ্গ (মহিলা)'
        ];

        return isset($id)?$data[$id]:$data;
    }


    public static function get18UpDown(){

    	return[ 

            'bn'=>[ 
                1=>'1-১৮ বছরের উপরে', 
                3=>'3-১৮ বছরের নিচে', 
                99=>'99-অস্বীকৃিত']]
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
        $ages['en'][202]="Denied";
        $ages['bn'][202]="অস্বীকৃিত 202";

        return $ages[session('language')];
    }

    public static function getLiveCityOrVillage(){

    	return[ 

            'bn'=>[
             	1 => '১- শহর',
				3 => '৩- গ্রাম',
                //66=> '66 - অন্যান্য (উল্লেখ করুন)',
                88=>'88 - জানি না',
                99=>'99 - অস্বীকৃিত' 				

         ]]
            [session('language')];
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


    public static function getLastEducation(){
        return[ 

            'bn'=>[
                1 => '১- স্কুল না যেয়ে থাকলে',
                2=>'২- প্রাইমারী  স্কুল পর্যায়',
                3 => '৩- প্রাইমারী স্কুল পাশ',
                5 => '৫- এস . এস . সি বা ও  লেভেল পাশ',
                7 => '৭ -এইচ. এস . সি বা এ লেভেল পাশ',
                9 => '৯- স্নাতক / ডিগ্রী বা তার বেশি',
                99 => '৯৯- অস্বীকৃিত',
                66=>'৬৬-অন্যান্য (উল্লেখ করুন)',

         ]]
            [session('language')];
    }




}