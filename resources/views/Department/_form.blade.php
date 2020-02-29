<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
            <div class="row">
                <h4 class="mt-4 text-center w-100"><strong>{{ $title }}</strong></h4>
            </div>
        </div>
    </div>
    <form class="form-horizontal" role="form" method="POST" action="{{$create? route('department.store'): route('department.update', $department->dept_id)}}">
        @if(!$create)
            {{ method_field('PUT') }}
        @endif
        @csrf
        <div class="row p-4 pl-5">
            <div class="col-3">
                <label for="dept_name" class="form-controlfont-weight-bold text-muted">Department Name :</label>
            </div>
           
   <div class="col-9">
                <div class="form-group">
                    <div class="input-group">
                        <input type="text"  class="form-control {{ $errors->has('dept_name') ? ' is-invalid' : ''}} " name="dept_name"  value="{{ old('dept_name',$department->dept_name) }}"  />
                       
                    </div>
                    @if ($errors->has('dept_name'))
                        <span class="validate_emsg">
                           <small><strong>{{$errors->first('dept_name')}}</strong></small>
                    </span>
                    @endif
                </div>
            </div>

            <div class="col-3">
                <label class="font-weight-bold text-muted" for="team_group">Group :</label>
            </div>
            <div></div>
            <div class="col-9" >
                <select class="form-group  w-100 {{ $errors->has('group_id') ? ' is-invalid' : ''}} " id="dept_group" name="group_id" >
                    <option></option>
                    @foreach($department->all_groups as $group)
                        <option value="{{$group->group_id}}" {{$group->group_id ==$department->group_id ? 'selected' : ''}}>{{$group->group_name}}</option>
                    @endforeach
                </select>
                @if ($errors->has('group_id'))
                        <span class="validate_emsg">
                           <small> <strong>{{$errors->first('group_id')}}</strong></small>
                    </span>
                    @endif
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