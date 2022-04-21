@extends('layouts/master')
@section('content')

<div class="row" style="color: #fff !important;">




<div class="panel-body" id="panel-body">

    {!! Form::open(array('url' => session('access').'rammps/report','method' =>'get', 'id'=>"form", 'class'=>"form-horizontal")) !!}
    <div class="form-group">
        <label class="col-md-3 col-xs-4 control-label">
            Search using Date
        </label>
        <div class="col-md-8">
        {!! Form::date('date', Request::get('date'),array('id'=>'search','class' => 'form-control','placeholder'=>'provide your search here')) !!}
        <label for="search" class="error" generated="true"></label>
        <button type="submit" class="btn btn-success">Submit</button>

        <a  class="btn btn-warning" href="{{ url(session('access').'rammps/report') }} ">Reset</a>
        </div>

    </div>
    {{ Form::close() }}

    <div class="col-md-12 col-sm-12">

        @if($info)
        <table class="table table-bordered" align="center" style="background-color: #fff;">
            <tbody>
            <tr>
                <th>
                    TOTAL NUMBERS
                </th>
                <th>
                    {!! $total_numbers !!}
                </th>
            </tr>
            @foreach($info as $i)
            <tr>
                <th>
                    {!! $i[0] !!}
                </th>
                <td style="font-weight: bold;">
                    {!! $i[1] !!}
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