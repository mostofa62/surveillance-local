@extends('layouts/master')
@section('content')

    <!-- Typehead CSS -->
    <link href="{{URL::to('resources/assets/ampleadmin/plugins/bower_components/typeahead.js-master/dist/typehead-min.css')}}" rel="stylesheet">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    {{$pageTitle}}
                </div>
                <div class="panel-body">
                    @if(Session::has('message'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                            {{ Session::get('message') }}
                        </div>
                    @endif
                    {!! Form::open(array('url' => isset($dengue)?session('access').'dengue/'.$dengue->id :session('access').'dengue','id'=>'form','method' => isset($dengue)?'put':'post',  'enctype'=>'multipart/form-data')) !!}
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group {!! $errors->first('site_id')?'has-error':'' !!} clear">
                                <label class="control-label clear">Hospital</label>
                                {!! Form::select('site_id', [''=>'---Select Hospital---']+\App\Site::where('id','>', 12)->pluck('name', 'id')->toArray()+['7777'=>'Others'],Input::old('site_id',isset($dengue->site_id)?$dengue->site_id:''), array('id' => 'site_id', 'class' => 'form-control select2')) !!}
                                {!! Form::text('site_name', Input::old('site_name',isset($dengue->site_name)?$dengue->site_name:''),array('id'=>'site_name','class' => 'form-control', 'disabled'=>'disabled')) !!}
                            @if ($errors->first('site_id'))
                                    <div class="alert alert-danger">{!! $errors->first('site_id') !!}</div>@endif
                            </div>
                            <div class="form-group {!! $errors->first('name')?'has-error':'' !!} clear">
                                <label class="control-label clear">Patient Name</label>
                                {!! Form::text('name', Input::old('name',isset($dengue->name)?$dengue->name:''),array('class' => 'form-control')) !!}
                                @if ($errors->first('name'))
                                    <div class="alert alert-danger">{!! $errors->first('name') !!}</div>@endif
                            </div>
                            <div class="form-group {!! $errors->first('age')?'has-error':'' !!} clear">
                                <label class="control-label clear">Patient Age</label>
                                {!! Form::number('age', Input::old('age',isset($dengue->age)?$dengue->age:''),array('min'=>0, 'class' => 'form-control')) !!}
                                @if ($errors->first('age'))
                                    <div class="alert alert-danger">{!! $errors->first('age') !!}</div>@endif
                            </div>
                            <div class="form-group {!! $errors->first('mobile_no')?'has-error':'' !!} clear">
                                <label class="control-label clear">Patient Mobile</label>
                                {!! Form::number('mobile_no', Input::old('mobile_no',isset($dengue->mobile_no)?$dengue->mobile_no:''),array('class' => 'form-control')) !!}
                                @if ($errors->first('mobile_no'))
                                    <div class="alert alert-danger">{!! $errors->first('mobile_no') !!}</div>@endif
                            </div>
                            <div class="form-group {!! $errors->first('sex')?'has-error':'' !!} clear">
                                <label class="control-label clear">Patient Gender</label><br>
                                {!! @App\Common::radioButtonGenerate(\App\Common::getDengueGenderType(), 'sex', 0, $dengue->sex, true) !!}
                                @if ($errors->first('sex'))
                                    <div class="alert alert-danger">{!! $errors->first('sex') !!}</div>@endif
                            </div>
                            <div class="form-group  {!! $errors->first('area')?'has-error':'' !!} ">
                                <label class="control-label clear"> Area</label>
                                <div class="the-basics-area">
                                    {!! Form::text('area', Input::old('area',isset($dengue->area)?$dengue->area:''),array('id'=>'area','class' => 'typeahead form-control','placeholder'=>'area name')) !!}
                                </div>
                                @if ($errors->first('area'))
                                    <div class="alert alert-danger">{!! $errors->first('area') !!}</div>@endif
                            </div>
                            <div class="form-group  {!! $errors->first('address')?'has-error':'' !!} ">
                                <label class="control-label clear">Address</label>
                                {!! Form::text('address', Input::old('address',isset($dengue->address)?$dengue->address:''),array('id'=>'address','class' => 'form-control address')) !!}
                                @if ($errors->first('address'))
                                    <div class="alert alert-danger">{!! $errors->first('address') !!}</div>@endif
                            </div>
                            <div class="form-group {!! $errors->first('date_of_admission')?'has-error':'' !!} clear">
                                <label class="control-label clear">Date Of Admission</label>
                                {!! Form::text('date_of_admission', Input::old('date_of_admission',isset($dengue->date_of_admission)?$dengue->date_of_admission:''),array('class' => 'form-control datepick', 'placeholder' => 'yyyy-mm-dd')) !!}
                                @if ($errors->first('date_of_admission'))
                                    <div class="alert alert-danger">{!! $errors->first('date_of_admission') !!}</div>@endif
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group  {!! $errors->first('lt_ns1')?'has-error':'' !!} ">
                                <label class="control-label clear"> Lab Tests(NS1)</label><br>
                                {!! @App\Common::radioButtonGenerate(\App\Common::getLabTest(), 'lt_ns1', 0, $dengue->lt_ns1, true) !!}
                                @if ($errors->first('lt_ns1'))
                                    <div class="alert alert-danger">{!! $errors->first('lt_ns1') !!}</div>@endif
                            </div>
                            <div class="form-group  {!! $errors->first('lt_igm')?'has-error':'' !!} ">
                                <label class="control-label clear"> IgM</label><br>
                                {!! @App\Common::radioButtonGenerate(\App\Common::getLabTest(), 'lt_igm', 0, $dengue->lt_igm, true) !!}
                                @if ($errors->first('lt_igm'))
                                    <div class="alert alert-danger">{!! $errors->first('lt_igm') !!}</div>@endif
                            </div>
                            <div  class="form-group  {!! $errors->first('other_test')?'has-error':'' !!} ">
                                <label class="control-label clear"> Other Test</label>
                                {!! Form::text('other_test', Input::old('other_test',isset($dengue->other_test)?$dengue->other_test:''),array('id'=>'other_test','class' => 'form-control other_test')) !!}
                                @if ($errors->first('other_test'))
                                    <div class="alert alert-danger">{!! $errors->first('other_test') !!}</div>@endif
                            </div>
                            <div class="form-group {!! $errors->first('current_fever_status')?'has-error':'' !!} clear">
                                <label class="control-label clear">Diagonosis</label><br>
                                {!! @App\Common::radioButtonGenerate(\App\Common::getFeverStatus(), 'current_fever_status', 0, $dengue->current_fever_status, true) !!}
                                @if ($errors->first('current_fever_status'))
                                    <div class="alert alert-danger">{!! $errors->first('current_fever_status') !!}</div>@endif
                            </div>
                            <div class="form-group">
                                <label class="control-label">Comorbidity</label>
                                <div>
                                    @if(isset($dengue->comorbidity))
                                        {!! @App\Common::checkBoxArrayGenerate(\App\Common::getDengueComorbidity(),'comorbidity',0, json_decode($dengue->comorbidity)); !!}
                                    @else
                                        {!! @App\Common::checkBoxArrayGenerate(\App\Common::getDengueComorbidity(),'comorbidity',0, array()); !!}
                                    @endif
                                    <div id="comorbidity_others">
                                        <div onclick="add_new_text(this, 'comorbidity_others', 'অন্যান্য (নির্দিষ্ট করে বলুন)')" class="text-right"><i class="fa fa-plus"></i></div>
                                        @if(isset($dengue->comorbidity_others) && $dengue->comorbidity_others!= null)
                                            @foreach(@json_decode($dengue->comorbidity_others) as $key=>$value)
                                                {!! Form::text('comorbidity_others[]', Input::old('comorbidity_others',isset($dengue->comorbidity_others)?$value:''),array('class' => 'form-control','placeholder'=>'অন্যান্য (নির্দিষ্ট করে বলুন)','disabled'=>'disabled')) !!}
                                            @endforeach
                                        @else
                                            {!! Form::text('comorbidity_others[]', Input::old('comorbidity_others',isset($dengue->comorbidity_others)?$value:''),array('class' => 'form-control','placeholder'=>'অন্যান্য (নির্দিষ্ট করে বলুন)','disabled'=>'disabled')) !!}
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group {!! $errors->first('discharge_date')?'has-error':'' !!} clear">
                                <label class="control-label clear">Discharge Date</label>
                                {!! Form::text('discharge_date', Input::old('discharge_date',isset($dengue->discharge_date)?$dengue->discharge_date:''),array('class' => 'form-control datepick', 'placeholder' => 'yyyy-mm-dd')) !!}
                                @if ($errors->first('discharge_date'))
                                    <div class="alert alert-danger">{!! $errors->first('discharge_date') !!}</div>@endif
                            </div>

                            <div class="form-group">
                                <label class="control-label">Death</label><br>
                                {!! @App\Common::radioButtonGenerate(\App\Common::getDengueYesNoType(), 'death_flag', 0, $dengue->death_flag, true) !!}
                                @if ($errors->first('death_flag'))
                                    <div class="alert alert-danger">{!! $errors->first('death_flag') !!}</div>@endif
                            </div>
                            <div class="form-group {!! $errors->first('death_date')?'has-error':'' !!} clear">
                                <label class="control-label clear">Death Date</label>
                                {!! Form::text('death_date', Input::old('death_date',isset($dengue->death_date)?$dengue->death_date:''),array('class' => 'form-control datepick', 'placeholder' => 'yyyy-mm-dd')) !!}
                                @if ($errors->first('death_date'))
                                    <div class="alert alert-danger">{!! $errors->first('death_date') !!}</div>@endif
                            </div>
                        </div>  <!-- end col-md-3 -->
                        <div class="col-md-12 col-sm-12">
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

    <script src="{{URL::to('resources/assets/ampleadmin/plugins/bower_components/typeahead.js-master/dist/typeahead.bundle.min.js')}}"></script>

    <script>
        $(document).ready(function () {
            $('#site_id').change(function () {
                if($('#site_id').val()==7777){
                    $('#site_name').removeAttr('disabled');
                }else{
                    $('#site_name').attr('disabled', 'disabled');
                }
            });
            $('.comorbidity').on('change', function(){ // on change of state
                if(this.value=='6') {
                    if (this.checked == true)$('#comorbidity_others').children().removeAttr("disabled");
                    else  $('#comorbidity_others').children().attr("disabled", "disabled");
                }
            });
        });
        function add_new_text(e, indicator, placeholder){
            if($(e).siblings().length < 5)
                $(e).parent().append('<input class="form-control" placeholder="'+placeholder+'" name="'+indicator+'[]" type="text" >');
        }
        var substringMatcher = function (strs) {
            return function findMatches(q, cb) {
                var matches, substringRegex;

                // an array that will be populated with substring matches
                matches = [];

                // regex used to determine if a string contains the substring `q`
                substrRegex = new RegExp(q, 'i');

                // iterate through the pool of strings and for any string that
                // contains the substring `q`, add it to the `matches` array
                $.each(strs, function (i, str) {
                    if (substrRegex.test(str)) {
                        matches.push(str);
                    }
                });

                cb(matches);
            };
        };
        var areas = ['Adabor', 'Azampur', 'Badda', 'Banani', 'Bangsal', 'Bimanbandar', 'Cantonment', 'Chowkbazar', 'Dakshin Khan', 'Darus Salam', 'Demra', 'Dhanmondi', 'Gendaria', 'Gulshan', 'Hazaribagh', 'Jatrabari', 'Kadamtali', 'Kafrul', 'Kalabagan', 'Kamrangirchar', 'Khilgaon', 'Khilkhet', 'Kotwali', 'Lalbagh', 'Mirpur', 'Mohammadpur', 'Motijheel', 'Mugda', 'New Market', 'Pallabi', 'Paltan', 'Panthapath', 'Ramna', 'Rampura', 'Rupnagar', 'Sabujbagh', 'Shah Ali', 'Shahjahanpur', 'Shahbagh', 'Sher-e-Bangla Nagar', 'Shyampur', 'Sutrapur', 'Tejgaon Industrial Area', 'Tejgaon', 'Turag', 'Uttar Khan', 'Uttara East', 'Uttara West', 'Bsahantek', 'Vatara', 'Wari'];

        $('.the-basics-area .typeahead').typeahead({
                hint: true,
                highlight: true,
                minLength: 1
            },
            {
                name: 'areas',
                source: substringMatcher(areas)
            });
    </script>
@stop
