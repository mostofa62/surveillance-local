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

.death_var{
    border:2px solid #FF5733;
    margin: auto 10px;
}

.spacer{
    margin:10px auto;
    border: 1px solid #999666;
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
<input type="hidden" name="rammps_id" value="{{ $rammps->id }}">

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
            <div class="row spacer">
                <div class="col-md-6" >
                    {{ @App\Models\Rammps::placeHolderText()['death_name']}}
                    <br/>
                    {!! Form::text('cdeath[name][]',null,array(
                    'class' => 'form-control',
                    'data-name-format'=>"cdeath[name][%d]"
                   

                    )) !!}
                </div>
                <div class="col-md-3">
                    {{ @App\Models\Rammps::placeHolderText()['relation_with']}}
                    <br/>
                    {!! Form::select('cdeath[r_with_death][]',
                    [''=>'---Select an option---']+\App\Models\Rammps::getMainRelation(1),
                    null, array(
                    'class' => 'form-control select2',
                    'data-name-format'=>"cdeath[r_with_death][%d]"
                    

                    )) !!}

                    {!! Form::text('cdeath[r_with_death_e][]',null,array(
                    'class' => 'form-control',
                    'data-name-format'=>"cdeath[r_with_death_e][%d]"
                    ,'placeholder'=>@App\Models\Rammps::placeHolderText()['any_others']

                    )) !!}
                    
                </div>

                <div class="col-md-3">
                    {{ @App\Models\Rammps::placeHolderText()['death_gender']}}
                    <br/>

                    {!! @App\Common::radioButtonGenerate(\App\Models\Rammps::getGender(), 'cdeath[g_of_covid][]',0,null, false,'data-name-format="cdeath[g_of_covid][%d]"') !!}


                    
                    
                </div>

                

            </div>

            <div class="row spacer">
                <div class="col-md-3">
        {{ @App\Models\Rammps::placeHolderText()['death_time']}}
                </div>
                <div class="col-md-3">

                    {!! Form::text('cdeath[dyear][]',null,array(
                    'class' => 'form-control',
                    'data-name-format'=>"cdeath[dyear][%d]"
                    ,'placeholder'=>@App\Models\Rammps::placeHolderText()['dyear']

                    )) !!}

                </div>

                <div class="col-md-3">

                    {!! Form::text('cdeath[dmonth][]',null,array(
                    'class' => 'form-control',
                    'data-name-format'=>"cdeath[dmonth][%d]"
                    ,'placeholder'=>@App\Models\Rammps::placeHolderText()['dmonth']

                    )) !!}

                </div>

                <div class="col-md-3">

                    {!! Form::text('cdeath[dday][]',null,array(
                    'class' => 'form-control',
                    'data-name-format'=>"cdeath[dday][%d]"
                    ,'placeholder'=>@App\Models\Rammps::placeHolderText()['dday']

                    )) !!}

                </div>

            </div>

            <div class="row spacer">
                <div class="col-md-3">

                    {{ @App\Models\Rammps::placeHolderText()['death_married']}}
                    <br/>

                    {!! @App\Common::radioButtonGenerate(\App\Models\Rammps::getYesNo(), 'cdeath[death_married][]',0,null, false,'data-name-format="cdeath[death_married][%d]"') !!}


                </div>

                <div class="col-md-3">

                    {{ @App\Models\Rammps::placeHolderText()['death_pregnant']}}
                    <br/>

                    {!! @App\Common::radioButtonGenerate(\App\Models\Rammps::getYesNo(), 'cdeath[death_pregnant][]',0,null, false,'data-name-format="cdeath[death_pregnant][%d]"') !!}


                </div>

                <div class="col-md-3">

                    {{ @App\Models\Rammps::placeHolderText()['death_on_birth']}}
                    <br/>

                    {!! @App\Common::radioButtonGenerate(\App\Models\Rammps::getYesNo(), 'cdeath[death_on_birth][]',0,null, false,'data-name-format="cdeath[death_on_birth][%d]"') !!}


                </div>

                <div class="col-md-3">

                    {{ @App\Models\Rammps::placeHolderText()['death_2m_birth']}}
                    <br/>

                    {!! @App\Common::radioButtonGenerate(\App\Models\Rammps::getYesNo(), 'cdeath[death_2m_birth][]',0,null, false,'data-name-format="cdeath[death_2m_birth][%d]"') !!}

                </div>

            </div>

            <div class="row spacer">
                <div class="col-md-12">
                  {{ @App\Models\Rammps::placeHolderText()['death_symptoms']}}  
                </div>

                <div class="col-md-3">
                    
                    {!! Form::select('cdeath[death_symptoms_1][]',
                    [''=>'---Select an option---']+\App\Models\Rammps::death_symptoms(),
                    null, array(
                    'class' => 'form-control select2',
                    'data-name-format'=>"cdeath[death_symptoms_1][%d]"                    

                    )) !!}

                    {!! Form::text('cdeath[death_symptoms_1_e][]',null,array(
                    'class' => 'form-control',
                    'data-name-format'=>"cdeath[death_symptoms_1_e][%d]"
                    ,'placeholder'=>@App\Models\Rammps::placeHolderText()['any_others']

                    )) !!}                    
                    
                </div>

                <div class="col-md-3">
                    
                    {!! Form::select('cdeath[death_symptoms_2][]',
                    [''=>'---Select an option---']+\App\Models\Rammps::death_symptoms(),
                    null, array(
                    'class' => 'form-control select2',
                    'data-name-format'=>"cdeath[death_symptoms_2][%d]"                    

                    )) !!}

                    {!! Form::text('cdeath[death_symptoms_2_e][]',null,array(
                    'class' => 'form-control',
                    'data-name-format'=>"cdeath[death_symptoms_2_e][%d]"
                    ,'placeholder'=>@App\Models\Rammps::placeHolderText()['any_others']

                    )) !!}                    
                    
                </div>

                <div class="col-md-3">
                    
                    {!! Form::select('cdeath[death_symptoms_3][]',
                    [''=>'---Select an option---']+\App\Models\Rammps::death_symptoms(),
                    null, array(
                    'class' => 'form-control select2',
                    'data-name-format'=>"cdeath[death_symptoms_3][%d]"                    

                    )) !!}

                    {!! Form::text('cdeath[death_symptoms_3_e][]',null,array(
                    'class' => 'form-control',
                    'data-name-format'=>"cdeath[death_symptoms_3_e][%d]"
                    ,'placeholder'=>@App\Models\Rammps::placeHolderText()['any_others']

                    )) !!}                    
                    
                </div>

                <div class="col-md-3">
                    
                    {!! Form::select('cdeath[death_symptoms_4][]',
                    [''=>'---Select an option---']+\App\Models\Rammps::death_symptoms(),
                    null, array(
                    'class' => 'form-control select2',
                    'data-name-format'=>"cdeath[death_symptoms_4][%d]"                    

                    )) !!}

                    {!! Form::text('cdeath[death_symptoms_4_e][]',null,array(
                    'class' => 'form-control',
                    'data-name-format'=>"cdeath[death_symptoms_4_e][%d]"
                    ,'placeholder'=>@App\Models\Rammps::placeHolderText()['any_others']

                    )) !!}                    
                    
                </div>
                
            </div>


            <div class="row spacer">
                <div class="col-md-12">
                  {{ @App\Models\Rammps::placeHolderText()['death_location']}}  
                </div>

                <div class="col-md-6">
                    
                    {!! Form::select('cdeath[death_location][]',
                    [''=>'---Select an option---']+\App\Models\Rammps::death_where(),
                    null, array(
                    'class' => 'form-control select2',
                    'data-name-format'=>"cdeath[death_location][%d]"                    

                    )) !!}

                    {!! Form::text('cdeath[death_location_e][]',null,array(
                    'class' => 'form-control',
                    'data-name-format'=>"cdeath[death_location_e][%d]"
                    ,'placeholder'=>@App\Models\Rammps::placeHolderText()['any_others']

                    )) !!}                    
                    
                </div>

            </div>




            <div class="row spacer">
                <div class="col-md-12">
                  {{ @App\Models\Rammps::placeHolderText()['death_reason']}}  
                </div>

                <div class="col-md-3">
                    
                    {!! Form::select('cdeath[death_reason_1][]',
                    [''=>'---Select an option---']+\App\Models\Rammps::death_reason(),
                    null, array(
                    'class' => 'form-control select2',
                    'data-name-format'=>"cdeath[death_reason_1][%d]"                    

                    )) !!}

                    {!! Form::text('cdeath[death_reason_1_e][]',null,array(
                    'class' => 'form-control',
                    'data-name-format'=>"cdeath[death_reason_1_e][%d]"
                    ,'placeholder'=>@App\Models\Rammps::placeHolderText()['any_others']

                    )) !!}                    
                    
                </div>

                <div class="col-md-3">
                    
                    {!! Form::select('cdeath[death_reason_2][]',
                    [''=>'---Select an option---']+\App\Models\Rammps::death_reason(),
                    null, array(
                    'class' => 'form-control select2',
                    'data-name-format'=>"cdeath[death_reason_2][%d]"                    

                    )) !!}

                    {!! Form::text('cdeath[death_reason_2_e][]',null,array(
                    'class' => 'form-control',
                    'data-name-format'=>"cdeath[death_reason_2_e][%d]"
                    ,'placeholder'=>@App\Models\Rammps::placeHolderText()['any_others']

                    )) !!}                    
                    
                </div>

                <div class="col-md-3">
                    
                    {!! Form::select('cdeath[death_reason_3][]',
                    [''=>'---Select an option---']+\App\Models\Rammps::death_reason(),
                    null, array(
                    'class' => 'form-control select2',
                    'data-name-format'=>"cdeath[death_reason_3][%d]"                    

                    )) !!}

                    {!! Form::text('cdeath[death_reason_3_e][]',null,array(
                    'class' => 'form-control',
                    'data-name-format'=>"cdeath[death_reason_3_e][%d]"
                    ,'placeholder'=>@App\Models\Rammps::placeHolderText()['any_others']

                    )) !!}                    
                    
                </div>

                <div class="col-md-3">
                    
                    {!! Form::select('cdeath[death_reason_4][]',
                    [''=>'---Select an option---']+\App\Models\Rammps::death_reason(),
                    null, array(
                    'class' => 'form-control select2',
                    'data-name-format'=>"cdeath[death_reason_4][%d]"                    

                    )) !!}

                    {!! Form::text('cdeath[death_reason_4_e][]',null,array(
                    'class' => 'form-control',
                    'data-name-format'=>"cdeath[death_reason_4_e][%d]"
                    ,'placeholder'=>@App\Models\Rammps::placeHolderText()['any_others']

                    )) !!}                    
                    
                </div>
                
            </div>

            <hr/>

            <div class="row spacer">
                <div class="col-md-12">
                    <strong>{{ @App\Models\Rammps::initialText()['covid_19_question'] }}</strong>
                </div>
            </div>


            <div class="row spacer">
                <div class="col-md-3">

                    {{ @App\Models\Rammps::placeHolderText()['death_detect_by']}}
                    <br/>

                    {!! @App\Common::radioButtonGenerate(\App\Models\Rammps::getYesNo(), 'cdeath[death_detect_by][]',0,null, false,'data-name-format="cdeath[death_detect_by][%d]"') !!}


                </div>

                <div class="col-md-3">

                    {{ @App\Models\Rammps::placeHolderText()['death_covid_tested']}}
                    <br/>

                    {!! @App\Common::radioButtonGenerate(\App\Models\Rammps::getYNDN(), 'cdeath[death_covid_tested][]',0,null, false,'data-name-format="cdeath[death_covid_tested][%d]"') !!}


                </div>

                <div class="col-md-3">

                    {{ @App\Models\Rammps::placeHolderText()['death_covid_result']}}
                    <br/>

                    {!! @App\Common::radioButtonGenerate(\App\Models\Rammps::getCovidResult(), 'cdeath[death_covid_result][]',0,null, false,'data-name-format="cdeath[death_covid_result][%d]"') !!}


                </div>

                <div class="col-md-3">

                    {{ @App\Models\Rammps::placeHolderText()['death_has_fever']}}
                    <br/>

                    {!! @App\Common::radioButtonGenerate(\App\Models\Rammps::getYesNo(), 'cdeath[death_has_fever][]',0,null, false,'data-name-format="cdeath[death_has_fever][%d]"') !!}

                </div>

            </div>



            <div class="row spacer">
                <div class="col-md-3" >
                    {{ @App\Models\Rammps::placeHolderText()['death_fever_duration']}}
                    <br/>
                    {!! Form::text('cdeath[death_fever_duration][]',null,array(
                    'class' => 'form-control',
                    'data-name-format'=>"cdeath[death_fever_duration][%d]"
                   

                    )) !!}
                </div>
                <div class="col-md-3">
                    {{ @App\Models\Rammps::placeHolderText()['death_covid_sickness']}}
                    <br/>

                    {!! @App\Common::radioButtonGenerate(\App\Models\Rammps::getYNDN(), 'cdeath[death_covid_sickness][]',0,null, false,'data-name-format="cdeath[death_covid_sickness][%d]"') !!}


                    
                    
                </div>

                <div class="col-md-3">
                    {{ @App\Models\Rammps::placeHolderText()['death_has_cough']}}
                    <br/>

                    {!! @App\Common::radioButtonGenerate(\App\Models\Rammps::getYNDN(), 'cdeath[death_has_cough][]',0,null, false,'data-name-format="cdeath[death_has_cough][%d]"') !!}


                    
                    
                </div>

                <div class="col-md-3">
                    {{ @App\Models\Rammps::placeHolderText()['death_has_taste']}}
                    <br/>

                    {!! @App\Common::radioButtonGenerate(\App\Models\Rammps::getYNDN(), 'cdeath[death_has_taste][]',0,null, false,'data-name-format="cdeath[death_has_taste][%d]"') !!}


                    
                    
                </div>

                

            </div>



            <div class="row spacer">
                <div class="col-md-4">

                    {{ @App\Models\Rammps::placeHolderText()['death_has_breating']}}
                    <br/>

                    {!! @App\Common::radioButtonGenerate(\App\Models\Rammps::getYesNo(), 'cdeath[death_has_breating][]',0,null, false,'data-name-format="cdeath[death_has_breating][%d]"') !!}


                </div>

                <div class="col-md-4">

                    {{ @App\Models\Rammps::placeHolderText()['death_has_contact']}}
                    <br/>

                    {!! @App\Common::radioButtonGenerate(\App\Models\Rammps::getYNDN(), 'cdeath[death_has_contact][]',0,null, false,'data-name-format="cdeath[death_has_contact][%d]"') !!}


                </div>

                <div class="col-md-3">

                    {{ @App\Models\Rammps::placeHolderText()['death_was_covidarea']}}
                    <br/>

                    {!! @App\Common::radioButtonGenerate(\App\Models\Rammps::getYNDN(), 'cdeath[death_was_covidarea][]',0,null, false,'data-name-format="cdeath[death_was_covidarea][%d]"') !!}


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
    
    {!! @App\Common::radioButtonGenerate(\App\Models\Rammps::getYNDN(), 's_4_vac_taken',0,$question->s_4_vac_taken, true) !!}
    </div>
    <div class="col-md-4">

    </div>
</div>


<div class="form-group">
    <label class="col-xs-4 control-label">{{ @App\Models\Rammps::questionText()['s_4_vac_number']}}</label>
    <div class="col-xs-4">
    {!! Form::text('s_4_vac_number', Input::old('s_4_vac_number',isset($question->s_4_vac_number)?$question->s_4_vac_number:''),array('id'=>'s_4_vac_number','class' => 'form-control','placeholder'=>@App\Models\Rammps::questionText()['s_4_vac_number'])) !!}

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
    <label class="col-xs-4 control-label">{{ @App\Models\Rammps::questionText()['s_4_vac_suggested']}}</label>
    <div class="col-xs-4">
    
    {!! Form::select('s_4_vac_suggested',[''=>'---select an options---']+\App\Models\Rammps::whoSuggested(),Input::old('s_4_vac_suggested',isset($question->s_4_vac_suggested)?$question->s_4_vac_suggested:''), array('id' => 's_4_vac_suggested', 'class' => 'form-control select2')) !!}

    {!! Form::text('s_4_vac_suggested_e', Input::old('s_4_vac_suggested_e',isset($question->s_4_vac_suggested_e)?$question->s_4_vac_suggested_e:''),array('id'=>'s_4_vac_suggested_e','class' => 'form-control','placeholder'=>@App\Models\Rammps::placeHolderText()['any_others'])) !!}
    </div>
    <div class="col-md-4">
    


    </div>
</div>


<div class="form-group">
    <label class="col-xs-4 control-label">{{ @App\Models\Rammps::questionText()['s_4_vac_ignorance_reason']}}</label>
    <div class="col-xs-4">
    
    {!! Form::select('s_4_vac_ignorance_reason',[''=>'---select an options---']+\App\Models\Rammps::ignoreReason(),Input::old('s_4_vac_ignorance_reason',isset($question->s_4_vac_ignorance_reason)?$question->s_4_vac_ignorance_reason:''), array('id' => 's_4_vac_ignorance_reason', 'class' => 'form-control select2')) !!}

    {!! Form::text('s_4_vac_ignorance_reason_e', Input::old('s_4_vac_ignorance_reason_e',isset($question->s_4_vac_ignorance_reason_e)?$question->s_4_vac_ignorance_reason_e:''),array('id'=>'s_4_vac_ignorance_reason_e','class' => 'form-control','placeholder'=>@App\Models\Rammps::placeHolderText()['any_others'])) !!}
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


        var RevSequenceArray=
            @php

                echo json_encode(\App\Models\Rammps::gateReverseSequence())
            @endphp
            ;


        var TabluerSequenceArray =
            @php

                echo json_encode(\App\Models\Rammps::gateTabulerSeq())
            @endphp
            ;


        var RevTabluerSequenceArray =
            @php

                echo json_encode(\App\Models\Rammps::gateTabulerRevSeq())
            @endphp
            ;




        var DecesionBasedForward = 
        @php

                echo json_encode(\App\Models\Rammps::decesion_based_forward())
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