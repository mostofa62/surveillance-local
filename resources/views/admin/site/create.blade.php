@extends('layouts/master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    {{$pageTitle}}
                </div>
                <div class="panel-body">
                    {!! Form::open(array('url' => isset($site)?'admin/site/'.$site->id :'admin/site','id'=>'form','method' => isset($site)?'put':'post',  'enctype'=>'multipart/form-data')) !!}
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                           
                            <div class="form-group {!! $errors->first('name')?'has-error':'' !!} clear">
                                <label class="control-label clear">Name of Site</label>
                                {!! Form::text('name', Input::old('name',isset($site->name)?$site->name:''),array('class' => 'form-control')) !!}
                                @if ($errors->first('name'))
                                    <div class="alert alert-danger">{!! $errors->first('name') !!}</div>@endif
                            </div>
                            <div class="form-group {!! $errors->first('short_name')?'has-error':'' !!} clear">
                                <label class="control-label clear">Short name of Site</label>
                                {!! Form::text('short_name', Input::old('short_name',isset($site->short_name)?$site->short_name:''),array('class' => 'form-control')) !!}
                                @if ($errors->first('short_name'))
                                    <div class="alert alert-danger">{!! $errors->first('short_name') !!}</div>@endif
                            </div>
                            <div class="form-group {!! $errors->first('type')?'has-error':'' !!}">
                                <label class="control-label clear"> Type of Hospital</label>
                                {!! Form::select('type',["---Select a Type---"]+\App\Common::getHospitalType(), Input::old('type',isset($site->type)?$site->type:''), array('id' => 'type', 'class' => 'form-control')) !!}
                                @if ($errors->first('type'))
                                    <div class="alert alert-danger">{!! $errors->first('type') !!}</div>@endif
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
    </div>
@stop
