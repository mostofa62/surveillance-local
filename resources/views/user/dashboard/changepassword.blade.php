@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    {{$pageTitle}}
                </div>
                <div class="panel-body ">
                    @if(Session::has('message'))
                        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                    @endif
                    <form action="" method="post" class='form-horizontal form-validate' id='passwordUpdateForm'>
                        @if(@Session::get('password-failed-message'))
                            <div class="form-group">
                                <span class="col-lg-2"></span>
                                <div class="alert alert-danger text-center col-lg-10">{{@Session::pull('password-failed-message')}}</div>
                            </div>
                        @endif
                        
                        <div class="form-group">
                            <label for="old-password" class="control-label col-sm-2">Current Password</label>
                            <div class="col-sm-10">
                                <input type="password" name="old-password" id="old-password" class="form-control"
                                       data-rule-required="true"/>
                                @if ($errors->first('old-password'))
                                    <div class="alert-danger">
                                        {{$errors->first('old-password')}}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="control-label col-sm-2">New Password</label>
                            <div class="col-sm-10">
                                <input type="password" name="password" id="password" class="form-control"
                                       data-rule-required="true"/>
                                @if ($errors->first('password'))
                                    <div class="alert-danger">
                                        {{$errors->first('password')}}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation" class="control-label col-sm-2">Re-password</label>
                            <div class="col-sm-10">
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                       class="form-control"
                                       data-rule-required="true"/>
                                @if ($errors->first('password_confirmation'))
                                    <div class="alert-danger">
                                        {{$errors->first('password_confirmation')}}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="col-sm-10 col-sm-offset-2">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="submit" class="btn btn-primary" value="Submit">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@stop
