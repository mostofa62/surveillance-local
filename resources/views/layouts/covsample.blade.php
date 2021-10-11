<?php $settings = \App\Setting::first();?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <!-- Apple devices fullscreen -->
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <!-- Apple devices fullscreen -->
    <meta names="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
    <meta name="description" content="<?=$settings->name?>">
    <meta name="author" content="Bitspeck Solutions">
    <link rel="shortcut icon" href="{{URL::to('resources/assets/theme/img/favicon.ico')}}"/>
    <!-- Apple devices Homescreen icon -->
    <link rel="apple-touch-icon-precomposed" href="{{URL::to('resources/assets/theme/img/logo.png')}}"/>
    <title>{{$pageTitle}}</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{URL::to('resources/assets/ampleadmin/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="{{URL::to('resources/assets/ampleadmin/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css')}}"
          rel="stylesheet">
    <!-- animation CSS -->
    {{-- <link href="{{URL::to('resources/assets/ampleadmin/css/animate.css')}}" rel="stylesheet"> --}}
    <link href="{{asset('resources/assets/ampleadmin/css/animate.css')}}" rel="stylesheet">
    <!--alerts CSS -->
    <link href="{{URL::to('resources/assets/ampleadmin/plugins/bower_components/sweetalert/sweetalert.css')}}" rel="stylesheet" type="text/css">
    <!-- Custom CSS -->
    <link href="{{URL::to('resources/assets/ampleadmin/css/style.css')}}" rel="stylesheet">
    <link href="{{URL::to('resources/assets/zoverseas-style.css')}}" rel="stylesheet">
    <link href="{{URL::to('resources/assets/css/search.css')}}" rel="stylesheet">
    <link href="{{URL::to('resources/assets/css/range_slider.css')}}" rel="stylesheet">
    <style>
        .btn-group > a {
            color: #ffffff !important;
        }
    </style>
    <!-- color CSS -->
    <link href="{{URL::to('resources/assets/ampleadmin/css/colors/blue-dark.css')}}" id="theme" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css"/>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    {{--select2--}}
    {{--<link rel="stylesheet" href="{{URL::to('resources/assets/theme/css/plugins/select2/select2.css')}}">--}}
    {{--<link rel="stylesheet" href="{{URL::to('resources/assets/theme/css/plugins/icheck/all.css')}}">--}}
    {{--<link rel="stylesheet" href="{{URL::to('resources/assets/theme/css/plugins/chosen/chosen.css')}}">--}}
    <link href="{{URL::to('resources/assets/ampleadmin/plugins/bower_components/custom-select/custom-select.css')}}"
          rel="stylesheet" type="text/css"/>
    <!-- Datepicker Timepicker -->
    {{--<link rel="stylesheet" href="{{URL::to('resources/assets/theme/css/plugins/timepicker/bootstrap-timepicker.min.css')}}">--}}
    {{--<link rel="stylesheet" href="{{URL::to('resources/assets/theme/css/plugins/datepicker/datepicker.css')}}">--}}

    <link href="{{URL::to('resources/assets/ampleadmin/plugins/bower_components/clockpicker/dist/jquery-clockpicker.min.css')}}"
          rel="stylesheet">
    <link href="{{URL::to('resources/assets/ampleadmin/plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.css')}}"
          rel="stylesheet" type="text/css"/>
    <!-- Daterange picker plugins css -->
    <link href="{{URL::to('resources/assets/ampleadmin/plugins/bower_components/timepicker/bootstrap-timepicker.min.css')}}"
          rel="stylesheet">
    <link href="{{URL::to('resources/assets/ampleadmin/plugins/bower_components/bootstrap-daterangepicker/daterangepicker.css')}}"
          rel="stylesheet">
    <!-- Morris CSS -->
    <link href="{{URL::to('resources/assets/ampleadmin/plugins/bower_components/morrisjs/morris.css')}}" rel="stylesheet">
    <!-- jQuery -->
    <script src="{{URL::to('resources/assets/ampleadmin/plugins/bower_components/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="{{URL::to('resources/assets/ampleadmin/bootstrap/dist/js/bootstrap.min.js')}}"></script>

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="fix-header">

<!-- ============================================================== -->
<!-- Preloader -->
<!-- ============================================================== -->
<div class="preloader">
    <svg class="circular" viewBox="25 25 50 50">
        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/>
    </svg>
</div>
<!-- ============================================================== -->
<!-- Wrapper -->
<!-- ============================================================== -->
<div id="wrapper">
    <!-- ============================================================== -->
    <!-- Topbar header - style you can find in pages.scss -->
    <!-- ============================================================== -->
    {{--
    <nav class="navbar navbar-default navbar-static-top m-b-0" style="padding-left:0">
        <div class="navbar-header" style="height: 80px;">
            <div class="top-left-part">
                <!-- Logo -->
                <a class="logo" href="{{URL::to(session('access').'dashboard')}}">
                    <!-- Logo icon image, you can use font-icon also --><b>
                        <!--This is dark logo icon--><img src="{{URL::to($settings->logo)}}" alt="home" width="65"
                                                          class="dark-logo"/><!--This is light logo icon--><img
                                src="{{URL::to('resources/assets/logo.png')}}" alt="Z" class="light-logo"/>
                    </b>
                </a>
            </div>
            <!-- /Logo -->
            <!-- Search input and Toggle icon -->
            <ul class="nav navbar-top-links navbar-left">
                <li><a href="javascript:void(0)" class="open-close waves-effect waves-light visible-xs"><i
                                class="ti-close ti-menu"></i></a></li>

                <br>
                <div class="text-center ">
                    &nbsp;

                </div>

            </ul>
            <ul class="nav navbar-top-links navbar-right pull-right">

                <li class="dropdown">
                            @if (Auth::check())
                                <a href="{{ url(session('access').'dashboard') }}">
                                    <i class="mdi mdi-check-circle"></i>
                                    <label class="active-language-select">Dashboard</label>
                                    <div class="notify"><span class="heartbit"></span> <span class="point"></span></div>
                                </a>
                            @else
                                <a href="{!! url('login') !!}">
                                    <i class="mdi mdi-check-circle"></i>
                                    <label class="active-language-select">Login</label>
                                    <div class="notify"><span class="heartbit"></span> <span class="point"></span></div>
                                </a>
                            @endif
                </li>

                <!-- /.dropdown -->
            </ul>
        </div>
        <!-- /.navbar-header -->
        <!-- /.navbar-top-links -->
        <!-- /.navbar-static-side -->
    </nav> --}}
    <!-- End Top Navigation -->
    <!-- ============================================================== -->
    <!-- Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
<!-- ============================================================== -->
    <!-- End Left Sidebar -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page Content -->
    <!-- ============================================================== -->

    <div id="page-wrapper" style="margin:0;">
        <div class="container-fluid">
            {{--}
            <div class="row bg-title">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h4 class="page-title">{{$pageTitle}}</h4>
                </div>
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <div class="breadcrumb ">
                        <ul>
                            @foreach($breadcamps as $key => $link)
                                <li>
                                    <a href="{{$link}}">{{$key}}</a>
                                    <i class="fa fa-angle-right"></i>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            --}}
            {{--
            <div class="jumbotron text-center">
              <img src="http://119.148.17.100:8080/amr/images/iedcr.jpg" width="50px" height="50px">
              <h3>{{$pageTitle}}</h3>
              <p>Information at a glance</p> 
            </div>
            --}}
            <div class="row">
                <div class="col-md-12">

                    @yield('content')   {{--page main content--}}
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
        <footer class="footer text-center">
            <div><?php //$settings->footer?></div>
            <label>Copyright © <?= date('Y') ?></label>
            <span class="font-grey-4">| Powered by</span>
            <a href="https://www.iedcr.gov.bd/">IEDCR</a>
        </footer>
    </div>
    <!-- ============================================================== -->
    <!-- End Page Content -->
    <!-- ============================================================== -->
</div>
<!-- /#wrapper -->
<script src="{{URL::to('resources/assets/js/search.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/alasql/0.3.7/alasql.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.9.2/xlsx.core.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>

<!-- Menu Plugin JavaScript -->
<script src="{{URL::to('resources/assets/ampleadmin/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js')}}"></script>
<!--slimscroll JavaScript -->
<script src="{{URL::to('resources/assets/ampleadmin/js/jquery.slimscroll.js')}}"></script>
<!--Wave Effects -->
<script src="{{URL::to('resources/assets/ampleadmin/js/waves.js')}}"></script>
<!--Counter js -->
<script src="{{URL::to('resources/assets/ampleadmin/plugins/bower_components/waypoints/lib/jquery.waypoints.js')}}"></script>
<script src="{{URL::to('resources/assets/ampleadmin/plugins/bower_components/counterup/jquery.counterup.min.js')}}"></script>
<!-- Custom Theme JavaScript -->
<script src="{{URL::to('resources/assets/ampleadmin/js/custom.min.js')}}"></script>
<!--Style Switcher -->
<script src="{{URL::to('resources/assets/ampleadmin/plugins/bower_components/styleswitcher/jQuery.style.switcher.js')}}"></script>
<!--  select2 -->
{{--<script src="{{URL::to('resources/assets/theme/js/plugins/select2/select2.min.js')}}"></script>--}}
{{--<script src="{{URL::to('resources/assets/theme/js/plugins/icheck/jquery.icheck.min.js')}}"></script>--}}
{{--<script src="{{URL::to('resources/assets/theme/js/plugins/chosen/chosen.jquery.min.js')}}"></script>--}}
<script src="{{URL::to('resources/assets/ampleadmin/plugins/bower_components/custom-select/custom-select.min.js')}}" type="text/javascript"></script>
<!-- Validation -->
<script src="{{URL::to('resources/assets/theme/js/plugins/validation/jquery.validate.min.js')}}"></script>
{{-- <script src="{{URL::to('resources/assets/theme/js/eakroko.js')}}"></script> --}}
<!-- Plugin JavaScript -->
<script src="{{URL::to('resources/assets/ampleadmin/plugins/bower_components/moment/moment.js')}}"></script>
<!-- Clock Plugin JavaScript -->
<script src="{{URL::to('resources/assets/ampleadmin/plugins/bower_components/clockpicker/dist/jquery-clockpicker.min.js')}}"></script>
<!-- Date Picker Plugin JavaScript -->
<script src="{{URL::to('resources/assets/ampleadmin/plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
<!-- Date range Plugin JavaScript -->
<script src="{{URL::to('resources/assets/ampleadmin/plugins/bower_components/timepicker/bootstrap-timepicker.min.js')}}"></script>

<!--Morris JavaScript -->
<script src="{{URL::to('resources/assets/ampleadmin/plugins/bower_components/raphael/raphael-min.js')}}"></script>
<!-- <script src="{{URL::to('resources/assets/ampleadmin/js/morris-data.js')}}"></script> -->
<script src="{{URL::to('resources/assets/ampleadmin/plugins/bower_components/morrisjs/morris.js')}}"></script>

<script src="{{URL::to('resources/assets/ampleadmin/plugins/bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/alasql/0.3.7/alasql.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.9.2/xlsx.core.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
<script src="{{URL::to('resources/assets/ampleadmin/plugins/bower_components/tinymce/tinymce.min.js')}}"></script>

<!-- Sweet-Alert  -->
<script src="{{URL::to('resources/assets/ampleadmin/plugins/bower_components/sweetalert/sweetalert.min.js')}}"></script>
<script src="{{URL::to('resources/assets/ampleadmin/plugins/bower_components/sweetalert/jquery.sweet-alert.custom.js')}}"></script>
<script src="{{URL::to('resources/assets/ampleadmin/plugins/bower_components/styleswitcher/jQuery.style.switcher.js')}}"></script>


<script>
    $(document).ready(function () {

        if ($("#mymce").length > 0) {
            tinymce.init({
                selector: "textarea#mymce",
                theme: "modern",
                height: 300,
                plugins: [
                    "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker", "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking", "save table contextmenu directionality emoticons template paste textcolor"
                ],
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
            });
        }
    });
</script>
<script>

    // For select 2
    $(document).ready(function () {

        $(".select2").select2();
        // Clock pickers
        $('#single-input, .clockpicker, .timepick').clockpicker({
            placement: 'top',
            align: 'left',
            autoclose: true,
            format: '12',
            'default': 'now'
        });
        $('.clockpicker').clockpicker({
            donetext: 'Done',
        }).find('input').change(function () {
            console.log(this.value);
        });
        // Date Picker
        jQuery('#datepicker-autoclose, .mydatepicker, .datepick').datepicker({
            autoclose: true,
//            pickerPosition: 'bottom-right',
            format: 'yyyy/mm/dd',
            todayHighlight: true,
            container: '.panel-body'
        });
        jQuery('.datepick_custom').datepicker({
            autoclose: true,
            format: 'yyyy/mm/dd',
            todayHighlight: true,
            container: '.panel-body'
        });

        // Daterange picker
        $('.input-daterange-datepicker').daterangepicker({
            buttonClasses: ['btn', 'btn-sm'],
            applyClass: 'btn-danger',
            cancelClass: 'btn-inverse'
        });


        /*$('.input-daterange-timepicker').daterangepicker({
            timePicker: true,
            format: 'MM/DD/YYYY h:mm A',
            timePickerIncrement: 30,
            timePicker12Hour: true,
            timePickerSeconds: false,
            buttonClasses: ['btn', 'btn-sm'],
            applyClass: 'btn-danger',
            cancelClass: 'btn-inverse'
        });*/
    });

    $(document).keypress(
        function(event){
            if (event.which == '13') {
                event.preventDefault();
            }
        });
</script>
@stack('rscripts')
</body>

</html>
