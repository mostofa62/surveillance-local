<?php

namespace App\Http\Controllers;

use App\Common;
use App\Project;
use App\Schedule;
use App\User;
use App\Question;
use App\DomesticAnimal;
use Illuminate\Http\Request;
use App\Encephality;
use DB;
use Mail;
use App\Http\Requests;
use App\Http\Controllers\Controller;
//use Response;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class EncephalitisController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function index(Request $request)
    {

        $this->checkrole();

        $encephalitis = Encephality::orderBy('id', 'asc');
        $pagetitle="Encephalitis Lists";
        if(session('user')->project_id!=2)
            return redirect(session('access').'dashboard')->send();
        else if(!in_array(3,session('accesslist_id')))
            $encephalitis=$encephalitis->where('user_id',session('user')->id);

        if ($request->s_name) {
            $encephalitis = $encephalitis->where('name', 'like', '%' . $request->s_name . '%');
            $pagetitle= "Encephalitis Search Results";
        }
        if ($request->s_life_status) {
            $encephalitis = $encephalitis->where('life_status', 'like', '%' . $request->s_life_status . '%');
            $pagetitle= "Encephalitis Search Results";
        }
        if ($request->s_mobile_no) {
            $encephalitis =$encephalitis->where('mobile_no', 'like', '%' . $request->s_mobile_no . '%');
            $pagetitle= "Encephalitis Search Results";
        }
        if ($request->s_sex) {
            $encephalitis =$encephalitis->where('sex', 'like', '%' . $request->s_sex . '%');
            $pagetitle= "Encephalitis Search Results";
        }
        if ($request->s_surveillance_id) {
            $encephalitis =$encephalitis->where('surveillance_id', 'like', '%' . $request->s_surveillance_id . '%');
            $pagetitle= "Encephalitis Search Results";
        }

        $encephalitis=$encephalitis->paginate(20);


        view()->share('pageTitle', $pagetitle);
        view()->share('encephalitiss', $encephalitis);
        view()->share('breadcamps', array('Home' => url(session('access').'dashboard'), 'Encephalitis' => url(session('access').'encephalitis')));
        return view(session('access').'encephalitis/index');
    }

    public function create()
    {
        $this->checkrole();
        view()->share('pageTitle', "Encephalitis Create");
        view()->share('breadcamps', array('Home' => url(session('access').'dashboard'), 'Encephalitis' => url(session('access').'encephalitis'), 'Add Encephalitis' => url(session('access').'encephalitis/create')));
        return view(session('access').'encephalitis/create');
    }
    public function store(Request $request)
    {
        $this->checkrole();
        $this->validate($request, [
            'date' => 'required',
            'name' => 'required',
            'mobile_no' => 'required|numeric|unique:encephalities',
            'guardian_name' => 'required',
            'age' => 'required',
            'sex' => 'required',
            'date_of_onset' => 'required',
            'life_status' => 'required',
            'address' => 'required',
            'surveillance_id' => 'required',
        ]);

        $encephalitis = new Encephality();
        $encephalitis->surveillance_id = $request->get('surveillance_id');
        $encephalitis->date = $request->get('date');
        $encephalitis->name = $request->get('name');
        $encephalitis->age = $request->get('age');
        $encephalitis->sex = $request->get('sex');
        $encephalitis->mobile_no = $request->get('mobile_no');
        $encephalitis->date_of_onset = date("Y-m-d", strtotime($request->get('date_of_onset')));
        $encephalitis->life_status = $request->get('life_status');
        $encephalitis->address = $request->get('address');
        $encephalitis->guardian_name = $request->get('guardian_name');

        $encephalitis->user_id = \Auth::User()->id;
        $encephalitis->site_id = \Auth::User()->site_id;

        $encephalitis->save();

        return redirect(session('access').'encephalitis')->with('message', 'সফলভাবে সংরক্ষিত');
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
        view()->share('pageTitle', "Encephalitis Details");
        view()->share('breadcamps', array('Home' => url(session('access') . 'dashboard'), 'Encephalitis' => url(session('access') . 'encephalitis'), 'Encephalitis Details' => url(session('access') . 'encephalitis/' . $id)));


        $encephalitis = Encephality::find($id);
        if(session('user')->project_id!=2)
            return redirect(session('access').'dashboard')->send();
        else if(!in_array(3,session('accesslist_id'))) {
            if (session('user')->id == $encephalitis->user_id) {
                view()->share('info', $encephalitis);
                return view(session('access') . 'encephalitis/detail');
            }
        }else{
            view()->share('info', $encephalitis);
            return view(session('access') . 'encephalitis/detail');
        }

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
     
        view()->share('pageTitle', "Encephalitis Update");
        view()->share('breadcamps', array('Home' => url(session('access').'dashboard'), 'Encephalitis' => url(session('access').'encephalitis'), 'Update Encephalitis' => url(session('access').'encephalitis/' . $id . '/edit')));

        $encephalitis = Encephality::find($id);
        if(session('user')->project_id!=2)
            return redirect(session('access').'dashboard')->send();
        else if(!in_array(3,session('accesslist_id'))) {
            if (session('user')->id == $encephalitis->user_id) {
                view()->share('encephalitis', $encephalitis);
                return view(session('access') . 'encephalitis/create');
            }
        }else{
            view()->share('encephalitis', $encephalitis);
            return view(session('access') . 'encephalitis/create');
        }
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
            'date' => 'required',
            'name' => 'required',
            'mobile_no' => 'required|numeric',
            'guardian_name' => 'required',
            'age' => 'required',
            'sex' => 'required',
            'date_of_onset' => 'required',
            'life_status' => 'required',
            'address' => 'required',
            'surveillance_id' => 'required',
        ]);

        $encephalitis = Encephality::find($id);

        $encephalitis->surveillance_id = $request->get('surveillance_id');
        $encephalitis->date = $request->get('date');
        $encephalitis->name = $request->get('name');
        $encephalitis->age = $request->get('age');
        $encephalitis->sex = $request->get('sex');
        $encephalitis->mobile_no = $request->get('mobile_no');
        $encephalitis->date_of_onset = date("Y-m-d", strtotime($request->get('date_of_onset')));
        $encephalitis->life_status = $request->get('life_status');
        $encephalitis->address = $request->get('address');
        $encephalitis->guardian_name = $request->get('guardian_name');

        $encephalitis->save();

//        return redirect(session('access').'encephalitis')->with('message', 'সফলভাবে সংরক্ষিত');
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
        $encephalitis = Encephality::find($id);
        if(session('user')->project_id!=2)
            return redirect(session('access').'dashboard')->send();
        else if(!in_array(3,session('accesslist_id'))) {
            if (session('user')->id == $encephalitis->user_id) {
                $encephalitis->delete();
            }
        }else{
            $encephalitis->delete();
        }
    }


    public function callInitiate()
    {
        $this->checkrole();

        view()->share('pageTitle', "Call Initiate Form");
        view()->share('breadcamps', array('Home' => url(session('access').'dashboard'), 'Encephalitis' => url(session('access').'encephalitis'), "Call Initiate Form" => url(session('access').'encephalitis/callInitiate')));
        $user_id=\Auth::User()->id;
        $encephalitis = Encephality::Where('interview_id',$user_id)
            ->Where('encephalities.status',-1)
            ->first();
        if(!isset($encephalitis)) {
            $encephalitis = Encephality::select(DB::raw('encephalities.*'), DB::raw('questions.id as question_id'), DB::raw('sc.schedule_date'))
                ->leftJoin('questions', function ($query) {
                    $query->on('encephalities.id', 'questions.encephality_id');
                    $query->where('questions.deleted_at', null);
                })
                ->leftJoin('schedules as sc', function ($query) use ($user_id) {
                    $query->on('encephalities.id', 'sc.encephality_id');
                    $query->where('sc.schedule_date', '<=', date('Y-m-d H:i:s'));
//                $query->orWhere('sc.user_id',$user_id)->where('sc.schedule_date',null);
                    $query->where('sc.deleted_at', null);
                })
                ->where('encephalities.status', '<>', 1)->Where('encephalities.status', '<>', -1)
//            ->orderByRaw("case when scc.schedule_date = NULL and scc.user_id = NULL  then scc.created_at when sc.schedule_date <> NULL then sc.schedule_date end asc")
                ->orderBy('schedule_date', 'desc')->orderBy('status', 'asc')->orderBy('id', 'asc')
                // ->orderByRaw("case when scc.schedule_date = NULL then scc.created_at when sc.schedule_date <> NULL then sc.schedule_date end asc")
                ->first();
        }
        if (isset($encephalitis)){
                if($encephalitis->status!=-1)
                    $encephalitis->no_of_call+=1;
                $encephalitis->interview_id=$user_id;
                $encephalitis->status=-1;
                $encephalitis->save();
        }else
            return redirect(session('access').'encephalitis')->with('message', 'সফলভাবে সংরক্ষিত');

        view()->share('info', $encephalitis);
        return view(session('access').'encephalitis/callInitiate');
    }
    public function callSchedule()
    {
        if(isset($_POST['schedule_id'])){
            $schedule = Schedule::find($_POST['schedule_id']);
            $schedule->schedule_date=date('Y-m-d', strtotime($_POST['date']))." ".date("H:i:s", strtotime($_POST['time']));
            $schedule->call_state=$_POST['call_state'];
            $schedule->user_id = \Auth::User()->id;
            $schedule->save();

            $encephalitis = Encephality::find($schedule->encephality_id);
            if($_POST['call_state']==4)
                $encephalitis->status=1;
            else $encephalitis->status=2;
            $encephalitis->save();

            return redirect(session('access').'encephalitis/callInitiate')->with('message', 'সফলভাবে সংরক্ষিত');
        }else if(isset($_POST['rel'])){
            $schedule = Schedule::where('encephality_id',$_POST['id'])->first();
            if(isset($schedule)) {
                $schedule->delete();
            }

            $encephalitis = Encephality::find($_POST['id']);
            $encephalitis->status=0;
            $encephalitis->save();
            return $schedule->id;
        }else if(isset($_POST['mobile_no'])){
            Schedule::where('encephality_id',$_POST['id'])->where('schedule_date','<>',null)->delete();
            $schedule = Schedule::where('encephality_id',$_POST['id'])->where('schedule_date',null)->where('call_state',0)->where('mobile_no',$_POST['mobile_no'])->first();
            if(!isset($schedule)) {
                $schedule = new Schedule();
            }
            $schedule->mobile_no=$_POST['mobile_no'];
            $schedule->surveillance_id=$_POST['surveillance_id'];
            $schedule->encephality_id=$_POST['id'];
            $schedule->user_id = \Auth::User()->id;
            $schedule->save();

            return $schedule->id;
        }else{
            return redirect(session('access').'encephalitis/callInitiate')->with('message', 'সফলভাবে সংরক্ষিত');
        }
    }
    public function callQuestion($id,Request $request){
        $this->checkrole();

        if($_POST) {


            $encephalitis = Encephality::find($id);

//            $encephalitis->name = $request->get('name');
//            $encephalitis->age = $request->get('age');
//            $encephalitis->sex = $request->get('sex');
//            $encephalitis->mobile_no = $request->get('mobile_no');
//            $encephalitis->date_of_onset = date("Y-m-d", strtotime($request->get('date_of_onset')));
            $encephalitis->hospital_period = $request->get('hospital_period');
            $encephalitis->life_status = $request->get('life_status');
//            $encephalitis->address = $request->get('address');
//            $encephalitis->guardian_name = $request->get('guardian_name');

            if($request->get('health_condition_status') && $request->get('health_condition_status')!=null)
                $encephalitis->health_condition_status = json_encode($request->get('health_condition_status'));

            if($request->get('health_condition_status_others') && $request->get('health_condition_status_others')!=null)
                $encephalitis->health_condition_status_others =json_encode($request->get('health_condition_status_others'));
            $encephalitis->death_period =$request->get('death_period');
            $encephalitis->this_disease =$request->get('this_disease');
            $encephalitis->death_text =$request->get('death_text');

            if($request->get('call_status')==0)
                $encephalitis->status=0;
            else $encephalitis->status=1;
            $encephalitis->save();

            $question=Question::where('encephality_id',$id)->first();
            if(!isset($question))
                $question = new Question();
            $question->surveillance_id = $encephalitis->surveillance_id;
            $question->encephality_id = $id;

            $question->identity = $request->get('identity');
            $question->provider_name = $request->get('provider_name');
            $question->relation_with_patient = $request->get('relation_with_patient');
            $question->provider_age = $request->get('provider_age');
            $question->religion = $request->get('religion');
            $question->religion_text = $request->get('religion_text');
            $question->is_ethnic = $request->get('is_ethnic');
            $question->ethnic_type = $request->get('ethnic_type');
            $question->ethnic_type_text = $request->get('ethnic_type_text');
            $question->educational_background = $request->get('educational_background');
            $question->educational_background_text = $request->get('educational_background_text');
            $question->profession = $request->get('profession');
            $question->profession_text = $request->get('profession_text');
            $question->father_profession = $request->get('father_profession');
            $question->father_profession_text = $request->get('father_profession_text');
            if($request->get('family_expense')=="")
                $question->family_expense = 0;
            else $question->family_expense = $request->get('family_expense');
            if($request->get('expenditure_type')=="")
                $question->expenditure_type = null;
            else $question->expenditure_type = $request->get('expenditure_type');

            if($request->get('male_member')=="")
                $question->male_member = 0;
            else $question->male_member = $request->get('male_member');

            if($request->get('female_member')=="")$question->female_member = 0;else $question->female_member = $request->get('female_member');

            $question->fifteendays_live = $request->get('fifteendays_live');
            $question->otherplacetolive = $request->get('otherplacetolive');
            if($request->get('is_paddy')=="")$question->is_paddy = 0;else $question->is_paddy = $request->get('is_paddy');
            if($request->get('is_jute')=="")$question->is_jute = 0;else $question->is_jute = $request->get('is_jute');
            if($request->get('is_wheat')=="")$question->is_wheat = 0;else $question->is_wheat = $request->get('is_wheat');
            if($request->get('is_root')=="")$question->is_root = 0;else $question->is_root = $request->get('is_root');
            $question->farming_name = $request->get('farming_name');

            if($request->get('is_paddy_working')=="")$question->is_paddy_working = 0;else $question->is_paddy_working = $request->get('is_paddy_working');
            if($request->get('is_jute_working')=="")$question->is_jute_working = 0;else $question->is_jute_working = $request->get('is_jute_working');
            if($request->get('is_wheat_working')=="")$question->is_wheat_working = 0;else $question->is_wheat_working = $request->get('is_wheat_working');
            if($request->get('is_root_working')=="")$question->is_root_working = 0;else $question->is_root_working = $request->get('is_root_working');
            $question->farming_name_working = $request->get('farming_name_working');

            if($request->get('is_pond')=="")$question->is_pond = 0;else $question->is_pond = $request->get('is_pond');
            if($request->get('is_well')=="")$question->is_well = 0;else $question->is_well = $request->get('is_well');
            if($request->get('is_fen')=="")$question->is_fen = 0;else $question->is_fen = $request->get('is_fen');
            if($request->get('is_drain')=="")$question->is_drain = 0;else $question->is_drain = $request->get('is_drain');

            $question->reservoir_name = $request->get('reservoir_name');

            $question->outward_house = $request->get('outward_house');
            $question->outward_house_type = $request->get('outward_house_type');
            $question->outward_house_reason = $request->get('outward_house_reason');
            if($request->get('mosquito_net')=="")$question->mosquito_net = 0;else $question->mosquito_net = $request->get('mosquito_net');

            if($request->get('is_egret')=="")$question->is_egret = 0;else $question->is_egret = $request->get('is_egret');
            if($request->get('is_juicy')=="")$question->is_juicy = 0;else $question->is_juicy = $request->get('is_juicy');
            if($request->get('is_others_bird')=="")$question->is_others_bird = 0;else $question->is_others_bird = $request->get('is_others_bird');

            $question->others_bird = $request->get('others_bird');

            if($request->get('is_domestic_animal_husbandry')=="")$question->is_domestic_animal_husbandry = 0;else $question->is_domestic_animal_husbandry = $request->get('is_domestic_animal_husbandry');
            $question->name_of_animal = $request->get('name_of_animal');

            $question->visting_type = $request->get('visting_type');
            $question->district = $request->get('district');
            $question->upazila = $request->get('upazila');

            if($request->get('floor_type')=="")$question->floor_type = 99;else $question->floor_type = $request->get('floor_type');
            $question->floor_name = $request->get('floor_name');
            if($request->get('wall_type')=="")$question->wall_type = 99;else $question->wall_type = $request->get('wall_type');
            $question->wall_name = $request->get('wall_name');
            if($request->get('ceiling_type')=="")$question->ceiling_type = 99;else $question->ceiling_type = $request->get('ceiling_type');
            $question->ceiling_name = $request->get('ceiling_name');

            if($request->get('bedroom')=="")$question->bedroom = 0;else $question->bedroom = $request->get('bedroom');

            if($request->get('is_kitchen')=="")$question->is_kitchen = 0;else $question->is_kitchen = $request->get('is_kitchen');
            $question->kitchen_distance = $request->get('kitchen_distance');
            if($request->get('is_cowhouse')=="")$question->is_cowhouse = 0;else $question->is_cowhouse = $request->get('is_cowhouse');
            $question->cowhouse_distance = $request->get('cowhouse_distance');
            if($request->get('is_toilet')=="")$question->is_toilet = 0;else $question->is_toilet = $request->get('is_toilet');
            $question->toilet_distance = $request->get('toilet_distance');
            if($request->get('is_water_supply')=="")$question->is_water_supply = 0;else $question->is_water_supply = $request->get('is_water_supply');
            $question->water_supply_distance = $request->get('water_supply_distance');

            if($request->get('is_window_mosquito_net')=="")$question->is_window_mosquito_net = 0;else $question->is_window_mosquito_net = $request->get('is_window_mosquito_net');
            $question->user_id = \Auth::User()->id;
            $question->call_status=$_POST['call_status'];
            $question->save();

            DomesticAnimal::where('question_id',$question->id)->forceDelete();
            foreach ($request->get('home_name_of_animal') as $key=>$value):
                if($request->get('home_name_of_animal')[$key]!="") {
                    $home_animals = new DomesticAnimal();
                    $home_animals->surveillance_id = $encephalitis->surveillance_id;
                    $home_animals->encephality_id = $id;
                    $home_animals->question_id = $question->id;
                    $home_animals->name_of_animal = $request->get('home_name_of_animal')[$key];
                    $home_animals->is_neighbour = $request->get('is_home_no_of_animal')[$key];
                    $home_animals->no_of_animal = $request->get('home_no_of_animal')[$key];
                    $home_animals->on_of_animal_home = $request->get('home_on_of_animal_home')[$key];
                    $home_animals->on_of_animal_outside = $request->get('home_on_of_animal_outside')[$key];
                    $home_animals->animal_husbandry_type = 0;
                    $home_animals->user_id = \Auth::User()->id;
                    $home_animals->save();
                }
            endforeach;

            foreach ($request->get('neighbour_name_of_animal') as $key=>$value):
                if($value!=null) {
                    $neighbour_animals = new DomesticAnimal();
                    $neighbour_animals->surveillance_id = $encephalitis->surveillance_id;
                    $neighbour_animals->encephality_id = $id;
                    $neighbour_animals->question_id = $question->id;
                    $neighbour_animals->name_of_animal = $request->get('neighbour_name_of_animal')[$key];
                    $neighbour_animals->is_neighbour = $request->get('is_neighbour')[$key];
                    $neighbour_animals->animal_husbandry_type = 2;
                    $neighbour_animals->user_id = \Auth::User()->id;
                    $neighbour_animals->save();
                }
            endforeach;
            $schedule = Schedule::where('encephality_id',$id)->where('schedule_date',null)->where('call_state',0)->where('mobile_no', $encephalitis->mobile_no)->first();
            if (isset($schedule)) {
                if ($request->get('call_status') == 0) {
                    $schedule->schedule_date = date('Y-m-d', strtotime($request->get('date'))) . " " . date("H:i:s", strtotime($request->get('time')));
                    $schedule->user_id = \Auth::User()->id;
                }
                $schedule->call_state = $request->get('call_status');
                $schedule->save();
                if ($request->get('call_status') != 0) {
                    Schedule::where('encephality_id',$id)->where('schedule_date', '<>', null)->delete();
                }
            }
            return array(
                'success'=>true,
                'message'=>'সফলভাবে সংরক্ষিত'
            );
            //return redirect(session('access').'encephalitis/callInitiate')->with('message', 'সফলভাবে সংরক্ষিত');

        }else{
            if(session('user')->project_id!=2)
                return redirect(session('access').'dashboard')->send();
            else {
                $encephalitis = Encephality::find($id);
                if ($encephalitis->status == 1) {
                    return redirect(session('access') . 'encephalitis/callInitiate')->with('message', 'ইতিমধ্যে সফলভাবে সংরক্ষিত');
                }
                view()->share('pageTitle', "Encephalitis Question Form");
                view()->share('breadcamps', array('Home' => url(session('access') . 'dashboard'), 'Encephalitis' => url(session('access') . 'encephalitis'), "Call Initiate Form" => url(session('access') . 'encephalitis/callInitiate'), "Question Form" => url(session('access') . 'encephalitis/question/' . $id)));
                view()->share('id', $id);
                view()->share('question', Question::where('encephality_id', $id)->first());
                view()->share('encephalitis', $encephalitis);
                return view(session('access') . 'encephalitis/question');
            }
        }
    }

    public function questionView($id){
        if(session('user')->project_id!=2)
            return redirect(session('access').'dashboard')->send();
        else {
            $encephalitis = Encephality::find($id);
            view()->share('pageTitle', "Encephalitis Question Form");
            view()->share('breadcamps', array('Home' => url(session('access') . 'dashboard'), 'Encephalitis' => url(session('access') . 'encephalitis'), "Call Initiate Form" => url(session('access') . 'encephalitis/callInitiate'), "Question Form" => url(session('access') . 'encephalitis/question/' . $id)));
            view()->share('id', $id);
            view()->share('question', Question::where('encephality_id', $id)->first());
            view()->share('encephalitis', $encephalitis);
            return view(session('access') . 'encephalitis/question-view');
        }
    }
    public function export(Request $request){
        if(session('user')->project_id!=2)
            return redirect(session('access').'dashboard')->send();
        else {
            $encephalitis = Encephality::select(DB::raw('encephalities.*'), DB::raw('questions.*'))
                ->leftJoin('questions', function ($query) {
                    $query->on('encephalities.id', 'questions.encephality_id');
                    $query->where('questions.deleted_at', null);
                });

            if(!in_array(3,session('accesslist_id')))
                $encephalitis=$encephalitis->where('user_id',session('user')->id);
            if ($request->s_name) {
                $encephalitis = $encephalitis->where('encephalities.name', 'like', '%' . $request->s_name . '%');
            }
            if ($request->s_life_status) {
                $encephalitis = $encephalitis->where('encephalities.life_status', 'like', '%' . $request->s_life_status . '%');
            }
            if ($request->s_mobile_no) {
                $encephalitis =$encephalitis->where('encephalities.mobile_no', 'like', '%' . $request->s_mobile_no . '%');
            }
            if ($request->s_sex) {
                $encephalitis =$encephalitis->where('encephalities.sex', 'like', '%' . $request->s_sex . '%');
            }
            if ($request->s_surveillance_id) {
                $encephalitis =$encephalitis->where('encephalities.surveillance_id', 'like', '%' . $request->s_surveillance_id . '%');
            }

            $encephalitis=$encephalitis->where('encephalities.status', 1)->orderBy('encephalities.id', 'asc')->get();
//        echo "<pre>";
//        print_r($encephalitis[0]);die;
            $getPatient = Common::getPatientCondition();
            $getanimal = Common::getDomesticAnimal();
            $export = "Sl_No, 10_Surveillance_ID, 1_Date, 2_Mobile_No, 3_Name, 4_Guardian_Name, 5_Age, 6_Sex, 7_Date_of_Onset, 9_Address, Hospital_Duration, 8_Life_Status, Days_of_Death, Same_Disease, Reason_of_Death, health_condition_status_1, health_condition_status_2, health_condition_status_3, health_condition_status_4, health_condition_status_5, health_condition_status_6, health_condition_status_7, health_condition_status_8, health_condition_status_9, health_condition_status_10, health_condition_status_11, health_condition_status_12, 11, 12, 13, 14, 15_flag, 15_other, 16_flag, 16_a_flag, 16_a_value, 17_flag, 17_other, 18_flag, 18_other, 19_flag, 19_other, 20_flag, 20_value, 21_male, 21_female,22_flag, 22_other, 23_paddy, 23_jute, 23_wheat, 23_root, 23_other, 24_paddy, 24_jute, 24_wheat, 24_root, 24_other, 25_pond, 25_well, 25_fen, 25_drain, 25_other, 26, 26_a_flag, 26_a_other, 27, 28_egret, 28_juicy, 28_others_bird, 28_other_bird_value, ";
            foreach ($getanimal as $value):
                $value = str_replace('/', '_', $value);
                $export .= "29_{$value}_flag, 29_{$value}_number, 29_{$value}_is_nome, 29_{$value}_is_outside, ";
            endforeach;
            $export .= "29_other_name, 29_other_flag, 29_other_number, 29_other_is_home, 29_other_is_outside, 30_flag, 30_value, ";
            foreach ($getanimal as $value):
                $value = str_replace('/', '_', $value);
                $export .= "31_{$value}, ";
            endforeach;
            $export .= "31_other_name, 31_other_value, 32_flag, 32_zila, 32_upozila, 33_floor, 33_floor_other, 33_wall, 33_wall_other, 33_ceiling, 33_ceiling_other, 34, 35_kitchen_flag, 35_kitchen_value, 35_cowhouse_flag, 35_cowhouse_value, 35_toilet_flag, 35_toilet_value, 35_water_flag, 35_water_value, 36, call_status \n";

            foreach ($encephalitis as $en):
                $export .= "{$en->id}, {$en->surveillance_id}, {$en->date}, {$en->mobile_no}, {$en->name}, {$en->guardian_name}, {$en->age}, {$en->sex}, {$en->date_of_onset}, {$en->address}, {$en->hospital_period}, {$en->life_status}, {$en->death_period}, {$en->this_disease}, {$en->death_text}, ";
                if ($en->health_condition_status != null)
                    $health_condition_status = json_decode($en->health_condition_status);
                else $health_condition_status = array();
                if ($en->health_condition_status != null)
                    $health_condition_status_others = json_decode($en->health_condition_status_others);
                else $health_condition_status_others = array();
                in_array($getPatient[88], $health_condition_status) ? $export .= "{$getPatient[88]}, " : $export .= ", ";
                in_array($getPatient[99], $health_condition_status) ? $export .= "{$getPatient[99]}, " : $export .= ", ";
                in_array($getPatient[1], $health_condition_status) ? $export .= "{$getPatient[1]}, " : $export .= ", ";
                in_array($getPatient[2], $health_condition_status) ? $export .= "{$getPatient[2]}, " : $export .= ", ";
                in_array($getPatient[3], $health_condition_status) ? $export .= "{$getPatient[3]}, " : $export .= ", ";
                in_array($getPatient[4], $health_condition_status) ? $export .= "{$getPatient[4]}, " : $export .= ", ";
                in_array($getPatient[5], $health_condition_status) ? $export .= "{$getPatient[5]}, " : $export .= ", ";

                for ($i = 0; $i < 5; $i++) {
                    if (isset($health_condition_status_others[$i])) {
                        $export .= "{$health_condition_status_others[$i]}, ";
                    } else $export .= ", ";
                }
                $export .= "{$en->identity}, {$en->provider_name}, {$en->relation_with_patient}, {$en->provider_age}, {$en->religion}, {$en->religion_text}, {$en->is_ethnic}, {$en->ethnic_type}, {$en->ethnic_type_text}, {$en->educational_background}, {$en->educational_background_text}, {$en->profession}, {$en->profession_text}, {$en->father_profession}, {$en->father_profession_text}, {$en->expenditure_type}, {$en->family_expense}, {$en->male_member}, {$en->female_member}, {$en->fifteendays_live}, {$en->otherplacetolive}, {$en->is_paddy}, {$en->is_jute}, {$en->is_wheat}, {$en->is_root}, {$en->farming_name}, {$en->is_paddy_working}, {$en->is_jute_working}, {$en->is_wheat_working}, {$en->is_root_working}, {$en->farming_name_working}, {$en->is_pond}, {$en->is_well}, {$en->is_fen}, {$en->is_drain}, {$en->reservoir_name}, {$en->outward_house}, {$en->outward_house_type}, {$en->outward_house_reason}, {$en->mosquito_net}, {$en->is_egret}, {$en->is_juicy}, {$en->is_others_bird}, {$en->others_bird}, ";
                $i = 0;
                foreach (DomesticAnimal::where('encephality_id', $en->id)->where('animal_husbandry_type', 0)->get() as $key => $domestic):
                    if ($i == 11) {
                        $i++;
                        $export .= "{$domestic->name_of_animal}, {$domestic->is_neighbour}, {$domestic->home_no_of_animal}, {$domestic->home_on_of_animal_home}, {$domestic->home_on_of_animal_outside}, ";
                    } else if ($i < 11) {
                        $i++;
                        $export .= "{$domestic->is_neighbour}, {$domestic->home_no_of_animal}, {$domestic->home_on_of_animal_home}, {$domestic->home_on_of_animal_outside}, ";
                    }
                endforeach;

                if ($i == 11)
                    $export .= ", , , , , ";
                $export .= "{$en->is_domestic_animal_husbandry}, {$en->name_of_animal}, ";
                $i = 0;
                foreach (DomesticAnimal::where('animal_husbandry_type', 2)->get() as $domestic):
                    if ($i == 11) {
                        $i++;
                        $export .= "{$domestic->name_of_animal}, {$domestic->is_neighbour}, ";
                    } else if ($i < 11) {
                        $i++;
                        $export .= "{$domestic->is_neighbour}, ";
                    }
                endforeach;
                if ($i == 11)
                    $export .= ", , ";
                $export .= " {$en->visting_type}, {$en->district}, {$en->upazila}, {$en->floor_type}, {$en->floor_name}, {$en->wall_type}, {$en->wall_name}, {$en->ceiling_type}, {$en->ceiling_name}, {$en->bedroom}, {$en->is_kitchen}, {$en->kitchen_distance}, {$en->is_cowhouse}, {$en->cowhouse_distance}, {$en->is_toilet}, {$en->toilet_distance}, {$en->is_water_supply}, {$en->water_supply_distance}, {$en->is_window_mosquito_net}, {$en->call_status} \n";
            endforeach;
            //Storage::disk('public')->put('export_je_'.time().'.csv', $export);

            $headers = [
                'Content-type' => 'text/csv',
                'Content-Disposition' => 'attachment; filename="export_je_'.\Auth::User()->id.'_'.time().'.csv"',
            ];
            echo "\xEF\xBB\xBF";
            return Response::make($export, 200, $headers);
        }
    }
    function checkrole(){

    }


}
