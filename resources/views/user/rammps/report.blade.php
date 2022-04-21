@extends('layouts/master')
@section('content')

<div class="row" style="color: #fff !important;">

{!! Form::open(array('url' => session('access').'rammps/attendance_report','method' =>'get', 'id'=>"form", 'class'=>"form-horizontal")) !!}
<div class="form-group">
    <label class="col-md-3 col-xs-4 control-label">
        Search using Date
    </label>
    <div class="col-md-8">
    {!! Form::date('date', Request::get('date'),array('id'=>'search','class' => 'form-control','placeholder'=>'provide your search here')) !!}
    <label for="search" class="error" generated="true"></label>
    <button type="submit" class="btn btn-success">Submit</button>

    <a  class="btn btn-warning" href="{{ url(session('access').'rammps/attendance_report') }} ">Reset</a>
    </div>

</div>
{{ Form::close() }}


<div class="panel-body" id="panel-body">

    <div class="col-md-12 col-sm-12 table-responsive">

        <table class="table table-bordered" align="center" style="background-color: #fff;">
            <thead>
                <th> INDEX</th>
                <th> USER ID</th>
                <th> Attendance </th>
                @foreach ($status_arr as $st)
                <th>{!! $st !!}</th>
                @endforeach
            </thead>
            <tbody>
            @foreach ($output_arr as $i=>$oarr)
            <tr>
            <td>{!! $i+1 !!}</td>
            <td>{!! $oarr['user'] !!}</td>
            <td style="font-weight: bold;font-size:18px;">                

                @if(!empty($oarr['attend_times']))
                            @php
                                $attend_times = json_decode($oarr['attend_times'],true);
                                
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
                @php
                foreach($status_arr as $st){
                        $is_match=false;
                        foreach ($oarr['work'] as $work) {
                                if($work['last_status']==$st){
                                        echo "<td>".$work['done']."</td>";
                                        $is_match=true;
                                }
                        }
                        if(!$is_match)
                                echo "<td></td>";
                }
                @endphp



            </tr>
            @if($oarr == end($output_arr))
            <tr>
                <th colspan="3">End</th>
            </tr>
            @endif
            @endforeach
            </tbody>
        </table>
        

        


    </div>

    

    
    
</div>






</div>




@stop