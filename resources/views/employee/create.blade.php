@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card shadow-lg index-tables border-0 mt-5">
            @include('employee._form',['title'=>'Employee Create','create'=>true])
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        window.onload = function () {
            $(function () {

                //this function is for ckeditor in mission create.blade.php
                ClassicEditor
                    .create(document.querySelector('.empeditor'), {
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
                        empeditor = editor;
                    })
                    .catch(error => {
                        console.error(error);
                    });

                    $('.shdiv').hide();
                    $('#emp_position').change(function(){

                        var position = $('#emp_position').find(':selected').val();
                    console.log("N blade: [employee/create] component :[Group dropdown] from:employee.create Selected pos =>"+position);
                   
                        if( position=="MD" || "ED" || "D"){
                            $("#Dept").hide();
                                    $("#SubDept").hide();
                                    $("#Team").hide();

                                    

                        }
                        if( position=="HOD" || position=="HOT" || position=="Staff"){
                            $("#Dept").show();
                                    $("#SubDept").show();
                                    $("#Team").show();
                                   
                        }
                    

                        });


                $('#team_group').on('change', function () {
                    $('#department').empty();
                    $("#department").append(new Option("","",false,false));
                    $('#sub_department').empty();
                    $("#sub_department").append(new Option("","",false,false));
                    $('#team').empty();
                    $("#team").append(new Option("","",false,false));
                    var group = $('#team_group').find(':selected').val();
                    console.log("N blade: [employee/create] component :[Group dropdown] from:employee.create Selected Group =>"+group);
                    getAssibleDepartment(group);
                });

                $('#department').on('change', function () {
                    $('#sub_department').empty();
                    $("#sub_department").append(new Option("","",false,false));
                    $('#team').empty();
                    $("#team").append(new Option("","",false,false));
                    var department = $('#department').find(':selected').val();
                    console.log("N blade: [employee/create] component :[department dropdown] from:employee.create Selected Department =>"+department);
                    getAssibleSubDepartment(department);
                });

                $('#sub_department').on('change', function () {
                    $('#team').empty();
                    $("#team").append(new Option("","",false,false));
                    var subdepartment = $('#sub_department').find(':selected').val();
                    console.log("N blade: [employee/create] component :[subdepartment dropdown] from:employee.create Selected SubDepartment =>"+subdepartment);
                    getAssibleTeam(subdepartment);
                });

            })
        }

        function getAssibleDepartment(group){
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: "POST",
                url: "/getEmpDepartment",
                data:{group}
            }).done(function (data) {
                console.log("S blade: [employee/create] component :[department dropdown] from:employee.create Data => Department count" + data.length);
                for (var i = 0; i < data.length; i++) {
                    var newOption = new Option(data[i].dept_name, data[i].dept_id, false, false);
                    $('#department').append(newOption);
                    console.log(newOption);
                }
            }).fail(function (jqXHR, textStatus) {
                console.log("F blade: [employee/create] component :[department dropdown] from:employee.create Fail =>" + textStatus)
            });
        }

        function getAssibleSubDepartment(department){
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: "POST",
                url: "/getEmpSubDepartment",
                data:{department}
            }).done(function (data) {
                console.log("S blade: [employee/create] component :[subdepartment dropdown] from:employee.create Data => SubDepartment count" + data.length);
                for (var i = 0; i < data.length; i++) {
                    var newOption = new Option(data[i].subdept_name, data[i].subdept_id, false, false);
                    $('#sub_department').append(newOption);
                }

            }).fail(function (jqXHR, textStatus) {
                console.log("F blade: [employee/create] component :[subdepartment dropdown] from:employee.create Fail =>" + textStatus)
            });
        }

        function getAssibleTeam(subdepartment){
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: "POST",
                url: "/getEmpTeam",
                data:{subdepartment}
            }).done(function (data) {
                console.log("S blade: [employee/create] component :[team dropdown] from:employee.create Data => Team count" + data.length);
                for (var i = 0; i < data.length; i++) {
                    var newOption = new Option(data[i].team_name, data[i].team_id, false, false);
                    $('#team').append(newOption);
                }

            }).fail(function (jqXHR, textStatus) {
                console.log("F blade: [employee/create] component :[team dropdown] from:employee.create Fail =>" + textStatus)
            });
        }

    </script>

@endpush