<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Storage;

Auth::routes();

Route::redirect('/', '/login');

Route::group(['middleware' => ['auth']], function () {

Route::get('/home', 'HomeController@index')->name('home');


Route::post('/saveimagetoserver', function(\Illuminate\Http\Request $request){
        $u=Storage::disk('public')->put('test.jpg',base64_decode($request->imageData));
        return response()->json(['success'=>$u]);
    });

    Route::get('/getnoti','EmployeeController@getnoti');


    Route::get('td',function(){
       $fe=\App\Histories::get();
       foreach($fe as $f){
           echo $f->human_date;
       }
    });







    Route::resource('/task', 'TaskController')->except(['destroy']);
    Route::resource('/group', 'GroupController')->except(['destroy']);
   
    Route::resource('/employee', 'EmployeeController')->except(['destroy']);
    Route::resource('/mission', 'MissionController')->except(['destroy']);
    Route::get('/profile','EmployeeController@profile');
    Route::resource('/team', 'TeamController');
    Route::resource('/department', 'DepartmentController');
    Route::get('/showproject', 'ProjectController@showproject')->name('showproject');

    Route::get('/showdetailproject', 'ProjectController@showdetailproject')->name('showdetailproject');

    Route::resource('/cbplist', 'CbpListController');
    Route::resource('/project', 'ProjectController');
    //@return json
    //this will return the accessable department of each user
    //used in task/create call from app.js
    Route::get('/getAccessableDepartments','EmployeeController@AccessableDepartments')->name('getAccessableDepartments');

    Route::post('/getAssignablePersons','EmployeeController@AssignablePersons')->name('getAssignablePersons');
    Route::post('/tosaveprofileimage','EmployeeController@upload_profile')->name('tosaveimg');
    Route::get('/tosaveprofileimage',function(){
        return redirect('profile');
    })->name('tosaveimg');
    Route::post('/getDepartment','TeamController@getdepartment')->name('getDepartment');
    Route::post('/getSubDepartment','TeamController@getSubDepartment')->name('getSubDepartment');

    //use in Employee
    Route::post('/getEmpDepartment','EmployeeController@getempdepartment')->name('getEmpDepartment');
    Route::post('/getEmpSubDepartment','EmployeeController@getempsubdepartment')->name('getEmpSubDepartment');
    Route::post('/getEmpTeam','EmployeeController@getempteam')->name('getEmpTeam');
  
    
    //removeimage
    Route::post('/removeimage','TaskController@removeImage')->name('removeimage');
      // Mission remove image
      Route::post('/removeMissionImage','MissionController@removeImage')->name('removeMissionImage');
    //cbpsub task
    Route::resource('/cbp_subtask', 'CBPSubtaskController');
    // cbp_config
    Route::resource('/cbp_config', 'ProjectConfigController');

    // Project Detail
    Route::get('project_detail/{id}', 'ProjectController@detail')->name('project_detail');

    Route::get('/cbp', 'CbpSubtaskController@cbp');
    Route::post('/remark', 'TaskController@remark')->name('remark');
    Route::post('/mission_start', 'MissionController@mission_start')->name('mission_start');

    
    Route::post('/reportTask','TaskController@reportTask')->name('reportTask');
    //routes for cbp config return cbp subtasks
    Route::post('/getCbpList','CbpSubtaskController@getCbpList');
    Route::post('/addSubCbp','CbpSubtaskController@addSubCbp');
    Route::post('/addSubCbpProject','ProjectConfigController@addSubCbpProject');

    Route::post('/getSubCbps','ProjectConfigController@getSubCbps');

    //assign cbp_sub_task to hot
    Route::post('/assignToHot','CbpSubtaskController@assignToHot');
    //Hod reprot back to chairman cbpList
    Route::post('/reportHot','CbpSubtaskController@reportHot');
    //return chairman report data by config id
    Route::post('/getChairmanReportByConfigId','CbpSubtaskController@chairmanReport');
    
    //assign cbp_sub_task to hot
    Route::post('/assignToHot','CbpSubtaskController@assignToHot');
    //Hod reprot back to chairman cbpList
    Route::post('/reportHot','CbpSubtaskController@reportHot');
     //Hot report for their cbpsubtask
    Route::post('/hot_report_for_cbpsubtask','CbpSubtaskController@hot_report_for_cbpsubtask');

    Route::get('/orgchart', 'HomeController@orgchart');
    Route::get('/pet', function(){
        return view('pet');
    });


    Route::get('OC_group/{id}', 'HomeController@OC_group')->name('OC_group');

});

