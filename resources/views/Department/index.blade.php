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
                                    <h4 class="mt-4 text-center w-100"><strong>Departments</strong></h4>
                                    <a href="{{ route('department.create') }}" class="position-absolute add-button-link mt-4 mr-3">
                                        <button data-toggle="tooltip" data-placement="left" title="Add New To Do Lists" class="btn add-button text-white"><i class="fas fa-plus-circle"></i> Add </button>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table">
                                <thead>

                                <tr>
                                    <th>Department ID</th>
                                    <th>Department Name</th>
                                    <th>Group Name</th>
                                    <th class="text-center">Action</th>

                                </tr>
                                </thead>

                                <tbody>
                                @foreach ($departments as $department)

                                    <tr>
                                        <td class="align-middle">{{ $department->dept_id }}</td>
                                        <td class="align-middle">{{ $department->dept_name }}</td>
                                        <td class="align-middle">{{ $department->group->group_name }}</td>


                                        <td>
                                            <a href="{{ route('department.edit', $department)}}" class="mb-2 d-block">
                                                <button data-toggle="tooltip" data-placement="left" title="Edit Department" class="btn shadow bg-orange text-white w-100"><i class="fas fa-edit"></i> </button>
                                            </a>


                                        </td>

                                    </tr>
                                @endforeach


                                </tbody>
                            </table>



                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div>Showing 1 to {{count($departments)}} of {{$departments->total()}} entries</div>
                            </div>
                            <div class="col-sm-6">
                                <div>
                                    {{ $departments->links() }}
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection