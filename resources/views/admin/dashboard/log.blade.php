@extends('layouts.master')
@section('content')
    <style>
        .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th{
            border: none;
            padding: 5px;
        }
        .table div {
            height: 23px;
        }
    </style>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-3">
                            {{$pageTitle}}
                        </div>
                        <div class="col-md-9 print-btn">
                            <button class="btn btn-sm btn-info pull-right" id="print" onclick="printIt()">Print</button>
                        </div>
                    </div>
                </div>
                <div class="panel-body " id="panel-body">
                    <table class="table " align="center">
                        <tr style="text-align: center;border: 1px solid;">
                            <td colspan="4" > PERSONAL INFORMATION </td>
                        </tr>
                        <tr style="border: 1px solid; ">
                            <td style="text-align: right; font-weight: bold;">
                                <div>Name: </div>
                                <div> Father Name: </div>
                                <div> Mother Name: </div>
                                <div> Gender: </div>
                                <div> NID: </div>
                                <div> Email: </div>
                                <div> Mobile:  </div>
                                <div> Marital Status: </div>
                                <div> Blood Group: </div>
                            </td>
                            <td>
                                <div>{{@$info->employee->name}}</div>
                                <div>{{@$info->employee->father_name}}</div>
                                <div>{{@$info->employee->mother_name}}</div>
                                <div> {{@$info->employee->gender}}</div>
                                <div> {{@$info->employee->nid}}</div>
                                <div> {{@$info->employee->email}}</div>
                                <div> {{@$info->employee->mobile}}</div>
                                <div>{{@$info->employee->marital_status}}</div>
                                <div>{{@$info->employee->blood_group}}</div>
                            </td>
                            <td style="text-align: right; font-weight: bold;"></td>
                            <td style="text-align: center;">
                                <span class=" image">
                                    @if(isset($info->employee->imagefile) && $info->employee->imagefile !="")
                                        <img class="img-rounded m0auto" style="height: 200px; width: 200px;"  src="{{url('/public/uploads/'.@$info->employee->imagefile)}}"/>
                                    @else
                                        <img class="img-rounded m0auto" style="height: 200px; width: 200px;"
                                             src="{{url('/resources/assets/theme/img/user/user.jpg')}}"/>
                                    @endif
                                </span>
                            </td>
                        </tr>
                        <tr style="text-align: center;border: 1px solid;">
                            <td colspan="4" > BASIC OFFICIAL</td>
                        </tr>
                        <tr style="border: 1px solid; ">
                            <td style="text-align: right; font-weight: bold;">


                                <div> Department:  </div>
                            </td>
                            <td>


                                <div> {{@$info->employee->dept}}</div>
                            </td>
                            <td style="text-align: right; font-weight: bold;">
                                <div>Designation: </div>
                                <div>Join Date: </div>
                            </td>
                            <td>
                                <div>{{@$info->employee->designation}}</div>
                                <div>{{@$info->employee->joindate}}</div>
                            </td>
                        </tr>
                        <tr style="text-align: center;border: 1px solid;">
                            <td colspan="4" > Logs </td>
                        </tr>
                        <tr style="border: 1px solid; ">
                            <td>IP</td>
                            <td>Date</td>
                            <td>Login - Logout</td>
                            <td>Activity(H:m:s)</td>
                        </tr>
                        @php $total=0.0; @endphp
                        @foreach($logs as $log)
                            <tr style="border: 1px solid; ">
                                <td>{{$log->ip}}</td>
                                <td>{{$log->date}}</td>
                                <td>{{$log->login}} - {{$log->logout}}</td>
                                <td>@if($log->logout!=""){{round(abs(((strtotime($log->logout)-strtotime($log->login)))/3600),2)}} @php $total+= (abs(strtotime($log->logout) - strtotime($log->login))); @endphp @endif </td>
                            </tr>
                        @endforeach
                        <tr style="border: 1px solid; ">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>{{ @round((@$total /3600),2)}}</td>
                        </tr>
                    </table>
                    <div class="row noPrint">
                        <div class="col-lg-12 ">
                            <div class="form-group ">
                                <a href="{{ url()->previous() }}" class="btn btn-sm btn-primary">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        //print
        function printIt() {
            var mywindow = window.open('', 'PRINT');
            mywindow.document.write('<html><head><title></title>');
            mywindow.document.write('<style>.noPrint{display: none;} table{border-collapse: collapse; width: 100%;} th,td{ padding: 5px;} table div{height: 23px;} .table{font-size: 11px;} body{margin-top: 1.6in;}</style></head><body >');
            mywindow.document.write('<h4 style="text-align: center">Employee Details</h4>');
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
