@extends('layouts/master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    {{$pageTitle}}
                </div>
                <div class="panel-body">
                    {!! Form::open(array('url' => isset($denguedeath)?'admin/denguedeath/'.$denguedeath->id :'admin/denguedeath','id'=>'form','method' => isset($denguedeath)?'put':'post',  'enctype'=>'multipart/form-data')) !!}
                    <div class="row">
                        <div class="col-md-3 col-sm-12">
                           
                            <div class="form-group {!! $errors->first('registration_no')?'has-error':'' !!} clear">
                                <label class="control-label clear">Registration No</label>
                                {!! Form::text('registration_no', Input::old('registration_no',isset($denguedeath->registration_no)?$denguedeath->registration_no:''),array('class' => 'form-control')) !!}
                                @if ($errors->first('registration_no'))
                                    <div class="alert alert-danger">{!! $errors->first('registration_no') !!}</div>@endif
                            </div>
                            <div class="form-group {!! $errors->first('name')?'has-error':'' !!} clear">
                                <label class="control-label clear">Name</label>
                                {!! Form::text('name', Input::old('name',isset($denguedeath->name)?$denguedeath->name:''),array('class' => 'form-control')) !!}
                                @if ($errors->first('name'))
                                    <div class="alert alert-danger">{!! $errors->first('name') !!}</div>@endif
                            </div>
                            <div class="form-group {!! $errors->first('age')?'has-error':'' !!} clear">
                                <label class="control-label clear">Age</label>
                                {!! Form::text('age', Input::old('age',isset($denguedeath->age)?$denguedeath->age:''),array('min'=>0, 'class' => 'form-control')) !!}
                                @if ($errors->first('age'))
                                    <div class="alert alert-danger">{!! $errors->first('age') !!}</div>@endif
                            </div>
                            <div class="form-group {!! $errors->first('sex')?'has-error':'' !!} clear">
                                <label class="control-label clear">Gender</label>
                                {!! Form::select('sex',[''=>'---Select Gender---']+\App\Common::getGenderType(),Input::old('sex',isset($denguedeath->sex)?$denguedeath->sex:''), array('id' => 'sex', 'class' => 'form-control')) !!}
                                @if ($errors->first('sex'))
                                    <div class="alert alert-danger">{!! $errors->first('sex') !!}</div>@endif
                            </div>
                        </div>   <!-- end col-md-3 -->
                        <div class="col-md-3 col-sm-12">
                            <div class="form-group {!! $errors->first('mobile_no')?'has-error':'' !!} clear">
                                <label class="control-label clear">Mobile</label>
                                {!! Form::text('mobile_no', Input::old('mobile_no',isset($denguedeath->mobile_no)?$denguedeath->mobile_no:''),array('class' => 'form-control')) !!}
                                @if ($errors->first('mobile_no'))
                                    <div class="alert alert-danger">{!! $errors->first('mobile_no') !!}</div>@endif
                            </div>
                            <div class="form-group {!! $errors->first('date_of_admission')?'has-error':'' !!} clear">
                                <label class="control-label clear">Date Of Admission</label>
                                {!! Form::text('date_of_admission', Input::old('date_of_admission',isset($denguedeath->date_of_admission)?$denguedeath->date_of_admission:''),array('class' => 'form-control datepick', 'placeholder' => 'yyyy-mm-dd')) !!}
                                @if ($errors->first('date_of_admission'))
                                    <div class="alert alert-danger">{!! $errors->first('date_of_admission') !!}</div>@endif
                            </div>
                            <div class="form-group {!! $errors->first('duration_of_fever')?'has-error':'' !!} clear">
                                <label class="control-label clear">Duration Of Fever</label>
                                {!! Form::number('duration_of_fever', Input::old('duration_of_fever',isset($denguedeath->duration_of_fever)?$denguedeath->duration_of_fever:''),array('min'=>0,'class' => 'form-control')) !!}
                                @if ($errors->first('duration_of_fever'))
                                    <div class="alert alert-danger">{!! $errors->first('duration_of_fever') !!}</div>@endif
                            </div>
                            <div class="form-group {!! $errors->first('current_fever_status')?'has-error':'' !!} clear">
                                <label class="control-label clear">Diagonosis</label>
                                {!! Form::select('current_fever_status', [''=>'---Select Fever Status---']+\App\Common::getFeverStatus(),Input::old('current_fever_status',isset($denguedeath->current_fever_status)?$denguedeath->current_fever_status:''), array('id' => 'current_fever_status', 'class' => 'form-control')) !!}
                                @if ($errors->first('current_fever_status'))
                                    <div class="alert alert-danger">{!! $errors->first('current_fever_status') !!}</div>@endif
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-12">
                            <div class="form-group  {!! $errors->first('area_type')?'has-error':'' !!} ">
                                <label class="control-label clear"> Area Type</label>
                                {!! Form::select('area_type', [''=>'---Select Option---']+\App\Common::getAreaType(),Input::old('area_type',isset($denguedeath->area_type)?$denguedeath->area_type:''), array('id' => 'area_type', 'class' => 'form-control')) !!}
                                @if ($errors->first('area_type'))
                                    <div class="alert alert-danger">{!! $errors->first('area_type') !!}</div>@endif
                            </div>
                            <div style="display:none" class="form-group  {!! $errors->first('area')?'has-error':'' !!} ">
                                <label class="control-label clear"> Area</label>
                                {!! Form::text('area', Input::old('area',isset($denguedeath->area)?$denguedeath->area:''),array('class' => 'form-control area')) !!}
                                @if ($errors->first('area'))
                                    <div class="alert alert-danger">{!! $errors->first('area') !!}</div>@endif
                            </div>
                            <div style="display:none" class="form-group  {!! $errors->first('Thana')?'has-error':'' !!} ">
                                <label class="control-label clear"> Thana/Upazila</label>
                                {!! Form::text('thana', Input::old('thana',isset($denguedeath->thana)?$denguedeath->thana:''),array('class' => 'form-control thana')) !!}
                                @if ($errors->first('thana'))
                                    <div class="alert alert-danger">{!! $errors->first('thana') !!}</div>@endif
                            </div>
                            <div style="display:none" class="form-group  {!! $errors->first('city')?'has-error':'' !!} ">
                                <label class="control-label clear">City</label>
                                {!! Form::text('city', Input::old('city',isset($denguedeath->city)?$denguedeath->city:''),array('class' => 'form-control city')) !!}
                                @if ($errors->first('city'))
                                    <div class="alert alert-danger">{!! $errors->first('city') !!}</div>@endif
                            </div>
                            <div style="display:none" class="form-group  {!! $errors->first('district')?'has-error':'' !!} ">
                                <label class="control-label clear"> District</label>
                                {!! Form::text('district', Input::old('district',isset($denguedeath->district)?$denguedeath->district:''),array('class' => 'form-control district')) !!}
                                @if ($errors->first('district'))
                                    <div class="alert alert-danger">{!! $errors->first('district') !!}</div>@endif
                            </div>
                        </div>  <!-- end col-md-3 -->
                        <div class="col-md-3 col-sm-12">
                            <div class="form-group  {!! $errors->first('lt_ns1')?'has-error':'' !!} ">
                                <label class="control-label clear"> Lab Tests(NS1)</label>
                                {!! Form::select('lt_ns1', [''=>'---Select Option---']+\App\Common::getLabTest(),Input::old('lt_ns1',isset($denguedeath->lt_ns1)?$denguedeath->lt_ns1:''), array('id' => 'lt_ns1', 'class' => 'form-control')) !!}
                                @if ($errors->first('lt_ns1'))
                                    <div class="alert alert-danger">{!! $errors->first('lt_ns1') !!}</div>@endif
                            </div>
                            <div class="form-group  {!! $errors->first('lt_igg')?'has-error':'' !!} ">
                                <label class="control-label clear"> IgG</label>
                                {!! Form::select('lt_igg', [''=>'---Select Option---']+\App\Common::getLabTest(),Input::old('lt_igg',isset($denguedeath->lt_igg)?$denguedeath->lt_igg:''), array('id' => 'lt_igg', 'class' => 'form-control')) !!}
                                @if ($errors->first('lt_igg'))
                                    <div class="alert alert-danger">{!! $errors->first('lt_igg') !!}</div>@endif
                            </div>
                            <div class="form-group  {!! $errors->first('lt_igm')?'has-error':'' !!} ">
                                <label class="control-label clear"> IgM</label>
                                {!! Form::select('lt_igm', [''=>'---Select Option---']+\App\Common::getLabTest(),Input::old('lt_igm',isset($denguedeath->lt_igm)?$denguedeath->lt_igm:''), array('id' => 'lt_igm', 'class' => 'form-control')) !!}
                                @if ($errors->first('lt_igm'))
                                    <div class="alert alert-danger">{!! $errors->first('lt_igm') !!}</div>@endif
                            </div>
                            <div class="form-group  {!! $errors->first('lt_pcr')?'has-error':'' !!} ">
                                <label class="control-label clear"> PCR</label>
                                {!! Form::select('lt_pcr', [''=>'---Select Option---']+\App\Common::getLabTest(),Input::old('lt_pcr',isset($denguedeath->lt_pcr)?$denguedeath->lt_pcr:''), array('id' => 'lt_pcr', 'class' => 'form-control')) !!}
                                @if ($errors->first('lt_pcr'))
                                    <div class="alert alert-danger">{!! $errors->first('lt_pcr') !!}</div>@endif
                            </div>
                        </div>  <!-- end col-md-3 -->
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
