@extends('layouts/master')
@section('content')
    <style xmlns="http://www.w3.org/1999/html">
        .surveillance-data {
            margin: 30px;
        }
        .table-position{
            position: fixed;
            text-align: right;
            z-index: 1;
            margin-top: 10%;
            margin-left: 63.5%;
            width: 25%;
            background: #ffffff;
        }
        .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {padding: 4px 6px;}
    </style>

    <!-- Form Wizard JavaScript -->
    <link href="{{URL::to('resources/assets/ampleadmin/plugins/bower_components/jquery-wizard-master/css/wizard.css')}}"
          rel="stylesheet">
    <!-- FormValidation -->
    <link rel="stylesheet"
          href="{{URL::to('resources/assets/ampleadmin/plugins/bower_components/jquery-wizard-master/libs/formvalidation/formValidation.min.css')}}">

          <!-- Typehead CSS -->
    <link href="{{URL::to('resources/assets/ampleadmin/plugins/bower_components/typeahead.js-master/dist/typehead-min.css')}}" rel="stylesheet">


    <div class="col-md-12">
		
		<!-- Rescheduled -->
		
		<div class="col-md-4 col-sm-12  table-position" style="display: none;">
            <button class="close btn btn-danger">close(X)</button>

            <div class="form-group">
                <label style="font-size: 16px;">0. {{ @App\Models\Reproductive::questionText()['0_']}}</label>
                <label>0.0 {{ @App\Models\Reproductive::questionText()['0_0']}}</label>
            </div>
            <div class="form-group">
                <label class="col-md-12 control-label">Call Status</label>
                <div class="col-md-12">
                    {!! Form::select('call_status',[''=>'--- Call Status ---']+\App\Models\Reproductive::getScheduleSuveillance(),Input::old('call_status',isset($question->call_status)?$question->call_status:''), array('id' => 'call_status', 'class' => 'form-control')) !!}
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-12 control-label ">Date</label>
                <div class="col-md-12">
                    <input type="date" name="date" id="date" class="form-control" required="required" value="<?=date('Y-m-d')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-12 control-label ">Time</label>
                <div class="col-md-12">
                    <input type="time" name="time" id="time" class="form-control" required="required" value="<?=date('H:i')?>">
                </div>
            </div>
            <div class="form-group">
                <button type="submit" id="submit_new" class="btn btn-primary btn-block" name="schedule">Submit</button>
            </div>

            <br>
        </div>
		
        <!-- end Rescheduled -->
		
		<!-- Steps -->
		<div class="white-box">
            <div class="col-md-12 text-center">
                <button id="show_reschedule" class="btn btn-primary text-center">Show Scheduled Form
                </button>
            </div>
			<div id="exampleValidator" class="wizard">
			
				<ul class="wizard-steps" role="tablist">
                    <li class="active" role="tab">
                        <h4><span><i class="ti-user"></i></span>{{ @App\Models\Reproductive::questionText()['s']}}, {{ @App\Models\Reproductive::questionText()['gi_1']}}</h4></li>
                    <li role="tab">
                        <h4><span><i class="ti-credit-card"></i></span>{{ @App\Models\Reproductive::questionText()['fp_3']}}</h4></li>
                    <li role="tab"><h4><span><i class="ti-check"></i></span>{{ @App\Models\Reproductive::questionText()['rh_6']}}</h4></li>
                    <li  role="tab"><h4><span><i class="ti-check"></i></span>{{ @App\Models\Reproductive::questionText()['prq_8']}}</h4></li>
                    <li  role="tab"><h4><span><i class="ti-check"></i></span>{{ @App\Models\Reproductive::questionText()['fq_11']}}</h4></li>
                    
                </ul>
							

                {!! Form::open(array('url' => isset($reproductive)?session('access').'reproductive/question/'.$reproductive->id :session('access').'reproductive/question/'.$id,'method' =>'post',  'enctype'=>'multipart/form-data','id'=>"validation", 'class'=>"form-horizontal")) !!}
				<div class="wizard-content">
					{{-- Active Tab --}}
					<div class="wizard-pane active" role="tabpanel">
						<div class="surveillance-data">
							
							<div class="form-group">
                                <label class="col-xs-4 control-label">Mobile Number</label>
                                <div class="col-xs-4">
                                    <strong>{!! @$reproductive->mobile_no !!}</strong>
                                </div>
                            </div>
							
							<div class="form-group">
                                <label class="col-xs-4 control-label">0.1। {{ @App\Models\Reproductive::questionText()['s_0_1']}}</label>
                                <div class="col-xs-4">
                                    {!! @App\Common::radioButtonGenerate(\App\Models\Reproductive::getPersonalMoodHome(), 's_0_1',0,$question->s_0_1, true) !!}
                                    {{--                                    {!! Form::select('identity',[''=>'---তথ্য প্রদানকারীর পরিচয়---']+\App\Common::getIdentityType(),Input::old('identity',isset($question->identity)?$question->identity:''), array('id' => 'identity', 'class' => 'form-control')) !!}--}}
                                </div>
                            </div>
							
							<div class="form-group">
                                <label class="col-xs-4 control-label">0.2। {{ @App\Models\Reproductive::questionText()['s_0_2']}}</label>
                                <div class="col-xs-4">
                                    {!! @App\Common::radioButtonGenerate(\App\Models\Reproductive::getYesNoOnly(), 's_0_2',0,$question->s_0_2, true) !!}
                                </div>
                            </div>
							{{--
							<div class="form-group">
                                <label class="col-xs-4 control-label">0.3। {{ @App\Models\Reproductive::questionText()['s_0_3']}}</label>
                                <div class="col-xs-4">
                                    {!! @App\Common::radioButtonGenerate(\App\Models\Reproductive::getYesNoOnly(), 's_0_3',0,$question->s_0_2, true) !!}
                                </div>
                            </div>
                            --}}
							
							<div class="form-group">
                                <label class="col-xs-4 control-label">0.4। {{ @\App\Models\Reproductive::questionText()['s_0_4']}}</label>
                                <div class="col-xs-4">
                                    {!! Form::select('s_0_4',[''=>'---Select an option---']+\App\Models\Reproductive::getPersonAge(),Input::old('s_0_4',isset($question->s_0_4)?$question->s_0_4:''), array('id' => 's_0_4', 'class' => 'form-control select2')) !!}
                                </div>
                            </div>
							
							<p>
                                <br><strong> {{ @App\Models\Reproductive::questionText()['gi_1_i']}}</strong>
                            </p>

                            <div class="form-group">
                                <label class="col-xs-4 control-label">1.1। {{ @\App\Models\Reproductive::questionText()['gi_1_1']}}</label>
                                <div class="col-xs-4">
                                    {!! Form::select('gi_1_1',[''=>'---Select an option---']+\App\Models\Reproductive::districtList(),Input::old('gi_1_1',isset($question->gi_1_1)?$question->gi_1_1:''), array('id' => 'gi_1_1', 'class' => 'form-control select2')) !!}
                                </div>
                            </div>

                            

                            <div class="form-group">
                                <label class="col-xs-4 control-label">1.2। {{ @App\Models\Reproductive::questionText()['gi_1_2']}}</label>
                                <div class="col-xs-4">
                                    {!! @App\Common::radioButtonGenerate(\App\Models\Reproductive::liveIn(), 'gi_1_2',0,$question->gi_1_2, true) !!}
                                    
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-xs-4 control-label">1.3। {{ @App\Models\Reproductive::questionText()['gi_1_3']}}</label>
                                <div class="col-xs-4">
                                    <div class="city_corporation">
                                        {{-- Form::text('gi_1_3_cc', Input::old('gi_1_3_cc',isset($question->gi_1_3_cc)?$question->gi_1_3_cc:''),array('id'=>'gi_1_3_cc','class' => 'typeahead form-control','placeholder'=>@App\Models\Reproductive::questionText()['gi_1_3_cc'])) --}}

                                        {!! Form::select('gi_1_3_cc',[''=>'---City Corporation---']+\App\Models\Reproductive::citycorporationlist(isset($question->gi_1_1)?$question->gi_1_1:0),Input::old('gi_1_3_cc',isset($question->gi_1_3_cc)?$question->gi_1_3_cc:''), array('id' => 'gi_1_3_cc', 'class' => 'form-control select2')) !!}
                                    </div>

                                    <div class="upazila">
                                        {{-- Form::text('gi_1_3_uz', Input::old('gi_1_3_uz',isset($question->gi_1_3_uz)?$question->gi_1_3_uz:''),array('id'=>'gi_1_3_uz','class' => 'typeahead form-control','placeholder'=>@App\Models\Reproductive::questionText()['gi_1_3_uz'])) --}}

                                        {!! Form::select('gi_1_3_uz',[''=>'---Upazila---']+\App\Models\Reproductive::upazilalist(isset($question->gi_1_1)?$question->gi_1_1:0),Input::old('gi_1_3_uz',isset($question->gi_1_3_uz)?$question->gi_1_3_uz:''), array('id' => 'gi_1_3_uz', 'class' => 'form-control select2')) !!}
                                    </div>

                                    <div class="municipal_corporation">
                                        {{-- Form::text('gi_1_3_mc', Input::old('gi_1_3_mc',isset($question->gi_1_3_mc)?$question->gi_1_3_mc:''),array('id'=>'gi_1_3_mc','class' => 'typeahead form-control','placeholder'=>@App\Models\Reproductive::questionText()['gi_1_3_mc'])) --}}
                                    </div>                                


                                    {!! @App\Common::radioButtonGenerate(\App\Models\Reproductive::getOtherDontNoOnly(), 'gi_1_3',0,$question->gi_1_3, true) !!}

                                    {!! Form::text('gi_1_3_e', Input::old('gi_1_3_e',isset($question->gi_1_3_e)?$question->gi_1_3_e:''),array('id'=>'gi_1_3_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['gi_1_3_e'])) !!}
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-xs-4 control-label">1.4। {{@App\Models\Reproductive::questionText()['gi_1_4']}}</label>
                                <div class="col-xs-4">
                                    

                                        {!! Form::select('gi_1_4',[''=>'---Select an option---']+\App\Models\Reproductive::getEducationalBackground(),Input::old('gi_1_4',isset($question->gi_1_4)?$question->gi_1_4:''), array('id' => 'gi_1_4', 'class' => 'form-control select2')) !!}

                                        {!! Form::number('gi_1_4_e', Input::old('gi_1_4_e',isset($question->gi_1_4_e)?$question->gi_1_4_e:''),array('id'=>'gi_1_4_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['gi_1_4_placeholder'])) !!}                                        
                                                                 
                                </div>
                               

                            </div>

                            <div class="form-group">
                                <label class="col-xs-4 control-label">1.5। {{ @\App\Models\Reproductive::questionText()['gi_1_5']}}</label>
                                <div class="col-xs-4">
                                    {!! Form::select('gi_1_5',[''=>'---Select an option---']+\App\Models\Reproductive::getPrimaryOccupation(),Input::old('gi_1_5',isset($question->gi_1_5)?$question->gi_1_5:''), array('id' => 'gi_1_5', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('gi_1_5_e', Input::old('gi_1_5_e',isset($question->gi_1_5_e)?$question->gi_1_5_e:''),array('id'=>'gi_1_5_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['gi_1_5_e'])) !!}     
                                </div>
                            </div>

                            <p>
                                <br><strong> {{ @App\Models\Reproductive::questionText()['pi_2_i']}}</strong>
                            </p>

                           

                            <div class="form-group">
                                <label class="col-xs-4 control-label">2.1। {{ @App\Models\Reproductive::questionText()['pi_2_1']}}</label>
                                <div class="col-xs-4">
                                    {!! @App\Common::radioButtonGenerate(\App\Models\Reproductive::marialStatus(), 'pi_2_1',0,$question->pi_2_1, true) !!}
                                    
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-xs-4 control-label">2.2। {{ @\App\Models\Reproductive::questionText()['pi_2_2']}}</label>
                                <div class="col-xs-4">
                                    {!! Form::select('pi_2_2',[''=>'---Select an option---']+\App\Models\Reproductive::getPersonAge(),Input::old('pi_2_2',isset($question->pi_2_2)?$question->pi_2_2:''), array('id' => 'pi_2_2', 'class' => 'form-control select2')) !!}
                                </div>
                            </div>


                            

                            <div class="form-group">
                                <label class="col-xs-4 control-label">2.3। {{ @App\Models\Reproductive::questionText()['pi_2_3']}}</label>
                                <div class="col-xs-4">
                                    {!! @App\Common::radioButtonGenerate(\App\Models\Reproductive::getYesNoOnly(), 'pi_2_3',0,$question->pi_2_3, true) !!}
                                    
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-xs-4 control-label">2.4। {{ @\App\Models\Reproductive::questionText()['pi_2_4']}}</label>
                                <div class="col-xs-4">
                                    {!! Form::select('pi_2_4',[''=>'---Select an option---']+\App\Models\Reproductive::getPersonMarrigeAge(),Input::old('pi_2_4',isset($question->pi_2_2)?$question->pi_2_4:''), array('id' => 'pi_2_4', 'class' => 'form-control select2')) !!}
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-xs-4 control-label">2.5। {{ @App\Models\Reproductive::questionText()['pi_2_5']}}</label>
                                <div class="col-xs-4">
                                   
                                    {!! @App\Common::radioButtonGenerate(\App\Models\Reproductive::getGiveAnswerDontNoOnly(), 'pi_2_5',0,$question->pi_2_5, true) !!}
                                    
                                    {!! Form::text('pi_2_5_1', Input::old('pi_2_5_1',isset($question->pi_2_5_1)?$question->pi_2_5_1:''),array('id'=>'pi_2_5_1','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['pi_2_5_1'])) !!}


                                    {!! Form::text('pi_2_5_2', Input::old('pi_2_5_2',isset($question->pi_2_5_2)?$question->pi_2_5_2:''),array('id'=>'pi_2_5_2','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['pi_2_5_2'])) !!}


                                    
                                </div>
                            </div>

						
						</div>
					</div>
					{{-- Section 1 Tab --}}
					<div class="wizard-pane" role="tabpanel">
						<p><br><strong> {{ @App\Models\Reproductive::questionText()['fp_3_i']}}</strong></p>

                            

                            <div class="form-group">
                                <label class="col-xs-4 control-label">3.1। {{ @App\Models\Reproductive::questionText()['fp_3_1']}}</label>
                                <div class="col-xs-4">
                                    {!! @App\Common::radioButtonGenerate(\App\Models\Reproductive::getYesNo(), 'fp_3_1',0,$question->fp_3_1, true) !!}
                                    
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-xs-4 control-label">3.2। {{ @\App\Models\Reproductive::questionText()['fp_3_2']}}</label>
                                <div class="col-xs-4">
                                    {!! Form::select('fp_3_2_1',[''=>'---Select an option---']+\App\Models\Reproductive::getFamilyPlanStep(),Input::old('fp_3_2_1',isset($question->fp_3_2_1)?$question->fp_3_2_1:''), array('id' => 'fp_3_2_1', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('fp_3_2_1_e', Input::old('fp_3_2_1_e',isset($question->fp_3_2_1_e)?$question->fp_3_2_1_e:''),array('id'=>'fp_3_2_1_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['fp_3_2_1_e'])) !!}

                                    {!! Form::select('fp_3_2_2',[''=>'---Select an option---']+\App\Models\Reproductive::getFamilyPlanStep(),Input::old('fp_3_2_2',isset($question->fp_3_2_2)?$question->fp_3_2_2:''), array('id' => 'fp_3_2_2', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('fp_3_2_2_e', Input::old('fp_3_2_2_e',isset($question->fp_3_2_2_e)?$question->fp_3_2_2_e:''),array('id'=>'fp_3_2_2_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['fp_3_2_2_e'])) !!}

                                    {!! Form::select('fp_3_2_3',[''=>'---Select an option---']+\App\Models\Reproductive::getFamilyPlanStep(),Input::old('fp_3_2_3',isset($question->fp_3_2_3)?$question->fp_3_2_3:''), array('id' => 'fp_3_2_3', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('fp_3_2_3_e', Input::old('fp_3_2_3_e',isset($question->fp_3_2_3_e)?$question->fp_3_2_3_e:''),array('id'=>'fp_3_2_3_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['fp_3_2_3_e'])) !!}


                                    {!! Form::select('fp_3_2_4',[''=>'---Select an option---']+\App\Models\Reproductive::getFamilyPlanStep(),Input::old('fp_3_2_4',isset($question->fp_3_2_4)?$question->fp_3_2_4:''), array('id' => 'fp_3_2_4', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('fp_3_2_4_e', Input::old('fp_3_2_4_e',isset($question->fp_3_2_4_e)?$question->fp_3_2_4_e:''),array('id'=>'fp_3_2_4_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['fp_3_2_4_e'])) !!}
                                </div>


                            </div>


                            <div class="form-group">
                                <label class="col-xs-4 control-label">3.3। {{ @\App\Models\Reproductive::questionText()['fp_3_3']}}</label>
                                <div class="col-xs-4">
                                    {!! Form::select('fp_3_3_1',[''=>'---Select an option---']+\App\Models\Reproductive::getWhoList(),Input::old('fp_3_3_1',isset($question->fp_3_3_1)?$question->fp_3_3_1:''), array('id' => 'fp_3_3_1', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('fp_3_3_1_e', Input::old('fp_3_2_1_e',isset($question->fp_3_3_1_e)?$question->fp_3_3_1_e:''),array('id'=>'fp_3_3_1_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['fp_3_3_1_e'])) !!}

                                    {!! Form::select('fp_3_3_2',[''=>'---Select an option---']+\App\Models\Reproductive::getWhoList(),Input::old('fp_3_3_2',isset($question->fp_3_3_2)?$question->fp_3_3_2:''), array('id' => 'fp_3_3_2', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('fp_3_3_2_e', Input::old('fp_3_2_1_e',isset($question->fp_3_3_2_e)?$question->fp_3_3_2_e:''),array('id'=>'fp_3_3_2_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['fp_3_3_2_e'])) !!}

                                    {!! Form::select('fp_3_3_3',[''=>'---Select an option---']+\App\Models\Reproductive::getWhoList(),Input::old('fp_3_3_3',isset($question->fp_3_3_3)?$question->fp_3_3_3:''), array('id' => 'fp_3_3_3', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('fp_3_3_3_e', Input::old('fp_3_3_3_e',isset($question->fp_3_3_3_e)?$question->fp_3_3_3_e:''),array('id'=>'fp_3_3_3_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['fp_3_3_3_e'])) !!}



                                </div>


                            </div>


                            <div class="form-group">
                                <label class="col-xs-4 control-label">3.4। {{@App\Models\Reproductive::questionText()['fp_3_4']}}</label>
                                <div class="col-xs-4">
                                    

                                        
                                        {!! @App\Common::radioButtonGenerate(\App\Models\Reproductive::getYesNoOther(), 'fp_3_4',0,$question->fp_3_4, true) !!}

                                        {!! Form::text('fp_3_4_e', Input::old('fp_3_4_e',isset($question->fp_3_4_e)?$question->fp_3_4_e:''),array('id'=>'fp_3_4_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['fp_3_4_e'])) !!}                                        
                                                                 
                                </div>
                               

                            </div>

                            <p><br><strong> {{ @App\Models\Reproductive::questionText()['dp_4_i']}}</strong></p>

                            

                            <div class="form-group">
                                <label class="col-xs-4 control-label">4.1। {{ @App\Models\Reproductive::questionText()['dp_4_1']}}</label>
                                <div class="col-xs-4">
                                    {!! @App\Common::radioButtonGenerate(\App\Models\Reproductive::getYesNo(), 'dp_4_1',0,$question->dp_4_1, true) !!}
                                    
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-xs-4 control-label">4.2। {{ @\App\Models\Reproductive::questionText()['dp_4_2']}}</label>
                                <div class="col-xs-4">
                                    {!! Form::select('dp_4_2',[''=>'---Select an option---']+\App\Models\Reproductive::getPregnantNoOfService(),Input::old('dp_4_2',isset($question->dp_4_2)?$question->dp_4_2:''), array('id' => 'dp_4_2', 'class' => 'form-control select2')) !!}
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-xs-4 control-label">4.3। {{ @\App\Models\Reproductive::questionText()['dp_4_3']}}</label>
                                <div class="col-xs-4">
                                    {!! Form::select('dp_4_3_1',[''=>'---Select an option---']+\App\Models\Reproductive::getWhoList(),Input::old('dp_4_3_1',isset($question->dp_4_3_1)?$question->dp_4_3_1:''), array('id' => 'dp_4_3_1', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('dp_4_3_1_e', Input::old('dp_4_3_1_e',isset($question->dp_4_3_1_e)?$question->dp_4_3_1_e:''),array('id'=>'dp_4_3_1_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['dp_4_3_1_e'])) !!}

                                    {!! Form::select('dp_4_3_2',[''=>'---Select an option---']+\App\Models\Reproductive::getWhoList(),Input::old('dp_4_3_2',isset($question->dp_4_3_2)?$question->dp_4_3_2:''), array('id' => 'dp_4_3_2', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('dp_4_3_2_e', Input::old('dp_4_3_2_e',isset($question->dp_4_3_2_e)?$question->dp_4_3_2_e:''),array('id'=>'dp_4_3_2_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['dp_4_3_2_e'])) !!}

                                    {!! Form::select('dp_4_3_3',[''=>'---Select an option---']+\App\Models\Reproductive::getWhoList(),Input::old('dp_4_3_3',isset($question->dp_4_3_3)?$question->dp_4_3_3:''), array('id' => 'dp_4_3_3', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('dp_4_3_3_e', Input::old('dp_4_3_3_e',isset($question->dp_4_3_3_e)?$question->dp_4_3_3_e:''),array('id'=>'dp_4_3_3_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['dp_4_3_3_e'])) !!}
                                </div>


                            </div>


                            <div class="form-group">
                                <label class="col-xs-4 control-label">4.4। {{ @\App\Models\Reproductive::questionText()['dp_4_4']}}</label>
                                <div class="col-xs-4">
                                    {!! Form::select('dp_4_4_1',[''=>'---Select an option---']+\App\Models\Reproductive::getWhereList(),Input::old('dp_4_4_1',isset($question->dp_4_4_1)?$question->dp_4_4_1:''), array('id' => 'dp_4_4_1', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('dp_4_4_1_e', Input::old('dp_4_4_1_e',isset($question->dp_4_4_1_e)?$question->dp_4_4_1_e:''),array('id'=>'dp_4_4_1_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['dp_4_4_1_e'])) !!}

                                    {!! Form::select('dp_4_4_2',[''=>'---Select an option---']+\App\Models\Reproductive::getWhereList(),Input::old('dp_4_4_2',isset($question->dp_4_4_2)?$question->dp_4_4_2:''), array('id' => 'dp_4_4_2', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('dp_4_4_2_e', Input::old('dp_4_4_1_e',isset($question->dp_4_4_2_e)?$question->dp_4_4_2_e:''),array('id'=>'dp_4_4_2_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['dp_4_4_2_e'])) !!}

                                    {!! Form::select('dp_4_4_3',[''=>'---Select an option---']+\App\Models\Reproductive::getWhereList(),Input::old('dp_4_4_3',isset($question->dp_4_4_3)?$question->dp_4_4_3:''), array('id' => 'dp_4_4_3', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('dp_4_4_3_e', Input::old('dp_4_4_3_e',isset($question->dp_4_4_3_e)?$question->dp_4_4_3_e:''),array('id'=>'dp_4_4_3_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['dp_4_4_3_e'])) !!}
                                </div>


                            </div>


                            

                            <div class="form-group">
                                <label class="col-xs-4 control-label">4.5। {{ @App\Models\Reproductive::questionText()['dp_4_5']}}</label>
                                <div class="col-xs-4">
                                    {!! @App\Common::radioButtonGenerate(\App\Models\Reproductive::getYesNo(), 'dp_4_5',0,$question->dp_4_5, true) !!}
                                    
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-xs-4 control-label">4.6। {{ @\App\Models\Reproductive::questionText()['dp_4_6']}}</label>
                                <div class="col-xs-4">
                                    {!! Form::select('dp_4_6_1',[''=>'---Select an option---']+\App\Models\Reproductive::getPregnancyDangers(),Input::old('dp_4_6_1',isset($question->dp_4_6_1)?$question->dp_4_6_1:''), array('id' => 'dp_4_6_1', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('dp_4_6_1_e', Input::old('dp_4_6_1_e',isset($question->dp_4_6_1_e)?$question->dp_4_6_1_e:''),array('id'=>'dp_4_6_1_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['dp_4_6_1_e'])) !!}

                                    {!! Form::select('dp_4_6_2',[''=>'---Select an option---']+\App\Models\Reproductive::getPregnancyDangers(),Input::old('dp_4_6_2',isset($question->dp_4_6_2)?$question->dp_4_6_2:''), array('id' => 'dp_4_6_2', 'class' => 'form-control select2')) !!}


                                    {!! Form::text('dp_4_6_2_e', Input::old('dp_4_6_2_e',isset($question->dp_4_6_2_e)?$question->dp_4_6_2_e:''),array('id'=>'dp_4_6_2_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['dp_4_6_2_e'])) !!}

                                    {!! Form::select('dp_4_6_3',[''=>'---Select an option---']+\App\Models\Reproductive::getPregnancyDangers(),Input::old('dp_4_6_3',isset($question->dp_4_6_3)?$question->dp_4_6_3:''), array('id' => 'dp_4_6_3', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('dp_4_6_3_e', Input::old('dp_4_6_3_e',isset($question->dp_4_6_3_e)?$question->dp_4_6_3_e:''),array('id'=>'dp_4_6_3_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['dp_4_6_3_e'])) !!}
                                </div>


                            </div>


                            <div class="form-group">
                                <label class="col-xs-4 control-label">4.7। {{ @\App\Models\Reproductive::questionText()['dp_4_7']}}</label>
                                <div class="col-xs-4">
                                    {!! Form::select('dp_4_7_1',[''=>'---Select an option---']+\App\Models\Reproductive::getWhereList(),Input::old('dp_4_7_1',isset($question->dp_4_7_1)?$question->dp_4_7_1:''), array('id' => 'dp_4_7_1', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('dp_4_7_1_e', Input::old('dp_4_7_1_e',isset($question->dp_4_7_1_e)?$question->dp_4_7_1_e:''),array('id'=>'dp_4_7_1_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['dp_4_7_1_e'])) !!}

                                    {!! Form::select('dp_4_7_2',[''=>'---Select an option---']+\App\Models\Reproductive::getWhereList(),Input::old('dp_4_7_2',isset($question->dp_4_7_2)?$question->dp_4_7_2:''), array('id' => 'dp_4_7_2', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('dp_4_7_2_e', Input::old('dp_4_7_2_e',isset($question->dp_4_7_2_e)?$question->dp_4_7_2_e:''),array('id'=>'dp_4_7_2_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['dp_4_7_2_e'])) !!}

                                    {!! Form::select('dp_4_7_3',[''=>'---Select an option---']+\App\Models\Reproductive::getWhereList(),Input::old('dp_4_7_3',isset($question->dp_4_7_3)?$question->dp_4_7_3:''), array('id' => 'dp_4_7_3', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('dp_4_7_3_e', Input::old('dp_4_7_3_e',isset($question->dp_4_7_3_e)?$question->dp_4_7_3_e:''),array('id'=>'dp_4_7_3_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['dp_4_7_3_e'])) !!}
                                </div>


                            </div>


                            <div class="form-group">
                                <label class="col-xs-4 control-label">4.8। {{ @\App\Models\Reproductive::questionText()['dp_4_8']}}</label>
                                <div class="col-xs-4">
                                    {!! Form::select('dp_4_8_1',[''=>'---Select an option---']+\App\Models\Reproductive::getWhereList(),Input::old('dp_4_8_1',isset($question->dp_4_8_1)?$question->dp_4_8_1:''), array('id' => 'dp_4_8_1', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('dp_4_8_1_e', Input::old('dp_4_8_1_e',isset($question->dp_4_8_1_e)?$question->dp_4_8_1_e:''),array('id'=>'dp_4_8_1_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['dp_4_8_1_e'])) !!}

                                    {!! Form::select('dp_4_8_2',[''=>'---Select an option---']+\App\Models\Reproductive::getWhereList(),Input::old('dp_4_8_2',isset($question->dp_4_8_2)?$question->dp_4_8_2:''), array('id' => 'dp_4_8_2', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('dp_4_8_2_e', Input::old('dp_4_8_2_e',isset($question->dp_4_8_2_e)?$question->dp_4_8_2_e:''),array('id'=>'dp_4_8_2_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['dp_4_8_2_e'])) !!}

                                    {!! Form::select('dp_4_8_3',[''=>'---Select an option---']+\App\Models\Reproductive::getWhereList(),Input::old('dp_4_8_3',isset($question->dp_4_8_3)?$question->dp_4_8_3:''), array('id' => 'dp_4_8_3', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('dp_4_8_3_e', Input::old('dp_4_8_3_e',isset($question->dp_4_8_3_e)?$question->dp_4_8_3_e:''),array('id'=>'dp_4_8_3_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['dp_4_8_3_e'])) !!}
                                </div>


                            </div>

                            <div class="form-group">
                                <label class="col-xs-4 control-label">4.9। {{ @\App\Models\Reproductive::questionText()['dp_4_9']}}</label>
                                <div class="col-xs-4">
                                    {!! Form::select('dp_4_9_1',[''=>'---Select an option---']+\App\Models\Reproductive::getWhoList(),Input::old('dp_4_9_1',isset($question->dp_4_9_1)?$question->dp_4_9_1:''), array('id' => 'dp_4_9_1', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('dp_4_9_1_e', Input::old('dp_4_9_1_e',isset($question->dp_4_9_1_e)?$question->dp_4_9_1_e:''),array('id'=>'dp_4_9_1_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['dp_4_9_1_e'])) !!}

                                    {!! Form::select('dp_4_9_2',[''=>'---Select an option---']+\App\Models\Reproductive::getWhoList(),Input::old('dp_4_9_2',isset($question->dp_4_9_2)?$question->dp_4_9_2:''), array('id' => 'dp_4_9_2', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('dp_4_9_2_e', Input::old('dp_4_9_2_e',isset($question->dp_4_9_2_e)?$question->dp_4_9_2_e:''),array('id'=>'dp_4_9_2_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['dp_4_9_2_e'])) !!}

                                    {!! Form::select('dp_4_9_3',[''=>'---Select an option---']+\App\Models\Reproductive::getWhoList(),Input::old('dp_4_9_3',isset($question->dp_4_9_3)?$question->dp_4_9_3:''), array('id' => 'dp_4_9_3', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('dp_4_9_3_e', Input::old('dp_4_9_3_e',isset($question->dp_4_9_3_e)?$question->dp_4_9_3_e:''),array('id'=>'dp_4_9_3_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['dp_4_9_3_e'])) !!}
                                </div>


                            </div>

                            <div class="form-group">
                                <label class="col-xs-4 control-label">4.10। {{ @App\Models\Reproductive::questionText()['dp_4_10']}}</label>
                                <div class="col-xs-4">
                                    {!! @App\Common::radioButtonGenerate(\App\Models\Reproductive::getYesNo(), 'dp_4_10',0,$question->dp_4_10, true) !!}
                                    
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-xs-4 control-label">4.11। {{ @App\Models\Reproductive::questionText()['dp_4_11']}}</label>
                                <div class="col-xs-4">
                                    {!! @App\Common::radioButtonGenerate(\App\Models\Reproductive::getYesNo(), 'dp_4_11',0,$question->dp_4_11, true) !!}
                                    
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-xs-4 control-label">4.12। {{ @\App\Models\Reproductive::questionText()['dp_4_12']}}</label>
                                <div class="col-xs-4">
                                    {!! Form::select('dp_4_12',[''=>'---Select an option---']+\App\Models\Reproductive::getMidwifeQualifications(),Input::old('dp_4_12',isset($question->dp_4_12)?$question->dp_4_12:''), array('id' => 'dp_4_12', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('dp_4_12_e', Input::old('dp_4_12_e',isset($question->dp_4_12_e)?$question->dp_4_12_e:''),array('id'=>'dp_4_12_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['dp_4_12_e'])) !!}
                                </div>
                            </div>


                                                       


                            <div class="form-group">
                                <label class="col-xs-4 control-label">4.13। {{ @App\Models\Reproductive::questionText()['dp_4_13']}}</label>
                                <div class="col-xs-4">
                                    {!! @App\Common::radioButtonGenerate(\App\Models\Reproductive::getYesNo(), 'dp_4_13',0,$question->dp_4_13, true) !!}
                                    
                                </div>
                            </div>

                           


                            <div class="form-group">
                                <label class="col-xs-4 control-label">4.14। {{ @\App\Models\Reproductive::questionText()['dp_4_14']}}</label>
                                <div class="col-xs-4">
                                    {!! Form::select('dp_4_14_1',[''=>'---Select an option---']+\App\Models\Reproductive::getPregnancyWhatHappened(),Input::old('dp_4_14_1',isset($question->dp_4_14_1)?$question->dp_4_14_1:''), array('id' => 'dp_4_14_1', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('dp_4_14_1_e', Input::old('dp_4_14_1_e',isset($question->dp_4_14_1_e)?$question->dp_4_14_1_e:''),array('id'=>'dp_4_14_1_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['dp_4_14_1_e'])) !!}

                                    {!! Form::select('dp_4_14_2',[''=>'---Select an option---']+\App\Models\Reproductive::getPregnancyWhatHappened(),Input::old('dp_4_8_2',isset($question->dp_4_14_2)?$question->dp_4_14_2:''), array('id' => 'dp_4_14_2', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('dp_4_14_2_e', Input::old('dp_4_14_2_e',isset($question->dp_4_14_2_e)?$question->dp_4_14_2_e:''),array('id'=>'dp_4_14_2_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['dp_4_14_2_e'])) !!}

                                    {!! Form::select('dp_4_14_3',[''=>'---Select an option---']+\App\Models\Reproductive::getPregnancyWhatHappened(),Input::old('dp_4_14_3',isset($question->dp_4_14_3)?$question->dp_4_14_3:''), array('id' => 'dp_4_14_3', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('dp_4_14_3_e', Input::old('dp_4_14_3_e',isset($question->dp_4_14_3_e)?$question->dp_4_14_3_e:''),array('id'=>'dp_4_14_3_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['dp_4_14_3_e'])) !!}
                                </div>


                            </div>


                            <div class="form-group">
                                <label class="col-xs-4 control-label">4.15। {{ @\App\Models\Reproductive::questionText()['dp_4_15']}}</label>
                                <div class="col-xs-4">
                                    {!! Form::select('dp_4_15_1',[''=>'---Select an option---']+\App\Models\Reproductive::getPregnancyWhatToDo(),Input::old('dp_4_15_1',isset($question->dp_4_15_1)?$question->dp_4_15_1:''), array('id' => 'dp_4_15_1', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('dp_4_15_1_e', Input::old('dp_4_15_1_e',isset($question->dp_4_15_1_e)?$question->dp_4_15_1_e:''),array('id'=>'dp_4_15_1_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['dp_4_15_1_e'])) !!}

                                    {!! Form::select('dp_4_15_2',[''=>'---Select an option---']+\App\Models\Reproductive::getPregnancyWhatToDo(),Input::old('dp_4_15_2',isset($question->dp_4_15_2)?$question->dp_4_15_2:''), array('id' => 'dp_4_15_2', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('dp_4_15_2_e', Input::old('dp_4_15_2_e',isset($question->dp_4_15_2_e)?$question->dp_4_15_2_e:''),array('id'=>'dp_4_15_2_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['dp_4_15_2_e'])) !!}

                                    {!! Form::select('dp_4_15_3',[''=>'---Select an option---']+\App\Models\Reproductive::getPregnancyWhatToDo(),Input::old('dp_4_15_3',isset($question->dp_4_15_3)?$question->dp_4_15_3:''), array('id' => 'dp_4_15_3', 'class' => 'form-control select2')) !!}


                                    {!! Form::text('dp_4_15_3_e', Input::old('dp_4_15_3_e',isset($question->dp_4_15_3_e)?$question->dp_4_15_3_e:''),array('id'=>'dp_4_15_3_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['dp_4_15_3_e'])) !!}



                                </div>


                            </div>


                            <div class="form-group">
                                <label class="col-xs-4 control-label">4.16। {{ @\App\Models\Reproductive::questionText()['dp_4_16']}}</label>
                                <div class="col-xs-4">
                                    {!! Form::select('dp_4_16_1',[''=>'---Select an option---']+\App\Models\Reproductive::getPregnancyWhatToDoForSafety(),Input::old('dp_4_16_1',isset($question->dp_4_16_1)?$question->dp_4_16_1:''), array('id' => 'dp_4_16_1', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('dp_4_16_1_e', Input::old('dp_4_16_1_e',isset($question->dp_4_16_1_e)?$question->dp_4_16_1_e:''),array('id'=>'dp_4_16_1_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['dp_4_16_1_e'])) !!}

                                    {!! Form::select('dp_4_16_2',[''=>'---Select an option---']+\App\Models\Reproductive::getPregnancyWhatToDoForSafety(),Input::old('dp_4_16_2',isset($question->dp_4_16_2)?$question->dp_4_16_2:''), array('id' => 'dp_4_16_2', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('dp_4_16_2_e', Input::old('dp_4_16_2_e',isset($question->dp_4_16_2_e)?$question->dp_4_16_2_e:''),array('id'=>'dp_4_16_2_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['dp_4_16_2_e'])) !!}

                                    {!! Form::select('dp_4_16_3',[''=>'---Select an option---']+\App\Models\Reproductive::getPregnancyWhatToDoForSafety(),Input::old('dp_4_16_3',isset($question->dp_4_16_3)?$question->dp_4_16_3:''), array('id' => 'dp_4_16_3', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('dp_4_16_3_e', Input::old('dp_4_16_3_e',isset($question->dp_4_16_3_e)?$question->dp_4_16_3_e:''),array('id'=>'dp_4_16_3_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['dp_4_16_3_e'])) !!}
                                </div>


                            </div>

                            <p><br><strong> {{ @App\Models\Reproductive::questionText()['cq_5_i']}}</strong></p>

                            <div class="form-group">
                                <label class="col-xs-4 control-label">5.1। {{ @App\Models\Reproductive::questionText()['cq_5_1']}}</label>
                                <div class="col-xs-4">
                                    {!! @App\Common::radioButtonGenerate(\App\Models\Reproductive::getYesNo(), 'cq_5_1',0,$question->cq_5_1, true) !!}
                                    
                                </div>
                            </div>


                             <div class="form-group">
                                <label class="col-xs-4 control-label">5.2। {{ @\App\Models\Reproductive::questionText()['cq_5_2']}}</label>
                                <div class="col-xs-4">
                                    {!! Form::select('cq_5_2_1',[''=>'---Select an option---']+\App\Models\Reproductive::getCancerHappenedProblem(),Input::old('cq_5_2_1',isset($question->cq_5_2_1)?$question->cq_5_2_1:''), array('id' => 'cq_5_2_1', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('cq_5_2_1_e', Input::old('cq_5_2_1_e',isset($question->cq_5_2_1_e)?$question->cq_5_2_1_e:''),array('id'=>'cq_5_2_1_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['cq_5_2_1_e'])) !!}

                                    {!! Form::select('cq_5_2_2',[''=>'---Select an option---']+\App\Models\Reproductive::getCancerHappenedProblem(),Input::old('cq_5_2_2',isset($question->cq_5_2_2)?$question->cq_5_2_2:''), array('id' => 'cq_5_2_2', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('cq_5_2_2_e', Input::old('cq_5_2_2_e',isset($question->cq_5_2_2_e)?$question->cq_5_2_2_e:''),array('id'=>'cq_5_2_2_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['cq_5_2_2_e'])) !!}

                                    {!! Form::select('cq_5_2_3',[''=>'---Select an option---']+\App\Models\Reproductive::getCancerHappenedProblem(),Input::old('cq_5_2_3',isset($question->cq_5_2_3)?$question->cq_5_2_3:''), array('id' => 'cq_5_2_3', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('cq_5_2_3_e', Input::old('cq_5_2_3_e',isset($question->cq_5_2_3_e)?$question->cq_5_2_3_e:''),array('id'=>'cq_5_2_3_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['cq_5_2_3_e'])) !!}
                                </div>


                            </div>

                            <div class="form-group">
                                <label class="col-xs-4 control-label">5.3। {{ @App\Models\Reproductive::questionText()['cq_5_3']}}</label>
                                <div class="col-xs-4">
                                    {!! @App\Common::radioButtonGenerate(\App\Models\Reproductive::getYesNo(), 'cq_5_3',0,$question->cq_5_3, true) !!}
                                    
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-xs-4 control-label">5.4। {{ @\App\Models\Reproductive::questionText()['cq_5_4']}}</label>
                                <div class="col-xs-4">
                                    {!! Form::select('cq_5_4',[''=>'---Select an option---']+\App\Models\Reproductive::getCancerTestWhy(),Input::old('cq_5_4',isset($question->cq_5_4)?$question->cq_5_4:''), array('id' => 'cq_5_4', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('cq_5_4_e', Input::old('cq_5_4_e',isset($question->cq_5_4_e)?$question->cq_5_4_e:''),array('id'=>'cq_5_4_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['cq_5_4_e'])) !!}
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-xs-4 control-label">5.5। {{ @App\Models\Reproductive::questionText()['cq_5_5']}}</label>
                                <div class="col-xs-4">
                                    {!! Form::select('cq_5_5',[''=>'---Select an option---']+\App\Models\Reproductive::getCancerInfectedAge(),Input::old('cq_5_5',isset($question->cq_5_5)?$question->cq_5_5:''), array('id' => 'cq_5_5', 'class' => 'form-control select2')) !!}
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-xs-4 control-label">5.6। {{ @\App\Models\Reproductive::questionText()['cq_5_6']}}</label>
                                <div class="col-xs-4">
                                    {!! Form::select('cq_5_6_1',[''=>'---Select an option---']+\App\Models\Reproductive::getWhereList(),Input::old('cq_5_6_1',isset($question->cq_5_6_1)?$question->cq_5_6_1:''), array('id' => 'cq_5_6_1', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('cq_5_6_1_e', Input::old('cq_5_6_1_e',isset($question->cq_5_6_1_e)?$question->cq_5_6_1_e:''),array('id'=>'cq_5_6_1_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['cq_5_6_1_e'])) !!}

                                    {!! Form::select('cq_5_6_2',[''=>'---Select an option---']+\App\Models\Reproductive::getWhereList(),Input::old('cq_5_6_2',isset($question->cq_5_6_2)?$question->cq_5_6_2:''), array('id' => 'cq_5_6_2', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('cq_5_6_2_e', Input::old('cq_5_6_2_e',isset($question->cq_5_6_2_e)?$question->cq_5_6_2_e:''),array('id'=>'cq_5_6_2_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['cq_5_6_2_e'])) !!}

                                    {!! Form::select('cq_5_6_3',[''=>'---Select an option---']+\App\Models\Reproductive::getWhereList(),Input::old('cq_5_6_3',isset($question->cq_5_6_3)?$question->cq_5_6_3:''), array('id' => 'cq_5_6_3', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('cq_5_6_3_e', Input::old('cq_5_6_3_e',isset($question->cq_5_6_3_e)?$question->cq_5_6_3_e:''),array('id'=>'cq_5_6_3_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['cq_5_6_3_e'])) !!}
                                </div>


                            </div>


                            <div class="form-group">
                                <label class="col-xs-4 control-label">5.7। {{ @App\Models\Reproductive::questionText()['cq_5_7']}}</label>
                                <div class="col-xs-4">
                                    {!! @App\Common::radioButtonGenerate(\App\Models\Reproductive::getYesNo(), 'cq_5_7',0,$question->cq_5_7, true) !!}
                                    
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-xs-4 control-label">5.8। {{ @App\Models\Reproductive::questionText()['cq_5_8']}}</label>
                                <div class="col-xs-4">
                                    {!! @App\Common::radioButtonGenerate(\App\Models\Reproductive::getYesNo(), 'cq_5_8',0,$question->cq_5_8, true) !!}
                                    
                                </div>
                            </div>


                            


                           
                            <div class="form-group">
                                <label class="col-xs-4 control-label">5.9। {{ @App\Models\Reproductive::questionText()['cq_5_9']}}</label>
                                <div class="col-xs-4">
                                    {!! Form::select('cq_5_9',[''=>'---Select an option---']+\App\Models\Reproductive::getCancerTestYesHow(),Input::old('cq_5_9',isset($question->cq_5_9)?$question->cq_5_9:''), array('id' => 'cq_5_9', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('cq_5_9_e', Input::old('cq_5_9_e',isset($question->cq_5_9_e)?$question->cq_5_9_e:''),array('id'=>'cq_5_9_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['cq_5_9_e'])) !!}
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-xs-4 control-label">5.10। {{ @App\Models\Reproductive::questionText()['cq_5_10']}}</label>
                                <div class="col-xs-4">
                                    

                                    {!! @App\Common::radioButtonGenerate(\App\Models\Reproductive::getGiveAnswerDontNoOnly(), 'cq_5_10',0,$question->cq_5_10, true) !!}

                                    {!! Form::text('cq_5_10_day', Input::old('cq_5_10_day',isset($question->cq_5_10_day)?$question->cq_5_10_day:''),array('id'=>'cq_5_10_day','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['cq_5_10_day'])) !!}


                                    {!! Form::text('cq_5_10_month', Input::old('cq_5_10_month',isset($question->cq_5_10_month)?$question->cq_5_10_month:''),array('id'=>'cq_5_10_month','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['cq_5_10_month'])) !!}


                                    {!! Form::text('cq_5_10_year', Input::old('cq_5_10_year',isset($question->cq_5_10_year)?$question->cq_5_10_year:''),array('id'=>'cq_5_10_year','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['cq_5_10_year'])) !!}
                                </div>
                            </div>



					
					</div>


                    {{-- Section 2 Tab --}}
                    <div class="wizard-pane" role="tabpanel">
                        <p><br><strong> {{ @App\Models\Reproductive::questionText()['rh_6_i']}}</strong></p>


                        <div class="form-group">
                                <label class="col-xs-4 control-label">6.1। {{ @App\Models\Reproductive::questionText()['rh_6_1']}}</label>
                                <div class="col-xs-4">
                                    {!! Form::select('rh_6_1',[''=>'---Select an option---']+\App\Models\Reproductive::getMasikFirstInfectedAge(),Input::old('rh_6_1',isset($question->rh_6_1)?$question->rh_6_1:''), array('id' => 'rh_6_1', 'class' => 'form-control select2')) !!}
                                </div>
                        </div>


                        <div class="form-group">
                                <label class="col-xs-4 control-label">6.2। {{ @\App\Models\Reproductive::questionText()['rh_6_2']}}</label>
                                <div class="col-xs-4">
                                    {!! Form::select('rh_6_2_1',[''=>'---Select an option---']+\App\Models\Reproductive::getMasikUsedTools(),Input::old('rh_6_2_1',isset($question->rh_6_2_1)?$question->rh_6_2_1:''), array('id' => 'rh_6_2_1', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('rh_6_2_1_e', Input::old('rh_6_2_1_e',isset($question->rh_6_2_1_e)?$question->rh_6_2_1_e:''),array('id'=>'rh_6_2_1_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['rh_6_2_1_e'])) !!}

                                    {!! Form::select('rh_6_2_2',[''=>'---Select an option---']+\App\Models\Reproductive::getMasikUsedTools(),Input::old('rh_6_2_2',isset($question->rh_6_2_2)?$question->rh_6_2_2:''), array('id' => 'rh_6_2_2', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('rh_6_2_2_e', Input::old('rh_6_2_2_e',isset($question->rh_6_2_2_e)?$question->rh_6_2_2_e:''),array('id'=>'rh_6_2_2_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['rh_6_2_2_e'])) !!}

                                    {!! Form::select('rh_6_2_3',[''=>'---Select an option---']+\App\Models\Reproductive::getMasikUsedTools(),Input::old('rh_6_2_3',isset($question->rh_6_2_3)?$question->rh_6_2_3:''), array('id' => 'rh_6_2_3', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('rh_6_2_3_e', Input::old('rh_6_2_3_e',isset($question->rh_6_2_3_e)?$question->rh_6_2_3_e:''),array('id'=>'rh_6_2_3_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['rh_6_2_3_e'])) !!}
                                </div>


                        </div>



                        <div class="form-group">
                                <label class="col-xs-4 control-label">6.3। {{ @\App\Models\Reproductive::questionText()['rh_6_3']}}</label>
                                <div class="col-xs-4">
                                    {!! Form::select('rh_6_3_1',[''=>'---Select an option---']+\App\Models\Reproductive::getMasikUsedToolsAfter(),Input::old('rh_6_3_1',isset($question->rh_6_3_1)?$question->rh_6_3_1:''), array('id' => 'rh_6_3_1', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('rh_6_3_1_e', Input::old('rh_6_3_1_e',isset($question->rh_6_3_1_e)?$question->rh_6_3_1_e:''),array('id'=>'rh_6_3_1_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['rh_6_3_1_e'])) !!}

                                    {!! Form::select('rh_6_3_2',[''=>'---Select an option---']+\App\Models\Reproductive::getMasikUsedToolsAfter(),Input::old('rh_6_3_2',isset($question->rh_6_3_2)?$question->rh_6_3_2:''), array('id' => 'rh_6_3_2', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('rh_6_3_2_e', Input::old('rh_6_3_2_e',isset($question->rh_6_3_2_e)?$question->rh_6_3_2_e:''),array('id'=>'rh_6_3_2_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['rh_6_3_2_e'])) !!}

                                    {!! Form::select('rh_6_3_3',[''=>'---Select an option---']+\App\Models\Reproductive::getMasikUsedToolsAfter(),Input::old('rh_6_3_3',isset($question->rh_6_3_3)?$question->rh_6_3_3:''), array('id' => 'rh_6_3_3', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('rh_6_3_3_e', Input::old('rh_6_3_3_e',isset($question->rh_6_3_3_e)?$question->rh_6_3_3_e:''),array('id'=>'rh_6_3_3_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['rh_6_3_3_e'])) !!}
                                </div>


                        </div>



                        <div class="form-group">
                                <label class="col-xs-4 control-label">6.4। {{ @\App\Models\Reproductive::questionText()['rh_6_4']}}</label>
                                <div class="col-xs-4">
                                    {!! Form::select('rh_6_4_1',[''=>'---Select an option---']+\App\Models\Reproductive::getMasikCleanTools(),Input::old('rh_6_4_1',isset($question->rh_6_4_1)?$question->rh_6_4_1:''), array('id' => 'rh_6_4_1', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('rh_6_4_1_e', Input::old('rh_6_4_1_e',isset($question->rh_6_4_1_e)?$question->rh_6_4_1_e:''),array('id'=>'rh_6_4_1_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['rh_6_4_1_e'])) !!}

                                    {!! Form::select('rh_6_4_2',[''=>'---Select an option---']+\App\Models\Reproductive::getMasikCleanTools(),Input::old('rh_6_4_2',isset($question->rh_6_4_2)?$question->rh_6_4_2:''), array('id' => 'rh_6_4_2', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('rh_6_4_2_e', Input::old('rh_6_4_2_e',isset($question->rh_6_4_2_e)?$question->rh_6_4_2_e:''),array('id'=>'rh_6_4_2_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['rh_6_4_2_e'])) !!}

                                    {!! Form::select('rh_6_4_3',[''=>'---Select an option---']+\App\Models\Reproductive::getMasikCleanTools(),Input::old('rh_6_4_3',isset($question->rh_6_4_3)?$question->rh_6_4_3:''), array('id' => 'rh_6_4_3', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('rh_6_4_3_e', Input::old('rh_6_4_3_e',isset($question->rh_6_4_3_e)?$question->rh_6_4_3_e:''),array('id'=>'rh_6_4_3_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['rh_6_4_3_e'])) !!}
                                </div>


                        </div>

                        <div class="form-group">
                                <label class="col-xs-4 control-label">6.5। {{ @App\Models\Reproductive::questionText()['rh_6_5']}}</label>
                                <div class="col-xs-4">
                                    {!! @App\Common::radioButtonGenerate(\App\Models\Reproductive::getYesNo(), 'rh_6_5',0,$question->rh_6_5, true) !!}
                                    
                                </div>
                        </div>



                        <div class="form-group">
                                <label class="col-xs-4 control-label">6.6। {{ @\App\Models\Reproductive::questionText()['rh_6_6']}}</label>
                                <div class="col-xs-4">
                                    {!! Form::select('rh_6_6_1',[''=>'---Select an option---']+\App\Models\Reproductive::getReproductiveSolutionTaken(),Input::old('rh_6_6_1',isset($question->rh_6_6_1)?$question->rh_6_6_1:''), array('id' => 'rh_6_6_1', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('rh_6_6_1_e', Input::old('rh_6_6_1_e',isset($question->rh_6_6_1_e)?$question->rh_6_6_1_e:''),array('id'=>'rh_6_6_1_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['rh_6_6_1_e'])) !!}

                                    {!! Form::select('rh_6_6_2',[''=>'---Select an option---']+\App\Models\Reproductive::getReproductiveSolutionTaken(),Input::old('rh_6_6_2',isset($question->rh_6_6_2)?$question->rh_6_6_2:''), array('id' => 'rh_6_6_2', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('rh_6_6_2_e', Input::old('rh_6_6_2_e',isset($question->rh_6_6_2_e)?$question->rh_6_6_2_e:''),array('id'=>'rh_6_6_2_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['rh_6_6_2_e'])) !!}

                                    {!! Form::select('rh_6_6_3',[''=>'---Select an option---']+\App\Models\Reproductive::getReproductiveSolutionTaken(),Input::old('rh_6_6_3',isset($question->rh_6_6_3)?$question->rh_6_6_3:''), array('id' => 'rh_6_6_3', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('rh_6_6_3_e', Input::old('rh_6_6_3_e',isset($question->rh_6_6_3_e)?$question->rh_6_6_3_e:''),array('id'=>'rh_6_6_3_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['rh_6_6_3_e'])) !!}
                                </div>


                            </div>


                            <div class="form-group">
                                <label class="col-xs-4 control-label">6.7। {{ @\App\Models\Reproductive::questionText()['rh_6_7']}}</label>
                                <div class="col-xs-4">
                                    {!! Form::select('rh_6_7_1',[''=>'---Select an option---']+\App\Models\Reproductive::getWhoList(),Input::old('rh_6_7_1',isset($question->rh_6_7_1)?$question->rh_6_7_1:''), array('id' => 'rh_6_7_1', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('rh_6_7_1_e', Input::old('rh_6_7_1_e',isset($question->rh_6_7_1_e)?$question->rh_6_7_1_e:''),array('id'=>'rh_6_7_1_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['rh_6_7_1_e'])) !!}

                                    {!! Form::select('rh_6_7_2',[''=>'---Select an option---']+\App\Models\Reproductive::getWhoList(),Input::old('rh_6_7_2',isset($question->rh_6_7_2)?$question->rh_6_7_2:''), array('id' => 'rh_6_7_2', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('rh_6_7_2_e', Input::old('rh_6_7_2_e',isset($question->rh_6_7_2_e)?$question->rh_6_7_2_e:''),array('id'=>'rh_6_7_2_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['rh_6_7_2_e'])) !!}

                                    {!! Form::select('rh_6_7_3',[''=>'---Select an option---']+\App\Models\Reproductive::getWhoList(),Input::old('rh_6_7_3',isset($question->rh_6_7_3)?$question->rh_6_7_3:''), array('id' => 'rh_6_7_3', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('rh_6_7_3_e', Input::old('rh_6_7_3_e',isset($question->rh_6_7_3_e)?$question->rh_6_7_3_e:''),array('id'=>'rh_6_7_3_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['rh_6_7_3_e'])) !!}
                                </div>


                            </div>


                            <div class="form-group">
                                <label class="col-xs-4 control-label">6.8। {{ @\App\Models\Reproductive::questionText()['rh_6_8']}}</label>
                                <div class="col-xs-4">
                                    {!! Form::select('rh_6_8_1',[''=>'---Select an option---']+\App\Models\Reproductive::getWhereList(),Input::old('rh_6_8_1',isset($question->rh_6_8_1)?$question->rh_6_8_1:''), array('id' => 'rh_6_8_1', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('rh_6_8_1_e', Input::old('rh_6_8_1_e',isset($question->rh_6_8_1_e)?$question->rh_6_8_1_e:''),array('id'=>'rh_6_8_1_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['rh_6_8_1_e'])) !!}

                                    {!! Form::select('rh_6_8_2',[''=>'---Select an option---']+\App\Models\Reproductive::getWhereList(),Input::old('rh_6_8_2',isset($question->rh_6_8_2)?$question->rh_6_8_2:''), array('id' => 'rh_6_8_2', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('rh_6_8_2_e', Input::old('rh_6_8_2_e',isset($question->rh_6_8_2_e)?$question->rh_6_8_2_e:''),array('id'=>'rh_6_8_2_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['rh_6_8_2_e'])) !!}

                                    {!! Form::select('rh_6_8_3',[''=>'---Select an option---']+\App\Models\Reproductive::getWhereList(),Input::old('rh_6_8_3',isset($question->rh_6_8_3)?$question->rh_6_8_3:''), array('id' => 'rh_6_8_3', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('rh_6_8_3_e', Input::old('rh_6_8_3_e',isset($question->rh_6_8_3_e)?$question->rh_6_8_3_e:''),array('id'=>'rh_6_8_3_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['rh_6_8_3_e'])) !!}
                                </div>


                            </div>


                            <div class="form-group">
                                <label class="col-xs-4 control-label">6.9। {{ @App\Models\Reproductive::questionText()['rh_6_9']}}</label>
                                <div class="col-xs-4">
                                    {!! @App\Common::radioButtonGenerate(\App\Models\Reproductive::getPersonalMood(), 'rh_6_9',0,$question->rh_6_9, true) !!}
                                    
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-xs-4 control-label">6.10। {{ @\App\Models\Reproductive::questionText()['rh_6_10']}}</label>
                                <div class="col-xs-4">
                                    {!! Form::select('rh_6_10_1',[''=>'---Select an option---']+\App\Models\Reproductive::getReproductiveServiceHappinessAck(),Input::old('rh_6_10_1',isset($question->rh_6_10_1)?$question->rh_6_10_1:''), array('id' => 'rh_6_10_1', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('rh_6_10_1_e', Input::old('rh_6_10_1_e',isset($question->rh_6_10_1_e)?$question->rh_6_10_1_e:''),array('id'=>'rh_6_10_1_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['rh_6_10_1_e'])) !!}

                                    {!! Form::select('rh_6_10_2',[''=>'---Select an option---']+\App\Models\Reproductive::getReproductiveServiceHappinessAck(),Input::old('rh_6_10_2',isset($question->rh_6_10_2)?$question->rh_6_10_2:''), array('id' => 'rh_6_10_2', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('rh_6_10_2_e', Input::old('rh_6_10_2_e',isset($question->rh_6_10_2_e)?$question->rh_6_10_2_e:''),array('id'=>'rh_6_10_2_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['rh_6_10_2_e'])) !!}

                                    {!! Form::select('rh_6_10_3',[''=>'---Select an option---']+\App\Models\Reproductive::getReproductiveServiceHappinessAck(),Input::old('rh_6_10_3',isset($question->rh_6_10_3)?$question->rh_6_10_3:''), array('id' => 'rh_6_10_3', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('rh_6_10_3_e', Input::old('rh_6_10_3_e',isset($question->rh_6_10_3_e)?$question->rh_6_10_3_e:''),array('id'=>'rh_6_10_3_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['rh_6_10_3_e'])) !!}
                                </div>


                            </div>


                            <div class="form-group">
                                <label class="col-xs-4 control-label">6.11। {{ @\App\Models\Reproductive::questionText()['rh_6_11']}}</label>
                                <div class="col-xs-4">
                                    {!! Form::select('rh_6_11_1',[''=>'---Select an option---']+\App\Models\Reproductive::getReproductiveServiceAngryAck(),Input::old('rh_6_11_1',isset($question->rh_6_11_1)?$question->rh_6_11_1:''), array('id' => 'rh_6_11_1', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('rh_6_11_1_e', Input::old('rh_6_11_1_e',isset($question->rh_6_11_1_e)?$question->rh_6_11_1_e:''),array('id'=>'rh_6_11_1_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['rh_6_11_1_e'])) !!}

                                    {!! Form::select('rh_6_11_2',[''=>'---Select an option---']+\App\Models\Reproductive::getReproductiveServiceAngryAck(),Input::old('rh_6_11_2',isset($question->rh_6_11_2)?$question->rh_6_11_2:''), array('id' => 'rh_6_11_2', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('rh_6_11_2_e', Input::old('rh_6_11_2_e',isset($question->rh_6_11_2_e)?$question->rh_6_11_2_e:''),array('id'=>'rh_6_11_2_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['rh_6_11_2_e'])) !!}

                                    {!! Form::select('rh_6_11_3',[''=>'---Select an option---']+\App\Models\Reproductive::getReproductiveServiceAngryAck(),Input::old('rh_6_11_3',isset($question->rh_6_11_3)?$question->rh_6_11_3:''), array('id' => 'rh_6_11_3', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('rh_6_11_3_e', Input::old('rh_6_11_3_e',isset($question->rh_6_11_3_e)?$question->rh_6_11_3_e:''),array('id'=>'rh_6_11_3_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['rh_6_11_3_e'])) !!}
                                </div>


                            </div>


                            <p><br><strong> {{ @App\Models\Reproductive::questionText()['bc_7_i']}}</strong></p>

                            <div class="form-group">
                                <label class="col-xs-4 control-label">7.1। {{ @App\Models\Reproductive::questionText()['bc_7_1']}}</label>
                                <div class="col-xs-4">
                                    {!! @App\Common::radioButtonGenerate(\App\Models\Reproductive::getYesNo(), 'bc_7_1',0,$question->bc_7_1, true) !!}
                                    
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-xs-4 control-label">7.2। {{ @App\Models\Reproductive::questionText()['bc_7_2']}}</label>
                                <div class="col-xs-4">
                                    {!! Form::select('bc_7_2',[''=>'---Select an option---']+\App\Models\Reproductive::getBirthControlChildNumber(),Input::old('bc_7_2',isset($question->bc_7_2)?$question->bc_7_2:''), array('id' => 'bc_7_2', 'class' => 'form-control select2')) !!}
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-xs-4 control-label">7.3। {{ @App\Models\Reproductive::questionText()['bc_7_3']}}</label>
                                <div class="col-xs-4">
                                    {!! @App\Common::radioButtonGenerate(\App\Models\Reproductive::getYesNo(), 'bc_7_3',0,$question->bc_7_3, true) !!}
                                    
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-xs-4 control-label">7.4। {{ @\App\Models\Reproductive::questionText()['bc_7_4']}}</label>
                                <div class="col-xs-4">
                                    {!! Form::select('bc_7_4_1',[''=>'---Select an option---']+\App\Models\Reproductive::getFamilyPlanStep(),Input::old('bc_7_4_1',isset($question->bc_7_4_1)?$question->bc_7_4_1:''), array('id' => 'bc_7_4_1', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('bc_7_4_1_e', Input::old('bc_7_4_1_e',isset($question->bc_7_4_1_e)?$question->bc_7_4_1_e:''),array('id'=>'bc_7_4_1_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['bc_7_4_1_e'])) !!}

                                    {!! Form::select('bc_7_4_2',[''=>'---Select an option---']+\App\Models\Reproductive::getFamilyPlanStep(),Input::old('bc_7_4_2',isset($question->bc_7_4_2)?$question->bc_7_4_2:''), array('id' => 'bc_7_4_2', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('bc_7_4_2_e', Input::old('bc_7_4_2_e',isset($question->bc_7_4_2_e)?$question->bc_7_4_2_e:''),array('id'=>'bc_7_4_2_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['bc_7_4_2_e'])) !!}

                                    
                                </div>


                            </div>



                            <div class="form-group">
                                <label class="col-xs-4 control-label">7.5। {{ @\App\Models\Reproductive::questionText()['bc_7_5']}}</label>
                                <div class="col-xs-4">
                                    {!! Form::select('bc_7_5_1',[''=>'---Select an option---']+\App\Models\Reproductive::getWhoList(),Input::old('bc_7_5_1',isset($question->bc_7_5_1)?$question->bc_7_5_1:''), array('id' => 'bc_7_5_1', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('bc_7_5_1_e', Input::old('bc_7_5_1_e',isset($question->bc_7_5_1_e)?$question->bc_7_5_1_e:''),array('id'=>'bc_7_5_1_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['bc_7_5_1_e'])) !!}

                                    {!! Form::select('bc_7_5_2',[''=>'---Select an option---']+\App\Models\Reproductive::getWhoList(),Input::old('bc_7_5_2',isset($question->bc_7_5_2)?$question->bc_7_5_2:''), array('id' => 'bc_7_5_2', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('bc_7_5_2_e', Input::old('bc_7_5_2_e',isset($question->bc_7_5_2_e)?$question->bc_7_5_2_e:''),array('id'=>'bc_7_5_2_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['bc_7_5_2_e'])) !!}

                                    {!! Form::select('bc_7_5_3',[''=>'---Select an option---']+\App\Models\Reproductive::getWhoList(),Input::old('bc_7_5_3',isset($question->bc_7_5_3)?$question->bc_7_5_3:''), array('id' => 'bc_7_5_3', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('bc_7_5_3_e', Input::old('bc_7_5_3_e',isset($question->bc_7_5_3_e)?$question->bc_7_5_3_e:''),array('id'=>'bc_7_5_3_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['bc_7_5_3_e'])) !!}
                                </div>


                            </div>



                            <div class="form-group">
                                <label class="col-xs-4 control-label">7.6। {{ @App\Models\Reproductive::questionText()['bc_7_6']}}</label>
                                <div class="col-xs-4">
                                    {!! @App\Common::radioButtonGenerate(\App\Models\Reproductive::getYesNo(), 'bc_7_6',0,$question->bc_7_6, true) !!}
                                    
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-xs-4 control-label">7.7। {{ @\App\Models\Reproductive::questionText()['bc_7_7']}}</label>
                                <div class="col-xs-4">
                                    {!! Form::select('bc_7_7_1',[''=>'---Select an option---']+\App\Models\Reproductive::getFamilyPlanStep(),Input::old('bc_7_7_1',isset($question->bc_7_7_1)?$question->bc_7_7_1:''), array('id' => 'bc_7_7_1', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('bc_7_7_1_e', Input::old('bc_7_7_1_e',isset($question->bc_7_7_1_e)?$question->bc_7_7_1_e:''),array('id'=>'bc_7_7_1_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['bc_7_7_1_e'])) !!}

                                    {!! Form::select('bc_7_7_2',[''=>'---Select an option---']+\App\Models\Reproductive::getFamilyPlanStep(),Input::old('bc_7_7_2',isset($question->bc_7_7_2)?$question->bc_7_7_2:''), array('id' => 'bc_7_7_2', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('bc_7_7_2_e', Input::old('bc_7_7_2_e',isset($question->bc_7_7_2_e)?$question->bc_7_7_2_e:''),array('id'=>'bc_7_7_2_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['bc_7_7_2_e'])) !!}


                                    {!! Form::select('bc_7_7_3',[''=>'---Select an option---']+\App\Models\Reproductive::getFamilyPlanStep(),Input::old('bc_7_7_3',isset($question->bc_7_7_3)?$question->bc_7_7_3:''), array('id' => 'bc_7_7_3', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('bc_7_7_3_e', Input::old('bc_7_7_3_e',isset($question->bc_7_7_3_e)?$question->bc_7_7_3_e:''),array('id'=>'bc_7_7_3_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['bc_7_7_3_e'])) !!}


                                    {!! Form::select('bc_7_7_4',[''=>'---Select an option---']+\App\Models\Reproductive::getFamilyPlanStep(),Input::old('bc_7_7_4',isset($question->bc_7_7_4)?$question->bc_7_7_4:''), array('id' => 'bc_7_7_4', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('bc_7_7_4_e', Input::old('bc_7_7_4_e',isset($question->bc_7_7_4_e)?$question->bc_7_7_4_e:''),array('id'=>'bc_7_7_4_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['bc_7_7_4_e'])) !!}

                                   
                                </div>


                            </div>


                            <div class="form-group">
                                <label class="col-xs-4 control-label">7.8। {{ @\App\Models\Reproductive::questionText()['bc_7_8']}}</label>
                                <div class="col-xs-4">
                                    {!! Form::select('bc_7_8_1',[''=>'---Select an option---']+\App\Models\Reproductive::getWhoList(),Input::old('bc_7_8_1',isset($question->bc_7_8_1)?$question->bc_7_8_1:''), array('id' => 'bc_7_8_1', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('bc_7_8_1_e', Input::old('bc_7_8_1_e',isset($question->bc_7_8_1_e)?$question->bc_7_8_1_e:''),array('id'=>'bc_7_8_1_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['bc_7_8_1_e'])) !!}

                                    {!! Form::select('bc_7_8_2',[''=>'---Select an option---']+\App\Models\Reproductive::getWhoList(),Input::old('bc_7_8_2',isset($question->bc_7_8_2)?$question->bc_7_8_2:''), array('id' => 'bc_7_8_2', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('bc_7_8_2_e', Input::old('bc_7_8_2_e',isset($question->bc_7_8_2_e)?$question->bc_7_8_2_e:''),array('id'=>'bc_7_8_2_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['bc_7_8_2_e'])) !!}


                                    {!! Form::select('bc_7_8_3',[''=>'---Select an option---']+\App\Models\Reproductive::getWhoList(),Input::old('bc_7_8_3',isset($question->bc_7_8_3)?$question->bc_7_8_3:''), array('id' => 'bc_7_8_3', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('bc_7_8_3_e', Input::old('bc_7_8_3_e',isset($question->bc_7_8_3_e)?$question->bc_7_8_3_e:''),array('id'=>'bc_7_8_3_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['bc_7_8_3_e'])) !!}


                                    

                                   
                                </div>


                            </div>


                            

                            <div class="form-group">
                                <label class="col-xs-4 control-label">7.9। {{ @App\Models\Reproductive::questionText()['bc_7_9']}}</label>
                                <div class="col-xs-4">
                                    {!! @App\Common::radioButtonGenerate(\App\Models\Reproductive::getYesNoDontKnow(), 'bc_7_9',0,$question->bc_7_9, true) !!}
                                    
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-xs-4 control-label">7.10। {{ @\App\Models\Reproductive::questionText()['bc_7_10']}}</label>
                                <div class="col-xs-4">
                                    {!! Form::select('bc_7_10_1',[''=>'---Select an option---']+\App\Models\Reproductive::getFamilyPlanningSideEffect(),Input::old('bc_7_10_1',isset($question->bc_7_10_1)?$question->bc_7_10_1:''), array('id' => 'bc_7_10_1', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('bc_7_10_1_e', Input::old('bc_7_10_1_e',isset($question->bc_7_10_1_e)?$question->bc_7_10_1_e:''),array('id'=>'bc_7_10_1_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['bc_7_10_1_e'])) !!}

                                    {!! Form::select('bc_7_10_2',[''=>'---Select an option---']+\App\Models\Reproductive::getFamilyPlanningSideEffect(),Input::old('bc_7_10_2',isset($question->bc_7_10_2)?$question->bc_7_10_2:''), array('id' => 'bc_7_10_2', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('bc_7_10_2_e', Input::old('bc_7_10_2_e',isset($question->bc_7_10_2_e)?$question->bc_7_10_2_e:''),array('id'=>'bc_7_10_2_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['bc_7_10_2_e'])) !!}

                                    {!! Form::select('bc_7_10_3',[''=>'---Select an option---']+\App\Models\Reproductive::getFamilyPlanningSideEffect(),Input::old('bc_7_10_3',isset($question->bc_7_10_3)?$question->bc_7_10_3:''), array('id' => 'bc_7_10_3', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('bc_7_10_3_e', Input::old('bc_7_10_3_e',isset($question->bc_7_10_3_e)?$question->bc_7_10_3_e:''),array('id'=>'bc_7_10_3_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['bc_7_10_3_e'])) !!}
                                </div>


                            </div>


                            <div class="form-group">
                                <label class="col-xs-4 control-label">7.11। {{ @App\Models\Reproductive::questionText()['bc_7_11']}}</label>
                                <div class="col-xs-4">
                                    {!! @App\Common::radioButtonGenerate(\App\Models\Reproductive::getYesNoDontKnow(), 'bc_7_11',0,$question->bc_7_11, true) !!}
                                    
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-xs-4 control-label">7.12। {{ @\App\Models\Reproductive::questionText()['bc_7_12']}}</label>
                                <div class="col-xs-4">
                                    {!! Form::select('bc_7_12_1',[''=>'---Select an option---']+\App\Models\Reproductive::getFamilyPlanningSideEffect(),Input::old('bc_7_12_1',isset($question->bc_7_12_1)?$question->bc_7_12_1:''), array('id' => 'bc_7_12_1', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('bc_7_12_1_e', Input::old('bc_7_12_1_e',isset($question->bc_7_12_1_e)?$question->bc_7_12_1_e:''),array('id'=>'bc_7_12_1_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['bc_7_12_1_e'])) !!}

                                    {!! Form::select('bc_7_12_2',[''=>'---Select an option---']+\App\Models\Reproductive::getFamilyPlanningSideEffect(),Input::old('bc_7_12_2',isset($question->bc_7_12_2)?$question->bc_7_12_2:''), array('id' => 'bc_7_12_2', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('bc_7_12_2_e', Input::old('bc_7_12_2_e',isset($question->bc_7_12_2_e)?$question->bc_7_12_2_e:''),array('id'=>'bc_7_12_2_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['bc_7_12_2_e'])) !!}

                                    {!! Form::select('bc_7_12_3',[''=>'---Select an option---']+\App\Models\Reproductive::getFamilyPlanningSideEffect(),Input::old('bc_7_12_3',isset($question->bc_7_12_3)?$question->bc_7_12_3:''), array('id' => 'bc_7_12_3', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('bc_7_12_3_e', Input::old('bc_7_12_3_e',isset($question->bc_7_12_3_e)?$question->bc_7_12_3_e:''),array('id'=>'bc_7_12_3_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['bc_7_12_3_e'])) !!}
                                </div>


                        </div>

                            





                    </div>


                    {{-- Section 3 Tab --}}
                    <div class="wizard-pane" role="tabpanel">
                        <p><br><strong> {{ @App\Models\Reproductive::questionText()['prq_8_i']}}</strong></p>

                        <div class="form-group">
                                <label class="col-xs-4 control-label">8.1। {{ @App\Models\Reproductive::questionText()['prq_8_1']}}</label>
                                <div class="col-xs-4">
                                    {!! @App\Common::radioButtonGenerate(\App\Models\Reproductive::getYesNoDontKnow(), 'prq_8_1',0,$question->prq_8_1, true) !!}
                                    
                                </div>
                        </div>


                        

                        <div class="form-group">
                                <label class="col-xs-4 control-label">8.2। {{ @App\Models\Reproductive::questionText()['prq_8_2']}}</label>
                                <div class="col-xs-4">
                                    {!! Form::select('prq_8_2',[''=>'---Select an option---']+\App\Models\Reproductive::getPregnantNoOfService(),Input::old('prq_8_2',isset($question->prq_8_2)?$question->prq_8_2:''), array('id' => 'prq_8_2', 'class' => 'form-control select2')) !!}
                                </div>
                        </div>

                        <div class="form-group">
                                <label class="col-xs-4 control-label">8.3। {{ @App\Models\Reproductive::questionText()['prq_8_3']}}</label>
                                <div class="col-xs-4">
                                    {!! Form::select('prq_8_3',[''=>'---Select an option---']+\App\Models\Reproductive::getPersonAge(),Input::old('prq_8_3',isset($question->prq_8_3)?$question->prq_8_3:''), array('id' => 'prq_8_3', 'class' => 'form-control select2')) !!}
                                </div>
                        </div>

                        <p><br><strong> {{ @App\Models\Reproductive::questionText()['rprq_9_i']}}</strong></p>

                        <div class="form-group">
                                <label class="col-xs-4 control-label">9.1। {{ @App\Models\Reproductive::questionText()['rprq_9_1']}}</label>
                                <div class="col-xs-4">
                                    {!! @App\Common::radioButtonGenerate(\App\Models\Reproductive::getYesNoDontKnow(), 'rprq_9_1',0,$question->rprq_9_1, true) !!}
                                    
                                </div>
                        </div>


                        <div class="form-group">
                                <label class="col-xs-4 control-label">9.2। {{ @App\Models\Reproductive::questionText()['rprq_9_2']}}</label>
                                <div class="col-xs-4">
                                    {!! @App\Common::radioButtonGenerate(\App\Models\Reproductive::getYesNo(), 'rprq_9_2',0,$question->rprq_9_2, true) !!}
                                    
                                </div>
                        </div>

                        


                        <div class="form-group">
                                <label class="col-xs-4 control-label">9.3। {{ @App\Models\Reproductive::questionText()['rprq_9_3']}}</label>
                                <div class="col-xs-4">
                                    


                                    {!! @App\Common::radioButtonGenerate(\App\Models\Reproductive::getGiveAnswerDontNoOnly(), 'rprq_9_3',0,$question->rprq_9_3, true) !!}

                                    {!! Form::text('rprq_9_3_day', Input::old('rprq_9_3_day',isset($question->rprq_9_3_day)?$question->rprq_9_3_day:''),array('id'=>'rprq_9_3_day','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['rprq_9_3_day'])) !!}


                                    {!! Form::text('rprq_9_3_month', Input::old('rprq_9_3_month',isset($question->rprq_9_3_month)?$question->rprq_9_3_month:''),array('id'=>'rprq_9_3_month','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['rprq_9_3_month'])) !!}


                                    {!! Form::text('rprq_9_3_year', Input::old('rprq_9_3_year',isset($question->rprq_9_3_year)?$question->rprq_9_3_year:''),array('id'=>'rprq_9_3_year','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['rprq_9_3_year'])) !!}
                                </div>
                        </div>


                        <div class="form-group">
                                <label class="col-xs-4 control-label">9.4। {{ @App\Models\Reproductive::questionText()['rprq_9_4']}}</label>
                                <div class="col-xs-4">
                                    {!! @App\Common::radioButtonGenerate(\App\Models\Reproductive::getYesNo(), 'rprq_9_4',0,$question->rprq_9_4, true) !!}
                                    
                                </div>
                        </div>


                        <div class="form-group">
                                <label class="col-xs-4 control-label">9.5। {{ @App\Models\Reproductive::questionText()['rprq_9_5']}}</label>
                                <div class="col-xs-4">
                                    {!! Form::select('rprq_9_5',[''=>'---Select an option---']+\App\Models\Reproductive::getPregnantNoOfTimes(),Input::old('rprq_9_5',isset($question->rprq_9_5)?$question->rprq_9_5:''), array('id' => 'rprq_9_5', 'class' => 'form-control select2')) !!}
                                </div>
                        </div>

                        <div class="form-group">
                                <label class="col-xs-4 control-label">9.6। {{ @\App\Models\Reproductive::questionText()['rprq_9_6']}}</label>
                                <div class="col-xs-4">
                                    {!! Form::select('rprq_9_6_1',[''=>'---Select an option---']+\App\Models\Reproductive::getWhereList(),Input::old('rprq_9_6_1',isset($question->rprq_9_6_1)?$question->rprq_9_6_1:''), array('id' => 'rprq_9_6_1', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('rprq_9_6_1_e', Input::old('rprq_9_6_1_e',isset($question->rprq_9_6_1_e)?$question->rprq_9_6_1_e:''),array('id'=>'rprq_9_6_1_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['rprq_9_6_1_e'])) !!}

                                    {!! Form::select('rprq_9_6_2',[''=>'---Select an option---']+\App\Models\Reproductive::getWhereList(),Input::old('rprq_9_6_2',isset($question->rprq_9_6_2)?$question->rprq_9_6_2:''), array('id' => 'rprq_9_6_2', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('rprq_9_6_2_e', Input::old('rprq_9_6_2_e',isset($question->rprq_9_6_2_e)?$question->rprq_9_6_2_e:''),array('id'=>'rprq_9_6_2_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['rprq_9_6_2_e'])) !!}

                                    {!! Form::select('rprq_9_6_3',[''=>'---Select an option---']+\App\Models\Reproductive::getWhereList(),Input::old('rprq_9_6_3',isset($question->rprq_9_6_3)?$question->rprq_9_6_3:''), array('id' => 'rprq_9_6_3', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('rprq_9_6_3_e', Input::old('rprq_9_6_3_e',isset($question->rprq_9_6_3_e)?$question->rprq_9_6_3_e:''),array('id'=>'rprq_9_6_3_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['rprq_9_6_3_e'])) !!}
                                </div>


                        </div>


                        <div class="form-group">
                                <label class="col-xs-4 control-label">9.7। {{ @\App\Models\Reproductive::questionText()['rprq_9_7']}}</label>
                                <div class="col-xs-4">
                                    {!! Form::select('rprq_9_7_1',[''=>'---Select an option---']+\App\Models\Reproductive::getWhoList(),Input::old('rprq_9_7_1',isset($question->rprq_9_7_1)?$question->rprq_9_7_1:''), array('id' => 'rprq_9_7_1', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('rprq_9_7_1_e', Input::old('rprq_9_7_1_e',isset($question->rprq_9_7_1_e)?$question->rprq_9_7_1_e:''),array('id'=>'rprq_9_7_1_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['rprq_9_7_1_e'])) !!}

                                    {!! Form::select('rprq_9_7_2',[''=>'---Select an option---']+\App\Models\Reproductive::getWhoList(),Input::old('rprq_9_7_2',isset($question->rprq_9_7_2)?$question->rprq_9_7_2:''), array('id' => 'rprq_9_7_2', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('rprq_9_7_2_e', Input::old('rprq_9_7_2_e',isset($question->rprq_9_7_2_e)?$question->rprq_9_7_2_e:''),array('id'=>'rprq_9_7_2_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['rprq_9_7_2_e'])) !!}

                                    {!! Form::select('rprq_9_7_3',[''=>'---Select an option---']+\App\Models\Reproductive::getWhoList(),Input::old('rprq_9_7_3',isset($question->rprq_9_7_3)?$question->rprq_9_7_3:''), array('id' => 'rprq_9_7_3', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('rprq_9_7_3_e', Input::old('rprq_9_7_3_e',isset($question->rprq_9_7_3_e)?$question->rprq_9_7_3_e:''),array('id'=>'rprq_9_7_3_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['rprq_9_7_3_e'])) !!}
                                </div>


                            </div>


                            <div class="form-group">
                                <label class="col-xs-4 control-label">9.8। {{ @\App\Models\Reproductive::questionText()['rprq_9_8']}}</label>
                                <div class="col-xs-4">
                                    {!! Form::select('rprq_9_8_1',[''=>'---Select an option---']+\App\Models\Reproductive::getPregnancyServiceWhyNotTaken(),Input::old('rprq_9_8_1',isset($question->rprq_9_8_1)?$question->rprq_9_8_1:''), array('id' => 'rprq_9_8_1', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('rprq_9_8_1_e', Input::old('rprq_9_8_1_e',isset($question->rprq_9_8_1_e)?$question->rprq_9_8_1_e:''),array('id'=>'rprq_9_8_1_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['rprq_9_8_1_e'])) !!}

                                    {!! Form::select('rprq_9_8_2',[''=>'---Select an option---']+\App\Models\Reproductive::getPregnancyServiceWhyNotTaken(),Input::old('rprq_9_8_2',isset($question->rprq_9_8_2)?$question->rprq_9_8_2:''), array('id' => 'rprq_9_8_2', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('rprq_9_8_2_e', Input::old('rprq_9_8_2_e',isset($question->rprq_9_8_2_e)?$question->rprq_9_8_2_e:''),array('id'=>'rprq_9_8_2_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['rprq_9_8_2_e'])) !!}

                                    {!! Form::select('rprq_9_8_3',[''=>'---Select an option---']+\App\Models\Reproductive::getPregnancyServiceWhyNotTaken(),Input::old('rprq_9_8_3',isset($question->rprq_9_8_3)?$question->rprq_9_8_3:''), array('id' => 'rprq_9_8_3', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('rprq_9_8_3_e', Input::old('rprq_9_8_3_e',isset($question->rprq_9_8_3_e)?$question->rprq_9_8_3_e:''),array('id'=>'rprq_9_8_3_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['rprq_9_8_3_e'])) !!}
                                </div>


                            </div>


                            <div class="form-group">
                                <label class="col-xs-4 control-label">9.9। {{ @\App\Models\Reproductive::questionText()['rprq_9_9']}}</label>
                                <div class="col-xs-4">
                                    {!! Form::select('rprq_9_9_1',[''=>'---Select an option---']+\App\Models\Reproductive::getPregnancyServiceWhatStepsTaken(),Input::old('rprq_9_9_1',isset($question->rprq_9_9_1)?$question->rprq_9_9_1:''), array('id' => 'rprq_9_9_1', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('rprq_9_9_1_e', Input::old('rprq_9_9_1_e',isset($question->rprq_9_9_1_e)?$question->rprq_9_9_1_e:''),array('id'=>'rprq_9_9_1_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['rprq_9_9_1_e'])) !!}

                                    {!! Form::select('rprq_9_9_2',[''=>'---Select an option---']+\App\Models\Reproductive::getPregnancyServiceWhatStepsTaken(),Input::old('rprq_9_9_2',isset($question->rprq_9_9_2)?$question->rprq_9_9_2:''), array('id' => 'rprq_9_9_2', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('rprq_9_9_2_e', Input::old('rprq_9_9_2_e',isset($question->rprq_9_9_2_e)?$question->rprq_9_9_2_e:''),array('id'=>'rprq_9_9_2_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['rprq_9_9_2_e'])) !!}

                                    {!! Form::select('rprq_9_9_3',[''=>'---Select an option---']+\App\Models\Reproductive::getPregnancyServiceWhatStepsTaken(),Input::old('rprq_9_9_3',isset($question->rprq_9_9_3)?$question->rprq_9_9_3:''), array('id' => 'rprq_9_9_3', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('rprq_9_9_3_e', Input::old('rprq_9_9_3_e',isset($question->rprq_9_9_3_e)?$question->rprq_9_9_3_e:''),array('id'=>'rprq_9_9_3_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['rprq_9_9_3_e'])) !!}
                                </div>


                            </div>


                            <p><br><strong> {{ @App\Models\Reproductive::questionText()['pprq_10_i']}}</strong></p>

                            <div class="form-group">
                                <label class="col-xs-4 control-label">10.1। {{ @App\Models\Reproductive::questionText()['pprq_10_1']}}</label>
                                <div class="col-xs-4">
                                    

                                    {!! @App\Common::radioButtonGenerate(\App\Models\Reproductive::getGiveAnswerDontNoOnly(), 'pprq_10_1',0,$question->pprq_10_1, true) !!}

                                    {!! Form::text('pprq_10_1_day', Input::old('pprq_10_1_day',isset($question->pprq_10_1_day)?$question->pprq_10_1_day:''),array('id'=>'pprq_10_1_day','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['pprq_10_1_day'])) !!}


                                    {!! Form::text('pprq_10_1_month', Input::old('pprq_10_1_month',isset($question->pprq_10_1_month)?$question->pprq_10_1_month:''),array('id'=>'pprq_10_1_month','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['pprq_10_1_month'])) !!}


                                    {!! Form::text('pprq_10_1_year', Input::old('pprq_10_1_year',isset($question->pprq_10_1_year)?$question->pprq_10_1_year:''),array('id'=>'pprq_10_1_year','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['pprq_10_1_year'])) !!}
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-xs-4 control-label">10.2। {{ @App\Models\Reproductive::questionText()['pprq_10_2']}}</label>
                                <div class="col-xs-4">
                                    {!! @App\Common::radioButtonGenerate(\App\Models\Reproductive::getYesNo(), 'pprq_10_2',0,$question->pprq_10_2, true) !!}
                                    
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-xs-4 control-label">10.3। {{ @App\Models\Reproductive::questionText()['pprq_10_3']}}</label>
                                <div class="col-xs-4">
                                    {!! Form::select('pprq_10_3',[''=>'---Select an option---']+\App\Models\Reproductive::getPregnantNoOfTimes(90),Input::old('pprq_10_3',isset($question->pprq_10_3)?$question->pprq_10_3:''), array('id' => 'pprq_10_3', 'class' => 'form-control select2')) !!}
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-xs-4 control-label">10.4। {{ @\App\Models\Reproductive::questionText()['pprq_10_4']}}</label>
                                <div class="col-xs-4">
                                    {!! Form::select('pprq_10_4_1',[''=>'---Select an option---']+\App\Models\Reproductive::getWhereList(),Input::old('pprq_10_4_1',isset($question->pprq_10_4_1)?$question->pprq_10_4_1:''), array('id' => 'pprq_10_4_1', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('pprq_10_4_1_e', Input::old('pprq_10_4_1_e',isset($question->pprq_10_4_1_e)?$question->pprq_10_4_1_e:''),array('id'=>'pprq_10_4_1_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['pprq_10_4_1_e'])) !!}

                                    {!! Form::select('pprq_10_4_2',[''=>'---Select an option---']+\App\Models\Reproductive::getWhereList(),Input::old('pprq_10_4_2',isset($question->pprq_10_4_2)?$question->pprq_10_4_2:''), array('id' => 'pprq_10_4_2', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('pprq_10_4_2_e', Input::old('pprq_10_4_2_e',isset($question->pprq_10_4_2_e)?$question->pprq_10_4_2_e:''),array('id'=>'pprq_10_4_2_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['pprq_10_4_2_e'])) !!}

                                    {!! Form::select('pprq_10_4_3',[''=>'---Select an option---']+\App\Models\Reproductive::getWhereList(),Input::old('pprq_10_4_3',isset($question->pprq_10_4_3)?$question->pprq_10_4_3:''), array('id' => 'pprq_10_4_3', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('pprq_10_4_3_e', Input::old('pprq_10_4_3_e',isset($question->pprq_10_4_3_e)?$question->pprq_10_4_3_e:''),array('id'=>'pprq_10_4_3_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['pprq_10_4_3_e'])) !!}
                                </div>


                            </div>


                            <div class="form-group">
                                <label class="col-xs-4 control-label">10.5। {{ @\App\Models\Reproductive::questionText()['pprq_10_5']}}</label>
                                <div class="col-xs-4">
                                    {!! Form::select('pprq_10_5_1',[''=>'---Select an option---']+\App\Models\Reproductive::getWhoList(),Input::old('pprq_10_5_1',isset($question->pprq_10_5_1)?$question->pprq_10_5_1:''), array('id' => 'pprq_10_5_1', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('pprq_10_5_1_e', Input::old('pprq_10_5_1_e',isset($question->pprq_10_5_1_e)?$question->pprq_10_5_1_e:''),array('id'=>'pprq_10_5_1_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['pprq_10_5_1_e'])) !!}

                                    {!! Form::select('pprq_10_5_2',[''=>'---Select an option---']+\App\Models\Reproductive::getWhoList(),Input::old('pprq_10_5_2',isset($question->pprq_10_5_2)?$question->pprq_10_5_2:''), array('id' => 'pprq_10_5_2', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('pprq_10_5_2_e', Input::old('pprq_10_5_2_e',isset($question->pprq_10_5_2_e)?$question->pprq_10_5_2_e:''),array('id'=>'pprq_10_5_2_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['pprq_10_5_2_e'])) !!}

                                    {!! Form::select('pprq_10_5_3',[''=>'---Select an option---']+\App\Models\Reproductive::getWhoList(),Input::old('pprq_10_5_3',isset($question->pprq_10_5_3)?$question->pprq_10_5_3:''), array('id' => 'pprq_10_5_3', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('pprq_10_5_3_e', Input::old('pprq_10_5_3_e',isset($question->pprq_10_5_3_e)?$question->pprq_10_5_3_e:''),array('id'=>'pprq_10_5_3_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['pprq_10_5_3_e'])) !!}
                                </div>


                            </div>


                            <div class="form-group">
                                <label class="col-xs-4 control-label">10.6। {{ @\App\Models\Reproductive::questionText()['pprq_10_6']}}</label>
                                <div class="col-xs-4">
                                    {!! Form::select('pprq_10_6_1',[''=>'---Select an option---']+\App\Models\Reproductive::getPregnancyServiceWhyNotTaken(),Input::old('pprq_10_6_1',isset($question->pprq_10_6_1)?$question->pprq_10_6_1:''), array('id' => 'pprq_10_6_1', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('pprq_10_6_1_e', Input::old('pprq_10_6_1_e',isset($question->pprq_10_6_1_e)?$question->pprq_10_6_1_e:''),array('id'=>'pprq_10_6_1_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['pprq_10_6_1_e'])) !!}

                                    {!! Form::select('pprq_10_6_2',[''=>'---Select an option---']+\App\Models\Reproductive::getPregnancyServiceWhyNotTaken(),Input::old('pprq_10_6_2',isset($question->pprq_10_6_2)?$question->pprq_10_6_2:''), array('id' => 'pprq_10_6_2', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('pprq_10_6_2_e', Input::old('pprq_10_6_2_e',isset($question->pprq_10_6_2_e)?$question->pprq_10_6_2_e:''),array('id'=>'pprq_10_6_2_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['pprq_10_6_2_e'])) !!}

                                    {!! Form::select('pprq_10_6_3',[''=>'---Select an option---']+\App\Models\Reproductive::getPregnancyServiceWhyNotTaken(),Input::old('pprq_10_6_3',isset($question->pprq_10_6_3)?$question->pprq_10_6_3:''), array('id' => 'pprq_10_6_3', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('pprq_10_6_3_e', Input::old('pprq_10_6_3_e',isset($question->pprq_10_6_3_e)?$question->pprq_10_6_3_e:''),array('id'=>'pprq_10_6_3_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['pprq_10_6_3_e'])) !!}
                                </div>


                            </div>


                            <div class="form-group">
                                <label class="col-xs-4 control-label">10.7। {{ @App\Models\Reproductive::questionText()['pprq_10_7']}}</label>
                                <div class="col-xs-4">
                                    {!! @App\Common::radioButtonGenerate(\App\Models\Reproductive::getYesNo(), 'pprq_10_7',0,$question->pprq_10_7, true) !!}
                                    
                                </div>
                            </div>


                           <div class="form-group">
                                <label class="col-xs-4 control-label">10.8। {{ @\App\Models\Reproductive::questionText()['pprq_10_8']}}</label>
                                <div class="col-xs-4">
                                    {!! Form::select('pprq_10_8_1',[''=>'---Select an option---']+\App\Models\Reproductive::getPregnancyDangers(),Input::old('pprq_10_8_1',isset($question->pprq_10_8_1)?$question->pprq_10_8_1:''), array('id' => 'pprq_10_8_1', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('pprq_10_8_1_e', Input::old('pprq_10_8_1_e',isset($question->pprq_10_8_1_e)?$question->pprq_10_8_1_e:''),array('id'=>'pprq_10_8_1_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['pprq_10_8_1_e'])) !!}

                                    {!! Form::select('pprq_10_8_2',[''=>'---Select an option---']+\App\Models\Reproductive::getPregnancyDangers(),Input::old('pprq_10_8_2',isset($question->pprq_10_8_2)?$question->pprq_10_8_2:''), array('id' => 'pprq_10_8_2', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('pprq_10_8_2_e', Input::old('pprq_10_8_2_e',isset($question->pprq_10_8_2_e)?$question->pprq_10_8_2_e:''),array('id'=>'pprq_10_8_2_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['pprq_10_8_2_e'])) !!}

                                    {!! Form::select('pprq_10_8_3',[''=>'---Select an option---']+\App\Models\Reproductive::getPregnancyDangers(),Input::old('pprq_10_8_3',isset($question->pprq_10_8_3)?$question->pprq_10_8_3:''), array('id' => 'pprq_10_8_3', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('pprq_10_8_3_e', Input::old('pprq_10_8_3_e',isset($question->pprq_10_8_3_e)?$question->pprq_10_8_3_e:''),array('id'=>'pprq_10_8_3_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['pprq_10_8_3_e'])) !!}
                                </div>


                            </div>


                            <div class="form-group">
                                <label class="col-xs-4 control-label">10.9। {{ @App\Models\Reproductive::questionText()['pprq_10_9']}}</label>
                                <div class="col-xs-4">
                                    {!! Form::select('pprq_10_9',[''=>'---Select an option---']+\App\Models\Reproductive::getWhereList(),Input::old('pprq_10_9',isset($question->pprq_10_9)?$question->pprq_10_9:''), array('id' => 'pprq_10_9', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('pprq_10_9_e', Input::old('pprq_10_9_e',isset($question->pprq_10_9_e)?$question->pprq_10_9_e:''),array('id'=>'pprq_10_9_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['pprq_10_9_e'])) !!}
                                </div>
                            </div>


                             <div class="form-group">
                                <label class="col-xs-4 control-label">10.10। {{ @\App\Models\Reproductive::questionText()['pprq_10_10']}}</label>
                                <div class="col-xs-4">
                                    {!! Form::select('pprq_10_10_1',[''=>'---Select an option---']+\App\Models\Reproductive::getWhereList(),Input::old('pprq_10_10_1',isset($question->pprq_10_10_1)?$question->pprq_10_10_1:''), array('id' => 'pprq_10_10_1', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('pprq_10_10_1_e', Input::old('pprq_10_10_1_e',isset($question->pprq_10_10_1_e)?$question->pprq_10_10_1_e:''),array('id'=>'pprq_10_10_1_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['pprq_10_10_1_e'])) !!}

                                    {!! Form::select('pprq_10_10_2',[''=>'---Select an option---']+\App\Models\Reproductive::getWhereList(),Input::old('pprq_10_10_2',isset($question->pprq_10_10_2)?$question->pprq_10_10_2:''), array('id' => 'pprq_10_10_2', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('pprq_10_10_2_e', Input::old('pprq_10_10_2_e',isset($question->pprq_10_10_2_e)?$question->pprq_10_10_2_e:''),array('id'=>'pprq_10_10_2_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['pprq_10_10_2_e'])) !!}

                                    {!! Form::select('pprq_10_10_3',[''=>'---Select an option---']+\App\Models\Reproductive::getWhereList(),Input::old('pprq_10_10_3',isset($question->pprq_10_10_3)?$question->pprq_10_10_3:''), array('id' => 'pprq_10_10_3', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('pprq_10_10_3_e', Input::old('pprq_10_10_3_e',isset($question->pprq_10_10_3_e)?$question->pprq_10_10_3_e:''),array('id'=>'pprq_10_10_3_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['pprq_10_10_3_e'])) !!}
                                </div>


                            </div>



                            <div class="form-group">
                                <label class="col-xs-4 control-label">10.11। {{ @App\Models\Reproductive::questionText()['pprq_10_11']}}</label>
                                <div class="col-xs-4">
                                    {!! Form::select('pprq_10_11',[''=>'---Select an option---']+\App\Models\Reproductive::getWhoList(),Input::old('pprq_10_11',isset($question->pprq_10_11)?$question->pprq_10_11:''), array('id' => 'pprq_10_11', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('pprq_10_11_e', Input::old('pprq_10_11_e',isset($question->pprq_10_11_e)?$question->pprq_10_11_e:''),array('id'=>'pprq_10_11_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['pprq_10_11_e'])) !!}
                                </div>
                            </div>



                            

                            <div class="form-group">
                                <label class="col-xs-4 control-label">10.12। {{ @App\Models\Reproductive::questionText()['pprq_10_12']}}</label>
                                <div class="col-xs-4">
                                    {!! Form::select('pprq_10_12',[''=>'---Select an option---']+\App\Models\Reproductive::getPregnancyBirthPostion(),Input::old('pprq_10_12',isset($question->pprq_10_12)?$question->pprq_10_12:''), array('id' => 'pprq_10_12', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('pprq_10_12_e', Input::old('pprq_10_12_e',isset($question->pprq_10_12_e)?$question->pprq_10_12_e:''),array('id'=>'pprq_10_12_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['pprq_10_12_e'])) !!}
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-xs-4 control-label">10.13। {{ @App\Models\Reproductive::questionText()['pprq_10_13']}}</label>
                                <div class="col-xs-4">
                                    {!! @App\Common::radioButtonGenerate(\App\Models\Reproductive::getYesNoDontKnow(), 'pprq_10_13',0,$question->pprq_10_13, true) !!}
                                    
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-xs-4 control-label">10.14। {{ @\App\Models\Reproductive::questionText()['pprq_10_14']}}</label>
                                <div class="col-xs-4">
                                    {!! Form::select('pprq_10_14_1',[''=>'---Select an option---']+\App\Models\Reproductive::getBirthProblemIssue(),Input::old('pprq_10_14_1',isset($question->pprq_10_14_1)?$question->pprq_10_14_1:''), array('id' => 'pprq_10_14_1', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('pprq_10_14_1_e', Input::old('pprq_10_14_1_e',isset($question->pprq_10_14_1_e)?$question->pprq_10_14_1_e:''),array('id'=>'pprq_10_14_1_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['pprq_10_14_1_e'])) !!}

                                    {!! Form::select('pprq_10_14_2',[''=>'---Select an option---']+\App\Models\Reproductive::getBirthProblemIssue(),Input::old('pprq_10_14_2',isset($question->pprq_10_14_2)?$question->pprq_10_14_2:''), array('id' => 'pprq_10_14_2', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('pprq_10_14_2_e', Input::old('pprq_10_14_2_e',isset($question->pprq_10_14_2_e)?$question->pprq_10_14_2_e:''),array('id'=>'pprq_10_14_2_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['pprq_10_14_2_e'])) !!}

                                    {!! Form::select('pprq_10_14_3',[''=>'---Select an option---']+\App\Models\Reproductive::getBirthProblemIssue(),Input::old('pprq_10_14_3',isset($question->pprq_10_14_3)?$question->pprq_10_14_3:''), array('id' => 'pprq_10_14_3', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('pprq_10_14_3_e', Input::old('pprq_10_14_3_e',isset($question->pprq_10_14_3_e)?$question->pprq_10_14_3_e:''),array('id'=>'pprq_10_14_3_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['pprq_10_14_3_e'])) !!}
                                </div>


                            </div>


                            <div class="form-group">
                                <label class="col-xs-4 control-label">10.15। {{ @App\Models\Reproductive::questionText()['pprq_10_15']}}</label>
                                <div class="col-xs-4">
                                    {!! Form::select('pprq_10_15',[''=>'---Select an option---']+\App\Models\Reproductive::getWhereList(),Input::old('pprq_10_15',isset($question->pprq_10_15)?$question->pprq_10_15:''), array('id' => 'pprq_10_15', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('pprq_10_15_e', Input::old('pprq_10_15_e',isset($question->pprq_10_15_e)?$question->pprq_10_15_e:''),array('id'=>'pprq_10_15_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['pprq_10_15_e'])) !!}
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-xs-4 control-label">10.16। {{ @App\Models\Reproductive::questionText()['pprq_10_16']}}</label>
                                <div class="col-xs-4">
                                    {!! @App\Common::radioButtonGenerate(\App\Models\Reproductive::getYesNoDontKnow(), 'pprq_10_16',0,$question->pprq_10_16, true) !!}
                                    
                                </div>
                            </div>


                           <div class="form-group">
                                <label class="col-xs-4 control-label">10.17। {{ @\App\Models\Reproductive::questionText()['pprq_10_17']}}</label>
                                <div class="col-xs-4">
                                    {!! Form::select('pprq_10_17_1',[''=>'---Select an option---']+\App\Models\Reproductive::getBirthProblemIssueWithChild(),Input::old('pprq_10_17_1',isset($question->pprq_10_17_1)?$question->pprq_10_17_1:''), array('id' => 'pprq_10_17_1', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('pprq_10_17_1_e', Input::old('pprq_10_17_1_e',isset($question->pprq_10_17_1_e)?$question->pprq_10_17_1_e:''),array('id'=>'pprq_10_17_1_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['pprq_10_17_1_e'])) !!}

                                    {!! Form::select('pprq_10_17_2',[''=>'---Select an option---']+\App\Models\Reproductive::getBirthProblemIssueWithChild(),Input::old('pprq_10_17_2',isset($question->pprq_10_17_2)?$question->pprq_10_17_2:''), array('id' => 'pprq_10_17_2', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('pprq_10_17_2_e', Input::old('pprq_10_17_2_e',isset($question->pprq_10_17_2_e)?$question->pprq_10_17_2_e:''),array('id'=>'pprq_10_17_2_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['pprq_10_17_2_e'])) !!}

                                    {!! Form::select('pprq_10_17_3',[''=>'---Select an option---']+\App\Models\Reproductive::getBirthProblemIssueWithChild(),Input::old('pprq_10_17_3',isset($question->pprq_10_17_3)?$question->pprq_10_17_3:''), array('id' => 'pprq_10_17_3', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('pprq_10_17_3_e', Input::old('pprq_10_17_3_e',isset($question->pprq_10_17_3_e)?$question->pprq_10_17_3_e:''),array('id'=>'pprq_10_17_3_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['pprq_10_17_3_e'])) !!}
                                </div>


                            </div>


                            <div class="form-group">
                                <label class="col-xs-4 control-label">10.18। {{ @App\Models\Reproductive::questionText()['pprq_10_18']}}</label>
                                <div class="col-xs-4">
                                    {!! @App\Common::radioButtonGenerate(\App\Models\Reproductive::getYesNoDontKnow(), 'pprq_10_18',0,$question->pprq_10_18, true) !!}
                                    
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-xs-4 control-label">10.19। {{ @App\Models\Reproductive::questionText()['pprq_10_19']}}</label>
                                <div class="col-xs-4">
                                    {!! @App\Common::radioButtonGenerate(\App\Models\Reproductive::getYesNo(), 'pprq_10_19',0,$question->pprq_10_19, true) !!}
                                    
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-xs-4 control-label">10.20। {{ @App\Models\Reproductive::questionText()['pprq_10_20']}}</label>
                                <div class="col-xs-4">
                                    {!! Form::select('pprq_10_20',[''=>'---Select an option---']+\App\Models\Reproductive::getWhereList(),Input::old('pprq_10_20',isset($question->pprq_10_20)?$question->pprq_10_20:''), array('id' => 'pprq_10_20', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('pprq_10_20_e', Input::old('pprq_10_20_e',isset($question->pprq_10_20_e)?$question->pprq_10_20_e:''),array('id'=>'pprq_10_20_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['pprq_10_20_e'])) !!}
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-xs-4 control-label">10.21। {{ @App\Models\Reproductive::questionText()['pprq_10_21']}}</label>
                                <div class="col-xs-4">
                                    {!! @App\Common::radioButtonGenerate(\App\Models\Reproductive::getYesNo(), 'pprq_10_21',0,$question->pprq_10_21, true) !!}
                                    
                                </div>
                            </div>






                    </div>



                    {{-- Section 4 Tab --}}
                    <div class="wizard-pane" role="tabpanel">
                        <p><br><strong> {{ @App\Models\Reproductive::questionText()['fq_11_i']}}</strong></p>

                        <div class="form-group">
                                <label class="col-xs-4 control-label">11.1। {{ @App\Models\Reproductive::questionText()['fq_11_1']}}</label>
                                <div class="col-xs-4">
                                    {!! @App\Common::radioButtonGenerate(\App\Models\Reproductive::getYes2NoIgnore(), 'fq_11_1',0,$question->fq_11_1, true) !!}
                                    
                                </div>
                        </div>


                        <div class="form-group">
                                <label class="col-xs-4 control-label">11.2। {{ @App\Models\Reproductive::questionText()['fq_11_2']}}</label>
                                <div class="col-xs-4">
                                    {!! @App\Common::radioButtonGenerate(\App\Models\Reproductive::getFistulaWasteBreakAnswer(), 'fq_11_2',0,$question->fq_11_2, true) !!}
                                    
                                </div>
                        </div>


                        <div class="form-group">
                                <label class="col-xs-4 control-label">11.3। {{ @App\Models\Reproductive::questionText()['fq_11_3']}}</label>
                                <div class="col-xs-4">
                                    {!! @App\Common::radioButtonGenerate(\App\Models\Reproductive::getGiveAnswerDontNoOnly(), 'fq_11_3',0,$question->fq_11_3, true) !!}

                                    {!! Form::text('fq_11_3_day', Input::old('fq_11_3_day',isset($question->fq_11_3_day)?$question->fq_11_3_day:''),array('id'=>'fq_11_3_day','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['fq_11_3_day'])) !!}


                                    {!! Form::text('fq_11_3_month', Input::old('fq_11_3_month',isset($question->fq_11_3_month)?$question->fq_11_3_month:''),array('id'=>'fq_11_3_month','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['fq_11_3_month'])) !!}


                                    {!! Form::text('fq_11_3_year', Input::old('fq_11_3_year',isset($question->fq_11_3_year)?$question->fq_11_3_year:''),array('id'=>'fq_11_3_year','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['fq_11_3_year'])) !!}
                                </div>
                        </div>


                        <div class="form-group">
                                <label class="col-xs-4 control-label">11.4। {{ @App\Models\Reproductive::questionText()['fq_11_4']}}</label>
                                <div class="col-xs-4">
                                    {!! Form::select('fq_11_4',[''=>'---Select an option---']+\App\Models\Reproductive::getFistulaWasteBreakProblemsWhy(),Input::old('fq_11_4',isset($question->fq_11_4)?$question->fq_11_4:''), array('id' => 'fq_11_4', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('fq_11_4_e', Input::old('fq_11_4_e',isset($question->fq_11_4_e)?$question->fq_11_4_e:''),array('id'=>'fq_11_4_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['fq_11_4_e'])) !!}
                                </div>
                        </div>


                        <div class="form-group">
                                <label class="col-xs-4 control-label">11.5। {{ @App\Models\Reproductive::questionText()['fq_11_5']}}</label>
                                <div class="col-xs-4">
                                    {!! Form::select('fq_11_5',[''=>'---Select an option---']+\App\Models\Reproductive::getPregnancyFistulaTiming(),Input::old('fq_11_5',isset($question->fq_11_5)?$question->fq_11_5:''), array('id' => 'fq_11_5', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('fq_11_5_e', Input::old('fq_11_5_e',isset($question->fq_11_5_e)?$question->fq_11_5_e:''),array('id'=>'fq_11_5_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['fq_11_5_e'])) !!}
                                </div>
                        </div>

                        <div class="form-group">
                                <label class="col-xs-4 control-label">11.6। {{ @App\Models\Reproductive::questionText()['fq_11_6']}}</label>
                                <div class="col-xs-4">
                                    {!! Form::select('fq_11_6',[''=>'---Select an option---']+\App\Models\Reproductive::getWhereList(),Input::old('fq_11_6',isset($question->fq_11_6)?$question->fq_11_6:''), array('id' => 'fq_11_6', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('fq_11_6_e', Input::old('fq_11_6_e',isset($question->fq_11_6_e)?$question->fq_11_6_e:''),array('id'=>'fq_11_6_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['fq_11_6_e'])) !!}
                                </div>
                        </div>


                        <div class="form-group">
                                <label class="col-xs-4 control-label">11.7। {{ @App\Models\Reproductive::questionText()['fq_11_7']}}</label>
                                <div class="col-xs-4">
                                    {!! Form::select('fq_11_7',[''=>'---Select an option---']+\App\Models\Reproductive::getPregnancyDeliveryPlacesHowFinished(),Input::old('fq_11_7',isset($question->fq_11_7)?$question->fq_11_7:''), array('id' => 'fq_11_7', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('fq_11_7_e', Input::old('fq_11_7_e',isset($question->fq_11_7_e)?$question->fq_11_7_e:''),array('id'=>'fq_11_7_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['fq_11_7_e'])) !!}
                                </div>
                        </div>

                        <div class="form-group">
                                <label class="col-xs-4 control-label">11.8। {{ @App\Models\Reproductive::questionText()['fq_11_8']}}</label>
                                <div class="col-xs-4">
                                    {!! @App\Common::radioButtonGenerate(\App\Models\Reproductive::getYesNo(), 'fq_11_8',0,$question->fq_11_8, true) !!}
                                    
                                </div>
                        </div>


                        <div class="form-group">
                                <label class="col-xs-4 control-label">11.9। {{ @\App\Models\Reproductive::questionText()['fq_11_9']}}</label>
                                <div class="col-xs-4">
                                    {!! Form::select('fq_11_9_1',[''=>'---Select an option---']+\App\Models\Reproductive::getPregnancyDeliverySocialFamilyObstacles(),Input::old('fq_11_9_1',isset($question->fq_11_9_1)?$question->fq_11_9_1:''), array('id' => 'fq_11_9_1', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('fq_11_9_1_e', Input::old('fq_11_9_1_e',isset($question->fq_11_9_1_e)?$question->fq_11_9_1_e:''),array('id'=>'fq_11_9_1_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['fq_11_9_1_e'])) !!}

                                    {!! Form::select('fq_11_9_2',[''=>'---Select an option---']+\App\Models\Reproductive::getPregnancyDeliverySocialFamilyObstacles(),Input::old('fq_11_9_2',isset($question->fq_11_9_2)?$question->fq_11_9_2:''), array('id' => 'fq_11_9_2', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('fq_11_9_2_e', Input::old('fq_11_9_2_e',isset($question->fq_11_9_2_e)?$question->fq_11_9_2_e:''),array('id'=>'fq_11_9_2_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['fq_11_9_2_e'])) !!}

                                    {!! Form::select('fq_11_9_3',[''=>'---Select an option---']+\App\Models\Reproductive::getPregnancyDeliverySocialFamilyObstacles(),Input::old('fq_11_9_3',isset($question->fq_11_9_3)?$question->fq_11_9_3:''), array('id' => 'fq_11_9_3', 'class' => 'form-control select2')) !!}

                                    {!! Form::text('fq_11_9_3_e', Input::old('fq_11_9_3_e',isset($question->fq_11_9_3_e)?$question->fq_11_9_3_e:''),array('id'=>'fq_11_9_3_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['fq_11_9_3_e'])) !!}
                                </div>


                        </div>

                        <p><br><strong> {{ @App\Models\Reproductive::questionText()['fqi_12_i']}}</strong></p>


                         <div class="form-group">
                                <label class="col-xs-4 control-label">12.1। {{ @App\Models\Reproductive::questionText()['fqi_12_1']}}</label>
                                <div class="col-xs-4">
                                    

                                    {!! @App\Common::radioButtonGenerate(\App\Models\Reproductive::getGiveAnswerDontNoOnly(), 'fqi_12_1',0,$question->fqi_12_1, true) !!}

                                    {!! Form::text('fqi_12_1_name', Input::old('fqi_12_1_name',isset($question->fqi_12_1_name)?$question->fqi_12_1_name:''),array('id'=>'fqi_12_1_name','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['fqi_12_1_name'])) !!}


                                    {!! Form::text('fqi_12_1_father_or_husband', Input::old('fqi_12_1_father_or_husband',isset($question->fqi_12_1_father_or_husband)?$question->fqi_12_1_father_or_husband:''),array('id'=>'fqi_12_1_father_or_husband','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['fqi_12_1_father_or_husband'])) !!}

                                    {!! Form::text('fqi_12_1_house_no', Input::old('fqi_12_1_house_no',isset($question->fqi_12_1_house_no)?$question->fqi_12_1_house_no:''),array('id'=>'fqi_12_1_house_no','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['fqi_12_1_house_no'])) !!}


                                    {!! Form::text('fqi_12_1_road_no', Input::old('fqi_12_1_road_no',isset($question->fqi_12_1_road_no)?$question->fqi_12_1_road_no:''),array('id'=>'fqi_12_1_road_no','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['fqi_12_1_road_no'])) !!}


                                    {!! Form::text('fqi_12_1_union_or_ward', Input::old('fqi_12_1_union_or_ward',isset($question->fqi_12_1_union_or_ward)?$question->fqi_12_1_union_or_ward:''),array('id'=>'fqi_12_1_union_or_ward','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['fqi_12_1_union_or_ward'])) !!}


                                    {!! Form::text('fqi_12_1_mouja_or_moholla', Input::old('fqi_12_1_mouja_or_moholla',isset($question->fqi_12_1_mouja_or_moholla)?$question->fqi_12_1_mouja_or_moholla:''),array('id'=>'fqi_12_1_mouja_or_moholla','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['fqi_12_1_mouja_or_moholla'])) !!}

                                    {!! Form::text('fqi_12_1_village_or_area', Input::old('fqi_12_1_village_or_area',isset($question->fqi_12_1_village_or_area)?$question->fqi_12_1_village_or_area:''),array('id'=>'fqi_12_1_village_or_area','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['fqi_12_1_village_or_area'])) !!}


                                    {!! Form::text('fqi_12_1_house_head', Input::old('fqi_12_1_house_head',isset($question->fqi_12_1_house_head)?$question->fqi_12_1_house_head:''),array('id'=>'fqi_12_1_house_head','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['fqi_12_1_house_head'])) !!}

                                    {!! Form::text('fqi_12_1_mobile_no', Input::old('fqi_12_1_mobile_no',isset($question->fqi_12_1_mobile_no)?$question->fqi_12_1_mobile_no:''),array('id'=>'fqi_12_1_mobile_no','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['fqi_12_1_mobile_no'])) !!}


                                    
                                </div>
                        </div>

                        <!-- end point -->
                        <input type="hidden" name="end_point">                        

                    </div>
					
				</div>
				
				{{ Form::close() }}
			</div>
		</div>
		<!--end Steps -->
		
    </div>

    @push('rscripts')
	<!-- Form Wizard JavaScript -->
    <script src="{{URL::to('resources/assets/ampleadmin/plugins/bower_components/jquery-wizard-master/dist/jquery-wizard.min.js')}}"></script>
    <!-- FormValidation plugin and the class supports validating Bootstrap form -->
    <script src="{{URL::to('resources/assets/ampleadmin/plugins/bower_components/jquery-wizard-master/libs/formvalidation/formValidation.min.js')}}"></script>
    <script src="{{URL::to('resources/assets/ampleadmin/plugins/bower_components/jquery-wizard-master/libs/formvalidation/bootstrap.min.js')}}"></script>
    <script src="{{URL::to('resources/assets/ampleadmin/plugins/bower_components/typeahead.js-master/dist/typeahead.bundle.min.js')}}"></script>
	<script type="text/javascript">
        var token="{{csrf_token()}}";
        var url ="{{url(session('access').'reproductive/question/'.$reproductive->id)}}";
        var redirect = "{{url(session('access').'reproductive/callInitiate')}}";
        var citycorporationurl = "{{url('public/js/citycorporationdata.json')}}";
        var upazilaurl = "{{url('public/js/upaziladata.json')}}";
        //var municipalurl = "{{url('public/js/municipaldata.json')}}";

        var testurl = "{{url(session('access').'reproductive/allfileds/')}}";
        //data for all
        var citycorporationdata = [];
        var upaziladata = [];
        var municipaldata = [];
        var cc = [];
        var uz = [];
        var mc = [];

        //end data for all
        var question_id =@php echo isset($question->id) && $question->id >0 ? $question->id:0; @endphp;

        var last_input=@php
            echo isset($question->last_input) ? "'".$question->last_input."'":"null"; @endphp;
        var SequenceArray=
        	@php

                echo json_encode(\App\Models\Reproductive::gateSequence())
            @endphp
            ;

        var dropdownoffseq=@php echo json_encode(\App\Models\Reproductive::onOffMultiPleDrop())  @endphp;

        var RevSequenceArray=
            @php

                echo json_encode(\App\Models\Reproductive::gateReverseSequence())
            @endphp
            ;

        var  AllSteps =    
            @php
                $allsteps = [];
                if(isset($question) && isset($question->last_input)){
                    $step = $question->last_input;
                    $questionStep = \App\Models\ReproductiveQuestion::stepWiseNode();                
                    
                    $key = \App\Models\ReproductiveQuestion::searchForId($step, $questionStep);
                    //dd($key);
                    $allsteps=\App\Models\ReproductiveQuestion::dataArray($step,$key);
                }
               echo json_encode($allsteps);

            @endphp;
             
    </script>

    <script src="{{URL::to('resources/assets/js/reproductive/question.js')}}"></script>
    @endpush    
  @stop