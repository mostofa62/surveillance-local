<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\SampleAck;
use App\Models\CaseInfo;

class SampleAckController extends Controller
{

    use \App\Http\Controllers\Traits\Paginator;

    /*
    public function index(Request $request)
    {



    	$model = SampleAck::orderBy('id', 'desc');


    	$model=$model->paginate(20); 

    	$pagetitle="Sample Lists";

    	view()->share('pageTitle', $pagetitle);
        view()->share('models', $model);
        view()->share('breadcamps', array('Home' => url(session('access').'dashboard'), 'Sample List' => url(session('access').'sample')));
        return view('user/sample/index');

    }*/

    public function index(Request $request)
    {

        $extra_query="";
        $extra_query_count = "";

        if(isset($request->spec_c_date)){
            $extra_query.=" where spec_c_date = '$request->spec_c_date'";
            $extra_query_count.=" and spec_c_date = '$request->spec_c_date'";
        }
        else if(isset($request->id)){
            $extra_query.=" where case_info.lab_id = '$request->id'";
            $extra_query_count.=" and case_info.lab_id = '$request->id'";
        }
        else if(isset($request->result_at)){
            $extra_query.=" where date(result_at) = '$request->result_at'";
            $extra_query_count.=" and date(result_at) = '$request->result_at'";
        }

        //$model = CaseInfo::orderBy('id', 'desc');
        $raw_query = "SELECT case_info.id as caseid,case_info.name,case_info.lab_id, case_info.age,case_info.sex, case_info.created_at, covid_sample_ack.*,areas.eng_name as district FROM case_info JOIN covid_sample_ack ON covid_sample_ack.selective_case_id = case_info.id
        LEFT JOIN areas on areas.id = case_info.dis $extra_query
        ORDER BY case_info.id DESC";
        $model = DB::select($raw_query);
        $model = $this->arrayPaginator($model, $request,100);


        //$model=$model->paginate(20);
        $base = DB::table('covid_sample_ack')->join('case_info', 
            function ($join) { 
                $join->on('case_info.id', '=', 'covid_sample_ack.selective_case_id');
            });



        $sum_data = [
            'sc'=>$base->whereRaw("stage1=1 $extra_query_count")->count("stage1"),
            'st'=>$base->whereRaw("stage4=1 $extra_query_count")->count("stage4"),
            'rt'=>$base->whereRaw("stage7=1 $extra_query_count")->count("stage7")
        ];

        view()->share('sum_data', $sum_data); 

        $pagetitle="Case Lists";

        view()->share('pageTitle', $pagetitle);
        view()->share('models', $model);
        view()->share('breadcamps', array('Home' => url(session('access').'dashboard'), 'Case List' => url(session('access').'sample')));
        return view('user/sample/index');


    }

    public function listreport(Request $request)
    {

        

        $extra_query=""; 

        if(isset($request->lab_id)){
            $extra_query.="and lab_id='$request->lab_id'";
        }

        if(isset($request->name)){
            $extra_query.="and case_info.name like '%$request->name%'";
        }

        if(isset($request->mob)){
            $extra_query.="and name = '$request->mob'";
        }

        if(isset($request->coll_from)){
            $extra_query.="and coll_from = $request->coll_from";
        }

        if(isset($request->spec_c_date)){
            $extra_query.="and spec_c_date = '$request->spec_c_date'";
        }


        $raw_query = "SELECT covid_sample_ack.id as cskid,case_info.id csid,lab_id, name,mob, email,age,sex,spec_c_date,stage4, stage5,stage6,stage7 FROM `covid_sample_ack`
JOIN case_info on case_info.id = covid_sample_ack.selective_case_id where case_info.result=0 and date(case_info.result_at)<'2020-04-09'  $extra_query";

        $model = DB::select($raw_query);
        $counted = count($model);
        $model = $this->arrayPaginator($model, $request,20);

        $pagetitle="Result Stage";
        $gender = [0=>'Male',1=>'Female'];
        $collection_from = [0=>'Home',1=>'Hospitals'];



        view()->share('pageTitle', $pagetitle);
        view()->share('models', $model);
        view()->share('gender', $gender);
        view()->share('counted', $counted);
        view()->share('collection_from', $collection_from);
        view()->share('breadcamps', array('Home' => url(session('access').'dashboard'), 'Case List' => url(session('access').'sample')));
        return view(session('access').'sample/listreport');

    }

    public function listreportEx(Request $request)
    {

        

        $extra_query=""; 

        if(isset($request->lab_id)){
            $extra_query.="and lab_id='$request->lab_id'";
        }

        if(isset($request->name)){
            $extra_query.="and case_info.name like '%$request->name%'";
        }

        if(isset($request->mob)){
            $extra_query.="and name = '$request->mob'";
        }

        if(isset($request->coll_from)){
            $extra_query.="and coll_from = $request->coll_from";
        }

        if(isset($request->spec_c_date)){
            $extra_query.="and spec_c_date = '$request->spec_c_date'";
        }

        if(isset($request->result_at)){
            $extra_query.="and date(result_at) = '$request->result_at'";
        }


        $raw_query = "SELECT covid_sample_ack.id as cskid,case_info.id csid,lab_id, name,mob, email,age,result,sex,spec_c_date,stage4, stage5,stage6,stage7 FROM `covid_sample_ack`
JOIN case_info on case_info.id = covid_sample_ack.selective_case_id where date(case_info.result_at)>'2020-04-08' and stage6=1 $extra_query ORDER BY covid_sample_ack.stage7 DESC";

        $model = DB::select($raw_query);
        $counted = count($model);
        $model = $this->arrayPaginator($model, $request,20);

        $pagetitle="Result Stage";
        $gender = [0=>'Male',1=>'Female'];
        $collection_from = [0=>'Home',1=>'Hospitals'];


        view()->share('updated', true);
        view()->share('pageTitle', $pagetitle);
        view()->share('models', $model);
        view()->share('gender', $gender);
        view()->share('counted', $counted);
        view()->share('collection_from', $collection_from);
        view()->share('breadcamps', array('Home' => url(session('access').'dashboard'), 'Case List' => url(session('access').'sample')));
        return view(session('access').'sample/listreport');

    }

    //postitive
    public function listreportpos(Request $request)
    {

        

        $extra_query=""; 

        if(isset($request->lab_id)){
            $extra_query.="and lab_id='$request->lab_id'";
        }

        if(isset($request->name)){
            $extra_query.="and case_info.name like '%$request->name%'";
        }

        if(isset($request->mob)){
            $extra_query.="and name = '$request->mob'";
        }

        if(isset($request->coll_from)){
            $extra_query.="and coll_from = $request->coll_from";
        }

        if(isset($request->spec_c_date)){
            $extra_query.="and spec_c_date = '$request->spec_c_date'";
        }
        if(isset($request->result_at)){
            $extra_query.="and date(result_at) = '$request->result_at'";
        }


        $raw_query = "SELECT covid_sample_ack.id as cskid,case_info.id csid,lab_id, name,mob, email,age,sex,spec_c_date,cls_id,stage4, stage5,stage6,stage7 FROM `covid_sample_ack`
JOIN case_info on case_info.id = covid_sample_ack.selective_case_id where case_info.result=1 and date(case_info.result_at)<'2020-04-09' $extra_query";

        $model = DB::select($raw_query);
        $counted = count($model);
        $model = $this->arrayPaginator($model, $request,20);

        $pagetitle="Result Stage Positive";
        $gender = [0=>'Male',1=>'Female'];
        $collection_from = [0=>'Home',1=>'Hospitals'];



        view()->share('pageTitle', $pagetitle);
        view()->share('models', $model);
        view()->share('gender', $gender);
        view()->share('counted', $counted);
        view()->share('collection_from', $collection_from);
        view()->share('breadcamps', array('Home' => url(session('access').'dashboard'), 'Case List' => url(session('access').'sample')));
        return view(session('access').'sample/listreportpos');

    }

    public function listreportposEx(Request $request)
    {

        

        $extra_query=""; 

        if(isset($request->lab_id)){
            $extra_query.="and lab_id='$request->lab_id'";
        }

        if(isset($request->name)){
            $extra_query.="and case_info.name like '%$request->name%'";
        }

        if(isset($request->mob)){
            $extra_query.="and name = '$request->mob'";
        }

        if(isset($request->coll_from)){
            $extra_query.="and coll_from = $request->coll_from";
        }

        if(isset($request->spec_c_date)){
            $extra_query.="and spec_c_date = '$request->spec_c_date'";
        }
        if(isset($request->result_at)){
            $extra_query.="and date(result_at) = '$request->result_at'";
        }


        $raw_query = "SELECT covid_sample_ack.id as cskid,case_info.id csid,lab_id, name,mob, email,age,sex,cls,cls_id,spec_c_date,stage4, stage5,stage6,stage7 FROM `covid_sample_ack`JOIN case_info on case_info.id = covid_sample_ack.selective_case_id where case_info.result=1 and date(case_info.result_at)>'2020-04-08' and stage6=1  $extra_query ORDER BY case_info.result_at desc";

        $model = DB::select($raw_query);
        $counted = count($model);
        $model = $this->arrayPaginator($model, $request,20);

        $pagetitle="Result Stage Positive";
        $gender = [0=>'Male',1=>'Female'];
        $cls_status = [0=>'New',1=>'Followup',2=>'Contact',3=>'Death'];
        $collection_from = [0=>'Home',1=>'Hospitals'];


        view()->share('updated', true);
        view()->share('pageTitle', $pagetitle);
        view()->share('models', $model);
        view()->share('gender', $gender);
        view()->share('cls_status', $cls_status);
        view()->share('counted', $counted);
        view()->share('collection_from', $collection_from);
        view()->share('breadcamps', array('Home' => url(session('access').'dashboard'), 'Case List' => url(session('access').'sample')));
        return view(session('access').'sample/listreportpos');

    }




    public function reportupdate(Request $request){
        $model  = SampleAck::find($request->input('id'));
        //$model->fill($request->all());
        if($request->input('stage6')){
            $model->stage6 = $request->input('stage6');
            $model->stage6_by = \Auth::User()->id;
        }


        
        $model->stage7 = $request->input('stage7');
        $model->stage7_by = \Auth::User()->id;
        $result = null;

        $case_info = DB::table('case_info')->select('lab_id','name','email')->find($model->selective_case_id);
        if(isset($case_info) &&  !empty($case_info->email)){

            $tkn  = urlencode('abc911');
            $lab_id = urlencode($case_info->lab_id);
            $to = urlencode($case_info->email);
            $name = urlencode($case_info->name);
            
            $context = stream_context_create(array(
                'http' => array('ignore_errors' => true),
            ));

            $result = json_decode(file_get_contents("http://119.40.84.187/covid/sentmail.php?tkn=$tkn&lab_id=$lab_id&to=$to&name=$name", false, $context),true);
        
            //var_dump($result); die();
            $success =0;
            if(isset($result['success']) && $result['success'] > 0){
            $success = $model->save()?1:0;
            return response()->json(['msg' => 'Case Saved', 'success' => $success]);
            }else{
                $model->save();
                return response()->json(['msg' => 'Case saved without mail', 'success' => $success]);
            }

        

            //$success = 1;
            
            //$data = $request->json()->all();
            //$data = $request->all();
            //var_dump($model);
        }else{
            $model->save();
            return response()->json(['msg' => 'Case Saved without mail', 'success' => 0]);
        }
    }

    //list report lab
    //postitive
    public function listreportlab(Request $request)
    {

        $access=session('accesslist_id');
        $project_id = session('user')->project_id;
        $extra_query = "and stage5=0";
        $final = false;
        if($project_id!=8){
            return redirect('login')->send();
        }
        if( in_array(9,$access) ){
            $extra_query  = "and stage5=1 and stage6=0 and date(case_info.result_at)>'2020-04-08'";
            $final = true;
        }

        $raw_query = "SELECT covid_sample_ack.id as cskid,case_info.id csid,lab_id, name,mob,age,sex,spec_c_date FROM `covid_sample_ack`
JOIN case_info on case_info.id = covid_sample_ack.selective_case_id where case_info.result is not null $extra_query";

        $model = DB::select($raw_query);
        //$counted = count($model);
        $model = $this->arrayPaginator($model, $request,20);

        $pagetitle="Result Stage";
        $gender = [0=>'Male',1=>'Female'];
        $collection_from = [0=>'Home',1=>'Hospitals'];



        view()->share('pageTitle', $pagetitle);
        view()->share('models', $model);
        view()->share('gender', $gender);
        view()->share('final', $final);
        //view()->share('counted', $counted);
        view()->share('collection_from', $collection_from);
        view()->share('breadcamps', array('Home' => url(session('access').'dashboard'), 'Case List' => url(session('access').'sample')));
        return view(session('access').'sample/listreportlab');

    }

    public function reportupdatelab(Request $request){
        $model  = SampleAck::find($request->input('id'));
        //$model->fill($request->all());
        $access=session('accesslist_id');
        
        
        
        if( in_array(9,$access) ){
            $model->stage6 = $request->input('stage5');
            $model->stage6_by = \Auth::User()->id;
        }else{
            $model->stage5 = $request->input('stage5');
            $model->stage5_by = \Auth::User()->id;
        }
        
        
        
        $success = $model->save()? 1: 0;
        //$success = 1;
        return response()->json(['msg' => 'Case Saved', 'success' => $success]);
        //$data = $request->json()->all();
        //$data = $request->all();
        //var_dump($model);
    }
    /*

    public function test(){
        

        $case_info = DB::table('case_info')->select('lab_id','name','email')->find(512);
        if(isset($case_info) &&  !empty($case_info->email)){

            $tkn  = urlencode('abc911');
            $lab_id = urlencode('51134');
            $to = urlencode('golammostofa31188@gmail.com');
            $name = urlencode($case_info->email);
            $context = stream_context_create(array(
                'http' => array('ignore_errors' => true),
            ));
            $context = stream_context_create(array(
                'http' => array('ignore_errors' => true),
            ));

            $result = json_decode(file_get_contents("http://119.40.84.187/covid/sentmail.php?tkn=$tkn&lab_id=$lab_id&to=$to&name=$name", false, $context),true);
        }
        
    }*/

    public function casedata(Request $request){

            $return = [                
                'msg'=>'Please provide api key and entry_date in format yyyy-mm-dd'
            ];

            if( $request->input('api_key') &&  $request->input('entry_date') ){

                if($request->input('api_key') != 'DG8345'){

                    $return['msg'] = 'API KEY NOT MATCHED';
                    return $return;
                }

                $pathToFile = "C:\\xampp\\htdocs\\jsongen\\".$request->input('entry_date').".json";

                if(!file_exists($pathToFile)){
                    $return['msg'] = 'DATA FILE NOT EXITS ACCORADING TO DATE';
                    return $return;
                }else{
                    $file = \File::get($pathToFile);
                       $response = \Response::make($file, 200);
                       $response->header('Content-Type', 'application/json');
                       return $response;
                }



            }

            return $return;

    }

}
