@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-3">
                            {{$pageTitle}}
                        </div>
                        
                        
                    </div>
                </div>

                <a id="menu-toggle1" href="#" class="btn btn-primary btn-lg text-horizontal toggle  " style="color: white" ><i class="fa  fa-search fa-fw"></i><br>S<br>e<br>a<br>r<br>c<br>h</a>
                <div id="sidebar-wrapper1" style="height: 50%;text-decoration: none;">
                    <ul class="sidebar-nav1">
                        <a id="menu-close" href="#" class="btn btn-lg pull-right toggle"><i class="glyphicon glyphicon-remove"></i></a>
                        <div class="col-md-12 search-field" style="">
                            {!! Form::open(array('id'=>'form','method' => 'get',  'enctype'=>'multipart/form-data')) !!}
                            <table class="search_table" style="margin: 0 auto;">
                                <tbody>

                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <label class="control-label " style="color: white">SI</label>
                                            {!! Form::text('s_id_no', Input::old('s_id_no',isset($reproductive->id)?$reproductive->id:''),array('class' => 'form-control', 'placeholder' => 'Search by SI')) !!}
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <label class="control-label " style="color: white">Mobile No</label>
                                            {!! Form::text('s_mobile_no', Input::old('s_mobile_no',isset($reproductive->mobile_no)?$reproductive->mobile_no:''),array('class' => 'form-control', 'placeholder' => 'Search by mobile number')) !!}
                                        </div>
                                    </td>
                                </tr>




                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-sm btn-info">Search</button>
                                            <button type="button" onclick="window.location.href = 'missing'; "  class="btn btn-sm btn-danger pull-right">Clear</button>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        {{ Form::close() }}
                    </ul>
                </div>


                <div class="panel-body" id="panel-body">
                    @if(Session::has('message'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                            {{ Session::get('message') }}
                        </div>
                    @endif
                    <table class="table table-hover color-bordered-table muted-bordered-table usertable" align="center">
                        <thead>
                        <th>SI</th>
                        <th>SCHEDULE-SI</th>                                                                 
                        <th> Mobile No</th>
                        <th> Set By</th>
                        <th> Call Status</th>                        
                        <th class="noPrint"></th>
                        </thead>
                        <tbody>
                        @foreach ($reproductives as $reproductive)
                            <tr>
                                <td>{!! @$reproductive->id !!}</td>
                                <td>{!! @$reproductive->schedule_id !!}</td>
                                
                                
                                <td>{!! @$reproductive->mobile_no !!}</td>
                                <td @if($userid == $reproductive->interview_id) class="btn btn-info" @endif>{!! @$reproductive->username !!}</td>
                                <td><?php
                                $text = "রিশিডিউল";
                                $color = "#a5a530";
                                if($reproductive->s_type == 2){
                                    $text = "এপয়ন্টমেন্ট";
                                    $color="#ff7676";
                                }

                                $display="<label style='background-color:$color;color:#fff;'><i class='fa fa-calendar'></i> $text";
                                if(isset($reproductive->schedule_date)){
                                 $display.=" : ".date('m/d/Y g:i A',strtotime($reproductive->schedule_date));

                                }
                                $display.="</label>";
                                echo  $display;
                             ?></td>
                                <td class="noPrint">
                                    <div class="btn-group">
                                        @if(session('user')->project_id==7 &&in_array(5,session('accesslist_id')))
                                        

                                           <a href="{{url(session('access').'ivr/pick/'.@$reproductive->id.'/drop/')}}" 
                               class="btn btn-primary" style="color: #fff;">PICK
                                    </a>
                                        
                                        @endif
                                        
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot class="noPrint">
                        <tr>
                            <td colspan="8">{!! @$reproductives->appends(Input::except('page'))->render() !!}</td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

    
@stop
