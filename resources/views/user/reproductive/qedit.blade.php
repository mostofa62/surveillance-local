@extends('layouts/master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    {{$pageTitle}}
                </div>
                <div class="panel-body">
                    {!! Form::open(array('url' => session('access').'reproductive/'.$question->id.'/qedit' ,'id'=>'form','method' =>'post',  'enctype'=>'multipart/form-data')) !!}
                    <div class="row">
                        <div class="col-md-8 col-sm-12">
                           
                            
                            <div class="form-group {!! $errors->first('gi_1_3_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">1.3। {{ @App\Models\Reproductive::questionText()['gi_1_3']}}</label>
                                {!! Form::text('gi_1_3_e', Input::old('gi_1_3_e',isset($question->gi_1_3_e)?$question->gi_1_3_e:''),array('id'=>'gi_1_3_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['gi_1_3_e'])) !!}
                                @if ($errors->first('gi_1_3_e'))
                                    <div class="alert alert-danger">{!! $errors->first('gi_1_3_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="gi_1_3" value="{{$question->gi_1_3}}">



                            
                        </div>   
                        
                </div>

                <div class="row">
                        <div class="col-md-8 col-sm-12">
                           
                            
                            <div class="form-group {!! $errors->first('gi_1_4_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">1.4। {{ @App\Models\Reproductive::questionText()['gi_1_4']}}</label>
                                {!! Form::number('gi_1_4_e', Input::old('gi_1_4_e',isset($question->gi_1_4_e)?$question->gi_1_4_e:''),array('min'=>0,'id'=>'gi_1_4_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['gi_1_4_placeholder'])) !!}
                                @if ($errors->first('gi_1_4_e'))
                                    <div class="alert alert-danger">{!! $errors->first('gi_1_4_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="gi_1_4" value="{{$question->gi_1_4}}">

                            
                        </div>   
                        
                </div>

                <div class="row">
                        <div class="col-md-8 col-sm-12">
                           
                            
                            <div class="form-group {!! $errors->first('gi_1_5_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">1.5। {{ @App\Models\Reproductive::questionText()['gi_1_5']}}</label>
                                {!! Form::text('gi_1_5_e', Input::old('gi_1_5_e',isset($question->gi_1_5_e)?$question->gi_1_5_e:''),array('id'=>'gi_1_5_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['gi_1_5_e'])) !!}
                                @if ($errors->first('gi_1_5_e'))
                                    <div class="alert alert-danger">{!! $errors->first('gi_1_5_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="gi_1_5" value="{{$question->gi_1_5}}">

                            
                        </div>   
                        
                </div>

                <div class="row">
                        <div class="col-md-8 col-sm-12">
                           
                            <label class="control-label clear">2.5। {{ @App\Models\Reproductive::questionText()['pi_2_5']}}</label>
                            <div class="form-group {!! $errors->first('pi_2_5_1')?'has-error':'' !!} clear">
                                <label class="control-label clear">2.5.1। {{ @App\Models\Reproductive::questionText()['pi_2_5_1']}}</label>
                                {!! Form::text('pi_2_5_1', Input::old('pi_2_5_1',isset($question->pi_2_5_1)?$question->pi_2_5_1:''),array('id'=>'pi_2_5_1','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['pi_2_5_1'])) !!}
                                @if ($errors->first('pi_2_5_1'))
                                    <div class="alert alert-danger">{!! $errors->first('pi_2_5_1') !!}</div>@endif
                            </div>

                            <div class="form-group {!! $errors->first('pi_2_5_2')?'has-error':'' !!} clear">
                                <label class="control-label clear">2.5.2। {{ @App\Models\Reproductive::questionText()['pi_2_5_2']}}</label>
                                {!! Form::text('pi_2_5_2', Input::old('pi_2_5_2',isset($question->pi_2_5_2)?$question->pi_2_5_2:''),array('id'=>'pi_2_5_2','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['pi_2_5_2'])) !!}
                                @if ($errors->first('pi_2_5_2'))
                                    <div class="alert alert-danger">{!! $errors->first('pi_2_5_2') !!}</div>@endif
                            </div>

                            <input type="hidden" name="pi_2_5" value="{{$question->pi_2_5}}">

                            
                        </div>   
                        
                </div>


                <div class="row">
                        <div class="col-md-8 col-sm-12">
                           
                           <label class="control-label clear">3.2 । {{ @App\Models\Reproductive::questionText()['fp_3_2']}}</label>
                            
                            <div class="form-group {!! $errors->first('fp_3_2_1_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">3.2.1</label>
                                {!! Form::text('fp_3_2_1_e', Input::old('fp_3_2_1_e',isset($question->fp_3_2_1_e)?$question->fp_3_2_1_e:''),array('min'=>0,'id'=>'fp_3_2_1_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['fp_3_2_1_e'])) !!}
                                @if ($errors->first('fp_3_2_1_e'))
                                    <div class="alert alert-danger">{!! $errors->first('fp_3_2_1_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="fp_3_2_1" value="{{$question->fp_3_2_1}}">

                            <div class="form-group {!! $errors->first('fp_3_2_2_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">3.2.2</label>
                                {!! Form::text('fp_3_2_2_e', Input::old('fp_3_2_2_e',isset($question->fp_3_2_2_e)?$question->fp_3_2_2_e:''),array('min'=>0,'id'=>'fp_3_2_2_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['fp_3_2_2_e'])) !!}
                                @if ($errors->first('fp_3_2_2_e'))
                                    <div class="alert alert-danger">{!! $errors->first('fp_3_2_2_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="fp_3_2_2" value="{{$question->fp_3_2_2}}">

                            <div class="form-group {!! $errors->first('fp_3_2_3_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">3.2.3</label>
                                {!! Form::text('fp_3_2_3_e', Input::old('fp_3_2_3_e',isset($question->fp_3_2_3_e)?$question->fp_3_2_3_e:''),array('min'=>0,'id'=>'fp_3_2_3_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['fp_3_2_3_e'])) !!}
                                @if ($errors->first('fp_3_2_3_e'))
                                    <div class="alert alert-danger">{!! $errors->first('fp_3_2_3_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="fp_3_2_3" value="{{$question->fp_3_2_3}}">

                            
                        </div>   
                        
                </div>


                <div class="row">
                        <div class="col-md-8 col-sm-12">
                           
                           <label class="control-label clear">3.3 । {{ @App\Models\Reproductive::questionText()['fp_3_3']}}</label>
                            
                            <div class="form-group {!! $errors->first('fp_3_3_1_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">3.3.1</label>
                                {!! Form::text('fp_3_3_1_e', Input::old('fp_3_3_1_e',isset($question->fp_3_3_1_e)?$question->fp_3_3_1_e:''),array('min'=>0,'id'=>'fp_3_3_1_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['fp_3_3_1_e'])) !!}
                                @if ($errors->first('fp_3_3_1_e'))
                                    <div class="alert alert-danger">{!! $errors->first('fp_3_3_1_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="fp_3_3_1" value="{{$question->fp_3_3_1}}">

                            <div class="form-group {!! $errors->first('fp_3_3_2_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">3.3.2</label>
                                {!! Form::text('fp_3_3_2_e', Input::old('fp_3_3_2_e',isset($question->fp_3_3_2_e)?$question->fp_3_3_2_e:''),array('min'=>0,'id'=>'fp_3_3_2_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['fp_3_3_2_e'])) !!}
                                @if ($errors->first('fp_3_3_2_e'))
                                    <div class="alert alert-danger">{!! $errors->first('fp_3_3_2_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="fp_3_3_2" value="{{$question->fp_3_3_2}}">

                            <div class="form-group {!! $errors->first('fp_3_3_3_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">3.3.3</label>
                                {!! Form::text('fp_3_3_3_e', Input::old('fp_3_3_3_e',isset($question->fp_3_3_3_e)?$question->fp_3_3_3_e:''),array('min'=>0,'id'=>'fp_3_3_3_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['fp_3_3_3_e'])) !!}
                                @if ($errors->first('fp_3_3_3_e'))
                                    <div class="alert alert-danger">{!! $errors->first('fp_3_3_3_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="fp_3_3_3" value="{{$question->fp_3_3_3}}">

                            
                        </div>   
                        
                </div>


                <div class="row">
                        <div class="col-md-8 col-sm-12">
                           
                            
                            <div class="form-group {!! $errors->first('fp_3_4_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">3.4। {{ @App\Models\Reproductive::questionText()['fp_3_4']}}</label>
                                {!! Form::text('fp_3_4_e', Input::old('fp_3_4_e',isset($question->fp_3_4_e)?$question->fp_3_4_e:''),array('id'=>'fp_3_4_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['fp_3_4_e'])) !!}
                                @if ($errors->first('fp_3_4_e'))
                                    <div class="alert alert-danger">{!! $errors->first('fp_3_4_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="fp_3_4" value="{{$question->fp_3_4}}">

                            
                        </div>   
                        
                </div>

                 <div class="row">
                        <div class="col-md-8 col-sm-12">
                           
                           <label class="control-label clear">4.3 । {{ @App\Models\Reproductive::questionText()['dp_4_3']}}</label>
                            
                            <div class="form-group {!! $errors->first('dp_4_3_1_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">4.3.1</label>
                                {!! Form::text('dp_4_3_1_e', Input::old('dp_4_3_1_e',isset($question->dp_4_3_1_e)?$question->dp_4_3_1_e:''),array('min'=>0,'id'=>'dp_4_3_1_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['dp_4_3_1_e'])) !!}
                                @if ($errors->first('dp_4_3_1_e'))
                                    <div class="alert alert-danger">{!! $errors->first('dp_4_3_1_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="dp_4_3_1" value="{{$question->dp_4_3_1}}">

                            <div class="form-group {!! $errors->first('dp_4_3_2_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">4.3.2</label>
                                {!! Form::text('dp_4_3_2_e', Input::old('dp_4_3_2_e',isset($question->dp_4_3_2_e)?$question->dp_4_3_2_e:''),array('min'=>0,'id'=>'dp_4_3_2_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['dp_4_3_2_e'])) !!}
                                @if ($errors->first('dp_4_3_2_e'))
                                    <div class="alert alert-danger">{!! $errors->first('dp_4_3_2_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="dp_4_3_2" value="{{$question->dp_4_3_2}}">

                            <div class="form-group {!! $errors->first('dp_4_3_3_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">4.3.3</label>
                                {!! Form::text('dp_4_3_3_e', Input::old('dp_4_3_3_e',isset($question->dp_4_3_3_e)?$question->dp_4_3_3_e:''),array('min'=>0,'id'=>'dp_4_3_3_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['dp_4_3_3_e'])) !!}
                                @if ($errors->first('dp_4_3_3_e'))
                                    <div class="alert alert-danger">{!! $errors->first('dp_4_3_3_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="dp_4_3_3" value="{{$question->dp_4_3_3}}">

                            
                        </div>   
                        
                </div>

                <div class="row">
                        <div class="col-md-8 col-sm-12">
                           
                           <label class="control-label clear">4.4 । {{ @App\Models\Reproductive::questionText()['dp_4_4']}}</label>
                            
                            <div class="form-group {!! $errors->first('dp_4_4_1_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">4.4.1</label>
                                {!! Form::text('dp_4_4_1_e', Input::old('dp_4_4_1_e',isset($question->dp_4_4_1_e)?$question->dp_4_4_1_e:''),array('min'=>0,'id'=>'dp_4_4_1_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['dp_4_4_1_e'])) !!}
                                @if ($errors->first('dp_4_4_1_e'))
                                    <div class="alert alert-danger">{!! $errors->first('dp_4_4_1_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="dp_4_4_1" value="{{$question->dp_4_4_1}}">

                            <div class="form-group {!! $errors->first('dp_4_4_2_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">4.4.2</label>
                                {!! Form::text('dp_4_4_2_e', Input::old('dp_4_4_2_e',isset($question->dp_4_4_2_e)?$question->dp_4_4_2_e:''),array('min'=>0,'id'=>'dp_4_4_2_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['dp_4_4_2_e'])) !!}
                                @if ($errors->first('dp_4_4_2_e'))
                                    <div class="alert alert-danger">{!! $errors->first('dp_4_4_2_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="dp_4_4_2" value="{{$question->dp_4_4_2}}">

                            <div class="form-group {!! $errors->first('dp_4_4_3_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">4.4.3</label>
                                {!! Form::text('dp_4_4_3_e', Input::old('dp_4_4_3_e',isset($question->dp_4_4_3_e)?$question->dp_4_4_3_e:''),array('min'=>0,'id'=>'dp_4_4_3_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['dp_4_4_3_e'])) !!}
                                @if ($errors->first('dp_4_4_3_e'))
                                    <div class="alert alert-danger">{!! $errors->first('dp_4_4_3_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="dp_4_4_3" value="{{$question->dp_4_4_3}}">

                            
                        </div>   
                        
                </div>


                <div class="row">
                        <div class="col-md-8 col-sm-12">
                           
                           <label class="control-label clear">4.6 । {{ @App\Models\Reproductive::questionText()['dp_4_6']}}</label>
                            
                            <div class="form-group {!! $errors->first('dp_4_6_1_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">4.6.1</label>
                                {!! Form::text('dp_4_6_1_e', Input::old('dp_4_6_1_e',isset($question->dp_4_6_1_e)?$question->dp_4_6_1_e:''),array('min'=>0,'id'=>'dp_4_6_1_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['dp_4_6_1_e'])) !!}
                                @if ($errors->first('dp_4_6_1_e'))
                                    <div class="alert alert-danger">{!! $errors->first('dp_4_6_1_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="dp_4_6_1" value="{{$question->dp_4_6_1}}">

                            <div class="form-group {!! $errors->first('dp_4_6_2_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">4.6.2</label>
                                {!! Form::text('dp_4_6_2_e', Input::old('dp_4_6_2_e',isset($question->dp_4_6_2_e)?$question->dp_4_6_2_e:''),array('min'=>0,'id'=>'dp_4_6_2_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['dp_4_6_2_e'])) !!}
                                @if ($errors->first('dp_4_6_2_e'))
                                    <div class="alert alert-danger">{!! $errors->first('dp_4_6_2_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="dp_4_6_2" value="{{$question->dp_4_6_2}}">

                            <div class="form-group {!! $errors->first('dp_4_6_3_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">4.6.3</label>
                                {!! Form::text('dp_4_6_3_e', Input::old('dp_4_6_3_e',isset($question->dp_4_6_3_e)?$question->dp_4_6_3_e:''),array('min'=>0,'id'=>'dp_4_6_3_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['dp_4_6_3_e'])) !!}
                                @if ($errors->first('dp_4_6_3_e'))
                                    <div class="alert alert-danger">{!! $errors->first('dp_4_6_3_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="dp_4_6_3" value="{{$question->dp_4_6_3}}">

                            
                        </div>   
                        
                </div>


                <div class="row">
                        <div class="col-md-8 col-sm-12">
                           
                           <label class="control-label clear">4.7 । {{ @App\Models\Reproductive::questionText()['dp_4_7']}}</label>
                            
                            <div class="form-group {!! $errors->first('dp_4_7_1_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">4.7.1</label>
                                {!! Form::text('dp_4_7_1_e', Input::old('dp_4_7_1_e',isset($question->dp_4_7_1_e)?$question->dp_4_7_1_e:''),array('min'=>0,'id'=>'dp_4_7_1_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['dp_4_7_1_e'])) !!}
                                @if ($errors->first('dp_4_7_1_e'))
                                    <div class="alert alert-danger">{!! $errors->first('dp_4_7_1_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="dp_4_7_1" value="{{$question->dp_4_7_1}}">

                            <div class="form-group {!! $errors->first('dp_4_7_2_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">4.7.2</label>
                                {!! Form::text('dp_4_7_2_e', Input::old('dp_4_7_2_e',isset($question->dp_4_7_2_e)?$question->dp_4_7_2_e:''),array('min'=>0,'id'=>'dp_4_7_2_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['dp_4_7_2_e'])) !!}
                                @if ($errors->first('dp_4_7_2_e'))
                                    <div class="alert alert-danger">{!! $errors->first('dp_4_7_2_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="dp_4_7_2" value="{{$question->dp_4_7_2}}">

                            <div class="form-group {!! $errors->first('dp_4_7_3_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">4.7.3</label>
                                {!! Form::text('dp_4_7_3_e', Input::old('dp_4_7_3_e',isset($question->dp_4_7_3_e)?$question->dp_4_7_3_e:''),array('min'=>0,'id'=>'dp_4_7_3_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['dp_4_7_3_e'])) !!}
                                @if ($errors->first('dp_4_7_3_e'))
                                    <div class="alert alert-danger">{!! $errors->first('dp_4_7_3_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="dp_4_7_3" value="{{$question->dp_4_7_3}}">

                            
                        </div>   
                        
                </div>


                <div class="row">
                        <div class="col-md-8 col-sm-12">
                           
                           <label class="control-label clear">4.8 । {{ @App\Models\Reproductive::questionText()['dp_4_8']}}</label>
                            
                            <div class="form-group {!! $errors->first('dp_4_8_1_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">4.8.1</label>
                                {!! Form::text('dp_4_8_1_e', Input::old('dp_4_8_1_e',isset($question->dp_4_8_1_e)?$question->dp_4_8_1_e:''),array('min'=>0,'id'=>'dp_4_8_1_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['dp_4_8_1_e'])) !!}
                                @if ($errors->first('dp_4_8_1_e'))
                                    <div class="alert alert-danger">{!! $errors->first('dp_4_8_1_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="dp_4_8_1" value="{{$question->dp_4_8_1}}">

                            <div class="form-group {!! $errors->first('dp_4_8_2_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">4.8.2</label>
                                {!! Form::text('dp_4_8_2_e', Input::old('dp_4_8_2_e',isset($question->dp_4_8_2_e)?$question->dp_4_8_2_e:''),array('min'=>0,'id'=>'dp_4_8_2_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['dp_4_8_2_e'])) !!}
                                @if ($errors->first('dp_4_8_2_e'))
                                    <div class="alert alert-danger">{!! $errors->first('dp_4_8_2_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="dp_4_8_2" value="{{$question->dp_4_8_2}}">

                            <div class="form-group {!! $errors->first('dp_4_8_3_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">4.8.3</label>
                                {!! Form::text('dp_4_8_3_e', Input::old('dp_4_8_3_e',isset($question->dp_4_8_3_e)?$question->dp_4_8_3_e:''),array('min'=>0,'id'=>'dp_4_8_3_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['dp_4_8_3_e'])) !!}
                                @if ($errors->first('dp_4_8_3_e'))
                                    <div class="alert alert-danger">{!! $errors->first('dp_4_8_3_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="dp_4_8_3" value="{{$question->dp_4_8_3}}">

                            
                        </div>   
                        
                </div>


                <div class="row">
                        <div class="col-md-8 col-sm-12">
                           
                           <label class="control-label clear">4.9 । {{ @App\Models\Reproductive::questionText()['dp_4_9']}}</label>
                            
                            <div class="form-group {!! $errors->first('dp_4_9_1_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">4.9.1</label>
                                {!! Form::text('dp_4_9_1_e', Input::old('dp_4_9_1_e',isset($question->dp_4_9_1_e)?$question->dp_4_9_1_e:''),array('min'=>0,'id'=>'dp_4_9_1_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['dp_4_9_1_e'])) !!}
                                @if ($errors->first('dp_4_9_1_e'))
                                    <div class="alert alert-danger">{!! $errors->first('dp_4_9_1_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="dp_4_9_1" value="{{$question->dp_4_9_1}}">

                            <div class="form-group {!! $errors->first('dp_4_9_2_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">4.9.2</label>
                                {!! Form::text('dp_4_9_2_e', Input::old('dp_4_9_2_e',isset($question->dp_4_9_2_e)?$question->dp_4_9_2_e:''),array('min'=>0,'id'=>'dp_4_9_2_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['dp_4_9_2_e'])) !!}
                                @if ($errors->first('dp_4_9_2_e'))
                                    <div class="alert alert-danger">{!! $errors->first('dp_4_9_2_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="dp_4_9_2" value="{{$question->dp_4_9_2}}">

                            <div class="form-group {!! $errors->first('dp_4_9_3_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">4.9.3</label>
                                {!! Form::text('dp_4_9_3_e', Input::old('dp_4_9_3_e',isset($question->dp_4_9_3_e)?$question->dp_4_9_3_e:''),array('min'=>0,'id'=>'dp_4_9_3_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['dp_4_9_3_e'])) !!}
                                @if ($errors->first('dp_4_9_3_e'))
                                    <div class="alert alert-danger">{!! $errors->first('dp_4_9_3_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="dp_4_9_3" value="{{$question->dp_4_9_3}}">

                            
                        </div>   
                        
                </div>


                <div class="row">
                        <div class="col-md-8 col-sm-12">
                           
                           <label class="control-label clear">4.11 । {{ @App\Models\Reproductive::questionText()['dp_4_11']}}</label>
                            
                            <div class="form-group {!! $errors->first('dp_4_11_1_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">4.11.1</label>
                                {!! Form::text('dp_4_11_1_e', Input::old('dp_4_11_1_e',isset($question->dp_4_11_1_e)?$question->dp_4_11_1_e:''),array('min'=>0,'id'=>'dp_4_11_1_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['dp_4_11_1_e'])) !!}
                                @if ($errors->first('dp_4_11_1_e'))
                                    <div class="alert alert-danger">{!! $errors->first('dp_4_11_1_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="dp_4_11_1" value="{{$question->dp_4_11_1}}">

                            <div class="form-group {!! $errors->first('dp_4_11_2_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">4.11.2</label>
                                {!! Form::text('dp_4_11_2_e', Input::old('dp_4_11_2_e',isset($question->dp_4_11_2_e)?$question->dp_4_11_2_e:''),array('min'=>0,'id'=>'dp_4_11_2_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['dp_4_11_2_e'])) !!}
                                @if ($errors->first('dp_4_11_2_e'))
                                    <div class="alert alert-danger">{!! $errors->first('dp_4_11_2_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="dp_4_11_2" value="{{$question->dp_4_11_2}}">

                            <div class="form-group {!! $errors->first('dp_4_11_3_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">4.11.4</label>
                                {!! Form::text('dp_4_11_3_e', Input::old('dp_4_11_3_e',isset($question->dp_4_11_3_e)?$question->dp_4_11_3_e:''),array('min'=>0,'id'=>'dp_4_11_3_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['dp_4_11_3_e'])) !!}
                                @if ($errors->first('dp_4_11_3_e'))
                                    <div class="alert alert-danger">{!! $errors->first('dp_4_11_3_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="dp_4_11_3" value="{{$question->dp_4_11_3}}">

                            
                        </div>   
                        
                </div>


                <div class="row">
                        <div class="col-md-8 col-sm-12">
                           
                           <label class="control-label clear">4.12 । {{ @App\Models\Reproductive::questionText()['dp_4_12']}}</label>
                            
                            <div class="form-group {!! $errors->first('dp_4_12_1_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">4.12.1</label>
                                {!! Form::text('dp_4_12_1_e', Input::old('dp_4_12_1_e',isset($question->dp_4_12_1_e)?$question->dp_4_12_1_e:''),array('min'=>0,'id'=>'dp_4_12_1_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['dp_4_12_1_e'])) !!}
                                @if ($errors->first('dp_4_12_1_e'))
                                    <div class="alert alert-danger">{!! $errors->first('dp_4_12_1_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="dp_4_12_1" value="{{$question->dp_4_12_1}}">

                            <div class="form-group {!! $errors->first('dp_4_12_2_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">4.12.2</label>
                                {!! Form::text('dp_4_12_2_e', Input::old('dp_4_12_2_e',isset($question->dp_4_12_2_e)?$question->dp_4_12_2_e:''),array('min'=>0,'id'=>'dp_4_12_2_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['dp_4_12_2_e'])) !!}
                                @if ($errors->first('dp_4_12_2_e'))
                                    <div class="alert alert-danger">{!! $errors->first('dp_4_12_2_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="dp_4_12_2" value="{{$question->dp_4_12_2}}">

                            <div class="form-group {!! $errors->first('dp_4_12_3_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">4.12.3</label>
                                {!! Form::text('dp_4_12_3_e', Input::old('dp_4_12_3_e',isset($question->dp_4_12_3_e)?$question->dp_4_12_3_e:''),array('min'=>0,'id'=>'dp_4_12_3_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['dp_4_12_3_e'])) !!}
                                @if ($errors->first('dp_4_12_3_e'))
                                    <div class="alert alert-danger">{!! $errors->first('dp_4_12_3_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="dp_4_12_3" value="{{$question->dp_4_12_3}}">

                            
                        </div>   
                        
                </div>


                <div class="row">
                        <div class="col-md-8 col-sm-12">
                           
                           <label class="control-label clear">4.13 । {{ @App\Models\Reproductive::questionText()['dp_4_13']}}</label>
                            
                            <div class="form-group {!! $errors->first('dp_4_13_1_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">4.13.1</label>
                                {!! Form::text('dp_4_13_1_e', Input::old('dp_4_13_1_e',isset($question->dp_4_13_1_e)?$question->dp_4_13_1_e:''),array('min'=>0,'id'=>'dp_4_13_1_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['dp_4_13_1_e'])) !!}
                                @if ($errors->first('dp_4_13_1_e'))
                                    <div class="alert alert-danger">{!! $errors->first('dp_4_13_1_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="dp_4_13_1" value="{{$question->dp_4_13_1}}">

                            <div class="form-group {!! $errors->first('dp_4_13_2_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">4.13.2</label>
                                {!! Form::text('dp_4_13_2_e', Input::old('dp_4_13_2_e',isset($question->dp_4_13_2_e)?$question->dp_4_13_2_e:''),array('min'=>0,'id'=>'dp_4_13_2_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['dp_4_13_2_e'])) !!}
                                @if ($errors->first('dp_4_13_2_e'))
                                    <div class="alert alert-danger">{!! $errors->first('dp_4_13_2_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="dp_4_13_2" value="{{$question->dp_4_13_2}}">

                            <div class="form-group {!! $errors->first('dp_4_13_3_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">4.13.3</label>
                                {!! Form::text('dp_4_13_3_e', Input::old('dp_4_13_3_e',isset($question->dp_4_13_3_e)?$question->dp_4_13_3_e:''),array('min'=>0,'id'=>'dp_4_13_3_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['dp_4_13_3_e'])) !!}
                                @if ($errors->first('dp_4_13_3_e'))
                                    <div class="alert alert-danger">{!! $errors->first('dp_4_13_3_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="dp_4_13_3" value="{{$question->dp_4_13_3}}">

                            
                        </div>   
                        
                </div>


                <div class="row">
                        <div class="col-md-8 col-sm-12">
                           
                           <label class="control-label clear">5.2 । {{ @App\Models\Reproductive::questionText()['cq_5_2']}}</label>
                            
                            <div class="form-group {!! $errors->first('cq_5_2_1_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">5.2.1</label>
                                {!! Form::text('cq_5_2_1_e', Input::old('cq_5_2_1_e',isset($question->cq_5_2_1_e)?$question->cq_5_2_1_e:''),array('min'=>0,'id'=>'cq_5_2_1_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['cq_5_2_1_e'])) !!}
                                @if ($errors->first('cq_5_2_1_e'))
                                    <div class="alert alert-danger">{!! $errors->first('cq_5_2_1_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="cq_5_2_1" value="{{$question->cq_5_2_1}}">

                            <div class="form-group {!! $errors->first('cq_5_2_2_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">5.2.2</label>
                                {!! Form::text('cq_5_2_2_e', Input::old('cq_5_2_2_e',isset($question->cq_5_2_2_e)?$question->cq_5_2_2_e:''),array('min'=>0,'id'=>'cq_5_2_2_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['cq_5_2_2_e'])) !!}
                                @if ($errors->first('cq_5_2_2_e'))
                                    <div class="alert alert-danger">{!! $errors->first('cq_5_2_2_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="cq_5_2_2" value="{{$question->cq_5_2_2}}">

                            <div class="form-group {!! $errors->first('cq_5_2_3_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">5.2.3</label>
                                {!! Form::text('cq_5_2_3_e', Input::old('cq_5_2_3_e',isset($question->cq_5_2_3_e)?$question->cq_5_2_3_e:''),array('min'=>0,'id'=>'cq_5_2_3_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['cq_5_2_3_e'])) !!}
                                @if ($errors->first('cq_5_2_3_e'))
                                    <div class="alert alert-danger">{!! $errors->first('cq_5_2_3_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="cq_5_2_3" value="{{$question->cq_5_2_3}}">

                            
                        </div>   
                        
                </div>

                <div class="row">
                        <div class="col-md-8 col-sm-12">
                           
                            
                            <div class="form-group {!! $errors->first('cq_5_4_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">5.4। {{ @App\Models\Reproductive::questionText()['cq_5_4']}}</label>
                                {!! Form::text('cq_5_4_e', Input::old('cq_5_4_e',isset($question->cq_5_4_e)?$question->cq_5_4_e:''),array('id'=>'cq_5_4_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['cq_5_4_e'])) !!}
                                @if ($errors->first('cq_5_4_e'))
                                    <div class="alert alert-danger">{!! $errors->first('cq_5_4_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="cq_5_4" value="{{$question->cq_5_4}}">

                            
                        </div>   
                        
                </div>


                <div class="row">
                        <div class="col-md-8 col-sm-12">
                           
                           <label class="control-label clear">5.6 । {{ @App\Models\Reproductive::questionText()['cq_5_6']}}</label>
                            
                            <div class="form-group {!! $errors->first('cq_5_6_1_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">5.6.1</label>
                                {!! Form::text('cq_5_6_1_e', Input::old('cq_5_6_1_e',isset($question->cq_5_6_1_e)?$question->cq_5_6_1_e:''),array('min'=>0,'id'=>'cq_5_6_1_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['cq_5_6_1_e'])) !!}
                                @if ($errors->first('cq_5_6_1_e'))
                                    <div class="alert alert-danger">{!! $errors->first('cq_5_6_1_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="cq_5_6_1" value="{{$question->cq_5_6_1}}">

                            <div class="form-group {!! $errors->first('cq_5_6_2_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">5.6.2</label>
                                {!! Form::text('cq_5_6_2_e', Input::old('cq_5_6_2_e',isset($question->cq_5_6_2_e)?$question->cq_5_6_2_e:''),array('min'=>0,'id'=>'cq_5_6_2_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['cq_5_6_2_e'])) !!}
                                @if ($errors->first('cq_5_6_2_e'))
                                    <div class="alert alert-danger">{!! $errors->first('cq_5_6_2_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="cq_5_6_2" value="{{$question->cq_5_6_2}}">

                            <div class="form-group {!! $errors->first('cq_5_6_3_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">5.6.3</label>
                                {!! Form::text('cq_5_6_3_e', Input::old('cq_5_6_3_e',isset($question->cq_5_6_3_e)?$question->cq_5_6_3_e:''),array('min'=>0,'id'=>'cq_5_6_3_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['cq_5_6_3_e'])) !!}
                                @if ($errors->first('cq_5_6_3_e'))
                                    <div class="alert alert-danger">{!! $errors->first('cq_5_6_3_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="cq_5_6_3" value="{{$question->cq_5_6_3}}">

                            
                        </div>   
                        
                </div>

                <div class="row">
                        <div class="col-md-8 col-sm-12">
                           
                            
                            <div class="form-group {!! $errors->first('cq_5_9_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">5.9। {{ @App\Models\Reproductive::questionText()['cq_5_9']}}</label>
                                {!! Form::text('cq_5_9_e', Input::old('cq_5_9_e',isset($question->cq_5_9_e)?$question->cq_5_9_e:''),array('id'=>'cq_5_9_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['cq_5_9_e'])) !!}
                                @if ($errors->first('cq_5_9_e'))
                                    <div class="alert alert-danger">{!! $errors->first('cq_5_9_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="cq_5_9" value="{{$question->cq_5_9}}">

                            
                        </div>   
                        
                </div>

                <div class="row">
                        <div class="col-md-8 col-sm-12">
                           
                           <label class="control-label clear">6.2 । {{ @App\Models\Reproductive::questionText()['rh_6_2']}}</label>
                            
                            <div class="form-group {!! $errors->first('rh_6_2_1_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">6.2.1</label>
                                {!! Form::text('rh_6_2_1_e', Input::old('rh_6_2_1_e',isset($question->rh_6_2_1_e)?$question->rh_6_2_1_e:''),array('min'=>0,'id'=>'rh_6_2_1_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['rh_6_2_1_e'])) !!}
                                @if ($errors->first('rh_6_2_1_e'))
                                    <div class="alert alert-danger">{!! $errors->first('rh_6_2_1_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="rh_6_2_1" value="{{$question->rh_6_2_1}}">

                            <div class="form-group {!! $errors->first('rh_6_2_2_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">6.2.2</label>
                                {!! Form::text('rh_6_2_2_e', Input::old('rh_6_2_2_e',isset($question->rh_6_2_2_e)?$question->rh_6_2_2_e:''),array('min'=>0,'id'=>'rh_6_2_2_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['rh_6_2_2_e'])) !!}
                                @if ($errors->first('rh_6_2_2_e'))
                                    <div class="alert alert-danger">{!! $errors->first('rh_6_2_2_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="rh_6_2_2" value="{{$question->rh_6_2_2}}">

                            <div class="form-group {!! $errors->first('rh_6_2_3_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">6.2.3</label>
                                {!! Form::text('rh_6_2_3_e', Input::old('rh_6_2_3_e',isset($question->rh_6_2_3_e)?$question->rh_6_2_3_e:''),array('min'=>0,'id'=>'rh_6_2_3_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['rh_6_2_3_e'])) !!}
                                @if ($errors->first('rh_6_2_3_e'))
                                    <div class="alert alert-danger">{!! $errors->first('rh_6_2_3_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="rh_6_2_3" value="{{$question->rh_6_2_3}}">

                            
                        </div>   
                        
                </div>

                <div class="row">
                        <div class="col-md-8 col-sm-12">
                           
                           <label class="control-label clear">6.3 । {{ @App\Models\Reproductive::questionText()['rh_6_3']}}</label>
                            
                            <div class="form-group {!! $errors->first('rh_6_3_1_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">6.3.1</label>
                                {!! Form::text('rh_6_3_1_e', Input::old('rh_6_3_1_e',isset($question->rh_6_3_1_e)?$question->rh_6_3_1_e:''),array('min'=>0,'id'=>'rh_6_3_1_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['rh_6_3_1_e'])) !!}
                                @if ($errors->first('rh_6_3_1_e'))
                                    <div class="alert alert-danger">{!! $errors->first('rh_6_3_1_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="rh_6_3_1" value="{{$question->rh_6_3_1}}">

                            <div class="form-group {!! $errors->first('rh_6_3_2_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">6.3.2</label>
                                {!! Form::text('rh_6_3_2_e', Input::old('rh_6_3_2_e',isset($question->rh_6_3_2_e)?$question->rh_6_3_2_e:''),array('min'=>0,'id'=>'rh_6_3_2_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['rh_6_3_2_e'])) !!}
                                @if ($errors->first('rh_6_3_2_e'))
                                    <div class="alert alert-danger">{!! $errors->first('rh_6_3_2_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="rh_6_3_2" value="{{$question->rh_6_3_2}}">

                            <div class="form-group {!! $errors->first('rh_6_3_3_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">6.3.3</label>
                                {!! Form::text('rh_6_3_3_e', Input::old('rh_6_3_3_e',isset($question->rh_6_3_3_e)?$question->rh_6_3_3_e:''),array('min'=>0,'id'=>'rh_6_3_3_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['rh_6_3_3_e'])) !!}
                                @if ($errors->first('rh_6_3_3_e'))
                                    <div class="alert alert-danger">{!! $errors->first('rh_6_3_3_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="rh_6_3_3" value="{{$question->rh_6_3_3}}">

                            
                        </div>   
                        
                </div>

                <div class="row">
                        <div class="col-md-8 col-sm-12">
                           
                           <label class="control-label clear">6.4 । {{ @App\Models\Reproductive::questionText()['rh_6_4']}}</label>
                            
                            <div class="form-group {!! $errors->first('rh_6_4_1_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">6.4.1</label>
                                {!! Form::text('rh_6_4_1_e', Input::old('rh_6_4_1_e',isset($question->rh_6_4_1_e)?$question->rh_6_4_1_e:''),array('min'=>0,'id'=>'rh_6_4_1_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['rh_6_4_1_e'])) !!}
                                @if ($errors->first('rh_6_4_1_e'))
                                    <div class="alert alert-danger">{!! $errors->first('rh_6_4_1_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="rh_6_4_1" value="{{$question->rh_6_4_1}}">

                            <div class="form-group {!! $errors->first('rh_6_4_2_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">6.4.2</label>
                                {!! Form::text('rh_6_4_2_e', Input::old('rh_6_4_2_e',isset($question->rh_6_4_2_e)?$question->rh_6_4_2_e:''),array('min'=>0,'id'=>'rh_6_4_2_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['rh_6_4_2_e'])) !!}
                                @if ($errors->first('rh_6_4_2_e'))
                                    <div class="alert alert-danger">{!! $errors->first('rh_6_4_2_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="rh_6_4_2" value="{{$question->rh_6_4_2}}">

                            <div class="form-group {!! $errors->first('rh_6_4_3_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">6.4.3</label>
                                {!! Form::text('rh_6_4_3_e', Input::old('rh_6_4_3_e',isset($question->rh_6_4_3_e)?$question->rh_6_4_3_e:''),array('min'=>0,'id'=>'rh_6_4_3_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['rh_6_4_3_e'])) !!}
                                @if ($errors->first('rh_6_4_3_e'))
                                    <div class="alert alert-danger">{!! $errors->first('rh_6_4_3_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="rh_6_4_3" value="{{$question->rh_6_4_3}}">

                            
                        </div>   
                        
                </div>

                <div class="row">
                        <div class="col-md-8 col-sm-12">
                           
                           <label class="control-label clear">6.6 । {{ @App\Models\Reproductive::questionText()['rh_6_6']}}</label>
                            
                            <div class="form-group {!! $errors->first('rh_6_6_1_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">6.6.1</label>
                                {!! Form::text('rh_6_6_1_e', Input::old('rh_6_6_1_e',isset($question->rh_6_6_1_e)?$question->rh_6_6_1_e:''),array('min'=>0,'id'=>'rh_6_6_1_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['rh_6_6_1_e'])) !!}
                                @if ($errors->first('rh_6_6_1_e'))
                                    <div class="alert alert-danger">{!! $errors->first('rh_6_6_1_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="rh_6_6_1" value="{{$question->rh_6_6_1}}">

                            <div class="form-group {!! $errors->first('rh_6_6_2_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">6.6.2</label>
                                {!! Form::text('rh_6_6_2_e', Input::old('rh_6_6_2_e',isset($question->rh_6_6_2_e)?$question->rh_6_6_2_e:''),array('min'=>0,'id'=>'rh_6_6_2_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['rh_6_6_2_e'])) !!}
                                @if ($errors->first('rh_6_6_2_e'))
                                    <div class="alert alert-danger">{!! $errors->first('rh_6_6_2_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="rh_6_6_2" value="{{$question->rh_6_6_2}}">

                            <div class="form-group {!! $errors->first('rh_6_6_3_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">6.6.3</label>
                                {!! Form::text('rh_6_6_3_e', Input::old('rh_6_6_3_e',isset($question->rh_6_6_3_e)?$question->rh_6_6_3_e:''),array('min'=>0,'id'=>'rh_6_6_3_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['rh_6_6_3_e'])) !!}
                                @if ($errors->first('rh_6_6_3_e'))
                                    <div class="alert alert-danger">{!! $errors->first('rh_6_6_3_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="rh_6_6_3" value="{{$question->rh_6_6_3}}">

                            
                        </div>   
                        
                </div>


                <div class="row">
                        <div class="col-md-8 col-sm-12">
                           
                           <label class="control-label clear">6.7 । {{ @App\Models\Reproductive::questionText()['rh_6_7']}}</label>
                            
                            <div class="form-group {!! $errors->first('rh_6_7_1_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">6.7.1</label>
                                {!! Form::text('rh_6_7_1_e', Input::old('rh_6_7_1_e',isset($question->rh_6_7_1_e)?$question->rh_6_7_1_e:''),array('min'=>0,'id'=>'rh_6_7_1_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['rh_6_7_1_e'])) !!}
                                @if ($errors->first('rh_6_7_1_e'))
                                    <div class="alert alert-danger">{!! $errors->first('rh_6_7_1_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="rh_6_7_1" value="{{$question->rh_6_7_1}}">

                            <div class="form-group {!! $errors->first('rh_6_7_2_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">6.7.2</label>
                                {!! Form::text('rh_6_7_2_e', Input::old('rh_6_7_2_e',isset($question->rh_6_7_2_e)?$question->rh_6_7_2_e:''),array('min'=>0,'id'=>'rh_6_7_2_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['rh_6_7_2_e'])) !!}
                                @if ($errors->first('rh_6_7_2_e'))
                                    <div class="alert alert-danger">{!! $errors->first('rh_6_7_2_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="rh_6_7_2" value="{{$question->rh_6_7_2}}">

                            <div class="form-group {!! $errors->first('rh_6_7_3_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">6.7.3</label>
                                {!! Form::text('rh_6_7_3_e', Input::old('rh_6_7_3_e',isset($question->rh_6_7_3_e)?$question->rh_6_7_3_e:''),array('min'=>0,'id'=>'rh_6_7_3_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['rh_6_7_3_e'])) !!}
                                @if ($errors->first('rh_6_7_3_e'))
                                    <div class="alert alert-danger">{!! $errors->first('rh_6_7_3_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="rh_6_7_3" value="{{$question->rh_6_7_3}}">

                            
                        </div>   
                        
                </div>


                 <div class="row">
                        <div class="col-md-8 col-sm-12">
                           
                           <label class="control-label clear">6.8 । {{ @App\Models\Reproductive::questionText()['rh_6_8']}}</label>
                            
                            <div class="form-group {!! $errors->first('rh_6_8_1_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">6.8.1</label>
                                {!! Form::text('rh_6_8_1_e', Input::old('rh_6_8_1_e',isset($question->rh_6_8_1_e)?$question->rh_6_8_1_e:''),array('min'=>0,'id'=>'rh_6_8_1_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['rh_6_8_1_e'])) !!}
                                @if ($errors->first('rh_6_8_1_e'))
                                    <div class="alert alert-danger">{!! $errors->first('rh_6_8_1_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="rh_6_8_1" value="{{$question->rh_6_8_1}}">

                            <div class="form-group {!! $errors->first('rh_6_8_2_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">6.8.2</label>
                                {!! Form::text('rh_6_8_2_e', Input::old('rh_6_8_2_e',isset($question->rh_6_8_2_e)?$question->rh_6_8_2_e:''),array('min'=>0,'id'=>'rh_6_8_2_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['rh_6_8_2_e'])) !!}
                                @if ($errors->first('rh_6_8_2_e'))
                                    <div class="alert alert-danger">{!! $errors->first('rh_6_8_2_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="rh_6_8_2" value="{{$question->rh_6_8_2}}">

                            <div class="form-group {!! $errors->first('rh_6_8_3_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">6.8.3</label>
                                {!! Form::text('rh_6_8_3_e', Input::old('rh_6_8_3_e',isset($question->rh_6_8_3_e)?$question->rh_6_8_3_e:''),array('min'=>0,'id'=>'rh_6_8_3_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['rh_6_8_3_e'])) !!}
                                @if ($errors->first('rh_6_8_3_e'))
                                    <div class="alert alert-danger">{!! $errors->first('rh_6_8_3_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="rh_6_8_3" value="{{$question->rh_6_8_3}}">

                            
                        </div>   
                        
                </div>


                <div class="row">
                        <div class="col-md-8 col-sm-12">
                           
                           <label class="control-label clear">6.10 । {{ @App\Models\Reproductive::questionText()['rh_6_10']}}</label>
                            
                            <div class="form-group {!! $errors->first('rh_6_10_1_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">6.10.1</label>
                                {!! Form::text('rh_6_10_1_e', Input::old('rh_6_10_1_e',isset($question->rh_6_10_1_e)?$question->rh_6_10_1_e:''),array('min'=>0,'id'=>'rh_6_10_1_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['rh_6_10_1_e'])) !!}
                                @if ($errors->first('rh_6_10_1_e'))
                                    <div class="alert alert-danger">{!! $errors->first('rh_6_10_1_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="rh_6_10_1" value="{{$question->rh_6_10_1}}">

                            <div class="form-group {!! $errors->first('rh_6_10_2_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">6.10.2</label>
                                {!! Form::text('rh_6_10_2_e', Input::old('rh_6_10_2_e',isset($question->rh_6_10_2_e)?$question->rh_6_10_2_e:''),array('min'=>0,'id'=>'rh_6_10_2_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['rh_6_10_2_e'])) !!}
                                @if ($errors->first('rh_6_10_2_e'))
                                    <div class="alert alert-danger">{!! $errors->first('rh_6_10_2_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="rh_6_10_2" value="{{$question->rh_6_10_2}}">

                            <div class="form-group {!! $errors->first('rh_6_10_3_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">6.10.3</label>
                                {!! Form::text('rh_6_10_3_e', Input::old('rh_6_10_3_e',isset($question->rh_6_10_3_e)?$question->rh_6_10_3_e:''),array('min'=>0,'id'=>'rh_6_10_3_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['rh_6_10_3_e'])) !!}
                                @if ($errors->first('rh_6_10_3_e'))
                                    <div class="alert alert-danger">{!! $errors->first('rh_6_10_3_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="rh_6_10_3" value="{{$question->rh_6_10_3}}">

                            
                        </div>   
                        
                </div>


                <div class="row">
                        <div class="col-md-8 col-sm-12">
                           
                           <label class="control-label clear">6.11 । {{ @App\Models\Reproductive::questionText()['rh_6_11']}}</label>
                            
                            <div class="form-group {!! $errors->first('rh_6_11_1_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">6.11.1</label>
                                {!! Form::text('rh_6_11_1_e', Input::old('rh_6_11_1_e',isset($question->rh_6_11_1_e)?$question->rh_6_11_1_e:''),array('min'=>0,'id'=>'rh_6_11_1_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['rh_6_11_1_e'])) !!}
                                @if ($errors->first('rh_6_11_1_e'))
                                    <div class="alert alert-danger">{!! $errors->first('rh_6_11_1_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="rh_6_11_1" value="{{$question->rh_6_11_1}}">

                            <div class="form-group {!! $errors->first('rh_6_11_2_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">6.11.2</label>
                                {!! Form::text('rh_6_11_2_e', Input::old('rh_6_11_2_e',isset($question->rh_6_11_2_e)?$question->rh_6_11_2_e:''),array('min'=>0,'id'=>'rh_6_11_2_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['rh_6_11_2_e'])) !!}
                                @if ($errors->first('rh_6_11_2_e'))
                                    <div class="alert alert-danger">{!! $errors->first('rh_6_11_2_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="rh_6_11_2" value="{{$question->rh_6_11_2}}">

                            <div class="form-group {!! $errors->first('rh_6_11_3_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">6.11.4</label>
                                {!! Form::text('rh_6_11_3_e', Input::old('rh_6_11_3_e',isset($question->rh_6_11_3_e)?$question->rh_6_11_3_e:''),array('min'=>0,'id'=>'rh_6_11_3_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['rh_6_11_3_e'])) !!}
                                @if ($errors->first('rh_6_11_3_e'))
                                    <div class="alert alert-danger">{!! $errors->first('rh_6_11_3_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="rh_6_11_3" value="{{$question->rh_6_11_3}}">

                            
                        </div>   
                        
                </div>

                <div class="row">
                        <div class="col-md-8 col-sm-12">
                           
                            
                            <div class="form-group {!! $errors->first('rh_6_13_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">6.13। {{ @App\Models\Reproductive::questionText()['rh_6_13']}}</label>
                                {!! Form::text('rh_6_13_e', Input::old('rh_6_13_e',isset($question->rh_6_13_e)?$question->rh_6_13_e:''),array('id'=>'rh_6_13_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['rh_6_13_e'])) !!}
                                @if ($errors->first('rh_6_13_e'))
                                    <div class="alert alert-danger">{!! $errors->first('rh_6_13_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="rh_6_13" value="{{$question->rh_6_13}}">

                            
                        </div>   
                        
                </div>



                <div class="row">
                        <div class="col-md-8 col-sm-12">
                           
                           <label class="control-label clear">7.4 । {{ @App\Models\Reproductive::questionText()['bc_7_4']}}</label>
                            
                            <div class="form-group {!! $errors->first('bc_7_4_1_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">7.4.1</label>
                                {!! Form::text('bc_7_4_1_e', Input::old('bc_7_4_1_e',isset($question->bc_7_4_1_e)?$question->bc_7_4_1_e:''),array('min'=>0,'id'=>'bc_7_4_1_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['bc_7_4_1_e'])) !!}
                                @if ($errors->first('bc_7_4_1_e'))
                                    <div class="alert alert-danger">{!! $errors->first('bc_7_4_1_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="bc_7_4_1" value="{{$question->bc_7_4_1}}">

                            <div class="form-group {!! $errors->first('bc_7_4_2_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">7.4.2</label>
                                {!! Form::text('bc_7_4_2_e', Input::old('bc_7_4_2_e',isset($question->bc_7_4_2_e)?$question->bc_7_4_2_e:''),array('min'=>0,'id'=>'bc_7_4_2_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['bc_7_4_2_e'])) !!}
                                @if ($errors->first('bc_7_4_2_e'))
                                    <div class="alert alert-danger">{!! $errors->first('bc_7_4_2_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="bc_7_4_2" value="{{$question->bc_7_4_2}}">

                            <div class="form-group {!! $errors->first('bc_7_4_3_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">7.4.3</label>
                                {!! Form::text('bc_7_4_3_e', Input::old('bc_7_4_3_e',isset($question->bc_7_4_3_e)?$question->bc_7_4_3_e:''),array('min'=>0,'id'=>'bc_7_4_3_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['bc_7_4_3_e'])) !!}
                                @if ($errors->first('bc_7_4_3_e'))
                                    <div class="alert alert-danger">{!! $errors->first('bc_7_4_3_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="bc_7_4_3" value="{{$question->bc_7_4_3}}">


                            <div class="form-group {!! $errors->first('bc_7_4_4_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">7.4.4</label>
                                {!! Form::text('bc_7_4_4_e', Input::old('bc_7_4_4_e',isset($question->bc_7_4_4_e)?$question->bc_7_4_4_e:''),array('min'=>0,'id'=>'bc_7_4_4_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['bc_7_4_4_e'])) !!}
                                @if ($errors->first('bc_7_4_4_e'))
                                    <div class="alert alert-danger">{!! $errors->first('bc_7_4_4_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="bc_7_4_4" value="{{$question->bc_7_4_4}}">

                            
                        </div>   
                        
                </div>


                <div class="row">
                        <div class="col-md-8 col-sm-12">
                           
                           <label class="control-label clear">7.5 । {{ @App\Models\Reproductive::questionText()['bc_7_5']}}</label>
                            
                            <div class="form-group {!! $errors->first('bc_7_5_1_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">7.5.1</label>
                                {!! Form::text('bc_7_5_1_e', Input::old('bc_7_5_1_e',isset($question->bc_7_5_1_e)?$question->bc_7_5_1_e:''),array('min'=>0,'id'=>'bc_7_5_1_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['bc_7_5_1_e'])) !!}
                                @if ($errors->first('bc_7_5_1_e'))
                                    <div class="alert alert-danger">{!! $errors->first('bc_7_5_1_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="bc_7_5_1" value="{{$question->bc_7_5_1}}">

                            <div class="form-group {!! $errors->first('bc_7_5_2_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">7.5.2</label>
                                {!! Form::text('bc_7_5_2_e', Input::old('bc_7_5_2_e',isset($question->bc_7_5_2_e)?$question->bc_7_5_2_e:''),array('min'=>0,'id'=>'bc_7_5_2_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['bc_7_5_2_e'])) !!}
                                @if ($errors->first('bc_7_5_2_e'))
                                    <div class="alert alert-danger">{!! $errors->first('bc_7_5_2_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="bc_7_5_2" value="{{$question->bc_7_5_2}}">

                            <div class="form-group {!! $errors->first('bc_7_5_3_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">7.5.3</label>
                                {!! Form::text('bc_7_5_3_e', Input::old('bc_7_5_3_e',isset($question->bc_7_5_3_e)?$question->bc_7_5_3_e:''),array('min'=>0,'id'=>'bc_7_5_3_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['bc_7_5_3_e'])) !!}
                                @if ($errors->first('bc_7_5_3_e'))
                                    <div class="alert alert-danger">{!! $errors->first('bc_7_5_3_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="bc_7_5_3" value="{{$question->bc_7_5_3}}">

                            
                        </div>   
                        
                </div>


                <div class="row">
                        <div class="col-md-8 col-sm-12">
                           
                           <label class="control-label clear">7.7 । {{ @App\Models\Reproductive::questionText()['bc_7_7']}}</label>
                            
                            <div class="form-group {!! $errors->first('bc_7_7_1_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">7.7.1</label>
                                {!! Form::text('bc_7_7_1_e', Input::old('bc_7_7_1_e',isset($question->bc_7_7_1_e)?$question->bc_7_7_1_e:''),array('min'=>0,'id'=>'bc_7_7_1_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['bc_7_7_1_e'])) !!}
                                @if ($errors->first('bc_7_7_1_e'))
                                    <div class="alert alert-danger">{!! $errors->first('bc_7_7_1_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="bc_7_7_1" value="{{$question->bc_7_7_1}}">

                            <div class="form-group {!! $errors->first('bc_7_7_2_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">7.7.2</label>
                                {!! Form::text('bc_7_7_2_e', Input::old('bc_7_7_2_e',isset($question->bc_7_7_2_e)?$question->bc_7_7_2_e:''),array('min'=>0,'id'=>'bc_7_7_2_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['bc_7_7_2_e'])) !!}
                                @if ($errors->first('bc_7_7_2_e'))
                                    <div class="alert alert-danger">{!! $errors->first('bc_7_7_2_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="bc_7_7_2" value="{{$question->bc_7_7_2}}">

                            <div class="form-group {!! $errors->first('bc_7_7_3_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">7.7.3</label>
                                {!! Form::text('bc_7_7_3_e', Input::old('bc_7_7_3_e',isset($question->bc_7_7_3_e)?$question->bc_7_7_3_e:''),array('min'=>0,'id'=>'bc_7_7_3_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['bc_7_7_3_e'])) !!}
                                @if ($errors->first('bc_7_7_3_e'))
                                    <div class="alert alert-danger">{!! $errors->first('bc_7_7_3_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="bc_7_7_3" value="{{$question->bc_7_7_3}}">


                            <div class="form-group {!! $errors->first('bc_7_7_4_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">7.7.4</label>
                                {!! Form::text('bc_7_7_4_e', Input::old('bc_7_7_4_e',isset($question->bc_7_7_4_e)?$question->bc_7_7_4_e:''),array('min'=>0,'id'=>'bc_7_7_4_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['bc_7_7_4_e'])) !!}
                                @if ($errors->first('bc_7_7_4_e'))
                                    <div class="alert alert-danger">{!! $errors->first('bc_7_7_4_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="bc_7_7_4" value="{{$question->bc_7_7_4}}">

                            
                        </div>   
                        
                </div>


                <div class="row">
                        <div class="col-md-8 col-sm-12">
                           
                           <label class="control-label clear">7.8 । {{ @App\Models\Reproductive::questionText()['bc_7_8']}}</label>
                            
                            <div class="form-group {!! $errors->first('bc_7_8_1_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">7.8.1</label>
                                {!! Form::text('bc_7_8_1_e', Input::old('bc_7_8_1_e',isset($question->bc_7_8_1_e)?$question->bc_7_8_1_e:''),array('min'=>0,'id'=>'bc_7_8_1_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['bc_7_8_1_e'])) !!}
                                @if ($errors->first('bc_7_8_1_e'))
                                    <div class="alert alert-danger">{!! $errors->first('bc_7_8_1_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="bc_7_8_1" value="{{$question->bc_7_8_1}}">

                            <div class="form-group {!! $errors->first('bc_7_8_2_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">7.8.2</label>
                                {!! Form::text('bc_7_8_2_e', Input::old('bc_7_8_2_e',isset($question->bc_7_8_2_e)?$question->bc_7_8_2_e:''),array('min'=>0,'id'=>'bc_7_8_2_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['bc_7_8_2_e'])) !!}
                                @if ($errors->first('bc_7_8_2_e'))
                                    <div class="alert alert-danger">{!! $errors->first('bc_7_8_2_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="bc_7_8_2" value="{{$question->bc_7_8_2}}">

                            <div class="form-group {!! $errors->first('bc_7_8_3_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">7.8.3</label>
                                {!! Form::text('bc_7_8_3_e', Input::old('bc_7_8_3_e',isset($question->bc_7_8_3_e)?$question->bc_7_8_3_e:''),array('min'=>0,'id'=>'bc_7_8_3_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['bc_7_8_3_e'])) !!}
                                @if ($errors->first('bc_7_8_3_e'))
                                    <div class="alert alert-danger">{!! $errors->first('bc_7_8_3_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="bc_7_8_3" value="{{$question->bc_7_8_3}}">

                            
                        </div>   
                        
                </div>


                 <div class="row">
                        <div class="col-md-8 col-sm-12">
                           
                           <label class="control-label clear">7.10 । {{ @App\Models\Reproductive::questionText()['bc_7_10']}}</label>
                            
                            <div class="form-group {!! $errors->first('bc_7_10_1_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">7.10.1</label>
                                {!! Form::text('bc_7_10_1_e', Input::old('bc_7_10_1_e',isset($question->bc_7_10_1_e)?$question->bc_7_10_1_e:''),array('min'=>0,'id'=>'bc_7_10_1_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['bc_7_10_1_e'])) !!}
                                @if ($errors->first('bc_7_10_1_e'))
                                    <div class="alert alert-danger">{!! $errors->first('bc_7_10_1_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="bc_7_10_1" value="{{$question->bc_7_10_1}}">

                            <div class="form-group {!! $errors->first('bc_7_10_2_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">7.10.2</label>
                                {!! Form::text('bc_7_10_2_e', Input::old('bc_7_10_2_e',isset($question->bc_7_10_2_e)?$question->bc_7_10_2_e:''),array('min'=>0,'id'=>'bc_7_10_2_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['bc_7_10_2_e'])) !!}
                                @if ($errors->first('bc_7_10_2_e'))
                                    <div class="alert alert-danger">{!! $errors->first('bc_7_10_2_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="bc_7_10_2" value="{{$question->bc_7_10_2}}">

                            <div class="form-group {!! $errors->first('bc_7_10_3_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">7.10.3</label>
                                {!! Form::text('bc_7_10_3_e', Input::old('bc_7_10_3_e',isset($question->bc_7_10_3_e)?$question->bc_7_10_3_e:''),array('min'=>0,'id'=>'bc_7_10_3_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['bc_7_10_3_e'])) !!}
                                @if ($errors->first('bc_7_10_3_e'))
                                    <div class="alert alert-danger">{!! $errors->first('bc_7_10_3_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="bc_7_10_3" value="{{$question->bc_7_10_3}}">

                            
                        </div>   
                        
                </div>


                <div class="row">
                        <div class="col-md-8 col-sm-12">
                           
                           <label class="control-label clear">7.12 । {{ @App\Models\Reproductive::questionText()['bc_7_12']}}</label>
                            
                            <div class="form-group {!! $errors->first('bc_7_12_1_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">7.12.1</label>
                                {!! Form::text('bc_7_12_1_e', Input::old('bc_7_12_1_e',isset($question->bc_7_12_1_e)?$question->bc_7_12_1_e:''),array('min'=>0,'id'=>'bc_7_12_1_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['bc_7_12_1_e'])) !!}
                                @if ($errors->first('bc_7_12_1_e'))
                                    <div class="alert alert-danger">{!! $errors->first('bc_7_12_1_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="bc_7_12_1" value="{{$question->bc_7_12_1}}">

                            <div class="form-group {!! $errors->first('bc_7_12_2_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">7.12.2</label>
                                {!! Form::text('bc_7_12_2_e', Input::old('bc_7_12_2_e',isset($question->bc_7_12_2_e)?$question->bc_7_12_2_e:''),array('min'=>0,'id'=>'bc_7_12_2_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['bc_7_12_2_e'])) !!}
                                @if ($errors->first('bc_7_12_2_e'))
                                    <div class="alert alert-danger">{!! $errors->first('bc_7_12_2_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="bc_7_12_2" value="{{$question->bc_7_12_2}}">

                            <div class="form-group {!! $errors->first('bc_7_12_3_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">7.12.3</label>
                                {!! Form::text('bc_7_12_3_e', Input::old('bc_7_12_3_e',isset($question->bc_7_12_3_e)?$question->bc_7_12_3_e:''),array('min'=>0,'id'=>'bc_7_12_3_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['bc_7_12_3_e'])) !!}
                                @if ($errors->first('bc_7_12_3_e'))
                                    <div class="alert alert-danger">{!! $errors->first('bc_7_12_3_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="bc_7_12_3" value="{{$question->bc_7_12_3}}">

                            
                        </div>   
                        
                </div>



                <div class="row">
                        <div class="col-md-8 col-sm-12">
                           
                           <label class="control-label clear">9.6 । {{ @App\Models\Reproductive::questionText()['rprq_9_6']}}</label>
                            
                            <div class="form-group {!! $errors->first('rprq_9_6_1_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">9.6.1</label>
                                {!! Form::text('rprq_9_6_1_e', Input::old('rprq_9_6_1_e',isset($question->rprq_9_6_1_e)?$question->rprq_9_6_1_e:''),array('min'=>0,'id'=>'rprq_9_6_1_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['rprq_9_6_1_e'])) !!}
                                @if ($errors->first('rprq_9_6_1_e'))
                                    <div class="alert alert-danger">{!! $errors->first('rprq_9_6_1_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="rprq_9_6_1" value="{{$question->rprq_9_6_1}}">

                            <div class="form-group {!! $errors->first('rprq_9_6_2_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">9.6.2</label>
                                {!! Form::text('rprq_9_6_2_e', Input::old('rprq_9_6_2_e',isset($question->rprq_9_6_2_e)?$question->rprq_9_6_2_e:''),array('min'=>0,'id'=>'rprq_9_6_2_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['rprq_9_6_2_e'])) !!}
                                @if ($errors->first('rprq_9_6_2_e'))
                                    <div class="alert alert-danger">{!! $errors->first('rprq_9_6_2_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="rprq_9_6_2" value="{{$question->rprq_9_6_2}}">

                            <div class="form-group {!! $errors->first('rprq_9_6_3_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">9.6.3</label>
                                {!! Form::text('rprq_9_6_3_e', Input::old('rprq_9_6_3_e',isset($question->rprq_9_6_3_e)?$question->rprq_9_6_3_e:''),array('min'=>0,'id'=>'rprq_9_6_3_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['rprq_9_6_3_e'])) !!}
                                @if ($errors->first('rprq_9_6_3_e'))
                                    <div class="alert alert-danger">{!! $errors->first('rprq_9_6_3_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="rprq_9_6_3" value="{{$question->rprq_9_6_3}}">

                            
                        </div>   
                        
                </div>


                <div class="row">
                        <div class="col-md-8 col-sm-12">
                           
                           <label class="control-label clear">9.7 । {{ @App\Models\Reproductive::questionText()['rprq_9_7']}}</label>
                            
                            <div class="form-group {!! $errors->first('rprq_9_7_1_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">9.7.1</label>
                                {!! Form::text('rprq_9_7_1_e', Input::old('rprq_9_7_1_e',isset($question->rprq_9_7_1_e)?$question->rprq_9_7_1_e:''),array('min'=>0,'id'=>'rprq_9_7_1_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['rprq_9_7_1_e'])) !!}
                                @if ($errors->first('rprq_9_7_1_e'))
                                    <div class="alert alert-danger">{!! $errors->first('rprq_9_7_1_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="rprq_9_7_1" value="{{$question->rprq_9_7_1}}">

                            <div class="form-group {!! $errors->first('rprq_9_7_2_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">9.7.2</label>
                                {!! Form::text('rprq_9_7_2_e', Input::old('rprq_9_7_2_e',isset($question->rprq_9_7_2_e)?$question->rprq_9_7_2_e:''),array('min'=>0,'id'=>'rprq_9_7_2_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['rprq_9_7_2_e'])) !!}
                                @if ($errors->first('rprq_9_7_2_e'))
                                    <div class="alert alert-danger">{!! $errors->first('rprq_9_7_2_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="rprq_9_7_2" value="{{$question->rprq_9_7_2}}">

                            <div class="form-group {!! $errors->first('rprq_9_7_3_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">9.7.3</label>
                                {!! Form::text('rprq_9_7_3_e', Input::old('rprq_9_7_3_e',isset($question->rprq_9_7_3_e)?$question->rprq_9_7_3_e:''),array('min'=>0,'id'=>'rprq_9_7_3_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['rprq_9_7_3_e'])) !!}
                                @if ($errors->first('rprq_9_7_3_e'))
                                    <div class="alert alert-danger">{!! $errors->first('rprq_9_7_3_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="rprq_9_7_3" value="{{$question->rprq_9_7_3}}">

                            
                        </div>   
                        
                </div>


                <div class="row">
                        <div class="col-md-8 col-sm-12">
                           
                           <label class="control-label clear">9.8 । {{ @App\Models\Reproductive::questionText()['rprq_9_8']}}</label>
                            
                            <div class="form-group {!! $errors->first('rprq_9_8_1_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">9.8.1</label>
                                {!! Form::text('rprq_9_8_1_e', Input::old('rprq_9_8_1_e',isset($question->rprq_9_8_1_e)?$question->rprq_9_8_1_e:''),array('min'=>0,'id'=>'rprq_9_8_1_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['rprq_9_8_1_e'])) !!}
                                @if ($errors->first('rprq_9_8_1_e'))
                                    <div class="alert alert-danger">{!! $errors->first('rprq_9_8_1_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="rprq_9_8_1" value="{{$question->rprq_9_8_1}}">

                            <div class="form-group {!! $errors->first('rprq_9_8_2_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">9.8.2</label>
                                {!! Form::text('rprq_9_8_2_e', Input::old('rprq_9_8_2_e',isset($question->rprq_9_8_2_e)?$question->rprq_9_8_2_e:''),array('min'=>0,'id'=>'rprq_9_8_2_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['rprq_9_8_2_e'])) !!}
                                @if ($errors->first('rprq_9_8_2_e'))
                                    <div class="alert alert-danger">{!! $errors->first('rprq_9_8_2_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="rprq_9_8_2" value="{{$question->rprq_9_8_2}}">

                            <div class="form-group {!! $errors->first('rprq_9_8_3_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">9.8.3</label>
                                {!! Form::text('rprq_9_8_3_e', Input::old('rprq_9_8_3_e',isset($question->rprq_9_8_3_e)?$question->rprq_9_8_3_e:''),array('min'=>0,'id'=>'rprq_9_8_3_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['rprq_9_8_3_e'])) !!}
                                @if ($errors->first('rprq_9_8_3_e'))
                                    <div class="alert alert-danger">{!! $errors->first('rprq_9_8_3_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="rprq_9_8_3" value="{{$question->rprq_9_8_3}}">

                            
                        </div>   
                        
                </div>


                 <div class="row">
                        <div class="col-md-8 col-sm-12">
                           
                           <label class="control-label clear">9.9 । {{ @App\Models\Reproductive::questionText()['rprq_9_9']}}</label>
                            
                            <div class="form-group {!! $errors->first('rprq_9_9_1_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">9.9.1</label>
                                {!! Form::text('rprq_9_9_1_e', Input::old('rprq_9_9_1_e',isset($question->rprq_9_9_1_e)?$question->rprq_9_9_1_e:''),array('min'=>0,'id'=>'rprq_9_9_1_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['rprq_9_9_1_e'])) !!}
                                @if ($errors->first('rprq_9_9_1_e'))
                                    <div class="alert alert-danger">{!! $errors->first('rprq_9_9_1_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="rprq_9_9_1" value="{{$question->rprq_9_9_1}}">

                            <div class="form-group {!! $errors->first('rprq_9_9_2_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">9.9.2</label>
                                {!! Form::text('rprq_9_9_2_e', Input::old('rprq_9_9_2_e',isset($question->rprq_9_9_2_e)?$question->rprq_9_9_2_e:''),array('min'=>0,'id'=>'rprq_9_9_2_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['rprq_9_9_2_e'])) !!}
                                @if ($errors->first('rprq_9_9_2_e'))
                                    <div class="alert alert-danger">{!! $errors->first('rprq_9_9_2_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="rprq_9_9_2" value="{{$question->rprq_9_9_2}}">

                            <div class="form-group {!! $errors->first('rprq_9_9_3_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">9.9.3</label>
                                {!! Form::text('rprq_9_9_3_e', Input::old('rprq_9_9_3_e',isset($question->rprq_9_9_3_e)?$question->rprq_9_9_3_e:''),array('min'=>0,'id'=>'rprq_9_9_3_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['rprq_9_9_3_e'])) !!}
                                @if ($errors->first('rprq_9_9_3_e'))
                                    <div class="alert alert-danger">{!! $errors->first('rprq_9_9_3_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="rprq_9_9_3" value="{{$question->rprq_9_9_3}}">

                            
                        </div>   
                        
                </div>


                <div class="row">
                        <div class="col-md-8 col-sm-12">
                           
                           <label class="control-label clear">10.4 । {{ @App\Models\Reproductive::questionText()['pprq_10_4']}}</label>
                            
                            <div class="form-group {!! $errors->first('pprq_10_4_1_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">10.4.1</label>
                                {!! Form::text('pprq_10_4_1_e', Input::old('pprq_10_4_1_e',isset($question->pprq_10_4_1_e)?$question->pprq_10_4_1_e:''),array('min'=>0,'id'=>'pprq_10_4_1_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['pprq_10_4_1_e'])) !!}
                                @if ($errors->first('pprq_10_4_1_e'))
                                    <div class="alert alert-danger">{!! $errors->first('pprq_10_4_1_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="pprq_10_4_1" value="{{$question->pprq_10_4_1}}">

                            <div class="form-group {!! $errors->first('pprq_10_4_2_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">10.4.2</label>
                                {!! Form::text('pprq_10_4_2_e', Input::old('pprq_10_4_2_e',isset($question->pprq_10_4_2_e)?$question->pprq_10_4_2_e:''),array('min'=>0,'id'=>'pprq_10_4_2_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['pprq_10_4_2_e'])) !!}
                                @if ($errors->first('pprq_10_4_2_e'))
                                    <div class="alert alert-danger">{!! $errors->first('pprq_10_4_2_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="pprq_10_4_2" value="{{$question->pprq_10_4_2}}">

                            <div class="form-group {!! $errors->first('pprq_10_4_3_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">10.4.3</label>
                                {!! Form::text('pprq_10_4_3_e', Input::old('pprq_10_4_3_e',isset($question->pprq_10_4_3_e)?$question->pprq_10_4_3_e:''),array('min'=>0,'id'=>'pprq_10_4_3_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['pprq_10_4_3_e'])) !!}
                                @if ($errors->first('pprq_10_4_3_e'))
                                    <div class="alert alert-danger">{!! $errors->first('pprq_10_4_3_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="pprq_10_4_3" value="{{$question->pprq_10_4_3}}">

                            
                        </div>   
                        
                </div>


                <div class="row">
                        <div class="col-md-8 col-sm-12">
                           
                           <label class="control-label clear">10.5 । {{ @App\Models\Reproductive::questionText()['pprq_10_5']}}</label>
                            
                            <div class="form-group {!! $errors->first('pprq_10_5_1_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">10.5.1</label>
                                {!! Form::text('pprq_10_5_1_e', Input::old('pprq_10_5_1_e',isset($question->pprq_10_5_1_e)?$question->pprq_10_5_1_e:''),array('min'=>0,'id'=>'pprq_10_5_1_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['pprq_10_5_1_e'])) !!}
                                @if ($errors->first('pprq_10_5_1_e'))
                                    <div class="alert alert-danger">{!! $errors->first('pprq_10_5_1_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="pprq_10_5_1" value="{{$question->pprq_10_5_1}}">

                            <div class="form-group {!! $errors->first('pprq_10_5_2_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">10.5.2</label>
                                {!! Form::text('pprq_10_5_2_e', Input::old('pprq_10_5_2_e',isset($question->pprq_10_5_2_e)?$question->pprq_10_5_2_e:''),array('min'=>0,'id'=>'pprq_10_5_2_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['pprq_10_5_2_e'])) !!}
                                @if ($errors->first('pprq_10_5_2_e'))
                                    <div class="alert alert-danger">{!! $errors->first('pprq_10_5_2_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="pprq_10_5_2" value="{{$question->pprq_10_5_2}}">

                            <div class="form-group {!! $errors->first('pprq_10_5_3_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">10.5.3</label>
                                {!! Form::text('pprq_10_5_3_e', Input::old('pprq_10_5_3_e',isset($question->pprq_10_5_3_e)?$question->pprq_10_5_3_e:''),array('min'=>0,'id'=>'pprq_10_5_3_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['pprq_10_5_3_e'])) !!}
                                @if ($errors->first('pprq_10_5_3_e'))
                                    <div class="alert alert-danger">{!! $errors->first('pprq_10_5_3_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="pprq_10_5_3" value="{{$question->pprq_10_5_3}}">

                            
                        </div>   
                        
                </div>


                <div class="row">
                        <div class="col-md-8 col-sm-12">
                           
                           <label class="control-label clear">10.6 । {{ @App\Models\Reproductive::questionText()['pprq_10_6']}}</label>
                            
                            <div class="form-group {!! $errors->first('pprq_10_6_1_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">10.6.1</label>
                                {!! Form::text('pprq_10_6_1_e', Input::old('pprq_10_6_1_e',isset($question->pprq_10_6_1_e)?$question->pprq_10_6_1_e:''),array('min'=>0,'id'=>'pprq_10_6_1_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['pprq_10_6_1_e'])) !!}
                                @if ($errors->first('pprq_10_6_1_e'))
                                    <div class="alert alert-danger">{!! $errors->first('pprq_10_6_1_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="pprq_10_6_1" value="{{$question->pprq_10_6_1}}">

                            <div class="form-group {!! $errors->first('pprq_10_6_2_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">10.6.2</label>
                                {!! Form::text('pprq_10_6_2_e', Input::old('pprq_10_6_2_e',isset($question->pprq_10_6_2_e)?$question->pprq_10_6_2_e:''),array('min'=>0,'id'=>'pprq_10_6_2_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['pprq_10_6_2_e'])) !!}
                                @if ($errors->first('pprq_10_6_2_e'))
                                    <div class="alert alert-danger">{!! $errors->first('pprq_10_6_2_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="pprq_10_6_2" value="{{$question->pprq_10_6_2}}">

                            <div class="form-group {!! $errors->first('pprq_10_6_3_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">10.6.3</label>
                                {!! Form::text('pprq_10_6_3_e', Input::old('pprq_10_6_3_e',isset($question->pprq_10_6_3_e)?$question->pprq_10_6_3_e:''),array('min'=>0,'id'=>'pprq_10_6_3_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['pprq_10_6_3_e'])) !!}
                                @if ($errors->first('pprq_10_6_3_e'))
                                    <div class="alert alert-danger">{!! $errors->first('pprq_10_6_3_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="pprq_10_6_3" value="{{$question->pprq_10_6_3}}">

                            
                        </div>   
                        
                </div>


                <div class="row">
                        <div class="col-md-8 col-sm-12">
                           
                           <label class="control-label clear">10.8 । {{ @App\Models\Reproductive::questionText()['pprq_10_8']}}</label>
                            
                            <div class="form-group {!! $errors->first('pprq_10_8_1_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">10.8.1</label>
                                {!! Form::text('pprq_10_8_1_e', Input::old('pprq_10_8_1_e',isset($question->pprq_10_8_1_e)?$question->pprq_10_8_1_e:''),array('min'=>0,'id'=>'pprq_10_8_1_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['pprq_10_8_1_e'])) !!}
                                @if ($errors->first('pprq_10_8_1_e'))
                                    <div class="alert alert-danger">{!! $errors->first('pprq_10_8_1_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="pprq_10_8_1" value="{{$question->pprq_10_8_1}}">

                            <div class="form-group {!! $errors->first('pprq_10_8_2_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">10.8.2</label>
                                {!! Form::text('pprq_10_8_2_e', Input::old('pprq_10_8_2_e',isset($question->pprq_10_8_2_e)?$question->pprq_10_8_2_e:''),array('min'=>0,'id'=>'pprq_10_8_2_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['pprq_10_8_2_e'])) !!}
                                @if ($errors->first('pprq_10_8_2_e'))
                                    <div class="alert alert-danger">{!! $errors->first('pprq_10_8_2_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="pprq_10_8_2" value="{{$question->pprq_10_8_2}}">

                            <div class="form-group {!! $errors->first('pprq_10_8_3_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">10.8.3</label>
                                {!! Form::text('pprq_10_8_3_e', Input::old('pprq_10_8_3_e',isset($question->pprq_10_8_3_e)?$question->pprq_10_8_3_e:''),array('min'=>0,'id'=>'pprq_10_8_3_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['pprq_10_8_3_e'])) !!}
                                @if ($errors->first('pprq_10_8_3_e'))
                                    <div class="alert alert-danger">{!! $errors->first('pprq_10_8_3_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="pprq_10_8_3" value="{{$question->pprq_10_8_3}}">

                            
                        </div>   
                        
                </div>


                <div class="row">
                        <div class="col-md-8 col-sm-12">
                           
                            
                            <div class="form-group {!! $errors->first('pprq_10_9_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">10.9। {{ @App\Models\Reproductive::questionText()['pprq_10_9']}}</label>
                                {!! Form::text('pprq_10_9_e', Input::old('pprq_10_9_e',isset($question->pprq_10_9_e)?$question->pprq_10_9_e:''),array('id'=>'pprq_10_9_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['pprq_10_9_e'])) !!}
                                @if ($errors->first('pprq_10_9_e'))
                                    <div class="alert alert-danger">{!! $errors->first('pprq_10_9_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="pprq_10_9" value="{{$question->pprq_10_9}}">

                            
                        </div>   
                        
                </div>



                <div class="row">
                        <div class="col-md-8 col-sm-12">
                           
                           <label class="control-label clear">10.10 । {{ @App\Models\Reproductive::questionText()['pprq_10_10']}}</label>
                            
                            <div class="form-group {!! $errors->first('pprq_10_10_1_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">10.10.1</label>
                                {!! Form::text('pprq_10_10_1_e', Input::old('pprq_10_10_1_e',isset($question->pprq_10_10_1_e)?$question->pprq_10_10_1_e:''),array('min'=>0,'id'=>'pprq_10_10_1_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['pprq_10_10_1_e'])) !!}
                                @if ($errors->first('pprq_10_10_1_e'))
                                    <div class="alert alert-danger">{!! $errors->first('pprq_10_10_1_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="pprq_10_10_1" value="{{$question->pprq_10_10_1}}">

                            <div class="form-group {!! $errors->first('pprq_10_10_2_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">10.10.2</label>
                                {!! Form::text('pprq_10_10_2_e', Input::old('pprq_10_10_2_e',isset($question->pprq_10_10_2_e)?$question->pprq_10_10_2_e:''),array('min'=>0,'id'=>'pprq_10_10_2_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['pprq_10_10_2_e'])) !!}
                                @if ($errors->first('pprq_10_10_2_e'))
                                    <div class="alert alert-danger">{!! $errors->first('pprq_10_10_2_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="pprq_10_10_2" value="{{$question->pprq_10_10_2}}">

                            <div class="form-group {!! $errors->first('pprq_10_10_3_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">10.10.3</label>
                                {!! Form::text('pprq_10_10_3_e', Input::old('pprq_10_10_3_e',isset($question->pprq_10_10_3_e)?$question->pprq_10_10_3_e:''),array('min'=>0,'id'=>'pprq_10_10_3_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['pprq_10_10_3_e'])) !!}
                                @if ($errors->first('pprq_10_10_3_e'))
                                    <div class="alert alert-danger">{!! $errors->first('pprq_10_10_3_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="pprq_10_10_3" value="{{$question->pprq_10_10_3}}">

                            
                        </div>   
                        
                </div>

                <div class="row">
                        <div class="col-md-8 col-sm-12">
                           
                            
                            <div class="form-group {!! $errors->first('pprq_10_11_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">10.11। {{ @App\Models\Reproductive::questionText()['pprq_10_11']}}</label>
                                {!! Form::text('pprq_10_11_e', Input::old('pprq_10_11_e',isset($question->pprq_10_11_e)?$question->pprq_10_11_e:''),array('id'=>'pprq_10_11_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['pprq_10_11_e'])) !!}
                                @if ($errors->first('pprq_10_11_e'))
                                    <div class="alert alert-danger">{!! $errors->first('pprq_10_11_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="pprq_10_11" value="{{$question->pprq_10_11}}">

                            
                        </div>   
                        
                </div>

                <div class="row">
                        <div class="col-md-8 col-sm-12">
                           
                            
                            <div class="form-group {!! $errors->first('pprq_10_12_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">10.12। {{ @App\Models\Reproductive::questionText()['pprq_10_12']}}</label>
                                {!! Form::text('pprq_10_12_e', Input::old('pprq_10_12_e',isset($question->pprq_10_12_e)?$question->pprq_10_12_e:''),array('id'=>'pprq_10_12_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['pprq_10_12_e'])) !!}
                                @if ($errors->first('pprq_10_12_e'))
                                    <div class="alert alert-danger">{!! $errors->first('pprq_10_12_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="pprq_10_12" value="{{$question->pprq_10_12}}">

                            
                        </div>   
                        
                </div>


                <div class="row">
                        <div class="col-md-8 col-sm-12">
                           
                           <label class="control-label clear">10.14 । {{ @App\Models\Reproductive::questionText()['pprq_10_14']}}</label>
                            
                            <div class="form-group {!! $errors->first('pprq_10_14_1_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">10.14.1</label>
                                {!! Form::text('pprq_10_14_1_e', Input::old('pprq_10_14_1_e',isset($question->pprq_10_14_1_e)?$question->pprq_10_14_1_e:''),array('min'=>0,'id'=>'pprq_10_14_1_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['pprq_10_14_1_e'])) !!}
                                @if ($errors->first('pprq_10_14_1_e'))
                                    <div class="alert alert-danger">{!! $errors->first('pprq_10_14_1_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="pprq_10_14_1" value="{{$question->pprq_10_14_1}}">

                            <div class="form-group {!! $errors->first('pprq_10_14_2_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">10.14.2</label>
                                {!! Form::text('pprq_10_14_2_e', Input::old('pprq_10_14_2_e',isset($question->pprq_10_14_2_e)?$question->pprq_10_14_2_e:''),array('min'=>0,'id'=>'pprq_10_14_2_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['pprq_10_14_2_e'])) !!}
                                @if ($errors->first('pprq_10_14_2_e'))
                                    <div class="alert alert-danger">{!! $errors->first('pprq_10_14_2_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="pprq_10_14_2" value="{{$question->pprq_10_14_2}}">

                            <div class="form-group {!! $errors->first('pprq_10_14_3_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">10.14.3</label>
                                {!! Form::text('pprq_10_14_3_e', Input::old('pprq_10_14_3_e',isset($question->pprq_10_14_3_e)?$question->pprq_10_14_3_e:''),array('min'=>0,'id'=>'pprq_10_14_3_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['pprq_10_14_3_e'])) !!}
                                @if ($errors->first('pprq_10_14_3_e'))
                                    <div class="alert alert-danger">{!! $errors->first('pprq_10_14_3_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="pprq_10_14_3" value="{{$question->pprq_10_14_3}}">

                            
                        </div>   
                        
                </div>


                <div class="row">
                        <div class="col-md-8 col-sm-12">
                           
                            
                            <div class="form-group {!! $errors->first('pprq_10_15_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">10.15। {{ @App\Models\Reproductive::questionText()['pprq_10_15']}}</label>
                                {!! Form::text('pprq_10_15_e', Input::old('pprq_10_15_e',isset($question->pprq_10_15_e)?$question->pprq_10_15_e:''),array('id'=>'pprq_10_15_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['pprq_10_15_e'])) !!}
                                @if ($errors->first('pprq_10_15_e'))
                                    <div class="alert alert-danger">{!! $errors->first('pprq_10_15_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="pprq_10_15" value="{{$question->pprq_10_15}}">

                            
                        </div>   
                        
                </div>



                <div class="row">
                        <div class="col-md-8 col-sm-12">
                           
                           <label class="control-label clear">10.17 । {{ @App\Models\Reproductive::questionText()['pprq_10_17']}}</label>
                            
                            <div class="form-group {!! $errors->first('pprq_10_17_1_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">10.17.1</label>
                                {!! Form::text('pprq_10_17_1_e', Input::old('pprq_10_17_1_e',isset($question->pprq_10_17_1_e)?$question->pprq_10_17_1_e:''),array('min'=>0,'id'=>'pprq_10_17_1_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['pprq_10_17_1_e'])) !!}
                                @if ($errors->first('pprq_10_17_1_e'))
                                    <div class="alert alert-danger">{!! $errors->first('pprq_10_17_1_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="pprq_10_17_1" value="{{$question->pprq_10_17_1}}">

                            <div class="form-group {!! $errors->first('pprq_10_17_2_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">10.17.2</label>
                                {!! Form::text('pprq_10_17_2_e', Input::old('pprq_10_17_2_e',isset($question->pprq_10_17_2_e)?$question->pprq_10_17_2_e:''),array('min'=>0,'id'=>'pprq_10_17_2_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['pprq_10_17_2_e'])) !!}
                                @if ($errors->first('pprq_10_17_2_e'))
                                    <div class="alert alert-danger">{!! $errors->first('pprq_10_17_2_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="pprq_10_17_2" value="{{$question->pprq_10_17_2}}">

                            <div class="form-group {!! $errors->first('pprq_10_17_3_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">10.17.3</label>
                                {!! Form::text('pprq_10_17_3_e', Input::old('pprq_10_17_3_e',isset($question->pprq_10_17_3_e)?$question->pprq_10_17_3_e:''),array('min'=>0,'id'=>'pprq_10_17_3_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['pprq_10_17_3_e'])) !!}
                                @if ($errors->first('pprq_10_17_3_e'))
                                    <div class="alert alert-danger">{!! $errors->first('pprq_10_17_3_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="pprq_10_17_3" value="{{$question->pprq_10_17_3}}">

                            
                        </div>   
                        
                </div>


                <div class="row">
                        <div class="col-md-8 col-sm-12">
                           
                            
                            <div class="form-group {!! $errors->first('pprq_10_20_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">10.20। {{ @App\Models\Reproductive::questionText()['pprq_10_20']}}</label>
                                {!! Form::text('pprq_10_20_e', Input::old('pprq_10_20_e',isset($question->pprq_10_20_e)?$question->pprq_10_20_e:''),array('id'=>'pprq_10_20_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['pprq_10_20_e'])) !!}
                                @if ($errors->first('pprq_10_20_e'))
                                    <div class="alert alert-danger">{!! $errors->first('pprq_10_20_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="pprq_10_20" value="{{$question->pprq_10_20}}">

                            
                        </div>   
                        
                </div>


                <div class="row">
                        <div class="col-md-8 col-sm-12">
                           
                            
                            <div class="form-group {!! $errors->first('pprq_10_23_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">10.23। {{ @App\Models\Reproductive::questionText()['pprq_10_23']}}</label>
                                {!! Form::text('pprq_10_23_e', Input::old('pprq_10_23_e',isset($question->pprq_10_23_e)?$question->pprq_10_23_e:''),array('id'=>'pprq_10_23_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['pprq_10_23_e'])) !!}
                                @if ($errors->first('pprq_10_23_e'))
                                    <div class="alert alert-danger">{!! $errors->first('pprq_10_23_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="pprq_10_23" value="{{$question->pprq_10_23}}">

                            
                        </div>   
                        
                </div>


                <div class="row">
                        <div class="col-md-8 col-sm-12">
                           
                            
                            <div class="form-group {!! $errors->first('fq_11_4_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">11.4। {{ @App\Models\Reproductive::questionText()['fq_11_4']}}</label>
                                {!! Form::text('fq_11_4_e', Input::old('fq_11_4_e',isset($question->fq_11_4_e)?$question->fq_11_4_e:''),array('id'=>'fq_11_4_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['fq_11_4_e'])) !!}
                                @if ($errors->first('fq_11_4_e'))
                                    <div class="alert alert-danger">{!! $errors->first('fq_11_4_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="fq_11_4" value="{{$question->fq_11_4}}">

                            
                        </div>   
                        
                </div>


                <div class="row">
                        <div class="col-md-8 col-sm-12">
                           
                            
                            <div class="form-group {!! $errors->first('fq_11_5_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">11.5। {{ @App\Models\Reproductive::questionText()['fq_11_5']}}</label>
                                {!! Form::number('fq_11_5_e', Input::old('fq_11_5_e',isset($question->fq_11_5_e)?$question->fq_11_5_e:''),array('min'=>4,'id'=>'fq_11_5_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['fq_11_5_e'])) !!}
                                @if ($errors->first('fq_11_5_e'))
                                    <div class="alert alert-danger">{!! $errors->first('fq_11_5_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="fq_11_5" value="{{$question->fq_11_5}}">

                            
                        </div>   
                        
                </div>


                <div class="row">
                        <div class="col-md-8 col-sm-12">
                           
                            
                            <div class="form-group {!! $errors->first('fq_11_6_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">11.6। {{ @App\Models\Reproductive::questionText()['fq_11_6']}}</label>
                                {!! Form::text('fq_11_6_e', Input::old('fq_11_6_e',isset($question->fq_11_6_e)?$question->fq_11_6_e:''),array('id'=>'fq_11_6_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['fq_11_6_e'])) !!}
                                @if ($errors->first('fq_11_6_e'))
                                    <div class="alert alert-danger">{!! $errors->first('fq_11_6_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="fq_11_6" value="{{$question->fq_11_6}}">

                            
                        </div>   
                        
                </div>


                <div class="row">
                        <div class="col-md-8 col-sm-12">
                           
                            
                            <div class="form-group {!! $errors->first('fq_11_7_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">11.7। {{ @App\Models\Reproductive::questionText()['fq_11_7']}}</label>
                                {!! Form::text('fq_11_7_e', Input::old('fq_11_7_e',isset($question->fq_11_7_e)?$question->fq_11_7_e:''),array('id'=>'fq_11_7_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['fq_11_7_e'])) !!}
                                @if ($errors->first('fq_11_7_e'))
                                    <div class="alert alert-danger">{!! $errors->first('fq_11_7_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="fq_11_7" value="{{$question->fq_11_7}}">

                            
                        </div>   
                        
                </div>


                <div class="row">
                        <div class="col-md-8 col-sm-12">
                           
                           <label class="control-label clear">11.9 । {{ @App\Models\Reproductive::questionText()['fq_11_9']}}</label>
                            
                            <div class="form-group {!! $errors->first('fq_11_9_1_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">11.9.1</label>
                                {!! Form::text('fq_11_9_1_e', Input::old('fq_11_9_1_e',isset($question->fq_11_9_1_e)?$question->fq_11_9_1_e:''),array('min'=>0,'id'=>'fq_11_9_1_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['fq_11_9_1_e'])) !!}
                                @if ($errors->first('fq_11_9_1_e'))
                                    <div class="alert alert-danger">{!! $errors->first('fq_11_9_1_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="fq_11_9_1" value="{{$question->fq_11_9_1}}">

                            <div class="form-group {!! $errors->first('fq_11_9_2_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">11.9.2</label>
                                {!! Form::text('fq_11_9_2_e', Input::old('fq_11_9_2_e',isset($question->fq_11_9_2_e)?$question->fq_11_9_2_e:''),array('min'=>0,'id'=>'fq_11_9_2_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['fq_11_9_2_e'])) !!}
                                @if ($errors->first('fq_11_9_2_e'))
                                    <div class="alert alert-danger">{!! $errors->first('fq_11_9_2_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="fq_11_9_2" value="{{$question->fq_11_9_2}}">

                            <div class="form-group {!! $errors->first('fq_11_9_3_e')?'has-error':'' !!} clear">
                                <label class="control-label clear">11.9.3</label>
                                {!! Form::text('fq_11_9_3_e', Input::old('fq_11_9_3_e',isset($question->fq_11_9_3_e)?$question->fq_11_9_3_e:''),array('min'=>0,'id'=>'fq_11_9_3_e','class' => 'form-control','placeholder'=>@App\Models\Reproductive::questionText()['fq_11_9_3_e'])) !!}
                                @if ($errors->first('fq_11_9_3_e'))
                                    <div class="alert alert-danger">{!! $errors->first('fq_11_9_3_e') !!}</div>@endif
                            </div>

                            <input type="hidden" name="fq_11_9_3" value="{{$question->fq_11_9_3}}">

                            
                        </div>   
                        
                </div>









                        
                        <div class="col-md-12">

                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                                <a href="{{ url()->previous() }}" class="btn btn-sm btn-primary">Back</a>
                                
                            </div>
                        </div>

                        {{ Form::close() }}
                    
                </div>
            </div>  <!-- end panel -->
        </div>
    </div>
    
@stop
