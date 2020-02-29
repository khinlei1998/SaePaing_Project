@extends('layouts.app')
@section('title', 'Project List')
@section('content')


<div class="container">
    <div class="card shadow-lg index-tables border-0 mt-5">
        @include('project._form',['title'=>'Project Create','create'=>true])
    </div>
</div>

​@endsection
@push('scripts')
    <script>
        window.onload = function () {
            $(function () {
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
                        projectEditor = editor;
                    })
                    .catch(error => {
                        console.error(error);
                    });
            });
        }
        
    </script>
@endpush
