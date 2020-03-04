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
                <li class="mr-1 pr-2 pl-2 {{ Request::segment(1) === 'project' ? 'active' : null }}"><a href="{{ url('project')}}"><i class="fas fa-fw fa-tasks"></i><span>Projects</span></a></li>

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

                <div class="btn-group" style="position:absolute;margin-left:940px;">

                <button class="btn bg-white btn-sm dropdown-toggle dropdown-toggle-split" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRglThl7-B49bmEK7DH_9sVmDXIMLhCIICwTUV8o57ysHMMVeQX" width="43" height="43" alt="..." class="rounded-circle"><strong>&nbsp;&nbsp;{{ auth()->user()->name }}</strong>&emsp;<span class="sr-only">Toggle Dropdown</span>
                </button>

                <div class="dropdown-menu">
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

                </div>


                <!-- <li class="mr-1 pr-2 pl-2"><i class="fa fa-user"></i><span class="ml-1">{{ auth()->user()->name }}</span></li> -->
            </ul>
        </nav>
    </div>
</div>