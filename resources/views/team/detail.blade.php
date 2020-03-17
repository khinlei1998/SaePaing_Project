@extends('layouts.app')

@section('content')
    <div class="container pb-4">
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
                                <div class="container">
                                    <div class="row">
                                        <div class="col-2 mb-2">
                                        <strong class="text-muted">Team Name</strong> 
                                        </div>
                                        <div class="col-1 mb-2">
                                        :
                                        </div>
                                        <div class="col-9 mb-2">
                                        {{ $team->team_name }}
                                        </div>
                                        <div class="col-2 mb-2">
                                        <strong class="text-muted">Subdept Name</strong> 
                                        </div>
                                        <div class="col-1 mb-2">
                                        :
                                        </div>
                                        <div class="col-9 mb-2">
                                        {{ $team->subdepartment->subdept_name??"none" }}
                                        </div>
                                        <div class="col-2 mb-2">
                                        <strong class="text-muted">Dept Name</strong> 
                                        </div>
                                        <div class="col-1 mb-2">
                                        :
                                        </div>
                                        <div class="col-9 mb-2">
                                        {{ $team->department->dept_name ??"none"}}
                                       
                                        </div>
                                        <div class="col-2 mb-2">
                                        <strong class="text-muted">Group Name </strong> 
                                        </div>
                                        <div class="col-1 mb-2">
                                        :
                                        </div>
                                        <div class="col-9 mb-2">
                                        {{ $team->group->group_name }}
                                           
                                        </div>
                                        

                                       
                                    </div>
                                </div>

                                <div class="container">
                                        <hr>
                                    </div>

                        <div class="container">
                            <div class="row">
                                
                                <div class="col-6">
                                
                                    
                                        <div class="col-lg-12 bg-white text-left"> <a href="{{ route('team.index', $team) }}" class="btn bg-orange text-white"><i class="fas fa-angle-left"></i>&emsp;Index</a></div>
                                       
                                </div>
                                <div class="col-6">
                               
                                    
                                    <div class="col-md-12 bg-white text-right"><a href="{{ route('team.edit', $team) }}" class="btn btn-outline-secondary"><i class="fas fa-edit"></i>&nbsp;&emsp;Edit Team&emsp; </a></a></div>
                                    <!-- <div class="col-md-2"> <a href="" class="btn bg-orange text-white"><i class="fas fa-edit"></i>&emsp;Start</a></div> -->
                                   
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
