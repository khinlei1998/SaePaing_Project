<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Task;
use App\Remark;
use App\Project;
use App\Histories;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\TaskRequest;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     */


    public $historyhelper;


    public function __construct()
    {
        $this->historyhelper = new HistoriesHelper();
    }

    public function index()
    {
        $employee = Auth::user()->employee;
        $alltasks = $employee->assignOtherTasks()->paginate(6);
        $assigntasks = $employee->assignOtherTasks()->where('status', '0')->count();
        $starttasks = $employee->assignOtherTasks()->where('status', '1')->count();
        $reporttasks = $employee->assignOtherTasks()->where('status', '2')->count();
        $completetasks = $employee->assignOtherTasks()->where('status', '3')->count();
        $rejecttasks = $employee->assignOtherTasks()->where('status', '4')->count();
        if (session('success_message')) {
            Alert::success('Success!', session('success_message'));
        };
        return view('task.index', compact(['alltasks', 'assigntasks', 'starttasks', 'reporttasks', 'completetasks', 'rejecttasks']));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function create()
    {
        $this->authorize('create', Task::class);
        $task = new Task();
        return view("task.create", compact('task'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $filenames = "";

        $assignee_persons = explode(',', $request->assignee_person);

        $files = $request->file('task_file');//file array
        // dd($files);


        array_shift($files);//remove first array item

        foreach ($files as $key => $file) {

            if (next($files) == true)
                $filenames .= $this->taskImageUpload($file) . ":";
            else
                $filenames .= $this->taskImageUpload($file);
        }


        $data = array();
        for ($i = 0; $i < count($assignee_persons); $i++) {
            $data[$i] = array_merge($request->except(['start_time', 'end_time', 'assignee_persons']), ['status' => '0', 'subdept_id' => Employee::find($assignee_persons[$i])->subdept_id ? Employee::find($assignee_persons[$i])->subdept_id : null, 'team_id' => Employee::find($assignee_persons[$i])->team_id ?? null, 'assignor_attach_file' => $filenames, 'start_time' => Carbon::create($request->start_time)->toDateTimeString(), 'end_time' => Carbon::create($request->end_time)->toDateTimeString(), 'assignee_person' => $assignee_persons[$i]]);
            //            var_dump($data[$i]);
        };
        $createdTasks = $request->user()->employee->assignOtherTasks()->createMany($data);

        $createdtasks_id = $createdTasks[0]->task_id;
        if ($createdTasks) {
            $task_unique_id = 't-' . $createdTasks[0]->task_id;

            foreach ($createdTasks as $createdTask) {
                $createdTask->task_unique_id = $task_unique_id;
                $createdTask->save();
            };


            //  return response()->json([
            //     'success'=>"true"
            // ]);


             //            for notification
        //  $created = Histories::create(['sender_id' =>Auth::user()->id,'project_id'=>'','cbp_id'=>'','read_this'=>0,'receiver_id' => $request->assignee_person, 'description' =>$request->description, 'link_name'=>'current_link','created_at' => $request->start_time , 'updated_at' =>  $request->end_time]); 
  $this->historyhelper->setnoti(Auth::user()->id,$request->assignee_person,'','',$request->description,'task',false);


            //            for notification


            return response()->json($createdtasks_id);

        } else
            return response()->json([
                'success' => "false"
            ]);


    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Task::find($id);
        return view("task.detail", compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        $tasks = Task::where('task_unique_id', $task->task_unique_id)->select('assignee_person')->get();
        $assignee_persons = "";
        $this->authorize('update', $task);
        foreach ($tasks as $onetask) {
            $assignee_persons .= $onetask . ',';
        }

        $assignee_persons = substr($assignee_persons, 0, strlen($assignee_persons) - 2);
        return view('task.edit', compact('assignee_persons', 'task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $task)
    {
        $tasks = Task::where('task_unique_id', Task::find($task)->task_unique_id)->select('assignee_person')->get();

        $assignee_persons = "";
        foreach ($tasks as $onetask) {
            $assignee_persons .= $onetask->assignee_person . ',';
        }
        // dd( $assignee_persons);
        //original emp string
        //$string = "abcdefg";
        //$stringlength = strlen($string);//7
        //$string[$stringlength-1]=g
        //$string=substr(0,$stringlength-2);abcdef,
        $old_assignee_persons_string = substr($assignee_persons, 0, strlen($assignee_persons) - 1);
        //  dd($old_assignee_persons_string);
        //original emp array
        $old_assignee_persons_array = explode(",", $old_assignee_persons_string);
        // dd( $old_assignee_persons_array );
        //new emp string
        $new_assignee_persons_string = $request->assignee_person;
        //new emp array
        $new_assignee_persons_array = explode(",", $new_assignee_persons_string);

        //you have to create new rows
        $not_in_origin = array_values(array_diff($new_assignee_persons_array, $old_assignee_persons_array));

        // you hvve to delete this roles ( Task::where('task_unique_id',$task->task_unique_id)->where('assignee_person',$not_in_new[$i])->delete();)
        $not_in_news = array_values(array_diff($old_assignee_persons_array, $new_assignee_persons_array));
        //    dd($not_in_news);
        // delete row
        $task = Task::find($task);
        $task_unique_id = $task->task_unique_id;
        if (count($not_in_news) > 0) {
            for ($i = 0; $i < count($not_in_news); $i++) {
                $old_emp = Task::where('task_unique_id', $task->task_unique_id)->where('assignee_person', $not_in_news[$i])->delete();
            }
        }
        $data = array();
        $team_id = Employee::find($request->assignee_person)->team->team_id ?? null;
        $subdept_id = Employee::find($request->assignee_person)->subDepartment->subdept_id ?? null;
        $filenames = "";
        $files = $request->file('task_file');
        array_shift($files);
        foreach ($files as $file) {
            if (next($files) == true)
                $filenames .= $this->taskImageUpload($file) . ":";
            else
                $filenames .= $this->taskImageUpload($file);
        }


        $originfiles = $task->assignor_attach_file;
        if ($originfiles) {
            $filenames = $filenames ? $originfiles . ":" . $filenames : $originfiles;
        } else {
            $filenames = $filenames ? $originfiles . $filenames : $originfiles;
        }


        if (count($not_in_origin) > 0) {
            for ($i = 0; $i < count($not_in_origin); $i++) {
                $data[$i] = array_merge($request->except(['start_time', 'end_time', 'assignee_persons']), ['status' => '0', 'subdept_id' => $subdept_id, 'team_id' => $team_id, 'assignor_attach_file' => $filenames, 'start_time' => Carbon::create($request->start_time)->toDateTimeString(), 'end_time' => Carbon::create($request->end_time)->toDateTimeString(), 'assignee_person' => $not_in_origin[$i], 'task_unique_id' => $task_unique_id]);
            }
        }
        $createdTasks = $request->user()->employee->assignOtherTasks()->createMany($data);

        $tasks = Task::where('task_unique_id', $task_unique_id)->get();

        foreach ($tasks as $task_to_update) {
            $team_id = Employee::find($task_to_update->assignee_person)->team->team_id ?? null;
            $subdept_id = Employee::find($task_to_update->assignee_person)->subDepartment->subdept_id ?? null;

            $task_to_update->task_title = $request->task_title;
            $task_to_update->description = $request->description;
            $task_to_update->assignor_attach_file = $filenames;
            $task_to_update->start_time = Carbon::create($request->start_time)->toDateTimeString();
            $task_to_update->end_time = Carbon::create($request->end_time)->toDateTimeString();
            $task_to_update->dept_id = $request->dept_id;
            $task_to_update->subdept_id = $subdept_id;
            $task_to_update->team_id = $team_id;
            $task_to_update->save();
        }
        $createdtasks_id = $task_to_update->task_id;

        // return response()->json([
        //     'success'=>"Task Update successfull."
        // ]);

        return response()->json($createdtasks_id);


    }

    public function updateStatus(Task $task)
    {
        $update_task = Task::find($task->task_id);
        if ($update_task->update($task)) {
            return response()->json([
                'success' => 'true'
            ]);
        } else {
            return response()->json([
                'success' => 'false'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function approveTask(Request $request)
    {
        return "Task Approved";
    }

    public function reportTask(Request $request)
    {


        $filenames = "";

        $files = $request->file('reportfile');//file array
        array_shift($files);//remove first array item
        foreach ($files as $key => $file) {
            if (next($files) == true)
                $filenames .= $this->reportImageUpload($file) . ":";
            else
                $filenames .= $this->reportImageUpload($file);
        }

        $tasks = Task::find($request->task_id);
        $tasks->assignee_attach_file = $filenames;
        $tasks->feedback = $request->feedback;
        $tasks->status = 2;
        $tasks->save();


    }

    public function reportImageUpload($file)
    {
        $path = $file->store('tasks/report', 'public');
        return $path;
    }

    //for task image uploading return type tasks/filename.extension
    public function taskImageUpload($file)
    {

        $path = $file->store('tasks', 'public');
        return $path;
    }

    public function removeImage(Request $request)
    {
        $task = Task::find($request->task_id);

        if (strpos($task->assignor_attach_file, ":" . $request->src) !== false) {
            $task->assignor_attach_file = str_replace(":" . $request->src, "", $task->assignor_attach_file);

        } elseif (strpos($task->assignor_attach_file, $request->src . ":") !== false) {
            $task->assignor_attach_file = str_replace($request->src . ":", "", $task->assignor_attach_file);

        } else {
            $task->assignor_attach_file = str_replace($request->src, "", $task->assignor_attach_file);
        }

        // $task->assignor_attach_file = str_replace($request->src.":","",$task->assignor_attach_file);


        if ($task->save()) {

            Storage::disk('public')->delete($request->src);
            return response()->json([
                'success' => "true"
            ]);
        } else {
            return response()->json([
                'success' => "false"
            ]);
        }
    }

    public function remark(Request $request)
    {

        //  dd($request->input("status"));

        if ($request->remark_description) {
            $remark = new Remark;
            $remark->remark_description = $request->remark_description;
            $remark->task_id = $request->task_id;
            $remark->save();

        }
        $id = $request->task_id;
        //  dd( $task_id);
        $tasks = Task::find($request->task_id);
        if ($request->input("status") == "start") {
            $tasks->status = 1;
        } elseif ($request->input("status") == "approve") {
            $tasks->status = 3;
        } else {
            $tasks->status = 4;
        }

        $tasks->save();
        return redirect()->action('TaskController@show', $id);


    }
}
