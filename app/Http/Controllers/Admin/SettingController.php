<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Branch;
use App\Setting;
use DB;
use Mail;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $this->checkrole();
        view()->share('pageTitle', "Settings Lists");
        view()->share('breadcamps', array('Home' => url(session('access').'dashboard'), 'Setting' => url(session('access').'setting')));
        $settings = Setting::orderBy('id', 'desc')->get();
        view()->share('settings', $settings);
        return view(session('access').'setting/index'); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $this->checkrole();
        view()->share('pageTitle', "Setting Details");
        view()->share('breadcamps', array('Home' => url('dashboard'), 'Setting' => url('setting'), 'Setting Details' => url('setting/' . $id)));

        $setting = Setting::find($id);
        view()->share('setting', $setting);
        return view(session('access').'setting/detail');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $this->checkrole();
        view()->share('pageTitle', "Update Setting");
        view()->share('breadcamps', array('Home' => url('dashboard'), 'Setting' => url(session('access').'setting'), 'Update Setting' => url(session('access').'setting/' . $id . '/edit')));

        $setting = Setting::find($id);

        view()->share('setting', $setting);
        return view(session('access').'setting/create');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->checkrole();
        $this->validate($request, [
            'name' => 'required',
            'address' => 'required',
            'tax_no' => 'required',
            'footer' => 'required'
        ]);

        $setting = Setting::find($id);
        $setting->name = $request->get('name');
        $setting->address = $request->get('address');
        $setting->tax_no = $request->get('tax_no');
        $setting->footer = $request->get('footer');

        $setting->save();
        return redirect(session('access').'setting')->with('message', 'সফলভাবে সংরক্ষিত');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    function checkrole(){

        $access=session('accesslist_id');

        if(in_array(1,$access)|| in_array(2,$access)){
//            return redirect(session('access').'home')->send();
        }
        else
            return redirect(session('access').'home')->send();
    }

}
