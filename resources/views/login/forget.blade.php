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
    <!-- Morris CSS -->
    <link href="{{URL::to('resources/assets/ampleadmin/plugins/bower_components/morrisjs/morris.css')}}" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="{{URL::to('resources/assets/ampleadmin/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css')}}" rel="stylesheet">
    <!-- animation CSS -->
    <link href="{{URL::to('resources/assets/ampleadmin/css/animate.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{URL::to('resources/assets/ampleadmin/css/style.css')}}" rel="stylesheet">
    <link href="{{URL::to('resources/assets/zoverseas-style.css')}}" rel="stylesheet">
    <!-- color CSS -->
    <link href="{{URL::to('resources/assets/ampleadmin/css/colors/blue-dark.css')}}" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    {{--select2--}}
    {{--<link rel="stylesheet" href="{{URL::to('resources/assets/theme/css/plugins/select2/select2.css')}}">--}}
    {{--<link rel="stylesheet" href="{{URL::to('resources/assets/theme/css/plugins/icheck/all.css')}}">--}}
    {{--<link rel="stylesheet" href="{{URL::to('resources/assets/theme/css/plugins/chosen/chosen.css')}}">--}}
    <link href="{{URL::to('resources/assets/ampleadmin/plugins/bower_components/custom-select/custom-select.css')}}" rel="stylesheet" type="text/css" />
    <!-- Datepicker Timepicker -->
    {{--<link rel="stylesheet" href="{{URL::to('resources/assets/theme/css/plugins/timepicker/bootstrap-timepicker.min.css')}}">--}}
    {{--<link rel="stylesheet" href="{{URL::to('resources/assets/theme/css/plugins/datepicker/datepicker.css')}}">--}}

    <link href="{{URL::to('resources/assets/ampleadmin/plugins/bower_components/clockpicker/dist/jquery-clockpicker.min.css')}}" rel="stylesheet">
    <link href="{{URL::to('resources/assets/ampleadmin/plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Daterange picker plugins css -->
    <link href="{{URL::to('resources/assets/ampleadmin/plugins/bower_components/timepicker/bootstrap-timepicker.min.css')}}" rel="stylesheet">
    <link href="{{URL::to('resources/assets/ampleadmin/plugins/bower_components/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
    <style>
        .text-muted a{
            color: white;
        }
        .text-muted a:hover{
            color: deepskyblue;
        }
        .new-login-register .lg-info-panel{
            background: url({{URL::to($settings->forgetimage)}}) center center/cover no-repeat!important;
            width: 45%;
        }
        @media (max-width: 1350px){
            .new-login-register .lg-info-panel {
                width: 450px;
            }
        }
        .new-login-register .lg-info-panel .lg-content {
            margin-top: 75%;
        }
        .checkbox input[type=checkbox] {
            width: 120px;
        }
    </style>
</head>
<body >
    <div class="preloader">
      <div class="cssload-speeding-wheel"></div>
    </div>
    <section id="wrapper" class="new-login-register">
          <div class="lg-info-panel">
              <div class="inner-panel">
                  <a href="javascript:void(0)" class="p-20 di">
                      <img src="{{URL::to($settings->logo)}}" style="width:80px;height: 80px;">
                      <span style="color: white;font-size: 25px;"><?=$settings->name?></span>
                  </a>
                  <div class="lg-content">
                      <h2></h2>
                      <p class="text-muted">
                          <label>Copyright © <?= date('Y') ?></label>
                          <span class="font-grey-4">|</span>
                          <?=$settings->footer?>
                          <span class="font-grey-4">| Powered by</span>
                          <a href="http://www.bitspeck.com/">Bitspeck</a>
                      </p>
                  </div>
              </div>
          </div>
          <div class="new-login-box">
                <div class="white-box">
                    <div class="text-left">
                        <a href="{{ url('/') }}">
                            <i class="mdi mdi-check-circle"></i>Home
                        </a>
                    </div>
                    <h2 class="box-title m-b-0">Sign In to <?=$settings->name?> -Web Application</h2>
                    @if(Session::has('message'))
                        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                    @endif
                    <form action="{{URL::to('forgot-password')}}" method='POST' class='form-validate' id="test">
                        <h3>Recover Password</h3>
                        <p class="text-muted">Enter your Username and instructions will be sent to your email! </p>
                        <div class="form-group">
                            <div class="email controls">
                                <input type="text" name='username' placeholder="Username" class='form-control' data-rule-required="true">
                            </div>
                        </div>
                        <div class="form-group">
                            <a href="{{URL::to('login')}}" class="text-dark pull-right"><i class="fa fa-lock m-r-5"></i>Back to Login</a>
                        </div>
                        <div class="submit">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Reset</button>
                        </div>
                    </form>
                </div>
          </div>
    </section>

    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="{{URL::to('resources/assets/ampleadmin/plugins/bower_components/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="{{URL::to('resources/assets/ampleadmin/bootstrap/dist/js/bootstrap.min.js')}}"></script>
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
    <!-- Chart JS -->
{{--    <script src="{{URL::to('resources/assets/ampleadmin/plugins/bower_components/Chart.js/chartjs.init.js')}}"></script>--}}
    <script src="{{URL::to('resources/assets/ampleadmin/plugins/bower_components/Chart.js/Chart.min.js')}}"></script>
    <!--Style Switcher -->
    <script src="{{URL::to('resources/assets/ampleadmin/plugins/bower_components/styleswitcher/jQuery.style.switcher.js')}}"></script>
     <!--  select2 -->
    {{--<script src="{{URL::to('resources/assets/theme/js/plugins/select2/select2.min.js')}}"></script>--}}
    {{--<script src="{{URL::to('resources/assets/theme/js/plugins/icheck/jquery.icheck.min.js')}}"></script>--}}
    {{--<script src="{{URL::to('resources/assets/theme/js/plugins/chosen/chosen.jquery.min.js')}}"></script>--}}
    <script src="{{URL::to('resources/assets/ampleadmin/plugins/bower_components/custom-select/custom-select.min.js')}}" type="text/javascript"></script>

    <!-- Validation -->
    <script src="{{URL::to('resources/assets/theme/js/plugins/validation/jquery.validate.min.js')}}"></script>
    <script src="{{URL::to('resources/assets/theme/js/eakroko.js')}}"></script>
    <!-- Plugin JavaScript -->
    <script src="{{URL::to('resources/assets/ampleadmin/plugins/bower_components/moment/moment.js')}}"></script>
    <!-- Clock Plugin JavaScript -->
    <script src="{{URL::to('resources/assets/ampleadmin/plugins/bower_components/clockpicker/dist/jquery-clockpicker.min.js')}}"></script>
    <!-- Date Picker Plugin JavaScript -->
    <script src="{{URL::to('resources/assets/ampleadmin/plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
    <!-- Date range Plugin JavaScript -->
    <script src="{{URL::to('resources/assets/ampleadmin/plugins/bower_components/timepicker/bootstrap-timepicker.min.js')}}"></script>
    <script src="{{URL::to('resources/assets/ampleadmin/plugins/bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>

</body>
</html>
