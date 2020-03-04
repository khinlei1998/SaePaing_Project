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
                                <a href="#infos" class="list-group-item active" data-toggle="tab"><span><br><i class="fa fa-user"></i><br>Profile</span></a>
                                <a class="list-group-item" href="#tasks" data-toggle="tab"><span><br><i class="fa fa-tasks"></i><br>Tasks</span></a>
                                <a class="list-group-item" href="#sharetasks" data-toggle="tab"><span><br><i class="fa fa-share-square"></i><br>Shared Tasks</span></a>
                                <a class="list-group-item" href="#missions" data-toggle="tab"><span><br><i class="fa fa-calendar-alt"></i><br>Missions</span></a>
                                <a class="list-group-item" href="#cbp" data-toggle="tab"><span><br><i class="fa fa-tasks"></i><br>CBP</span></a>

                            </div>
                        </div>
                        <div class="col-10">
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="infos" role="tabpanel">
                                    <div class="row">
                                        <div class="col-2 mt-1">
                                            <strong>Name :</strong>
                                        </div>
                                        <div class="col-5 mt-1">
                                            {{ $employee->emp_name }}
                                        </div>
                                        <div class="col-5 mt-1">
                                            <button class="btn btn-outline-info d-block m-auto">HR FROM &nbsp;1</button>
                                        </div>
                                        <div class="col-2 mt-1">
                                            <strong>Department :</strong>
                                        </div>
                                        <div class="col-5 mt-1">
                                            {{ $employee->department->dept_name ??'-' }}
                                        </div>
                                        <div class="col-5 mt-1">
                                            <button class="btn btn-outline-info d-block m-auto">HR FROM 2</button>
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
                                                        <small><span class="bg-info mr-2">&nbsp;&nbsp;</span>Assigned <b>{{ $employee->assignedTasks()->where('status','0')->count() }}</b></small>
                                                    </div>
                                                    <div class="col-md-2 col-sm-4 text-md-center">
                                                        <small><span class="bg-success mr-2">&nbsp;&nbsp;</span>Started <b>{{ $employee->assignedTasks()->where('status','1')->count() }}</b></small>
                                                    </div>
                                                    <div class="col-md-2 col-sm-4 text-md-center">
                                                        <small><span class="bg-warning mr-2">&nbsp;&nbsp;</span>Reported <b>{{ $employee->assignedTasks()->where('status','2')->count()}}</b></small>
                                                    </div>
                                                    <div class="col-md-2 col-sm-4 text-md-center">
                                                        <small><span class="bg-secondary mr-2">&nbsp;&nbsp;</span>Complete <b>{{ $employee->assignedTasks()->where('status','3')->count()}}</b></small>
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
                                                                <td class="align-middle">{{ $task->assignedToEmployee->emp_name }}<br><small> ( Position : <b>{{ $task->assignedToEmployee->emp_position }} </b>)</small></td>
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




                                <!-- CBP -->

                                <div class="tab-pane fade" id="cbp" role="tabpanel">

                                    <div class="container">
                                        <div class="card shadow-lg index-tables border-0">
                                            <div class="container">
                                                <div class="row cbp-container">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                                                        <div class="row cbp-profile overflow-auto mt-3 mb-2">
                                                            <div class="col-md-12">
                                                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                                                    <div class="panel panel-default panel-profile">
                                                                       @foreach($employee->cbplist as $cbplist)
                                                                           <div>



                                                                            <div class="panel-heading ml-3" role="tab" id="headingOne">
                                                                                <h4 class="panel-title">
                                                                                    <a class="collapsed collapsed-profile" role="button">
                                                                                        <div class="container profile-container">
                                                                                            <div class="row">
                                                                                                <div class="col-md-9">
                                                                                                    <div class="container">
                                                                                                        <div class="row">
                                                                                                            <div class="col-md-1">
                                                                                                                <i class="fa fa-info-circle fa-lg pr-3 pl-0"></i>
                                                                                                            </div>
                                                                                                            <div class="col-md-11">
                                                                                                                <p>{{$cbplist->CBPlist->cbp_name}}</p>
                                                                                                                @php
                                                                                                                $project_title=DB::table('projects')->where('project_id',$cbplist->project_id)->first();
                                                                                                                @endphp
                                                                                                                <p>Project ( {{$project_title->project_title}} )</p>

                                                                                                                <small>Total SubTask - {{ count(explode(",",$cbplist->cbp_subtask)) }} </small>
                                                                                                                <div><br></div>
                                                                                                                <div class="progress progress-profile" >
                                                                                                                @php
                                                                                                                $cbpid=$cbplist->id;

                                                                                                                $get_per=DB::table('hod_reports')->where('projConfig_id',$cbplist->id)->orderBy('id','desc');
                                                                                                                @endphp
                                                                                                                @if($get_per->count() == 0)
                                                                                                                <div class="progress-bar bg-danger" role="progressbar" style="width: 0%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">0%</div>

                                                                                                                @else
                                                                                                                <div class="progress-bar bg-danger" role="progressbar" style="width: {{$get_per->first()->percentage}}%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">{{$get_per->first()->percentage}}%</div>

                                                                                                                @endif
                                                                                                                </div>
                                                                                                                <div>
                                                                                                                    <div class="container">
                                                                                                                        <div class="row">
                                                                                                                            <div class="col-md-10 p-0">
                                                                                                                                <small>Complete Progress</small>
                                                                                                                            </div>
                                                                                                                            <div class="col-md-2 text-right">
                                                                                                                                <small>&emsp;{{$cbplist->percent}}%</small>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>

                                                                                                        </div>
                                                                                                    </div>

                                                                                                </div>

                                                                                                <div class="col-md-2 pl-3 h4">
                                                                                                    <button type="button" class="btn btn-success btn_hot_report" data-config_id="{{$cbplist->id}}" data-config_title="{{$cbplist->CBPlist->cbp_name}}">Report</button>
                                                                                                </div>
                                                                                                <div class="col-md-1 pl-3 h4">
                                                                                                    <i class="dropdown-toggle" data-toggle="collapse" href="#collapseOne{{$loop->index}}" aria-expanded="true" aria-controls="collapseOne" role="button"></i>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </a>
                                                                                </h4>
                                                                            </div>



                                                                            <div id="collapseOne{{$loop->index}}" class="panel-collapse collapse ml-3" role="tabpanel" aria-labelledby="headingOne">
                                                                                <div class="shadow-sm p-3 mb-3 bg-white rounded panel-body pt-5 rounded">

                                                                                    <div class="row hod-cbp-subtask">
                                                                                    @if(empty($cbplist->cbp_sub_lists))
                                                                                    @else
                                                                                    @foreach($cbplist->cbp_sub_lists as $sublist)


                                                                                      <div class="col-md-6">
                                                                                              <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                                                                                  <div class="panel panel-default">
                                                                                                      <div class="panel-heading" role="tab" id="headingOne">
                                                                                                          <h4 class="panel-title">
                                                                                                              <a class="collapsed collapsed-subtask" role="button">
                                                                                                                  <div class="container hod-subtask">
                                                                                                                      <div class="row">
                                                                                                                          <div class="col-md-10">
                                                                                                                              <div class="container p-0">
                                                                                                                                  <div class="row">
                                                                                                                                      <div class="col-md-1 ">
                                                                                                                                          <i class="fa fa-info-circle pr-3 pl-0"></i>
                                                                                                                                      </div>
                                                                                                                                      <div class="col-md-10">
                                                                                                                                         {{$sublist['cbp_subtask']}}
                                                                                                                                      </div>
                                                                                                                                  </div>
                                                                                                                              </div>

                                                                                                                          </div>
                                                                                                                          <div class="col-md-1">
                                                                                                                              <div class="cog-icon show_cbp_hot" data-configid="{{$cbplist['id']}}" data-subcbpid="{{$sublist['id']}}" data-subcbptitle="{{$sublist['cbp_subtask']}}"><i class="fa fa-cog"></i></div>
                                                                                                                          </div>

                                                                                                                      </div>
                                                                                                                  </div>
                                                                                                              </a>
                                                                                                          </h4>
                                                                                                      </div>
                                                                                                  </div>
                                                                                              </div>

                                                                                          </div>













                                                                                      @endforeach
                                                                                    @endif


                                                                                    </div>



                                                                                </div>
                                                                            </div>
                                                                           </div>
                                                                        @endforeach
                                                                    </div>

                                                               <!-- bootstrap modal section -->
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
                                                                                    </div>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <div class="form-group">
                                                                                        <label for="message-text" class="col-form-label">Percentage:</label>
                                                                                        <input type="number" class="form-control" id="per" min="0" max="100"></input>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                    <button type="button" class="btn btn-primary" id="hod_report_submit">Report</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!-- bootstrap modal section -->



                                                                    <div class="modal fade in show" id="cbb_hot_modal" tabindex="-1" role="dialog" aria-labelledby="subconfigTitle" aria-hidden="true">
                                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header modal-header-config">
                                                                                    <h5 class="modal-title" ><i class="fa fa-cog"></i><p id="cbp_sub_task_title" class="d-inline-block"></p></h5>
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
                                                                                                    <div class="input-group date" id="to_show_require_error" data-target-input="nearest">
                                                                                                        <input type="text" id="job_start_time" class="form-control datetimepicker-input" data-target="#job_start_time"/>
                                                                                                        <div class="input-group-append" data-target="#job_start_time" data-toggle="datetimepicker">
                                                                                                            <div class="input-group-text"><i class="fa fa-calendar-alt"></i></div>
                                                                                                        </div>
                                                                                                        <br>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-4">
                                                                                                <label class="font-weight-bold text-muted" for="project_region"><i class="fa fa-user"></i> &nbsp;Process By</label>
                                                                                            </div>
                                                                                            <div class="col-7 mr-2">

                                                                                                <select class="w-100" id="project_region">
                                                                                                    <option value=""></option>
                                                                                                     @foreach($hots as $hot)
                                                                                                        <option value="{{ $hot->emp_id }}">{{ $hot->name }}</option>
                                                                                                     @endforeach
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                                                    <button type="button" id="btn_cbp_hot" class="btn btn-config text-white">Assign</button>
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
                                <!-- CBP -->

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
        window.onload=function(){
            localStorage.setItem("require_error", "");

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
                    // alert(config_id+" "+subtask_id);
                    $('#cbp_sub_task_title').append(title);
                    $('#cbb_hot_modal').modal('show');
                });



                $('#btn_cbp_hot').click(function(){

                    var hot_id = $('#project_region').find(':selected').val();
                    var deadline=$('#job_start_time').val();

                    if(deadline == ''){


                    }else{
                        $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        method: "POST",
                        url: "/assignToHot",
                        data:{config_id,subtask_id,hot_id,deadline}
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
                    }

                });



                var config_id  = 0;
                $('.btn_hot_report').click(function(){
                    $('#hot_report_title').empty();
                    config_id=$(this).data('config_id');
                    var config_title = $(this).data('config_title');
                    $('#hot_report_title').append(config_title);
                    // alert(config_id+" "+config_title); for test
                    $('#hod_report_modal').modal('show');
                });



                $('#hod_report_submit').click(function(){
                    var report_text = $('#report_text').val();
                    var per = $('#per').val();

                    // console.log(report_text);
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        method: "POST",
                        url: "/reportHot",
                        data:{config_id,report_text,per}
                    }).done(function (data) {
                        console.log("S blade: [task/create] component :[employee dropdown] from:app.js Data => Employee count" + data.length);
                        if(data.success){
                            console.log("fine");
                        // textarea value to empty
                        $('#report_text').val('');
                        //hide bs modal
                        $('#hod_report_modal').modal('hide');


                        window.swal({
                                     title: "Successfully Reported",
                                     text: "",
                                     icon: "success",
                                     button: "Close",
                                    });;


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