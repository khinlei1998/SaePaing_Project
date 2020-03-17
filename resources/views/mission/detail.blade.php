@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card shadow-lg index-tables border-0 mt-5">
            <div class="w-100 {{ $mission->mission_status }} rounded-top mb-2 status-height">
            </div>
            <div class="container">
                <div class="row">

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                        <div class="card-header bg-white">

                        <div class="container">
                                <div class="row">
                           
                                    <div class="col-md-12"><div class="card-title"><h3 class="text-center">{{ $mission->job_type }}</h3> </div></div>
                                
                                </div>
                            </div>
                        </div>
                        
                        <div class="card-body">
                            <div class=" p-3" >
                                
                                <div class="container">
                                    <div class="row">
                                        <div class="col-2 mb-4">
                                        <strong class="text-muted">Assigned To</strong> 
                                        </div>
                                        <div class="col-1 mb-4">
                                        :
                                        </div>
                                        <div class="col-9 mb-4">
                                        {{ $mission->employee->emp_name.' >> '.$mission->employee->emp_position }}
                                        </div>
                                        <div class="col-2 mb-4">
                                        <strong class="text-muted">Job Finished Date</strong> 
                                        </div>
                                        <div class="col-1 mb-4">
                                        :
                                        </div>
                                        <div class="col-9 mb-4">
                                        {{ $mission->jobfinished_date }}
                                        </div>
                                        <div class="col-2 mb-2">
                                        <strong class="text-muted">Job Objective</strong> 
                                        </div>
                                        <div class="col-1 mb-2">
                                        :
                                        </div>
                                        <div class="col-9 mb-2">
                                        {!! $mission->job_obj !!}
                                        </div>
                                        <div class="col-2 mb-2">
                                        <strong class="text-muted">Doing Methods</strong> 
                                        </div>
                                        <div class="col-1 mb-2">
                                        :
                                        </div>
                                        <div class="col-9 mb-2">
                                        {!! $mission->doing_methods !!}
                                        </div>
                                        <div class="col-2 mb-2">
                                        <strong class="text-muted">Issue Resolve Ways</strong> 
                                        </div>
                                        <div class="col-1 mb-2">
                                        :
                                        </div>
                                        <div class="col-9 mb-2">
                                        {!! $mission->issue_resolve_ways !!}
                                        </div>
                                    </div>
                                    <div class="container mt-3">
                                            <div class="col-12 p-4">
                                                <div class="nav nav-pills nav-justified border-2">
                                                    <a class="nav-item nav-link active" data-toggle="tab" role="tab" aria-controls="nav-reference" aria-selected="true" href="#reference">Chairman's Files</a>
                                                </div>
                                                <div class="tab-content">
                                                    <div class="tab-pane fade show active task-detail-tabpane" id="reference">
                                                        <div class="row p-3">
                                                        @foreach($mission->mission_attach_files as $src)
                                                            <div class="col-2 tabpane-image text-center">
                                                                <div class="card" style="width: 11rem;">
                                                                    <img class="card-img-top" src="{{ asset(\Illuminate\Support\Facades\Storage::url($src) ) }}" alt="Image" width="10" height="150" class="rounded mr-2">
                                                                    <div class="card-body">
                                                                        <small>{{ $mission->created_at }}</small>
                                                                        <a href="{{ asset(\Illuminate\Support\Facades\Storage::url($src) ) }}" download>&emsp;<i class="fa fa-download"></i></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="container">
                            <hr>
                        </div>

                        <div class="container pb-3">
                            <div class="row">
                                
                                <div class="col-6 mb-2">

                                    <div class="container">
                                        <div class="row">
                                            <div class="col-12"> 
                                                @can('create',\App\Mission::class)
                                                <div class="col-lg-12 position-absolute inline-block bg-white text-left mr-5 "> <a href="{{ route('mission.index', $mission) }}" class="btn bg-orange text-white"><i class="fas fa-angle-left"></i>&emsp;Back</a></div> 
                                                @endcan
                                                @if(auth::user()->emp_id==$mission->emp_id)
                                                <div class="col-lg-12 bg-white text-left mr-5"> <a href="{{ url('profile') }}" class="btn bg-orange text-white mr-5"><i class="fas fa-angle-left"></i>&emsp;Back</a></div>
                                                @endif
                                                @can('create',\App\Mission::class)
                                                    <div class="col-lg-12 ml-5"><a href="{{ route('mission.edit', $mission) }}" class="btn btn-outline-secondary ml-5"><i class="fas fa-edit"></i>&nbsp;&emsp;Edit Mission&emsp; </a></a></div>
                                                    <!-- <div class="col-md-2"> <a href="" class="btn bg-orange text-white"><i class="fas fa-edit"></i>&emsp;Start</a></div> -->
                                                @endcan
                                            </div>
                                            
                                            
                                        </div>
                                    </div>
                                
                                </div>

                                <div class="col-6 mb-2">
                               
                                        <form action="{{ route('mission_start') }}" method="POST">
                                             @csrf 
                                            <input type="hidden" value="{{$mission->mission_id}}" name="mission_id">
                                           
                                            <div class="container mr-3 pr-5">
                                                <div class="row">
                                                    
                                                    <div class="col-12 text-right">
                                                        @if($mission->status == 0 &&  auth::user()->name != "Chairman")
                                                        <button class="btn btn-primary rounded shadow position-absolute inline-block" name="status" value="start">Start</button>
                                                        @endif
                                                        
                                                    </div>
                                                    <div class="col-12 text-right">
                                                        @if($mission->status != 2 &&  auth::user()->name != "Chairman")
                                                        <button class="btn btn-success rounded shadow mr-5" name="status" value="complete">Complete</button>
                                                        @endif
                                                    </div>
                                                    
                                                   
                                                </div>
                                            </div>
                                            
                                        </form>
                                </div>
                                
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
