<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
            <div class="row">
                <h4 class="mt-4 text-center w-100"><strong>{{ $title }}</strong></h4>
            </div>
        </div>
    </div>
    <form class="form-horizontal" role="form" method="POST" action="{{$create? route('team.store'): route('team.update', $team->team_id)}}">
        @if(!$create)
            {{ method_field('PUT') }}
        @endif
        @csrf
        <div class="row p-4 pl-5">
            <div class="col-3">
                <label for="team_title" class="font-weight-bold text-muted">Team Name :</label>
            </div>
            <div class="col-9">
                <div class="form-group">
                    <div class="input-group">
                        <input type="text"  class="form-control" name="team_name" value="{{ old('team_name',$team->team_name) }}" />
                    </div>
                </div>
            </div>

            <div class="col-3 mb-2">
                <label class="font-weight-bold text-muted" for="team_group">Group :</label>
            </div>
            <div></div>
            <div class="col-9">
                <select class="form-group  w-100" id="team_group" name="group_id" >
                    <option></option>
                        @foreach($team->all_groups as $group)
                            <option value="{{$group->group_id}}" {{$group->group_id ==$team->group_id ? 'selected' : ''}}>{{$group->group_name}}</option>
                        @endforeach
                </select>
            </div>

            <div class="col-3">
                <label class="font-weight-bold text-muted" for="department">Department :</label>
            </div>
            <div class="col-9">
                <div class="form-group">
                    <select class="department w-100"name="dept_id" id="department" >
                        <option value=""></option>
                    </select>
                </div>
            </div>

            <div class="col-3">
                <label class="font-weight-bold text-muted" for="sub_department">Sub Department :</label>
            </div>
            <div class="col-9">
                <div class="form-group">
                    <select class="sub_department w-100" id="sub_department" name="subdept_id" >
                        <option value=""></option>
                    </select>
                </div>
            </div>

    {{--        here we need extra ui for shwoing images related to the task--}}

            <div class="col-3">
                <label class="font-weight-bold text-muted"></label>
            </div>
            <div class="col-9 mt-2">
                <button class="btn btn-primary rounded shadow" type="submit" >Submit</button>
            </div>
        </div>
    </form>
</div>