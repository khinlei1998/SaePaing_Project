/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import {faExclamationCircle} from "@fortawesome/free-solid-svg-icons/faExclamationCircle";


require('./bootstrap');
window.Vue = require('vue');

require('orgchart');


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);


Vue.component('Piechart', require('./components/Piechart.vue').default);
Vue.component('progressbar', require('./components/progressbar.vue').default);
Vue.component('Realtimenoti', require('./components/Realtimenoti.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
// sweetlaet2
import Swal from 'sweetalert2'

window.Swal = Swal;

// CommonJS
// const Swal = require('sweetalert2')

//beautiful sweet alert


import html2canvas from 'html2canvas';

import swal from 'bootstrap-sweetalert';


import {ImageEditor} from '@toast-ui/vue-image-editor';

// import swal from 'bootstrap-sweetalert';

import {config, library, dom} from '@fortawesome/fontawesome-svg-core';

config.autoReplaceSvg = 'nest';
import {
    faHome,
    faTasks,
    faEdit,
    faProjectDiagram,
    faAddressCard,
    faSignOutAlt,
    faUser,
    faUsers,
    faChalkboardTeacher,
    faBuilding,
    faNetworkWired,
    faPlusCircle,
    faCheck,
    faShareSquare,
    faCalendarAlt,
    faInfoCircle,
    faAngleLeft,
    faAngleRight,
    faClock,
    faAngleUp,
    faAngleDown,
    faTrashAlt,
    faBookmark,
    faCheckCircle,
    faAtlas,
    faDownload,
    faMailBulk,
    faCog,
    faSortDown,
    faBell,
    faKey,
    faExchangeAlt,
    faRedoAlt

} from '@fortawesome/free-solid-svg-icons';

library.add(

    faHome, faTasks, faEdit,
    faProjectDiagram, faAddressCard,
    faSignOutAlt, faUser, faUsers,
    faChalkboardTeacher, faBuilding,
    faNetworkWired, faPlusCircle, faCheck
    , faShareSquare, faCalendarAlt, faInfoCircle
    , faAngleLeft, faAngleRight, faClock,
    faAngleUp, faAngleDown, faTrashAlt, faBookmark, faCheckCircle, faAtlas, faDownload, faBell, faMailBulk, faCog, faSortDown, faKey, faExchangeAlt, faRedoAlt);

dom.watch();

//this declaration is for datetime picker in task create.balde.php
window.moment = require('moment');
require('tempusdominus-bootstrap-4');

//this declaration is for ckeditor
window.ClassicEditor = require('@ckeditor/ckeditor5-build-classic');
//this declaration is for select2
require('select2');
//this declaration is for dropzone
window.Dropzone = require('dropzone');
window.editor = null;
window.editor1 = null;
window.editor2 = null;
window.editor3 = null;
window.taskeditor = null;
window.projectEditor = null;
window.editor_feedback = null;
window.remark = null;


//this declaration is for taskdropzone
Dropzone.options.taskform = {

    // maxFiles:11,
    paramName: "task_file",
    uploadMultiple: true,
    addRemoveLinks: true,
    autoProcessQueue: false,
    dictResponseError: 'Server not Configured',
    parallelUploads: 11,
    init: function () {
        var myDropZone = this;
        $.fn.addNewImage(myDropZone);
        var task_id = 0;

        this.on("queuecomplete", function (progress) {

            console.log("Uploaded!!!");
        });

        this.on("error", function (file, response) {
            console.log(response);
        });
        this.on("addedfile", function (file, response) {

            if (file == myDropZone.files[0]) {

                $('.dz-preview:first').hide();

            }
            console.log(myDropZone.files.length);
            // console.log('New File Added');
        });

        this.on("success", function (data) {

            if (data) {
                Swal.fire({
                    title: 'Great Job',
                    text: "Task create successfully",
                    icon: 'success',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'OK'
                })
                $(".swal2-confirm").click(function () {
                    task_id = data.xhr.response;


                    window.location = "/task/" + task_id;

                });


            }

        });
        this.on("sending", function (file, xhr, data) {
            data.append("project_code", $('#project_code').find(':selected').val());
            data.append("task_title", $('#task_title').val());
            data.append("description", taskeditor.getData());
            data.append("start_time", $('#task-starttime').val());
            data.append("end_time", $('#task-endtime').val());
            data.append("dept_id", $('#task_department').find(':selected').val());
            data.append("assignee_person", $("#task_assigned_to").val());
        });
        $('#taskform-submit').on("click", function () {


            var old_image = $('.old_image').val();
            var task_title = $(".task_title").val().length;
            // alert(task_title);
            //  var project_code = $('.project_code').val().length;
            var department_append = $('.department_append').find(':selected').val();
            var project_editor = taskeditor.getData().length;
            var employee = $('.employee').val().length;
            var start_time = $('.task_start_time').val();
            var end_time = $('.task_end_time').val();
            var hasError = true;
            //  alert(start_time);
            if (!task_title) {
                hasError = false;

                $('#task-title-append').find("label").remove();
                $('#task-title-append').append("<label> * Please Enter Test Title.</label>");

            } else {
                $('#task-title-append').find("label").remove();
            }
            //  if(!project_code){
            //     hasError=false;

            //     $('.project_code_append').find("label").remove();
            //     $('.project_code_append').append("<label> * Please Enter Project Code.</label>");
            //  }else{
            //     $('.project_code_append').find("label").remove();

            //  }
            if (old_image) {
                hasError = true;
            } else if (myDropZone.files.length < 1) {
                hasError = false;
                $('.task_image').find("label").remove();
                $('.task_image').append("<label> * Please Choosevvvv Image.</label>");
            } else {
                $('.task_image').find("label").remove();
            }
            if (!project_editor) {
                hasError = false;
                $('.project_editor_append').find('label').remove();
                $('.project_editor_append').append("<label> * Please Enter Description.</label>");
            } else {
                $('.project_editor_append').find('label').remove();
            }

            if (!employee) {
                hasError = false;
                $('.employee_append').find('label').remove();
                $('.employee_append').append("<label> * Please Select Employee.</label>")
            } else {
                $('.employee_append').find('label').remove();
            }

            if (!department_append) {
                hasError = false;
                $('.department_append').find('label').remove();
                $('.department_append').append("<label> * Please Enter Department.</label>");
            } else {
                $('.department_append').find('label').remove();
            }
            if (!start_time) {
                hasError = false;
                $('.start_time_append').find('label').remove();
                $('.start_time_append').append("<label> * Please Select Start Time.</label>")
            } else {

                $('.start_time_append').find('label').remove();

            }
            if (!end_time) {
                hasError = false;
                $('.end_time_append').find('label').remove();
                $('.end_time_append').append("<label> * Please Select End Time .</label>")
            } else {

                $('.end_time_append').find('label').remove();

            }
            if (hasError) {
                myDropZone.processQueue();
            }


            //uncomment for testing the vales of task create.blade.php
            //  alert($("#project_code").val());
            // Tell Dropzone to process all queued files.
        });

    }
};

//this declaration is for missiondropzone
Dropzone.options.missionform = {
    maxFilesize: 11,
    maxFiles: 11,
    paramName: "mission_file",//mission_file[]
    uploadMultiple: true,
    addRemoveLinks: true,
    autoProcessQueue: false,
    dictResponseError: 'Server not Configured',
    acceptedFiles: "image/*",
    parallelUploads: 11,
    init: function () {
// <<<<<<< HEAD
//         var missionZone = this;
//         let mission_id = 0;
//         $.fn.addNewImage(missionZone);
//         this.on("queuecomplete", function (progress) {
//             window.location = "/mission/" + mission_id;
//             console.log("Uploaded!!!");
//         });
//         this.on("error", function (file, response) {
//             console.log(response);
//         });
//         this.on("addedfile", function (file, response) {
//             if (file == missionZone.files[0])
//                 $('.dz-preview:first').hide();
//             // console.log(missionZone.files.length);
//         });
//         this.on("sending", function (file, xhr, data) {
//             data.append("job_type", $('#job_type').val());
//             data.append("job_target", $('#job_target').val());
//             data.append("job_obj", editor1.getData());
//             data.append("emp_id", $('#responsible_person').find(':selected').val());
//             data.append("jobfinished_date", $('#job_finished_date').val());
//             data.append("doing_methods", editor2.getData());
//             data.append("issue_resolve_ways", editor3.getData());
//             data.append("remark", $('#remark').val());
//         });
//         this.on("success", function (file, response) {
//
//             mission_id = file.xhr.response;
//             //  console.log(mission_id);
//         });
//         $('#missionform-submit').on("click", function () {
//             var old_mission_image = $(".old_mission_image").val();
//             var job_type = $(".job_type").val().length;
//             var job_target = $(".job_target").val().length;
//             var mission_editor = editor1.getData().length;
//             var assignee = $('.assignee').val().length;
//             var finished_date = $('.finished_date').val().length;
//             var methods = editor2.getData().length;
//             var resolved_way = editor3.getData().length;
//             var remark = $('#remark').val()
// =======
            var missionZone = this;
            let mission_id=0;
            $.fn.addNewImage(missionZone);
            this.on("queuecomplete", function (progress) {
                //   window.location = "/mission/"+mission_id;
                console.log("Uploaded!!!");
            });
            this.on("error", function (file, response) {
                console.log(response);
            });
            this.on("addedfile", function (file, response) {
                if (file==missionZone.files[0])
                    $('.dz-preview:first').hide(  );
                 console.log(missionZone.files.length);
            });
            this.on("sending", function (file, xhr, data) {
                data.append("job_type", $('#job_type').val());
                data.append("job_target", $('#job_target').val());
                data.append("job_obj", editor1.getData());
                data.append("emp_id", $('#responsible_person').find(':selected').val());
                data.append("jobfinished_date", $('#job_finished_date').val());
                data.append("doing_methods", editor2.getData());
                data.append("issue_resolve_ways", editor3.getData());
                data.append("remark", $('#remark').val());
            });
            this.on("success", function (data) {

                //  mission_id = data.xhr.response;
                 console.log(data);
            });
            $('#missionform-submit').on("click", function () {
                var old_mission_image = $(".old_mission_image").val();
               var job_type=$(".job_type").val().length;
               var job_target=$(".job_target").val().length;
                var mission_editor=editor1.getData().length;
                 var assignee= $('.assignee').val().length;
                var finished_date=$('.finished_date').val().length;
                var methods=editor2.getData().length;
                var resolved_way=editor3.getData().length;
                var remark=$('#remark').val();



// alert(resolved_way);
            var hasError = true;

            if (!job_type) {
                hasError = false;
                $('.job_type_append').find("p").remove();
                $('.job_type_append').append("<p> * Please Enter Job Type.</p>");
            } else {
                $('.job_type_append').find("p").remove();
            }

            if (!job_target) {
                hasError = false;
                $('.job_target_append').find("p").remove();
                $('.job_target_append').append("<p> * Please Enter Job Target.</p>");
            } else {
                $('.job_target_append').find("p").remove();
            }

            if (!mission_editor) {
                hasError = false;
                $('.job_obj_append').find("p").remove();
                $('.job_obj_append').append("<p> * Please Enter Job Objective.</p>");
            } else {
                $('.job_obj_append').find("p").remove();
            }

            if (!assignee) {
                hasError = false;
                $('.employee_append').find("p").remove();
                $('.employee_append').append("<p> * Please Enter Assignee.</p>");
            } else {
                $('.employee_append').find("p").remove();
            }

            if (!finished_date) {
                hasError = false;
                $('.finished_date_append').find("p").remove();
                $('.finished_date_append').append("<p> * Please Enter Finish Date.</p>");
            } else {
                $('.finished_date_append').find("p").remove();
            }

            if (!methods) {
                hasError = false;
                $('.doing_method_append').find("p").remove();
                $('.doing_method_append').append("<p> * Please Enter Doing Methods.</p>");
            } else {
                $('.doing_method_append').find("p").remove();
            }

            if (old_mission_image) {
                hasError = true;
            } else if (missionZone.files.length < 2) {
                hasError = false;
                $('.mission_image').find("p").remove();
                $('.mission_image').append("<p> * Please Choose Image.</p>");
            } else {
                $('.mission_image').find("p").remove();
            }

            if (!resolved_way) {
                hasError = false;
                $('.resolved_way_append').find("p").remove();
                $('.resolved_way_append').append("<p> * Please Enter Resolved Way.</p>");
            } else {
                $('.resolved_way_append').find("p").remove();
            }

            if (!remark) {
                hasError = false;
                $('.remark_append').find("p").remove();
                $('.remark_append').append("<p> * Please Enter Remark.</p>");
            } else {
                $('.remark_append').find("p").remove();
            }

            if (hasError) {
                missionZone.processQueue();
            }


        });
    }
};
// Profile
Dropzone.options.profileform = {
    maxFilesize: 1,
    maxFiles: 11,
    paramName: "profile_img",
    uploadMultiple: true,
    addRemoveLinks: true,
    autoProcessQueue: false,
    dictResponseError: 'Server not Configured',
    acceptedFiles: "image/*",
    parallelUploads: 11,
    init: function () {
        var profileDropZone = this;
        $.fn.addNewImage(profileDropZone);

        this.on("queuecomplete", function (progress) {

            console.log("Uploaded!!!");
        });
        this.on("error", function (file, response) {
            console.log(response);
        });
        this.on("addedfile", function (file, response) {

            if (file == profileDropZone.files[0]) {

                $('.dz-preview:first').hide();

            }

        });
        this.on("success", function (data) {
            console.log(data);

        });
        this.on("sending", function (file, xhr, data) {

        });
        $('#btnprofile').on("click", function () {

            profileDropZone.processQueue();

        });

    }
};

Dropzone.options.reportform = {
    maxFilesize: 1,
    maxFiles: 11,
    paramName: "reportfile",
    uploadMultiple: true,
    addRemoveLinks: true,
    autoProcessQueue: false,
    dictResponseError: 'Server not Configured',
    acceptedFiles: "image/*",
    parallelUploads: 11,
    init: function () {
        var myDropZone = this;
        $.fn.addNewImage(myDropZone);

        this.on("queuecomplete", function (progress) {

            console.log("Uploaded!!!");
        });
        this.on("error", function (file, response) {
            console.log(response);
        });
        this.on("addedfile", function (file, response) {
            if (file == myDropZone.files[0]) {
                $('.dz-preview:first').hide();
            }
            console.log("Images length>>" + myDropZone.files.length)

        });
        this.on("success", function (data) {

            window.location = "/profile";
        });
        this.on("sending", function (file, xhr, data) {

            data.append("feedback", editor_feedback.getData());
            data.append("task_id", $("#task_hidden_id").val());

        });
        $('#report_submit').on("click", function () {
            var hasError = true;

            if (myDropZone.files.length < 2) {
                hasError = false;
                $('.report_task_image').find("p").remove();
                $('.report_task_image').append("<p> * Please Choose Image  First.</p>");
            } else {
                $('.report_task_image').find("p").remove();
            }

            if (hasError) {
                myDropZone.processQueue();
            }

            //uncomment for testing the vales of task create.blade.php
            //  alert(editor_feedback.getData());
            // Tell Dropzone to process all queued files.
        });

    }
};


$.fn.addNewImage = function (myDropZone) {
    var xhr = new XMLHttpRequest();


    xhr.open("GET", "http://127.0.0.1:8000/images/sae-logo.png", true);

    xhr.responseType = "arraybuffer";

    xhr.onload = function (e) {
        // Obtain a blob: URL for the image data.
        var arrayBufferView = new Uint8Array(this.response);
        var blob = new Blob([arrayBufferView], {type: "image/jpeg"});
        var urlCreator = window.URL || window.webkitURL;
        var imageUrl = urlCreator.createObjectURL(blob);

        var parts = [blob, new ArrayBuffer()];

        var file = new File(parts, "imageUploadTestFile", {
            lastModified: new Date(0), // optional - default = now
            type: "image/jpeg"
        });

        $("input[accept=\'image/jpg,image/gif,image/png,image/jpeg\']").files = [file];

        myDropZone.addFile(file);
    };
    xhr.send();
}

$(function () {

    $("#reject_submit").click(function (e) {

        var remark_editor = remark.getData().replace(/<[^>]*>/gi, '').length;
        //  alert(remark_editor);
        if (!remark_editor) {
            $('#remark-box').find("p").remove();
            $('#remark-box').append("<p> * Please Enter Description First.</p>");
            e.preventDefault();


        } else {
            $("#remark_form").submit();
        }

    });


    //Default configration for datetime picker
    $.fn.datetimepicker.Constructor.Default = $.extend({}, $.fn.datetimepicker.Constructor.Default, {
        icons: {
            time: 'fa fa-clock',
            date: 'fa fa-calendar-alt',
            up: 'fa fa-angle-up',
            down: 'fa fa-angle-down',
            previous: 'fa fa-angle-left',
            next: 'fa fa-angle-right',
            today: 'fa fa-calendar-check-o',
            clear: 'fa fa-trash-alt',
            close: 'fa fa-clock'
        }
    });
    //configuration for tooltip
    $('[data-toggle="tooltip"]').tooltip();
    //configration for select2 for department dropdown
    $(".department").select2({
        placeholder: "Select a Department",
        allowClear: true
    });
    //configuration for select2 for employee dropdown
    $(".employee").select2({
        placeholder: "Please select your responsible person",
        allowClear: true
    });

    //configuration for select2 for employee dropdown
    $(".responsible_person").select2({
        placeholder: "Please select your responsible person",
        allowClear: true
    });

    //project create form
    $("#project_region").select2({
        placeholder: "Please select your region",
        allowClear: true
    });

    //project create form (job duration)
    $(".job_duration").select2({
        placeholder: "Please select years",
        allowClear: true
    });

    $('#showcbp').click(function () {
        $('#showcbpdiv').show();
    });

    $('#refresh_page').click(function () {
        return window.location.assign(window.location.href)
    });

    $('#to_change_zaw').click(function () {
        if ($('.uniandzawgyi').hasClass('uni')) {
            $('.uniandzawgyi').removeClass('uni');

        }
        $('.uniandzawgyi').addClass('zawgyi');

    });


    $('#to_change_uni').click(function () {
        if ($('.uniandzawgyi').hasClass('zawgyi')) {
            $('.uniandzawgyi').removeClass('zawgyi');

        }
        $('.uniandzawgyi').addClass('uni');

    });

    $('.sub_department').select2({
        placeholder: "Select a Sub_department",
    });

    $('.position').select2({
        placeholder: "Select a position",
    });

    $('.team').select2({
        placeholder: "Select a team",
    });
    $('#team_group').select2({
        placeholder: "Select a Group",
    });
    // proceeby
    $('.modal').on('shown.bs.modal', function (e) {
        $('.processby').select2({
            placeholder: "Select a HOD",
            dropdownParent: $('.modal.fade.show')
        });

        $('#project_regionn').select2({
            placeholder: "Select a HOT",
            dropdownParent: $('.modal.fade.show')
        });

        //for CBP List Dept dropdown
        $('.cbp_dept').select2({
            placeholder: "Select a Department",
            dropdownParent: $('.modal.fade.show')
        });
        $('.modal.fade.show').find("#d_line").datetimepicker();
    });

    $(".project_code").select2({
        placeholder: "Select an Project",
    });


    $("#dept_group").select2({
        placeholder: "Select an Department",
    });

    // $("#custom").percircle({
    //     text:"hello",
    //     percent: 50
    // })

    $(".progress").each(function () {

        var value = $(this).attr('data-value');
        var left = $(this).find('.progress-left .progress-bar');
        var right = $(this).find('.progress-right .progress-bar');

        if (value > 0) {
            if (value <= 50) {
                right.css('transform', 'rotate(' + percentageToDegrees(value) + 'deg)')
            } else {
                right.css('transform', 'rotate(180deg)')
                left.css('transform', 'rotate(' + percentageToDegrees(value - 50) + 'deg)')
            }
        }

    })

    function percentageToDegrees(percentage) {

        return percentage / 100 * 360

    }


    // //this function is for pagination with tab-panes in profile.blade.php
    // var activeTab = window.location.hash;
    // if (activeTab == "") {
    //     activeTab = "#infos";
    // }
    // $(".tab-pane").removeClass("active in");
    // $(activeTab).addClass("active in");
    // $('a[href="' + activeTab + '"]').tab('show');
});






// const app = new Vue({
//     el: '#app'
//
// });










//start realtime notification with vue
import axios from 'axios'
import VueAxios from 'vue-axios'
new Vue({
    el: '#app',


});








// Custom Error Message automatically hide
window.setTimeout(function () {
    $(".alert").fadeTo(1000, 0).slideUp(1000, function () {
        $(this).remove();
    });
}, 1000);
