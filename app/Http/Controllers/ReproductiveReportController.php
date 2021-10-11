<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Response;
use App\Models\Reproductive;

class ReproductiveReportController extends Controller
{


	public function districtwise(Request $request)
    {

    	$data=null;
    	$total = null;
    	$district_id=null;

    	if(session('user')->project_id!=4)
            return redirect(session('access').'dashboard')->send();
        else{ 

            if(in_array(3,session('accesslist_id'))){

            	$input = $request->all();

            	$call_status=1;
            	$status = 1;
            	

            	$apend_query = "";
            	if(isset($input['s_district'])){
            		$district_id = $input['s_district'];
            		$apend_query.="and district_id=".$district_id;
            	}


            	if(isset($input['s_call_status'])){
            		$call_status = $input['s_call_status'];
            		$status = $this->getStatusBasedOnCallStatus($call_status);            		
            	}

            	if(isset($input['s_cp9'])){
            		$s_cp9 = $input['s_cp9'];
            		$apend_query.="and area_limit.cp_status=".$s_cp9;
            	}

            	$total_query ="SELECT sum(reguler_success) as total from (SELECT count(reproductive.id) as reguler_success,district_id,reproductive.status FROM `reproductive` JOIN
 reproductive_questions on reproductive_questions.reproductive_id = reproductive.id and reproductive_questions.call_status=$call_status
GROUP by district_id having reproductive.status=$status) as result";
				$total = DB::select($total_query);


            	$raw_query="SELECT count(reproductive.id) counted, district_id,concat(area_limit.name,' | ',area_limit.eng_name) as name,area_limit.cp_status as cp, area_limit.max_limit as target ,reproductive.status,area_limit.running_area as ra, area_limit.status as ars FROM reproductive
left join area_limit on reproductive.district_id = area_limit.area_id
join reproductive_questions on reproductive.id = reproductive_questions.reproductive_id and reproductive_questions.call_status=$call_status
GROUP by district_id having status=$status ".$apend_query;


				$data = DB::select($raw_query);
            	$data = $this->arrayPaginator($data, $request);

            	
            	
				

            }
            
        }


    	$pagetitle="Reproductive District Wise Reprot";

    	view()->share('pageTitle', $pagetitle);
    	view()->share('district_id', $district_id);
    	view()->share('reproductives', $data);
    	view()->share('total', $total);
    	view()->share('call_status', $call_status);    	

    	$running_disctrict = \App\Models\AreaLimit::select(DB::raw('area_id,concat(name," | ",eng_name) as name'))->where('running_area',1)->first();
    	view()->share('running_disctrict', $running_disctrict);

    	view()->share('call_status_list', $this->getCallStatus());


    	

    	view()->share('breadcamps', array('Home' => url(session('access').'dashboard')));
    	return view(session('access').'reproductive/districtwise');

    }

    public function arrayPaginator($array, $request)
    {
        
        $page = $request->get('page', 1);
        $perPage = 20;
        $offset = ($page * $perPage) - $perPage;

        return new \Illuminate\Pagination\LengthAwarePaginator(array_slice($array, $offset, $perPage, true), count($array), $perPage, $page,
            ['path' => $request->url(), 'query' => $request->query()]);
    }


    public function getCallStatus(){

        $a=[];

        $a[1]="সম্পন্ন হয়েছে";
        $a += [6=>'প্রযোজ্য নয়'];
        $a = $a + Reproductive::getScheduleSuveillance();
        $a = $a + Reproductive::getForcedfinished();

        return $a;
    }

    public function getStatusBasedOnCallStatus($call_status=1){
    	$status=1;
    	switch($call_status){
    		case 0:
    		case 3: $status=2; break;
    		case 6:
    		case 7:
    		case 8: $status=1;break;

    	}
    	return $status;
    }


    public function usersummary(Request $request){

    	
		

    	$pagetitle="Reproductive User Wise Reprot";
    	$date=date('Y-m-d');
    	$data=null;


    	if(session('user')->project_id!=4)
            return redirect(session('access').'dashboard')->send();
        else{ 

            if(in_array(3,session('accesslist_id'))){


            	$input = $request->all();
            	if(isset($input['date'])) $date = $input['date'];

            	$user_query = "SELECT u.id, username, name, 
QuestioWiseStatus(u.id, '$date',1) as Complete_Call,
QuestioWiseStatus(u.id, '$date',0) as Continue_Call, 
QuestioWiseStatus(u.id, '$date',7) as Partially_Refused,
ScheduleWiseStatus(u.id, '$date',5) as Refused,
ScheduleWiseStatus(u.id, '$date',6) as Not_Eligible,
ScheduleWiseStatus(u.id, '$date',8) as Terminated_Call,
ScheduleWiseStatus(u.id, '$date',2) as Busy,
ScheduleWiseStatus(u.id, '$date',4) as Switched_Off,
ScheduleWiseStatus(u.id, '$date',3) as Dropped_Scheduled,
QuestioWiseStatus(u.id, '$date',3) as Dropped_Questioned,
ScheduleWiseStatus(u.id, '$date',9) as Home_Appointment,
ScheduleAppointmentWiseStatus(u.id,'$date',0, 1) as Rescheduled,
ScheduleAppointmentWiseStatus(u.id,'$date',0, 2) as Appointment

FROM `users` u
left join employees e on e.id = u.employee_id
where u.project_id=4 and u.accesslist_id='[\"5\"]'";

			$data = DB::select($user_query);


            }

        }

        view()->share('pageTitle', $pagetitle);
        view()->share('reproductives', $data);
        view()->share('date', $date);
        view()->share('breadcamps', array('Home' => url(session('access').'dashboard')));

    	return view(session('access').'reproductive/usersummary');

    }

    public function district_enabled($id){

    	$area_limit =DB::table('area_limit')->select(DB::raw('area_id, concat(name," | ",eng_name) as name, cp_status ,max_limit'))->where([
            'running_area'=>1,
            'status'=>1

        ])->first();


        $area_limit_next = DB::table('area_limit')->select(DB::raw('area_id, concat(name," | ",eng_name) as name, running_area'))        
        ->where('area_id',$id)
        ->where('running_area',0) 
        ->where('status',1)               
        ->first();

        //var_dump($area_limit->name."=".$area_limit_next->name);
        if(isset($area_limit_next) && isset($area_limit)){

	        DB::transaction(function () use($area_limit_next,$area_limit){
	            
	            DB::table('area_limit')->where('area_id',$area_limit_next->area_id)->update(['running_area' => 1]);
	            
	            DB::table('area_limit')->where('area_id',$area_limit->area_id)->update(['running_area' => 0]);
	        });
    	}

        return redirect(session('access').'reproductive/districtreport')->with('message', 'Finished All'); 

    }

    public function freenumber(){

    	$user_query = "SELECT area_id, concat(area_limit.name,' | ',area_limit.eng_name) district_name,
area_limit.cp_status as cp,
area_limit.max_limit,
area_limit.running_area,
(select count(mobile_no) as free_numbers from reproductive where status=0 and district_id=area_limit.area_id group by district_id) free_number
from area_limit";
	$data = DB::select($user_query);

	$pagetitle="Reproductive Free Number Reprot";
	view()->share('pageTitle', $pagetitle);
	view()->share('reproductives', $data);
	view()->share('breadcamps', array('Home' => url(session('access').'dashboard')));
	return view(session('access').'reproductive/freenumber');


    }

    

}