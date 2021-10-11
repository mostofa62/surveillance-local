@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-3">
                            {{$pageTitle}}
                        </div>
                        <div class="col-md-1 print-btn">

                        </div>
                        <div class="col-md-8 search-field">
                            @if(session('user')->project_id==1 &&in_array(3,session('accesslist_id')))
                                <a target="_blank" href="{{ URL::to(session('access').'poultry/export?'.http_build_query(Input::all())) }}" class="btn btn-sm btn-info pull-right">Export</a>
                            @endif
                            <button class="btn btn-sm btn-info pull-right" id="print" onclick="printIt()">Print</button>
                        </div>
                    </div>
                </div>

                <a id="menu-toggle1" href="#" class="btn btn-primary btn-lg text-horizontal toggle  " style="color: white" ><i class="fa  fa-search fa-fw"></i><br>S<br>e<br>a<br>r<br>c<br>h</a>
                <div id="sidebar-wrapper1" style="height: 50%;text-decoration: none;">
                    <ul class="sidebar-nav1">
                        <a id="menu-close" href="#" class="btn btn-lg pull-right toggle"><i class="glyphicon glyphicon-remove"></i></a>
                        <div class="col-md-12 search-field" style="">
                            {!! Form::open(array('id'=>'form','method' => 'get',  'enctype'=>'multipart/form-data')) !!}
                            <table class="search_table" style="margin: 0 auto;">
                                <tbody>

                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <label class="control-label " style="color: white">Patient Name</label>
                                            {!! Form::text('s_name', Input::old('s_name',isset($poultry->name)?$poultry->name:''), array('class' => 'form-control', 'placeholder' => 'Search by patient name')) !!}
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <label class="control-label " style="color: white">Mobile No</label>
                                            {!! Form::text('s_mobile_no', Input::old('s_mobile_no',isset($poultry->mobile_no)?$poultry->mobile_no:''),array('class' => 'form-control', 'placeholder' => 'Search by mobile number')) !!}
                                        </div>
                                    </td>
                                </tr>


                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-sm btn-info">Search</button>
                                            <button type="button" onclick="window.location.href = 'poultry'; "  class="btn btn-sm btn-danger pull-right">Clear</button>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        {{ Form::close() }}
                    </ul>
                </div>


                <div class="panel-body" id="panel-body">
                    @if(Session::has('message'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                            {{ Session::get('message') }}
                        </div>
                    @endif
                    <table class="table table-hover color-bordered-table muted-bordered-table usertable" align="center">
                        <thead>
                        <th>Id</th>
                        <th> Surveillance Id</th>
                        <th> Date</th>
                        <th> Name</th>
                        <th> Mobile No</th>
                        <th> Call Status</th>
                        <th class="noPrint"></th>
                        </thead>
                        <tbody>
                        @foreach ($poultrys as $poultry)
                            <tr>
                                <td>{!! @$poultry->id !!}</td>
                                <td>{!! @$poultry->surveillance_id !!}</td>
                                <td>{!! @$poultry->date !!}</td>
                                <td>{!! @$poultry->name !!}</td>
                                <td>{!! @$poultry->mobile_no !!}</td>
                                <td><?php if ($poultry->status==0) echo "<i class='fa fa-open'></i> N/A";else if ($poultry->status==-1) echo "<i class='fa fa-phone'></i>on call";else if ($poultry->status==1) echo "<i class='fa fa-check-circle'></i>done"; else if ($poultry->no_of_call<4 && $poultry->status==2) echo "<i class='fa fa-calendar'></i>Schedule";else if ($poultry->no_of_call>3 && $poultry->status==2) echo "<i class='fa fa-calendar'></i>Unreachable";else if ($poultry->status==3) echo "<i class='fa fa-calendar'></i>Unreachable"?></td>
                                <td class="noPrint">
                                    <div class="btn-group">
                                        <a href="{{ URL::to(session('access').'poultry/'.$poultry->id) }}"
                                           class="btn btn-xs btn-info"><i class="fa fa-info-circle"> </i> </a>
                                        <a href="{{ URL::to(session('access').'poultry/question/'.$poultry->id."/view") }}"
                                           class="btn btn-xs btn-info"><i class="fa fa-question"> </i> </a>
                                        <a href="{{ URL::to(session('access').'poultry/'.$poultry->id.'/edit') }}" class="btn btn-xs btn-primary"><i class="fa fa-edit"> </i> </a>
                                        <button onclick='deleteInfo({{$poultry->id}},this);' class="btn btn-xs btn-danger delete_button"><i class="fa  fa-trash-o"></i></button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot class="noPrint">
                        <tr>
                            <td colspan="8">{!! @$poultrys->appends(Input::except('page'))->render() !!}</td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        function deleteInfo(id, e) {
            if (confirm("Are you sure to deactive poultry?")) {
                $.ajax({
                    url: "{{ URL::to(session('access').'poultry') }}" + '/' + id,
                    type: 'DELETE',
                    data: {_token: "{{ csrf_token() }}"},
                    success: function (data) {
                        $(e).parent().parent().parent().remove(); //play with data
                    }
                });
            }
        }
        function statusUpdate(id, status) {
            if (confirm("Are you sure to "+ status +" poultry?")) {
                $.ajax({
                    url: "{{ URL::to(session('access').'poultry/status-update') }}" + '/' + id,
                    type: 'POST',
                    data: {_token: "{{ csrf_token() }}", "status":status},
                    success: function (data) {
                        window.location.href = 'poultry';
                    }
                });
            }
        }
        //print
        function printIt() {
        //         var mywindow = window.open('', 'PRINT', 'height=800,width=900');
           var mywindow = window.open('', 'PRINT');
           mywindow.document.write('<html><head><title></title>');
           mywindow.document.write('<style>table{border-collapse: collapse;} th,td{border: 1px solid #a3a3c2; padding: 5px; text-align: center;} .noPrint{display: none;} .table{font-size: 11px;} body{margin-top: 1.6in;}</style></head><body >');
           mywindow.document.write('<h4 style="text-align: center">Poultry Contact Lists</h4>');
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
