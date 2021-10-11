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
                        <th>Gender</th>                                                             
                        <th> Range</th>
                        <th> Target</th>
                        <th> Completed</th>
                        
                        </thead>
                        <tbody>
                        @php
                        $total = 0
                        @endphp
                        @foreach ($ivrs as $ivr)

                            @php
                            $total += $ivr->completed;
                            @endphp
                            <tr>
                                <td>{!! @App\Models\Ivr::getGender($ivr->gender) !!}</td>
                                
                                
                                
                                <td>{!! @$ivr->ranges !!}</td>
                                <td>{!! @$ivr->target !!}</td>
                                <td class="{{ abs($ivr->completed - $ivr->target) < 5 && abs($ivr->completed - $ivr->target) > 0 ?  'btn btn-danger':''}} {{ $ivr->completed >= $ivr->target ?  'btn btn-success':''}} " >{!! @$ivr->completed !!}</td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="3">Total</th>
                                <th>{{ @$total }}</th>
                            </tr>
                        </tfoot>
                        
                    </table>
                </div>
            </div>
        </div>
    </div>

    
@stop
