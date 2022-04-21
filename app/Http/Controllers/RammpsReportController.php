<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use PDO;
use Carbon\Carbon;

use App\Models\RammpsAttendance;

use App\User;
use Response;

class RammpsReportController extends Controller{

    use \App\Http\Controllers\Traits\Paginator;
	public function index(Request $request){

		view()->share('pageTitle', "Rammps Reporting");
		view()->share('breadcamps', array('Home' => url(session('access').'dashboard')));

    $date = "";
    if($request->get('date')){
      $date = " and date(updated_at)='".$request->get('date')."'";
    }

    $sql = "SELECT count(id) as counted, last_status 
      FROM `rammps` where 
      last_status in 
      (1,9,31,32,33,34,35,36,37,41,42,43,44,45,51,52,53,54,55,56,99)
      $date 
      GROUP by last_status;
        ";
      //DB::setFetchMode(PDO::FETCH_ASSOC);

      $data = (array)DB::select($sql);

      //return $data;

    	$user_id=\Auth::User()->id;


      $rammps = 
      [

         0=>[
          "0 - Free Number",
         DB::table('rammps')->where('last_status',0)->count()
         ],
         1=>[
          "1 - Completed",
          0
         ],
         
         9=>[
          "9 -  এখনই",
          0
         ],
         31=>[
          "31 - রিং হচ্ছে ধরে নি",
          0
         ],

         32=>[
          "32 - ব্যস্ত",
          0
         ],

         33=>[
          "33 - মোবাইল বন্ধ",
          0
         ],

         34=>[
          "34 - অসম্মত",
          0
         ],

         35=>[
          "35 - শুরুতে লাইন কেটে গেছে",
          0
         ],

         36=>[
          "36 - প্রযোজ্য নয় ( মালিককে দেয়া যাচ্ছে না )",
          0
         ],

         37=>[
          "37 - গ্রাহকের নাম্বার নয়",
          0
         ],

         41=>[
          "41 - অসম্মত | Denied with/ wihtout Reason",
          0
         ],

         42=>[
          "42 - অযোগ্য(বয়স ১৮ এর নিচে সপন্ন করুন )",
          0
         ],

         43=>[
          "43 - লাইন কেটে গেছে / অস্পষ্ট",
          0
         ],

         44=>[
          "44 - আংশিক অসম্মত",
          0
         ],

         45=>[
          "45 - ভাষাগত সমস্যা",
          0
         ],

         51=>[
          "51 - আংশিক সম্পূর্ণ করুন",
          0
         ],

         52=>[
          "52 - অযোগ্য( পরিবার থেকে আলাদা / একা থাকে > যেমন :  মেস / হোস্টেল /  মাদ্রাসা / চাকুরী সূত্রে: বিদেশে অথবা অন্য জেলায়  / সাবলেট / পে-ইং  গেস্ট , ধন্যবাদ জানিয়ে শেষ করুন )",
          0
         ],


         53=>[
          "53 - অসম্পূর্ণ",
          0
         ],

         54=>[
          "54 - কোটা পূর্ণ হয়ে গেছে ( স্নোবল সময় নির্ধারণ  করুন )",
          0
         ],
         55=>[
          "55 - Quoto Fillup Refused Snowball",
          0
         ],
         56=>[
          "56 - বয়স্ক ব্যক্তি নাই",
          0
         ],

         99=>[
          "99 - শেষ হয়নি ( সময় নির্ধারণ  করুন )",
          0
         ],


      ];

      
      foreach($rammps as $k=>$v){
        $key = array_search("$k", array_column($data, 'last_status'));

        //echo $k."-".$key." ";

        if($key > -1){
          //serialize($data[$key]);
          //echo  $data[$key]->last_status;

          //echo $data[$key]->last_status."-".$data[$key]->counted."</br>";

          $rammps[$k][1] = $data[$key]->counted;

        }else{
          $rammps[$k][1] = 0;
        }

        //echo "  <br/>";

      }

      //die();

      //return $rammps;
        

      view()->share('info', $rammps);
      view()->share('total_numbers',DB::table('rammps')->count('id'))        

      return view(session('access').'rammps/reporting');


	}

    public function attendance_report(){

        view()->share('pageTitle', "Rammps attendance Reporting");
        view()->share('breadcamps', array('Home' => url(session('access').'dashboard')));


        $date = date('Y-m-d');

        $sql = "select 
        (select username from users where id=user_id) as user,
        attend_times,
        (select count(id) from rammps where last_status=31 and interview_id= user_id )  as trts,
        (select count(id) from rammps where last_status=32 and interview_id= user_id )  as trtu_s,
        (select count(id) from rammps where last_status=33 and interview_id= user_id )  as trth_s,
        (select count(id) from rammps where last_status=34 and interview_id= user_id )  as trfr_s,
        (select count(id) from rammps where last_status=35 and interview_id= user_id )  as trfv_s,
        (select count(id) from rammps where last_status=36 and interview_id= user_id )  as trsx_s,
        (select count(id) from rammps where last_status=37 and interview_id= user_id )  as trsv_s,
        (select count(id) from rammps where last_status=41 and interview_id= user_id )  as fron_s,
        (select count(id) from rammps where last_status=42 and interview_id= user_id )  as frot_s,
        (select count(id) from rammps where last_status=43 and interview_id= user_id )  as froth_s,
        (select count(id) from rammps where last_status=44 and interview_id= user_id )  as frott_s
        from rammps_attendance where attend_date = ?
        ";
        //DB::setFetchMode(PDO::FETCH_ASSOC);

        $data = DB::select($sql,[$date]);
               

        //var_dump($data);
        //die();

        view()->share('info', $data);
        
        return view(session('access').'rammps/attendance');


    }

    public function boundary(){

      //exec("");


      $d = file_get_contents("F:\\mostofa\\rammps\\boundary\\d_a.json");

      $d = json_decode($d,true);
      echo "<table>";
      echo "<tr><th></th><th></th></tr>";
      foreach ($d as $key => $value) {
         $style="";
         if($value >=1055){ $style ="style='background-color:#ff00ff;color:#fff;font-weight:bold;'";  }
         echo "<tr><th>$key</th> <td $style >$value</td></tr>";
      }
      echo "</table>";
    }


    public function report(Request $request){

      $date = $request->get('date') ? $request->get('date'):date('Y-m-d');
       view()->share('pageTitle', "Rammps attendance Reporting $date");
       view()->share('breadcamps', array('Home' => url(session('access').'dashboard')));

      
      //var_dump($date);die();

      $sql = "SELECT interview_id,last_status,
      (select attend_times from rammps_attendance where user_id = interview_id and attend_date='{$date}') as attend_times,
      (select username from users where id = interview_id) as user,
      count(*) as done FROM `rammps` where date(updated_at) = '{$date} and last_status <> 0' 
        GROUP by interview_id, last_status
        ";
        //DB::setFetchMode(PDO::FETCH_ASSOC);

      $data = DB::select($sql);
      //$data = json_decode(json_encode($data), true);
      //$ids =array_unique(array_column($data, 'interview_id'));
      //var_dump($data);die();
      //return $ids;
      //return $data;
      //$key_array=array();

      //foreach($ids as $id){
        //$keys = array_keys($data,$id);
        //$key_array[$id]=$id;

      //}
      //return $key_array;

          

      //view()->share('info', $data);

      //return view(session('access').'rammps/report');
      $status_arr = array(1,9,31,32,33,34,35,36,37,41,42,43,44,45,51,52,53,54,55,56,99);
      $output_arr = array();
      foreach ($data as $d) {
          $isMatch = false;
          $i=0;
          foreach ($output_arr as $oarr) {
                if(strcmp($oarr['user'], $d->user)==0){
                        $isMatch=true;
                        $iswork = false;
                        foreach ($oarr['work'] as $work) {
                                if(strcmp($work['last_status'], $d->last_status)==0){
                                        $work['done']+=$d->done;
                                        $iswork = true;
                                        break;
                                }
                        }
                        if(!$iswork){
                                $work = array();
                                $work['last_status'] = $d->last_status;
                                $work['done'] = $d->done;
                                //$work['attend_times'] = $d->attend_times;
                                array_push($oarr['work'], $work);
                                $output_arr[$i] = $oarr;
                        }
                        break;
                }
                $i++;
          }
          if(!$isMatch){
                  $oarr = array();
                  $oarr['user'] = $d->user;
                  $oarr['attend_times'] = $d->attend_times;
                  $oarr['work'] = array();
                  $work = array();
                  $work['last_status'] = $d->last_status;
                  $work['done'] = $d->done;                  
                  array_push($oarr['work'], $work);
                  array_push($output_arr, $oarr);
          }
        }
         //print_r($output_arr);
         //die();
        //return $output_arr;
        /*
        echo "<table border='1px'>";
        echo "<thead>";
        echo "<th> User ID </th>";
        // echo "<th> Attend times </td>";
        foreach($status_arr as $st)
                echo "<th> ".$st." </th>";
        // echo "<th> Num of call </td>";
        echo "</thead>";
        echo "<tbody>";
        foreach ($output_arr as $oarr) {
               
                echo "<tr>";
                echo "<td>".$oarr['user']."</td>";
                foreach($status_arr as $st){
                        $is_match=false;
                        foreach ($oarr['work'] as $work) {
                                if($work['last_status']==$st){
                                        echo "<td>".$work['done']."</td>";
                                        $is_match=true;
                                }
                        }
                        if(!$is_match)
                                echo "<td></td>";
                }
               
                echo "</tr>";
               
        }
        echo "</tbody>";
        echo "</table>";
        */


        view()->share('output_arr', $output_arr);
        view()->share('status_arr', $status_arr);

        return view(session('access').'rammps/report');

    }





    

	
}