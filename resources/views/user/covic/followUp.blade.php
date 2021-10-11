@extends('layouts/master')
@section('content')
    <style>
        .table > tbody > tr > td, .table > tbody > tr > th, .table > tfoot > tr > td, .table > tfoot > tr > th, .table > thead > tr > td, .table > thead > tr > th {
            border: none;
            padding: 5px;
        }

        .table div {
            height: 23px;
        }
    </style>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-3">
                            {{$pageTitle}}
                        </div>
                        
                    </div>
                </div>
                
                


                <div class="panel-body" id="panel-body">
                    <div class="col-md-12 col-sm-12">
                        @if($info)
                        <table class="table table-bordered" align="center">
                            <tbody>
                            <tr style="text-align: center;border: 1px solid;font-weight: 600;">
                                <td colspan="2" > EPI CONTACT INFORMATION </td>
                            </tr>
                            <tr  style="border: 1px solid;">
                                <td> Sl</td>
                                <td>{!! @$info->id !!}</td>
                            </tr>


                            
                            
                            <tr  style="border: 1px solid;">
                                <td> মোবাইল নং</td>
                                <td>{!! @$info->mobile_no !!}</td>
                            </tr>

                            @php
                            $covic = $info->covicdata($info->mobile_no);
                            @endphp
                            @if($covic)
                            <tr style="text-align: center;border: 1px solid;font-weight: 600;">
                                <td colspan="2"> DETAILS INFORMATION</td>
                            </tr>
                            
                            
                            <tr  style="border: 1px solid;">
                                <td>Name of Person:</td>
                                <td>{!! $covic->name !!}</td>
                            </tr>
                            @endif
                            
                            
                            </tbody>
                        </table>
                        @endif

                        

                       
                        

                       

                        
                    </div>

                    @if($info)
                    <div class="col-md-12 col-sm-12">
                        
                    	{!! Form::open(array('url' => session('access').'covic/followup/'.$info->id,'id'=>'form','method' =>'post')) !!}


                    	<table class="table table-bordered" align="center">

                            <tbody>
                                <tr>
                                    <th>{{ @App\Models\FollowUp::questionText()['fever'] }}</th>
                                    <td>
                                        {!! @App\Common::radioButtonGenerate(\App\Models\FollowUp::getYesNo(), 'fever',0,$info->fever, false) !!}
                                    </td>

                                    <th>{{ @App\Models\FollowUp::questionText()['fever_on_set'] }}  </th>
                                    <td>  

                                    {!! Form::date('fever_on_set', Input::old('fever_on_set',isset($info->fever_on_set)?$info->fever_on_set:''),array('id'=>'fever_on_set','class' => 'form-control','placeholder'=>@App\Models\FollowUp::questionText()['fever_on_set'])) !!}
                                    </td>


                                    <th>{{ @App\Models\FollowUp::questionText()['fever_cessation'] }}  </th> 
                                    <td> 

                                    {!! Form::date('fever_cessation', Input::old('fever_cessation',isset($info->fever_cessation)?$info->fever_cessation:''),array('id'=>'fever_cessation','class' => 'form-control','placeholder'=>@App\Models\FollowUp::questionText()['fever_cessation'])) !!}
                                    </td>
                                </tr>

                                <tr>
                                    <th>{{ @App\Models\FollowUp::questionText()['cough']}}</th>
                                    <td>
                                        {!! @App\Common::radioButtonGenerate(\App\Models\FollowUp::getYesNo(), 'cough',0,$info->cough, false) !!}
                                    </td>

                                    <th>{{ @App\Models\FollowUp::questionText()['cough_on_set'] }}</th>
                                    <td>     

                                    {!! Form::date('cough_on_set', Input::old('cough_on_set',isset($info->cough_on_set)?$info->cough_on_set:''),array('id'=>'cough_on_set','class' => 'form-control','placeholder'=>@App\Models\FollowUp::questionText()['cough_on_set'])) !!}
                                    </td>

                                    <th>{{ @App\Models\FollowUp::questionText()['cough_cessation'] }}  </th>
                                    <td>  

                                    {!! Form::date('cough_cessation', Input::old('cough_cessation',isset($info->cough_cessation)?$info->cough_cessation:''),array('id'=>'cough_cessation','class' => 'form-control','placeholder'=>@App\Models\FollowUp::questionText()['cough_cessation'])) !!}
                                    </td>
                                </tr>


                                <tr>
                                    <th>{{ @App\Models\FollowUp::questionText()['respiratory_distress']}}</th>
                                    <td>
                                        {!! @App\Common::radioButtonGenerate(\App\Models\FollowUp::getYesNo(), 'respiratory_distress',0,$info->respiratory_distress, false) !!}

                                    </td>

                                    <th>{{ @App\Models\FollowUp::questionText()['respiratory_distress_on_set'] }}</th>
                                    <td>
                                    {!! Form::date('respiratory_distress_on_set', Input::old('respiratory_distress_on_set',isset($info->respiratory_distress_on_set)?$info->respiratory_distress_on_set:''),array('id'=>'respiratory_distress_on_set','class' => 'form-control','placeholder'=>@App\Models\FollowUp::questionText()['respiratory_distress_on_set'])) !!}

                                    </td>

                                    <th>{{ @App\Models\FollowUp::questionText()['respiratory_distress_cessation'] }}</th>
                                    <td>
                                    {!! Form::date('respiratory_distress_cessation', Input::old('respiratory_distress_cessation',isset($info->respiratory_distress_cessation)?$info->respiratory_distress_cessation:''),array('id'=>'respiratory_distress_cessation','class' => 'form-control','placeholder'=>@App\Models\FollowUp::questionText()['respiratory_distress_cessation'])) !!}
                                    </td>
                                </tr>


                                <tr>
                                    <th>{{ @App\Models\FollowUp::questionText()['sore_throat']}}</th>
                                    <td>
                                        {!! @App\Common::radioButtonGenerate(\App\Models\FollowUp::getYesNo(), 'sore_throat',0,$info->sore_throat, false) !!}

                                    </td>

                                    <th>{{ @App\Models\FollowUp::questionText()['sore_throat_on_set'] }}</th>    

                                    <td>
                                    {!! Form::date('sore_throat_on_set', Input::old('sore_throat_on_set',isset($info->sore_throat_on_set)?$info->sore_throat_on_set:''),array('id'=>'sore_throat_on_set','class' => 'form-control','placeholder'=>@App\Models\FollowUp::questionText()['sore_throat_on_set'])) !!}
                                    </td>

                                    <th>{{ @App\Models\FollowUp::questionText()['sore_throat_cessation'] }}  </th>  
                                    <td>
                                    {!! Form::date('sore_throat_cessation', Input::old('sore_throat_cessation',isset($info->sore_throat_cessation)?$info->sore_throat_cessation:''),array('id'=>'sore_throat_cessation','class' => 'form-control','placeholder'=>@App\Models\FollowUp::questionText()['sore_throat_cessation'])) !!}
                                    </td>
                                </tr>

                                <tr>
                                    <th>{{ @App\Models\FollowUp::questionText()['email']}}</th>
                                    <td class="col-md-4">
                        

                                    {!! Form::email('email', Input::old('email',isset($info->email)?$info->email:''),array('id'=>'email','class' => 'form-control','placeholder'=>@App\Models\FollowUp::questionText()['email'])) !!}
                                    </td>
                                


                               
                                    <th>{{ @App\Models\FollowUp::questionText()['address']}}</th>
                                    <td class="col-md-5">
                        

                                    {!! Form::text('address', Input::old('address',isset($info->address)?$info->address:''),array('id'=>'address','class' => 'form-control','placeholder'=>@App\Models\FollowUp::questionText()['address'])) !!}
                                    </td>
                                </tr>

                                


                            </tbody>
                        </table>

                        <table class="table table-bordered" align="center" id="family">
                            <tr>
                                <th class="text-center" colspan="5">Family Information</th>
                            </tr>
                            <tr class="family_var">
                                <td>
                                <table class="table table-bordered">
                                <tr>
                                    <th>{{ @App\Models\FollowUp::questionText()['name']}}</th>
                                    <td class="col-md-3">
                        

                                    {!! Form::text('name', Input::old('address',isset($info->name)?$info->name:''),array('id'=>'name','class' => 'form-control','placeholder'=>@App\Models\FollowUp::questionText()['name'],'data-name-format'=>"fu[%d][name]")) !!}
                                    </td>

                                    <th>{{ @App\Models\FollowUp::questionText()['age']}}</th>
                                    <td>
                        

                                    {!! Form::number('age', Input::old('address',''),array('id'=>'age','min'=>0,'class' => 'form-control','placeholder'=>@App\Models\FollowUp::questionText()['age'],'data-name-format'=>"fu[%d][age]")) !!}
                                    </td>
                                    <th>{{ @App\Models\FollowUpContact::questionText()['mobile_no']}}</th>
                                    <td>
                        

                                    {!! Form::text('mobile_no', Input::old('mobile_no',''),array('id'=>'mobile_no','class' => 'form-control','placeholder'=>@App\Models\FollowUp::questionText()['mobile_no'],'data-name-format'=>"fu[%d][mobile_no]")) !!}
                                    </td>
                                </tr>
                                <tr>

                                    <th>{{ @App\Models\FollowUp::questionText()['fever'] }}</th>
                                    <td class="col-md-3">
                                        {!! @App\Common::radioButtonGenerate(\App\Models\FollowUp::getYesNo(), 'fever',0,$info->fever, false,'data-id-format="fu[%d][fever]" data-name-format="fu[%d][fever]"') !!}
                                    </td>

                                    <th>{{ @App\Models\FollowUp::questionText()['fever_on_set'] }}  </th>
                                    <td>  

                                    {!! Form::date('fever_on_set', Input::old('fever_on_set',isset($info->fever_on_set)?$info->fever_on_set:''),array('id'=>'fever_on_set','class' => 'form-control','placeholder'=>@App\Models\FollowUp::questionText()['fever_on_set'],'data-name-format'=>"fu[%d][fever_on_set]")) !!}
                                    </td>


                                    <th>{{ @App\Models\FollowUp::questionText()['fever_cessation'] }}  </th> 
                                    <td> 

                                    {!! Form::date('fever_cessation', Input::old('fever_cessation',isset($info->fever_cessation)?$info->fever_cessation:''),array('id'=>'fever_cessation','class' => 'form-control','placeholder'=>@App\Models\FollowUp::questionText()['fever_cessation'],'data-name-format'=>"fu[%d][fever_cessation]")) !!}
                                    </td>
                                </tr>

                                <tr>
                                    <th>{{ @App\Models\FollowUp::questionText()['cough']}}</th>
                                    <td class="col-md-3">
                                        {!! @App\Common::radioButtonGenerate(\App\Models\FollowUp::getYesNo(), 'cough',0,$info->cough, false,'data-id-format="cough[%d]" data-name-format="fu[%d][cough]"') !!}
                                    </td>

                                    <th>{{ @App\Models\FollowUp::questionText()['cough_on_set'] }}</th>
                                    <td>     

                                    {!! Form::date('cough_on_set', Input::old('cough_on_set',isset($info->cough_on_set)?$info->cough_on_set:''),array('id'=>'cough_on_set','class' => 'form-control','placeholder'=>@App\Models\FollowUp::questionText()['cough_on_set'],'data-name-format'=>"fu[%d][cough_on_set]")) !!}
                                    </td>

                                    <th>{{ @App\Models\FollowUp::questionText()['cough_cessation'] }}  </th>
                                    <td>  

                                    {!! Form::date('cough_cessation', Input::old('cough_cessation',isset($info->cough_cessation)?$info->cough_cessation:''),array('id'=>'cough_cessation','class' => 'form-control','placeholder'=>@App\Models\FollowUp::questionText()['cough_cessation'],'data-name-format'=>"fu[%d][cough_cessation]")) !!}
                                    </td>
                                </tr>


                                <tr>
                                    <th>{{ @App\Models\FollowUp::questionText()['respiratory_distress']}}</th>
                                    <td class="col-md-3"> 
                                        {!! @App\Common::radioButtonGenerate(\App\Models\FollowUp::getYesNo(), 'respiratory_distress',0,$info->respiratory_distress, false,'data-id-format="respiratory_distress[%d]" data-name-format="fu[%d][respiratory_distress]"') !!}

                                    </td>

                                    <th>{{ @App\Models\FollowUp::questionText()['respiratory_distress_on_set'] }}</th>
                                    <td>
                                    {!! Form::date('respiratory_distress_on_set', Input::old('respiratory_distress_on_set',isset($info->respiratory_distress_on_set)?$info->respiratory_distress_on_set:''),array('id'=>'respiratory_distress_on_set','class' => 'form-control','placeholder'=>@App\Models\FollowUp::questionText()['respiratory_distress_on_set'],'data-name-format'=>"fu[%d][respiratory_distress_on_set]")) !!}

                                    </td>

                                    <th>{{ @App\Models\FollowUp::questionText()['respiratory_distress_cessation'] }}</th>
                                    <td>
                                    {!! Form::date('respiratory_distress_cessation', Input::old('respiratory_distress_cessation',isset($info->respiratory_distress_cessation)?$info->respiratory_distress_cessation:''),array('id'=>'respiratory_distress_cessation','class' => 'form-control','placeholder'=>@App\Models\FollowUp::questionText()['respiratory_distress_cessation'],'data-name-format'=>"fu[%d][respiratory_distress_cessation]")) !!}
                                    </td>
                                </tr>


                                <tr>
                                    <th>{{ @App\Models\FollowUp::questionText()['sore_throat']}}</th>
                                    <td class="col-md-3">
                                        {!! @App\Common::radioButtonGenerate(\App\Models\FollowUp::getYesNo(), 'sore_throat',0,$info->sore_throat, false,'data-id-format="sore_throat[%d]" data-name-format="fu[%d][sore_throat]"') !!}

                                    </td>

                                    <th>{{ @App\Models\FollowUp::questionText()['sore_throat_on_set'] }}</th>    

                                    <td>
                                    {!! Form::date('sore_throat_on_set', Input::old('sore_throat_on_set',isset($info->sore_throat_on_set)?$info->sore_throat_on_set:''),array('id'=>'sore_throat_on_set','class' => 'form-control','placeholder'=>@App\Models\FollowUp::questionText()['sore_throat_on_set'],'data-name-format'=>"fu[%d][sore_throat_on_set]")) !!}
                                    </td>

                                    <th>{{ @App\Models\FollowUp::questionText()['sore_throat_cessation'] }}  </th>  
                                    <td>
                                    {!! Form::date('sore_throat_cessation', Input::old('sore_throat_cessation',isset($info->sore_throat_cessation)?$info->sore_throat_cessation:''),array('id'=>'sore_throat_cessation','class' => 'form-control','placeholder'=>@App\Models\FollowUp::questionText()['sore_throat_cessation'],'data-name-format'=>"fu[%d][sore_throat_cessation]")) !!}
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="5" class="text-right">
                                        <button class="family_del btn btn-danger"><span class="fa fa-close"></span></button>
                                    </td>
                                </tr>

                                

                                


                            
                            </table>
                            </td>    
                                
                            </tr>


                        </table>
                        <table class="table table-bordered">
                            <tr>
                                <th colspan="2" class="text-center">
                                    
                                    <button type="button" class="btn btn-info family_add"><span class="fa fa-plus"></span></button>
                                </th>
                            </tr>

                        </table>


                        <table class="table table-bordered" align="center" id="contact">
                            <tr>
                                <th class="text-center" colspan="5">Contacted Information</th>
                            </tr>
                            <tr class="contact_var">
                                <td>
                                <table class="table table-bordered">


                                
                                <tr>
                                    <th>{{ @App\Models\FollowUpContact::questionText()['name']}}</th>
                                    <td>
                        

                                    {!! Form::text('name', Input::old('address',isset($info->name)?$info->name:''),array('id'=>'name','class' => 'form-control','placeholder'=>@App\Models\FollowUpContact::questionText()['name'],'data-name-format'=>"fc[%d][name]")) !!}
                                    </td>


                                    <th>{{ @App\Models\FollowUpContact::questionText()['mobile_no']}}</th>
                                    <td>
                        

                                    {!! Form::text('mobile_no', Input::old('mobile_no',''),array('id'=>'mobile_no','class' => 'form-control','placeholder'=>@App\Models\FollowUpContact::questionText()['mobile_no'],'data-name-format'=>"fc[%d][mobile_no]")) !!}
                                    </td>


                                </tr>

                                    
                                <tr>
                                    <td colspan="5" class="text-right">
                                        <button class="contact_del btn btn-danger"><span class="fa fa-close"></span></button>
                                    </td>
                                </tr>

                                

                                


                            
                            </table>
                            </td>    
                                
                            </tr>


                        </table>

                        <table class="table table-bordered">
                            <tr>
                                <th colspan="2" class="text-center">
                                    
                                    <button type="button" class="btn btn-info contact_add"><span class="fa fa-plus"></span></button>
                                </th>
                            </tr>

                        </table>
                        <table class="table table-bordered">
                            
                            <tr>
                                    <th colspan="2" class="text-right">
                                        <input type="submit" name="submit" value="Save" class="btn btn-info">

                                    </th>
                                </tr>
                            
                        </table>



                    	{{ Form::close() }}
                        
                        
                    </div>
                    @endif

                    
                </div>

            </div>
        </div>
    </div>

    @push('rscripts')
    <script src="{{URL::to('resources/assets/js/covic/add-input-area.min.js')}}"></script>

    <script type="text/javascript">
        /* top one */
        
        $("[type='radio']").change(function () {

            e = $(this);
            
            dateEnabled(e);
        }); 

        $("[type='date']").each(function() {
            e = $(this);
            e.attr('disabled', 'disabled');
        });
        /* Tabuler input */

        

        $('#family').addInputArea()
        .on('change', "[type='radio']", function() {
            e = $(this);
            dateEnabledBulk(e);
            //console.log(e);

        });

        $('#contact').addInputArea();
        
        function dateEnabledBulk(e){

            on_set = e.attr('name').replace(/(])$/,'_on_set]');     on_set = "[name='"+on_set+"']";
            cessation = e.attr('name').replace(/(])$/,'_cessation]');
            cessation = "[name='"+cessation+"']";
            if(e.val() == 1){
                $(on_set).removeAttr('disabled');
                $(cessation).removeAttr('disabled');
            }else{
                $(on_set).attr('disabled', 'disabled');
                $(cessation).attr('disabled', 'disabled');
            }
        }
        
        

        function dateEnabled(e){
            on_set = "[name='"+e.attr('name')+"_on_set']";
            cessation = "[name='"+e.attr('name')+"_cessation']";
            if(e.val() == 1){
                $(on_set).removeAttr('disabled');
                $(cessation).removeAttr('disabled');
            }else{
                $(on_set).attr('disabled', 'disabled');
                $(cessation).attr('disabled', 'disabled');
            }
        }
    </script>

    @endpush
    
    
    
@stop
