@extends('layouts/covsample')
@section('content')
	

    <div class="row">
        <div class="col-md-12">
        	<div class="panel">

        	<div class="panel-heading">
                    <div class="row">
                        <div class="col-md-3 text-center">
                            RYG {{$pageTitle}}
                        </div>	
                        <div class="col-md-3 text-center">
                            <button class="btn btn-primary" onclick="window.location.href = 'listreportlab'; ">Refresh</button>
                        </div>
                        <div class="col-md-3 text-center">
                            <a href="http://119.148.17.100:8081/surveillance/login" target="_blank" class="btn btn-primary">RYG sample</a>
                        </div>
                        <div class="col-md-3 text-center">
                            <a href="{{URL::to(session('access').'logout')}}"><i class="fa fa-power-off"></i> Logout</a>
                        </div>
                    </div>


            <div class="panel-body table-responsive" id="panel-body">

           	

        	<table class="table table-hover color-bordered-table muted-bordered-table usertable" align="center">

        		<thead>
                
                    
                <tr>
                    <th>LABID</th>
                    <th>Name</th>
                    <th>AGE</th>
                    <th>SEX</th>
                    <th>MOBILE</th>
                    <th>SCD</th>
                    <th>PREVIEW</th>
 
                </tr>
                        
                </thead>
                <tbody>
	        	@foreach ($models as $model)

	        	<tr>
	        		<td>
                        {!! @$model->lab_id !!}
                        @if( @$model->stage5 < 1)
                        <button id="stg{{@$model->cskid}}" class="btn btn-info" onclick="sendupdate({!! @$model->cskid !!})">
                            Update ( {!! @$model->lab_id !!} )
                        </button>
                        <br/>
                        
                        @endif
                    </td>

	        		<td>
                        {!! @$model->name !!}
                        
                        
                    </td>
                    <td>{!! @$model->age !!}</td>
                    <td>{!! @$gender[$model->sex] !!}</td>

                    <td>{!! @$model->mob !!}</td>
                    <td>{!! @$model->spec_c_date !!}</td>
                    <td>
                        @if($final)
                        <iframe id="vir{{@$model->cskid}}" src = "http://119.40.84.187/ViewerJS/#http://119.40.84.187/covid/virology.php?id={!! @$model->csid !!}" width='200' height='150' allowfullscreen webkitallowfullscreen></iframe>

                        <iframe style="display: none;" id="sig{{@$model->cskid}}" src ="http://119.40.84.187/ViewerJS/#http://119.40.84.187/covid/test_sign.php?id={!! @$model->csid !!}" width='200' height='150' allowfullscreen webkitallowfullscreen></iframe>

                        @else
                        <iframe id="fst{{@$model->cskid}}" src = "http://119.40.84.187/ViewerJS/#http://119.40.84.187/covid/un_signed.php?id={!! @$model->csid !!}" width='200' height='150' allowfullscreen webkitallowfullscreen></iframe>
                        
                        <iframe style="display: none;" id="vir{{@$model->cskid}}" src = "http://119.40.84.187/ViewerJS/#http://119.40.84.187/covid/virology.php?id={!! @$model->csid !!}" width='200' height='150' allowfullscreen webkitallowfullscreen></iframe>
                        @endif
                        

                    </td>
 
	        	</tr>


	        	@endforeach

	        	</tbody>
                <tfoot>
                    <tr>
                    <th colspan="7" class="text-center"><button class="btn btn-primary" onclick="window.location.href = 'listreportlab'; ">Refresh</button></th>
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
        var url = "{{url(session('access').'covic/reportupdatelab')}}";

        

        var data = {};

        data['_token']=token;

        function sendupdate(id){

            data['id'] = id;
            data['stage5'] = 1;            

            $.ajax({
                method: "POST",
                url: url,
                data: data,
            }).done(function( result ) {

                if(result.success > 0){
                    $("#stg"+id).hide();
                    @if($final)                        
                        $("#vir"+id).hide();
                        $("#sig"+id).show();
                    @else
                        $("#fst"+id).hide();
                        $("#vir"+id).show();
                    @endif

                }
            });

        }

        

    </script>
    @endpush


 @stop