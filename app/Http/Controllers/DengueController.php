<?php

namespace App\Http\Controllers;

use App\Common;
use App\User;
use Illuminate\Http\Request;
use App\Dengue;
use DB;
use Mail;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Response;

class DengueController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function index(Request $request)
    {

        $this->checkrole();
        $dengue = Dengue::orderBy('name', 'asc');
        if(session('user')->project_id!=3)
            return redirect(session('access').'dashboard')->send();
        else if(!in_array(3,session('accesslist_id')))
            $dengue=$dengue->where('user_id',session('user')->id);

        $pagetitle="Dengue Lists";

        if ($request->name) {
            $dengue = $dengue->where('name', 'like', '%' . $request->name . '%');
            $pagetitle= "Dengue Search Results";
        }

        if ($request->current_fever_status) {
            $dengue = $dengue->where('current_fever_status', 'like', '%' . $request->current_fever_status . '%');
            $pagetitle= "Dengue Search Results";
        }

        if ($request->mobile_no) {
            $dengue =$dengue->where('mobile_no', 'like', '%' . $request->mobile_no . '%');
            $pagetitle= "Dengue Search Results";
        }
        if ($request->sex) {
            $dengue =$dengue->where('sex', 'like', '%' . $request->sex . '%');
            $pagetitle= "Dengue Search Results";
        }

        $dengue=$dengue->paginate(20);


        view()->share('pageTitle', $pagetitle);
        view()->share('dengues', $dengue);
        view()->share('breadcamps', array('Home' => url(session('access').'dashboard'), 'Dengue' => url(session('access').'dengue')));
        return view(session('access').'dengue/index');
    }

    public function create()
    {
        $this->checkrole();
        view()->share('pageTitle', "Dengue Create");
        view()->share('breadcamps', array('Home' => url(session('access').'dashboard'), 'Dengue' => url(session('access').'dengue'), 'Add Dengue' => url(session('access').'dengue/create')));
        return view(session('access').'dengue/create');
    }


    public function store(Request $request)
    {
        $this->checkrole();
        $this->validate($request, [
            'name' => 'required',
            'age' => 'required|numeric',
            'sex' => 'required',
            'date_of_admission' => 'required',
            'current_fever_status' => 'required',
            'area' => 'required',
            'lt_ns1' => 'required',
            'lt_igm' => 'required',
            'death_flag' => 'required',
        ]);

        $dengue = new Dengue();
        if($request->get('site_id')==7777){
            $site = new Site();
            $site->name = $request->get('site_name');
            $site->short_name = $request->get('site_name');
            $site->user_id = \Auth::User()->id;
            $site->save();
            $dengue->site_id = $site->id;
        }
        else $dengue->site_id = $request->get('site_id');

        $dengue->name = $request->get('name');
        $dengue->age = $request->get('age');
        $dengue->sex = $request->get('sex');
        $dengue->mobile_no = $request->get('mobile_no');
        $dengue->date_of_admission = date("Y-m-d", strtotime($request->get('date_of_admission')));

        $dengue->current_fever_status = $request->get('current_fever_status');
        $dengue->area = $request->get('area');
        $dengue->address = $request->get('address');
        $dengue->lt_ns1 = $request->get('lt_ns1');
        $dengue->lt_igm = $request->get('lt_igm');

        $dengue->other_test = $request->get('other_test');
        $dengue->discharge_date = date("Y-m-d", strtotime($request->get('discharge_date')));
        $dengue->death_flag = $request->get('death_flag');
        $dengue->death_date =  date("Y-m-d", strtotime($request->get('death_date')));


        if($request->get('comorbidity') && $request->get('comorbidity')!=null)
            $dengue->comorbidity = json_encode($request->get('comorbidity'));

        if($request->get('comorbidity_others') && $request->get('comorbidity_others')!=null)
            $dengue->comorbidity_others =json_encode($request->get('comorbidity_others'));

        $dengue->user_id = \Auth::User()->id;

        $dengue->save();

        return redirect(session('access').'dengue/create')->with('message', 'সফলভাবে সংরক্ষিত');
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
        view()->share('pageTitle', "Dengue Details");
        view()->share('breadcamps', array('Home' => url(session('access').'dashboard'), 'Dengue' => url(session('access').'dengue'), 'Dengue Details' => url(session('access').'dengue/' . $id)));


        $dengue = Dengue::find($id);

        if(session('user')->project_id!=3)
            return redirect(session('access').'dashboard')->send();
        else if(!in_array(3,session('accesslist_id'))) {
            if (session('user')->id == $dengue->user_id) {
                view()->share('info', $dengue);
                return view(session('access').'dengue/detail');
            }
        }else{
            view()->share('info', $dengue);
            return view(session('access').'dengue/detail');
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
     
        view()->share('pageTitle', "Update Dengue");
        view()->share('breadcamps', array('Home' => url(session('access').'dashboard'), 'Dengue' => url(session('access').'dengue'), 'Update Dengue' => url(session('access').'dengue/' . $id . '/edit')));

        $dengue = Dengue::find($id);

        if(session('user')->project_id!=3)
            return redirect(session('access').'dashboard')->send();
        else if(!in_array(3,session('accesslist_id'))) {
            if (session('user')->id == $dengue->user_id) {
                view()->share('dengue', $dengue);
                return view(session('access').'dengue/create');
            }
        }else{
            view()->share('dengue', $dengue);
            return view(session('access').'dengue/create');
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
            'name' => 'required',
            'age' => 'required|numeric',
            'sex' => 'required',
            'date_of_admission' => 'required',
            'current_fever_status' => 'required',
            'area' => 'required',
            'lt_ns1' => 'required',
            'lt_igm' => 'required',
            'death_flag' => 'required',
        ]);

        $dengue = Dengue::find($id);
        if($request->get('site_id')==7777){
            $site = new Site();
            $site->name = $request->get('site_name');
            $site->short_name = $request->get('site_name');
            $site->user_id = \Auth::User()->id;
            $site->save();
            $dengue->site_id = $site->id;
        }
        else $dengue->site_id = $request->get('site_id');

        $dengue->name = $request->get('name');
        $dengue->age = $request->get('age');
        $dengue->sex = $request->get('sex');
        $dengue->mobile_no = $request->get('mobile_no');
        $dengue->date_of_admission = date("Y-m-d", strtotime($request->get('date_of_admission')));

        $dengue->current_fever_status = $request->get('current_fever_status');
        $dengue->area = $request->get('area');
        $dengue->address = $request->get('address');
        $dengue->lt_ns1 = $request->get('lt_ns1');
        $dengue->lt_igm = $request->get('lt_igm');

        $dengue->other_test = $request->get('other_test');
        $dengue->discharge_date = date("Y-m-d", strtotime($request->get('discharge_date')));
        $dengue->death_flag = $request->get('death_flag');
        $dengue->death_date =  date("Y-m-d", strtotime($request->get('death_date')));


        if($request->get('comorbidity') && $request->get('comorbidity')!=null)
            $dengue->comorbidity = json_encode($request->get('comorbidity'));

        if($request->get('comorbidity_others') && $request->get('comorbidity_others')!=null)
            $dengue->comorbidity_others =json_encode($request->get('comorbidity_others'));

        $dengue->save();

//        return redirect(session('access').'dengue')->with('message', 'সফলভাবে সংরক্ষিত');
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
        $dengue = Dengue::find($id);
        if(session('user')->project_id!=3)
            return redirect(session('access').'dashboard')->send();
        else if(!in_array(3,session('accesslist_id'))) {
            if (session('user')->id == $dengue->user_id) {
                $dengue->delete();
            }
        }else{
            $dengue->delete();
        }
    }

    public function export(Request $request){

        if(session('user')->project_id!=3)
            return redirect(session('access').'dashboard')->send();
        else {
            $dengue = Dengue::orderBy('date_of_admission', 'asc');

            if(!in_array(3,session('accesslist_id')))
                $dengue=$dengue->where('user_id',session('user')->id);

            if ($request->name) {
                $dengue = $dengue->where('name', 'like', '%' . $request->name . '%');
            }

            if ($request->current_fever_status) {
                $dengue = $dengue->where('current_fever_status', 'like', '%' . $request->current_fever_status . '%');
            }

            if ($request->mobile_no) {
                $dengue =$dengue->where('mobile_no', 'like', '%' . $request->mobile_no . '%');
            }
            if ($request->sex) {
                $dengue =$dengue->where('sex', 'like', '%' . $request->sex . '%');
            }
            $dengue = $dengue->get();

            /// comorbidity_1, comorbidity_2, comorbidity_3, comorbidity_4, comorbidity_5, comorbidity_6, comorbidity_7, comorbidity_8, comorbidity_9, comorbidity_10, comorbidity_11, comorbidity_12, comorbidity_13, comorbidity_14
            $export="Sl_No, Name, Age, Sex, Mobile No, Date of admission, Diagnosis, Ns1, IGm, Other Test, Area, Address, comorbidity, comorbidity_others, Discharge Date, Death Flag, Death Date \n";
            $getPatient= Common::getDengueComorbidity();
            foreach ($dengue as $en):
                $export.="{$en->id},".str_replace(",",";",$en->name).", {$en->age}, {$en->sex}, {$en->mobile_no}, ";

                if($en->date_of_admission!=null)
                    $export.=date('d.m.y', strtotime($en->date_of_admission)).", ";
                else
                    $export.=",";
                $export.="{$en->current_fever_status}, {$en->lt_ns1}, {$en->lt_igm},".str_replace(",",";",$en->other_test).", ".str_replace(",",";",$en->area).", ".str_replace(",",";",$en->address).",";
                if($en->comorbidity!=null)
                    $comorbidity=json_decode($en->comorbidity);
                else $comorbidity=array();
                if($en->comorbidity_others!=null)
                    $comorbidity_others=json_decode($en->comorbidity_others);
                else $comorbidity_others=array();
                $comorbidity= implode(',', $comorbidity);
                $comorbidity_others= implode(',', $comorbidity_others);
//            in_array($getPatient[1],$comorbidity)?$export.="{$getPatient[1]}, ":$export.=", ";
//            in_array($getPatient[2],$comorbidity)?$export.="{$getPatient[2]}, ":$export.=", ";
//            in_array($getPatient[3],$comorbidity)?$export.="{$getPatient[3]}, ":$export.=", ";
//            in_array($getPatient[4],$comorbidity)?$export.="{$getPatient[4]}, ":$export.=", ";
//            in_array($getPatient[5],$comorbidity)?$export.="{$getPatient[5]}, ":$export.=", ";
//            in_array($getPatient[6],$comorbidity)?$export.="{$getPatient[6]}, ":$export.=", ";
//            in_array($getPatient[77],$comorbidity)?$export.="{$getPatient[77]}, ":$export.=", ";
//            in_array($getPatient[88],$comorbidity)?$export.="{$getPatient[88]}, ":$export.=", ";
//            in_array($getPatient[99],$comorbidity)?$export.="{$getPatient[99]}, ":$export.=", ";
//
//            for($i=0;$i<5;$i++){
//                if(isset($comorbidity_others[$i])){
//                    $export.="{$comorbidity_others[$i]}, ";
//                }else $export.=", ";
//            }
                $export.="{$comorbidity},".str_replace(",",";",$comorbidity_others).",";
                if($en->discharge_date!=null)
                    $export.=date('d.m.y', strtotime($en->discharge_date)).", ";
                else
                    $export.=",";
                $export.="{$en->death_flag},";
                if($en->death_date!=null)
                    $export.=date('d.m.y', strtotime($en->death_date)).", ";
                else
                    $export.=",";
                $export.="{$en->death_text}\n";
            endforeach;

            $headers = [
                'Content-type' => 'text/csv',
                'Content-Disposition' => 'attachment; filename="export_dengue_outbreak_2019_'.\Auth::User()->id.'_'.time().'.csv"',
            ];
            echo "\xEF\xBB\xBF";
            return Response::make($export, 200, $headers);
        }
    }
    function checkrole(){

    }


}
