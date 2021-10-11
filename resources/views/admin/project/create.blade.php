@extends('layouts/master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    {{$pageTitle}}
                </div>
                <div class="panel-body">
                    {!! Form::open(array('url' => isset($project)?'admin/project/'.$project->id :'admin/project','id'=>'form','method' => isset($project)?'put':'post',  'enctype'=>'multipart/form-data')) !!}
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                           
                            <div class="form-group {!! $errors->first('name')?'has-error':'' !!} clear">
                                <label class="control-label clear">Name of Project</label>
                                {!! Form::text('name', Input::old('name',isset($project->name)?$project->name:''),array('class' => 'form-control')) !!}
                                @if ($errors->first('name'))<div class="alert alert-danger">{!! $errors->first('name') !!}</div>@endif
                            </div>
                            <div class="form-group {!! $errors->first('short_name')?'has-error':'' !!} clear">
                                <label class="control-label clear">Short name of Project</label>
                                {!! Form::text('short_name', Input::old('short_name',isset($project->short_name)?$project->short_name:''),array('class' => 'form-control')) !!}
                                @if ($errors->first('short_name'))<div class="alert alert-danger">{!! $errors->first('short_name') !!}</div>@endif
                            </div>
                            <div class="form-group {!! $errors->first('supervisor_id')?'has-error':'' !!}">
                                <label class="control-label clear"> Supervisor ID</label>
                                {!! Form::select('supervisor_id',["---Select a User---"]+\App\User::withTrashed()->pluck('username', 'id')->toArray(), Input::old('supervisor_id',isset($project->supervisor_id)?$project->supervisor_id:''), array('id' => 'supervisor_id', 'class' => 'form-control')) !!}
                                @if ($errors->first('supervisor_id'))<div class="alert alert-danger">{!! $errors->first('supervisor_id') !!}</div>@endif
                            </div>
                            <div class="form-group {!! $errors->first('site_ids')?'has-error':'' !!}">
                                <label class="control-label clear"> Site</label>
                                {!! Form::select('site_ids[]',["---Select a Site---"]+\App\Site::withTrashed()->pluck('short_name', 'id')->toArray(), Input::old('site_ids',isset($project->site_ids)?json_decode($project->site_ids):''), array('multiple'=>'multiple','id' => 'site_ids', 'class' => ' select2 select2-multiple')) !!}
                                @if ($errors->first('site_ids'))<div class="alert alert-danger">{!! $errors->first('site_ids') !!}</div>@endif
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
