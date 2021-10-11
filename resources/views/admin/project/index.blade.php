@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-3">Project Lists</div>
                        <div class="col-md-1 print-btn">
                            <button class="btn btn-sm btn-info " id="print" onclick="printIt()">Print</button>
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
                                            <label class="control-label " style="color: white">Name</label>
                                            {!! Form::text('s_name', Input::old('s_name',isset($project->s_name)?$project->s_name:''), array('class' => 'form-control', 'placeholder' => 'Search by project name')) !!}
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <label class="control-label " style="color: white">Short Name</label>
                                            {!! Form::text('s_short_name', Input::old('s_short_name',isset($project->s_short_name)?$project->s_short_name:''),array('class' => 'form-control', 'placeholder' => 'Search by Short Name of project')) !!}
                                        </div>
                                    </td>
                                </tr>


                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <label class="control-label " style="color: white">Supervisor ID</label>
                                            {!! Form::select('s_supervisor_id',[''=>'---Select a Supervisor---']+\App\User::where('project_id', '!=', 0)->pluck('username', 'id')->toArray(),Input::old('s_supervisor_id',isset($project->s_supervisor_id)?$project->s_supervisor_id:''), array('id' => 's_supervisor_id', 'class' => 'form-control')) !!}
                                        </div>
                                    </td>
                                </tr>


                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-sm btn-info">Search</button>
                                            <button type="button" onclick="window.location.href = 'project'; "  class="btn btn-sm btn-danger pull-right">Clear</button>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        {{ Form::close() }}
                    </ul>
                </div>

                <div class="panel-body " id="panel-body">
                    @if(Session::has('message'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                            {{ Session::get('message') }}
                        </div>
                    @endif
                    <table class="table table-hover color-bordered-table muted-bordered-table usertable" align="center">
                        <thead>
                        <th> Id</th>
                        <th> Name</th>
                        <th> Short name</th>
                        <th> Supervisor name</th>
                        <th> Project Initiator</th>
                        <th> No of Case</th>
                        <th> No of Site</th>
                        <th class="noPrint"></th>
                        </thead>
                        <tbody>
                        @foreach ($projects as $project)
                            <tr>
                                <td>{!! @$project->id !!}</td>
                                <td>{!! @$project->name !!}</td>
                                <td>{!! @$project->short_name !!}</td>
                                <td>{!! @$project->supervisor->username !!}</td>
                                <td>{!! @$project->user->username !!}</td>
                                <td>{!! @$project->noofcase !!}</td>
                                <td>{!! @count(json_decode($project->site_ids)) !!}</td>
                                <td class="noPrint">
                                    <div class="btn-group">
                                        <a href="{{ URL::to(session('access').'project/'.$project->id) }}"
                                           class="btn btn-xs btn-info"><i class="fa fa-info-circle"> </i> </a>
                                            <a href="{{ URL::to(session('access').'project/'.$project->id.'/edit') }}"
                                               class="btn btn-xs btn-primary"><i class="fa fa-edit"> </i> </a>
                                            <button onclick='deleteInfo({{$project->id}},this);'
                                                    class="btn btn-xs btn-danger delete_button"><i
                                                        class="fa  fa-trash-o"></i></button>

                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot class="noPrint">
                        <tr>
                            <td colspan="6">
                                {!! @$projects->appends(Input::except('page'))->render() !!}
                            </td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>  <!-- end panel -->
        </div>
    </div>
    
    <script>
        function deleteInfo(id, e) {
            if(confirm("Are you sure to delete it?")) {
                $.ajax({
                    url: "{{ URL::to(session('access').'project') }}" + '/' + id,
                    type: 'DELETE',
                    data: {_token: "{{ csrf_token() }}"},
                    success: function (data) {
                        $(e).parent().parent().parent().remove(); //play with data
                    }
                });
            }
        }
        //print
        function printIt() {
           var mywindow = window.open('', 'PRINT');
           mywindow.document.write('<html><head><title></title>');
           mywindow.document.write('<style>table{border-collapse: collapse;} th,td{border: 1px solid #a3a3c2; padding: 5px; text-align: center;} .noPrint{display: none;} .table{font-size: 11px;} body{margin-top: 1.6in;}</style></head><body >');
           mywindow.document.write('<h4 style="text-align: center">Project Lists</h4>');
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
