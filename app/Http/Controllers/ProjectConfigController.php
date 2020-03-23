<?php

namespace App\Http\Controllers;
use App\AssignToHot;
use App\CbpList;
use App\Project;
use App\CBPSubtask;
use App\ProjectConfig;
use Illuminate\Http\Request;
use DB;
use Redirect;
use Illuminate\Support\Facades\Auth;


class ProjectConfigController extends Controller

{

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */
    public $historyhelper;

    public function __construct()
    {
        $this->historyhelper = new HistoriesHelper();
    }

    public function index()

    {

        $cbpList = CbpList::all(); 

        $hods = DB::table('users')

            ->join('roles', 'users.role_id','=','roles.id')

            ->select('users.*', 'roles.role')

            ->where('roles.role', '=', "HOD")

            ->get();

        return view('cbp_config.index',compact('cbpList','hods'));

    }

    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()

    {

        //

    }

    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */

    public function store(Request $request)

    {
        // dd($request);
        $request->validate([

            // 'cbp_subtask' => 'required',

        ]);
        $p_config =new ProjectConfig();

        $p_config->cbp_id = $request->get('cbp_id');

         $p_config->cbp_subtask = implode(',', $request->cbp_subtask);    

         $p_config->status = "Assigned";

        $p_config->project_id = $request->get('project_id');

        $p_config->assign_person = $request->get('assign_person');

        $p_config->d_line = $request->get('d_line');

        $p_config->save();

        return redirect()->route('project.show',$p_config->project_id)->with('success','Greate! Project configuration created successfully.');

    }

    /**

     * Display the specified resource.

     *

     * @param  \App\ProjectConfig  $projectConfig

     * @return \Illuminate\Http\Response

     */

    public function show($id)

    {

        //

    }

    /**

     * Show the form for editing the specified resource.

     *

     * @param  \App\ProjectConfig  $projectConfig

     * @return \Illuminate\Http\Response

     */

    public function edit(ProjectConfig $projectConfig)

    {

        //

    }

    /**

     * Update the specified resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @param  \App\ProjectConfig  $projectConfig

     * @return \Illuminate\Http\Response

     */

    public function update(Request $request, ProjectConfig $projectConfig)

    {

        //

    }

    /**

     * Remove the specified resource from storage.

     *

     * @param  \App\ProjectConfig  $projectConfig

     * @return \Illuminate\Http\Response

     */

    public function destroy($id)

    {
        $cbp_subtasks = CbpSubtask::findOrFail($id);
        $cbp_subtasks->status="1";
        $cbp_subtasks->update();
        return redirect('/cbplist');
    }

    public function addSubCbpProject(Request $request){
        
        $p_config = new ProjectConfig();

        $p_config->cbp_id = $request->cbpid;
        
        $p_config->cbp_subtask = rtrim($request->ids,",");

        $p_config->status = "Assigned";

        $p_config->project_id = $request->pid;

        $p_config->assign_person = $request->hod;
        $p_config->user_id =auth::user()->id;

        $p_config->d_line = $request->dline;

        $p_config->save();

        //this line is for notification
        $get_title=CbpList::where('cbp_id',$request->cbpid)->first();

        if($this->historyhelper->setnoti(Auth::user()->id,$request->hod,$request->cbpid,$request->pid,$get_title->cbp_name,'profile',false)){
            return response()->json(["success"=>true]);

        }

        //this line is for notification



    }
    public function getSubCbps(Request $request){
        $subcbp = ProjectConfig::where('project_id',$request->pid)->where('cbp_id',$request->cbpid)->first();
        $cbpsubtasks = $subcbp->cbp_subtask;
        $cbpsubtasks = explode(',',$cbpsubtasks);
        $result = array();




        //get all report
        $reports_by_main_task=[];
        $get_cbp_list=DB::table('cbp_lists')->get();
        foreach($get_cbp_list as $gcl){
            $to_check_cbp_id=DB::table('project_configs')->where([['cbp_id','=',$request->cbpid],['project_id','=',$request->pid]]);
            if($to_check_cbp_id->count() > 0){
                $get_hod_repord=DB::table('hod_reports')->where('projConfig_id',$to_check_cbp_id->first()->id);
                if($get_hod_repord->count() > 0){
                    

                }


            }
 
        }
        foreach($get_hod_repord->get() as $ghr){
            array_push($reports_by_main_task,$ghr);
         }
        //end get all report





        foreach ($cbpsubtasks as $cbpsubtask){//11,12,13
            $subtask = CBPSubtask::find($cbpsubtask)->toArray();
            $hot = AssignToHot::where('cbp_id',$subtask['cbp_id'])->where('cbp_subtask_id',$subtask['id'])->where('project_id',$subcbp['project_id'])->select('hot_id','status')->first();
            $newhot=new AssignToHot();
            if ($hot) {
                $newhot->hot_id = $hot->hot->emp_name;
                $newhot->status = $this->getStatus($hot->status);
            }else{
                $newhot->hot_id = "UNSIGNED!";
                $newhot->status = "bg-warning";
            }
            array_push($result,array_merge($subtask,$newhot->toArray()));
        }
        $resultarray = array();
        $cbplist = ProjectConfig::where('cbp_id',$request->cbpid)->where('project_id',$request->pid)->first();
        $check_per=DB::table('hod_reports')->where('projConfig_id',$cbplist->id);


        if($check_per->count() > 0){
            $percent_edited=$check_per->orderBy('id','desc')->first()->percentage;

        }else{
            $percent_edited=[];
        }
        $hod_name = $cbplist->cbpHod->emp_name;
        array_push($resultarray,["emp_name"=>$hod_name,"cbp_name"=>$cbplist->CBPlist->cbp_name,"cbp_count"=>count(explode(',',$cbplist->cbp_subtask)),'percent'=>$percent_edited]);
        return response()->json(['result'=>$result,'cbp_list'=>$resultarray,'all_reports'=>$reports_by_main_task]);

    }
    public function getStatus($status){
        switch($status){
            case '0':return "start";
            case '1':return "assign";
            case '2':return "complete";
        }
    }

}