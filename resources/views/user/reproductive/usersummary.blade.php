@extends('layouts/master')
@section('content')
    <style>
        .table > tbody > tr > td, .table > tbody > tr > th, .table > tfoot > tr > td, .table > tfoot > tr > th, .table > thead > tr > td, .table > thead > tr > th {
            border: none;
            padding: 5px;
        }

        .table div {
            height: 23px;
        }
    </style>
    <div class="row" style="color: #fff !important;">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-5">
                                {{$pageTitle}}
                        </div>
                        <div class="col-md-7">
                            Call Date: {{@$date}}
                        </div>
                        
                    </div>
                    
                </div>

                <a id="menu-toggle1" href="#" class="btn btn-primary btn-lg text-horizontal toggle  " style="color: white" ><i class="fa  fa-search fa-fw"></i><br>S<br>e<br>a<br>r<br>c<br>h</a>
                <div id="sidebar-wrapper1" style="height: 50%;text-decoration: none;">
                    <ul class="sidebar-nav1">
                        <a id="menu-close" href="#" class="btn btn-lg pull-right toggle"><i class="glyphicon glyphicon-remove"></i></a>
                        <div class="col-md-12 search-field" style="">
                            {!! Form::open(array('id'=>'form','method' => 'get')) !!}
                            <table class="search_table" style="margin: 0 auto;">
                                <tbody>


                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <label class="control-label " style="color: white">Query Date
                                            </label>
                                            <div class="col-md-12"> 
                                            <input type="date" name="date" id="date" class="form-control" value="<?= $date ?>">
                                            </div>
                                        </div>
                                    </td>
                                </tr>


                               



                               


                                




                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-sm btn-info">Search</button>
                                            <button type="button" onclick="window.location.href = 'districtreport'; "  class="btn btn-sm btn-danger pull-right">Clear</button>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        {{ Form::close() }}
                    </ul>
                </div>
               


                <div class="panel-body table-responsive" id="panel-body">
                    
                   <table class="table table-hover color-bordered-table muted-bordered-table usertable" align="center">
                        <thead>
                        <tr>    
                            <th rowspan="2">ID</th>                                                                    
                            <th rowspan="2">USER ID</th>
                            <th rowspan="2">Interviewer</th>
                            <th rowspan="2" style="background-color:  #0e380f">Complete Call</th>
                            <th colspan="2" class="text-center" style="background-color:  #ff7676">Appointment</th>
                            <th rowspan="2">Busy</th>
                            <th rowspan="2">Refused</th>
                            <th rowspan="2">Switched Off</th>
                            <th rowspan="2">Not Eligible</th>
                            <th colspan="3" class="text-center" style="background-color:  #a5a530"> Rescheduled</th>
                            <th colspan="3" class="text-center" style="background-color:  #2cab4a"> Incomplete</th>
                            <th rowspan="2">Total Call</th>
                        </tr>
                        <tr>
                            <th style="background-color:  #ff7676">Home Appointment</th>
                            <th style="background-color:  #ff7676">Appointment</th>

                            <th style="background-color:  #a5a530">Call Drop-Begining</th>
                            <th style="background-color:  #a5a530">Call Drop-Running</th>
                            <th style="background-color:  #a5a530">Rescheduled</th>

                            <th style="background-color:  #2cab4a">Continue</th>
                            <th style="background-color:  #2cab4a">Refused</th>
                            <th style="background-color:  #2cab4a">Terminated</th>                            
                        </tr>                                                
                        </thead>
                        <tbody>
                        @php
                        $cc = 0;
                        $ha = 0;
                        $a = 0;
                        $b = 0;
                        $rf = 0;
                        $so = 0;
                        $ne = 0;
                        $ds = 0;
                        $dq = 0;
                        $r = 0;
                        $ccc = 0;
                        $pr = 0;
                        $tc = 0;
                        $total_call=0;
                        $sum=0;
                        @endphp
                        @foreach ($reproductives as $reproductive)
                            <tr>
                                <td>{!! @$reproductive->id !!}</td>
                                <td><a target="_blank" href="{{URL::to(session('access').'log/'.$reproductive->username)}}">{!! @$reproductive->username !!}</a></td>
                                <td>{!! @$reproductive->name !!}</td>       @php

                                    $cc+=$reproductive->Complete_Call;
                                    $ha+=$reproductive->Home_Appointment;
                                    $a+=$reproductive->Appointment;
                                    $b+=$reproductive->Busy;
                                    $rf+=$reproductive->Refused;
                                    $so+=$reproductive->Switched_Off;
                                    $ne+=$reproductive->Not_Eligible;
                                    $ds+=$reproductive->Dropped_Scheduled;
                                    $dq+=$reproductive->Dropped_Questioned;
                                    $r+=$reproductive->Rescheduled;
                                    $ccc+=$reproductive->Continue_Call;
                                    $pr+=$reproductive->Partially_Refused;
                                    $tc+=$reproductive->Terminated_Call;
                                    $total_call=$reproductive->Complete_Call+$reproductive->Home_Appointment+$reproductive->Appointment+$reproductive->Busy+$reproductive->Refused+$reproductive->Switched_Off+$reproductive->Not_Eligible+$reproductive->Dropped_Scheduled+$reproductive->Dropped_Questioned+$reproductive->Rescheduled+$reproductive->Continue_Call+$reproductive->Partially_Refused+$reproductive->Terminated_Call;
                                    $sum+=$total_call;
                                @endphp                                                                                    
                                 <td><a target="_blank" href="http://114.31.0.246/rreport/download-user?date=<?= $date ?>&userid=<?= $reproductive->id ?>">{!! @$reproductive->Complete_Call !!}</a></td>
                                <td>{!! @$reproductive->Home_Appointment !!}</td>
                                <td>{!! @$reproductive->Appointment !!}</td>
                                <td>{!! @$reproductive->Busy !!}</td>
                                <td>{!! @$reproductive->Refused !!}</td>
                                <td>{!! @$reproductive->Switched_Off !!}</td>
                                <td>{!! @$reproductive->Not_Eligible !!}</td>

                                <td>{!! @$reproductive->Dropped_Scheduled !!}</td>
                                <td>{!! @$reproductive->Dropped_Questioned !!}</td>
                                <td>{!! @$reproductive->Rescheduled !!}</td>
                                

                                <td>{!! @$reproductive->Continue_Call !!}</td>
                                <td>{!! @$reproductive->Partially_Refused !!}</td>
                                <td>{!! @$reproductive->Terminated_Call !!}</td>
                                <th>{!! @$total_call !!}</th>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot class="noPrint">
                        <tr style="background-color:  #bfc9ca;">
                                <th colspan="3" class="text-right">Grand Total</th>
                                                                                                                           
                                <th>{!! @$cc !!}</th>
                                <th>{!! @$ha !!}</th>
                                <th>{!! @$a !!}</th>
                                <th>{!! @$b !!}</th>
                                <th>{!! @$rf !!}</th>
                                <th>{!! @$so !!}</th>
                                <th>{!! @$ne !!}</th>

                                <th>{!! @$ds !!}</th>
                                <th>{!! @$dq !!}</th>
                                <th>{!! @$r !!}</th>
                                

                                <th>{!! @$ccc !!}</th>
                                <th>{!! @$pr !!}</th>
                                <th>{!! @$tc !!}</th> 
                                <th style="background-color:  #2471a3; color: #fff;">{!! @$sum !!}</th>                                
                        </tr>
                        </tfoot>
                        
                    </table>

                   
                </div>

            </div>
        </div>
    </div>

    
   
@stop
