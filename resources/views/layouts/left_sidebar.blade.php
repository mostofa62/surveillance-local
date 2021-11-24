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
                <a href="{{URL::to(session('access').'rammps/callInitiate')}}">
                    <i class="fa fa-plus"></i> 
                    <span class="hide-menu">Call Initiate</span>
                </a>
            </li>
            {{--
            <li>
                <a href="{{URL::to(session('access').'rammps/missing')}}">
                    <i class="fa fa-list"></i> 
                    <span class="hide-menu">Call Initiate</span>
                </a>
            </li>
            --}}
           
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