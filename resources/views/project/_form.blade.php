<form class="form-horizontal" method="POST" action="{{ route('project.store') }}" >
@csrf

<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
            <div class="row">
                <h4 class="mt-4 text-center w-100"><strong>{{ $title }}</strong></h4>
            </div>
        </div>
    </div>
    <div class="row p-4 pl-5">
        <div class="col-3">
            <label for="project_title" class="font-weight-bold text-muted">Tittle :</label>
        </div>
        <div class="col-9">
            <div class="form-group">
                <div class="input-group">
                    <input type="text" class="@error('project_title') is-invalid @enderror form-control" name="project_title" placeholder="Name" value="{{ old('project_title') }}" autocomplete="project_title" autofocus  />
                  
                    @if($errors->has('project_title'))
                    @foreach($errors->get('project_title') as $pt)
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $pt }}</strong>
                        </span>
                        @endforeach
                    @enderror
                   
                </div>
            </div>
        </div>
        
        <div class="col-3">
            <label class="font-weight-bold text-muted">Project Description :</label>
        </div>
        <div class="col-9">
            <div class="form-group">
                    <textarea name="project_description" class="editor"></textarea>
                
            </div>
        </div>
​
         <div class="col-3">
            <label class="font-weight-bold text-muted">Project Code :</label>
        </div>
        <div class="col-9">
            <div class="form-group">
                <div class="input-group">
                    <input type="text" class="@error('project_code') is-invalid @enderror form-control" name="project_code" placeholder="Project Code" value="{{ old('project_code') }}" autocomplete="project_code"  />
                   
                </div>
            </div>
        </div>
​
​
        <div class="col-3 mt-2">
            <label class="font-weight-bold text-muted" for="project_region">Region :</label>
        </div>
        <div class="col-9">            
            <select class="project_region w-100" id="project_region" name="project_region">
                <option></option>
                <option value="Yangon">Yangon</option> 
                <option value="Mandalay">Mandalay</option>
            </select>
        </div>
​
        <div class="col-3 mt-3">
            <label for="job_start_time" class="font-weight-bold text-muted">Start Time :</label>
        </div>
        <div class="col-9 mt-3">
            <div class="form-group">
                <div class="input-group date" data-target-input="nearest">
                    <input type="text" id="job_start_time" name="project_startDate" class="form-control datetimepicker-input" data-target="#job_start_time"/>
                    <div class="input-group-append" data-target="#job_start_time" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar-alt"></i></div>
                    </div>
                </div>
            </div>
        </div>
​
        <div class="col-3 mt-3">
            <label for="job_end_time" class="font-weight-bold text-muted">End Time :</label>
        </div>
        <div class="col-9 mt-3">
            <div class="form-group">
                <div class="input-group date" data-target-input="nearest">
                    <input type="text" id="job_end_time" name="project_endDate" class="form-control datetimepicker-input" data-target="#job_end_time"/>
                    <div class="input-group-append" data-target="#job_end_time" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar-alt"></i></div>
                    </div>
                </div>
            </div>
        </div>
       

        <div class="offset-3 col-9 mt-2">
           
          <button class="btn btn-primary rounded shadow" type="submit"  id="createsub">Create Project</button>

        </div>
    </div>
</div>
</form>
