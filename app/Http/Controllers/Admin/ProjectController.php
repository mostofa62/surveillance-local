<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Project;
use DB;
use Mail;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function index(Request $request)
    {

        $this->checkrole();
        $projects = Project::orderBy('name', 'asc');
        $pagetitle="Project Lists";

        if ($request->s_name) {
            $projects = $projects->where('name', 'like', '%' . $request->s_name . '%');
            $pagetitle= "Project Search Results";
        }

        if ($request->s_supervisor_id) {
            $projects = $projects->where('supervisor_id', 'like', '%' . $request->s_supervisor_id . '%');
            $pagetitle= "Project Search Results";
        }

        if ($request->s_short_name) {
            $projects =$projects->where('short_name', 'like', '%' . $request->s_short_name . '%');
            $pagetitle= "Project Search Results";
        }

        $projects=$projects->paginate(20);


        view()->share('pageTitle', $pagetitle);
        view()->share('projects', $projects);
        view()->share('breadcamps', array('Home' => url(session('access').'dashboard'), 'Project' => url(session('access').'project')));
        return view(session('access').'project/index');
    }

    public function create()
    {
        $this->checkrole();
        view()->share('pageTitle', "Project Create");
        view()->share('breadcamps', array('Home' => url(session('access').'dashboard'), 'Project' => url(session('access').'project'), 'Add Project' => url(session('access').'project/create')));
        return view(session('access').'project/create');
    }


    public function store(Request $request)
    {
        $this->checkrole();
        $this->validate($request, [
            'name' => 'required',
            'short_name' => 'required',
            'supervisor_id' => 'required',
            'site_ids' => 'required',
        ]);

        $project = new Project();
        $project->name = $request->get('name');
        $project->short_name = $request->get('short_name');
        $project->supervisor_id = $request->get('supervisor_id');
        $project->site_ids = json_encode($request->get('site_ids'));
        $project->user_id = \Auth::User()->id;
        $project->save();

        return redirect(session('access').'project')->with('message', 'সফলভাবে সংরক্ষিত');
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
        view()->share('pageTitle', "Project Details");
        view()->share('breadcamps', array('Home' => url(session('access').'dashboard'), 'Project' => url(session('access').'project'), 'Project Details' => url(session('access').'project/' . $id)));


        $project = Project::find($id);
        view()->share('info', $project);
        return view(session('access').'project/detail');
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
     
        view()->share('pageTitle', "Update Project");
        view()->share('breadcamps', array('Home' => url(session('access').'dashboard'), 'Project' => url(session('access').'project'), 'Update Project' => url(session('access').'project/' . $id . '/edit')));

        $project = Project::find($id);

        view()->share('project', $project);
        return view(session('access').'project/create');
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
            'supervisor_id' => 'required',
            'site_ids' => 'required',
        ]);

        $project = Project::find($id);
        $project->name = $request->get('name');
        $project->short_name = $request->get('short_name');
        $project->supervisor_id = $request->get('supervisor_id');
        $project->site_ids = json_encode($request->get('site_ids'));
        $project->user_id = \Auth::User()->id;
        $project->save();

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
        $project = Project::find($id);
        $project->delete();
    }
    function checkrole(){
    }


}
