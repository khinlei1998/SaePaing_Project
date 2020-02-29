@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-lg index-tables border-0 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                    <div class="row">
                        <h4 class="mt-4 text-center w-100"><strong>Group Create</strong></h4>
                    </div>
                </div>
            </div>
            <form class="form-horizontal" role="form" method="POST" action="{{ route('group.store') }}">
                @csrf
                <div class="row p-4 pl-5">
                    <div class="col-3">
                        <label for="group_name" class="font-weight-bold text-muted">Group Name:</label>
                    </div>
                    <div class="col-9">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" name="group_name" class="form-control {{ $errors->has('group_name') ? ' is-invalid' : ''}} "/>
                            </div>
                            @if ($errors->has('group_name'))
                        <span class="validate_emsg">
                           <small><strong>{{$errors->first('group_name')}}</strong></small>
                    </span>
                    @endif
                        </div>
                      </div>
                    <div class="col-3">
                        <label class="font-weight-bold text-muted"></label>
                    </div>
                    <div class="col-9 mt-2">
                        <button class="btn btn-primary rounded shadow" type="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection