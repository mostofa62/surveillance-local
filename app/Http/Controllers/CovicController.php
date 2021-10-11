<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Covic;
use App\Models\FollowUp;
use App\Models\FollowUpFamily;
use App\Models\FollowUpContact;

class CovicController extends Controller
{

	public function index(Request $request)
    {

    	$model = Covic::orderBy('id', 'asc');
    	
    	if(session('user')->project_id!=8)
            return redirect(session('access').'dashboard')->send();
        else{ 
            if(in_array(5,session('accesslist_id')))
            $model=$model->where('user_id',session('user')->id);
        
        }

        $pagetitle="Covic Contact Lists";

        if ($request->country_from) {
            $model =$model->where('country_from', $request->country_from );
            $pagetitle= "Covic Contact Search Results";
        }

        if ($request->entry_date) {        	
            $model =$model->whereRaw("date(created_at)='$request->entry_date'" );
            $pagetitle= "Covic Contact Search Results";
        }

        $model=$model->paginate(20);


        view()->share('pageTitle', $pagetitle);
        view()->share('models', $model);
        view()->share('breadcamps', array('Home' => url(session('access').'dashboard'), 'Covic Contact' => url(session('access').'covic')));
        return view(session('access').'covic/index');


    }


    public function create()
    {

    	view()->share('pageTitle', "Covic Create");
        view()->share('breadcamps', array('Home' => url(session('access').'dashboard'), 'Covic' => url(session('access').'covic'), 'Add Covic' => url(session('access').'covic/create')));
        return view(session('access').'covic/create');

    }

    public function store(Request $request)
    {
    	

    	$this->validate($request, [
            //'mobile_no' => 'required|numeric|unique:covic19_general',
            'arrival_date' => 'required',
            //'passport_no' => 'required',
            //'arrival_date' => 'required',
        ]);
        
    	
        $model = new Covic();
        $model->user_id = \Auth::User()->id;

        $model->fill($request->all());

        $model->save();

        \Cookie::queue('nationality', $model->nationality);
        
        
        return redirect(session('access').'covic/create');
        
        

    }

    public function edit($id)
    {
    	/*
    	if(session('user')->project_id!=8)
            return redirect(session('access').'dashboard')->send();
        elseif(!in_array(3,session('accesslist_id')) )
            return redirect(session('access').'dashboard')->send();*/

        view()->share('pageTitle', "Covic Update");
        view()->share('breadcamps', array('Home' => url(session('access').'dashboard'), 'Covic Contact' => url(session('access').'covic'), 'Update Covic Contact' => url(session('access').'covic/' . $id . '/edit')));

        $model = Covic::find($id);

        view()->share('model', $model);
        return view(session('access').'covic/create');

    }

    public function update(Request $request, $id)
    {

    	$this->validate($request, [
            //'mobile_no' => 'required|numeric',
            'arrival_date' => 'required',
            //'passport_no' => 'required',
            //'arrival_date' => 'required',
        ]);

        $model = Covic::find($id);
        $model->user_id = \Auth::User()->id;
        $model->fill($request->all());
        $model->save();

        return redirect(session('access').'covic')->with('message', 'সফলভাবে সংরক্ষিত');

        

    }

    public function followList(Request $request){
        
        $model = FollowUp::orderBy('id', 'asc');
        $pagetitle="FollowUp Contact Lists";

        if ($request->s_id_no) {
            $model =$model->where('id','=',  $request->s_id_no);
            $pagetitle= "FollowUp Contact Search Results";
        }

        if ($request->s_mobile_no) {
            $model =$model->where('mobile_no', 'like', '%' . $request->s_mobile_no . '%');
            $pagetitle= "FollowUp Contact Search Results";
        }

        $model=$model->paginate(20);


        view()->share('pageTitle', $pagetitle);
        view()->share('models', $model);
        view()->share('breadcamps', array('Home' => url(session('access').'dashboard'), 'FollowUp Contact' => url(session('access').'covic')));
        return view(session('access').'covic/followList');
    }

    public function followUp(){

        view()->share('pageTitle', "Follow Up Form");
        view()->share('breadcamps', array('Home' => url(session('access').'dashboard') ));

        $user_id=\Auth::User()->id;

        $model = FollowUp::
        select(DB::raw('id,mobile_no, user_id, status'))
            ->where('status',-1)
            ->where('user_id',$user_id)           
            ->first();



        if(!isset($model)) {     

        $model = FollowUp::
        select(DB::raw('id,mobile_no, user_id, status'))
            ->where('status',0)            
            ->first(); 

        }

        

        if(isset($model)){
            $model->user_id = $user_id;
            $model->status =-1;
            $model->save();

        }else{
            view()->share('info', null); 
        }

        //dd($model);

        view()->share('info', $model);

        return view(session('access').'covic/followUp');



    }

    public function followUpStore(Request $request, $id){

        $allSave = false;
        
        $model = FollowUp::find($id);
        $model->status =1;
        $model->fill($request->all());

        
        $datas = $request->input('fu');

        $cdatas = $request->input('fc');

        DB::beginTransaction();
        try{
            $model->save();
            if(count($datas) > 0){
                foreach ($datas as $data) {
                    if(empty($data['name']) && empty($data['age'])
                    && empty($data['mobile_no']) && !isset($data['fever'])
                        && !isset($data['fever_on_set'])
                        && !isset($data['fever_cessation'])
                        && !isset($data['cough'])
                        && !isset($data['cough_on_set'])
                        && !isset($data['cough_cessation'])
                        && !isset($data['respiratory_distress'])
                        && !isset($data['respiratory_distress_on_set'])
                        && !isset($data['respiratory_distress_cessation'])
                        && !isset($data['sore_throat'])
                        && !isset($data['sore_throat_on_set'])
                        && !isset($data['sore_throat_cessation'])

                ) continue;
                    $modelS = new FollowUpFamily();
                    $modelS->fill($data);
                    $modelS->fu_id = $model->id;
                    $modelS->save();
                }
            }
            if(count($cdatas) > 0){
                foreach ($cdatas as $data) {
                    if(empty($data['name']) && empty($data['mobile_no']) ) continue;                    
                    $modelS = new FollowUpContact();
                    $modelS->fill($data);
                    $modelS->fu_id = $model->id;
                    $modelS->save();
                }
            }

            // Commit Transaction
            DB::commit();
            $allSave = true;

        }catch(\Exception $e){
            // Rollback Transaction
            var_dump($e);die();
            DB::rollback();
            $allSave = false;
        }
        

        //var_dump($secondModel);
        //die();
        //FollowUpFamily::insert($secondModel);
        
        //var_dump();
        //die();

        return redirect(session('access').'covic/followup')->with('message', $allSave ? 'সফলভাবে সংরক্ষিত':"Not Saved");


    }
}
