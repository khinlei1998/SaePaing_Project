<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
            <div class="row">
                <h4 class="mt-4 text-center w-100"><strong>{{ $title }}</strong></h4>
            </div>
        </div>
    </div>
    <form class="form-horizontal" role="form" method="POST" action="{{$create? route('employee.store'): route('employee.update', $employee->emp_id)}}">
        @if(!$create)
        {{method_field('PUT')}}
        @endif
        @csrf
    <div class="row p-4 pl-5">

    <div class="col-3">
            <label for="emp_id" class="font-weight-bold text-muted">Employee ID :</label>
        </div>
        <div class="col-9">
            <div class="form-group">
                <div class="input-group">
                    <input type="text" id="emp_id" name="emp_id" class="form-control {{ $errors->has('emp_id') ? ' is-invalid' : ''}}" value="{{ old('emp_id',$employee->emp_id) }}"/>
                </div>
                @if ($errors->has('emp_id'))
                        <span class="validate_emsg">
                           <small><strong>{{$errors->first('emp_id')}}</strong></small>
                    </span>
                    @endif
            </div>
        </div>


        <div class="col-3">
            <label for="emp_name" class="font-weight-bold text-muted">Employee Name :</label>
        </div>
        <div class="col-9">
            <div class="form-group">
                <div class="input-group">
                    <input type="text" id="emp_name" name="emp_name" class="form-control {{ $errors->has('emp_name') ? ' is-invalid' : ''}}" value="{{ old('emp_name',$employee->emp_name) }}"/>
                </div>
                @if ($errors->has('emp_name'))
                        <span class="validate_emsg">
                           <small><strong>{{$errors->first('emp_name')}}</strong></small>
                    </span>
                    @endif
            </div>
        </div>

        <div class="col-3">
            <label class="font-weight-bold text-muted" for="emp_jobdesp">Job Descripiton :</label>
        </div>
        <div class="col-9">
            <div class="form-group">
                <textarea name="emp_jobdesp" class="empeditor {{ $errors->has('emp_jobdesp') ? ' is-invalid' : ''}}" id="emp_jobdesp">{{ old('emp_jobdesp',$employee->emp_jobdesp) }}</textarea>
                @if ($errors->has('emp_jobdesp'))
                        <span class="validate_emsg">
                           <small><strong>{{$errors->first('emp_jobdesp')}}</strong></small>
                    </span>
                    @endif
            </div>
          
        </div>

        <div class="col-3">
            <label class="font-weight-bold text-muted" for="emp_position">Position :</label>
        </div>
        <div class="col-9">
            <div class="form-group">
                <select class="position w-100 {{ $errors->has('emp_position') ? ' is-invalid' : ''}}" id="emp_position" name="emp_position">
                    <option value=""></option>
                    
                    @foreach($employee->all_roles as $role)
                            <option value="{{$role->role}}" {{$role->role ==$employee->emp_position ? 'selected' : ''}}>{{$role->role}}</option>
                        @endforeach
                </select>
                @if ($errors->has('emp_position'))
                        <span class="validate_emsg">
                           <small><strong>{{$errors->first('emp_position')}}</strong></small>
                    </span>
                    @endif
            </div>
          
        </div>



        <div class="col-3">
            <label class="font-weight-bold text-muted" for="team_group">Group :</label>
        </div>
        <div class="col-9">
        <div class="form-group">
                <select class="w-100 {{ $errors->has('group_id') ? ' is-invalid' : ''}}" id="team_group" name="group_id">
                    <option></option>
                        @foreach($employee->all_groups as $group)
                            <option value="{{$group->group_id}}" {{$group->group_id ==$employee->group_id ? 'selected' : ''}}>{{$group->group_name}}</option>
                        @endforeach
                </select>
                @if ($errors->has('group_id'))
                        <span class="validate_emsg">
                           <small><strong>{{$errors->first('group_id')}}</strong></small>
                    </span>
                    @endif
</div>

            </div>

            <div class="container">
            <div class="row shdiv" id="Dept"> 
        <div class="col-3">
            <label class="font-weight-bold text-muted" for="department">Department :</label>
        </div>
        <div class="col-9">
            <div class="form-group">
                <select class="department w-100 {{ $errors->has('dept_id') ? ' is-invalid' : ''}}" name="dept_id" id="department">
                    <option value=""></option>
                </select>
                @if ($errors->has('dept_id'))
                        <span class="validate_emsg">
                           <small><strong>{{$errors->first('dept_id')}}</strong></small>
                    </span>
                    @endif
            </div>
        </div>
        </div>


        <div class="row shdiv" id="SubDept"> 
        <div class="col-3" id="SubDept">
            <label class="font-weight-bold text-muted" for="sub_department">SubDepartment :</label>
        </div>
        <div class="col-9" id="SubDept">
            <div class="form-group">
                <select class="sub_department w-100 {{ $errors->has('subdept_id') ? ' is-invalid' : ''}}" name="subdept_id" id="sub_department">
                    <option value=""></option>
                </select>
                @if ($errors->has('subdept_id'))
                        <span class="validate_emsg">
                           <small><strong>{{$errors->first('subdept_id')}}</strong></small>
                    </span>
                    @endif
            </div>
        </div>
        </div>

        <div class="row shdiv" id="Team"> 
        <div class="col-3" id="Team">
            <label class="font-weight-bold text-muted" for="team">Team :</label>
        </div>
        <div class="col-9" id="Team">
            <div class="form-group">
                <select class="team w-100 {{ $errors->has('team_id') ? ' is-invalid' : ''}}" name="team_id" id="team">
                    <option value=""></option>
                </select>
                @if ($errors->has('team_id'))
                        <span class="validate_emsg">
                           <small><strong>{{$errors->first('team_id')}}</strong></small>
                    </span>
                    @endif
            </div>
        </div>
        </div>
        </div>
       
     
<div class="col-3">
            <label class="font-weight-bold text-muted"></label>
        </div>
        <div class="col-9 mt-2">
        <button class="btn btn-primary rounded shadow" type="submit" >Submit</button>
        </div>
    </div>
    
</form>
</div>