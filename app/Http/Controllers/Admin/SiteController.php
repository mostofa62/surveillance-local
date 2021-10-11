<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Site;
use DB;
use Mail;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class SiteController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function index(Request $request)
    {

        $this->checkrole();
        $sites = Site::orderBy('name', 'asc');
        $pagetitle="Site Lists";

        if ($request->s_name) {
            $sites = $sites->where('name', 'like', '%' . $request->s_name . '%');
            $pagetitle= "Project Search Results";
        }

        if ($request->s_type) {
            $sites = $sites->where('type', 'like', '%' . $request->s_type . '%');
            $pagetitle= "Project Search Results";
        }

        if ($request->s_short_name) {
            $sites =$sites->where('short_name', 'like', '%' . $request->s_short_name . '%');
            $pagetitle= "Project Search Results";
        }

        $sites=$sites->paginate(20);


        view()->share('pageTitle', $pagetitle);
        view()->share('sites', $sites);
        view()->share('breadcamps', array('Home' => url(session('access').'dashboard'), 'Site' => url(session('access').'site')));
        return view(session('access').'site/index');
    }

    public function create()
    {
        $this->checkrole();
        view()->share('pageTitle', "Site Create");
        view()->share('breadcamps', array('Home' => url(session('access').'dashboard'), 'Site' => url(session('access').'site'), 'Add Site' => url(session('access').'site/create')));
        return view(session('access').'site/create');
    }


    public function store(Request $request)
    {
        $this->checkrole();
        $this->validate($request, [
            'name' => 'required',
            'short_name' => 'required',
            'type' => 'required',
        ]);

        $site = new Site();
        $site->name = $request->get('name');
        $site->short_name = $request->get('short_name');
        $site->type = $request->get('type');
        $site->user_id = \Auth::User()->id;
        $site->save();

        return redirect(session('access').'site')->with('message', 'সফলভাবে সংরক্ষিত');
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
        view()->share('pageTitle', "Site Details");
        view()->share('breadcamps', array('Home' => url(session('access').'dashboard'), 'Site' => url(session('access').'site'), 'Site Details' => url(session('access').'site/' . $id)));

        $site = Site::find($id);
        view()->share('info', $site);
        return view(session('access').'site/detail');
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
     
        view()->share('pageTitle', "Update Site");
        view()->share('breadcamps', array('Home' => url(session('access').'dashboard'), 'Site' => url(session('access').'site'), 'Update Site' => url(session('access').'site/' . $id . '/edit')));

        $site = Site::find($id);

        view()->share('site', $site);
        return view(session('access').'site/create');
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
            'short_name' => 'required',
            'type' => 'required',
        ]);

        $site = Site::find($id);
        $site->name = $request->get('name');
        $site->short_name = $request->get('short_name');
        $site->type = $request->get('type');
        $site->user_id = \Auth::User()->id;
        $site->save();

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
        $site = Site::find($id);
        $site->delete();
    }
    function checkrole(){
    }


}
