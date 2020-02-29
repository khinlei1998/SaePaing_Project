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
                                    <h4 class="mt-4 text-center w-100"><strong>Groups</strong></h4>
                                    <a href="{{ route('group.create') }}" class="position-absolute add-button-link mt-4 mr-3">
                                        <button data-toggle="tooltip" data-placement="left" title="Add New To Do Lists" class="btn add-button text-white"><i class="fas fa-plus-circle"></i> Add </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="table-responsive">
                            <table class="table">
                                <thead>

                                <tr>
                                    <th>Group ID</th>
                                    <th>Group Name</th>
                                    <th class="text-center">Action</th>

                                </tr>
                                </thead>

                                <tbody>

                                @foreach ($groups as $group)

                                    <tr>
                                        <td class="align-middle">{{ $group->group_id }}</td>
                                        <td class="align-middle">{{ $group->group_name}} <br> <small>( <strong>Employee:</strong> {{ count($group->employee)}} )</small></td>

                                        <td class="text-center">
                                            <a href="{{ route('group.edit', $group) }}" class="mb-2 d-block">
                                                <button data-toggle="tooltip" data-placement="left" title="Edit Group" class="btn shadow bg-orange text-white w-25"><i class="fas fa-edit"></i> </button>
                                            </a>
                                        </td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>



                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div>Showing 1 to {{count($groups)}} of {{$groups->total()}} entries</div>
                            </div>
                            <div class="col-sm-6">
                                <div>
                                    {{ $groups->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection