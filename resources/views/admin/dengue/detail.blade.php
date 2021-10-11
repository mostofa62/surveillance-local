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
                            <div>Sl</div>
                            <div>Hospital Name</div>
                            <div>Name</div>
                            <div>Mobile No</div>
                            <div>Age</div>
                            <div>Gender</div>
                            <div>Date of Admission</div>
                            <div>Diagonosis</div>
                            </td>
                            <td>
                            <div>{!! @$info->id !!}</div>
                            <div>{!! @$info->site->name !!}</div>
                            <div>{!! @$info->name !!}</div>
                            <div>{!! @$info->mobile_no !!}</div>
                            <div>{!! @$info->age !!}</div>
                            <div>{!! @\App\Common::getGenderType()[$info->sex]!!}</div>
                            <div>{!! @$info->date_of_admission!!}</div>
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
                                <div>Area:</div>
                            </td>
                            <td>
                                <div>{!! @$info->area!!}</div>
                            </td>
                            <td style="text-align: right; font-weight: bold;">
                                <div>Address: </div>
                            </td>
                            <td>
                                <div>{{@$info->address}}</div>
                            </td>
                        </tr>
                        <tr style="text-align: center;border: 1px solid;">
                            <td colspan="4" > Lab Tests</td>
                        </tr>
                        <tr style="border: 1px solid; ">
                            <td style="text-align: right; font-weight: bold;">
                                <div>NS1:</div>
                            </td>
                            <td>
                                <div>{!! @\App\Common::getLabTest()[$info->lt_ns1]!!}</div>
                            </td>
                                <td style="text-align: right; font-weight: bold;">
                                    <div>IgM: </div>
                                </td>
                                <td>
                                    <div>{!! @\App\Common::getLabTest()[$info->lt_igm]!!}</div>
                                </td>
                        </tr>
                        <tr style="border: 1px solid; ">
                            <td style="text-align: right; font-weight: bold;">
                                <div>Other Test: </div>
                            </td>
                            <td colspan="3">
                                <div>{!! @\App\Common::getLabTest()[$info->other_test]!!}</div>
                            </td>

                        </tr>
                        <tr style="text-align: center;border: 1px solid;">
                            <td colspan="4" > Comorbidity</td>
                        </tr>
                        <tr style="border: 1px solid; ">
                            <td style="text-align: right; font-weight: bold;">
                                <div>Comorbidity:</div>
                            </td>
                            <td>
                                @if(isset($info->comorbidity) && $info->comorbidity!=null)
                                    @foreach(json_decode($info->comorbidity) as $key=>$comorbidity)
                                        <div>({!! $key !!}) {!! @\App\Common::getDengueComorbidity()[$comorbidity]!!}</div>
                                    @endforeach
                                @endif
                            </td>
                            <td style="text-align: right; font-weight: bold;">
                                <div>Comorbidity Others: </div>
                            </td>
                            <td>
                                @if(isset($info->comorbidity_others) && $info->comorbidity_others!=null)
                                    @foreach(json_decode($info->comorbidity_others) as $key=>$comorbidity)
                                        <div>({!! $key !!}) {!! @$comorbidity!!}</div>
                                    @endforeach
                                @endif
                            </td>
                        </tr>
                        <tr style="border: 1px solid; ">
                            <td style="text-align: right; font-weight: bold;">
                                <div>Discharge Date:</div>
                            </td>
                            <td colspan="3">
                                <div>{!! @$info->discharge_date!!}</div>
                            </td>
                        </tr>
                        <tr style="border: 1px solid; ">
                            <td style="text-align: right; font-weight: bold;">
                                <div>Death Status:</div>
                            </td>
                            <td>
                                <div>{!! @\App\Common::getDengueYesNoType()[$info->death_flag]!!}</div>
                            </td>
                            <td style="text-align: right; font-weight: bold;">
                                <div>Death Date: </div>
                            </td>
                            <td>
                                <div>{!! @\App\Common::getDengueYesNoType()[$info->death_date]!!}</div>
                            </td>
                        </tr>
                        <tr style="text-align: center;border: 1px solid;">
                            <td colspan="4" > CORPORATE INFORMATION </td>
                        </tr>
                        <tr style="border: 1px solid; ">
                            <td style="text-align: right; font-weight: bold;">
                                <div>Data Entry Operator: </div>
                            </td>
                            <td>
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
