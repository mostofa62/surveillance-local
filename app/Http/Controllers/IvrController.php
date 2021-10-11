<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ivr;
use App\Models\IvrQuestion as Question;
use App\Models\IvrSchedule as Schedule;
use App\Models\IvrScheduleHistory as PickHistory;
use DB;
use App\User;
use Response;

use Carbon\Carbon;

class IvrController extends Controller
{

	use \App\Http\Controllers\Traits\Paginator;

	public function index(Request $request)
    {
        $ivr = Ivr::orderBy('id', 'asc');

        //dd(session('accesslist_id'));
        if(session('user')->project_id!=7)
            return redirect(session('access').'dashboard')->send();
        else{ 
            if(in_array(5,session('accesslist_id')))
            $ivr=$ivr->where('interview_id',session('user')->id);
        }
        /*
        else if(in_array(5,session('accesslist_id')))
            $poultry=$poultry->where('interview_id',session('user')->id);
        */
        $pagetitle="Ivr Contact Lists";
        


        if ($request->s_id_no) {
            $ivr =$ivr->where('id','=',  $request->s_id_no);
            $pagetitle= "CATI Contact Search Results";
        }

        if ($request->s_mobile_no) {
            $ivr =$ivr->where('mobile_no', 'like', '%' . $request->s_mobile_no . '%');
            $pagetitle= "CATI Contact Search Results";
        }

        

        $ivr=$ivr->paginate(20);

        view()->share('pageTitle', $pagetitle);
        view()->share('ivrs', $ivr);
        view()->share('breadcamps', array('Home' => url(session('access').'dashboard'), 'CATI Contact' => url(session('access').'ivr')));
        return view(session('access').'ivr/index');
    }

    public function show($id){

        view()->share('pageTitle', "CATI Contact Details");
        view()->share('breadcamps', array('Home' => url(session('access').'dashboard'), 'CATI Contact' => url(session('access').'ivr'), 'CATI Contact Details' => url(session('access').'ivr/' . $id)));

        $ivr  = Ivr::find($id);
        $question = $ivr->question;
        view()->share('info', $ivr);
        view()->share('question', $question);
        return view(session('access').'ivr/detail');

    } 

    public function callInitiate()
    {

    	view()->share('pageTitle', "Call Initiate Form");
        view()->share('breadcamps', array('Home' => url(session('access').'dashboard'), 'Ivr Contact' => url(session('access').'ivr'), "Call Initiate Form" => url(session('access').'ivr/callInitiate')));

        //logical part and initialize
        $user_id=\Auth::User()->id;
        //pick logic if user pick schedule or appointment
        $ivr = Ivr::select(DB::raw('ivr.*'))
        ->where('status',-2)
        ->where('interview_id',$user_id)
        ->first();
        //already hold questioned and started interview
        if(!isset($ivr)) {

        	$ivr = Ivr::select(DB::raw('ivr.*'))
            ->join('ivr_questions',function($q){
                $q->on('ivr.id', 'ivr_questions.ivr_id');
                //$q->where('ivr_questions.deleted_at', null);
            })
            ->where('status',-1)
            ->where('interview_id',$user_id)
            ->first();

        }
        //already hold quesiton
        if(!isset($ivr)) {
        	$ivr = Ivr::select(DB::raw('ivr.*'))
            ->where('status',-1)
            ->where('interview_id',$user_id)            
            ->first();  
        }

        //get free number 0
        if(!isset($ivr)) {

        	$ivr = Ivr::select(DB::raw('ivr.*'))
            ->where('status',0)            
            ->first();   

        }
        //end logical part

        //get previous respondend
        $previous_respondent = null;

        //update number of call count depends on schedules
        if (isset($ivr)){

        	$no_of_call = DB::table('ivr_schedules')->where('ivr_id','=',$ivr->id)
                ->where('schedule_date','<>',null)
            ->count('ivr_id');
            

            $ivr->no_of_call = $no_of_call;

            $ivr->interview_id=$user_id;
            if($ivr->status!=-2 || $ivr->status==0){
                $ivr->status=-1;
            }            
            $ivr->save();

            $previous_respondent = DB::table('ivr_pr_cati')->where('mobile_no','=',$ivr->mobile_no)->first();


        }else{

        	view()->share('info', null);            

        }

        //schedule and appointment list
        $distanceMax = date("Y-m-d H:i",strtotime("+30 minutes"));
        $distanceMin = date("Y-m-d H:i",strtotime("-30 minutes"));

        /*$scheduleList = DB::select("select ivr.id,ivr.mobile_no,ivr.status,ivr.interview_id, users.username,
ivr_schedules.s_type,ivr_schedules.id as schedule_id, ivr.schedule_date from `ivr` inner join `ivr_schedules` on `ivr`.`id` = `ivr_schedules`.`ivr_id` and `ivr`.`schedule_date` = ivr_schedules.schedule_date and `ivr_schedules`.`s_type` = 1 left join `users` on `users`.`id` = `ivr`.`interview_id` where (`ivr`.`status` = 2 and ivr.schedule_date > '$distanceMin' and ivr.schedule_date < '$distanceMax') order by ivr.schedule_date desc limit 5");*/
            
           /* $scheduleListApp = DB::select("select ivr.id,ivr.mobile_no,ivr.status,ivr.interview_id, users.username,
ivr_schedules.s_type,ivr_schedules.id as schedule_id, ivr.schedule_date from `ivr` inner join `ivr_schedules` on `ivr`.`id` = `ivr_schedules`.`ivr_id` and `ivr`.`schedule_date` = ivr_schedules.schedule_date and `ivr_schedules`.`s_type` = 2 left join `users` on `users`.`id` = `ivr`.`interview_id` where (`ivr`.`status` = 2 and ivr.schedule_date > '$distanceMin' and ivr.schedule_date < '$distanceMax') order by ivr.schedule_date desc limit 5");*/
    $scheduleListApp = DB::select("select ivr.id,ivr.mobile_no,ivr.status,ivr.interview_id, users.username,
ivr_schedules.s_type,ivr_schedules.id as schedule_id, ivr.schedule_date from `ivr` inner join `ivr_schedules` on `ivr`.`id` = `ivr_schedules`.`ivr_id` and `ivr`.`schedule_date` = ivr_schedules.schedule_date left join `users` on `users`.`id` = `ivr`.`interview_id` where (`ivr`.`status` = 2 and ivr.schedule_date > '$distanceMin' and ivr.schedule_date < '$distanceMax') order by ivr.schedule_date desc limit 5");

        //end shchedule and appointment list

        view()->share('info', $ivr);
        view()->share('previous_respondent', $previous_respondent);
        //view()->share('scheduleList', $scheduleList);
        view()->share('scheduleListApp', $scheduleListApp);
        view()->share('delaytime', $distanceMax);
        view()->share('delaylestime', $distanceMin);

        return view(session('access').'ivr/callInitiate');

    }

    public function callSchedule()
    {

    	if(isset($_POST['schedule_id'])){

            $totalDuration = 0;

    		$schedule = Schedule::find($_POST['schedule_id']);

            if(isset($_POST['date']) && isset($_POST['time'])){
                $schedule->schedule_date=date('Y-m-d', strtotime($_POST['date']))." ".date("H:i:s", strtotime($_POST['time']));
            }
            $schedule->call_state=$_POST['call_state'];
            
            if(isset($_POST['s_type'])){
                $schedule->s_type=$_POST['s_type'];
            }
            //timer
            $schedule->start_time = isset( $schedule->start_time)?$schedule->start_time:Carbon::now();

            $schedule->end_time = isset( $schedule->end_time)?$schedule->end_time:Carbon::now();

            $startTime = Carbon::parse($schedule->start_time);
            $finishTime = Carbon::parse($schedule->end_time);
            $totalDuration = $finishTime->diffInSeconds($startTime);
            
            $schedule->user_id = \Auth::User()->id;
            $schedule->save();

            $ivr = Ivr::find($schedule->ivr_id);
            if(isset($_POST['date']) && isset($_POST['time'])){
                $ivr->schedule_date=date('Y-m-d', strtotime($_POST['date']))." ".date("H:i:s", strtotime($_POST['time']));
            }

            if($_POST['call_state']==2 || $_POST['call_state']==3 || $_POST['call_state']==4 || $_POST['call_state']==5 || $_POST['call_state']==6 || $_POST['call_state']==8 || $_POST['call_state']==10 || $_POST['call_state']==11){
                $ivr->status=1;
                $schedule->delete();
            }
            else $ivr->status=2;
            //ivr last track
            $ivr->last_status = $schedule->call_state;
            $ivr->last_schedule_id = $schedule->id; 
            //end ivr last track
            $ivr->duration += $totalDuration;
            $ivr->save();

            return redirect(session('access').'ivr/callInitiate')->with('message', 'সফলভাবে সংরক্ষিত');


    	}//first time
    	else if(isset($_POST['mobile_no'])){

    		Schedule::where('ivr_id',$_POST['id'])->where('schedule_date','<>',null)->delete();

    		$schedule = Schedule::where('ivr_id',$_POST['id'])->where('schedule_date',null)->where('call_state',0)->where('mobile_no',$_POST['mobile_no'])->first();
            if(!isset($schedule)) {
                $schedule = new Schedule();
            }
            $schedule->mobile_no=$_POST['mobile_no'];
            $schedule->ivr_id=$_POST['id'];
            $schedule->user_id = \Auth::User()->id;
            $schedule->start_time = Carbon::now();
            $schedule->save();

            $ivr = Ivr::find($_POST['id']);
            $no_of_call = DB::table('ivr_schedules')->where('ivr_id','=',$ivr->id)
            ->count('ivr_id');
            $ivr->no_of_call=$no_of_call;
            $ivr->last_status = $schedule->call_state;
            $ivr->last_schedule_id = $schedule->id;
            $ivr->save();

            return $schedule->id;

    	}//end first time
    	else{
            return redirect(session('access').'ivr/callInitiate')->with('message', 'সফলভাবে সংরক্ষিত');
        }


    }

    public function callQuestion($id,Request $request){
    	

    	if($request->isMethod('post')){

    		
            $totalDuration = 0;

    		$ivr = Ivr::find($id);
    		$question=Question::where('ivr_id',$id)->first();

    		if(!isset($question))
                $question = new Question();

            $question->ivr_id = $id;
            $input = $request->all();                
            $fillable = $question->getFillable();
            $question->filled($fillable, $input);
            $question->user_id = \Auth::User()->id;

            $question->call_status=$input['call_status'];
            if(isset($input['submitted_at'])){
            	//schedule part to be deleted
                $question->call_status = 1;
            	/*Schedule::where([
                    'ivr_id'=>$id,
                    'deleted_at'=>null
                ])->delete();*/
                $schedule = Schedule::where([
                    'ivr_id'=>$id,
                    'deleted_at'=>null
                ])->first();

                if($request->s_0_2 == 3 || $request->s_0_2 == 0){
                   $ivr->status=1;
                   $question->call_status = 13;
                   $schedule->call_state = 13;

                }else{
                   $schedule->call_state = $input['call_status']; 
                }
                //timer
                $schedule->start_time = isset( $schedule->start_time)?$schedule->start_time:Carbon::now();

                $schedule->end_time = isset( $schedule->end_time)?$schedule->end_time:Carbon::now();
                $startTime = Carbon::parse($schedule->start_time);
                $finishTime = Carbon::parse($schedule->end_time);
                $totalDuration = $finishTime->diffInSeconds($startTime);
                //ivr last track
                $ivr->last_status = $schedule->call_state;
                $ivr->last_schedule_id = $schedule->id;
                //end last track
                $schedule->save();
                $schedule->delete();                
            	$ivr->status=1;
                
                $ivr->duration += $totalDuration;
                $question->submitted_at = Carbon::now();

            }

            

            //schedule set
            if ($request->get('call_status') == 0) {

            	$schedule = Schedule::where('ivr_id',$id)->where('schedule_date',null)->where('call_state',0)->where('mobile_no', $ivr->mobile_no)->first();

            	if (isset($schedule)) {

            		if(isset($_POST['date']) && isset($_POST['time'])){


            			$schedule->schedule_date = date('Y-m-d', strtotime($request->get('date'))) . " " . date("H:i:s", strtotime($request->get('time')));

            			$ivr->schedule_date = date('Y-m-d', strtotime($request->get('date')))." ".date('H:i:s', strtotime($request->get('time')));


            			if(isset($_POST['s_type']))
                            $schedule->s_type=$_POST['s_type'];

                        $schedule->user_id = $question->user_id;
                        $schedule->call_state = 99; // 0 changed $_POST['call_status'];
                        $question->call_status = 99;
                         //timer
                        $schedule->start_time = isset( $schedule->start_time)?$schedule->start_time:Carbon::now();

                        $schedule->end_time = isset( $schedule->end_time)?$schedule->end_time:Carbon::now();
                        $startTime = Carbon::parse($schedule->start_time);
                        $finishTime = Carbon::parse($schedule->end_time);
                        $totalDuration = $finishTime->diffInSeconds($startTime);
                        $schedule->save();
                        //ivr last track
                        $ivr->last_status = $schedule->call_state;
                        $ivr->last_schedule_id = $schedule->id;
                        //end ivr last track
                        $ivr->duration += $totalDuration;
                        $ivr->status=2;

            		}

            	}


            }else if($request->get('call_status') == 12 || $request->get('call_status') == 7 || $request->get('call_status') == 8 || $request->get('call_status') == 9){
            	//here 9 status for age group limit reached

            	/*Schedule::where('ivr_id',$id)->where('schedule_date', '=', null)->orWhere('schedule_date', '<>', null)->delete();*/
                $schedule = Schedule::where([
                    'ivr_id'=>$id,
                    'deleted_at'=>null
                ])->first();

                
                $schedule->call_state = $_POST['call_status'];
                //timer
                $schedule->start_time = isset( $schedule->start_time)?$schedule->start_time:Carbon::now();

                $schedule->end_time = isset( $schedule->end_time)?$schedule->end_time:Carbon::now();
                $startTime = Carbon::parse($schedule->start_time);
                $finishTime = Carbon::parse($schedule->end_time);
                $totalDuration = $finishTime->diffInSeconds($startTime);
                //ivr last track
                $ivr->last_status = $schedule->call_state;
                $ivr->last_schedule_id = $schedule->id;
                //end ivr last track
                $schedule->save();
                $schedule->delete();
                $ivr->duration += $totalDuration;

                $question->call_status = $_POST['call_status'];
                $ivr->status=1;

            }
            //end schedule set
            //ivr section end save
            if($question->cov_7_s == 3 || $question->cov_7_s == 99){
                $question->ivr_submitted_at = Carbon::now();  
            }

            $question->save();

            $ivr->interview_id = $question->user_id;

            $ivr->save();

            return array(
                'success'=>true,
                'message'=>'সফলভাবে সংরক্ষিত'
            );

    	}else{

    		view()->share('pageTitle', "CATI Question Form");
            view()->share('breadcamps', array('Home' => url(session('access').'dashboard'), 'CATI Contact' => url(session('access').'ivr'), "Call Initiate Form" => url(session('access').'ivr/callInitiate'), "Question Form" => url(session('access').'ivr/question/'.$id)));
            view()->share('id', $id);

    		$ivr = Ivr::find($id);
    		$question=Question::where('ivr_id',$id)->first();
            $previous_respondent = DB::table('ivr_pr_cati')->where('mobile_no','=',$ivr->mobile_no)->first();

    		view()->share('question', $question);
    		view()->share('ivr', $ivr);
            view()->share('previous_respondent', $previous_respondent);
    		return view(session('access').'ivr/question');
    	}
    }

    //picking schedules
    public function pick($id, $did=null){

        $user_id = \Auth::User()->id;
        $ivr = Ivr::where(['interview_id'=>$user_id,'status'=>-2])->first();
        //dd($ivr);
        if(isset($ivr)){
            return redirect(session('access').'ivr/callInitiate')->with('message', 'আপনি আগে এটি সম্পন্ন করুন');
        }
        $ivr = Ivr::where(['id'=>$id,'status'=>-2])->first();
        //dd($ivr);
        if(isset($ivr)){
            $user = User::select(DB::raw('username'))->where('id',$ivr->interview_id)->first();
            //dd($user);
            return redirect(session('access').'ivr/callInitiate')->with('message', "ইতিমধ্যে ($user->username) এই টি পিক করেছেন");
        }

        if(isset($did)){
            $ivr = Ivr::find($did);
            $ivr->status = 0;
            $ivr->interview_id = null;
            //$ivr->no_of_call = 0;
            $ivr->save();
        }
        

        

        $ivr = Ivr::find($id);
        //take interviewer temp
        $previous_id = $ivr->interview_id; 
        //end take interviewer temp
        $ivr->status = -2;
        $ivr->interview_id = $user_id;
        $ivr->save();

        //pickhistory
        $pickData = [
        	'previous_id'=>$previous_id,
        	'current_id'=>$user_id,
        	'ivr_id'=>$id,
        ];
        $pickhistory = PickHistory::create( $pickData );

        //end pickhistory



        return redirect(session('access').'ivr/callInitiate');

    }


    public function missingScheduleOrAppointment(Request $request){
            
            $date = date("Y-m-d");
            $time = date("H:i").":00";
            
            $extra_query="";            
            
            
            if ($request->s_id_no) {
                $extra_query.="and ivr.id=".$request->s_id_no;
            }

            if ($request->s_mobile_no) {
                $extra_query.="and ivr.mobile_no='".$request->s_mobile_no."'";
            }

            $raw_query = "SELECT ivr.id,ivr.mobile_no,ivr.status,ivr.interview_id, users.username,
ivr_schedules.s_type,ivr_schedules.id as schedule_id, ivr.schedule_date,ivr_schedules.schedule_date sch from `ivr` join `ivr_schedules` on `ivr`.`id` = `ivr_schedules`.`ivr_id` and `ivr`.`schedule_date` = `ivr_schedules`.`schedule_date` left join `users` on `users`.`id` = `ivr`.`interview_id` where (`ivr`.`status` = 2 and date(`ivr`.`schedule_date`) = '$date' and time(`ivr`.`schedule_date`)<='$time' $extra_query ) order by `ivr`.`schedule_date` desc";

            $scheduleList = DB::select($raw_query);
            $scheduleList = $this->arrayPaginator($scheduleList, $request);
            
            

            $user_id = \Auth::User()->id;

            view()->share('pageTitle', "Ivr Missing Schedule / Appointment");
            view()->share('breadcamps', array('Home' => url(session('access').'dashboard'), 'Ivr Contact' => url(session('access').'ivr')));
            view()->share('reproductives', $scheduleList);
            view()->share('userid', $user_id);
            return view(session('access').'ivr/missing');
    }

    //checkquota

   	public function checkquota(Request $request){

   		$raw_query = "select done_limit,max_limit from ivr_jar where (".$request->age.">= range_min and ".$request->age." <= range_max) and gender=".$request->gender;

   		$result = DB::table('ivr_jar')->
   		select(DB::Raw('done_limit,max_limit'))
   		->where('range_max','>=',$request->age)
   		->where('range_min','<=',$request->age)
   		->where('gender',$request->gender)
   		->first();
   		//$result = DB::select($raw_query)->first();
   		$limit_crossed = 0;
   		$differ = 0;
   		$done_limit = 0;
   		if(isset($result->max_limit) && isset($result->done_limit) ){
   			$done_limit = $result->done_limit;
   			$differ = abs($result->max_limit - $result->done_limit);
   			if($differ < 2){
   				$limit_crossed = 1;
   			}
   		}

   		return [
   			'limit_crossed'=>$limit_crossed,
   			'differ' => $differ,
   			'done_limit'=>$done_limit
   		];              
            
   	}

}
