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
                        <div class="col-md-3">
                            <a href="{{URL::to(session('access').'covic/create')}}"><i class="fa fa-plus"></i> <span class="hide-menu">Create Contact</span></a>
                        </div>


                        <div class="col-md-6">

                            {{ Request::get('entry_date')??"Total" }} - {{ $models->total() }}

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

                                            {!! Form::select('country_from',[''=>'--Country From--']+\App\Models\Covic::countryList(),Input::old('country_from',isset($model->country_from)?$model->country_from:''), array('id' => 'country_from', 'class' => ' select2')) !!}

                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <label class="control-label " style="color: white">Entry Date</label>

                                            <input type="date" value="{{ Request::get('entry_date')??date('Y-m-d') }}" name="entry_date" class="form-control">

                                        </div>
                                    </td>
                                </tr>




                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-sm btn-info">Search</button>
                                            <button type="button" onclick="window.location.href = 'covic'; "  class="btn btn-sm btn-danger pull-right">Clear</button>
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
                        <th>Unique ID</th>
                        <th>Reporting Date</th>
                        <th> Sex</th>
                        <th> Age</th>

                        <th class="noPrint"></th>
                        </thead>
                        <tbody>
                        @foreach ($models as $model)
                            <tr>
                                <td>{!! @$model->unique_case !!}</td>

                                <td>{!! @$model->report_date !!}</td>

                                <td>{!! @$model->seeGender($model->sex) !!}</td>

                                <td>{!! @$model->age.@$model->seeAgeType($model->age_type) !!}</td>

                                <td class="noPrint">
                                    <div class="btn-group">

                                        @if(session('user')->project_id==8 && in_array(5,session('accesslist_id')) )



<a href="{{ URL::to('covid-positive/edit/'.$model->id) }}" class="btn btn-xs btn-primary"><i class="fa fa-edit"> </i> </a>
                                            <!-- <a href="{{ URL::to(session('access').'covic/'.$model->id.'/edit') }}" class="btn btn-xs btn-primary"><i class="fa fa-edit"> </i> </a> -->






                                        @endif

                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot class="noPrint">
                        <tr>
                            <td colspan="8">{!! @$models->appends(Input::except('page'))->render() !!}</td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        function deleteInfo(id, e) {
            if (confirm("Are you sure to deactive reproductive?")) {
                $.ajax({
                    url: "{{ URL::to(session('access').'reproductive') }}" + '/' + id,
                    type: 'DELETE',
                    data: {_token: "{{ csrf_token() }}"},
                    success: function (data) {
                        $(e).parent().parent().parent().remove(); //play with data
                    }
                });
            }
        }
        function statusUpdate(id, status) {
            if (confirm("Are you sure to "+ status +" reproductive?")) {
                $.ajax({
                    url: "{{ URL::to(session('access').'reproductive/status-update') }}" + '/' + id,
                    type: 'POST',
                    data: {_token: "{{ csrf_token() }}", "status":status},
                    success: function (data) {
                        window.location.href = 'reproductive';
                    }
                });
            }
        }

    </script>
@stop
