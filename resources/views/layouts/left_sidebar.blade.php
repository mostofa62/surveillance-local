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
                <a href="{{URL::to('/')}}" class="waves-effect"><i
                            class="mdi mdi-av-timer fa-fw"></i> <span class="hide-menu">Public Dashboard</span></a>
            </li>
            <li>
                <a href="{{URL::to(session('access').'dashboard')}}" class="waves-effect"><i
                        class="mdi mdi-av-timer fa-fw"></i> <span class="hide-menu">Dashboard</span></a>
            </li>
            <li class="user-pro">
                <a href="#" class="waves-effect">
                    @if(isset(Auth::User()->employee->imagefile) && Auth::User()->employee->imagefile !="")
                    <img src="{{url('/public/uploads/'.Auth::User()->employee->imagefile)}}" alt="user-img"
                        style="width: 30px; height: 30px; border-radius: 50%;" class="img-circle" />
                    @else
                    <img src="{{URL::to('resources/assets/theme/img/user/user.jpg')}}" alt="user-img"
                        class="img-circle">
                    @endif
                    <span class="hide-menu"> {{Auth::User()->username}}<span class="fa arrow"></span></span>
                </a>
                <ul class="nav nav-second-level ">
                    <li>
                        <a href="{{URL::to(session('access').'profile')}}"><i class="ti-user"></i> <span
                                class="hide-menu">My Profile</span></a>
                    </li>
                    <li>
                        <a href="{{URL::to(session('access').'change-password')}}"><i class="ti-wallet"></i> <span
                                class="hide-menu">Change Password</span></a>
                    </li>
                    <li>
                        <a href="{{URL::to(session('access').'logout')}}"><i class="fa fa-power-off"></i> <span
                                class="hide-menu">Logout</span></a>
                    </li>
                </ul>
            </li>

            {{--Sirajul--}}

            @if(in_array(2,$access))
            <li>
                <a href="{{URL::to(session('access').'setting')}}" class="waves-effect"><i class="fa fa-cog fa-fw"
                        data-icon="v"></i> <span class="hide-menu"> Settings <span class="fa arrow"></span> </span></a>
            </li>

            @endif

            @if(in_array(1,$access) || in_array(2,$access))

                <li>
                    <a href="{{URL::to(session('access').'project')}}" class="waves-effect"><i
                                class="mdi mdi-account-box fa-fw" data-icon="v"></i> <span class="hide-menu"> Projects <span class="fa arrow"></span> </span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{URL::to(session('access').'project/create')}}"><i
                                        class=" glyphicon glyphicon-plus-sign"></i> <span class="hide-menu"> Add Project</span></a>
                        </li>
                        <li>
                            <a href="{{URL::to(session('access').'project')}}"><i
                                        class="glyphicon glyphicon-list"></i> <span class="hide-menu">List Projects</span></a>
                        </li>
                    </ul>
                </li>
            @endif
            @if(in_array(1,$access) || in_array(2,$access))

                <li>
                    <a href="{{URL::to(session('access').'site')}}" class="waves-effect"><i
                                class="mdi mdi-account-box fa-fw" data-icon="v"></i> <span class="hide-menu"> Site <span class="fa arrow"></span> </span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{URL::to(session('access').'site/create')}}"><i
                                        class=" glyphicon glyphicon-plus-sign"></i> <span class="hide-menu"> Add Site</span></a>
                        </li>
                        <li>
                            <a href="{{URL::to(session('access').'site')}}"><i
                                        class="glyphicon glyphicon-list"></i> <span class="hide-menu">List Sites</span></a>
                        </li>
                    </ul>
                </li>
            @endif

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
            @endif

            @if(in_array(1,$access) || in_array(2,$access)||(in_array(5,$access)&&$user_project==3)||(in_array(3,$access)&&$user_project==3))
                <li>
                    <a href="{{URL::to(session('access').'dengue')}}" class="waves-effect"><i
                                class="mdi mdi-account fa-fw" data-icon="v"></i> <span class="hide-menu"> Dengue Patient<span
                                    class="fa arrow"></span> </span></a>
                    <ul class="nav nav-second-level">

                        <li>
                            <a href="{{URL::to(session('access').'dengue/create')}}"><i class="fa fa-plus-circle"></i>
                                <span class="hide-menu">Add Dengue Patient</span></a>
                        </li>
                        @if(in_array(1,$access) || in_array(2,$access))
                            <li>
                                <a href="{{URL::to(session('access').'dengue/import')}}"><i class="fa fa-upload"></i>
                                    <span class="hide-menu">Import Dengue Patient</span></a>
                            </li>
                        @endif
                        <li>
                            <a href="{{URL::to(session('access').'dengue')}}"><i class="fa fa-list-ul"></i> <span
                                        class="hide-menu"> List Dengue Patient</span></a>
                        </li>
                    </ul>
                </li>
            @endif

            @if(in_array(1,$access) || in_array(2,$access))
                <li>
                    <a href="{{URL::to(session('access').'denguedeath')}}" class="waves-effect"><i
                                class="mdi mdi-account fa-fw" data-icon="v"></i> <span class="hide-menu"> Dengue Death Patient<span
                                    class="fa arrow"></span> </span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{URL::to(session('access').'denguedeath/create')}}"><i class="fa fa-plus-circle"></i>
                                <span class="hide-menu">Add Dengue Death Patient</span></a>
                        </li>
                        <li>
                            <a href="{{URL::to(session('access').'denguedeath')}}"><i class="fa fa-list-ul"></i> <span
                                        class="hide-menu"> List Dengue Death Patient</span></a>
                        </li>
                    </ul>
                </li>
            @endif
            @if(in_array(1,$access) || in_array(2,$access)||(in_array(5,$access)&&$user_project==2)||(in_array(3,$access)&&$user_project==2))
                <li>
                    <a href="{{URL::to(session('access').'encephalitis')}}" class="waves-effect"><i
                                class="mdi mdi-account fa-fw" data-icon="v"></i> <span class="hide-menu"> Encephalitis Patient<span
                                    class="fa arrow"></span> </span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{URL::to(session('access').'encephalitis/create')}}"><i class="fa fa-plus-circle"></i>
                                <span class="hide-menu">Add Encephalitis Patient</span></a>
                        </li>
                        <li>
                            <a href="{{URL::to(session('access').'encephalitis')}}"><i class="fa fa-list-ul"></i> <span
                                        class="hide-menu"> List Encephalitis Patient</span></a>
                        </li>
                        <li>
                            <a href="{{URL::to(session('access').'encephalitis/callInitiate')}}"><i class="fa fa-list-ul"></i> <span class="hide-menu"> Call Initiate Form</span></a>
                        </li>
                    </ul>
                </li>
            @endif
            @if(in_array(1,$access) || in_array(2,$access)||(in_array(5,$access)&&$user_project==1)||(in_array(3,$access)&&$user_project==1))
                <li>
                    <a href="{{URL::to(session('access').'poultry')}}" class="waves-effect"><i
                                class="mdi mdi-account fa-fw" data-icon="v"></i> <span class="hide-menu"> Poultry Contact<span
                                    class="fa arrow"></span> </span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{URL::to(session('access').'poultry/create')}}"><i class="fa fa-plus-circle"></i>
                                <span class="hide-menu">Add Poultry Contact</span></a>
                        </li>
                        <li>
                            <a href="{{URL::to(session('access').'poultry')}}"><i class="fa fa-list-ul"></i> <span
                                        class="hide-menu">List of Poultry Contact</span></a>
                        </li>
                        <li>
                            <a href="{{URL::to(session('access').'poultry/callInitiate')}}"><i class="fa fa-list-ul"></i> <span class="hide-menu">Call Initiate Form</span></a>
                        </li>
                    </ul>
                </li>
            @endif
            {{-- Mostofa --}}
            @if(in_array(1,$access) || in_array(2,$access)||(in_array(5,$access)&&$user_project==4)||(in_array(3,$access)&&$user_project==4))

                <li>
                    <a href="{{URL::to(session('access').'reproductive')}}" class="waves-effect"><i
                                class="mdi mdi-account fa-fw" data-icon="v"></i> <span class="hide-menu"> Reproductive Contact<span
                                    class="fa arrow"></span> </span></a>
                    <ul class="nav nav-second-level">
                        @if((in_array(3,$access)&&$user_project==4))
                            <li>
                                <a href="{{URL::to(session('access').'reproductive/districtreport')}}"><i class="fa fa-list"></i>
                                    <span class="hide-menu">Report District Wise</span></a>
                            </li>
                            <li>
                                <a href="{{URL::to(session('access').'reproductive/usersummary')}}"><i class="fa fa-list"></i>
                                    <span class="hide-menu">User Wise Report</span></a>
                            </li>
                            <li>
                                <a href="{{URL::to(session('access').'reproductive/freenumber')}}"><i class="fa fa-list"></i>
                                    <span class="hide-menu">District Free Report</span></a>
                            </li>
                            {{--
                            <li>
                                <a href="{{URL::to(session('access').'reproductive/create')}}"><i class="fa fa-plus-circle"></i>
                                    <span class="hide-menu">Add Reproductive Contact</span></a>
                            </li>
                            --}}
                        @endif
                        @if((in_array(5,$access)&&$user_project==4))
                        <li>
                            <a href="{{URL::to(session('access').'reproductive')}}"><i class="fa fa-list-ul"></i> <span
                                        class="hide-menu">List of Reproductive Contact</span></a>
                        </li>
                        <li>
                            <a href="{{URL::to(session('access').'reproductive/missing')}}"><i class="fa fa-list-ul"></i> <span
                                        class="hide-menu">Missing Schedules/Appointment</span></a>
                        </li>
                        
                            <li>
                                <a href="{{URL::to(session('access').'reproductive/callInitiate')}}"><i class="fa fa-list-ul"></i> <span class="hide-menu">Call Initiate Form</span></a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif

            {{--  Mostofa --}}

            {{-- Mostofa --}}
            @if(in_array(1,$access) || in_array(2,$access)||(in_array(5,$access)&&$user_project==7)||(in_array(3,$access)&&$user_project==7))

                <li>
                    <a href="{{URL::to(session('access').'ivr')}}" class="waves-effect"><i
                                class="mdi mdi-account fa-fw" data-icon="v"></i> <span class="hide-menu"> Cati Survey<span
                                    class="fa arrow"></span> </span></a>
                    <ul class="nav nav-second-level">
                        @if((in_array(3,$access)&&$user_project==7))
                            <li>
                                <a href="{{URL::to(session('access').'ivr/catijar')}}"><i class="fa fa-list"></i>
                                    <span class="hide-menu">Cati Jar</span></a>
                            </li>

                            <li>
                                <a href="{{URL::to(session('access').'ivr/usercompleted')}}"><i class="fa fa-list"></i>
                                    <span class="hide-menu">Employee Record</span></a>
                            </li>

                            <li>
                                <a href="{{URL::to(session('access').'ivr/questionprogress')}}"><i class="fa fa-list"></i>
                                    <span class="hide-menu">Question Record</span></a>
                            </li>
                            
                            
                        @endif
                        @if((in_array(5,$access)&&$user_project==7))
                        <li>
                            <a href="{{URL::to(session('access').'ivrpr/cati')}}"><i class="fa fa-plus"></i> <span
                                        class="hide-menu">Cati Follow Up</span></a>
                        </li>
                        {{--
                        <li>
                            <a href="{{URL::to(session('access').'ivrpr/ivr')}}"><i class="fa fa-plus"></i> <span
                                        class="hide-menu">Ivr Follow Up</span></a>
                        </li>
                        --}}
                        <li>
                            <a href="{{URL::to(session('access').'ivr')}}"><i class="fa fa-list-ul"></i> <span
                                        class="hide-menu">List of Contact</span></a>
                        </li>
                        <li>
                            <a href="{{URL::to(session('access').'ivr/missing')}}"><i class="fa fa-list-ul"></i> <span
                                        class="hide-menu">Missing Appointment</span></a>
                        </li>
                        
                            <li>
                                <a href="{{URL::to(session('access').'ivr/callInitiate')}}"><i class="fa fa-list-ul"></i> <span class="hide-menu">Call Initiation</span></a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif

            {{--  Mostofa --}}

            {{-- Mostofa Followup --}}
            @if(in_array(1,$access) || in_array(2,$access)||(in_array(14,$access)&&$user_project==10)||(in_array(15,$access)&&$user_project==10) ||(in_array(16,$access)&&$user_project==10) ||(in_array(17,$access)&&$user_project==10) ||(in_array(18,$access)&&$user_project==10)
            ||(in_array(19,$access)&&$user_project==10)
            )

                <li>
                    <a href="{{URL::to(session('access').'ivr')}}" class="waves-effect"><i
                                class="mdi mdi-account fa-fw" data-icon="v"></i> <span class="hide-menu"> Cati FollowUp<span
                                    class="fa arrow"></span> </span></a>
                    <ul class="nav nav-second-level">
                            @if((in_array(14,$access)&&$user_project==10))
                            <li>
                                <a href="{{URL::to(session('access').'ivr/incomplete')}}"><i class="fa fa-list-ul"></i> <span class="hide-menu">Incomplete-CATI</span></a>
                            </li>
                            @endif
                            @if((in_array(15,$access)&&$user_project==10))
                            <li>
                                <a href="{{URL::to(session('access').'ivr/refusal')}}"><i class="fa fa-list-ul"></i> <span class="hide-menu">Refusal-CATI</span></a>
                            </li>
                            @endif
                            @if((in_array(16,$access)&&$user_project==10))
                            <li>
                                <a href="{{URL::to(session('access').'ivr/noncontact')}}"><i class="fa fa-list-ul"></i> <span class="hide-menu">Noncontact-CATI</span></a>
                            </li>
                            @endif

                            @if((in_array(17,$access)&&$user_project==10))
                            <li>
                                <a href="{{URL::to(session('access').'ivr/incomplete')}}"><i class="fa fa-list-ul"></i> <span class="hide-menu">Incomplete-IVR</span></a>
                            </li>
                            @endif
                            @if((in_array(18,$access)&&$user_project==10))
                            <li>
                                <a href="{{URL::to(session('access').'ivr/refusal')}}"><i class="fa fa-list-ul"></i> <span class="hide-menu">Refusal-IVR</span></a>
                            </li>
                            @endif
                            @if((in_array(19,$access)&&$user_project==10))
                            <li>
                                <a href="{{URL::to(session('access').'ivr/noncontact')}}"><i class="fa fa-list-ul"></i> <span class="hide-menu">Noncontact-IVR</span></a>
                            </li>
                            @endif
                        
                    </ul>
                </li>
            @endif

            {{--  Mostofa --}}


             {{-- Covic --}}
            @if(in_array(1,$access) || in_array(2,$access)||(in_array(5,$access)&&$user_project==8)||(in_array(3,$access)&&$user_project==8)|| (in_array(4,$access)&&$user_project==8) || (in_array(6,$access)&&$user_project==8) || (in_array(7,$access)&&$user_project==8))

                <li>
                    <a href="{{URL::to(session('access').'ivr')}}" class="waves-effect"><i
                                class="mdi mdi-account fa-fw" data-icon="v"></i> <span class="hide-menu"> Covic Contact<span
                                    class="fa arrow"></span> </span></a>
                    <ul class="nav nav-second-level">
                        
                        @if((in_array(5,$access)&&$user_project==8))
                        <li>
                            <a href="{{URL::to(session('access').'covic')}}"><i class="fa fa-list-ul"></i> <span
                                        class="hide-menu">List of Covic Contact</span></a>
                        </li>
                        
                        
                            <li>
                                <a href="{{URL::to(session('access').'covic/create')}}"><i class="fa fa-plus"></i> <span class="hide-menu">Create Contact</span></a>
                            </li>
                        @endif

                        @if((in_array(4,$access)&&$user_project==8))
                        <li>
                            <a href="{{URL::to(session('access').'covic/followuplist')}}"><i class="fa fa-list"></i> <span
                                        class="hide-menu">Follow Up List</span></a>
                        </li>
                        <li>
                            <a href="{{URL::to(session('access').'covic/followup')}}"><i class="fa fa-link"></i> <span
                                        class="hide-menu">Follow Up</span></a>
                        </li>
                        @endif
                        @if((in_array(6,$access)&&$user_project==8))
                        
                        <li>
                            <a href="{{URL::to(session('access').'covic/listreport')}}"><i class="fa fa-list"></i> <span
                                        class="hide-menu">List Sample</span></a>
                        </li>
                        <li>
                            <a href="{{URL::to(session('access').'covic/listreportex')}}"><i class="fa fa-list"></i> <span
                                        class="hide-menu">List Sample Updated</span></a>
                        </li>
                        @endif
                        @if((in_array(7,$access)&&$user_project==8))
                        
                        <li>
                            <a href="{{URL::to(session('access').'covic/listreportpos')}}"><i class="fa fa-list"></i> <span
                                        class="hide-menu">List Sample Postive</span></a>
                        </li>
                        <li>
                            <a href="{{URL::to(session('access').'covic/listreportposex')}}"><i class="fa fa-list"></i> <span
                                        class="hide-menu">List Sample Postive Updated</span></a>
                        </li>
                        @endif
                    </ul>
                </li>
            @endif

            {{--  Covic --}}
            
            @if(in_array(1,$access) || in_array(2,$access)||(in_array(5,$access)&&$user_project==5)||(in_array(3,$access)&&$user_project==5))
                <li>
                    <a href="{{URL::to(session('access').'fetpb-dengue-lab')}}" class="waves-effect"><i
                                class="mdi mdi-account fa-fw" data-icon="v"></i> <span class="hide-menu"> Dengue Lab Patient (FETP,B)<span
                                    class="fa arrow"></span> </span></a>
                    <ul class="nav nav-second-level">

                        <li>
                            <a href="{{URL::to(session('access').'fetpb-dengue-lab/create')}}"><i class="fa fa-plus-circle"></i>
                                <span class="hide-menu">Add Lab Patient</span></a>
                        </li>
                        <li>
                            <a href="{{URL::to(session('access').'fetpb-dengue-lab')}}"><i class="fa fa-list-ul"></i> <span
                                        class="hide-menu"> List Lab Patient</span></a>
                        </li>
                    </ul>
                </li>
            @endif
            @if(in_array(1,$access) || in_array(2,$access)||(in_array(5,$access)&&$user_project==6)||(in_array(3,$access)&&$user_project==6))
                <li>
                    <a href="{{URL::to(session('access').'suspected-dengue')}}" class="waves-effect"><i
                                class="mdi mdi-account fa-fw" data-icon="v"></i> <span class="hide-menu">Suspected Dengue Patient<span
                                    class="fa arrow"></span> </span></a>
                    <ul class="nav nav-second-level">

                        <li>
                            <a href="{{URL::to(session('access').'suspected-dengue/create')}}"><i class="fa fa-plus-circle"></i>
                                <span class="hide-menu">Add Suspected Dengue Patient</span></a>
                        </li>
                        <li>
                            <a href="{{URL::to(session('access').'suspected-dengue')}}"><i class="fa fa-list-ul"></i> <span
                                        class="hide-menu"> List Suspected Dengue Patient</span></a>
                        </li>
                    </ul>
                </li>
            @endif
            <li class="devider"></li>

            {{--ovi/\--}}


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