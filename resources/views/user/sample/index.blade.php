@extends('layouts/covsample')
@section('content')
	{{-- <meta http-equiv="refresh" content="60"> --}}
    <div class="row">
        <div class="col-md-12">
        	<div class="panel">

        	<div class="panel-heading">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            {{$pageTitle}}
                        </div>	
            </div>

            <div class="panel-body table-responsive" id="panel-body">
                <table class="table table-hover color-bordered-table muted-bordered-table usertable" align="center">
                    <thead>

                <th colspan="2" class="text-center">
                        Summary
                    </th>        
                
                <tr>
                    <th class="col-md-6" style="background-color:  #C70039;">
                        {!! @App\Models\SampleAck::getLabel()['block1'] !!}
                    </th>
                    <th class="col-md-6" style="background-color:  #000;">
                        {!! @$sum_data['sc'] !!}
                    </th>
                </tr>
                <tr>
                    <th class="col-md-6" style="background-color:  #900C3F;">
                     {!! @App\Models\SampleAck::getLabel()['block2'] !!}
                    </th>
                    <th class="col-md-6" style="background-color:  #000;">
                        {!! @$sum_data['st'] !!}
                    </th>
                </tr>
                    <th class="col-md-6" style="background-color:   #581845;">
                         {!! @App\Models\SampleAck::getLabel()['block3'] !!}
                    </th>
                    <th class="col-md-6" style="background-color:  #000;">
                        {!! @$sum_data['rt'] !!}
                    </th>
                </tr>



                </table>

                {!! Form::open(array('id'=>'form','method' => 'get')) !!}


                <table class="search_table" style="margin: 0 auto;">
                    <tbody>

                    
                    <tr>
                        <td>Sample Collection Date</td>
                        <td>
                            <div class="form-group">
                                <!-- <div class="col-md-12"> --> 
                                {!! Form::date('spec_c_date', Input::old('spec_c_date',isset($model->spec_c_date)?$model->spec_c_date:''),array('class' => 'form-control', 'placeholder' => 'Search by lab id')) !!}
                                <!-- </div> -->
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>ID</td>
                        <td>
                            <div class="form-group">
                                <!-- <div class="col-md-12">  -->
                                {!! Form::text('id', Input::old('id',isset($model->id)?$model->id:''),array('class' => 'form-control', 'placeholder' => 'Search Barcode id')) !!}
                                <!-- </div> -->
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Report publishing date</td>
                        <td>
                            <div class="form-group">
                                <!-- <div class="col-md-12"> --> 
                                {!! Form::date('result_at', Input::old('result_at',isset($model->result_at)?$model->result_at:''),array('class' => 'form-control', 'placeholder' => 'Search by result_date')) !!}
                                <!-- </div> -->
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            
                            <button type="submit" class="btn btn-sm btn-info">Search</button>
                            <button type="button" onclick="window.location.href = 'sample'; "  class="btn btn-sm btn-danger pull-right">Clear</button>
                            
                        </td>
                        <td>
                            
                            <a class="btn btn-sm btn-success pull-right" href="http://119.148.17.100:8081/surveillance/sample">RYG report status</a>
                            
                        </td>
                    </tr>

                    </tbody>
            </table>   

            {{ Form::close() }}


            </div>  

            <div class="panel-body table-responsive" id="panel-body">

           	@php
           		$notdone = "#827876";
           		$done = "#22701f";
           	@endphp

        	<table class="table table-hover color-bordered-table muted-bordered-table usertable" align="center">

        		<thead>
                <tr>    
                    <th colspan="5" class="text-center">
                        Patient Details
                    </th>
                    <th colspan="3" style="background-color:  #C70039;">
                        {!! @App\Models\SampleAck::getLabel()['block1'] !!}
                    </th>
                    <th colspan="2" style="background-color:  #900C3F;">
                     {!! @App\Models\SampleAck::getLabel()['block2'] !!}
                    </th>
                    <th colspan="2" style="background-color:   #581845;">
                         {!! @App\Models\SampleAck::getLabel()['block3'] !!}
                    </th>
                </tr>
                    
                <tr>
                    <th>LABID</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>District</th>
                    <th>Entry Date</th>

                    <th style="background-color:  #000;">{!! @App\Models\SampleAck::getLabel()['stage1'] !!}</th>
                    <th style="background-color:  #000;">{!! @App\Models\SampleAck::getLabel()['stage2'] !!}</th>
                    <th style="background-color:  #000;">{!! @App\Models\SampleAck::getLabel()['stage3'] !!}</th>
                    <th style="background-color:  #000;">{!! @App\Models\SampleAck::getLabel()['stage4'] !!}</th>
                    <th style="background-color:  #000;">{!! @App\Models\SampleAck::getLabel()['stage5'] !!}</th>
                    <th style="background-color:  #000;">{!! @App\Models\SampleAck::getLabel()['stage6'] !!}</th>
                    <th style="background-color:  #000;">{!! @App\Models\SampleAck::getLabel()['stage7'] !!}</th>
                    
                </tr>
                        
                </thead>
                <tbody>
	        	@foreach ($models as $model)

	        	<tr>
	        		<td>{!! @$model->lab_id !!}</td>

	        		<td>{!! @$model->name !!}</td>

                    <td>{!! @$model->age !!}</td>
                    <td>{!! @$model->district !!}</td>
                    <td>{!! @date('d/m/Y h:i:s A',strtotime($model->created_at)) !!}</td>

                    @if(@$model->selective_case_id)
                    <td style="background-color: {{ @$model->stage1 == 1 ? $done : $notdone  }};color:#fff;border-right: 1px solid #fff;">{{ @$model->stage1 == 1 ? "COMPLETED" : "PENDING" }}</td>

                    <td style="background-color: {{ @$model->stage2 == 1 ? $done : $notdone  }};color:#fff;border-right: 1px solid #fff;">{{ @$model->stage2 == 1 ? "COMPLETED" : "PENDING" }}</td>

                    <td style="background-color: {{ @$model->stage3 == 1 ? $done : $notdone  }};color:#fff;border-right: 1px solid #fff;">{{ @$model->stage3 == 1 ? "COMPLETED" : "PENDING" }}</td>

                    <td style="background-color: {{ @$model->stage4 == 1 ? $done : $notdone  }};color:#fff;border-right: 1px solid #fff;">{{ @$model->stage4 == 1 ? "COMPLETED" : "PENDING" }}</td>


                    <td style="background-color: {{ @$model->stage5 == 1 ? $done : $notdone  }};color:#fff;border-right: 1px solid #fff;">{{ @$model->stage5 == 1 ? "COMPLETED" : "PENDING" }}</td>

                    <td style="background-color: {{ @$model->stage6 == 1 ? $done : $notdone  }};color:#fff;border-right: 1px solid #fff;">{{ @$model->stage6 == 1 ? "COMPLETED" : "PENDING" }}</td>

                    <td style="background-color: {{ @$model->stage7 == 1 ? $done : $notdone  }};color:#fff;border-right: 1px solid #fff;">{{ @$model->stage7 == 1 ? "COMPLETED" : "PENDING" }}</td>

                    @endif


                    
	        		

	        	</tr>


	        	@endforeach
	        	</tbody>
	        	<tfoot class="noPrint">
	            <tr>
	                <td colspan="8">{!! @$models->appends(Input::except('page'))->render() !!}</td>
	            </tr>
	            </tfoot>
        	</table>

        	</div>



        </div>



        </div>
    </div>


 @stop