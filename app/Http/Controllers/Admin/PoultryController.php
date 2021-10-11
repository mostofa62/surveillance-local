<?php

namespace App\Http\Controllers\Admin;

use App\Schedule;
use App\User;
use App\PoultryQuestion;
use App\DomesticAnimal;
use Illuminate\Http\Request;
use App\Poultry;
use DB;
use Mail;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use PhpParser\Node\Expr\Print_;
use Response;

class PoultryController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function index(Request $request)
    {

        $this->checkrole();
        $poultry = Poultry::orderBy('id', 'asc');
        $pagetitle="Poultry Contact Lists";

        if ($request->s_name) {
            $poultry = $poultry->where('name', 'like', '%' . $request->s_name . '%');
            $pagetitle= "Poultry Contact Search Results";
        }

        if ($request->s_mobile_no) {
            $poultry =$poultry->where('mobile_no', 'like', '%' . $request->s_mobile_no . '%');
            $pagetitle= "Poultry Contact Search Results";
        }

        if ($request->s_surveillance_id) {
            $poultry =$poultry->where('surveillance_id', 'like', '%' . $request->s_surveillance_id . '%');
            $pagetitle= "Poultry Contact Search Results";
        }

        $poultry=$poultry->paginate(20);


        view()->share('pageTitle', $pagetitle);
        view()->share('poultrys', $poultry);
        view()->share('breadcamps', array('Home' => url(session('access').'dashboard'), 'Poultry Contact' => url(session('access').'poultry')));
        return view(session('access').'poultry/index');
    }

    public function create()
    {
        $this->checkrole();
        view()->share('pageTitle', "Poultry Contact Create");
        view()->share('breadcamps', array('Home' => url(session('access').'dashboard'), 'Poultry Contact' => url(session('access').'poultry'), 'Add Poultry Contact' => url(session('access').'poultry/create')));
        return view(session('access').'poultry/create');
    }
    public function store(Request $request)
    {
        $this->checkrole();
        $this->validate($request, [
            'mobile_no' => 'required|numeric|unique:poultries',
        ]);

        $poultry = new Poultry();
        $poultry->surveillance_id = $request->get('surveillance_id');
        $poultry->date = $request->get('date');
        $poultry->name = $request->get('name');
        $poultry->mobile_no = $request->get('mobile_no');

        $poultry->user_id = \Auth::User()->id;
        $poultry->site_id = \Auth::User()->site_id;

        $poultry->save();

        return redirect(session('access').'poultry')->with('message', 'সফলভাবে সংরক্ষিত');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->checkrole();
        view()->share('pageTitle', "Poultry Contact Details");
        view()->share('breadcamps', array('Home' => url(session('access').'dashboard'), 'Poultry Contact' => url(session('access').'poultry'), 'Poultry Contact Details' => url(session('access').'poultry/' . $id)));


        $poultry = Poultry::find($id);
        view()->share('info', $poultry);
        return view(session('access').'poultry/detail');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->checkrole();
     
        view()->share('pageTitle', "Poultry Contact Update");
        view()->share('breadcamps', array('Home' => url(session('access').'dashboard'), 'Poultry Contact' => url(session('access').'poultry'), 'Update Poultry Contact' => url(session('access').'poultry/' . $id . '/edit')));

        $poultry = Poultry::find($id);

        view()->share('poultry', $poultry);
        return view(session('access').'poultry/create');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->checkrole();
        $this->validate($request, [
            'mobile_no' => 'required|numeric',
        ]);

        $poultry = Poultry::find($id);

        $poultry->surveillance_id = $request->get('surveillance_id');
        $poultry->date = $request->get('date');
        $poultry->name = $request->get('name');
        $poultry->mobile_no = $request->get('mobile_no');

        $poultry->save();

//        return redirect(session('access').'poultry')->with('message', 'সফলভাবে সংরক্ষিত');
        $previous_url = $request->input('previous_url');
        return redirect($previous_url)->with('message', 'সফলভাবে সংরক্ষিত');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->checkrole();
        $poultry = Poultry::find($id);
        $poultry->delete();
        PoultryQuestion::where('poultry_id', $id)->delete();

    }


    public function callInitiate()
    {
        $this->checkrole();

        view()->share('pageTitle', "Call Initiate Form");
        view()->share('breadcamps', array('Home' => url(session('access').'dashboard'), 'Poultry Contact' => url(session('access').'poultry'), "Call Initiate Form" => url(session('access').'poultry/callInitiate')));
        $user_id=\Auth::User()->id;
        $poultry = Poultry::select(DB::raw('poultries.*'), DB::raw('poultry_questions.id as question_id'))
            ->leftJoin('poultry_questions', function ($query) {
                $query->on('poultries.id', 'poultry_questions.poultry_id');
                $query->where('poultry_questions.deleted_at', null);
            })
            ->where('poultries.status',-1)
            ->where('interview_id',$user_id)
            ->first();
        if(!isset($poultry)) {
            $poultry = Poultry::select(DB::raw('poultries.*'), DB::raw('poultry_questions.id as question_id'))
                ->leftJoin('poultry_questions', function ($query) {
                    $query->on('poultries.id', 'poultry_questions.poultry_id');
                    $query->where('poultry_questions.deleted_at', null);
                })

//                ->whereNotIn('poultries.status',[-1,1])
                ->where('poultries.no_of_call', "<",4)
                ->where(function($q){
                    $q->where('poultries.status', 0)
                        ->orWhere('poultries.status',2);
                })
                ->where(function($q){
                    $q->where('poultries.schedule_date', null)
                        ->orWhere('poultries.schedule_date','<', date('Y-m-d H:i:s'));
                })
                ->orderBy('question_id', 'desc')
                ->orderBy('schedule_date', 'desc')->orderBy('poultries.status', 'asc')->orderBy('id', 'asc')
                ->groupBy('id')
                ->first();
//                ->get();
//
//            foreach ($poultry as $p):
//                print_r("q:".$p->question_id." ,date:".$p->schedule_date." ,S:".$p->status." ,Id:".$p->id." ");echo "<br>";
//            endforeach;
//            die("SD");
        }
        if (isset($poultry)){
                if($poultry->status!=-1)
                    $poultry->no_of_call+=1;
                $poultry->interview_id=$user_id;
                $poultry->status=-1;
                $poultry->save();

//            echo "<pre>";
//            print_r($poultry);
//            die;
        }else
            return redirect(session('access').'poultry')->with('message', 'সফলভাবে সংরক্ষিত');
        view()->share('info', $poultry);
        return view(session('access').'poultry/callInitiate');
    }
    public function callSchedule()
    {
        if(isset($_POST['schedule_id'])){
            $schedule = Schedule::find($_POST['schedule_id']);
            $schedule->schedule_date=date('Y-m-d', strtotime($_POST['date']))." ".date("H:i:s", strtotime($_POST['time']));
            $schedule->call_state=$_POST['call_state'];
            $schedule->user_id = \Auth::User()->id;
            $schedule->save();

            $poultry = Poultry::find($schedule->poultry_id);
            if($_POST['call_state']==2)
                $poultry->status=1;
            else $poultry->status=2;
            $poultry->schedule_date=date('Y-m-d', strtotime($_POST['date']))." ".date("H:i:s", strtotime($_POST['time']));;
            $poultry->save();

            return redirect(session('access').'poultry/callInitiate')->with('message', 'সফলভাবে সংরক্ষিত');
        }else if(isset($_POST['rel'])){
            $schedule = Schedule::where('poultry_id',$_POST['id'])->first();
            if(isset($schedule)) {
                $schedule->delete();
            }

            $poultry = Poultry::find($_POST['id']);
            if($poultry->schedule_date==null)
                    $poultry->status=0;
            else    $poultry->status=2;
            $poultry->save();
            return $schedule->id;
        }else if(isset($_POST['mobile_no'])){
            Schedule::where('poultry_id',$_POST['id'])->where('schedule_date','<>',null)->delete();
            $schedule = Schedule::where('poultry_id',$_POST['id'])->where('schedule_date',null)->where('call_state',0)->where('mobile_no',$_POST['mobile_no'])->first();
            if(!isset($schedule)) {
                $schedule = new Schedule();
            }
            $schedule->mobile_no=$_POST['mobile_no'];
            $schedule->surveillance_id=$_POST['surveillance_id'];
            $schedule->poultry_id=$_POST['id'];
            $schedule->user_id = \Auth::User()->id;
            $schedule->save();

            return $schedule->id;
        }else{
            return redirect(session('access').'poultry/callInitiate')->with('message', 'সফলভাবে সংরক্ষিত');
        }
    }
    public function callQuestion($id,Request $request){
        $this->checkrole();

        if($_POST) {

            $poultry = Poultry::find($id);

//            $poultry->name = $request->get('name');
//            $poultry->mobile_no = $request->get('mobile_no');

            if($request->get('call_status')!=0)
                $poultry->status=1;
            if($request->get('call_status')!=0) {
                if ($request->get('s_0_2') > -1 && $request->get('s_0_2') < 18)
                    $poultry->status = 1;
                else if ($request->get('s_0_3') == 0 || $request->get('s_0_3') == 99)
                    $poultry->status = 1;
                else if ($request->get('s_0_4') == 0 || $request->get('s_0_4') == 99)
                    $poultry->status = 1;
                else if ($request->get('sc_0_1') == 0 || $request->get('sc_0_1') == 99)
                    $poultry->status = 1;
            }
            $poultry->save();

            $question=PoultryQuestion::where('poultry_id',$id)->first();
            if(!isset($question))
                $question = new PoultryQuestion();
            $question->surveillance_id = $poultry->surveillance_id;
            $question->poultry_id = $id;

            $question->s_0_1 = $request->get('s_0_1');
            $question->s_0_2 = $request->get('s_0_2');
            $question->s_0_3 = $request->get('s_0_3');
            $question->s_0_4 = $request->get('s_0_4');
            $question->sc_0_1 = $request->get('sc_0_1');

            $question->gi_1_1 = $request->get('gi_1_1');
            $question->gi_1_2_a_value = $request->get('gi_1_2_a_value');
            $question->gi_1_2_a_flag = $request->get('gi_1_2_a_flag');
            $question->gi_1_2_b_value = $request->get('gi_1_2_b_value');
            $question->gi_1_2_b_flag = $request->get('gi_1_2_b_flag');
            $question->pp_2_1_a = $request->get('pp_2_1_a');
            $question->pp_2_1_b_value = $request->get('pp_2_1_b_value');
            $question->pp_2_1_b_flag = $request->get('pp_2_1_b_flag');
            $question->pp_2_2_value = $request->get('pp_2_2_value');
            $question->pp_2_2_flag = $request->get('pp_2_2_flag');
            $question->pp_2_3_a = $request->get('pp_2_3_a');
            $question->pp_2_3_b_value = $request->get('pp_2_3_b_value');
            $question->pp_2_3_b_flag = $request->get('pp_2_3_b_flag');
            $question->pp_2_4_value = $request->get('pp_2_4_value');
            $question->pp_2_4_flag = $request->get('pp_2_4_flag');
            $question->pp_2_5_value = $request->get('pp_2_5_value');
            $question->pp_2_5_flag = $request->get('pp_2_5_flag');
            $question->pp_2_6_a = $request->get('pp_2_6_a');
            $question->pp_2_6_b = json_encode($request->get('pp_2_6_b'));
            $question->pp_2_7_a_value = $request->get('pp_2_7_a_value');
            $question->pp_2_7_a_flag = $request->get('pp_2_7_a_flag');
            $question->pp_2_7_b = $request->get('pp_2_7_b');
            $question->pp_2_7_c_value = $request->get('pp_2_7_c_value');
            $question->pp_2_7_c_flag = $request->get('pp_2_7_c_flag');
            $question->pp_2_8_a = $request->get('pp_2_8_a');
            $question->pp_2_8_b_value = $request->get('pp_2_8_b_value');
            $question->pp_2_8_b_flag = $request->get('pp_2_8_b_flag');
            $question->pp_2_9_value = $request->get('pp_2_9_value');
            $question->pp_2_9_flag = $request->get('pp_2_9_flag');
            $question->pp_2_10_value = $request->get('pp_2_10_value');
            $question->pp_2_10_flag = $request->get('pp_2_10_flag');
            $question->pp_2_11_a = $request->get('pp_2_11_a');
            $question->pp_2_11_b = $request->get('pp_2_11_b');
            $question->pp_2_11_c = $request->get('pp_2_11_c');
            $question->pp_2_11_d = $request->get('pp_2_11_d');
            $question->pp_2_12_a = $request->get('pp_2_12_a');
            $question->pp_2_12_b = $request->get('pp_2_12_b');
            $question->pp_2_13_a = $request->get('pp_2_13_a');
            $question->pp_2_13_b = $request->get('pp_2_13_b');
            $question->pp_2_14_a_flag = $request->get('pp_2_14_a_flag');
            $question->pp_2_14_a_value = $request->get('pp_2_14_a_value');
            $question->pp_2_14_b_flag = $request->get('pp_2_14_b_flag');
            $question->pp_2_14_b_value = $request->get('pp_2_14_b_value');
            $question->pp_2_15_a = $request->get('pp_2_15_a');
            $question->pp_2_15_b = json_encode($request->get('pp_2_15_b'));
            $question->pp_2_15_c_flag = json_encode($request->get('pp_2_15_c_flag'));
            $question->pp_2_15_c_value = json_encode($request->get('pp_2_15_c_value'));

            $question->pp_2_16_a_flag = $request->get('pp_2_16_a_flag');
            $question->pp_2_16_a_value = $request->get('pp_2_16_a_value');
            $question->pp_2_16_b_flag = $request->get('pp_2_16_b_flag');
            $question->pp_2_16_b_value = $request->get('pp_2_16_b_value');
            $question->pfp_3_1_a = $request->get('pfp_3_1_a');
            $question->pfp_3_1_b = $request->get('pfp_3_1_b');
            $question->pfp_3_1_c = json_encode($request->get('pfp_3_1_c'));
            $question->pfp_3_1_d = $request->get('pfp_3_1_d');
            $question->pfp_3_2_a = $request->get('pfp_3_2_a');
            $question->pfp_3_2_b_flag = $request->get('pfp_3_2_b_flag');
            $question->pfp_3_2_b_value = $request->get('pfp_3_2_b_value');
            $question->pfp_3_2_c = $request->get('pfp_3_2_c');
            $question->pfp_3_2_d = json_encode($request->get('pfp_3_2_d'));
            $question->pfp_3_2_e = $request->get('pfp_3_2_e');
            $question->pfp_3_2_f_value = $request->get('pfp_3_2_f_value');
            $question->pfp_3_2_f_flag = $request->get('pfp_3_2_f_flag');
            $question->pfp_3_3_a = $request->get('pfp_3_3_a');
            $question->pfp_3_3_b = $request->get('pfp_3_3_b');
            $question->pfp_3_3_c = json_encode($request->get('pfp_3_3_c'));
            $question->pfp_3_3_d = $request->get('pfp_3_3_d');
            $question->pfp_3_4_a = $request->get('pfp_3_4_a');
            $question->pfp_3_4_b = $request->get('pfp_3_4_b');
            $question->pfp_3_4_c = json_encode($request->get('pfp_3_4_c'));
            $question->pm_4_1_a = $request->get('pm_4_1_a');
            $question->pm_4_1_b = $request->get('pm_4_1_b');
            $question->pm_4_2_a = $request->get('pm_4_2_a');
            $question->pm_4_2_b = $request->get('pm_4_2_b');
            $question->pm_4_2_c = $request->get('pm_4_2_c');
            $question->pm_4_2_d = $request->get('pm_4_2_d');
            $question->pm_4_3_a = $request->get('pm_4_3_a');
            $question->pm_4_3_b = $request->get('pm_4_3_b');
            $question->pm_4_4_a = $request->get('pm_4_4_a');
            $question->pm_4_4_b = $request->get('pm_4_4_b');
            $question->pm_4_4_c = $request->get('pm_4_4_c');
            $question->pm_4_4_d = $request->get('pm_4_4_d');
            $question->pm_4_4_e = $request->get('pm_4_4_e');
            $question->pm_4_4_f = $request->get('pm_4_4_f');
            $question->pm_4_4_g = $request->get('pm_4_4_g');
            $question->pm_4_4_h = $request->get('pm_4_4_h');
            $question->pm_4_4_i = $request->get('pm_4_4_i');
            $question->pm_4_4_j = $request->get('pm_4_4_j');
            $question->pm_4_5_a = $request->get('pm_4_5_a');
            $question->pm_4_5_b = $request->get('pm_4_5_b');
            $question->pm_4_5_c = $request->get('pm_4_5_c');
            $question->pm_4_5_d = $request->get('pm_4_5_d');
            $question->pm_4_5_e = $request->get('pm_4_5_e');
            $question->pm_4_5_f = $request->get('pm_4_5_f');
            $question->pm_4_5_g = $request->get('pm_4_5_g');
            $question->pm_4_5_h = $request->get('pm_4_5_h');
            $question->pm_4_5_i = $request->get('pm_4_5_i');
            $question->pm_4_5_j = $request->get('pm_4_5_j');
            $question->pm_4_6_a = $request->get('pm_4_6_a');
            $question->pm_4_6_b = $request->get('pm_4_6_b');
            $question->pm_4_6_c = $request->get('pm_4_6_c');
            $question->pm_4_6_d = $request->get('pm_4_6_d');
            $question->pm_4_6_e = $request->get('pm_4_6_e');
            $question->pm_4_6_f = $request->get('pm_4_6_f');
            $question->pm_4_6_g = $request->get('pm_4_6_g');
            $question->pm_4_6_h = $request->get('pm_4_6_h');
            $question->pm_4_6_i = $request->get('pm_4_6_i');
            $question->pm_4_6_j = $request->get('pm_4_6_j');
            $question->pm_4_7_a = $request->get('pm_4_7_a');
            $question->pm_4_7_b = $request->get('pm_4_7_b');
            $question->pm_4_7_c = $request->get('pm_4_7_c');
            $question->pm_4_7_d = $request->get('pm_4_7_d');
            $question->pm_4_7_e = $request->get('pm_4_7_e');
            $question->pm_4_7_f = $request->get('pm_4_7_f');
            $question->pm_4_7_g = $request->get('pm_4_7_g');
            $question->pm_4_7_h = $request->get('pm_4_7_h');
            $question->pm_4_7_i = $request->get('pm_4_7_i');
            $question->pm_4_7_j = $request->get('pm_4_7_j');
            $question->i_5_1_a = $request->get('i_5_1_a');
            $question->i_5_1_b = $request->get('i_5_1_b');
            $question->i_5_1_c = $request->get('i_5_1_c');
            $question->i_5_1_d = $request->get('i_5_1_d');
            $question->i_5_2_a_value = $request->get('i_5_2_a_value');
            $question->i_5_2_a_flag = $request->get('i_5_2_a_flag');
            $question->i_5_3_a = $request->get('i_5_3_a');
            $question->i_5_3_b = $request->get('i_5_3_b');
            $question->i_5_3_c_value = $request->get('i_5_3_c_value');
            $question->i_5_3_c_flag = $request->get('i_5_3_c_flag');
            $question->i_5_4_a_flag = $request->get('i_5_4_a_flag');
            $question->i_5_4_a_value = $request->get('i_5_4_a_value');

            $question->i_5_4_b = json_encode($request->get('i_5_4_b'));
            $question->i_5_4_c = json_encode($request->get('i_5_4_c'));
            $question->i_5_4_d = json_encode($request->get('i_5_4_d'));
            $question->i_5_5_a_value = json_encode($request->get('i_5_5_a_value'));
            $question->i_5_5_a_flag = json_encode($request->get('i_5_5_a_flag'));
            $question->i_5_5_b = json_encode($request->get('i_5_5_b'));
            $question->i_5_6_a = json_encode($request->get('i_5_6_a'));
            $question->i_5_6_b = json_encode($request->get('i_5_6_b'));
            $question->i_5_6_c_value = json_encode($request->get('i_5_6_c_value'));
            $question->i_5_6_c_flag = json_encode($request->get('i_5_6_c_flag'));


            $question->d_6_1 = $request->get('d_6_1');
            $question->d_6_2_value = $request->get('d_6_2_value');
            $question->d_6_2_flag = $request->get('d_6_2_flag');
            $question->d_6_3_value = $request->get('d_6_3_value');
            $question->d_6_3_flag = $request->get('d_6_3_flag');
            $question->d_6_4 = $request->get('d_6_4');
            $question->d_6_5_a_value = $request->get('d_6_5_a_value');
            $question->d_6_5_a_flag = $request->get('d_6_5_a_flag');
            $question->d_6_5_b_value = $request->get('d_6_5_b_value');
            $question->d_6_5_b_flag = $request->get('d_6_5_b_flag');
            $question->d_6_5_c_value = $request->get('d_6_5_c_value');
            $question->d_6_5_c_flag = $request->get('d_6_5_c_flag');

            $question->user_id = \Auth::User()->id;
            $question->call_status=$_POST['call_status'];

            if($request->get('call_status')!=0) {

                if ($request->get('s_0_2') > -1 && $request->get('s_0_2') < 18)
                    $question->call_status = 2;
                else if ($request->get('s_0_3') == 0 || $request->get('s_0_3') == 99)
                    $question->call_status = 2;
                else if ($request->get('s_0_4') == 0 || $request->get('s_0_4') == 99)
                    $question->call_status = 2;
                else if ($request->get('sc_0_1') == 0 || $request->get('sc_0_1') == 99)
                    $question->call_status = 2;

            }
            if($_POST['call_status']==3)
                $question->call_status=3;

            $question->save();
            $schedule = Schedule::where('poultry_id',$id)->where('call_state',0)->where('mobile_no', $poultry->mobile_no)->first();

            if (isset($schedule)) {
                if ($request->get('date')!= "" && ($request->get('call_status') == 0 || (($poultry->s_0_2==null ||$request->get('s_0_2') > 18) && ($poultry->s_0_3==null|| $poultry->s_0_3==1) && ($poultry->s_0_4==null && $poultry->s_0_4==1) && ($poultry->sc_0_1==null && $poultry->sc_0_1==1))) ) {
                    $schedule->schedule_date = date('Y-m-d', strtotime($request->get('date'))) . " " . date('H:i:s', strtotime($request->get('time')));
                    $poultry->status = 2;
                    $poultry->schedule_date = date('Y-m-d', strtotime($request->get('date'))) . " " . date('H:i:s', strtotime($request->get('time')));
                    $poultry->save();
                    //die;
                }
                $schedule->user_id = \Auth::User()->id;
                $schedule->call_state = $_POST['call_status'];
                //print_r($schedule);
                $schedule->save();

                if ($request->get('call_status') != 0) {
                    Schedule::where('poultry_id',$id)->where('schedule_date', '<>', null)->delete();
                }
            }

            return array(
                'success'=>true,
                'message'=>'সফলভাবে সংরক্ষিত'
            );
            //return redirect(session('access').'poultry/callInitiate')->with('message', 'সফলভাবে সংরক্ষিত');

        }else{
            $poultry = Poultry::find($id);
            if($poultry->status==1){
                return redirect(session('access').'poultry/callInitiate')->with('message', 'ইতিমধ্যে সফলভাবে সংরক্ষিত');
            }
            view()->share('pageTitle', "Poultry Contact Question Form");
            view()->share('breadcamps', array('Home' => url(session('access').'dashboard'), 'Poultry Contact' => url(session('access').'poultry'), "Call Initiate Form" => url(session('access').'poultry/callInitiate'), "Question Form" => url(session('access').'poultry/question/'.$id)));
            view()->share('id', $id);
            view()->share('question', PoultryQuestion::where('poultry_id',$id)->first());
            view()->share('poultry', $poultry);
            return view(session('access').'poultry/question');
        }
    }


    public function questionView($id){
        $poultry = Poultry::find($id);
        view()->share('pageTitle', "Poultry Question Form");
        view()->share('breadcamps', array('Home' => url(session('access').'dashboard'), 'Encephalitis' => url(session('access').'encephalitis'), "Call Initiate Form" => url(session('access').'encephalitis/callInitiate'), "Question Form" => url(session('access').'encephalitis/question/'.$id)));
        view()->share('id', $id);
        view()->share('question', PoultryQuestion::where('poultry_id',$id)->first());
        view()->share('poultry', $poultry);
        return view(session('access').'poultry/question-view');
    }
    public function export(Request $request){

        $poultry = Poultry::select(DB::raw('poultry_questions.*'),DB::raw('poultries.*'))
            ->leftJoin('poultry_questions', function ($query) {
                $query->on('poultries.id', 'poultry_questions.poultry_id');
                $query->where('poultry_questions.deleted_at', null);
            })
            ->where('poultries.status','<>', 0)
            ->orderBy('poultries.id', 'asc');

        if ($request->name) {
            $poultry = $poultry->where('poultries.name', 'like', '%' . $request->name . '%');
        }
        if ($request->mobile_no) {
            $poultry =$poultry->where('poultries.mobile_no', 'like', '%' . $request->mobile_no . '%');
        }
        if ($request->surveillance_id) {
            $poultry =$poultry->where('poultries.surveillance_id', 'like', '%' . $request->surveillance_id . '%');
        }
        $poultry = $poultry->get();
        $export = "ID,mobile_no,s_0_1,s_0_2,s_0_3,s_0_4,sc_0_1,gi_1_1,gi_1_2_a_value,gi_1_2_a_flag,gi_1_2_b_value,gi_1_2_b_flag,pp_2_1_a,pp_2_1_b_value,pp_2_1_b_flag,pp_2_2_value,pp_2_2_flag,pp_2_3_a,pp_2_3_b_value,pp_2_3_b_flag,pp_2_4_value,pp_2_4_flag,pp_2_5_value,pp_2_5_flag,pp_2_6_a,pp_2_6_b_1, pp_2_6_b_2, pp_2_6_b_3 ,pp_2_7_a_value,pp_2_7_a_flag,pp_2_7_b,pp_2_7_c_value,pp_2_7_c_flag,pp_2_8_a,pp_2_8_b_value,pp_2_8_b_flag,pp_2_9_value,pp_2_9_flag,pp_2_10_value,pp_2_10_flag,pp_2_11_a,pp_2_11_b,pp_2_11_c,pp_2_11_d,pp_2_12_a,pp_2_12_b,pp_2_13_a,pp_2_13_b,pp_2_14_a_flag,pp_2_14_a_value,pp_2_14_b_flag,pp_2_14_b_value,pp_2_15_a,pp_2_15_b_1,pp_2_15_b_2,pp_2_15_b_3,pp_2_15_c_flag_1,pp_2_15_c_flag_2,pp_2_15_c_flag_3,pp_2_15_c_value_1,pp_2_15_c_value_2,pp_2_15_c_value_3,pp_2_16_a_flag,pp_2_16_a_value,pp_2_16_b_flag,pp_2_16_b_value,pfp_3_1_a,pfp_3_1_b,pfp_3_1_c_1,pfp_3_1_c_2,pfp_3_1_c_3,pfp_3_1_d,pfp_3_2_a,pfp_3_2_b_flag,pfp_3_2_b_value,pfp_3_2_c,pfp_3_2_d_1,pfp_3_2_d_2,pfp_3_2_d_3,pfp_3_2_e,pfp_3_2_f_flag,pfp_3_2_f_value,pfp_3_3_a,pfp_3_3_b,pfp_3_3_c_1,pfp_3_3_c_2,pfp_3_3_c_3,pfp_3_3_d,pfp_3_4_a,pfp_3_4_b,pfp_3_4_c_1,pfp_3_4_c_2,pfp_3_4_c_3,pm_4_1_a,pm_4_1_b,pm_4_2_a,pm_4_2_b,pm_4_2_c,pm_4_2_d,pm_4_3_a,pm_4_3_b,pm_4_4_a,pm_4_4_b,pm_4_4_c,pm_4_4_d,pm_4_4_e,pm_4_4_f,pm_4_4_g,pm_4_4_h,pm_4_4_i,pm_4_4_j,pm_4_5_a,pm_4_5_b,pm_4_5_c,pm_4_5_d,pm_4_5_e,pm_4_5_f,pm_4_5_g,pm_4_5_h,pm_4_5_i,pm_4_5_j,pm_4_6_a,pm_4_6_b,pm_4_6_c,pm_4_6_d,pm_4_6_e,pm_4_6_f,pm_4_6_g,pm_4_6_h,pm_4_6_i,pm_4_6_j,pm_4_7_a,pm_4_7_b,pm_4_7_c,pm_4_7_d,pm_4_7_e,pm_4_7_f,pm_4_7_g,pm_4_7_h,pm_4_7_i,pm_4_7_j,i_5_1_a,i_5_1_b,i_5_1_c,i_5_1_d,i_5_2_a_value,i_5_2_a_flag,i_5_3_a,i_5_3_b,i_5_3_c_value,i_5_3_c_flag,i_5_4_a_flag,i_5_4_a_value,i_5_4_b_1,i_5_4_b_2,i_5_4_b_3,i_5_4_c_1,i_5_4_c_2,i_5_4_c_3,i_5_4_d_1,i_5_4_d_2,i_5_4_d_3,i_5_5_a_value_1,i_5_5_a_value_2,i_5_5_a_value_3,i_5_5_a_flag_1,i_5_5_a_flag_2,i_5_5_a_flag_3,i_5_5_b_1,i_5_5_b_2,i_5_5_b_3,i_5_6_a_1,i_5_6_a_2,i_5_6_a_3,i_5_6_b_1,i_5_6_b_2,i_5_6_b_3,i_5_6_c_value_1,i_5_6_c_value_2,i_5_6_c_value_3,i_5_6_c_flag_1,i_5_6_c_flag_2,i_5_6_c_flag_3,d_6_1,d_6_2_value,d_6_2_flag,d_6_3_value,d_6_3_flag,d_6_4,d_6_5_a_value,d_6_5_a_flag,d_6_5_b_value,d_6_5_b_flag,d_6_5_c_value,d_6_5_c_flag, no_of_call, call_status, questionnaire_status, user_id,Create Date, Last Updated Date\n";
        foreach ($poultry as $en):
//                if(isset($en->poultry_id)) {
            $export .= "{$en->id}, {$en->mobile_no}, {$en->s_0_1}, {$en->s_0_2}, {$en->s_0_3}, {$en->s_0_4}, {$en->sc_0_1}, {$en->gi_1_1}, {$en->gi_1_2_a_value}, {$en->gi_1_2_a_flag}, {$en->gi_1_2_b_value}, {$en->gi_1_2_b_flag}, {$en->pp_2_1_a}, {$en->pp_2_1_b_value}, {$en->pp_2_1_b_flag}, {$en->pp_2_2_value}, {$en->pp_2_2_flag}, {$en->pp_2_3_a}, {$en->pp_2_3_b_value}, {$en->pp_2_3_b_flag}, {$en->pp_2_4_value}, {$en->pp_2_4_flag}, {$en->pp_2_5_value}, {$en->pp_2_5_flag}, {$en->pp_2_6_a},";
            $en->pp_2_6_b=json_decode($en->pp_2_6_b);
            for($i=0;$i<3;$i++){
                if(isset($en->pp_2_6_b[$i])&& $en->pp_2_6_b[$i]!= null)
                    $export .=$en->pp_2_6_b[$i].",";
                else $export .=",";
            }
            $export .= "{$en->pp_2_7_a_value}, {$en->pp_2_7_a_flag}, {$en->pp_2_7_b}, {$en->pp_2_7_c_value}, {$en->pp_2_7_c_flag}, {$en->pp_2_8_a}, {$en->pp_2_8_b_value}, {$en->pp_2_8_b_flag}, {$en->pp_2_9_value}, {$en->pp_2_9_flag}, {$en->pp_2_10_value}, {$en->pp_2_10_flag}, {$en->pp_2_11_a}, {$en->pp_2_11_b}, {$en->pp_2_11_c}, {$en->pp_2_11_d}, {$en->pp_2_12_a}, {$en->pp_2_12_b}, {$en->pp_2_13_a}, {$en->pp_2_13_b}, {$en->pp_2_14_a_flag}, {$en->pp_2_14_a_value}, {$en->pp_2_14_b_flag}, {$en->pp_2_14_b_value}, {$en->pp_2_15_a},";
            $en->pp_2_15_b=json_decode($en->pp_2_15_b);
            for($i=0;$i<3;$i++){
                if(isset($en->pp_2_15_b[$i])&& $en->pp_2_15_b[$i]!= null)
                    $export .=$en->pp_2_15_b[$i].",";
                else $export .=",";
            }
            $en->pp_2_15_c_flag=json_decode($en->pp_2_15_c_flag);
            for($i=0;$i<3;$i++){
                if(isset($en->pp_2_15_c_flag[$i])&& $en->pp_2_15_c_flag[$i]!= null)
                    $export .=$en->pp_2_15_c_flag[$i].",";
                else $export .=",";
            }
            $en->pp_2_15_c_value=json_decode($en->pp_2_15_c_value);
            for($i=0;$i<3;$i++){
                if(isset($en->pp_2_15_c_value[$i])&& $en->pp_2_15_c_value[$i]!= null)
                    $export .=$en->pp_2_15_c_value[$i].",";
                else $export .=",";
            }
            $export .="{$en->pp_2_16_a_flag}, {$en->pp_2_16_a_value}, {$en->pp_2_16_b_flag}, {$en->pp_2_16_b_value}, {$en->pfp_3_1_a}, {$en->pfp_3_1_b},";
            $en->pfp_3_1_c=json_decode($en->pfp_3_1_c);
            for($i=0;$i<3;$i++){
                if(isset($en->pfp_3_1_c[$i])&& $en->pfp_3_1_c[$i]!= null)
                    $export .=$en->pfp_3_1_c[$i].",";
                else $export .=",";
            }
            $export .="{$en->pfp_3_1_d}, {$en->pfp_3_2_a}, {$en->pfp_3_2_b_flag}, {$en->pfp_3_2_b_value}, {$en->pfp_3_2_c},";
            $en->pfp_3_2_d=json_decode($en->pfp_3_2_d);
            for($i=0;$i<3;$i++){
                if(isset($en->pfp_3_2_d[$i])&& $en->pfp_3_2_d[$i]!= null)
                    $export .=$en->pfp_3_2_d[$i].",";
                else $export .=",";
            }
            $export .="{$en->pfp_3_2_e}, {$en->pfp_3_2_f_flag}, {$en->pfp_3_2_f_value}, {$en->pfp_3_3_a}, {$en->pfp_3_3_b},";
            $en->pfp_3_3_c=json_decode($en->pfp_3_3_c);
            for($i=0;$i<3;$i++){
                if(isset($en->pfp_3_3_c[$i])&& $en->pfp_3_3_c[$i]!= null)
                    $export .=$en->pfp_3_3_c[$i].",";
                else $export .=",";
            }
            $export .="{$en->pfp_3_3_d}, {$en->pfp_3_4_a}, {$en->pfp_3_4_b},";
            $en->pfp_3_4_c=json_decode($en->pfp_3_4_c);
            for($i=0;$i<3;$i++){
                if(isset($en->pfp_3_4_c[$i])&& $en->pfp_3_4_c[$i]!= null)
                    $export .=$en->pfp_3_4_c[$i].",";
                else $export .=",";
            }
            $export .="{$en->pm_4_1_a}, {$en->pm_4_1_b}, {$en->pm_4_2_a}, {$en->pm_4_2_b}, {$en->pm_4_2_c}, {$en->pm_4_2_d}, {$en->pm_4_3_a}, {$en->pm_4_3_b}, {$en->pm_4_4_a}, {$en->pm_4_4_b}, {$en->pm_4_4_c}, {$en->pm_4_4_d}, {$en->pm_4_4_e}, {$en->pm_4_4_f}, {$en->pm_4_4_g}, {$en->pm_4_4_h}, {$en->pm_4_4_i}, {$en->pm_4_4_j}, {$en->pm_4_5_a}, {$en->pm_4_5_b}, {$en->pm_4_5_c}, {$en->pm_4_5_d}, {$en->pm_4_5_e}, {$en->pm_4_5_f}, {$en->pm_4_5_g}, {$en->pm_4_5_h}, {$en->pm_4_5_i}, {$en->pm_4_5_j}, {$en->pm_4_6_a}, {$en->pm_4_6_b}, {$en->pm_4_6_c}, {$en->pm_4_6_d}, {$en->pm_4_6_e}, {$en->pm_4_6_f}, {$en->pm_4_6_g}, {$en->pm_4_6_h}, {$en->pm_4_6_i}, {$en->pm_4_6_j}, {$en->pm_4_7_a}, {$en->pm_4_7_b}, {$en->pm_4_7_c}, {$en->pm_4_7_d}, {$en->pm_4_7_e}, {$en->pm_4_7_f}, {$en->pm_4_7_g}, {$en->pm_4_7_h}, {$en->pm_4_7_i}, {$en->pm_4_7_j}, {$en->i_5_1_a}, {$en->i_5_1_b}, {$en->i_5_1_c}, {$en->i_5_1_d}, {$en->i_5_2_a_value}, {$en->i_5_2_a_flag}, {$en->i_5_3_a}, {$en->i_5_3_b}, {$en->i_5_3_c_value}, {$en->i_5_3_c_flag}, {$en->i_5_4_a_flag}, {$en->i_5_4_a_value},";
            $en->i_5_4_b=json_decode($en->i_5_4_b);
            for($i=0;$i<3;$i++){
                if(isset($en->i_5_4_b[$i])&& $en->i_5_4_b[$i]!= null)
                    $export .=$en->i_5_4_b[$i].",";
                else $export .=",";
            }
            $en->i_5_4_c=json_decode($en->i_5_4_c);
            for($i=0;$i<3;$i++){
                if(isset($en->i_5_4_c[$i])&& $en->i_5_4_c[$i]!= null)
                    $export .=$en->i_5_4_c[$i].",";
                else $export .=",";
            }
            $en->i_5_4_d=json_decode($en->i_5_4_d);
            for($i=0;$i<3;$i++){
                if(isset($en->i_5_4_d[$i])&& $en->i_5_4_d[$i]!= null)
                    $export .=$en->i_5_4_d[$i].",";
                else $export .=",";
            }
            $en->i_5_5_a_value=json_decode($en->i_5_5_a_value);
            for($i=0;$i<3;$i++){
                if(isset($en->i_5_5_a_value[$i])&& $en->i_5_5_a_value[$i]!= null)
                    $export .=$en->i_5_5_a_value[$i].",";
                else $export .=",";
            }
            $en->i_5_5_a_flag=json_decode($en->i_5_5_a_flag);
            for($i=0;$i<3;$i++){
                if(isset($en->i_5_5_a_flag[$i])&& $en->i_5_5_a_flag[$i]!= null)
                    $export .=$en->i_5_5_a_flag[$i].",";
                else $export .=",";
            }
            $en->i_5_5_b=json_decode($en->i_5_5_b);
            for($i=0;$i<3;$i++){
                if(isset($en->i_5_5_b[$i])&& $en->i_5_5_b[$i]!= null)
                    $export .=$en->i_5_5_b[$i].",";
                else $export .=",";
            }
            $en->i_5_6_a=json_decode($en->i_5_6_a);
            for($i=0;$i<3;$i++){
                if(isset($en->i_5_6_a[$i])&& $en->i_5_6_a[$i]!= null)
                    $export .=$en->i_5_6_a[$i].",";
                else $export .=",";
            }
            $en->i_5_6_b=json_decode($en->i_5_6_b);
            for($i=0;$i<3;$i++){
                if(isset($en->i_5_6_b[$i])&& $en->i_5_6_b[$i]!= null)
                    $export .=$en->i_5_6_b[$i].",";
                else $export .=",";
            }
            $en->i_5_6_c_value=json_decode($en->i_5_6_c_value);
            for($i=0;$i<3;$i++){
                if(isset($en->i_5_6_c_value[$i])&& $en->i_5_6_c_value[$i]!= null)
                    $export .=$en->i_5_6_c_value[$i].",";
                else $export .=",";
            }
            $en->i_5_6_c_flag=json_decode($en->i_5_6_c_flag);
            for($i=0;$i<3;$i++){
                if(isset($en->i_5_6_c_flag[$i])&& $en->i_5_6_c_flag[$i]!= null)
                    $export .=$en->i_5_6_c_flag[$i].",";
                else $export .=",";
            }
            $export .="{$en->d_6_1}, {$en->d_6_2_value}, {$en->d_6_2_flag}, {$en->d_6_3_value}, {$en->d_6_3_flag}, {$en->d_6_4}, {$en->d_6_5_a_value}, {$en->d_6_5_a_flag}, {$en->d_6_5_b_value}, {$en->d_6_5_b_flag}, {$en->d_6_5_c_value}, {$en->d_6_5_c_flag}, {$en->no_of_call},";


            if($en->status==1 && $en->poultry_id!= null)
                $export .="1,";
            else if($en->status==2 && $en->poultry_id != null )
                $export .="1,";
            else if($en->status==-1)
                $export .="-1,";
            else if($en->status==3 && $en->poultry_id != null )
                $export .="1,";
            else if($en->status==3 && $en->poultry_id == null )
                $export .="3,";
            else if($en->status!=1 && $en->poultry_id== null && $en->no_of_call>=4)
                $export .="3,";
            else if($en->status==1 && $en->poultry_id== null && $en->no_of_call<4)
                $export .="4,";
            else if($en->status==1 && $en->poultry_id== null && $en->no_of_call==4)
                $export .="3,";
            else if($en->status==2 && $en->poultry_id == null )
                $export .="2,";
            else $export .=",";

            if($en->status==2 && $en->poultry_id!= null && $en->call_status==0 && $en->no_of_call<4)
                $export .="0,";
            else if($en->status==1 && $en->poultry_id!= null && $en->call_status==1)
                $export .="1,";
            else if($en->status==1 && $en->sc_0_1==1 && $en->poultry_id!= null && $en->call_status==2)
                $export .="2,";
            else if($en->status==1 && $en->poultry_id!= null && $en->call_status==2)
                $export .="2,";
            else if($en->status==1 && $en->poultry_id!= null && $en->call_status==3)
                $export .="3,";
            else if($en->status==2 && $en->poultry_id!= null &&$en->no_of_call>=4)
                $export .="4,";
            else if($en->status==3 && $en->poultry_id!= null)
                $export .="4,";
            else $export .=",";

            $export .="{$en->user_id}, {$en->created_at}, {$en->updated_at}\n";
//            }
        endforeach;

        $headers = [
            'Content-type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="export_poultry_'.\Auth::User()->id.'_'.time().'.csv"',
        ];
        echo "\xEF\xBB\xBF";
        return Response::make($export, 200, $headers);

    }
    function checkrole(){

    }

    public function genderCount($mobile,$gender){
            $poultry = Poultry::select(DB::raw('poultries.*'), DB::raw('poultry_questions.id as question_id'))
                ->leftJoin('poultry_questions', function ($query) {
                    $query->on('poultries.id', 'poultry_questions.poultry_id');
                    $query->where('poultry_questions.deleted_at', null);
                });
            if($mobile=='017'|$mobile=='013')
                $poultry = $poultry->where(function($q){
                            $q->where('poultries.mobile_no', "like", "017%")
                                ->orWhere('poultries.mobile_no', "like", "013%");
                        });
            else if($mobile=='018'| $mobile=='016')
                $poultry = $poultry->where(function($q){
                    $q->where('poultries.mobile_no', "like", "016%")
                        ->orWhere('poultries.mobile_no', "like", "018%");
                });
            else if($mobile=='019' | $mobile=='014')
                $poultry = $poultry->where(function($q){
                    $q->where('poultries.mobile_no', "like", "019%")
                        ->orWhere('poultries.mobile_no', "like", "014%");
                });
            else if($mobile=='015')
                $poultry = $poultry->where('poultries.mobile_no', "like", "015%");

            $poultry = $poultry->where('poultries.status', 1)
                ->where('poultry_questions.gi_1_1',$gender)
                ->where('poultry_questions.call_status', 1)
                ->count();
         return $poultry;
    }

}
