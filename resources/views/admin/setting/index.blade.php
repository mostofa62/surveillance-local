@extends('layouts.master')
@section('content')
    <style>
        /*
*Sirajul
*/

  .margin-20{
    margin-top: 20px;
  }
    </style>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-inverse">
        <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-3">Settings Lists</div>
                        {{--<div class="col-md-7 search-field">
                            {!! Form::open(array('id'=>'form','method' => 'get',  'enctype'=>'multipart/form-data')) !!}

                            <div class="row">
                                <div class="form-group col-md-6">
                                    {!! Form::text('search_text', null, array('class' => 'form-control', 'placeholder' => 'Search...')) !!}
                                </div>
                                <div class="form-group col-md-2">
                                    {!! Form::select('search_type',array('products.name'=>'Name','categories.category_name'=>'Category'),Input::old(), array('id' => 'search_type', 'class' => 'form-control')) !!}
                                </div>
                                <div class="form-group col-md-2">
                                    <button type="submit" class="btn btn-sm btn-info">Search</button>
                                </div>
                            </div>

                            {{ Form::close() }}
                        </div>--}}
                    </div>
                </div>
        
            <div class="panel-body" id="panel-body">
                @if(Session::has('message'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        {{ Session::get('message') }}
                    </div>
                @endif
                <table class="table table-hover color-bordered-table muted-bordered-table table-responsive-sm usertable" align="center" style="border-collapse: initial;">
                    <thead>
                        <th>Id</th>
                        <th>Logo</th>
                        <th> Forget Image </th>
                        <th> Login Image </th>
                        <th> Name</th>
                        <th> Tagline</th>
                        <th> Tax No</th>
                        <th> Footer </th>
                        <th></th>
                    </thead>
                    <tbody>
                    @foreach ($settings as $setting)
                        <tr>
                            <td>{!! @$setting->id !!}</td>
                            <td>
                                <span class="image">
                                    @if(isset($setting->logo) && $setting->logo !="")
                                        <img class="img-rounded m0auto" style="height: 50px; width: 50px;"  src="{{url('public/'.@$setting->logo)}}"/>
                                    @else
                                        <img class="img-rounded m0auto" style="height: 50px; width: 50px;"
                                             src="{{url('/public/uploads/default.jpg')}}"/>
                                    @endif
                                </span>
                            </td>
                            <td>
                                <span class="image">
                                    @if(isset($setting->forgetimage) && $setting->forgetimage !="")
                                        <img class="img-rounded m0auto" style="height: 50px; width: 50px;"  src="{{url('public/'.@$setting->forgetimage)}}"/>
                                    @else
                                        <img class="img-rounded m0auto" style="height: 50px; width: 50px;"
                                             src="{{url('/public/uploads/default.jpg')}}"/>
                                    @endif
                                </span>
                            </td>
                            <td>
                                @if(isset($setting->forgetimage) && $setting->forgetimage !="")
                                        <img class="img-rounded m0auto" style="height: 50px; width: 50px;"  src="{{url('public/'.@$setting->loginimage)}}"/>
                                    @else
                                        <img class="img-rounded m0auto" style="height: 50px; width: 50px;"
                                             src="{{url('/public/uploads/default.jpg')}}"/>
                                    @endif
                            </td>
                            <td>{!! @$setting->name !!}</td>
                            <td>{!! @$setting->address !!}</td>
                            <td>{!! @$setting->tax_no !!}</td>
                            <td>{!! strip_tags(@$setting->footer, "<a><span>");!!}</td>
                            <td class="noPrint">
                                <div class="btn-group">
                                    <a href="{{ URL::to(session('access').'setting/'.$setting->id) }}"
                                       class="btn btn-xs btn-info"><i class="fa fa-info-circle"> </i> </a>
                                    <a href="{{ URL::to(session('access').'setting/'.$setting->id.'/edit') }}" class="btn btn-xs btn-primary"><i class="fa fa-edit"> </i> </a>
                                    {{--@if($product->status == 1)
                                            <button onclick='statusUpdate({{$product->id}},"deactive");' class="btn btn-xs btn-success"><i class="fa fa-ban"></i></button>
                                        @else
                                            <button onclick='statusUpdate({{$product->id}},"active");' class="btn btn-xs btn-danger"><i class="fa fa-check-square-o"></i></button>
                                        @endif--}}
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    /*$(document).ready(function(){
        var codes = null;
        $('a[data-modal]').on('click', function() {
            var productid = $(this).closest('tr').children('td:eq(0)').text();
            var lihtml = "";
            
            $.ajax({
                    type: "get",
                    url : "{{url(session('access').'product/getcodes')}}",
                    data : {
                        product_id: productid
                    },
                    success : function(response){
                        $('#product_code_response').html(response);
                    },
                    error: function(e){
                        console.log(e)
                    }
                });
                $($(this).data('modal')).modal();
              return false;
            });
           
            
           
            
            
    });

            function add_new(e){
                $('.append').append($('#add_new').html());
            }
            function remove_new(e){
                $(e).parent().parent().remove();;
            }
    function statusUpdate(id, status) {
            if (confirm("Are you sure to "+ status +" product?")) {
                $.ajax({
                    url: "{{ URL::to(session('access').'product/status-update') }}" + '/' + id,
                    type: 'POST',
                    data: {_token: "{{ csrf_token() }}", "status":status},
                    success: function (data) {
                        window.location.href = 'product';
                    }
                });
            }
        }*/
</script>
@stop
