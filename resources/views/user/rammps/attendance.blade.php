@extends('layouts/master')
@section('content')

<div class="row" style="color: #fff !important;">




<div class="panel-body" id="panel-body">

    <div class="col-md-12 col-sm-12">

        @if($info)
        <table class="table table-bordered" align="center" style="background-color: #fff;">
            <tbody>
            <tr>
                <th>
                   User 
                </th>

                <th>
                   IN-OUT 
                </th>
                <th>
                    31
                </th>
                <th>
                    32
                </th>
                <th>
                    33
                </th>
                <th>
                    34
                </th>
                <th>
                    35
                </th>
                <th>
                    36
                </th>
                <th>
                    37
                </th>
                <th>
                    41
                </th>
                <th>
                    42
                </th>
                <th>
                    43
                </th>
                <th>
                    44
                </th>
            </tr>
            @foreach($info as $i)
            <tr>
                <th>
                    {!! $i->user !!}
                </th>
                <td style="font-weight: bold;font-size:18px;">
                    @if(!empty($i->attend_times))
                            @php
                                $attend_times = json_decode($i->attend_times,true);
                                
                            @endphp

                            @foreach($attend_times as $t)
                                @if($t['type'] == 1)
                                    <span class="label label-success">IN: {!! $t['time'] !!}</span>
                                @else
                                    <span class="label label-danger">OUT: {!! $t['time'] !!}</span>
                                @endif

                            @endforeach

                        

                    @endif
                </td>
                <td>
                    {!! $i->trts !!}
                </td>
                <td>
                    {!! $i->trtu_s !!}
                </td>
                <td>
                    {!! $i->trth_s !!}
                </td>
                <td>
                    {!! $i->trfr_s !!}
                </td>
                <td>
                    {!! $i->trfv_s !!}
                </td>
                <td>
                    {!! $i->trsx_s !!}
                </td>
                <td>
                    {!! $i->trsv_s !!}
                </td>

                <td>
                    {!! $i->fron_s !!}
                </td>

                <td>
                    {!! $i->frot_s !!}
                </td>

                <td>
                    {!! $i->froth_s !!}
                </td>

                <td>
                    {!! $i->frott_s !!}
                </td>
            </tr>
            @endforeach                    
            </tbody>
        </table>
        @endif

        


    </div>

    

    
    
</div>






</div>


@if($info)
    <script type="text/javascript">



       
    </script>
@endif

@stop