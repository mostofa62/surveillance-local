@extends('layouts/master')
@section('content')
    <style>
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
    <div class="col-md-12">
        <div class="col-md-4  table-position">
            <div class="form-group">
                <label class="col-md-12 control-label">সাক্ষাৎকার অবস্থা</label>
                <div class="col-md-12 col-sm-12">
                    {!! Form::select('call_status',[''=>'--- সাক্ষাৎকার অবস্থা ---']+\App\Common::getScheduleSuveillance(),Input::old('call_status',isset($question->call_status)?$question->call_status:''), array('id' => 'call_status', 'class' => 'form-control')) !!}
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-12 control-label ">পরিকল্পনার তারিখ</label>
                <div class="col-md-12 col-sm-12">
                    <input type="date" name="date" id="date" class="form-control" disabled="disabled"  required="required" value="<?=date('Y-m-d')?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-12 control-label ">পরিকল্পনার সময়</label>
                <div class="col-md-12 col-sm-12">
                    <input type="time" name="time" id="time" class="form-control" disabled="disabled" required="required" value="<?=date('h:m')?>">
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
                        <h4><span><i class="ti-user"></i></span>সার্ভিল্যান্স ডাটা</h4></li>
                    <li role="tab">
                        <h4><span><i class="ti-credit-card"></i></span>সেকশন ১</h4></li>
                    <li role="tab"><h4><span><i class="ti-check"></i></span>সেকশন ২</h4></li>
                    <li  role="tab"><h4><span><i class="ti-check"></i></span>সেকশন ৩</h4></li>
                    <li  role="tab"><h4><span><i class="ti-check"></i></span>সেকশন ৪</h4></li>
                </ul>
                {!! Form::open(array('url' => isset($encephalitis)?session('access').'encephalitis/question/'.$encephalitis->id :session('access').'encephalitis/question/'.$id,'method' =>'post',  'enctype'=>'multipart/form-data','id'=>"validation", 'class'=>"form-horizontal")) !!}
                <div class="wizard-content">
                    <div class="wizard-pane active" role="tabpanel">
                        <div class="surveillance-data">
                            <p><strong>নিচের প্রদত্ত তথ্যগুলো যাচাই করুনঃ</strong></p>
                            <div class="form-group">
                                <label class="col-xs-4 control-label">সার্ভিল্যান্স আইডি: </label>
                                <div class="col-xs-4">
                                    <strong>{!! @$encephalitis->surveillance_id!!}</strong>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-4 control-label">তারিখ: </label>
                                <div class="col-xs-4">
                                    <strong>{!! @$encephalitis->date!!}</strong>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-4 control-label">রোগীর নাম</label>
                                <div class="col-xs-4">
                                    <strong>{!! @$encephalitis->name !!}</strong>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-4 control-label">রোগী যখন অসুস্থ হয়, তখন তার বয়স (সম্পূর্ণ
                                    বছরে)</label>
                                <div class="col-xs-4">
                                    <strong>{!! @$encephalitis->age !!}
                                        <input type="hidden" id="p_age" value="{!! @$encephalitis->age !!}"></strong>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-4 control-label">রোগী পুরুষ না মহিলা</label>
                                <div class="col-xs-4">
                                    <strong>{!! @\App\Common::getGenderType()[$encephalitis->sex] !!}</strong>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-4 control-label">মোবাইল নম্বর</label>
                                <div class="col-xs-4">
                                    <strong>{!! @$encephalitis->mobile_no !!}</strong>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-4 control-label">রোগীর অভিভাবকের নাম</label>
                                <div class="col-xs-4">
                                    <strong>{!! @$encephalitis->guardian_name !!}</strong>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-4 control-label">রোগীর অসুস্থতা শুরুর তারিখ</label>
                                <div class="col-xs-4">
                                    <strong>{!! @date('d/m/Y',strtotime($encephalitis->date_of_onset)) !!}</strong>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-4 control-label">রোগীর ঠিকানা</label>
                                <div class="col-xs-4">
                                    <strong>{!! @$encephalitis->address !!}</strong>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-xs-4 control-label">হাসপাতালে কত দিন ছিল?</label>
                                <div class="col-xs-4">
                                    {!! Form::number('hospital_period', Input::old('hospital_period',isset($encephalitis->hospital_period)?$encephalitis->hospital_period:''),array('id'=>'hospital_period','class' => 'form-control','placeholder'=>'', 'min'=>0)) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-4 control-label">রোগীর বর্তমান অবস্থা (জীবিত/মৃত)</label>
                                <div class="col-xs-4">
                                    {!! @App\Common::radioButtonGenerate(\App\Common::getLifeStatus(), 'life_status', 0, $encephalitis->life_status, false) !!}

                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-4 control-label">অসুস্থ হবার কত পর মারা গেছেন?</label>
                                <div class="col-xs-4">
                                    {!! Form::number('death_period', Input::old('death_period',isset($question->death_period)?$question->death_period:''),array('id'=>'death_period','class' => 'form-control','placeholder'=>'No of Days')) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-4 control-label">ঐ রোগ থেকে মারা গেছেন নাকি ভিন্ন রোগ থেকে?</label>
                                <div class="col-xs-4">
                                    {!! @App\Common::radioButtonGenerate(\App\Common::getYesNoType(), 'this_disease', 0, $encephalitis->this_disease, false) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-4 control-label">মৃত্যুর কারণ?</label>
                                <div class="col-xs-4">
                                    {!! Form::text('death_text', Input::old('death_text',isset($question->death_text)?$question->death_text:''),array('id'=>'death_text','class' => 'form-control','placeholder'=>'')) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-4 control-label">হাসপাতাল থেকে ছাড়া পাবার পর রোগীর অবস্থা কেমন ছিল?</label>
                                <div class="col-xs-4">
                                    {!! @App\Common::checkBoxGenerate(\App\Common::getPatientCondition(),'health_condition_status',1, json_decode($encephalitis->health_condition_status)); !!}
                                    <div id="health_condition_status_others">
                                        <div onclick="add_new_text(this, 'health_condition_status_others', 'অন্যান্য (নির্দিষ্ট করে বলুন)')" class="text-right"><i class="fa fa-plus"></i></div>
                                        @if($encephalitis->health_condition_status_others!= null)
                                            @foreach(@json_decode($encephalitis->health_condition_status_others) as $key=>$value)
                                                {!! Form::text('health_condition_status_others[]', Input::old('health_condition_status_others',isset($encephalitis->health_condition_status_others)?$value:''),array('class' => 'form-control','placeholder'=>'অন্যান্য (নির্দিষ্ট করে বলুন)','disabled'=>'disabled')) !!}
                                            @endforeach
                                        @else
                                            {!! Form::text('health_condition_status_others[]', Input::old('health_condition_status_others',isset($encephalitis->health_condition_status_others)?$value:''),array('class' => 'form-control','placeholder'=>'অন্যান্য (নির্দিষ্ট করে বলুন)','disabled'=>'disabled')) !!}
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="wizard-pane" role="tabpanel">
                        <div class="form-group">
                            <label class="col-xs-4 control-label">তথ্য প্রদানকারীর রোগী নিজে কিনা জিজ্ঞাসা করুন</label>
                            <div class="col-xs-4">
                                {!! @App\Common::radioButtonGenerate(\App\Common::getIdentityType(), 'identity',0,$question->identity, false) !!}
                                {{--                                    {!! Form::select('identity',[''=>'---তথ্য প্রদানকারীর পরিচয়---']+\App\Common::getIdentityType(),Input::old('identity',isset($question->identity)?$question->identity:''), array('id' => 'identity', 'class' => 'form-control')) !!}--}}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-4 control-label">আপনার (সাক্ষাৎকার প্রদানকারীর) নাম কি?</label>
                            <div class="col-xs-4">
                                {!! Form::text('provider_name', Input::old('provider_name',isset($question->provider_name)?$question->provider_name:''),array('id'=>'provider_name','class' => 'form-control','placeholder'=>'আপনার (সাক্ষাৎকার প্রদানকারীর) নাম')) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-4 control-label">আপনার (সাক্ষাৎকার প্রদানকারীর) সহিত রোগীর
                                সম্পর্ক কি?</label>
                            <div class="col-xs-4">
                                {!! Form::text('relation_with_patient', Input::old('relation_with_patient',isset($question->relation_with_patient)?$question->relation_with_patient:''),array('id'=>'relation_with_patient','class' => 'form-control','placeholder'=>'আপনার (সাক্ষাৎকার প্রদানকারীর) সহিত রোগীর সম্পর্ক ')) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-4 control-label">আপনার (সাক্ষাৎকার প্রদানকারীর) বয়স (বছরে) কত
                                বলুন?</label>
                            <div class="col-xs-4">
                                {!! Form::text('provider_age', Input::old('provider_age',isset($question->provider_age)?$question->provider_age:''),array('id'=>'provider_age','class' => 'form-control','placeholder'=>'আপনার (সাক্ষাৎকার প্রদানকারীর) বয়স (বছরে)')) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-4 control-label"><span class="is_patient1">আপনার / রোগীর</span> ধর্ম কি?</label>
                            <div class="col-xs-4">
                                {!! @App\Common::radioButtonGenerate(\App\Common::getReligion(), 'religion',0,$question->religion,false) !!}
                                {{--{!! Form::select('religion',[''=>'---ধর্ম কি?---']+\App\Common::getReligion(),Input::old('religion',isset($question->religion)?$question->religion:''), array('id' => 'religion', 'class' => 'form-control')) !!}--}}
                                {!! Form::text('religion_text', Input::old('religion_text',isset($question->religion_text)?$question->religion_text:''),array('id'=>'religion_text','class' => 'form-control','placeholder'=>'নির্দিষ্ট করে বলুন')) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-4 control-label"><span class="is_patient2">আপনি / রোগী</span> কি কোন ক্ষুদ্র নৃ গোষ্ঠীর
                                অধিবাসী?</label>
                            <div class="col-xs-4">
                                {!! @App\Common::radioButtonGenerate(\App\Common::getYesNoType(), 'is_ethnic',0,$question->is_ethnic,false) !!}

                                {{--                                    {!! Form::select('is_ethnic',/*[''=>'---ক্ষুদ্র নৃ গোষ্ঠীর অধিবাসী? ---']+*/\App\Common::getYesNoType(),Input::old('is_ethnic',isset($question->is_ethnic)?$question->is_ethnic:''), array('id' => 'is_ethnic', 'class' => 'form-control')) !!}--}}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-4 control-label"> <span class="is_patient2">আপনি / রোগী</span> কোন ক্ষুদ্র নৃ গোষ্ঠী
                                অন্তর্গত?</label>
                            <div class="col-xs-4">
                                {!! @App\Common::radioButtonGenerate(\App\Common::getEthnicType(), 'ethnic_type',0,$question->ethnic_type,false) !!}

                                {{--                                    {!! Form::select('ethnic_type',[''=>'---কোন ক্ষুদ্র নৃ গোষ্ঠীর অধিবাসী?---']+\App\Common::getEthnicType(),Input::old('ethnic_type',isset($question->ethnic_type)?$question->ethnic_type:''), array('id' => 'ethnic_type', 'class' => 'form-control')) !!}--}}
                                {!! Form::text('ethnic_type_text', Input::old('ethnic_type_text',isset($question->ethnic_type_text)?$question->ethnic_type_text:''),array('id'=>'ethnic_type_text','class' => 'form-control','placeholder'=>'নির্দিষ্ট করে বলুন')) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-xs-4 control-label"><span class="is_patient2">আপনি / রোগী</span> যখন অসুস্থ <span class="is_patient3">হন/ হয়</span>, তখন <span class="is_patient4">আপনার / তার</span>
                                শিক্ষাগত যোগ্যতা কি ছিল? (মাধ্যমিকের নিচে হলে কোন শ্রেণি পর্যন্ত পড়াশুনা শেষ করেছে
                                তা সম্পূর্ণকৃত বছরে লিখুন)</label>
                            <div class="col-xs-4">
                                {!! Form::select('educational_background',[''=>'---------------']+\App\Common::getEducationalBackground(),Input::old('educational_background',isset($question->educational_background)?$question->educational_background:''), array('id' => 'educational_background', 'class' => 'form-control')) !!}
                                {!! Form::text('educational_background_text', Input::old('educational_background_text',isset($question->educational_background_text)?$question->educational_background_text:''),array('id'=>'educational_background_text','class' => 'form-control','placeholder'=>'নির্দিষ্ট করে বলুন')) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-4 control-label"><span class="is_patient2">আপনি / রোগী</span> যখন অসুস্থ <span class="is_patient3">হন/ হয়</span>, তখন <span class="is_patient4">আপনার / তার</span>
                                মূল পেশা কি ছিল?</label>
                            <div class="col-xs-4">
                                {!! Form::select('profession',[''=>'---------------']+\App\Common::getProfession(),Input::old('profession',isset($question->profession)?$question->profession:''), array('id' => 'profession', 'class' => 'form-control')) !!}
                                {!! Form::text('profession_text', Input::old('profession_text',isset($question->profession_text)?$question->profession_text:''),array('id'=>'profession_text','class' => 'form-control','placeholder'=>'নির্দিষ্ট করে বলুন')) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-4 control-label"><span class="is_patient2">আপনি / রোগী</span> যখন অসুস্থ <span class="is_patient3">হন/ হয়</span>, তখন <span class="is_patient4">আপনার / তার</span>
                                বাবার পেশা কি ?</label>
                            <div class="col-xs-4">
                                {!! Form::select('father_profession',[''=>'---------------']+\App\Common::getFatherProfession(),Input::old('father_profession',isset($question->father_profession)?$question->father_profession:''), array('id' => 'father_profession', 'class' => 'form-control')) !!}
                                {!! Form::text('father_profession_text', Input::old('father_profession_text',isset($question->father_profession_text)?$question->father_profession_text:''),array('id'=>'father_profession_text','class' => 'form-control','placeholder'=>'নির্দিষ্ট করে বলুন')) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-4 control-label"><span class="is_patient1">আপনার / রোগীর</span> পরিবারের সম্ভাব্য মাসিক খরচ কত?
                                (টাকা)</label>
                            <div class="col-xs-4">
                                {!! @App\Common::radioButtonGenerate(\App\Common::getExpenditureType(), 'expenditure_type',0,$question->expenditure_type,true) !!}

                                {{--                                    {!! Form::select('expenditure_type',\App\Common::getExpenditureType(),Input::old('expenditure_type',isset($question->expenditure_type)?$question->expenditure_type:''), array('id' => 'expenditure_type', 'class' => 'form-control')) !!}--}}
                                {!! Form::text('family_expense', Input::old('family_expense',isset($question->family_expense)?$question->family_expense:''),array('id'=>'family_expense','class' => 'form-control','placeholder'=>'পরিবারের সম্ভাব্য মাসিক খরচ লিখুন')) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-4 control-label"><span class="is_patient2">আপনি / রোগী</span> যখন অসুস্থ <span class="is_patient3">হন/ হয়</span>, তখন <span class="is_patient4">আপনার / তার</span>
                                পরিবারের সদস্য সংখ্যা কতজন ছিল? <span class="is_patient7"></span> </label>
                            <div class="col-xs-2">
                                {!! Form::text('male_member', Input::old('male_member',isset($question->male_member)?$question->male_member:''),array('id'=>'male_member','class' => 'form-control','placeholder'=>'পুরুষ')) !!}
                            </div>
                            <div class="col-xs-2">
                                {!! Form::text('female_member', Input::old('female_member',isset($question->female_member)?$question->female_member:''),array('id'=>'female_member','class' => 'form-control','placeholder'=>'মহিলা')) !!}
                            </div>
                        </div>
                    </div>
                    <div class="wizard-pane" role="tabpanel">
                        <p><strong>আমাদের কাছে তথ্য মোতাবেক <span class="is_patient6">আপনি / রোগী</span> {{@$encephalitis->date_of_onset}}
                                তারিখে অসুস্থ হয়েছিলেন । এখন আমি <span class="is_patient1">আপনার / রোগীর</span> অসুস্থ হওয়ার পূর্বের ১৫ দিনের ভিতর <span class="is_patient1">আপনার / রোগীর</span> বসস্থান, কর্মস্থল এবং আচরণ বিষয়ে কিছু প্রশ্ন করব, আপনি একটু মনে করে উত্তর দিবেন।</strong></p>

                        <div class="form-group">
                            <label class="col-xs-4 control-label"><span class="is_patient2">আপনি / রোগী</span> অসুস্থ হবার পূর্বের ১৫ দিনের ভিতর কোথায়
                                বসবাস করছিলেন?</label>
                            <div class="col-xs-4">
                                {!! @App\Common::radioButtonGenerate(\App\Common::getLivingPlace(), 'fifteendays_live',0,$question->fifteendays_live,false) !!}
                                {!! Form::text('otherplacetolive', Input::old('otherplacetolive',isset($question->otherplacetolive)?$question->otherplacetolive:''),array('id'=>'otherplacetolive','class' => 'form-control','placeholder'=>'অন্যান্য (নির্দিষ্ট করে বলুন)')) !!}

                                {{--                                    {!! Form::select('fifteendays_live',/*[''=>'--- ১৫ দিনের মধ্যে কোথায় বসবাস করছিলেন?---']+*/\App\Common::getLivingPlace(),Input::old('fifteendays_live',isset($question->fifteendays_live)?$question->fifteendays_live:''), array('id' => 'fifteendays_live', 'class' => 'form-control')) !!}--}}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-4 control-label"><span class="is_patient2">আপনি / রোগী</span> যখন অসুস্থ <span class="is_patient3">হন/ হয়</span>, তখন <span class="is_patient4">আপনার / তার</span>
                                বাড়ির ১০০ গজের মধ্যে নিম্নলিখিত কোন গুলোর চাষাবাদ হয়েছিল?
                            </label>
                            <div class="col-xs-4">
                                <label class='col-md-12'><span class="col-md-4">ধান</span>  {!! @App\Common::radioButtonGenerate(\App\Common::getYesNoDontKnow(), 'is_paddy',0,$question->is_paddy,false) !!}</label>
                                <label class='col-md-12'><span class="col-md-4">পাট</span>  {!! @App\Common::radioButtonGenerate(\App\Common::getYesNoDontKnow(), 'is_jute',0,$question->is_jute,false) !!} </label>
                                <label class='col-md-12'><span class="col-md-4">গম</span>  {!! @App\Common::radioButtonGenerate(\App\Common::getYesNoDontKnow(), 'is_wheat',0,$question->is_wheat,false) !!}</label>
                                <label class='col-md-12'><span class="col-md-4">কচু</span>  {!! @App\Common::radioButtonGenerate(\App\Common::getYesNoDontKnow(), 'is_root',0,$question->is_root,false) !!}</label>

                                {{--                                    {!! Form::select('is_paddy',[''=>'--- ধান ---']+\App\Common::getYesNoType(),Input::old('is_paddy',isset($question->is_paddy)?$question->is_paddy:''), array('id' => 'is_paddy', 'class' => 'form-control')) !!}--}}
                                {{--{!! Form::select('is_jute',[''=>'--- পাট ---']+\App\Common::getYesNoType(),Input::old('is_jute',isset($question->is_jute)?$question->is_jute:''), array('id' => 'is_jute', 'class' => 'form-control')) !!}--}}
                                {{--{!! Form::select('is_wheat',[''=>'--- গম ---']+\App\Common::getYesNoType(),Input::old('is_wheat',isset($question->is_wheat)?$question->is_wheat:''), array('id' => 'is_wheat', 'class' => 'form-control')) !!}--}}
                                {{--{!! Form::select('is_root',[''=>'--- কচু ---']+\App\Common::getYesNoType(),Input::old('is_root',isset($question->is_root)?$question->is_root:''), array('id' => 'is_root', 'class' => 'form-control')) !!}--}}
                                {!! Form::text('farming_name', Input::old('farming_name',isset($question->farming_name)?$question->farming_name:''),array('id'=>'farming_name','class' => 'form-control','placeholder'=>'অন্যান্য (নির্দিষ্ট করে বলুন)')) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-xs-4 control-label">অসুস্থ হবার পূর্বের ১৫ দিনের ভিতর <span class="is_patient2">আপনি / রোগী</span> কি নিজে
                                সরাসরি কোন ধরনের চাষাবাদের জন্য মাঠে কাজ করতেন?</label>
                            <div class="col-xs-4">
                                <label class='col-md-12'><span class="col-md-4">ধান</span>  {!! @App\Common::radioButtonGenerate(\App\Common::getYesNoDontKnow(), 'is_paddy_working',0,$question->is_paddy_working,false) !!}</label>
                                <label class='col-md-12'><span class="col-md-4">পাট</span>  {!! @App\Common::radioButtonGenerate(\App\Common::getYesNoDontKnow(), 'is_jute_working',0,$question->is_jute_working,false) !!} </label>
                                <label class='col-md-12'><span class="col-md-4">গম</span>  {!! @App\Common::radioButtonGenerate(\App\Common::getYesNoDontKnow(), 'is_wheat_working',0,$question->is_wheat_working,false) !!}</label>
                                <label class='col-md-12'><span class="col-md-4">কচু</span>  {!! @App\Common::radioButtonGenerate(\App\Common::getYesNoDontKnow(), 'is_root_working',0,$question->is_root_working,false) !!}</label>

                                {{--{!! Form::select('is_paddy_working',[''=>'--- ধান ---']+\App\Common::getYesNoType(),Input::old('is_paddy_working',isset($question->is_paddy_working)?$question->is_paddy_working:''), array('id' => 'is_paddy_working', 'class' => 'form-control')) !!}--}}
                                {{--{!! Form::select('is_jute_working',[''=>'--- পাট ---']+\App\Common::getYesNoType(),Input::old('is_jute_working',isset($question->is_jute_working)?$question->is_jute_working:''), array('id' => 'is_jute_working', 'class' => 'form-control')) !!}--}}
                                {{--{!! Form::select('is_wheat_working',[''=>'--- গম ---']+\App\Common::getYesNoType(),Input::old('is_wheat_working',isset($question->is_wheat_working)?$question->is_wheat_working:''), array('id' => 'is_wheat_working', 'class' => 'form-control')) !!}--}}
                                {{--{!! Form::select('is_root_working',[''=>'--- কচু ---']+\App\Common::getYesNoType(),Input::old('is_root_working',isset($question->is_root_working)?$question->is_root_working:''), array('id' => 'is_root_working', 'class' => 'form-control')) !!}--}}
                                {!! Form::text('farming_name_working', Input::old('farming_name_working',isset($question->farming_name_working)?$question->farming_name_working:''),array('id'=>'farming_name_working','class' => 'form-control','placeholder'=>'অন্যান্য (নির্দিষ্ট করে বলুন)')) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-4 control-label"><span class="is_patient2">আপনি / রোগী</span> যখন অসুস্থ <span class="is_patient3">হন/ হয়</span>, তখন <span class="is_patient4">আপনার / তার</span>
                                বাড়ির ১০০ গজের মধ্যে নিম্নলিখিত কোন জলাশয় ছিল কি?
                            </label>
                            <div class="col-xs-4">
                                <label class='col-md-12'><span class="col-md-4">পুকুর</span>  {!! @App\Common::radioButtonGenerate(\App\Common::getYesNoDontKnow(), 'is_pond',0,$question->is_pond,false) !!}</label>
                                <label class='col-md-12'><span class="col-md-4">কুয়া/ইঁদারা</span>  {!! @App\Common::radioButtonGenerate(\App\Common::getYesNoDontKnow(), 'is_well',0,$question->is_well,false) !!} </label>
                                <label class='col-md-12'><span class="col-md-4">বিল</span>  {!! @App\Common::radioButtonGenerate(\App\Common::getYesNoDontKnow(), 'is_fen',0,$question->is_fen,false) !!}</label>
                                <label class='col-md-12'><span class="col-md-4">ড্রেন/নর্দমা</span>  {!! @App\Common::radioButtonGenerate(\App\Common::getYesNoDontKnow(), 'is_drain',0,$question->is_drain,false) !!}</label>

                                {{--{!! Form::select('is_pond',[''=>'--- পুকুর ---']+\App\Common::getYesNoType(),Input::old('is_pond',isset($question->is_pond)?$question->is_pond:''), array('id' => 'is_pond', 'class' => 'form-control')) !!}--}}
                                {{--{!! Form::select('is_well',[''=>'--- কুয়া/ইঁদারা ---']+\App\Common::getYesNoType(),Input::old('is_well',isset($question->is_well)?$question->is_well:''), array('id' => 'is_well', 'class' => 'form-control')) !!}--}}
                                {{--{!! Form::select('is_fen',[''=>'--- বিল ---']+\App\Common::getYesNoType(),Input::old('is_fen',isset($question->is_fen)?$question->is_fen:''), array('id' => 'is_fen', 'class' => 'form-control')) !!}--}}
                                {{--{!! Form::select('is_drain',[''=>'--- ড্রেন/নর্দমা ---']+\App\Common::getYesNoType(),Input::old('is_drain',isset($question->is_drain)?$question->is_drain:''), array('id' => 'is_drain', 'class' => 'form-control')) !!}--}}
                                {!! Form::text('reservoir_name', Input::old('reservoir_name',isset($question->reservoir_name)?$question->reservoir_name:''),array('id'=>'reservoir_name','class' => 'form-control','placeholder'=>'অন্যান্য (নির্দিষ্ট করে বলুন)')) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-4 control-label"><span class="is_patient2">আপনি / রোগী</span> যখন অসুস্থ <span class="is_patient3">হন/ হয়</span>, তার পূর্বের ১৫ দিনের ভিতর <span class="is_patient2">আপনি / রোগী</span> সূর্যাস্তের পর বাড়ির বাইরে কতবার গিয়েছিলেন?
                            </label>
                            <div class="col-xs-4">
                                {!! Form::select('outward_house',[''=>'---------------']+\App\Common::getOutOfTheHouse(),Input::old('outward_house',isset($question->outward_house)?$question->outward_house:''), array('id' => 'outward_house', 'class' => 'form-control')) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-4 control-label"><span class="is_patient2">আপনি / রোগী</span> বাড়ির বাইরে কোন কাজে
                                গিয়েছিলেন?</label>
                            <div class="col-xs-4">
                                {!! Form::select('outward_house_type',[''=>'---------------']+\App\Common::getOutOfTheHouseReason(),Input::old('outward_house_type',isset($question->outward_house_type)?$question->outward_house_type:''), array('id' => 'outward_house_type', 'class' => 'form-control')) !!}
                                {!! Form::text('outward_house_reason', Input::old('outward_house_reason',isset($question->outward_house_reason)?$question->outward_house_reason:''),array('id'=>'outward_house_reason','class' => 'form-control','placeholder'=>'অন্যান্য (নির্দিষ্ট করে বলুন)')) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-4 control-label"><span class="is_patient2">আপনি / রোগী</span> যখন অসুস্থ <span class="is_patient3">হন/ হয়</span> তার পূর্বের ১৫ দিনের ভিতর <span class="is_patient2">আপনি / রোগী</span> রাতে ঘুমানোর সময় কি মশারী ব্যবহার করতেন?
                            </label>
                            <div class="col-xs-4">
                                {!! @App\Common::radioButtonGenerate(\App\Common::getYesNoDontKnow(), 'mosquito_net',0,$question->mosquito_net,false) !!}
                                {{--                                    {!! Form::select('mosquito_net',/*[''=>'--- ঘুমানোর সময় কি মশারী ব্যবহার করতেন? ---']+*/\App\Common::getYesNoDontKnow(),Input::old('mosquito_net',isset($question->mosquito_net)?$question->mosquito_net:''), array('id' => 'mosquito_net', 'class' => 'form-control')) !!}--}}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-4 control-label"><span class="is_patient2">আপনি / রোগী</span> যখন অসুস্থ <span class="is_patient3">হন/ হয়</span> তার পূর্বের ১৫ দিনের ভিতর <span class="is_patient5">আপনাদের/ রোগীর</span> বাড়ির আশেপাশে অথবা <span class="is_patient2">আপনি / রোগী</span> বাড়ির বাইরে যে সকল স্থানে
                                আবস্থান করতেন (বাজার, উপসানালয়, কর্মক্ষেত্র অথবা খেলার মাঠ ইত্যাদি), তার আশেপাশে ১০০
                                গজের মধ্যে কি নিম্নলিখিত পাখির সমাগম হয়েছিল?</label>
                            <div class="col-xs-4">
                                <label class="col-md-12"><span class="col-md-4">বক </span>  {!! @App\Common::radioButtonGenerate(\App\Common::getYesNoDontKnow(), 'is_egret',0,$question->is_egret,false) !!}</label>
                                <label class="col-md-12"><span class="col-md-4">সারস </span> {!! @App\Common::radioButtonGenerate(\App\Common::getYesNoDontKnow(), 'is_juicy',0,$question->is_juicy,false) !!}</label>
                                <label class="col-md-12"><span class="col-md-4">অন্যান্য </span> {!! @App\Common::radioButtonGenerate(\App\Common::getYesNoDontKnow(), 'is_others_bird',0,$question->is_others_bird,false) !!}</label>

                                {{--{!! Form::select('is_egret',[''=>'--- বক ---']+\App\Common::getYesNoDontKnow(),Input::old('is_egret',isset($question->is_egret)?$question->is_egret:''), array('id' => 'is_egret', 'class' => 'form-control')) !!}--}}
                                {{--{!! Form::select('is_juicy',[''=>'--- সারস ---']+\App\Common::getYesNoDontKnow(),Input::old('is_juicy',isset($question->is_juicy)?$question->is_juicy:''), array('id' => 'is_juicy', 'class' => 'form-control')) !!}--}}
                                {{--{!! Form::select('is_others_bird',[''=>'--- অন্যান্য ---']+\App\Common::getYesNoDontKnow(),Input::old('is_others_bird',isset($question->is_others_bird)?$question->is_others_bird:''), array('id' => 'is_others_bird', 'class' => 'form-control')) !!}--}}
                                {!! Form::text('others_bird', Input::old('others_bird',isset($question->others_bird)?$question->others_bird:''),array('id'=>'others_bird','class' => 'form-control','placeholder'=>'অন্যান্য (নির্দিষ্ট করে বলুন)')) !!}
                            </div>
                        </div>
                    </div>
                    <div class="wizard-pane" role="tabpanel">
                        <div class="form-group">
                            <label class="col-xs-8 control-label"><span class="is_patient2">আপনি / রোগী</span> যখন অসুস্থ <span class="is_patient3">হন/ হয়</span> তার পূর্বের ১৫ দিনের ভিতর <span class="is_patient1">আপনার / রোগীর</span> বাড়ীতে কি কি গবাদি পশু/ হাঁস-মুরগি ও অন্যান্য পশু-পাখি ছিল?</label>
                            <div class="col-xs-8">
                                <table class="table table-bordered">
                                    <thead class="text-center">
                                    <tr >
                                        <th rowspan="2" class="text-center">গবাদি পশু, হাঁস-মুরগি ও অন্যান্য পশু-পাখির নাম</th>
                                        <th rowspan="2" class="text-center">সংখ্যা</th>
                                        <th colspan="2" class="text-center">পশু রাখার ব্যবস্থা</th>
                                    </tr>
                                    <tr>
                                        <th class="text-center">শোবার ঘরের সাথে</th>
                                        <th class="text-center">আলাদা ঘরে</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(isset($question))
                                        @foreach($question->ownerHomeDomisticAnimal as $key=>$domestic)
                                            <tr>
                                                <td>{!! Form::text('home_name_of_animal[]', Input::old('home_name_of_animal['.$key.']',isset($domestic->name_of_animal)?$domestic->name_of_animal:''),array('id'=>'home_name_of_animal','class' => 'home_name_of_animal form-control','placeholder'=>'')) !!}</td>
                                                <td>{!! @App\Common::radioButtonGenerateJs(\App\Common::getYesNoDontKnow(), 'is_home_no_of_animal_'.$key,0,Input::old('is_home_no_of_animal',isset($domestic->is_neighbour)?$domestic->is_neighbour:''),false, 'getLock(this)') !!}{!! Form::text('home_no_of_animal[]', Input::old('home_no_of_animal['.$key.']',isset($domestic->no_of_animal)?$domestic->no_of_animal:''),array('id'=>'home_no_of_animal','class' => 'home_no_of_animal form-control','placeholder'=>'সংখ্যা',isset($domestic->is_neighbour)&&$domestic->is_neighbour==1?'':'disabled="disabled"')) !!}</td>
                                                <td>{!! Form::checkbox('home_on_of_animal_home[]', Input::old('home_on_of_animal_home['.$key.']',isset($domestic->on_of_animal_home)?$domestic->on_of_animal_home:1),isset($domestic->on_of_animal_home)&&$domestic->on_of_animal_home==1?'checked':null,array('id'=>'home_on_of_animal_home','class' => 'home_on_of_animal_home_'.($key).' form-control','placeholder'=>'সংখ্যা')) !!}</td>
                                                <td>{!! Form::checkbox('home_on_of_animal_outside[]', Input::old('home_on_of_animal_outside['.$key.']',isset($domestic->on_of_animal_outside)?$domestic->on_of_animal_outside:1),isset($domestic->on_of_animal_outside)&&$domestic->on_of_animal_outside==1?'checked':null,array('id'=>'home_on_of_animal_outside','class' => 'home_on_of_animal_outside_'.($key).' form-control','placeholder'=>'সংখ্যা')) !!}</td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td>{!! Form::text('home_name_of_animal[]', Input::old('home_name_of_animal['.($key+1).']',isset($home_animals->name_of_animal)?$home_animals->name_of_animal:''),array('id'=>'home_name_of_animal','class' => 'home_name_of_animal form-control','placeholder'=>'অন্যান্য (নির্দিষ্ট করে বলুন)')) !!}</td>
                                            <td>{!! @App\Common::radioButtonGenerateJs(\App\Common::getYesNoDontKnow(), 'is_home_no_of_animal_'.($key+1),0,Input::old('is_home_no_of_animal',isset($domestic->is_neighbour)?$domestic->is_neighbour:''),false, 'getLock(this)') !!}{!! Form::text('home_no_of_animal[]', Input::old('home_no_of_animal['.($key+1).']',isset($home_animals->no_of_animal)?$home_animals->no_of_animal:''),array('id'=>'home_no_of_animal','class' => 'home_no_of_animal form-control','placeholder'=>'সংখ্যা',isset($domestic->is_neighbour)&&$domestic->is_neighbour==1?'':'disabled="disabled"')) !!}</td>
                                            <td>{!! Form::checkbox('home_on_of_animal_home[]', Input::old('home_on_of_animal_home['.($key+1).']',isset($home_animals->on_of_animal_home)?$home_animals->on_of_animal_home:1),null,array('id'=>'home_on_of_animal_home','class' => 'home_on_of_animal_home_'.($key+1).' form-control','placeholder'=>'সংখ্যা')) !!}</td>
                                            <td>{!! Form::checkbox('home_on_of_animal_outside[]', Input::old('home_on_of_animal_outside['.($key+1).']',isset($home_animals->on_of_animal_outside)?$home_animals->on_of_animal_outside:1),null,array('id'=>'home_on_of_animal_outside','class' => 'home_on_of_animal_outside_'.($key+1).' form-control','placeholder'=>'সংখ্যা')) !!}</td>
                                        </tr>
                                    @else
                                        @foreach(\App\Common::getDomesticAnimal() as $key=>$domestic)
                                            <tr>
                                                <td>{!! Form::text('home_name_of_animal[]', Input::old('home_name_of_animal['.$key.']',isset($home_animals->name_of_animal)?$home_animals->name_of_animal:$domestic),array('id'=>'home_name_of_animal','class' => 'home_name_of_animal form-control','placeholder'=>'')) !!}</td>
                                                <td>{!! @App\Common::radioButtonGenerateJs(\App\Common::getYesNoDontKnow(), 'is_home_no_of_animal_'.$key,0,Input::old('is_home_no_of_animal',isset($domestic->is_neighbour)?$domestic->is_neighbour:''),false, 'getLock(this)') !!}{!! Form::text('home_no_of_animal[]', Input::old('home_no_of_animal['.$key.']',isset($domestic->no_of_animal)?$domestic->no_of_animal:''),array('id'=>'home_no_of_animal','class' => 'home_no_of_animal form-control','placeholder'=>'সংখ্যা',isset($domestic->is_neighbour)&&$domestic->is_neighbour==1?'':'disabled="disabled"')) !!}</td>
                                                <td>{!! Form::checkbox('home_on_of_animal_home[]', Input::old('home_on_of_animal_home['.$key.']',isset($home_animals->on_of_animal_home)?$home_animals->on_of_animal_home:1),isset($domestic->on_of_animal_home)&&$domestic->on_of_animal_home==1?'checked':null,array('id'=>'home_on_of_animal_home','class' => 'home_on_of_animal_home_'.($key).' form-control','placeholder'=>'সংখ্যা')) !!}</td>
                                                <td>{!! Form::checkbox('home_on_of_animal_outside[]', Input::old('home_on_of_animal_outside['.$key.']',isset($home_animals->on_of_animal_outside)?$home_animals->on_of_animal_outside:1),isset($domestic->on_of_animal_outside)&&$domestic->on_of_animal_outside==1?'checked':null,array('id'=>'home_on_of_animal_outside','class' => 'home_on_of_animal_outside_'.($key).' form-control','placeholder'=>'সংখ্যা')) !!}</td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td>{!! Form::text('home_name_of_animal[]', Input::old('home_name_of_animal['.($key+1).']',isset($home_animals->name_of_animal)?$home_animals->name_of_animal:''),array('id'=>'home_name_of_animal','class' => 'home_name_of_animal form-control','placeholder'=>'অন্যান্য (নির্দিষ্ট করে বলুন)')) !!}</td>
                                            <td>{!! @App\Common::radioButtonGenerateJs(\App\Common::getYesNoDontKnow(), 'is_home_no_of_animal_'.($key+1),0,Input::old('is_home_no_of_animal',isset($domestic->is_neighbour)?$domestic->is_neighbour:''),false, 'getLock(this)') !!}{!! Form::text('home_no_of_animal[]', Input::old('home_no_of_animal['.($key+1).']',isset($home_animals->no_of_animal)?$home_animals->no_of_animal:''),array('id'=>'home_no_of_animal','class' => 'home_no_of_animal form-control','placeholder'=>'সংখ্যা',isset($domestic->is_neighbour)&&$domestic->is_neighbour==1?'':'disabled="disabled"')) !!}</td>
                                            <td>{!! Form::checkbox('home_on_of_animal_home[]', Input::old('home_on_of_animal_home['.($key+1).']',isset($home_animals->on_of_animal_home)?$home_animals->on_of_animal_home:1),null,array('id'=>'home_on_of_animal_home','class' => 'home_on_of_animal_home_'.($key+1).' form-control','placeholder'=>'সংখ্যা')) !!}</td>
                                            <td>{!! Form::checkbox('home_on_of_animal_outside[]', Input::old('home_on_of_animal_outside['.($key+1).']',isset($home_animals->on_of_animal_outside)?$home_animals->on_of_animal_outside:1),null,array('id'=>'home_on_of_animal_outside','class' => 'home_on_of_animal_outside_'.($key+1).' form-control','placeholder'=>'সংখ্যা')) !!}</td>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-4 control-label">অসুস্থ হবার পূর্বের ১৫ দিনের ভিতর, <span class="is_patient2">আপনি / রোগী</span>  কি নিজে সরাসরি কোন ধরনের পশু/ পাখি পালনের সাথে জড়িত ছিল?</label>
                            <div class="col-xs-4">
                                {!! @App\Common::radioButtonGenerate(\App\Common::getYesNoDontKnow(), 'is_domestic_animal_husbandry',0,$question->is_domestic_animal_husbandry,false) !!}
                                {{--                                    {!! Form::select('is_domestic_animal_husbandry',[''=>'--- পশু/ পাখি পালনের সাথে জড়িত ছিল?---']+\App\Common::getYesNoType(),Input::old('is_domestic_animal_husbandry',isset($question->is_domestic_animal_husbandry)?$question->is_domestic_animal_husbandry:''), array('id' => 'is_domestic_animal_husbandry', 'class' => 'form-control')) !!}--}}
                                {!! Form::text('name_of_animal', Input::old('name_of_animal',isset($question->name_of_animal)?$question->name_of_animal:''),array('id'=>'name_of_animal','class' => 'form-control','placeholder'=>'কোন ধরনের পশু/ পাখি (নির্দিষ্ট করে বলুন)')) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-xs-8 control-label"><span class="is_patient2">আপনি / রোগী</span> যখন অসুস্থ <span class="is_patient3">হন/ হয়</span> তার পূর্বের ১৫ দিনের ভিতর <span class="is_patient1">আপনার/রোগীর </span> বাড়ীর পার্শ্ববর্তী বাড়িগুলোতে কি কি গবাদি পশু/ হাঁস-মুরগি ও অন্যান্য পশু-পাখি ছিল?</label>
                            <div class="col-xs-8">
                                <table class="table table-bordered">
                                    <thead class="text-center">
                                    <tr >
                                        <th class="text-center">গবাদি পশু, হাঁস-মুরগি ও অন্যান্য পশু-পাখির নাম</th>
                                        <th class="text-center">হ্যাঁ/না</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(isset($question))
                                        @foreach($question->neighbourDomisticAnimal as $key=>$domestic)
                                            <tr>
                                                <td>{!! Form::text('neighbour_name_of_animal[]', Input::old('neighbour_name_of_animal['.$key.']',isset($domestic->name_of_animal)?$domestic->name_of_animal:''),array('id'=>'neighbour_name_of_animal','class' => 'neighbour_name_of_animal form-control','placeholder'=>'অন্যান্য (নির্দিষ্ট করে বলুন)')) !!}</td>
                                                <td>
                                                    {!! @App\Common::radioButtonGenerate(\App\Common::getYesNoDontKnow(), 'is_neighbour_'.$key,0,Input::old('is_neighbour',isset($domestic->is_neighbour)?$domestic->is_neighbour:''),false) !!}

                                                    {{--                                                        {!! Form::select('is_neighbour[]',[''=>'--- হ্যাঁ/না ---']+\App\Common::getYesNoType(),Input::old('is_neighbour',isset($domestic->is_neighbour)?$domestic->is_neighbour:''), array('id' => 'is_neighbour', 'class' => 'form-control is_neighbour')) !!}--}}
                                                </td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td>{!! Form::text('neighbour_name_of_animal[]', Input::old('neighbour_name_of_animal['.$key.']',isset($domestic->neighbour_of_animal)?$domestic->neighbour_of_animal:''),array('id'=>'neighbour_name_of_animal','class' => 'neighbour_name_of_animal form-control','placeholder'=>'অন্যান্য (নির্দিষ্ট করে বলুন)')) !!}</td>
                                            <td>
                                                {!! @App\Common::radioButtonGenerate(\App\Common::getYesNoDontKnow(), 'is_neighbour_'.($key+1),0,'',false) !!}
                                                {{--{!! Form::select('is_neighbour[]',[''=>'--- হ্যাঁ/না ---']+\App\Common::getYesNoType(),Input::old('is_neighbour',isset($domestic->is_neighbour)?$domestic->is_neighbour:''), array('id' => 'is_neighbour', 'class' => 'form-control is_neighbour')) !!}--}}
                                            </td>
                                        </tr>
                                    @else
                                        @foreach(\App\Common::getDomesticAnimal() as $key=>$domestic)
                                            <tr>
                                                <td>{!! Form::text('neighbour_name_of_animal[]', Input::old('neighbour_name_of_animal['.$key.']',isset($domestic->neighbour_of_animal)?$domestic->neighbour_of_animal:$domestic),array('id'=>'neighbour_name_of_animal','class' => 'neighbour_name_of_animal form-control','placeholder'=>'অন্যান্য (নির্দিষ্ট করে বলুন)')) !!}</td>
                                                <td>
                                                    {!! @App\Common::radioButtonGenerate(\App\Common::getYesNoDontKnow(), 'is_neighbour_'.$key,0,Input::old('is_neighbour',isset($domestic->is_neighbour)?$domestic->is_neighbour:''),false) !!}
                                                    {{--                                                        {!! Form::select('is_neighbour[]',[''=>'--- হ্যাঁ/না ---']+\App\Common::getYesNoType(),Input::old('is_neighbour',isset($domestic->is_neighbour)?$domestic->is_neighbour:''), array('id' => 'is_neighbour', 'class' => 'form-control is_neighbour')) !!}--}}
                                                </td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td>{!! Form::text('neighbour_name_of_animal[]', Input::old('neighbour_name_of_animal['.$key.']',isset($domestic->neighbour_of_animal)?$domestic->neighbour_of_animal:''),array('id'=>'neighbour_name_of_animal','class' => 'neighbour_name_of_animal form-control','placeholder'=>'অন্যান্য (নির্দিষ্ট করে বলুন)')) !!}</td>
                                            <td>
                                                {!! @App\Common::radioButtonGenerate(\App\Common::getYesNoDontKnow(), 'is_neighbour_'.($key+1),0,'',false) !!}
                                                {{--{!! Form::select('is_neighbour[]',[''=>'--- হ্যাঁ/না ---']+\App\Common::getYesNoType(),Input::old('is_neighbour',isset($domestic->is_neighbour)?$domestic->is_neighbour:''), array('id' => 'is_neighbour', 'class' => 'form-control is_neighbour')) !!}--}}
                                            </td>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                    <div class="wizard-pane" role="tabpanel">
                        <div class="form-group">
                            <label class="col-xs-4 control-label"><span class="is_patient2">আপনি / রোগী</span> যখন অসুস্থ <span class="is_patient3">হন/ হয়</span> তার পূর্বের ১৫ দিনের ভিতর <span class="is_patient6">আপনি / আপনার রোগী</span> এই উপজেলা/ থানা/ পৌরসভার বাইরে কি কোথাও ঘুরতে গিয়েছিল?</label>
                            <div class="col-xs-4">
                                {!! @App\Common::radioButtonGenerate(\App\Common::getYesNoDontKnow(), 'visting_type',0,Input::old('visting_type',isset($question->visting_type)?$question->visting_type:''),false) !!}<br>

                                {{--                                {!! Form::select('visting_type',/*[''=>'--- উপজেলা/ থানা/ পৌরসভার বাইরে কি কোথাও ঘুরতে গিয়েছিল?---']+*/\App\Common::getYesNoType(),Input::old('visting_type',isset($question->visting_type)?$question->visting_type:''), array('id' => 'visting_type', 'class' => 'form-control')) !!}--}}
                                <div class="col-xs-6" style="padding: 0">
                                    {!! Form::text('district', Input::old('district',isset($question->district)?$question->district:''),array('id'=>'district','class' => 'form-control','placeholder'=>'জেলা')) !!}
                                </div>
                                <div class="col-xs-6" style="padding: 0">
                                    {!! Form::text('upazila', Input::old('upazila',isset($question->upazila)?$question->upazila:''),array('id'=>'upazila','class' => 'form-control','placeholder'=>'উপজেলা')) !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-8 control-label"><span class="is_patient2">আপনি / রোগী</span> যখন অসুস্থ <span class="is_patient3">হন/ হয়</span> তার পূর্বের ১৫ দিনের ভিতর <span class="is_patient2">আপনি / রোগী</span> যে বাড়িতে বসবাস করতেন সে  সম্পর্কে একটু বলবেন কি? </label>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-4 control-label">মেঝে</label>
                            <div class="col-xs-4">
                                {!! Form::select('floor_type',[''=>'---------------']+\App\Common::getHouseFloor(),Input::old('floor_type',isset($question->floor_type)?$question->floor_type:''), array('id' => 'floor_type', 'class' => 'form-control')) !!}
                                {!! Form::text('floor_name', Input::old('floor_name',isset($question->floor_name)?$question->floor_name:''),array('id'=>'floor_name','class' => 'form-control','placeholder'=>'নির্দিষ্ট করে বলুন')) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-4 control-label">দেওয়াল</label>
                            <div class="col-xs-4">
                                {!! Form::select('wall_type',[''=>'---------------']+\App\Common::getHouseWall(),Input::old('wall_type',isset($question->wall_type)?$question->wall_type:''), array('id' => 'wall_type', 'class' => 'form-control')) !!}
                                {!! Form::text('wall_name', Input::old('wall_name',isset($question->wall_name)?$question->wall_name:''),array('id'=>'wall_name','class' => 'form-control','placeholder'=>'নির্দিষ্ট করে বলুন')) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-4 control-label">ছাদ</label>
                            <div class="col-xs-4">
                                {!! Form::select('ceiling_type',[''=>'---------------']+\App\Common::getHouseCeilling(),Input::old('ceiling_type',isset($question->ceiling_type)?$question->ceiling_type:''), array('id' => 'ceiling_type', 'class' => 'form-control')) !!}
                                {!! Form::text('ceiling_name', Input::old('ceiling_name',isset($question->ceiling_name)?$question->ceiling_name:''),array('id'=>'ceiling_name','class' => 'form-control','placeholder'=>'নির্দিষ্ট করে বলুন')) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-4 control-label"><span class="is_patient2">আপনি / রোগী</span> যখন অসুস্থ <span class="is_patient3">হন/ হয়</span> তার পূর্বের ১৫ দিনের ভিতর <span class="is_patient2">আপনি / রোগী</span> যে বাড়িতে বসবাস করতেন, সে বাড়িতে কয়টি রুম ছিল?	(রান্না ঘর ও বাথরুম ব্যতীত)</label>
                            <div class="col-xs-4">
                                {!! Form::number('bedroom', Input::old('bedroom',isset($question->bedroom)?$question->bedroom:''),array("min"=>0,'id'=>'bedroom','class' => 'form-control','placeholder'=>'রান্না ঘর ও বাথরুম ব্যতীত রুমের সংখ্যা')) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-8 control-label"><span class="is_patient2">আপনি / রোগী</span> যখন অসুস্থ <span class="is_patient3">হন/ হয়</span> তার পূর্বের ১৫ দিনের ভিতর <span class="is_patient2">আপনি / রোগী</span> যে বাড়িতে বসবাস করতেন, সে বাড়ির নিচের ঘরগুলোর মূল বসত ঘরের সাথে দুরত্ব বলবেন কি? </label>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-4 control-label"> রান্নাঘর</label>
                            <div class="col-xs-4">
                                {!! Form::select('is_kitchen',[''=>'---------------']+\App\Common::getNoneHouseAttachment(),Input::old('is_kitchen',isset($question->is_kitchen)?$question->is_kitchen:''), array('id' => 'is_kitchen', 'class' => 'form-control')) !!}
                                {!! Form::number('kitchen_distance', Input::old('kitchen_distance',isset($question->kitchen_distance)?$question->kitchen_distance:''),array("min"=>1,'id'=>'kitchen_distance','class' => 'form-control','placeholder'=>'দূরত্ব (হাত পরিমাপ)')) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-4 control-label"> গোয়ালঘর</label>
                            <div class="col-xs-4">
                                {!! Form::select('is_cowhouse',[''=>'---------------']+\App\Common::getNoneHouseAttachment(),Input::old('is_cowhouse',isset($question->is_cowhouse)?$question->is_cowhouse:''), array('id' => 'is_cowhouse', 'class' => 'form-control')) !!}
                                {!! Form::number('cowhouse_distance', Input::old('cowhouse_distance',isset($question->cowhouse_distance)?$question->cowhouse_distance:''),array("min"=>1,'id'=>'cowhouse_distance','class' => 'form-control','placeholder'=>'দূরত্ব (হাত পরিমাপ)')) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-4 control-label"> টয়লেট(পায়খানা ঘর)</label>
                            <div class="col-xs-4">
                                {!! Form::select('is_toilet',[''=>'---------------']+\App\Common::getNoneHouseAttachment(),Input::old('is_toilet',isset($question->is_toilet)?$question->is_toilet:''), array('id' => 'is_toilet', 'class' => 'form-control')) !!}
                                {!! Form::number('toilet_distance', Input::old('toilet_distance',isset($question->toilet_distance)?$question->toilet_distance:''),array("min"=>1,'id'=>'toilet_distance','class' => 'form-control','placeholder'=>'দূরত্ব (হাত পরিমাপ)')) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-4 control-label"> পানীয় জলের উৎস</label>
                            <div class="col-xs-4">
                                {!! Form::select('is_water_supply',[''=>'---------------']+\App\Common::getNoneHouseAttachment(),Input::old('is_water_supply',isset($question->is_water_supply)?$question->is_water_supply:''), array('id' => 'is_water_supply', 'class' => 'form-control')) !!}
                                {!! Form::number('water_supply_distance', Input::old('water_supply_distance',isset($question->water_supply_distance)?$question->water_supply_distance:''),array("min"=>1,'id'=>'water_supply_distance','class' => 'form-control','placeholder'=>'দূরত্ব (হাত পরিমাপ)')) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-xs-4 control-label"> বাসার সবগুলো জানালায় কি মশা প্রতিরোধক তারের নেট দেয়া ছিল?</label>
                            <div class="col-xs-4">
                                {!! @App\Common::radioButtonGenerate(\App\Common::getYesNoDontKnow(), 'is_window_mosquito_net',0,Input::old('is_window_mosquito_net',isset($question->is_window_mosquito_net)?$question->is_window_mosquito_net:''),false) !!}

                                {{--                                {!! Form::select('is_window_mosquito_net',/*[''=>'--- ঘুমানোর সময় কি মশারী ব্যবহার করতেন? ---']+*/\App\Common::getYesNoType(),Input::old('is_window_mosquito_net',isset($question->is_window_mosquito_net)?$question->is_window_mosquito_net:''), array('id' => 'is_window_mosquito_net', 'class' => 'form-control')) !!}--}}
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

    <script type="text/javascript">
        (function () {
            ///start on init
            if($('.life_status:checked').val()==1){
                $('#death_period').attr("disabled", "disabled");
                $('#death_period').parent().parent().attr('style','color:#a6a6a6')
                $('.this_disease').attr("disabled", "disabled");
                $('.this_disease').parent().parent().attr('style','color:#a6a6a6')
                $('#death_text').attr("disabled", "disabled");
                $('#death_text').parent().parent().attr('style','color:#a6a6a6')

            }
            if($('.identity:checked').val()!=1) {
                $('.is_patient1').html("আপনার");
                $('.is_patient2').html("আপনি");
                $('.is_patient3').html("হন");
                $('.is_patient4').html("আপনার");
                $('.is_patient5').html("আপনাদের");
                $('.is_patient6').html("আপনি");
                $('.is_patient7').html("");
                $('#provider_name').attr("disabled", "disabled");
                $('#relation_with_patient').attr("disabled", "disabled");
                $('#provider_age').attr("disabled", "disabled");
                $('#provider_name').parent().parent().attr('style','color:#a6a6a6')
                $('#relation_with_patient').parent().parent().attr('style','color:#a6a6a6')
                $('#provider_age').parent().parent().attr('style','color:#a6a6a6')

            }else{
                $('.is_patient1').html("রোগীর");
                $('.is_patient2').html("রোগী");
                $('.is_patient3').html("হয়");
                $('.is_patient4').html("তার");
                $('.is_patient5').html("রোগীর");
                $('.is_patient6').html("আপনার রোগী");
                $('.is_patient7').html("(রোগী মৃত হলে, তাকে সহ গণনা করতে হবে)");
                $('#provider_name').removeAttr("disabled");
                $('#relation_with_patient').removeAttr("disabled");
                $('#provider_age').removeAttr("disabled");

                $('#provider_name').parent().parent().removeAttr('style')
                $('#relation_with_patient').parent().parent().removeAttr('style')
                $('#provider_age').parent().parent().removeAttr('style')
            }
            if($('.is_ethnic:checked').val()==0){
                $('.ethnic_type').attr("disabled", "disabled");
                $('#ethnic_type_text').attr("disabled", "disabled");
                $('.ethnic_type').parent().parent().attr('style','color:#a6a6a6')

            }
            if($('.religion:checked').val()!=77){
                $('#religion_text').attr("disabled", "disabled");
            }
            if($('.ethnic_type:checked').val()!=77){
                $('#ethnic_type_text').attr("disabled", "disabled");
            }
            if($('#educational_background').val()!=77){
                $('#educational_background_text').attr("disabled", "disabled");
            }
            if($('#profession').val()!=77){
                $('#profession_text').attr("disabled", "disabled");
            }
            if($('#father_profession').val()!=77){
                $('#father_profession_text').attr("disabled", "disabled");
            }
            if($('.expenditure_type:checked').val()!=0){
                $('#family_expense').attr("disabled", "disabled");
            }
            if($('.fifteendays_live:checked').val()!=77){
                $('#otherplacetolive').attr("disabled", "disabled");
            }
            if($('#outward_house').val()==0 ||$('#outward_house').val()==77 || $('#outward_house').val()==""){
                $('#outward_house_type').attr("disabled", "disabled");
                $('#outward_house_type').parent().parent().attr('style','color:#a6a6a6')

            }

            if($('#outward_house_type').val()!=77){
                $('#outward_house_reason').attr("disabled", "disabled");
            }
            if($('#is_others_bird').val()==0 || $('#is_others_bird').val()==""){
                $('#others_bird').attr("disabled", "disabled");
            }
            if($('.is_domestic_animal_husbandry').val()==0 || $('.is_domestic_animal_husbandry').val()==""){
                $('#name_of_animal').attr("disabled", "disabled");
            }
            if($('#floor_type').val()!=77){
                $('#floor_name').attr("disabled", "disabled");
            }
            if($('#wall_type').val()!=77){
                $('#wall_name').attr("disabled", "disabled");
            }
            if($('#ceiling_type').val()!=77){
                $('#ceiling_name').attr("disabled", "disabled");
            }

            if($('#is_kitchen').val()!=1){
                $('#kitchen_distance').attr("disabled", "disabled");
            }
            if($('#is_cowhouse').val()!=1){
                $('#cowhouse_distance').attr("disabled", "disabled");
            }
            if($('#is_toilet').val()!=1){
                $('#toilet_distance').attr("disabled", "disabled");
            }
            if($('#is_water_supply').val()!=1){
                $('#water_supply_distance').attr("disabled", "disabled");
            }
            if($('.visting_type:checked').val()!=1){
                $('#district').attr("disabled", "disabled");
                $('#upazila').attr("disabled", "disabled");
            }
            if($('#p_age').val()>18){
                $('#father_profession').attr("disabled", "disabled");
                $('#father_profession').parent().parent().attr('style','color:#a6a6a6')
            }
//                if($('.health_condition_status:checked').indexOf('অন্যান্য')==-1){
//                    $('#health_condition_status_others').attr("disabled", "disabled");
//                }

            if($("#call_status").val()=="0") {
                $("#date").removeAttr("disabled");
                $("#time").removeAttr("disabled");
            }else{
                $("#date").attr('disabled', 'disabled');
                $("#time").attr('disabled', 'disabled');
            }
            ///end on init

            $('.life_status').on('change', function(){ // on change of state
                if(this.value==1) {
                    $('#death_period').attr("disabled", "disabled");
                    $('#death_period').parent().parent().attr('style','color:#a6a6a6')
                    $('.this_disease').attr("disabled", "disabled");
                    $('.this_disease').parent().parent().attr('style','color:#a6a6a6')
                    $('#death_text').attr("disabled", "disabled");
                    $('#death_text').parent().parent().attr('style','color:#a6a6a6')
                }
                else{
                    $('#death_period').removeAttr("disabled", "disabled");
                    $('#death_period').parent().parent().removeAttr('style')
                    $('.this_disease').removeAttr("disabled", "disabled");
                    $('.this_disease').parent().parent().removeAttr('style')
                    $('#death_text').removeAttr("disabled", "disabled");
                    $('#death_text').parent().parent().removeAttr('style')
                }
            });

            $('.identity').change(function () {
                if($(this).val()==1){
                    $('.is_patient1').html("রোগীর");
                    $('.is_patient2').html("রোগী");
                    $('.is_patient3').html("হয়");
                    $('.is_patient4').html("তার");
                    $('.is_patient5').html("রোগীর");
                    $('.is_patient6').html("আপনার রোগী");
                    $('.is_patient7').html("(রোগী মৃত হলে, তাকে সহ গণনা করতে হবে)");
                    $('#provider_name').removeAttr("disabled");
                    $('#relation_with_patient').removeAttr("disabled");
                    $('#provider_age').removeAttr("disabled");

                    $('#provider_name').parent().parent().removeAttr('style')
                    $('#relation_with_patient').parent().parent().removeAttr('style')
                    $('#provider_age').parent().parent().removeAttr('style')
                }
                else if($(this).val()==0){
                    $('.is_patient1').html("আপনার");
                    $('.is_patient2').html("আপনি");
                    $('.is_patient3').html("হন");
                    $('.is_patient4').html("আপনার");
                    $('.is_patient5').html("আপনাদের");
                    $('.is_patient6').html("আপনি");
                    $('.is_patient7').html("");

                    $('#provider_name').attr("disabled", "disabled");
                    $('#relation_with_patient').attr("disabled", "disabled");
                    $('#provider_age').attr("disabled", "disabled");

                    $('#provider_name').parent().parent().attr('style','color:#a6a6a6')
                    $('#relation_with_patient').parent().parent().attr('style','color:#a6a6a6')
                    $('#provider_age').parent().parent().attr('style','color:#a6a6a6')
                }
            });

            $('.health_condition_status').on('change', function(){ // on change of state
                if(this.value=='অন্যান্য') {
                    if (this.checked == true)$('#health_condition_status_others').children().removeAttr("disabled");
                    else  $('#health_condition_status_others').children().attr("disabled", "disabled");
                }
            });
            $('.is_ethnic').change(function () {
                if($(this).val()==1){
                    $('.ethnic_type').removeAttr("disabled");
                    $('.ethnic_type').parent().parent().removeAttr('style')
                }
                else if($(this).val()==0){
                    $('.ethnic_type').attr("disabled", "disabled");
                    $('.ethnic_type').parent().parent().attr('style','color:#a6a6a6')
                }
            });
            $('.religion').change(function () {
                if($(this).val()==77){
                    $('#religion_text').removeAttr("disabled");
                }
                else{
                    $('#religion_text').attr("disabled", "disabled");
                }
            });
            $('.ethnic_type').change(function () {
                if($(this).val()==77){
                    $('#ethnic_type_text').removeAttr("disabled");
                }
                else{
                    $('#ethnic_type_text').attr("disabled", "disabled");
                }
            });
            $('#profession').change(function () {
                if($('#profession').val()==77){
                    $('#profession_text').removeAttr("disabled");
                }
                else{
                    $('#profession_text').attr("disabled", "disabled");
                }
            });
            $('#father_profession').change(function () {
                if($('#father_profession').val()==77){
                    $('#father_profession_text').removeAttr("disabled");
                }
                else{
                    $('#father_profession_text').attr("disabled", "disabled");
                }
            });
            $('.expenditure_type').change(function () {
                if($(this).val()==0){
                    $('#family_expense').removeAttr("disabled");
                }
                else{
                    $('#family_expense').attr("disabled", "disabled");
                }
            });

            $('.fifteendays_live').change(function () {
                if($(this).val()==77){
                    $('#otherplacetolive').removeAttr("disabled");
                }
                else{
                    $('#otherplacetolive').attr("disabled", "disabled");
                }
            });
            $('#p_age').change(function () {
                if($('#p_age').val()>18){
                    $('#father_profession').attr("disabled", "disabled");
                }else{
                    $('#father_profession').removeAttr("disabled");
                }
            });
            $('#educational_background').change(function () {
                if($('#educational_background').val()==77){
                    $('#educational_background_text').removeAttr("disabled");
                }
                else{
                    $('#educational_background_text').attr("disabled", "disabled");
                }
            });
            $('#outward_house').change(function () {
                if($('#outward_house').val()!=0 && $('#outward_house').val()!=77){
                    $('#outward_house_type').removeAttr("disabled");
                    $('#outward_house_type').parent().parent().removeAttr('style');

                }
                else{
                    $('#outward_house_type').attr("disabled", "disabled");
                    $('#outward_house_type').parent().parent().attr('style','color:#a6a6a6');
                }
            });

            $('#outward_house_type').change(function () {
                if($('#outward_house_type').val()==77){
                    $('#outward_house_reason').removeAttr("disabled");
                }
                else{
                    $('#outward_house_reason').attr("disabled", "disabled");
                }
            });
            $('#is_others_bird').change(function () {
                if($('#is_others_bird').val()==1){
                    $('#others_bird').removeAttr("disabled");
                }
                else{
                    $('#others_bird').attr("disabled", "disabled");
                }
            });
            $('.is_domestic_animal_husbandry').change(function () {
                if($(this).val()==1){
                    $('#name_of_animal').removeAttr("disabled");
                }
                else{
                    $('#name_of_animal').attr("disabled", "disabled");
                }
            });

            $('#floor_type').change(function () {
                if($('#floor_type').val()==77){
                    $('#floor_name').removeAttr("disabled");
                }
                else{
                    $('#floor_name').attr("disabled", "disabled");
                }
            });
            $('#wall_type').change(function () {
                if($('#wall_type').val()==77){
                    $('#wall_name').removeAttr("disabled");
                }
                else{
                    $('#wall_name').attr("disabled", "disabled");
                }
            });
            $('#ceiling_type').change(function () {
                if($('#ceiling_type').val()==77){
                    $('#ceiling_name').removeAttr("disabled");
                }
                else{
                    $('#ceiling_name').attr("disabled", "disabled");
                }
            });
            $('#is_kitchen').change(function () {
                if($('#is_kitchen').val()==1){
                    $('#kitchen_distance').removeAttr("disabled");
                }
                else{
                    $('#kitchen_distance').attr("disabled", "disabled");
                }
            });
            $('#is_cowhouse').change(function () {
                if($('#is_cowhouse').val()==1){
                    $('#cowhouse_distance').removeAttr("disabled");
                }
                else{
                    $('#cowhouse_distance').attr("disabled", "disabled");
                }
            });
            $('#is_toilet').change(function () {
                if($('#is_toilet').val()==1){
                    $('#toilet_distance').removeAttr("disabled");
                }
                else{
                    $('#toilet_distance').attr("disabled", "disabled");
                }
            });
            $('#is_water_supply').change(function () {
                if($('#is_water_supply').val()==1){
                    $('#water_supply_distance').removeAttr("disabled");
                }
                else{
                    $('#water_supply_distance').attr("disabled", "disabled");
                }
            });
            $('.visting_type').change(function () {
                if($(this).val()==1){
                    $('#district').removeAttr("disabled");
                    $('#upazila').removeAttr("disabled");
                }
                else{
                    $('#district').attr("disabled", "disabled");
                    $('#upazila').attr("disabled", "disabled");
                }
            });
            $("#call_status").change(function () {
                if($("#call_status").val()=="0") {
                    $("#date").removeAttr("disabled");
                    $("#time").removeAttr("disabled");
                }else{
                    $("#date").attr('disabled', 'disabled');
                    $("#time").attr('disabled', 'disabled');
                }
            });
//            $("#submit").attr("disabled", "disabled");

            $('#exampleValidator').wizard({
                onInit: function () {
                    $('#validation').formValidation({
                        framework: 'bootstrap',
                        fields: {
                            identity: {
                                validators: {
                                    notEmpty: {
                                        message: 'The identity is required'
                                    },
//                                    stringLength: {
//                                        min: 6,
//                                        max: 30,
//                                        message: 'The username must be more than 6 and less than 30 characters long'
//                                    },
//                                    regexp: {
//                                        regexp: /^[a-zA-Z0-9_\.]+$/,
//                                        message: 'The username can only consist of alphabetical, number, dot and underscore'
//                                    }
                                }
                            },
                            religion: {
                                validators: {
                                    notEmpty: {
                                        message: 'The religion is required'
                                    },
//                                    emailAddress: {
//                                        message: 'The input is not a valid religion'
//                                    }
                                }
                            },
                            profession: {
                                validators: {
                                    notEmpty: {
                                        message: 'The profession is required'
                                    },
//                                    different: {
//                                        field: 'name',
//                                        message: 'The profession cannot be the same as name'
//                                    }
                                }
                            },
                            is_domestic_animal_husbandry: {
                                validators: {
                                    notEmpty: {
                                        message: 'The পশু/ পাখি পালনের সাথে জড়িত ছিল? is required'
                                    },
//                                    different: {
//                                        field: 'name',
//                                        message: 'The profession cannot be the same as name'
//                                    }
                                }
                            },
                            floor_type: {
                                validators: {
                                    notEmpty: {
                                        message: 'The floor type is required'
                                    },
//                                    different: {
//                                        field: 'name',
//                                        message: 'The profession cannot be the same as name'
//                                    }
                                }
                            },
                            wall_type: {
                                validators: {
                                    notEmpty: {
                                        message: 'The wall type is required'
                                    },
//                                    different: {
//                                        field: 'name',
//                                        message: 'The profession cannot be the same as name'
//                                    }
                                }
                            },
                            ceiling_type: {
                                validators: {
                                    notEmpty: {
                                        message: 'The ceiling type is required'
                                    },
//                                    different: {
//                                        field: 'name',
//                                        message: 'The profession cannot be the same as name'
//                                    }
                                }
                            },
                            call_status: {
                                validators: {
                                    notEmpty: {
                                        message: 'The call status is required'
                                    },
//                                    different: {
//                                        field: 'name',
//                                        message: 'The profession cannot be the same as name'
//                                    }
                                }
                            }
                        }
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
                    $("#call_status").append('<option value="1" selected="selected">সাক্ষাৎকার সম্পন্ন হয়েছে</option>');
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
           // $('input').next().focus();
            data_upload(false);
        });
        $('select').change(function(){
            data_upload(false);
        });

        $('#submit_new').click(function(){
           // console.log($('#submit').val());
            data_upload(true);
        });
        function data_upload(is_submit){
            var healthConditionStatus=[];
            var health_condition_status_others=[];
            var home_name_of_animal=[];
            var home_no_of_animal=[];
            var is_home_no_of_animal=[];
            var home_on_of_animal_home=[];
            var home_on_of_animal_outside=[];
            var neighbour_name_of_animal=[];
            var is_neighbour=[];
            $("input[class=health_condition_status]:checked").each(function(){
                healthConditionStatus.push($(this).val());
            });
            $("#health_condition_status_others input").each(function(){
                health_condition_status_others.push($(this).val());
            });

            var i=0;
            $(".home_name_of_animal").each(function(){
                home_name_of_animal.push($(this).val());
                if($(".home_on_of_animal_home_"+i+":checked").val())
                    home_on_of_animal_home.push(1);
                else
                    home_on_of_animal_home.push(0);

                if($(".home_on_of_animal_outside_"+(i)+":checked").val())
                    home_on_of_animal_outside.push(1);
                else
                    home_on_of_animal_outside.push(0);

                if($(".is_home_no_of_animal_"+(i)+":checked").val()==1)
                    is_home_no_of_animal.push(1);
                else if($(".is_home_no_of_animal_"+(i)+":checked").val()==0)
                    is_home_no_of_animal.push(0);
                else if($(".is_home_no_of_animal_"+(i)+":checked").val()==77)
                    is_home_no_of_animal.push(77);
                else is_home_no_of_animal.push(-1);
                i++;
            });
            $(".home_no_of_animal").each(function(){
                home_no_of_animal.push($(this).val());
            });
//            $(".home_on_of_animal_home").each(function(){
//                home_on_of_animal_home.push($(this).val());
//            });
//            $(".home_on_of_animal_outside").each(function(){
//                home_on_of_animal_outside.push($(this).val());
//            });
            var i=0;
            $(".neighbour_name_of_animal").each(function(){
                neighbour_name_of_animal.push($(this).val());
                if($(".is_neighbour_"+(i)+":checked").val()==1)
                    is_neighbour.push(1);
                else if($(".is_neighbour_"+(i)+":checked").val()==0)
                    is_neighbour.push(0);
                else if($(".is_neighbour_"+(i)+":checked").val()==77)
                    is_neighbour.push(77);
                else is_neighbour.push(-1);
                i++;
            });

            if(is_submit==true){
                $.ajax({
                    method: "POST",
                    url: "{{url(session('access').'encephalitis/question/'.$encephalitis->id)}}",
                    data: {
                        life_status: $('.life_status:checked').val(),
                        hospital_period: $('#hospital_period').val(),
                        death_period: $('#death_period').val(),
                        this_disease: $('.this_disease:checked').val(),
                        death_text: $('#death_text').val(),
                        health_condition_status: healthConditionStatus,
                        health_condition_status_others: health_condition_status_others,
                        identity: $('.identity:checked').val(),
                        provider_name: $('#provider_name').val(),
                        relation_with_patient: $('#relation_with_patient').val(),
                        provider_age: $('#provider_age').val(),
                        religion: $('.religion:checked').val(),
                        religion_text: $('#religion_text').val(),
                        is_ethnic: $('.is_ethnic:checked').val(),
                        ethnic_type: $('.ethnic_type:checked').val(),
                        ethnic_type_text: $('#ethnic_type_text').val(),
                        educational_background: $('#educational_background').val(),
                        educational_background_text: $('#educational_background_text').val(),
                        profession: $('#profession').val(),
                        profession_text: $('#profession_text').val(),
                        father_profession: $('#father_profession').val(),
                        father_profession_text: $('#father_profession_text').val(),
                        expenditure_type: $('.expenditure_type:checked').val(),
                        family_expense: $('#family_expense').val(),
                        male_member: $('#male_member').val(),
                        female_member: $('#female_member').val(),
                        fifteendays_live: $('.fifteendays_live:checked').val(),
                        otherplacetolive: $('#otherplacetolive').val(),
                        is_paddy: $('.is_paddy:checked').val(),
                        is_jute: $('.is_jute:checked').val(),
                        is_wheat: $('.is_wheat:checked').val(),
                        is_root: $('.is_root:checked').val(),
                        farming_name: $('#farming_name').val(),
                        is_paddy_working: $('.is_paddy_working:checked').val(),
                        is_jute_working: $('.is_jute_working:checked').val(),
                        is_wheat_working: $('.is_wheat_working:checked').val(),
                        is_root_working: $('.is_root_working:checked').val(),
                        farming_name_working: $('#farming_name_working').val(),
                        is_pond: $('.is_pond:checked').val(),
                        is_fen: $('.is_fen:checked').val(),
                        is_well: $('.is_well:checked').val(),
                        is_drain: $('.is_drain:checked').val(),
                        reservoir_name: $('#reservoir_name').val(),

                        outward_house: $('#outward_house').val(),
                        outward_house_type: $('#outward_house_type').val(),
                        outward_house_reason: $('#outward_house_reason').val(),
                        mosquito_net: $('.mosquito_net:checked').val(),
                        is_egret: $('.is_egret:checked').val(),
                        is_juicy: $('.is_juicy:checked').val(),
                        is_others_bird: $('.is_others_bird:checked').val(),
                        others_bird: $('.others_bird').val(),
                        is_domestic_animal_husbandry: $('.is_domestic_animal_husbandry:checked').val(),
                        name_of_animal: $('#name_of_animal').val(),
                        visting_type: $('.visting_type:checked').val(),
                        district: $('#district').val(),
                        upazila: $('#upazila').val(),
                        floor_type: $('#floor_type').val(),
                        floor_name: $('#floor_name').val(),
                        wall_type: $('#wall_type').val(),
                        wall_name: $('#wall_name').val(),
                        ceiling_type: $('#ceiling_type').val(),
                        ceiling_name: $('#ceiling_name').val(),
                        bedroom: $('#bedroom').val(),
                        is_kitchen: $('#is_kitchen').val(),
                        kitchen_distance: $('#kitchen_distance').val(),
                        is_cowhouse: $('#is_cowhouse').val(),
                        cowhouse_distance: $('#cowhouse_distance').val(),
                        is_toilet: $('#is_toilet').val(),
                        toilet_distance: $('#toilet_distance').val(),
                        is_water_supply: $('#is_water_supply').val(),
                        water_supply_distance: $('#water_supply_distance').val(),
                        is_window_mosquito_net: $('.is_window_mosquito_net:checked').val(),

                        home_name_of_animal: home_name_of_animal,
                        is_home_no_of_animal: is_home_no_of_animal,
                        home_no_of_animal: home_no_of_animal,
                        home_on_of_animal_home: home_on_of_animal_home,
                        home_on_of_animal_outside: home_on_of_animal_outside,
                        neighbour_name_of_animal: neighbour_name_of_animal,
                        is_neighbour: is_neighbour,
                        call_status: $('#call_status').val(),
                        date: $('#date').val(),
                        time: $('#time').val(),
                        _token: "{{csrf_token()}}",
                    },
                }).done(function( msg ) {
                    if(msg.success==true)
                        window.location.href =  "{{url(session('access').'encephalitis/callInitiate')}}";
                });
//
            }else{
                $.ajax({
                    method: "POST",
                    url: "{{url(session('access').'encephalitis/question/'.$encephalitis->id)}}",
                    data: {
                        hospital_period: $('#hospital_period').val(),
                        life_status: $('.life_status:checked').val(),
                        death_period: $('#death_period').val(),
                        this_disease: $('.this_disease:checked').val(),
                        death_text: $('#death_text').val(),
                        health_condition_status: healthConditionStatus,
                        health_condition_status_others: health_condition_status_others,
                        identity: $('.identity:checked').val(),
                        provider_name: $('#provider_name').val(),
                        relation_with_patient: $('#relation_with_patient').val(),
                        provider_age: $('#provider_age').val(),
                        religion: $('.religion:checked').val(),
                        religion_text: $('#religion_text').val(),
                        is_ethnic: $('.is_ethnic:checked').val(),
                        ethnic_type: $('.ethnic_type:checked').val(),
                        ethnic_type_text: $('#ethnic_type_text').val(),
                        educational_background: $('#educational_background').val(),
                        educational_background_text: $('#educational_background_text').val(),
                        profession: $('#profession').val(),
                        profession_text: $('#profession_text').val(),
                        father_profession: $('#father_profession').val(),
                        father_profession_text: $('#father_profession_text').val(),
                        expenditure_type: $('.expenditure_type:checked').val(),
                        family_expense: $('#family_expense').val(),
                        male_member: $('#male_member').val(),
                        female_member: $('#female_member').val(),
                        fifteendays_live: $('.fifteendays_live:checked').val(),
                        otherplacetolive: $('#otherplacetolive').val(),
                        is_paddy: $('.is_paddy:checked').val(),
                        is_jute: $('.is_jute:checked').val(),
                        is_wheat: $('.is_wheat:checked').val(),
                        is_root: $('.is_root:checked').val(),
                        farming_name: $('#farming_name').val(),
                        is_paddy_working: $('.is_paddy_working:checked').val(),
                        is_jute_working: $('.is_jute_working:checked').val(),
                        is_wheat_working: $('.is_wheat_working:checked').val(),
                        is_root_working: $('.is_root_working:checked').val(),
                        farming_name_working: $('#farming_name_working').val(),
                        is_pond: $('.is_pond:checked').val(),
                        is_fen: $('.is_fen:checked').val(),
                        is_well: $('.is_well:checked').val(),
                        is_drain: $('.is_drain:checked').val(),
                        reservoir_name: $('#reservoir_name').val(),

                        outward_house: $('#outward_house').val(),
                        outward_house_type: $('#outward_house_type').val(),
                        outward_house_reason: $('#outward_house_reason').val(),
                        mosquito_net: $('.mosquito_net:checked').val(),
                        is_egret: $('.is_egret:checked').val(),
                        is_juicy: $('.is_juicy:checked').val(),
                        is_others_bird: $('.is_others_bird:checked').val(),
                        others_bird: $('.others_bird').val(),
                        is_domestic_animal_husbandry: $('.is_domestic_animal_husbandry:checked').val(),
                        name_of_animal: $('#name_of_animal').val(),
                        visting_type: $('.visting_type:checked').val(),
                        district: $('#district').val(),
                        upazila: $('#upazila').val(),
                        floor_type: $('#floor_type').val(),
                        floor_name: $('#floor_name').val(),
                        wall_type: $('#wall_type').val(),
                        wall_name: $('#wall_name').val(),
                        ceiling_type: $('#ceiling_type').val(),
                        ceiling_name: $('#ceiling_name').val(),
                        bedroom: $('#bedroom').val(),
                        is_kitchen: $('#is_kitchen').val(),
                        kitchen_distance: $('#kitchen_distance').val(),
                        is_cowhouse: $('#is_cowhouse').val(),
                        cowhouse_distance: $('#cowhouse_distance').val(),
                        is_toilet: $('#is_toilet').val(),
                        toilet_distance: $('#toilet_distance').val(),
                        is_water_supply: $('#is_water_supply').val(),
                        water_supply_distance: $('#water_supply_distance').val(),
                        is_window_mosquito_net: $('.is_window_mosquito_net:checked').val(),

                        home_name_of_animal: home_name_of_animal,
                        is_home_no_of_animal: is_home_no_of_animal,
                        home_no_of_animal: home_no_of_animal,
                        home_on_of_animal_home: home_on_of_animal_home,
                        home_on_of_animal_outside: home_on_of_animal_outside,
                        neighbour_name_of_animal: neighbour_name_of_animal,
                        is_neighbour: is_neighbour,
                        call_status: 0,
                        _token: "{{csrf_token()}}",
                    },
                }).done(function( msg ) {
                    console.log("done");
                    //if(msg.success==true)
                    //  location.reload();
                });
            }
        }
        function getLock(e){
            if($(e).val()==1)
                $(e).siblings(':nth-child(4)').removeAttr("disabled");
            else{
                $(e).siblings(':nth-child(4)').val("");
                $(e).siblings(':nth-child(4)').attr("disabled", "disabled");
            }

        }
    </script>
@stop