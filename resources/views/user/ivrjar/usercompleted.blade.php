@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-12">
                            {{$pageTitle}}
                        </div>
                        
                        
                    </div>
                </div>

                


                <div class="panel-body" id="panel-body">
                    
                    <table class="table table-hover color-bordered-table muted-bordered-table usertable" align="center">
                        <thead>
                        <th>Employee</th>
                        <th>Total Attempts</th>                                                             
                        <th> Completed(CI)</th>
                        
                        
                        </thead>
                        <tbody>
                        @php
                        $total = 0
                        @endphp
                        @foreach ($ivrs as $ivr)
                            @if(@$ivr->total > 0)
                            @php
                            $total += $ivr->total;
                            @endphp
                            <tr>
                                
                                
                                
                                
                                <td>{!! @$ivr->employee !!}</td>
                                <td>{!! @$ivr->total_attempt !!}</td>
                                <td>{!! @$ivr->total !!}</td>
                                
                            </tr>
                            @endif
                        @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="1">Total</th>
                                <th>{{ @$total }}</th>
                            </tr>
                        </tfoot>
                        
                    </table>
                </div>
            </div>
        </div>
    </div>

    
@stop
