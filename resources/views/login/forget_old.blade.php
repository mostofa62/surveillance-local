<!doctype html>
<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <!-- Apple devices fullscreen -->
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <!-- Apple devices fullscreen -->
        <meta names="apple-mobile-web-app-status-bar-style" content="black-translucent" />

        <title>{{$pageTitle}}</title>
        <meta name="description" content="MESSBASA is an application where you can manage your Mess/Flat. Specially It's been design for Mess Members. You may also use it to manage your Flat. It's a web Application and Mobile Apps will coming soon. 
        The main features of the System are Mill order, To-let, Manage Flat/Mess,Add Member,Add Shopping(Mill) cost ,Add monthly bill ,Calculate Bill,Add Receipt and etc. More Features will include. Keep Clam, Enjoy MMS.
        আপনি যদি মানুষের to-let দেখতে চান তাহলে-">
        <!-- Bootstrap -->
        <link rel="stylesheet" href="{{URL::to('resources/assets/theme/css/bootstrap.min.css')}}">
        <!-- icheck -->
        <link rel="stylesheet" href="{{URL::to('resources/assets/theme/css/plugins/icheck/all.css')}}">
        <!-- Theme CSS -->
        <link rel="stylesheet" href="{{URL::to('resources/assets/theme/css/style.css')}}">
        <!-- Color CSS -->
        <link rel="stylesheet" href="{{URL::to('resources/assets/theme/css/themes.css')}}">


        <!-- jQuery -->
        <script src="{{URL::to('resources/assets/theme/js/jquery.min.js')}}"></script>

        <!-- Nice Scroll -->
        <script src="{{URL::to('resources/assets/theme/js/plugins/nicescroll/jquery.nicescroll.min.js')}}"></script>
        <!-- Validation -->
        <script src="{{URL::to('resources/assets/theme/js/plugins/validation/jquery.validate.min.js')}}"></script>
        <script src="{{URL::to('resources/assets/theme/js/plugins/validation/additional-methods.min.js')}}"></script>
        <!-- icheck -->
        <script src="{{URL::to('resources/assets/theme/js/plugins/icheck/jquery.icheck.min.js')}}"></script>
        <!-- Bootstrap -->
        <script src="{{URL::to('resources/assets/theme/js/bootstrap.min.js')}}"></script>
        <script src="{{URL::to('resources/assets/theme/js/eakroko.js')}}"></script>

        <!--[if lte IE 9]>
                <script src="{{URL::to('resources/assets/theme/js/plugins/placeholder/jquery.placeholder.min.js')}}"></script>
                <script>
                        $(document).ready(function() {
                                $('input, textarea').placeholder();
                        });
                </script>
        <![endif]-->


        <!-- Favicon -->
        <link rel="shortcut icon" href="{{URL::to('resources/assets/theme/img/favicon.ico')}}" />
        <!-- Apple devices Homescreen icon -->
        <link rel="apple-touch-icon-precomposed" href="{{URL::to('resources/assets/theme/img/logo.png')}}" />
        <style>
            .login .wrapper {
                width: 400px;
                height: 500px;
                margin: -200px -200px;
                position: absolute;
                left: 50%;
                top: 30%;
            }
        </style>
    </head>

    <body class='login theme-green'>
        <div class="wrapper">
            <h1>
                <a href="/">
                    <img src="{{URL::to('resources/assets/theme/img/logo@2x.png')}}" alt="" class='retina-ready' style="width:100px;height: 100px;text-align:center"></a>
            </h1>
            <div class="login-body">
                <h2>Forget Password</h2>
                @if(Session::has('message'))
                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                @endif
                <form action="{{URL::to('forgot-password')}}" method='POST' class='form-validate' id="test">
                    <div class="form-group">
                        <div class="email controls">
                            <input type="text" name='username' placeholder="Username" class='form-control' data-rule-required="true">
                        </div>
                    </div>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="submit">

                        <input type="submit" value="Forget password" class='btn btn-success'>
                    </div>
                </form>
                <div class="forget">
                    <a href="{{URL::to('login')}}">
                        <span>Login</span>
                    </a>
                </div>
            </div>
            @include('layout.footer')
        </div>


    </body>



</html>
