@extends('layouts/master')
@section('content')

<div class="row" style="color: #fff !important;">
<div class="col-md-10 col-md-offset-1">


<div class="panel panel-inverse">
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
<div class="row">
    <div class="col-md-3">
        {{$pageTitle}}
    </div>

    <div class="col-md-9 print-btn">
        <span style="color: #ff7676"><i class="fa fa-circle"></i> Appointment</span>
        
        <span style="color: #2cabe3"><i class="fa fa-circle"></i> New</span>
        
        
    </div>
    
</div>
</div>


@php
$color = "#2cabe3";
$running_question=0;
if(isset($info) && $info->schedule_date!=""){
$color = "#ff7676";
}
else if(isset($info->question)){
$color = "#2cab4a";
$running_question = 1;
}
@endphp;

<div class="panel-body" id="panel-body" style="background-color:{{@$color}}">

    <div class="col-md-6 col-sm-12">

        @if($info)
        <table class="table table-bordered" align="center">
            <tbody style="color: #fff !important;">
            <tr style="text-align: center;border: 1px solid;font-weight: 600;">
                <td colspan="2" > CONTACT INFORMATION </td>
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
                <td colspan="2"> OTHER INFORMATION</td>
            </tr>
            {{--<tr style="border: 1px solid; ">--}}
                {{--<td>Site Name:</td>--}}
                {{--<td> {{@$info->user->site->name}}</td>--}}
            {{--</tr>--}}
            {{--<tr  style="border: 1px solid;">--}}
                {{--<td>Username:</td>--}}
                {{--<td> {{@$info->user->username}}</td>--}}
            {{--</tr>--}}
            {{--
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
            --}}
            <tr  style="border: 1px solid;">
                <td>No of Attempts:</td>
                <td>@if(@$info->no_of_call < 3)
                    @if($info->no_of_call == 2)
                        <span class="label label-danger">{{ @$info->no_of_call }} | Final</span>
                    @else
                    {{ @$info->no_of_call }}
                    @endif
                 @endif</td>
            </tr>
            
            
            </tbody>
        </table>
        @endif

        @if( isset($scheduleListApp) && count($scheduleListApp) > 0 && $running_question < 1)
        <table class="table table-bordered" align="center">
        <tbody style="color: #fff !important;">
        
        <tr style="text-align: center;border: 1px solid;font-weight: 600;color:#fff;background-color: #ff7676;">
            <td colspan="2" > APPOINTMENT | এপয়ন্টমেন্ট @if($delaytime)  <br/>[ BETWEEN :{{@$delaylestime}}- {{@$delaytime}}] @endif </td>
        </tr>

        @foreach ($scheduleListApp as $schedule)
            <tr>
            <td  style="border: 1px solid;">
               SI :{!! @$schedule->id !!} {!! @$schedule->schedule_id !!}|
               {!! @$schedule->mobile_no !!}

               <span>
               {{ date('d/m/Y g:i A',strtotime(@$schedule->schedule_date)) }}
               </span>
               (<strong>{{ @$schedule->username }}</strong>)
                    
                   
               
               
            </td>
            
            <td style="border: 1px solid;">                                    
                <a href="{{ route('pickrammps', [$schedule->id, @$info->id]) }}" 
           class="schedule-pick btn btn-primary" style="color: #fff;">PICK
                </a>
            </td>
            
            </tr>    

            @endforeach
            </tbody>
        </table>
    @endif


    </div>

    <div class="col-md-6 col-sm-12">
        
        <table class="table table-bordered" align="center">
            <tbody style="color: #fff !important;">
            <tr>
                <td>
                   <?= @App\Models\Rammps::initialText()['i_1'] ?> 
                </td>
            </tr>
            </tbody>
        </table>

    </div>

    @if($info)
    <div class="row">
    <div class="col-md-7 col-sm-12">
        <button id="initiate" name="initiate" class="btn btn-primary btn-block">Call Initiate
        </button>
        <br/>
        <a href="{{url(session('access').'rammps/question/'.@$info->id)}}" id="recieved"
                               class="btn btn-success">Agrees to Continue >>> </a>

    </div>
    <div class="col-md-5 col-sm-12" id="call_recieved">

       @if(!isset($info->question)) 

        {!! Form::open(array('url' => session('access').'rammps/callschedule','id'=>'form','method' =>'post',  'enctype'=>'multipart/form-data')) !!}
        @if($info->no_of_call < 2)
        <div class="form-group">
            <label class="control-label ">Call Status</label>
            {!! Form::select('call_state',[''=>'--- সাক্ষাৎকার অবস্থা ---']+\App\Models\Rammps::getCallStatus(),Input::old('call_state',isset($info->call_state)?$info->call_state:''), array('id' => 'call_state', 'class' => 'form-control')) !!}
        </div>

        @else
        <div class="form-group">
            <label class="control-label ">Call Status</label>
            {!! Form::select('call_state',[''=>'--- সাক্ষাৎকার অবস্থা ---']+\App\Models\Rammps::getForcedfinished(),Input::old('call_state',isset($info->call_state)?$info->call_state:''), array('id' => 'call_state', 'class' => 'form-control')) !!}
        </div>

        @endif
        <input id="schedule_id" type="hidden" name="schedule_id">
        <input type="hidden" value="{{ $info->id }}" name="id">
        <br>
        <input type="submit" id="submit" class="btn btn-primary btn-block" name="schedule">
        <br>
        {{ Form::close() }}

        @endif

    </div>
    

    </div>

    @else
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-danger" >
                Please refill Number
            </div>
        </div>
    </div>

    @endif
    
</div>






</div>
</div>

@if($info)
    <script type="text/javascript">



        var data = window.localStorage.getItem('data_'+<?=$info->id?>);

        if(data !=null){
            window.location.href = '<?= url(session('access').'rammps/question/'.@$info->id) ?>';
        }

        $(document).ready(function () {
            $("#recieved").hide();
            $("#call_recieved").hide();

            $("#initiate").click(function () {


                $.ajax({
                    type: 'POST',
                    url: "{{url(session('access').'rammps/callschedule')}}",
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
                    }
                });

            });
        });
    </script>
@endif

@stop