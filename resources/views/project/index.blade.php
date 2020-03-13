@extends('layouts.app')
​@section('title', 'Project List')
@section('content')
​


<div class="container">
    <div class="card shadow-lg index-tables border-0">
        <div class="container pb-3">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                    <div class="row">
                        <h4 class="mt-4 text-center w-100">
                            <strong>Project List</strong>
                        </h4>
                        <a href="{{ route('project.create') }}" class="position-absolute add-button-link mt-4 mr-3">
                            <button data-toggle="tooltip" data-placement="left" title="Add New Mission Lists" class="btn add-button text-white"><i class="fas fa-plus-circle"></i> Add </button>
                        </a>                         
                    </div>​
                    <hr>
                    
                    <div class="container index-project">
                    
                    <div class="row">
                        @foreach($projects as $key => $project)
                        <div class="col-md-6">
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="panel panel-default panel-projectlist">
                                    <div class="panel-heading" role="tab" id="headingOne">
                                        <h4 class="panel-projectlist">
                                            <a class="collapsed card shadow border-0" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                <div class="container p-list">
                                                    <div class="row">
                                                        <div class="col-md-7 mb-3">
                                                            <i class="fa fa-bookmark pr-3"></i><strong>{{ $project->project_title}}</strong>
                                                        </div>
                                                        <div class="col-md-5 mb-3">
                                                           <small class="ml-3">From : {{ $project->project_startDate }}</small><br>
                                                           <small class="ml-3">To <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>: {{ $project->project_endDate}}</small>
                                                        </div>
                                                        <div class="col-md-3 mb-3 ">
                                                        <small>Job Description:</small>
                                                        </div>
                                                        <div class="col-md-9 mb-3 " style="height:70px;">
                                                            <!-- <small>
                                                                {!! Str::limit($project->project_description,90) !!}</small> -->
                                                                sdfffffffffffffffffffffs

                                                        </div>
                                                        <div class="col-md-12 text-center">
                                                        <?php

                                                        $get_config_counts_of_pj=DB::table('project_configs')->where('project_id',$project->project_id)->count();
                                                        $get_config_all_counts=DB::table('cbp_lists')->count();
                                                        ?>
                                                      
                                                      @if($get_config_counts_of_pj < $get_config_all_counts)



                                                            <button class="btn btn-review" onclick="window.location = '{{ route('project.show',$project->project_id) }}'">Configuration</button>
                                                            @else
                                                            <button class="btn btn-success" onclick="window.location = '{{ route('project_detail',$project->project_id) }}'">Review</button>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </h4>
                                    </div>
                                    
                                </div>
                               
                                
                            </div>
                        </div>
                        
                    @endforeach
                    </div>
​
                       
                </div>
            </div>
        </div>
    </div>
    </div>
</div>​
@endsection