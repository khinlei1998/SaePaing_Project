<div class="header shadow-sm">


    <div class="header-top-area p-4">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo-area">
                        <a href="/home">
                            <img src="{{asset('images/sae-logo.png')}}" alt="" width="60%" height="auto" />
                        </a>
                    </div>
                </div>
                <div class="col-sm-8" style="padding-top: 30px;">
                    <div class="btn btn-primary p-1 shadow mt-2" id="to_change_zaw"  style="position:absolute;margin-left:700px;color:white;">&nbsp;zaw&nbsp;</div>
                    <div class="pt-3 pl-1 pr-1" style="position:absolute;margin-left:750px;color:white;"><i class="fas fa-exchange-alt" style="color:black;"></i></div>
                    <div class="btn btn-success p-1 shadow mt-2" id="to_change_uni" style="position:absolute;margin-left:780px;color:white;">&nbsp;uni&nbsp;</div>

                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <nav class="nav navbar navbar-expand-lg navbar-light bg-light">

            <ul class="nav navbar-nav">
                <li class="mr-1 pr-2 pl-2 {{ Request::segment(1) === 'home' ? 'active' : null }}"><a href="{{ url('home')}}"><i class="fa fa-home"></i><span>Home</span></a></li>
                @if(Auth::user()->role_id==1||Auth::user()->role_id==2)
                <li class="mr-1 pr-2 pl-2 {{ Request::segment(1) === 'project' ? 'active' : null }}"><a href="{{ url('project')}}"><i class="fas fa-fw fa-tasks"></i><span>Projects</span></a></li>
                @endif
                <li class="mr-1 pr-2 pl-2 {{ Request::segment(1) === 'cbplist' ? 'active' : null }}"><a href="{{ url('cbplist')}}"><i class="fas fa-building"></i><span>CMP</span></a></li>
                <li class="mr-1 pr-2 pl-2 {{ Request::segment(1) === 'task' ? 'active' : null }}"><a href="{{ url('task') }}"><i class="fa fa-fw fa-edit"></i><span>Task List </span></a></li>

                @can('create',\App\Mission::class)
                    <li class="mr-1 pr-2 pl-2 {{ Request::segment(1) === 'mission' ? 'active' : null }}"><a href="{{ url('mission') }}"><i class="fa fa-project-diagram"></i><span>Mission</span></a></li>
                @endcan
                @can('create',\App\Group::class)
                    <li class="mr-1 pr-2 pl-2 {{ Request::segment(1) === 'group' ? 'active' : null }}"><a href="{{ url('group') }}"><i class="fas fa-users"></i><span>Group</span></a></li>
                @endcan
                @can('create',\App\Department::class)
                    <li class="mr-1 pr-2 pl-2 {{ Request::segment(1) === 'department' ? 'active' : null }}"><a href="{{ url('department') }}"><i class="fas fa-building"></i><span>Dept</span></a></li>
                @endcan
                @can('create',\App\Employee::class)
                    <li class="mr-1 pr-2 pl-2 {{ Request::segment(1) === 'employee' ? 'active' : null }}"><a href="{{ url('employee') }}"><i class="fas fa-users"></i><span>Employee</span></a></li>
                @endcan
                <!--   <li><a href="#"><i class="fas fa-building"></i><span>Department</span></a></li>
                  <li><a href="#"><i class="fas fa-building"></i><span>Sub Department</span></a></li>
                  <li><a href="#"><i class="fas fa-users"></i><span>team</span></a></li>
                  <li><a href="#"><i class="fas fa-user"></i><span>Employee</span></a></li> -->
                <li class="mr-1 pr-2 pl-2 border-right-color {{ Request::segment(1) === 'profile' ? 'active' : null }}"><a href="{{ url('profile') }}"><i class="fas fa-address-card"></i><span>Profile</span></a></li>
                <!-- <li class="mr-1 pr-2 pl-2 border-right-color {{ Request::segment(1) === 'logout' ? 'active' : null }}"><a href="{{ route('logout') }}"
                                                                                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out-alt"></i> <span>{{ __('Logout') }}</span>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li> -->


                <!-- <div id="ex3" style="padding-left:400px;">
                <span class="fa-stack fa-2x has-badge" data-count="3">
                    <i class="p2 fa fa-circle fa-stack-2x fa-xs" style="color:white"></i>
                    <i class="p2 fas fa-bell fa-xs" style="position: absolute; z-index:1;left:27px;top:5px;"></i>
                   
                </span>
                </div> -->

                

                <div class="btn-group" style="position:absolute;margin-left:800px;max-width:230px;">

                <button class="btn bg-white btn-sm dropdown-toggle dropdown-toggle-split" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php
                        $get_img=DB::table('employees')->where('emp_id',Auth::user()->emp_id)->first();
                        if($get_img->emp_profile == Null){
                            $img='default.jpg';
                        }
                        else{
                            $img=$get_img->emp_profile;
                        }
                ?>


                <img src="{{url('/storage/profile/'.$img)}}" width="43" height="43" alt="..." class="rounded-circle"><strong>&nbsp;&nbsp;{{ auth()->user()->name }}</strong>&emsp;<span class="sr-only">Toggle Dropdown</span>
                </button>

                <div class="dropdown-menu" style="width:205px;">
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out-alt"></i> <span>{{ __('Logout') }}</span>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    </a>


                </div>



{{--<<<<<<< HEAD--}}
{{--=======--}}
{{--                <div class="container-fornoti">--}}
{{--                    <div class="row">--}}
{{--                        <div class="box pt-2">--}}
{{--                    <div class="notifications p-2" type="button" data-toggle="dropdown">--}}
{{--                        <i class="fa fa-bell fa-lg"></i>--}}
{{--                        <span class="num">5</span>--}}
{{--                        --}}
{{--                        <div class="dropdown-menu shadow">--}}
{{--                            <div class="uparrow"></div>--}}
{{--                            <div class="noticlick"><h5><i class="fa fa-bell fa-sm"></i>&emsp;5 Notifications</h5></div>--}}
{{--                            <a class="dropdown-item" href="#">--}}
{{--                                <p class="pt-2"><i class="fa fa-info-circle"></i>&nbsp;Tittle status</p> --}}
{{--                                <label class="pt-1 pl-2">Another action Another actionAnother .</label>--}}
{{--                                <p class="time-noti"><i class="fa fa-clock"></i>&nbsp;20.10.2020/ 8:00 PM</p>--}}
{{--                            </a>--}}
{{--                            <div class="dropdown-divider"> </div>--}}
{{--                            <a class="dropdown-item" href="#">--}}
{{--                                <p class="pt-2"><i class="fa fa-info-circle"></i>&nbsp;Tittle status</p> --}}
{{--                                <label class="pt-1 pl-2">Another action Another actionAnother .</label>--}}
{{--                                <p class="time-noti"><i class="fa fa-clock"></i>&nbsp;20.10.2020/ 8:00 PM</p>--}}
{{--                            </a>--}}
{{--                          --}}
{{--                        </div>--}}
{{--                        --}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                    </div>--}}
{{-->>>>>>> 3e879f9ccdfe300b4528b2a45f97c480821b41d5--}}
                </div>
<realtimenoti></realtimenoti>
{{--                <div class="container-fornoti">--}}
{{--                    <div class="row">--}}
{{--                        <div class="box pt-2">--}}
{{--                    <div class="notifications p-2">--}}
{{--                        <i class="fa fa-bell fa-lg y-index"></i>--}}
{{--                        <span class="num">@{{ noti }}</span>--}}

{{--                        <div class="dropdown-menu shadow">--}}
{{--                            <a class="dropdown-item" href="#"><i class="fa fa-info-circle"></i> Another action</a>--}}
{{--                            <div class="dropdown-divider"></div>--}}
{{--                            <a class="dropdown-item" href="#">Something else here</a>--}}
{{--                          --}}
{{--                        </div>--}}
{{--                        --}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

                
                





                <!-- <li class="mr-1 pr-2 pl-2"><i class="fa fa-user"></i><span class="ml-1">{{ auth()->user()->name }}</span></li> -->
            </ul>


        </nav>

        
    </div>
</div>