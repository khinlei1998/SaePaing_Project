<?php
namespace App\Http\Controllers;
use App\Mission;
use App\Role;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
class MissionController extends Controller
{
    // public $imagehelper;
    // public function __construct()
    // {
    //     $this->imagehelper = new ImageHelper();
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $missions = Mission::paginate(6);
        return view('mission.index',compact(['missions']));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create',Mission::class);
        $mission = new Mission();
        return view("mission.create",compact('mission'));

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $filenames = "";

        $files = $request->file('mission_file');//file array
      
        
        array_shift($files);//remove first array item

        foreach($files as $key => $file){
            if (next($files)==true)
                $filenames.=$this->missionImageUpload($file).":";
            else
                $filenames.=$this->missionImageUpload($file);
        }
        $missions_id=Mission::create(array_merge($request->except(['jobfinished_date']), ['status' => '0','attach_files'=>$filenames,'jobfinished_date'=>Carbon::create($request->jobfinished_date)->toDateTimeString()]));
        $createdmissions_id=$missions_id->mission_id;
       
      

        return response()->json($createdmissions_id);
    }
    public function missionImageUpload($file){
       
        $path = $file->store('missions', 'public');
        return $path;
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Mission  $mission
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mission = Mission::find($id);
        return view("mission.detail",compact('mission'));

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mission  $mission
     * @return \Illuminate\Http\Response
     */
    public function edit(Mission $mission)
    {
        $this->authorize('update', $mission);
        return view('mission.edit',compact('mission'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mission  $mission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Mission $mission)
    {
        $filenames = "";
        $files = $request->file('mission_file');
        // dd($files);
       
        array_shift($files);
        foreach($files as $key => $file){
            if (next($files)==true)
                $filenames.=$this->missionImageUpload($file).":";
            else
                $filenames.=$this->missionImageUpload($file);
        }
        // dd($filenames);
        $originfiles = $mission->attach_files;
        if ($originfiles) {
            $filenames = $filenames ? $originfiles . ":" . $filenames : $originfiles;
        } else {
            $filenames = $filenames ? $originfiles . $filenames : $originfiles;
        }
        $mission->update(array_merge($request->except(['jobfinished_date']), ['status' => '0','attach_files'=>$filenames,'jobfinished_date'=>Carbon::create($request->jobfinished_date)->toDateTimeString()]));
       $updated_mission=$mission->mission_id;

       return response()->json($updated_mission);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mission  $mission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mission $mission)
    {
    }

    public function mission_start(Request $request)
     
    {
        //   dd($request->input('status'));
          $missions=Mission::find($request->mission_id);   
          $id=$request->mission_id;
          if($request->input('status') == "start"){
          $missions->status = 1;
          }
          else{
               $missions->status = 2;
          }
         
         $missions->save();   
         return redirect()->action('MissionController@show',$id);
        //    return redirect()->action('EmployeeController@profile');
    }
    //for mission image uploading return type missions/filename.extension
    public function removeImage(Request $request)
    {
        //return $this->imagehelper->removeImage($request);
        $mission = Mission::find($request->mission_id);
        // dd($task->assignor_attach_file);
        
        if (strpos($mission->attach_files, ":".$request->src) !== false) {
            $mission->attach_files = str_replace(":".$request->src,"", $mission->attach_files);

        }elseif(strpos( $mission->attach_files,$request->src.":") !== false){
            $mission->attach_files = str_replace($request->src.":","", $mission->attach_files);

        }else{
            $mission->attach_files = str_replace($request->src,"", $mission->attach_files);
        }
        // dd( $mission->attach_files);


       
        // $mission->attach_files = str_replace($request->src.":","",$mission->attach_files);
        // $mission->attach_files= str_replace($request->src,"",$mission->attach_files);
        //  dd( $mission->attach_files);
        if($mission->save()) {
            Storage::disk('public')->delete($request->src);
            return response()->json([
                'success' => "true"
            ]);
        } else{
            return response()->json([
                'success'=>"false"
            ]);
        }
    }
}
