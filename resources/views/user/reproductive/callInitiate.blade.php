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
                        <div class="col-md-3">
                            {{$pageTitle}}
                        </div>
                        <div class="col-md-9 print-btn">
                            <span style="color: #ff7676"><i class="fa fa-circle"></i> Appointment</span>
                            <span style="color: #a5a530"><i class="fa fa-circle"></i> Re-schedule</span>
                            <span style="color: #2cabe3"><i class="fa fa-circle"></i> New</span>
                            <span style="color: #2cab4a"><i class="fa fa-circle"></i> Question Running</span>
                            <button class="btn btn-sm btn-info pull-right" id="print" onclick="printIt()">Print</button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        @if(Session::has('message'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                            {{ Session::get('message') }}
                        </div>
                        @endif
                    </div>
                </div>
                @php
                    $color = "#2cabe3";
                    /*
                    if($info->question_id!=""){

                        if(isset($info->schedule_desc->s_type) && 
                        $info->schedule_desc->s_type == 2){
                           
                                $color = "#ff7676";
                              
                        }else{

                            $color = "#a5a530";
                        }


                    }else*/
                            $running_question=0;
                            if(isset($info) && $info->schedule_date!=""){
                                if(isset($info->schedule_desc->s_type) && 
                                $info->schedule_desc->s_type == 2){
                                    $color = "#ff7676";
                                }else{
                                    $color = "#a5a530";
                                }
                        
                            }

                            else if(isset($info->question)){
                                $color = "#2cab4a";
                                $running_question = 1;
                            }

                @endphp;


                <div class="panel-body" id="panel-body" style="background-color:{{@$color}}">
                    <div class="col-md-6 col-sm-12">
                        @if($info && $area)
                        <table class="table table-bordered" align="center">
                            <tbody style="color: #fff !important;">
                            <tr style="text-align: center;border: 1px solid;font-weight: 600;">
                                <td colspan="2" > PATIENT INFORMATION </td>
                            </tr>
                            <tr  style="border: 1px solid;">
                                <td> Sl</td>
                                <td>{!! @$info->id !!}</td>
                            </tr>


                            {{--<tr  style="border: 1px solid;">--}}
                                {{--<td> তারিখ</td>--}}
                                {{--<td>{!! @$info->date !!}</td>--}}
                            {{--</tr>--}}
                            
                            <tr  style="border: 1px solid;">
                                <td> মোবাইল নং</td>
                                <td>{!! @$info->mobile_no !!}</td>
                            </tr>
                            <tr style="text-align: center;border: 1px solid;font-weight: 600;">
                                <td colspan="2"> SITE INFORMATION</td>
                            </tr>
                            {{--<tr style="border: 1px solid; ">--}}
                                {{--<td>Site Name:</td>--}}
                                {{--<td> {{@$info->user->site->name}}</td>--}}
                            {{--</tr>--}}
                            {{--<tr  style="border: 1px solid;">--}}
                                {{--<td>Username:</td>--}}
                                {{--<td> {{@$info->user->username}}</td>--}}
                            {{--</tr>--}}
                            <tr  style="border: 1px solid;">
                                <td>Appoinment set By:</td>
                                <td> {{@$info->schedule_desc->user->username}}</td>
                            </tr>
                            <tr  style="border: 1px solid;">
                                <td>Appoinment set At:</td>
                                <td>@if(@$info->schedule_date)
                                    {{ date('m/d/Y g:i A',strtotime(@$info->schedule_date)) }}
                                 @endif</td>
                            </tr>
                            <tr  style="border: 1px solid;">
                                <td>No of Attempts:</td>
                                <td>@if(@$info->no_of_call < 4)
                                    @if($info->no_of_call == 3)
                                        <span class="label label-danger">{{ @$info->no_of_call }} | Final</span>
                                    @else
                                    {{ @$info->no_of_call }}
                                    @endif
                                 @endif</td>
                            </tr>
                            @if($info->question)
                            <tr  style="border: 1px solid;">
                                <td colspan="2" class="text-center">
                                    <a href="{{url(session('access').'reproductive/'.@$info->id)}}" 
                               class="btn btn-default" style="color:#000;">SHOW PREVIOUS DETAILS
                                    </a>
                                </td>
                            </tr>    
                            @endif
                            @if(isset($area))
                            <tr  style="border: 1px solid;">
                                <td>Running District:</td>
                                <td>{{ @$area->name }}</td>
                            </tr>
                            @endif
                            </tbody>
                        </table>
                        @endif

                        @if( isset($scheduleListApp) && count($scheduleListApp) > 0 && $running_question < 1)
                        <table class="table table-bordered" align="center">
                            <tbody style="color: #fff !important;">
                            @if($area)
                            <tr style="text-align: center;border: 1px solid;font-weight: 600;color:#fff;background-color: #000;">
                                <td colspan="2" >
                                    {{ @$area->name }}
                                </td>
                            </tr>
                            @endif    
                            <tr style="text-align: center;border: 1px solid;font-weight: 600;color:#fff;background-color: #ff7676;">
                                <td colspan="2" > APPOINTMENT | এপয়ন্টমেন্ট @if($delaytime)  <br/>[ BETWEEN :{{@$delaylestime}}- {{@$delaytime}}] @endif </td>
                            </tr>

                            @foreach ($scheduleListApp as $schedule)
                            <tr>
                                <td  style="border: 1px solid;">
                                   SI :{!! @$schedule->id !!} |
                                   {!! @$schedule->mobile_no !!}

                                   <span>
                                   {{ date('d/m/Y g:i A',strtotime(@$schedule->schedule_date)) }}
                                   </span>
                                   (<strong>{{ @$schedule->username }}</strong>)
                                   		
	                                   
                               	   
                                   
                                </td>
                                
                                <td style="border: 1px solid;">                                    
                                    <a href="{{ route('pick', [$schedule->id, @$info->id]) }}" 
                               class="schedule-pick btn btn-primary" style="color: #fff;">PICK
                                    </a>
                                </td>
                                
                            </tr>    

                            @endforeach
                            </tbody>
                        </table>
                        @endif
                        

                        @if( isset($scheduleList) && count($scheduleList) > 0 && $running_question < 1)
                        <table class="table table-bordered" align="center">
                            <tbody style="color: #fff !important;">
                            @if($area)
                            <tr style="text-align: center;border: 1px solid;font-weight: 600;color:#fff;background-color: #000;">
                                <td colspan="2" >
                                    {{ @$area->name }}
                                </td>
                            </tr>
                            @endif
                            <tr style="text-align: center;border: 1px solid;font-weight: 600;color:#000;background-color: #a5a530;">
                                <td colspan="2" > SCHEDULED | রিশিডিউল @if($delaytime)  <br/>[ BETWEEN :{{@$delaylestime}}- {{@$delaytime}}] @endif </td>
                            </tr>

                            @foreach ($scheduleList as $schedule)
                            <tr>
                                <td  style="border: 1px solid;">
                                   SI :{!! @$schedule->id !!} |
                                   {!! @$schedule->mobile_no !!}

                                   <span>
                                   {{ date('d/m/Y g:i A',strtotime(@$schedule->schedule_date)) }}
                                   </span>
                                   (<strong>{{ @$schedule->username }}</strong>)
                                   		
	                                  
                               	   
                                   
                                </td>
                                
                                <td style="border: 1px solid;">
                                    
                                    <a href="{{ route('pick', [$schedule->id, @$info->id]) }}" 
                               class="schedule-pick btn btn-primary" style="color: #fff;">PICK
                                    </a>
                                </td>
                                
                            </tr>    

                            @endforeach
                            </tbody>
                        </table>
                        @endif

                        
                    </div>

                    @if($info)
                    <div class="col-md-6 col-sm-12">
                        <div class="col-md-12 col-sm-12" style="font-size: 12px;">
                            <?= @App\Models\Reproductive::questionText()['0'] ?>
                        </div>

                        <div class="col-md-6 col-sm-12">
                            
                            <button id="initiate" name="initiate" class="btn btn-primary btn-block">Call Initiate
                            </button>
                            
                            <br>
                            {{--
                            <button id="release" name="release" class="btn btn-primary btn-block">Release UID</button>
                            --}}
                            <a href="{{url(session('access').'reproductive/question/'.@$info->id)}}" id="recieved"
                               class="btn btn-primary" style="">Respondent Call Recieved</a>
                        </div>
                        <div class="col-md-6 col-sm-12" id="call_recieved">

                            {!! Form::open(array('url' => session('access').'reproductive/callschedule','id'=>'form','method' =>'post',  'enctype'=>'multipart/form-data')) !!}
                            @if($info->no_of_call < 3)
                            <div class="form-group">
                                <label class="control-label ">Call Status</label>
                                {!! Form::select('call_state',[''=>'--- সাক্ষাৎকার অবস্থা ---']+\App\Models\Reproductive::getCallStatus(),Input::old('call_state',isset($info->call_state)?$info->call_state:''), array('id' => 'call_state', 'class' => 'form-control')) !!}
                            </div>

                            <div class="form-group">
                                <label class="control-label">Schedule Type</label>
                                <div class="col-md-12">                                                
                                    {!! @App\Common::radioButtonGenerate(\App\Models\Reproductive::getScheduleType(), 's_type',0,$question->s_type, false) !!}
                                </div>
                            </div>


                            <div class="form-group">
                               <label class="control-label ">Schedule Date</label>
                                <input type="date" name="date" id="date" class="form-control" required="required" value="<?=date("Y-m-d");?>">
                            </div>
                            <div class="form-group">
                                <label class="control-label ">Schedule Time</label>
                                <input type="time" name="time" id="time" class="form-control" required="required" value="<?= date("H:i");?>">
                            </div>
                            @else
                            <div class="form-group">
                                <label class="control-label ">Call Status</label>
                                {!! Form::select('call_state',[''=>'--- সাক্ষাৎকার অবস্থা ---']+\App\Models\Reproductive::getForcedfinished(),Input::old('call_state',isset($info->call_state)?$info->call_state:''), array('id' => 'call_state', 'class' => 'form-control')) !!}
                            </div>

                            @endif
                            <input id="schedule_id" type="hidden" name="schedule_id">
                            <br>
                            <input type="submit" id="submit" class="btn btn-primary btn-block" name="schedule">
                            <br>
                            {{ Form::close() }}
                        </div>
                    </div>
                    @endif

                    <div class="row noPrint " style=" text-align: right; margin-right: 20px">
                        <div class="col-lg-12  col-sm-12">
                            <div class="form-group ">
                                <a style="color:#fff !important;" href="{{ url()->previous() }}" class="btn btn-sm btn-primary">Back</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    
    @if($info)
    <script type="text/javascript">
        $(document).ready(function () {
            $("#recieved").hide();
            $("#call_recieved").hide();

            $("#initiate").click(function () {
                $.ajax({
                    type: 'POST',
                    url: "{{url(session('access').'reproductive/callschedule')}}",
                    data: {
                        "id": "<?=$info->id?>",
                        "_token": "{{ csrf_token() }}",
                        'surveillance_id': "<?=$info->surveillance_id?>",
                        'mobile_no': "<?=$info->mobile_no?>"
                    },
                    success: function (response) {
                        $('#schedule_id').val(response);
                        $("#recieved").show();
                        $("#call_recieved").show();
                        $("#release").hide();
                    }
                });

            });
            $("#release").click(function () {
                $.ajax({
                    type: 'POST',
                    url: "{{url(session('access').'reproductive/callschedule')}}",
                    data: {"id": "<?=$info->id?>", "rel": "1", "_token": "{{ csrf_token() }}"},
                    success: function (response) {
                        $("#initiate").hide();
                    }
                });

            });

            //call scehdule off

            schedule = $("[name='s_type']");
            schedule.attr('disabled','disabled');
            schedule.parents('.form-group').attr('style', 'color:#a6a6a6');

            date = $("[name='date']");
            date.attr('disabled','disabled');
            date.parents('.form-group').attr('style', 'color:#a6a6a6');

            time = $("[name='time']");
            time.attr('disabled','disabled');
            time.parents('.form-group').attr('style', 'color:#a6a6a6');

            $("#submit").attr('disabled','disabled');


            $('#call_state').change(function(){

                val = $(this).val();

                if((val == 2 || val == 3 || val == 4 || val == 9) && val !=""){

                    schedule.removeAttr('disabled');
                    schedule.parents('.form-group').removeAttr('style');

                    if(val==9){
                        $("[name='s_type'][value='2']").prop('checked', true).change();
                        
                    }else{
                        $("[name='s_type'][value='1']").prop('checked', true).change();
                        
                    }

                    date.attr('disabled','disabled');
                    date.parents('.form-group').attr('style', 'color:#a6a6a6');

                    time.attr('disabled','disabled');
                    time.parents('.form-group').attr('style', 'color:#a6a6a6');

                    $("#submit").attr('disabled','disabled');

                }else{

                    schedule.attr('disabled','disabled');
                    schedule.parents('.form-group').attr('style', 'color:#a6a6a6');

                    date.attr('disabled','disabled');
                    date.parents('.form-group').attr('style', 'color:#a6a6a6');

                    time.attr('disabled','disabled');
                    time.parents('.form-group').attr('style', 'color:#a6a6a6');
                    if(val!=""){
                        $("#submit").removeAttr('disabled');
                    }
                }

            });

            $("[name='s_type']").click(function(){

                date.removeAttr('disabled');
                date.parents('.form-group').removeAttr('style');

                time.removeAttr('disabled');
                time.parents('.form-group').removeAttr('style');


            });

            date.change(function(){
                if(time.val()!=""){
                    $("#submit").removeAttr('disabled');
                }
            });

            time.change(function(){
                if(date.val()!=""){
                    $("#submit").removeAttr('disabled');
                }
            });

            //end call schedule off

        });
    </script>

    <script>
        //print
        function printIt() {
            var mywindow = window.open('', 'PRINT');
            mywindow.document.write('<html><head><title></title>');
            mywindow.document.write('<style>.noPrint{display: none;} table{border-collapse: collapse; width: 100%;} th,td{ padding: 5px;} table div{height: 23px;} .table{font-size: 11px;} body{margin-top: 1.6in;}</style></head><body >');
            mywindow.document.write('<h4 style="text-align: center">Call Initiate Form</h4>');
            mywindow.document.write(document.getElementById('panel-body').innerHTML);
            mywindow.document.write('</body></html>');
            mywindow.document.close(); // necessary for IE >= 10
            mywindow.focus(); // necessary for IE >= 10*/
            mywindow.print();
            mywindow.close();
            return true;
        }
    </script>
    @endif
@stop
