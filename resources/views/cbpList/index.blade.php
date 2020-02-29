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


                    <div class="row index-cbp">
                        @foreach($cbpList as $list)
                        <div class="col-md-4">
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingOne">
                                        <h4 class="panel-title">
                                            <a class="collapsed" role="button">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-md-10"  data-toggle="collapse" data-parent="#accordion" href="#collapse{{$list->cbp_id}}" aria-expanded="true" aria-controls="collapseOne">
                                                            <div class="container">
                                                                <div class="row">
                                                                    <div class="col-md-2">
                                                                        <i class="fa fa-info-circle pr-3 pl-0"></i>
                                                                    </div>
                                                                    <div class="col-md-10">
                                                                    {{ Str::limit($list->cbp_name,50) }}
                                                                    </div>
                                                                </div>
                                                            </div>
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
                                            <form method="GET" class="form-horizontal m-t-20" action="{{ url('cbp') }}">
                                            {{ csrf_field() }}
                                                <div class="row collapse mt-3" id="filter-panel{{$list->cbp_id}}">
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <input type="text" name="cbp_subtask" placeholder="Enter a new subtask" class="form-control"/>
                                                                <input type="hidden" name="cbp_id" value="{{$list->cbp_id}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-check">
                                                            <button type="submit" class="btn btn-success">Add</button>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </form>
                                            <hr>
                                            </div>
                                            
                                            <div class="container pt-4">
                                                <div class="row">
                                                @foreach($list->cbpsubtasks()->where('status','0')->get() as $value)
                                                    @if($value->cbp_id === $list->cbp_id) 

                                                    <div class="col-md-10">                               
                                                        <ul class="pl-3">
                                                            <li>{{$value->cbp_subtask}}</li>
                                                            <input type="hidden" name="cbp_subtask[]" value="{{$value->id}}">
                                                        </ul>
                                                    </div>
                                                   
                                                    <div class="col-md-2">
                                                        <form action="{{ route('cbp_config.destroy', $value->id) }}" method="POST">                   
                                                            @csrf
                                                            @method('DELETE') 
                                                            <button type="submit" class="btn btn-danger btn-sm">-</button>
                                                           
                                                        </form>    
                                                    </div>
                                                    @endif                                                
                                                @endforeach   
                                                   
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
            <form class="form-horizontal" method="POST" action="{{ route('cbplist.store') }}">
              @csrf
                <div class="modal-body">
                         <div class="container">
                            <div class="row">

                                <div class="col-4">
                                    <label for="title" class="font-weight-bold text-muted">Title</label>
                                </div>

                                <div class="col-7">
                                    <div class="form-group">
                                        <div class="input-group date" data-target-input="nearest">
                                            <input type="text" id="cbp_name"  name="cbp_name" class="form-control" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <label for="dept_id" class="font-weight-bold text-muted">Department</label>
                                </div>

                                <div class="col-7">
                                    <select class="form-control w-100 cbp_dept" id="dept_id" name="dept_id">
                                        @foreach($list->all_depts as  $dept)
                                        <option value="{{ $dept->dept_id}}">{{ $dept->dept_name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-config text-white">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

</div>

@endsection