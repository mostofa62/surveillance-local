@extends('layouts/master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-8">
                            {{$pageTitle}}
                        </div>
                        <div class="col-md-1 print-btn">
                            <button class="btn btn-sm btn-info" id="print" onclick="printIt()">Print</button>
                        </div>
                    </div>
                </div>
                <div class="panel-body" id="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <table class="table table-hover table-bordered" align="center">
                                <tr>
                                    <th>Site Name:</th>
                                    <td><span>{{@$info->name}}</span></td>
                                </tr>
                                <tr>
                                    <th>Short name:</th>
                                    <td><span>{{@$info->short_name}}</span></td>
                                </tr>
                                <tr>
                                    <th>Type of Hospital:</th>
                                    <td><span>{{@\App\Common::getHospitalType()[$info->type]}}</span></td>
                                </tr>
                                <tr>
                                    <th>Site Initiator:</th>
                                    <td><span>{{@$info->user->username}}</span></td>
                                </tr>
                                <tr>
                                    <th>No Of Project:</th>
                                    <td><span>{{@$info->noofproject}}</span></td>
                                </tr>
                                <tr>
                                    <th>No Of User:</th>
                                    <td><span>{{@$info->noofuser}}</span></td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <table class="table table-hover table-bordered" align="center">
                                <tr>
                                    <th>Employee name</th>
                                    <th>Access type</th>
                                </tr>
                                @foreach($info->employeeList as $user)
                                    <tr>
                                        <td>{{@$user->username}}</td>
                                        <td>{{@$string = implode('|', DB::table('accesslists')->whereIn('id', [implode(',', json_decode(@$user->accesslist_id))])->pluck('name','name')->toArray())}}</td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                        <div class="col-md-12 noPrint">
                            <div class="form-group ">
                                <a href="{{ url()->previous() }}" class="btn btn-sm btn-primary">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        //print
        function printIt() {
           var mywindow = window.open('', 'PRINT');
           mywindow.document.write('<html><head><title></title>');
           mywindow.document.write('<style>.noPrint{display: none;} table{border-collapse: collapse;} th,td{border: 1px solid #a3a3c2; padding: 5px; text-align: center;} .table{font-size: 11px;} body{margin-top: 1.6in;}</style></head><body >');
           mywindow.document.write('<h4 style="text-align: center">Site Details</h4>');
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
