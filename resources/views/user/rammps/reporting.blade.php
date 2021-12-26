@extends('layouts/master')
@section('content')

<div class="row" style="color: #fff !important;">




<div class="panel-body" id="panel-body">

    <div class="col-md-12 col-sm-12">

        @if($info)
        <table class="table table-bordered" align="center" style="background-color: #fff;">
            <tbody>
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