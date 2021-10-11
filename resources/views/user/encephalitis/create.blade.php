@extends('layouts/master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    {{$pageTitle}}
                </div>
                <div class="panel-body">
                    {!! Form::open(array('url' => isset($encephalitis)?session('access').'encephalitis/'.$encephalitis->id :session('access').'encephalitis','id'=>'form','method' => isset($encephalitis)?'put':'post',  'enctype'=>'multipart/form-data')) !!}
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group {!! $errors->first('surveillance_id')?'has-error':'' !!} clear">
                                <label class="control-label clear">সার্ভিল্যান্স আইডি</label>
                                {!! Form::text('surveillance_id', Input::old('surveillance_id',isset($encephalitis->surveillance_id)?$encephalitis->surveillance_id:''),array('class' => 'form-control','placeholder'=>'Surveillance ID')) !!}
                                @if ($errors->first('surveillance_id'))
                                    <div class="alert alert-danger">{!! $errors->first('surveillance_id') !!}</div>@endif
                            </div>

                            <div class="form-group {!! $errors->first('date')?'has-error':'' !!} clear">
                                <label class="control-label clear">তারিখ</label>
                                {!! Form::text('date', Input::old('date',isset($encephalitis->date)?$encephalitis->date:''),array('class' => 'form-control datepick', 'placeholder' => 'yyyy-mm-dd')) !!}
                                @if ($errors->first('date'))
                                    <div class="alert alert-danger">{!! $errors->first('date') !!}</div>@endif
                            </div>
                            <div class="form-group {!! $errors->first('name')?'has-error':'' !!} clear">
                                <label class="control-label clear">রোগীর নাম</label>
                                {!! Form::text('name', Input::old('name',isset($encephalitis->name)?$encephalitis->name:''),array('class' => 'form-control','placeholder'=>'Name')) !!}
                                @if ($errors->first('name'))
                                    <div class="alert alert-danger">{!! $errors->first('name') !!}</div>@endif
                            </div>
                            <div class="form-group {!! $errors->first('age')?'has-error':'' !!} clear">
                                <label class="control-label clear">রোগী যখন অসুস্থ হয়, তখন তার বয়স (সম্পূর্ণ বছরে)</label>
                                {!! Form::text('age', Input::old('age',isset($encephalitis->age)?$encephalitis->age:''),array('min'=>0, 'class' => 'form-control','placeholder'=>'Age')) !!}
                                @if ($errors->first('age'))
                                    <div class="alert alert-danger">{!! $errors->first('age') !!}</div>@endif
                            </div>
                            <div class="form-group {!! $errors->first('sex')?'has-error':'' !!} clear">
                                <label class="control-label clear">রোগী পুরুষ না মহিলা</label>
                                {!! Form::select('sex',[''=>'---Select Gender---']+\App\Common::getGenderType(),Input::old('sex',isset($encephalitis->sex)?$encephalitis->sex:''), array('id' => 'sex', 'class' => 'form-control')) !!}
                                @if ($errors->first('sex'))
                                    <div class="alert alert-danger">{!! $errors->first('sex') !!}</div>@endif
                            </div>
                        </div>   <!-- end col-md-3 -->
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group {!! $errors->first('mobile_no')?'has-error':'' !!} clear">
                                <label class="control-label clear">মোবাইল নম্বর</label>
                                {!! Form::text('mobile_no', Input::old('mobile_no',isset($encephalitis->mobile_no)?$encephalitis->mobile_no:''),array('class' => 'form-control','placeholder'=>'Mobile no')) !!}
                                @if ($errors->first('mobile_no'))
                                    <div class="alert alert-danger">{!! $errors->first('mobile_no') !!}</div>@endif
                            </div>
                            <div class="form-group {!! $errors->first('guardian_name')?'has-error':'' !!} clear">
                                <label class="control-label clear">রোগীর অভিভাবকের নাম</label>
                                {!! Form::text('guardian_name', Input::old('guardian_name',isset($encephalitis->guardian_name)?$encephalitis->guardian_name:''),array('class' => 'form-control','placeholder'=>'Guardian Name')) !!}
                                @if ($errors->first('guardian_name'))
                                    <div class="alert alert-danger">{!! $errors->first('guardian_name') !!}</div>@endif
                            </div>
                            <div class="form-group {!! $errors->first('date_of_onset')?'has-error':'' !!} clear">
                                <label class="control-label clear">রোগীর অসুস্থতা শুরুর তারিখ</label>
                                {!! Form::text('date_of_onset', Input::old('date_of_onset',isset($encephalitis->date_of_onset)?$encephalitis->date_of_onset:''),array('class' => 'form-control datepick', 'placeholder' => 'yyyy-mm-dd')) !!}
                                @if ($errors->first('date_of_onset'))
                                    <div class="alert alert-danger">{!! $errors->first('date_of_onset') !!}</div>@endif
                            </div>
                            <div class="form-group {!! $errors->first('address')?'has-error':'' !!} clear">
                                <label class="control-label clear">রোগীর ঠিকানা</label>
                                {!! Form::text('address', Input::old('address',isset($encephalitis->address)?$encephalitis->address:''),array('class' => 'form-control','placeholder'=>'Address')) !!}
                                @if ($errors->first('address'))
                                    <div class="alert alert-danger">{!! $errors->first('address') !!}</div>@endif
                            </div>
                            <div class="form-group  {!! $errors->first('life_status')?'has-error':'' !!} ">
                                <label class="control-label clear">রোগীর বর্তমান অবস্থা (জীবিত/মৃত)</label>
                                {!! Form::select('life_status', [''=>'---Select Option---']+\App\Common::getLifeStatus(),Input::old('life_status',isset($encephalitis->life_status)?$encephalitis->life_status:''), array('id' => 'life_status', 'class' => 'form-control')) !!}
                                @if ($errors->first('life_status'))
                                    <div class="alert alert-danger">{!! $errors->first('life_status') !!}</div>@endif
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                                <a href="{{ url()->previous() }}" class="btn btn-sm btn-primary">Back</a>
                                {{  Form::hidden('previous_url',URL::previous())  }}
                            </div>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>  <!-- end panel -->
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('#area_type').change(function () {
                if($('#area_type').val()==1){
                    $('.area').parent().attr('style', 'display:none');
                    $('.thana').parent().attr('style', 'display:block');
                    $('.city').parent().attr('style', 'display:none');
                    $('.district').parent().attr('style', 'display:block');
                }else if($('#area_type').val()==2){
                    $('.area').parent().attr('style', 'display:block');
                    $('.thana').parent().attr('style', 'display:block');
                    $('.city').parent().attr('style', 'display:block');
                    $('.district').parent().attr('style', 'display:block');
                }else{
                    $('.area').parent().attr('style', 'display:none');
                    $('.thana').parent().attr('style', 'display:none');
                    $('.city').parent().attr('style', 'display:none');
                    $('.district').parent().attr('style', 'display:none');
                }
            });
            function area_type() {
                if ($('#area_type').val() == 1) {
                    $('.area').parent().attr('style', 'display:none');
                    $('.thana').parent().attr('style', 'display:block');
                    $('.city').parent().attr('style', 'display:none');
                    $('.district').parent().attr('style', 'display:block');
                } else if ($('#area_type').val() == 2) {
                    $('.area').parent().attr('style', 'display:block');
                    $('.thana').parent().attr('style', 'display:block');
                    $('.city').parent().attr('style', 'display:block');
                    $('.district').parent().attr('style', 'display:block');
                } else {
                    $('.area').parent().attr('style', 'display:none');
                    $('.thana').parent().attr('style', 'display:none');
                    $('.city').parent().attr('style', 'display:none');
                    $('.district').parent().attr('style', 'display:none');
                }
            }
            area_type();
        });
    </script>
@stop
