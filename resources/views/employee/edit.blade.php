@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card shadow-lg index-tables border-0 mt-5">
            @include('employee._form',['title'=>'Employee Edit','create'=>false])
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        window.onload = function () {


            $(function () {

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
                        if( position=="HOD" || position=="Staff" || position=="HOT"){
                            $("#Dept").show();
                                    $("#SubDept").show();
                                    $("#Team").show();
                                   
                        }
                    

                        });
                        $('#emp_position').trigger('change');

                    var group=$('#team_group').find(':selected').val();
                    getAssibleDepartment(group);

                    $('#team_group').on('change', function () {
                    $('#department').empty();
                    $("#department").append(new Option("","",false,false));
                    $('#sub_department').empty();
                    $("#sub_department").append(new Option("","",false,false));
                    $('#team').empty();
                    $("#team").append(new Option("","",false,false));

                    var group=$('#team_group').find(':selected').val();
                    console.log("T blade: [employee/edit] component :[Department dropdown] from:app.js Selected group =>"+group);
                    getAssibleDepartment(group);
                  
            });
              // alert($('#team_group').find(':selected').val());
              var department=$('#department').find(':selected').val();
              getAssibleSubDepartment(department);

                $('#department').on('change', function () {
                    $('#sub_department').empty();
                    $("#sub_department").append(new Option("","",false,false));
                    $('#team').empty();
                    $("#team").append(new Option("","",false,false));
                    var department=$('#department').find(':selected').val();
                    console.log("N blade: [employee/create] component :[SubDepartment dropdown] from:app.js Selected SubDepartment =>"+department);
                    getAssibleSubDepartment(department);
                });
                
                var subdepartment=$('#sub_department').find(':selected').val();
                getAssibleTeam(subdepartment);
                $('#sub_department').on('change', function () {
                    $('#team').empty();
                    $("#team").append(new Option("","",false,false));
                    var subdepartment=$('#sub_department').find(':selected').val();
                    console.log("N blade: [employee/create] component :[Team dropdown] from:app.js Selected Team =>"+subdepartment);
                    getAssibleTeam(subdepartment);
                });
              
            });
        };

        function getAssibleDepartment(group){
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: "POST",
                url: "/getEmpDepartment",
                data:{group}
            }).done(function (data) {
                // console.log(data);
                console.log("S blade: [employee/create] component :[department dropdown] from:app.js Data => Department count" + data.length);
                if(data.length==1){
                    var newOption = new Option(data[0].dept_name, data[0].dept_id, true, true);
                    $('#department').append(newOption).trigger('change');
                }else{
                    for (var i = 0; i < data.length; i++) {
                        if (data[i].dept_id != '{{ old('dept_id',$employee->dept_id) }}') {
                            var newOption = new Option(data[i].dept_name, data[i].dept_id, false, false);
                            $('#department').append(newOption);
                        } else {
                            var newOption = new Option(data[i].dept_name, data[i].dept_id, true, true);
                            $('#department').append(newOption).trigger('change');
                        }

                    }
                }

            }).fail(function (jqXHR, textStatus) {
                console.log("F blade: [employee/create] component :[department dropdown] from:app.js Fail =>" + textStatus)
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
                console.log("S blade: [employee/create] component :[subdepartment dropdown] from:app.js Data => SubDepartment count" + data.length);
                if(data.length==1){
                    var newOption = new Option(data[0].subdept_name, data[0].subdept_id, true, true);
                    $('#sub_department').append(newOption).trigger('change');
                }else{
                    for (var i = 0; i < data.length; i++) {
                        if (data[i].subdept_id != '{{ old('subdept_id',$employee->subdept_id) }}') {
                            var newOption = new Option(data[i].subdept_name, data[i].subdept_id, false, false);
                            $('#sub_department').append(newOption);
                        } else {
                            var newOption = new Option(data[i].subdept_name, data[i].subdept_id, true, true);
                            $('#sub_department').append(newOption).trigger('change');
                        }

                    }

                }


            }).fail(function (jqXHR, textStatus) {
                console.log("F blade: [employee/create] component :[department dropdown] from:app.js Fail =>" + textStatus)
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
                console.log("S blade: [employee/create] component :[team dropdown] from:app.js Data => Team count" + data.length);
                if(data.length==1){
                    var newOption = new Option(data[0].team_name, data[0].team_id, true, true);
                    $('#team').append(newOption).trigger('change');
                }else{
                    for (var i = 0; i < data.length; i++) {
                        if (data[i].subdept_id != '{{ old('team_id',$employee->team_id) }}') {
                            var newOption = new Option(data[i].team_name, data[i].team_id, false, false);
                            $('#team').append(newOption);
                        } else {
                            var newOption = new Option(data[i].team_name, data[i].team_id, true, true);
                            $('#team').append(newOption).trigger('change');
                        }

                    }

                }


            }).fail(function (jqXHR, textStatus) {
                console.log("F blade: [employee/create] component :[team dropdown] from:app.js Fail =>" + textStatus)
            });
        }
    </script>
@endpush