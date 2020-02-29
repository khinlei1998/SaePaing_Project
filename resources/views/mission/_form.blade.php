<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
            <div class="row">
                <h4 class="mt-4 text-center w-100"><strong>{{ $title }}</strong></h4>
            </div>
        </div>
    </div>
    <div class="row p-4 pl-5 mission-form-require">
        <div class="col-3">
            <label for="job_type" class="font-weight-bold text-muted">Job Type :</label>
        </div>
        <div class="col-9 ">
            <div class="form-group job_type_append">
                <div class="input-group">
                    <input type="text" id="job_type" class="form-control job_type" value="{{ old('job_type',$mission->job_type) }}"/>
                </div>
            </div>
        </div>
        <div class="col-3">
            <label for="job_target" class="font-weight-bold text-muted">Job Target :</label>
        </div>
        <div class="col-9 ">
            <div class="form-group job_target_append">
                <div class="input-group">
                    <input type="text" id="job_target" class="form-control job_target" value="{{ old('job_target',$mission->job_target) }}"/>
                </div>
            </div>
        </div>
        <div class="col-3">
            <label class="font-weight-bold text-muted" for="job_objective">Job Objective:</label>
        </div>
        <div class="col-9 ">
        <div class="form-group job_obj_append">
                <textarea name="TD" class="editor1 mission_editor" id="job_objective"></textarea>
            </div>
        </div>
        <div class="col-3">
            <label class="font-weight-bold text-muted" for="responsible_person">Responsible Person :</label>
        </div>
        <div class="col-9 ">
        <div class="form-group employee_append">
        <select class="responsible_person w-100 assignee" id="responsible_person">
                    <option value=""></option>
                @foreach(auth()->user()->responsible_persons as $rp)
                    @if($rp->emp_id != old('emp_id',$mission->emp_id) )
                        <option value="{{$rp->emp_id}}">{{$rp->name}}</option>
                    @else
                        <option value="{{$rp->emp_id}}" selected>{{$rp->name}}</option>
                    @endif
                    
                @endforeach
            </select>


           
</div>
        </div>
        <div class="col-3 mt-3">
            <label for="job_finished_date" class="font-weight-bold text-muted">Job Finished Date :</label>
        </div>
        <div class="col-9 mt-3 ">
            <div class="form-group finished_date_append">
                <div class="input-group date" data-target-input="nearest">
                    <input type="text" id="job_finished_date" class="form-control datetimepicker-input finished_date" data-target="#job_finished_date"/>
                    <div class="input-group-append" data-target="#job_finished_date" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar-alt"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3">
            <label class="font-weight-bold text-muted" for="doing_methods">Doing Methods:</label>
        </div>
        <div class="col-9 ">
            <div class="form-group doing_method_append">
                <textarea name="TD" class="editor2 methods" id="doing_methods"></textarea>
            </div>
        </div>
        
{{--        here we need extra ui for shwoing images related to the mission--}}
        @if(!$create)
            <div class="col-3">
                <label class="font-weight-bold text-muted" for="task_assigned_to">Your Last Attach Files:</label>
            </div>

            <div class="col-9 p-4">
                <div class="row">
                    @foreach($mission->mission_attach_files as $src)
                        <div class="col-3">
                        <input type="hidden" value="{{$src}}" name="old_mission_image" class="old_mission_image">
                            <img src="{{ asset(\Illuminate\Support\Facades\Storage::url($src) ) }}" alt="" width="120" height="120" class="rounded mr-2">
                            <button onclick="removeImage('{{$src}}',{{ $mission->mission_id}},this)" class="btn btn-link d-inline-block">Remove</button>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
        <div class="col-3">
            <label class="font-weight-bold text-muted">Attach files :</label>
        </div>
        <div class="col-9 mission_image">
            <form action="{{$create? route('mission.store') : route('mission.update',$mission->mission_id)}}"
                  class="dropzone" id="missionform" method="POST" enctype="multipart/form-data">
                @if(!$create)
                    {{ method_field('PUT') }}
                @endif
                @csrf
            </form>
        </div>
    
        <div class="col-3 mt-2">
            <label class="font-weight-bold text-muted" for="issue_resolve_ways">Issue Resolve Ways:</label>
        </div>
        <div class="col-9 mt-2 ">
            <div class="form-group resolved_way_append">
                <textarea name="TD" class="editor3 resolved_way" id="issue_resolve_ways"></textarea>
            </div>
        </div>
        <div class="col-3">
            <label for="remark" class="font-weight-bold text-muted">Remark :</label>
        </div>
        <div class="col-9 ">
            <div class="form-group remark_append">
                <div class="input-group">
                    <input type="text" id="remark" class="form-control remark" value="{{ old('remark',$mission->remark) }}"/>
                </div>
            </div>
        </div>
        
        <div class="col-3">
            <label class="font-weight-bold text-muted"></label>
        </div>
        <div class="col-9 mt-2">
            <button class="btn btn-primary rounded shadow missionbtn" id="missionform-submit">Submit</button>
        </div>
    </div>
</div>