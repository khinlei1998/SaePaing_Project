
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
            <div class="row">
                <h4 class="mt-4 text-center w-100"><strong>{{ $title }}</strong></h4>
            </div>
        </div>
    </div>

    <div class="row p-4 pl-5 task-form-require">

        <div class="col-3">
            <label for="task_title" class="font-weight-bold text-muted"> <span>*</span> Task Title :</label>
        </div>
        <div class="col-9" >
            <div class="form-group" id="task-title-append">
                <div class="input-group">
                    <input type="text" id="task_title" class="form-control task_title " value="{{ old('task_title',$task->task_title) }}"/ >
                </div>

            </div>
        </div>

        <div class="col-3">
            <label for="task_title" class="font-weight-bold text-muted"> <span>&nbsp;&nbsp;</span> Project code :</label>
        </div>

        <div class="col-9">
            <div class="form-group project_code_append">
                <select class="project_code w-100" id="project_code" >
                        <option value=""></option>
                        @foreach($task->all_projects as $one_project)
                            <option value="{{$one_project->project_code}}"{{$one_project->project_code ==$task->project_code ? 'selected' : ''}} >{{$one_project-> project_title}}</option>
                         @endforeach
                </select>
            </div>
        </div>

        <div class="col-3">
            <label class="font-weight-bold text-muted" for="task_description"> <span>*</span> Descripiton :</label>
        </div>
        <div class="col-9">
            <div class="form-group project_editor_append">
                <textarea name="TD" class="editor project_editor" id="task_description"></textarea>
            </div>
        </div>
        <div class="col-3">
            <label class="font-weight-bold text-muted" for="task_department"> <span>*</span> Department :</label>
        </div>
        <div class="col-9">
            <div class="form-group department_append">
                <select class="department w-100" id="task_department">
                    <option value=""></option>
                </select>
            </div>
        </div>
        <div class="col-3">
            <label class="font-weight-bold text-muted" for="task_assigned_to"> <span>*</span> Assigned To :</label>
        </div>
        <div class="col-9">
            <div class="form-group employee_append">
                <select class="employee w-100" id="task_assigned_to" multiple>
                </select>
            </div>
        </div>
{{--        here we need extra ui for shwoing images related to the task--}}
        @if(!$create)
            <div class="col-3">
                <label class="font-weight-bold text-muted" for="task_assigned_to">Your Last Attach Files:</label>
            </div>

            <div class="col-9 p-4 ">
                <div class="row " >
                    @foreach($task->assignor_file as $src)
                        <div class="col-3">
                        <input type="hidden" value="{{$src}}" class="old_image" name="old_image">
                            <img src="{{ asset(\Illuminate\Support\Facades\Storage::url($src) ) }}" alt="" width="120" height="120" class="rounded mr-2">
                            <button onclick="removeImage('{{$src}}','{{$task->task_id}}',this)" class="btn btn-link d-inline-block">Remove</button>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
        <div class="col-3">
            <label class="font-weight-bold text-muted"> <span>*</span> Attach files :</label>
        </div>
        <div class="col-9 task_image">
            <form action="{{$create? route('task.store') : route('task.update',$task->task_id)}}"
                  class="dropzone" id="taskform" method="POST" enctype="multipart/form-data">
                @if(!$create)
                    {{ method_field('PUT') }}
                @endif
                @csrf
            </form>
        </div>
        <div class="col-3 mt-3">
            <label for="task_starttime" class="font-weight-bold text-muted"> <span>*</span> Start Time :</label>
        </div>
        <div class="col-9 mt-3">
            <div class="form-group start_time_append">
                <div class="input-group date start_time" id="task_starttime" data-target-input="nearest">
                    <input type="text" id="task-starttime" class="form-control datetimepicker-input task_start_time" data-target="#task_starttime"/>
                    <div class="input-group-append" data-target="#task_starttime" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar-alt"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3">
            <label for="task_endtime" class="font-weight-bold text-muted"> <span>*</span> End Time :</label>
        </div>
        <div class="col-9">
            <div class="form-group end_time_append">
                <div class="input-group date end_time" id="task_endtime" data-target-input="nearest">
                    <input type="text" id="task-endtime" class="form-control datetimepicker-input task_end_time" data-target="#task_endtime"/>
                    <div class="input-group-append" data-target="#task_endtime" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar-alt"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3">
            <label class="font-weight-bold text-muted"></label>
        </div>
        <div class="col-9 mt-2">
            <button class="btn btn-primary rounded shadow btntask" id="taskform-submit">Submit</button>
        </div>
    </div>

</div>