@extends('layouts/master')
@section('content')

    <!-- Typehead CSS -->
    <link href="{{URL::to('resources/assets/ampleadmin/plugins/bower_components/typeahead.js-master/dist/typehead-min.css')}}" rel="stylesheet">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    {{$pageTitle}}
                </div>
                <div class="panel-body">
                    @if(Session::has('message'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                            {{ Session::get('message') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group {!! $errors->first('site_id')?'has-error':'' !!} clear">
                                <label class="control-label clear">Hospital</label>
                                {!! Form::select('site_id', [''=>'---Select Hospital---']+\App\Site::where('id','>', 12)->pluck('name', 'id')->toArray()+['7777'=>'Others'],Input::old('site_id',isset($dengue->site_id)?$dengue->site_id:''), array('id' => 'site_id', 'class' => 'form-control select2')) !!}
                                {!! Form::text('site_name', Input::old('site_name',isset($dengue->site_name)?$dengue->site_name:''),array('id'=>'site_name','class' => 'form-control', 'disabled'=>'disabled')) !!}
                                @if ($errors->first('site_id'))
                                    <div class="alert alert-danger">{!! $errors->first('site_id') !!}</div>@endif
                            </div>
                            <div class="form-group {!! $errors->first('bed_no')?'has-error':'' !!} clear">
                                <label class="control-label clear">Bed No</label>
                                {!! Form::text('bed_no', Input::old('bed_no',isset($dengue->bed_no)?$dengue->bed_no:''),array('class' => 'form-control')) !!}
                                @if ($errors->first('bed_no'))
                                    <div class="alert alert-danger">{!! $errors->first('bed_no') !!}</div>@endif
                            </div>
                            <div class="form-group {!! $errors->first('ward_no')?'has-error':'' !!} clear">
                                <label class="control-label clear">Ward No</label>
                                {!! Form::text('ward_no', Input::old('ward_no',isset($dengue->ward_no)?$dengue->ward_no:''),array( 'class' => 'form-control')) !!}
                                @if ($errors->first('ward_no'))
                                    <div class="alert alert-danger">{!! $errors->first('ward_no') !!}</div>@endif
                            </div>

                            <div class="form-group {!! $errors->first('date_of_admission')?'has-error':'' !!} clear">
                                <label class="control-label clear">Date Of Admission</label>
                                {!! Form::text('date_of_admission', Input::old('date_of_admission',isset($dengue->date_of_admission)?$dengue->date_of_admission:''),array('class' => 'form-control datepick', 'placeholder' => 'yyyy-mm-dd')) !!}
                                @if ($errors->first('date_of_admission'))
                                    <div class="alert alert-danger">{!! $errors->first('date_of_admission') !!}</div>@endif
                            </div>

                            <div class="form-group {!! $errors->first('reg_no')?'has-error':'' !!} clear">
                                <label class="control-label clear">Hospital Reg. ID</label>
                                {!! Form::text('reg_no', Input::old('reg_no',isset($dengue->reg_no)?$dengue->reg_no:''),array( 'class' => 'form-control')) !!}
                                @if ($errors->first('reg_no'))
                                    <div class="alert alert-danger">{!! $errors->first('reg_no') !!}</div>@endif
                            </div>
                            <div class="form-group {!! $errors->first('name')?'has-error':'' !!} clear">
                                <label class="control-label clear">Patient Name</label>
                                {!! Form::text('name', Input::old('name',isset($dengue->name)?$dengue->name:''),array('class' => 'form-control')) !!}
                                @if ($errors->first('name'))
                                    <div class="alert alert-danger">{!! $errors->first('name') !!}</div>@endif
                            </div>
                            <div class="form-group {!! $errors->first('guardian_name')?'has-error':'' !!} clear">
                                <label class="control-label clear">Father’s/Husband’s name</label>
                                {!! Form::text('guardian_name', Input::old('guardian_name',isset($dengue->guardian_name)?$dengue->guardian_name:''),array('class' => 'form-control')) !!}
                                @if ($errors->first('guardian_name'))
                                    <div class="alert alert-danger">{!! $errors->first('guardian_name') !!}</div>@endif
                            </div>
                            <div class="form-group {!! $errors->first('dob')?'has-error':'' !!} clear">
                                <label class="control-label clear">Patient Age</label>
                                {!! Form::text('dob', Input::old('dob',isset($dengue->dob)?date("Y/m/d", strtotime($dengue->dob)):''),array('id'=>'dob','class' => 'form-control  datepick', 'placeholder'=>'Date of Birth')) !!}
                                {!! Form::number('age', Input::old('age',isset($dengue->age)?$dengue->age:''),array('id'=>'age','min'=>0, 'class' => 'form-control', 'placeholder'=>'Year')) !!}
                                {!! Form::number('months', Input::old('months',isset($dengue->months)?$dengue->months:''),array('id'=>'months','min'=>0, 'max'=>12, 'class' => 'form-control', 'placeholder'=>'Months')) !!}
                                {!! Form::number('days', Input::old('days',isset($dengue->days)?$dengue->days:''),array('id'=>'days','min'=>0, 'max'=>31, 'class' => 'form-control', 'placeholder'=>'Days')) !!}
                                @if ($errors->first('dob'))
                                    <div class="alert alert-danger">{!! $errors->first('dob') !!}</div>@endif
                            </div>

                            <div class="form-group {!! $errors->first('sex')?'has-error':'' !!} clear">
                                <label class="control-label clear">Patient Gender</label><br>
                                {!! @App\Common::radioButtonGenerate(\App\Common::getDengueGenderType(), 'sex', 0, $dengue->sex, true) !!}
                                @if ($errors->first('sex'))
                                    <div class="alert alert-danger">{!! $errors->first('sex') !!}</div>@endif
                            </div>
                            <div class="form-group {!! $errors->first('mobile_no')?'has-error':'' !!} clear">
                                <label class="control-label clear">Contact No</label>
                                {!! Form::number('mobile_no', Input::old('mobile_no',isset($dengue->mobile_no)?$dengue->mobile_no:''),array('class' => 'form-control', 'placeholder'=>'mobile no')) !!}
                                @if ($errors->first('mobile_no'))
                                    <div class="alert alert-danger">{!! $errors->first('mobile_no') !!}</div>@endif
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group  {!! $errors->first('district_id')?'has-error':'' !!} ">
                                <label class="control-label clear">District / City</label><br>
                                {!! Form::select('district_id', [''=>'---Select District---']+\App\Area::where('type_id', 5)->pluck('name', 'id')->toArray()+['7777'=>'Others'],Input::old('district_id',isset($dengue->district_id)?$dengue->district_id:''), array('id' => 'district_id', 'class' => 'form-control select2')) !!}
                                @if ($errors->first('district_id'))
                                    <div class="alert alert-danger">{!! $errors->first('district_id') !!}</div>@endif
                            </div>
                            <div class="form-group  {!! $errors->first('thana_id')?'has-error':'' !!} ">
                                <label class="control-label clear">Upazila / Thana</label><br>
                                {!! Form::select('thana_id', [''=>'---Select Thana---']+\App\Area::where('type_id', 6)->pluck('name', 'id')->toArray()+['7777'=>'Others'],Input::old('thana_id',isset($dengue->thana_id)?$dengue->thana_id:''), array('id' => 'thana_id', 'class' => 'form-control select2')) !!}
                                @if ($errors->first('thana_id'))
                                    <div class="alert alert-danger">{!! $errors->first('thana_id') !!}</div>@endif
                            </div>
                            <div class="form-group  {!! $errors->first('village')?'has-error':'' !!} ">
                                <label class="control-label clear">Village/Moholla</label>
                                {!! Form::text('village', Input::old('village',isset($dengue->village)?$dengue->village:''),array('id'=>'village','class' => 'form-control village','placeholder'=>'Village/Moholla')) !!}
                                @if ($errors->first('village'))
                                    <div class="alert alert-danger">{!! $errors->first('village') !!}</div>@endif
                            </div>
                            <div class="form-group  {!! $errors->first('add_ward_no')?'has-error':'' !!} ">
                                <label class="control-label clear">Ward No</label>
                                <div class="the-basics-area">
                                    {!! Form::text('add_ward_no', Input::old('add_ward_no',isset($dengue->add_ward_no)?$dengue->add_ward_no:''),array('id'=>'add_ward_no','class' => 'form-control','placeholder'=>'Ward No')) !!}
                                </div>
                                @if ($errors->first('add_ward_no'))
                                    <div class="alert alert-danger">{!! $errors->first('add_ward_no') !!}</div>@endif
                            </div>
                            <div class="form-group  {!! $errors->first('occupation')?'has-error':'' !!} ">
                                <label class="control-label clear">Occupation</label><br>
                                {!! Form::select('occupation',[''=>'---Select an option---']+\App\Poultry::getPrimaryOccupation(),Input::old('occupation',isset($dengue->occupation)?$dengue->occupation:''), array('id' => 'occupation', 'class' => 'form-control')) !!}
                                {!! Form::text('occupation_other', Input::old('occupation_other',isset($dengue->occupation_other)?$dengue->occupation_other:''),array('id'=>'occupation_other','class' => 'form-control','placeholder'=>'Occupation Other')) !!}
                                @if ($errors->first('occupation'))
                                    <div class="alert alert-danger">{!! $errors->first('occupation') !!}</div>@endif
                            </div>
                            <div class="form-group  {!! $errors->first('is_travel')?'has-error':'' !!} ">
                                <label class="control-label clear"> Travel History to/from Dhaka (within last two weeks of onset of dengue fever)</label><br>
                                {!! @App\Common::radioButtonGenerate(\App\Common::getYesNoType(), 'is_travel', 0, $dengue->is_travel, true) !!}
                                @if ($errors->first('is_travel'))
                                    <div class="alert alert-danger">{!! $errors->first('is_travel') !!}</div>@endif
                            </div>
                            <div class="form-group {!! $errors->first('travel_date')?'has-error':'' !!} clear">
                                <label class="control-label clear">If Yes mention date of travel from Dhaka:</label>
                                {!! Form::text('travel_date', Input::old('travel_date',isset($dengue->travel_date)?$dengue->travel_date:''),array('class' => 'form-control datepick', 'placeholder'=>'Date of Travel')) !!}
                                @if ($errors->first('travel_date'))
                                    <div class="alert alert-danger">{!! $errors->first('travel_date') !!}</div>@endif
                            </div>
                            <div class="form-group {!! $errors->first('travel_day')?'has-error':'' !!} clear">
                                <label class="control-label clear">How many days ago returned from Dhaka (before onset of dengue fever):</label>
                                {!! Form::number('travel_day', Input::old('travel_day',isset($dengue->travel_day)?$dengue->travel_day:''),array('min'=>0, 'max'=>31, 'class' => 'form-control', 'placeholder'=>'Days')) !!}
                                @if ($errors->first('travel_day'))
                                    <div class="alert alert-danger">{!! $errors->first('travel_day') !!}</div>@endif
                            </div>
                            <div class="form-group {!! $errors->first('symptom_date')?'has-error':'' !!} clear">
                                <label class="control-label clear">When did  the patient developed first symptom of the current illness:</label>
                                {!! Form::text('symptom_date', Input::old('symptom_date',isset($dengue->symptom_date)?$dengue->symptom_date:''),array('class' => 'form-control datepick', 'placeholder'=>'Date of Symptom')) !!}
                                @if ($errors->first('symptom_date'))
                                    <div class="alert alert-danger">{!! $errors->first('symptom_date') !!}</div>@endif
                            </div>

                            <div class="form-group">
                                <label class="control-label">What was the first symptom:</label>
                                <div>
                                    @if(isset($dengue->comorbidity) && $dengue->comorbidity!= null)
                                        {!! @App\Common::checkBoxArrayGenerate(\App\Common::getDengueSymptom(),'comorbidity',0, json_decode($dengue->comorbidity)); !!}
                                    @else
                                        {!! @App\Common::checkBoxArrayGenerate(\App\Common::getDengueSymptom(),'comorbidity',0, array()); !!}
                                    @endif

                                    <div id="comorbidity_others">
                                        <div onclick="add_new_text(this, 'comorbidity_others', 'অন্যান্য (নির্দিষ্ট করে বলুন)')" class="text-right"><i class="fa fa-plus"></i></div>
                                        @if(isset($dengue->comorbidity_others) && $dengue->comorbidity_others!= null)
                                            @foreach(@json_decode($dengue->comorbidity_others) as $key=>$value)
                                                {!! Form::text('comorbidity_others[]', Input::old('comorbidity_others',isset($dengue->comorbidity_others)?$value:''),array('class' => 'form-control','placeholder'=>'অন্যান্য (নির্দিষ্ট করে বলুন)')) !!}
                                            @endforeach
                                        @else
                                            {!! Form::text('comorbidity_others[]', '',array('class' => 'form-control','placeholder'=>'অন্যান্য (নির্দিষ্ট করে বলুন)')) !!}
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label">Consultation History: (Chronological order till to date, starting from present to backward):</label>
                                <div>
                                    <div onclick='add_new_text_row(this, "consultation_history", ["Name of Health Centre/ Consultant","Date of admission/ consultation","OPD=0/IPD=1","Provisional diagnosis"], 1)' class="text-right"><i class="fa fa-plus"></i></div>
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th width="35%">Place of medical consultation</th>
                                            <th width="10%">Date of admission/ consultation</th>
                                            <th width="10%">OPD=0/IPD=1</th>
                                            <th width="35%">Provisional diagnosis</th>
                                            <th width="10%">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody id="consultation_history">
                                        @if(isset($dengue->consultation_history) && $dengue->consultation_history!= null)
                                            <?php $consulationhistory= json_decode($dengue->consultation_history);
                                            ?>
                                            @foreach($consulationhistory as $key=>$value)
                                                <tr>
                                                    <td>{!! Form::text('consultation_history['.$key.'][0]', Input::old('consultation_history',isset($value[0])?$value[0]:''),array('class' => 'form-control','placeholder'=>'Name of Health Centre/ Consultant')) !!}</td>
                                                    <td>{!! Form::text('consultation_history['.$key.'][1]', Input::old('consultation_history',isset($value[1])?$value[1]:''),array('class' => 'form-control datepick','placeholder'=>'Date of admission/ consultation')) !!}</td>
                                                    <td>{!! Form::text('consultation_history['.$key.'][2]', Input::old('consultation_history',isset($value[2])?$value[2]:''),array('class' => 'form-control','placeholder'=>'OPD=0/IPD=1')) !!}</td>
                                                    <td>{!! Form::text('consultation_history['.$key.'][3]', Input::old('consultation_history',isset($value[3])?$value[3]:''),array('class' => 'form-control','placeholder'=>'Provisional diagnosis')) !!}</td>
                                                    <td><a onclick="remove(this)" class="btn btn-danger "><i class="fa fa-remove text-white"></i></a></td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td>{!! Form::text('consultation_history[0][0]', '',array('class' => 'form-control','placeholder'=>'Name of Health Centre/ Consultant')) !!}</td>
                                                <td>{!! Form::text('consultation_history[0][1]', '',array('class' => 'form-control datepick','placeholder'=>'Date of admission/ consultation')) !!}</td>
                                                <td>{!! Form::text('consultation_history[0][2]', '',array('class' => 'form-control','placeholder'=>'OPD=0/IPD=1')) !!}</td>
                                                <td>{!! Form::text('consultation_history[0][3]', '',array('class' => 'form-control','placeholder'=>'Provisional diagnosis')) !!}</td>
                                                <td>
                                                    <a onclick="remove(this)" class="btn btn-danger "><i class="fa fa-remove text-white"></i></a>
                                                    <a class="btn btn-info" onclick='add_new_text_row(this, "consultation_history", ["Name of Health Centre/ Consultant","Date of admission/ consultation","OPD=0/IPD=1","Provisional diagnosis"], 1)' class="text-right"><i class="fa fa-plus text-white"></i></a>

                                                </td>
                                            </tr>
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label">Clinical Presentation:</label>
                                <div>
                                    <div onclick='add_new_text_row(this, "clinical_presentation", ["Sign/Symptoms/presentation","(yes=1, No=0)","date of onset","(yes=1, No=0)","resolved date of symptom cessation"], 2)' class="text-right"><i class="fa fa-plus"></i></div>
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th width="30%">Sign/Symptoms/presentation</th>
                                            <th width="10%">If Yes(yes=1, No=0)</th>
                                            <th width="10%">If yes, date of onset (yyyy/mm/dd)</th>
                                            <th width="10%">If still continue(yes=1, No=0)</th>
                                            <th width="30%">If resolved date of symptom cessation</th>
                                            <th width="10%">Action</th>
                                        </tr>
                                        </thead>

                                        <tbody id="clinical_presentation">
                                        @if(isset($dengue->clinical_presentation) && $dengue->clinical_presentation!= null)
                                            <?php $clinical_presentation= json_decode($dengue->clinical_presentation); ?>
                                            @foreach(@$clinical_presentation as $key=>$value)
                                                <tr>
                                                    <td>{!! Form::text('clinical_presentation['.$key.'][0]', Input::old('clinical_presentation',isset($value[0])?$value[0]:''),array('class' => 'form-control','placeholder'=>'Sign/Symptoms/presentation')) !!}</td>
                                                    <td>{!! Form::text('clinical_presentation['.$key.'][1]', Input::old('clinical_presentation',isset($value[1])?$value[1]:''),array('class' => 'form-control','placeholder'=>'(yes=1, No=0)')) !!}</td>
                                                    <td>{!! Form::text('clinical_presentation['.$key.'][2]', Input::old('clinical_presentation',isset($value[2])?$value[2]:''),array('class' => 'form-control datepick','placeholder'=>'date of onset')) !!}</td>
                                                    <td>{!! Form::text('clinical_presentation['.$key.'][3]', Input::old('clinical_presentation',isset($value[3])?$value[3]:''),array('class' => 'form-control','placeholder'=>'(yes=1, No=0)')) !!}</td>
                                                    <td>{!! Form::text('clinical_presentation['.$key.'][4]', Input::old('clinical_presentation',isset($value[4])?$value[4]:''),array('class' => 'form-control','placeholder'=>'resolved date of symptom cessation ')) !!}</td>
                                                    <td><a onclick="remove(this)" class="btn btn-danger "><i class="fa fa-remove text-white"></i></a></td>
                                                </tr>
                                            @endforeach
                                        @else

                                            <?php $key2=0; ?>
                                            @foreach(\App\SuspectedDengue::clinical_presentation() as $key=>$value)
                                                @foreach($value as $key1=>$value1)
                                                    <tr>
                                                        @if($key1==0)
                                                            <th colspan="6">{{ @$value1}}</th>
                                                        @else
                                                            <td>{!! Form::text('clinical_presentation['.$key2.'][0]', $value1,array('class' => 'form-control','placeholder'=>'Sign/Symptoms/presentation')) !!}</td>
                                                            <td>{!! Form::text('clinical_presentation['.$key2.'][1]', '',array('class' => 'form-control','placeholder'=>'(yes=1, No=0)')) !!}</td>
                                                            <td>{!! Form::text('clinical_presentation['.$key2.'][2]', '',array('class' => 'form-control  datepick','placeholder'=>'date of onset')) !!}</td>
                                                            <td>{!! Form::text('clinical_presentation['.$key2.'][3]', '',array('class' => 'form-control','placeholder'=>'(yes=1, No=0)')) !!}</td>
                                                            <td>{!! Form::text('clinical_presentation['.$key2.'][4]', '',array('class' => 'form-control','placeholder'=>'resolved date of symptom cessation ')) !!}</td>
                                                            <td>@if($key==5 && $key1==6) <a class="btn btn-info" onclick='add_new_text_row(this, "clinical_presentation", ["Sign/Symptoms/presentation","(yes=1, No=0)","date of onset","(yes=1, No=0)","date of symptom"], 2)' class="text-right"><i class="fa fa-plus text-white"></i></a>@endif</td>
                                                            <?php $key2++; ?>
                                                        @endif
                                                    </tr>
                                                @endforeach
                                            @endforeach
                                        @endif

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label">Laboratory Findings:</label>
                                <div>
                                    <div onclick='add_new_text_row(this, "laboratory_findings", ["Parameter","Date","Findings","Date","Findings","Date","Findings","Date","Findings"], 3)' class="text-right"><i class="fa fa-plus"></i></div>
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th width="10%">Parameter</th>
                                            <th width="10%">Date</th>
                                            <th width="10%">Findings</th>
                                            <th width="10%">Date</th>
                                            <th width="10%">Findings</th>
                                            <th width="10%">Date</th>
                                            <th width="10%">Findings</th>
                                            <th width="10%">Date</th>
                                            <th width="10%">Findings</th>
                                            <th width="10%">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody id="laboratory_findings">
                                        @if(isset($dengue->laboratory_findings) && $dengue->laboratory_findings!= null)
                                            <?php $laboratory_findings= json_decode($dengue->laboratory_findings); ?>
                                            @foreach(@$laboratory_findings as $key=>$value)
                                                <tr>
                                                    <td>{!! Form::text('laboratory_findings['.$key.'][0]', Input::old('laboratory_findings',isset($value[0])?$value[0]:''),array('class' => 'form-control','placeholder'=>'Parameter')) !!}</td>
                                                    <td>{!! Form::text('laboratory_findings['.$key.'][1]', Input::old('laboratory_findings',isset($value[1])?$value[1]:''),array('class' => 'form-control datepick','placeholder'=>'Date')) !!}</td>
                                                    <td>{!! Form::text('laboratory_findings['.$key.'][2]', Input::old('laboratory_findings',isset($value[2])?$value[2]:''),array('class' => 'form-control','placeholder'=>'Findings')) !!}</td>
                                                    <td>{!! Form::text('laboratory_findings['.$key.'][3]', Input::old('laboratory_findings',isset($value[3])?$value[3]:''),array('class' => 'form-control datepick','placeholder'=>'Date')) !!}</td>
                                                    <td>{!! Form::text('laboratory_findings['.$key.'][4]', Input::old('laboratory_findings',isset($value[4])?$value[4]:''),array('class' => 'form-control','placeholder'=>'Findings')) !!}</td>
                                                    <td>{!! Form::text('laboratory_findings['.$key.'][5]', Input::old('laboratory_findings',isset($value[5])?$value[5]:''),array('class' => 'form-control datepick','placeholder'=>'Date')) !!}</td>
                                                    <td>{!! Form::text('laboratory_findings['.$key.'][6]', Input::old('laboratory_findings',isset($value[6])?$value[6]:''),array('class' => 'form-control','placeholder'=>'Findings')) !!}</td>
                                                    <td>{!! Form::text('laboratory_findings['.$key.'][7]', Input::old('laboratory_findings',isset($value[7])?$value[7]:''),array('class' => 'form-control datepick','placeholder'=>'Date')) !!}</td>
                                                    <td>{!! Form::text('laboratory_findings['.$key.'][8]', Input::old('laboratory_findings',isset($value[8])?$value[8]:''),array('class' => 'form-control','placeholder'=>'Findings')) !!}</td>
                                                    <td><a onclick="remove(this)" class="btn btn-danger "><i class="fa fa-remove text-white"></i></a></td>
                                                </tr>
                                            @endforeach
                                        @else
                                            @foreach(\App\SuspectedDengue::laboratory_findings() as $key=>$value)
                                                <tr>
                                                    <td>{!! Form::text('laboratory_findings['.$key.'][0]', $value,array('class' => 'form-control','placeholder'=>'Parameter')) !!}</td>
                                                    <td>{!! Form::text('laboratory_findings['.$key.'][1]', '',array('class' => 'form-control datepick','placeholder'=>'Date')) !!}</td>
                                                    <td>{!! Form::text('laboratory_findings['.$key.'][2]', '',array('class' => 'form-control','placeholder'=>'Findings')) !!}</td>
                                                    <td>{!! Form::text('laboratory_findings['.$key.'][3]', '',array('class' => 'form-control datepick','placeholder'=>'Date')) !!}</td>
                                                    <td>{!! Form::text('laboratory_findings['.$key.'][4]', '',array('class' => 'form-control','placeholder'=>'Findings')) !!}</td>
                                                    <td>{!! Form::text('laboratory_findings['.$key.'][5]', '',array('class' => 'form-control datepick','placeholder'=>'Date')) !!}</td>
                                                    <td>{!! Form::text('laboratory_findings['.$key.'][6]', '',array('class' => 'form-control','placeholder'=>'Findings')) !!}</td>
                                                    <td>{!! Form::text('laboratory_findings['.$key.'][7]', '',array('class' => 'form-control datepick','placeholder'=>'Date')) !!}</td>
                                                    <td>{!! Form::text('laboratory_findings['.$key.'][8]', '',array('class' => 'form-control','placeholder'=>'Findings')) !!}</td>
                                                    <td>@if($key==17)<a class="btn btn-info" onclick='add_new_text_row(this, "laboratory_findings", ["Parameter","Date","Findings","Date","Findings","Date","Findings","Date","Findings"], 3)' class="text-right"><i class="fa fa-plus text-white"></i></a>@endif</td>
                                                </tr>
                                            @endforeach
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Treatment History:</label>
                                <div>
                                    <div onclick='add_new_text_row(this, "treatment_history", ["Parameter","Date","Findings","Date","Findings","Date","Findings","Date","Findings"], 3)' class="text-right"><i class="fa fa-plus"></i></div>
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th width="10%">Parameter</th>
                                            <th width="10%">Date</th>
                                            <th width="10%">Findings</th>
                                            <th width="10%">Date</th>
                                            <th width="10%">Findings</th>
                                            <th width="10%">Date</th>
                                            <th width="10%">Findings</th>
                                            <th width="10%">Date</th>
                                            <th width="10%">Findings</th>
                                            <th width="10%">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody id="treatment_history">
                                        @if(isset($dengue->treatment_history) && $dengue->treatment_history!= null)
                                            <?php $treatment_history= json_decode($dengue->treatment_history); ?>
                                            @foreach(@$treatment_history as $key=>$value)
                                                <tr>
                                                    <td>{!! Form::text('treatment_history['.$key.'][0]', Input::old('treatment_history',isset($value[0])?$value[0]:''),array('class' => 'form-control','placeholder'=>'Parameter')) !!}</td>
                                                    <td>{!! Form::text('treatment_history['.$key.'][1]', Input::old('treatment_history',isset($value[1])?$value[1]:''),array('class' => 'form-control datepick','placeholder'=>'Date')) !!}</td>
                                                    <td>{!! Form::text('treatment_history['.$key.'][2]', Input::old('treatment_history',isset($value[2])?$value[2]:''),array('class' => 'form-control','placeholder'=>'Findings')) !!}</td>
                                                    <td>{!! Form::text('treatment_history['.$key.'][3]', Input::old('treatment_history',isset($value[3])?$value[3]:''),array('class' => 'form-control datepick','placeholder'=>'Date')) !!}</td>
                                                    <td>{!! Form::text('treatment_history['.$key.'][4]', Input::old('treatment_history',isset($value[4])?$value[4]:''),array('class' => 'form-control','placeholder'=>'Findings')) !!}</td>
                                                    <td>{!! Form::text('treatment_history['.$key.'][5]', Input::old('treatment_history',isset($value[5])?$value[5]:''),array('class' => 'form-control datepick','placeholder'=>'Date')) !!}</td>
                                                    <td>{!! Form::text('treatment_history['.$key.'][6]', Input::old('treatment_history',isset($value[6])?$value[6]:''),array('class' => 'form-control','placeholder'=>'Findings')) !!}</td>
                                                    <td>{!! Form::text('treatment_history['.$key.'][7]', Input::old('treatment_history',isset($value[7])?$value[7]:''),array('class' => 'form-control datepick','placeholder'=>'Date')) !!}</td>
                                                    <td>{!! Form::text('treatment_history['.$key.'][8]', Input::old('treatment_history',isset($value[8])?$value[8]:''),array('class' => 'form-control','placeholder'=>'Findings')) !!}</td>
                                                    <td><a onclick="remove(this)" class="btn btn-danger "><i class="fa fa-remove text-white"></i></a></td>
                                                </tr>
                                            @endforeach
                                        @else
                                            @php $key2=0; @endphp
                                            @foreach(\App\SuspectedDengue::treatment_history() as $key=>$value)
                                                @foreach($value as $key1=>$value1)
                                                    <tr>
                                                        @if($key1==0)
                                                            <th colspan="6">{{ @$value1}}</th>
                                                        @else
                                                            <td>{!! Form::text('treatment_history['.$key2.'][0]', $value1,array('class' => 'form-control','placeholder'=>'Parameter')) !!}</td>
                                                            <td>{!! Form::text('treatment_history['.$key2.'][1]', '',array('class' => 'form-control datepick','placeholder'=>'Date')) !!}</td>
                                                            <td>{!! Form::text('treatment_history['.$key2.'][2]', '',array('class' => 'form-control','placeholder'=>'Findings')) !!}</td>
                                                            <td>{!! Form::text('treatment_history['.$key2.'][3]', '',array('class' => 'form-control datepick','placeholder'=>'Date')) !!}</td>
                                                            <td>{!! Form::text('treatment_history['.$key2.'][4]', '',array('class' => 'form-control','placeholder'=>'Findings')) !!}</td>
                                                            <td>{!! Form::text('treatment_history['.$key2.'][5]', '',array('class' => 'form-control datepick','placeholder'=>'Date')) !!}</td>
                                                            <td>{!! Form::text('treatment_history['.$key2.'][6]', '',array('class' => 'form-control','placeholder'=>'Findings')) !!}</td>
                                                            <td>{!! Form::text('treatment_history['.$key2.'][7]', '',array('class' => 'form-control datepick','placeholder'=>'Date')) !!}</td>
                                                            <td>{!! Form::text('treatment_history['.$key2.'][8]', '',array('class' => 'form-control','placeholder'=>'Findings')) !!}</td>
                                                            <td>@if($key==2 && $key1==4)<a class="btn btn-info" onclick='add_new_text_row(this, "treatment_history", ["Parameter","Date","Findings","Date","Findings","Date","Findings","Date","Findings"], 3)' class="text-right"><i class="fa fa-plus text-white"></i></a>@endif</td>
                                                            @php $key2++; @endphp
                                                        @endif
                                                    </tr>
                                                @endforeach
                                            @endforeach
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="form-group  {!! $errors->first('lt_ns1')?'has-error':'' !!} ">
                                <label class="control-label clear"> Lab Tests(NS1)</label><br>
                                {!! @App\Common::radioButtonGenerate(\App\Common::getLabTest(), 'lt_ns1', 0, $dengue->lt_ns1, false) !!}
                                {!! Form::text('ns1_date', Input::old('ns1_date',isset($dengue->ns1_date)?$dengue->ns1_date:''),array('id'=>'ns1_date','class' => 'form-control datepick', 'placeholder'=>'Date of test')) !!}
                                @if ($errors->first('lt_ns1'))
                                    <div class="alert alert-danger">{!! $errors->first('lt_ns1') !!}</div>@endif
                            </div>
                            <div class="form-group  {!! $errors->first('lt_igg')?'has-error':'' !!} ">
                                <label class="control-label clear"> IgG</label><br>
                                {!! @App\Common::radioButtonGenerate(\App\Common::getLabTest(), 'lt_igg', 0, $dengue->lt_igg, false) !!}
                                {!! Form::text('igg_date', Input::old('igg_date',isset($dengue->igg_date)?$dengue->igg_date:''),array('id'=>'igg_date','class' => 'form-control datepick', 'placeholder'=>'Date of test')) !!}

                                @if ($errors->first('lt_igg'))
                                    <div class="alert alert-danger">{!! $errors->first('lt_igg') !!}</div>@endif
                            </div>
                            <div class="form-group  {!! $errors->first('lt_igm')?'has-error':'' !!} ">
                                <label class="control-label clear"> IgM</label><br>
                                {!! @App\Common::radioButtonGenerate(\App\Common::getLabTest(), 'lt_igm', 0, $dengue->lt_igm, false) !!}
                                {!! Form::text('igm_date', Input::old('igm_date',isset($dengue->igm_date)?$dengue->igm_date:''),array('id'=>'igm_date','class' => 'form-control datepick', 'placeholder'=>'Date of test')) !!}

                                @if ($errors->first('lt_igm'))
                                    <div class="alert alert-danger">{!! $errors->first('lt_igm') !!}</div>@endif
                            </div>
                            <div class="form-group  {!! $errors->first('lt_pcr')?'has-error':'' !!} ">
                                <label class="control-label clear"> PCR</label><br>
                                {!! @App\Common::radioButtonGenerate(\App\Common::getLabTest(), 'lt_pcr', 0, $dengue->lt_pcr, false) !!}
                                {!! Form::text('pcr_date', Input::old('pcr_date',isset($dengue->pcr_date)?$dengue->pcr_date:''),array('id'=>'pcr_date','class' => 'form-control datepick', 'placeholder'=>'Date of test')) !!}

                                @if ($errors->first('lt_pcr'))
                                    <div class="alert alert-danger">{!! $errors->first('lt_pcr') !!}</div>@endif
                            </div>

                            <div class="form-group">
                                <label class="control-label">Laboratory Findings:</label>
                                <div>
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th width="30%">Parameter</th>
                                            <th width="10%">Date</th>
                                            <th width="25%">Findings</th>
                                            <th width="10%">Date</th>
                                            <th width="25%">Findings</th>
                                        </tr>
                                        </thead>
                                        <tbody id="clinical_examination_findings">
                                        @if(isset($dengue->clinical_examination_findings) && $dengue->clinical_examination_findings!= null)
                                            <?php $clinical_examination_findings= json_decode($dengue->clinical_examination_findings); ?>

                                            @foreach(@$clinical_examination_findings as $key=>$value)
                                                <tr>
                                                    <td>{!! Form::text('clinical_examination_findings['.$key.'][0]', Input::old('clinical_examination_findings',isset($value[0])?$value[0]:''),array('class' => 'form-control','placeholder'=>'Parameter')) !!}</td>
                                                    <td>{!! Form::text('clinical_examination_findings['.$key.'][1]', Input::old('clinical_examination_findings',isset($value[1])?$value[1]:''),array('class' => 'form-control datepick','placeholder'=>'Date')) !!}</td>
                                                    <td>{!! Form::text('clinical_examination_findings['.$key.'][2]', Input::old('clinical_examination_findings',isset($value[2])?$value[2]:''),array('class' => 'form-control','placeholder'=>'Findings')) !!}</td>
                                                    <td>{!! Form::text('clinical_examination_findings['.$key.'][3]', Input::old('clinical_examination_findings',isset($value[3])?$value[3]:''),array('class' => 'form-control datepick','placeholder'=>'Date')) !!}</td>
                                                    <td>{!! Form::text('clinical_examination_findings['.$key.'][4]', Input::old('clinical_examination_findings',isset($value[4])?$value[4]:''),array('class' => 'form-control','placeholder'=>'Findings')) !!}</td>
                                                </tr>
                                            @endforeach
                                        @else
                                            @foreach(\App\SuspectedDengue::clinical_examination_findings() as $key=>$value)
                                                <tr>
                                                    <td>{!! Form::text('clinical_examination_findings['.$key.'][0]',$value,array('class' => 'form-control','placeholder'=>'Parameter')) !!}</td>
                                                    <td>{!! Form::text('clinical_examination_findings['.$key.'][1]','',array('class' => 'form-control datepick','placeholder'=>'Date')) !!}</td>
                                                    <td>{!! Form::text('clinical_examination_findings['.$key.'][2]', '',array('class' => 'form-control','placeholder'=>'Findings')) !!}</td>
                                                    <td>{!! Form::text('clinical_examination_findings['.$key.'][3]', '',array('class' => 'form-control datepick','placeholder'=>'Date')) !!}</td>
                                                    <td>{!! Form::text('clinical_examination_findings['.$key.'][4]','',array('class' => 'form-control','placeholder'=>'Findings')) !!}</td>
                                                </tr>
                                            @endforeach
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="form-group  {!! $errors->first('is_sample')?'has-error':'' !!} ">
                                <label class="control-label clear">Blood sample collection (within 5 days of onset of dengue fever)</label><br>
                                {!! @App\Common::radioButtonGenerate(\App\Common::getYesNoType(), 'is_sample', 0, $dengue->is_sample, true) !!}
                                @if ($errors->first('is_sample'))
                                    <div class="alert alert-danger">{!! $errors->first('is_sample') !!}</div>@endif
                            </div>
                            <div class="form-group  {!! $errors->first('no_reason')?'has-error':'' !!} ">
                                <label class="control-label clear"> If No, reason</label><br>
                                @if(isset($dengue->no_reason))
                                    {!! @App\Common::checkBoxArrayGenerate(\App\SuspectedDengue::ReasonOfNo(),'no_reason',0, json_decode($dengue->no_reason)); !!}
                                @else
                                    {!! @App\Common::checkBoxArrayGenerate(\App\SuspectedDengue::ReasonOfNo(),'no_reason',0, array()); !!}
                                @endif
                                <div id="no_reason_text">
                                    <div onclick="add_new_text(this, 'no_reason_text', 'অন্যান্য (নির্দিষ্ট করে বলুন)')" class="text-right"><i class="fa fa-plus"></i></div>
                                    @if(isset($dengue->no_reason_text) && $dengue->no_reason_text!= null)
                                        @foreach(@json_decode($dengue->no_reason_text) as $key=>$value)
                                            {!! Form::text('no_reason_text[]', Input::old('no_reason_text',isset($dengue->no_reason_text)?$value:''),array('class' => 'form-control','placeholder'=>'অন্যান্য (নির্দিষ্ট করে বলুন)')) !!}
                                        @endforeach
                                    @else
                                        {!! Form::text('no_reason_text[]', '',array('class' => 'form-control','placeholder'=>'অন্যান্য (নির্দিষ্ট করে বলুন)')) !!}
                                    @endif
                                </div>
                            </div>
                            <div class="form-group {!! $errors->first('sample_date')?'has-error':'' !!} clear">
                                <label class="control-label clear">If yes, Date of sample collection:</label>
                                {!! Form::text('sample_date', Input::old('sample_date',isset($dengue->sample_date)?$dengue->sample_date:''),array('class' => 'form-control datepick', 'placeholder'=>'Date of collection')) !!}
                                @if ($errors->first('sample_date'))
                                    <div class="alert alert-danger">{!! $errors->first('sample_date') !!}</div>@endif
                            </div>
                            <div class="form-group {!! $errors->first('sample_id')?'has-error':'' !!} clear">
                                <label class="control-label clear">Sample id:</label>
                                {!! Form::text('sample_id', Input::old('sample_id',isset($dengue->sample_id)?$dengue->sample_id:''),array('class' => 'form-control', 'placeholder'=>'Sample ID')) !!}
                                @if ($errors->first('sample_id'))
                                    <div class="alert alert-danger">{!! $errors->first('sample_id') !!}</div>@endif
                            </div>
                        </div>  <!-- end col-md-3 -->
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group text-right">
                                <a href="{{ url()->previous() }}" class="btn btn-sm btn-primary">Back</a>
                                {{  Form::hidden('previous_url',URL::previous())  }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>  <!-- end panel -->
        </div>
    </div>

    <script src="{{URL::to('resources/assets/ampleadmin/plugins/bower_components/typeahead.js-master/dist/typeahead.bundle.min.js')}}"></script>

    <script>
        $(document).ready(function () {
            $('#occupation_other').attr('disabled', 'disabled');
            if($('.lt_ns1:checked').val()!=2){
                $('#ns1_date').removeAttr('disabled');
            }else{
                $('#ns1_date').attr('disabled', 'disabled');
            }
            if($('.lt_igg:checked').val()!=2){
                $('#igg_date').removeAttr('disabled');
            }else{
                $('#igg_date').attr('disabled', 'disabled');
            }
            if($('.lt_igm:checked').val()!=2){
                $('#igm_date').removeAttr('disabled');
            }else{
                $('#igm_date').attr('disabled', 'disabled');
            }
            if($('.lt_pcr:checked').val()!=2){
                $('#pcr_date').removeAttr('disabled');
            }else{
                $('#pcr_date').attr('disabled', 'disabled');
            }


            $('#site_id').change(function () {
                if($('#site_id').val()==7777){
                    $('#site_name').removeAttr('disabled');
                }else{
                    $('#site_name').attr('disabled', 'disabled');
                }
            });
            $('#occupation').change(function () {
                if ($('#occupation').val() == 77) {
                    $('#occupation_other').removeAttr("disabled");
                    $('#occupation_other').focus();
                }else{
                    $('#occupation_other').attr('disabled', 'disabled');
                }
            });
            $('.lt_ns1').change(function () {
                if($('.lt_ns1:checked').val()!=2){
                    $('#ns1_date').removeAttr('disabled');
                }else{
                    $('#ns1_date').attr('disabled', 'disabled');
                }
            });
            $('.lt_igg').change(function () {
                if($('.lt_igg:checked').val()!=2){
                    $('#igg_date').removeAttr('disabled');
                }else{
                    $('#igg_date').attr('disabled', 'disabled');
                }
            });
            $('.lt_igm').change(function () {
                if($('.lt_igm:checked').val()!=2){
                    $('#igm_date').removeAttr('disabled');
                }else{
                    $('#igm_date').attr('disabled', 'disabled');
                }
            });
            $('.lt_pcr').change(function () {
                if($('.lt_pcr:checked').val()!=2){
                    $('#pcr_date').removeAttr('disabled');
                }else{
                    $('#pcr_date').attr('disabled', 'disabled');
                }
            });
            $("#dob").change(function () {
                var dateAr = $("#dob").val().split('/');
                var newDate = dateAr[1] + '/' + dateAr[2] + '/' + dateAr[0];
                console.log(newDate);
                getAge(newDate);
            });
        });
        function add_new_text(e, indicator, placeholder){
            if($(e).siblings().length < 5)
                $(e).parent().append('<input class="form-control" placeholder="'+placeholder+'" name="'+indicator+'[]" type="text" >');
        }
        function add_new_text_row(e, indicator, placeholder,type){
            var key= $('#'+indicator+' tr td:first-child input').length;

            if(type==1)
                $('#'+indicator).append('<tr><td><input class="form-control" placeholder="'+placeholder[0]+'" name="'+indicator+'['+key+'][0]" type="text" value=""></td>\n' +
                    '<td><input class="form-control  datepick" placeholder="'+placeholder[1]+'" name="'+indicator+'['+key+'][1]" type="text" value=""></td>\n' +
                    '<td><input class="form-control" placeholder="'+placeholder[2]+'" name="'+indicator+'['+key+'][2]" type="text" value=""></td>\n' +
                    '<td><input class="form-control" placeholder="'+placeholder[3]+'" name="'+indicator+'['+key+'][3]" type="text" value=""></td>' +
                    '<td><a onclick="remove(this)" class="btn btn-danger "><i class="fa fa-remove text-white"></i></a> <a class="btn btn-info" onclick=\'add_new_text_row(this, "consultation_history", ["Name of Health Centre/ Consultant","Date of admission/ consultation","OPD=0/IPD=1","Provisional diagnosis"], 1)\' class="text-right"><i class="fa fa-plus text-white"></i></a></td></tr>');
            else if(type==2)
                $('#'+indicator).append('<tr><td><input class="form-control" placeholder="'+placeholder[0]+'" name="'+indicator+'['+key+'][0]" type="text" value=""></td>\n' +
                    '<td><input class="form-control" placeholder="'+placeholder[1]+'" name="'+indicator+'['+key+'][1]" type="text" value=""></td>\n' +
                    '<td><input class="form-control  datepick" placeholder="'+placeholder[2]+'" name="'+indicator+'['+key+'][2]" type="text" value=""></td>\n' +
                    '<td><input class="form-control" placeholder="'+placeholder[3]+'" name="'+indicator+'['+key+'][3]" type="text" value=""></td>' +
                    '<td><input class="form-control" placeholder="'+placeholder[4]+'" name="'+indicator+'['+key+'][4]" type="text" value=""></td>' +
                    '<td><a onclick="remove(this)" class="btn btn-danger "><i class="fa fa-remove text-white"></i></a></td></tr>');
            else if(type==3)
                $('#'+indicator).append('<tr><td><input class="form-control" placeholder="'+placeholder[0]+'" name="'+indicator+'['+key+'][0]" type="text" value=""></td>\n' +
                    '<td><input class="form-control datepick" placeholder="'+placeholder[1]+'" name="'+indicator+'['+key+'][1]" type="text" value=""></td>\n' +
                    '<td><input class="form-control" placeholder="'+placeholder[2]+'" name="'+indicator+'['+key+'][2]" type="text" value=""></td>\n' +
                    '<td><input class="form-control datepick" placeholder="'+placeholder[3]+'" name="'+indicator+'[][3]" type="text" value=""></td>' +
                    '<td><input class="form-control" placeholder="'+placeholder[4]+'" name="'+indicator+'['+key+'][4]" type="text" value=""></td>' +
                    '<td><input class="form-control datepick" placeholder="'+placeholder[5]+'" name="'+indicator+'[][5]" type="text" value=""></td>\n' +
                    '<td><input class="form-control" placeholder="'+placeholder[6]+'" name="'+indicator+'['+key+'][6]" type="text" value=""></td>\n' +
                    '<td><input class="form-control datepick" placeholder="'+placeholder[7]+'" name="'+indicator+'['+key+'][7]" type="text" value=""></td>' +
                    '<td><input class="form-control" placeholder="'+placeholder[8]+'" name="'+indicator+'['+key+'][8]" type="text" value=""></td>' +
                    '<td><a onclick="remove(this)" class="btn btn-danger "><i class="fa fa-remove text-white"></i></a></td></tr>');

            jQuery('#datepicker-autoclose, .mydatepicker, .datepick').datepicker({
                autoclose: true,
                format: 'yyyy/mm/dd',
                todayHighlight: true,
                container: '.panel-body'
            });
        }

        function remove(e){
            $(e).parent().parent().remove();
        }
        var substringMatcher = function (strs) {
            return function findMatches(q, cb) {
                var matches, substringRegex;

                // an array that will be populated with substring matches
                matches = [];

                // regex used to determine if a string contains the substring `q`
                substrRegex = new RegExp(q, 'i');

                // iterate through the pool of strings and for any string that
                // contains the substring `q`, add it to the `matches` array
                $.each(strs, function (i, str) {
                    if (substrRegex.test(str)) {
                        matches.push(str);
                    }
                });

                cb(matches);
            };
        };
        var areas = ['Adabor', 'Azampur', 'Badda', 'Banani', 'Bangsal', 'Bimanbandar', 'Cantonment', 'Chowkbazar', 'Dakshin Khan', 'Darus Salam', 'Demra', 'Dhanmondi', 'Gendaria', 'Gulshan', 'Hazaribagh', 'Jatrabari', 'Kadamtali', 'Kafrul', 'Kalabagan', 'Kamrangirchar', 'Khilgaon', 'Khilkhet', 'Kotwali', 'Lalbagh', 'Mirpur', 'Mohammadpur', 'Motijheel', 'Mugda', 'New Market', 'Pallabi', 'Paltan', 'Panthapath', 'Ramna', 'Rampura', 'Rupnagar', 'Sabujbagh', 'Shah Ali', 'Shahjahanpur', 'Shahbagh', 'Sher-e-Bangla Nagar', 'Shyampur', 'Sutrapur', 'Tejgaon Industrial Area', 'Tejgaon', 'Turag', 'Uttar Khan', 'Uttara East', 'Uttara West', 'Bsahantek', 'Vatara', 'Wari'];

        $('.the-basics-area .typeahead').typeahead({
                hint: true,
                highlight: true,
                minLength: 1
            },
            {
                name: 'areas',
                source: substringMatcher(areas)
            });


        function getAge(dateString) {
            var now = new Date();
            var today = new Date(now.getYear(),now.getMonth(),now.getDate());

            var yearNow = now.getYear();
            var monthNow = now.getMonth();
            var dateNow = now.getDate();

            var dob = new Date(dateString.substring(6,10),
                dateString.substring(0,2)-1,
                dateString.substring(3,5)
            );

            var yearDob = dob.getYear();
            var monthDob = dob.getMonth();
            var dateDob = dob.getDate();
            var age = {};
            var ageString = "";
            var yearString = "";
            var monthString = "";
            var dayString = "";


            yearAge = yearNow - yearDob;

            if (monthNow >= monthDob)
                var monthAge = monthNow - monthDob;
            else {
                yearAge--;
                var monthAge = 12 + monthNow -monthDob;
            }

            if (dateNow >= dateDob)
                var dateAge = dateNow - dateDob;
            else {
                monthAge--;
                var dateAge = 31 + dateNow - dateDob;

                if (monthAge < 0) {
                    monthAge = 11;
                    yearAge--;
                }
            }

            age = {
                years: yearAge,
                months: monthAge,
                days: dateAge
            };

            if ( age.years > 1 ) yearString = " years";
            else yearString = " year";
            if ( age.months> 1 ) monthString = " months";
            else monthString = " month";
            if ( age.days > 1 ) dayString = " days";
            else dayString = " day";


            if ( (age.years > 0) && (age.months > 0) && (age.days > 0) ){
                $('#age').val(age.years);
                $('#months').val(age.months);
                $('#days').val(age.days);
            }
            // ageString = age.years + yearString + ", " + age.months + monthString + ", and " + age.days + dayString + " old.";
            else if ( (age.years == 0) && (age.months == 0) && (age.days > 0) )
            {
                $('#age').val(0);
                $('#months').val(0);
                $('#days').val(age.days);
            }
            // ageString = "Only " + age.days + dayString + " old!";
            else if ( (age.years > 0) && (age.months == 0) && (age.days == 0) )
            {
                $('#age').val(age.years);
                $('#months').val(0);
                $('#days').val(0);
            }
            //   ageString = age.years + yearString + " old. Happy Birthday!!";
            else if ( (age.years > 0) && (age.months > 0) && (age.days == 0) )
            {
                $('#age').val(age.years);
                $('#months').val(age.months);
                $('#days').val(0);
            }
            //    ageString = age.years + yearString + " and " + age.months + monthString + " old.";
            else if ( (age.years == 0) && (age.months > 0) && (age.days > 0) ){
                $('#age').val(0);
                $('#months').val(age.months);
                $('#days').val(age.days);
            }
            // ageString = age.months + monthString + " and " + age.days + dayString + " old.";
            else if ( (age.years > 0) && (age.months == 0) && (age.days > 0) ){
                $('#age').val(age.years);
                $('#months').val(0);
                $('#days').val(age.days);
            }
            //    ageString = age.years + yearString + " and " + age.days + dayString + " old.";
            else if ( (age.years == 0) && (age.months > 0) && (age.days == 0) )
            {
                $('#age').val(0);
                $('#months').val(age.months);
                $('#days').val(0);
            }
            // ageString = age.months + monthString + " old.";
            else{
                $('#age').val(0);
                $('#months').val(0);
                $('#days').val(0);
            }// ageString = "Oops! Could not calculate age!";
            return ageString;
        }
    </script>
@stop
