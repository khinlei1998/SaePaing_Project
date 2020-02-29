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
                                    <h4 class="mt-4 text-center w-100"><strong>Teams</strong></h4>
                                    <a href="{{ route('team.create') }}" class="position-absolute add-button-link mt-4 mr-3">
                                        <button data-toggle="tooltip" data-placement="left" title="Add New To Do Lists" class="btn add-button text-white"><i class="fas fa-plus-circle"></i> Add </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="table-responsive">
                            <table class="table">
                                <thead>

                                <tr>
                                    <th>Team ID</th>
                                    <th>Team Name</th>
                                    <th>Group Name</th>
                                    <th>Department Name</th>
                                    <th>Subdeparment Name</th>
                                    <th class="text-center">Action</th>

                                </tr>
                                </thead>

                                <tbody>
                                @foreach ($teams as $team)

                                    <tr>
                                        <td class="align-middle text-center">{{ $team->team_id }}</td>
                                        <td class="align-middle text-center">{{ $team->team_name }}</td>
                                        <td class="align-middle">{{ Str::limit($team->group->group_name)}}</td>
                                        <td class="align-middle">{{ Str::limit($team->department->dept_name)}}</td>

                                        <td class="align-middle">{{ $team->subdepartment->subdept_name}}</td>

                                        <td>
                                            <a href="{{ route('team.show', $team) }}" class="mb-2 d-block">
                                                <button data-toggle="tooltip" data-placement="left" title="Detail Team" class="btn shadow bg-orange text-white w-100"><i class="fas fa-edit"></i> </button>
                                            </a>


                                        </td>

                                    </tr>
                                @endforeach


                                </tbody>
                            </table>



                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div>Showing 1 to {{count($teams)}} of {{$teams->total()}} entries</div>
                            </div>
                            <div class="col-sm-6">
                                <div>
                                    {{ $teams->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection