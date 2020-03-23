@extends('layouts.app')

@section('content')
<div class="container" id="app">
    <div class="card shadow-lg index-tables border-0 mt-5 p-2">
        <div class="container">
            <div class="row">
                <div class="col-12 py-3">
                    <div class="row">
                        <div class="col-2">
                            <div class="list-group profile-list">
                                <a class="list-group-item active" href="#tasks" data-toggle="tab"><span><br><i class="fa fa-tasks"></i><br>Tasks</span></a>
                                <a class="list-group-item" href="#sharetasks" data-toggle="tab"><span><br><i class="fa fa-share-square"></i><br>Shared Tasks</span></a>
                                <a class="list-group-item" href="#missions" data-toggle="tab"><span><br><i class="fa fa-calendar-alt"></i><br>Missions</span></a>
                                <a class="list-group-item" href="#cbp" data-toggle="tab"><span><br><i class="fa fa-tasks"></i><br>CMP</span></a>
                                <a href="#infos" class="list-group-item " data-toggle="tab"><span><br><i class="fa fa-user"></i><br>Profile</span></a>

                            </div>
                        </div>
                        <div class="col-10">
                            <div class="tab-content">
                                <div class="tab-pane fade " id="infos" role="tabpanel">

                                    <div class="row mt-2">
                                        <div class="col-8">
                                            <div class="row">
                                                <div class="col-3 mt-1 mb-2">
                                                    <strong>Name </strong>
                                                </div>
                                                <div class="col-1 mt-1">
                                                    :
                                                </div>
                                                <div class="col-8 mt-1">
                                                    {{ $employee->emp_name }}
                                                </div>
                                                <div class="col-3 mt-1 mb-2">
                                                    <strong>Department </strong>
                                                </div>
                                                <div class="col-1 mt-1">
                                                    :
                                                </div>
                                                <div class="col-8 mt-1">
                                                {{ $employee->department->dept_name ??'-' }}
                                                </div>
                                                <div class="col-3 mt-1 mb-2">
                                                    <strong>SubDepartment </strong>
                                                </div>
                                                <div class="col-1 mt-1">
                                                    :
                                                </div>
                                                <div class="col-8 mt-1">
                                                {{ $employee->subDepartment->subdept_name ?? '-' }}
                                                </div>
                                                <div class="col-3 mt-1 mb-2">
                                                    <strong>Group </strong>
                                                </div>
                                                <div class="col-1 mt-1">
                                                    :
                                                </div>
                                                <div class="col-8 mt-1">
                                                {{ $employee->group->group_name ?? '-' }}
                                                </div>
                                                <div class="col-3 mt-1 mb-2">
                                                    <strong>Team </strong>
                                                </div>
                                                <div class="col-1 mt-1">
                                                    :
                                                </div>
                                                <div class="col-8 mt-1">
                                                {{ $employee->team->team_name ?? '-' }}
                                                </div>
                                                <div class="col-3 mt-1 mb-2">
                                                    <strong>Email </strong>
                                                </div>
                                                <div class="col-1 mt-1">
                                                    :
                                                </div>
                                                <div class="col-8 mt-1">
                                                {{ $employee->user->email }}
                                                </div>
                                                <div class="col-3 mt-1 mb-2">
                                                    <strong>Job Description </strong>

                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="card " style="width: 12rem;">
                                                    <img src="{{url('/storage/profile/'.$img)}}" class="profile_image" alt="Cinque Terre"  >
                                                    <div class="card-body text-center ml-3">
                                                        <button type="button" class="btn btn-primary btnprofile" data-toggle="modal" data-target="#profilemodal">
                                                            Edit
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="mb-2 mt-2">
                                                    <button class="btn btn-outline-info  ">HR FROM &nbsp;1</button>
                                                    <button class="btn btn-outline-info  ">HR FROM &nbsp;1</button>
                                                </div>

                                            </div>
                                        </div>
                                        <!--Profile Modal -->
                                        <form method="post" action="{{route('tosaveimg')}}" enctype="multipart/form-data">
                                            @csrf

                                            <div class="modal fade" id="profilemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <img id="pp" src="{{url('/storage/profile/'.$img)}}" class="profile_image" alt="Cinque Terre"  >
                                                        <input type="file" onchange="readURL(this);" name="profile_img" value=""/>



                                                        {{--                                                    <form action="{{route('mission.store')}}"--}}
                                                        {{--                                                          class="dropzone" id="profileform" method="POST" enctype="multipart/form-data">--}}

                                                        {{--                                                        @csrf--}}
                                                        {{--                                                    </form>--}}





                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <input type="submit" class="btn btn-primary" value='save' id="btnprofile"></input>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>


                                <div class="tab-pane fade show active" id="tasks " role="tabpanel">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                                                        <div class="row">
                                                            <h4 class="mt-4 text-center w-100"><strong>Assigned Tasks</strong></h4>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-3 mb-3 justify-content-center text-muted pb-3">

                                                    <div class="col-md-2 col-sm-4 text-md-center">
                                                        <small><span class="bg-light mr-2">&nbsp;&nbsp;</span>Assigned <b>{{ $employee->assignedTasks()->where('status','0')->count() }}</b></small>
                                                    </div>
                                                    <div class="col-md-2 col-sm-4 text-md-center">
                                                        <small><span class="bg-info mr-2">&nbsp;&nbsp;</span>Started <b>{{ $employee->assignedTasks()->where('status','1')->count() }}</b></small>
                                                    </div>
                                                    <div class="col-md-2 col-sm-4 text-md-center">
                                                        <small><span class="bg-warning mr-2">&nbsp;&nbsp;</span>Reported <b>{{ $employee->assignedTasks()->where('status','2')->count()}}</b></small>
                                                    </div>
                                                    <div class="col-md-2 col-sm-4 text-md-center">
                                                        <small><span class="bg-success mr-2">&nbsp;&nbsp;</span>Complete <b>{{ $employee->assignedTasks()->where('status','3')->count()}}</b></small>
                                                    </div>
                                                    <div class="col-md-2 col-sm-4 text-md-center">
                                                        <small><span class="bg-danger mr-2">&nbsp;&nbsp;</span>Reject <b>{{ $employee->assignedTasks()->where('status','4')->count()}}</b></small>
                                                    </div>

                                                </div>
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>

                                                        <tr>
                                                            <th>NO</th>
                                                            <th>Task ID</th>
                                                            <th class="w-25">Task Title</th>
                                                            <th>Assigned By</th>
                                                            <th>Start Time</th>
                                                            <th>End Time</th>
                                                            <th>Action</th>

                                                        </tr>
                                                        </thead>

                                                        <tbody>

                                                        @foreach ($alltasks = $employee->assignedTasks()->paginate(4) as $task)

                                                            <tr class="row-color {{ $task->task_status }}">
                                                                <td class="align-middle text-center">{{ ($loop->index+1).'.'}}</td>
                                                                <td class="align-middle text-center">{{ $task->task_id }}</td>
                                                                <td class="align-middle">{{ Str::limit($task->task_title,30)}}</td>
                                                                <td class="align-middle">{{ $task->assignedByEmployee->emp_name }}<br><small> ( Position : <b>{{ $task->assignedByEmployee->emp_position }} </b>)</small></td>
                                                                <td class="align-middle"><small>{{ $task->started_at }}</small></td>
                                                                <td class="align-middle"><small>{{ $task->finish_date }}</small></td>

                                                                <td>
                                                                <a href="{{ route('task.show', $task) }}" class="mb-2 d-block">
                                                                        <button data-toggle="tooltip" data-placement="left" title="View Task Detail" class="btn shadow bg-primary text-white w-100"><i class="fas fa-info-circle"></i> </button>
                                                                </a>
                                                                </td>

                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div>Showing 1 to {{count($alltasks)}} of {{$alltasks->total()}} entries</div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div>
                                                            {{ $alltasks->fragment('tasks')->links() }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


              <!-- SHARE TASK -->
                                <div class="tab-pane fade" id="sharetasks" role="tabpanel">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                                                        <div class="row">
                                                            <h4 class="mt-4 text-center w-100"><strong>Tasks Shared To You</strong></h4>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-3 mb-3 justify-content-center text-muted pb-3">

                                                    <div class="col-md-2 col-sm-4 text-md-center">
                                                        <small><span class="bg-info mr-2">&nbsp;&nbsp;</span>Assigned <b>{{ $employee->sharedTasks()->join('tasks', function ($join) {$join->on('share_information.task_id', '=', 'tasks.task_id')->where('tasks.status', '0'); })->count() }}</b></small>
                                                    </div>
                                                    <div class="col-md-2 col-sm-4 text-md-center">
                                                        <small><span class="bg-success mr-2">&nbsp;&nbsp;</span>Started <b>{{  $employee->sharedTasks()->join('tasks', function ($join) {$join->on('share_information.task_id', '=', 'tasks.task_id')->where('tasks.status', '1'); })->count()  }}</b></small>
                                                    </div>
                                                    <div class="col-md-2 col-sm-4 text-md-center">
                                                        <small><span class="bg-warning mr-2">&nbsp;&nbsp;</span>Reported <b>{{  $employee->sharedTasks()->join('tasks', function ($join) {$join->on('share_information.task_id', '=', 'tasks.task_id')->where('tasks.status', '2'); })->count() }}</b></small>
                                                    </div>
                                                    <div class="col-md-2 col-sm-4 text-md-center">
                                                        <small><span class="bg-secondary mr-2">&nbsp;&nbsp;</span>Complete <b>{{  $employee->sharedTasks()->join('tasks', function ($join) {$join->on('share_information.task_id', '=', 'tasks.task_id')->where('tasks.status', '3'); })->count() }}</b></small>
                                                    </div>
                                                    <div class="col-md-2 col-sm-4 text-md-center">
                                                        <small><span class="bg-danger mr-2">&nbsp;&nbsp;</span>Reject <b>{{  $employee->sharedTasks()->join('tasks', function ($join) {$join->on('share_information.task_id', '=', 'tasks.task_id')->where('tasks.status', '4'); })->count() }}</b></small>
                                                    </div>

                                                </div>
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>

                                                        <tr>
                                                            <th>NO</th>
                                                            <th>Task ID</th>
                                                            <th class="w-25">Task Title</th>
                                                            <th>Shared By</th>
                                                            <th>Start Time</th>
                                                            <th>End Time</th>
                                                            <th>Action</th>

                                                        </tr>
                                                        </thead>

                                                        <tbody>

                                                        @foreach ($allshareinfos = $employee->sharedTasks()->paginate(4) as $shareinfo)

                                                            <tr class="row-color {{ $shareinfo->task->task_status }}">
                                                                <td class="align-middle text-center">{{ ($loop->index+1).'.'}}</td>
                                                                <td class="align-middle text-center">{{ $shareinfo->task->task_id }}</td>
                                                                <td class="align-middle">{{ Str::limit($shareinfo->task->task_title,30)}}</td>
                                                                <td class="align-middle">{{ $shareinfo->task->assignedToEmployee->emp_name }}<br><small> ( Position : <b>{{ $shareinfo->task->assignedToEmployee->emp_position }} </b>)</small></td>
                                                                <td class="align-middle"><small>{{ $shareinfo->task->started_at }}</small></td>
                                                                <td class="align-middle"><small>{{ $shareinfo->task->finish_date }}</small></td>

                                                                <td>
                                                                    <a href="{{ route('task.edit', $shareinfo) }}" class="mb-2 d-block">
                                                                        <button data-toggle="tooltip" data-placement="left" title="View Task Detail" class="btn shadow bg-primary text-white w-100"><i class="fas fa-info-circle"></i> </button>
                                                                    </a>
                                                                </td>

                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div>Showing 1 to {{count($allshareinfos)}} of {{$allshareinfos->total()}} entries</div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div>
                                                            {{ $allshareinfos->fragment('shareinfos')->links() }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
              <!-- SHARE TASK -->


                                 <!-- MISSION -->

                                <div class="tab-pane fade" id="missions" role="tabpanel">

                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                                                    <div class="row">
                                                        <h4 class="mt-4 text-center w-100"><strong>Lists of Mission Form </strong></h4>
                                                        <a href="{{ route('task.create') }}" class="position-absolute add-button-link mt-4 mr-3">
                                                            <button data-toggle="tooltip" data-placement="left" title="Add New To Do Lists" class="btn add-button text-white"><i class="fas fa-plus-circle"></i> Add </button>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-3 mb-3 justify-content-center text-muted pb-3">

                                                <div class="col-md-2 col-sm-4 text-md-center">
                                                    <small><span class="bg-info mr-2">&nbsp;&nbsp;</span>Assigned {{ $employee->missions()->where('status','0')->count() }}</small>
                                                </div>
                                                <div class="col-md-2 col-sm-4 text-md-center">
                                                    <small><span class="bg-success mr-2">&nbsp;&nbsp;</span>Started{{ $employee->missions()->where('status','1')->count() }}</small>
                                                </div>
                                                <div class="col-md-2 col-sm-4 text-md-center">
                                                    <small><span class="bg-secondary mr-2">&nbsp;&nbsp;</span>Complete{{ $employee->missions()->where('status','2')->count() }}</small>
                                                </div>


                                            </div>
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>

                                                    <tr>
                                                        <th>Mission ID</th>
                                                        <th>Job Type</th>
                                                        <th>Job Target</th>
                                                        <th>Responsible Person Name</th>
                                                        <th>Remark</th>
                                                        <th>Action</th>

                                                    </tr>
                                                    </thead>

                                                    <tbody>

                                                    @foreach ($missions=$employee->missions()->paginate(4) as $mission)

                                                        <tr class="row-color {{ $mission->mission_status }}">
                                                            <td class="align-middle text-center">{{ $mission->mission_id }}</td>
                                                            <td class="align-middle">{{ $mission->job_type}}</td>
                                                            <td class="align-middle">{{ $mission->job_target }}</td>
                                                            <td class="align-middle">{{ $mission->employee->emp_name }}<br><small> ( Dept : <b>{{ $mission->employee->department->dept_name ?? '-' }} </b>)</small></td>
                                                            <td class="align-middle">{{ Str::limit($mission->remark,50) }}</td>

                                                            <td>

                                                                <a href="{{ route('mission.show', $mission) }}" class="mb-2 d-block">
                                                                    <button data-toggle="tooltip" data-placement="left" title="Detail Mission" class="btn shadow bg-orange text-white w-100"><i class="fas fa-edit"></i> </button>
                                                                </a>

                                                                @if($mission->status==2)
                                                                    <form action="{{ route('approveTask',$mission) }}" method="POST">
                                                                        {{ csrf_field() }}
                                                                        <button data-toggle="tooltip" data-placement="left" title="Approve Task" class="btn shadow btn-success text-white w-100"><i class="fas fa-check"></i> </button>
                                                                    </form>
                                                                @endif
                                                            </td>

                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div>Showing 1 to {{count($missions)}} of {{$missions->total()}} entries</div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div>
                                                        {{ $missions ->links() }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!-- MISSION -->




        <!-- MISSION -->

                                <div class="tab-pane fade" id="missions" role="tabpanel">

                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                                                    <div class="row">
                                                        <h4 class="mt-4 text-center w-100"><strong>Lists of Mission Form </strong></h4>
                                                        <a href="{{ route('task.create') }}" class="position-absolute add-button-link mt-4 mr-3">
                                                            <button data-toggle="tooltip" data-placement="left" title="Add New To Do Lists" class="btn add-button text-white"><i class="fas fa-plus-circle"></i> Add </button>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-3 mb-3 justify-content-center text-muted pb-3">

                                                <div class="col-md-2 col-sm-4 text-md-center">
                                                    <small><span class="bg-info mr-2">&nbsp;&nbsp;</span>Assigned {{ $employee->missions()->where('status','0')->count() }}</small>
                                                </div>
                                                <div class="col-md-2 col-sm-4 text-md-center">
                                                    <small><span class="bg-success mr-2">&nbsp;&nbsp;</span>Started{{ $employee->missions()->where('status','1')->count() }}</small>
                                                </div>
                                                <div class="col-md-2 col-sm-4 text-md-center">
                                                    <small><span class="bg-secondary mr-2">&nbsp;&nbsp;</span>Complete{{ $employee->missions()->where('status','2')->count() }}</small>
                                                </div>


                                            </div>
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>

                                                    <tr>
                                                        <th>Mission ID</th>
                                                        <th>Job Type</th>
                                                        <th>Job Target</th>
                                                        <th>Responsible Person Name</th>
                                                        <th>Remark</th>
                                                        <th>Action</th>

                                                    </tr>
                                                    </thead>

                                                    <tbody>

                                                    @foreach ($missions=$employee->missions()->paginate(4) as $mission)

                                                        <tr class="row-color {{ $mission->mission_status }}">
                                                            <td class="align-middle text-center">{{ $mission->mission_id }}</td>
                                                            <td class="align-middle">{{ $mission->job_type}}</td>
                                                            <td class="align-middle">{{ $mission->job_target }}</td>
                                                            <td class="align-middle">{{ $mission->employee->emp_name }}<br><small> ( Dept : <b>{{ $mission->employee->department->dept_name ?? '-' }} </b>)</small></td>
                                                            <td class="align-middle">{{ Str::limit($mission->remark,50) }}</td>

                                                            <td>

                                                                <a href="{{ route('mission.show', $mission) }}" class="mb-2 d-block">
                                                                    <button data-toggle="tooltip" data-placement="left" title="Detail Mission" class="btn shadow bg-orange text-white w-100"><i class="fas fa-edit"></i> </button>
                                                                </a>

                                                                @if($mission->status==2)
                                                                    <form action="{{ route('approveTask',$mission) }}" method="POST">
                                                                        {{ csrf_field() }}
                                                                        <button data-toggle="tooltip" data-placement="left" title="Approve Task" class="btn shadow btn-success text-white w-100"><i class="fas fa-check"></i> </button>
                                                                    </form>
                                                                @endif
                                                            </td>

                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div>Showing 1 to {{count($missions)}} of {{$missions->total()}} entries</div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div>
                                                        {{ $missions ->links() }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!-- MISSION -->

                                  <!-- New CBP Design -->

                            <div class="tab-pane fade" id="cbp" role="tabpanel">

                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                                                    <div class="row">
                                                        <h4 class="mt-4 text-center w-100"><strong>Assigned CBP Tasks </strong></h4>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-3 mb-3 justify-content-center text-muted pb-3">

                                            </div>
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>

                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Project Name</th>
                                                        <th>CBP Name</th>
                                                        <th>CBP task</th>
                                                        <th>Assigned Person Name</th>
                                                        <th>Deadline Date</th>
                                                        <th>Assigned By</th>
                                                        <th>Action</th>

                                                    </tr>
                                                    </thead>

                                                    <tbody>
                                                   
                                                    @foreach($assgined_data_for_HOT as $assigned_data)
                                                      
                                                        <tr class="row-color ">
                                                            <td class="align-middle text-center">{{ $assigned_data->id }}</td>
                                                            <td class="align-middle">{{DB::table('projects')->where('project_id',$assigned_data->project_id)->first()->project_title}}</td>
                                                            <td class="align-middle">{{DB::table('cbp_lists')->where('cbp_id',$assigned_data->cbp_id)->first()->cbp_name}}</td>
                                                            <td class="align-middle">{{DB::table('cbp_subtasks')->where('id',$assigned_data->cbp_subtask_id)->first()->cbp_subtask}}<br><small> </small></td>

                                                            <td class="align-middle">
                                                            <?php
                                                            $hod_id=DB::table('project_configs')->where('cbp_id',$assigned_data->cbp_id)->first()->assign_person;
                                                            $hod_name=DB::table('users')->where('emp_id',$hod_id)->first()->name;
                                                            echo $hod_name;
                                                            ?><br><small> </small></td>
                                                            <td class="align-middle">
                                                            {{$deadline_date=DB::table('assign_to_hots')->where('cbp_id',$assigned_data->cbp_id)->first()->deadline}}
                                                            </td>

                                                            <td class="align-middle">
                                                            <?php
                                                            $hod_id=DB::table('project_configs')->where('cbp_id',$assigned_data->cbp_id)->first()->assign_person;
                                                            $hod_name=DB::table('users')->where('emp_id',$hod_id)->first()->name;
                                                            echo $hod_name;
                                                            ?>

                                                            <br><small> </small>
                                                            </td>


                                                            <td class="align-middle">
                                                              <button type="button" class="btn btn-success btn_hot_report" data-hot_person_id="{{$hod_id}}" data-cbp_id="{{ $assigned_data->id}}" data-config_title="{{$hod_name}}">Report</button>

                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div>Showing 1 to </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                            </div>





<!-- cbp report model for Hot -->




<div class="modal fade" id="hod_report_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                                        <div class="modal-dialog modal-lg" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa fa-info-circle pr-3" ></i><p class="d-inline-block" id="hot_report_title"></p></h5>

                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                <span aria-hidden="true">&times;</span>
                                                                                            </button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <div class="form-group">
                                                                                        <label for="message-text" class="col-form-label">Report Letter:</label>
                                                                                        <textarea class="form-control" id="report_text"></textarea>
                                                                                        <input type="hidden" name="hod_id" value="{{$hod_id}}" id="hod_id">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                    <button type="button" class="btn btn-primary" id="hod_report_submit"  >Report</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- cbp report model for Hot -->




@endsection



@push('scripts')


    <script>



        function readURL(input) {
            if (input.files && input.files[0]) {

                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#pp')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }




        window.onload=function(){

            $(function(){
                $('#project_region').select2({
                    placeholder:'Choose HOT',
                    dropdownParent:$('.modal.fade.show')
                });
                var config_id = 0;
                var subtask_id  = 0;
                $(".show_cbp_hot").click(function(){
                    $('#cbp_sub_task_title').empty();
                    var title = $(this).data('subcbptitle');
                    config_id= $(this).data('configid');
                    subtask_id = $(this).data('subcbpid');
                    alert(config_id+" "+subtask_id);
                    $('#cbp_sub_task_title').append(title);
                    $('#cbb_hot_modal').modal('show');
                });



                $('#btn_cbp_hot').click(function(){
                    var hot_id = $('#project_region').find(':selected').val();
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        method: "POST",
                        url: "/assignToHot",
                        data:{config_id,subtask_id,hot_id}
                    }).done(function (data) {
                        console.log("S blade: [task/create] component :[employee dropdown] from:app.js Data => Employee count" + data.length);
                        if(data.success){
                            console.log("fine");
                            $('#cbb_hot_modal').modal('hide');
                        }else{
                            console.log("error"+data.message);
                        }
                    }).fail(function (jqXHR, textStatcbp_listus) {
                        console.log("F blade: [task/create] component :[department dropdown] from:app.js Fail =>" + textStatus)
                    });
                });



                var cbp_id  = 0;
                var hot_person_id  = 0;


                //show model when click report in action field
                $('.btn_hot_report').click(function(){
                    $('#hot_report_title').empty();
                    cbp_id=$(this).data('cbp_id');
                    hot_person_id=$(this).data('hot_person_id')

                    var config_title = $(this).data('config_title');
                    $('#hot_report_title').append(config_title);
                    // alert(config_id+" "+config_title); for test
                    $('#hod_report_modal').modal('show');
                });
                //show model when click report in action field



                //submit the model



                $('#hod_report_submit').click(function(){

                    var report_text = $('#report_text').val();
                    var hod_id = $('#hod_id').val();
                    // alert(hod_id);

                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        method: "POST",
                        url: "/hot_report_for_cbpsubtask",
                        data:{cbp_id,report_text,hot_person_id,hod_id}
                    }).done(function (data) {
                        console.log("S blade: [task/create] component :[employee dropdown] from:app.js Data => Employee count" + data.length);
                        if(data.success){

                            console.log("fine");
                        // textarea value to empty
                        $('#report_text').val('');
                        //hide bs modal
                        $('#hod_report_modal').modal('hide');

                        Swal.fire(
                            'Success!',
                            'Report Successfully',
                            'success'
                            )



                        console.log(data.message);
                        }else{
                            console.log("error"+data.message);

                        }
                    }).fail(function (jqXHR, textStatus) {
                        console.log("F blade: [task/create] component :[department dropdown] from:app.js Fail =>" + textStatus)
                    });
                });




            });
        }
    </script>
@endpush