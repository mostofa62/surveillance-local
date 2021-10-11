@extends('layouts/followup')
@section('content')

<!-- Form Wizard JavaScript -->
    <link href="{{URL::to('resources/assets/ampleadmin/plugins/bower_components/jquery-wizard-master/css/wizard.css')}}"
          rel="stylesheet">
    

@if(!isset($info)):

<p class="alert alert-danger">
<strong>Number Refill Please</strong>
</p>

@else
<div class="col-md-12">

<div id="exampleValidator" class="wizard">
<div class="wizard-pane active" role="tabpanel">
<div class="surveillance-data">


{!! Form::open(array('url' => session('access').'ivrpr/ivr/','method' =>'post', 'id'=>"validation", 'class'=>"form-horizontal")) !!}
<div class="wizard-content">
<p class="alert alert-info">
<strong>{{ @$info->id }}-{{ @$info->mobile_no }} </strong>
</p>

{!! csrf_field() !!}
<div class="form-group">
    <label class="col-xs-4 control-label">
    {!! @App\Models\IvrPrIvr::questionText()['q_1'] !!}
	</label>
    <div class="col-xs-4">
        {!! @App\Common::radioButtonGenerate(\App\Models\IvrPrIvr::getYesNoCom(), 'q_1',0,$info->q_1, true) !!}
        {!! Form::text('q_1_e', Input::old('q_1_e',isset($info->q_1_e)?$info->q_1_e:''),array('id'=>'q_1_e','class' => 'form-control','placeholder'=>@App\Models\IvrPrIvr::questionText()['q_1_e'])) !!}
        
    </div>
</div>

<p class="alert alert-info">
<strong>{{ @App\Models\IvrPrIvr::questionText()['q_i']}}</strong>
</p>






<div class="form-group">
    <label class="col-xs-4 control-label">{!! @\App\Models\IvrPrIvr::questionText()['q_2']!!}</label>
    <div class="col-xs-4">
        {!! Form::select('q_2',[''=>'---Select an option---']+\App\Models\IvrPrIvr::getPersonAge(150),Input::old('q_2',isset($info->q_2)?$info->q_2:''), array('required'=>true,'id' => 'q_2', 'class' => 'form-control select2')) !!}
    </div>

    
</div>


<div class="form-group">
    <label class="col-xs-4 control-label">{!! @App\Models\IvrPrIvr::questionText()['q_3'] !!}</label>
    <div class="col-xs-4">
        {!! @App\Common::radioButtonGenerate(\App\Models\IvrPrIvr::getGender(), 'q_3',0,$info->q_3, true) !!}
        
    </div>
    
</div>


<div class="form-group">
    <label class="col-xs-4 control-label">{!! @App\Models\IvrPrIvr::questionText()['q_4'] !!}</label>
    <div class="col-xs-4">
        {!! @App\Common::radioButtonGenerate(\App\Models\IvrPrIvr::getLiveCityOrVillage(), 'q_4',0,$info->q_4, true) !!}
        
    </div>
</div>


{{-- District  --}}


<div class="form-group">
    <label class="col-xs-4 control-label">{!! @App\Models\IvrPrIvr::questionText()['q_5']!!}</label>
    <div class="col-xs-4">

    	<div class="row">
        	
            <div class="col-xs-12">
                {!! Form::select('q_5_cc',[''=>'---City Corporation---']+\App\Models\IvrPrIvr::citycorporationlist(),Input::old('q_5_cc',isset($info->q_5_cc)?$info->q_5_cc:''), array('id' => 'q_5_cc', 'class' => 'form-control select2')) !!}
            </div>
        </div>

    	<div class="row">
            
            <div class="col-xs-12">
                {!! Form::select('q_5_dd',[''=>'---District---']+\App\Models\IvrPrIvr::districtList(),Input::old('q_5_dd',isset($info->q_5_dd)?$info->q_5_dd:''), array('id' => 'q_5_dd', 'class' => 'form-control select2')) !!}
            </div>
        </div>
        
        <div class="municipal">
            

            {!! Form::select('q_5_mc',[''=>'---Municipalty---']+\App\Models\IvrPrIvr::municipilList(isset($info->q_5_mc)?$info->q_5_mc:0),Input::old('q_5_mc',isset($info->q_5_mc)?$info->q_5_mc:''), array('id' => 'q_5_mc', 'class' => 'form-control select2')) !!}
        </div>

        <div class="upazila">
            

            {!! Form::select('q_5_uz',[''=>'---Upazila---']+\App\Models\IvrPrIvr::upazilalist(isset($info->q_5_uz)?$info->q_5_uz:0),Input::old('q_5_uz',isset($info->q_5_uz)?$info->q_5_uz:''), array('id' => 'q_5_uz', 'class' => 'form-control select2')) !!}
        </div>


        

                                 


        {!! @App\Common::radioButtonGenerate(\App\Models\IvrPrIvr::getOtherDontNoOnly(), 'q_5',0,$info->q_5, true) !!}

        {!! Form::text('q_5_e', Input::old('q_5_e',isset($info->q_5_e)?$info->q_5_e:''),array('id'=>'q_5_e','class' => 'form-control','placeholder'=>@App\Models\IvrPrIvr::questionText()['q_5_e'])) !!}
    </div>
    
    
    
</div>

{{-- end District --}}


<div class="form-group">
    <label class="col-xs-4 control-label">{!! @\App\Models\IvrPrIvr::questionText()['q_6'] !!}</label>
    <div class="col-xs-4">
        

        {!! @App\Common::radioButtonGenerate(\App\Models\IvrPrIvr::getLastEducation(), 'q_6',0,$info->q_6, true) !!}

        {!! Form::number('q_6_e', Input::old('q_6_e',isset($info->q_6_e)?$info->q_6_e:''),array('id'=>'q_6_e','min'=>0,'class' => 'form-control','placeholder'=>@App\Models\IvrPrIvr::questionText()['q_6_e'])) !!}
    </div>

    
</div>


<div class="form-group">
    <label class="col-xs-4 control-label">{!! @\App\Models\IvrPrIvr::questionText()['q_7'] !!}</label>
    <div class="col-xs-4">
               
        
        {!! Form::select('q_7',[''=>'---Select Primary option---']+\App\Models\IvrPrIvr::getOccupation(),Input::old('q_7',isset($info->q_7)?$info->q_7:''), array('id' => 'q_7', 'class' => 'form-control select2')) !!}


        {!! Form::text('q_7_e', Input::old('q_7_e',isset($info->q_7_e)?$info->q_7_e:''),array('id'=>'q_7_e','min'=>0,'class' => 'form-control','placeholder'=>@App\Models\IvrPrIvr::questionText()['q_7_e'])) !!}
       
    </div>
</div>



<div class="form-group">
    <label class="col-xs-4 control-label">{!! @App\Models\IvrPrIvr::questionText()['q_8'] !!}</label>
    <div class="col-xs-4">
        {!! @App\Common::radioButtonGenerate(\App\Models\IvrPrIvr::getYesNoDenied(), 'q_8',0,$info->q_8, true) !!}
        
    </div>
</div>




<div class="form-group">
    <label class="col-xs-4 control-label">{!! @\App\Models\IvrPrIvr::questionText()['q_9'] !!}</label>
    <div class="col-xs-4">
            
        {!! Form::select('q_9',[''=>'---Select Primary option---']+\App\Models\IvrPrIvr::getRelatedTo(),Input::old('q_9',isset($info->q_9)?$info->q_9:''), array('id' => 'q_9', 'class' => 'form-control select2')) !!}

        {!! Form::text('q_9_e', Input::old('q_9_e',isset($info->q_9_e)?$info->q_9_e:''),array('id'=>'q_9_e','min'=>0,'class' => 'form-control','placeholder'=>@App\Models\IvrPrIvr::questionText()['q_9_e'])) !!}
         
    </div>
</div>


<div class="form-group">
    <label class="col-xs-4 control-label">{!! @\App\Models\IvrPrIvr::questionText()['q_10'] !!}</label>
    <div class="col-xs-4">        
        {!! @App\Common::radioButtonGenerate(\App\Models\IvrPrIvr::getYesNoDenied(), 'q_10',0,$info->q_10, true) !!}       
    </div>
</div>

<div class="form-group">
    <label class="col-xs-4 control-label">{!! @App\Models\IvrPrIvr::questionText()['q_11']!!}</label>
    <div class="col-xs-4">        
        {!! @App\Common::radioButtonGenerate(\App\Models\IvrPrIvr::getYesNoDenied(), 'q_11',0,$info->q_11, true) !!}       
    </div>
</div>

<input type="hidden" name="id" value="{{ $info->id }}">

<div class="form-group">
    <div class="col-md-12 text-center">
    <input name="submit" type="submit" style="cursor: all !important;"  class="btn btn-primary" value="Submit"/>
    </div>
</div> 

</div>
</div>
</div>
{{ Form::close() }}

</div>
</div>

@endif;
@push('rscripts')

<script type="text/javascript">    	    
    var token="{{csrf_token()}}";
    var citycorporationurl = "{{url('public/js/citycorporationdata.json')}}";
    var municipalurl = "{{url('public/js/municipaldatadb.json')}}";
    var upazilaurl = "{{url('public/js/upaziladata.json')}}";
    //check for age jar limit
    var ageUrl ="{{url(session('access').'ivr/checkquota')}}";
    //data for all
    var citycorporationdata = [];
    var upaziladata = [];
    var municipaldata = [];
    var cc = [];
    var uz = [];
    var mc = [];

    var SequenceArray=
        	@php

                echo json_encode(\App\Models\IvrPrIvr::gateSequence())
            @endphp
            ;


    var RevSequenceArray=
            @php

                echo json_encode(\App\Models\IvrPrIvr::gateReverseSequence())
            @endphp
            ;
    

    	@php
                $allsteps = [];
                $key = -1;

                
        @endphp;

        var  AllSteps =@php
                echo json_encode($allsteps);
            @endphp;

        var step_index =@php echo $key;  @endphp;

        var ageEighteenUp =@php echo json_encode(\App\Models\IvrPrIvr::getPersonAge(null,18));@endphp;

        var ageEighteenDown =@php echo json_encode(\App\Models\IvrPrIvr::getPersonAge(null));@endphp;

        

        



</script>

<script src="{{URL::to('resources/assets/js/ivrpr/cati.js')}}"></script>
@endpush


@stop