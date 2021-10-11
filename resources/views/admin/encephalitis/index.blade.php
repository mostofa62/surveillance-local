@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-3">Encephalitis Lists</div>
                        <div class="col-md-1 print-btn">

                        </div>
                        <div class="col-md-8 search-field">
                            <a target="_blank" href="{{ URL::to(session('access').'encephalitis/export?'.http_build_query(Input::all())) }}" class="btn btn-sm btn-info pull-right">Export</a>
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
                                            {!! Form::text('s_name', Input::old('s_name',isset($encephalitis->s_name)?$encephalitis->s_name:''), array('class' => 'form-control', 'placeholder' => 'Search by patient name')) !!}
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <label class="control-label " style="color: white">Surveillance Id</label>
                                            {!! Form::text('s_surveillance_id', Input::old('s_surveillance_id',isset($encephalitis->s_surveillance_id)?$encephalitis->s_surveillance_id:''), array('class' => 'form-control', 'placeholder' => 'Search by Surveillance ID')) !!}

                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <label class="control-label " style="color: white">Mobile No</label>
                                            {!! Form::text('s_mobile_no', Input::old('s_mobile_no',isset($encephalitis->s_mobile_no)?$encephalitis->s_mobile_no:''),array('class' => 'form-control', 'placeholder' => 'Search by mobile number')) !!}
                                        </div>
                                    </td>
                                </tr>


                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <label class="control-label " style="color: white">Gender</label>
                                            {!! Form::select('s_sex',[''=>'---Select Gender---']+\App\Common::getGenderType(),Input::old('s_sex',isset($encephalitis->s_sex)?$encephalitis->s_sex:''), array('id' => 's_sex', 'class' => 'form-control')) !!}
                                        </div>
                                    </td>
                                </tr>


                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <label class="control-label " style="color: white">Life Status</label>
                                            {!! Form::select('s_life_status', [''=>'---Select Life Status---']+\App\Common::getLifeStatus(),Input::old('s_life_status',isset($encephalitis->life_status)?$encephalitis->life_status:''), array('id' => 's_life_status', 'class' => 'form-control')) !!}
                                        </div>
                                    </td>
                                </tr>


                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-sm btn-info">Search</button>
                                            <button type="button" onclick="window.location.href = 'encephalitis'; "  class="btn btn-sm btn-danger pull-right">Clear</button>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        {{ Form::close() }}
                        </div>
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
                        <th> Age</th>
                        <th> Gender</th>
                        <th> Gaurdian Name </th>
                        <th> Date of Onset</th>
                        <th> Address</th>
                        <th> Life Status</th>
                        <th> Call Status</th>
                        <th class="noPrint"></th>
                        </thead>
                        <tbody>
                        @foreach ($encephalitiss as $encephalitis)
                            <tr>
                                <td>{!! @$encephalitis->id !!}</td>
                                <td>{!! @$encephalitis->surveillance_id !!}</td>
                                <td>{!! @$encephalitis->date !!}</td>
                                <td>{!! @$encephalitis->name !!}</td>
                                <td>{!! @$encephalitis->mobile_no !!}</td>
                                <td>{!! @$encephalitis->age !!}</td>
                                <td>{!! @\App\Common::getGenderType()[$encephalitis->sex]!!}</td>
                                <td>{!! @$encephalitis->guardian_name!!}</td>
                                <td>{!! @$encephalitis->date_of_onset!!}</td>
                                <td>{!! @$encephalitis->address!!}</td>
                                <td>{!! @\App\Common::getLifeStatus()[$encephalitis->life_status]!!}</td>
                                <td><?php if ($encephalitis->status==0) echo "<i class='fa fa-open'></i> N/A";else if ($encephalitis->status==-1) echo "<i class='fa fa-phone'></i>on call";else if ($encephalitis->status==1) echo "<i class='fa fa-check-circle'></i>done"; else if ($encephalitis->status==2) echo "<i class='fa fa-calendar'></i>Schedule"?></td>
                                <td class="noPrint">
                                    <div class="btn-group">
                                        <a href="{{ URL::to(session('access').'encephalitis/'.$encephalitis->id) }}"
                                           class="btn btn-xs btn-info"><i class="fa fa-info-circle"> </i> </a>
                                        <a href="{{ URL::to(session('access').'encephalitis/question/'.$encephalitis->id."/view") }}"
                                           class="btn btn-xs btn-info"><i class="fa fa-question"> </i> </a>
                                        <a href="{{ URL::to(session('access').'encephalitis/'.$encephalitis->id.'/edit') }}" class="btn btn-xs btn-primary"><i class="fa fa-edit"> </i> </a>
                                        <button onclick='deleteInfo({{$encephalitis->id}},this);' class="btn btn-xs btn-danger delete_button"><i class="fa  fa-trash-o"></i></button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot class="noPrint">
                        <tr>
                            <td colspan="8">{!! @$encephalitiss->appends(Input::except('page'))->render() !!}</td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        function deleteInfo(id, e) {
            if (confirm("Are you sure to deactive encephalitis?")) {
                $.ajax({
                    url: "{{ URL::to(session('access').'encephalitis') }}" + '/' + id,
                    type: 'DELETE',
                    data: {_token: "{{ csrf_token() }}"},
                    success: function (data) {
                        $(e).parent().parent().parent().remove(); //play with data
                    }
                });
            }
        }
        function statusUpdate(id, status) {
            if (confirm("Are you sure to "+ status +" encephalitis?")) {
                $.ajax({
                    url: "{{ URL::to(session('access').'encephalitis/status-update') }}" + '/' + id,
                    type: 'POST',
                    data: {_token: "{{ csrf_token() }}", "status":status},
                    success: function (data) {
                        window.location.href = 'encephalitis';
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
           mywindow.document.write('<h4 style="text-align: center">Encephalitis Lists</h4>');
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
