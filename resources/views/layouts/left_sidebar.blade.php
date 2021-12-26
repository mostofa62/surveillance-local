<style>
#side-menu>li>a {
    padding: 8px 35px 8px 20px;
    font-size: 13px;
}

#side-menu>li>ul>li>a {
    font-size: 13px;
}
</style>

<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav slimscrollsidebar">
        <div class="sidebar-head">
            <h3>
                <span class="fa-fw open-close"><i class="ti-menu hidden-xs"></i><i
                        class="ti-close visible-xs"></i></span> <span class="hide-menu">Navigation</span>
            </h3>
        </div>
        @php $access=session('accesslist_id'); $user_project=session('user')->project_id; @endphp
        <ul class="nav" id="side-menu">

            <li>
                <a href="{{URL::to(session('access').'dashboard')}}">
                    <i class="fa fa-list"></i> 
                    <span class="hide-menu">Dashboard</span>
                </a>
            </li>

            @if(in_array(1,$access) || in_array(2,$access))


            <li>
                <a href="{{URL::to(session('access').'employee')}}" class="waves-effect"><i
                        class="mdi mdi-account fa-fw" data-icon="v"></i> <span class="hide-menu"> Employee <span
                            class="fa arrow"></span> </span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{URL::to(session('access').'employee/create')}}"><i class="fa fa-plus-circle"></i>
                            <span class="hide-menu">Add Employee</span></a>
                    </li>
                    <li>
                        <a href="{{URL::to(session('access').'employee')}}"><i class="fa fa-list-ul"></i> <span
                                class="hide-menu"> List Employee</span></a>
                    </li>
                </ul>
            </li>
            @elseif(in_array(3,$access))

            <li>
                <a href="{{URL::to(session('access').'employee')}}" class="waves-effect"><i
                        class="mdi mdi-account fa-fw" data-icon="v"></i> <span class="hide-menu"> Report <span
                            class="fa arrow"></span> </span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{URL::to(session('access').'rammps/report')}}"><i class="fa fa-plus-circle"></i>
                            <span class="hide-menu">STATISTICS</span></a>
                    </li>
                    <li>
                        <a href="{{URL::to(session('access').'rammps/attendance_report')}}"><i class="fa fa-list-ul"></i> <span
                                class="hide-menu"> ATTENDANCE REPORT</span></a>
                    </li>
                </ul>
            </li>

            @else

            <li style="position: absolute;bottom: 50px;right:20px">
                <a class="btn btn-danger"  onclick="window.localStorage.clear();">
                    <i class="fa fa-minus"></i> 
                    <span class="hide-menu">Clear and Reload</span>
                </a>
            
            </li>
            
            <li>
                <a href="{{URL::to(session('access').'rammps/missing')}}">
                    <i class="fa fa-list"></i> 
                    <span class="hide-menu">Missing Schedules</span>
                </a>
            </li>

            <li>
                <a href="{{URL::to(session('access').'rammps/callInitiate')}}">
                    <i class="fa fa-plus"></i> 
                    <span class="hide-menu">Call Initiate</span>
                </a>
            </li>

            

            @endif
            
            
            
           
            <li class="devider"></li>
           


        </ul>
    </div>
</div>

<script>
// var path = window.location.pathname;
// $("a").click(function () {
//     var href = $(this).attr('href');
//     $(this).closest('a').attr("href", href);
// });

// $(function(){
//     var path = window.location.pathname;
//     $("#parent-a").attr("href", path);
//     alert(path);
// });
</script>