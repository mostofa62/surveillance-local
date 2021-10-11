<?php

namespace App\Http\Controllers\Admin;

use App\Common;
use App\OutdoorLabData;
use App\Site;
use App\SuspectedDengue;
use App\User;
use Illuminate\Http\Request;
use App\Dengue;
use DB;
use Mail;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Response;

class SuspectedDengueController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function index(Request $request)
    {

        $this->checkrole();
        $dengue = SuspectedDengue::orderBy('name', 'asc');
        $pagetitle="Dengue Lists";

        if ($request->name) {
            $dengue = $dengue->where('name', 'like', '%' . $request->name . '%');
            $pagetitle= "Suspected Dengue Search Results";
        }

        if ($request->current_fever_status) {
            $dengue = $dengue->where('current_fever_status', 'like', '%' . $request->current_fever_status . '%');
            $pagetitle= "Suspected Dengue Search Results";
        }

        if ($request->mobile_no) {
            $dengue =$dengue->where('mobile_no', 'like', '%' . $request->mobile_no . '%');
            $pagetitle= "Suspected Dengue Search Results";
        }
        if ($request->sex) {
            $dengue =$dengue->where('sex', 'like', '%' . $request->sex . '%');
            $pagetitle= "Suspected Dengue Search Results";
        }

        $dengue=$dengue->paginate(20);


        view()->share('pageTitle', $pagetitle);
        view()->share('dengues', $dengue);
        view()->share('breadcamps', array('Home' => url(session('access').'dashboard'), 'Suspected Dengue' => url(session('access').'suspected-dengue')));
        return view(session('access').'suspecteddengue/index');
    }

    public function create()
    {
        $this->checkrole();
        view()->share('pageTitle', "Dengue Create");
        view()->share('breadcamps', array('Home' => url(session('access').'dashboard'), 'Suspected Dengue' => url(session('access').'suspected-dengue'), 'Add Suspected Dengue' => url(session('access').'suspected-dengue/create')));
        return view(session('access').'suspecteddengue/create');
    }


    public function store(Request $request)
    {
        $this->checkrole();
        $this->validate($request, [
            'name' => 'required',
            'age' => 'required|numeric',
            'sex' => 'required',
            'date_of_admission' => 'required',
        ]);

        $dengue = new SuspectedDengue();
        if($request->get('site_id')==7777){
            $site = new Site();
            $site->name = $request->get('site_name');
            $site->short_name = $request->get('site_name');
            $site->user_id = \Auth::User()->id;
            $site->save();
            $dengue->site_id = $site->id;
        }
        else $dengue->site_id = $request->get('site_id');

        $dengue->bed_no = $request->get('bed_no');
        $dengue->ward_no = $request->get('ward_no');
        if($request->get('date_of_admission') && $request->get('date_of_admission')!=null)
            $dengue->date_of_admission = date("Y-m-d", strtotime($request->get('date_of_admission')));
        $dengue->reg_no = date("Y-m-d", strtotime($request->get('reg_no')));
        $dengue->name = $request->get('name');
        $dengue->guardian_name = $request->get('guardian_name');
        $dengue->age = $request->get('age');
        $dengue->months = $request->get('months');
        $dengue->days = $request->get('days');
        if($request->get('dob') && $request->get('dob')!=null)
            $dengue->dob = $request->get('dob');
        $dengue->sex = $request->get('sex');
        $dengue->mobile_no = $request->get('mobile_no');

        $dengue->district_id = $request->get('district_id');
        $dengue->thana_id = $request->get('thana_id');
        $dengue->village = $request->get('village');
        $dengue->add_ward_no = $request->get('add_ward_no');
        $dengue->occupation = $request->get('occupation');
        $dengue->occupation_other = $request->get('occupation_other');
        $dengue->is_travel = $request->get('is_travel');
        $dengue->travel_day = $request->get('travel_day');
        if($request->get('travel_date') && $request->get('travel_date')!=null)
            $dengue->travel_date = date("Y-m-d", strtotime($request->get('travel_date')));

        if($request->get('symptom_date') && $request->get('symptom_date')!=null)
            $dengue->symptom_date = $request->get('symptom_date');


        if($request->get('comorbidity') && $request->get('comorbidity')!=null)
            $dengue->comorbidity = json_encode($request->get('comorbidity'));

        if($request->get('comorbidity_others') && $request->get('comorbidity_others')!=null)
            $dengue->comorbidity_others =json_encode($request->get('comorbidity_others'));

        if($request->get('consultation_history') && $request->get('consultation_history')!=null)
            $dengue->consultation_history =json_encode($request->get('consultation_history'));

        if($request->get('clinical_presentation') && $request->get('clinical_presentation')!=null)
            $dengue->clinical_presentation =json_encode($request->get('clinical_presentation'));

        if($request->get('laboratory_findings') && $request->get('laboratory_findings')!=null)
            $dengue->laboratory_findings =json_encode($request->get('laboratory_findings'));

        if($request->get('treatment_history') && $request->get('treatment_history')!=null)
            $dengue->treatment_history =json_encode($request->get('treatment_history'));

        $dengue->lt_ns1 = $request->get('lt_ns1');
        if($request->get('ns1_date') && $request->get('ns1_date')!=null)
            $dengue->ns1_date = date("Y-m-d", strtotime($request->get('ns1_date')));

        $dengue->lt_igg = $request->get('lt_igg');
        if($request->get('igg_date') && $request->get('igg_date')!=null)
            $dengue->igg_date = date("Y-m-d", strtotime($request->get('igg_date')));
        $dengue->lt_igm = $request->get('lt_igm');
        if($request->get('igm_date') && $request->get('igm_date')!=null)
            $dengue->igm_date = date("Y-m-d", strtotime($request->get('igm_date')));
        $dengue->lt_pcr = $request->get('lt_pcr');
        if($request->get('pcr_date') && $request->get('pcr_date')!=null)
            $dengue->pcr_date = date("Y-m-d", strtotime($request->get('pcr_date')));

        if($request->get('clinical_examination_findings') && $request->get('clinical_examination_findings')!=null)
            $dengue->clinical_examination_findings = json_encode($request->get('clinical_examination_findings'));

        $dengue->is_sample =$request->get('is_sample');

        if($request->get('no_reason') && $request->get('no_reason')!=null)
            $dengue->no_reason = json_encode($request->get('no_reason'));

        if($request->get('no_reason_text') && $request->get('no_reason_text')!=null)
            $dengue->no_reason_text =json_encode($request->get('no_reason_text'));

        if($request->get('sample_date') && $request->get('sample_date')!=null)
            $dengue->sample_date = date("Y-m-d", strtotime($request->get('sample_date')));

        $dengue->sample_id = $request->get('sample_id');

        $dengue->user_id = \Auth::User()->id;

        $dengue->save();

        return redirect(session('access').'suspected-dengue/create')->with('message', 'সফলভাবে সংরক্ষিত');
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
        view()->share('breadcamps', array('Home' => url(session('access').'dashboard'), 'Suspected Dengue' => url(session('access').'suspected-dengue'), 'Suspected Dengue Details' => url(session('access').'suspected-dengue/' . $id)));


        $dengue = SuspectedDengue::find($id);
        view()->share('dengue', $dengue);
        return view(session('access').'suspecteddengue/detail');
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
     
        view()->share('pageTitle', "Update SuspectedDengue");
        view()->share('breadcamps', array('Home' => url(session('access').'dashboard'), 'Suspected Dengue' => url(session('access').'suspected-dengue'), 'Update Suspected Dengue' => url(session('access').'suspected-dengue/' . $id . '/edit')));

        $dengue = SuspectedDengue::find($id);

        view()->share('dengue', $dengue);
        return view(session('access').'suspecteddengue/create');
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
        ]);

        $dengue = SuspectedDengue::find($id);
        if($request->get('site_id')==7777){
            $site = new Site();
            $site->name = $request->get('site_name');
            $site->short_name = $request->get('site_name');
            $site->user_id = \Auth::User()->id;
            $site->save();
            $dengue->site_id = $site->id;
        }
        else $dengue->site_id = $request->get('site_id');

        $dengue->bed_no = $request->get('bed_no');
        $dengue->ward_no = $request->get('ward_no');
        if($request->get('date_of_admission') && $request->get('date_of_admission')!=null)
            $dengue->date_of_admission = date("Y-m-d", strtotime($request->get('date_of_admission')));
        $dengue->reg_no = date("Y-m-d", strtotime($request->get('reg_no')));
        $dengue->name = $request->get('name');
        $dengue->guardian_name = $request->get('guardian_name');
        $dengue->age = $request->get('age');
        $dengue->months = $request->get('months');
        $dengue->days = $request->get('days');
        if($request->get('dob') && $request->get('dob')!=null)
            $dengue->dob = $request->get('dob');
        $dengue->sex = $request->get('sex');
        $dengue->mobile_no = $request->get('mobile_no');

        $dengue->district_id = $request->get('district_id');
        $dengue->thana_id = $request->get('thana_id');
        $dengue->village = $request->get('village');
        $dengue->add_ward_no = $request->get('add_ward_no');
        $dengue->occupation = $request->get('occupation');
        $dengue->occupation_other = $request->get('occupation_other');
        $dengue->is_travel = $request->get('is_travel');
        $dengue->travel_day = $request->get('travel_day');
        if($request->get('travel_date') && $request->get('travel_date')!=null)
            $dengue->travel_date = date("Y-m-d", strtotime($request->get('travel_date')));

        if($request->get('symptom_date') && $request->get('symptom_date')!=null)
            $dengue->symptom_date = $request->get('symptom_date');


        if($request->get('comorbidity') && $request->get('comorbidity')!=null)
            $dengue->comorbidity = json_encode($request->get('comorbidity'));

        if($request->get('comorbidity_others') && $request->get('comorbidity_others')!=null)
            $dengue->comorbidity_others =json_encode($request->get('comorbidity_others'));

        if($request->get('consultation_history') && $request->get('consultation_history')!=null)
            $dengue->consultation_history =json_encode($request->get('consultation_history'));

        if($request->get('clinical_presentation') && $request->get('clinical_presentation')!=null)
            $dengue->clinical_presentation =json_encode($request->get('clinical_presentation'));

        if($request->get('laboratory_findings') && $request->get('laboratory_findings')!=null)
            $dengue->laboratory_findings =json_encode($request->get('laboratory_findings'));

        if($request->get('treatment_history') && $request->get('treatment_history')!=null)
            $dengue->treatment_history =json_encode($request->get('treatment_history'));

        $dengue->lt_ns1 = $request->get('lt_ns1');
        if($request->get('ns1_date') && $request->get('ns1_date')!=null)
            $dengue->ns1_date = date("Y-m-d", strtotime($request->get('ns1_date')));

        $dengue->lt_igg = $request->get('lt_igg');
        if($request->get('igg_date') && $request->get('igg_date')!=null)
            $dengue->igg_date = date("Y-m-d", strtotime($request->get('igg_date')));
        $dengue->lt_igm = $request->get('lt_igm');
        if($request->get('igm_date') && $request->get('igm_date')!=null)
            $dengue->igm_date = date("Y-m-d", strtotime($request->get('igm_date')));
        $dengue->lt_pcr = $request->get('lt_pcr');
        if($request->get('pcr_date') && $request->get('pcr_date')!=null)
            $dengue->pcr_date = date("Y-m-d", strtotime($request->get('pcr_date')));

        if($request->get('clinical_examination_findings') && $request->get('clinical_examination_findings')!=null)
            $dengue->clinical_examination_findings = json_encode($request->get('clinical_examination_findings'));

        $dengue->is_sample =$request->get('is_sample');

        if($request->get('no_reason') && $request->get('no_reason')!=null)
            $dengue->no_reason = json_encode($request->get('no_reason'));

        if($request->get('no_reason_text') && $request->get('no_reason_text')!=null)
            $dengue->no_reason_text =json_encode($request->get('no_reason_text'));

        if($request->get('sample_date') && $request->get('sample_date')!=null)
            $dengue->sample_date = date("Y-m-d", strtotime($request->get('sample_date')));
        $dengue->sample_id = $request->get('sample_id');

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
        $dengue = SuspectedDengue::find($id);
        $dengue->delete();
    }

    public function export(Request $request){

        $dengue = SuspectedDengue::orderBy('date_of_admission', 'asc');

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
            'Content-Disposition' => 'attachment; filename="export_suspected_dengue_outbreak_2019_'.\Auth::User()->id.'_'.time().'.csv"',
        ];
        echo "\xEF\xBB\xBF";
        return Response::make($export, 200, $headers);

    }
    function checkrole(){

    }


}
