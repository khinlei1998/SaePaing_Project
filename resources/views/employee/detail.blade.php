@extends('layouts.app')

@section('content')
    <div class="container pb-4">
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
                                <div class="container">
                                    <div class="row">
                                        <div class="col-2 mb-2">
                                        <strong class="text-muted">Employee ID</strong> 
                                        </div>
                                        <div class="col-1 mb-2">
                                        :
                                        </div>
                                        <div class="col-9 mb-2">
                                        {{ $employee->emp_id }}
                                        </div>
                                        <div class="col-2 mb-2">
                                        <strong class="text-muted">Employee Position</strong> 
                                        </div>
                                        <div class="col-1 mb-2">
                                        :
                                        </div>
                                        <div class="col-9 mb-2">
                                        {{ $employee->emp_position }}
                                        </div>
                                        <div class="col-2 mb-2">
                                        <strong class="text-muted">Employee Job Description</strong> 
                                        </div>
                                        <div class="col-1 mb-2">
                                        :
                                        </div>
                                        <div class="col-9 mb-2">
                                        {!! $employee->emp_jobdesp !!}
                                       
                                        </div>
                                        <div class="col-2 mb-2">
                                        <strong class="text-muted">Group </strong> 
                                        </div>
                                        <div class="col-1 mb-2">
                                        :
                                        </div>
                                        <div class="col-9 mb-2">
                                        {{ $employee->group->group_name??"None" }}
                                           
                                        </div>
                                        <div class="col-2 mb-2">
                                        <strong class="text-muted">Department </strong>
                                        </div>
                                        <div class="col-1 mb-2">
                                        :
                                        </div>
                                        <div class="col-9 mb-2">
                                        {{ $employee->department->dept_name ??"None"}}
                                        </div>
                                        <div class="col-2 mb-2">
                                        <strong class="text-muted">Sub Department </strong>
                                        </div>
                                        <div class="col-1 mb-2">
                                        :
                                        </div>
                                        <div class="col-9 mb-2">
                                        {{ $employee->subDepartment->subdept_name ??"None" }}
                                        </div>
                                        <div class="col-2 mb-2">
                                        <strong class="text-muted">Team </strong>
                                        </div>
                                        <div class="col-1 mb-2">
                                        :
                                        </div>
                                        <div class="col-9 mb-2">
                                        {{ $employee->team->team_name ??"None" }}
                                        </div>

                                       
                                    </div>
                                </div>
                                

                                    <div class="container">
                                        <hr>
                                    </div>

                        <div class="container">
                            <div class="row">
                                
                                <div class="col-6">
                                
                                    
                                        <div class="col-lg-12 bg-white text-left"> <a href="{{ route('employee.index') }}" class="btn bg-orange text-white"><i class="fas fa-angle-left"></i>&emsp;Index</a></div>
                                       
                                </div>
                                <div class="col-6">
                               
                                    
                                    <div class="col-md-12 bg-white text-right"><a href="{{ route('employee.edit', $employee) }}" class="btn btn-outline-secondary"><i class="fas fa-edit"></i>&nbsp;&emsp;Edit Employee&emsp; </a></a></div>
                                    <!-- <div class="col-md-2"> <a href="" class="btn bg-orange text-white"><i class="fas fa-edit"></i>&emsp;Start</a></div> -->
                                   
                                </div>
                                
                            </div>
                        </div>

                                    <!-- <td>
                                        <a href="{{ route('employee.edit', $employee) }}" class="mb-2 d-block">
                                            <button data-toggle="tooltip" data-placement="left" title="Edit Team" class="btn shadow bg-orange text-white w-100"><i class="fas fa-edit"></i> </button>
                                        </a>


                                    </td>

                                    <td>
                                        <a href="{{ route('employee.index') }}" class="mb-2 d-block">
                                            <button data-toggle="tooltip" data-placement="left" title="index" class="btn shadow bg-orange text-white w-100"><i class="fas fa-edit"></i> </button>
                                        </a>


                                    </td> -->

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
