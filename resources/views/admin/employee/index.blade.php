@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-3">Employee Lists</div>
                        <div class="col-md-1 print-btn">

                        </div>
                        <div class="col-md-8 search-field">
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
                                            <label class="control-label " style="color: white">Employee Name</label>
                                            {!! Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'Search by Emaployee name')) !!}
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <label class="control-label " style="color: white">Email</label>
                                            {!! Form::text('email', null, array('class' => 'form-control', 'placeholder' => 'Search by Email')) !!}
                                        </div>
                                    </td>
                                </tr>


                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <label class="control-label " style="color: white">Phone</label>
                                            {!! Form::text('phone', null, array('class' => 'form-control', 'placeholder' => 'Search by Phone Number')) !!}
                                        </div>
                                    </td>
                                </tr>


                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <label class="control-label " style="color: white">Department</label>
                                            {!! Form::select('dept',array(''=>'Select Department','HR'=>'HR','Accounts'=>'Accounts','Procurement'=>'Procurement'),Input::old('dept',isset($employee->dept)?$employee->dept:''), array('id' => 'dept', 'class' => 'form-control')) !!}
                                        </div>
                                    </td>
                                </tr>


                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-sm btn-info">Search</button>
                                            <button type="button" onclick="window.location.href = 'employee'; "  class="btn btn-sm btn-danger pull-right">Clear</button>
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
                        <th> Name</th>
                        <th> User ID</th>
                        <th> Email</th>
                        <th> Phone Number</th>
                        <th> Gender</th>
                        <th> Designation, Department</th>
                        <th> status</th>
                        <th class="noPrint"></th>
                        </thead>
                        <tbody>
                        @foreach ($employees as $employee)
                            <tr>
                                <td>{!! @$employee->id !!}</td>
                                <td>{!! @$employee->name !!}</td>
                                <td>{!! @$employee->user->username !!}</td>
                                <td>{!! @$employee->email !!}</td>
                                <td>{!! @$employee->mobile !!}</td>
                                <td>{!! @$employee->gender !!}</td>
                                <td>{!! @$employee->designation .", ". @$employee->dept !!}</td>
                                <td>{!! isset($employee->user->status)&& $employee->user->status == 1 ? '<i class="fa fa-circle text-success"></i>' : '<i class="fa fa-circle text-danger"></i>'!!}</td>
                                <td class="noPrint">
                                    <div class="btn-group">
                                        <a href="{{ URL::to(session('access').'employee/'.$employee->id) }}"
                                           class="btn btn-xs btn-info"><i class="fa fa-info-circle"> </i> </a>
                                        <a href="{{ URL::to(session('access').'employee/'.$employee->id.'/edit') }}" class="btn btn-xs btn-primary"><i class="fa fa-edit"> </i> </a>
<!--                                        <button onclick='deleteInfo({{$employee->id}},this);' class="btn btn-xs btn-danger delete_button"><i class="fa  fa-trash-o"></i></button>-->
                                        @if($employee->user->status == 1)
                                            <button onclick='statusUpdate({{$employee->id}},"deactive");' class="btn btn-xs btn-success"><i class="fa fa-ban"></i></button>
                                        @else
                                            <button onclick='statusUpdate({{$employee->id}},"active");' class="btn btn-xs btn-danger"><i class="fa fa-check-square-o"></i></button>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot class="noPrint">
                        <tr>
                            <td colspan="8">{!! @$employees->appends(Input::except('page'))->render() !!}</td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        function deleteInfo(id, e) {
            if (confirm("Are you sure to deactive employee?")) {
                $.ajax({
                    url: "{{ URL::to(session('access').'employee') }}" + '/' + id,
                    type: 'DELETE',
                    data: {_token: "{{ csrf_token() }}"},
                    success: function (data) {
                        $(e).parent().parent().parent().remove(); //play with data
                    }
                });
            }
        }
        function statusUpdate(id, status) {
            if (confirm("Are you sure to "+ status +" employee?")) {
                $.ajax({
                    url: "{{ URL::to(session('access').'employee/status-update') }}" + '/' + id,
                    type: 'POST',
                    data: {_token: "{{ csrf_token() }}", "status":status},
                    success: function (data) {
                        window.location.href = 'employee';
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
           mywindow.document.write('<h4 style="text-align: center">Employee Lists</h4>');
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
