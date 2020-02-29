@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card shadow-lg index-tables border-0 mt-5">
            <div class="w-100 {{ $team->team_name}} rounded-top mb-2 status-height">
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                        <div class="card-header bg-white">
                            <div class="card-title"><h3 class="text-center">{{ $team->team_name }}</h3> </div>
                        </div>
                        <div class="card-body">
                            <div class=" p-3" >
                                <div class="row p-3">
                                    <div class="col-md-6 col-sm-12">
                                        <h4> Team Name :</h4>
                                        <h6 class="font-weight-bold text-muted"> {{ $team->team_name }}</h6>

                                        <h4> Subdept Name :</h4>



                                        <h6 class="font-weight-bold text-muted"> {{ $team->subdepartment->subdept_name??"none" }}</h6>

                                        <h4> dept Name :</h4>
                                        <h6 class="font-weight-bold text-muted"> {{ $team->department->dept_name ??"none"}}</h6>

                                        <h4> gp Name :</h4>
                                        <h6 class="font-weight-bold text-muted"> {{ $team->group->group_name }}</h6>

                                    </div>

                                    <td>
                                        <a href="{{ route('team.edit', $team) }}" class="mb-2 d-block">
                                            <button data-toggle="tooltip" data-placement="left" title="Edit Team" class="btn shadow bg-orange text-white w-100"><i class="fas fa-edit"></i> </button>
                                        </a>


                                    </td>

                                    <td>
                                        <a href="{{ route('team.index', $team) }}" class="mb-2 d-block">
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
