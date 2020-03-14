@extends('layouts.app')

@section('content')

<div class="col-sm-12 no-gutters p-5 test-toast">
    <div id="tui-image-editor-container" class="shadow-lg rounded" ></div>
</div>

@endsection
@push('scripts')
    <script>

     window.onload = function () {
        // Image editor
        var imageEditor = new tui.ImageEditor('#tui-image-editor-container', {
            includeUI: {
                
                loadImage: {
                    path: 'img/sampleImage2.png',
                    name: 'SampleImage',
                },
                
                theme: blackTheme, // or whiteTheme
                initMenu: 'filter',
                uiSize: {
                    height:'580px',
                    width:'50%'
                },
                
                menuBarPosition: 'left',
            },
                cssMaxWidth: 300,
                cssMaxHeight: 300,
                
                
            
            


        });
        

        

     }
    </script>

@endpush

