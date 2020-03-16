/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/app.js":
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
/*! no exports provided */
<<<<<<< HEAD
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _fortawesome_free_solid_svg_icons_faExclamationCircle__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @fortawesome/free-solid-svg-icons/faExclamationCircle */ "./node_modules/@fortawesome/free-solid-svg-icons/faExclamationCircle.js");
/* harmony import */ var _fortawesome_free_solid_svg_icons_faExclamationCircle__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_fortawesome_free_solid_svg_icons_faExclamationCircle__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var sweetalert2__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! sweetalert2 */ "./node_modules/sweetalert2/dist/sweetalert2.all.js");
/* harmony import */ var sweetalert2__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(sweetalert2__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var html2canvas__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! html2canvas */ "./node_modules/html2canvas/dist/html2canvas.js");
/* harmony import */ var html2canvas__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(html2canvas__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var bootstrap_sweetalert__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! bootstrap-sweetalert */ "./node_modules/bootstrap-sweetalert/dist/sweetalert.js");
/* harmony import */ var bootstrap_sweetalert__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(bootstrap_sweetalert__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _toast_ui_vue_image_editor__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @toast-ui/vue-image-editor */ "./node_modules/@toast-ui/vue-image-editor/dist/toastui-vue-image-editor.js");
/* harmony import */ var _toast_ui_vue_image_editor__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_toast_ui_vue_image_editor__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _fortawesome_fontawesome_svg_core__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @fortawesome/fontawesome-svg-core */ "./node_modules/@fortawesome/fontawesome-svg-core/index.es.js");
/* harmony import */ var _fortawesome_free_solid_svg_icons__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! @fortawesome/free-solid-svg-icons */ "./node_modules/@fortawesome/free-solid-svg-icons/index.es.js");
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */


__webpack_require__(/*! ./bootstrap */ "./resources/js/bootstrap.js");

window.Vue = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.common.js");

__webpack_require__(/*! orgchart */ "./node_modules/orgchart/dist/js/jquery.orgchart.min.js");
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */
// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))


Vue.component('example-component', __webpack_require__(/*! ./components/ExampleComponent.vue */ "./resources/js/components/ExampleComponent.vue")["default"]);
Vue.component('Piechart', __webpack_require__(/*! ./components/Piechart.vue */ "./resources/js/components/Piechart.vue")["default"]);
Vue.component('progressbar', __webpack_require__(/*! ./components/progressbar.vue */ "./resources/js/components/progressbar.vue")["default"]);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
// sweetlaet2


window.Swal = sweetalert2__WEBPACK_IMPORTED_MODULE_1___default.a; // CommonJS
// const Swal = require('sweetalert2')
//beautiful sweet alert



 // import swal from 'bootstrap-sweetalert';


_fortawesome_fontawesome_svg_core__WEBPACK_IMPORTED_MODULE_5__["config"].autoReplaceSvg = 'nest';

_fortawesome_fontawesome_svg_core__WEBPACK_IMPORTED_MODULE_5__["library"].add(_fortawesome_free_solid_svg_icons__WEBPACK_IMPORTED_MODULE_6__["faHome"], _fortawesome_free_solid_svg_icons__WEBPACK_IMPORTED_MODULE_6__["faTasks"], _fortawesome_free_solid_svg_icons__WEBPACK_IMPORTED_MODULE_6__["faEdit"], _fortawesome_free_solid_svg_icons__WEBPACK_IMPORTED_MODULE_6__["faProjectDiagram"], _fortawesome_free_solid_svg_icons__WEBPACK_IMPORTED_MODULE_6__["faAddressCard"], _fortawesome_free_solid_svg_icons__WEBPACK_IMPORTED_MODULE_6__["faSignOutAlt"], _fortawesome_free_solid_svg_icons__WEBPACK_IMPORTED_MODULE_6__["faUser"], _fortawesome_free_solid_svg_icons__WEBPACK_IMPORTED_MODULE_6__["faUsers"], _fortawesome_free_solid_svg_icons__WEBPACK_IMPORTED_MODULE_6__["faChalkboardTeacher"], _fortawesome_free_solid_svg_icons__WEBPACK_IMPORTED_MODULE_6__["faBuilding"], _fortawesome_free_solid_svg_icons__WEBPACK_IMPORTED_MODULE_6__["faNetworkWired"], _fortawesome_free_solid_svg_icons__WEBPACK_IMPORTED_MODULE_6__["faPlusCircle"], _fortawesome_free_solid_svg_icons__WEBPACK_IMPORTED_MODULE_6__["faCheck"], _fortawesome_free_solid_svg_icons__WEBPACK_IMPORTED_MODULE_6__["faShareSquare"], _fortawesome_free_solid_svg_icons__WEBPACK_IMPORTED_MODULE_6__["faCalendarAlt"], _fortawesome_free_solid_svg_icons__WEBPACK_IMPORTED_MODULE_6__["faInfoCircle"], _fortawesome_free_solid_svg_icons__WEBPACK_IMPORTED_MODULE_6__["faAngleLeft"], _fortawesome_free_solid_svg_icons__WEBPACK_IMPORTED_MODULE_6__["faAngleRight"], _fortawesome_free_solid_svg_icons__WEBPACK_IMPORTED_MODULE_6__["faClock"], _fortawesome_free_solid_svg_icons__WEBPACK_IMPORTED_MODULE_6__["faAngleUp"], _fortawesome_free_solid_svg_icons__WEBPACK_IMPORTED_MODULE_6__["faAngleDown"], _fortawesome_free_solid_svg_icons__WEBPACK_IMPORTED_MODULE_6__["faTrashAlt"], _fortawesome_free_solid_svg_icons__WEBPACK_IMPORTED_MODULE_6__["faBookmark"], _fortawesome_free_solid_svg_icons__WEBPACK_IMPORTED_MODULE_6__["faCheckCircle"], _fortawesome_free_solid_svg_icons__WEBPACK_IMPORTED_MODULE_6__["faAtlas"], _fortawesome_free_solid_svg_icons__WEBPACK_IMPORTED_MODULE_6__["faDownload"], _fortawesome_free_solid_svg_icons__WEBPACK_IMPORTED_MODULE_6__["faBell"], _fortawesome_free_solid_svg_icons__WEBPACK_IMPORTED_MODULE_6__["faMailBulk"], _fortawesome_free_solid_svg_icons__WEBPACK_IMPORTED_MODULE_6__["faCog"], _fortawesome_free_solid_svg_icons__WEBPACK_IMPORTED_MODULE_6__["faSortDown"], _fortawesome_free_solid_svg_icons__WEBPACK_IMPORTED_MODULE_6__["faKey"], _fortawesome_free_solid_svg_icons__WEBPACK_IMPORTED_MODULE_6__["faExchangeAlt"], _fortawesome_free_solid_svg_icons__WEBPACK_IMPORTED_MODULE_6__["faRedoAlt"]);
_fortawesome_fontawesome_svg_core__WEBPACK_IMPORTED_MODULE_5__["dom"].watch(); //this declaration is for datetime picker in task create.balde.php

window.moment = __webpack_require__(/*! moment */ "./node_modules/moment/moment.js");

__webpack_require__(/*! tempusdominus-bootstrap-4 */ "./node_modules/tempusdominus-bootstrap-4/build/js/tempusdominus-bootstrap-4.js"); //this declaration is for ckeditor


window.ClassicEditor = __webpack_require__(/*! @ckeditor/ckeditor5-build-classic */ "./node_modules/@ckeditor/ckeditor5-build-classic/build/ckeditor.js"); //this declaration is for select2

__webpack_require__(/*! select2 */ "./node_modules/select2/dist/js/select2.js"); //this declaration is for dropzone


window.Dropzone = __webpack_require__(/*! dropzone */ "./node_modules/dropzone/dist/dropzone.js");
window.editor = null;
window.editor1 = null;
window.editor2 = null;
window.editor3 = null;
window.taskeditor = null;
window.projectEditor = null;
window.editor_feedback = null;
window.remark = null; //this declaration is for taskdropzone

Dropzone.options.taskform = {
  // maxFiles:11,
  paramName: "task_file",
  uploadMultiple: true,
  addRemoveLinks: true,
  autoProcessQueue: false,
  dictResponseError: 'Server not Configured',
  parallelUploads: 11,
  init: function init() {
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

      console.log(myDropZone.files.length); // console.log('New File Added');
    });
    this.on("success", function (data) {
      if (data) {
        sweetalert2__WEBPACK_IMPORTED_MODULE_1___default.a.fire({
          title: 'Great Job',
          text: "Task create successfully",
          icon: 'success',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'OK'
        });
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
      var task_title = $(".task_title").val().length; // alert(task_title);

      var project_code = $('.project_code').val().length;
      var department_append = $('.department_append').find(':selected').val();
      var project_editor = taskeditor.getData().length;
      var employee = $('#project_code').val().length; //

      var start_time = $('.task_start_time').val();
      var end_time = $('.task_end_time').val();
      var hasError = true; //  alert(start_time);

      if (!task_title) {
        hasError = false;
        $('#task-title-append').find("label").remove();
        $('#task-title-append').append("<label> * Please Enter Test Title.</label>");
      } else {
        $('#task-title-append').find("label").remove();
      }

      if (!project_code) {
        hasError = false;
        $('.project_code_append').find("label").remove();
        $('.project_code_append').append("<label> * Please Enter Project Code.</label>");
      } else {
        $('.project_code_append').find("label").remove();
      }

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
        $('.employee_append').append("<label> * Please Select Employee.</label>");
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
        $('.start_time_append').append("<label> * Please Select Start Time.</label>");
      } else {
        $('.start_time_append').find('label').remove();
      }

      if (!end_time) {
        hasError = false;
        $('.end_time_append').find('label').remove();
        $('.end_time_append').append("<label> * Please Select End Time .</label>");
      } else {
        $('.end_time_append').find('label').remove();
      }

      if (hasError) {
        myDropZone.processQueue();
      } //uncomment for testing the vales of task create.blade.php
      //  alert($("#project_code").val());
      // Tell Dropzone to process all queued files.

    });
  }
}; //this declaration is for missiondropzone

Dropzone.options.missionform = {
  maxFilesize: 11,
  maxFiles: 11,
  paramName: "mission_file",
  //mission_file[]
  uploadMultiple: true,
  addRemoveLinks: true,
  autoProcessQueue: false,
  dictResponseError: 'Server not Configured',
  acceptedFiles: "image/*",
  parallelUploads: 11,
  init: function init() {
    var missionZone = this;
    var mission_id = 0;
    $.fn.addNewImage(missionZone);
    this.on("queuecomplete", function (progress) {
      window.location = "/mission/" + mission_id;
      console.log("Uploaded!!!");
    });
    this.on("error", function (file, response) {
      console.log(response);
    });
    this.on("addedfile", function (file, response) {
      if (file == missionZone.files[0]) $('.dz-preview:first').hide(); // console.log(missionZone.files.length);
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
    this.on("success", function (file, response) {
      mission_id = file.xhr.response; //  console.log(mission_id);
    });
    $('#missionform-submit').on("click", function () {
      var old_mission_image = $(".old_mission_image").val();
      var job_type = $(".job_type").val().length;
      var job_target = $(".job_target").val().length;
      var mission_editor = editor1.getData().length;
      var assignee = $('.assignee').val().length;
      var finished_date = $('.finished_date').val().length;
      var methods = editor2.getData().length;
      var resolved_way = editor3.getData().length;
      var remark = $('#remark').val(); // alert(resolved_way);

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
}; // Profile

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
  init: function init() {
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
    this.on("sending", function (file, xhr, data) {});
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
  init: function init() {
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

      console.log("Images length>>" + myDropZone.files.length);
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
      } //uncomment for testing the vales of task create.blade.php
      //  alert(editor_feedback.getData());
      // Tell Dropzone to process all queued files.

    });
  }
};

$.fn.addNewImage = function (myDropZone) {
  var xhr = new XMLHttpRequest(); // Use JSFiddle logo as a sample image to avoid complicating
  // this example with cross-domain issues.

  xhr.open("GET", "http://127.0.0.1:8000/images/sae-logo.png", true); // Ask for the result as an ArrayBuffer.

  xhr.responseType = "arraybuffer";

  xhr.onload = function (e) {
    // Obtain a blob: URL for the image data.
    var arrayBufferView = new Uint8Array(this.response);
    var blob = new Blob([arrayBufferView], {
      type: "image/jpeg"
    });
    var urlCreator = window.URL || window.webkitURL;
    var imageUrl = urlCreator.createObjectURL(blob);
    var parts = [blob, new ArrayBuffer()];
    var file = new File(parts, "imageUploadTestFile", {
      lastModified: new Date(0),
      // optional - default = now
      type: "image/jpeg"
    });
    $("input[accept=\'image/jpg,image/gif,image/png,image/jpeg\']").files = [file];
    myDropZone.addFile(file);
  };

  xhr.send();
};

$(function () {
  $("#reject_submit").click(function (e) {
    var remark_editor = remark.getData().replace(/<[^>]*>/gi, '').length; //  alert(remark_editor);

    if (!remark_editor) {
      $('#remark-box').find("p").remove();
      $('#remark-box').append("<p> * Please Enter Description First.</p>");
      e.preventDefault();
    } else {
      $("#remark_form").submit();
    }
  }); //Default configration for datetime picker

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
  }); //configuration for tooltip

  $('[data-toggle="tooltip"]').tooltip(); //configration for select2 for department dropdown

  $(".department").select2({
    placeholder: "Select a Department",
    allowClear: true
  }); //configuration for select2 for employee dropdown

  $(".employee").select2({
    placeholder: "Please select your responsible person",
    allowClear: true
  }); //configuration for select2 for employee dropdown

  $(".responsible_person").select2({
    placeholder: "Please select your responsible person",
    allowClear: true
  }); //project create form

  $("#project_region").select2({
    placeholder: "Please select your region",
    allowClear: true
  }); //project create form (job duration)

  $(".job_duration").select2({
    placeholder: "Please select years",
    allowClear: true
  });
  $('#showcbp').click(function () {
    $('#showcbpdiv').show();
  });
  $('#refresh_page').click(function () {
    return window.location.assign(window.location.href);
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
    placeholder: "Select a Sub_department"
  });
  $('.position').select2({
    placeholder: "Select a position"
  });
  $('.team').select2({
    placeholder: "Select a team"
  });
  $('#team_group').select2({
    placeholder: "Select a Group"
  }); // proceeby

  $('.modal').on('shown.bs.modal', function (e) {
    $('.processby').select2({
      placeholder: "Select a HOD",
      dropdownParent: $('.modal.fade.show')
    }); //for CBP List Dept dropdown

    $('.cbp_dept').select2({
      placeholder: "Select a Department",
      dropdownParent: $('.modal.fade.show')
    });
    $('.modal.fade.show').find("#d_line").datetimepicker();
  });
  $(".project_code").select2({
    placeholder: "Select an Project"
  });
  $("#dept_group").select2({
    placeholder: "Select an Department"
  }); // $("#custom").percircle({
  //     text:"hello",
  //     percent: 50
  // })

  $(".progress").each(function () {
    var value = $(this).attr('data-value');
    var left = $(this).find('.progress-left .progress-bar');
    var right = $(this).find('.progress-right .progress-bar');

    if (value > 0) {
      if (value <= 50) {
        right.css('transform', 'rotate(' + percentageToDegrees(value) + 'deg)');
      } else {
        right.css('transform', 'rotate(180deg)');
        left.css('transform', 'rotate(' + percentageToDegrees(value - 50) + 'deg)');
      }
    }
  });

  function percentageToDegrees(percentage) {
    return percentage / 100 * 360;
  } //this function is for pagination with tab-panes in profile.blade.php


  var activeTab = window.location.hash;

  if (activeTab == "") {
    activeTab = "#infos";
  }

  $(".tab-pane").removeClass("active in");
  $(activeTab).addClass("active in");
  $('a[href="' + activeTab + '"]').tab('show');
});
var app = new Vue({
  el: '#app'
}); // Custom Error Message automatically hide

window.setTimeout(function () {
  $(".alert").fadeTo(1000, 0).slideUp(1000, function () {
    $(this).remove();
  });
}, 1000);

/***/ }),

/***/ "./resources/js/bootstrap.js":
/*!***********************************!*\
  !*** ./resources/js/bootstrap.js ***!
  \***********************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

window._ = __webpack_require__(/*! lodash */ "./node_modules/lodash/lodash.js");
/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

try {
  window.Popper = __webpack_require__(/*! popper.js */ "./node_modules/popper.js/dist/esm/popper.js")["default"];
  window.$ = window.jQuery = __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js");

  __webpack_require__(/*! bootstrap */ "./node_modules/bootstrap/dist/js/bootstrap.js");
} catch (e) {}
/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */


window.axios = __webpack_require__(/*! axios */ "./node_modules/axios/index.js");
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */
// import Echo from 'laravel-echo';
// window.Pusher = require('pusher-js');
// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     encrypted: true
// });

/***/ }),

/***/ "./resources/js/components/ExampleComponent.vue":
/*!******************************************************!*\
  !*** ./resources/js/components/ExampleComponent.vue ***!
  \******************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _ExampleComponent_vue_vue_type_template_id_299e239e___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./ExampleComponent.vue?vue&type=template&id=299e239e& */ "./resources/js/components/ExampleComponent.vue?vue&type=template&id=299e239e&");
/* harmony import */ var _ExampleComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./ExampleComponent.vue?vue&type=script&lang=js& */ "./resources/js/components/ExampleComponent.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _ExampleComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _ExampleComponent_vue_vue_type_template_id_299e239e___WEBPACK_IMPORTED_MODULE_0__["render"],
  _ExampleComponent_vue_vue_type_template_id_299e239e___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/ExampleComponent.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/ExampleComponent.vue?vue&type=script&lang=js&":
/*!*******************************************************************************!*\
  !*** ./resources/js/components/ExampleComponent.vue?vue&type=script&lang=js& ***!
  \*******************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ExampleComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib??ref--4-0!../../../node_modules/vue-loader/lib??vue-loader-options!./ExampleComponent.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/ExampleComponent.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ExampleComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/ExampleComponent.vue?vue&type=template&id=299e239e&":
/*!*************************************************************************************!*\
  !*** ./resources/js/components/ExampleComponent.vue?vue&type=template&id=299e239e& ***!
  \*************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ExampleComponent_vue_vue_type_template_id_299e239e___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib??vue-loader-options!./ExampleComponent.vue?vue&type=template&id=299e239e& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/ExampleComponent.vue?vue&type=template&id=299e239e&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ExampleComponent_vue_vue_type_template_id_299e239e___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ExampleComponent_vue_vue_type_template_id_299e239e___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/js/components/Piechart.vue":
/*!**********************************************!*\
  !*** ./resources/js/components/Piechart.vue ***!
  \**********************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Piechart_vue_vue_type_template_id_48ef1a3d_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Piechart.vue?vue&type=template&id=48ef1a3d&scoped=true& */ "./resources/js/components/Piechart.vue?vue&type=template&id=48ef1a3d&scoped=true&");
/* harmony import */ var _Piechart_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Piechart.vue?vue&type=script&lang=js& */ "./resources/js/components/Piechart.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _Piechart_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Piechart_vue_vue_type_template_id_48ef1a3d_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Piechart_vue_vue_type_template_id_48ef1a3d_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  "48ef1a3d",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/Piechart.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/Piechart.vue?vue&type=script&lang=js&":
/*!***********************************************************************!*\
  !*** ./resources/js/components/Piechart.vue?vue&type=script&lang=js& ***!
  \***********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Piechart_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib??ref--4-0!../../../node_modules/vue-loader/lib??vue-loader-options!./Piechart.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Piechart.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Piechart_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/Piechart.vue?vue&type=template&id=48ef1a3d&scoped=true&":
/*!*****************************************************************************************!*\
  !*** ./resources/js/components/Piechart.vue?vue&type=template&id=48ef1a3d&scoped=true& ***!
  \*****************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Piechart_vue_vue_type_template_id_48ef1a3d_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib??vue-loader-options!./Piechart.vue?vue&type=template&id=48ef1a3d&scoped=true& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Piechart.vue?vue&type=template&id=48ef1a3d&scoped=true&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Piechart_vue_vue_type_template_id_48ef1a3d_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Piechart_vue_vue_type_template_id_48ef1a3d_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/js/components/progressbar.vue":
/*!*************************************************!*\
  !*** ./resources/js/components/progressbar.vue ***!
  \*************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _progressbar_vue_vue_type_template_id_6de15ecb_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./progressbar.vue?vue&type=template&id=6de15ecb&scoped=true& */ "./resources/js/components/progressbar.vue?vue&type=template&id=6de15ecb&scoped=true&");
/* harmony import */ var _progressbar_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./progressbar.vue?vue&type=script&lang=js& */ "./resources/js/components/progressbar.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _progressbar_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _progressbar_vue_vue_type_template_id_6de15ecb_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"],
  _progressbar_vue_vue_type_template_id_6de15ecb_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  "6de15ecb",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/progressbar.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/progressbar.vue?vue&type=script&lang=js&":
/*!**************************************************************************!*\
  !*** ./resources/js/components/progressbar.vue?vue&type=script&lang=js& ***!
  \**************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_progressbar_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib??ref--4-0!../../../node_modules/vue-loader/lib??vue-loader-options!./progressbar.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/progressbar.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_progressbar_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/progressbar.vue?vue&type=template&id=6de15ecb&scoped=true&":
/*!********************************************************************************************!*\
  !*** ./resources/js/components/progressbar.vue?vue&type=template&id=6de15ecb&scoped=true& ***!
  \********************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_progressbar_vue_vue_type_template_id_6de15ecb_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib??vue-loader-options!./progressbar.vue?vue&type=template&id=6de15ecb&scoped=true& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/progressbar.vue?vue&type=template&id=6de15ecb&scoped=true&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_progressbar_vue_vue_type_template_id_6de15ecb_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_progressbar_vue_vue_type_template_id_6de15ecb_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });

=======
/***/ (function(module, exports) {
>>>>>>> a166003715777abf133f727aeb517fe69ee9eb5b

throw new Error("Module build failed (from ./node_modules/babel-loader/lib/index.js):\nSyntaxError: C:\\xampp\\htdocs\\3_12_2020\\resources\\js\\app.js: Unexpected token (145:0)\n\n\u001b[0m \u001b[90m 143 | \u001b[39m            \u001b[90m//     $('.dz-preview:first').hide();\u001b[39m\u001b[0m\n\u001b[0m \u001b[90m 144 | \u001b[39m\u001b[0m\n\u001b[0m\u001b[31m\u001b[1m>\u001b[22m\u001b[39m\u001b[90m 145 | \u001b[39m\u001b[33m<<\u001b[39m\u001b[33m<<\u001b[39m\u001b[33m<<\u001b[39m\u001b[33m<\u001b[39m \u001b[33mHEAD\u001b[39m\u001b[0m\n\u001b[0m \u001b[90m     | \u001b[39m\u001b[31m\u001b[1m^\u001b[22m\u001b[39m\u001b[0m\n\u001b[0m \u001b[90m 146 | \u001b[39m            }\u001b[0m\n\u001b[0m \u001b[90m 147 | \u001b[39m            console\u001b[33m.\u001b[39mlog(myDropZone\u001b[33m.\u001b[39mfile\u001b[33m.\u001b[39mlength)\u001b[33m;\u001b[39m\u001b[0m\n\u001b[0m \u001b[90m 148 | \u001b[39m\u001b[33m===\u001b[39m\u001b[33m===\u001b[39m\u001b[33m=\u001b[39m\u001b[0m\n    at Parser.raise (C:\\xampp\\htdocs\\3_12_2020\\node_modules\\@babel\\parser\\lib\\index.js:7012:17)\n    at Parser.unexpected (C:\\xampp\\htdocs\\3_12_2020\\node_modules\\@babel\\parser\\lib\\index.js:8405:16)\n    at Parser.parseExprAtom (C:\\xampp\\htdocs\\3_12_2020\\node_modules\\@babel\\parser\\lib\\index.js:9661:20)\n    at Parser.parseExprSubscripts (C:\\xampp\\htdocs\\3_12_2020\\node_modules\\@babel\\parser\\lib\\index.js:9237:23)\n    at Parser.parseMaybeUnary (C:\\xampp\\htdocs\\3_12_2020\\node_modules\\@babel\\parser\\lib\\index.js:9217:21)\n    at Parser.parseExprOps (C:\\xampp\\htdocs\\3_12_2020\\node_modules\\@babel\\parser\\lib\\index.js:9083:23)\n    at Parser.parseMaybeConditional (C:\\xampp\\htdocs\\3_12_2020\\node_modules\\@babel\\parser\\lib\\index.js:9056:23)\n    at Parser.parseMaybeAssign (C:\\xampp\\htdocs\\3_12_2020\\node_modules\\@babel\\parser\\lib\\index.js:9015:21)\n    at Parser.parseExpression (C:\\xampp\\htdocs\\3_12_2020\\node_modules\\@babel\\parser\\lib\\index.js:8965:23)\n    at Parser.parseStatementContent (C:\\xampp\\htdocs\\3_12_2020\\node_modules\\@babel\\parser\\lib\\index.js:10819:23)\n    at Parser.parseStatement (C:\\xampp\\htdocs\\3_12_2020\\node_modules\\@babel\\parser\\lib\\index.js:10690:17)\n    at Parser.parseBlockOrModuleBlockBody (C:\\xampp\\htdocs\\3_12_2020\\node_modules\\@babel\\parser\\lib\\index.js:11266:25)\n    at Parser.parseBlockBody (C:\\xampp\\htdocs\\3_12_2020\\node_modules\\@babel\\parser\\lib\\index.js:11253:10)\n    at Parser.parseBlock (C:\\xampp\\htdocs\\3_12_2020\\node_modules\\@babel\\parser\\lib\\index.js:11237:10)\n    at Parser.parseFunctionBody (C:\\xampp\\htdocs\\3_12_2020\\node_modules\\@babel\\parser\\lib\\index.js:10256:24)\n    at Parser.parseFunctionBodyAndFinish (C:\\xampp\\htdocs\\3_12_2020\\node_modules\\@babel\\parser\\lib\\index.js:10226:10)\n    at withTopicForbiddingContext (C:\\xampp\\htdocs\\3_12_2020\\node_modules\\@babel\\parser\\lib\\index.js:11398:12)\n    at Parser.withTopicForbiddingContext (C:\\xampp\\htdocs\\3_12_2020\\node_modules\\@babel\\parser\\lib\\index.js:10565:14)\n    at Parser.parseFunction (C:\\xampp\\htdocs\\3_12_2020\\node_modules\\@babel\\parser\\lib\\index.js:11397:10)\n    at Parser.parseFunctionExpression (C:\\xampp\\htdocs\\3_12_2020\\node_modules\\@babel\\parser\\lib\\index.js:9697:17)\n    at Parser.parseExprAtom (C:\\xampp\\htdocs\\3_12_2020\\node_modules\\@babel\\parser\\lib\\index.js:9610:21)\n    at Parser.parseExprSubscripts (C:\\xampp\\htdocs\\3_12_2020\\node_modules\\@babel\\parser\\lib\\index.js:9237:23)\n    at Parser.parseMaybeUnary (C:\\xampp\\htdocs\\3_12_2020\\node_modules\\@babel\\parser\\lib\\index.js:9217:21)\n    at Parser.parseExprOps (C:\\xampp\\htdocs\\3_12_2020\\node_modules\\@babel\\parser\\lib\\index.js:9083:23)\n    at Parser.parseMaybeConditional (C:\\xampp\\htdocs\\3_12_2020\\node_modules\\@babel\\parser\\lib\\index.js:9056:23)\n    at Parser.parseMaybeAssign (C:\\xampp\\htdocs\\3_12_2020\\node_modules\\@babel\\parser\\lib\\index.js:9015:21)\n    at Parser.parseExprListItem (C:\\xampp\\htdocs\\3_12_2020\\node_modules\\@babel\\parser\\lib\\index.js:10331:18)\n    at Parser.parseCallExpressionArguments (C:\\xampp\\htdocs\\3_12_2020\\node_modules\\@babel\\parser\\lib\\index.js:9434:22)\n    at Parser.parseSubscript (C:\\xampp\\htdocs\\3_12_2020\\node_modules\\@babel\\parser\\lib\\index.js:9342:29)\n    at Parser.parseSubscripts (C:\\xampp\\htdocs\\3_12_2020\\node_modules\\@babel\\parser\\lib\\index.js:9258:19)\n    at Parser.parseExprSubscripts (C:\\xampp\\htdocs\\3_12_2020\\node_modules\\@babel\\parser\\lib\\index.js:9247:17)\n    at Parser.parseMaybeUnary (C:\\xampp\\htdocs\\3_12_2020\\node_modules\\@babel\\parser\\lib\\index.js:9217:21)\n    at Parser.parseExprOps (C:\\xampp\\htdocs\\3_12_2020\\node_modules\\@babel\\parser\\lib\\index.js:9083:23)\n    at Parser.parseMaybeConditional (C:\\xampp\\htdocs\\3_12_2020\\node_modules\\@babel\\parser\\lib\\index.js:9056:23)\n    at Parser.parseMaybeAssign (C:\\xampp\\htdocs\\3_12_2020\\node_modules\\@babel\\parser\\lib\\index.js:9015:21)\n    at Parser.parseExpression (C:\\xampp\\htdocs\\3_12_2020\\node_modules\\@babel\\parser\\lib\\index.js:8965:23)");

/***/ }),

/***/ "./resources/sass/app.scss":
/*!*********************************!*\
  !*** ./resources/sass/app.scss ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!*************************************************************!*\
  !*** multi ./resources/js/app.js ./resources/sass/app.scss ***!
  \*************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! C:\xampp\htdocs\EMS_V2_10\resources\js\app.js */"./resources/js/app.js");
module.exports = __webpack_require__(/*! C:\xampp\htdocs\EMS_V2_10\resources\sass\app.scss */"./resources/sass/app.scss");


/***/ })

/******/ });