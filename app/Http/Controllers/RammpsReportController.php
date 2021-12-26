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
	public function index(){

		view()->share('pageTitle', "Rammps Reporting");
		view()->share('breadcamps', array('Home' => url(session('access').'dashboard')));

    	$user_id=\Auth::User()->id;


        $rammps = 
        [
           [
            "31 - রিং হচ্ছে ধরে নি",
            DB::table('rammps')->where('last_status',31)->count()
           ],

           [
            "32 - ব্যস্ত",
            DB::table('rammps')->where('last_status',32)->count()
           ],

           [
            "33 - মোবাইল বন্ধ",
            DB::table('rammps')->where('last_status',33)->count()
           ],

           [
            "34 - অসম্মত",
            DB::table('rammps')->where('last_status',34)->count()
           ],

           [
            "35 - শুরুতে লাইন কেটে গেছে",
            DB::table('rammps')->where('last_status',35)->count()
           ],

           [
            "36 - প্রযোজ্য নয় ( মালিককে দেয়া যাচ্ছে না )",
            DB::table('rammps')->where('last_status',36)->count()
           ],

           [
            "37 - গ্রাহকের নাম্বার নয়",
            DB::table('rammps')->where('last_status',37)->count()
           ],

           [
            "41 - অসম্মত | Denied with/ wihtout Reason",
            DB::table('rammps')->where('last_status',41)->count()
           ],

           [
            "42 - অযোগ্য(বয়স ১৮ এর নিচে সপন্ন করুন )",
            DB::table('rammps')->where('last_status',42)->count()
           ],

           [
            "43 - লাইন কেটে গেছে / অস্পষ্ট",
            DB::table('rammps')->where('last_status',43)->count()
           ],

           [
            "44 - আংশিক অসম্মত",
            DB::table('rammps')->where('last_status',44)->count()
           ],

           [
            "45 - ভাষাগত সমস্যা",
            DB::table('rammps')->where('last_status',45)->count()
           ],

           [
            "51 - আংশিক সম্পূর্ণ করুন",
            DB::table('rammps')->where('last_status',51)->count()
           ],

           [
            "52 - অযোগ্য( পরিবার থেকে আলাদা / একা থাকে > যেমন :  মেস / হোস্টেল /  মাদ্রাসা / চাকুরী সূত্রে: বিদেশে অথবা অন্য জেলায়  / সাবলেট / পে-ইং  গেস্ট , ধন্যবাদ জানিয়ে শেষ করুন )",
            DB::table('rammps')->where('last_status',52)->count()
           ],


           [
            "53 - অসম্পূর্ণ",
            DB::table('rammps')->where('last_status',53)->count()
           ],

           [
            "54 - কোটা পূর্ণ হয়ে গেছে ( স্নোবল সময় নির্ধারণ  করুন )",
            DB::table('rammps')->where('last_status',54)->count()
           ],

           [
            "99 - শেষ হয়নি ( সময় নির্ধারণ  করুন )",
            DB::table('rammps')->where('last_status',99)->count()
           ],


        ];
        

        view()->share('info', $rammps);        

        return view(session('access').'rammps/reporting');


	}

    public function attendance_report(){

        view()->share('pageTitle', "Rammps attendance Reporting");
        view()->share('breadcamps', array('Home' => url(session('access').'dashboard')));


        $date = date('Y-m-d');

        $sql = "select 
        (select username from users where id=user_id) as user,
        attend_times,
        (select count(*) from rammps where last_status=31 and interview_id= user_id )  as trts,
        (select count(*) from rammps where last_status=32 and interview_id= user_id )  as trtu_s,
        (select count(*) from rammps where last_status=33 and interview_id= user_id )  as trth_s,
        (select count(*) from rammps where last_status=34 and interview_id= user_id )  as trfr_s,
        (select count(*) from rammps where last_status=35 and interview_id= user_id )  as trfv_s,
        (select count(*) from rammps where last_status=36 and interview_id= user_id )  as trsx_s,
        (select count(*) from rammps where last_status=37 and interview_id= user_id )  as trsv_s,
        (select count(*) from rammps where last_status=41 and interview_id= user_id )  as fron_s,
        (select count(*) from rammps where last_status=42 and interview_id= user_id )  as frot_s,
        (select count(*) from rammps where last_status=43 and interview_id= user_id )  as froth_s,
        (select count(*) from rammps where last_status=44 and interview_id= user_id )  as frott_s
        from rammps_attendance where attend_date = ?
        ";
        //DB::setFetchMode(PDO::FETCH_ASSOC);

        $data = DB::select($sql,[$date]);
               

        //var_dump($data);
        //die();

        view()->share('info', $data);
        
        return view(session('access').'rammps/attendance');


    }

    

	
}