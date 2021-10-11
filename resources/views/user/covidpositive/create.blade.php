@extends('layouts/master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    {{$pageTitle}}
                </div>
                <div class="panel-body">
                     <!-- { !! Form::open(array('url' => isset($model)?session('access').'covic/'.$model->id :session('access').'covic','id'=>'form','method' => isset($model)?'put':'post',  'enctype'=>'multipart/form-data')) !!}  -->
                    {!! Form::open(array('url' => 'covid-positive/create','id'=>'form','method' => isset($model)?'put':'post',  'enctype'=>'multipart/form-data')) !!}
                    <div class="row">

                        <div class="col-md-6 col-sm-12">

                            <div class="form-group {!! $errors->first('name')?'has-error':'' !!} clear">
                                <label class="control-label clear">Date of reporting</label>
                                <input type="date" value="{{ old('report_date',isset($model->report_date)?$model->report_date:date('Y-m-d')) }}" name="report_date" class="form-control">
                                @if ($errors->first('report_date'))
                                    <div class="alert alert-danger">{!! $errors->first('report_date') !!}</div>@endif
                            </div>
                        </div>



                        <div class="col-md-6 col-sm-12">
                             <div class="form-group {!! $errors->first('report_country')?'has-error':'' !!} clear" >
                                <label class="control-label clear">Reporting Country</label>

                                    {!! Form::select('report_country',[''=>'--- report country ---']+\App\Models\CovidPositive::countryList(),Input::old('report_country',isset($model->report_country)?$model->report_country:''), array('id' => 'report_country', 'class' => 'form-control select2')) !!}
                                    @if($errors->first('report_country'))
                                    <div class="alert alert-danger">{!! $errors->first('report_country') !!}</div>@endif
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-12">

                             <label class="control-label clear">Why tested for COVID-19</label>

                             <br/>
                               <label>{{ Form::checkbox('why_test1',1,Input::old('why_test1',isset($model->why_test1)?true:false), array('id'=>'why_test1')) }} Contact of a case</label>

                             <br/>
                               <label>{{ Form::checkbox('why_test2',1,Input::old('why_test2',isset($model->why_test2)?true:false), array('id'=>'why_test2')) }} Seeking Healthcare due to suspicion of Covid-19</lable>
                            <br/>
                               <label>{{ Form::checkbox('why_test3',1,Input::old('why_test3',isset($model->why_test3)?true:false), array('id'=>'why_test3')) }} Detected at point of entry</lable>
                            <br/>
                              <label>{{ Form::checkbox('why_test4',1,Input::old('why_test4',isset($model->why_test4)?true:false), array('id'=>'why_test4')) }} Repatriation </lable>
                            <br/>
                              <label>{{ Form::checkbox('why_test5',1,Input::old('why_test5',isset($model->why_test5)?true:false), array('id'=>'why_test5')) }}  Routine respiratory disease surveillance systems</label>
                            <br/>
                              <label>{{ Form::checkbox('why_test6',1,Input::old('why_test6',isset($model->why_test6)?true:false), array('id'=>'why_test6')) }} Unknown </lable>
                            <div class="form-group {!! $errors->first('why_teste')?'has-error':'' !!} clear">
                                <label class="control-label clear">Explanation</label>
                                {!! Form::text('why_teste', Input::old('why_teste',isset($model->why_teste)?$model->why_teste:''),array('class' => 'form-control','placeholder'=>'Unknown Explanation')) !!}
                                @if ($errors->first('why_teste'))
                                    <div class="alert alert-danger">{!! $errors->first('why_teste') !!}</div>@endif
                            </div>

                        </div>
                  </div>
                  <div class="panel-heading">
                      Section 1: Patient information
                  </div>
                  <br/>
                  <div class="row">

                        <div class="col-md-6 col-sm-12">
                          <div class="form-group {!! $errors->first('unique_case')?'has-error':'' !!} clear" >
                             <label class="control-label clear">Unique Case Identifier (used in country): </label>
                             {!! Form::text('unique_case', Input::old('unique_case',isset($model->unique_case)?$model->unique_case:''),array('class' => 'form-control','placeholder'=>'unique case')) !!}
                             @if ($errors->first('unique_case'))
                                 <div class="alert alert-danger">{!! $errors->first('unique_case') !!}</div>@endif
                          </div>
                        </div>

                        <div class="col-md-6 col-sm-12">

                            <div class="form-group {!! $errors->first('age')?'has-error':'' !!} clear">
                                <label class="control-label clear">Age</label>
                                {!! Form::number('age', Input::old('age',isset($model->age)?$model->age:''),array('class' => 'form-control','placeholder'=>'Age', 'min'=>1)) !!}
                                @if ($errors->first('age'))
                                    <div class="alert alert-danger">{!! $errors->first('age') !!}</div>@endif
                            </div>
                        </div>


                      <div class="col-md-6 col-sm-12">
                       <div class="form-group {!! $errors->first('age_type')?'has-error':'' !!} clear" >
                          <label class="control-label clear">Age Type</label>

                              {!! Form::select('age_type',[''=>'--- Age Type ---']+\App\Models\CovidPositive::getAgeType(),Input::old('age_type',isset($model->age_type)?$model->age_type:1), array('id' => 'age_type', 'class' => 'form-control')) !!}
                              @if($errors->first('age_type'))
                              <div class="alert alert-danger">{!! $errors->first('age_type') !!}</div>@endif
                          </div>
                      </div>
                    <div class="col-md-6 col-sm-12">
                     <div class="form-group {!! $errors->first('sex')?'has-error':'' !!} clear" >
                        <label class="control-label clear">Gender</label>
                            {!! Form::select('sex',[''=>'--- Gender ---']+\App\Models\CovidPositive::getGender(),Input::old('sex',isset($model->sex)?$model->sex:''), array('id' => 'sex', 'class' => 'form-control')) !!}
                            @if($errors->first('sex'))
                            <div class="alert alert-danger">{!! $errors->first('sex') !!}</div>@endif
                      </div>
                  </div>
                  <div class="col-md-6 col-sm-12">
                       <div class="form-group {!! $errors->first('report_country')?'has-error':'' !!} clear" >
                          <label class="control-label clear">Diagnosed Country</label>

                              {!! Form::select('diagnosed_country',[''=>'--- diagnosed country ---']+\App\Models\CovidPositive::countryList(),Input::old('diagnosed_country',isset($model->diagnosed_country)?$model->diagnosed_country:''), array('id' => 'diagnosed_country', 'class' => 'form-control select2')) !!}
                              @if($errors->first('diagnosed_country'))
                              <div class="alert alert-danger">{!! $errors->first('diagnosed_country') !!}</div>@endif
                      </div>
                  </div>
                  <div class="col-md-6 col-sm-12">
                    <div class="form-group {!! $errors->first('unique_case')?'has-error':'' !!} clear" >
                       <label class="control-label clear">Admin Level 1(province): </label>
                       {!! Form::text('province', Input::old('province',isset($model->province)?$model->province:''),array('class' => 'form-control','placeholder'=>'province')) !!}
                       @if ($errors->first('province'))
                           <div class="alert alert-danger">{!! $errors->first('province') !!}</div>@endif
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-12">
                       <div class="form-group {!! $errors->first('report_country')?'has-error':'' !!} clear" >
                          <label class="control-label clear">Residency Country</label>

                              {!! Form::select('residency_country',[''=>'--- residency country ---']+\App\Models\CovidPositive::countryList(),Input::old('residency_country',isset($model->residency_country)?$model->residency_country:''), array('id' => 'residency_country', 'class' => 'form-control select2')) !!}
                              @if($errors->first('residency_country'))
                              <div class="alert alert-danger">{!! $errors->first('residency_country') !!}</div>@endif
                      </div>
                  </div>
                </div>
                <div class="panel-heading">
                    Section 2: Clinical Status
                </div>
                <br/>
                <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group {!! $errors->first('confirm_date')?'has-error':'' !!} clear">
                                <label class="control-label clear">Date of first laboratory confirmation test</label>
                                <input type="date" value="{{ old('confirm_date',isset($model->confirm_date)?$model->confirm_date:date('Y-m-d')) }}" name="confirm_date" class="form-control">
                                @if ($errors->first('confirm_date'))
                                    <div class="alert alert-danger">{!! $errors->first('confirm_date') !!}</div>@endif
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-12">
                            <div class="form-group {!! $errors->first('sns')?'has-error':'' !!} clear">
                                <label class="control-label clear">Signs &amp; Symptoms time of first laboratory test</label>
                                {!! Form::select('sns',[''=>'--- Select case ---']+\App\Models\CovidPositive::commonIP(),Input::old('sns',isset($model->sns)?$model->sns:null), array('id' => 'sns', 'class' => 'form-control')) !!}
                                @if($errors->first('sns'))
                                    <div class="alert alert-danger">{!! $errors->first('sns') !!}</div>@endif
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-12">
                            <div class="form-group {!! $errors->first('sns_date')?'has-error':'' !!} clear">
                                <label class="control-label clear">Date of onset Symptoms</label>
                                <input type="date" value="{{ old('sns_date',isset($model->sns_date)?$model->sns_date:date('Y-m-d')) }}" name="sns_date" class="form-control">
                                @if ($errors->first('sns_date'))
                                    <div class="alert alert-danger">{!! $errors->first('sns_date') !!}</div>@endif
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-12">
                            <div class="form-group {!! $errors->first('comorbidity')?'has-error':'' !!} clear">
                                <label class="control-label clear">Underlying conditions and comorbodity</label>
                                {!! Form::select('comorbidity',[''=>'--- Select case ---']+\App\Models\CovidPositive::commonIP(),Input::old('comorbidity',isset($model->comorbidity)?$model->comorbidity:null), array('id' => 'comorbidity', 'class' => 'form-control')) !!}
                                @if($errors->first('comorbidity'))
                                    <div class="alert alert-danger">{!! $errors->first('comorbidity') !!}</div>@endif
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-12">

                             <label class="control-label clear">Comorbodity</label>

                             <br/>
                               <label>{{ Form::checkbox('comorbidity1',1,Input::old('comorbidity1',isset($model->comorbidity1)?true:false), array('id'=>'comorbidity1')) }} Pregnency</label>


                             <label class="control-label clear">Pregnency Timester</label>
                             {!! Form::text('preg_time', Input::old('preg_time',isset($model->preg_time)?$model->preg_time:''),array('class' => 'form-control','placeholder'=>'Please Specify time in months')) !!}
                             @if ($errors->first('preg_time'))
                                 <div class="alert alert-danger">{!! $errors->first('preg_time') !!}</div>@endif


                             <br/>
                               <label>{{ Form::checkbox('comorbidity2',1,Input::old('comorbidity2',isset($model->comorbidity2)?true:false), array('id'=>'comorbidity2')) }} Cardiovascular disease, including hypertension</lable>

                            <br/>
                               <label>{{ Form::checkbox('comorbidity3',1,Input::old('comorbidity3',isset($model->comorbidity3)?true:false), array('id'=>'comorbidity3')) }} Diabates</lable>

                            <br/>
                              <label>{{ Form::checkbox('comorbidity4',1,Input::old('comorbidity4',isset($model->comorbidity4)?true:false), array('id'=>'comorbidity4')) }} Liver Disease </lable>

                            <br/>
                              <label>{{ Form::checkbox('comorbidity5',1,Input::old('comorbidity5',isset($model->comorbidity5)?true:false), array('id'=>'comorbidity5')) }} Chronic neuroogical or neurological disease</label>
                            <br/>
                              <label>{{ Form::checkbox('comorbidity6',1,Input::old('comorbidity6',isset($model->comorbidity6)?true:false), array('id'=>'comorbidity6')) }} Post-partum(6 weeks) </lable>
                            <br/>
                              <label>{{ Form::checkbox('comorbidity7',1,Input::old('comorbidity7',isset($model->comorbidity7)?true:false), array('id'=>'comorbidity7')) }} Immunodeficiency, including HIV</lable>
                            <br/>
                              <label>{{ Form::checkbox('comorbidity8',1,Input::old('comorbidity8',isset($model->comorbidity8)?true:false), array('id'=>'comorbidity8')) }} Renal disease</lable>
                            <br/>
                              <label>{{ Form::checkbox('comorbidity9',1,Input::old('comorbidity9',isset($model->comorbidity9)?true:false), array('id'=>'comorbidity9')) }} Chronic lung disease</lable>
                            <br/>
                              <label>{{ Form::checkbox('comorbidity10',1,Input::old('comorbidity10',isset($model->comorbidity10)?true:false), array('id'=>'comorbidity10')) }} Malignancy</lable>
                            <br/>
                              <label>{{ Form::checkbox('comorbiditye',1,Input::old('comorbiditye',isset($model->comorbiditye)?true:false), array('id'=>'comorbiditye')) }} Others</lable>
                            <div class="form-group {!! $errors->first('comorboditye_txt')?'has-error':'' !!} clear">
                            <label class="control-label clear">Please Specify</label>
                            {!! Form::text('comorboditye_txt', Input::old('comorboditye_txt',isset($model->comorboditye_txt)?$model->comorboditye_txt:''),array('class' => 'form-control','placeholder'=>'Please Specify')) !!}
                            @if ($errors->first('comorboditye_txt'))
                                <div class="alert alert-danger">{!! $errors->first('comorboditye_txt') !!}</div>@endif
                            </div>

                        </div>

                        <div class="col-md-6 col-sm-12">

                            <div class="form-group {!! $errors->first('hospital_admission')?'has-error':'' !!} clear">
                                <label class="control-label clear">Admission to hospital</label>
                                {!! Form::select('hospital_admission',[''=>'--- Select case ---']+\App\Models\CovidPositive::commonIP(),Input::old('hospital_admission',isset($model->hospital_admission)?$model->hospital_admission:null), array('id' => 'hospital_admission', 'class' => 'form-control')) !!}
                                @if($errors->first('hospital_admission'))
                                    <div class="alert alert-danger">{!! $errors->first('hospital_admission') !!}</div>@endif
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-12">
                            <div class="form-group {!! $errors->first('hs_date')?'has-error':'' !!} clear">
                                <label class="control-label clear">First date of admission to hospital</label>
                                <input type="date" value="{{ old('hs_date',isset($model->hs_date)?$model->hs_date:date('Y-m-d')) }}" name="hs_date" class="form-control">
                                @if ($errors->first('hs_date'))
                                    <div class="alert alert-danger">{!! $errors->first('hs_date') !!}</div>@endif
                            </div>
                        </div>


                        <div class="col-md-6 col-sm-12">
                            <div class="form-group {!! $errors->first('hs_3')?'has-error':'' !!} clear">
                                <label class="control-label clear">Did the case recieve care in an intensive care unit</label>
                                {!! Form::select('hs_3',[''=>'--- Select case ---']+\App\Models\CovidPositive::commonIP(),Input::old('hs_3',isset($model->hs_3)?$model->hs_3:null), array('id' => 'hs_3', 'class' => 'form-control')) !!}
                                @if($errors->first('hs_3'))
                                    <div class="alert alert-danger">{!! $errors->first('hs_3') !!}</div>@endif
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group {!! $errors->first('hs_4')?'has-error':'' !!} clear">
                                <label class="control-label clear">Did the case recieve ventila?</label>
                                {!! Form::select('hs_4',[''=>'--- Select case ---']+\App\Models\CovidPositive::commonIP(),Input::old('hs_4',isset($model->hs_4)?$model->hs_4:null), array('id' => 'hs_4', 'class' => 'form-control')) !!}
                                @if($errors->first('hs_4'))
                                    <div class="alert alert-danger">{!! $errors->first('hs_4') !!}</div>@endif
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group {!! $errors->first('hs_5')?'has-error':'' !!} clear">
                                <label class="control-label clear">Did the case recieve extracorporeal membrance oxygen</label>
                                {!! Form::select('hs_5',[''=>'--- Select case ---']+\App\Models\CovidPositive::commonIP(),Input::old('hs_5',isset($model->hs_5)?$model->hs_5:null), array('id' => 'hs_5', 'class' => 'form-control')) !!}
                                @if($errors->first('hs_5'))
                                    <div class="alert alert-danger">{!! $errors->first('hs_5') !!}</div>@endif
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-12">
                            <div class="form-group {!! $errors->first('hs_6')?'has-error':'' !!} clear">
                                <label class="control-label clear">Is case in isolation with Infection Control Practice in place</label>
                                {!! Form::select('hs_6',[''=>'--- Select case ---']+\App\Models\CovidPositive::commonIP(),Input::old('hs_6',isset($model->hs_6)?$model->hs_5:null), array('id' => 'hs_6', 'class' => 'form-control')) !!}
                                @if($errors->first('hs_6'))
                                    <div class="alert alert-danger">{!! $errors->first('hs_6') !!}</div>@endif
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group {!! $errors->first('hs_7')?'has-error':'' !!} clear">
                                <label class="control-label clear">Date of Isolation</label>
                                <input type="date" value="{{ old('hs_7',isset($model->hs_7)?$model->hs_7:date('Y-m-d')) }}" name="hs_7" class="form-control">
                                @if ($errors->first('hs_7'))
                                    <div class="alert alert-danger">{!! $errors->first('hs_7') !!}</div>@endif
                            </div>
                        </div>
                      </div>
                      <div class="panel-heading">
                          Section 3: Exposure risk in the 14 days prior to symptom onset (prior to testing if asymptomatic)
                      </div>
                      <br/>
                      <div class="row">

                        <div class="col-md-6 col-sm-12">
                            <div class="form-group {!! $errors->first('exp_1')?'has-error':'' !!} clear">
                                <label class="control-label clear">Is case a Health care worker (any job in a health care setting)</label>
                                {!! Form::select('exp_1',[''=>'--- Select case ---']+\App\Models\CovidPositive::commonIP(),Input::old('exp_1',isset($model->exp_1)?$model->exp_1:null), array('id' => 'exp_1', 'class' => 'form-control')) !!}
                                @if($errors->first('exp_1'))
                                    <div class="alert alert-danger">{!! $errors->first('exp_1') !!}</div>@endif
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-12">
                             <div class="form-group {!! $errors->first('exp_2')?'has-error':'' !!} clear" >
                                <label class="control-label clear">Country</label>

                                    {!! Form::select('exp_2',[''=>'--- country ---']+\App\Models\CovidPositive::countryList(),Input::old('exp_2',isset($model->exp_2)?$model->exp_2:''), array('id' => 'exp_2', 'class' => 'form-control select2')) !!}
                                    @if($errors->first('exp_2'))
                                    <div class="alert alert-danger">{!! $errors->first('exp_2') !!}</div>@endif
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-12">
                            <div class="form-group {!! $errors->first('exp_3')?'has-error':'' !!} clear">
                                <label class="control-label clear">City</label>
                                {!! Form::text('exp_3', Input::old('exp_3',isset($model->exp_3)?$model->exp_3:''),array('class' => 'form-control','placeholder'=>'City')) !!}
                                @if ($errors->first('exp_3'))
                                    <div class="alert alert-danger">{!! $errors->first('exp_3') !!}</div>@endif
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group {!! $errors->first('exp_4')?'has-error':'' !!} clear">
                                <label class="control-label clear">Name of Facility</label>
                                {!! Form::text('exp_4', Input::old('exp_4',isset($model->exp_4)?$model->exp_4:''),array('class' => 'form-control','placeholder'=>'Name of Facility')) !!}
                                @if ($errors->first('exp_4'))
                                    <div class="alert alert-danger">{!! $errors->first('exp_4') !!}</div>@endif
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group {!! $errors->first('exp_5')?'has-error':'' !!} clear">
                                <label class="control-label clear">Travelled in the 14 days prior to symptom onset</label>
                                {!! Form::select('exp_5',[''=>'--- Select case ---']+\App\Models\CovidPositive::commonIP(),Input::old('exp_5',isset($model->exp_5)?$model->exp_5:null), array('id' => 'exp_5', 'class' => 'form-control')) !!}
                                @if($errors->first('exp_5'))
                                    <div class="alert alert-danger">{!! $errors->first('exp_5') !!}</div>@endif
                            </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6 col-sm-12">
                             <div class="form-group {!! $errors->first('exp_6')?'has-error':'' !!} clear" >
                                <label class="control-label clear">Country</label>

                                    {!! Form::select('exp_6',[''=>'--- country ---']+\App\Models\CovidPositive::countryList(),Input::old('exp_6',isset($model->exp_6)?$model->exp_6:''), array('id' => 'exp_6', 'class' => 'form-control select2')) !!}
                                    @if($errors->first('exp_6'))
                                    <div class="alert alert-danger">{!! $errors->first('exp_6') !!}</div>@endif
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-12">
                            <div class="form-group {!! $errors->first('exp_7')?'has-error':'' !!} clear">
                                <label class="control-label clear">City</label>
                                {!! Form::text('exp_7', Input::old('exp_7',isset($model->exp_7)?$model->exp_7:''),array('class' => 'form-control','placeholder'=>'City')) !!}
                                @if ($errors->first('exp_7'))
                                    <div class="alert alert-danger">{!! $errors->first('exp_7') !!}</div>@endif
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group {!! $errors->first('exp_8')?'has-error':'' !!} clear">
                                <label class="control-label clear">Date</label>
                                <input type="date" value="{{ old('exp_8',isset($model->exp_8)?$model->exp_8:date('Y-m-d')) }}" name="exp_8" class="form-control">
                                @if ($errors->first('exp_8'))
                                    <div class="alert alert-danger">{!! $errors->first('exp_8') !!}</div>@endif
                            </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6 col-sm-12">
                             <div class="form-group {!! $errors->first('exp_9')?'has-error':'' !!} clear" >
                                <label class="control-label clear">Country</label>

                                    {!! Form::select('exp_9',[''=>'--- country ---']+\App\Models\CovidPositive::countryList(),Input::old('exp_9',isset($model->exp_9)?$model->exp_9:''), array('id' => 'exp_9', 'class' => 'form-control select2')) !!}
                                    @if($errors->first('exp_9'))
                                    <div class="alert alert-danger">{!! $errors->first('exp_9') !!}</div>@endif
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-12">
                            <div class="form-group {!! $errors->first('exp_10')?'has-error':'' !!} clear">
                                <label class="control-label clear">City</label>
                                {!! Form::text('exp_10', Input::old('exp_10',isset($model->exp_10)?$model->exp_10:''),array('class' => 'form-control','placeholder'=>'City')) !!}
                                @if ($errors->first('exp_10'))
                                    <div class="alert alert-danger">{!! $errors->first('exp_10') !!}</div>@endif
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group {!! $errors->first('exp_11')?'has-error':'' !!} clear">
                                <label class="control-label clear">Date</label>
                                <input type="date" value="{{ old('exp_11',isset($model->exp_11)?$model->exp_11:date('Y-m-d')) }}" name="exp_11" class="form-control">
                                @if ($errors->first('exp_11'))
                                    <div class="alert alert-danger">{!! $errors->first('exp_11') !!}</div>@endif
                            </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6 col-sm-12">
                             <div class="form-group {!! $errors->first('exp_12')?'has-error':'' !!} clear" >
                                <label class="control-label clear">Country</label>

                                    {!! Form::select('exp_12',[''=>'--- country ---']+\App\Models\CovidPositive::countryList(),Input::old('exp_12',isset($model->exp_12)?$model->exp_12:''), array('id' => 'exp_12', 'class' => 'form-control select2')) !!}
                                    @if($errors->first('exp_12'))
                                    <div class="alert alert-danger">{!! $errors->first('exp_12') !!}</div>@endif
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-12">
                            <div class="form-group {!! $errors->first('exp_13')?'has-error':'' !!} clear">
                                <label class="control-label clear">City</label>
                                {!! Form::text('exp_13', Input::old('exp_13',isset($model->exp_13)?$model->exp_13:''),array('class' => 'form-control','placeholder'=>'City')) !!}
                                @if ($errors->first('exp_13'))
                                    <div class="alert alert-danger">{!! $errors->first('exp_13') !!}</div>@endif
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group {!! $errors->first('exp_14')?'has-error':'' !!} clear">
                                <label class="control-label clear">Date</label>
                                <input type="date" value="{{ old('exp_14',isset($model->exp_14)?$model->exp_14:date('Y-m-d')) }}" name="exp_14" class="form-control">
                                @if ($errors->first('exp_14'))
                                    <div class="alert alert-danger">{!! $errors->first('exp_14') !!}</div>@endif
                            </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group {!! $errors->first('exp_15')?'has-error':'' !!} clear">
                                <label class="control-label clear">Has case <strong>visited any health care facility</strong> in the 14 days prior to symptom onset?</label>
                                {!! Form::select('exp_15',[''=>'--- Select case ---']+\App\Models\CovidPositive::commonIP(),Input::old('exp_15',isset($model->exp_15)?$model->exp_15:null), array('id' => 'exp_15', 'class' => 'form-control')) !!}
                                @if($errors->first('exp_15'))
                                    <div class="alert alert-danger">{!! $errors->first('exp_15') !!}</div>@endif
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group {!! $errors->first('exp_16')?'has-error':'' !!} clear">
                                <label class="control-label clear">Has case had <strong>contacted with a confirmed case</strong> in the 14 days prior to symptom onset?</label>
                                {!! Form::select('exp_16',[''=>'--- Select case ---']+\App\Models\CovidPositive::commonIP(),Input::old('exp_16',isset($model->exp_16)?$model->exp_16:null), array('id' => 'exp_16', 'class' => 'form-control')) !!}
                                @if($errors->first('exp_16'))
                                    <div class="alert alert-danger">{!! $errors->first('exp_16') !!}</div>@endif
                            </div>
                        </div>
<!-- Exp 17 and after wards lower of section 3 -->
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group {!! $errors->first('exp_17')?'has-error':'' !!} clear">
                                <label class="control-label clear">If yes, please list unique identifires of all probalbe or confirmed case:</label>
                                {!! Form::text('exp_17', Input::old('exp_17',isset($model->exp_17)?$model->exp_17:''),array('class' => 'form-control','placeholder'=>'Confirmed Case')) !!}
                                @if ($errors->first('exp_17'))
                                    <div class="alert alert-danger">{!! $errors->first('exp_17') !!}</div>@endif
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group {!! $errors->first('exp_18')?'has-error':'' !!} clear">
                                <label class="control-label clear">If yes, please explain contact setting:</label>
                                {!! Form::text('exp_18', Input::old('exp_18',isset($model->exp_18)?$model->exp_18:''),array('class' => 'form-control','placeholder'=>'Contact setting')) !!}
                                @if ($errors->first('exp_18'))
                                    <div class="alert alert-danger">{!! $errors->first('exp_18') !!}</div>@endif
                            </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group {!! $errors->first('exp_19')?'has-error':'' !!} clear">
                                <label class="control-label clear">Contact ID</label>
                                {!! Form::text('exp_19', Input::old('exp_19',isset($model->exp_19)?$model->exp_19:''),array('class' => 'form-control','placeholder'=>'Contact ID')) !!}
                                @if ($errors->first('exp_19'))
                                    <div class="alert alert-danger">{!! $errors->first('exp_19') !!}</div>@endif
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group {!! $errors->first('exp_20')?'has-error':'' !!} clear">
                                <label class="control-label clear">Date</label>
                                <input type="date" value="{{ old('exp_20',isset($model->exp_20)?$model->exp_20:date('Y-m-d')) }}" name="exp_20" class="form-control">
                                @if ($errors->first('exp_20'))
                                    <div class="alert alert-danger">{!! $errors->first('exp_20') !!}</div>@endif
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group {!! $errors->first('exp_21')?'has-error':'' !!} clear">
                                <label class="control-label clear">Date</label>
                                <input type="date" value="{{ old('exp_21',isset($model->exp_21)?$model->exp_21:date('Y-m-d')) }}" name="exp_21" class="form-control">
                                @if ($errors->first('exp_21'))
                                    <div class="alert alert-danger">{!! $errors->first('exp_21') !!}</div>@endif
                            </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group {!! $errors->first('exp_22')?'has-error':'' !!} clear">
                                <label class="control-label clear">Contact ID</label>
                                {!! Form::text('exp_22', Input::old('exp_22',isset($model->exp_22)?$model->exp_22:''),array('class' => 'form-control','placeholder'=>'Contact ID')) !!}
                                @if ($errors->first('exp_22'))
                                    <div class="alert alert-danger">{!! $errors->first('exp_22') !!}</div>@endif
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group {!! $errors->first('exp_23')?'has-error':'' !!} clear">
                                <label class="control-label clear">Date</label>
                                <input type="date" value="{{ old('exp_23',isset($model->exp_23)?$model->exp_23:date('Y-m-d')) }}" name="exp_23" class="form-control">
                                @if ($errors->first('exp_23'))
                                    <div class="alert alert-danger">{!! $errors->first('exp_23') !!}</div>@endif
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group {!! $errors->first('exp_24')?'has-error':'' !!} clear">
                                <label class="control-label clear">Date</label>
                                <input type="date" value="{{ old('exp_24',isset($model->exp_24)?$model->exp_24:date('Y-m-d')) }}" name="exp_24" class="form-control">
                                @if ($errors->first('exp_24'))
                                    <div class="alert alert-danger">{!! $errors->first('exp_24') !!}</div>@endif
                            </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group {!! $errors->first('exp_25')?'has-error':'' !!} clear">
                                <label class="control-label clear">Contact ID</label>
                                {!! Form::text('exp_25', Input::old('exp_25',isset($model->exp_25)?$model->exp_25:''),array('class' => 'form-control','placeholder'=>'Contact ID')) !!}
                                @if ($errors->first('exp_25'))
                                    <div class="alert alert-danger">{!! $errors->first('exp_25') !!}</div>@endif
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group {!! $errors->first('exp_26')?'has-error':'' !!} clear">
                                <label class="control-label clear">Date</label>
                                <input type="date" value="{{ old('exp_26',isset($model->exp_26)?$model->exp_26:date('Y-m-d')) }}" name="exp_26" class="form-control">
                                @if ($errors->first('exp_26'))
                                    <div class="alert alert-danger">{!! $errors->first('exp_26') !!}</div>@endif
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group {!! $errors->first('exp_27')?'has-error':'' !!} clear">
                                <label class="control-label clear">Date</label>
                                <input type="date" value="{{ old('exp_27',isset($model->exp_27)?$model->exp_27:date('Y-m-d')) }}" name="exp_27" class="form-control">
                                @if ($errors->first('exp_27'))
                                    <div class="alert alert-danger">{!! $errors->first('exp_27') !!}</div>@endif
                            </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group {!! $errors->first('exp_28')?'has-error':'' !!} clear">
                                <label class="control-label clear">Contact ID</label>
                                {!! Form::text('exp_28', Input::old('exp_28',isset($model->exp_28)?$model->exp_28:''),array('class' => 'form-control','placeholder'=>'Contact ID')) !!}
                                @if ($errors->first('exp_28'))
                                    <div class="alert alert-danger">{!! $errors->first('exp_28') !!}</div>@endif
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group {!! $errors->first('exp_29')?'has-error':'' !!} clear">
                                <label class="control-label clear">Date</label>
                                <input type="date" value="{{ old('exp_29',isset($model->exp_29)?$model->exp_29:date('Y-m-d')) }}" name="exp_29" class="form-control">
                                @if ($errors->first('exp_29'))
                                    <div class="alert alert-danger">{!! $errors->first('exp_29') !!}</div>@endif
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group {!! $errors->first('exp_30')?'has-error':'' !!} clear">
                                <label class="control-label clear">Date</label>
                                <input type="date" value="{{ old('exp_30',isset($model->exp_30)?$model->exp_30:date('Y-m-d')) }}" name="exp_30" class="form-control">
                                @if ($errors->first('exp_30'))
                                    <div class="alert alert-danger">{!! $errors->first('exp_30') !!}</div>@endif
                            </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group {!! $errors->first('exp_31')?'has-error':'' !!} clear">
                                <label class="control-label clear">Contact ID</label>
                                {!! Form::text('exp_31', Input::old('exp_31',isset($model->exp_31)?$model->exp_31:''),array('class' => 'form-control','placeholder'=>'Contact ID')) !!}
                                @if ($errors->first('exp_31'))
                                    <div class="alert alert-danger">{!! $errors->first('exp_31') !!}</div>@endif
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group {!! $errors->first('exp_32')?'has-error':'' !!} clear">
                                <label class="control-label clear">Date</label>
                                <input type="date" value="{{ old('exp_32',isset($model->exp_32)?$model->exp_32:date('Y-m-d')) }}" name="exp_32" class="form-control">
                                @if ($errors->first('exp_32'))
                                    <div class="alert alert-danger">{!! $errors->first('exp_32') !!}</div>@endif
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group {!! $errors->first('exp_33')?'has-error':'' !!} clear">
                                <label class="control-label clear">Date</label>
                                <input type="date" value="{{ old('exp_33',isset($model->exp_33)?$model->exp_33:date('Y-m-d')) }}" name="exp_33" class="form-control">
                                @if ($errors->first('exp_33'))
                                    <div class="alert alert-danger">{!! $errors->first('exp_33') !!}</div>@endif
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                             <div class="form-group {!! $errors->first('exp_34')?'has-error':'' !!} clear" >
                                <label class="control-label clear">Most likely Country of Exposure</label>

                                    {!! Form::select('exp_34',[''=>'--- country ---']+\App\Models\CovidPositive::countryList(),Input::old('exp_34',isset($model->exp_34)?$model->exp_34:''), array('id' => 'exp_34', 'class' => 'form-control select2')) !!}
                                    @if($errors->first('exp_34'))
                                    <div class="alert alert-danger">{!! $errors->first('exp_34') !!}</div>@endif
                            </div>
                        </div>

                        <!-- Section 4 -->
                      </div>
                      <div class="panel-heading">
                          Section 4: Outcome : Complete and re-sent the full from as soon as outcome of disease is known or after 30 days after initial report
                      </div>
                      <br/>
                      <div class="row">

                        <div class="col-md-6 col-sm-12">
                            <div class="form-group {!! $errors->first('oc_1')?'has-error':'' !!} clear">
                                <label class="control-label clear">Date of re-submission of this report:</label>
                                <input type="date" value="{{ old('oc_1',isset($model->oc_1)?$model->oc_1:date('Y-m-d')) }}" name="oc_1" class="form-control">
                                @if ($errors->first('oc_1'))
                                    <div class="alert alert-danger">{!! $errors->first('oc_1') !!}</div>@endif
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group {!! $errors->first('oc_2')?'has-error':'' !!} clear">
                                <label class="control-label clear">Signs &amp; Symptoms prior to discharge or death</label>
                                {!! Form::select('oc_2',[''=>'--- Select case ---']+\App\Models\CovidPositive::commonIP(),Input::old('oc_2',isset($model->oc_2)?$model->oc_2:null), array('id' => 'oc_2', 'class' => 'form-control')) !!}
                                @if($errors->first('oc_2'))
                                    <div class="alert alert-danger">{!! $errors->first('oc_2') !!}</div>@endif
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group {!! $errors->first('oc_2_date')?'has-error':'' !!} clear">
                                <label class="control-label clear">Onset of symptoms\/signs of illness:</label>
                                <input type="date" value="{{ old('oc_2_date',isset($model->oc_2_date)?$model->oc_2_date:date('Y-m-d')) }}" name="oc_2_date" class="form-control">
                                @if ($errors->first('oc_2_date'))
                                    <div class="alert alert-danger">{!! $errors->first('oc_2_date') !!}</div>@endif
                            </div>
                        </div>

                    </div>
                    <div class="row">
                      <div class="col-md-6 col-sm-12">
                        <label class="control-label clear">Clinical Course</label>
                          <div class="form-group {!! $errors->first('oc_3')?'has-error':'' !!} clear">
                              <label class="control-label clear">Admission to hospital (may have been previously reported):</label>
                              {!! Form::select('oc_3',[''=>'--- Select case ---']+\App\Models\CovidPositive::commonIP(),Input::old('oc_3',isset($model->oc_3)?$model->oc_3:null), array('id' => 'oc_3', 'class' => 'form-control')) !!}
                              @if($errors->first('oc_3'))
                                  <div class="alert alert-danger">{!! $errors->first('oc_3') !!}</div>@endif
                          </div>
                      </div>

                      <div class="col-md-6 col-sm-12">
                          <div class="form-group {!! $errors->first('oc_3_date')?'has-error':'' !!} clear">
                              <label class="control-label clear">First date of admission to hospital:</label>
                              <input type="date" value="{{ old('oc_3_date',isset($model->oc_3_date)?$model->oc_3_date:date('Y-m-d')) }}" name="oc_3_date" class="form-control">
                              @if ($errors->first('oc_3_date'))
                                  <div class="alert alert-danger">{!! $errors->first('oc_3_date') !!}</div>@endif
                          </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group {!! $errors->first('oc_3_icu')?'has-error':'' !!} clear">
                                <label class="control-label clear">Did the case recieve care in an intensive care unit?</label>
                                {!! Form::select('oc_3_icu',[''=>'--- Select case ---']+\App\Models\CovidPositive::commonIP(),Input::old('oc_3_icu',isset($model->oc_3_icu)?$model->oc_3_icu:null), array('id' => 'oc_3_icu', 'class' => 'form-control')) !!}
                                @if($errors->first('oc_3_icu'))
                                    <div class="alert alert-danger">{!! $errors->first('oc_3_icu') !!}</div>@endif
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group {!! $errors->first('oc_3_ventilation')?'has-error':'' !!} clear">
                                <label class="control-label clear">Did the case recieve ventilation?</label>
                                {!! Form::select('oc_3_ventilation',[''=>'--- Select case ---']+\App\Models\CovidPositive::commonIP(),Input::old('oc_3_ventilation',isset($model->oc_3_ventilation)?$model->oc_3_ventilation:null), array('id' => 'oc_3_ventilation', 'class' => 'form-control')) !!}
                                @if($errors->first('oc_3_ventilation'))
                                    <div class="alert alert-danger">{!! $errors->first('oc_3_ventilation') !!}</div>@endif
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group {!! $errors->first('oc_3_oxy')?'has-error':'' !!} clear">
                                <label class="control-label clear">Did the case recieve extracorporeal membrane oxygenation?</label>
                                {!! Form::select('oc_3_oxy',[''=>'--- Select case ---']+\App\Models\CovidPositive::commonIP(),Input::old('oc_3_oxy',isset($model->oc_3_oxy)?$model->oc_3_oxy:null), array('id' => 'oc_3_oxy', 'class' => 'form-control')) !!}
                                @if($errors->first('oc_3_oxy'))
                                    <div class="alert alert-danger">{!! $errors->first('oc_3_oxy') !!}</div>@endif
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-12">

                             <label class="control-label clear">Health Outcome</label>

                             <br/>
                               <label>{{ Form::checkbox('oc_4',1,Input::old('oc_4',(isset($model->oc_4) && $mode->oc_4==1)?true:false), array('id'=>'oc_4')) }} Recovered\/healthy</label>

                             <br/>
                               <label>{{ Form::checkbox('oc_4',2,Input::old('oc_4',(isset($model->oc_4) && $model->oc_4==2)?true:false), array('id'=>'oc_4')) }} Not recovered</lable>

                            <br/>
                               <label>{{ Form::checkbox('oc_4',3,Input::old('oc_4',(isset($model->oc_4) && $model->oc_4==3)?true:false), array('id'=>'oc_4')) }} Death</lable>

                            <br/>
                              <label>{{ Form::checkbox('oc_4',4,Input::old('oc_4',(isset($model->oc_4) && $model->oc_4==4)?true:false), array('id'=>'oc_4')) }} Unknown</lable>

                            <br/>
                              <label>{{ Form::checkbox('oc_4',5,Input::old('oc_4',(isset($model->oc_4) && $model->oc_4==5)?true:false), array('id'=>'oc_4')) }}  Other</label>


                            <div class="form-group {!! $errors->first('oc_4_ex')?'has-error':'' !!} clear">
                                <label class="control-label clear">Explanation</label>
                                {!! Form::text('oc_4_ex', Input::old('oc_4_ex',isset($model->oc_4_ex)?$model->oc_4_ex:''),array('class' => 'form-control','placeholder'=>'Please Explanation')) !!}
                                @if ($errors->first('oc_4_ex'))
                                    <div class="alert alert-danger">{!! $errors->first('oc_4_ex') !!}</div>@endif
                            </div>

                        </div>

                        <div class="col-md-6 col-sm-12">
                            <div class="form-group {!! $errors->first('oc_4_date')?'has-error':'' !!} clear">
                                <label class="control-label clear">Date of Release from isolation/hospital or date of death:</label>
                                <input type="date" value="{{ old('oc_4_date',isset($model->oc_4_date)?$model->oc_4_date:date('Y-m-d')) }}" name="oc_4_date" class="form-control">
                                @if ($errors->first('oc_4_date'))
                                    <div class="alert alert-danger">{!! $errors->first('oc_4_date') !!}</div>@endif
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group {!! $errors->first('oc_4_test_date')?'has-error':'' !!} clear">
                                <label class="control-label clear">Hospital/ isolation, date of last laboratory test</label>
                                <input type="date" value="{{ old('oc_4_test_date',isset($model->oc_4_test_date)?$model->oc_4_test_date:date('Y-m-d')) }}" name="oc_4_test_date" class="form-control">
                                @if ($errors->first('oc_4_test_date'))
                                    <div class="alert alert-danger">{!! $errors->first('oc_4_test_date') !!}</div>@endif
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group {!! $errors->first('oc_5')?'has-error':'' !!} clear">
                                <label class="control-label clear">Result of latest test</label>
                                {!! Form::select('oc_5',[''=>'--- Select case ---']+\App\Models\CovidPositive::testResult(),Input::old('oc_5',isset($model->oc_5)?$model->oc_5:null), array('id' => 'oc_5', 'class' => 'form-control')) !!}
                                @if($errors->first('oc_5'))
                                    <div class="alert alert-danger">{!! $errors->first('oc_5') !!}</div>@endif
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">

                             <label class="control-label clear">Total number of contacts followed for this case </label>

                             <br/>
                               <label>{{ Form::checkbox('oc_6_e',1,Input::old('oc_6_e',isset($model->oc_6_e)?true:false), array('id'=>'oc_6_e')) }} Unknown</label>


                            <div class="form-group {!! $errors->first('oc_6')?'has-error':'' !!} clear">
                                <label class="control-label clear">Case</label>
                                {!! Form::text('oc_6', Input::old('oc_6',isset($model->oc_6)?$model->oc_6:''),array('class' => 'form-control','placeholder'=>'Number of case')) !!}
                                @if ($errors->first('oc_6'))
                                    <div class="alert alert-danger">{!! $errors->first('oc_6') !!}</div>@endif
                            </div>

                        </div>




                        <div class="col-md-12">

                            <div class="form-group text-right">
                                <div class="form-group text-right">
                                <button type="submit" class="btn btn-sm btn-success">Submit</button>

                            </div>
                            </div>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>  <!-- end panel -->
        </div>
    </div>

    <style type="text/css">
        .btn.btn-sm.btn-success:focus {
            background-color:#C70039;
        }

        .select_focus{
            border: 1px solid rgb(237, 0, 0);
            box-shadow:rgba(0, 0, 0, 0) 0px 1px 1px 0px inset,rgb(237, 0, 0) 0px 0px 8px 0px;
        }
    </style>

    <script type="text/javascript">

        $(document).on("focusin", ".select2", function (e) {
            //console.log($(this));
            $(this).addClass('select_focus');
        });

        $(document).on("focusout", ".select2", function (e) {
            //console.log($(this));
            $(this).removeClass('select_focus');
        });

    </script>



@stop
