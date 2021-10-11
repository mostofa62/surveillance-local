<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IvrPrCati;
use App\Models\IvrPrIvr;
use App\Models\Ivr;
use App\Models\IvrQuestion as Question;
use App\Models\IvrSchedule as Schedule;
use DB;
use Carbon\Carbon;

class IvrPrFollowController extends Controller
{
    //
    public function cati(){

    	view()->share('pageTitle', "CATI Survey Form");
        view()->share('breadcamps', array('Home' => url(session('access').'dashboard')));

    	$user_id=\Auth::User()->id;

    	$ivr = IvrPrCati::where('status',-1)
            ->where('interview_id',$user_id)            
            ->first();

        if(!isset($ivr)){
         $ivr = IvrPrCati::where('status',0)->first();
        }

        //get free number 0
        if(isset($ivr)) {



        	//\DB::transaction(function () {
		      //$ivr = IvrIncomplete::where('status',0)->lockForUpdate()->first();
		      $ivr->interview_id=\Auth::User()->id;
		      $ivr->start_time=Carbon::now();
		      $ivr->status=-1;
		      $ivr->save();
		     //});


               

        }else{
        	view()->share('info', null);
        }

        view()->share('info', $ivr);

        return view(session('access').'ivrpr/cati');

    }

    public function cati_store(Request $request){

        if($request->isMethod('post')){
            //$incomplete = IvrIncomplete::lockForUpdate()->find($request->id);
            $incomplete = IvrPrCati::find($request->id);

            //$incomplete = new IvrPrCati();
            $input = $request->all();

            //dd($input);

            $incomplete->fill($input); 

            $incomplete->status = 1;
            $incomplete->end_time=Carbon::now();

            if($incomplete->q_9 == 9){
               $ivr_id =  $this->makeIvr($incomplete->mobile_no, $incomplete->q_11,1,$input);
               //$incomplete->save();
               $incomplete->save();
               return redirect(session('access')."ivr/question/$ivr_id");
            }elseif($incomplete->q_12 > 0){
                $ivr_id = $this->makeIvrNow($incomplete->mobile_no);

                if($ivr_id){
                    $incomplete->save();
                    return redirect(session('access')."ivr/callInitiate");
                }
            }
            else{
                $this->makeIvr($incomplete->mobile_no, $incomplete->q_11);
            }
            //die();

            if($incomplete->save()){
                return redirect(session('access').'ivrpr/cati')->with('message', "সফলভাবে সংরক্ষিত");
            }
        }

    }

    private function makeIvrNow($mobile_no){
         $last_id = DB::table('ivr')->insertGetId([
            'status'=> -1,
            'mobile_no' => $mobile_no,
            'interview_id' => \Auth::User()->id
        ]);

         return $last_id;
    }


    private function makeIvr($mobile_no, $schedule_date,$question_start=0, $question_input=array()){

        $last_id = DB::table('ivr')->insertGetId(['mobile_no' => $mobile_no]);
        if($question_start > 0 && !empty($question_input)){
            $question_data=[
                'ivr_id'=>$last_id,
                's_0_1'=>$question_input['q_3'],
                's_0_2'=>(int)$question_input['q_2'] > 18 ? 1:3,
                's_0_3'=>$question_input['q_2'],
                'di_1_1'=>$question_input['q_4'],
                'di_1_2'=>isset($question_input['q_5'])?$question_input['q_5']:null,
                'di_1_2_e'=>isset($question_input['q_5_e'])?$question_input['q_5_e']:null,
                'di_1_2_dd'=>isset($question_input['q_5_dd'])?$question_input['q_5_dd']:null,
                'di_1_2_cc'=>isset($question_input['q_5_cc'])?$question_input['q_5_cc']:null,
                'di_1_2_uz'=>isset($question_input['q_5_uz'])?$question_input['q_5_uz']:null,
                'di_1_2_mc'=>isset($question_input['q_5_mc'])?$question_input['q_5_mc']:null,
                'di_1_3'=>isset($question_input['q_6'])?$question_input['q_6']:null,
                'di_1_3_e'=>isset($question_input['q_6_e'])?$question_input['q_6_e']:null,
                'last_input'=>isset($question_input['q_6'])?'smk_2_1':'di_1_3'

            ];

            $this->makeIvrQuestion(array('id'=>$last_id,'mobile_no'=>$mobile_no, 'question_data'=>$question_data));
            return $last_id;

        }else{
            $this->makeIvrSchedule(array('id'=>$last_id,'mobile_no'=>$mobile_no,'schedule_date'=>$schedule_date));
        }

    }
    //direct question part
    private function makeIvrQuestion($data){
        
            Schedule::where('ivr_id',$data['id'])->where('schedule_date','<>',null)->delete();

            $schedule = Schedule::where('ivr_id',$data['id'])->where('schedule_date',null)->where('call_state',0)->where('mobile_no',$data['mobile_no'])->first();
            if(!isset($schedule)) {
                $schedule = new Schedule();
            }
            $schedule->mobile_no=$data['mobile_no'];
            $schedule->ivr_id=$data['id'];
            $schedule->user_id = \Auth::User()->id;
            //$schedule->schedule_date = $data['schedule_date'];
            //$schedule->s_type = 1;
            $schedule->call_state = 0;
            $schedule->start_time = Carbon::now();
            $schedule->save();

            $ivr = Ivr::find($data['id']);
            $no_of_call = DB::table('ivr_schedules')->where('ivr_id','=',$ivr->id)
            ->count('ivr_id');
            $ivr->no_of_call=$no_of_call;
            //$ivr->schedule_date = $schedule->schedule_date;
            $ivr->interview_id = \Auth::User()->id;
            $ivr->status=-1;
            //ivr last track
            $ivr->last_status = $schedule->call_state;
            $ivr->last_schedule_id = $schedule->id;
            //end ivr last track
            $ivr->save();


            $question_id = DB::table('ivr_questions')->insertGetId($data['question_data']);
            return $question_id;

    }
    //schedule part

    private function makeIvrSchedule($data){
        
            Schedule::where('ivr_id',$data['id'])->where('schedule_date','<>',null)->delete();

            $schedule = Schedule::where('ivr_id',$data['id'])->where('schedule_date',null)->where('call_state',0)->where('mobile_no',$data['mobile_no'])->first();
            if(!isset($schedule)) {
                $schedule = new Schedule();
            }
            $schedule->mobile_no=$data['mobile_no'];
            $schedule->ivr_id=$data['id'];
            $schedule->user_id = \Auth::User()->id;
            $schedule->schedule_date = $data['schedule_date'];
            $schedule->s_type = 1;
            $schedule->call_state = 14;
            //$schedule->start_time = Carbon::now();
            $schedule->save();

            $ivr = Ivr::find($data['id']);
            $no_of_call = DB::table('ivr_schedules')->where('ivr_id','=',$ivr->id)
            ->count('ivr_id');
            $ivr->no_of_call=$no_of_call;
            $ivr->schedule_date = $schedule->schedule_date;
            //ivr last track
            $ivr->last_status = $schedule->call_state;
            $ivr->last_schedule_id = $schedule->id;
            //end ivr last track
            $ivr->status=2;
            $ivr->save();
    }

    public function ivr(){

        view()->share('pageTitle', "IVR Survey Form");
        view()->share('breadcamps', array('Home' => url(session('access').'dashboard')));

        $user_id=\Auth::User()->id;

        $ivr = IvrPrIvr::where('status',-1)
            ->where('interview_id',$user_id)            
            ->first();

        if(!isset($ivr)){
         $ivr = IvrPrIvr::where('status',0)->first();
        }

         //get free number 0
        if(isset($ivr)) {



            //\DB::transaction(function () {
              //$ivr = IvrIncomplete::where('status',0)->lockForUpdate()->first();
              $ivr->interview_id=\Auth::User()->id;
              $ivr->start_time=Carbon::now();
              $ivr->status=-1;
              $ivr->save();
             //});


               

        }else{
            view()->share('info', null);
        }

        view()->share('info', $ivr);

        return view(session('access').'ivrpr/ivr');
    }

    public function ivr_store(Request $request){

        if($request->isMethod('post')){
            //$incomplete = IvrIncomplete::lockForUpdate()->find($request->id);
            $incomplete = IvrPrIvr::find($request->id);

            //$incomplete = new IvrPrCati();
            $input = $request->all();

            //dd($input);

            $incomplete->fill($input); 

            $incomplete->status = 1;
            $incomplete->end_time=Carbon::now();

            if($incomplete->save()){
                return redirect(session('access').'ivrpr/ivr')->with('message', "সফলভাবে সংরক্ষিত");
            }
        }

    }


   
}
