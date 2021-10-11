<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IvrIncomplete;
use App\Models\IvrRefus;
use App\Models\IvrNoncontact;
use DB;
use Carbon\Carbon;

class IvrFollowController extends Controller
{
    //
    public function incomplete(){

    	view()->share('pageTitle', "CATI Incomplete Survey Form");
        view()->share('breadcamps', array('Home' => url(session('access').'dashboard')));

    	$user_id=\Auth::User()->id;

        $group_id = (int)preg_replace('/\D/', '', \Auth::User()->accesslist_id);
        

    	$ivr = IvrIncomplete::where('status',-1)
            ->where('interview_id',$user_id)
            ->where('qroup_id',$group_id)            
            ->first();

        if(!isset($ivr)){
         $ivr = IvrIncomplete::where('status',0)->where('qroup_id',$group_id)->first();
        }

        //get free number 0
        if(isset($ivr)) {



        	//\DB::transaction(function () {
		      //$ivr = IvrIncomplete::where('status',0)->lockForUpdate()->first();
		      $ivr->interview_id=\Auth::User()->id;
		      $ivr->start_time=Carbon::now();
		      $ivr->status=-1;
		      $ivr->save();
		     //});


               

        }else{
        	view()->share('info', null);
        }

        view()->share('info', $ivr);

        return view(session('access').'ivrfollow/incomplete');

    }

    public function incomplete_store(Request $request){

        if($request->isMethod('post')){
            //$incomplete = IvrIncomplete::lockForUpdate()->find($request->id);
            $incomplete = IvrIncomplete::find($request->id);
            $input = $request->all();

            $incomplete->fill($input); 

            $incomplete->status = 1;
            $incomplete->end_time=Carbon::now();

            if($incomplete->save()){
                return redirect(session('access').'ivr/incomplete')->with('message', "সফলভাবে সংরক্ষিত");
            }
        }

    }


    //refusal
    public function refusal(){

        view()->share('pageTitle', "CATI Refusal Survey Form");
        view()->share('breadcamps', array('Home' => url(session('access').'dashboard')));

        $user_id=\Auth::User()->id;

        $group_id = (int)preg_replace('/\D/', '', \Auth::User()->accesslist_id);
        

        $ivr = IvrRefus::where('status',-1)
            ->where('interview_id',$user_id)
            ->where('group_id',$group_id)                    
            ->first();

        if(!isset($ivr)){
         $ivr = IvrRefus::where('status',0)->where('group_id',$group_id)->first();
        }

        //get free number 0
        if(isset($ivr)) {



            //\DB::transaction(function () {
              //$ivr = IvrIncomplete::where('status',0)->lockForUpdate()->first();
              $ivr->interview_id=\Auth::User()->id;
              $ivr->start_time=Carbon::now();
              $ivr->status=-1;
              $ivr->save();
             //});


               

        }else{
            view()->share('info', null);
        }

        view()->share('info', $ivr);

        return view(session('access').'ivrfollow/refusal');

    }

    public function refusal_store(Request $request){

        if($request->isMethod('post')){
            //$incomplete = IvrIncomplete::lockForUpdate()->find($request->id);
            $incomplete = IvrRefus::find($request->id);
            $input = $request->all();

            $incomplete->fill($input); 

            $incomplete->status = 1;
            $incomplete->end_time=Carbon::now();

            if($incomplete->save()){
                return redirect(session('access').'ivr/refusal')->with('message', "সফলভাবে সংরক্ষিত");
            }
        }

    }

    //noncontact
    public function noncontact(){

        view()->share('pageTitle', "CATI Noncontact Survey Form");
        view()->share('breadcamps', array('Home' => url(session('access').'dashboard')));

        $user_id=\Auth::User()->id;
        $group_id = (int)preg_replace('/\D/', '', \Auth::User()->accesslist_id);

        $ivr = IvrNoncontact::where('status',-1)
            ->where('interview_id',$user_id) 
            ->where('group_id',$group_id)           
            ->first();

        if(!isset($ivr)){
         $ivr = IvrNoncontact::where('status',0)->where('group_id',$group_id)->first();
        }

        //get free number 0
        if(isset($ivr)) {



            //\DB::transaction(function () {
              //$ivr = IvrIncomplete::where('status',0)->lockForUpdate()->first();
              $ivr->interview_id=\Auth::User()->id;
              $ivr->start_time=Carbon::now();
              $ivr->status=-1;
              $ivr->save();
             //});


               

        }else{
            view()->share('info', null);
        }

        view()->share('info', $ivr);

        return view(session('access').'ivrfollow/noncontact');

    }

    public function noncontact_store(Request $request){

        if($request->isMethod('post')){
            //$incomplete = IvrIncomplete::lockForUpdate()->find($request->id);
            $incomplete = IvrNoncontact::find($request->id);
            $input = $request->all();

            $incomplete->fill($input); 

            $incomplete->status = 1;
            $incomplete->end_time=Carbon::now();

            if($incomplete->save()){
                return redirect(session('access').'ivr/noncontact')->with('message', "সফলভাবে সংরক্ষিত");
            }
        }

    }

}
