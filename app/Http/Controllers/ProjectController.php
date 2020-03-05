<?php
namespace App\Http\Controllers;

use App\HodReport;
use App\Project;
use App\CbpList;
use DB;
use App\ProjectConfig;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\ProjectFormRequest;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        if(session('success_message')){
        Alert::success('Success!', session('success_message'));
        };

        return view('project.index',compact('projects'));
    }    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('project.create');
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectFormRequest $request)
    {
        $validatedData = $request->validated();
        Project::create($validatedData);
        return redirect('project')->withSuccessMessage('Project created sussessfully!!');
    }    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $cbpList = CbpList::all(); 
        $project = Project::find($id);
        $hods = DB::table('users')
            ->join('roles', 'users.role_id','=','roles.id')
            ->select('users.*', 'roles.role')
            ->where('roles.role', '=', "HOD")
            ->get();



        return view('cbp_config.index',compact('cbpList','hods','project'));
    }    
    public function detail($id)
    {
        $project = Project::find($id);
        
        $configs = $project->project_config;
        
        $subcbps = "";
        $per_of_whole_project=0;
        $get_cbp_all_per=0;
        foreach ($configs as $config){
          
            $subcbps.=$config->cbp_subtask.",";
            if(HodReport::where('projConfig_id',$config->id)->orderBy('id','desc')->count() > 0){
                $get_cbp_all_per += HodReport::where('projConfig_id',$config->id)->orderBy('id','desc')->first()->percentage * 0.04;

            }else{
                $get_cbp_all_per += 0;

            }
        }

        $subcbps = substr_count($subcbps, ',');

        $cal_cbpgetper=$get_cbp_all_per;

        $per_of_whole_project=ceil($cal_cbpgetper);

        return view('project.detail', compact(['project','configs','subcbps','per_of_whole_project']));

    }    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
    }    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        //
    }    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
    }
}