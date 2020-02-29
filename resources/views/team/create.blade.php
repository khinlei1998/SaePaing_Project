@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card shadow-lg index-tables border-0 mt-5">
            @include('team._form',['title'=>'team','create'=>true])
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        window.onload = function () {
            $(function () {
                $('#team_group').on('change', function () {
                    $('#department').empty();
                    $('#department').append(new Option("","", false, false));
                    var group = $('#team_group').find(':selected').val();
                    console.log("N blade: [team/create] component :[Department dropdown] from:app.js Selected Department =>"+group);
                    getAssibleDepartment(group);
                });

                $('#department').on('change', function () {
                    $('#sub_department').empty();
                    $('#sub_department').append(new Option("","", false, false));
                    var department = $('#department').find(':selected').val();
                    // alert(department);
                    console.log("N blade: [team/create] component :[SubDepartment dropdown] from:app.js Selected SubDepartment =>"+department);
                    getAssibleSubDepartment(department);
                });
            })
        };

        function getAssibleDepartment(group){
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: "POST",
                url: "/getDepartment",
                data:{group}
            }).done(function (data) {
                console.log("S blade: [team/create] component :[department dropdown] from:app.js Data => Department count" + data.length);
                for (var i = 0; i < data.length; i++) {
                    var newOption = new Option(data[i].dept_name, data[i].dept_id, false, false);
                    $('#department').append(newOption);
                }
            }).fail(function (jqXHR, textStatus) {
                console.log("F blade: [team/create] component :[department dropdown] from:app.js Fail =>" + textStatus)
            });
        }

        function getAssibleSubDepartment(department){
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: "POST",
                url: "/getSubDepartment",
                data:{department}
            }).done(function (data) {
                console.log("S blade: [team/create] component :[subdepartment dropdown] from:app.js Data => SubDepartment count" + data.length);
                for (var i = 0; i < data.length; i++) {
                    var newOption = new Option(data[i].subdept_name, data[i].subdept_id, false, false);
                    $('#sub_department').append(newOption);
                }

            }).fail(function (jqXHR, textStatus) {
                console.log("F blade: [team/create] component :[department dropdown] from:app.js Fail =>" + textStatus)
            });
        }
    </script>

@endpush