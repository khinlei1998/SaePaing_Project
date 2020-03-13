@extends('layouts.app')

@section('content')
    <div class="container">


        <div class="card shadow-lg index-tables border-0 mt-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="row mb-3">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                                <div class="row">
                                    <h4 class="mt-4 text-center w-100"><strong>Employee List</strong></h4>
                                    <a href="{{ route('employee.create') }}" class="position-absolute add-button-link mt-4 mr-3">
                                        <button data-toggle="tooltip" data-placement="left" title="Add New Employee" class="btn add-button text-white"><i class="fas fa-plus-circle"></i> Add </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                     
                        <div class="table-responsive">
                            <table class="table">
                                <thead>

                                <tr>
                                    <th>Employee ID</th>
                                    <th class="w-25">Employee Name</th>
                                    <th>Employee Position</th>
                                    <th>Group</th>
                                    <th>Department</th>
                                    <th class="text-center">Action</th>

                                </tr>
                                </thead>

                                <tbody>

                                @foreach ($employees as $emp)

                                    <tr class="">
                                        <td class="align-middle">{{ $emp->emp_id }}</td>
                                        <td class="align-middle">{{ Str::limit($emp->emp_name,30)}}</td>
                                        <td class="align-middle">{!!  Str::limit($emp->emp_position,50)  !!}</td>
                                        <td class="align-middle">{{ $emp->group->group_name}}</td>
                                        <td class="align-middle">{{ $emp->department?$emp->department->dept_name:"None"}}</td>
                                       

                                        <td>
                                            <a href="{{ route('employee.show', $emp) }}" class="mb-2 d-block">
                                                <button data-toggle="tooltip" data-placement="left" title="Detail Employee" class="btn shadow bg-orange text-white w-100"><i class="fas fa-edit"></i> </button>
                                            </a>
                                         </td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>



                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div>Showing 1 to {{count($employees)}} of {{$employees->total()}} entries</div>
                            </div>
                            <div class="col-sm-6">
                                <div>
                                    {{ $employees->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection