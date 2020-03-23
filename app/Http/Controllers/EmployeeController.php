<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Histories;
use App\Role;
use App\User;
use App\Group;
use App\Department;
use App\SubDepartment;
use App\Team;
use App\AssignToHot;
use Carbon\Carbon;
use App\CbpList;
use App\CbpSubtask;
use App\ProjectConfig;
use Illuminate\Http\Request;
use App\Http\Requests\EmployeeRequest;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class EmployeeController extends Controller
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

        $employees = Employee::paginate(6);

        // if ($request->ajax()) {
        //     return view('employee.index',compact(['employees']));
        // }

        if (session('success_message')) {
            Alert::success('Success!', session('success_message'));
        };


        if (session('update_message')) {
            Alert::success('Updated!', session('update_message'));
        };


        return view('employee.index', compact(['employees']));

    }

    public function profile()
    {
        $employee = Auth::user()->employee;
        $get_img = Employee::where('emp_id', Auth::user()->emp_id)->first();
        if ($get_img->emp_profile == Null) {
            $img = 'default.jpg';
        } else {
            $img = $get_img->emp_profile;
        }


        switch (Auth::user()->role_id) {
            case Role::where("role", "HOD")->first()->id:

                $hots = User::where('role_id', Role::where('role', 'HOT')->first()->id)->get();

                $assignhot = AssignToHot::select('cbp_subtask_id', 'project_id')->get();
                // for chairmnan
                $chairman_id=User::where('emp_id', '99999999')->first();
               

                //  dd( $assignhot);

                //    $allcbpsubtasks =ProjectConfig::all();
                //    $cbpsubtasks = explode(',',$allcbpsubtasks);
                //    $result = array();

                //    foreach ($allcbpsubtasks as $allcbpsubtask){
                //     $subtask = CBPSubtask::find($allcbpsubtask)->toArray();
                //    $hot = AssignToHot::where('cbp_id',$subtask[0])->where('cbp_subtask_id',$subtask['1'])->where('project_id',$this->project_id)->select('hot_id','status')->first();
                //     // $hot_name=$hot->hot->emp_name;
                //    }
                //    dd( $hot);

                // @foreach($subtasks as $subtasks)
                // @endforeach
                //  $hot = AssignToHot::where('cbp_id',$subtask['cbp_id'])->where('cbp_subtask_id',$subtask['id'])->where('project_id',$this->project_id)->select('hot_id','status')->first();
                // $hot_name=$hot->hot->emp_name;
                return view('employee.hod_profile', compact(['employee', 'hots', 'img', 'assignhot','chairman_id']));
            case Role::where("role", "HOT")->first()->id:


                $assgined_data_for_HOT = AssignToHot::where('hot_id', Auth::user()->emp_id)->get();
                return view('employee.hot_profile', ['employee' => $employee, 'assgined_data_for_HOT' => $assgined_data_for_HOT, 'img' => $img]);
            case "green":
                echo "Your favorite color is green!";
                break;
            default:
                $employee = Auth::user()->employee;
                return view('employee.profile', compact(['employee', 'img']));
        }


        // if(Auth::user()->role_id == Role::where("role","HOD")->first()->id){
        //     $hots = User::where('role_id',Role::where('role','HOT')->first()->id)->get();
        //     return view('employee.hod_profile',compact(['employee','hots']));        // }
    }

    // public function profile(){
    //     $employee = Auth::user()->employee;
    //     return view('employee.profile',compact(['employee']));
    // }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Employee::class);
        $employee = new Employee();
        return view("employee.create", compact('employee'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRequest $request)
    {
        Employee::create($request->all());
        return redirect()->route("employee.index")->withSuccessMessage('Employee created sussessfully!!');
    }


    //image upload for user


    public function upload_profile(Request $request)
    {
        $validator = Validator::make($request->except('_token'), ['profile_img' => 'required|mimetypes:image/jpeg,image/png']);
        if ($validator->fails()) {

        } else {
            $images = Carbon::now()->timestamp . ',' . $request->file('profile_img')->getClientOriginalName();

            $request->file('profile_img')->move(base_path() . '/public/storage/profile/', $images);
            Employee::where('emp_id', Auth::user()->emp_id)->update(['emp_profile' => $images]);


        }
        return redirect('profile');


    }
    public function click_on_noti_btn($user_id){
        return response()->json('afe');
    }

    public function getnoti(){
        $emp_id=Auth::user()->emp_id;
        $get_notifrom_db=Histories::where([['receiver_id','=',$emp_id],['read_this','=',0]]);
        $filterarray=[];
      

        foreach($get_notifrom_db->get() as $gnfdb){
            $gnfdb->description = Str::limit($gnfdb->description, 47);
            array_push($filterarray, $gnfdb);

        }
      
        return response()->json(['data'=>['count'=>$get_notifrom_db->count(),'data'=>$filterarray]]);

    }
      public function readnoti(Request $request){

          $get_notifrom_db=Histories::where('id',$request->noti_id)->update(['read_this'=>true]);
          $get_link=Histories::where('id',$request->noti_id)->first();


          return response()->json($get_link);

      }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::find($id);
        return view("employee.detail", compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        $this->authorize('update', $employee);
        return view('employee.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeRequest $employeeRequest, Employee $employee)

    {

        // dd($employee->request);
        // if($employee->request->emp_position==='D'){
        //    dd($employee->emp_position);
        //     $emp=new Employee();
        //     $emp->emp_id=$employee->emp_id;
        //     $emp->emp_name=$employee->emp_name;
        //     $emp->emp_jobdesc=$employee->emp_jobdesc;
        //     $emp->emp_position=$employee->emp_position;
        //     $emp->emp_profile=$employee->emp_profile;
        //     $emp->group_id=$employee->group_id;
        //     $emp->subdept_id=0;
        //     $emp->dept_id=0;
        //     $emp->team_id=0;
        //     $emp->save();


        // }else{
        //     $employee->update($employeeRequest->all());
        //     return redirect('/employee')->withUpdateMessage('Employee updated sussessfully!!');
        // }


        // dd($employeeRequest);

        if ($employeeRequest->emp_position != "D" || "ED" || "MD") {
            $employee->update($employeeRequest->all());
            $employee->save();
        } else if ($employeeRequest->emp_position != "HOD" || "HOT" || "Staff") {
            $employee = Employee::find($employeeRequest->emp_id);
            $employee->emp_id = $employeeRequest->get('emp_id');
            $employee->emp_name = $employeeRequest->get('emp_name');
            $employee->emp_jobdesp = $employeeRequest->get('emp_jobdesp');
            $employee->emp_position = $employeeRequest->get('emp_position');
            $employee->dept_id = NULL;
            $employee->subdept_id = NULL;
            $employee->team_id = NULL;
            $employee->save();
        }


        // $employee->update($employeeRequest->all());
        return redirect('/employee')->withUpdateMessage('Employee updated sussessfully!!');

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
    //return json to
    // 1.app.js department select2
    public function AccessableDepartments()
    {
        return response()->json(Auth::user()->accessible_departments);
    }

    public function AssignablePersons(Request $request)
    {

        if ($request->dept_id == "")
            return response()->json(Auth::user()->assignable_persons);
        else
            return response()->json($this->getAssignablePersonsByDeptAttribute($request['dept_id']));
    }

    //assignable person with dept
    public function getAssignablePersonsByDeptAttribute($dept)
    {
        return Auth::user()->role->id == Role::where("role", "HOD")->first()->id ? $this->hodAssignablePersonsByDept($dept) : $this->higherRoleAssignablePersonsByDept($dept);
    }

    public function hodAssignablePersonsByDept($dept)
    {
        return Employee::find(Auth::user()->emp_id)->department->employee()->where("emp_id", "!=", Auth::user()->emp_id)->where('dept_id', $dept)->select('emp_name', 'emp_id')->get();
    }

    public function higherRoleAssignablePersonsByDept($dept)
    {
        //return User::where('role_id',">",Auth::user()->role->id)->where('dept_id',$dept)->select('name','emp_id')->get();
        return Employee::where('dept_id', $dept)->join('users', 'users.emp_id', '=', 'employees.emp_id')->where('users.role_id', ">", Auth::user()->role->id)->select('employees.emp_name', 'employees.emp_id')->get();
    }


    public function getempdepartment(Request $request)
    {
        if ($request) {
            $group = Group::find($request->group);
            return response()->json($group->department);
        } else {

        }

    }

    public function getempsubdepartment(Request $request)
    {
        $department = Department::find($request->department);

        return response()->json($department->subdepartment);
    }

    public function getempteam(Request $request)
    {
        $subdept = SubDepartment::find($request->subdepartment);
        return response()->json($subdept->team);
    }

}
