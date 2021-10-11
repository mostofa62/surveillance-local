<?php

namespace App\Http\Controllers\Api;

use App\Schedule;
use Illuminate\Http\Request;
use App\User;
use App\Models\FollowUp;
use App\Models\IvrIncomplete;
use App\Models\IvrRefus;
use App\Models\IvrNoncontact;

use App\Http\Requests;
use App\Http\Controllers\Controller;


class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $successStatus = 200;

    public function index(Request $request)
    {
        //
        $headers = apache_request_headers();
        try {
            if(isset(explode(" ",$headers['Authorization'])[1]) && explode(" ",$headers['Authorization'])[1]!=null) {
                $user = User::where('mobile_token', explode(" ", $headers['Authorization'])[1])->first();
                if ($user) {
                    $schedules = null;
                    if($user->project_id==7){
                        $schedules = \App\Models\IvrSchedule::where('user_id', $user->id)
                        ->where('mobile_no', '<>', null)
                        ->where('schedule_date', null);
                        $schedules=$schedules->where('call_state', 0); //added by
                        $schedules=$schedules->orderBy('id','desc')
                        ->first();
                    }else if($user->project_id==8){

                        $schedules = FollowUp::where('status',-1)->where('user_id',$user->id)->first();
                    }else if($user->project_id==10){

                        $group_id = (int)preg_replace('/\D/', '', $user->accesslist_id);

                        $schedules = null;

                        if($group_id ==14 || $group_id==17){

                            $schedules = IvrIncomplete::where('status',-1)->where('interview_id',$user->id)->where('qroup_id',$group_id)->first();

                        }elseif($group_id == 15 || $group_id == 18){

                            $schedules = IvrRefus::where('status',-1)->where('interview_id',$user->id)->where('group_id',$group_id)->first();

                        }elseif($group_id == 16 || $group_id == 19){
                            $schedules = IvrNoncontact::where('status',-1)->where('interview_id',$user->id)->where('group_id',$group_id)->first();

                        }

                        
                    }/*
                    else{
                    $schedules = Schedule::where('user_id', $user->id)
                        ->where('mobile_no', '<>', null)
                        ->where('schedule_date', null);
                    if($user->project_id==4)
                            $schedules=$schedules->where('call_state', 0); //added by mostofa

                    }*/
                        
                    
                    if ($schedules) {
                        return response()->json(['schedules' => $schedules, 'msg' => 'schedules loaded', 'success' => $this->successStatus]);
                    } else {
                        $msg = "Are not available";
                        return response()->json(['schedules' => null, 'msg' => $msg, 'success' => 201]);
                    }
                } else {
                    $msg = "Invalid User";
                    return response()->json(['schedules' => null, 'msg' => $msg, 'success' => 201]);
                }
            }else {
                $msg = "Invalid User";
                return response()->json(['schedules' => null, 'msg' => $msg, 'success' => 201]);
            }
        } catch (Exception $e) {
            $msg = "Something went wrong";
            return response()->json(['schedules'=> null,'msg'=>$msg.' - error: '.$e,'success'=>201]);
        }
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
    public function show(Request $request,$id)
    {
        
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
}
