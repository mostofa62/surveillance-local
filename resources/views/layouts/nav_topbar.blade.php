<style>
    .navbar-header {
        /*background: #ff7676;*/
        /*background: #00C0E1;*/
    }

    .navbar-header .logo b {
        height: 65px;
    }

    .navbar-header .top-left-part {
        /*width: 260px;*/
        width: auto;
    }

    .navbar-header .navbar-top-links > li > a {
        height: 65px;
    }

    .navbar-header .company {
        font-weight: bold;
    }

    .app-search button {
        position: absolute;
        top: 20px;
        right: 10px;
        color: #4c5667;
    }
</style>

<nav class="navbar navbar-default navbar-static-top m-b-0">
    <div class="navbar-header">
        <div class="top-left-part">
            <!-- Logo -->
            <a class="logo" href="{{URL::to(session('access').'dashboard')}}">
                <!-- Logo icon image, you can use font-icon also --><b>
                    <!--This is dark logo icon--><img src="{{URL::to($settings->logo)}}" alt="home" width="65"
                                                      class="dark-logo"/><!--This is light logo icon--><img
                            src="{{URL::to('resources/assets/logo.png')}}" alt="Z" class="light-logo"/>
                </b>
                <span class="hidden-xs company">{{$settings->name}}</span>
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
                <a class="dropdown-toggle waves-effect waves-light " data-toggle="dropdown" href="javascript:void(0)">
                    <i class="mdi mdi-check-circle"></i>
                    <label class="active-language-select"></label>
                    <div class="notify"><span class="heartbit"></span> <span class="point"></span></div>
                </a>
                <ul class="dropdown-menu mailbox animated bounceInDown">
                    <div class="text-center ">
                        <li>
                            <button style="width: 100%" class="btn btn-default <?php if (session('language') == "bn") echo 'active active-language';?>" onclick="updateSession('bn')">Bangla</button>
                        </li>
                        <li>
                            <button style="width: 100%" class="btn btn-default <?php if (session('language') == "en") echo 'active active-language';?>" onclick="updateSession('en')">English</button>
                        </li>
                    </div>
                </ul>
            </li>

            @if((basename(request()->path())=="dashboard" || basename(request()->path())=="home") && session('access')=="admin/")
            <li class="dropdown">
                <a class="dropdown-toggle waves-effect waves-light " data-toggle="dropdown" href="javascript:void(0)">
                    <i class="mdi mdi-check-circle"></i>
                    <label class="active-project-select"></label>
                    <div class="notify"><span class="heartbit"></span> <span class="point"></span></div>
                </a>
                <ul class="dropdown-menu mailbox animated bounceInDown">
                    <div class="text-center ">
                        @foreach(\App\Project::pluck('name', 'id') as $key=>$value)
                        <li>
                            <button style="width: 100%" class="btn btn-default <?php if (session('project_id') == $key) echo 'active active-project';?>" onclick="updateProjectSession('{{$key}}')">{{$value}}</button>
                        </li>
                        @endforeach
                    </div>
                </ul>
            </li>
            @endif
            {{--notification..............--}}
            <li class="dropdown">
                <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#">
                    @if(isset(Auth::User()->employee->imagefile) && Auth::User()->employee->imagefile !="")
                        <img src="{{url('/public/uploads/'.Auth::User()->employee->imagefile)}}" alt="user-img"
                             width="50" height="50" class="img-circle"/>
                    @else
                        <img src="{{URL::to('resources/assets/theme/img/user/user.jpg')}}" alt="user-img" width="50"
                             class="img-circle"/>
                    @endif
                    <b class="hidden-xs"><?php echo \Auth::User()->username; ?></b><span class="caret"></span>
                </a>
                <ul class="dropdown-menu dropdown-user animated flipInY">
                    <li>
                        <div class="dw-user-box">
                            <div class="u-img">
                                @if(isset(Auth::User()->employee->imagefile) && Auth::User()->employee->imagefile !="")
                                    <img src="{{url('/public/uploads/'.Auth::User()->employee->imagefile)}}" alt="user"
                                         style="height: 90px; width: 90px;"/>
                                @else
                                    <img src="{{URL::to('resources/assets/theme/img/user/user.jpg')}}" alt="user"
                                         style="height: 90px; width: 90px;"/>
                                @endif
                            </div>
                            <div class="u-text">
                                <h4>{{Auth::User()->username}}</h4>
                                <p class="text-muted">{{Auth::User()->employee->email}}</p><a
                                        href="{{URL::to(session('access').'profile')}}"
                                        class="btn btn-rounded btn-danger btn-sm">View Profile</a></div>
                        </div>
                    </li>
                    <li role="separator" class="divider"></li>
                    <li><a href="{{URL::to(session('access').'profile')}}"><i class="ti-user"></i> My Profile</a></li>
                    <li><a href="{{URL::to(session('access').'change-password')}}"><i class="ti-wallet"></i> Change
                            Password</a></li>
                    {{--<li role="separator" class="divider"></li>--}}
                    {{--<li><a href="#"><i class="ti-settings"></i> Account Setting</a></li>--}}
                    <li role="separator" class="divider"></li>
                    <li><a href="{{URL::to(session('access').'logout')}}"><i class="fa fa-power-off"></i> Logout</a>
                    </li>
                </ul>
                <!-- /.dropdown-user -->
            </li>
            <!-- /.dropdown -->
        </ul>
    </div>
    <!-- /.navbar-header -->
    <!-- /.navbar-top-links -->
    <!-- /.navbar-static-side -->
</nav>

<script>


    function updateSession(language) {
        $.ajax({
            type: "get",
            url: "{{url(session('access').'select-language')}}",
            data: {
                language: language
            },
            success: function (response) {
                location.reload(true);
            },

            error: function (e) {
                console.log(e)
            }
        });
    }
    function updateProjectSession(project_id) {
        $.ajax({
            type: "get",
            url: "{{url(session('access').'select-project')}}",
            data: {
                project_id: project_id
            },
            success: function (response) {
                location.reload(true);
            },

            error: function (e) {
                console.log(e)
            }
        });
    }

    $(document).ready(function () {
        $(".active-language-select").html($(".active-language").html());
    });
    $(document).ready(function () {
        $(".active-project-select").html($(".active-project").html());
    });
</script>