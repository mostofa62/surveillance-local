<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\CaseInfo;
use App\Models\SampleAck;
use App\Http\Controllers\Controller;
use App\User;

class CaseInfoController extends Controller
{
    public $successStatus = 200;

    public function index(Request $request)
    {

    	$validator = \Validator::make($request->all(), [ 
          'lab_id' => 'unique:case_info',          
        ]);


        if ($validator->fails()) {

            $errors = $validator->errors();

            return response()->json(['msg' =>$errors->first('lab_id') , 'success' => 400]);
        }    

        $model  = new CaseInfo();
        
    	// $model->fill($request->json()->all());
        $model->fill($request->all());
        //$model->lng = $request->input('lng');
        //$model->lat = $request->input('lat');

        if ($model->lab_id>76000 && preg_match("/^76/", $model->lab_id, $match)){
            $model->email = "icovidverify@gmail.com";
        }

    	if($model->save()){
            $SampleAck = new SampleAck();
            $SampleAck->selective_case_id = $model->id;
            $SampleAck->stage1 = 1;
            $SampleAck->stage2 = 1;
            $SampleAck->stage3 = 1;
            $SampleAck->stage1_by = $model->user_id;
            $SampleAck->stage2_by = $model->user_id;
            $SampleAck->stage3_by = $model->user_id;
            $SampleAck->save();
    		return response()->json(['msg' => 'Case Saved', 'success' => $this->successStatus]);

    	}else{
    		return response()->json(['msg' => 'Case Not Saved', 'success' => 202]);
    	}

    }

    public function update(Request $request,$id)
    {

        
        $model  = CaseInfo::find($id);

        if($this->nullchecker($model->result)){
            $model->email = $request->email;
            $model->save();
            return response()->json(['msg' => 'Only Email Can be updated, due to Result published Already', 'success' => 202]);
        }

        $model->fill($request->all());
        if ($model->lab_id>76000 && preg_match("/^76/", $model->lab_id, $match)){
            $model->email = "icovidverify@gmail.com";
        }


        if($model->save()){
            return response()->json(['msg' => 'Case Saved', 'success' => $this->successStatus]);

        }else{
            return response()->json(['msg' => 'Case Not Saved', 'success' => 202]);
        }

    }

    protected function nullchecker($id){
        //return isset($id) && ((int)$id == 0 || (int)$id == 1 || (int)$id == 2) ? true : 
        //false;
        return isset($id) ? true:false;
        //return !isset($id) || $id=='null' || $id=="null" || $id==='null' || $id==="null" ||  $id == null || empty($id) || strcmp($id,"null")==0;
    }

    public function list(Request $request){
        

        $model = CaseInfo::orderBy('id', 'desc');

        if ($request->id) {
            $model = $model->where('lab_id','=',  $request->id);
        }

        if ($request->name) {
            $model = $model->where('name', 'like', '%' . $request->name . '%');            
        }

        if ($request->dat) {
            $model = $model->where('spec_c_date', '=', $request->dat );
            $model = $model->orWhereRaw("date(created_at) = '$request->dat'");                    
        }

        
        

        if ($request->cls_id) {
            $model = $model->where('cls_id','=',  $request->cls_id);
        }


        if ($request->u_id) {
            //$model = $model->where('user_id','=',  $request->u_id);
            $user = User::find($request->u_id);
            if($user->accesslist_id=='["10"]' || $user->accesslist_id=='["12"]' || $user->accesslist_id=='["13"]'){
                $model = $model->where('user_id','=',  $request->u_id);
            }
        }

        return $model->paginate(20);

    }


}
