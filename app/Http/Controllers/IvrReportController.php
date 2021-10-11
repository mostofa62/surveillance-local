<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IvrJar;
use DB;

class IvrReportController extends Controller
{
	
    public function index(){

    	if(session('user')->project_id!=7)
            return redirect(session('access').'dashboard')->send();        

    	$models = IvrJar::select(DB::raw('gender,concat(range_min,"-",range_max) as ranges,max_limit as target,done_limit as completed,status'))->get();


    	$pagetitle="CATI Completed List";

    	view()->share('pageTitle', $pagetitle);
        view()->share('ivrs', $models);
        view()->share('breadcamps', array('Home' => url(session('access').'dashboard')));
        return view('user/ivrjar/index');

    }

    public function usercompleted(){
        if(session('user')->project_id!=7)
            return redirect(session('access').'dashboard')->send();

        $raw_query = "SELECT concat(username,'-',name) as employee,
        (select count(mobile_no) from ivr_schedules group by user_id having user_id = users.id  ) as total_attempt,  
(SELECT count(call_status) from ivr_questions join ivr on ivr.id=ivr_questions.ivr_id where ivr_questions.user_id=users.id and ivr_questions.call_status=1 and ivr.status=1 ) as total
FROM cellphonesurveillance.users join employees on employees.id=users.employee_id 
where project_id=7 
and accesslist_id='[\"5\"]'
and (SELECT count(call_status) from ivr_questions join ivr on ivr.id=ivr_questions.ivr_id where ivr_questions.user_id=users.id and ivr_questions.call_status=1 and ivr.status=1 ) > 0
order by (SELECT count(call_status) from ivr_questions join ivr on ivr.id=ivr_questions.ivr_id where ivr_questions.user_id=users.id and ivr_questions.call_status=1 and ivr.status=1 ) asc";

        /*$raw_query ="SELECT (SELECT username FROM users where users.id = user_id) as employee,count(call_status) as total FROM ivr_questions where call_status=1 GROUP by user_id";*/
        $data = DB::select($raw_query);

        $pagetitle="Employee Completed List";

        view()->share('pageTitle', $pagetitle);
        view()->share('ivrs', $data);
        view()->share('breadcamps', array('Home' => url(session('access').'dashboard')));
        return view(session('access').'ivrjar/usercompleted');
    }

    public function jargenerator(){
        $data = IvrJar::all()->toArray();
        \Storage::disk('public')->put('js/ivr_jar.json', json_encode($data));
    }
}
