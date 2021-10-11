@extends('layouts/master')
@section('content')
    <style>
        .table > tbody > tr > td, .table > tbody > tr > th, .table > tfoot > tr > td, .table > tfoot > tr > th, .table > thead > tr > td, .table > thead > tr > th {
            border: none;
            padding: 5px;
            color: white;
        }

        .table div {
            height: 23px;
        }
    </style>
    <div class="row" style="color: white">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-3">
                            {{$pageTitle}}
                        </div>
                        <div class="col-md-9 print-btn">
                            <span style="color: #ff7676"><i class="fa fa-circle"></i> Appointment</span>
                            <span style="color: #a5a530"><i class="fa fa-circle"></i> Auto Re-schedule</span>
                            <span style="color: #2cabe3"><i class="fa fa-circle"></i> New</span>
                            <button class="btn btn-sm btn-info pull-right" id="print" onclick="printIt()">Print</button>
                        </div>
                    </div>
                </div>
                <div class="panel-body" id="panel-body" style="background-color: @if($info->question_id!="") {{"#ff7676"}} @elseif($info->schedule_date!="") {{"#a5a530"}}@else {{"#2cabe3"}} @endif">
                    <div class="col-md-6 col-sm-12">
                        <table class="table table-bordered" align="center">
                            <tr style="text-align: center;border: 1px solid;font-weight: 600;">
                                <td colspan="2" > PATIENT INFORMATION </td>
                            </tr>
                            <tr  style="border: 1px solid;">
                                <td> Sl</td>
                                <td>{!! @$info->id !!}</td>
                            </tr>
                            <tr  style="border: 1px solid;">
                                <td> তারিখ</td>
                                <td>{!! @$info->date !!}</td>
                            </tr>
                            <tr  style="border: 1px solid;">
                                <td> রোগীর নাম</td>
                                <td>{!! @$info->name !!}</td>
                            </tr>
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
                        </table>
                    </div>

                    <div class="col-md-6 col-sm-12">
                        <div class="col-md-12 col-sm-12" style="font-size: 12px;">
                            <?= @App\Poultry::questionText()['0'] ?>
                        </div>

                        <div class="col-md-6 col-sm-12">
                            <button id="initiate" name="initiate" class="btn btn-primary btn-block">Call Initiate
                            </button>
                            <br>
                            <button id="release" name="release" class="btn btn-primary btn-block">Release UID</button>
                            <a href="{{url(session('access').'poultry/question/'.@$info->id)}}" id="recieved"
                               class="btn btn-primary btn-block" style="">Respondent Call Recieved</a>
                        </div>
                        <div class="col-md-6 col-sm-12" id="call_recieved">
                            {!! Form::open(array('url' => session('access').'poultry/callschedule','id'=>'form','method' =>'post',  'enctype'=>'multipart/form-data')) !!}
                            <div class="form-group">
                                <label class="control-label ">Call Status</label>
                                {!! Form::select('call_state',[''=>'--- সাক্ষাৎকার অবস্থা ---']+\App\Poultry::getCallStatus(),Input::old('call_state',isset($info->call_state)?$info->call_state:''), array('id' => 'call_state', 'class' => 'form-control')) !!}
                            </div>
                            <div class="form-group">
                                {{--<label class="control-label ">Schedule Date</label>--}}
                                <input type="hidden" name="date" id="date" class="form-control" required="required" value="<?=date("Y-m-d",strtotime("+1 day"));?>">
                            </div>
                            <div class="form-group">
                                {{--<label class="control-label ">Schedule Time</label>--}}
                                <input type="hidden" name="time" id="time" class="form-control" required="required" value="<?=date("H:i",strtotime("+6 hour"));?>">
                            </div>
                            <input id="schedule_id" type="hidden" name="schedule_id">
                            <br>
                            <input type="submit" id="submit" class="btn btn-primary btn-block" name="schedule">
                            <br>
                            {{ Form::close() }}
                        </div>
                    </div>

                    <div class="row noPrint " style=" text-align: right; margin-right: 20px;">
                        <div class="col-lg-12">
                            <div class="form-group ">
                                <a href="{{ url(session('access').'poultry') }}" class="btn btn-sm btn-primary" style="color: white">Back</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#recieved").hide();
            $("#call_recieved").hide();

            $("#initiate").click(function () {
                $.ajax({
                    type: 'POST',
                    url: "{{url(session('access').'poultry/callschedule')}}",
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
                    url: "{{url(session('access').'poultry/callschedule')}}",
                    data: {"id": "<?=$info->id?>", "rel": "1", "_token": "{{ csrf_token() }}"},
                    success: function (response) {
                        $("#initiate").hide();
                    }
                });

            });
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
@stop
