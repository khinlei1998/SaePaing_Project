@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card shadow-lg index-tables border-0 mt-5">
            @include('team._form',['title'=>'team','create'=>false])
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        window.onload = function () {


            $(function () {
                var group = $('#team_group').find(':selected').val();
                getAssibleDepartment(group);
                $('#team_group').on('change', function () {
                    $('#department').empty();
                    var newOption = new Option("","", false, false);
                    $('.department').append(newOption);
                     var group = $('#team_group').find(':selected').val();
                    console.log("T blade: [team/edit] component :[Department dropdown] from:app.js Selected team =>" + group);
                    getAssibleDepartment(group);
                });
                $('#department').on('change', function () {
                    $('#sub_department').empty();
                    var newOption = new Option("","", false, false);
                    $('.subdepartment').append(newOption);

                    var department=$('#department').find(':selected').val();
                    console.log("N blade: [team/create] component :[SubDepartment dropdown] from:app.js Selected SubDepartment =>"+department);
                    getAssibleSubDepartment(department);
                });
            });
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
                // console.log(data);
                console.log("S blade: [team/create] component :[department dropdown] from:app.js Data => Department count" + data.length);
                if(data.length==1){
                    var newOption = new Option(data[0].dept_name, data[0].dept_id, true, true);
                    $('.department').append(newOption).trigger('change');
                }else{
                    for (var i = 0; i < data.length; i++) {
                        if (data[i].dept_id != '{{ old('dept_id',$team->dept_id) }}') {
                            var newOption = new Option(data[i].dept_name, data[i].dept_id, false, false);
                            $('#department').append(newOption);
                        } else {
                            var newOption = new Option(data[i].dept_name, data[i].dept_id, true, true);
                            $('#department').append(newOption).trigger('change');
                        }

                    }
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
                if(data.length==1){
                    var newOption = new Option(data[0].subdept_name, data[0].subdept_id, true, true);
                    // console.log(newOption);
                    $('.subdepartment').append(newOption).trigger('change');
                    // $('.subdepartment').append( $('<option value="dsdf"></option>'));

                }else{
                    for (var i = 0; i < data.length; i++) {
                        if (data[i].subdept_id != '{{ old('subdept_id',$team->subdept_id) }}') {
                            var newOption = new Option(data[i].subdept_name, data[i].subdept_id, false, false);


                            $('#sub_department').append(newOption);
                        } else {
                            var newOption = new Option(data[i].subdept_name, data[i].subdept_id, true, true);
                            $('#sub_department').append(newOption).trigger('change');

                        }

                    }

                }


            }).fail(function (jqXHR, textStatus) {
                console.log("F blade: [team/create] component :[department dropdown] from:app.js Fail =>" + textStatus)
            });
        }
    </script>
@endpush