@extends('layouts/master')
@section('content')

<div class="row" style="color: #fff !important;">
<div class="col-md-10 col-md-offset-1">


<div class="panel panel-inverse">
<div class="row">
    <div class="col-md-3">
        {{$pageTitle}}
    </div>

    <div class="col-md-9 print-btn">
        <span style="color: #ff7676"><i class="fa fa-circle"></i> Appointment</span>
        
        <span style="color: #2cabe3"><i class="fa fa-circle"></i> New</span>
        <span style="color: #2cab4a"><i class="fa fa-circle"></i> Question Running</span>
        
    </div>
    
</div>
</div>



</div>
</div>

@stop