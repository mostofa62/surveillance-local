<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\DengueDeath;
use DB;
use Mail;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class DengueDeathController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function index(Request $request)
    {

        $this->checkrole();
        $denguedeath = DengueDeath::orderBy('name', 'asc');
        $pagetitle="DengueDeath Lists";

        if ($request->name) {
            $denguedeath = $denguedeath->where('name', 'like', '%' . $request->name . '%');
            $pagetitle= "DengueDeath Search Results";
        }

        if ($request->current_fever_status) {
            $denguedeath = $denguedeath->where('current_fever_status', 'like', '%' . $request->current_fever_status . '%');
            $pagetitle= "DengueDeath Search Results";
        }

        if ($request->mobile_no) {
            $denguedeath =$denguedeath->where('mobile_no', 'like', '%' . $request->mobile_no . '%');
            $pagetitle= "DengueDeath Search Results";
        }
        if ($request->sex) {
            $denguedeath =$denguedeath->where('sex', 'like', '%' . $request->sex . '%');
            $pagetitle= "DengueDeath Search Results";
        }

        $denguedeath=$denguedeath->paginate(20);


        view()->share('pageTitle', $pagetitle);
        view()->share('denguedeaths', $denguedeath);
        view()->share('breadcamps', array('Home' => url(session('access').'dashboard'), 'DengueDeath' => url(session('access').'denguedeath')));
        return view(session('access').'denguedeath/index');
    }

    public function create()
    {
        $this->checkrole();
        view()->share('pageTitle', "DengueDeath Create");
        view()->share('breadcamps', array('Home' => url(session('access').'dashboard'), 'DengueDeath' => url(session('access').'denguedeath'), 'Add DengueDeath' => url(session('access').'denguedeath/create')));
        return view(session('access').'denguedeath/create');
    }


    public function store(Request $request)
    {
        $this->checkrole();
        $this->validate($request, [
            'registration_no' => 'required',
            'name' => 'required',
            'age' => 'required|numeric',
            'sex' => 'required',
            'mobile_no' => 'required',
            'date_of_admission' => 'required',
            'duration_of_fever' => 'required|numeric',
            'current_fever_status' => 'required',
            'area_type' => 'required',
            'thana' => 'required',
            'district' => 'required',
            'lt_ns1' => 'required',
            'lt_igg' => 'required',
            'lt_igm' => 'required',
            'lt_pcr' => 'required',
        ]);

        $denguedeath = new DengueDeath();
        $denguedeath->registration_no = $request->get('registration_no');
        $denguedeath->name = $request->get('name');
        $denguedeath->age = $request->get('age');
        $denguedeath->sex = $request->get('sex');
        $denguedeath->mobile_no = $request->get('mobile_no');
        $denguedeath->date_of_admission = date("Y-m-d", strtotime($request->get('date_of_admission')));
        $denguedeath->duration_of_fever = $request->get('duration_of_fever');
        $denguedeath->onset_of_fever = date("Y-m-d", strtotime('-'.$request->get('duration_of_fever').' days',strtotime($denguedeath->date_of_admission)));
        $denguedeath->current_fever_status = $request->get('current_fever_status');
        $denguedeath->area_type = $request->get('area_type');
        $denguedeath->area = $request->get('area');
        $denguedeath->thana = $request->get('thana');
        $denguedeath->city = $request->get('city');
        $denguedeath->district = $request->get('district');
        $denguedeath->lt_ns1 = $request->get('lt_ns1');
        $denguedeath->lt_igg = $request->get('lt_igg');
        $denguedeath->lt_igm = $request->get('lt_igm');
        $denguedeath->lt_pcr = $request->get('lt_pcr');

        $denguedeath->user_id = \Auth::User()->id;
        $denguedeath->site_id = \Auth::User()->site_id;

        $denguedeath->save();

        return redirect(session('access').'denguedeath')->with('message', 'সফলভাবে সংরক্ষিত');
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
        view()->share('pageTitle', "DengueDeath Details");
        view()->share('breadcamps', array('Home' => url(session('access').'dashboard'), 'DengueDeath' => url(session('access').'denguedeath'), 'DengueDeath Details' => url(session('access').'denguedeath/' . $id)));


        $denguedeath = DengueDeath::find($id);
        view()->share('info', $denguedeath);
        return view(session('access').'denguedeath/detail');
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
     
        view()->share('pageTitle', "Update DengueDeath");
        view()->share('breadcamps', array('Home' => url(session('access').'dashboard'), 'DengueDeath' => url(session('access').'denguedeath'), 'Update DengueDeath' => url(session('access').'denguedeath/' . $id . '/edit')));

        $denguedeath = DengueDeath::find($id);

        view()->share('denguedeath', $denguedeath);
        return view(session('access').'denguedeath/create');
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
            'registration_no' => 'required',
            'name' => 'required',
            'age' => 'required|numeric',
            'sex' => 'required',
            'mobile_no' => 'required',
            'date_of_admission' => 'required',
            'duration_of_fever' => 'required|numeric',
            'current_fever_status' => 'required',
            'area_type' => 'required',
            'area' => 'required',
            'thana' => 'required',
            'city' => 'required',
            'district' => 'required',
            'lt_ns1' => 'required',
            'lt_igg' => 'required',
            'lt_igm' => 'required',
            'lt_pcr' => 'required',
        ]);

        $denguedeath = DengueDeath::find($id);
        $denguedeath->registration_no = $request->get('registration_no');
        $denguedeath->name = $request->get('name');
        $denguedeath->age = $request->get('age');
        $denguedeath->sex = $request->get('sex');
        $denguedeath->mobile_no = $request->get('mobile_no');
        $denguedeath->date_of_admission = date("Y-m-d", strtotime($request->get('date_of_admission')));
        $denguedeath->duration_of_fever = $request->get('duration_of_fever');
        $denguedeath->onset_of_fever = date("Y-m-d", strtotime('-'.$request->get('duration_of_fever').' days',strtotime($denguedeath->date_of_admission)));
        $denguedeath->current_fever_status = $request->get('current_fever_status');
        $denguedeath->area_type = $request->get('area_type');
        $denguedeath->area = $request->get('area');
        $denguedeath->thana = $request->get('thana');
        $denguedeath->city = $request->get('city');
        $denguedeath->district = $request->get('district');
        $denguedeath->lt_ns1 = $request->get('lt_ns1');
        $denguedeath->lt_igg = $request->get('lt_igg');
        $denguedeath->lt_igm = $request->get('lt_igm');
        $denguedeath->lt_pcr = $request->get('lt_pcr');
        $denguedeath->save();

//        return redirect(session('access').'denguedeath')->with('message', 'সফলভাবে সংরক্ষিত');
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
        $denguedeath = DengueDeath::find($id);
        $denguedeath->delete();
    }

    function checkrole(){

    }


}
