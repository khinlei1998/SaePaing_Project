@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card shadow-lg index-tables border-0 mt-5">
            @include('task._form',['title'=>'Task Edit','create'=>false])
        </div>
    </div>
@endsection
@push('scripts')
<script>
        window.onload = function () {
            $(function () {
                //department dropdown in create.blade.php task
                $.ajax({
                    method: "GET",
                    url: "/getAccessableDepartments",
                }).done(function (data) {
                    console.log("S blade: [task/create] component :[department dropdown] from:app.js Data => Department count" + data.length);
                    if (data.length == 1) {
                        var newOption = new Option(data[0].dept_name, data[0].dept_id, true, true);
                        $('.department').append(newOption).trigger('change');
                    } else {
                        for (var i = 0; i < data.length; i++) {
                            if (data[i].dept_id != '{{ old('dept_id',$task->dept_id) }}') {
                                var newOption = new Option(data[i].dept_name, data[i].dept_id, false, false);
                                $('#task_department').append(newOption);
                            } else {
                                var newOption = new Option(data[i].dept_name, data[i].dept_id, true, true);
                                $('#task_department').append(newOption).trigger('change');
                            }

                        }
                    }
                }).fail(function (jqXHR, textStatus) {
                    console.log("F blade: [task/create] component :[department dropdown] from:app.js Fail =>" + textStatus)
                });

                //employee dropdown in create.blade.php task
                $('#task_department').on('change', function () {
                    var dept_id = $('#task_department').find(':selected').val();
                    // alert(dept_id);
                    $('#task_assigned_to').val(null).trigger('change');
                    console.log("N blade: [task/create] component :[Department dropdown] from:app.js Selected Department =>"+dept_id);
                    getAssibleEmployee(dept_id);
                });

                //this function is for ckeditor in task create.blade.php
                ClassicEditor
                    .create(document.querySelector('.editor'), {
                        toolbar: [
                            'heading',
                            'bold',
                            'italic',
                            'bulletedList',
                            'numberedList',
                            'blockQuote',
                            'undo',
                            'redo'
                        ],

                    })
                    .then(editor => {
                        taskeditor = editor;
                        //setting default datat to task descripiton
                        editor.setData("{!! old('description',$task->description)  !!}");
                    })
                    .catch(error => {
                        console.error(error);
                    });
                $('#task-endtime').datetimepicker('date', moment('{{ old('end_time',$task->end_time) }}') );
                $('#task-starttime').datetimepicker('date', moment('{{ old('start_time',$task->start_time) }}') );
            });
        };

        function getAssibleEmployee(dept_id){
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: "POST",
                url: "/getAssignablePersons",
                data:{dept_id}
            }).done(function (data) {
                console.log("S blade: [task/create] component :[employee dropdown]  Data => Employee count" + data.length);

                for (var i = 0; i < data.length; i++) {
                    //000090,00070,00060 00070
                    if ('{{ old('assignee_persons',$assignee_persons) }}'.indexOf(data[i].emp_id) == -1)
                        var newOption = new Option(data[i].emp_name, data[i].emp_id, false, false);
                    else

                        var newOption = new Option(data[i].emp_name, data[i].emp_id, true, true);
                    $('#task_assigned_to').append(newOption).trigger('change');
                }
            }).fail(function (jqXHR, textStatus) {
                console.log("F blade: [task/edit] component :[employee dropdown]  Fail =>" + textStatus)
            });
        }
        function removeImage(src,task_id,button){
            //function for image deletion
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: "POST",
                url: "/removeimage",
                data:{src,task_id}
            }).done(function (data) {
                console.log("S blade: [task/edit] component :[Image remove] from:edit.blade.php Data => image delection" + data.success);
                if(data.success=="true") {
                    $(button).parent().hide()
                }else{
                    alert("Image Deletion fail.");
                }
            }).fail(function (jqXHR, textStatus) {
                console.log("F blade: [task/edit] component :[Image remove] from:edit.blade.php Data => image delection" + textStatus)
            });
        }
    </script>
@endpush
