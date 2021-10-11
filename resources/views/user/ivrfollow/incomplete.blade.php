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


{!! Form::open(array('url' => session('access').'ivr/incomplete/','method' =>'post', 'id'=>"validation", 'class'=>"form-horizontal")) !!}
<div class="wizard-content">

<p class="alert alert-info">

<strong>{{ @$info->ivr_id }}-{{ @$info->mobile_no }} | {{ @App\Models\IvrIncomplete::getCATIORIVR(@$info->qroup_id) }}</strong>
</p>
{!! csrf_field() !!}
<div class="form-group">
    <label class="col-xs-4 control-label">
    @if(isset($info->interview_date))
    {!! sprintf(@App\Models\IvrIncomplete::questionText()['q_1'], date('d/m/Y h:i A',strtotime($info->interview_date))) !!}
    @else
    {!! @App\Models\IvrIncomplete::questionText()['q_1'] !!}
    @endif
	</label>
    <div class="col-xs-4">
        {!! @App\Common::radioButtonGenerate(\App\Models\IvrIncomplete::getYesNoCom(), 'q_1',0,$info->q_1, true) !!}
        
    </div>
</div>


<div class="form-group">
    <label class="col-xs-4 control-label">{!! @App\Models\IvrIncomplete::questionText()['q_2'] !!}</label>
    <div class="col-xs-4">
        {!! @App\Common::radioButtonGenerate(\App\Models\IvrIncomplete::getYesNo(), 'q_2',0,$info->q_2, true) !!}
        
    </div>
</div>

<p class="alert alert-info">
<strong>{{ @App\Models\IvrIncomplete::questionText()['q_2_i']}}</strong>
</p>


<div class="form-group">
    <label class="col-xs-4 control-label">{!! @\App\Models\IvrIncomplete::questionText()['q_3']!!}</label>
    <div class="col-xs-4">
        {!! Form::select('q_3',[''=>'---Select an option---']+\App\Models\IvrIncomplete::getPersonAge(150),Input::old('q_3',isset($info->q_3)?$info->q_3:''), array('required'=>true,'id' => 'q_3', 'class' => 'form-control select2')) !!}
    </div>

    @if(isset($info->p_3))
    <div class="col-xs-4">
        <p class="btn-primary">{!! $info->p_3 !!}</p>
    </div>
    @endif
</div>


<div class="form-group">
    <label class="col-xs-4 control-label">{!! @App\Models\IvrIncomplete::questionText()['q_4'] !!}</label>
    <div class="col-xs-4">
        {!! @App\Common::radioButtonGenerate(\App\Models\IvrIncomplete::getGender(), 'q_4',0,$info->q_4, true) !!}
        
    </div>
    @if(isset($info->p_4))
    <div class="col-xs-4">
        <p class="btn-primary">{!! \App\Models\IvrIncomplete::getGender($info->p_4) !!}</p>
    </div>
    @endif
</div>





{{-- District  --}}


<div class="form-group">
    <label class="col-xs-4 control-label">{!! @App\Models\IvrIncomplete::questionText()['q_5']!!}</label>
    <div class="col-xs-4">

    	<div class="row">
        	
            <div class="col-xs-12">
                {!! Form::select('q_5_cc',[''=>'---City Corporation---']+\App\Models\IvrIncomplete::citycorporationlist(),Input::old('q_5_cc',isset($info->q_5_cc)?$info->q_5_cc:''), array('id' => 'q_5_cc', 'class' => 'form-control select2')) !!}
            </div>
        </div>

    	<div class="row">
            
            <div class="col-xs-12">
                {!! Form::select('q_5_dd',[''=>'---District---']+\App\Models\IvrIncomplete::districtList(),Input::old('q_5_dd',isset($info->q_5_dd)?$info->q_5_dd:''), array('id' => 'q_5_dd', 'class' => 'form-control select2')) !!}
            </div>
        </div>
        
        <div class="municipal">
            

            {!! Form::select('q_5_mc',[''=>'---Municipalty---']+\App\Models\IvrIncomplete::municipilList(isset($info->q_5_mc)?$info->q_5_mc:0),Input::old('q_5_mc',isset($info->q_5_mc)?$info->q_5_mc:''), array('id' => 'q_5_mc', 'class' => 'form-control select2')) !!}
        </div>

        <div class="upazila">
            

            {!! Form::select('q_5_uz',[''=>'---Upazila---']+\App\Models\IvrIncomplete::upazilalist(isset($info->q_5_uz)?$info->q_5_uz:0),Input::old('q_5_uz',isset($info->q_5_uz)?$info->q_5_uz:''), array('id' => 'q_5_uz', 'class' => 'form-control select2')) !!}
        </div>


        

                                 


        {!! @App\Common::radioButtonGenerate(\App\Models\IvrIncomplete::getOtherDontNoOnly(), 'q_5',0,$info->q_5, true) !!}

        {!! Form::text('q_5_e', Input::old('q_5_e',isset($info->q_5_e)?$info->q_5_e:''),array('id'=>'q_5_e','class' => 'form-control','placeholder'=>@App\Models\IvrIncomplete::questionText()['q_5_e'])) !!}
    </div>
    
    <div class="col-xs-4">
        @if(isset($info->p_5_cc))
        <p class="btn-primary">{!! @\App\Models\IvrIncomplete::citycorporationlist($info->p_5_cc)->name !!}</p>
        @endif
        @if(isset($info->p_5_dd))
        <p class="btn-primary">{!! @\App\Models\IvrIncomplete::districtList($info->p_5_dd)->name !!}</p>
        @endif
        @if(isset($info->p_5_dd) && isset($info->q_5_uz))
        <p class="btn-primary">{!! @\App\Models\IvrIncomplete::upazilalist($info->p_5_dd,$info->q_5_uz)->name !!}</p>
        @endif
        @if(isset($info->q_5))
        <p class="btn-primary">{!! @\App\Models\IvrIncomplete::getOtherDontNoOnly($info->q_5) !!}</p>
        <p class="btn-primary">{!! $info->q_5_e !!}</p>
        @endif
        
    </div>
    
</div>

{{-- end District --}}


<div class="form-group">
    <label class="col-xs-4 control-label">{!! @\App\Models\IvrIncomplete::questionText()['q_6'] !!}</label>
    <div class="col-xs-4">
        

        {!! @App\Common::radioButtonGenerate(\App\Models\IvrIncomplete::getLastEducation(), 'q_6',0,$info->q_6, true) !!}

        {!! Form::number('q_6_e', Input::old('q_6_e',isset($info->q_6_e)?$info->q_6_e:''),array('id'=>'q_6_e','min'=>0,'class' => 'form-control','placeholder'=>@App\Models\IvrIncomplete::questionText()['q_6_e'])) !!}
    </div>

    @if(isset($info->p_6))
    <div class="col-xs-4">
        <p class="btn-primary">{!! \App\Models\IvrIncomplete::getLastEducationDataP($info->p_6) !!}</p>
    </div>
    @endif
</div>


<div class="form-group">
    <label class="col-xs-4 control-label">{!! @\App\Models\IvrIncomplete::questionText()['q_7'] !!}</label>
    <div class="col-xs-4">
               
        
        {!! Form::select('q_7',[''=>'---Select Primary option---']+\App\Models\IvrIncomplete::getLastRefusalIssue(),Input::old('q_7',isset($info->q_7)?$info->q_7:''), array('id' => 'q_7', 'class' => 'form-control select2')) !!}


        {!! Form::text('q_7_e', Input::old('q_7_e',isset($info->q_7_e)?$info->q_7_e:''),array('id'=>'q_7_e','min'=>0,'class' => 'form-control','placeholder'=>@App\Models\IvrIncomplete::questionText()['q_7_e'])) !!}




        {!! Form::select('q_7_1',[''=>'---Select Secondary option---']+\App\Models\IvrIncomplete::getLastRefusalIssue(),Input::old('q_7_1',isset($info->q_7_1)?$info->q_7_1:''), array('id' => 'q_7_1', 'class' => 'form-control select2')) !!}
         

        {!! Form::text('q_7_1_e', Input::old('q_7_1_e',isset($info->q_7_1_e)?$info->q_7_1_e:''),array('id'=>'q_7_1_e','min'=>0,'class' => 'form-control','placeholder'=>@App\Models\IvrIncomplete::questionText()['q_7_1_e'])) !!}
    </div>
</div>


<div class="form-group">
    <label class="col-xs-4 control-label">{!! @App\Models\IvrIncomplete::questionText()['q_8']!!}</label>
    <div class="col-xs-4">
    {!! Form::text('q_8', Input::old('q_8',isset($info->q_8)?$info->q_8:''),array('id'=>'q_8','data-role'=>'tagsinput')) !!}
    </div>
</div>



<div class="form-group">
    <label class="col-xs-4 control-label">{!! @\App\Models\IvrIncomplete::questionText()['q_9'] !!}</label>
    <div class="col-xs-4">
            
        {!! Form::select('q_9',[''=>'---Select Primary option---']+\App\Models\IvrIncomplete::getAttractveIssue(),Input::old('q_9',isset($info->q_9)?$info->q_9:''), array('id' => 'q_9', 'class' => 'form-control select2')) !!}

        {!! Form::text('q_9_e', Input::old('q_9_e',isset($info->q_9_e)?$info->q_9_e:''),array('id'=>'q_9_e','min'=>0,'class' => 'form-control','placeholder'=>@App\Models\IvrIncomplete::questionText()['q_9_e'])) !!}


         {!! Form::select('q_9_1',[''=>'---Select Secondary option---']+\App\Models\IvrIncomplete::getAttractveIssue(),Input::old('q_9_1',isset($info->q_9_1)?$info->q_9_1:''), array('id' => 'q_9_1', 'class' => 'form-control select2')) !!}

        {!! Form::text('q_9_1_e', Input::old('q_9_1_e',isset($info->q_9_1_e)?$info->q_9_1_e:''),array('id'=>'q_9_1_e','min'=>0,'class' => 'form-control','placeholder'=>@App\Models\IvrIncomplete::questionText()['q_9_1_e'])) !!}
    </div>
</div>


<div class="form-group">
    <label class="col-xs-4 control-label">{!! @\App\Models\IvrIncomplete::questionText()['q_10'] !!}</label>
    <div class="col-xs-4">        
        {!! @App\Common::radioButtonGenerate(\App\Models\IvrIncomplete::getYesNoDenied(), 'q_10',0,$info->q_10, true) !!}       
    </div>
</div>

<div class="form-group">
    <label class="col-xs-4 control-label">{!! @App\Models\IvrIncomplete::questionText()['q_11']!!}</label>
    <div class="col-xs-4">
	{!! Form::number('q_11', Input::old('q_11',isset($info->q_11)?$info->q_11:''),array('id'=>'q_11','class' => 'form-control')) !!}
	</div>
</div>

<input type="hidden" name="id" value="{{ $info->ivr_id }}">

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

                echo json_encode(\App\Models\IvrIncomplete::gateSequence())
            @endphp
            ;


    var RevSequenceArray=
            @php

                echo json_encode(\App\Models\IvrIncomplete::gateReverseSequence())
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

        var ageEighteenUp =@php echo json_encode(\App\Models\IvrIncomplete::getPersonAge(null,18));@endphp;

        var ageEighteenDown =@php echo json_encode(\App\Models\IvrIncomplete::getPersonAge(null));@endphp;


</script>

<script src="{{URL::to('resources/assets/js/ivrfollow/incomplete.js')}}"></script>
@endpush


@stop