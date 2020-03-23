<?php

namespace App\Http\Controllers;
use App\CBPSubtask;
use App\AssignToHot;
use Illuminate\Http\Request;
use App\CbpList;
use Auth;
use DB;
use App\HodReport;
use App\HotReport;
use App\Histories;
use App\ProjectConfig;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;

class CbpSubtaskController extends Controller
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
        //
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
        
        $request->validate([
            'cbp_subtask' => 'required',
            'cbp_id' => 'required',
        ]);

        CBPSubtask::create($request->all());
        
        return redirect()->route('project.show',$request->p_id)->with('success','Greate! CBP Subtask created successfully.');
    }

    

    /**
     * Display the specified resource.
     *
     * @param  \App\CBPSubtask  $cBPSubtask
     * @return \Illuminate\Http\Response
     */
    public function show(CBPSubtask $cBPSubtask)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CBPSubtask  $cBPSubtask
     * @return \Illuminate\Http\Response
     */
    public function edit(CBPSubtask $cBPSubtask)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CBPSubtask  $cBPSubtask
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CBPSubtask $cBPSubtask)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CBPSubtask  $cBPSubtask
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
       
    }

    public function cbp(Request $request)
    {
        $request->validate([
            'cbp_subtask' => 'required',
            'cbp_id' => 'required',
        ]);

        CBPSubtask::create($request->all());
        
        return redirect()->route('cbplist.index')->with('success','Greate! CBP Subtask created successfully.');
    }

    public function getCbpList(Request $request){
        $cbpList = CbpList::find($request->id);
      
        return response()->json($cbpList->cbpsubtasks);
    }
    public function addSubCbp(Request $request){
        if($cbpsubtask=CBPSubtask::create(['cbp_subtask'=>$request->subcbp,'cbp_id'=>$request->cbpid]))
        //ProjectConfig::create(['cbp_id'=>$request->cbpid, 'cbp_subtask'=>$cbpsubtask->id, 'status'=>0,'project_id'=>$cbpsubtask->id,'assign_person'=>$cbpsubtask->hod,'d_line'=>$request->dline,'report'=>""]);
            return response()->json(["success"=>true,"id"=>$cbpsubtask->id]);
        else
            return response()->json(["success"=>false]);
    }
    public function assignToHot(Request $request){
     
        $project_config = ProjectConfig::find($request->config_id);
        if (AssignToHot::create(['cbp_id'=>$project_config->cbp_id,'deadline'=>$request->deadline,'cbp_subtask_id'=>$request->cbp_subtask_id,'project_id'=>$project_config->project_id,'hot_id'=>$request->hot_id,'status'=>"0"])){
            $get_subtask_name=CbpSubtask::where('id',$request->cbp_subtask_id)->first();
            //FOR SET NOTI
            $this->historyhelper->setnoti(Auth::user()->id,$request->hot_id,$project_config->cbp_id,$project_config->project_id,$get_subtask_name->cbp_subtask,'profile',false);
            //FOR SET NOTI

            return response()->json([
                'success'=>true
            ]);
           
        }
        return response()->json([
            'success'=>false,
            'message'=>"Creation fail"
        ]);
    }
    

    public function reportHot(Request $request){
        // dd($request);
        //get all data from project config
        $all_pconfig=HodReport::find($request->config_id);
        $per=$request->per;
        $hod_id=Auth::user()->emp_id;
        $report_desc=$request->report_text;
        $status=0;
        $feedback='';
        $report_attached_file='';
        $projConfig_id=$request->config_id;

       
      

        $created = Histories::create(['sender_id' =>$hod_id,'project_id'=>'','cbp_id'=>$request->main_cbp_id,'read_this'=>0,'receiver_id' => $request->receiver_id, 'description' =>$request->report_text, 'link_name'=>'current_link','created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);

        
       
        //start create
        $result_from_create=HodReport::create(['hod_person'=>$hod_id,'status'=>$status,'percentage'=>$per,'feedback'=>$feedback,'report_desc'=>$report_desc,'report_attached_file  '=>$report_attached_file,'projConfig_id'=>$projConfig_id]);

        if(!$result_from_create){
            $success='error';
            $message="Creation fail";        
        }else{
            $success='success';
            $message="success";
           
        }
        return response()->json([
            'success'=>$success,
            'message'=>$message
        ]);
       
    }
    public function chairmanReport(Request $request){
        $project_config = ProjectConfig::find($request->config_id);
        $cbp_list = $project_config->CBPlist;
        $project_reports = $project_config->hodReport()->with('hodperson')->orderBy('id', 'desc')->get();
        HodReport::where('projConfig_id',$request->config_id)->update(['status'=>'1']);
        return response()->json(["report_list"=>$project_reports,"cbp_list"=>$cbp_list]);
    }

    // public function chairmanReport(Request $request){
    //   $report_tasks=DB::table('hod_reports')->where('projConfig_id',$request->config_id)->get();
    //     $project_config = ProjectConfig::find($request->config_id);
    //     $project_reports = $project_config->hodReport()->with('hodperson')->orderBy('id', 'desc')->get();



    //     $cbp_list = $project_config->CBPlist;

    //     HodReport::where('projConfig_id',$request->config_id)->update(['status'=>'1']);
    //     return response()->json(["report_list"=>$report_tasks->toArray(),"cbp_list"=>$cbp_list]);


    // }

    public function hot_report_for_cbpsubtask(Request $request){
       
        $getassigntb_id=$request->cbp_id;
        $create=HotReport::create(['hot_person'=>$request->hot_person_id,'status'=>0,'hot_feedback'=>'','hot_report_desc'=>$request->report_text,'hot_report_attached_file','assigntb_id'=>$request->cbp_id]);
        // $create=Histories::create(['hot_person'=>$request->hot_person_id,'status'=>0,'hot_feedback'=>'','hot_report_desc'=>$request->report_text,'hot_report_attached_file','assigntb_id'=>$request->cbp_id]);
        // $this->historyhelper->setnoti(Auth::user()->id,$request->hod,$request->cbpid,$request->pid,$get_title->cbp_name,'profile',false);
        // $created = Histories::create(['sender_id' =>auth()->user()->id,'project_id'=>'','cbp_id'=>$request->cbp_id,'read_this'=>0,'receiver_id' => $request->hod_id, 'description' =>$request->report_text, 'link_name'=>'current_link']); 
              $this->historyhelper->setnoti(Auth::user()->id,$request->hod_id,$request->cbp_id,'',$request->report_text,'current_link',false);

        if(!$create){
            $success='error';
            $message="Creation fail";  
              }else{
            $success='success';
            $message="success";
           
        }
        return response()->json([
            'success'=>$success,
            'message'=>$message
        ]);    }
}
