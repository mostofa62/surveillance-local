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
                    <td>In Call</td>
                    <td><strong>{{@$poultry->incall_total}}</strong>
                    </td>
                    <td>Complete Call</td>
                    <td><strong>{{@$poultry->done_total}}</strong>
                    </td>
                    <td>Re-Schedule Call</td>
                    <td><strong>{{@$poultry->schedule_total}}</strong>
                    </td>
                    <td>Unreachable</td>
                    <td><strong>{{@$poultry->unreachable_total}}</strong>
                    </td>
                    <td >Total</td>
                    <td >
                        <strong>{{@$poultry->incall_total+@$poultry->done_total+@$poultry->schedule_total+$poultry->unreachable_total }}</strong>
                    </td>
                    <td >Remain Call</td>
                    <td >
                        <strong>{{@$poultry->remain_total }}</strong>
                        @php @$remain_total+=$poultry->remain_total @endphp
                    </td>
                </tr>
                <tr>
                    <td>Grameen (017+013)</td>
                    <td><strong>{{@$poultry->grameen_1}}+{{@$poultry->grameen_2}}={{@$poultry->grameen_1+@$poultry->grameen_2}}</strong>
                    </td>
                    <td>BanglaLink (019+014)</td>
                    <td><strong>{{@$poultry->banglalink_1}}+{{@$poultry->banglalink_2}}={{@$poultry->banglalink_1+@$poultry->banglalink_2}}</strong>
                    </td>
                    <td>Robi|Airtel (018+016)</td>
                    <td><strong>{{@$poultry->robi}}+{{@$poultry->airtel}}={{@$poultry->robi+@$poultry->airtel}}</strong>
                    </td>
                    <td>Teletalk (015)</td>
                    <td><strong>{{@$poultry->teletalk}}</strong>
                    </td>
                    <td>Male</td>
                    <td>
                        <strong>{{@$poultry->male}}</strong>
                    </td>
                    <td>Female</td>
                    <td>
                        <strong>{{@$poultry->female }}</strong>
                    </td>
                </tr>
                <tr>
                    <td>Username</td>

                    <td>Complete Call</td>
                    <td>InComplete & Re-Schedule</td>
                    <td>InComplete & Refuse</td>
                    <td>InComplete & Not Allow</td>
                    <td style="border-right: 1px solid #4fa828">Total</td>


                    <td>Not Allow (Age)</td>
                    <td>Not Allow (City Corporation Area)</td>
                    <td style="border-right: 1px solid #4fa828">Not Allow (Year of living)</td>
                    <td>Consent Deny</td>
                    <td>Consent Agreed</td>
                    <td></td>
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
                    $notAllowAge=0;
                    $notAllowCity=0;
                    $notAllowYearCity=0;
                    $not_agreed=0;
                    $agreed=0;
                @endphp
                @foreach($users as $key=>$user)
                    <tr>
                        <td><a href="{{url(session('access').'log/'.$user)}}" target="_blank">{{@$user}}</a></td>

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

                            <td>{{@$question_details[$key]->not_allow_age}}
                                @php @$notAllowAge+=$question_details[$key]->not_allow_age @endphp
                            </td>
                            <td>{{@$question_details[$key]->not_allow_city}}
                                @php @$notAllowCity+=$question_details[$key]->not_allow_city @endphp
                            </td>
                            <td style="border-right: 1px solid #4fa828">{{@$question_details[$key]->not_allow_year_city}}
                                @php @$notAllowYearCity+=$question_details[$key]->not_allow_year_city @endphp
                            </td>
                            <td>{{@$question_details[$key]->not_agreed}}
                                @php @$not_agreed+=$question_details[$key]->not_agreed @endphp
                            </td>
                            <td>{{@$question_details[$key]->agreed}}
                                @php @$agreed+=$question_details[$key]->agreed @endphp
                            </td>
                            <td></td>
                        @else
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td style="border-right: 1px solid #4fa828"></td>
                            <td></td>
                            <td></td>
                            <td style="border-right: 1px solid #4fa828"></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        @endif
                    </tr>
                @endforeach
                <tr>
                    <td>Total:</td>

                    <td>{{@$complete_total}}</td>
                    <td>{{@$incomplete_total}}</td>
                    <td>{{@$incompleteRefuse_total}}</td>
                    <td>{{@$incompleteNotallow_total}}</td>
                    <td style="border-right: 1px solid #4fa828"><strong>{{@$intotal}}</strong></td>
                    <td>{{@$notAllowAge}}</td>
                    <td>{{@$notAllowCity}}</td>
                    <td style="border-right: 1px solid #4fa828">{{@$notAllowYearCity}}</td>
                    <td>{{@$not_agreed}}</td>
                    <td>{{@$agreed}}</td>
                    <td></td>
                </tr>
                </tbody>

            </table>
        </div>
    </div>

</div>
</script>