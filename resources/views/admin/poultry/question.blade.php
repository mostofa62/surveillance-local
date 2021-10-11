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
        <div class="col-md-4  table-position">

            <div class="form-group">
                <label style="font-size: 16px;">0. {{ @App\Poultry::questionText()['0_']}}</label>
                <label>0.0 {{ @App\Poultry::questionText()['0_0']}}</label>
            </div>
            <div class="form-group">
                <label class="col-md-12 control-label">Call Status</label>
                <div class="col-md-12 col-sm-12">
                    {!! Form::select('call_status',[''=>'--- Call Status ---']+\App\Poultry::getScheduleSuveillance(),Input::old('call_status',isset($question->call_status)?'':''), array('id' => 'call_status', 'class' => 'form-control')) !!}
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-12 control-label ">Date</label>
                <div class="col-md-12 col-sm-12">
                    <input type="date" name="date" id="date" class="form-control" required="required" value="<?=date('Y-m-d')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-12 control-label ">Time</label>
                <div class="col-md-12 col-sm-12">
                    <input type="time" name="time" id="time" class="form-control" required="required" value="<?=date('H:i')?>">
                </div>
            </div>
            <div class="form-group">
                <button type="submit" id="submit_new" class="btn btn-primary btn-block" name="schedule">Submit</button>
            </div>

            <br>
        </div>
        <div class="white-box">
            <div id="exampleValidator" class="wizard">
                <ul class="wizard-steps" role="tablist">
                    <li class="active" role="tab">
                        <h4><span><i class="ti-user"></i></span>{{ @App\Poultry::questionText()['s']}}, {{ @App\Poultry::questionText()['gi_1']}}</h4></li>
                    <li role="tab">
                        <h4><span><i class="ti-credit-card"></i></span>{{ @App\Poultry::questionText()['pp_2']}}</h4></li>
                    <li role="tab"><h4><span><i class="ti-check"></i></span>{{ @App\Poultry::questionText()['pfp_3']}}</h4></li>
                    <li  role="tab"><h4><span><i class="ti-check"></i></span>{{ @App\Poultry::questionText()['pm_4']}}</h4></li>
                    <li  role="tab"><h4><span><i class="ti-check"></i></span>{{ @App\Poultry::questionText()['i_5']}}</h4></li>
                    <li  role="tab"><h4><span><i class="ti-check"></i></span>{{ @App\Poultry::questionText()['d_6']}}</h4></li>
                </ul>
                {!! Form::open(array('url' => isset($poultry)?session('access').'poultry/question/'.$poultry->id :session('access').'poultry/question/'.$id,'method' =>'post',  'enctype'=>'multipart/form-data','id'=>"validation", 'class'=>"form-horizontal")) !!}
                <div class="wizard-content">
                    <div class="wizard-pane active" role="tabpanel">
                        <div class="surveillance-data">
                            {{--<p><strong>নিচের প্রদত্ত তথ্যগুলো যাচাই করুনঃ</strong></p>--}}
                            {{--<div class="form-group">--}}
                            {{--<label class="col-xs-4 control-label">Surveillance ID: </label>--}}
                            {{--<div class="col-xs-4">--}}
                            {{--<strong>{!! @$poultry->surveillance_id!!}</strong>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="form-group">--}}
                            {{--<label class="col-xs-4 control-label">Date: </label>--}}
                            {{--<div class="col-xs-4">--}}
                            {{--<strong>{!! @$poultry->date!!}</strong>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="form-group">--}}
                            {{--<label class="col-xs-4 control-label">Patients Name</label>--}}
                            {{--<div class="col-xs-4">--}}
                            {{--<strong>{!! @$poultry->name !!}</strong>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            <div class="form-group">
                                <label class="col-xs-4 control-label">Mobile Number</label>
                                <div class="col-xs-4">
                                    <strong>{!! @$poultry->mobile_no !!}</strong>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-4 control-label">S.1। {{ @App\Poultry::questionText()['s_0_1']}}</label>
                                <div class="col-xs-4">
                                    {!! @App\Common::radioButtonGenerate(\App\Poultry::getPersonalMood(), 's_0_1',0,$question->s_0_1, true) !!}
                                    {{--                                    {!! Form::select('identity',[''=>'---তথ্য প্রদানকারীর পরিচয়---']+\App\Common::getIdentityType(),Input::old('identity',isset($question->identity)?$question->identity:''), array('id' => 'identity', 'class' => 'form-control')) !!}--}}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-4 control-label">S.2। {{ @App\Poultry::questionText()['s_0_2']}}</label>
                                <div class="col-xs-4">
                                    {!! Form::select('s_0_2',[''=>'---Select an option---']+\App\Poultry::getPersonAge(),Input::old('s_0_2',isset($question->s_0_2)?$question->s_0_2:''), array('id' => 's_0_2', 'class' => 'form-control select2')) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-4 control-label">S.3। {{ @App\Poultry::questionText()['s_0_3']}}</label>
                                <div class="col-xs-4">
                                    {!! @App\Common::radioButtonGenerate(\App\Poultry::getYesNo(), 's_0_3',0,$question->s_0_3, true) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-4 control-label">S.4। {{ @App\Poultry::questionText()['s_0_4']}}</label>
                                <div class="col-xs-4">
                                    {!! @App\Common::radioButtonGenerate(\App\Poultry::getYesNo(), 's_0_4',0,$question->s_0_4, true) !!}
                                </div>
                            </div>
                            <p><br><br><br><strong> {{ @App\Poultry::questionText()['0.0.0.i']}}</strong></p>
                            <div class="form-group">
                                <label class="col-xs-4 control-label">SC.1। {{ @App\Poultry::questionText()['sc_0_1']}}</label>
                                <div class="col-xs-4">
                                    {!! @App\Common::radioButtonGenerate(\App\Poultry::getYesNo(), 'sc_0_1',0,$question->sc_0_1, true) !!}
                                </div>
                            </div>
                            <p><br><strong> {{ @App\Poultry::questionText()['0.0.1.i']}}</strong></p>
                            <div class="form-group">
                                <label class="col-xs-4 control-label">GI.1.1। {{ @App\Poultry::questionText()['gi_1_1']}}</label>
                                <div class="col-xs-4">
                                    {!! @App\Common::radioButtonGenerate(\App\Poultry::getGender(), 'gi_1_1',0,$question->gi_1_1, true) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-4 control-label">GI.1.2.a। {{ @App\Poultry::questionText()['gi_1_2_a']}}</label>
                                <div class="col-xs-4">
                                    <div class="the-basics-thana">
                                        {!! Form::text('gi_1_2_a_value', Input::old('gi_1_2_a_value',isset($question->gi_1_2_a_value)?$question->gi_1_2_a_value:''),array('id'=>'gi_1_2_a_value','class' => 'typeahead form-control','placeholder'=>'thana name')) !!}
                                    </div>
                                    {!! @App\Common::checkBoxGenerate(\App\Poultry::getOtherDontKnow(),'gi_1_2_a_flag',0, array($question->gi_1_2_a_flag)); !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-4 control-label">GI.1.2.b। {{ @App\Poultry::questionText()['gi_1_2_b']}}</label>
                                <div class="col-xs-4">
                                    <div class="the-basics-area">
                                        {!! Form::text('gi_1_2_b_value', Input::old('gi_1_2_b_value',isset($question->gi_1_2_b_value)?$question->gi_1_2_b_value:''),array('id'=>'gi_1_2_b_value','class' => 'typeahead form-control','placeholder'=>'area name')) !!}
                                    </div>
                                    {!! @App\Common::checkBoxGenerate(\App\Poultry::getOtherDontKnow(),'gi_1_2_b_flag',0, array($question->gi_1_2_b_flag)); !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="wizard-pane" role="tabpanel">
                        <p><br><strong> {{ @App\Poultry::questionText()['0.0.2.i']}}</strong></p>
                        <div class="form-group">
                            <label class="col-xs-4 control-label">PP.2.1.a {{ @App\Poultry::questionText()['pp_2_1_a']}}</label>
                            <div class="col-xs-4">
                                {!! @App\Common::radioButtonGenerate(\App\Poultry::getYesNoDontKnow(), 'pp_2_1_a',0,$question->pp_2_1_a, true) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-4 control-label">PP.2.1.b {{ @App\Poultry::questionText()['pp_2_1_b']}}</label>
                            <div class="col-xs-4">
                                {!! Form::select('pp_2_1_b_flag',[''=>'---Select an option---']+\App\Poultry::getVistingTime(),Input::old('pp_2_1_b_flag',isset($question->pp_2_1_b_flag)?$question->pp_2_1_b_flag:''), array('id' => 'pp_2_1_b_flag', 'class' => 'form-control')) !!}
                                {!! Form::text('pp_2_1_b_value', Input::old('pp_2_1_b_value',isset($question->pp_2_1_b_value)?$question->pp_2_1_b_value:''),array('id'=>'pp_2_1_b_value','class' => 'form-control','placeholder'=>'Write Specific one')) !!}

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-4 control-label">PP.2.2। {{ @App\Poultry::questionText()['pp_2_2']}}</label>
                            <div class="col-xs-4">
                                <div class="the-basics-market">
                                    {!! Form::text('pp_2_2_value', Input::old('pp_2_2_value',isset($question->pp_2_2_value)?$question->pp_2_2_value:''),array('id'=>'pp_2_2_value','class' => 'typeahead form-control','placeholder'=>'Market name')) !!}
                                </div>
                                {!! @App\Common::checkBoxGenerate(\App\Poultry::getOtherDontKnow(),'pp_2_2_flag',0, array($question->pp_2_2_flag)); !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-4 control-label">PP.2.3.a {{ @App\Poultry::questionText()['pp_2_3_a']}}</label>
                            <div class="col-xs-4">
                                {!! @App\Common::radioButtonGenerate(\App\Poultry::getYesNoDontKnow(), 'pp_2_3_a',0,$question->pp_2_3_a, true) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-4 control-label">PP.2.3.b। {{ @App\Poultry::questionText()['pp_2_3_b']}}</label>
                            <div class="col-xs-4">
                                <div class="the-basics-market">
                                    {!! Form::text('pp_2_3_b_value', Input::old('pp_2_3_b_value',isset($question->pp_2_3_b_value)?$question->pp_2_3_b_value:''),array('id'=>'pp_2_3_b_value','class' => 'typeahead form-control','placeholder'=>'Market name')) !!}
                                </div>
                                {!! @App\Common::checkBoxGenerate(\App\Poultry::getOtherDontKnow(),'pp_2_3_b_flag',0, array($question->pp_2_3_b_flag)); !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-4 control-label">PP.2.4। {{ @App\Poultry::questionText()['pp_2_4']}}</label>
                            <div class="col-xs-4">
                                <div class="the-basics-thana">
                                    {!! Form::text('pp_2_4_value', Input::old('pp_2_4_value',isset($question->pp_2_4_value)?$question->pp_2_4_value:''),array('id'=>'pp_2_4_value','class' => 'typeahead form-control','placeholder'=>'thana name')) !!}
                                </div>
                                {!! @App\Common::checkBoxGenerate(\App\Poultry::getOtherDontKnow(),'pp_2_4_flag',0, array($question->pp_2_4_flag)); !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-4 control-label">PP.2.5। {{ @App\Poultry::questionText()['pp_2_5']}}</label>
                            <div class="col-xs-4">
                                {!! Form::number('pp_2_5_value', Input::old('pp_2_5_value',isset($question->pp_2_5_value)?$question->pp_2_5_value:''),array('id'=>'pp_2_5_value','class' => 'form-control','placeholder'=>'Days Ago','min'=>0)) !!}
                                {!! @App\Common::checkBoxGenerate(\App\Poultry::getDontKnow(),'pp_2_5_flag',0, array($question->pp_2_5_flag)); !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-4 control-label">PP.2.6.a {{ @App\Poultry::questionText()['pp_2_6_a']}}</label>
                            <div class="col-xs-4">
                                {!! @App\Common::radioButtonGenerate(\App\Poultry::getYesNoDontKnow(), 'pp_2_6_a',0,$question->pp_2_6_a, true) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-4 control-label">PP.2.6.b {{ @App\Poultry::questionText()['pp_2_6_b']}}</label>
                            <div class="col-xs-4">
                                @if(isset($question->pp_2_6_b)&&$question->pp_2_6_b!=null)
                                    @for($q=0;$q<3;$q++)
                                        {!! Form::select('pp_2_6_b',[''=>'---Select an option---']+\App\Poultry::getCumulativeAge(),Input::old('pp_2_6_b',isset(json_decode($question->pp_2_6_b)[$q])?json_decode($question->pp_2_6_b)[$q]:''), array('id' => 'pp_2_6_b', 'class' => 'form-control pp_2_6_b')) !!}
                                    @endfor
                                @else
                                    {!! Form::select('pp_2_6_b',[''=>'---Select an option---']+\App\Poultry::getCumulativeAge(),Input::old('pp_2_6_b'), array('id' => 'pp_2_6_b', 'class' => 'form-control pp_2_6_b')) !!}
                                    {!! Form::select('pp_2_6_b',[''=>'---Select an option---']+\App\Poultry::getCumulativeAge(),Input::old('pp_2_6_b'), array('id' => 'pp_2_6_b', 'class' => 'form-control pp_2_6_b')) !!}
                                    {!! Form::select('pp_2_6_b',[''=>'---Select an option---']+\App\Poultry::getCumulativeAge(),Input::old('pp_2_6_b'), array('id' => 'pp_2_6_b', 'class' => 'form-control pp_2_6_b')) !!}
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-xs-4 control-label">PP.2.7.a {{ @App\Poultry::questionText()['pp_2_7_a']}}</label>
                            <div class="col-xs-4">
                                {!! Form::number('pp_2_7_a_value', Input::old('pp_2_7_a_value',isset($question->pp_2_7_a_value)?$question->pp_2_7_a_value:''),array('id'=>'pp_2_7_a_value','class' => 'form-control','placeholder'=>'Kilometers','step'=>'0.1','min'=>0)) !!}
                                {!! @App\Common::checkBoxGenerate(\App\Poultry::getDontKnow(),'pp_2_7_a_flag',0, array($question->pp_2_7_a_flag)); !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-4 control-label">PP.2.7.b {{ @App\Poultry::questionText()['pp_2_7_b']}}</label>
                            <div class="col-xs-4">
                                {!! @App\Common::radioButtonGenerate(\App\Poultry::getYesNoDontKnow(), 'pp_2_7_b',0,$question->pp_2_7_b, true) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-4 control-label">PP.2.7.c। {{ @App\Poultry::questionText()['pp_2_7_c']}}</label>
                            <div class="col-xs-4">
                                <div class="the-basics-market">
                                    {!! Form::text('pp_2_7_c_value', Input::old('pp_2_7_c_value',isset($question->pp_2_7_c_value)?$question->pp_2_7_c_value:''),array('id'=>'pp_2_7_c_value','class' => 'typeahead form-control','placeholder'=>'Market name')) !!}
                                </div>
                                {!! @App\Common::checkBoxGenerate(\App\Poultry::getOtherDontKnow(),'pp_2_7_c_flag',0, array($question->pp_2_7_c_flag)); !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-4 control-label">PP.2.8.a {{ @App\Poultry::questionText()['pp_2_8_a']}}</label>
                            <div class="col-xs-4">
                                {!! @App\Common::radioButtonGenerate(\App\Poultry::getYesNoDontKnow(), 'pp_2_8_a',0,$question->pp_2_8_a, true) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-4 control-label">PP.2.8.b। {{ @App\Poultry::questionText()['pp_2_8_b']}}</label>
                            <div class="col-xs-4">
                                <div class="the-basics-market">
                                    {!! Form::text('pp_2_8_b_value', Input::old('pp_2_8_b_value',isset($question->pp_2_8_b_value)?$question->pp_2_8_b_value:''),array('id'=>'pp_2_8_b_value','class' => 'typeahead form-control','placeholder'=>'Market name')) !!}
                                </div>
                                {!! @App\Common::checkBoxGenerate(\App\Poultry::getOtherDontKnow(),'pp_2_8_b_flag',0, array($question->pp_2_8_b_flag)); !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-xs-4 control-label">PP.2.9। {{ @App\Poultry::questionText()['pp_2_9']}}</label>
                            <div class="col-xs-4">
                                <div class="the-basics-thana">
                                    {!! Form::text('pp_2_9_value', Input::old('pp_2_9_value',isset($question->pp_2_9_value)?$question->pp_2_9_value:''),array('id'=>'pp_2_9_value','class' => 'typeahead form-control','placeholder'=>'thana name')) !!}
                                </div>
                                {!! @App\Common::checkBoxGenerate(\App\Poultry::getOtherDontKnow(),'pp_2_9_flag',0, array($question->pp_2_9_flag)); !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-4 control-label">PP.2.10 {{ @App\Poultry::questionText()['pp_2_10']}}</label>
                            <div class="col-xs-4">
                                {!! Form::text('pp_2_10_value', Input::old('pp_2_10_value',isset($question->pp_2_10_value)?$question->pp_2_10_value:''),array('id'=>'pp_2_10_value','class' => 'form-control','placeholder'=>'Kilometers')) !!}
                                {!! @App\Common::checkBoxGenerate(\App\Poultry::getDontKnow(),'pp_2_10_flag',0, array($question->pp_2_10_flag)); !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-xs-4 control-label">PP.2.11.a {{ @App\Poultry::questionText()['pp_2_11_a']}}</label>
                            <div class="col-xs-4">
                                {!! Form::select('pp_2_11_a',[''=>'---Select an option---']+\App\Poultry::getPurchasePoultry(),Input::old('pp_2_11_a',isset($question->pp_2_11_a)?$question->pp_2_11_a:''), array('id' => 'pp_2_11_a', 'class' => 'form-control')) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-4 control-label">PP.2.11.b {{ @App\Poultry::questionText()['pp_2_11_b']}}</label>
                            <div class="col-xs-4">
                                {!! Form::select('pp_2_11_b',[''=>'---Select an option---']+\App\Poultry::getPurchasePoultry(),Input::old('pp_2_11_b',isset($question->pp_2_11_b)?$question->pp_2_11_b:''), array('id' => 'pp_2_11_b', 'class' => 'form-control')) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-4 control-label">PP.2.11.c {{ @App\Poultry::questionText()['pp_2_11_c']}}</label>
                            <div class="col-xs-4">
                                {!! Form::select('pp_2_11_c',[''=>'---Select an option---']+\App\Poultry::getPurchasePoultry(),Input::old('pp_2_11_c',isset($question->pp_2_11_c)?$question->pp_2_11_c:''), array('id' => 'pp_2_11_c', 'class' => 'form-control')) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-4 control-label">PP.2.11.d {{ @App\Poultry::questionText()['pp_2_11_d']}}</label>
                            <div class="col-xs-4">
                                {!! Form::select('pp_2_11_d',[''=>'---Select an option---']+\App\Poultry::getPurchasePoultry(),Input::old('pp_2_11_d',isset($question->pp_2_11_d)?$question->pp_2_11_d:''), array('id' => 'pp_2_11_d', 'class' => 'form-control')) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-4 control-label">PP.2.12.a {{ @App\Poultry::questionText()['pp_2_12_a']}}</label>
                            <div class="col-xs-4">
                                {!! @App\Common::radioButtonGenerate(\App\Poultry::getYesNoDontKnow(), 'pp_2_12_a',0,$question->pp_2_12_a, true) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-4 control-label">PP.2.12.b {{ @App\Poultry::questionText()['pp_2_12_b']}}</label>
                            <div class="col-xs-4">
                                {!! Form::select('pp_2_12_b',[''=>'---Select an option---']+\App\Poultry::getHowOftenDoThat(),Input::old('pp_2_12_b',isset($question->pp_2_12_b)?$question->pp_2_12_b:''), array('id' => 'pp_2_12_b', 'class' => 'form-control')) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-xs-4 control-label">PP.2.13.a {{ @App\Poultry::questionText()['pp_2_13_a']}}</label>
                            <div class="col-xs-4">
                                {!! @App\Common::radioButtonGenerate(\App\Poultry::getYesNoDontKnow(), 'pp_2_13_a',0,$question->pp_2_13_a, true) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-xs-4 control-label">PP.2.13.b {{ @App\Poultry::questionText()['pp_2_13_b']}}</label>
                            <div class="col-xs-4">
                                {!! Form::select('pp_2_13_b',[''=>'---Select an option---']+\App\Poultry::getHowOftenDoThat(),Input::old('pp_2_13_b',isset($question->pp_2_13_b)?$question->pp_2_13_b:''), array('id' => 'pp_2_13_b', 'class' => 'form-control')) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-xs-4 control-label">PP.2.14.a {{ @App\Poultry::questionText()['pp_2_14_a']}}</label>
                            <div class="col-xs-4">
                                {!! Form::select('pp_2_14_a_flag',[''=>'---Select an option---']+\App\Poultry::getSlaughterPlace(),Input::old('pp_2_14_a_flag',isset($question->pp_2_14_a_flag)?$question->pp_2_14_a_flag:''), array('id' => 'pp_2_14_a_flag', 'class' => 'form-control')) !!}
                                {!! Form::text('pp_2_14_a_value', Input::old('pp_2_14_a_value',isset($question->pp_2_14_a_value)?$question->pp_2_14_a_value:''),array('id'=>'pp_2_14_a_value','class' => 'form-control','placeholder'=>'Write Specific one')) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-xs-4 control-label">PP.2.14.b {{ @App\Poultry::questionText()['pp_2_14_b']}}</label>
                            <div class="col-xs-4">
                                {!! Form::select('pp_2_14_b_flag',[''=>'---Select an option---']+\App\Poultry::getSlaughterAreaInMarket(),Input::old('pp_2_14_b_flag',isset($question->pp_2_14_b_flag)?$question->pp_2_14_b_flag:''), array('id' => 'pp_2_14_b_flag', 'class' => 'form-control')) !!}
                                {!! Form::text('pp_2_14_b_value', Input::old('pp_2_14_b_value',isset($question->pp_2_14_b_value)?$question->pp_2_14_b_value:''),array('id'=>'pp_2_14_b_value','class' => 'form-control','placeholder'=>'Write Specific one')) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-xs-4 control-label">PP.2.15.a {{ @App\Poultry::questionText()['pp_2_15_a']}}</label>
                            <div class="col-xs-4">
                                {!! @App\Common::radioButtonGenerate(\App\Poultry::getYesNoDontKnow(), 'pp_2_15_a',0,$question->pp_2_15_a, true) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-4 control-label">PP.2.15.b {{ @App\Poultry::questionText()['pp_2_15_b']}}</label>
                            <div class="col-xs-4">
                                @if(isset($question->pp_2_15_b) && $question->pp_2_15_b!=null)
                                    @for($q=0;$q<3;$q++)
                                        {!! Form::select('pp_2_15_b',[''=>'---Select an option---']+\App\Poultry::getCumulativeAge(),Input::old('pp_2_15_b',isset(json_decode($question->pp_2_15_b)[$q])?json_decode($question->pp_2_15_b)[$q]:''), array('id' => 'pp_2_15_b', 'class' => 'form-control pp_2_15_b')) !!}
                                    @endfor
                                @else
                                    {!! Form::select('pp_2_15_b',[''=>'---Select an option---']+\App\Poultry::getCumulativeAge(),Input::old('pp_2_15_b'), array('id' => 'pp_2_15_b', 'class' => 'form-control pp_2_15_b')) !!}
                                    {!! Form::select('pp_2_15_b',[''=>'---Select an option---']+\App\Poultry::getCumulativeAge(),Input::old('pp_2_15_b'), array('id' => 'pp_2_15_b', 'class' => 'form-control pp_2_15_b')) !!}
                                    {!! Form::select('pp_2_15_b',[''=>'---Select an option---']+\App\Poultry::getCumulativeAge(),Input::old('pp_2_15_b'), array('id' => 'pp_2_15_b', 'class' => 'form-control pp_2_15_b')) !!}
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-4 control-label">PP.2.15.c {{ @App\Poultry::questionText()['pp_2_15_c']}}</label>
                            <div class="col-xs-4">
                                @if(isset($question->pp_2_15_c_flag) && $question->pp_2_15_c_flag !=null)
                                    @for($q=0;$q<3;$q++)
                                        {!! Form::select('pp_2_15_c_flag',[''=>'---Select an option---']+\App\Poultry::getVistingTime(),Input::old('pp_2_15_c_flag',isset(json_decode($question->pp_2_15_c_flag)[$q])?json_decode($question->pp_2_15_c_flag)[$q]:''), array('id' => 'pp_2_15_c_flag', 'class' => 'form-control pp_2_15_c_flag')) !!}
                                        {!! Form::text('pp_2_15_c_value', Input::old('pp_2_15_c_value',isset(json_decode($question->pp_2_15_c_value)[$q])?json_decode($question->pp_2_15_c_value)[$q]:''),array('id'=>'pp_2_15_c_value','class' => 'form-control pp_2_15_c_value','placeholder'=>'')) !!}
                                    @endfor
                                @else
                                    {!! Form::select('pp_2_15_c_flag',[''=>'---Select an option---']+\App\Poultry::getVistingTime(),Input::old('pp_2_15_c_flag'), array('id' => 'pp_2_15_c_flag', 'class' => 'form-control pp_2_15_c_flag')) !!}
                                    {!! Form::text('pp_2_15_c_value', Input::old('pp_2_15_c_value'),array('id'=>'pp_2_15_c_value','class' => 'form-control pp_2_15_c_value','placeholder'=>'Write Specific one')) !!}
                                    {!! Form::select('pp_2_15_c_flag',[''=>'---Select an option---']+\App\Poultry::getVistingTime(),Input::old('pp_2_15_c_flag'), array('id' => 'pp_2_15_c_flag', 'class' => 'form-control pp_2_15_c_flag')) !!}
                                    {!! Form::text('pp_2_15_c_value',  Input::old('pp_2_15_c_value'),array('id'=>'pp_2_15_c_value','class' => 'form-control pp_2_15_c_value','placeholder'=>'Write Specific one')) !!}
                                    {!! Form::select('pp_2_15_c_flag',[''=>'---Select an option---']+\App\Poultry::getVistingTime(),Input::old('pp_2_15_c_flag'), array('id' => 'pp_2_15_c_flag', 'class' => 'form-control pp_2_15_c_flag')) !!}
                                    {!! Form::text('pp_2_15_c_value',  Input::old('pp_2_15_c_value'),array('id'=>'pp_2_15_c_value','class' => 'form-control pp_2_15_c_value','placeholder'=>'Write Specific one')) !!}
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-4 control-label">PP.2.16.a {{ @App\Poultry::questionText()['pp_2_16_a']}}</label>
                            <div class="col-xs-4">
                                {!! Form::select('pp_2_16_a_flag',[''=>'---Select an option---']+\App\Poultry::getAcquiredPoultry(),Input::old('pp_2_16_a_flag',isset($question->pp_2_16_a_flag)?$question->pp_2_16_a_flag:''), array('id' => 'pp_2_16_a_flag', 'class' => 'form-control')) !!}
                                {!! Form::text('pp_2_16_a_value', Input::old('pp_2_16_a_value',isset($question->pp_2_16_a_value)?$question->pp_2_16_a_value:''),array('id'=>'pp_2_16_a_value','class' => 'form-control','placeholder'=>'Write Specific one')) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-4 control-label">PP.2.16.b {{ @App\Poultry::questionText()['pp_2_16_b']}}</label>
                            <div class="col-xs-4">
                                {!! Form::select('pp_2_16_b_flag',[''=>'---Select an option---']+\App\Poultry::getVistingTime(),Input::old('pp_2_16_b_flag',isset($question->pp_2_16_b_flag)?$question->pp_2_16_b_flag:''), array('id' => 'pp_2_16_b_flag', 'class' => 'form-control')) !!}
                                {!! Form::text('pp_2_16_b_value', Input::old('pp_2_16_b_value',isset($question->pp_2_16_b_value)?$question->pp_2_16_b_value:''),array('id'=>'pp_2_16_b_value','class' => 'form-control','placeholder'=>'Write Specific one')) !!}
                            </div>
                        </div>
                    </div>
                    <div class="wizard-pane" role="tabpanel">
                        <p><br><strong> {{ @App\Poultry::questionText()['0.0.3.i']}}</strong></p>
                        <div class="form-group">
                            <label class="col-xs-4 control-label">PFP.3.1.a {{ @App\Poultry::questionText()['pfp_3_1_a']}}</label>
                            <div class="col-xs-4">
                                {!! @App\Common::radioButtonGenerate(\App\Poultry::getYesNoDontKnow(), 'pfp_3_1_a',0,$question->pfp_3_1_a, true) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-4 control-label">PFP.3.1.b {{ @App\Poultry::questionText()['pfp_3_1_b']}}</label>
                            <div class="col-xs-4">
                                {!! @App\Common::radioButtonGenerate(\App\Poultry::getYesNoDontKnow(), 'pfp_3_1_b',0,$question->pfp_3_1_b, true) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-4 control-label">PFP.3.1.c {{ @App\Poultry::questionText()['pfp_3_1_c']}}</label>
                            <div class="col-xs-4">
                                @if(isset($question->pfp_3_1_c)&&$question->pfp_3_1_c!=null)
                                    @for($q=0;$q<3;$q++)
                                        {!! Form::select('pfp_3_1_c',[''=>'---Select an option---']+\App\Poultry::getCumulativeAge(),Input::old('pfp_3_1_c',isset(json_decode($question->pfp_3_1_c)[$q])?json_decode($question->pfp_3_1_c)[$q]:''), array('id' => 'pfp_3_1_c', 'class' => 'form-control pfp_3_1_c')) !!}
                                    @endfor
                                @else
                                    {!! Form::select('pfp_3_1_c',[''=>'---Select an option---']+\App\Poultry::getCumulativeAge(),Input::old('pfp_3_1_c'), array('id' => 'pfp_3_1_c', 'class' => 'form-control pfp_3_1_c')) !!}
                                    {!! Form::select('pfp_3_1_c',[''=>'---Select an option---']+\App\Poultry::getCumulativeAge(),Input::old('pfp_3_1_c'), array('id' => 'pfp_3_1_c', 'class' => 'form-control pfp_3_1_c')) !!}
                                    {!! Form::select('pfp_3_1_c',[''=>'---Select an option---']+\App\Poultry::getCumulativeAge(),Input::old('pfp_3_1_c'), array('id' => 'pfp_3_1_c', 'class' => 'form-control pfp_3_1_c')) !!}
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-xs-4 control-label">PFP.3.1.d {{ @App\Poultry::questionText()['pfp_3_1_d']}}</label>
                            <div class="col-xs-4">
                                {!! @App\Common::radioButtonGenerate(\App\Poultry::getYesNoDontKnow(), 'pfp_3_1_d',0,$question->pfp_3_1_d, true) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-4 control-label">PFP.3.2.a {{ @App\Poultry::questionText()['pfp_3_2_a']}}</label>
                            <div class="col-xs-4">
                                {!! @App\Common::radioButtonGenerate(\App\Poultry::getYesNoDontKnow(), 'pfp_3_2_a',0,$question->pfp_3_2_a, true) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-4 control-label">PFP.3.2.b {{ @App\Poultry::questionText()['pfp_3_2_b']}}</label>
                            <div class="col-xs-4">
                                {!! Form::select('pfp_3_2_b_flag',[''=>'---Select an option---']+\App\Poultry::getDefeatheringPoultry(),Input::old('pfp_3_2_b_flag',isset($question->pfp_3_2_b_flag)?$question->pfp_3_2_b_flag:''), array('id' => 'pfp_3_2_b_flag', 'class' => 'form-control')) !!}
                                {!! Form::text('pfp_3_2_b_value', Input::old('pfp_3_2_b_value',isset($question->pfp_3_2_b_value)?$question->pfp_3_2_b_value:''),array('id'=>'pfp_3_2_b_value','class' => 'form-control','placeholder'=>'Write Specific one')) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-4 control-label">PFP.3.2.c {{ @App\Poultry::questionText()['pfp_3_2_c']}}</label>
                            <div class="col-xs-4">
                                {!! @App\Common::radioButtonGenerate(\App\Poultry::getYesNoDontKnow(), 'pfp_3_2_c',0,$question->pfp_3_2_c, true) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-4 control-label">PFP.3.2.d {{ @App\Poultry::questionText()['pfp_3_2_d']}}</label>
                            <div class="col-xs-4">
                                @if(isset($question->pfp_3_2_d) && $question->pfp_3_2_d!=null)
                                    @for($q=0;$q<3;$q++)
                                        {!! Form::select('pfp_3_2_d',[''=>'---Select an option---']+\App\Poultry::getCumulativeAge(),Input::old('pfp_3_2_d',isset(json_decode($question->pfp_3_2_d)[$q])?json_decode($question->pfp_3_2_d)[$q]:''), array('id' => 'pfp_3_2_d', 'class' => 'form-control pfp_3_2_d')) !!}
                                    @endfor
                                @else
                                    {!! Form::select('pfp_3_2_d',[''=>'---Select an option---']+\App\Poultry::getCumulativeAge(),Input::old('pfp_3_2_d'), array('id' => 'pfp_3_2_d', 'class' => 'form-control pfp_3_2_d')) !!}
                                    {!! Form::select('pfp_3_2_d',[''=>'---Select an option---']+\App\Poultry::getCumulativeAge(),Input::old('pfp_3_2_d'), array('id' => 'pfp_3_2_d', 'class' => 'form-control pfp_3_2_d')) !!}
                                    {!! Form::select('pfp_3_2_d',[''=>'---Select an option---']+\App\Poultry::getCumulativeAge(),Input::old('pfp_3_2_d'), array('id' => 'pfp_3_2_d', 'class' => 'form-control pfp_3_2_d')) !!}
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-4 control-label">PFP.3.2.e {{ @App\Poultry::questionText()['pfp_3_2_e']}}</label>
                            <div class="col-xs-4">
                                {!! @App\Common::radioButtonGenerate(\App\Poultry::getYesNoDontKnow(), 'pfp_3_2_e',0,$question->pfp_3_2_e, true) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-4 control-label">PFP.3.2.f {{ @App\Poultry::questionText()['pfp_3_2_f']}}</label>
                            <div class="col-xs-4">
                                {!! Form::select('pfp_3_2_f_flag',[''=>'---Select an option---']+\App\Poultry::getDefeatheringPoultryAtStall(),Input::old('pfp_3_2_f_flag',isset($question->pfp_3_2_f_flag)?$question->pfp_3_2_f_flag:''), array('id' => 'pfp_3_2_f_flag', 'class' => 'form-control')) !!}
                                {!! Form::text('pfp_3_2_f_value', Input::old('pfp_3_2_f_value',isset($question->pfp_3_2_f_value)?$question->pfp_3_2_f_value:''),array('id'=>'pfp_3_2_f_value','class' => 'form-control','placeholder'=>'Write Specific one')) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-4 control-label">PFP.3.3.a {{ @App\Poultry::questionText()['pfp_3_3_a']}}</label>
                            <div class="col-xs-4">
                                {!! @App\Common::radioButtonGenerate(\App\Poultry::getYesNoDontKnow(), 'pfp_3_3_a',0,$question->pfp_3_3_a, true) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-4 control-label">PFP.3.3.b {{ @App\Poultry::questionText()['pfp_3_3_b']}}</label>
                            <div class="col-xs-4">
                                {!! @App\Common::radioButtonGenerate(\App\Poultry::getYesNoDontKnow(), 'pfp_3_3_b',0,$question->pfp_3_3_b, true) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-4 control-label">PFP.3.3.c {{ @App\Poultry::questionText()['pfp_3_3_c']}}</label>
                            <div class="col-xs-4">
                                @if(isset($question->pfp_3_3_c) && $question->pfp_3_3_c!=null)
                                    @for($q=0;$q<3;$q++)
                                        {!! Form::select('pfp_3_3_c',[''=>'---Select an option---']+\App\Poultry::getCumulativeAge(),Input::old('pfp_3_3_c',isset(json_decode($question->pfp_3_3_c)[$q])?json_decode($question->pfp_3_3_c)[$q]:''), array('id' => 'pfp_3_3_c', 'class' => 'form-control pfp_3_3_c')) !!}
                                    @endfor
                                @else
                                    {!! Form::select('pfp_3_3_c',[''=>'---Select an option---']+\App\Poultry::getCumulativeAge(),Input::old('pfp_3_3_c'), array('id' => 'pfp_3_3_c', 'class' => 'form-control pfp_3_3_c')) !!}
                                    {!! Form::select('pfp_3_3_c',[''=>'---Select an option---']+\App\Poultry::getCumulativeAge(),Input::old('pfp_3_3_c'), array('id' => 'pfp_3_3_c', 'class' => 'form-control pfp_3_3_c')) !!}
                                    {!! Form::select('pfp_3_3_c',[''=>'---Select an option---']+\App\Poultry::getCumulativeAge(),Input::old('pfp_3_3_c'), array('id' => 'pfp_3_3_c', 'class' => 'form-control pfp_3_3_c')) !!}
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-4 control-label">PFP.3.3.d {{ @App\Poultry::questionText()['pfp_3_3_d']}}</label>
                            <div class="col-xs-4">
                                {!! @App\Common::radioButtonGenerate(\App\Poultry::getYesNoDontKnow(), 'pfp_3_3_d',0,$question->pfp_3_3_d, true) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-4 control-label">PFP.3.4.a {{ @App\Poultry::questionText()['pfp_3_4_a']}}</label>
                            <div class="col-xs-4">
                                {!! @App\Common::radioButtonGenerate(\App\Poultry::getYesNoDontKnow(), 'pfp_3_4_a',0,$question->pfp_3_4_a, true) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-4 control-label">PFP.3.4.b {{ @App\Poultry::questionText()['pfp_3_4_b']}}</label>
                            <div class="col-xs-4">
                                {!! @App\Common::radioButtonGenerate(\App\Poultry::getYesNoDontKnow(), 'pfp_3_4_b',0,$question->pfp_3_4_b, true) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-xs-4 control-label">PFP.3.4.c {{ @App\Poultry::questionText()['pfp_3_4_c']}}</label>
                            <div class="col-xs-4">
                                @if(isset($question->pfp_3_4_c) && $question->pfp_3_4_c!=null)
                                    @for($q=0;$q<3;$q++)
                                        {!! Form::select('pfp_3_4_c',[''=>'---Select an option---']+\App\Poultry::getCumulativeAge(),Input::old('pfp_3_4_c',isset(json_decode($question->pfp_3_4_c)[$q])?json_decode($question->pfp_3_4_c)[$q]:''), array('id' => 'pfp_3_4_c', 'class' => 'form-control pfp_3_4_c')) !!}
                                    @endfor
                                @else
                                    {!! Form::select('pfp_3_4_c',[''=>'---Select an option---']+\App\Poultry::getCumulativeAge(),Input::old('pfp_3_4_c'), array('id' => 'pfp_3_4_c', 'class' => 'form-control pfp_3_4_c')) !!}
                                    {!! Form::select('pfp_3_4_c',[''=>'---Select an option---']+\App\Poultry::getCumulativeAge(),Input::old('pfp_3_4_c'), array('id' => 'pfp_3_4_c', 'class' => 'form-control pfp_3_4_c')) !!}
                                    {!! Form::select('pfp_3_4_c',[''=>'---Select an option---']+\App\Poultry::getCumulativeAge(),Input::old('pfp_3_4_c'), array('id' => 'pfp_3_4_c', 'class' => 'form-control pfp_3_4_c')) !!}
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="wizard-pane" role="tabpanel">
                        <p><br><strong> {{ @App\Poultry::questionText()['0.0.4.i']}}</strong></p>

                        <div class="form-group">
                            <label class="col-xs-4 control-label">PM.4.1.a {{ @App\Poultry::questionText()['pm_4_1_a']}}</label>
                            <div class="col-xs-4">
                                {!! @App\Common::radioButtonGenerate(\App\Poultry::getYesNoDontKnow(), 'pm_4_1_a',0,$question->pm_4_1_a, true) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-4 control-label">PM.4.1.b {{ @App\Poultry::questionText()['pm_4_1_b']}}</label>
                            <div class="col-xs-4">
                                {!! Form::select('pm_4_1_b',[''=>'---Select an option---']+\App\Poultry::getHowOftenDoThat(),Input::old('pm_4_1_b',isset($question->pm_4_1_b)?$question->pm_4_1_b:''), array('id' => 'pm_4_1_b', 'class' => 'form-control')) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-xs-4 control-label">PM.4.2.a {{ @App\Poultry::questionText()['pm_4_2_a']}}</label>
                            <div class="col-xs-4">
                                {!! @App\Common::radioButtonGenerate(\App\Poultry::getYesNoDontKnow(), 'pm_4_2_a',0,$question->pm_4_2_a, true) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-4 control-label">PM.4.2.b {{ @App\Poultry::questionText()['pm_4_2_b']}}</label>
                            <div class="col-xs-4">
                                {!! Form::select('pm_4_2_b',[''=>'---Select an option---']+\App\Poultry::getHowOftenDoThat(),Input::old('pm_4_2_b',isset($question->pm_4_2_b)?$question->pm_4_2_b:''), array('id' => 'pm_4_2_b', 'class' => 'form-control')) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-4 control-label">PM.4.2.c {{ @App\Poultry::questionText()['pm_4_2_c']}}</label>
                            <div class="col-xs-4">
                                {!! @App\Common::radioButtonGenerate(\App\Poultry::getYesNoDontKnow(), 'pm_4_2_c',0,$question->pm_4_2_c, true) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-4 control-label">PM.4.2.d {{ @App\Poultry::questionText()['pm_4_2_d']}}</label>
                            <div class="col-xs-4">
                                {!! Form::select('pm_4_2_d',[''=>'---Select an option---']+\App\Poultry::getHowOftenDoThat(),Input::old('pm_4_2_d',isset($question->pm_4_2_d)?$question->pm_4_2_d:''), array('id' => 'pm_4_2_d', 'class' => 'form-control')) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-4 control-label">PM.4.3.a {{ @App\Poultry::questionText()['pm_4_3_a']}}</label>
                            <div class="col-xs-4">
                                {!! @App\Common::radioButtonGenerate(\App\Poultry::getYesNoDontKnow(), 'pm_4_3_a',0,$question->pm_4_3_a, true) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-4 control-label">PM.4.3.b {{ @App\Poultry::questionText()['pm_4_3_b']}}</label>
                            <div class="col-xs-4">
                                {!! Form::select('pm_4_3_b',[''=>'---Select an option---']+\App\Poultry::getHowOftenDoThat(),Input::old('pm_4_3_b',isset($question->pm_4_3_b)?$question->pm_4_3_b:''), array('id' => 'pm_4_3_b', 'class' => 'form-control')) !!}
                            </div>
                        </div>
                        @for($i=4;$i<8;$i++)
                            <p>{{ @App\Poultry::questionText()['pm_4_'.$i]}}</p>
                            @for($alphabet = 'a'; $alphabet <='j';  )
                                <?php $key1= 'pm_4_'.$i.'_'.$alphabet;?>
                                <div class="form-group">
                                    <label class="col-xs-4 control-label">PM.4.{{$i}}.{{$alphabet++}} {{ @App\Poultry::questionText()[$key1]}}</label>
                                    <div class="col-xs-4">
                                        {!! @App\Common::radioButtonGenerate(\App\Poultry::getYesNoDontKnow(), $key1,0,$question->$key1, true) !!}
                                    </div>
                                </div>
                                <?php $key2= 'pm_4_'.$i.'_'.$alphabet;?>
                                <div class="form-group">
                                    <label class="col-xs-4 control-label">PM.4.{{$i}}.{{$alphabet++}} {{ @App\Poultry::questionText()[$key2]}}</label>
                                    <div class="col-xs-4">
                                        {!! Form::select($key2,[''=>'---Select an option---']+\App\Poultry::getHowOftenDoThat(),Input::old($key2,isset($question->$key2)?$question->$key2:''), array('id' => $key2, 'class' => 'form-control')) !!}
                                    </div>
                                </div>
                            @endfor
                        @endfor
                    </div>
                    <div class="wizard-pane" role="tabpanel">
                        <p><br><strong> {{ @App\Poultry::questionText()['0.0.5.i']}}</strong></p>
                        <div class="form-group">
                            <label class="col-xs-4 control-label">I.5.1.a {{ @App\Poultry::questionText()['i_5_1_a']}}</label>
                            <div class="col-xs-4">
                                {!! @App\Common::radioButtonGenerate(\App\Poultry::getYesNoDontKnow(), 'i_5_1_a',0,$question->i_5_1_a, true) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-4 control-label">I.5.1.b {{ @App\Poultry::questionText()['i_5_1_b']}}</label>
                            <div class="col-xs-4">
                                {!! @App\Common::radioButtonGenerate(\App\Poultry::getFeverMeasure(), 'i_5_1_b',0,$question->i_5_1_b, true) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-4 control-label">I.5.1.c {{ @App\Poultry::questionText()['i_5_1_c']}}</label>
                            <div class="col-xs-4">
                                {!! @App\Common::radioButtonGenerate(\App\Poultry::getYesNoDontKnow(), 'i_5_1_c',0,$question->i_5_1_c, true) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-4 control-label">I.5.1.d {{ @App\Poultry::questionText()['i_5_1_d']}}</label>
                            <div class="col-xs-4">
                                {!! @App\Common::radioButtonGenerate(\App\Poultry::getYesNoDontKnow(), 'i_5_1_d',0,$question->i_5_1_d, true) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-4 control-label">I.5.2.a। {{ @App\Poultry::questionText()['i_5_2_a']}}</label>
                            <div class="col-xs-4">
                                {!! Form::number('i_5_2_a_value', Input::old('i_5_2_a_value',isset($question->i_5_2_a_value)?$question->i_5_2_a_value:''),array('id'=>'i_5_2_a_value','class' => 'form-control','placeholder'=>'Days Ago','min'=>0, 'max'=>'10')) !!}
                                {!! @App\Common::checkBoxGenerate(\App\Poultry::getDontKnow(),'i_5_2_a_flag',0, array($question->i_5_2_a_flag)); !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-4 control-label">I.5.3.a {{ @App\Poultry::questionText()['i_5_3_a']}}</label>
                            <div class="col-xs-4">
                                {!! @App\Common::radioButtonGenerate(\App\Poultry::getYesNoDontKnow(), 'i_5_3_a',0,$question->i_5_3_a, true) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-4 control-label">I.5.3.b {{ @App\Poultry::questionText()['i_5_3_b']}}</label>
                            <div class="col-xs-4">
                                {!! @App\Common::radioButtonGenerate(\App\Poultry::getYesNoDontKnow(), 'i_5_3_b',0,$question->i_5_3_b, true) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-4 control-label">I.5.3.c {{ @App\Poultry::questionText()['i_5_3_c']}}</label>
                            <div class="col-xs-4">
                                {!! Form::select('i_5_3_c_flag',[''=>'---Select an option---']+\App\Poultry::getMedicalCareType(),Input::old('i_5_3_c_flag',isset($question->i_5_3_c_flag)?$question->i_5_3_c_flag:''), array('id' => 'i_5_3_c_flag', 'class' => 'form-control')) !!}
                                {!! Form::text('i_5_3_c_value', Input::old('i_5_3_c_value',isset($question->i_5_3_c_value)?$question->i_5_3_c_value:''),array('id'=>'i_5_3_c_value','class' => 'form-control','placeholder'=>'Write Specific one')) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-4 control-label">I.5.4.a {{ @App\Poultry::questionText()['i_5_4_a']}}</label>
                            <div class="col-xs-4">
                                {!! @App\Common::radioButtonGenerate(\App\Poultry::getYesNoDontKnow(), 'i_5_4_a_flag',0,$question->i_5_4_a_flag, true) !!}
                                {!! Form::number('i_5_4_a_value', Input::old('i_5_4_a_value',isset($question->i_5_4_a_value)?$question->i_5_4_a_value:''),array('id'=>'i_5_4_a_value','class' => 'form-control i_5_4_a_value','placeholder'=>'কত জন?', 'min'=>'1')) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-4 control-label">I.5.4.b {{ @App\Poultry::questionText()['i_5_4_b']}}</label>
                            <div class="col-xs-4">
                                @if(isset($question->i_5_4_b)&&$question->i_5_4_b!=null)
                                    @for($q=0;$q<3;$q++)
                                        {!! Form::select('i_5_4_b',[''=>'---Select an option---']+\App\Poultry::getFeverMeasure(),Input::old('i_5_4_b',isset(json_decode($question->i_5_4_b)[$q])?json_decode($question->i_5_4_b)[$q]:''), array('id' => 'i_5_4_b', 'class' => 'form-control i_5_4_b')) !!}
                                    @endfor
                                @else
                                    {!! Form::select('i_5_4_b',[''=>'---Select an option---']+\App\Poultry::getFeverMeasure(),'', array('id' => 'i_5_4_b', 'class' => 'form-control i_5_4_b')) !!}
                                    {!! Form::select('i_5_4_b',[''=>'---Select an option---']+\App\Poultry::getFeverMeasure(),'', array('id' => 'i_5_4_b', 'class' => 'form-control i_5_4_b')) !!}
                                    {!! Form::select('i_5_4_b',[''=>'---Select an option---']+\App\Poultry::getFeverMeasure(),'', array('id' => 'i_5_4_b', 'class' => 'form-control i_5_4_b')) !!}
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-4 control-label">I.5.4.c {{ @App\Poultry::questionText()['i_5_4_c']}}</label>
                            <div class="col-xs-4">
                                @if(isset($question->i_5_4_c)&&$question->i_5_4_c!=null)
                                    @for($q=0;$q<3;$q++)
                                        {!! Form::select('i_5_4_c',[''=>'---Select an option---']+\App\Poultry::getYesNoDontKnow(),Input::old('i_5_4_c',isset(json_decode($question->i_5_4_c)[$q])?json_decode($question->i_5_4_c)[$q]:''), array('id' => 'i_5_4_c', 'class' => 'form-control i_5_4_c')) !!}
                                    @endfor
                                @else
                                    {!! Form::select('i_5_4_c',[''=>'---Select an option---']+\App\Poultry::getYesNoDontKnow(),'', array('id' => 'i_5_4_c', 'class' => 'form-control i_5_4_c')) !!}
                                    {!! Form::select('i_5_4_c',[''=>'---Select an option---']+\App\Poultry::getYesNoDontKnow(),'', array('id' => 'i_5_4_c', 'class' => 'form-control i_5_4_c')) !!}
                                    {!! Form::select('i_5_4_c',[''=>'---Select an option---']+\App\Poultry::getYesNoDontKnow(),'', array('id' => 'i_5_4_c', 'class' => 'form-control i_5_4_c')) !!}
                                @endif

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-4 control-label">I.5.4.d {{ @App\Poultry::questionText()['i_5_4_d']}}</label>
                            <div class="col-xs-4">
                                @if(isset($question->i_5_4_d)&&$question->i_5_4_d!=null)
                                    @for($q=0;$q<3;$q++)
                                        {!! Form::select('i_5_4_d',[''=>'---Select an option---']+\App\Poultry::getYesNoDontKnow(),Input::old('i_5_4_d',isset(json_decode($question->i_5_4_d)[$q])?json_decode($question->i_5_4_d)[$q]:''), array('id' => 'i_5_4_d', 'class' => 'form-control i_5_4_d')) !!}
                                    @endfor
                                @else
                                    {!! Form::select('i_5_4_d',[''=>'---Select an option---']+\App\Poultry::getYesNoDontKnow(),Input::old('i_5_4_d'), array('id' => 'i_5_4_d', 'class' => 'form-control i_5_4_d')) !!}
                                    {!! Form::select('i_5_4_d',[''=>'---Select an option---']+\App\Poultry::getYesNoDontKnow(),Input::old('i_5_4_d'), array('id' => 'i_5_4_d', 'class' => 'form-control i_5_4_d')) !!}
                                    {!! Form::select('i_5_4_d',[''=>'---Select an option---']+\App\Poultry::getYesNoDontKnow(),Input::old('i_5_4_d'), array('id' => 'i_5_4_d', 'class' => 'form-control i_5_4_d')) !!}
                                @endif

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-4 control-label">I.5.5.a। {{ @App\Poultry::questionText()['i_5_5_a']}}</label>
                            <div class="col-xs-4">
                                @if(isset($question->i_5_5_a_value)&&$question->i_5_5_a_value!=null)
                                    @for($q=0;$q<3;$q++)
                                        {!! Form::number('i_5_5_a_value', Input::old('i_5_5_a_value',isset(json_decode($question->i_5_5_a_value)[$q])?json_decode($question->i_5_5_a_value)[$q]:''),array('id'=>'i_5_5_a_value','class' => 'form-control i_5_5_a_value','placeholder'=>'Days Ago','min'=>0, 'max'=>'10')) !!}
                                        {!! @App\Common::checkBoxGenerate(\App\Poultry::getDontKnow(),'i_5_5_a_flag_'.$q,0, array(isset(json_decode($question->i_5_5_a_flag)[$q])?json_decode($question->i_5_5_a_flag)[$q]:''), 1); !!}
                                    @endfor
                                @else
                                    {!! Form::number('i_5_5_a_value', Input::old('i_5_5_a_value'),array('id'=>'i_5_5_a_value','class' => 'form-control i_5_5_a_value','placeholder'=>'Days Ago','min'=>0, 'max'=>'10')) !!}
                                    {!! @App\Common::checkBoxGenerate(\App\Poultry::getDontKnow(),'i_5_5_a_flag_0',0, array()); !!}
                                    {!! Form::number('i_5_5_a_value', Input::old('i_5_5_a_value'),array('id'=>'i_5_5_a_value','class' => 'form-control i_5_5_a_value','placeholder'=>'Days Ago','min'=>0, 'max'=>'10')) !!}
                                    {!! @App\Common::checkBoxGenerate(\App\Poultry::getDontKnow(),'i_5_5_a_flag_1',0, array()); !!}
                                    {!! Form::number('i_5_5_a_value', Input::old('i_5_5_a_value'),array('id'=>'i_5_5_a_value','class' => 'form-control i_5_5_a_value','placeholder'=>'Days Ago','min'=>0, 'max'=>'10')) !!}
                                    {!! @App\Common::checkBoxGenerate(\App\Poultry::getDontKnow(),'i_5_5_a_flag_2',0, array()); !!}
                                    {{--{!! @App\Common::radioButtonGenerate(\App\Poultry::getDontKnow(), 'i_5_5_a_flag',0,$question->i_5_5_a_flag, true) !!}--}}
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-4 control-label">I.5.5.b {{ @App\Poultry::questionText()['i_5_5_b']}}</label>
                            <div class="col-xs-4">
                                @if(isset($question->i_5_5_b) && $question->i_5_5_b!=null)
                                    @for($q=0;$q<3;$q++)
                                        {!! Form::select('i_5_5_b',[''=>'---Select an option---']+\App\Poultry::getCumulativeAge(),Input::old('i_5_5_b',isset(json_decode($question->i_5_5_b)[$q])?json_decode($question->i_5_5_b)[$q]:''), array('id' => 'i_5_5_b', 'class' => 'form-control i_5_5_b')) !!}
                                    @endfor
                                @else
                                    {!! Form::select('i_5_5_b',[''=>'---Select an option---']+\App\Poultry::getCumulativeAge(),Input::old('i_5_5_b'), array('id' => 'i_5_5_b', 'class' => 'form-control i_5_5_b')) !!}
                                    {!! Form::select('i_5_5_b',[''=>'---Select an option---']+\App\Poultry::getCumulativeAge(),Input::old('i_5_5_b'), array('id' => 'i_5_5_b', 'class' => 'form-control i_5_5_b')) !!}
                                    {!! Form::select('i_5_5_b',[''=>'---Select an option---']+\App\Poultry::getCumulativeAge(),Input::old('i_5_5_b'), array('id' => 'i_5_5_b', 'class' => 'form-control i_5_5_b')) !!}
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-4 control-label">I.5.6.a {{ @App\Poultry::questionText()['i_5_6_a']}}</label>
                            <div class="col-xs-4">
                                @if(isset($question->i_5_6_a)&&$question->i_5_6_a!=null)
                                    @for($q=0;$q<3;$q++)
                                        {!! Form::select('i_5_6_a',[''=>'---Select an option---']+\App\Poultry::getYesNoDontKnow(),Input::old('i_5_6_a',isset(json_decode($question->i_5_6_a)[$q])?json_decode($question->i_5_6_a)[$q]:''), array('id' => 'i_5_6_a', 'class' => 'form-control i_5_6_a')) !!}
                                    @endfor
                                @else
                                    {!! Form::select('i_5_6_a',[''=>'---Select an option---']+\App\Poultry::getYesNoDontKnow(),Input::old('i_5_6_a'), array('id' => 'i_5_6_a', 'class' => 'form-control i_5_6_a')) !!}
                                    {!! Form::select('i_5_6_a',[''=>'---Select an option---']+\App\Poultry::getYesNoDontKnow(),Input::old('i_5_6_a'), array('id' => 'i_5_6_a', 'class' => 'form-control i_5_6_a')) !!}
                                    {!! Form::select('i_5_6_a',[''=>'---Select an option---']+\App\Poultry::getYesNoDontKnow(),Input::old('i_5_6_a'), array('id' => 'i_5_6_a', 'class' => 'form-control i_5_6_a')) !!}
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-4 control-label">I.5.6.b {{ @App\Poultry::questionText()['i_5_6_b']}}</label>
                            <div class="col-xs-4">
                                @if(isset($question->i_5_6_b)&&$question->i_5_6_b!=null)
                                    @for($q=0;$q<3;$q++)
                                        {!! Form::select('i_5_6_b',[''=>'---Select an option---']+\App\Poultry::getYesNoDontKnow(),Input::old('i_5_6_b',isset(json_decode($question->i_5_6_b)[$q])?json_decode($question->i_5_6_b)[$q]:''), array('id' => 'i_5_6_b', 'class' => 'form-control i_5_6_b')) !!}
                                    @endfor
                                @else
                                    {!! Form::select('i_5_6_b',[''=>'---Select an option---']+\App\Poultry::getYesNoDontKnow(),Input::old('i_5_6_b'), array('id' => 'i_5_6_b', 'class' => 'form-control i_5_6_b')) !!}
                                    {!! Form::select('i_5_6_b',[''=>'---Select an option---']+\App\Poultry::getYesNoDontKnow(),Input::old('i_5_6_b'), array('id' => 'i_5_6_b', 'class' => 'form-control i_5_6_b')) !!}
                                    {!! Form::select('i_5_6_b',[''=>'---Select an option---']+\App\Poultry::getYesNoDontKnow(),Input::old('i_5_6_b'), array('id' => 'i_5_6_b', 'class' => 'form-control i_5_6_b')) !!}
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-4 control-label">I.5.6.c {{ @App\Poultry::questionText()['i_5_6_c']}}</label>
                            <div class="col-xs-4">
                                @if(isset($question->i_5_6_c_flag)&&$question->i_5_6_c_flag!=null)
                                    @for($q=0;$q<3;$q++)
                                        {!! Form::select('i_5_6_c_flag',[''=>'---Select an option---']+\App\Poultry::getMedicalCareType(),Input::old('i_5_6_c_flag',isset(json_decode($question->i_5_6_c_flag)[$q])?json_decode($question->i_5_6_c_flag)[$q]:''), array('id' => 'i_5_6_c_flag', 'class' => 'form-control i_5_6_c_flag')) !!}
                                        {!! Form::text('i_5_6_c_value', Input::old('i_5_6_c_value',isset(json_decode($question->i_5_6_c_value)[$q])?json_decode($question->i_5_6_c_value)[$q]:''),array('id'=>'i_5_6_c_value','class' => 'form-control i_5_6_c_value','placeholder'=>'')) !!}
                                    @endfor
                                @else
                                    {!! Form::select('i_5_6_c_flag',[''=>'---Select an option---']+\App\Poultry::getMedicalCareType(),Input::old('i_5_6_c_flag'), array('id' => 'i_5_6_c_flag', 'class' => 'form-control i_5_6_c_flag')) !!}
                                    {!! Form::text('i_5_6_c_value', Input::old('i_5_6_c_value'),array('id'=>'i_5_6_c_value','class' => 'form-control i_5_6_c_value','placeholder'=>'')) !!}
                                    {!! Form::select('i_5_6_c_flag',[''=>'---Select an option---']+\App\Poultry::getMedicalCareType(),Input::old('i_5_6_c_flag'), array('id' => 'i_5_6_c_flag', 'class' => 'form-control i_5_6_c_flag')) !!}
                                    {!! Form::text('i_5_6_c_value', Input::old('i_5_6_c_value'),array('id'=>'i_5_6_c_value','class' => 'form-control i_5_6_c_value','placeholder'=>'')) !!}
                                    {!! Form::select('i_5_6_c_flag',[''=>'---Select an option---']+\App\Poultry::getMedicalCareType(),Input::old('i_5_6_c_flag'), array('id' => 'i_5_6_c_flag', 'class' => 'form-control i_5_6_c_flag')) !!}
                                    {!! Form::text('i_5_6_c_value', Input::old('i_5_6_c_value'),array('id'=>'i_5_6_c_value','class' => 'form-control i_5_6_c_value','placeholder'=>'')) !!}
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="wizard-pane" role="tabpanel">
                        <p><br><strong> {{ @App\Poultry::questionText()['0.0.6.i']}}</strong></p>

                        <div class="form-group">
                            <label class="col-xs-4 control-label">D.6.1 {{ @App\Poultry::questionText()['d_6_1']}}</label>
                            <div class="col-xs-4">
                                {!! Form::select('d_6_1',[''=>'---Select an option---']+\App\Poultry::getMaritalStatus(),Input::old('d_6_1',isset($question->d_6_1)?$question->d_6_1:''), array('id' => 'd_6_1', 'class' => 'form-control')) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-4 control-label">D.6.2। {{ @App\Poultry::questionText()['d_6_2']}}</label>
                            <div class="col-xs-4">
                                {!! Form::select('d_6_2_flag',[''=>'---------------']+\App\Poultry::getEducationalBackground(),Input::old('d_6_2_flag',isset($question->d_6_2_flag)?$question->d_6_2_flag:''), array('id' => 'd_6_2_flag', 'class' => 'form-control')) !!}
                                {!! Form::text('d_6_2_value', Input::old('d_6_2_value',isset($question->d_6_2_value)?$question->d_6_2_value:''),array('id'=>'d_6_2_value','class' => 'form-control','placeholder'=>'নির্দিষ্ট করে বলুন')) !!}
                                {{--{!! Form::number('d_6_2_value', Input::old('d_6_2_value',isset($question->d_6_2_value)?$question->d_6_2_value:''),array('id'=>'d_6_2_value','class' => 'form-control','placeholder'=>'Years','min'=>0)) !!}--}}
                                {{--{!! @App\Common::radioButtonGenerate(\App\Poultry::getDontKnow(), 'd_6_2_flag',0,$question->d_6_2_flag, true) !!}--}}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-4 control-label">D.6.3 {{ @App\Poultry::questionText()['d_6_3']}}</label>
                            <div class="col-xs-4">
                                {!! Form::select('d_6_3_flag',[''=>'---Select an option---']+\App\Poultry::getPrimaryOccupation(),Input::old('d_6_3_flag',isset($question->d_6_3_flag)?$question->d_6_3_flag:''), array('id' => 'd_6_3_flag', 'class' => 'form-control')) !!}
                                {!! Form::text('d_6_3_value', Input::old('d_6_3_value',isset($question->d_6_3_value)?$question->d_6_3_value:''),array('id'=>'d_6_3_value','class' => 'form-control','placeholder'=>'Occupation')) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-4 control-label">D.6.4 {{ @App\Poultry::questionText()['d_6_4']}}</label>
                            <div class="col-xs-4">
                                {!! @App\Common::radioButtonGenerate(\App\Poultry::getYesNoDontKnow(), 'd_6_4',0,$question->d_6_4, true) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-4 control-label">D.6.5.a {{ @App\Poultry::questionText()['d_6_5_a']}}</label>
                            <div class="col-xs-4">
                                {!! Form::number('d_6_5_a_value', Input::old('d_6_5_a_value',isset($question->d_6_5_a_value)?$question->d_6_5_a_value:''),array('id'=>'d_6_5_a_value','class' => 'form-control','placeholder'=>'People','min'=>0)) !!}
                                {!! @App\Common::checkBoxGenerate(\App\Poultry::getDontKnow(),'d_6_5_a_flag',0, array($question->d_6_5_a_flag)); !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-4 control-label">D.6.5.b {{ @App\Poultry::questionText()['d_6_5_b']}}</label>
                            <div class="col-xs-4">
                                {!! Form::number('d_6_5_b_value', Input::old('d_6_5_b_value',isset($question->d_6_5_b_value)?$question->d_6_5_b_value:''),array('id'=>'d_6_5_b_value','class' => 'form-control','placeholder'=>'People','min'=>0)) !!}
                                {!! @App\Common::checkBoxGenerate(\App\Poultry::getDontKnow(),'d_6_5_b_flag',0, array($question->d_6_5_b_flag)); !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-4 control-label">D.6.5.c {{ @App\Poultry::questionText()['d_6_5_c']}}</label>
                            <div class="col-xs-4">
                                {!! Form::number('d_6_5_c_value', Input::old('d_6_5_c_value',isset($question->d_6_5_c_value)?$question->d_6_5_c_value:''),array('id'=>'d_6_5_c_value','class' => 'form-control','placeholder'=>'People','min'=>0)) !!}
                                {!! @App\Common::checkBoxGenerate(\App\Poultry::getDontKnow(),'d_6_5_c_flag',0, array($question->d_6_5_c_flag)); !!}
                            </div>
                        </div>
                    </div>
                </div>
                {{ Form::close() }}
            </div>
        </div>

    </div>


    <!-- Form Wizard JavaScript -->
    <script src="{{URL::to('resources/assets/ampleadmin/plugins/bower_components/jquery-wizard-master/dist/jquery-wizard.min.js')}}"></script>
    <!-- FormValidation plugin and the class supports validating Bootstrap form -->
    <script src="{{URL::to('resources/assets/ampleadmin/plugins/bower_components/jquery-wizard-master/libs/formvalidation/formValidation.min.js')}}"></script>
    <script src="{{URL::to('resources/assets/ampleadmin/plugins/bower_components/jquery-wizard-master/libs/formvalidation/bootstrap.min.js')}}"></script>
    <script src="{{URL::to('resources/assets/ampleadmin/plugins/bower_components/typeahead.js-master/dist/typeahead.bundle.min.js')}}"></script>

    <script type="text/javascript">
        (function () {

            $('#exampleValidator').wizard({
                onInit: function () {
                    $('#validation').formValidation({
                        framework: 'bootstrap',
                        fields:{}
                    });
                },
                validator: function () {
                    var fv = $('#validation').data('formValidation');
                    var $this = $(this);
                    // Validate the container
                    fv.validateContainer($this);
                    var isValidStep = fv.isValidContainer($this);
                    if (isValidStep === false || isValidStep === null) {
                        return false;
                    }
                    return true;
                },
                onFinish: function () {
                    $('#validation').submit();
                    if($('#identity').val()==1)
                        var name= $('#provider_name').val();
                    else
                        var name= $('#name').val();
//                    $("#submit").removeAttr('disabled');
//                    $("#submit").removeClass( "disabled" )
//                    $("#submit").removeAttr("disabled");
//                    $("#submit").html('<button type="submit" id="submit" class="btn btn-primary btn-block" name="schedule">\n' +
//                        '                                Submit\n' +
//                        '                            </button>');
                    $("#call_status").append('<option value="1" selected="selected">{{ @App\Poultry::questionText()['finishing_text']}}</option>');
//
//                    $("#submit button").removeAttr('disabled');
//                    $("#submit button").removeClass( "disabled" )
                    $(".wizard-finish ").attr("disabled", "disabled");
                    // swal(name, "সাক্ষাৎকার প্রদানের জন্য আপনাকে ধন্যবাদ");
                    data_upload(true);
                }
            });

        })();
        function add_new_text(e, indicator, placeholder){
            if($(e).siblings().length < 5)
                $(e).parent().append('<input class="form-control" placeholder="'+placeholder+'" name="'+indicator+'[]" type="text" >');
        }

        $('input').on('change', function(){ // on change of state
            data_upload(false);
            checkSkipLogic();
        });
        $('select').change(function(){
            data_upload(false);
            checkSkipLogic();
        });

        $('#submit_new').click(function(){
            if($('#call_status').val()!="") {
                data_upload(true);
                checkSkipLogic();
            }else
                return false;
        });
        var token="{{csrf_token()}}";
        function data_upload(is_submit){
            var pp_2_6_b=[];
            var pp_2_15_b=[];
            var pp_2_15_c_value=[];
            var pp_2_15_c_flag=[];
            var pfp_3_1_c=[];
            var pfp_3_2_d=[];
            var pfp_3_3_c=[];
            var pfp_3_4_c=[];

            var i_5_4_b=[];
            var i_5_4_c=[];
            var i_5_4_d=[];
            var i_5_5_a_value=[];
            var i_5_5_a_flag=[];
            var i_5_5_b=[];
            var i_5_6_a=[];
            var i_5_6_b=[];
            var i_5_6_c_value=[];
            var i_5_6_c_flag=[];

            $(".pp_2_6_b").each(function(){
                pp_2_6_b.push($(this).val());
            });
            $(".pp_2_15_b").each(function(){
                pp_2_15_b.push($(this).val());
            });
            $(".pp_2_15_c_flag").each(function(){
                pp_2_15_c_flag.push($(this).val());
            });
            $(".pp_2_15_c_value").each(function(){
                pp_2_15_c_value.push($(this).val());
            });
            $(".pfp_3_1_c").each(function(){
                pfp_3_1_c.push($(this).val());
            });
            $(".pfp_3_2_d").each(function(){
                pfp_3_2_d.push($(this).val());
            });
            $(".pfp_3_3_c").each(function(){
                pfp_3_3_c.push($(this).val());
            });
            $(".pfp_3_4_c").each(function(){
                pfp_3_4_c.push($(this).val());
            });

            $(".i_5_4_b").each(function(){
                i_5_4_b.push($(this).val());
            });
            $(".i_5_4_c").each(function(){
                i_5_4_c.push($(this).val());
            });
            $(".i_5_4_d").each(function(){
                i_5_4_d.push($(this).val());
            });
            $(".i_5_5_a_value").each(function(){
                i_5_5_a_value.push($(this).val());
            });
            i_5_5_a_flag.push($('.i_5_5_a_flag_0:checked').val());
            i_5_5_a_flag.push($('.i_5_5_a_flag_1:checked').val());
            i_5_5_a_flag.push($('.i_5_5_a_flag_2:checked').val());
            $(".i_5_5_b").each(function(){
                i_5_5_b.push($(this).val());
            });
            $(".i_5_6_a").each(function(){
                i_5_6_a.push($(this).val());
            });
            $(".i_5_6_b").each(function(){
                i_5_6_b.push($(this).val());
            });
            $(".i_5_6_c_value").each(function(){
                i_5_6_c_value.push($(this).val());
            });
            $(".i_5_6_c_flag").each(function(){
                i_5_6_c_flag.push($(this).val());
            });
//            $("#health_condition_status_others input").each(function(){
//                health_condition_status_others.push($(this).val());
//            });
//
//            var i=0;
//            $(".home_name_of_animal").each(function(){
//                home_name_of_animal.push($(this).val());
//                if($(".home_on_of_animal_home_"+i+":checked").val()==1)
//                    home_on_of_animal_home.push(1);
//                else
//                    home_on_of_animal_home.push(0);
//                if($(".home_on_of_animal_outside_"+(i++)+":checked").val()==1)
//                    home_on_of_animal_outside.push(1);
//                else
//                    home_on_of_animal_outside.push(0);
//            });
//            $(".home_no_of_animal").each(function(){
//                home_no_of_animal.push($(this).val());
//            });
//            $(".home_on_of_animal_home").each(function(){
//                home_on_of_animal_home.push($(this).val());
//            });
//            $(".home_on_of_animal_outside").each(function(){
//                home_on_of_animal_outside.push($(this).val());
//            });
//            var i=0;
//            $(".neighbour_name_of_animal").each(function(){
//                neighbour_name_of_animal.push($(this).val());
//                if($(".is_neighbour_"+(i++)+":checked").val()==1)
//                    is_neighbour.push(1);
//                else
//                    is_neighbour.push(0);
//            });
            console.log(i_5_5_a_flag);
            if(is_submit==true){
                $.ajax({
                    method: "POST",
                    url: "{{url(session('access').'poultry/question/'.$poultry->id)}}",
                    data: {
                        s_0_1:$('.s_0_1:checked').val(),
                        s_0_2:$('#s_0_2').val(),
                        s_0_3:$('.s_0_3:checked').val(),
                        s_0_4:$('.s_0_4:checked').val(),
                        sc_0_1:$('.sc_0_1:checked').val(),
                        gi_1_1:$('.gi_1_1:checked').val(),
                        gi_1_2_a_value:$('#gi_1_2_a_value').val(),
                        gi_1_2_a_flag:$('.gi_1_2_a_flag:checked').val(),
                        gi_1_2_b_value:$('#gi_1_2_b_value').val(),
                        gi_1_2_b_flag:$('.gi_1_2_b_flag:checked').val(),
                        pp_2_1_a:$('.pp_2_1_a:checked').val(),
                        pp_2_1_b_value:$('#pp_2_1_b_value').val(),
                        pp_2_1_b_flag:$('#pp_2_1_b_flag').val(),
                        pp_2_2_value:$('#pp_2_2_value').val(),
                        pp_2_2_flag:$('.pp_2_2_flag:checked').val(),
                        pp_2_3_a:$('.pp_2_3_a:checked').val(),
                        pp_2_3_b_value:$('#pp_2_3_b_value').val(),
                        pp_2_3_b_flag:$('.pp_2_3_b_flag:checked').val(),
                        pp_2_4_value:$('#pp_2_4_value').val(),
                        pp_2_4_flag:$('.pp_2_4_flag:checked').val(),
                        pp_2_5_value:$('#pp_2_5_value').val(),
                        pp_2_5_flag:$('.pp_2_5_flag:checked').val(),
                        pp_2_6_a:$('.pp_2_6_a:checked').val(),
                        pp_2_6_b:pp_2_6_b,
                        pp_2_7_a_value:$('#pp_2_7_a_value').val(),
                        pp_2_7_a_flag:$('.pp_2_7_a_flag:checked').val(),
                        pp_2_7_b:$('.pp_2_7_b:checked').val(),
                        pp_2_7_c_value:$('#pp_2_7_c_value').val(),
                        pp_2_7_c_flag:$('.pp_2_7_c_flag:checked').val(),
                        pp_2_8_a:$('.pp_2_8_a:checked').val(),
                        pp_2_8_b_value:$('#pp_2_8_b_value').val(),
                        pp_2_8_b_flag:$('.pp_2_8_b_flag:checked').val(),
                        pp_2_9_value:$('#pp_2_9_value').val(),
                        pp_2_9_flag:$('.pp_2_9_flag:checked').val(),
                        pp_2_10_value:$('#pp_2_10_value').val(),
                        pp_2_10_flag:$('.pp_2_10_flag:checked').val(),
                        pp_2_11_a:$('#pp_2_11_a').val(),
                        pp_2_11_b:$('#pp_2_11_b').val(),
                        pp_2_11_c:$('#pp_2_11_c').val(),
                        pp_2_11_d:$('#pp_2_11_d').val(),
                        pp_2_12_a:$('.pp_2_12_a:checked').val(),
                        pp_2_12_b:$('#pp_2_12_b').val(),
                        pp_2_13_a:$('.pp_2_13_a:checked').val(),
                        pp_2_13_b:$('#pp_2_13_b').val(),
                        pp_2_14_a_flag:$('#pp_2_14_a_flag').val(),
                        pp_2_14_a_value:$('#pp_2_14_a_value').val(),
                        pp_2_14_b_flag:$('#pp_2_14_b_flag').val(),
                        pp_2_14_b_value:$('#pp_2_14_b_value').val(),
                        pp_2_15_a:$('.pp_2_15_a:checked').val(),
                        pp_2_15_b:pp_2_15_b,
                        pp_2_15_c_flag:pp_2_15_c_flag,
                        pp_2_15_c_value:pp_2_15_c_value,
                        pp_2_16_a_flag:$('#pp_2_16_a_flag').val(),
                        pp_2_16_a_value:$('#pp_2_16_a_value').val(),
                        pp_2_16_b_flag:$('#pp_2_16_b_flag').val(),
                        pp_2_16_b_value:$('#pp_2_16_b_value').val(),
                        pfp_3_1_a:$('.pfp_3_1_a:checked').val(),
                        pfp_3_1_b:$('.pfp_3_1_b:checked').val(),
                        pfp_3_1_c:pfp_3_1_c,
                        pfp_3_1_d:$('.pfp_3_1_d:checked').val(),
                        pfp_3_2_a:$('.pfp_3_2_a:checked').val(),
                        pfp_3_2_b_flag:$('#pfp_3_2_b_flag').val(),
                        pfp_3_2_b_value:$('#pfp_3_2_b_value').val(),
                        pfp_3_2_c:$('.pfp_3_2_c:checked').val(),
                        pfp_3_2_d:pfp_3_2_d,
                        pfp_3_2_e:$('.pfp_3_2_e:checked').val(),
                        pfp_3_2_f_value:$('#pfp_3_2_f_value').val(),
                        pfp_3_2_f_flag:$('#pfp_3_2_f_flag').val(),
                        pfp_3_3_a:$('.pfp_3_3_a:checked').val(),
                        pfp_3_3_b:$('.pfp_3_3_b:checked').val(),
                        pfp_3_3_c:pfp_3_3_c,
                        pfp_3_3_d:$('.pfp_3_3_d:checked').val(),
                        pfp_3_4_a:$('.pfp_3_4_a:checked').val(),
                        pfp_3_4_b:$('.pfp_3_4_b:checked').val(),
                        pfp_3_4_c:pfp_3_4_c,

                        pm_4_1_a:$('.pm_4_1_a:checked').val(),
                        pm_4_1_b:$('#pm_4_1_b').val(),
                        pm_4_2_a:$('.pm_4_2_a:checked').val(),
                        pm_4_2_b:$('#pm_4_2_b').val(),
                        pm_4_2_c:$('.pm_4_2_c:checked').val(),
                        pm_4_2_d:$('#pm_4_2_d').val(),
                        pm_4_3_a:$('.pm_4_3_a:checked').val(),
                        pm_4_3_b:$('#pm_4_3_b').val(),
                        pm_4_4_a:$('.pm_4_4_a:checked').val(),
                        pm_4_4_b:$('#pm_4_4_b').val(),
                        pm_4_4_c:$('.pm_4_4_c:checked').val(),
                        pm_4_4_d:$('#pm_4_4_d').val(),
                        pm_4_4_e:$('.pm_4_4_e:checked').val(),
                        pm_4_4_f:$('#pm_4_4_f').val(),
                        pm_4_4_g:$('.pm_4_4_g:checked').val(),
                        pm_4_4_h:$('#pm_4_4_h').val(),
                        pm_4_4_i:$('.pm_4_4_i:checked').val(),
                        pm_4_4_j:$('#pm_4_4_j').val(),
                        pm_4_5_a:$('.pm_4_5_a:checked').val(),
                        pm_4_5_b:$('#pm_4_5_b').val(),
                        pm_4_5_c:$('.pm_4_5_c:checked').val(),
                        pm_4_5_d:$('#pm_4_5_d').val(),
                        pm_4_5_e:$('.pm_4_5_e:checked').val(),
                        pm_4_5_f:$('#pm_4_5_f').val(),
                        pm_4_5_g:$('.pm_4_5_g:checked').val(),
                        pm_4_5_h:$('#pm_4_5_h').val(),
                        pm_4_5_i:$('.pm_4_5_i:checked').val(),
                        pm_4_5_j:$('#pm_4_5_j').val(),
                        pm_4_6_a:$('.pm_4_6_a:checked').val(),
                        pm_4_6_b:$('#pm_4_6_b').val(),
                        pm_4_6_c:$('.pm_4_6_c:checked').val(),
                        pm_4_6_d:$('#pm_4_6_d').val(),
                        pm_4_6_e:$('.pm_4_6_e:checked').val(),
                        pm_4_6_f:$('#pm_4_6_f').val(),
                        pm_4_6_g:$('.pm_4_6_g:checked').val(),
                        pm_4_6_h:$('#pm_4_6_h').val(),
                        pm_4_6_i:$('.pm_4_6_i:checked').val(),
                        pm_4_6_j:$('#pm_4_6_j').val(),
                        pm_4_7_a:$('.pm_4_7_a:checked').val(),
                        pm_4_7_b:$('#pm_4_7_b').val(),
                        pm_4_7_c:$('.pm_4_7_c:checked').val(),
                        pm_4_7_d:$('#pm_4_7_d').val(),
                        pm_4_7_e:$('.pm_4_7_e:checked').val(),
                        pm_4_7_f:$('#pm_4_7_f').val(),
                        pm_4_7_g:$('.pm_4_7_g:checked').val(),
                        pm_4_7_h:$('#pm_4_7_h').val(),
                        pm_4_7_i:$('.pm_4_7_i:checked').val(),
                        pm_4_7_j:$('#pm_4_7_j').val(),
                        i_5_1_a:$('.i_5_1_a:checked').val(),
                        i_5_1_b:$('.i_5_1_b:checked').val(),
                        i_5_1_c:$('.i_5_1_c:checked').val(),
                        i_5_1_d:$('.i_5_1_d:checked').val(),
                        i_5_2_a_value:$('#i_5_2_a_value').val(),
                        i_5_2_a_flag:$('.i_5_2_a_flag:checked').val(),
                        i_5_3_a:$('.i_5_3_a:checked').val(),
                        i_5_3_b:$('.i_5_3_b:checked').val(),
                        i_5_3_c_value:$('#i_5_3_c_value').val(),
                        i_5_3_c_flag:$('#i_5_3_c_flag').val(),
                        i_5_4_a_flag:$('.i_5_4_a_flag:checked').val(),
                        i_5_4_a_value:$('#i_5_4_a_value').val(),
                        i_5_4_b:i_5_4_b,
                        i_5_4_c:i_5_4_c,
                        i_5_4_d:i_5_4_d,
                        i_5_5_a_value:i_5_5_a_value,
                        i_5_5_a_flag:i_5_5_a_flag,
                        i_5_5_b:i_5_5_b,
                        i_5_6_a:i_5_6_a,
                        i_5_6_b:i_5_6_b,
                        i_5_6_c_value:i_5_6_c_value,
                        i_5_6_c_flag:i_5_6_c_flag,
                        d_6_1:$('#d_6_1').val(),
                        d_6_2_value:$('#d_6_2_value').val(),
                        d_6_2_flag:$('#d_6_2_flag').val(),
                        d_6_3_value:$('#d_6_3_value').val(),
                        d_6_3_flag:$('#d_6_3_flag').val(),
                        d_6_4:$('.d_6_4:checked').val(),
                        d_6_5_a_value:$('#d_6_5_a_value').val(),
                        d_6_5_a_flag:$('.d_6_5_a_flag:checked').val(),
                        d_6_5_b_value:$('#d_6_5_b_value').val(),
                        d_6_5_b_flag:$('.d_6_5_b_flag:checked').val(),
                        d_6_5_c_value:$('#d_6_5_c_value').val(),
                        d_6_5_c_flag:$('.d_6_5_c_flag:checked').val(),

                        call_status: $('#call_status').val(),
                        date: $('#date').val(),
                        time: $('#time').val(),
                        _token: "{{csrf_token()}}",
                    },
                }).done(function( msg ) {
                    if(msg.success==true)
                        window.location.href =  "{{url(session('access').'poultry/callInitiate')}}";
                });
//
            }else{
                $.ajax({
                    method: "POST",
                    url: "{{url(session('access').'poultry/question/'.$poultry->id)}}",
                    data: {
                        s_0_1:$('.s_0_1:checked').val(),
                        s_0_2:$('#s_0_2').val(),
                        s_0_3:$('.s_0_3:checked').val(),
                        s_0_4:$('.s_0_4:checked').val(),
                        sc_0_1:$('.sc_0_1:checked').val(),
                        gi_1_1:$('.gi_1_1:checked').val(),
                        gi_1_2_a_value:$('#gi_1_2_a_value').val(),
                        gi_1_2_a_flag:$('.gi_1_2_a_flag:checked').val(),
                        gi_1_2_b_value:$('#gi_1_2_b_value').val(),
                        gi_1_2_b_flag:$('.gi_1_2_b_flag:checked').val(),
                        pp_2_1_a:$('.pp_2_1_a:checked').val(),
                        pp_2_1_b_value:$('#pp_2_1_b_value').val(),
                        pp_2_1_b_flag:$('#pp_2_1_b_flag').val(),
                        pp_2_2_value:$('#pp_2_2_value').val(),
                        pp_2_2_flag:$('.pp_2_2_flag:checked').val(),
                        pp_2_3_a:$('.pp_2_3_a:checked').val(),
                        pp_2_3_b_value:$('#pp_2_3_b_value').val(),
                        pp_2_3_b_flag:$('.pp_2_3_b_flag:checked').val(),
                        pp_2_4_value:$('#pp_2_4_value').val(),
                        pp_2_4_flag:$('.pp_2_4_flag:checked').val(),
                        pp_2_5_value:$('#pp_2_5_value').val(),
                        pp_2_5_flag:$('.pp_2_5_flag:checked').val(),
                        pp_2_6_a:$('.pp_2_6_a:checked').val(),
                        pp_2_6_b:pp_2_6_b,
                        pp_2_7_a_value:$('#pp_2_7_a_value').val(),
                        pp_2_7_a_flag:$('.pp_2_7_a_flag:checked').val(),
                        pp_2_7_b:$('.pp_2_7_b:checked').val(),
                        pp_2_7_c_value:$('#pp_2_7_c_value').val(),
                        pp_2_7_c_flag:$('.pp_2_7_c_flag:checked').val(),
                        pp_2_8_a:$('.pp_2_8_a:checked').val(),
                        pp_2_8_b_value:$('#pp_2_8_b_value').val(),
                        pp_2_8_b_flag:$('.pp_2_8_b_flag:checked').val(),
                        pp_2_9_value:$('#pp_2_9_value').val(),
                        pp_2_9_flag:$('.pp_2_9_flag:checked').val(),
                        pp_2_10_value:$('#pp_2_10_value').val(),
                        pp_2_10_flag:$('.pp_2_10_flag:checked').val(),
                        pp_2_11_a:$('#pp_2_11_a').val(),
                        pp_2_11_b:$('#pp_2_11_b').val(),
                        pp_2_11_c:$('#pp_2_11_c').val(),
                        pp_2_11_d:$('#pp_2_11_d').val(),
                        pp_2_12_a:$('.pp_2_12_a:checked').val(),
                        pp_2_12_b:$('#pp_2_12_b').val(),
                        pp_2_13_a:$('.pp_2_13_a:checked').val(),
                        pp_2_13_b:$('#pp_2_13_b').val(),
                        pp_2_14_a_flag:$('#pp_2_14_a_flag').val(),
                        pp_2_14_a_value:$('#pp_2_14_a_value').val(),
                        pp_2_14_b_flag:$('#pp_2_14_b_flag').val(),
                        pp_2_14_b_value:$('#pp_2_14_b_value').val(),
                        pp_2_15_a:$('.pp_2_15_a:checked').val(),
                        pp_2_15_b:pp_2_15_b,
                        pp_2_15_c_flag:pp_2_15_c_flag,
                        pp_2_15_c_value:pp_2_15_c_value,
                        pp_2_16_a_flag:$('#pp_2_16_a_flag').val(),
                        pp_2_16_a_value:$('#pp_2_16_a_value').val(),
                        pp_2_16_b_flag:$('#pp_2_16_b_flag').val(),
                        pp_2_16_b_value:$('#pp_2_16_b_value').val(),
                        pfp_3_1_a:$('.pfp_3_1_a:checked').val(),
                        pfp_3_1_b:$('.pfp_3_1_b:checked').val(),
                        pfp_3_1_c:pfp_3_1_c,
                        pfp_3_1_d:$('.pfp_3_1_d:checked').val(),
                        pfp_3_2_a:$('.pfp_3_2_a:checked').val(),
                        pfp_3_2_b_flag:$('#pfp_3_2_b_flag').val(),
                        pfp_3_2_b_value:$('#pfp_3_2_b_value').val(),
                        pfp_3_2_c:$('.pfp_3_2_c:checked').val(),
                        pfp_3_2_d:pfp_3_2_d,
                        pfp_3_2_e:$('.pfp_3_2_e:checked').val(),
                        pfp_3_2_f_value:$('#pfp_3_2_f_value').val(),
                        pfp_3_2_f_flag:$('#pfp_3_2_f_flag').val(),
                        pfp_3_3_a:$('.pfp_3_3_a:checked').val(),
                        pfp_3_3_b:$('.pfp_3_3_b:checked').val(),
                        pfp_3_3_c:pfp_3_3_c,
                        pfp_3_3_d:$('.pfp_3_3_d:checked').val(),
                        pfp_3_4_a:$('.pfp_3_4_a:checked').val(),
                        pfp_3_4_b:$('.pfp_3_4_b:checked').val(),
                        pfp_3_4_c:pfp_3_4_c,

                        pm_4_1_a:$('.pm_4_1_a:checked').val(),
                        pm_4_1_b:$('#pm_4_1_b').val(),
                        pm_4_2_a:$('.pm_4_2_a:checked').val(),
                        pm_4_2_b:$('#pm_4_2_b').val(),
                        pm_4_2_c:$('.pm_4_2_c:checked').val(),
                        pm_4_2_d:$('#pm_4_2_d').val(),
                        pm_4_3_a:$('.pm_4_3_a:checked').val(),
                        pm_4_3_b:$('#pm_4_3_b').val(),
                        pm_4_4_a:$('.pm_4_4_a:checked').val(),
                        pm_4_4_b:$('#pm_4_4_b').val(),
                        pm_4_4_c:$('.pm_4_4_c:checked').val(),
                        pm_4_4_d:$('#pm_4_4_d').val(),
                        pm_4_4_e:$('.pm_4_4_e:checked').val(),
                        pm_4_4_f:$('#pm_4_4_f').val(),
                        pm_4_4_g:$('.pm_4_4_g:checked').val(),
                        pm_4_4_h:$('#pm_4_4_h').val(),
                        pm_4_4_i:$('.pm_4_4_i:checked').val(),
                        pm_4_4_j:$('#pm_4_4_j').val(),
                        pm_4_5_a:$('.pm_4_5_a:checked').val(),
                        pm_4_5_b:$('#pm_4_5_b').val(),
                        pm_4_5_c:$('.pm_4_5_c:checked').val(),
                        pm_4_5_d:$('#pm_4_5_d').val(),
                        pm_4_5_e:$('.pm_4_5_e:checked').val(),
                        pm_4_5_f:$('#pm_4_5_f').val(),
                        pm_4_5_g:$('.pm_4_5_g:checked').val(),
                        pm_4_5_h:$('#pm_4_5_h').val(),
                        pm_4_5_i:$('.pm_4_5_i:checked').val(),
                        pm_4_5_j:$('#pm_4_5_j').val(),
                        pm_4_6_a:$('.pm_4_6_a:checked').val(),
                        pm_4_6_b:$('#pm_4_6_b').val(),
                        pm_4_6_c:$('.pm_4_6_c:checked').val(),
                        pm_4_6_d:$('#pm_4_6_d').val(),
                        pm_4_6_e:$('.pm_4_6_e:checked').val(),
                        pm_4_6_f:$('#pm_4_6_f').val(),
                        pm_4_6_g:$('.pm_4_6_g:checked').val(),
                        pm_4_6_h:$('#pm_4_6_h').val(),
                        pm_4_6_i:$('.pm_4_6_i:checked').val(),
                        pm_4_6_j:$('#pm_4_6_j').val(),
                        pm_4_7_a:$('.pm_4_7_a:checked').val(),
                        pm_4_7_b:$('#pm_4_7_b').val(),
                        pm_4_7_c:$('.pm_4_7_c:checked').val(),
                        pm_4_7_d:$('#pm_4_7_d').val(),
                        pm_4_7_e:$('.pm_4_7_e:checked').val(),
                        pm_4_7_f:$('#pm_4_7_f').val(),
                        pm_4_7_g:$('.pm_4_7_g:checked').val(),
                        pm_4_7_h:$('#pm_4_7_h').val(),
                        pm_4_7_i:$('.pm_4_7_i:checked').val(),
                        pm_4_7_j:$('#pm_4_7_j').val(),
                        i_5_1_a:$('.i_5_1_a:checked').val(),
                        i_5_1_b:$('.i_5_1_b:checked').val(),
                        i_5_1_c:$('.i_5_1_c:checked').val(),
                        i_5_1_d:$('.i_5_1_d:checked').val(),
                        i_5_2_a_value:$('#i_5_2_a_value').val(),
                        i_5_2_a_flag:$('.i_5_2_a_flag:checked').val(),
                        i_5_3_a:$('.i_5_3_a:checked').val(),
                        i_5_3_b:$('.i_5_3_b:checked').val(),
                        i_5_3_c_value:$('#i_5_3_c_value').val(),
                        i_5_3_c_flag:$('#i_5_3_c_flag').val(),
                        i_5_4_a_flag:$('.i_5_4_a_flag:checked').val(),
                        i_5_4_a_value:$('#i_5_4_a_value').val(),
                        i_5_4_b:i_5_4_b,
                        i_5_4_c:i_5_4_c,
                        i_5_4_d:i_5_4_d,
                        i_5_5_a_value:i_5_5_a_value,
                        i_5_5_a_flag:i_5_5_a_flag,
                        i_5_5_b:i_5_5_b,
                        i_5_6_a:i_5_6_a,
                        i_5_6_b:i_5_6_b,
                        i_5_6_c_value:i_5_6_c_value,
                        i_5_6_c_flag:i_5_6_c_flag,
                        d_6_1:$('#d_6_1').val(),
                        d_6_2_value:$('#d_6_2_value').val(),
                        d_6_2_flag:$('#d_6_2_flag').val(),
                        d_6_3_value:$('#d_6_3_value').val(),
                        d_6_3_flag:$('#d_6_3_flag').val(),
                        d_6_4:$('.d_6_4:checked').val(),
                        d_6_5_a_value:$('#d_6_5_a_value').val(),
                        d_6_5_a_flag:$('.d_6_5_a_flag:checked').val(),
                        d_6_5_b_value:$('#d_6_5_b_value').val(),
                        d_6_5_b_flag:$('.d_6_5_b_flag:checked').val(),
                        d_6_5_c_value:$('#d_6_5_c_value').val(),
                        d_6_5_c_flag:$('.d_6_5_c_flag:checked').val(),
                        call_status: 0,
                        _token: "{{csrf_token()}}",
                    },
                }).done(function( msg ) {
                    console.log("done");
                });
            }
        }

    </script>
    <script src="{{URL::to('resources/assets/js/poultry.js')}}"></script>
@stop