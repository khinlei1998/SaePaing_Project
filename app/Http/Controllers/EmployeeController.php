<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Role;
use App\User;
use App\Group;
use App\Department;
use App\SubDepartment;
use App\Team;
use App\AssignToHot;
use Illuminate\Http\Request;
use App\Http\Requests\EmployeeRequest;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::paginate(6);
        if ($request->ajax()) {

            return view('employee.index',compact(['employees']));

        }
        if(session('success_message')){
            Alert::success('Success!', session('success_message'));
            };
            if(session('update_message')){
                Alert::success('Updated!', session('update_message'));
                };
                
        return view('employee.index',compact(['employees']));
   }

   public function profile(){
    $employee = Auth::user()->employee;
    switch (Auth::user()->role_id) {     
               case Role::where("role","HOD")->first()->id:             
                   $hots = User::where('role_id',Role::where('role','HOT')->first()->id)->get();   
                                return view('employee.hod_profile',compact(['employee','hots']));    
                                        case Role::where("role","HOT")->first()->id:

            $assgined_data_for_HOT=AssignToHot::where('hot_id',Auth::user()->emp_id)->get();      
                      return view('employee.hot_profile',['employee'=>$employee,'assgined_data_for_HOT'=>$assgined_data_for_HOT]);                          
                        case "green":
            echo "Your favorite color is green!";
            break;
        default:
        $employee = Auth::user()->employee;
     return view('employee.profile',compact(['employee']));
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
        $this->authorize('create',Employee::class);
        $employee = new Employee();
        return view("employee.create",compact('employee'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRequest $request)
    {
        Employee::create($request->all());
        return redirect()->route("employee.index")->withSuccessMessage('Employee created sussessfully!!');
   }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::find($id);
        return view("employee.detail",compact('employee'));
     }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        $this->authorize('update',$employee);
        return view('employee.edit',compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeRequest $employeeRequest,Employee $employee)
    {
        $employee->update($employeeRequest->all());
        return redirect('/employee')->withUpdateMessage('Employee updated sussessfully!!');
   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    //return json to
    // 1.app.js department select2
    public function AccessableDepartments(){
        return response()->json(Auth::user()->accessible_departments);
    }
    public function AssignablePersons(Request $request){
        if ($request->dept_id=="")
            return response()->json(Auth::user()->assignable_persons);
        else
            return response()->json($this->getAssignablePersonsByDeptAttribute($request['dept_id']));
    }
    //assignable person with dept
    public function getAssignablePersonsByDeptAttribute($dept){
        return Auth::user()->role->id==Role::where("role","HOD")->first()->id ? $this->hodAssignablePersonsByDept($dept) : $this->higherRoleAssignablePersonsByDept($dept);
    }
    public function hodAssignablePersonsByDept($dept){
        return Employee::find(Auth::user()->emp_id)->department->employee()->where("emp_id","!=",Auth::user()->emp_id)->where('dept_id',$dept)->select('emp_name','emp_id')->get();
    }
    public function higherRoleAssignablePersonsByDept($dept){
        //return User::where('role_id',">",Auth::user()->role->id)->where('dept_id',$dept)->select('name','emp_id')->get();
        return Employee::where('dept_id',$dept)->join('users', 'users.emp_id', '=', 'employees.emp_id')->where('users.role_id',">",Auth::user()->role->id)->select('employees.emp_name','employees.emp_id')->get();
    }


    public function getempdepartment(Request $request)
    {
        $group = Group::find($request->group);
        return response()->json($group->department);
    }

    public function getempsubdepartment(Request $request)
    {
        $department= Department::find($request->department);
       
        return response()->json($department->subdepartment);
    }

    public function getempteam(Request $request)
    {
        $subdept= SubDepartment::find($request->subdepartment);
        return response()->json($subdept->team);
    }

}