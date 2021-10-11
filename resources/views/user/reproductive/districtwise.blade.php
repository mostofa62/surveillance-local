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
                                <br/>
                                <span style="background-color: #2cabe3;width: 5px;">RUNNING</span>
                                <span style="background-color: #53e69d;width: 5px;">COMPLETED</span>
                        </div>
                        <div class="col-md-3 search-field">
                                <h3 style="color: #fff !important;">{{@$call_status}}-{{@$call_status_list[$call_status]}}</h3>
                        </div>
                        <div class="col-md-4">
                            @if(isset($running_disctrict))
                              Running:  <span class="btn btn-info">{{ $running_disctrict->name }}</span>
                            @endif
                            @if(isset($total))
                             Total: <span class="btn btn-warning"><strong>{{ isset($total[0])?$total[0]->total : 0 }}</strong></span>
                            @endif
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
                                            <label class="control-label " style="color: white">District
                                            </label>
                                            <div class="col-md-12"> 
                                            {!! Form::select('s_district',[''=>'---Select an option---']+\App\Models\Reproductive::districtListLimit(),Input::old('s_district',isset($district_id)?$district_id:''), array('class' => 'col-md-12 select2')) !!}
                                            </div>
                                        </div>
                                    </td>
                                </tr>


                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <label class="control-label " style="color: white">CALL STATUS
                                            </label>
                                            <div class="col-md-12"> 
                                            {!! Form::select('s_call_status',[''=>'---Select an option---']+$call_status_list,Input::old('s_call_status',isset($call_status)?$call_status:''), array('class' => 'col-md-12 select2')) !!}
                                            </div>
                                        </div>
                                    </td>
                                </tr>


                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <label class="control-label " style="color: white">CP9
                                            </label>
                                            <div class="col-md-12"> 
                                            {!! Form::select('s_cp9',[''=>'---Select an option---',0=>'না ',1=>'হ্যাঁ'],Input::old('s_cp9',isset($s_cp9)?$s_cp9:''), array('class' => 'col-md-12 select2')) !!}
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
               


                <div class="panel-body" id="panel-body" style="background-color:{{@$color}}">
                    
                   <table class="table table-hover color-bordered-table muted-bordered-table usertable" align="center">
                        <thead>

                        <tr>
                        <th>DISTRICT</th>                                                                    
                        <th>COUNTED</th>
                        <th>TARGET</th>
                        <th>CP9</th>                        
                        <th class="noPrint"></th>
                        </tr>

                        </thead>
                        <tbody>
                            
                        @foreach ($reproductives as $reproductive)
                            <tr>
                                <td @if($reproductive->ra ==1) class="btn btn-info" @elseif($reproductive->ra ==-1) class="btn btn-success" @endif>
                                    {!! @$reproductive->name !!}
                                    @if( $reproductive->ra ==0 &&  $reproductive->ars == 1)
                                        <a href="{{url(session('access').'reproductive/district-enabled/'.@$reproductive->district_id)}}" class="btn btn-danger">Activate</a>  
                                                                            
                                    @endif
                                    
                                </td>                                                                                             
                                @php
                                $differ = $reproductive->target - $reproductive->counted;
                                @endphp                                                                                                        
                                <td>@if($reproductive->counted > $reproductive->target) <span style="background-color: #cd2e0c;color:#fff;padding: 2px;">{!! @$reproductive->counted !!}</span>@else 
                                    @if($reproductive->counted < $reproductive->target && $differ < 9)
                                    <span style="background-color: #2b2e08;color:#fff;padding: 2px;">{!! @$reproductive->counted !!}</span>
                                    @else
                                    {!! @$reproductive->counted !!} 
                                    @endif
                                    @endif 
                                </td>
                                <td>{!! @$reproductive->target !!}</td>
                                <td>{!! $reproductive->cp==0? "না":"হ্যাঁ" !!}</td>
                                
                                <td class="noPrint">
                                    
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
