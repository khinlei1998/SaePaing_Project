@extends('layouts.app')
@section('title', 'Cbp Configuration')
@section('content')
    ​
    <div class="container uniandzawgyi">
        <div class="card shadow-lg index-tables border-0 mt-5">
            <div class="container pb-3">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                        <div class="row">
                            <h4 class="mt-4 text-center w-100"><strong>CBP Configuration</strong></h4>
                            <h5 class="mt-2 text-center w-100"><span class="badge badge-success pl-2 pr-2 border-3">&nbsp;</span><strong>&nbsp;&nbsp;{{$project->project_title}}</strong>
                            </h5>
                            <a href="{{ url('project_detail', $project->project_id)}}"
                               class="position-absolute next-button-link mt-4 mr-4">
                                <button data-toggle="tooltip" data-placement="left" title="Next After Configuration"
                                        class="btn next-button text-white">NEXT >>
                                </button>
                            </a>
                            ​
                        </div>
                        <hr>
                        <div class="row index-cbp">



                            @foreach($cbpList as $list)
                            @php
                            $to_check_assigned=DB::table('project_configs')->where([['cbp_id','=',$list->cbp_id],['project_id','=',$project->project_id]])->count();
                         
                            @endphp
                            @if($to_check_assigned > 0)
                          


                            <div class="col-md-4">
                                    <div class="panel-group accordion" id="accordion" role="tablist"
                                         aria-multiselectable="true" >

                                        <div class="panel panel-default " cbpid="{{$list->cbp_id}}"
                                             cbpname="{{$list->cbp_name}}">

                                            <div class="panel-heading" role="tab" id="headingOne">
                                                <h4 class="panel-title">
                                                    <a class="collapsed cbp_selected_bg align-middle" role="button">
                                                        <div class="container">
                                                            <div class="row">
                                                                <div class="col-md-10">
                                                                    <div class="container">
                                                                        <div class="row">
                                                                            <div class="col-md-2">
                                                                                <i class="fa fa-info-circle pr-3 pl-0"></i>
                                                                            </div>
                                                                            <div class="col-md-10">
                                                                                {{ Str::limit($list->cbp_name,50) }}
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </a>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @else
                             <div class="col-md-4">
                                    <div class="panel-group accordion" id="accordion" role="tablist"
                                         aria-multiselectable="true" >

                                        <div class="panel panel-default showmodal" cbpid="{{$list->cbp_id}}"
                                             cbpname="{{$list->cbp_name}}">

                                            <div class="panel-heading" role="tab" id="headingOne">
                                                <h4 class="panel-title">
                                                    <a class="collapsed align-middle" role="button">
                                                        <div class="container">
                                                            <div class="row">
                                                                <div class="col-md-10">
                                                                    <div class="container">
                                                                        <div class="row">
                                                                            <div class="col-md-2">
                                                                                <i class="fa fa-info-circle pr-3 pl-0"></i>
                                                                            </div>
                                                                            <div class="col-md-10">
                                                                                {{ Str::limit($list->cbp_name,50) }}
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </a>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @endforeach
                            <div class="modal fade in show" id="subconfig" tabindex="-1" role="dialog"
                                 aria-labelledby="subconfigTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header modal-header-config">
                                            <h5 class="modal-title" id="exampleModalLongTitle"></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>




                                        <div class="modal-body">
                                            <button type="button" class="btn btn-secondary btn-sm btn-block"
                                                    data-toggle="collapse" data-target="#filter-panel{{$list->cbp_id}}">
                                                Add New Subtask
                                            </button>
                                            <div class="collapse container" id="filter-panel{{$list->cbp_id}}">
                                                <div class="row mt-3">
                                                    <div class="col-md-8 offset-md-2">
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <input type="text" id="cbpsubtask"
                                                                       placeholder="Enter a new subtask"
                                                                       class="form-control"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8 offset-md-2">
                                                        <div class="container">
                                                            <div class="row mt-3">

                                                                <div class="col-md-2 mr-5">
                                                                    <div class="form-check">
                                                                        <button class="btn btn-success" id="addsubcbp">
                                                                            Add
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>


                                            <div class="container">
                                                <input type="hidden" name="cbp_id" value="{{$list->cbp_id}}">
                                                <div class="row" id="subcbp">
                                                    {{--here we be the list of sub tasks--}}
                                                </div>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <label class="font-weight-bold text-muted"><i
                                                                    class="fa fa-clock"></i> &nbsp;Estimate
                                                            Timeline</label>
                                                    </div>
                                                    <div class="col-7">
                                                        <div class="form-group">
                                                            <div class="input-group date" data-target-input="nearest">
                                                                <input type="text" id="d_line" name="d_line"
                                                                       class="form-controls" data-target="#d_line"/>
                                                                <input id="ids" type="hidden"/>

                                                                <div class="input-group-append" data-target="#d_line"
                                                                     data-toggle="datetimepicker">
                                                                    <div class="input-group-text"><i
                                                                                class="fa fa-calendar-alt"></i></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <label class="font-weight-bold text-muted" for="project_region"><i
                                                                    class="fa fa-user"></i> &nbsp;Process By</label>
                                                    </div>
                                                    
                                                    <div class="col-7 mr-2">
                                                        <select class="w-100 processby" id="hod_person"
                                                                name="assign_person">
                                                            <option value=""></option>
                                                            @foreach($hods as $hod)
                                                                <option value="{{$hod->emp_id}}">{{$hod->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <button class="btn btn-primary" id="cbpPj">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        window.onload = function () {
            var currentCbp = 0;
            $(function () {

            });
            $("div.showmodal").click(function (e) {
                $('#subcbp').empty();
                if ($(this).find('a.collapse').length === 0) {
                  
                    var id = $(this).attr("cbpid");
                    // alert(id);
                    currentCbp = id;
                    var cbpname = $(this).attr("cbpname");
                    $("#exampleModalLongTitle").text(cbpname);
                    let ids = "";
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        method: "POST",
                        url: "/getCbpList",
                        data: {id}
                    }).done(function (data) {
                        console.log("S blade: [task/create] component :[employee dropdown] from:app.js Data => Employee count" + data.length);

                        for (var i = 0; i < data.length; i++) {
                            ids += data[i].id + ",";
                           
                            var cbp = "<div class=\"col-md-10\">\n" +
                                "<ul class=\"pl-3\">\n" +
                                "<li>" + data[i].cbp_subtask + "</li>\n" +
                                "</ul>\n" +
                                "</div>";
                            $('#subcbp').append(cbp);
                        }
                        $('#ids').val(ids);
                    }).fail(function (jqXHR, textStatus) {
                        console.log("F blade: [task/create] component :[department dropdown] from:app.js Fail =>" + textStatus)
                    });
                    $('#subconfig').modal('show');
                }
            });
            $('#addsubcbp').click(function () {
                var subcbp = $('#cbpsubtask').val();
                //var pid = '{{$project->project_id}}';
                var cbpid = currentCbp;
                //var hod = $('#hod_person').find(':selected').val();
                //var dline = $('#d_line').val();
                // alert(cbpid + " >> " + subcbp);
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    method: "POST",
                    url: "/addSubCbp",
                    data: {subcbp, cbpid}
                }).done(function (data) {
                    console.log("S blade: [task/create] component :[employee dropdown] from:app.js Data => Employee count" + data.length);
                    if (data.success) {
                        var cbp = "<div class=\"col-md-12\">" +
                            "<div class=\"container\">" +
                            "<div class=\"row\">" +
                            "<div class=\"col-md-10\">" +
                            "<ul class=\"pl-3\">" +
                            "<li>" + subcbp + "</li>" +
                            "</div>" +
                            "<div class=\"col-md-2\">"+
                            "<form action=\"h\" method=\"POST\">"+
                            "<input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token() }}\">"+
                            "<input type=\"hidden\" name=\"_method\" value=\"DELETE\">"+
                            "<button class=\"rm-btn\"type=\"submit\" class=\"btn btn-danger btn-sm\">-</button>"+

                            "</form>"+
                            "</div>"+
                            "</ul>\n" +
                            "</div>"+
                            "</div>"+
                            "</div>";
                        $('#subcbp').append(cbp);
                        var ids = $('#ids').val() + data.id + ",";
                        $('#ids').val(ids);
                        console.log(ids);
                        $('#cbpsubtask').val('');
                    } else {
                        console.log("F blade: [task/create] component :[department dropdown] from:app.js Fail =>" + data.success)
                    }
                }).fail(function (jqXHR, textStatus) {
                    console.log("F blade: [task/create] component :[department dropdown] from:app.js Fail =>" + textStatus)
                });
            });
            $('#cbpPj').click(function () {
                
                var pid = '{{$project->project_id}}';
               
                var ids = $('#ids').val();
               
             
                var cbpid = currentCbp;
                var hod = $('#hod_person').find(':selected').val();
                var dline = $('#d_line').val();
                // alert(pid + " >> " + cbpid + " >> " + hod + " >> " + dline + " >> " + ids);
                if(!ids){
                    Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Plz choose subtask',
                    })
                    // alert("hj");
                    $('#subconfig').modal('hide');
                }else{
                        $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        method: "POST",
                        url: "/addSubCbpProject",
                        data: {
                            pid,
                            ids,
                            cbpid,
                            hod,
                            dline
                        }
                    }).done(function (data) {
                        console.log("S blade: [task/create] component :[employee dropdown] from:app.js Data => Employee count" + data.length);
                        console.log(data);
                        if (data.success) {
                            var element = $(".accordion").eq(currentCbp - 1);
                            // alert(element);
                            var bgcolorelement = element.find('a');
                           
                            var eme = element.find('div.showmodal');
                          
                            eme.removeClass("showmodal");
                            eme.addClass('showmodal1');
                            
                            $('#hod_person').val('');
                            $('#d_line').val('');
                           
                            bgcolorelement.removeClass("collapsed");
                            bgcolorelement.addClass("collapse");
                            $('#subconfig').modal('hide');
                        } else {
                            console.log("F blade: [task/create] component :[department dropdown] from:app.js Fail =>" + data.success)
                        }
                    }).fail(function (jqXHR, textStatus) {
                        console.log("F blade: [task/create] component :[department dropdown] from:app.js Fail =>" + textStatus)
                    });
                }
               

            });
        };
    </script>
@endpush
