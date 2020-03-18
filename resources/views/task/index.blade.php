@extends('layouts.app')

@section('content')
    <div class="container">


        <div class="card shadow-lg index-tables border-0 mt-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                                <div class="row">
                                    <h4 class="mt-4 text-center w-100"><strong>Lists of Task</strong></h4>
                                    <a href="{{ route('task.create') }}" class="position-absolute add-button-link mt-4 mr-3">
                                        <button data-toggle="tooltip" data-placement="left" title="Add New To Do Lists" class="btn add-button text-white"><i class="fas fa-plus-circle"></i> Add </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3 mb-3 justify-content-center text-muted pb-3">

                            <div class="col-md-2 col-sm-4 text-md-center">
                                <small><span class="bg-light mr-2">&nbsp;&nbsp;</span>Assigned <b>{{ $assigntasks }}</b></small>
                            </div>
                            <div class="col-md-2 col-sm-4 text-md-center">
                                <small><span class="bg-info mr-2">&nbsp;&nbsp;</span>Started <b>{{ $starttasks }}</b></small>
                            </div>
                            <div class="col-md-2 col-sm-4 text-md-center">
                                <small><span class="bg-warning mr-2">&nbsp;&nbsp;</span>Reported <b>{{ $reporttasks }}</b></small>
                            </div>
                            <div class="col-md-2 col-sm-4 text-md-center">
                                <small><span class="bg-success mr-2">&nbsp;&nbsp;</span>Complete <b>{{ $completetasks }}</b></small>
                            </div>
                            <div class="col-md-2 col-sm-4 text-md-center">
                                <small><span class="bg-danger mr-2">&nbsp;&nbsp;</span>Reject <b>{{ $rejecttasks }}</b></small>
                            </div>

                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>

                                <tr>
                                    <th class="align-middle">Task ID</th>
                                    <th class="w-25 align-middle">Task Title</th>
                                    <th class="align-middle">Description</th>
                                    <th class="align-middle">Group</th>
                                    <th class="align-middle">Assigned To</th>
                                    <th class="align-middle">Project Title</th>
                                    <th class="align-middle">Start Time</th>
                                    <th class="align-middle">End Time</th>
                                    <th class="align-middle">Action</th>

                                </tr>
                                </thead>

                                <tbody>

                                @foreach ($alltasks as $task)

                                    <tr class="row-color {{ $task->task_status }}">
                                        <td class="align-middle text-center">{{ $task->task_status }}</td>
                                        <td class="align-middle">{{ Str::limit($task->task_title,30)}}</td>
                                        <td class="align-middle">{!!  Str::limit($task->description,50)  !!}</td>
                                        <td class="align-middle"><small> {{$task->assignedToEmployee->group->group_name}}</small></td>
                                        <td class="align-middle">{{ $task->assignedToEmployee->emp_name }}<br><small> ( Dept : <b>{{ $task->assignedToEmployee->department->dept_name }} </b>)</small><br><small></small></td>
                                        <td class="align-middle"><small> {{$task->all_projects->where('project_code',$task->project_code)->first()->project_title??"none"}}</small></td>
                                       
                                        <td class="align-middle"><small>{{ $task->started_at }}</small></td>
                                        <td class="align-middle"><small>{{ $task->finish_date }}</small></td>

                                        <td>
                                            <a href="{{ route('task.show', $task) }}" class="mb-2 d-block">
                                                <button data-toggle="tooltip" data-placement="left" title="Detail Task" class="btn shadow bg-orange text-white w-100"><i class="fas fa-info-circle"></i> </button>
                                            </a>

                                            @if($task->status==2)
                                            <a href="{{ route('task.show', $task) }}" class="mb-2 d-block">
                                                <button data-toggle="tooltip" data-placement="left" title="Approve Task" class="btn shadow bg-success text-white w-100"><i class="fas fa-check"></i> </button>
                                            </a>
                                            @endif
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
                                    {{ $alltasks->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection