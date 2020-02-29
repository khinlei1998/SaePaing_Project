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
                                    <h4 class="mt-4 text-center w-100"><strong>Lists of Mission Form </strong></h4>
                                    <a href="{{ route('mission.create') }}" class="position-absolute add-button-link mt-4 mr-3">
                                        <button data-toggle="tooltip" data-placement="left" title="Add New Mission Lists" class="btn add-button text-white"><i class="fas fa-plus-circle"></i> Add </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3 mb-3 justify-content-center text-muted pb-3">

                            <div class="col-md-2 col-sm-4 text-md-center">
                                <small><span class="bg-light mr-2">&nbsp;&nbsp;</span>Assigned</small>
                            </div>
                            <div class="col-md-2 col-sm-4 text-md-center">
                                <small><span class="bg-info mr-2">&nbsp;&nbsp;</span>Started</small>
                            </div>
                            <div class="col-md-2 col-sm-4 text-md-center">
                                <small><span class="bg-success mr-2">&nbsp;&nbsp;</span>Complete</small>
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

                                @foreach ($missions as $mission)

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
        </div>

    </div>
@endsection