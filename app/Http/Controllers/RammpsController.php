<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Carbon\Carbon;

use App\Models\Rammps;
use App\Models\RammpsQuestion as Question;
use App\Models\RammpsSchedule as Schedule;
use App\Models\RammpsScheduleHistory as PickHistory;

use App\User;
use Response;

class RammpsController extends Controller{

    use \App\Http\Controllers\Traits\Paginator;
	public function index(){

		view()->share('pageTitle', "Rammps Form");
		view()->share('breadcamps', array('Home' => url(session('access').'dashboard')));

    	$user_id=\Auth::User()->id;

        $rammps = Rammps::select(DB::raw('rammps.*'))
        ->where('status',-2)
        ->where('interview_id',$user_id)
        ->first();

        //already hold questioned and started interview
        if(!isset($rammps)) {

            $rammps = Rammps::select(DB::raw('rammps.*'))
            ->join('rammps_questions',function($q){
                $q->on('rammps.id', 'rammps_questions.rammps_id');
                //$q->where('rammps_questions.deleted_at', null);
            })
            ->where('status',-1)
            ->where('interview_id',$user_id)
            ->first();

        }

        
        //already hold quesiton
        if(!isset($rammps)) {

            $rammps = Rammps::where('status',-1)
            ->where('interview_id',$user_id)            
            ->first();

        }
    	
        //get free number 0
        if(!isset($rammps)){
            $rammps = Rammps::where('status',0)->first();
        }

        if(isset($rammps)) {

            $no_of_call = DB::table('rammps_schedules')->where('rammps_id','=',$rammps->id)
                ->where('schedule_date','<>',null)
            ->count('rammps_id');
            $rammps->no_of_call = $no_of_call;

        	//\DB::transaction(function () {
		      //$rammps = RammpsIncomplete::where('status',0)->lockForUpdate()->first();
		    $rammps->interview_id=\Auth::User()->id;
		    $rammps->session_started=Carbon::now();		      
		    if($rammps->status!=-2 || $rammps->status==0){
                $rammps->status=-1;
            }         
		    $rammps->save();
		     //});


               

        }else{
        	view()->share('info', null);
        }

        //schedule and appointment list
        $distanceMax = date("Y-m-d H:i",strtotime("+30 minutes"));
        $distanceMin = date("Y-m-d H:i",strtotime("-30 minutes"));


        $scheduleListApp = DB::select("select rammps.id,rammps.mobile_no,rammps.status,rammps.interview_id, users.username,
rammps_schedules.id as schedule_id, rammps.schedule_date from `rammps` inner join `rammps_schedules` on `rammps`.`id` = `rammps_schedules`.`rammps_id` and `rammps`.`schedule_date` = rammps_schedules.schedule_date left join `users` on `users`.`id` = `rammps`.`interview_id` where (`rammps`.`status` = 2 and rammps.schedule_date > '$distanceMin' and rammps.schedule_date < '$distanceMax') order by rammps.schedule_date desc limit 5");

        view()->share('info', $rammps);
        view()->share('scheduleListApp', $scheduleListApp);
        view()->share('delaytime', $distanceMax);
        view()->share('delaylestime', $distanceMin);

        return view(session('access').'rammps/initiate');


	}

    public function missingScheduleOrAppointment(Request $request){
            
            $date = date("Y-m-d");
            $time = date("H:i").":00";
            
            $extra_query="";            
            
            
            if ($request->s_id_no) {
                $extra_query.="and rammps.id=".$request->s_id_no;
            }

            if ($request->s_mobile_no) {
                $extra_query.="and rammps.mobile_no='".$request->s_mobile_no."'";
            }

            $raw_query = "SELECT rammps.id,rammps.mobile_no,rammps.status,rammps.interview_id, users.username,
rammps_schedules.id as schedule_id, rammps_schedules.schedule_date,rammps_schedules.schedule_date sch from `rammps` join `rammps_schedules` on `rammps`.`id` = `rammps_schedules`.`rammps_id` and `rammps`.`schedule_date` = `rammps_schedules`.`schedule_date` left join `users` on `users`.`id` = `rammps`.`interview_id` where (date(`rammps`.`schedule_date`) = '$date' and time(`rammps`.`schedule_date`)<='$time' and `rammps`.`status`<>-2 $extra_query ) order by `rammps`.`schedule_date` desc";

            $scheduleList = DB::select($raw_query);
            $scheduleList = $this->arrayPaginator($scheduleList, $request);
            
            

            $user_id = \Auth::User()->id;

            view()->share('pageTitle', "Rammps Missing Schedule / Appointment");
            view()->share('breadcamps', array('Home' => url(session('access').'dashboard'), 'Rammps Contact' => url(session('access').'rammps')));
            view()->share('reproductives', $scheduleList);
            view()->share('userid', $user_id);
            return view(session('access').'rammps/missing');
    }


	public function question($id,Request $request){

		if($request->isMethod('post')){


			$totalDuration = 0;
			$rammps = Rammps::find($id);
			$question=Question::where('rammps_id',$id)->first();			

			if(!isset($question))
                $question = new Question();

            $question->rammps_id = $id;
            $input = $request->all();
            $fillable = $question->getFillable();
            $question->filled($fillable, $input);

            //var_dump($input);

            $section_answers = $question->unset_fillables($input);
            if(!empty($section_answers)){
                $question->section_answers = $section_answers;
            }
            $question->user_id = \Auth::User()->id;
            $question->call_status=$input['call_status'];
            $status = $question->call_status;
                
            //complete call
            if(isset($input['submitted_at'])){
                //schedule part to be deleted
                $question->call_status = 1;
                /*Schedule::where([
                    'rammps_id'=>$id,
                    'deleted_at'=>null
                ])->delete();*/
                $schedule = Schedule::where([
                    'rammps_id'=>$id,
                    'deleted_at'=>null
                ])->first();

                
                //timer
                $schedule->start_time = isset( $schedule->start_time)?$schedule->start_time:Carbon::now();

                $schedule->end_time = isset( $schedule->end_time)?$schedule->end_time:Carbon::now();
                $startTime = Carbon::parse($schedule->start_time);
                $finishTime = Carbon::parse($schedule->end_time);
                $totalDuration = $finishTime->diffInSeconds($startTime);
                //rammps last track
                $rammps->last_status = $question->call_status;
                $rammps->last_schedule_id = $schedule->id;
                $schedule->call_state = $question->call_status;
                //end last track
                $schedule->save();
                $schedule->delete();                
                $rammps->status=1;
                
                $rammps->duration += $totalDuration;
                $rammps->session_end=Carbon::now();
                $question->submitted_at = Carbon::now();

            }else{

            //schedule set
                if ($request->get('call_status') == 10) {

                $schedule = Schedule::where('rammps_id',$id)->where('schedule_date',null)->where('call_state',0)->where('mobile_no', $rammps->mobile_no)->first();

                if (isset($schedule)) {

                    if(isset($_POST['date']) && isset($_POST['time'])){


                        $schedule->schedule_date = date('Y-m-d', strtotime($request->get('date'))) . " " . date("H:i:s", strtotime($request->get('time')));

                        $rammps->schedule_date = date('Y-m-d', strtotime($request->get('date')))." ".date('H:i:s', strtotime($request->get('time')));


                        

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
                        //rammps last track
                        $rammps->last_status = $schedule->call_state;
                        $rammps->last_schedule_id = $schedule->id;
                        //end rammps last track
                        $rammps->duration += $totalDuration;
                        $rammps->status=2;

                    }

                }


                }else if(in_array($status, $question->call_complete_question_status())){
                //here 9 status for age group limit reached

                /*Schedule::where('rammps_id',$id)->where('schedule_date', '=', null)->orWhere('schedule_date', '<>', null)->delete();*/
                $schedule = Schedule::where([
                    'rammps_id'=>$id,
                    'deleted_at'=>null
                ])->first();

                
                $schedule->call_state = $status;
                //timer
                $schedule->start_time = isset( $schedule->start_time)?$schedule->start_time:Carbon::now();

                $schedule->end_time = isset( $schedule->end_time)?$schedule->end_time:Carbon::now();
                $startTime = Carbon::parse($schedule->start_time);
                $finishTime = Carbon::parse($schedule->end_time);
                $totalDuration = $finishTime->diffInSeconds($startTime);
                //rammps last track
                $rammps->last_status = $schedule->call_state;
                $rammps->last_schedule_id = $schedule->id;
                //end rammps last track
                $schedule->save();
                $schedule->delete();
                $rammps->duration += $totalDuration;

                $question->call_status =$status;
                $rammps->status=1;
                $rammps->session_end=Carbon::now();

                }
            }


            //$rammps->last_status = $status;
            $question->save();
            $rammps->interview_id = $question->user_id;
            $rammps->save();            



            return array(
                'success'=>true,
                'message'=>'সফলভাবে সংরক্ষিত',
                //'section_answers'=>$section_answers                              
            );   



		}else{
			$rammps = Rammps::find($id);

            if($rammps->status == 1){
                return redirect(session('access').'rammps/callInitiate')->with('message', 'ইতিমধ্য এ ইহা সম্পন্ন হয়েছে ');
            }
			$question=Question::where('rammps_id',$id)->first();


            

        

		view()->share('pageTitle', "Rammps Question Form");
        view()->share('breadcamps', array('Home' => url(session('access').'dashboard'), 'CATI Contact' => url(session('access').'rammps'), "Call Initiate Form" => url(session('access').'rammps/callInitiate'), "Question Form" => url(session('access').'rammps/question/'.$id)));	


		view()->share('id', $id);

		view()->share('question', $question);
        view()->share('previous_question', Question::getAnswersJson(isset($question->section_answers)?$question->section_answers:null));
		view()->share('rammps', $rammps);
        //view()->share('previous_respondent', $previous_respondent);
		return view(session('access').'rammps/question');

		}


		


	}

    public function callSchedule()
    {
        $rammps = Rammps::find($_POST['id']);
        
        
        if(isset($_POST['schedule_id'])){

            $totalDuration = 0;

            $schedule = Schedule::find($_POST['schedule_id']);

            if(isset($_POST['date']) && isset($_POST['time'])){
                $schedule->schedule_date=date('Y-m-d', strtotime($_POST['date']))." ".date("H:i:s", strtotime($_POST['time']));

                $rammps->schedule_date=date('Y-m-d', strtotime($_POST['date']))." ".date("H:i:s", strtotime($_POST['time']));
            }
            $status = $_POST['call_state'];
            $schedule->call_state = $status;

            //timer
            $schedule->start_time = isset( $schedule->start_time)?$schedule->start_time:Carbon::now();

            $schedule->end_time = isset( $schedule->end_time)?$schedule->end_time:Carbon::now();

            $startTime = Carbon::parse($schedule->start_time);
            $finishTime = Carbon::parse($schedule->end_time);
            $totalDuration = $finishTime->diffInSeconds($startTime);
            
            $schedule->user_id = \Auth::User()->id;
            $schedule->save();

            if(in_array($status, $schedule->call_complete_initial_status())){
                $rammps->status = 1;
                $schedule->delete();

            }else{
                $rammps->status = 2;
            }

            $rammps->last_status = $schedule->call_state;
            $rammps->last_schedule_id = $schedule->id; 
            //end rammps last track
            $rammps->duration += $totalDuration;
            $rammps->save();

            return redirect(session('access').'rammps/callInitiate')->with('message', 'সফলভাবে সংরক্ষিত');




        }else if(isset($_POST['mobile_no'])){
            Schedule::where('rammps_id',$_POST['id'])->where('schedule_date','<>',null)->delete();
            $schedule = Schedule::where('rammps_id',$_POST['id'])->where('schedule_date',null)->where('call_state',0)->where('mobile_no',$_POST['mobile_no'])->first();
            if(!isset($schedule)) {
                $schedule = new Schedule();
            }
            $schedule->mobile_no=$_POST['mobile_no'];
            $schedule->rammps_id=$_POST['id'];
            $schedule->user_id = \Auth::User()->id;
            $schedule->start_time = Carbon::now();
            $schedule->save();

            
            $no_of_call = DB::table('rammps_schedules')->where('rammps_id','=',$rammps->id)
            ->count('rammps_id');
            $rammps->no_of_call=$no_of_call;
            $rammps->last_status = $schedule->call_state;
            $rammps->last_schedule_id = $schedule->id;
            $rammps->save();

            return $schedule->id;

        }else{
            return redirect(session('access').'rammps/callInitiate')->with('message', 'সফলভাবে সংরক্ষিত');
        }


        

    }


    //picking schedules
    public function pick($id, $did=null){

        $user_id = \Auth::User()->id;
        $rammps = Rammps::where(['interview_id'=>$user_id,'status'=>-2])->first();
        //dd($rammps);
        if(isset($rammps)){
            return redirect(session('access').'rammps/callInitiate')->with('message', 'আপনি আগে এটি সম্পন্ন করুন');
        }
        $rammps = Rammps::where(['id'=>$id,'status'=>-2])->first();
        //dd($rammps);
        if(isset($rammps)){
            $user = User::select(DB::raw('username'))->where('id',$rammps->interview_id)->first();
            //dd($user);
            return redirect(session('access').'rammps/callInitiate')->with('message', "ইতিমধ্যে ($user->username) এই টি পিক করেছেন");
        }

        if(isset($did)){
            $rammps = Rammps::find($did);
            $rammps->status = 0;
            $rammps->interview_id = null;
            //$rammps->no_of_call = 0;
            $rammps->save();
        }
        

        

        $rammps = Rammps::find($id);
        //take interviewer temp
        $previous_id = $rammps->interview_id; 
        //end take interviewer temp
        $rammps->status = -2;
        $rammps->interview_id = $user_id;
        $rammps->save();

        //pickhistory
        $pickData = [
            'previous_id'=>$previous_id,
            'current_id'=>$user_id,
            'rammps_id'=>$id,
        ];
        $pickhistory = PickHistory::create( $pickData );

        //end pickhistory



        return redirect(session('access').'rammps/callInitiate');

    }

	
}