@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card shadow-lg index-tables border-0 mt-5">
            @include('mission._form',['title'=>'Mission Edit','create'=>false])
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        window.onload = function () {
            $(function () {

                //this function is for ckeditor1 in task create.blade.php
                ClassicEditor
                    .create(document.querySelector('.editor1'), {
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
                        editor1 = editor;
                        //setting default datat to task descripiton
                        editor1.setData('{!! old('job_obj',$mission->job_obj)  !!}');
                    })
                    .catch(error => {
                        console.error(error);
                    });

                //this function is for ckeditor in task create.blade.php
                ClassicEditor
                    .create(document.querySelector('.editor2'), {
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
                        editor2 = editor;
                        //setting default datat to task descripiton
                        editor2.setData('{!! old('doing_methods',$mission->doing_methods)  !!}');
                    })
                    .catch(error => {
                        console.error(error);
                    });
                
                //this function is for ckeditor in task create.blade.php
                ClassicEditor
                    .create(document.querySelector('.editor3'), {
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
                        editor3 = editor;
                        //setting default datat to task descripiton
                        editor3.setData('{!! old('issue_resolve_ways',$mission->issue_resolve_ways)  !!}');
                    })
                    .catch(error => {
                        console.error(error);
                    });


                $('#job_finished_date').datetimepicker('date', moment('{{ old('jobfinished_date',$mission->jobfinished_date) }}') );
               
            });
        };

        
        function removeImage(src,mission_id,button){
            //function for image deletion
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: "POST",
                url: "/removeMissionImage",
                data:{src,mission_id}
            }).done(function (data) {
                console.log("S blade: [mission/edit] component :[Image remove] from:edit.blade.php Data => image delection" + data.success);
                if(data.success=="true") {
                    $(button).parent().hide()
                }else{
                    alert("Image Deletion fail.");
                }
            }).fail(function (jqXHR, textStatus) {
                console.log("F blade: [mission/edit] component :[Image remove] from:edit.blade.php Data => image delection" + textStatus)
            });
        }
    </script>
@endpush
