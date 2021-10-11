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
                            <div>Lab Name</div>
                            <div>Location of Hospital/ Laboratory</div>
                            <div>Received Date</div>
                            <div>Patient Reporting Date</div>
                            <div>Surveillance Reporting Date</div>
                            <div>Lab's Patient Id</div>
                            <div>Name</div>
                            <div>Mobile No</div>
                            <div>Age</div>
                            <div>Gender</div>
                            <div>Symptoms / Diagnosis </div>
                            </td>
                            <td>
                            <div>{!! @$info->id !!}</div>
                            <div>{!! @App\Common::getLabName()[$info->lab_name] !!}</div>
                            <div>{!! @$info->area !!}</div>
                            <div>{{@date('d/m/Y', strtotime($info->received_date))}}</div>
                            <div>{{@date('d/m/Y', strtotime($info->p_report_date))}}</div>
                            <div>{{@date('d/m/Y', strtotime($info->s_reporting_date))}}</div>
                            <div>{!! @$info->p_lab_id !!}</div>
                            <div>{!! @$info->name !!}</div>
                            <div>{!! @$info->mobile_no !!}</div>
                            <div>{!! @$info->age !!}</div>
                            <div>{!! @\App\Common::getDengueGenderType()[$info->sex]!!}</div>
                            <div>{!! @$info->diagnosis!!}</div>
                            </td>
                            <td style="text-align: right; font-weight: bold;"></td>
                            <td style="text-align: center;">
                                <span class=" image">

                                </span>
                            </td>
                        </tr>
                        <tr style="text-align: center;border: 1px solid;">
                            <td colspan="4" > Lab Tests</td>
                        </tr>
                        <tr style="border: 1px solid; ">
                            <td style="text-align: right; font-weight: bold;">
                                <div>NS1 Antigen :</div>
                                <div>IgM for Dengue:</div>
                                <div>IgG for Dengue:</div>
                                <div>Chikungunya Antibody Test:</div>
                                <div>ICT for Malaria:</div>
                                <div>Febrile Antigen / Triple Antigen:</div>
                                <div>ICT for Salmonella:</div>
                            </td>
                            <td>
                                <div>{!! @\App\Common::getLabTest()[$info->is_ns1]!!}</div>
                                <div>{!! @\App\Common::getLabTest()[$info->is_igm]!!}</div>
                                <div>{!! @\App\Common::getLabTest()[$info->is_igg]!!}</div>
                                <div>{!! @\App\Common::getLabTest()[$info->is_chikunguniya]!!}</div>
                                <div>{!! @\App\Common::getLabTest()[$info->is_malaria]!!}</div>
                                <div>{!! @\App\Common::getLabTest()[$info->is_febrile_antigen]!!}</div>
                                <div>{!! @\App\Common::getLabTest()[$info->is_salmonella]!!}</div>
                            </td>
                                <td style="text-align: right; font-weight: bold;">
                                    <div>HBsAg:</div>
                                    <div>Anti HAV IgM</div>
                                    <div>Anti HEV IgM:</div>
                                    <div>Anti HCV IgM:</div>
                                    <div>PCR HBV RNA:</div>
                                    <div>PCR HCV DNA:</div>
                                    <div></div>
                                </td>
                                <td>
                                    <div>{!! @\App\Common::getLabTest()[$info->is_hbsag]!!}</div>
                                    <div>{!! @\App\Common::getLabTest()[$info->is_anti_hav_igm]!!}</div>
                                    <div>{!! @\App\Common::getLabTest()[$info->is_anti_hev_igm]!!}</div>
                                    <div>{!! @\App\Common::getLabTest()[$info->is_anti_hcv_igm]!!}</div>
                                    <div>{!! @\App\Common::getLabTest()[$info->is_pcr_hbv_rna]!!}</div>
                                    <div>{!! @\App\Common::getLabTest()[$info->is_pcr_hcv_dna]!!}</div>
                                </td>
                        </tr>
                        <tr style="text-align: center;border: 1px solid;">
                            <td colspan="1" > Remarks:</td>
                            <td colspan="3" >{!! @$info->remarks !!} </td>
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
                                <div> Date of Entry: </div>
                            </td>
                            <td>
                                <div> {{@date('d/m/Y h:m', strtotime($info->created_at))}}</div>
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
           mywindow.document.write('<h4 style="text-align: center">PATIENT INFORMATION</h4>');
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
