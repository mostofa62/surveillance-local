<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Carbon\Carbon;

use App\Models\Rammps;
use App\Models\RammpsQuestion as Question;
use App\Models\RammpsQuestionCovid as CovidQuestion;
class RammpsController extends Controller{


	public function index(){

		view()->share('pageTitle', "Rammps Form");
		view()->share('breadcamps', array('Home' => url(session('access').'dashboard')));

    	$user_id=\Auth::User()->id;
    	$rammps = Rammps::where('status',-1)
            ->where('interview_id',$user_id)            
            ->first();

        if(!isset($rammps)){
         $rammps = Rammps::where('status',0)->first();
        }

        if(isset($rammps)) {



        	//\DB::transaction(function () {
		      //$rammps = IvrIncomplete::where('status',0)->lockForUpdate()->first();
		      $rammps->interview_id=\Auth::User()->id;
		      $rammps->session_started=Carbon::now();		      
		      $rammps->status=-1;
		      $rammps->save();
		     //});


               

        }else{
        	view()->share('rammps', null);
        }

        view()->share('rammps', $rammps);

        return view(session('access').'rammps/initiate');


	}


	public function question($id,Request $request){

		if($request->isMethod('post')){


			$totalDuration = 0;
			$rammps = Rammps::find($id);
			$question=Question::where('rammps_id',$id)->first();
			$question_covid = CovidQuestion::where('rammps_id',$id)->get();

			if(!isset($question))
                $question = new Question();

            //$death_data = $this->death_covid($request->input('cdeath'));
            /*foreach ($request->input('cdeath') as $value) {

            	$death_data[]=array(
            		'rammps_id'=>$id,
            		'name'=>$value[0],
            		'd_of_covid'=>$value[1]
            	);
            	
            }*/
            




            /*$question->rammps_id = $id;
            $input = $request->all();
            $fillable = $question->getFillable();
            $question->filled($fillable, $input);
            $question->user_id = \Auth::User()->id;
            $question->save();

            $rammps->interview_id = $question->user_id;
            $rammps->save();*/



            return array(
                'success'=>true,
                'message'=>'সফলভাবে সংরক্ষিত',
                //'death_data'=>$death_data,
                'request_data'=>$request->input('cdeath')
            );   



		}else{
			$rammps = Rammps::find($id);
			$question=Question::where('rammps_id',$id)->first();

		view()->share('pageTitle', "Rammps Question Form");
        view()->share('breadcamps', array('Home' => url(session('access').'dashboard'), 'CATI Contact' => url(session('access').'rammps'), "Call Initiate Form" => url(session('access').'rammps/callInitiate'), "Question Form" => url(session('access').'rammps/question/'.$id)));	


		view()->share('id', $id);

		view()->share('question', $question);
		view()->share('rammps', $rammps);
        //view()->share('previous_respondent', $previous_respondent);
		return view(session('access').'rammps/question');

		}


		


	}

	private function death_covid($a){
		$data = array();
		$i=0;
		$a =array_values($a);		
		while($i<count($a[0]))  {
		  $data_arr = array();
		  
		  for($x=0;$x<count($a);$x++){
		    array_push($data_arr,$a[$x][$i]);
		  }
		  array_push($data,$data_arr);
		  $i++;
		}

		return $data;

	}
}