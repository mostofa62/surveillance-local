@extends('layouts.master')
@section('content')
<div class="row">
        <div class="col-md-12">
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-3">{{$pageTitle}}</div>
                        <div class="col-md-1 print-btn">
                            <button class="btn btn-sm btn-info" id="print" onclick="printIt()">Print</button>
                        </div>
                    </div>
                </div>

                <div class="panel-body" id="panel-body">
                    @if(Session::has('message'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                            {{ Session::get('message') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-4">
                            <div class="row">

                                <div>Logo</div>
                                <div>
                                    @if(isset($setting->logo) && $setting->logo !="")
                                        <img class="img-rounded m0auto" style="height: 200px; width: 200px;"  src="{{url('public/'.@$setting->logo)}}"/>
                                    @else
                                        <img class="img-rounded m0auto" style="height: 200px; width: 200px;"
                                             src="{{url('/public/uploads/default.jpg')}}"/>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div>Login Image</div>
                                    <div>
                                        @if(isset($setting->loginimage) && $setting->loginimage !="")
                                            <img class="img-rounded m0auto" style="height: 200px; width: 200px;"  src="{{url('public/'.@$setting->loginimage)}}"/>
                                        @else
                                            <img class="img-rounded m0auto" style="height: 200px; width: 200px;"
                                                 src="{{url('/public/uploads/default.jpg')}}"/>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div>Forget Image</div>
                                    <div>
                                        @if(isset($setting->forgetimage) && $setting->forgetimage !="")
                                            <img class="img-rounded m0auto" style="height: 200px; width: 200px;"  src="{{url('public/'.@$setting->forgetimage)}}"/>
                                        @else
                                            <img class="img-rounded m0auto" style="height: 200px; width: 200px;"
                                                 src="{{url('/public/uploads/default.jpg')}}"/>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-3">Company Name</div>
                                <div class="col-md-9">{{@$setting->name}}</div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">Address</div>
                                <div class="col-md-9">{{@$setting->address}}</div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">Tax No</div>
                                <div class="col-md-9">{{@$setting->tax_no}}</div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">Footer</div>
                                <div class="col-md-9">{!! @$setting->footer !!}</div>
                            </div>
                            {{--<table>
                                <tr>
                                    <td style="text-align: right; font-weight: bold;">
                                        <div>Company Name: </div>
                                        <div> Address: </div>
                                        <div> Tax No: </div>
                                        <div> Footer: </div>
                                    </td>
                                    <td>
                                        <div>{{@$setting->name}}</div>
                                        <div>{{@$setting->address}}</div>
                                        <div> {{@$setting->tax_no}}</div>
                                        <div> {{@$setting->footer}}</div>
                                    </td>
                                </tr>
                            </table>--}}
                            
                        </div>
                    </div>
                    
                    <div class="row noPrint">
                        <div class="col-lg-12 text-right">
                            <div class="form-group ">
                                <a href="{{ url()->previous() }}" class="btn btn-sm btn-primary">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
