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
                            <td colspan="4" > PATIENT INFORMATION </td>
                        </tr>
                        <tr style="border: 1px solid; ">
                            <td style="text-align: right; font-weight: bold;">
                            <div> Sl</div>
                            <div> Surveillance Id</div>
                            <div> Date</div>
                            <div> Name</div>
                            <div> Mobile No</div>
                            <div> Age</div>
                            <div> Gender</div>
                            <div> Date of Onset</div>
                            <div> Gaurdian Name</div>
                            <div> Address</div>
                            <div> Life Status</div>
                            </td>
                            <td>
                            <div>{!! @$info->id !!}</div>
                            <div>{!! @$info->surveillance_id !!}</div>
                            <div>{!! @$info->date !!}</div>
                            <div>{!! @$info->name !!}</div>
                            <div>{!! @$info->mobile_no !!}</div>
                            <div>{!! @$info->age !!}</div>
                            <div>{!! @\App\Common::getGenderType()[$info->sex]!!}</div>
                            <div>{!! @$info->date_of_onset!!}</div>
                            <div>{!! @$info->guardian_name!!}</div>
                            <div>{!! @$info->address!!}</div>
                            <div>{!! @\App\Common::getLifeStatus()[$info->life_status]!!}</div>
                            </td>
                            <td style="text-align: right; font-weight: bold;"></td>
                            <td style="text-align: center;">
                                <span class=" image">

                                </span>
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
