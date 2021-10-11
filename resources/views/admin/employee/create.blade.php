@extends('layouts/master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    {{$pageTitle}}
                </div>
                <div class="panel-body">
                    {!! Form::open(array('url' => isset($employee)?session('access').'employee/'.$employee->id :session('access').'employee','id'=>'form','method' => isset($employee)?'put':'post',  'enctype'=>'multipart/form-data')) !!}
                    <div class="row">
                        <div class="col-md-3 col-sm-6">
                           
                            <div class="form-group {!! $errors->first('name')?'has-error':'' !!} clear">
                                <label class="control-label clear">Name</label>
                                {!! Form::text('name', Input::old('name',isset($employee->name)?$employee->name:''),array('class' => 'form-control')) !!}
                                @if ($errors->first('name'))
                                    <div class="alert alert-danger">{!! $errors->first('name') !!}</div>@endif
                            </div>
                            {{--<div class="form-group {!! $errors->first('father_name')?'has-error':'' !!} clear">--}}
                                {{--<label class="control-label clear">Father's Name</label>--}}
                                {{--{!! Form::text('father_name', Input::old('father_name',isset($employee->father_name)?$employee->father_name:''),array('class' => 'form-control')) !!}--}}
                                {{--@if ($errors->first('father_name'))--}}
                                    {{--<div class="alert alert-danger">{!! $errors->first('father_name') !!}</div>@endif--}}
                            {{--</div>--}}
                            {{--<div class="form-group {!! $errors->first('mother_name')?'has-error':'' !!} clear">--}}
                                {{--<label class="control-label clear">Mother's Name</label>--}}
                                {{--{!! Form::text('mother_name', Input::old('mother_name',isset($employee->mother_name)?$employee->mother_name:''),array('class' => 'form-control')) !!}--}}
                                {{--@if ($errors->first('mother_name'))--}}
                                    {{--<div class="alert alert-danger">{!! $errors->first('mother_name') !!}</div>@endif--}}
                            {{--</div>--}}
                            {{--<div class="form-group {!! $errors->first('address')?'has-error':'' !!} clear">--}}
                                {{--<label class="control-label clear">Address</label>--}}
                                {{--{!! Form::text('address', Input::old('address',isset($employee->address)?$employee->address:''),array('class' => 'form-control')) !!}--}}
                                {{--@if ($errors->first('address'))--}}
                                    {{--<div class="alert alert-danger">{!! $errors->first('address') !!}</div>@endif--}}
                            {{--</div>--}}
                            <div class="form-group  {!! $errors->first('dept')?'has-error':'' !!} ">
                                <label class="control-label clear"> Department</label>
                                {!! Form::text('dept', Input::old('dept',isset($employee->dept)?$employee->dept:''),array('class' => 'form-control')) !!}
                                @if ($errors->first('dept'))
                                    <div class="alert alert-danger">{!! $errors->first('dept') !!}</div>@endif
                            </div>
                            <div class="form-group {!! $errors->first('designation')?'has-error':'' !!} clear">
                                <label class="control-label clear">Designation</label>
                                {!! Form::text('designation', Input::old('designation',isset($employee->designation)?$employee->designation:''),array('class' => 'form-control')) !!}
                                @if ($errors->first('designation'))
                                    <div class="alert alert-danger">{!! $errors->first('designation') !!}</div>@endif
                            </div>
                        </div>   <!-- end col-md-3 -->
                        <div class="col-md-3 col-sm-6">
                            <div class="form-group {!! $errors->first('username')?'has-error':'' !!} clear">
                                <label class="control-label clear">Username</label>
                                {!! Form::text('username', Input::old('username',isset($employee->user->username)?$employee->user->username:''),array('class' => 'form-control')) !!}
                                @if ($errors->first('username'))
                                    <div class="alert alert-danger">{!! $errors->first('username') !!}</div>@endif
                            </div>
                            {{--<div class="form-group {!! $errors->first('nid')?'has-error':'' !!} clear">--}}
                                {{--<label class="control-label clear">NID</label>--}}
                                {{--{!! Form::text('nid', Input::old('nid',isset($employee->nid)?$employee->nid:''),array('class' => 'form-control')) !!}--}}
                                {{--@if ($errors->first('nid'))--}}
                                    {{--<div class="alert alert-danger">{!! $errors->first('nid') !!}</div>@endif--}}
                            {{--</div>--}}
                            <div class="form-group {!! $errors->first('email')?'has-error':'' !!} clear">
                                <label class="control-label clear">Email</label>
                                {!! Form::email('email', Input::old('email',isset($employee->email)?$employee->email:''),array('class' => 'form-control')) !!}
                                @if ($errors->first('email'))
                                    <div class="alert alert-danger">{!! $errors->first('email') !!}</div>@endif
                            </div>
                            <div class="form-group {!! $errors->first('mobile')?'has-error':'' !!} clear">
                                <label class="control-label clear">Mobile</label>
                                {!! Form::text('mobile', Input::old('mobile',isset($employee->mobile)?$employee->mobile:''),array('class' => 'form-control')) !!}
                                @if ($errors->first('mobile'))
                                    <div class="alert alert-danger">{!! $errors->first('mobile') !!}</div>@endif
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="form-group {!! $errors->first('accesslist_id')?'has-error':'' !!}">
                                <label class="control-label clear">Accesslist</label>
                                {!! Form::select('accesslist_id',\App\Accesslist::withTrashed()->pluck('name', 'id')->toArray(), Input::old('accesslist_id',isset($employee->user->accesslist_id)?json_decode($employee->user->accesslist_id):''), array('id' => 'accesslist_id', 'class' => 'form-control')) !!}

                                {{--{!! Form::select('accesslist_id',[''=>"---Select a Role---"]+\App\Accesslist::withTrashed()->pluck('name', 'id')->toArray(), Input::old('accesslist_id',isset($employee->user->accesslist_id)?$employee->user->accesslist_id:''), array('id' => 'accesslist_id', 'class' => 'form-control')) !!}--}}
                                @if ($errors->first('accesslist_id'))
                                    <div class="alert alert-danger">{!! $errors->first('accesslist_id') !!}</div>@endif
                            </div>
                            <div class="form-group {!! $errors->first('project_id')?'has-error':'' !!}">
                                <label class="control-label clear">Project</label>
                                {!! Form::select('project_id',[''=>"---Select a Project---"]+\App\Project::withTrashed()->pluck('short_name', 'id')->toArray(), Input::old('project_id',isset($employee->user->project_id)?$employee->user->project_id:''), array('id' => 'project_id', 'class' => 'form-control')) !!}
                                @if ($errors->first('project_id'))
                                    <div class="alert alert-danger">{!! $errors->first('project_id') !!}</div>@endif
                            </div>

                            <div class="form-group {!! $errors->first('site_id')?'has-error':'' !!}">
                                <label class="control-label clear">Site</label>
                                {!! Form::select('site_id',[''=>"---Select a Site---"]+\App\Site::withTrashed()->pluck('short_name', 'id')->toArray(), Input::old('site_id',isset($employee->user->site_id)?$employee->user->site_id:''), array('id' => 'site_id', 'class' => 'form-control')) !!}
                                @if ($errors->first('site_id'))
                                    <div class="alert alert-danger">{!! $errors->first('site_id') !!}</div>@endif
                            </div>
                        </div>  <!-- end col-md-3 -->
                        <div class="col-md-3 col-sm-6">
                            <div class="form-group  {!! $errors->first('gender')?'has-error':'' !!} ">
                                <label class="control-label clear"> Gender</label>
                                {!! Form::select('gender',array('Male'=>'Male','Female'=>'Female','Other'=>'Other'),Input::old('gender',isset($employee->gender)?$employee->gender:''), array('id' => 'gender', 'class' => 'form-control')) !!}
                                @if ($errors->first('gender'))
                                    <div class="alert alert-danger">{!! $errors->first('gender') !!}</div>@endif
                            </div>
                            <div class="form-group  {!! $errors->first('marital_status')?'has-error':'' !!} ">
                                <label class="control-label clear"> Marital Status</label>
                                {!! Form::select('marital_status',array('Single'=>'Single','Married'=>'Married','Widowed'=>'Widowed','Divorced'=>'Divorced','Separated'=>'Separated'),Input::old('marital_status',isset($employee->marital_status)?$employee->marital_status:''), array('id' => 'marital_status', 'class' => 'form-control')) !!}
                                @if ($errors->first('marital_status'))
                                    <div class="alert alert-danger">{!! $errors->first('marital_status') !!}</div>@endif
                            </div>
                            <div class="form-group  {!! $errors->first('blood_group')?'has-error':'' !!} ">
                                <label class="control-label clear"> Blood Group</label>
                                {!! Form::select('blood_group',array('A+'=>'A+','A-'=>'A-','B+'=>'B+','B-'=>'B-','AB+'=>'AB+','AB-'=>'AB-','O+'=>'O+','O-'=>'O-'),Input::old('blood_group',isset($employee->blood_group)?$employee->blood_group:''), array('id' => 'blood_group', 'class' => 'form-control')) !!}
                                @if ($errors->first('blood_group'))
                                    <div class="alert alert-danger">{!! $errors->first('blood_group') !!}</div>@endif
                            </div>
                            <div class="form-group {!! $errors->first('image')?'has-error':'' !!} clear">
                                <label class="control-label clear">Profile Picture</label>
                                {!! Form::file('image',array('class' => 'form-control')) !!}
                                @if ($errors->first('image'))
                                    <div class="alert alert-danger">{!! $errors->first('image') !!}</div>@endif
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
@stop
