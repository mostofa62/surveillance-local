@extends('layouts/master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    {{$pageTitle}}
                </div>
                <div class="panel-body">
                    {!! Form::open(array('url' => isset($reproductive)?session('access').'reproductive/'.$reproductive->id :session('access').'reproductive','id'=>'form','method' => isset($reproductive)?'put':'post',  'enctype'=>'multipart/form-data')) !!}
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            {{--
                            <div class="form-group {!! $errors->first('surveillance_id')?'has-error':'' !!} clear">
                                <label class="control-label clear">সার্ভিল্যান্স আইডি</label>
                                {!! Form::text('surveillance_id', Input::old('surveillance_id',isset($reproductive->surveillance_id)?$reproductive->surveillance_id:''),array('class' => 'form-control','placeholder'=>'Surveillance ID')) !!}
                                @if ($errors->first('surveillance_id'))
                                    <div class="alert alert-danger">{!! $errors->first('surveillance_id') !!}</div>@endif
                            </div>
                            --}}
                            <div class="form-group {!! $errors->first('date')?'has-error':'' !!} clear">
                                <label class="control-label clear">তারিখ</label>
                                {!! Form::text('date', Input::old('date',isset($reproductive->date)?$reproductive->date:''),array('class' => 'form-control datepick', 'placeholder' => 'yyyy-mm-dd')) !!}
                                @if ($errors->first('date'))
                                    <div class="alert alert-danger">{!! $errors->first('date') !!}</div>@endif
                            </div>
                        </div>   <!-- end col-md-3 -->
                        <div class="col-md-6 col-sm-12">
                           
                            <div class="form-group {!! $errors->first('mobile_no')?'has-error':'' !!} clear">
                                <label class="control-label clear">মোবাইল নম্বর</label>
                                {!! Form::text('mobile_no', Input::old('mobile_no',isset($reproductive->mobile_no)?$reproductive->mobile_no:''),array('class' => 'form-control','placeholder'=>'Mobile no')) !!}
                                @if ($errors->first('mobile_no'))
                                    <div class="alert alert-danger">{!! $errors->first('mobile_no') !!}</div>@endif
                            </div>
                        </div>
                        <div class="col-md-12">

                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                                <a href="{{ url()->previous() }}" class="btn btn-sm btn-primary">Back</a>
                                {{  Form::hidden('previous_url',URL::previous())  }}
                            </div>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>  <!-- end panel -->
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('#area_type').change(function () {
                if($('#area_type').val()==1){
                    $('.area').parent().attr('style', 'display:none');
                    $('.thana').parent().attr('style', 'display:block');
                    $('.city').parent().attr('style', 'display:none');
                    $('.district').parent().attr('style', 'display:block');
                }else if($('#area_type').val()==2){
                    $('.area').parent().attr('style', 'display:block');
                    $('.thana').parent().attr('style', 'display:block');
                    $('.city').parent().attr('style', 'display:block');
                    $('.district').parent().attr('style', 'display:block');
                }else{
                    $('.area').parent().attr('style', 'display:none');
                    $('.thana').parent().attr('style', 'display:none');
                    $('.city').parent().attr('style', 'display:none');
                    $('.district').parent().attr('style', 'display:none');
                }
            });
            function area_type() {
                if ($('#area_type').val() == 1) {
                    $('.area').parent().attr('style', 'display:none');
                    $('.thana').parent().attr('style', 'display:block');
                    $('.city').parent().attr('style', 'display:none');
                    $('.district').parent().attr('style', 'display:block');
                } else if ($('#area_type').val() == 2) {
                    $('.area').parent().attr('style', 'display:block');
                    $('.thana').parent().attr('style', 'display:block');
                    $('.city').parent().attr('style', 'display:block');
                    $('.district').parent().attr('style', 'display:block');
                } else {
                    $('.area').parent().attr('style', 'display:none');
                    $('.thana').parent().attr('style', 'display:none');
                    $('.city').parent().attr('style', 'display:none');
                    $('.district').parent().attr('style', 'display:none');
                }
            }
            area_type();
        });
    </script>
@stop
