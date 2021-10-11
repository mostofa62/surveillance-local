<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Mail;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Response;
use App\User;
use App\Schedule;
use App\Models\Reproductive;
use App\Models\ReproductiveQuestion;
use App\Models\AreaLimit;

class ReproductiveController extends Controller
{

    public function index(Request $request)
    {
        $poultry = Reproductive::orderBy('id', 'asc');

        //dd(session('accesslist_id'));
        if(session('user')->project_id!=4)
            return redirect(session('access').'dashboard')->send();
        else{ 
            if(in_array(5,session('accesslist_id')))
            $poultry=$poultry->where('interview_id',session('user')->id);
        }
        /*
        else if(in_array(5,session('accesslist_id')))
            $poultry=$poultry->where('interview_id',session('user')->id);
        */
        $pagetitle="Reproductive Contact Lists";
        


        if ($request->s_id_no) {
            $poultry =$poultry->where('id','=',  $request->s_id_no);
            $pagetitle= "Poultry Contact Search Results";
        }

        if ($request->s_mobile_no) {
            $poultry =$poultry->where('mobile_no', 'like', '%' . $request->s_mobile_no . '%');
            $pagetitle= "Poultry Contact Search Results";
        }

        

        $poultry=$poultry->paginate(20);

        view()->share('pageTitle', $pagetitle);
        view()->share('reproductives', $poultry);
        view()->share('breadcamps', array('Home' => url(session('access').'dashboard'), 'Reproductive Contact' => url(session('access').'reproductive')));
        return view(session('access').'reproductive/index');
    } 

	public function create()
    {
        //dd(session('accesslist_id'));
        if(session('user')->project_id!=4)
            return redirect(session('access').'dashboard')->send();
        elseif(!in_array(3,session('accesslist_id')) )
            return redirect(session('access').'dashboard')->send();
        


        view()->share('pageTitle', "Reproductive Create");
        view()->share('breadcamps', array('Home' => url(session('access').'dashboard'), 'Reproductive' => url(session('access').'encephalitis'), 'Add Reproductive' => url(session('access').'reproductive/create')));
        return view(session('access').'reproductive/create');
    }


    public function store(Request $request)
    {
        
        $this->validate($request, [
            'mobile_no' => 'required|numeric|unique:poultries',
            //'surveillance_id' => 'required',
        ]);

        $poultry = new Reproductive();
        //$poultry->surveillance_id = $request->get('surveillance_id');
        $poultry->date = $request->get('date');
        //$poultry->name = $request->get('name');
        $poultry->mobile_no = $request->get('mobile_no');

        $poultry->user_id = \Auth::User()->id;
        $poultry->site_id = \Auth::User()->site_id;

        $poultry->save();

        return redirect(session('access').'reproductive')->with('message', 'সফলভাবে সংরক্ষিত');
    }

    public function show($id)
    {

        view()->share('pageTitle', "Reproductive Contact Details");
        view()->share('breadcamps', array('Home' => url(session('access').'dashboard'), 'Reproductive Contact' => url(session('access').'reproductive'), 'Reproductive Contact Details' => url(session('access').'reproductive/' . $id)));

        $poultry = Reproductive::find($id);
        $question = $poultry->question;

        view()->share('info', $poultry);
        view()->share('question', $question);
        return view(session('access').'reproductive/detail');

    }

    public function edit($id)
    {
        if(session('user')->project_id!=4)
            return redirect(session('access').'dashboard')->send();
        elseif(!in_array(3,session('accesslist_id')) )
            return redirect(session('access').'dashboard')->send();
     
        view()->share('pageTitle', "Reproductive Update");
        view()->share('breadcamps', array('Home' => url(session('access').'dashboard'), 'Reproductive Contact' => url(session('access').'reproductive'), 'Update Reproductive Contact' => url(session('access').'reproductive/' . $id . '/edit')));

        $poultry = Reproductive::find($id);

        view()->share('reproductive', $poultry);
        return view(session('access').'reproductive/create');
    }

    public function update(Request $request, $id)
    {
        //$this->checkrole();
        $this->validate($request, [
            'mobile_no' => 'required|numeric',
            //'surveillance_id' => 'required',
        ]);

        $poultry = Reproductive::find($id);

        //$poultry->surveillance_id = $request->get('surveillance_id');
        $poultry->date = $request->get('date');
        //$poultry->name = $request->get('name');
        $poultry->mobile_no = $request->get('mobile_no');

        $poultry->save();

//        return redirect(session('access').'poultry')->with('message', 'সফলভাবে সংরক্ষিত');
        $previous_url = $request->input('previous_url');
        return redirect($previous_url)->with('message', 'সফলভাবে সংরক্ষিত');
    }

    public function callInitiate()
    {
        //$this->checkrole();
        
        if(session('user')->project_id!=4)
            return redirect(session('access').'dashboard')->send();
        elseif(!in_array(5,session('accesslist_id')) )
            return redirect(session('access').'dashboard')->send();

        view()->share('pageTitle', "Call Initiate Form");
        view()->share('breadcamps', array('Home' => url(session('access').'dashboard'), 'Reproductive Contact' => url(session('access').'reproductive'), "Call Initiate Form" => url(session('access').'reproductive/callInitiate')));

        $area_limit =DB::table('area_limit')->select(DB::raw('area_id, concat(name," | ",eng_name) as name, cp_status ,max_limit'))->where([
            'running_area'=>1,
            'status'=>1

        ])->first();
        //dd($area_limit->area_id);
        /*
        $area_limit_next = DB::table('area_limi')->select(DB::raw('area_id, running_area'))        
        ->where('area_id','>',function($query){
            $query->select(DB::raw('area_id'))
            ->from('area_limit')
            ->where(['running_area'=>1,'status'=>1])
            ->first();
        })->orderBy('area_id','asc')
        ->where('status',1)
        ->first();      
        */
        $area_limit_next = DB::table('area_limit')->select(DB::raw('area_id, running_area'))        
        ->where('status',1)
        ->where('running_area',0)  
        ->orderBy('area_id','desc')       
        ->first();
        //dd($area_limit_next->area_id);

        //('area_id, cp_status ,max_limit'))->where('running_area',1)->first();
        if(!isset($area_limit)){
            return redirect(session('access').'reproductive')->with('message', 'Finished All BEFORE');
        }

        $poultry_limit = Reproductive::select(DB::raw('count(reproductive.id) as counted'))
        
        ->join('reproductive_questions', function ($query) {
                $query->on('reproductive.id', 'reproductive_questions.reproductive_id');
                $query->where('reproductive_questions.call_status', 1);
        })
        ->where([
            'district_id'=>$area_limit->area_id,
            'status'=>1
        ])->first();

        //dd($poultry_limit->counted);

        if( $poultry_limit->counted >= $area_limit->max_limit){
            

            //$area_limit->running_area = -1;

            DB::transaction(function () use($area_limit_next,$area_limit){
                if(isset($area_limit_next)){
                    DB::table('area_limit')->where('area_id',$area_limit_next->area_id)->update(['running_area' => 1]);
                }
                DB::table('area_limit')->where('area_id',$area_limit->area_id)->update(['running_area' => -1]);
            });
            
            

            $area_limit = DB::table('area_limit')->select(DB::raw('area_id, cp_status ,max_limit'))->where('running_area',1)->first();
            

        }

        if(!isset($area_limit)){
            return redirect(session('access').'reproductive')->with('message', 'Finished All');
        }


        //dd($area_limit->area_id);
        $user_id=\Auth::User()->id;
        /*
        $poultry = Reproductive::select(DB::raw('reproductive.*'), DB::raw('reproductive_questions.id as question_id'))
            ->leftJoin('reproductive_questions', function ($query) {
                $query->on('reproductive.id', 'reproductive_questions.reproductive_id');
                //$query->where('reproductive_questions.deleted_at', null);
            })
            ->where('reproductive.status',-2)
            ->where('interview_id',$user_id)
            //->where('district_id',$area_limit->area_id)
            ->first();
        */
        $poultry = Reproductive::select(DB::raw('reproductive.*'))
        ->where('status',-2)
        ->where('interview_id',$user_id)
        ->first();

        if(!isset($poultry)) {

            $poultry = Reproductive::select(DB::raw('reproductive.*'))
            ->join('reproductive_questions',function($q){
                $q->on('reproductive.id', 'reproductive_questions.reproductive_id');
                //$q->where('reproductive_questions.deleted_at', null);
            })
            ->where('status',-1)
            ->where('interview_id',$user_id)
            ->first();

        }

        //dd($poultry);

        if(!isset($poultry)) {
            /*
            $poultry = Reproductive::select(DB::raw('reproductive.*'), DB::raw('reproductive_questions.id as question_id'))
                ->leftJoin('reproductive_questions', function ($query) {
                    $query->on('reproductive.id', 'reproductive_questions.reproductive_id');
                    //$query->where('reproductive_questions.deleted_at', null);
                })
                ->where('reproductive.status',-1)
                ->where('interview_id',$user_id)
                ->where('district_id',$area_limit->area_id)
                ->first();
            */
            $poultry = Reproductive::select(DB::raw('reproductive.*'))
            ->where('status',-1)
            ->where('interview_id',$user_id)
            ->where('district_id',$area_limit->area_id)
            ->first();    

        }
        //dd($poultry);

        

        //var_dump($poultry);
        //die();

        if(!isset($poultry)) {
            /*
            $poultry = Reproductive::select(DB::raw('reproductive.*'), DB::raw('reproductive_questions.id as question_id'))
                ->leftJoin('reproductive_questions', function ($query) {
                    $query->on('reproductive.id', 'reproductive_questions.reproductive_id');
                    //$query->where('reproductive_questions.deleted_at', null);
                })
                //->whereNotIn('reproductive.status',[-1,1])
                //->where('reproductive.no_of_call', "<",3)
                ->where(function($q){
                    $q->where('reproductive.status', 0);
                        //->orWhere('reproductive.status',2);
                })
                ->where(function($q){
                    $q->where('reproductive.schedule_date', null);
                        //->orWhere('reproductive.schedule_date','=<', date('Y-m-d H:i'));
                })
                ->where('district_id',$area_limit->area_id)
                //->orderBy('question_id', 'desc')
                /*->orderBy('schedule_date', 'desc')->orderBy('reproductive.status', 'asc')*/
                /*->orderBy('id', 'asc')
                //->groupBy('id')
                ->first();
                */
            /* 
            $poultry = Reproductive::select(DB::raw('reproductive.*'))
            
            ->leftJoin('schedules', function ($query) {
                $query->on('reproductive.id', 'schedules.reproductive_id');
                $query->where('schedules.s_type', 1);
            })
            ->where(function($q){
                $q->where('reproductive.status',0);
                //$q->orWhere('reproductive.status',2);
                //$q->where('schedule_date',null);
                //$q->where('district_id',$area_limit->area_id);
            })
            ->where('district_id',$area_limit->area_id)                                       
            ->first();
            */
            $poultry = Reproductive::select(DB::raw('reproductive.*'))
            ->where('status',0)
            //->where('interview_id',$user_id)
            ->where('district_id',$area_limit->area_id)
            ->first();     
            
            /*
            $poultry = DB::table('reproductive')->where('statu',0)->orWhere('status',2)->where('schedule_date',null)->where('district_id',$area_limit->area_id)->first();
            */
            //dd($poultry);

        }
        //dd($poultry);
        
        $distanceMax = date("Y-m-d H:i",strtotime("+30 minutes"));
        $distanceMin = date("Y-m-d H:i",strtotime("-30 minutes"));
       
             $scheduleList = DB::select("select reproductive.id,reproductive.mobile_no,reproductive.status,reproductive.interview_id, users.username,
schedules.s_type,schedules.id as schedule_id, reproductive.schedule_date from `reproductive` inner join `schedules` on `reproductive`.`id` = `schedules`.`reproductive_id` and `reproductive`.`schedule_date` = schedules.schedule_date and `schedules`.`s_type` = 1 left join `users` on `users`.`id` = `reproductive`.`interview_id` where (`reproductive`.`status` = 2 and reproductive.schedule_date > '$distanceMin' and reproductive.schedule_date < '$distanceMax') order by reproductive.schedule_date desc limit 5");
            
            $scheduleListApp = DB::select("select reproductive.id,reproductive.mobile_no,reproductive.status,reproductive.interview_id, users.username,
schedules.s_type,schedules.id as schedule_id, reproductive.schedule_date from `reproductive` inner join `schedules` on `reproductive`.`id` = `schedules`.`reproductive_id` and `reproductive`.`schedule_date` = schedules.schedule_date and `schedules`.`s_type` = 2 left join `users` on `users`.`id` = `reproductive`.`interview_id` where (`reproductive`.`status` = 2 and reproductive.schedule_date > '$distanceMin' and reproductive.schedule_date < '$distanceMax') order by reproductive.schedule_date desc limit 5");
        

        if (isset($poultry)){
                /*
                if($poultry->status!=-1 ){
                    
                    $poultry->no_of_call+=1;
                    if($poultry->no_of_call > 3){
                        $poultry->no_of_call = 3;
                    }
                    
                }*/
                $no_of_call = DB::table('schedules')->where('reproductive_id','=',$poultry->id)
                ->where('schedule_date','<>',null)
            ->count('reproductive_id');
                //var_dump($no_of_call);
                //die();
                $poultry->no_of_call = $no_of_call;
                $poultry->interview_id=$user_id;
                if($poultry->status!=-2 || $poultry->status==0){
                    $poultry->status=-1;
                }
                //dd($poultry);
                $poultry->save();
        }else{
            //return redirect(session('access').'reproductive')->with('message', 'সফলভাবে সংরক্ষিত');
            view()->share('info', null);
            view()->share('area', null);
        }
        view()->share('info', $poultry);
        view()->share('area', $area_limit);        
        view()->share('scheduleList', $scheduleList);
        view()->share('scheduleListApp', $scheduleListApp);
        view()->share('delaytime', $distanceMax);
        view()->share('delaylestime', $distanceMin);
        return view(session('access').'reproductive/callInitiate');
    }


    public function callSchedule()
    {
        if(isset($_POST['schedule_id'])){

            

            $schedule = Schedule::find($_POST['schedule_id']);

            if(isset($_POST['date']) && isset($_POST['time'])){
                $schedule->schedule_date=date('Y-m-d', strtotime($_POST['date']))." ".date("H:i:s", strtotime($_POST['time']));
            }
            $schedule->call_state=$_POST['call_state'];
            
            if(isset($_POST['s_type'])){
                $schedule->s_type=$_POST['s_type'];
            }
            
            $schedule->user_id = \Auth::User()->id;
            $schedule->save();

            $poultry = Reproductive::find($schedule->reproductive_id);
            if(isset($_POST['date']) && isset($_POST['time'])){
                $poultry->schedule_date=date('Y-m-d', strtotime($_POST['date']))." ".date("H:i:s", strtotime($_POST['time']));
            }

            if($_POST['call_state']==5 || $_POST['call_state']==6 || $_POST['call_state']==8){
                $poultry->status=1;
                $schedule->delete();
            }
            else $poultry->status=2;

            


            $poultry->save();

            return redirect(session('access').'reproductive/callInitiate')->with('message', 'সফলভাবে সংরক্ষিত');

        }/*
        else if(isset($_POST['rel'])){
            $schedule = Schedule::where('reproductive_id',(int)$_POST['id'])->first();
            //var_dump($schedule);
            if(isset($schedule)) {
                $schedule->delete();
            }

            $poultry = Reproductive::find($_POST['id']);
            if($poultry->schedule_date==null)
                $poultry->status=0;
            else    $poultry->status=2;
            $poultry->save();

            return $schedule->id;
        }*/else if(isset($_POST['mobile_no'])){
            Schedule::where('reproductive_id',$_POST['id'])->where('schedule_date','<>',null)->delete();
            $schedule = Schedule::where('reproductive_id',$_POST['id'])->where('schedule_date',null)->where('call_state',0)->where('mobile_no',$_POST['mobile_no'])->first();
            if(!isset($schedule)) {
                $schedule = new Schedule();
            }
            $schedule->mobile_no=$_POST['mobile_no'];
            $schedule->surveillance_id=$_POST['surveillance_id'];
            $schedule->reproductive_id=$_POST['id'];
            //$schedule->s_type=$_POST['s_type'];
            $schedule->user_id = \Auth::User()->id;
            $schedule->save();

            $poultry = Reproductive::find($_POST['id']);
            $no_of_call = DB::table('schedules')->where('reproductive_id','=',$poultry->id)
            ->count('reproductive_id');
            $poultry->no_of_call=$no_of_call;
            $poultry->save();

            return $schedule->id;
        }else{
            return redirect(session('access').'reproductive/callInitiate')->with('message', 'সফলভাবে সংরক্ষিত');
        }
    }

    public function callQuestion($id,Request $request){

        
            if($request->isMethod('post')){

                //var_dump($request->all());
                //die();
                
                $poultry = Reproductive::find($id);
                $question=ReproductiveQuestion::where('reproductive_id',$id)->first();
                //var_dump($question);
                //die();
                if(!isset($question))
                $question = new ReproductiveQuestion();
                $question->reproductive_id = $id;
                $input = $request->all();                
                $fillable = $question->getFillable();
                $question->filled($fillable, $input);
                $question->user_id = \Auth::User()->id;
                //if(isset($input['call_status']))
                $question->call_status=$input['call_status'];

                if(isset($input['submitted_at'])){

                    if($input['s_0_2']==2 ||  $input['s_0_3'] < 15 || $input['s_0_3'] > 49 ){
                        $question->call_status = 6;
                    }
                    Schedule::where([
                        'reproductive_id'=>$id,
                        'deleted_at'=>null
                    ])->delete();
                    $poultry->status=1;
                    $question->submitted_at = date('Y-m-d H:i:s');
                    
                }
                $question->save();

                if ($request->get('call_status') == 0 || $request->get('call_status') == 3) {
                    
                    $schedule = Schedule::where('reproductive_id',$id)->where('schedule_date',null)->whereIn('call_state',[0,3])->where('mobile_no', $poultry->mobile_no)->first();

                    if (isset($schedule)) {

                        if(isset($_POST['date']) && isset($_POST['time'])){

                            $schedule->schedule_date = date('Y-m-d', strtotime($request->get('date'))) . " " . date("H:i:s", strtotime($request->get('time')));
                            
                                                        
                            $poultry->schedule_date = date('Y-m-d', strtotime($request->get('date')))." ".date('H:i:s', strtotime($request->get('time')));

                            if(isset($_POST['s_type']))
                            $schedule->s_type=$_POST['s_type'];

                            $schedule->user_id = $question->user_id;
                            $schedule->call_state = $_POST['call_status'];
                            $schedule->save();
                            $poultry->status=2;

                        }

                    }
                    

                }else if($request->get('call_status') == 7 || $request->get('call_status') == 8){

                    Schedule::where('reproductive_id',$id)->where('schedule_date', '=', null)->orWhere('schedule_date', '<>', null)->delete();
                    $poultry->status=1;
                }

                $poultry->interview_id = $question->user_id;
                
                $poultry->save();
                
                return array(
                    'success'=>true,
                    'message'=>'সফলভাবে সংরক্ষিত'
                );
                              
            }
            
            /*
    		if($request->isMethod('post')){

    			$poultry = Reproductive::find($id);

    			if($request->get('call_status')==0 || $request->get('call_status')==3)
                	$poultry->status=2;
            	else $poultry->status=1;
            	//$poultry->save();

            	$question=ReproductiveQuestion::where('reproductive_id',$id)->first();
            	if(!isset($question))
                $question = new ReproductiveQuestion();
            	$question->surveillance_id = $poultry->surveillance_id;
            	$question->reproductive_id = $id;
            	//question and answer part
                $input = $request->all();
                //var_dump($input);
                $fillable = $question->getFillable();
                //var_dump($fillable);
                //$nonfillable = array_diff($fillable,$input);
                //var_dump($input);
                //var_dump($nonfillable);
                //$question->fill($input);
                $question->filled($fillable, $input);
                //var_dump($fillable);
            	//end question and anwer part
                $question->user_id = \Auth::User()->id;
                $question->call_status=$_POST['call_status'];
                //submitted_time
                if(isset($input['submitted_at'])){
                    Schedule::where([
                        'reproductive_id'=>$id,
                        'deleted_at'=>null
                    ])->delete();
                    
                    $question->submitted_at = date('Y-m-d H:i:s');
                    
                }

                if(isset($_POST['call_status']))
                $question->call_status=$_POST['call_status'];
                //will save here
                $poultry->interview_id = $question->user_id;
                
                $poultry->save();
                $question->save();

                

                //if(isset($input['call_status']) && isset($input['s_type']) && isset($input['date']) && isset($input['time'])){

                $schedule = Schedule::where('reproductive_id',$id)->where('schedule_date',null)->whereIn('call_state',[0,3])->where('mobile_no', $poultry->mobile_no)->first();

                    if (isset($schedule)) {
                         if ($request->get('call_status') == 0 || $request->get('call_status') == 3) {

                            if(isset($_POST['date']) && isset($_POST['time'])){
                                $schedule->schedule_date = date('Y-m-d', strtotime($request->get('date'))) . " " . date("H:i:s", strtotime($request->get('time')));
                            
                                                        
                                $poultry->schedule_date = date('Y-m-d', strtotime($request->get('date')))." ".date('H:i:s', strtotime($request->get('time')));
                                $poultry->interview_id = $question->user_id;
                                    
                                $poultry->status=2;
                                $poultry->save();
                            }
                            
                            
                        }
                        if(isset($_POST['s_type']))
                        $schedule->s_type=$_POST['s_type'];

                        $schedule->user_id = \Auth::User()->id;
                        $schedule->call_state = $_POST['call_status'];
                        $schedule->save();
                        if ($request->get('call_status') == 7 || $request->get('call_status') == 8) {
                            Schedule::where('reproductive_id',$id)->where('schedule_date', '=', null)->orWhere('schedule_date', '<>', null)->delete();
                        }
                    }
                //}
                
            	return array(
	                'success'=>true,
	                'message'=>'সফলভাবে সংরক্ষিত'
            	);

    		}*/else{

    			$poultry = Reproductive::find($id);
	            if($poultry->status==1){
	                return redirect(session('access').'reproductive/callInitiate')->with('message', 'ইতিমধ্যে সফলভাবে সংরক্ষিত');
	            }
	            view()->share('pageTitle', "Reproductive Contact Question Form");
	            view()->share('breadcamps', array('Home' => url(session('access').'dashboard'), 'Reproductive Contact' => url(session('access').'reproductive'), "Call Initiate Form" => url(session('access').'reproductive/callInitiate'), "Question Form" => url(session('access').'reproductive/question/'.$id)));
	            view()->share('id', $id);

                $question=ReproductiveQuestion::where('reproductive_id',$id)->first();


	            view()->share('question', $question);
	            view()->share('reproductive', $poultry);
	            return view(session('access').'reproductive/question');
    		}
    }

    

    


    public function pick($id, $did=null){

        $user_id = \Auth::User()->id;
        $poultry = Reproductive::where(['interview_id'=>$user_id,'status'=>-2])->first();
        //dd($poultry);
        if(isset($poultry)){
            return redirect(session('access').'reproductive/callInitiate')->with('message', 'আপনি আগে এটি সম্পন্ন করুন');
        }
        $poultry = Reproductive::where(['id'=>$id,'status'=>-2])->first();
        //dd($poultry);
        if(isset($poultry)){
            $user = User::select(DB::raw('username'))->where('id',$poultry->interview_id)->first();
            //dd($user);
            return redirect(session('access').'reproductive/callInitiate')->with('message', "ইতিমধ্যে ($user->username) এই টি পিক করেছেন");
        }

        if(isset($did)){
            $poultry = Reproductive::find($did);
            $poultry->status = 0;
            $poultry->interview_id = null;
            //$poultry->no_of_call = 0;
            $poultry->save();
        }
        

        $poultry = Reproductive::find($id);
        $poultry->status = -2;
        $poultry->interview_id = $user_id;
        $poultry->save();

        return redirect(session('access').'reproductive/callInitiate');

    }

    public function qedit($id){

        view()->share('pageTitle', "Reproductive Edit Form");
        view()->share('breadcamps', array('Home' => url(session('access').'dashboard'), 'Reproductive Contact' => url(session('access').'reproductive')));
        $poultry = Reproductive::find($id);
        $question = $poultry->question;
        view()->share('question', $question);
        view()->share('reproductive', $poultry);

        return view(session('access').'reproductive/qedit');
    }
    public function qeditstore($id, Request $request){
            //var_dump($request->all());
        /*
        $this->validate($request, [
            'gi_1_3_e' => 'required_if:gi_1_3,666',
            'gi_1_4_e' => 'required_if:gi_1_4,666',
            'gi_1_5_e' => 'required_if:gi_1_5,666',

            'pi_2_5_1'=>'required_if:pi_2_5,666',
            'pi_2_5_2'=>'required_if:pi_2_5,666',

            'fp_3_2_1_e'=>'required_if:fp_3_2_1,666',
            'fp_3_2_2_e'=>'required_if:fp_3_2_2,666',
            'fp_3_2_3_e'=>'required_if:fp_3_2_3,666',


            'fp_3_3_1_e'=>'required_if:fp_3_3_1,666',
            'fp_3_3_2_e'=>'required_if:fp_3_3_2,666',
            'fp_3_3_3_e'=>'required_if:fp_3_3_3,666',


            'fp_3_4_e' => 'required_if:fp_3_4,666',

            'dp_4_3_1_e'=>'required_if:dp_4_3_1,666',
            'dp_4_3_2_e'=>'required_if:dp_4_3_2,666',
            'dp_4_3_3_e'=>'required_if:dp_4_3_3,666',


            'dp_4_4_1_e'=>'required_if:dp_4_4_1,666',
            'dp_4_4_2_e'=>'required_if:dp_4_4_2,666',
            'dp_4_4_3_e'=>'required_if:dp_4_4_3,666',


            'dp_4_6_1_e'=>'required_if:dp_4_6_1,666',
            'dp_4_6_2_e'=>'required_if:dp_4_6_2,666',
            'dp_4_6_3_e'=>'required_if:dp_4_6_3,666',

            'dp_4_7_1_e'=>'required_if:dp_4_7_1,666',
            'dp_4_7_2_e'=>'required_if:dp_4_7_2,666',
            'dp_4_7_3_e'=>'required_if:dp_4_7_3,666',


            'dp_4_8_1_e'=>'required_if:dp_4_8_1,666',
            'dp_4_8_2_e'=>'required_if:dp_4_8_2,666',
            'dp_4_8_3_e'=>'required_if:dp_4_8_3,666',


            'dp_4_9_1_e'=>'required_if:dp_4_9_1,666',
            'dp_4_9_2_e'=>'required_if:dp_4_9_2,666',
            'dp_4_9_3_e'=>'required_if:dp_4_9_3,666',

            'dp_4_11_1_e'=>'required_if:dp_4_11_1,666',
            'dp_4_11_2_e'=>'required_if:dp_4_11_2,666',
            'dp_4_11_3_e'=>'required_if:dp_4_11_3,666',


        ]);
        */

        $question = ReproductiveQuestion::find($id);
        $question->fill($request->all());
        $question->save();
        return redirect(session('access').'reproductive');
    }

    public function missingScheduleOrAppointment(Request $request){
            
            $date = date("Y-m-d");
            $time = date("H:i").":00";
            
            $extra_query="";            
            
            
            if ($request->s_id_no) {
                $extra_query.="and reproductive.id=".$request->s_id_no;
            }

            if ($request->s_mobile_no) {
                $extra_query.="and reproductive.mobile_no='".$request->s_mobile_no."'";
            }

            $raw_query = "SELECT reproductive.id,reproductive.mobile_no,reproductive.status,reproductive.interview_id, users.username,
schedules.s_type,schedules.id as schedule_id, reproductive.schedule_date,schedules.schedule_date sch,concat(area_limit.name,' | ',area_limit.eng_name) as area_name from `reproductive` join area_limit on reproductive.district_id= area_limit.area_id and area_limit.running_area <> -1 join `schedules` on `reproductive`.`id` = `schedules`.`reproductive_id` and `reproductive`.`schedule_date` = schedules.schedule_date left join `users` on `users`.`id` = `reproductive`.`interview_id` where (`reproductive`.`status` = 2 and date(reproductive.schedule_date) = '$date' and time(reproductive.schedule_date)<='$time' $extra_query ) order by reproductive.schedule_date desc";

            $scheduleList = DB::select($raw_query);
            $scheduleList = $this->arrayPaginator($scheduleList, $request);
            
            

            $user_id = \Auth::User()->id;

            view()->share('pageTitle', "Reproductive Missing Schedule / Appointment");
            view()->share('breadcamps', array('Home' => url(session('access').'dashboard'), 'Reproductive Contact' => url(session('access').'reproductive')));
            view()->share('reproductives', $scheduleList);
            view()->share('userid', $user_id);
            return view(session('access').'reproductive/missing');
    }

    public function arrayPaginator($array, $request)
    {
        
        $page = $request->get('page', 1);
        $perPage = 10;
        $offset = ($page * $perPage) - $perPage;

        return new \Illuminate\Pagination\LengthAwarePaginator(array_slice($array, $offset, $perPage, true), count($array), $perPage, $page,
            ['path' => $request->url(), 'query' => $request->query()]);
    }

    public function datagenerator(){

        //$citycorporationdata = Storage::disk('local')->exists('citycorporationdata.json') ? json_decode(Storage::disk('local')->get('citycorporationdata.json')) : [];
        //$citycorporationdatadb = \App\Area::select('id','name','eng_name','parent_id')->where('type_id',7)->get()->toArray();
        $districtdb = \App\Area::select(DB::raw('id,eng_name as name'))->where('type_id',5)->get()->toArray();

        $citycorporationdatadb = \App\Area::select(DB::raw('id,eng_name as name,parent_id'))->where('type_id',7)->get()->toArray();

        $upaziladatadb = \App\Area::select(DB::raw('id,eng_name as name,parent_id'))->where('type_id',6)->get()->toArray();

        $municipaldatadb = \App\Area::select(DB::raw('id,eng_name as name,parent_id'))->where('type_id',9)->get()->toArray();

        $thanadb = \App\Area::select(DB::raw('id,eng_name as name,parent_id'))->where('type_id',10)->get()->toArray();

        /*
        $citycorporationdatadb = \App\Area::select('id','name')->with([
            'children' => function($query) {
                $query->select('id', 'parent_id'); 
                // You can customize the selected fields for a relationship like this.
                // But you should select the `key` of the relationship. 
                // In this case it's the `parent_id`.
            }
        ])->where('type_id',7)->get()->toArray();
        */
        //dd(json_encode($citycorporationdatadb));
        
        
            //$citycorporationdata = [];
            //$citycorporationdata = $citycorporationdatadb;
        //var_dump($districtdb);
        /*
            \Storage::disk('public')->put('js/districtdata.json', json_encode($districtdb));

            \Storage::disk('public')->put('js/citycorporationdata.json', json_encode($citycorporationdatadb));

            \Storage::disk('public')->put('js/upaziladata.json', json_encode($upaziladatadb));

            \Storage::disk('public')->put('js/municipaldatadb.json', json_encode($municipaldatadb));

            \Storage::disk('public')->put('js/thanadb.json', json_encode($thanadb));
            */
            $data = [
                'district'=>$districtdb,
                'upazilla'=>$upaziladatadb,
                'city'=>$citycorporationdatadb,
                'thana'=>$thanadb,
                'municipalty'=>$municipaldatadb,
            ];
            \Storage::disk('public')->put('js/compact.json', json_encode($data));
            

        

    }


    

}