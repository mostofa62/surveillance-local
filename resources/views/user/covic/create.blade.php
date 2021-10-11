@extends('layouts/master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    {{$pageTitle}}
                </div>
                <div class="panel-body">
                    {!! Form::open(array('url' => isset($model)?session('access').'covic/'.$model->id :session('access').'covic','id'=>'form','method' => isset($model)?'put':'post',  'enctype'=>'multipart/form-data')) !!}
                    <div class="row">

                        <div class="col-md-6 col-sm-12">
                           
                            <div class="form-group {!! $errors->first('name')?'has-error':'' !!} clear">
                                <label class="control-label clear">Name</label>
                                {!! Form::text('name', Input::old('name',isset($model->name)?$model->name:''),array('class' => 'form-control','placeholder'=>'Name','autofocus'=>true)) !!}
                                @if ($errors->first('name'))
                                    <div class="alert alert-danger">{!! $errors->first('name') !!}</div>@endif
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-12">
                         <div class="form-group {!! $errors->first('sex')?'has-error':'' !!} clear" >
                            <label class="control-label clear">Gender</label>
                            
                                {!! Form::select('sex',[''=>'--- Gender ---']+\App\Models\Covic::getGender(),Input::old('sex',isset($model->sex)?$model->sex:''), array('id' => 'sex', 'class' => 'form-control')) !!}
                                @if($errors->first('sex'))
                                <div class="alert alert-danger">{!! $errors->first('sex') !!}</div>@endif
                            
                        </div>

                    </div>





                        <div class="col-md-6 col-sm-12">
                           
                            <div class="form-group {!! $errors->first('age')?'has-error':'' !!} clear">
                                <label class="control-label clear">Age</label>
                                {!! Form::number('age', Input::old('age',isset($model->age)?$model->age:''),array('class' => 'form-control','placeholder'=>'Age', 'min'=>1)) !!}
                                @if ($errors->first('age'))
                                    <div class="alert alert-danger">{!! $errors->first('age') !!}</div>@endif
                            </div>
                        </div>


                        <div class="col-md-6 col-sm-12">
                         <div class="form-group {!! $errors->first('age_type')?'has-error':'' !!} clear" >
                            <label class="control-label clear">Age Type</label>
                            
                                {!! Form::select('age_type',[''=>'--- Age Type ---']+\App\Models\Covic::getAgeType(),Input::old('age_type',isset($model->age_type)?$model->age_type:1), array('id' => 'age_type', 'class' => 'form-control')) !!}
                                @if($errors->first('age_type'))
                                <div class="alert alert-danger">{!! $errors->first('age_type') !!}</div>@endif
                            
                        </div>

                    </div>






                        <div class="col-md-6 col-sm-12">
                            
                            <div class="form-group {!! $errors->first('arrival_date')?'has-error':'' !!} clear">
                                <label class="control-label clear">Arrival Date</label>
                                <input type="date" value="{{ old('arrival_date',isset($model->arrival_date)?$model->arrival_date:date('Y-m-d')) }}" name="arrival_date" class="form-control">
                                {{-- Form::date('arrival_date', Input::old('arrival_date',isset($model->arrival_date)?$model->arrival_date:date('d/m/Y')),array('class' => 'form-control', 'placeholder' => 'yyyy-mm-dd')) --}}
                                @if ($errors->first('arrival_date'))
                                    <div class="alert alert-danger">{!! $errors->first('arrival_date') !!}</div>@endif
                            </div>
                        </div>   <!-- end col-md-3 -->
                        <div class="col-md-6 col-sm-12">
                           
                            <div class="form-group {!! $errors->first('mobile_no')?'has-error':'' !!} clear">
                                <label class="control-label clear">Mobile Number</label>
                                {!! Form::text('mobile_no', Input::old('mobile_no',isset($model->mobile_no)?$model->mobile_no:''),array('class' => 'form-control','placeholder'=>'Mobile no')) !!}
                                @if ($errors->first('mobile_no'))
                                    <div class="alert alert-danger">{!! $errors->first('mobile_no') !!}</div>@endif
                            </div>
                        </div>


                        <div class="col-md-6 col-sm-12">
                           
                            <div class="form-group {!! $errors->first('passport_no')?'has-error':'' !!} clear">
                                <label class="control-label clear">Passport Number</label>
                                {!! Form::text('passport_no', Input::old('passport_no',isset($model->passport_no)?$model->passport_no:''),array('class' => 'form-control','placeholder'=>'Passport no')) !!}
                                @if ($errors->first('passport_no'))
                                    <div class="alert alert-danger">{!! $errors->first('passport_no') !!}</div>@endif
                            </div>
                        </div>


                        <div class="col-md-6 col-sm-12">
                           
                            <div class="form-group {!! $errors->first('flight_no')?'has-error':'' !!} clear">
                                <label class="control-label clear">Flight Number</label>
                                {!! Form::text('flight_no', Input::old('flight_no',isset($model->flight_no)?$model->flight_no:''),array('class' => 'form-control','placeholder'=>'Flight no')) !!}
                                @if ($errors->first('flight_no'))
                                    <div class="alert alert-danger">{!! $errors->first('flight_no') !!}</div>@endif
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-12">
                           
                            <div class="form-group {!! $errors->first('seat_no')?'has-error':'' !!} clear">
                                <label class="control-label clear">Seat Number</label>
                                {!! Form::text('seat_no', Input::old('seat_no',isset($model->seat_no)?$model->seat_no:''),array('class' => 'form-control','placeholder'=>'Seat no')) !!}
                                @if ($errors->first('seat_no'))
                                    <div class="alert alert-danger">{!! $errors->first('seat_no') !!}</div>@endif
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-12">
                         <div class="form-group {!! $errors->first('nationality')?'has-error':'' !!} clear" >
                            <label class="control-label clear">Nationality</label>
                            
                                {!! Form::select('nationality',[''=>'--- Nationality ---']+\App\Models\Covic::countryList(),Input::old('nationality',isset($model->nationality)?$model->nationality:Request::cookie('nationality')), array('id' => 'nationality', 'class' => 'form-control select2')) !!}
                                @if($errors->first('nationality'))
                                <div class="alert alert-danger">{!! $errors->first('nationality') !!}</div>@endif
                            
                        </div>

                    </div>


                    <div class="col-md-6 col-sm-12">
                         <div class="form-group {!! $errors->first('country_from')?'has-error':'' !!} clear" >
                            <label class="control-label clear">Country From</label>
                            
                                {!! Form::select('country_from',[''=>'--- Country From ---']+\App\Models\Covic::countryList(),Input::old('country_from',isset($model->country_from)?$model->country_from:''), array('id' => 'country_from', 'class' => 'form-control select2')) !!}
                                @if($errors->first('country_from'))
                                <div class="alert alert-danger">{!! $errors->first('country_from') !!}</div>@endif
                            
                        </div>

                    </div>

                        <div class="col-md-12">

                            <div class="form-group text-right">
                                <div class="form-group text-right">
                                <button type="submit" class="btn btn-sm btn-success">Submit</button>

                            </div>
                            </div>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>  <!-- end panel -->
        </div>
    </div>

    <style type="text/css">
        .btn.btn-sm.btn-success:focus {
            background-color:#C70039;
        }

        .select_focus{
            border: 1px solid rgb(237, 0, 0);
            box-shadow:rgba(0, 0, 0, 0) 0px 1px 1px 0px inset,rgb(237, 0, 0) 0px 0px 8px 0px;
        }
    </style>

    <script type="text/javascript">
        
        $(document).on("focusin", ".select2", function (e) {
            //console.log($(this));
            $(this).addClass('select_focus');
        });

        $(document).on("focusout", ".select2", function (e) {
            //console.log($(this));
            $(this).removeClass('select_focus');
        });
        
    </script>


    
@stop
