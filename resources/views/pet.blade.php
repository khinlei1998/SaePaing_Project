@extends('layouts.app')
@section('content')

    <div class="col-sm-12 no-gutters p-5 test-toast">
        <div id="tui-image-editor-container" class="shadow-lg rounded"></div>
        {{--        <button onclick="tt()">ff</button>--}}
        <button class="btn btn-success" onclick="savedatatosaver()">Save</button>
    </div>

@endsection
@push('scripts')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script>


        var imageEditor;

        window.onload = function () {
            // Image editor
            imageEditor = new tui.ImageEditor('#tui-image-editor-container', {

                includeUI: {
                    loadImage: {
                        path: 'storage/profile/default.jpg',
                        name: 'SampleImage'
                    },
                    download: false,
                    theme: blackTheme, // or whiteTheme
                    initMenu: 'filter',
                    uiSize: {
                        height: '580px',
                        width: '50%'
                    },
                    menuBarPosition: 'left',
                    cssMaxWidth: 200,
                    usageStatistics: false,
                },





            }, {
                methods: {
                    selectImage: function (event) {
                        console.log('fff');
                    },
                    crop: function () {
                        console.log('ffff');
                    }

                }
            });

            window.onresize = function () {

                imageEditor.ui.resizeEditor();
            }
            imageEditor.on('mousedown', function (pos) {
                console.log('ppppp')
            });
            // imageEditor.on('applyFilter', function(pos) {
            //     console.log('ppppp')
            // });

        };


       //saving function to saver

        var image;
        function savedatatosaver() {


           // let tets=imageEditor.getImageName();//test use for instance methods



           console.log(tets);
            image=imageEditor.toDataURL();
            image = image.replace('data:image/png;base64,', '');




            // console.log(imageEditor.toDataURL())///this line is important to save image in server
            //save image to server
            // $.ajax({
            //     type: 'POST',
            //     url: 'Default.aspx/MoveImages',
            //     data: '{ "imageData" : "' + image + '" }',
            //     contentType: 'application/json; charset=utf-8',
            //     dataType: 'json',
            //     success: function (msg) {
            //     }
            // });


            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: "POST",
                contentType: 'application/json; charset=utf-8',

                url: "/saveimagetoserver",
                data:'{ "imageData" : "' + image + '" }',
            }).done(function (data) {

                console.log("S blade: [task/create] component :[employee dropdown] from:app.js Data => Employee count" +data.success );

            }).fail(function (jqXHR, textStatcbp_listus) {
                console.log("F blade: [task/create] component :[department dropdown] from:app.js Fail =>" )
            });
        }
        //end saving function to saver
    </script>
@endpush
{{--=======--}}

{{--<div class="col-sm-12 no-gutters p-5 test-toast">--}}
{{--    <div id="tui-image-editor-container" class="shadow-lg rounded" ></div>--}}
{{--</div>--}}

{{--@endsection--}}
{{--@push('scripts')--}}
{{--    <script>--}}

{{--     window.onload = function () {--}}
{{--        // Image editor--}}
{{--        var imageEditor = new tui.ImageEditor('#tui-image-editor-container', {--}}
{{--            includeUI: {--}}
{{--                --}}
{{--                loadImage: {--}}
{{--                    path: 'img/sampleImage2.png',--}}
{{--                    name: 'SampleImage',--}}
{{--                },--}}
{{--                --}}
{{--                theme: blackTheme, // or whiteTheme--}}
{{--                initMenu: 'filter',--}}
{{--                uiSize: {--}}
{{--                    height:'580px',--}}
{{--                    width:'50%'--}}
{{--                },--}}
{{--                --}}
{{--                menuBarPosition: 'left',--}}
{{--            },--}}
{{--                cssMaxWidth: 300,--}}
{{--                cssMaxHeight: 300,--}}

{{--        });--}}
{{--        --}}

{{--        --}}

{{--     }--}}
{{--    </script>--}}

{{--@endpush--}}

{{-->>>>>>> f14bff0a2a2fe8d4de8fd409ab58ccf47ded020a--}}
