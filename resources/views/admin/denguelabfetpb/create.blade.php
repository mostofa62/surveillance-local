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
                    {!! Form::open(array('url' => isset($dengue)?session('access').'fetpb-dengue-lab/'.$dengue->id :session('access').'fetpb-dengue-lab','id'=>'form','method' => isset($dengue)?'put':'post',  'enctype'=>'multipart/form-data')) !!}
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group {!! $errors->first('lab_name')?'has-error':'' !!} clear">
                                <label class="control-label clear">Lab</label>
                                {!! Form::select('lab_name', [''=>'---Select Lab---']+\App\Common::getLabName(),Input::old('lab_name',isset($dengue->lab_name)?$dengue->lab_name:''), array('id' => 'lab_name', 'class' => 'form-control select2')) !!}
                            @if ($errors->first('lab_name'))
                                    <div class="alert alert-danger">{!! $errors->first('lab_name') !!}</div>@endif
                            </div>
                            <div class="form-group {!! $errors->first('p_lab_id')?'has-error':'' !!} clear">
                                <label class="control-label clear"> Lab's Patient ID</label>
                                {!! Form::text('p_lab_id', Input::old('p_lab_id',isset($dengue->p_lab_id)?$dengue->p_lab_id:''),array('class' => 'form-control')) !!}
                                @if ($errors->first('p_lab_id'))
                                    <div class="alert alert-danger">{!! $errors->first('p_lab_id') !!}</div>@endif
                            </div>

                            <div class="form-group  {!! $errors->first('area')?'has-error':'' !!} ">
                                <label class="control-label clear">Location of Hospital/ Laboratory</label>
                                <div class="the-basics-area">
                                    {!! Form::text('area', Input::old('area',isset($dengue->area)?$dengue->area:''),array('id'=>'area','class' => 'typeahead form-control','placeholder'=>'area name')) !!}
                                </div>
                                @if ($errors->first('area'))
                                    <div class="alert alert-danger">{!! $errors->first('area') !!}</div>@endif
                            </div>
                            <div class="form-group {!! $errors->first('received_date')?'has-error':'' !!} clear">
                                <label class="control-label clear">Received Date</label>
                                {!! Form::text('received_date', Input::old('received_date',isset($dengue->received_date)?$dengue->received_date:''),array('class' => 'form-control datepick', 'placeholder' => 'yyyy-mm-dd')) !!}
                                @if ($errors->first('received_date'))
                                    <div class="alert alert-danger">{!! $errors->first('received_date') !!}</div>@endif
                            </div>
                            <div class="form-group {!! $errors->first('p_report_date')?'has-error':'' !!} clear">
                                <label class="control-label clear">Patient Reporting Date</label>
                                {!! Form::text('p_report_date', Input::old('p_report_date',isset($dengue->p_report_date)?$dengue->p_report_date:''),array('class' => 'form-control datepick', 'placeholder' => 'yyyy-mm-dd')) !!}
                                @if ($errors->first('p_report_date'))
                                    <div class="alert alert-danger">{!! $errors->first('p_report_date') !!}</div>@endif
                            </div>
                            <div class="form-group {!! $errors->first('s_reporting_date')?'has-error':'' !!} clear">
                                <label class="control-label clear">Surveillance Reporting Date</label>
                                {!! Form::text('s_reporting_date', Input::old('s_reporting_date',isset($dengue->s_reporting_date)?$dengue->s_reporting_date:''),array('class' => 'form-control datepick', 'placeholder' => 'yyyy-mm-dd')) !!}
                                @if ($errors->first('s_reporting_date'))
                                    <div class="alert alert-danger">{!! $errors->first('s_reporting_date') !!}</div>@endif
                            </div>

                            <div class="form-group {!! $errors->first('name')?'has-error':'' !!} clear">
                                <label class="control-label clear">Patient's Name</label>
                                {!! Form::text('name', Input::old('name',isset($dengue->name)?$dengue->name:''),array('spellcheck'=>'false','class' => 'form-control')) !!}
                                @if ($errors->first('name'))
                                    <div class="alert alert-danger">{!! $errors->first('name') !!}</div>@endif
                            </div>
                            <div class="form-group {!! $errors->first('age')?'has-error':'' !!} clear">
                                <label class="control-label clear">Patient's Age</label>
                                {!! Form::number('age', Input::old('age',isset($dengue->age)?$dengue->age:''),array('min'=>0, 'step'=>0.1, 'class' => 'form-control')) !!}
                                @if ($errors->first('age'))
                                    <div class="alert alert-danger">{!! $errors->first('age') !!}</div>@endif
                            </div>
                            <div class="form-group {!! $errors->first('sex')?'has-error':'' !!} clear">
                                <label class="control-label clear">Patient's Gender</label><br>
                                {!! @App\Common::radioButtonGenerate(\App\Common::getDengueGenderType(), 'sex', 0, $dengue->sex, true) !!}
                                @if ($errors->first('sex'))
                                    <div class="alert alert-danger">{!! $errors->first('sex') !!}</div>@endif
                            </div>
                            <div class="form-group {!! $errors->first('mobile_no')?'has-error':'' !!} clear">
                                <label class="control-label clear">Patient's Mobile</label>
                                {!! Form::number('mobile_no', Input::old('mobile_no',isset($dengue->mobile_no)?$dengue->mobile_no:''),array('class' => 'form-control')) !!}
                                @if ($errors->first('mobile_no'))
                                    <div class="alert alert-danger">{!! $errors->first('mobile_no') !!}</div>@endif
                            </div>
                            <div class="form-group  {!! $errors->first('address')?'has-error':'' !!} ">
                                <label class="control-label clear">Patient's Address</label>
                                {!! Form::text('address', Input::old('address',isset($dengue->address)?$dengue->address:''),array('id'=>'address','class' => 'form-control address')) !!}
                                @if ($errors->first('address'))
                                    <div class="alert alert-danger">{!! $errors->first('address') !!}</div>@endif
                            </div>
                            <div class="form-group  {!! $errors->first('diagnosis')?'has-error':'' !!} ">
                                <label class="control-label clear">Symptoms / Diagnosis </label>
                                {!! Form::text('diagnosis', Input::old('diagnosis',isset($dengue->diagnosis)?$dengue->diagnosis:''),array('id'=>'diagnosis','class' => 'form-control diagnosis')) !!}
                                @if ($errors->first('diagnosis'))
                                    <div class="alert alert-danger">{!! $errors->first('diagnosis') !!}</div>@endif
                            </div>

                        </div>
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group  {!! $errors->first('is_ns1')?'has-error':'' !!} ">
                                <label class="control-label clear"> Lab Test(NS1)</label><br>
                                {!! @App\Common::radioButtonGenerate(\App\Common::getLabTestFETPB(), 'is_ns1', 0, $dengue->is_ns1, true) !!}
                                @if ($errors->first('is_ns1'))
                                    <div class="alert alert-danger">{!! $errors->first('is_ns1') !!}</div>@endif
                            </div>
                            <div class="form-group  {!! $errors->first('is_igm')?'has-error':'' !!} ">
                                <label class="control-label clear"> Lab Test(IgM for Dengue)</label><br>
                                {!! @App\Common::radioButtonGenerate(\App\Common::getLabTestFETPB(), 'is_igm', 0, $dengue->is_igm, true) !!}
                                @if ($errors->first('is_igm'))
                                    <div class="alert alert-danger">{!! $errors->first('is_igm') !!}</div>@endif
                            </div>
                            <div class="form-group  {!! $errors->first('is_igg')?'has-error':'' !!} ">
                                <label class="control-label clear"> Lab Test(IgG for Dengue)</label><br>
                                {!! @App\Common::radioButtonGenerate(\App\Common::getLabTestFETPB(), 'is_igg', 0, $dengue->is_igg, true) !!}
                                @if ($errors->first('is_igg'))
                                    <div class="alert alert-danger">{!! $errors->first('is_igg') !!}</div>@endif
                            </div>
                            <div class="form-group  {!! $errors->first('is_chikunguniya')?'has-error':'' !!} ">
                                <label class="control-label clear"> Lab Test(Chikunguniya)</label><br>
                                {!! @App\Common::radioButtonGenerate(\App\Common::getLabTestFETPB(), 'is_chikunguniya', 0, $dengue->is_chikunguniya, true) !!}
                                @if ($errors->first('is_chikunguniya'))
                                    <div class="alert alert-danger">{!! $errors->first('is_chikunguniya') !!}</div>@endif
                            </div>
                            <div class="form-group  {!! $errors->first('is_malaria')?'has-error':'' !!} ">
                                <label class="control-label clear"> Lab Test(Malaria)</label><br>
                                {!! @App\Common::radioButtonGenerate(\App\Common::getLabTestFETPB(), 'is_malaria', 0, $dengue->is_malaria, true) !!}
                                @if ($errors->first('is_malaria'))
                                    <div class="alert alert-danger">{!! $errors->first('is_malaria') !!}</div>@endif
                            </div>
                            <div class="form-group  {!! $errors->first('is_febrile_antigen')?'has-error':'' !!} ">
                                <label class="control-label clear"> Lab Test( Febrile Antigen / Triple Antigen )</label><br>
                                {!! @App\Common::radioButtonGenerate(\App\Common::getLabTestFETPB(), 'is_febrile_antigen', 0, $dengue->is_febrile_antigen, true) !!}
                                @if ($errors->first('is_febrile_antigen'))
                                    <div class="alert alert-danger">{!! $errors->first('is_febrile_antigen') !!}</div>@endif
                            </div>
                            <div class="form-group  {!! $errors->first('is_salmonella')?'has-error':'' !!} ">
                                <label class="control-label clear"> Lab Test(ICT for Salmonella )</label><br>
                                {!! @App\Common::radioButtonGenerate(\App\Common::getLabTestFETPB(), 'is_salmonella', 0, $dengue->is_salmonella, true) !!}
                                @if ($errors->first('is_salmonella'))
                                    <div class="alert alert-danger">{!! $errors->first('is_salmonella') !!}</div>@endif
                            </div>
                            <div class="form-group  {!! $errors->first('is_hbsag')?'has-error':'' !!} ">
                                <label class="control-label clear"> Lab Test(HBsAg)</label><br>
                                {!! @App\Common::radioButtonGenerate(\App\Common::getLabTestFETPB(), 'is_hbsag', 0, $dengue->is_hbsag, true) !!}
                                @if ($errors->first('is_hbsag'))
                                    <div class="alert alert-danger">{!! $errors->first('is_hbsag') !!}</div>@endif
                            </div>
                            <div class="form-group  {!! $errors->first('is_anti_hav_igm')?'has-error':'' !!} ">
                                <label class="control-label clear"> Lab Test(Anti HAV IgM)</label><br>
                                {!! @App\Common::radioButtonGenerate(\App\Common::getLabTestFETPB(), 'is_anti_hav_igm', 0, $dengue->is_anti_hav_igm, true) !!}
                                @if ($errors->first('is_anti_hav_igm'))
                                    <div class="alert alert-danger">{!! $errors->first('is_anti_hav_igm') !!}</div>@endif
                            </div>
                            <div class="form-group  {!! $errors->first('is_anti_hev_igm')?'has-error':'' !!} ">
                                <label class="control-label clear"> Lab Test(Anti HEV IgM)</label><br>
                                {!! @App\Common::radioButtonGenerate(\App\Common::getLabTestFETPB(), 'is_anti_hev_igm', 0, $dengue->is_anti_hev_igm, true) !!}
                                @if ($errors->first('is_anti_hev_igm'))
                                    <div class="alert alert-danger">{!! $errors->first('is_anti_hev_igm') !!}</div>@endif
                            </div>
                            <div class="form-group  {!! $errors->first('is_anti_hcv_igm')?'has-error':'' !!} ">
                                <label class="control-label clear"> Lab Test(Anti HCV IgM)</label><br>
                                {!! @App\Common::radioButtonGenerate(\App\Common::getLabTestFETPB(), 'is_anti_hcv_igm', 0, $dengue->is_anti_hcv_igm, true) !!}
                                @if ($errors->first('is_anti_hcv_igm'))
                                    <div class="alert alert-danger">{!! $errors->first('is_anti_hcv_igm') !!}</div>@endif
                            </div>
                            <div class="form-group  {!! $errors->first('is_pcr_hbv_rna')?'has-error':'' !!} ">
                                <label class="control-label clear"> Lab Test(PCR HBV RNA)</label><br>
                                {!! @App\Common::radioButtonGenerate(\App\Common::getLabTestFETPB(), 'is_pcr_hbv_rna', 0, $dengue->is_pcr_hbv_rna, true) !!}
                                @if ($errors->first('is_pcr_hbv_rna'))
                                    <div class="alert alert-danger">{!! $errors->first('is_pcr_hbv_rna') !!}</div>@endif
                            </div>
                            <div class="form-group  {!! $errors->first('is_pcr_hcv_dna')?'has-error':'' !!} ">
                                <label class="control-label clear"> Lab Test(PCR HCV DNA)</label><br>
                                {!! @App\Common::radioButtonGenerate(\App\Common::getLabTestFETPB(), 'is_pcr_hcv_dna', 0, $dengue->is_pcr_hcv_dna, true) !!}
                                @if ($errors->first('is_pcr_hcv_dna'))
                                    <div class="alert alert-danger">{!! $errors->first('is_pcr_hcv_dna') !!}</div>@endif
                            </div>
                            <div class="form-group {!! $errors->first('remarks')?'has-error':'' !!} clear">
                                <label class="control-label clear"> Remarks</label>
                                {!! Form::text('remarks', Input::old('remarks',isset($dengue->remarks)?$dengue->remarks:''),array('class' => 'form-control')) !!}
                                @if ($errors->first('remarks'))
                                    <div class="alert alert-danger">{!! $errors->first('remarks') !!}</div>@endif
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
            $('#lab_name').change(function () {
                if($('#lab_name').val()==7777){
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
                substrRegex = new RegExp("^("+q+")", 'i');

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
