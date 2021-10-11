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

    <div class="col-md-12">

    	<!-- Rescheduled -->
		
		<div class="col-md-4 col-sm-12  table-position" style="display: none;">
            <button class="close btn btn-danger">close(X)</button>

            

            @if($ivr->no_of_call <= 2)
            <div class="form-group">
                
                <div class="col-md-12">
                    {!! Form::select('call_status',[''=>'--- Call Status ---']+\App\Models\Ivr::getScheduleSuveillance(),Input::old('call_status',isset($question->call_status)?$question->call_status:''), array('id' => 'call_status', 'class' => 'form-control')) !!}
                </div>
            </div>


            <input type="hidden" name="s_type" value="2">

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
            @else

            <div class="form-group">
                <label class="control-label ">Call Status</label>
                {!! Form::select('call_status',[''=>'--- সাক্ষাৎকার অবস্থা ---']+\App\Models\Ivr::getForcedfinished(),Input::old('call_status',isset($question->call_state)?$question->call_status:''), array('id' => 'call_status', 'class' => 'form-control')) !!}
            </div>

            @endif

            <div class="form-group">
                <button type="submit" id="submit_new" class="btn btn-primary btn-block" name="schedule">Submit</button>
            </div>

            <br>
        </div>
		
        <!-- end Rescheduled -->


    	<!-- Steps -->
		<div class="white-box">
            <div class="col-md-12 text-center">
                <p id="call_duration"></p>
                <button id="show_reschedule" class="btn btn-primary text-center">Call Status
                    <br/>

                </button>
            </div>

            <div id="exampleValidator" class="wizard">

            	<ul class="wizard-steps" role="tablist">
                    <li class="active" role="tab">
                        <h4><span><i class="ti-user"></i></span>{{ @App\Models\Ivr::questionText()['s']}}, {{ @App\Models\Ivr::questionText()['di_1']}}, {{ @App\Models\Ivr::questionText()['smk_2']}}</h4></li>
                    <li role="tab">
                        <h4><span><i class="ti-credit-card"></i></span>{{ @App\Models\Ivr::questionText()['drk_3']}}, {{ @App\Models\Ivr::questionText()['fd_4']}}</h4></li>
                    <li role="tab"><h4><span><i class="ti-check"></i></span>{{ @App\Models\Ivr::questionText()['hq_5']}}, {{ @App\Models\Ivr::questionText()['op_6']}}</h4></li>

                    <li role="tab"><h4><span><i class="ti-check"></i></span>{{ @App\Models\Ivr::questionText()['cov_7']}}</h4></li>
                    
                    
                </ul>

                {!! Form::open(array('url' => isset($ivr)?session('access').'ivr/question/'.$ivr->id :session('access').'ivr/question/'.$id,'method' =>'post',  'enctype'=>'multipart/form-data','id'=>"validation", 'class'=>"form-horizontal")) !!}
                <div class="wizard-content">

                	{{-- Active Tab --}}
                	<div class="wizard-pane active" role="tabpanel">
                		<div class="surveillance-data">

                			<p>
                                <br><strong> {{ @App\Models\Ivr::questionText()['s_0_i'] }}</strong>
                            </p>

                			<div class="form-group">
                                <label class="col-xs-4 control-label">১ । {{ @App\Models\Ivr::questionText()['s_0_1']}}</label>
                                <div class="col-xs-4">
                                    {!! @App\Common::radioButtonGenerate(\App\Models\Ivr::getGender(), 's_0_1',0,$question->s_0_1, true) !!}
                                    
                                </div>
                                <div class="col-md-4">
                                	<ul style="background-color: #3184ad;color:#fff;">
                                	<li> সাক্ষাতকার শুরু করে, কিছু প্রশ্নের পর, ব্যস্ততা বা অন্য কারণে সাক্ষাতকার প্রদানকারী পরে সাক্ষাতকার
দিতে চাইলে ”শেষ হয়নি” চাপুন এবং সাক্ষাতকারের জন্য সময় নির্ধারন করুন।</li>
<li> কথা শুরু করে, কিছু প্রশ্নের পর, লাইন কেটে গেছে/অস্পষ্ট ইত্যাদি কারণে সম্পন্ন করা না গেলে আরও একবার কল করুন, না ধরলে ”লাইন কেটে গেছে/অস্পষ্ট” চাপুন। </li>
<li> কথা শুরু করে, কিছু প্রশ্নের পর, আর বলতে না চাইলে এবং সময় নির্ধারণও করতে না চাইলে, ধন্যবাদ জানিয়ে ”আংশিক অসম্মত” চেপে শেষ করুন।</li>



</ul>


                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-xs-4 control-label">২ । {{ @App\Models\Ivr::questionText()['s_0_2']}}</label>
                                <div class="col-xs-4">
                                    {!! @App\Common::radioButtonGenerate(\App\Models\Ivr::get18UpDown(), 's_0_2',0,$question->s_0_2, true) !!}
                                    
                                </div>
<div class="col-md-4">
                                	<ul style="background-color: #3184ad;color:#fff;">
                                
<li> কথা শুরু করে, কিছু প্রশ্নের পর, এমনকি একবার সময় নির্ধারণের পরও কল সম্পন্ন করা না গেলে ”সম্পূর্ণ করুন” চাপুন।</li>
</ul>
</div>
                            </div>


                            <div class="form-group">
                                <label class="col-xs-4 control-label">৩ । {{ @\App\Models\Ivr::questionText()['s_0_3']}}</label>
                                <div class="col-xs-4">
                                    {!! Form::select('s_0_3',[''=>'---Select an option---']+\App\Models\Ivr::getPersonAge(150,60),Input::old('s_0_3',isset($question->s_0_3)?$question->s_0_3:''), array('required'=>true,'id' => 's_0_3', 'class' => 'form-control select2')) !!}
                                </div>
                                <div class="col-xs-4">
                                    @include('user.ivr.previousrp', ['previous_respondent' => $previous_respondent])
                                </div>
                            </div>

                            



                            <p>
                                <br><strong> {{ @App\Models\Ivr::questionText()['di_1_i'] }}</strong>
                            </p>

                            <div class="form-group">
                                <label class="col-xs-4 control-label">৪ । {{ @App\Models\Ivr::questionText()['di_1_1']}}</label>
                                <div class="col-xs-4">
                                    {!! @App\Common::radioButtonGenerate(\App\Models\Ivr::getLiveCityOrVillage(), 'di_1_1',0,$question->di_1_1, true) !!}
                                    
                                </div>
                            </div>

                            {{-- District  --}}

                            
                            <div class="form-group">
                                <label class="col-xs-4 control-label">৫ । {{ @App\Models\Ivr::questionText()['di_1_2']}}</label>
                                <div class="col-xs-4">

                                	<div class="row">
                                    	
                                        <div class="col-xs-12">
		                                    {!! Form::select('di_1_2_cc',[''=>'---City Corporation---']+\App\Models\Ivr::citycorporationlist(),Input::old('di_1_2_cc',isset($question->di_1_2_cc)?$question->di_1_2_cc:''), array('id' => 'di_1_2_cc', 'class' => 'form-control select2')) !!}
		                                </div>
                                    </div>

                                	<div class="row">
		                                
		                                <div class="col-xs-12">
		                                    {!! Form::select('di_1_2_dd',[''=>'---District---']+\App\Models\Ivr::districtList(),Input::old('di_1_2_dd',isset($question->di_1_2_dd)?$question->di_1_2_dd:''), array('id' => 'di_1_2_dd', 'class' => 'form-control select2')) !!}
		                                </div>
		                            </div>
                                    
                                    <div class="municipal">
                                        

                                        {!! Form::select('di_1_2_mc',[''=>'---Municipalty---']+\App\Models\Ivr::municipilList(isset($question->di_1_2_dd)?$question->di_1_2_dd:0),Input::old('di_1_2_mc',isset($question->di_1_2_mc)?$question->di_1_2_mc:''), array('id' => 'di_1_2_mc', 'class' => 'form-control select2')) !!}
                                    </div>

                                    <div class="upazila">
                                        

                                        {!! Form::select('di_1_2_uz',[''=>'---Upazila---']+\App\Models\Ivr::upazilalist(isset($question->di_1_2_dd)?$question->di_1_2_dd:0),Input::old('di_1_2_uz',isset($question->di_1_2_uz)?$question->di_1_2_uz:''), array('id' => 'di_1_2_uz', 'class' => 'form-control select2')) !!}
                                    </div>


                                    

                                                                


                                    {!! @App\Common::radioButtonGenerate(\App\Models\Ivr::getOtherDontNoOnly(), 'di_1_2',0,$question->di_1_2, true) !!}

                                    {!! Form::text('di_1_2_e', Input::old('di_1_2_e',isset($question->di_1_2_e)?$question->di_1_2_e:''),array('id'=>'di_1_2_e','class' => 'form-control','placeholder'=>@App\Models\Ivr::questionText()['di_1_2_e'])) !!}
                                </div>
                            </div>

                            {{-- end District --}}


                            <div class="form-group">
                                <label class="col-xs-4 control-label">৬ । {{ @\App\Models\Ivr::questionText()['di_1_3']}}</label>
                                <div class="col-xs-4">
                                    {!! Form::select('di_1_3',[''=>'---Select an option---']+\App\Models\Ivr::getLastEducation(),Input::old('di_1_3',isset($question->di_1_3)?$question->di_1_3:''), array('required'=>true,'id' => 'di_1_3', 'class' => 'form-control select2')) !!}

                                    {!! Form::number('di_1_3_e', Input::old('di_1_3_e',isset($question->di_1_3_e)?$question->di_1_3_e:''),array('id'=>'di_1_3_e','min'=>0,'class' => 'form-control','placeholder'=>@App\Models\Ivr::questionText()['di_1_3_e'])) !!}
                                </div>
                            </div>

                            

                            <p>
                                <br><strong> {{ @App\Models\Ivr::questionText()['smk_2_i'] }}</strong>
                            </p>


                            <div class="form-group">
                                <label class="col-xs-4 control-label">৭ । {{ @App\Models\Ivr::questionText()['smk_2_1']}}</label>
                                <div class="col-xs-4">
                                    {!! @App\Common::radioButtonGenerate(\App\Models\Ivr::getYesNoDenied(), 'smk_2_1',0,$question->smk_2_1, true) !!}
                                    
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-xs-4 control-label">৮ । {{ @App\Models\Ivr::questionText()['smk_2_2']}}</label>
                                <div class="col-xs-4">
                                    {!! @App\Common::radioButtonGenerate(\App\Models\Ivr::getYesNoEveryDay(), 'smk_2_2',0,$question->smk_2_2, true) !!}
                                    
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-xs-4 control-label">৯ । {{ @App\Models\Ivr::questionText()['smk_2_3']}}</label>
                                <div class="col-xs-4">
                                    {!! @App\Common::radioButtonGenerate(\App\Models\Ivr::getYesNoDenied(), 'smk_2_3',0,$question->smk_2_3, true) !!}
                                    
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-xs-4 control-label">১০ । {{ @App\Models\Ivr::questionText()['smk_2_4']}}</label>
                                <div class="col-xs-4">
                                    {!! @App\Common::radioButtonGenerate(\App\Models\Ivr::getYesNoEveryDay(), 'smk_2_4',0,$question->smk_2_4, true) !!}
                                    
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-xs-4 control-label">১১ । {{ @App\Models\Ivr::questionText()['smk_2_5']}}</label>
                                <div class="col-xs-4">
                                    {!! @App\Common::radioButtonGenerate(\App\Models\Ivr::getYesNoDenied(), 'smk_2_5',0,$question->smk_2_5, true) !!}
                                    
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-xs-4 control-label">১২ । {{ @App\Models\Ivr::questionText()['smk_2_6']}}</label>
                                <div class="col-xs-4">
                                    {!! @App\Common::radioButtonGenerate(\App\Models\Ivr::getYesNoEveryDay(), 'smk_2_6',0,$question->smk_2_6, true) !!}
                                    
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-xs-4 control-label">১৩ । {{ @App\Models\Ivr::questionText()['smk_2_7']}}</label>
                                <div class="col-xs-4">
                                    {!! @App\Common::radioButtonGenerate(\App\Models\Ivr::getYesNoDenied(), 'smk_2_7',0,$question->smk_2_7, true) !!}
                                    
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-xs-4 control-label">১৪ । {{ @App\Models\Ivr::questionText()['smk_2_8']}}</label>
                                <div class="col-xs-4">
                                    {!! @App\Common::radioButtonGenerate(\App\Models\Ivr::getYesNoEveryDay(), 'smk_2_8',0,$question->smk_2_8, true) !!}
                                    
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-xs-4 control-label">১৫ । {{ @App\Models\Ivr::questionText()['smk_2_9']}}</label>
                                <div class="col-xs-4">
                                    {!! @App\Common::radioButtonGenerate(\App\Models\Ivr::getYesNoDenied(), 'smk_2_9',0,$question->smk_2_9, true) !!}
                                    
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-xs-4 control-label">১৬ । {{ @App\Models\Ivr::questionText()['smk_2_10']}}</label>
                                <div class="col-xs-4">
                                    {!! @App\Common::radioButtonGenerate(\App\Models\Ivr::getYesNoEveryDay(), 'smk_2_10',0,$question->smk_2_10, true) !!}
                                    
                                </div>
                            </div>



                            <div class="form-group">
                                <label class="col-xs-4 control-label">১৭ । {{ @App\Models\Ivr::questionText()['smk_2_11']}}</label>
                                <div class="col-xs-4">
                                    {!! @App\Common::radioButtonGenerate(\App\Models\Ivr::getYesNoDenied(), 'smk_2_11',0,$question->smk_2_11, true) !!}
                                    
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-xs-4 control-label">১৮ । {{ @App\Models\Ivr::questionText()['smk_2_12']}}</label>
                                <div class="col-xs-4">
                                    {!! @App\Common::radioButtonGenerate(\App\Models\Ivr::getYesNoDenied(), 'smk_2_12',0,$question->smk_2_12, true) !!}
                                    
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-xs-4 control-label">১৯ । {{ @App\Models\Ivr::questionText()['smk_2_13']}}</label>
                                <div class="col-xs-4">
                                    {!! @App\Common::radioButtonGenerate(\App\Models\Ivr::getYesNoDenied(), 'smk_2_13',0,$question->smk_2_13, true) !!}
                                    
                                </div>
                            </div>


                		</div>
                	</div>


                	{{-- Section 1 Tab --}}
					<div class="wizard-pane" role="tabpanel">
						<p>
                            <br><strong> {{ @App\Models\Ivr::questionText()['drk_3_i'] }}</strong>
                        </p>

                        <div class="form-group">
                                <label class="col-xs-4 control-label">২০ । {{ @App\Models\Ivr::questionText()['drk_3_1']}}</label>
                                <div class="col-xs-4">
                                    {!! @App\Common::radioButtonGenerate(\App\Models\Ivr::getYesNoDenied(), 'drk_3_1',0,$question->drk_3_1, true) !!}
                                    
                                </div>
                        </div>

                        <div class="form-group">
                                <label class="col-xs-4 control-label">২১ । {{ @\App\Models\Ivr::questionText()['drk_3_2']}}</label>
                                <div class="col-xs-4">
                                    {!! Form::select('drk_3_2',[''=>'---Select an option---']+\App\Models\Ivr::getLast12MonthAlchohol(),Input::old('drk_3_2',isset($question->drk_3_2)?$question->drk_3_2:''), array('required'=>true,'id' => 'drk_3_2', 'class' => 'form-control select2')) !!}
                                </div>
                        </div>

                        <div class="form-group">
                                <label class="col-xs-4 control-label">২২ । {{ @App\Models\Ivr::questionText()['drk_3_3']}}</label>
                                <div class="col-xs-4">
                                    {!! @App\Common::radioButtonGenerate(\App\Models\Ivr::getYesNoDenied(), 'drk_3_3',0,$question->drk_3_3, true) !!}
                                    
                                </div>
                        </div>


                        <p>
                            <br><strong> {{ @App\Models\Ivr::questionText()['fd_4_i'] }}</strong>
                        </p>

                        <div class="form-group">
                                <label class="col-xs-4 control-label">২৩ । {{ @\App\Models\Ivr::questionText()['fd_4_1']}}</label>
                                <div class="col-xs-4">
                                    {!! Form::select('fd_4_1',[''=>'---Select an option---']+\App\Models\Ivr::getFoodHabitDay(),Input::old('fd_4_1',isset($question->fd_4_1)?$question->fd_4_1:''), array('required'=>true,'id' => 'fd_4_1', 'class' => 'form-control select2')) !!}
                                </div>
                        </div>

                        <div class="form-group">
                                <label class="col-xs-4 control-label">২৪ । {{ @\App\Models\Ivr::questionText()['fd_4_2']}}</label>
                                <div class="col-xs-4">
                                    {!! Form::select('fd_4_2',[''=>'---Select an option---']+\App\Models\Ivr::getFoodPresentatinNumber(),Input::old('fd_4_2',isset($question->fd_4_2)?$question->fd_4_2:''), array('required'=>true,'id' => 'fd_4_2', 'class' => 'form-control select2')) !!}
                                </div>
                        </div>


                        <div class="form-group">
                                <label class="col-xs-4 control-label">২৫ । {{ @\App\Models\Ivr::questionText()['fd_4_3']}}</label>
                                <div class="col-xs-4">
                                    {!! Form::select('fd_4_3',[''=>'---Select an option---']+\App\Models\Ivr::getFoodHabitDay(),Input::old('fd_4_3',isset($question->fd_4_3)?$question->fd_4_3:''), array('required'=>true,'id' => 'fd_4_3', 'class' => 'form-control select2')) !!}
                                </div>
                        </div>


                        <div class="form-group">
                                <label class="col-xs-4 control-label">২৬ । {{ @\App\Models\Ivr::questionText()['fd_4_4']}}</label>
                                <div class="col-xs-4">
                                    {!! Form::select('fd_4_4',[''=>'---Select an option---']+\App\Models\Ivr::getFoodPresentatinNumber(),Input::old('fd_4_4',isset($question->fd_4_4)?$question->fd_4_4:''), array('required'=>true,'id' => 'fd_4_4', 'class' => 'form-control select2')) !!}
                                </div>
                        </div>


                        <div class="form-group">
                                <label class="col-xs-4 control-label">২৭ । {{ @\App\Models\Ivr::questionText()['fd_4_5']}}</label>
                                <div class="col-xs-4">
                                    {!! Form::select('fd_4_5',[''=>'---Select an option---']+\App\Models\Ivr::getSaltTakenInterval(),Input::old('fd_4_5',isset($question->fd_4_5)?$question->fd_4_5:''), array('required'=>true,'id' => 'fd_4_5', 'class' => 'form-control select2')) !!}
                                </div>
                        </div>


                        <div class="form-group">
                                <label class="col-xs-4 control-label">২৮ । {{ @\App\Models\Ivr::questionText()['fd_4_6']}}</label>
                                <div class="col-xs-4">
                                    {!! Form::select('fd_4_6',[''=>'---Select an option---']+\App\Models\Ivr::getSaltTakenInterval(),Input::old('fd_4_6',isset($question->fd_4_6)?$question->fd_4_6:''), array('required'=>true,'id' => 'fd_4_6', 'class' => 'form-control select2')) !!}
                                </div>
                        </div>


                        <div class="form-group">
                                <label class="col-xs-4 control-label">২৯ । {{ @\App\Models\Ivr::questionText()['fd_4_7']}}</label>
                                <div class="col-xs-4">
                                    {!! Form::select('fd_4_7',[''=>'---Select an option---']+\App\Models\Ivr::getSaltTakenInterval(),Input::old('fd_4_7',isset($question->fd_4_7)?$question->fd_4_7:''), array('required'=>true,'id' => 'fd_4_7', 'class' => 'form-control select2')) !!}
                                </div>
                        </div>




					</div>


					{{-- Section 2 Tab --}}
					<div class="wizard-pane" role="tabpanel">
						<p>
                            <br><strong> {{ @App\Models\Ivr::questionText()['hq_5_i'] }}</strong>
                        </p>


                        <div class="form-group">
                                <label class="col-xs-4 control-label">৩০ । {{ @App\Models\Ivr::questionText()['hq_5_1']}}</label>
                                <div class="col-xs-4">
                                    {!! @App\Common::radioButtonGenerate(\App\Models\Ivr::getYesNoDenied(), 'hq_5_1',0,$question->hq_5_1, true) !!}
                                    
                                </div>
                        </div>


                        <div class="form-group">
                                <label class="col-xs-4 control-label">৩১ । {{ @App\Models\Ivr::questionText()['hq_5_2']}}</label>
                                <div class="col-xs-4">
                                    {!! @App\Common::radioButtonGenerate(\App\Models\Ivr::getYesNoDenied(), 'hq_5_2',0,$question->hq_5_2, true) !!}
                                    
                                </div>
                        </div>

                        <div class="form-group">
                                <label class="col-xs-4 control-label">৩২ । {{ @App\Models\Ivr::questionText()['hq_5_3']}}</label>
                                <div class="col-xs-4">
                                    {!! @App\Common::radioButtonGenerate(\App\Models\Ivr::getYesNoDenied(), 'hq_5_3',0,$question->hq_5_3, true) !!}
                                    
                                </div>
                        </div>

                        <div class="form-group">
                                <label class="col-xs-4 control-label">৩৩ । {{ @\App\Models\Ivr::questionText()['hq_5_4']}}</label>
                                <div class="col-xs-4">
                                    {!! Form::select('hq_5_4',[''=>'---Select an option---']+\App\Models\Ivr::getHelanTime(),Input::old('hq_5_4',isset($question->hq_5_4)?$question->hq_5_4:''), array('required'=>true,'id' => 'hq_5_4', 'class' => 'form-control select2')) !!}
                                </div>
                        </div>

                        <p>
                            <br><strong> {{ @App\Models\Ivr::questionText()['op_6_i'] }}</strong>
                        </p>

                        <div class="form-group">
                                <label class="col-xs-4 control-label">৩৪ । {{ @App\Models\Ivr::questionText()['op_6_1']}}</label>
                                <div class="col-xs-4">
                                    {!! @App\Common::radioButtonGenerate(\App\Models\Ivr::getHappyLevel(), 'op_6_1',0,$question->op_6_1, true) !!}
                                    
                                </div>
                        </div>

                        <div class="form-group">
                                <label class="col-xs-4 control-label">৩৫ । {{ @App\Models\Ivr::questionText()['op_6_2']}}</label>
                                <div class="col-xs-4">
                                    {!! @App\Common::radioButtonGenerate(\App\Models\Ivr::getHardLevel(), 'op_6_2',0,$question->op_6_2, true) !!}
                                    
                                </div>
                               
                        </div>

                    

					</div>

                    {{-- Section 3 Tab --}}
                    <div class="wizard-pane" role="tabpanel">
                        <p>
                            <br><strong> {{ @App\Models\Ivr::questionText()['cov_7_i'] }}</strong>
                            <div class="col-xs-4">
                                    {!! @App\Common::radioButtonGenerate(\App\Models\Ivr::getYesNo(), 'cov_7_s',0,$question->cov_7_s, false) !!}
                                    
                            </div>
                            <br>
                        </p>


                        <div class="form-group">
                                <label class="col-xs-4 control-label">৩৬ | {{ @\App\Models\Ivr::questionText()['cov_7_1']}}</label>
                                
                                <div class="col-xs-4">
                                    {!! Form::select('cov_7_1',\App\Models\Ivr::getKhanaNumber(1),Input::old('cov_7_1',isset($question->cov_7_1)?$question->cov_7_1:''), array('required'=>true,'id' => 'cov_7_1', 'class' => 'form-control select2')) !!}
                                </div>
                        </div>

                        <div class="form-group">
                                <label class="col-xs-4 control-label">৩৭ । {{ @App\Models\Ivr::questionText()['cov_7_2']}}</label>
                                <div class="col-xs-4">
                                    {!! @App\Common::radioButtonGenerate(\App\Models\Ivr::getYesNo(), 'cov_7_2',0,$question->cov_7_2, true) !!}
                                    
                                </div>
                                
                        </div>


                        <div class="form-group">
                                <label class="col-xs-4 control-label">৩৮ | {{ @\App\Models\Ivr::questionText()['cov_7_3']}}</label>
                                

                                <div class="col-xs-4">
                                    {!! Form::select('cov_7_3',\App\Models\Ivr::getKhanaNumber(),Input::old('cov_7_3',isset($question->cov_7_3)?$question->cov_7_3:''), array('required'=>true,'id' => 'cov_7_3', 'class' => 'form-control select2')) !!}
                                </div>
                        </div>

                        <div class="form-group">
                                <label class="col-xs-4 control-label">৩৯ । {{ @App\Models\Ivr::questionText()['cov_7_4']}}</label>
                                <div class="col-xs-4">
                                    @foreach (\App\Models\Ivr::getCovidSymptom() as $key => $year)

                                    {!! Form::checkbox('cov_7_4_'.$key, $key, isset($question->{'cov_7_4_'.$key})?true:false ) !!} {{ $year }} </br>

                                    @endforeach

                                    {!! Form::text('cov_7_4_9_e', Input::old('cov_7_4_9_e',isset($question->cov_7_4_9_e)?$question->cov_7_4_9_e:''),array('id'=>'cov_7_4_9_e','class' => 'form-control','placeholder'=>@App\Models\Ivr::questionText()['cov_7_4_9_e'])) !!}

                                    

                                    
                                    
                                </div>
                                
                        </div>

                        <div class="form-group">
                                <label class="col-xs-4 control-label">৪০ । {{ @App\Models\Ivr::questionText()['cov_7_5']}}</label>
                                <div class="col-xs-4">
                                    {!! @App\Common::radioButtonGenerate(\App\Models\Ivr::getYesNo(), 'cov_7_5',0,$question->cov_7_5, true) !!}
                                    
                                </div>
                                
                        </div>


                        <div class="form-group">
                                <label class="col-xs-4 control-label">৪১ | {{ @\App\Models\Ivr::questionText()['cov_7_6']}}</label>
                                

                                <div class="col-xs-4">
                                    {!! Form::select('cov_7_6',\App\Models\Ivr::getKhanaNumber(1),Input::old('cov_7_6',isset($question->cov_7_1)?$question->cov_7_6:''), array('required'=>true,'id' => 'cov_7_6', 'class' => 'form-control select2')) !!}
                                </div>
                        </div>

                        <div class="form-group">
                                <label class="col-xs-4 control-label">৪২ । {{ @App\Models\Ivr::questionText()['cov_7_7']}}</label>
                                <div class="col-xs-4">
                                    {!! @App\Common::radioButtonGenerate(\App\Models\Ivr::getYesNo(), 'cov_7_7',0,$question->cov_7_7, true) !!}
                                    
                                </div>
                                
                        </div>

                        <div class="form-group">
                                <label class="col-xs-4 control-label">৪৩ | {{ @\App\Models\Ivr::questionText()['cov_7_8']}}</label>
                               
                                <div class="col-xs-4">
                                    {!! Form::select('cov_7_8',\App\Models\Ivr::getKhanaNumber(1),Input::old('cov_7_8',isset($question->cov_7_8)?$question->cov_7_8:''), array('required'=>true,'id' => 'cov_7_8', 'class' => 'form-control select2')) !!}
                                </div>
                                
                        </div>


                        <div class="form-group">
                                <label class="col-xs-4 control-label">৪৪ । {{ @App\Models\Ivr::questionText()['cov_7_9']}}</label>
                                <div class="col-xs-4">
                                    {!! @App\Common::radioButtonGenerate(\App\Models\Ivr::getYesNo(), 'cov_7_9',0,$question->cov_7_9, true) !!}
                                    
                                </div>
                                
                        </div>


                        <div class="form-group">
                                <label class="col-xs-4 control-label">৪৫ | {{ @\App\Models\Ivr::questionText()['cov_7_10']}}</label>
                               
                                <div class="col-xs-4">
                                    {!! Form::select('cov_7_10',\App\Models\Ivr::getKhanaNumber(1),Input::old('cov_7_10',isset($question->cov_7_10)?$question->cov_7_10:''), array('required'=>true,'id' => 'cov_7_10', 'class' => 'form-control select2')) !!}
                                </div>
                                <div class="col-xs-4">
                                    <ul style="background-color: #3184ad;color:#fff;">
                                        <li> কথা শুরু করে, সকল প্রশ্ন শেষ করলে ”Finish” চাপুন।</li>
                                    </ul>
                                </div>
                        </div>

                        <div class="row text-center" id="target_reached" style="display: none !important;">
                                
                                <hr/>
                                <h4 class="alert alert-danger">
                                বয়স সীমা গ্রুপ এর কোটা পূর্ণ  হয়ে গেছে
                                </h4>
                                
                                
                                <a id="target_reached_submit" class="btn btn-success btn-lg">        সম্পূর্ণ করুন          
                                </a>
                                <hr/>
                                
                                
                        </div>


                        <!-- end point -->
                        
                        <div class="form-group">
                        <input type="hidden" name="end_point">
                        </div>

                    </div>



                </div>

                {{ Form::close() }}


            </div>

    	</div>

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
        var url ="{{url(session('access').'ivr/question/'.$ivr->id)}}";
        var redirect = "{{url(session('access').'ivr/callInitiate')}}";
        var citycorporationurl = "{{url('public/js/citycorporationdata.json')}}";
        var municipalurl = "{{url('public/js/municipaldatadb.json')}}";
        var upazilaurl = "{{url('public/js/upaziladata.json')}}";
        var jar_url = "{{url('public/js/ivr_jar.json')}}";
        //check for age jar limit
        var ageUrl ="{{url(session('access').'ivr/checkquota')}}";
        //data for all
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

                echo json_encode(\App\Models\Ivr::gateSequence())
            @endphp
            ;

        var RevSequenceArray=
            @php

                echo json_encode(\App\Models\Ivr::gateReverseSequence())
            @endphp
            ;

        @php
                $allsteps = [];
                $key = -1;

                if(isset($question) && isset($question->last_input)){

                	$step = $question->last_input;
                	$questionStep = \App\Models\IvrQuestion::stepWiseNode();

                	$key = \App\Models\IvrQuestion::searchForId($step, $questionStep);
                    //dd($key);
                    $allsteps=\App\Models\IvrQuestion::dataArray($step,$key);


                }

        @endphp;

        var  AllSteps =@php
                echo json_encode($allsteps);
            @endphp;

        var step_index =@php echo $key;  @endphp;

        var ageEighteenUp =@php echo json_encode(\App\Models\Ivr::getPersonAge(null,18));@endphp;

        var ageEighteenDown =@php echo json_encode(\App\Models\Ivr::getPersonAge(null));@endphp;


    </script>
    <script src="{{URL::to('resources/assets/js/ivr/question.js')}}"></script>
    @endpush

@stop