@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-lg index-tables border-0 mt-5">
        @include('mission._form',['title'=>'Mission Create','create'=>true])
    </div>
</div>
@endsection
@push('scripts')
    <script>
        window.onload = function () {
            $(function () {

               

                //this function is for ckeditor in mission create.blade.php
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
                    })
                    .catch(error => {
                        console.error(error);
                    });

                     //this function is for editor2 in mission create.blade.php
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
                    })
                    .catch(error => {
                        console.error(error);
                    });

                     //this function is for editor3 in mission create.blade.php
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
                    })
                    .catch(error => {
                        console.error(error);
                    });

                $('#mission_finished_date').datetimepicker();
                
            });
        };
        
    </script>
@endpush