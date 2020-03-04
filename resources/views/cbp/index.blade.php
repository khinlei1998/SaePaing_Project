@extends('layouts.app')
@section('title', 'CBP Management System')
@section('content')


<div class="container">
    <div class="card shadow-lg index-tables border-0 mt-5">
        <div class="container pb-3">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                    <div class="row">
                        <h4 class="mt-4 text-center w-100"><strong>CBP Management System</strong></h4>
                        <a class="position-absolute add-button-link mt-4 mr-3">
                        <button class="btn add-button text-white" data-toggle="modal" data-target="#addcbp"><i class="fas fa-plus-circle"></i> Add New CBP </button>
                        </a>
                    </div>

                    <hr>
​
                    <div class="row index-cbp overflow-auto">
                        @foreach($cbpList as $list)
                        <div class="col-md-4">
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingOne">
                                        <h4 class="panel-title">
                                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$list->cbp_id}}" aria-expanded="true" aria-controls="collapseOne">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-md-10">
                                                            <i class="fa fa-info-circle pr-3 pl-0"></i>{{ Str::limit($list->cbp_name,50) }}
                                                        </div>
                                                        <div class="col-md-2">
                                                            <form action="{{ route('cbplist.destroy',$list->cbp_id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button onclick="return confirm('Are you sure want to delete this?')" type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash-alt"></i></button>
                                                          </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse{{$list->cbp_id}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                        <div class="shadow p-3 mb-3 bg-white rounded panel-body pt-5 rounded">
                                            <button type="button" class="btn btn-secondary btn-sm btn-block" data-toggle="collapse" data-target="#filter-panel{{$list->cbp_id}}"> Add New Subtask</button>
                                            <div class="container" id="filter-panel{{$list->cbp_id}}">
                                                <div class="row mt-3">
                                                    <div class="col-md-8 offset-md-2">
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <input type="text" id="job_code" placeholder="Enter a new subtask" class="form-control"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8 offset-md-2">
                                                        <div class="container">
                                                            <div class="row mt-3">
                                                                <div class="col-md-6">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                                                        <label class="form-check-label" for="defaultCheck1">
                                                                            Default
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2 mr-5">
                                                                    <div class="form-check">
                                                                        <button type="button" class="btn btn-success">Success</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-10">
                                                        <ul class="pt-2 pl-3">
                                                            <li>Hi</li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-2 pt-2">
                                                        <button type="button" class="btn btn-danger btn-sm minus p-0"> - </button>
                                                    </div>
                                                </div>
                                            </div>


​
                                        </div>
                                    </div>
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

<div class="modal fade" id="addcbp" tabindex="-1" role="dialog" aria-labelledby="subconfigTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header modal-header-config">
                <h5 class="modal-title" id="exampleModalLongTitle">Add New CBP</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form class="form-horizontal" method="POST" action="{{ route('cbplist.store') }}">
              @csrf
            <div class="container">
                <div class="row">
                    <div class="col-4">
                        <label for="job_start_time" class="font-weight-bold text-muted">Title</label>
                    </div>
                    <div class="col-7">
                        <div class="form-group">
                            <div class="input-group date" data-target-input="nearest">
                                <input type="text" id="job_type" class="form-control" />
                            </div>
                        </div>
                    </div>

                    <div class="col-4">
                        <label for="job_start_time" class="font-weight-bold text-muted">Department</label>
                    </div>
                    <div class="col-7">
                        <select class="form-control w-100 department" id="project_region" name="">
                            @foreach(auth()->user()->accessible_departments as $deps)
                            <option value="{{ $deps->dept_id}}">{{ $deps->dept_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-config text-white">Submit</button>
            </div>
        </div>
    </div>
</div>
</div>

@endsection