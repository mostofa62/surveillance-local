@extends('layouts/master')
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
                            <td colspan="4" > DEATH PATIENT INFORMATION </td>
                        </tr>
                        <tr style="border: 1px solid; ">
                            <td style="text-align: right; font-weight: bold;">
                                <div> Sl</div>
                                <div> Reg. No</div>
                                <div> Name</div>
                                <div> Mobile No</div>
                                <div> Age</div>
                                <div> Gender</div>
                                <div> Date of Admission</div>
                                <div> Duration of Fever</div>
                                <div> Diagonosis</div>
                            </td>
                            <td>
                                <div>{!! @$info->id !!}</div>
                                <div>{!! @$info->registration_no !!}</div>
                                <div>{!! @$info->name !!}</div>
                                <div>{!! @$info->mobile_no !!}</div>
                                <div>{!! @$info->age !!}</div>
                                <div>{!! @\App\Common::getGenderType()[$info->sex]!!}</div>
                                <div>{!! @$info->date_of_admission!!}</div>
                                <div><span style="color:red">{!! @$info->duration_of_fever!!}</span> | {!! @$info->onset_of_fever!!}</div>
                                <div>{!! @\App\Common::getFeverStatus()[$info->current_fever_status]!!}</div>
                            </td>
                            <td style="text-align: right; font-weight: bold;"></td>
                            <td style="text-align: center;">
                                <span class=" image">

                                </span>
                            </td>
                        </tr>
                        <tr style="text-align: center;border: 1px solid;">
                            <td colspan="4" > Area Information</td>
                        </tr>
                        <tr style="border: 1px solid; ">
                            <td style="text-align: right; font-weight: bold;">
                                <div>Area Type:</div>
                            </td>
                            <td>
                                <div>{!! @\App\Common::getAreaType()[$info->area_type]!!}</div>
                            </td>
                            @if($info->area_type==1)
                                <td style="text-align: right; font-weight: bold;">
                                    <div>Upazila: </div>
                                    <div>District: </div>
                                </td>
                                <td>
                                    <div>{{@$info->thana}}</div>
                                    <div>{{@$info->district}}</div>
                                </td>
                            @elseif($info->area_type==2)
                                <td style="text-align: right; font-weight: bold;">
                                    <div>Area: </div>
                                    <div>Thana: </div>
                                    <div>City: </div>
                                    <div>District: </div>
                                </td>
                                <td>
                                    <div>{{@$info->area}}</div>
                                    <div>{{@$info->thana}}</div>
                                    <div>{{@$info->city}}</div>
                                    <div>{{@$info->district}}</div>
                                </td>
                            @endif
                        </tr>
                        <tr style="text-align: center;border: 1px solid;">
                            <td colspan="4" > Lab Tests</td>
                        </tr>
                        <tr style="border: 1px solid; ">
                            <td style="text-align: right; font-weight: bold;">
                                <div>NS1:</div>
                                <div>IgG:</div>
                            </td>
                            <td>
                                <div>{!! @\App\Common::getLabTest()[$info->lt_ns1]!!}</div>
                                <div>{!! @\App\Common::getLabTest()[$info->lt_igg]!!}</div>
                            </td>
                            <td style="text-align: right; font-weight: bold;">
                                <div>IgM: </div>
                                <div>PCR: </div>
                            </td>
                            <td>
                                <div>{!! @\App\Common::getLabTest()[$info->lt_igm]!!}</div>
                                <div>{!! @\App\Common::getLabTest()[$info->lt_pcr]!!}</div>
                            </td>
                        </tr>
                        <tr style="text-align: center;border: 1px solid;">
                            <td colspan="4" > CORPORATE INFORMATION </td>
                        </tr>
                        <tr style="border: 1px solid; ">
                            <td style="text-align: right; font-weight: bold;">
                                <div>Site Name: </div>
                                <div>Username: </div>
                            </td>
                            <td>
                                <div> {{@$info->user->site->name}}</div>
                                <div> {{@$info->user->username}}</div>
                            </td>
                            <td style="text-align: right; font-weight: bold;">
                                <div> </div>
                            </td>
                            <td>
                                <div>
                                </div>
                            </td>
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
