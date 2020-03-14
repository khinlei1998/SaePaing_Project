@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-lg index-tables border-0 mt-5 p-2">
        <div class="container">
            <div class="row">
                <div class="col-12 py-3">
                    <div class="row">
                        <div class="col-2">
                            <div class="list-group profile-list">
                                <a href="#infos" class="list-group-item" data-toggle="tab"><span><br><i class="fa fa-user"></i><br>Profile</span></a>
                                <a class="list-group-item" href="#tasks" data-toggle="tab"><span><br><i class="fa fa-tasks"></i><br>Tasks</span></a>
                                <a class="list-group-item" href="#sharetasks" data-toggle="tab"><span><br><i class="fa fa-share-square"></i><br>Shared Tasks</span></a>
                                <a class="list-group-item" href="#missions" data-toggle="tab"><span><br><i class="fa fa-calendar-alt"></i><br>Missions</span></a>
                                <a class="list-group-item" href="#cbp" data-toggle="tab"><span><br><i class="fa fa-tasks"></i><br>CMP</span></a>
                            </div>
                        </div>
                        <div class="col-10">
                            <div class="tab-content">
                                <div class="tab-pane fade" id="infos" role="tabpanel">
                                    <div class="row mt-2">
                                        <div class="col-8">

                                             <div class="row">
                                                <div class="col-2 mt-1">
                                                    <strong>Name :</strong>
                                                </div>
                                                <div class="col-5 mt-1">
                                                    {{ $employee->emp_name }}
                                                </div>
                                                <div class="col-5 mt-1">

                                                </div>
                                                <div class="col-2 mt-1">
                                                    <strong>Department :</strong>
                                                </div>
                                                <div class="col-5 mt-1">
                                                    {{ $employee->department->dept_name ??'-' }}
                                                </div>
                                                <div class="col-5 mt-1">

                                                </div>
                                                <div class="col-2 mt-1">
                                                    <strong>SubDepartment :</strong>
                                                </div>
                                                <div class="col-10 mt-1">
                                                    {{ $employee->subDepartment->subdept_name ?? '-' }}
                                                </div>
                                                <div class="col-2 mt-3">
                                                    <strong>Group :</strong>
                                                </div>
                                                <div class="col-10 mt-3">
                                                    {{ $employee->group->group_name ?? '-' }}
                                                </div>
                                                <div class="col-2 mt-3">
                                                    <strong>Team :</strong>
                                                </div>
                                                <div class="col-10 mt-3">
                                                    {{ $employee->team->team_name ?? '-' }}
                                                </div>
                                                <div class="col-2 mt-3">
                                                    <strong>Email :</strong>
                                                </div>
                                                <div class="col-10 mt-3">
                                                    {{ $employee->user->email }}
                                                </div>
                                                <div class="col-2 mt-3">
                                                    <strong>Job Description :</strong>
                                                </div>
                                                <div class="col-10 mt-3">
                                                    {{ $employee->emp_jobdesp}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">

                                             <div class="card " style="width: 12rem;">
                                                <img src="{{url('/storage/profile/'.$img)}}" class="profile_image" alt="Cinque Terre"  >
                                                <div class="card-body text-center">
                                                    <button type="button" class="btn btn-primary btnprofile" data-toggle="modal" data-target="#profilemodal">
                                                        Edit
                                                    </button>
                                                </div>

                                            </div>
                                            <div class="mb-2"  >
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



                                                    {{-- <form action="{{route('mission.store')}}"--}}
                                                    {{--class="dropzone" id="profileform" method="POST" enctype="multipart/form-data">--}}

                                                    {{--@csrf--}}
                                                    {{--</form>--}}





                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <input type="submit" class="btn btn-primary" value='save' id="btnprofile"></input>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                                <div class="tab-pane fade" id="tasks" role="tabpanel">
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
                                                            <th class="align-middle">NO</th>
                                                            <th class="align-middle">Task ID</th>
                                                            <th class="w-25 align-middle">Task Title</th>
                                                            <th class="align-middle">Assigned By</th>
                                                            <th class="align-middle">Start Time</th>
                                                            <th class="align-middle">End Time</th>
                                                            <th class="align-middle">Action</th>

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
                                                        <small><span class="bg-light mr-2">&nbsp;&nbsp;</span>Assigned <b>{{ $employee->sharedTasks()->join('tasks', function ($join) {$join->on('share_information.task_id', '=', 'tasks.task_id')->where('tasks.status', '0'); })->count() }}</b></small>
                                                    </div>
                                                    <div class="col-md-2 col-sm-4 text-md-center">
                                                        <small><span class="bg-info mr-2">&nbsp;&nbsp;</span>Started <b>{{  $employee->sharedTasks()->join('tasks', function ($join) {$join->on('share_information.task_id', '=', 'tasks.task_id')->where('tasks.status', '1'); })->count()  }}</b></small>
                                                    </div>
                                                    <div class="col-md-2 col-sm-4 text-md-center">
                                                        <small><span class="bg-warning mr-2">&nbsp;&nbsp;</span>Reported <b>{{  $employee->sharedTasks()->join('tasks', function ($join) {$join->on('share_information.task_id', '=', 'tasks.task_id')->where('tasks.status', '2'); })->count() }}</b></small>
                                                    </div>
                                                    <div class="col-md-2 col-sm-4 text-md-center">
                                                        <small><span class="bg-success mr-2">&nbsp;&nbsp;</span>Complete <b>{{  $employee->sharedTasks()->join('tasks', function ($join) {$join->on('share_information.task_id', '=', 'tasks.task_id')->where('tasks.status', '3'); })->count() }}</b></small>
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
                                                    <small><span class="bg-light mr-2">&nbsp;&nbsp;</span>Assigned {{ $employee->missions()->where('status','0')->count() }}</small>
                                                </div>
                                                <div class="col-md-2 col-sm-4 text-md-center">
                                                    <small><span class="bg-info mr-2">&nbsp;&nbsp;</span>Started{{ $employee->missions()->where('status','1')->count() }}</small>
                                                </div>
                                                <div class="col-md-2 col-sm-4 text-md-center">
                                                    <small><span class="bg-success mr-2">&nbsp;&nbsp;</span>Complete{{ $employee->missions()->where('status','2')->count() }}</small>
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
                                <div class="tab-pane fade" id="cbp" role="tabpanel">


                                            <div class="container">
                                                <div class="row cbp-container">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                                                        <div class="row cbp-profile mt-3 mb-2">
                                                            <div class="col-md-12">
                                                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                                                    <div class="panel panel-default panel-profile">
                                                                        @for ($x = 0; $x <= 5; $x++)
                                                                            <div class="panel-heading ml-3" role="tab" id="headingOne">
                                                                                <h4 class="panel-title">
                                                                                    <a class="collapsed collapsed-profile" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$x}}" aria-expanded="true" aria-controls="collapseOne">
                                                                                        <div class="container profile-container">
                                                                                            <div class="row">
                                                                                                <div class="col-md-9">
                                                                                                    <div class="container">
                                                                                                        <div class="row">
                                                                                                            <div class="col-md-1">
                                                                                                                <i class="fa fa-info-circle fa-lg pr-3 pl-0"></i>
                                                                                                            </div>
                                                                                                            <div class="col-md-11">
                                                                                                                <p>45 Street Construction Project</p>
                                                                                                                <small>Total SubTask - 3 </small>
                                                                                                                <div><br></div>
                                                                                                                <div class="progress progress-profile" >
                                                                                                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                                                                                                </div>
                                                                                                                <div>
                                                                                                                    <div class="container">
                                                                                                                        <div class="row">
                                                                                                                            <div class="col-md-10 p-0">
                                                                                                                                <small>Complete Progress</small>
                                                                                                                            </div>
                                                                                                                            <div class="col-md-2 text-right">
                                                                                                                                <small>&emsp;25%</small>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>

                                                                                                        </div>
                                                                                                    </div>

                                                                                                </div>

                                                                                                <div class="col-md-2 pl-3 h4">
                                                                                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter">Report</button>
                                                                                                </div>
                                                                                                <div class="col-md-1 pl-3 h4">
                                                                                                    <i class="dropdown-toggle" role="button"></i>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </a>
                                                                                </h4>
                                                                            </div>
                                                                            <div id="collapse{{$x}}" class="panel-collapse collapse ml-3" role="tabpanel" aria-labelledby="headingOne">
                                                                                <div class="shadow-sm p-3 mb-3 bg-white rounded panel-body pt-5 rounded">

                                                                                    <div class="row hod-cbp-subtask">
                                                                                        @for ($x = 0; $x <= 3; $x++)
                                                                                            <div class="col-md-6">
                                                                                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                                                                                    <div class="panel panel-default">
                                                                                                        <div class="panel-heading" role="tab" id="headingOne">
                                                                                                            <h4 class="panel-title">
                                                                                                                <a class="collapsed collapsed-subtask" role="button">
                                                                                                                    <div class="container">
                                                                                                                        <div class="row">
                                                                                                                            <div class="col-md-10">
                                                                                                                                <div class="container p-0">
                                                                                                                                    <div class="row">
                                                                                                                                        <div class="col-md-1 ">
                                                                                                                                            <i class="fa fa-info-circle pr-3 pl-0"></i>
                                                                                                                                        </div>
                                                                                                                                        <div class="col-md-10">
                                                                                                                                            CCTV တပ်ဆင်ရပါမည် တပ်ဆင်ရပါမည်တပ်ဆင်ရပါမည်
                                                                                                                                        </div>
                                                                                                                                    </div>
                                                                                                                                </div>

                                                                                                                            </div>
                                                                                                                            <div class="col-md-1">
                                                                                                                                <div class="cog-icon" data-toggle="modal" data-target="#subconfig"><i class="fa fa-cog"></i></div>
                                                                                                                                <div class="modal fade" id="subconfig" tabindex="-1" role="dialog" aria-labelledby="subconfigTitle" aria-hidden="true">
                                                                                                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                                                                                                        <div class="modal-content">
                                                                                                                                            <div class="modal-header modal-header-config">
                                                                                                                                                <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa fa-cog"></i>&emsp;CCTV တပ်ဆင်ရပါမည်</h5>
                                                                                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                                                                    <span aria-hidden="true">&times;</span>
                                                                                                                                                </button>
                                                                                                                                            </div>
                                                                                                                                            <div class="modal-body">

                                                                                                                                                <div class="container">
                                                                                                                                                    <div class="row">
                                                                                                                                                        <div class="col-4">
                                                                                                                                                            <label for="job_start_time" class="font-weight-bold text-muted"><i class="fa fa-clock"></i> &nbsp;Duration</label>
                                                                                                                                                        </div>
                                                                                                                                                        <div class="col-7">
                                                                                                                                                            <div class="form-group">
                                                                                                                                                                <div class="input-group date" data-target-input="nearest">
                                                                                                                                                                    <input type="text" id="job_start_time" class="form-control" data-target="#job_start_time"/>
                                                                                                                                                                    <div class="input-group-append" data-target="#job_start_time" data-toggle="datetimepicker">
                                                                                                                                                                        <div class="input-group-text"><i class="fa fa-calendar-alt text-muted"></i></div>
                                                                                                                                                                    </div>
                                                                                                                                                                </div>
                                                                                                                                                            </div>
                                                                                                                                                        </div>
                                                                                                                                                        <div class="col-4">
                                                                                                                                                            <label class="font-weight-bold text-muted" for="project_region"><i class="fa fa-user"></i> &nbsp;Process By</label>
                                                                                                                                                        </div>
                                                                                                                                                        <div class="col-7 mr-2">

                                                                                                                                                            <select class="w-100" id="project_region">
                                                                                                                                                                <option value=""></option>

                                                                                                                                                            </select>
                                                                                                                                                        </div>
                                                                                                                                                    </div>
                                                                                                                                                </div>
                                                                                                                                            </div>
                                                                                                                                            <div class="modal-footer">
                                                                                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                                                                                <button type="button" class="btn btn-config text-white">Submit</button>
                                                                                                                                            </div>
                                                                                                                                        </div>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </a>
                                                                                                            </h4>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>

                                                                                            </div>
                                                                                        @endfor
                                                                                    </div>



                                                                                </div>
                                                                            </div>
                                                                            <div class="panel-heading ml-3" role="tab" id="headingOne">
                                                                                <h4 class="panel-title">
                                                                                    <a class="collapsed collapsed-profile" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                                        <div class="container profile-container">
                                                                                            <div class="row">
                                                                                                <div class="col-md-9">
                                                                                                    <div class="container">
                                                                                                        <div class="row">
                                                                                                            <div class="col-md-1">
                                                                                                                <i class="fa fa-info-circle fa-lg pr-3 pl-0"></i>
                                                                                                            </div>
                                                                                                            <div class="col-md-11">
                                                                                                                <p>Complex 45 Project</p>
                                                                                                                <small>Total SubTask - 3 </small>
                                                                                                                <div><br></div>
                                                                                                                <div class="progress progress-profile" >
                                                                                                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 45%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                                                                                                </div>
                                                                                                                <div>
                                                                                                                    <div class="container">
                                                                                                                        <div class="row">
                                                                                                                            <div class="col-md-10 p-0">
                                                                                                                                <small>Complete Progress</small>
                                                                                                                            </div>
                                                                                                                            <div class="col-md-2 text-right">
                                                                                                                                <small>&emsp;45%</small>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>

                                                                                                        </div>
                                                                                                    </div>

                                                                                                </div>

                                                                                                <div class="col-md-2 pl-3 h4">
                                                                                                    <button type="button" class="btn btn-success">Report</button>
                                                                                                </div>
                                                                                                <div class="col-md-1 pl-3 h4">
                                                                                                    <i class="dropdown-toggle" role="button"></i>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </a>
                                                                                </h4>
                                                                            </div>
                                                                            <div id="collapseOne" class="panel-collapse collapse ml-3" role="tabpanel" aria-labelledby="headingOne">
                                                                                <div class="shadow-sm p-3 mb-3 bg-white rounded panel-body pt-5 rounded">

                                                                                    <div class="row hod-cbp-subtask">
                                                                                        @for ($x = 0; $x <= 6; $x++)
                                                                                            <div class="col-md-6">
                                                                                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                                                                                    <div class="panel panel-default">
                                                                                                        <div class="panel-heading" role="tab" id="headingOne">
                                                                                                            <h4 class="panel-title">
                                                                                                                <a class="collapsed collapsed-subtask" role="button">
                                                                                                                    <div class="container">
                                                                                                                        <div class="row">
                                                                                                                            <div class="col-md-10">
                                                                                                                                <div class="container p-0">
                                                                                                                                    <div class="row">
                                                                                                                                        <div class="col-md-1 ">
                                                                                                                                            <i class="fa fa-info-circle pr-3 pl-0"></i>
                                                                                                                                        </div>
                                                                                                                                        <div class="col-md-10">
                                                                                                                                            CCTV တပ်ဆင်ရပါမည် တပ်ဆင်ရပါမည်တပ်ဆင်ရပါမည်
                                                                                                                                        </div>
                                                                                                                                    </div>
                                                                                                                                </div>

                                                                                                                            </div>
                                                                                                                            <div class="col-md-1">
                                                                                                                                <div class="cog-icon" data-toggle="modal" data-target="#subconfig"><i class="fa fa-cog"></i></div>
                                                                                                                                <div class="modal fade" id="subconfig" tabindex="-1" role="dialog" aria-labelledby="subconfigTitle" aria-hidden="true">
                                                                                                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                                                                                                        <div class="modal-content">
                                                                                                                                            <div class="modal-header modal-header-config">
                                                                                                                                                <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa fa-cog"></i>&emsp;CCTV တပ်ဆင်ရပါမည်</h5>
                                                                                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                                                                    <span aria-hidden="true">&times;</span>
                                                                                                                                                </button>
                                                                                                                                            </div>
                                                                                                                                            <div class="modal-body">

                                                                                                                                                <div class="container">
                                                                                                                                                    <div class="row">
                                                                                                                                                        <div class="col-4">
                                                                                                                                                            <label for="job_start_time" class="font-weight-bold text-muted"><i class="fa fa-clock"></i> &nbsp;Duration</label>
                                                                                                                                                        </div>
                                                                                                                                                        <div class="col-7">
                                                                                                                                                            <div class="form-group">
                                                                                                                                                                <div class="input-group date" data-target-input="nearest">
                                                                                                                                                                    <input type="text" id="job_start_time" class="form-control datetimepicker-input" data-target="#job_start_time"/>
                                                                                                                                                                    <div class="input-group-append" data-target="#job_start_time" data-toggle="datetimepicker">
                                                                                                                                                                        <div class="input-group-text"><i class="fa fa-calendar-alt"></i></div>
                                                                                                                                                                    </div>
                                                                                                                                                                </div>
                                                                                                                                                            </div>
                                                                                                                                                        </div>
                                                                                                                                                        <div class="col-4">
                                                                                                                                                            <label class="font-weight-bold text-muted" for="project_region"><i class="fa fa-user"></i> &nbsp;Process By</label>
                                                                                                                                                        </div>
                                                                                                                                                        <div class="col-7 mr-2">

                                                                                                                                                            <select class="w-100" id="project_region">
                                                                                                                                                                <option value=""></option>

                                                                                                                                                            </select>
                                                                                                                                                        </div>
                                                                                                                                                    </div>
                                                                                                                                                </div>
                                                                                                                                            </div>
                                                                                                                                            <div class="modal-footer">
                                                                                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                                                                                <button type="button" class="btn btn-config text-white">Submit</button>
                                                                                                                                            </div>
                                                                                                                                        </div>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </a>
                                                                                                            </h4>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>

                                                                                            </div>
                                                                                        @endfor
                                                                                    </div>



                                                                                </div>
                                                                            </div>
                                                                        @endfor
                                                                    </div>
                                                                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                                        <div class="modal-dialog modal-lg" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa fa-info-circle pr-3" ></i>SubTask Tittle </h5>

                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                <span aria-hidden="true">&times;</span>
                                                                                            </button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <div class="form-group">
                                                                                        <label for="message-text" class="col-form-label">Report Letter:</label>
                                                                                        <textarea class="form-control" id="message-text"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                    <button type="button" class="btn btn-primary">Report</button>
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


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
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
        $(function () {
            if(window.location.hash==""){
                $('.tab-pane').removeClass('show active');
                $('#infos').addClass('show active');
                $(".list-group-item[href=\"#infos\"]").addClass('active');
            }else{
                $('.list-group-item').removeClass('active');
                $('.tab-pane').removeClass('show active');
                $(window.location.hash).addClass('show active');
                $(".list-group-item[href=\""+window.location.hash+"\"]").addClass('active');
            }
        });
    };
</script>
@endpush