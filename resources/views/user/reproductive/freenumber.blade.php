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
                        
                        
                    </div>
                    
                </div>

                
                
               


                <div class="panel-body" id="panel-body">
                    
                   <table class="table table-hover color-bordered-table muted-bordered-table usertable" align="center">
                        <thead>

                        <tr>
                        <th>AREA_ID</th>                                                                    
                        <th>DISTRICT</th>
                        <th>TARGET</th>
                        <th>CP9</th>
                        <th>RUNNING_AREA</th> 
                        <th>FREE_NUMBER</th>                       
                        <th class="noPrint"></th>
                        </tr>

                        </thead>
                        <tbody>
                            
                        @foreach ($reproductives as $reproductive)
                            <tr>
                                                                                                                  
                                                                                                                                  
                                <td  @if( $reproductive->running_area == 0 && $reproductive->free_number < 10  ) class="btn btn-danger" @endif>{!! @$reproductive->area_id !!}</td>
                                <td  @if($reproductive->running_area ==1) class="btn btn-info" @elseif($reproductive->running_area ==-1) class="btn btn-success" @endif>{!! @$reproductive->district_name !!}</td>
                                <td>{!! @$reproductive->max_limit !!}</td>
                                <td>{!! $reproductive->cp==0? "না":"হ্যাঁ" !!}</td>
                                <td>{!! @$reproductive->running_area !!}</td>
                                <td  @if( $reproductive->running_area == 0 && $reproductive->free_number < 10  ) class="btn btn-danger" @endif>{!! @$reproductive->free_number !!}</td>
                                <td class="noPrint">
                                    
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot class="noPrint">
                        
                        </tfoot>
                    </table>

                   
                </div>

            </div>
        </div>
    </div>

    
   
@stop
