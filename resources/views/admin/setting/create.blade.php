@extends('layouts/master')
@section('content')

    <div class="row">

        <div class="col-md-12">
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    {{$pageTitle}}
                </div>

                <div class="panel-body">
                    {!! Form::open(array('url' => isset($setting)?session('access').'setting/'.$setting->id :session('access').'setting/','id'=>'form','method' => isset($setting)?'put':'post',  'enctype'=>'multipart/form-data')) !!}

                    <div class="row">
                        <div class="col-md-12 col-sm-12 ">
                            <div class="form-group {!! $errors->first('name')?'has-error':'' !!} ">
                                <label class="control-label ">Company name</label>
                                {!! Form::text('name', Input::old('name',isset($setting->name)?$setting->name:''),array('class' => 'form-control')) !!}
                                @if ($errors->first('name'))
                                    <div class="alert alert-danger">{!! $errors->first('name') !!}</div>
                                @endif
                            </div>
                            <div class="form-group {!! $errors->first('address')?'has-error':'' !!} ">
                                <label class="control-label clear">Tagline</label>
                                {!! Form::textarea('address', Input::old('address',isset($setting->address)?$setting->address:''),array('class' => 'form-control','rows'=>'3')) !!}
                                @if ($errors->first('address'))
                                    <div class="alert alert-danger">{!! $errors->first('address') !!}</div>@endif
                            </div>
                            <div class="form-group {!! $errors->first('tax_no')?'has-error':'' !!} ">
                                <label class="control-label clear">Tax No</label>
                                {!! Form::text('tax_no', Input::old('tax_no',isset($setting->tax_no)?$setting->tax_no:''),array('class' => 'form-control','rows'=>'3')) !!}
                                @if ($errors->first('tax_no'))
                                    <div class="alert alert-danger">{!! $errors->first('tax_no') !!}</div>@endif
                            </div>
                            <div class="form-group {!! $errors->first('footer')?'has-error':'' !!} ">
                                <label class="control-label clear">Footer</label>
                                {!! Form::textarea('footer', Input::old('footer',isset($setting->footer)?$setting->footer:''),array('class' => 'form-control','rows'=>'3','id'=>'mymce')) !!}
                                @if ($errors->first('footer'))
                                    <div class="alert alert-danger">{!! $errors->first('footer') !!}</div>@endif
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group {!! $errors->first('logo')?'has-error':'' !!} clear">
                                        <label class="control-label clear">Logo</label>
                                        {!! Form::file('logo',array('class' => 'form-control')) !!}
                                        @if ($errors->first('logo'))
                                            <div class="alert alert-danger">{!! $errors->first('logo') !!}</div>@endif
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group {!! $errors->first('loginimage')?'has-error':'' !!} clear">
                                        <label class="control-label clear">Login Image</label>
                                        {!! Form::file('loginimage',array('class' => 'form-control')) !!}
                                        @if ($errors->first('loginimage'))
                                            <div class="alert alert-danger">{!! $errors->first('loginimage') !!}</div>@endif
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group {!! $errors->first('forgetimage')?'has-error':'' !!} clear">
                                        <label class="control-label clear">Forget Image</label>
                                        {!! Form::file('forgetimage',array('class' => 'form-control')) !!}
                                        @if ($errors->first('forgetimage'))
                                            <div class="alert alert-danger">{!! $errors->first('forgetimage') !!}</div>@endif
                                    </div>
                                </div>
                            </div>
                        </div>   <!-- end col-md-3 -->
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
        <div class="col-sm-3 col-md-3"></div>
    </div>

@stop
