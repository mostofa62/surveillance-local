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

                    @if($question->s_0_1)
                    <tr>
                        <th colspan="2">
                            ১। {{ @\App\Models\Ivr::questionText()['s_0_1']}}
                        </th>
                        <td colspan="2" class="text-left">
                            {{ @$question->s_0_1 }}
                        </td>
                    </tr>
                    @endif

                    @if($question->s_0_2)
                    <tr>
                        <th colspan="2">
                            ২। {{ @\App\Models\Ivr::questionText()['s_0_2']}}
                        </th>
                        <td colspan="2" class="text-left">
                            {{ @$question->s_0_2 }}
                        </td>
                    </tr>
                    @endif

                    @if($question->s_0_3)
                    <tr>
                        <th colspan="2">
                            ৩। {{ @\App\Models\Ivr::questionText()['s_0_3']}}
                        </th>
                        <td colspan="2" class="text-left">
                            {{ @$question->s_0_3 }}
                        </td>
                    </tr>
                    @endif

                    @if($question->di_1_1)
                    <tr>
                        <th colspan="2">
                            ৪। {{ @\App\Models\Ivr::questionText()['di_1_1']}}
                        </th>
                        <td colspan="2" class="text-left">
                            {{ @$question->di_1_1 }}
                        </td>
                    </tr>
                    @endif


                    @if($question->di_1_2)
                    <tr>
                        <th colspan="2">
                            ৫। {{ @\App\Models\Ivr::questionText()['di_1_2']}}
                        </th>
                        <td colspan="2" class="text-left">
                            {{ @$question->di_1_2 }}

                        </td>
                    </tr>
                    @endif


                    @if($question->di_1_3)
                    <tr>
                        <th colspan="2">
                            ৬। {{ @\App\Models\Ivr::questionText()['di_1_3']}}
                        </th>
                        <td colspan="2" class="text-left">
                            {{ @$question->di_1_3 }}
                            
                        </td>
                    </tr>
                    @endif

                    @if($question->smk_2_1)
                    <tr>
                        <th colspan="2">
                            ৭। {{ @\App\Models\Ivr::questionText()['smk_2_1']}}
                        </th>
                        <td colspan="2" class="text-left">
                            {{ @$question->smk_2_1 }}
                        </td>
                    </tr>
                    @endif

                    @if($question->smk_2_2)
                    <tr>
                        <th colspan="2">
                            ৮। {{ @\App\Models\Ivr::questionText()['smk_2_2']}}
                        </th>
                        <td colspan="2" class="text-left">
                            {{ @$question->smk_2_2 }}
                        </td>
                    </tr>
                    @endif

                    @if($question->smk_2_3)
                    <tr>
                        <th colspan="2">
                            ৯। {{ @\App\Models\Ivr::questionText()['smk_2_3']}}
                        </th>
                        <td colspan="2" class="text-left">
                            {{ @$question->smk_2_3 }}
                        </td>
                    </tr>
                    @endif

                    @if($question->smk_2_4)
                    <tr>
                        <th colspan="2">
                            ১০। {{ @\App\Models\Ivr::questionText()['smk_2_4']}}
                        </th>
                        <td colspan="2" class="text-left">
                            {{ @$question->smk_2_4 }}
                        </td>
                    </tr>
                    @endif

                    @if($question->smk_2_5)
                    <tr>
                        <th colspan="2">
                            ১১। {{ @\App\Models\Ivr::questionText()['smk_2_5']}}
                        </th>
                        <td colspan="2" class="text-left">
                            {{ @$question->smk_2_5 }}
                        </td>
                    </tr>
                    @endif


                    @if($question->smk_2_6)
                    <tr>
                        <th colspan="2">
                            ১২। {{ @\App\Models\Ivr::questionText()['smk_2_6']}}
                        </th>
                        <td colspan="2" class="text-left">
                            {{ @$question->smk_2_6 }}
                        </td>
                    </tr>
                    @endif

                    @if($question->smk_2_7)
                    <tr>
                        <th colspan="2">
                            ১৩। {{ @\App\Models\Ivr::questionText()['smk_2_7']}}
                        </th>
                        <td colspan="2" class="text-left">
                            {{ @$question->smk_2_7 }}
                        </td>
                    </tr>
                    @endif

                    @if($question->smk_2_8)
                    <tr>
                        <th colspan="2">
                            ১। {{ @\App\Models\Ivr::questionText()['smk_2_8']}}
                        </th>
                        <td colspan="2" class="text-left">
                            {{ @$question->smk_2_8 }}
                        </td>
                    </tr>
                    @endif

                    @if($question->smk_2_9)
                    <tr>
                        <th colspan="2">
                            ১৪। {{ @\App\Models\Ivr::questionText()['smk_2_9']}}
                        </th>
                        <td colspan="2" class="text-left">
                            {{ @$question->smk_2_9 }}
                        </td>
                    </tr>
                    @endif

                    @if($question->smk_2_10)
                    <tr>
                        <th colspan="2">
                            ১৫। {{ @\App\Models\Ivr::questionText()['smk_2_10']}}
                        </th>
                        <td colspan="2" class="text-left">
                            {{ @$question->smk_2_10 }}
                        </td>
                    </tr>
                    @endif

                    @if($question->smk_2_11)
                    <tr>
                        <th colspan="2">
                            ১৬। {{ @\App\Models\Ivr::questionText()['smk_2_11']}}
                        </th>
                        <td colspan="2" class="text-left">
                            {{ @$question->smk_2_11 }}
                        </td>
                    </tr>
                    @endif

                    @if($question->smk_2_12)
                    <tr>
                        <th colspan="2">
                            ১৭। {{ @\App\Models\Ivr::questionText()['smk_2_11']}}
                        </th>
                        <td colspan="2" class="text-left">
                            {{ @$question->smk_2_11 }}
                        </td>
                    </tr>
                    @endif

                    @if($question->smk_2_13)
                    <tr>
                        <th colspan="2">
                            ১৮। {{ @\App\Models\Ivr::questionText()['smk_2_13']}}
                        </th>
                        <td colspan="2" class="text-left">
                            {{ @$question->smk_2_13 }}
                        </td>
                    </tr>
                    @endif

                    @if($question->smk_2_13)
                    <tr>
                        <th colspan="2">
                            ১৯। {{ @\App\Models\Ivr::questionText()['smk_2_13']}}
                        </th>
                        <td colspan="2" class="text-left">
                            {{ @$question->smk_2_13 }}
                        </td>
                    </tr>
                    @endif


                    @if($question->drk_3_1)
                    <tr>
                        <th colspan="2">
                            ২০। {{ @\App\Models\Ivr::questionText()['drk_3_1']}}
                        </th>
                        <td colspan="2" class="text-left">
                            {{ @$question->drk_3_1 }}
                        </td>
                    </tr>
                    @endif

                    @if($question->drk_3_2)
                    <tr>
                        <th colspan="2">
                            ২১। {{ @\App\Models\Ivr::questionText()['drk_3_2']}}
                        </th>
                        <td colspan="2" class="text-left">
                            {{ @$question->drk_3_2 }}
                        </td>
                    </tr>
                    @endif

                    @if($question->drk_3_3)
                    <tr>
                        <th colspan="2">
                            ২২। {{ @\App\Models\Ivr::questionText()['drk_3_3']}}
                        </th>
                        <td colspan="2" class="text-left">
                            {{ @$question->drk_3_3 }}
                        </td>
                    </tr>
                    @endif


                    @if($question->fd_4_1)
                    <tr>
                        <th colspan="2">
                            ২৩। {{ @\App\Models\Ivr::questionText()['fd_4_1']}}
                        </th>
                        <td colspan="2" class="text-left">
                            {{ @$question->fd_4_1 }}
                        </td>
                    </tr>
                    @endif

                    @if($question->fd_4_2)
                    <tr>
                        <th colspan="2">
                            ২৪। {{ @\App\Models\Ivr::questionText()['fd_4_2']}}
                        </th>
                        <td colspan="2" class="text-left">
                            {{ @$question->fd_4_2 }}
                        </td>
                    </tr>
                    @endif

                    @if($question->fd_4_3)
                    <tr>
                        <th colspan="2">
                            ২৫। {{ @\App\Models\Ivr::questionText()['fd_4_3']}}
                        </th>
                        <td colspan="2" class="text-left">
                            {{ @$question->fd_4_3 }}
                        </td>
                    </tr>
                    @endif


                    @if($question->fd_4_4)
                    <tr>
                        <th colspan="2">
                            ২৬। {{ @\App\Models\Ivr::questionText()['fd_4_4']}}
                        </th>
                        <td colspan="2" class="text-left">
                            {{ @$question->fd_4_4 }}
                        </td>
                    </tr>
                    @endif

                    @if($question->fd_4_5)
                    <tr>
                        <th colspan="2">
                            ২৭। {{ @\App\Models\Ivr::questionText()['fd_4_5']}}
                        </th>
                        <td colspan="2" class="text-left">
                            {{ @$question->fd_4_5 }}
                        </td>
                    </tr>
                    @endif

                    @if($question->fd_4_6)
                    <tr>
                        <th colspan="2">
                            ২৮। {{ @\App\Models\Ivr::questionText()['fd_4_6']}}
                        </th>
                        <td colspan="2" class="text-left">
                            {{ @$question->fd_4_6 }}
                        </td>
                    </tr>
                    @endif

                    @if($question->fd_4_7)
                    <tr>
                        <th colspan="2">
                            ২৯। {{ @\App\Models\Ivr::questionText()['fd_4_7']}}
                        </th>
                        <td colspan="2" class="text-left">
                            {{ @$question->fd_4_7 }}
                        </td>
                    </tr>
                    @endif

                    @if($question->hq_5_1)
                    <tr>
                        <th colspan="2">
                            ৩০। {{ @\App\Models\Ivr::questionText()['hq_5_1']}}
                        </th>
                        <td colspan="2" class="text-left">
                            {{ @$question->hq_5_1 }}
                        </td>
                    </tr>
                    @endif

                    @if($question->hq_5_2)
                    <tr>
                        <th colspan="2">
                            ৩১। {{ @\App\Models\Ivr::questionText()['hq_5_2']}}
                        </th>
                        <td colspan="2" class="text-left">
                            {{ @$question->hq_5_2 }}
                        </td>
                    </tr>
                    @endif

                    @if($question->hq_5_3)
                    <tr>
                        <th colspan="2">
                            ৩২। {{ @\App\Models\Ivr::questionText()['hq_5_3']}}
                        </th>
                        <td colspan="2" class="text-left">
                            {{ @$question->hq_5_3 }}
                        </td>
                    </tr>
                    @endif

                    @if($question->hq_5_4)
                    <tr>
                        <th colspan="2">
                            ৩৩। {{ @\App\Models\Ivr::questionText()['hq_5_4']}}
                        </th>
                        <td colspan="2" class="text-left">
                            {{ @$question->hq_5_4 }}
                        </td>
                    </tr>
                    @endif


                    @if($question->op_6_1)
                    <tr>
                        <th colspan="2">
                            ৩৪। {{ @\App\Models\Ivr::questionText()['op_6_1']}}
                        </th>
                        <td colspan="2" class="text-left">
                            {{ @$question->op_6_1 }}
                        </td>
                    </tr>
                    @endif

                    @if($question->op_6_2)
                    <tr>
                        <th colspan="2">
                            ৩৫। {{ @\App\Models\Ivr::questionText()['op_6_2']}}
                        </th>
                        <td colspan="2" class="text-left">
                            {{ @$question->op_6_2 }}
                        </td>
                    </tr>
                    @endif



                    


                    @endif

                </table>


@stop