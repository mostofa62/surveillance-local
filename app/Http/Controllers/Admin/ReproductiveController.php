<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use DB;
use Mail;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Response;

use App\Schedule;
use App\Models\Reproductive;
use App\Models\ReproductiveQuestion;

class ReproductiveController extends Controller
{

    public function index(Request $request)
    {
        $pagetitle="Reproductive Contact Lists";
        view()->share('pageTitle', $pagetitle);
        //view()->share('poultrys', $poultry);
        view()->share('breadcamps', array('Home' => url(session('access').'dashboard'), 'Reproductive Contact' => url(session('access').'poultry')));
        return view(session('access').'reproductive/index');
    } 

	public function create()
    {
        
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

    public function edit($id)
    {
        
     
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
        

        view()->share('pageTitle', "Call Initiate Form");
        view()->share('breadcamps', array('Home' => url(session('access').'dashboard'), 'Reproductive Contact' => url(session('access').'reproductive'), "Call Initiate Form" => url(session('access').'reproductive/callInitiate')));
        $user_id=\Auth::User()->id;
        $poultry = Reproductive::Where('interview_id',$user_id)
            ->Where('reproductive.status',-1)
            ->first();
        if(!isset($poultry)) {
            $poultry = Reproductive::select(DB::raw('reproductive.*'), DB::raw('reproductive_questions.id as question_id'), DB::raw('sc.schedule_date'))
                ->leftJoin('reproductive_questions', function ($query) {
                    $query->on('reproductive.id', 'reproductive_questions.reproductive_id');
                    $query->where('reproductive_questions.deleted_at', null);
                })
                ->leftJoin('schedules as sc', function ($query) use ($user_id) {
                    $query->on('reproductive.id', 'sc.reproductive_id');
                    $query->where('sc.schedule_date', '<=', date('Y-m-d H:i:s'));
//                $query->orWhere('sc.user_id',$user_id)->where('sc.schedule_date',null);
                    $query->where('sc.deleted_at', null);
                })
                ->where('reproductive_questions.id', null)
                ->where('reproductive.status', '<>', 1)->Where('reproductive.status', '<>', -1)
//            ->orderByRaw("case when scc.schedule_date = NULL and scc.user_id = NULL  then scc.create            $question->d_at when sc.schedule_date <> NULL then sc.schedule_date end asc")
                ->orderBy('schedule_date', 'desc')->orderBy('status', 'asc')->orderBy('id', 'asc')
                // ->orderByRaw("case when scc.schedule_date = NULL then scc.create            $question->d_at when sc.schedule_date <> NULL then sc.schedule_date end asc")
                ->first();
        }

        if(!isset($poultry)) {
            $poultry = Reproductive::select(DB::raw('reproductive.*'), DB::raw('reproductive_questions.id as question_id'), DB::raw('sc.schedule_date'))
                ->leftJoin('reproductive_questions', function ($query) {
                    $query->on('reproductive.id', 'reproductive_questions.reproductive_id');
                    $query->where('reproductive_questions.deleted_at', null);
                })
                ->leftJoin('schedules as sc', function ($query) use ($user_id) {
                    $query->on('reproductive.id', 'sc.reproductive_id');
                    $query->where('sc.schedule_date', '<=', date('Y-m-d H:i:s'));
//                $query->orWhere('sc.user_id',$user_id)->where('sc.schedule_date',null);
                    $query->where('sc.deleted_at', null);
                })
                ->where('reproductive_questions.id','<>', null)
                ->where('reproductive.status', '<>', 1)->Where('reproductive.status', '<>', -1)
//            ->orderByRaw("case when scc.schedule_date = NULL and scc.user_id = NULL  then scc.create            $question->d_at when sc.schedule_date <> NULL then sc.schedule_date end asc")
                ->orderBy('schedule_date', 'desc')->orderBy('status', 'asc')->orderBy('id', 'asc')
                // ->orderByRaw("case when scc.schedule_date = NULL then scc.create            $question->d_at when sc.schedule_date <> NULL then sc.schedule_date end asc")
                ->first();
        }


        if (isset($poultry)){
                if($poultry->status!=-1)
                    $poultry->no_of_call+=1;
                $poultry->interview_id=$user_id;
                $poultry->status=-1;
                $poultry->save();
        }else
            return redirect(session('access').'reproductive')->with('message', 'সফলভাবে সংরক্ষিত');
        view()->share('info', $poultry);
        return view(session('access').'reproductive/callInitiate');
    }


    public function callSchedule()
    {
        if(isset($_POST['schedule_id'])){
            $schedule = Schedule::find($_POST['schedule_id']);
            $schedule->schedule_date=date('Y-m-d', strtotime($_POST['date']))." ".date("H:i:s", strtotime($_POST['time']));
            $schedule->call_state=$_POST['call_state'];
            $schedule->user_id = \Auth::User()->id;
            $schedule->save();

            $poultry = Reproductive::find($schedule->reproductive_id);
            if($_POST['call_state']==4)
                $poultry->status=1;
            else $poultry->status=2;
            $poultry->save();

            return redirect(session('access').'reproductive/callInitiate')->with('message', 'সফলভাবে সংরক্ষিত');
        }else if(isset($_POST['rel'])){
            $schedule = Schedule::where('reproductive_id',(int)$_POST['id'])->first();
            //var_dump($schedule);
            if(isset($schedule)) {
                $schedule->delete();
            }

            $poultry = Reproductive::find($_POST['id']);
            $poultry->status=0;
            $poultry->save();

            return $schedule->id;
        }else if(isset($_POST['mobile_no'])){
            Schedule::where('reproductive_id',$_POST['id'])->where('schedule_date','<>',null)->delete();
            $schedule = Schedule::where('reproductive_id',$_POST['id'])->where('schedule_date',null)->where('call_state',0)->where('mobile_no',$_POST['mobile_no'])->first();
            if(!isset($schedule)) {
                $schedule = new Schedule();
            }
            $schedule->mobile_no=$_POST['mobile_no'];
            $schedule->surveillance_id=$_POST['surveillance_id'];
            $schedule->reproductive_id=$_POST['id'];
            $schedule->user_id = \Auth::User()->id;
            $schedule->save();

            return $schedule->id;
        }else{
            return redirect(session('access').'reproductive/callInitiate')->with('message', 'সফলভাবে সংরক্ষিত');
        }
    }

    public function callQuestion($id,Request $request){


    		if($request->isMethod('post')){

    			$poultry = Reproductive::find($id);

    			if($request->get('call_status')==0)
                	$poultry->status=0;
            	else $poultry->status=1;
            	$poultry->save();

            	$question=ReproductiveQuestion::where('reproductive_id',$id)->first();
            	if(!isset($question))
                $question = new ReproductiveQuestion();
            	$question->surveillance_id = $poultry->surveillance_id;
            	$question->reproductive_id = $id;
            	//question and answer part
                $input = $request->all();
                $question->fill($input);
            	//end question and anwer part
                $question->user_id = \Auth::User()->id;
                $question->call_status=$_POST['call_status'];
                //submitted_time
                if(isset($input['submitted_at'])){
                    $question->submitted_at = date('Y-m-d H:i:s');
                }
                //will save here
                $question->save();

                if(isset($input['date']) && isset($input['time'])){

                    $schedule = Schedule::where('reproductive_id',$id)->where('schedule_date',null)->where('call_state',0)->where('mobile_no', $poultry->mobile_no)->first();

                    if (isset($schedule)) {
                        if ($request->get('call_status') == 0) {
                            $schedule->schedule_date = date('Y-m-d', strtotime($request->get('date'))) . " " . date("H:i:s", strtotime($request->get('time')));
                            $schedule->user_id = \Auth::User()->id;
                        }
                        $schedule->call_state = $_POST['call_status'];
                        $schedule->save();
                        if ($request->get('call_status') != 0) {
                            Schedule::where('reproductive_id',$id)->where('schedule_date', '<>', null)->delete();
                        }
                    }
                }

            	return array(
	                'success'=>true,
	                'message'=>'সফলভাবে সংরক্ষিত'
            	);

    		}else{

    			$poultry = Reproductive::find($id);
	            if($poultry->status==1){
	                return redirect(session('access').'reproductive/callInitiate')->with('message', 'ইতিমধ্যে সফলভাবে সংরক্ষিত');
	            }
	            view()->share('pageTitle', "Reproductive Contact Question Form");
	            view()->share('breadcamps', array('Home' => url(session('access').'dashboard'), 'Reproductive Contact' => url(session('access').'reproductive'), "Call Initiate Form" => url(session('access').'reproductive/callInitiate'), "Question Form" => url(session('access').'reproductive/question/'.$id)));
	            view()->share('id', $id);
	            view()->share('question', ReproductiveQuestion::where('reproductive_id',$id)->first());
	            view()->share('reproductive', $poultry);
	            return view(session('access').'reproductive/question');
    		}
    }

    public function datagenerator(){

        //$citycorporationdata = Storage::disk('local')->exists('citycorporationdata.json') ? json_decode(Storage::disk('local')->get('citycorporationdata.json')) : [];
        //$citycorporationdatadb = \App\Area::select('id','name','eng_name','parent_id')->where('type_id',7)->get()->toArray();

        $citycorporationdatadb = \App\Area::select(DB::raw('id,concat(name," | ",eng_name) as name,parent_id'))->where('type_id',7)->get()->toArray();

        $upaziladatadb = \App\Area::select(DB::raw('id,concat(name," | ",eng_name) as name,parent_id'))->whereIn('type_id',[6,8])->get()->toArray();
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

            \Storage::disk('public')->put('js/citycorporationdata.json', json_encode($citycorporationdatadb));

            \Storage::disk('public')->put('js/upaziladata.json', json_encode($upaziladatadb));

            

        

    }

    public  function allfileds(Request $request){
        $input = $request->all();
        \Storage::disk('public')->put('filed_and_types.json', json_encode($input));
    }

}