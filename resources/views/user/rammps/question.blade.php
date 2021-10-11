@extends('layouts/question')
@section('content')

<style xmlns="http://www.w3.org/1999/html">
.surveillance-data {
    margin: 30px;
}
.table-position{
    position: fixed;
    text-align: right;
    z-index: 1;
    margin-top: 4%;
    margin-left: 63.5%;
    width: 25%;
    background: #ffffff;
}
.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {padding: 4px 6px;}

#show_reschedule{
    position: fixed;
    z-index: 2;
    margin-left: 20%;
    margin-top: 0%;
}
</style>



<!-- Form Wizard JavaScript -->
<link href="{{URL::to('resources/assets/ampleadmin/plugins/bower_components/jquery-wizard-master/css/wizard.css')}}"
      rel="stylesheet">
<!-- FormValidation -->
<link rel="stylesheet"
      href="{{URL::to('resources/assets/ampleadmin/plugins/bower_components/jquery-wizard-master/libs/formvalidation/formValidation.min.css')}}">

      <!-- Typehead CSS -->
<link href="{{URL::to('resources/assets/ampleadmin/plugins/bower_components/typeahead.js-master/dist/typehead-min.css')}}" rel="stylesheet">

<div id="exampleValidator" class="wizard">


<ul class="wizard-steps" role="tablist">
    <li class="active" role="tab">
        <h4><span><i class="ti-user"></i></span>{{  @App\Models\Rammps::initialText()['s_1'] }} </h4></li>
    <li role="tab">
        <h4><span><i class="ti-credit-card"></i></span>        	
        {{ @App\Models\Rammps::initialText()['s_2'] }}	
        </h4>
    </li>
    <li role="tab">
        <h4><span><i class="ti-credit-card"></i></span>         
        {{ @App\Models\Rammps::initialText()['s_3'] }}  
        </h4>
    </li>
    <li role="tab">
        <h4><span><i class="ti-credit-card"></i></span>         
        {{ @App\Models\Rammps::initialText()['s_4'] }}  
        </h4>
    </li>    
    
    
</ul>


{!! Form::open(array('url' => isset($rammps)?session('access').'rammps/question/'.$rammps->id :session('access').'rammps/question/'.$id,'method' =>'post',  'enctype'=>'multipart/form-data','id'=>"validation", 'class'=>"form-horizontal")) !!}
<div class="wizard-content">
<!--section 1-->
<div class="wizard-pane active" role="tabpanel">

<p>
	<br/>
	<strong> 
	{{ @App\Models\Rammps::initialText()['s_1'] }}</strong>
</p>

<div class="form-group">
	<label class="col-xs-4 control-label">{{ @App\Models\Rammps::questionText()['s_1_consent']}}</label>
	<div class="col-xs-4">
	{!! @App\Common::radioButtonGenerate(\App\Models\Rammps::getYesNo(), 's_1_consent',0,$question->s_1_consent, true) !!}

	</div>
	<div class="col-md-4">
	


	</div>
</div>

<div class="form-group">
	<label class="col-xs-4 control-label">{{ @App\Models\Rammps::questionText()['s_1_gender']}}</label>
	<div class="col-xs-4">
	
    {!! @App\Common::radioButtonGenerate(\App\Models\Rammps::getGender(), 's_1_gender',0,$question->s_1_gender, true) !!}
	</div>
	<div class="col-md-4">
	


	</div>
</div>

<div class="form-group">
    <label class="col-xs-4 control-label">{{ @App\Models\Rammps::questionText()['s_1_18up']}}</label>
    <div class="col-xs-4">
    
    {!! @App\Common::radioButtonGenerate(\App\Models\Rammps::get18UpDown(), 's_1_18up',0,$question->s_1_18up, true) !!}
    </div>
    <div class="col-md-4">
    


    </div>
</div>


<div class="form-group">
    <label class="col-xs-4 control-label">{{ @App\Models\Rammps::questionText()['s_1_age']}}</label>
    <div class="col-xs-4">
    
    {!! Form::select('s_1_age',
            [''=>'---Select an option---']+\App\Models\Rammps::getPersonAge(),
            null, array(
            'class' => 'form-control select2'            

            )) !!}
    </div>
    <div class="col-md-4">
    


    </div>
</div>

<div class="form-group">
    <label class="col-xs-4 control-label">{{ @App\Models\Rammps::questionText()['s_1_dd']}}</label>
    <div class="col-xs-4">
    
    {!! Form::select('s_1_dd',[''=>'---District---']+\App\Models\Rammps::districtList(),Input::old('s_1_dd',isset($question->s_1_dd)?$question->s_1_dd:''), array('id' => 's_1_dd', 'class' => 'form-control select2')) !!}
    </div>
    <div class="col-md-4">
    


    </div>
</div>


<div class="form-group">
    <label class="col-xs-4 control-label">{{ @App\Models\Rammps::questionText()['s_1_v_or_c']}}</label>
    <div class="col-xs-4">
    
    {!! @App\Common::radioButtonGenerate(\App\Models\Rammps::getLiveCityOrVillage(), 's_1_v_or_c',0,$question->s_1_v_or_c, true) !!}
    </div>
    <div class="col-md-4">


    


    </div>
</div>

<div class="form-group">
    <label class="col-xs-4 control-label">{{ @App\Models\Rammps::questionText()['s_1_cc_uz_mc']}}</label>
    <div class="col-xs-4">
    
        <div class="row">
                                        
            <div class="col-xs-12">
                {!! Form::select('s_1_cc',[''=>'---City Corporation---']+\App\Models\Rammps::citycorporationlist(),Input::old('s_1_cc',isset($question->s_1_cc)?$question->s_1_cc:''), array('id' => 's_1_cc', 'class' => 'form-control select2')) !!}
            </div>
        </div>


        <div class="row">
                                        
            <div class="col-xs-12">

                <div class="municipal">
                    {!! Form::select('s_1_mc',[''=>'---Municipalty---']+\App\Models\Rammps::municipilList(isset($question->s_1_mc)?$question->s_1_mc:0),Input::old('s_1_mc',isset($question->s_1_mc)?$question->s_1_mc:''), array('id' => 's_1_mc', 'class' => 'form-control select2')) !!}

                </div>


                <div class="upazila">
                                        

                    {!! Form::select('s_1_uz',[''=>'---Upazila---']+\App\Models\Rammps::upazilalist(isset($question->s_1_uz)?$question->s_1_uz:0),Input::old('s_1_uz',isset($question->s_1_uz)?$question->s_1_uz:''), array('id' => 's_1_uz', 'class' => 'form-control select2')) !!}
                </div>

                <div class="notcommon">
                    {!! @App\Common::radioButtonGenerate(\App\Models\Rammps::getYNO(), 's_1_ccuzmc_o',0,$question->s_1_ccuzmc_o, true) !!}

                    {!! Form::text('s_1_ccuzmc_o_e', Input::old('s_1_ccuzmc_o_e',isset($question->s_1_ccuzmc_o_e)?$question->s_1_ccuzmc_o_e:''),array('id'=>'s_1_ccuzmc_o_e','class' => 'form-control','placeholder'=>@App\Models\Rammps::placeHolderText()['any_others'])) !!}
                    
                </div>


            </div>


        </div>



    </div>
    <div class="col-md-4">
    


    </div>
</div>








</div>

<!--end section -->
<!--section 2-->
<div class="wizard-pane" role="tabpanel">
<p>
<br>
<strong> 
	{{ @App\Models\Rammps::questionText()['s_2'] }}
</strong>
</p>

<div class="form-group">
	<label class="col-xs-4 control-label">{{ @App\Models\Rammps::questionText()['s_2_name']}}</label>
	<div class="col-xs-4">
	{!! Form::text('s_2_name', Input::old('s_2_name',isset($question->s_2_name)?$question->s_2_name:''),array('id'=>'s_2_name','class' => 'form-control','placeholder'=>@App\Models\Rammps::questionText()['s_2_name'])) !!}

	</div>
	<div class="col-md-4">
	


	</div>
</div>

<div class="form-group">
    <label class="col-xs-4 control-label">{{ @App\Models\Rammps::questionText()['s_2_education']}}</label>
    <div class="col-xs-4">
    
    {!! @App\Common::radioButtonGenerate(\App\Models\Rammps::getLastEducation(), 's_2_education',0,$question->s_2_education, true) !!}

    {!! Form::text('s_2_education_e', Input::old('s_2_education_e',isset($question->s_2_education_e)?$question->s_2_education_e:''),array('id'=>'s_2_education_e','class' => 'form-control','placeholder'=>@App\Models\Rammps::placeHolderText()['any_others'])) !!}
    </div>
    <div class="col-md-4">


    


    </div>
</div>


<div class="form-group">
    <label class="col-xs-4 control-label">{{ @App\Models\Rammps::questionText()['s_2_marial_status']}}</label>
    <div class="col-xs-4">
    
    {!! @App\Common::radioButtonGenerate(\App\Models\Rammps::getMarialStutus(), 's_2_marial_status',0,$question->s_2_marial_status, true) !!}

    {!! Form::text('s_2_marial_status_e', Input::old('s_2_marial_status_e',isset($question->s_2_marial_status_e)?$question->s_2_marial_status_e:''),array('id'=>'s_2_marial_status_e','class' => 'form-control','placeholder'=>@App\Models\Rammps::placeHolderText()['any_others'])) !!}
    
    </div>
    <div class="col-md-4">


    


    </div>
</div>


<div class="form-group">
    <label class="col-xs-4 control-label">{{ @App\Models\Rammps::questionText()['s_2_occupation']}}</label>
    <div class="col-xs-4">
    
    {!! Form::select('s_2_occupation',[''=>'---Select an options---']+\App\Models\Rammps::getOccupation(),Input::old('s_2_occupation',isset($question->s_2_occupation)?$question->s_2_occupation:''), array('id' => 's_2_occupation', 'class' => 'form-control select2')) !!}



    {!! Form::text('s_2_occupation_e', Input::old('s_2_occupation_e',isset($question->s_2_occupation_e)?$question->s_2_occupation_e:''),array('id'=>'s_2_occupation_e','class' => 'form-control','placeholder'=>@App\Models\Rammps::placeHolderText()['any_others'])) !!}
    
    </div>
    <div class="col-md-4">


    


    </div>
</div>







</div>
<!--end section 2-->

<!--section 3-->
<div class="wizard-pane" role="tabpanel">
<p>
<br>
<strong> 
    {{ @App\Models\Rammps::questionText()['s_3'] }}
</strong>
</p>

<div class="form-group">
    <label class="col-xs-4 control-label">{{ @App\Models\Rammps::questionText()['s_3_khana']}}</label>
    <div class="col-xs-4">
    {!! Form::text('s_3_khana_m', Input::old('s_3_khana_m',isset($question->s_3_khana_m)?$question->s_3_khana_m:''),array('id'=>'s_3_khana_m','class' => 'form-control','placeholder'=>@App\Models\Rammps::placeHolderText()['s_3_khana_m'])) !!}    

    </div>
    <div class="col-md-4">
    {!! Form::text('s_3_khana_f', Input::old('s_3_khana_f',isset($question->s_3_khana_f)?$question->s_3_khana_f:''),array('id'=>'s_3_khana_f','class' => 'form-control','placeholder'=>@App\Models\Rammps::placeHolderText()['s_3_khana_f'])) !!} 
    </div>
</div>


<div class="form-group">
    <label class="col-xs-4 control-label">{{ @App\Models\Rammps::questionText()['s_3_relation_w_main']}}</label>
    <div class="col-xs-4">
    
    {!! Form::select('s_3_relation_w_main',[''=>'---Select an options---']+\App\Models\Rammps::getMainRelation(),Input::old('s_3_relation_w_main',isset($question->s_3_relation_w_main)?$question->s_3_relation_w_main:''), array('id' => 's_3_relation_w_main', 'class' => 'form-control select2')) !!}

    {!! Form::text('s_3_relation_w_main_e', Input::old('s_3_relation_w_main_e',isset($question->s_3_relation_w_main_e)?$question->s_3_relation_w_main_e:''),array('id'=>'s_3_relation_w_main_e','class' => 'form-control','placeholder'=>@App\Models\Rammps::placeHolderText()['any_others'])) !!}
    </div>
    <div class="col-md-4">


    


    </div>
</div>


<div class="form-group">
    <label class="col-xs-4 control-label">{{ @App\Models\Rammps::questionText()['s_3_khana_u_5']}}</label>
    <div class="col-xs-4">
    {!! Form::text('s_3_khana_u_5', Input::old('s_3_khana_u_5',isset($question->s_3_khana_u_5)?$question->s_3_khana_u_5:''),array('id'=>'s_3_khana_u_5','class' => 'form-control','placeholder'=>@App\Models\Rammps::questionText()['s_3_khana_u_5'])) !!}

    </div>
    <div class="col-md-4">
    


    </div>
</div>


<div class="form-group">
    <label class="col-xs-4 control-label">{{ @App\Models\Rammps::questionText()['s_3_until_2018']}}</label>
    <div class="col-xs-4">
    
    {!! @App\Common::radioButtonGenerate(\App\Models\Rammps::getYNDN(), 's_3_until_2018',0,$question->s_3_until_2018, true) !!}
    </div>
    <div class="col-md-4">

    </div>
</div>



<!--tabuler covid death information -->
<div class="form-group table-responsive">
<div class="form-group">
<label class="col-xs-4 control-label">
{{ @App\Models\Rammps::questionText()['s_3_until_2018_a']}}
</label>
<div class="col-md-4">
    {{ @App\Models\Rammps::placeHolderText()['add_more']}}
</div>
</div>

<table class="table" id="death">
    <tr>
        <th colspan="2">{{ @App\Models\Rammps::initialText()['covid_death_intial']}}</th>
    </tr>
    <tr>
        <th colspan="2">
            <input type="button" name="s_3_add_death" value="Add" class="death_add">
        </th>
    </tr>
    <tr class="death_var">
        <td>
            <div class="row">
                <div class="col-md-6" >
                    {!! Form::text('cdeath[name][]',null,array(
                    'class' => 'form-control',
                    'data-name-format'=>"cdeath[name][%d]"
                    ,'placeholder'=>@App\Models\Rammps::placeHolderText()['death_name']

                    )) !!}
                </div>
                <div class="col-md-3">
                    {!! Form::select('cdeath[r_with_death][]',
                    [''=>'---Select an option---']+\App\Models\Rammps::getMainRelation(1),
                    null, array(
                    'class' => 'form-control select2',
                    'data-name-format'=>"cdeath[r_with_death][%d]"
                    ,'placeholder'=>@App\Models\Rammps::placeHolderText()['relation_with']

                    )) !!}
                    
                </div>

            </div> 
            
        

            
            
        </td>
        <td>
            <button class="death_del">Delete</button>
        </td>
    </tr>
</table>
</div>
<!--end covid death -->




</div>
<!--end section 3-->

<!--section 4-->
<div class="wizard-pane" role="tabpanel">

<p>
<br>
<strong> 
    {{ @App\Models\Rammps::initialText()['s_4'] }}
</strong>
</p>

<div class="form-group">
    <label class="col-xs-4 control-label">{{ @App\Models\Rammps::questionText()['s_4_vac_possible']}}</label>
    <div class="col-xs-4">
    
    {!! @App\Common::radioButtonGenerate(\App\Models\Rammps::covidTakenWilling(), 's_4_vac_possible',0,$question->s_4_vac_possible, true) !!}
    </div>
    <div class="col-md-4">

    </div>
</div>

<div class="form-group">
    <label class="col-xs-4 control-label">{{ @App\Models\Rammps::questionText()['s_4_vac_taken']}}</label>
    <div class="col-xs-4">
    
    {!! @App\Common::radioButtonGenerate(\App\Models\Rammps::getYesNo(), 's_4_vac_taken',0,$question->s_4_vac_taken, true) !!}
    </div>
    <div class="col-md-4">

    </div>
</div>


<div class="form-group">
    <label class="col-xs-4 control-label">{{ @App\Models\Rammps::questionText()['s_4_vac_number']}}</label>
    <div class="col-xs-4">
    {!! Form::text('s_4_vac_number', Input::old('s_4_vac_number',isset($question->s_4_vac_number)?$question->s_4_vac_number:''),array('min'=>0,'id'=>'s_4_vac_number','class' => 'form-control','placeholder'=>@App\Models\Rammps::questionText()['s_4_vac_number'])) !!}

    </div>
    <div class="col-md-4">
    


    </div>
</div>

<div class="form-group">
    <label class="col-xs-4 control-label">{{ @App\Models\Rammps::questionText()['s_4_vac_which']}}</label>
    <div class="col-xs-4">
    
    {!! Form::select('s_4_vac_which',[''=>'---select an options---']+\App\Models\Rammps::whichVaccine(),Input::old('s_4_vac_which',isset($question->s_4_vac_which)?$question->s_4_vac_which:''), array('id' => 's_4_vac_which', 'class' => 'form-control select2')) !!}
    </div>
    <div class="col-md-4">
    


    </div>
</div>




<div class="form-group">
    <input type="hidden" name="end_point">
</div>

</div>
<!--end section 4-->

{{ Form::close() }}
</div>
</div>








@push('rscripts')
	<!-- Form Wizard JavaScript -->
    <script src="{{URL::to('resources/assets/ampleadmin/plugins/bower_components/jquery-wizard-master/dist/jquery-wizard.min.js')}}"></script>
    <!-- FormValidation plugin and the class supports validating Bootstrap form -->
    <script src="{{URL::to('resources/assets/ampleadmin/plugins/bower_components/jquery-wizard-master/libs/formvalidation/formValidation.min.js')}}"></script>
    <script src="{{URL::to('resources/assets/ampleadmin/plugins/bower_components/jquery-wizard-master/libs/formvalidation/bootstrap.min.js')}}"></script>
    <script src="{{URL::to('resources/assets/ampleadmin/plugins/bower_components/typeahead.js-master/dist/typeahead.bundle.min.js')}}"></script>

    <script src="https://sutara79.github.io/jquery.add-input-area/dist/jquery.add-input-area.min.js"></script>

 	

    <script type="text/javascript">    	    
        var token="{{csrf_token()}}";
        var url ="{{url(session('access').'rammps/question/'.$rammps->id)}}";
        var redirect = "{{url(session('access').'rammps/callInitiate')}}";
        var citycorporationurl = "{{url('public/js/citycorporationdata.json')}}";
        var municipalurl = "{{url('public/js/municipaldatadb.json')}}";
        var upazilaurl = "{{url('public/js/upaziladata.json')}}";

        var citycorporationdata = [];
        var upaziladata = [];
        var municipaldata = [];
        var cc = [];
        var uz = [];
        var mc = [];
        var jar_data = [];
        //end data for all
        var question_id =@php echo isset($question->id) && $question->id >0 ? $question->id:0; @endphp;

        var last_input=@php
            echo isset($question->last_input) ? "'".$question->last_input."'":"null"; @endphp;


        var SequenceArray=
        	@php

                echo json_encode(\App\Models\Rammps::gateSequence())
            @endphp
            ;

        @php
                $allsteps = [];
                $key = -1;

                if(isset($question) && isset($question->last_input)){

                	$step = $question->last_input;
                	$questionStep = \App\Models\Rammps::stepWiseNode();

                	$key = \App\Models\Rammps::searchForId($step, $questionStep);
                    //dd($key);
                    $allsteps=\App\Models\Rammps::dataArray($step,$key);


                }

        @endphp;

        var  AllSteps =@php
                echo json_encode($allsteps);
            @endphp;

        var step_index =@php echo $key;  @endphp;




    </script>





    <script src="{{URL::to('resources/assets/js/rammps/question.js')}}"></script>
    <script src="{{URL::to('resources/assets/js/rammps/engine.js')}}"></script>


@endpush

@stop