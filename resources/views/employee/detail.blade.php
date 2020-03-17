@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card shadow-lg index-tables border-0 mt-5">
            <div class="w-100 {{ $employee->emp_name}} rounded-top mb-2 status-height">
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                        <div class="card-header bg-white">
                            <div class="card-title"><h3 class="text-center">{{ $employee->emp_name }}</h3> </div>
                        </div>
                        <div class="card-body">
                            <div class=" p-3" >
                                <div class="row p-3">
                                    <div class="col-md-6 col-sm-12">
                                        <h4> Employee ID :</h4>
                                        <h6 class="font-weight-bold text-muted"> {{ $employee->emp_id }}</h6>
                                        <h4> Employee Position :</h4>
                                        <h6 class="font-weight-bold text-muted"> {{ $employee->emp_position }}</h6>
                                        <h4> Employee Job Description :</h4>
                                        <h6 class="font-weight-bold text-muted"> {!! $employee->emp_jobdesp !!}</h6>


                                        <h4> Group :</h4>
                                        <h6 class="font-weight-bold text-muted"> {{ $employee->group->group_name??"None" }}</h6>

                                        <h4> Department :</h4>
                                        <h6 class="font-weight-bold text-muted"> {{ $employee->department->dept_name ??"None"}}</h6>

                                        <h4> Sub Department :</h4>
                                        <h6 class="font-weight-bold text-muted"> {{ $employee->subDepartment->subdept_name ??"None" }}</h6>

                                        <h4> Team :</h4>
                                        <h6 class="font-weight-bold text-muted"> {{ $employee->team->team_name ??"None" }}</h6>

                                    </div>

                                    <td>
                                        <a href="{{ route('employee.edit', $employee) }}" class="mb-2 d-block">
                                            <button data-toggle="tooltip" data-placement="left" title="Edit Team" class="btn shadow bg-orange text-white w-100"><i class="fas fa-edit"></i> </button>
                                        </a>


                                    </td>

                                    <td>
                                        <a href="{{ route('employee.index') }}" class="mb-2 d-block">
                                            <button data-toggle="tooltip" data-placement="left" title="index" class="btn shadow bg-orange text-white w-100"><i class="fas fa-edit"></i> </button>
                                        </a>


                                    </td>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
