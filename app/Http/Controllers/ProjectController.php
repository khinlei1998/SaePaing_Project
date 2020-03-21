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
use Illuminate\Support\Facades\Validator;

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
        $messages = ['project_title.min' => 'project tile min 2 char', 'photo4.mimes' => 'Must be photo in Engine photo field', 'photo5.mimes' => 'Must be photo in Inner photo field', 'year' => 'Year must be at least 4'];
        $validator = Validator::make($request->except("_token"), ['project_title' => 'required|min:2|max:5'], $messages);      
        if ($validator->fails()) {         
        return redirect()->back()->withErrors($validator)->withInput();   
//<<<<<<< HEAD
        }else{
             Project::create($request->except('_token'));
             return redirect('project')->withSuccessMessage('Project created sussessfully!!');
        }

//=======
//         }
//        // $validatedData = $request->validated();
//        Project::create($request->except("_token"));
//        return redirect('project')->withSuccessMessage('Project created sussessfully!!');
//>>>>>>> 93942ebad69a234e21604d47c791d1da763e38ed
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
        

        $count_of_under5=0;
        $count_of_over5=0;
        $count_of_completed=0;
        $count_of_zero=0;

        $pid=$id;

        $get_all_project_config=ProjectConfig::where('project_id',1);
        
        

        $get_all_list=CbpList::all();



//        $count_of_zero=$get_all_project_config->count();


        foreach($get_all_project_config->get() as $gapc){

            if(ProjectConfig::where([['project_id','=',$id],['cbp_id','=',$gapc->cbp_id]])->count() != 0){


                if(HodReport::where('projConfig_id',$gapc->id)->count() > 0){
                    if(HodReport::where([['projConfig_id','=',$gapc->id],['percentage','<',50]])->count() > 0){
                        $count_of_under5 +=1;

                    }

                    if(HodReport::where([['projConfig_id','=',$gapc->id],['percentage','=',50]])->count() > 0){
                        $count_of_over5 +=1;

                    }

                    if(HodReport::where([['projConfig_id','=',$gapc->id],['percentage','>',50],['percentage','!=',100]])->count() > 0){
                        $count_of_over5 +=1;

                    }

                    if(HodReport::where([['projConfig_id','=',$gapc->id],['percentage','=',NULL]])->count() > 0){
                        $count_of_zero +=1;

                    }

                    if(HodReport::where([['projConfig_id','=',$gapc->id],['percentage','=',0]])->count() > 0){
                        $count_of_zero +=1;


                    }


                    if(HodReport::where([['projConfig_id','=',$gapc->id],['percentage','=','']])->count() > 0){
                        $count_of_zero +=1;


                    }
                    if(HodReport::where([['projConfig_id','=',$gapc->id],['percentage','=','100']])->count() > 0){
                        $count_of_completed +=1;


                    }


                 
                }
                else{
                    $count_of_zero +=1;


                }

            }




        }


        return view('project.detail', compact(['project','configs','subcbps','per_of_whole_project','pid','count_of_under5','count_of_over5','count_of_completed','count_of_zero']));

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