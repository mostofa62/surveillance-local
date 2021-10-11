<?php

namespace App\Http\Controllers;

use App\Common;
use App\Dengue;
use Illuminate\Http\Request;

use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function async(){
        $data['pageTitle'] = "Covid Public Dashboard";
        $data['datas'] = DB::table('test_booth')->get();
        return view('async', $data);
    }

    public function asyncupdate(Request $request){
         $id =  $request->input('id');
         $data = DB::table('test_booth')->where(
            [
                'id'=>$id,
                'status'=>1
            ]
         )->first();

         return ['data'=>$data];

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function dengue()
    {
        $data['pageTitle'] = "Dengue Public Dashboard";
        $distinct_Area=[];
        $distinct_Area1=Dengue::select('area','id')->where('date_of_admission','<>',null)->where('area','<>',null)->groupby('area')->distinct()->pluck('area', 'id')->toArray();
        $area=['Adabor', 'Azampur', 'Badda', 'Banani', 'Bangsal', 'Bimanbandar', 'Cantonment', 'Chowkbazar', 'Dakshin Khan', 'Darus Salam', 'Demra', 'Dhanmondi', 'Gendaria', 'Gulshan', 'Hazaribagh', 'Jatrabari', 'Kadamtali', 'Kafrul', 'Kalabagan', 'Kamrangirchar', 'Khilgaon', 'Khilkhet', 'Kotwali', 'Lalbagh', 'Mirpur', 'Mohammadpur', 'Motijheel', 'Mugda', 'New Market', 'Pallabi', 'Paltan', 'Panthapath', 'Ramna', 'Rampura', 'Rupnagar', 'Sabujbagh', 'Shah Ali', 'Shahjahanpur', 'Shahbagh', 'Sher-e-Bangla Nagar', 'Shyampur', 'Sutrapur', 'Tejgaon Industrial Area', 'Tejgaon', 'Turag', 'Uttar Khan', 'Uttara East', 'Uttara West', 'Bsahantek', 'Vatara', 'Wari'];
        foreach ($distinct_Area1 as $ar){
            if ( filter_var($ar, FILTER_VALIDATE_INT) === false ) {
                $distinct_Area[$ar]=$ar;
            }else{
                $distinct_Area[$ar]=$area[$ar];
            }

        }
        view()->share('area', $distinct_Area);


        $denguePie=array();
        foreach (Common::getDengueGenderType() as $key => $value):
            $denguePie[$key]= Dengue::where('sex',$key);
            if(isset($_GET['area'])&&$_GET['area']!="")
                $denguePie[$key]=$denguePie[$key]->where('area',$_GET['area']);
            if(isset($_GET['start_date'])&&$_GET['start_date']!=""&& isset($_GET['end_date'])&&$_GET['end_date']!="")
                $denguePie[$key]=$denguePie[$key]->whereBetween('date_of_admission',[$_GET['start_date'],$_GET['end_date']]);
            else $denguePie[$key]=$denguePie[$key]->whereBetween('date_of_admission',[date('Y-m-d', strtotime('-6 days')),date('Y-m-d')]);

            $denguePie[$key]=$denguePie[$key]->count();
        endforeach;

        $denguebarCase= Dengue::select(DB::Raw('date_of_admission'), DB::Raw('count(id) as case_value'))->where('date_of_admission','<>',null);
        $denguebar['0']= Dengue::select('date_of_admission')->where('date_of_admission','<>',null);
        $denguebar['1']= Dengue::select(DB::Raw('date_of_admission'), DB::Raw('count(id) as case_value'))->where('date_of_admission','<>',null)->whereBetween('age',array(0,0.99));
        $denguebar['2']= Dengue::select(DB::Raw('date_of_admission'), DB::Raw('count(id) as case_value'))->where('date_of_admission','<>',null)->whereBetween('age',array(1,4.99));
        $denguebar['3']= Dengue::select(DB::Raw('date_of_admission'), DB::Raw('count(id) as case_value'))->where('date_of_admission','<>',null)->whereBetween('age',array(5,14.99));
        $denguebar['4']= Dengue::select(DB::Raw('date_of_admission'), DB::Raw('count(id) as case_value'))->where('date_of_admission','<>',null)->whereBetween('age',array(15,24.99));
        $denguebar['5']= Dengue::select(DB::Raw('date_of_admission'), DB::Raw('count(id) as case_value'))->where('date_of_admission','<>',null)->whereBetween('age',array(25,34.99));
        $denguebar['6']= Dengue::select(DB::Raw('date_of_admission'), DB::Raw('count(id) as case_value'))->where('date_of_admission','<>',null)->whereBetween('age',array(35,44.99));
        $denguebar['7']= Dengue::select(DB::Raw('date_of_admission'), DB::Raw('count(id) as case_value'))->where('date_of_admission','<>',null)->whereBetween('age',array(45,54.99));
        $denguebar['8']= Dengue::select(DB::Raw('date_of_admission'), DB::Raw('count(id) as case_value'))->where('date_of_admission','<>',null)->whereBetween('age',array(55,64.99));
        $denguebar['9']= Dengue::select(DB::Raw('date_of_admission'), DB::Raw('count(id) as case_value'))->where('date_of_admission','<>',null)->where('age','>',64.99);

        if(isset($_GET['area']) && $_GET['area']!="") {
            $denguebarCase= $denguebarCase->where('area', $_GET['area']);
            $denguebar['0']= $denguebar['0']->where('area', $_GET['area']);
            $denguebar['1']= $denguebar['1']->where('area', $_GET['area']);
            $denguebar['2']= $denguebar['2']->where('area', $_GET['area']);
            $denguebar['3']= $denguebar['3']->where('area', $_GET['area']);
            $denguebar['4']= $denguebar['4']->where('area', $_GET['area']);
            $denguebar['5']= $denguebar['5']->where('area', $_GET['area']);
            $denguebar['6']= $denguebar['6']->where('area', $_GET['area']);
            $denguebar['7']= $denguebar['7']->where('area', $_GET['area']);
            $denguebar['8']= $denguebar['8']->where('area', $_GET['area']);
            $denguebar['9']= $denguebar['9']->where('area', $_GET['area']);
        }
        if(isset($_GET['start_date'])&&$_GET['start_date']!=""&& isset($_GET['end_date'])&&$_GET['end_date']!="") {
            $denguebarCase= $denguebarCase->whereBetween('date_of_admission', [$_GET['start_date'], $_GET['end_date']]);
            $denguebar['0']= $denguebar['0']->whereBetween('date_of_admission', [$_GET['start_date'], $_GET['end_date']]);
            $denguebar['1']= $denguebar['1']->whereBetween('date_of_admission', [$_GET['start_date'], $_GET['end_date']]);
            $denguebar['2']= $denguebar['2']->whereBetween('date_of_admission', [$_GET['start_date'], $_GET['end_date']]);
            $denguebar['3']= $denguebar['3']->whereBetween('date_of_admission', [$_GET['start_date'], $_GET['end_date']]);
            $denguebar['4']= $denguebar['4']->whereBetween('date_of_admission', [$_GET['start_date'], $_GET['end_date']]);
            $denguebar['5']= $denguebar['5']->whereBetween('date_of_admission', [$_GET['start_date'], $_GET['end_date']]);
            $denguebar['6']= $denguebar['6']->whereBetween('date_of_admission', [$_GET['start_date'], $_GET['end_date']]);
            $denguebar['7']= $denguebar['7']->whereBetween('date_of_admission', [$_GET['start_date'], $_GET['end_date']]);
            $denguebar['8']= $denguebar['8']->whereBetween('date_of_admission', [$_GET['start_date'], $_GET['end_date']]);
            $denguebar['9']= $denguebar['9']->whereBetween('date_of_admission', [$_GET['start_date'], $_GET['end_date']]);
        }else {
            $denguebarCase= $denguebarCase->whereBetween('date_of_admission',[date('Y-m-d', strtotime('-6 days')),date('Y-m-d')]);
            $denguebar['0']= $denguebar['0']->whereBetween('date_of_admission',[date('Y-m-d', strtotime('-6 days')),date('Y-m-d')]);
            $denguebar['1']= $denguebar['1']->whereBetween('date_of_admission',[date('Y-m-d', strtotime('-6 days')),date('Y-m-d')]);
            $denguebar['2']= $denguebar['2']->whereBetween('date_of_admission',[date('Y-m-d', strtotime('-6 days')),date('Y-m-d')]);
            $denguebar['3']= $denguebar['3']->whereBetween('date_of_admission',[date('Y-m-d', strtotime('-6 days')),date('Y-m-d')]);
            $denguebar['4']= $denguebar['4']->whereBetween('date_of_admission',[date('Y-m-d', strtotime('-6 days')),date('Y-m-d')]);
            $denguebar['5']= $denguebar['5']->whereBetween('date_of_admission',[date('Y-m-d', strtotime('-6 days')),date('Y-m-d')]);
            $denguebar['6']= $denguebar['6']->whereBetween('date_of_admission',[date('Y-m-d', strtotime('-6 days')),date('Y-m-d')]);
            $denguebar['7']= $denguebar['7']->whereBetween('date_of_admission',[date('Y-m-d', strtotime('-6 days')),date('Y-m-d')]);
            $denguebar['8']= $denguebar['8']->whereBetween('date_of_admission',[date('Y-m-d', strtotime('-6 days')),date('Y-m-d')]);
            $denguebar['9']= $denguebar['9']->whereBetween('date_of_admission',[date('Y-m-d', strtotime('-6 days')),date('Y-m-d')]);
        }

        $dengueageHis['1']= $denguebar['1']->pluck('case_value');
        $dengueageHis['2']= $denguebar['2']->pluck('case_value');
        $dengueageHis['3']= $denguebar['3']->pluck('case_value');
        $dengueageHis['4']= $denguebar['4']->pluck('case_value');
        $dengueageHis['5']= $denguebar['5']->pluck('case_value');
        $dengueageHis['6']= $denguebar['6']->pluck('case_value');
        $dengueageHis['7']= $denguebar['7']->pluck('case_value');
        $dengueageHis['8']= $denguebar['8']->pluck('case_value');
        $dengueageHis['9']= $denguebar['9']->pluck('case_value');

        $denguebarCase= $denguebarCase->groupby('date_of_admission')->pluck('case_value','date_of_admission');
        $dengueAgeLine['0']= $denguebar['0']->groupby('date_of_admission')->distinct()->orderBy('date_of_admission','asc')->get();
        $dengueAgeLine['1']= $denguebar['1']->groupBy('date_of_admission')->pluck('case_value','date_of_admission');
        $dengueAgeLine['2']= $denguebar['2']->groupBy('date_of_admission')->pluck('case_value','date_of_admission');
        $dengueAgeLine['3']= $denguebar['3']->groupBy('date_of_admission')->pluck('case_value','date_of_admission');
        $dengueAgeLine['4']= $denguebar['4']->groupBy('date_of_admission')->pluck('case_value','date_of_admission');
        $dengueAgeLine['5']= $denguebar['5']->groupBy('date_of_admission')->pluck('case_value','date_of_admission');
        $dengueAgeLine['6']= $denguebar['6']->groupBy('date_of_admission')->pluck('case_value','date_of_admission');
        $dengueAgeLine['7']= $denguebar['7']->groupBy('date_of_admission')->pluck('case_value','date_of_admission');
        $dengueAgeLine['8']= $denguebar['8']->groupBy('date_of_admission')->pluck('case_value','date_of_admission');
        $dengueAgeLine['9']= $denguebar['9']->groupBy('date_of_admission')->pluck('case_value','date_of_admission');


        view()->share('denguePie', $denguePie);
        view()->share('denguebarCase', $denguebarCase);
        view()->share('denguebar', $dengueAgeLine);
        view()->share('dengueAgeHis', $dengueageHis);
        view()->share('breadcamps', array('Home' => url('/'), ));
        return view('home', $data);
    }
    

    public function index()
    {
        $data['pageTitle'] = "Covid Public Dashboard";
        
        $date = date('Y-m-d');
        /*
        $covid_summary = DB::select(DB::raw("SELECT * FROM `covid_reguler_summary` where date(created_at)='$date' limit 1"))[0];
        */
        $covid_summary = DB::table('covid_reguler_summary')
                ->whereRaw("date(created_at)<='$date'")
                ->first();

        //var_dump($covid_summary);
        //die();

        $denguePie=array();
        $sumMF= 0;
        if(isset($covid_summary)){
            $denguePie[0] = $covid_summary->female;
            $denguePie[1] = $covid_summary->male;
            $sumMF=$covid_summary->male+ $covid_summary->female;
        }


        

       

        //covid date vs quantity
        /*$covidDateVsQuantity = array(
            '2020-03-08'=>3,
            '2020-03-09'=>0,
            '2020-03-10'=>0,
            '2020-03-11'=>0,
            '2020-03-12'=>0,
            '2020-03-13'=>0,
            '2020-03-14'=>0,
            '2020-03-15'=>2,
            '2020-03-16'=>3,
            '2020-03-17'=>2,
            '2020-03-18'=>4,
            '2020-03-19'=>3,
            '2020-03-20'=>3,
            '2020-03-21'=>4,
            '2020-03-22'=>3,
            '2020-03-23'=>6,
            '2020-03-24'=>6,
            '2020-03-25'=>0,
        );*/
        //$covidDateVsQuantity = array_reverse($covidDateVsQuantity);
        // ->whereRaw("date(created_at)<='$date' and quantity > 0")

        $covidDateVsQuantity = DB::table('covid_datevsquantity')
                ->selectRaw('date, quantity')
                ->whereRaw("date(created_at)<='$date'")
                ->orderByRaw('date desc')
                ->get()
                ->toArray();
        //var_dump($covidDateVsQuantity)        ;
        //die();
        view()->share('covidDateVsQuantity', $covidDateVsQuantity);
        //Age Group
        $covidAgeGroupVsQuantity= array(
            '<10'=>0,
            '11-20'=>0,
            '21-30'=>0,
            '31-40'=>0,
            '41-50'=>0,
            '51-60'=>0,
            '>60'=>0            
        );
        $sumAG = 0;
        if(isset($covid_summary)){
            $covidAgeGroupVsQuantity= array(
            '<10'=>$covid_summary->under_10,
            '11-20'=>$covid_summary->c_11_20,
            '21-30'=>$covid_summary->c_21_30,
            '31-40'=>$covid_summary->c_31_40,
            '41-50'=>$covid_summary->c_41_50,
            '51-60'=>$covid_summary->c_51_60,
            '>60'=>$covid_summary->above_60            
            );

            foreach ($covidAgeGroupVsQuantity as $key => $value) {
               $sumAG+=$value; 
            }
        }
        view()->share('covidAgeGroupVsQuantity', $covidAgeGroupVsQuantity);
        //comorbidity
        $comorbidityInfo = array(
            0=>"Comorbidity Present", 
            1=>"Comorbidity Absent",
        );

        $comorbidity = array(
            0=>0, 
            1=>0,
        );
        $sumC = 0;
        if(isset($covid_summary)){

            $comorbidity = array(
                0=>$covid_summary->comorbity_present, 
                1=>$covid_summary->comorbity_absent
            );

            foreach ($comorbidity as $key => $value) {
               $sumC+=$value; 
            }

        }


        view()->share('comorbidity', $comorbidity);
        view()->share('comorbidityInfo', $comorbidityInfo);

        //travel History

        $travelHistoryInfo = array(
            0=>"Italy", 
            1=>"USA",
            2=>"Germany",
            3=>"Bahrain",
            4=>"India",
            5=>"Kuwait",
            6=>"Saudi Arabia",
            7=>"France",
        );

        $travelHistory = array(
            0=>6, 
            1=>3,
            2=>1,
            3=>1,
            4=>1,
            5=>1,
            6=>2,
            7=>1
        );
        $sumTH=0;
        foreach ($travelHistory as $key => $value) {
               $sumTH+=$value; 
        }


        view()->share('travelHistory', $travelHistory);
        view()->share('travelHistoryInfo', $travelHistoryInfo);

        //covid outcome

        $outcomenfo = array(
            0=>"Under Treatment", 
            1=>"Cured",
            2=>"Dead",
        );

        $outcome = array(
            0=>0, 
            1=>0,
            2=>0
        );
        $sumOC = 0;

        if(isset($covid_summary)){

            $outcome = array(
                0=>$covid_summary->under_treatment, 
                1=>$covid_summary->cured,
                2=>$covid_summary->dead
            );

            foreach ($outcome as $key => $value) {
               $sumOC+=$value; 
            }


        }

        view()->share('outcome', $outcome);
        view()->share('outcomenfo', $outcomenfo);


        view()->share('denguePie', $denguePie);

        view()->share('sumMF', $sumMF);
        view()->share('sumAG', $sumAG);
        view()->share('sumC', $sumC);
        view()->share('sumOC', $sumOC);
        view()->share('sumTH', $sumTH);
        
        view()->share('breadcamps', array('Home' => url('/'), ));        
        
        return view('index', $data);
    }
}
