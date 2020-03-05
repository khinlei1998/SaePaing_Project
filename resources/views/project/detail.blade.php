@extends('layouts.app')
@section('title', 'Project Detail')
@section('content')


    <div class="container">
        <div class="card shadow-lg index-tables border-0 mt-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                        <div class="row index-chairman">
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-12 bg-white circle-project ml-0 p-3 pt-4 shadow">
                                        <h1 class="h5 font-weight-bold text-center mb-4">
                                            <strong>
                                                {{ $project->project_title }}
                                              
                                            </strong>
                                        </h1>

                                        <div class="row text-center mt-4">
                                            <div class="col-6 border-right">
                                                <div class="font-weight-bold mb-0 text-muted">Project Start Time</div>
                                                <span class="small text-gray">{{ $project->project_startDate }}</span>
                                            </div>
                                            <div class="col-6">
                                                <div class="font-weight-bold mb-0 text-muted">Estimated End Time</div>
                                                <span class="small text-gray">{{ $project->project_endDate }}</span>
                                            </div>
                                        </div>

                                        <!-- Progress bar 1 -->
                                        <div class="progress mx-auto" data-value='80'>
                                        <span class="progress-left">
        <span class="progress-bar border-primary"></span>
                                        </span>
                                            <span class="progress-right">
        <span class="progress-bar border-primary"></span>
                                        </span>



                                            <div class="progress-value w-100 h-100 rounded-circle d-flex align-items-center justify-content-center">
                                                <div class="h2 font-weight-bold">{{$per_of_whole_project}} %<sup class="small"></sup></div>
                                            </div>
                                        </div>
                        
                                        <div class="row text-center mt-4">
                                            <div class="col-6 border-right">
                                                <div class="h4 font-weight-bold mb-0">{{ $configs? count($configs):"0" }}</div>
                                                <span class="small text-gray">CMP Tasks</span>
                                            </div>
                                            <div class="col-6">
                                                <div class="h4 font-weight-bold mb-0">{{ $subcbps??"0"}}</div>
                                                <span class="small text-gray">Sub Tasks</span>
                                            </div>
                                        </div>
                                        <!-- END -->
                                    </div>
                                    <div class="col-12 cbp-maintask-title ml-0 shadow-sm">
                                        <div class="row">
                                            <div class="col-1 i-c">
                                                <div class="icon-circle pl-2 pt-1"><i class="fa fa-tasks"></i></div>
                                            </div>
                                            <div class="col-11 mt-3 pl-4">
                                                <p><strong>CMP Main Tasks</strong></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 cbp-maintask-body m-0 shadow overflow-auto">
                                        <div class="row">
                                            <div class="col-12">
                                                @foreach($project->project_config as $list)
                                                    <div class="panel-group showsubcbp" data-cbpid="{{$list->cbp_id}}" data-project_config_id="{{$list->id}}"
                                                         id="accordion" role="tablist" aria-multiselectable="true">
                                                        <div class="panel panel-default" id="showcbp">
                                                            <div class="panel-heading">
                                                                <h4 class="panel-title">
                                                                    <a data-toggle="tab"
                                                                       class="collapsed collapsed-maintask" href="#maintaskopen1">
                                                                        <div class="container">
                                                                            <div class="row">
                                                                                <div class="col-md-2"
                                                                                     data-toggle="tooltip"
                                                                                     data-placement="right"
                                                                                     title="Current Progress : 85% &emsp; Department : IT Support  Procced By  : U Si Tun Aung ">
                                                                                    <i class="fa fa-info-circle pr-3 pl-0"></i>
                                                                                </div>
                                                                                <div class="col-md-10">
                                                                                    {{ Str::limit($list->CBPlist->cbp_name,50) }}
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                </h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8 bg-light border-1 tab-pane show active" id="maintaskopen1" role="tabpanel">
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                    <div class="panel panel-default panel-projectlist">
                                        <div class="panel-heading" role="tab" id="headingOne">
                                            <h4 class="panel-projectlist">
                                                <a class="collapsed collapsed-maintask-open card shadow-sm border-0"
                                                   role="button" data-toggle="collapse" data-parent="#accordion"
                                                   href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
<div class="container">
    <div class="row">
        <div class="col-md-9 mb-3">

            <i class="fa fa-info-circle fa-lg pr-3"></i><strong id="cbp_title"></strong> <br>


            <small class="ml-5"><i class="fa fa-user mr-2"></i>Responsible
                Person : <p class="d-inline-block" id="cbp_responsible_person"></p>
            </small>
        </div>
        <div class="col-md-2 mb-3" id="show_noti_box" data-config_id="">
            <p class="d-inline-block text-danger"><i class="fa fa-bell h5"></i><small class="d-inline-block text-danger" id="text-notification">&nbsp; REPORTS</small></p>
        </div>
        <div class="col-md-1 mb-3">
            <i class="fa fa-sort-down fa-lg"></i>
        </div>
        <div class="col-md-12 mt-2 text-sub">
            <p class="d-inline-block"><strong>Total Sub Tasks - </strong></p><p class="d-inline-block" id="cbp_total_subtask"></p>
        </div>
        <div class="col-md-12 mt-0" id="progress_container">
        </div>
        <div class="col-md-12 mt-1 text-cpl">
            <p class="d-inline-block"><strong>Process Complete</strong><label class="mr-2"><p class="d-inline-block" id="cbp_process_complete"></p></label>
            </p>
        </div>

    </div>
</div>
                                                </a>
                                            </h4>
                                        </div>

                                    </div>


                                </div>

                                <div class="col-12">
                                    <div class="row mt-4 mb-0 justify-content-center text-muted">
                                        <div class="col-md-2  col-sm-4 text-md-center">
                                            <small><span class="bg-success mr-2">&nbsp;&nbsp;</span>Started</small>
                                        </div>
                                        <div class="col-md-2 col-sm-4 text-md-center">
                                            <small><span class="bg-warning mr-2">&nbsp;&nbsp;</span>Progress</small>
                                        </div>
                                        <div class="col-md-2 col-sm-4 text-md-center">
                                            <small><span class="bg-secondary mr-2">&nbsp;&nbsp;</span>Complete</small>
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="col-12 sub-area overflow-auto">
                                        <div class="row" id="subcbpcontainer">
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

    <!-- Modal -->
    <div class="modal fade" id="chairman_report_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="container">
                        <div class="row">
                            <div class="col-8">
                                <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa fa-info-circle pr-3" ></i><span id="hod_report_title"></span> </h5>
                            </div>
                            <div class="col-4">
{{-- <button type="button" class="btn btn-secondary" style="float:right;"><i class="fa fa-check pr-3" ></i>Mark As Complete</button>--}}
                            </div>
                        </div>
                    </div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="hod_container">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        window.onload = function () {
                var project_config_id = 0;
            function fillCbpHeader(cbp_list) {
                var title = $("#cbp_title");
                var responsibleperson = $('#cbp_responsible_person');
                var totalsubtask = $('#cbp_total_subtask');
                var progress_complete = $('#cbp_process_complete');
                var pg_container = $('#progress_container');
                var show_per='';
                if(cbp_list[0].percent != ''){
                    var show_per=cbp_list[0].percent + '%';

                }else{
                    var show_per='';

                }
                pg_container.empty();
                var pg = "\n" +
                    "<div class=\"progress progress-profile\">\n" +
                    "<div class=\"progress-bar bg-danger\"\n" +
                    "                     role=\"progressbar\" style=\"width: "+cbp_list[0].percent+"%;\"\n" +
                    "                     aria-valuenow=\"40\" aria-valuemin=\"0\"\n" +
                    "                     aria-valuemax=\"100\">"+show_per+"\n" +
                    "                </div>\n" +
                    "            </div>";
                pg_container.append(pg);
                title.empty();
                responsibleperson.empty();
                totalsubtask.empty();
                progress_complete.empty();
                console.log(cbp_list);
                title.append(cbp_list[0].cbp_name);
                responsibleperson.append(cbp_list[0].emp_name);
                totalsubtask.append(cbp_list[0].cbp_count);
                progress_complete.append(cbp_list[0].percent+"%");
                $('#show_noti_box').data('config_id',project_config_id);
            }

            function configureModal(data) {
                $('#hod_report_title').empty();
                $('#hod_container').empty();
                console.log('test for modal');
                console.log(data.report_list);

                $('#hod_report_title').append(data.cbp_list.cbp_name);
                for(var i=0;i<data.report_list.length;i++){
                    var chairman_report = "<div class=\"modal-body\">\n" +
                        "                    <div class=\"card text-center\">\n" +
                        "                        <div class=\"card-header text-left\">\n" +
                        "                            <p class=\"d-inline-block position-absolute text-left \"><strong><i class=\"fa fa-user fa-sm\"></i>&emsp;Reported by "+data.report_list[i].hodperson.emp_name+"</strong></p>\n" +
                        "                            <p class=\"text-right text-muted\"><small><i class=\"fa fa-clock\"></i>&emsp;"+data.report_list[i].created_at+"</small></p>\n" +
                        "                        </div>\n" +
                        "\n" +
                        "                        <div class=\"card-body\">\n" +
                        "                            <p class=\"card-text\">"+data.report_list[i].report_desc+"</p>\n" +
                        "                        </div>\n" +
                        "                    </div>\n" +
                        "                    <div class=\"card text-center\">\n" +
                        "                    </div>\n" +
                        "                </div>";
                    $('#hod_container').append(chairman_report);
                }
                $('#chairman_report_modal').modal('show');
                
            }

            $(function () {
                $('.showsubcbp').click(function () {
                    var pid = '{{$project->project_id}}';
                    var cbpid = $(this).data("cbpid");
                    project_config_id = $(this).data("project_config_id");
                    console.log(cbpid);
                    $('#subcbpcontainer').empty();
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        method: "POST",
                        url: "/getSubCbps",
                        data:{pid,cbpid}
                    }).done(function (data) {
                        console.log("S blade: [task/create] component :[employee dropdown] from:app.js Data => Employee count" + data.length);
                        fillCbpHeader(data.cbp_list);
                        console.log(data);
                        for (var i = 0; i < data.result.length; i++) {
                            var subcbp = "<div class=\"col-md-3 sub-hv\">\n" +
                                "\n" +
                                "<div class=\"card shadow-sm border-2 bg-white sub-open mb-4 p-3 pt-5 text-center\">\n" +
                                "<p>"+data.result[i].cbp_subtask+"</p>\n" +
                                "<span class=\"bg-assigned mt-3 text-center text-white align-center rounded\"><small>"+data.result[i].hot_id+"</small></span>\n" +
                                "<small class=\"mt-2\">status :&nbsp; <span class=\""+data.result[i].status+" pl-5 status-span\"> </small>"+
                                "</div>\n" +
                                "</div>";
                            $('#subcbpcontainer').append(subcbp);
                        }
                    }).fail(function (jqXHR, textStatcbp_listus) {
                        console.log("F blade: [task/create] component :[department dropdown] from:app.js Fail =>" + textStatus)
                    });
                });
                $('#show_noti_box').click(function(){
                    var config_id = $('#show_noti_box').data('config_id');

                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        method: "POST",
                        url: "/getChairmanReportByConfigId",
                        data:{config_id}
                    }).done(function (data) {
                        configureModal(data);
                        console.log("S blade: [task/create] component :[employee dropdown] from:app.js Data => Employee count" + data.length);
                    }).fail(function (jqXHR, textStatus) {
                        console.log("F blade: [task/create] component :[department dropdown] from:app.js Fail =>" + textStatus)
                    });
                });

                $('.showsubcbp').eq(0).click();
            });
        }
    </script>
@endpush