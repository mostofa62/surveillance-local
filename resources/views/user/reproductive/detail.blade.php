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
                        
                    </div>
                </div>
                <div class="panel-body " id="panel-body">
                    <table class="table " align="center">
                        <tr style="text-align: center;border: 1px solid;">
                            <td colspan="4" >INFORMATION</td>
                        </tr>
                        <tr style="border: 1px solid; ">
                            <td style="text-align: right; font-weight: bold;">
                            <div> Sl</div>
                            <div> Mobile No</div>
                            </td>
                            <td>
                            <div>{!! @$info->id !!}</div>                  
                            <div>{!! @$info->mobile_no !!}</div>
                            </td>
                            <td style="text-align: right; font-weight: bold;"></td>
                            <td style="text-align: center;">
                                
                            </td>
                        </tr>



                        
                    </table>
                    @if($question)
                        <table class="table " align="center">
                            <tr style="text-align: center;border: 1px solid;">
                                <td colspan="4" >QUESTIONS</td>
                            </tr>


                            @if($question->s_0_3)
                            <tr>
                                <th colspan="2">
                                    0.3। {{ @\App\Models\Reproductive::questionText()['s_0_3']}}
                                </th>
                                <td colspan="2" class="text-left">
                                    {{ @$question->s_0_3 }}
                                </td>
                            </tr>
                            @endif
                            @if($question->s_0_3>=15 && $question->s_0_3 < 18)
                            <tr>
                                <th colspan="2">
                                    0.4। {{ @\App\Models\Reproductive::questionText()['s_0_4']}}
                                </th>
                                <td colspan="2" class="text-left">
                                    {{ @$question->s_0_4 }}
                                </td>
                            </tr>
                            @endif
                            <tr style="text-align: center;border: 1px solid;">
                                <td colspan="4" >{{ @App\Models\Reproductive::questionText()['gi_1_i'] }}</td>
                            </tr>
                            @if($question->gi_1_1)

                            <tr>
                                <th colspan="2">
                                    1.1। {{ @\App\Models\Reproductive::questionText()['gi_1_1']}}
                                </th>
                                <td colspan="2" class="text-left">
                                    {{ @\App\Models\Reproductive::districtList(@$question->gi_1_1)->name }}
                                </td>
                            </tr>

                            @endif;

                            @if($question->gi_1_3_cc)

                            <tr>
                                <th colspan="2">
                                    1.3। সিটি করপোরেশন
                                </th>
                                <td colspan="2" class="text-left">
                                    {{ @\App\Models\Reproductive::citycorporationlist(0,@$question->gi_1_3_cc)->name }}
                                </td>
                            </tr>

                            @endif;

                            @if($question->gi_1_3_uz)

                            <tr>
                                <th colspan="2">
                                    1.3। উপজেলা
                                </th>
                                <td colspan="2" class="text-left">
                                    {{ @\App\Models\Reproductive::upazilalist(0,@$question->gi_1_3_uz)->name }}
                                </td>
                            </tr>

                            @endif;


                            <tr style="text-align: center;border: 1px solid;">
                                <td colspan="4" >{{ @App\Models\Reproductive::questionText()['pi_2_i'] }}</td>
                            </tr>
                            @if($question->pi_2_1)
                            <tr>
                                <th colspan="2">
                                    2.1। {{ @App\Models\Reproductive::questionText()['pi_2_1']}}
                                </th>
                                <td colspan="2" class="text-left">
                                    {{ \App\Models\Reproductive::marialStatus($question->pi_2_1)  }}
                                </td>
                            </tr>
                            @endif
                            @if($question->pi_2_2)
                            <tr>
                                <th colspan="2">
                                    2.2। {{ @\App\Models\Reproductive::questionText()['pi_2_2']}}
                                </th>
                                <td colspan="2" class="text-left">
                                    {{ @$question->pi_2_2 }}
                                </td>
                            </tr>
                            @endif

                            <tr style="text-align: center;border: 1px solid;">
                                <td colspan="4" >{{ @App\Models\Reproductive::questionText()['fp_3_i'] }}</td>
                            </tr>

                            @if($question->fp_3_1)
                            <tr>
                                <th colspan="2">
                                    3.1। {{ @\App\Models\Reproductive::questionText()['fp_3_1']}}
                                </th>
                                <td colspan="2" class="text-left">
                                    {{ @$question->fp_3_1 }}
                                </td>
                            </tr>
                            @endif


                            <tr style="text-align: center;border: 1px solid;">
                                <td colspan="4" >{{ @App\Models\Reproductive::questionText()['rh_6_i'] }}</td>
                            </tr>

                            @if($question->rh_6_1)
                            <tr>
                                <th colspan="2">
                                    6.1। {{ @\App\Models\Reproductive::questionText()['rh_6_1']}}
                                </th>
                                <td colspan="2" class="text-left">
                                    {{ @$question->rh_6_1 }}
                                </td>
                            </tr>
                            @endif

                            @if($question->rh_6_5)
                            <tr>
                                <th colspan="2">
                                    6.5। {{ @\App\Models\Reproductive::questionText()['rh_6_5']}}
                                </th>
                                <td colspan="2" class="text-left">
                                    {{ @$question->rh_6_5 }}
                                </td>
                            </tr>
                            @endif

                            <tr style="text-align: center;border: 1px solid;">
                                <td colspan="4" >{{ @App\Models\Reproductive::questionText()['bc_7_i'] }}</td>
                            </tr>

                            @if($question->bc_7_1)
                            <tr>
                                <th colspan="2">
                                    7.1। {{ @\App\Models\Reproductive::questionText()['bc_7_1']}}
                                </th>
                                <td colspan="2" class="text-left">
                                    {{ @$question->bc_7_1 }}
                                </td>
                            </tr>
                            @endif


                            <tr style="text-align: center;border: 1px solid;">
                                <td colspan="4" >{{ @App\Models\Reproductive::questionText()['prq_8_i'] }}</td>
                            </tr>

                            @if($question->prq_8_1)
                            <tr>
                                <th colspan="2">
                                    8.1। {{ @\App\Models\Reproductive::questionText()['prq_8_1']}}
                                </th>
                                <td colspan="2" class="text-left">
                                    {{ @$question->prq_8_1 }}
                                </td>
                            </tr>
                            @endif


                            @if($question->prq_8_2)
                            <tr>
                                <th colspan="2">
                                    8.2। {{ @\App\Models\Reproductive::questionText()['prq_8_2']}}
                                </th>
                                <td colspan="2" class="text-left">
                                    {{ @$question->prq_8_2 }}
                                </td>
                            </tr>
                            @endif


                            @if($question->prq_8_3)
                            <tr>
                                <th colspan="2">
                                    8.3। {{ @\App\Models\Reproductive::questionText()['prq_8_3']}}
                                </th>
                                <td colspan="2" class="text-left">
                                    {{ @$question->prq_8_3 }}
                                </td>
                            </tr>
                            @endif



                            <tr style="text-align: center;border: 1px solid;">
                                <td colspan="4" >{{ @App\Models\Reproductive::questionText()['rprq_9_i'] }}</td>
                            </tr>

                            @if($question->rprq_9_1)
                            <tr>
                                <th colspan="2">
                                    9.1। {{ @\App\Models\Reproductive::questionText()['rprq_9_1']}}
                                </th>
                                <td colspan="2" class="text-left">
                                    {{ @$question->rprq_9_1 }}
                                </td>
                            </tr>
                            @endif


                            @if($question->rprq_9_2)
                            <tr>
                                <th colspan="2">
                                    9.2। {{ @\App\Models\Reproductive::questionText()['rprq_9_2']}}
                                </th>
                                <td colspan="2" class="text-left">
                                    {{ @$question->rprq_9_2 }}
                                </td>
                            </tr>
                            @endif


                            @if($question->rprq_9_3)
                            <tr>
                                <th colspan="2">
                                    9.3। {{ @\App\Models\Reproductive::questionText()['rprq_9_3']}}
                                </th>
                                <td colspan="2" class="text-left">
                                    {{ @$question->rprq_9_3 }}
                                </td>
                            </tr>
                            @endif


                            

                            <tr style="text-align: center;border: 1px solid;">
                                <td colspan="4" >{{ @App\Models\Reproductive::questionText()['pprq_10_i'] }}</td>
                            </tr>

                            @if($question->pprq_10_1_day || $question->pprq_10_1_month || $question->pprq_10_1_year || $question->pprq_10_1)
                            <tr>
                                <th colspan="2">
                                    10.1। {{ @\App\Models\Reproductive::questionText()['pprq_10_1']}}
                                </th>
                                <td colspan="2" class="text-left">
                                    @if($question->pprq_10_1 && ($question->pprq_10_1==888 || $question->pprq_10_1==999) )
                                        {{ @$question->pprq_10_1 }}
                                    @else
                                    {{ isset($question->pprq_10_1_year)?@$pprq_10_1_year.' year':'' }}
                                    {{ isset($question->pprq_10_1_day)?@$pprq_10_1_day.' day':'' }}
                                    {{ isset($question->pprq_10_1_month)?@$pprq_10_1_month.' month':'' }}
                                    @endif
                                </td>
                            </tr>
                            @endif

                            @if($question->pprq_10_12)
                            <tr>
                                <th colspan="2">
                                    10.12। {{ @\App\Models\Reproductive::questionText()['pprq_10_12']}}
                                </th>
                                <td colspan="2" class="text-left">
                                    {{@App\Models\Reproductive::getPregnancyBirthPostion($question->pprq_10_12) }}
                                </td>
                            </tr>
                            @endif

                            <tr style="text-align: center;border: 1px solid;">
                                <td colspan="4" >{{ @App\Models\Reproductive::questionText()['fq_11_1'] }}</td>
                            </tr>


                            @if($question->fq_11_1)
                            <tr>
                                <th colspan="2">
                                    11.1। {{ @\App\Models\Reproductive::questionText()['fq_11_1'] }}
                                </th>
                                <td colspan="2" class="text-left">
                                    {{ @$question->fq_11_1 }}
                                </td>
                            </tr>
                            @endif


                            

                            

                        </table>  

                    @endif
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

    
    
@stop
