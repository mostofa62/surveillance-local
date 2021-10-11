@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-3">Dengue Death Lists</div>
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
                                            <label class="control-label " style="color: white">Patient Name</label>
                                            {!! Form::text('name', Input::old('name',isset($denguedeath->name)?$denguedeath->name:''), array('class' => 'form-control', 'placeholder' => 'Search by patient name')) !!}
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <label class="control-label " style="color: white">Mobile No</label>
                                            {!! Form::text('mobile_no', Input::old('mobile_no',isset($denguedeath->mobile_no)?$denguedeath->mobile_no:''),array('class' => 'form-control', 'placeholder' => 'Search by mobile number')) !!}
                                        </div>
                                    </td>
                                </tr>


                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <label class="control-label " style="color: white">Gender</label>
                                            {!! Form::select('sex',[''=>'---Select Gender---']+\App\Common::getGenderType(),Input::old('sex',isset($denguedeath->sex)?$denguedeath->sex:''), array('id' => 'sex', 'class' => 'form-control')) !!}
                                        </div>
                                    </td>
                                </tr>


                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <label class="control-label " style="color: white">Diagonosis</label>
                                            {!! Form::select('current_fever_status', [''=>'---Select Fever Status---']+\App\Common::getFeverStatus(),Input::old('current_fever_status',isset($denguedeath->current_fever_status)?$denguedeath->current_fever_status:''), array('id' => 'current_fever_status', 'class' => 'form-control')) !!}
                                        </div>
                                    </td>
                                </tr>


                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-sm btn-info">Search</button>
                                            <button type="button" onclick="window.location.href = 'denguedeath'; "  class="btn btn-sm btn-danger pull-right">Clear</button>
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
                        <th> Mobile No</th>
                        <th> Age</th>
                        <th> Gender</th>
                        <th> Date of Admission</th>
                        <th> Duration of Fever</th>
                        <th> Diagonosis</th>
                        <th> Area Type</th>
                        <th class="noPrint"></th>
                        </thead>
                        <tbody>
                        @foreach ($denguedeaths as $denguedeath)
                            <tr>
                                <td>{!! @$denguedeath->id !!}</td>
                                <td>{!! @$denguedeath->name !!}</td>
                                <td>{!! @$denguedeath->mobile_no !!}</td>
                                <td>{!! @$denguedeath->age !!}</td>
                                <td>{!! @\App\Common::getGenderType()[$denguedeath->sex]!!}</td>
                                <td>{!! @$denguedeath->date_of_admission!!}</td>
                                <td><span style="color:red">{!! @$denguedeath->duration_of_fever!!}</span> | {!! @$denguedeath->onset_of_fever!!}</td>
                                <td>{!! @\App\Common::getFeverStatus()[$denguedeath->current_fever_status]!!}</td>
                                <td>{!! @\App\Common::getAreaType()[$denguedeath->area_type]!!}</td>
                                <td class="noPrint">
                                    <div class="btn-group">
                                        <a href="{{ URL::to('admin/denguedeath/'.$denguedeath->id) }}"
                                           class="btn btn-xs btn-info"><i class="fa fa-info-circle"> </i> </a>
                                        <a href="{{ URL::to('admin/denguedeath/'.$denguedeath->id.'/edit') }}" class="btn btn-xs btn-primary"><i class="fa fa-edit"> </i> </a>
                                        <button onclick='deleteInfo({{$denguedeath->id}},this);' class="btn btn-xs btn-danger delete_button"><i class="fa  fa-trash-o"></i></button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot class="noPrint">
                        <tr>
                            <td colspan="8">{!! @$denguedeaths->appends(Input::except('page'))->render() !!}</td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        function deleteInfo(id, e) {
            if (confirm("Are you sure to deactive denguedeath?")) {
                $.ajax({
                    url: "{{ URL::to('admin/denguedeath') }}" + '/' + id,
                    type: 'DELETE',
                    data: {_token: "{{ csrf_token() }}"},
                    success: function (data) {
                        $(e).parent().parent().parent().remove(); //play with data
                    }
                });
            }
        }
        function statusUpdate(id, status) {
            if (confirm("Are you sure to "+ status +" denguedeath?")) {
                $.ajax({
                    url: "{{ URL::to('admin/denguedeath/status-update') }}" + '/' + id,
                    type: 'POST',
                    data: {_token: "{{ csrf_token() }}", "status":status},
                    success: function (data) {
                        window.location.href = 'denguedeath';
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
           mywindow.document.write('<h4 style="text-align: center">Dengue Death Lists</h4>');
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
