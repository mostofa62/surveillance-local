@extends('layouts/master')
@section('content')
	{{-- <meta http-equiv="refresh" content="60"> --}}
    <div class="row">
        <div class="col-md-12">
        	<div class="panel">

        	<div class="panel-heading">
                    <div class="row">
                        <div class="col-md-3 text-center">
                            {{$pageTitle}}
                        </div>	
                        <div class="col-md-3 text-center">
                            {{@$counted}}
                        </div>
                        <div class="col-md-3 text-center">
                            <a href="http://119.40.84.187/covid/down_excel.php" class="btn btn-primary" target="_blank">Download Excel</a>
                        </div>
                        <div class="col-md-3 text-center">
                            <a href="http://119.40.84.187/covid/down_all_excel.php" class="btn btn-success" target="_blank">Download Excel All Tests</a>
                        </div>
            </div>


            <a id="menu-toggle1" href="#" class="btn btn-primary btn-lg text-horizontal toggle  " style="color: white" ><i class="fa  fa-search fa-fw"></i><br>S<br>e<br>a<br>r<br>c<br>h</a>
                <div id="sidebar-wrapper1" style="height: 70%;text-decoration: none;">
                    <ul class="sidebar-nav1">
                        <a id="menu-close" href="#" class="btn btn-lg pull-right toggle"><i class="glyphicon glyphicon-remove"></i></a>
                        <div class="col-md-12 search-field" style="">
                            {!! Form::open(array('id'=>'form','method' => 'get')) !!}
                            <table class="search_table" style="margin: 0 auto;">
                                <tbody>

                                
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <label class="control-label " style="color: white">Sample Collected Date
                                            </label>
                                            <div class="col-md-12"> 
                                            {!! Form::date('spec_c_date', Input::old('spec_c_date',isset($model->spec_c_date)?$model->spec_c_date:''),array('class' => 'form-control', 'placeholder' => 'Search by lab id')) !!}
                                            </div>
                                        </div>
                                    </td>
                                </tr>  

                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <label class="control-label " style="color: white">Result Date
                                            </label>
                                            <div class="col-md-12"> 
                                            {!! Form::date('result_at', Input::old('result_at',isset($model->result_at)?$model->result_at:''),array('class' => 'form-control', 'placeholder' => 'Search by Result date')) !!}
                                            </div>
                                        </div>
                                    </td>
                                </tr>   

                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <label class="control-label " style="color: white">Lab id</label>
                                            {!! Form::text('lab_id', Input::old('lab_id',isset($model->lab_id)?$model->lab_id:''),array('class' => 'form-control', 'placeholder' => 'Search by lab id')) !!}
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <label class="control-label " style="color: white">Name</label>
                                            {!! Form::text('name', Input::old('name',isset($model->name)?$model->name:''),array('class' => 'form-control', 'placeholder' => 'Search by Name')) !!}
                                        </div>
                                    </td>
                                </tr>


                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <label class="control-label " style="color: white">Collected From
                                            </label>
                                            <div class="col-md-12"> 
                                            {!! Form::select('coll_from',[''=>'---Select an option---']+$collection_from,Input::old('coll_from',isset($model->coll_from)?$model->coll_from:null), array('class' => 'col-md-12 select2')) !!}
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                




                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-sm btn-info">Search</button>
                                            <button type="button" onclick="window.location.href = 'listreportex'; "  class="btn btn-sm btn-danger pull-right">Clear</button>
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

           	@php
           		$notdone = "#827876";
           		$done = "#22701f";
           	@endphp

        	<table class="table table-hover color-bordered-table muted-bordered-table usertable" align="center">

        		<thead>
                <tr>    
                    <th colspan="6" class="text-center">
                        Patient Details
                    </th>
                    
                    
                    <th colspan="2" style="background-color:   #581845;">
                         {!! @App\Models\SampleAck::getLabel()['block3'] !!}
                    </th>
                    
                </tr>
                    
                <tr>
                    <th>ID - SCD</th>
                    <th>Name</th>
                    <th>AGE</th>
                    <th>Result</th>
                    <th>SEX</th>
                    <th>Status</th>
                    <th>MOBILE</th>
                    <th>Email</th>
                    

                    
                   
                    <th style="background-color:  #000;">{!! @App\Models\SampleAck::getLabel()['stage6'] !!}</th>
                    <th style="background-color:  #000;">{!! @App\Models\SampleAck::getLabel()['stage7'] !!}</th>
                    
                </tr>
                        
                </thead>
                <tbody>
	        	@foreach ($models as $model)

	        	<tr>
	        		<td>
                        {!! @$model->lab_id !!} - {!! @$model->spec_c_date !!}

                        @if( !isset($updated) && @$model->stage6 < 1 && @$model->stage7 < 1)
                        <button id="stg{{@$model->cskid}}" class="btn btn-info" onclick="sendupdate({!! @$model->cskid !!})">
                            Update ( {!! @$model->lab_id !!} )
                        </button>
                        @elseif(isset($updated) && @$model->stage7 < 1)
                        <button id="stg{{@$model->cskid}}" class="btn btn-info" onclick="sendupdate({!! @$model->cskid !!})">
                            Update ( {!! @$model->lab_id !!} )
                        </button>
                        @endif

                        @if( isset($updated))

                        <a class="btn btn-warning" target="_blank" href="http://119.40.84.187/covid/test_sign.php?id={{ @$model->csid }}"><span class="fa fa-download"></span> 
                            Download Report
                        </a>

                        @endif

                    </td>

	        		<td>{!! @$model->name !!}
                        <br/>
                        @if(is_null($model->cls_id))
                            <a class="btn btn-primary" target="_blank" href="http://119.40.84.187/covid/set_cls.php?id={{ @$model->csid }}">      Place CASE ID
                            </a>
                        @else
                            <a class="btn btn-basic" target="_blank" href="http://119.40.84.187/covid/set_cls.php?id={{ @$model->csid }}">      Place CASE ID
                            </a>
                        @endif
                    </td>
                    <td>{!! @$model->age !!}</td>
                    <td>
                        @if(@$model->result==1)
                         Positive
                        @else
                         Negative
                    </td>    
                    <td>{!! @$gender[$model->sex] !!}</td>
                    <td>{!! @$cls_status[$model->cls] !!}</td>
                    <td>{!! @$model->mob !!}</td>
                    <td>{!! @$model->email !!}</td>
                    

                    

                    

                    <td id="s6{!! @$model->cskid !!}" style="background-color: {{ @$model->stage6 == 1 ? $done : $notdone  }};color:#fff;border-right: 1px solid #fff;">{{ @$model->stage6 == 1 ? "COMPLETED" : "PENDING" }}</td>

                    <td id="s7{!! @$model->cskid !!}" style="background-color: {{ @$model->stage7 == 1 ? $done : $notdone  }};color:#fff;border-right: 1px solid #fff;">{{ @$model->stage7 == 1 ? "COMPLETED" : "PENDING" }}</td>



                    
                    

                    
	        		

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

    @push('rscripts')
    <script type="text/javascript">
        var token="{{csrf_token()}}";
        var url = "{{url(session('access').'covic/reportupdate')}}";

        var data = {};

        data['_token']=token;

        function sendupdate(id){

            data['id'] = id;
            @if(!isset($updated))
            data['stage6'] = 1;
            @endif
            data['stage7'] = 1;

            $.ajax({
                method: "POST",
                url: url,
                data: data,
            }).done(function( result ) {

                if(result.success > 0){
                    $("#stg"+id).hide();

                    @if(!isset($updated))
                    $("#s6"+id).css('background-color','#22701f');
                    @endif

                    $("#s7"+id).css('background-color','#22701f');

                    @if(!isset($updated))
                    $("#s6"+id).text("COMPLETED");
                    @endif

                    $("#s7"+id).text("COMPLETED");

                }
            });

        }

        

    </script>
    @endpush


 @stop