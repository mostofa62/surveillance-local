<?php

namespace App\Http\Controllers\Admin;

use App\Common;
use App\Dengue;
use App\Encephality;
use App\Log;
use App\Poultry;
use App\PoultryQuestion;
use App\Question;
use App\Employee;
use App\Http\Controllers\Controller;
use App\Schedule;
use App\User;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Session\Store;
use Closure;
class DashboardController extends Controller
{

    /**
     * @ Function Name          : dashboard
     * @ Route Name             : index
     * @ Function Purpose  : To show dashboard page
     * @ Function Returns : New flat request, Meal order
     */
    public function index(Request $request)
    {
        $this->checkrole();
        if(session('project_id')=="") session(["project_id"=>"3"]);
        if(session('project_id')==1) {
            $users = User::where('project_id', 1)->pluck('username','id');

            $poultry = Poultry::select(DB::Raw('SUM(if(poultries.status =-1, 1, 0)) AS incall_total'),DB::Raw('SUM(if(poultries.status =1, 1, 0)) AS done_total'),DB::Raw('SUM(if(poultries.no_of_call < 4 && poultries.status= 2, 1, 0)) AS schedule_total'), DB::Raw('SUM(if(poultries.status= 0, 1, 0)) AS remain_total'),DB::Raw('interview_id'),DB::Raw('SUM(if((poultries.no_of_call >= 4 && poultries.status !=1)||  poultries.status =3, 1, 0)) AS unreachable_total'),DB::Raw('SUM(if(poultries.mobile_no LIKE "017%" && poultry_questions.call_status = 1, 1, 0)) AS grameen_1'),DB::Raw('SUM(if(poultries.mobile_no LIKE "013%" && poultry_questions.call_status = 1, 1, 0)) AS grameen_2'),DB::Raw('SUM(if(poultries.mobile_no LIKE "019%" && poultry_questions.call_status = 1, 1, 0)) AS banglalink_1'),DB::Raw('SUM(if(poultries.mobile_no LIKE "014%" && poultry_questions.call_status = 1, 1, 0)) AS banglalink_2'),DB::Raw('SUM(if(poultries.mobile_no LIKE "016%" && poultry_questions.call_status = 1, 1, 0)) AS airtel'),DB::Raw('SUM(if(poultries.mobile_no LIKE "018%" && poultry_questions.call_status = 1, 1, 0)) AS robi'),DB::Raw('SUM(if(poultries.mobile_no LIKE "015%" && poultry_questions.call_status = 1, 1, 0)) AS teletalk'),DB::Raw('SUM(if(poultry_questions.gi_1_1=1 && poultry_questions.call_status = 1, 1, 0)) AS male'),DB::Raw('SUM(if(poultry_questions.gi_1_1=2 && poultry_questions.call_status = 1, 1, 0)) AS female'))
                ->leftJoin('poultry_questions', function ($query) {
                    $query->on('poultries.id', 'poultry_questions.poultry_id');
                    $query->where('poultry_questions.deleted_at', null);
                });
            $question_details = PoultryQuestion::select(DB::Raw('SUM(if(call_status =0, 1, 0)) AS incomplete_total'),DB::Raw('SUM(if(call_status =2, 1, 0)) AS incompleteNotallow_total'),DB::Raw('SUM(if(call_status =1, 1, 0)) AS complete_total'),DB::Raw('SUM(if(call_status =3, 1, 0)) AS incompleteRefuse_total'),DB::Raw('user_id'),DB::Raw('SUM(if(s_0_2<18, 1, 0)) AS not_allow_age'),DB::Raw('SUM(if(s_0_3=0, 1, 0)) AS not_allow_city'),DB::Raw('SUM(if(s_0_4=0, 1, 0)) AS not_allow_year_city'),DB::Raw('SUM(if(sc_0_1=0, 1, 0)) AS not_agreed'),DB::Raw('SUM(if(sc_0_1=1, 1, 0)) AS agreed'));

            if (isset($_GET['start_date']) && $_GET['start_date'] != "" && isset($_GET['end_date']) && $_GET['end_date'] != "") {
                $poultry = $poultry->whereBetween('poultries.updated_at', [date('Y-m-d',strtotime($_GET['start_date']))." 00:00:00",date('Y-m-d',strtotime($_GET['end_date']))." 23:59:59"]);
                $question_details = $question_details->whereBetween('updated_at', [date('Y-m-d',strtotime($_GET['start_date']))." 00:00:00",date('Y-m-d',strtotime($_GET['end_date']))." 23:59:59"]);
            } else {
                $poultry = $poultry->whereBetween('poultries.updated_at', [date('Y-m-d')." 00:00:00", date('Y-m-d')." 23:59:59"]);
                $question_details = $question_details->whereBetween('updated_at', [date('Y-m-d')." 00:00:00", date('Y-m-d')." 23:59:59"]);
            }

            $poultry =$poultry->first();
            $question_details =$question_details->groupBy('user_id')->get()->keyBy('user_id');


            view()->share('users', $users);
            view()->share('poultry', $poultry);
            view()->share('question_details', $question_details);

        }
        if(session('project_id')==2) {
            $users = User::where('project_id', 2)->pluck('username','id');

            $encephality = Encephality::select(DB::Raw('SUM(if(encephalities.status =-1, 1, 0)) AS incall_total'),DB::Raw('SUM(if(encephalities.status =1, 1, 0)) AS done_total'),DB::Raw('SUM(if(encephalities.status= 2, 1, 0)) AS schedule_total'),DB::Raw('SUM(if(encephalities.status= 0, 1, 0)) AS remain_total'),DB::Raw('interview_id'));
            $question_details = Question::select(DB::Raw('SUM(if(call_status =0, 1, 0)) AS incomplete_total'),DB::Raw('SUM(if(call_status =2, 1, 0)) AS incompleteNotallow_total'),DB::Raw('SUM(if(call_status =1, 1, 0)) AS complete_total'),DB::Raw('SUM(if(call_status =3, 1, 0)) AS incompleteRefuse_total'),DB::Raw('user_id'));

            if (isset($_GET['start_date']) && $_GET['start_date'] != "" && isset($_GET['end_date']) && $_GET['end_date'] != "") {
                $encephality = $encephality->whereBetween('updated_at', [date('Y-m-d',strtotime($_GET['start_date']))." 00:00:00",date('Y-m-d',strtotime($_GET['end_date']))." 23:59:59"]);
                $question_details = $question_details->whereBetween('updated_at', [date('Y-m-d',strtotime($_GET['start_date']))." 00:00:00",date('Y-m-d',strtotime($_GET['end_date']))." 23:59:59"]);
            } else {
                $encephality = $encephality->whereBetween('updated_at', [date('Y-m-d')." 00:00:00", date('Y-m-d')." 23:59:59"]);
                $question_details = $question_details->whereBetween('updated_at', [date('Y-m-d')." 00:00:00", date('Y-m-d')." 23:59:59"]);
            }

            $encephality=$encephality->groupBy('interview_id')->get()->keyBy('interview_id');
            $question_details =$question_details->groupBy('user_id')->get()->keyBy('user_id');


            view()->share('users', $users);
            view()->share('encephality', $encephality);
            view()->share('question_details', $question_details);

        }
        if(session('project_id')==3) {
            $distrint_Area = [];
            $distrint_Area1 = \App\Dengue::select('area', 'id')->where('date_of_admission', '<>', null)->where('area', '<>', null)->groupby('area')->distinct()->pluck('area', 'id')->toArray();
            $area = ['Adabor', 'Azampur', 'Badda', 'Banani', 'Bangsal', 'Bimanbandar', 'Cantonment', 'Chowkbazar', 'Dakshin Khan', 'Darus Salam', 'Demra', 'Dhanmondi', 'Gendaria', 'Gulshan', 'Hazaribagh', 'Jatrabari', 'Kadamtali', 'Kafrul', 'Kalabagan', 'Kamrangirchar', 'Khilgaon', 'Khilkhet', 'Kotwali', 'Lalbagh', 'Mirpur', 'Mohammadpur', 'Motijheel', 'Mugda', 'New Market', 'Pallabi', 'Paltan', 'Panthapath', 'Ramna', 'Rampura', 'Rupnagar', 'Sabujbagh', 'Shah Ali', 'Shahjahanpur', 'Shahbagh', 'Sher-e-Bangla Nagar', 'Shyampur', 'Sutrapur', 'Tejgaon Industrial Area', 'Tejgaon', 'Turag', 'Uttar Khan', 'Uttara East', 'Uttara West', 'Bsahantek', 'Vatara', 'Wari'];
            foreach ($distrint_Area1 as $ar) {
                if (filter_var($ar, FILTER_VALIDATE_INT) === false) {
                    $distrint_Area[$ar] = $ar;
                } else {
                    $distrint_Area[$ar] = $area[$ar];
                }
            }
            $denguePie = array();
            foreach (Common::getDengueGenderType() as $key => $value):
                $denguePie[$key] = Dengue::where('sex', $key);
                if (isset($_GET['area']) && $_GET['area'] != "")
                    $denguePie[$key] = $denguePie[$key]->where('area', $_GET['area']);
                if (isset($_GET['start_date']) && $_GET['start_date'] != "" && isset($_GET['end_date']) && $_GET['end_date'] != "")
                    $denguePie[$key] = $denguePie[$key]->whereBetween('date_of_admission', [$_GET['start_date'], $_GET['end_date']]);
                else $denguePie[$key] = $denguePie[$key]->whereBetween('date_of_admission', [date('Y-m-d', strtotime('-6 days')), date('Y-m-d')]);

                $denguePie[$key] = $denguePie[$key]->count();
            endforeach;

            $denguebarCase = Dengue::select(DB::Raw('date_of_admission'), DB::Raw('count(id) as case_value'))->where('date_of_admission', '<>', null);
            $denguebar['0'] = Dengue::select('date_of_admission')->where('date_of_admission', '<>', null);
            $denguebar['1'] = Dengue::select(DB::Raw('date_of_admission'), DB::Raw('count(id) as case_value'))->where('date_of_admission', '<>', null)->whereBetween('age', array(0, 0.99));
            $denguebar['2'] = Dengue::select(DB::Raw('date_of_admission'), DB::Raw('count(id) as case_value'))->where('date_of_admission', '<>', null)->whereBetween('age', array(1, 4.99));
            $denguebar['3'] = Dengue::select(DB::Raw('date_of_admission'), DB::Raw('count(id) as case_value'))->where('date_of_admission', '<>', null)->whereBetween('age', array(5, 14.99));
            $denguebar['4'] = Dengue::select(DB::Raw('date_of_admission'), DB::Raw('count(id) as case_value'))->where('date_of_admission', '<>', null)->whereBetween('age', array(15, 24.99));
            $denguebar['5'] = Dengue::select(DB::Raw('date_of_admission'), DB::Raw('count(id) as case_value'))->where('date_of_admission', '<>', null)->whereBetween('age', array(25, 34.99));
            $denguebar['6'] = Dengue::select(DB::Raw('date_of_admission'), DB::Raw('count(id) as case_value'))->where('date_of_admission', '<>', null)->whereBetween('age', array(35, 44.99));
            $denguebar['7'] = Dengue::select(DB::Raw('date_of_admission'), DB::Raw('count(id) as case_value'))->where('date_of_admission', '<>', null)->whereBetween('age', array(45, 54.99));
            $denguebar['8'] = Dengue::select(DB::Raw('date_of_admission'), DB::Raw('count(id) as case_value'))->where('date_of_admission', '<>', null)->whereBetween('age', array(55, 64.99));
            $denguebar['9'] = Dengue::select(DB::Raw('date_of_admission'), DB::Raw('count(id) as case_value'))->where('date_of_admission', '<>', null)->where('age', '>', 64.99);

            if (isset($_GET['area']) && $_GET['area'] != "") {
                $denguebarCase = $denguebarCase->where('area', $_GET['area']);
                $denguebar['0'] = $denguebar['0']->where('area', $_GET['area']);
                $denguebar['1'] = $denguebar['1']->where('area', $_GET['area']);
                $denguebar['2'] = $denguebar['2']->where('area', $_GET['area']);
                $denguebar['3'] = $denguebar['3']->where('area', $_GET['area']);
                $denguebar['4'] = $denguebar['4']->where('area', $_GET['area']);
                $denguebar['5'] = $denguebar['5']->where('area', $_GET['area']);
                $denguebar['6'] = $denguebar['6']->where('area', $_GET['area']);
                $denguebar['7'] = $denguebar['7']->where('area', $_GET['area']);
                $denguebar['8'] = $denguebar['8']->where('area', $_GET['area']);
                $denguebar['9'] = $denguebar['9']->where('area', $_GET['area']);
            }
            if (isset($_GET['start_date']) && $_GET['start_date'] != "" && isset($_GET['end_date']) && $_GET['end_date'] != "") {
                $denguebarCase = $denguebarCase->whereBetween('date_of_admission', [$_GET['start_date'], $_GET['end_date']]);
                $denguebar['0'] = $denguebar['0']->whereBetween('date_of_admission', [$_GET['start_date'], $_GET['end_date']]);
                $denguebar['1'] = $denguebar['1']->whereBetween('date_of_admission', [$_GET['start_date'], $_GET['end_date']]);
                $denguebar['2'] = $denguebar['2']->whereBetween('date_of_admission', [$_GET['start_date'], $_GET['end_date']]);
                $denguebar['3'] = $denguebar['3']->whereBetween('date_of_admission', [$_GET['start_date'], $_GET['end_date']]);
                $denguebar['4'] = $denguebar['4']->whereBetween('date_of_admission', [$_GET['start_date'], $_GET['end_date']]);
                $denguebar['5'] = $denguebar['5']->whereBetween('date_of_admission', [$_GET['start_date'], $_GET['end_date']]);
                $denguebar['6'] = $denguebar['6']->whereBetween('date_of_admission', [$_GET['start_date'], $_GET['end_date']]);
                $denguebar['7'] = $denguebar['7']->whereBetween('date_of_admission', [$_GET['start_date'], $_GET['end_date']]);
                $denguebar['8'] = $denguebar['8']->whereBetween('date_of_admission', [$_GET['start_date'], $_GET['end_date']]);
                $denguebar['9'] = $denguebar['9']->whereBetween('date_of_admission', [$_GET['start_date'], $_GET['end_date']]);
            } else {
                $denguebarCase = $denguebarCase->whereBetween('date_of_admission', [date('Y-m-d', strtotime('-6 days')), date('Y-m-d')]);
                $denguebar['0'] = $denguebar['0']->whereBetween('date_of_admission', [date('Y-m-d', strtotime('-6 days')), date('Y-m-d')]);
                $denguebar['1'] = $denguebar['1']->whereBetween('date_of_admission', [date('Y-m-d', strtotime('-6 days')), date('Y-m-d')]);
                $denguebar['2'] = $denguebar['2']->whereBetween('date_of_admission', [date('Y-m-d', strtotime('-6 days')), date('Y-m-d')]);
                $denguebar['3'] = $denguebar['3']->whereBetween('date_of_admission', [date('Y-m-d', strtotime('-6 days')), date('Y-m-d')]);
                $denguebar['4'] = $denguebar['4']->whereBetween('date_of_admission', [date('Y-m-d', strtotime('-6 days')), date('Y-m-d')]);
                $denguebar['5'] = $denguebar['5']->whereBetween('date_of_admission', [date('Y-m-d', strtotime('-6 days')), date('Y-m-d')]);
                $denguebar['6'] = $denguebar['6']->whereBetween('date_of_admission', [date('Y-m-d', strtotime('-6 days')), date('Y-m-d')]);
                $denguebar['7'] = $denguebar['7']->whereBetween('date_of_admission', [date('Y-m-d', strtotime('-6 days')), date('Y-m-d')]);
                $denguebar['8'] = $denguebar['8']->whereBetween('date_of_admission', [date('Y-m-d', strtotime('-6 days')), date('Y-m-d')]);
                $denguebar['9'] = $denguebar['9']->whereBetween('date_of_admission', [date('Y-m-d', strtotime('-6 days')), date('Y-m-d')]);
            }

            $dengueageHis['1'] = $denguebar['1']->pluck('case_value');
            $dengueageHis['2'] = $denguebar['2']->pluck('case_value');
            $dengueageHis['3'] = $denguebar['3']->pluck('case_value');
            $dengueageHis['4'] = $denguebar['4']->pluck('case_value');
            $dengueageHis['5'] = $denguebar['5']->pluck('case_value');
            $dengueageHis['6'] = $denguebar['6']->pluck('case_value');
            $dengueageHis['7'] = $denguebar['7']->pluck('case_value');
            $dengueageHis['8'] = $denguebar['8']->pluck('case_value');
            $dengueageHis['9'] = $denguebar['9']->pluck('case_value');

            $denguebarCase = $denguebarCase->groupby('date_of_admission')->pluck('case_value', 'date_of_admission');
            $dengueAgeLine['0'] = $denguebar['0']->groupby('date_of_admission')->distinct()->orderBy('date_of_admission', 'asc')->get();
            $dengueAgeLine['1'] = $denguebar['1']->groupBy('date_of_admission')->pluck('case_value', 'date_of_admission');
            $dengueAgeLine['2'] = $denguebar['2']->groupBy('date_of_admission')->pluck('case_value', 'date_of_admission');
            $dengueAgeLine['3'] = $denguebar['3']->groupBy('date_of_admission')->pluck('case_value', 'date_of_admission');
            $dengueAgeLine['4'] = $denguebar['4']->groupBy('date_of_admission')->pluck('case_value', 'date_of_admission');
            $dengueAgeLine['5'] = $denguebar['5']->groupBy('date_of_admission')->pluck('case_value', 'date_of_admission');
            $dengueAgeLine['6'] = $denguebar['6']->groupBy('date_of_admission')->pluck('case_value', 'date_of_admission');
            $dengueAgeLine['7'] = $denguebar['7']->groupBy('date_of_admission')->pluck('case_value', 'date_of_admission');
            $dengueAgeLine['8'] = $denguebar['8']->groupBy('date_of_admission')->pluck('case_value', 'date_of_admission');
            $dengueAgeLine['9'] = $denguebar['9']->groupBy('date_of_admission')->pluck('case_value', 'date_of_admission');

            view()->share('area', $distrint_Area);
            view()->share('denguePie', $denguePie);
            view()->share('denguebarCase', $denguebarCase);
            view()->share('denguebar', $dengueAgeLine);
            view()->share('dengueAgeHis', $dengueageHis);
        }
        view()->share('breadcamps', array('Home' => url(session('access') . 'dashboard')));
        view()->share('pageTitle', "Dashboard");
        return view(session('access').'dashboard/index');
    }


    /**
     * @ Function Name          : profile
     * @ Route Name             : profile
     * @ Function Purpose  : To show your profile
     * @ Function Returns :
     */
    public function profile()
    {
        $this->checkrole();
        $data['pageTitle'] = "Employee Profile";
        $data['breadcamps'] = array('Home' => url(session('access').'dashboard'), 'Profile' => url(session('access').'profile'));
        $data['info'] = \Auth::User()->employee;

        return view(session('access').'dashboard/profile', $data);
    }

    /**
     * @ Function Name          : Log
     * @ Route Name             : log/{id}
     * @ Function Purpose  : To show user log
     * @ Function Returns :
     */
    public function logDetails($id)
    {
        $this->checkrole();
        $data['pageTitle'] = "Log Details";
        $data['breadcamps'] = array('Home' => url(session('access').'dashboard'), 'Log' => url(session('access').'log'));
        $data['info'] = User::where("username", $id)->first();
        $data['logs'] = Log::where('user_id',$data['info']->id)->get();

        return view(session('access').'dashboard/log', $data);
    }

    /**
     * @ Function Name          : ChangePassword
     * @ Route Name             : Change-Password
     * @ Function Purpose  :  change admin password
     * @ Function Returns :
     */
    public function ChangePassword()
    {
        $this->checkrole();
        if ($_POST) {
            $validationRules = array(
                'old-password' => 'required',
                'password' => 'required|min:8|confirmed',
                'password_confirmation' => 'required|min:8',
            );

            $validationMessages = array(
                'required' => 'The :attribute required a value'
            );

            $validator = Validator::make(Input::all(), $validationRules, $validationMessages);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            } else {
                $data = Input::get();
                $admin = \Auth::User();

                if ($admin['original']['password'] === md5($data['old-password'])) {

                    if ($admin['original']['password'] === md5($data['password'])) {
                        Session::flash('message', 'You provide current password to set as new password !');
                        Session::flash('alert-class', 'alert-danger');
                        return redirect(URL::to('change-password'));
                    } else {
                        $admin->password = md5($data['password']);
                        $admin->save();
                        Session::flash('message', 'Your Password Update Successfully ! ');
                        Session::flash('alert-class', 'alert-success');
                        return redirect(URL::to('change-password'));
                    }
                } else {
                    Session::flash('message', 'Please provide your correct current password ! ');
                    Session::flash('alert-class', 'alert-danger');
                    return redirect()->back()->withErrors($validator)->withInput();
                }
            }
        }
        $data['pageTitle'] = "Update Password";
        $data['breadcamps'] = array('Home' => url(session('access').'dashboard'), 'Update Password' => url(session('access').'change-password'));
        return view(session('access').'dashboard/changepassword', $data);
    }

    /**
     * @ Function Name          : logout
     * @ Route Name             : logout
     * @ Function Purpose  :  it will destroy session
     * @ Function Returns :
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $logs=Log::where('user_id', session('user')->id)->where('logout', null)->orderBy('id','desc')->first();
        $logs->logout=date('Y-m-d H:m:i');
        $logs->save();
        $request->session()->flush();
        return redirect('login')->send();
    }

    public function selectLanguage(Request $request){
        session(['language' => $request->get('language')]);
    }
    public function selectProject(Request $request){
        session(['project_id' => $request->get('project_id')]);
    }
    function checkrole(){

        $access=session('accesslist_id');

        if(in_array(1,$access)|| in_array(2,$access)){
//            return redirect(session('access').'home')->send();
        }
        else
            return redirect(session('access').'dashboard')->send();
    }

}
