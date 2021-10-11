<?php

namespace App\Http\Controllers;

use App\Common;
use App\OutdoorLabData;
use App\Site;
use App\User;
use Illuminate\Http\Request;
use App\DengueLabFetpb;
use DB;
use Mail;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Response;

class DengueLabFetpbController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function index(Request $request)
    {

        $this->checkrole();
        $dengue = DengueLabFetpb::orderBy('id', 'desc');

        if(session('user')->project_id!=5)
            return redirect(session('access').'dashboard')->send();
        else if(!in_array(3,session('accesslist_id')))
            $dengue=$dengue->where('user_id',session('user')->id);

        $pagetitle="Dengue Lab Test Lists";

        if ($request->name) {
            $dengue = $dengue->where('name', 'like', '%' . $request->name . '%');
            $pagetitle= "Dengue Lab Test Search Results";
        }
        if ($request->lab_name) {
            $dengue = $dengue->where('lab_name', 'like', '%' . $request->lab_name . '%');
            $pagetitle= "Dengue Lab Test Search Results";
        }

        if ($request->mobile_no) {
            $dengue =$dengue->where('mobile_no', 'like', '%' . $request->mobile_no . '%');
            $pagetitle= "Dengue Lab Test Search Results";
        }
        if ($request->sex) {
            $dengue =$dengue->where('sex', 'like', '%' . $request->sex . '%');
            $pagetitle= "Dengue Lab Test Search Results";
        }

        $dengue=$dengue->paginate(20);


        view()->share('pageTitle', $pagetitle);
        view()->share('dengues', $dengue);
        view()->share('breadcamps', array('Home' => url(session('access').'dashboard'), 'Dengue Lab Test' => url(session('access').'dengue')));
        return view(session('access').'denguelabfetpb/index');
    }

    public function create()
    {
        $this->checkrole();
        view()->share('pageTitle', "Dengue Lab Test Create");
        view()->share('breadcamps', array('Home' => url(session('access').'dashboard'), 'Dengue Lab Test' => url(session('access').'dengue'), 'Add Dengue Lab Test' => url(session('access').'dengue/create')));
        return view(session('access').'denguelabfetpb/create');
    }


    public function store(Request $request)
    {
        $this->checkrole();
        $this->validate($request, [
            'p_lab_id' => 'required',
            'lab_name' => 'required',
            'area' => 'required',
            'received_date' => 'required',
            's_reporting_date' => 'required',
            'name' => 'required',
        ]);

        $dengue = new DengueLabFetpb();

        $dengue->p_lab_id = $request->get('p_lab_id');
        $dengue->lab_name = $request->get('lab_name');
        $dengue->area = $request->get('area');
        $dengue->received_date =date("Y-m-d", strtotime($request->get('received_date')));
        $dengue->p_report_date =date("Y-m-d", strtotime($request->get('p_report_date')));
        $dengue->s_reporting_date = date("Y-m-d", strtotime($request->get('s_reporting_date')));
        $dengue->name = $request->get('name');
        $dengue->age = $request->get('age');
        $dengue->sex = $request->get('sex');
        $dengue->mobile_no = $request->get('mobile_no');
        $dengue->address = $request->get('address');
        $dengue->diagnosis =$request->get('diagnosis');

        $dengue->is_ns1 = $request->get('is_ns1');
        $dengue->is_igm = $request->get('is_igm');
        $dengue->is_igg = $request->get('is_igg');
        $dengue->is_chikunguniya = $request->get('is_chikunguniya');
        $dengue->is_malaria = $request->get('is_malaria');
        $dengue->is_salmonella = $request->get('is_salmonella');
        $dengue->is_febrile_antigen = $request->get('is_febrile_antigen');
        $dengue->is_hbsag = $request->get('is_hbsag');
        $dengue->is_anti_hav_igm = $request->get('is_anti_hav_igm');
        $dengue->is_anti_hev_igm = $request->get('is_anti_hev_igm');
        $dengue->is_anti_hcv_igm = $request->get('is_anti_hcv_igm');
        $dengue->is_pcr_hbv_rna = $request->get('is_pcr_hbv_rna');
        $dengue->is_pcr_hcv_dna = $request->get('is_pcr_hcv_dna');
        $dengue->remarks = $request->get('remarks');

        $dengue->user_id = \Auth::User()->id;
        $dengue->save();

        return redirect(session('access').'fetpb-dengue-lab/create')->with('message', 'সফলভাবে সংরক্ষিত');
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
        view()->share('pageTitle', "Dengue Lab Test Details");
        view()->share('breadcamps', array('Home' => url(session('access').'dashboard'), 'Dengue Lab Test' => url(session('access').'dengue'), 'Dengue Lab Test Details' => url(session('access').'dengue/' . $id)));


        $dengue = DengueLabFetpb::find($id);

        if(session('user')->project_id!=5)
            return redirect(session('access').'dashboard')->send();
        else if(!in_array(3,session('accesslist_id'))) {
            if (session('user')->id == $dengue->user_id) {
                view()->share('info', $dengue);
                return view(session('access').'denguelabfetpb/detail');
            }
        }else{
            view()->share('info', $dengue);
            return view(session('access').'denguelabfetpb/detail');
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
     
        view()->share('pageTitle', "Update Dengue Lab Test");
        view()->share('breadcamps', array('Home' => url(session('access').'dashboard'), 'Dengue Lab Test' => url(session('access').'dengue'), 'Update Dengue Lab Test' => url(session('access').'dengue/' . $id . '/edit')));

        $dengue = DengueLabFetpb::find($id);

        if(session('user')->project_id!=5)
            return redirect(session('access').'dashboard')->send();
        else if(!in_array(3,session('accesslist_id'))) {
            if (session('user')->id == $dengue->user_id) {
                view()->share('dengue', $dengue);
                return view(session('access').'denguelabfetpb/create');
            }
        }else{
            view()->share('dengue', $dengue);
            return view(session('access').'denguelabfetpb/create');
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
            'p_lab_id' => 'required',
            'lab_name' => 'required',
            'area' => 'required',
            'received_date' => 'required',
            's_reporting_date' => 'required',
            'name' => 'required',
        ]);

        $dengue = DengueLabFetpb::find($id);

        $dengue->p_lab_id = $request->get('p_lab_id');
        $dengue->lab_name = $request->get('lab_name');
        $dengue->area = $request->get('area');
        $dengue->received_date =date("Y-m-d", strtotime($request->get('received_date')));
        $dengue->p_report_date =date("Y-m-d", strtotime($request->get('p_report_date')));
        $dengue->s_reporting_date = date("Y-m-d", strtotime($request->get('s_reporting_date')));
        $dengue->name = $request->get('name');
        $dengue->age = $request->get('age');
        $dengue->sex = $request->get('sex');
        $dengue->mobile_no = $request->get('mobile_no');
        $dengue->address = $request->get('address');
        $dengue->diagnosis =$request->get('diagnosis');

        $dengue->is_ns1 = $request->get('is_ns1');
        $dengue->is_igm = $request->get('is_igm');
        $dengue->is_igg = $request->get('is_igg');
        $dengue->is_chikunguniya = $request->get('is_chikunguniya');
        $dengue->is_malaria = $request->get('is_malaria');
        $dengue->is_salmonella = $request->get('is_salmonella');
        $dengue->is_febrile_antigen = $request->get('is_febrile_antigen');
        $dengue->is_hbsag = $request->get('is_hbsag');
        $dengue->is_anti_hav_igm = $request->get('is_anti_hav_igm');
        $dengue->is_anti_hev_igm = $request->get('is_anti_hev_igm');
        $dengue->is_anti_hcv_igm = $request->get('is_anti_hcv_igm');
        $dengue->is_pcr_hbv_rna = $request->get('is_pcr_hbv_rna');
        $dengue->is_pcr_hcv_dna = $request->get('is_pcr_hcv_dna');
        $dengue->remarks = $request->get('remarks');

        $dengue->save();

//        return redirect(session('access').'dengue-lab-fetpb')->with('message', 'সফলভাবে সংরক্ষিত');
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
        $dengue = DengueLabFetpb::find($id);
        $dengue->delete();
    }
    public function export(Request $request){

        if(session('user')->project_id!=5)
            return redirect(session('access').'dashboard')->send();
        else {
            $dengue = DengueLabFetpb::orderBy('id', 'asc');
            if(!in_array(3,session('accesslist_id')))
                $dengue=$dengue->where('user_id',session('user')->id);

            if ($request->name) {
                $dengue = $dengue->where('name', 'like', '%' . $request->name . '%');
            }
            if ($request->lab_name) {
                $dengue = $dengue->where('lab_name', 'like', '%' . $request->lab_name . '%');
            }

            if ($request->mobile_no) {
                $dengue = $dengue->where('mobile_no', 'like', '%' . $request->mobile_no . '%');
            }
            if ($request->sex) {
                $dengue = $dengue->where('sex', 'like', '%' . $request->sex . '%');
            }
            $dengue = $dengue->get();

            /// comorbidity_1, comorbidity_2, comorbidity_3, comorbidity_4, comorbidity_5, comorbidity_6, comorbidity_7, comorbidity_8, comorbidity_9, comorbidity_10, comorbidity_11, comorbidity_12, comorbidity_13, comorbidity_14
            $export = "Sl_No, p_lab_id, lab_name, Location, received_date, p_report_date, s_reporting_date, Name, Age, Sex, Mobile No, Address, Diagnosis, is_ns1, is_igm, is_igg, is_chikunguniya, is_malaria, is_febrile_antigen, is_salmonella, is_hbsag, is_anti_hav_igm,is_anti_hev_igm, is_anti_hcv_igm, is_pcr_hbv_rna, is_pcr_hcv_dna, Entry Date, Entry Time, operator \n";
            $getPatient = Common::getDengueComorbidity();
            foreach ($dengue as $en):
                $export .= "{$en->id}, {$en->p_lab_id}, {$en->lab_name}, {$en->area}, {$en->received_date}, {$en->p_report_date}, {$en->s_reporting_date}," . str_replace(",", ";", $en->name) . ", {$en->age}, {$en->sex}, {$en->mobile_no}," . str_replace(",", ";", $en->address) . "," . str_replace(",", ";", $en->diagnosis) . ", {$en->is_ns1}, {$en->is_igm}, {$en->is_igg}, {$en->is_chikunguniya}, {$en->is_malaria}, {$en->is_febrile_antigen}, {$en->is_salmonella}, {$en->is_hbsag}, {$en->is_anti_hav_igm}, {$en->is_anti_hev_igm}, {$en->is_anti_hcv_igm}, {$en->is_pcr_hbv_rna}, {$en->is_pcr_hcv_dna}, ".date('d/m/Y', strtotime($en->created_at)).",".date('H:i:s', strtotime($en->created_at)).", {$en->user_id}\n";
            endforeach;

            $headers = [
                'Content-type' => 'text/csv',
                'Content-Disposition' => 'attachment; filename="export_dengue_faptb_outbreak_2019_' . \Auth::User()->id . '_' . time() . '.csv"',
            ];
            echo "\xEF\xBB\xBF";
            return Response::make($export, 200, $headers);
        }

    }
    function checkrole(){

    }


}
