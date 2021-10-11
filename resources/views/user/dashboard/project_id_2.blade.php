<link href="{{URL::to('resources/assets/ampleadmin/plugins/bower_components/typeahead.js-master/dist/typehead-min.css')}}" rel="stylesheet">

<div class="row panel-body">
    {!! Form::open(array('id'=>'form','method' => 'get',  'enctype'=>'multipart/form-data')) !!}
    <div class="col-md-12 col-sm-12">
        <div class="form-group">
            <div class="col-md-3">
                {!! Form::text('start_date', Input::old('start_date',isset($question->start_date)?$question->start_date:date('Y/m/d')),array('id'=>'start_date','class' => 'form-control datepick','placeholder'=>'Start Date')) !!}
            </div>
            <div class="col-md-3">
                {!! Form::text('end_date', Input::old('end_date',isset($question->end_date)?$question->end_date:date('Y/m/d')),array('id'=>'end_date','class' => 'form-control datepick','placeholder'=>'end Date')) !!}
            </div>
            <input type="submit" class="submit btn btn-primary"/>
            <a href="{{url(session('access').'dashboard')}}" class="btn btn-info">Clear</a>
        </div>
    </div>
    {{ Form::close() }}

    <div class="col-md-12 col-lg-12 col-xs-12">
        <div class="white-box">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <td>Username</td>
                        <td>In Call</td>
                        <td>Complete Call</td>
                        <td>Re-Schedule Call</td>
                        <td style="border-right: 1px solid #4fa828">Total</td>
                        <td style="border-right: 1px solid #4fa828">Remain Call</td>

                        <td>Complete Call</td>
                        <td>InComplete & Re-Schedule</td>
                        <td>InComplete & Refuse</td>
                        <td>InComplete & Not Allow</td>
                        <td style="border-right: 1px solid #4fa828">Total</td>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $noncall=0;
                        $incall=0;
                        $done_total=0;
                        $schedule_total=0;
                        $subtotal=0;
                        $remain_total=0;
                        $complete_total=0;
                        $incomplete_total=0;
                        $incompleteRefuse_total=0;
                        $incompleteNotallow_total=0;
                        $intotal=0;
                    @endphp
                    @foreach($users as $key=>$user)
                    <tr>
                        <td><a href="{{url(session('access').'log/'.$user)}}" target="_blank">{{@$user}}</a></td>
                        @if(isset($encephality[$key]->incall_total))
                        <td>{{@$encephality[$key]->incall_total}}
                            @php @$incall+=$encephality[$key]->incall_total @endphp
                        </td>
                        <td>{{@$encephality[$key]->done_total}}
                            @php @$done_total+=$encephality[$key]->done_total @endphp
                        </td>
                        <td>{{@$encephality[$key]->schedule_total}}
                            @php @$schedule_total+=$encephality[$key]->schedule_total @endphp
                        </td>
                        <td style="border-right: 1px solid #4fa828">
                            <strong>{{@$encephality[$key]->incall_total+@$encephality[$key]->done_total+@$encephality[$key]->schedule_total }}</strong>
                            @php @$subtotal+=$encephality[$key]->incall_total+@$encephality[$key]->done_total+@$encephality[$key]->schedule_total @endphp
                        </td>
                        <td style="border-right: 1px solid #4fa828">
                            <strong>{{@$encephality[$key]->remain_total }}</strong>
                            @php @$remain_total+=$encephality[$key]->remain_total @endphp
                        </td>
                        @else
                            <td></td>
                            <td></td>
                            <td></td>
                            <td style="border-right: 1px solid #4fa828"></td>
                            <td style="border-right: 1px solid #4fa828"></td>
                        @endif
                        @if(isset($question_details[$key]->complete_total))

                        <td>
                            {{@$question_details[$key]->complete_total}}
                            @php @$complete_total+=$question_details[$key]->complete_total @endphp
                        </td>
                        <td>
                            {{@$question_details[$key]->incomplete_total}}
                            @php @$incomplete_total+=$question_details[$key]->incomplete_total @endphp
                        </td>
                        <td>
                            {{@$question_details[$key]->incompleteRefuse_total}}
                            @php @$incompleteRefuse_total+=$question_details[$key]->incompleteRefuse_total @endphp
                        </td>
                        <td>
                            {{@$question_details[$key]->incompleteNotallow_total}}
                            @php @$incompleteNotallow_total+=$question_details[$key]->incompleteNotallow_total @endphp
                        </td>
                        <td style="border-right: 1px solid #4fa828">
                            <strong>{{@$question_details[$key]->complete_total+@$question_details[$key]->incomplete_total+@$question_details[$key]->incompleteRefuse_total+$question_details[$key]->incompleteNotallow_total}}</strong>
                            @php @$intotal+= $question_details[$key]->complete_total+@$question_details[$key]->incomplete_total+@$question_details[$key]->incompleteRefuse_total+$question_details[$key]->incompleteNotallow_total @endphp
                        </td>

                        @else
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td style="border-right: 1px solid #4fa828"></td>
                        @endif
                    </tr>
                    @endforeach
                <tr>
                    <td>Total:</td>
                    <td>{{@$incall}}</td>
                    <td>{{@$done_total}}</td>
                    <td>{{@$schedule_total}}</td>
                    <td style="border-right: 1px solid #4fa828"><strong>{{@$subtotal}}</strong></td>
                    <td style="border-right: 1px solid #4fa828"><strong>

                            @foreach($encephality as $en)
                              @php  $noncall+=$en->remain_total; @endphp
                            @endforeach
                            {{ @$noncall}} ({{$noncall-$remain_total}})</strong></td>
                    <td>{{@$complete_total}}</td>
                    <td>{{@$incomplete_total}}</td>
                    <td>{{@$incompleteRefuse_total}}</td>
                    <td>{{@$incompleteNotallow_total}}</td>
                    <td style="border-right: 1px solid #4fa828"><strong>{{@$intotal}}</strong></td>
                </tr>
                </tbody>

            </table>
        </div>
    </div>

</div>
</script>