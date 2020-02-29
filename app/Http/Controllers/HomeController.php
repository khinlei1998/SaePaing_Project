<?php

namespace App\Http\Controllers;

use App\Department;
use App\Employee;
use App\Group;
use App\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $emp_count = Employee::all()->count();
        $group_count = Group::all()->count();
        $team_count = Team::all()->count();
        $department_count = Department::all()->count();
        $data = array(
            ['name'=>'Employee','count'=>$emp_count,'icon'=>'fa fa-user'],
            ['name'=>'Group','count'=>$group_count,'icon'=>'fa fa-users'],
            ['name'=>'team','count'=>$team_count,'icon'=>'fa fa-chalkboard-teacher'],
            ['name'=>'Department','count'=>$department_count,'icon'=>'fa fa-building'],
            ['name'=>'Organization Chart','count'=>'0','icon'=>'fa fa-network-wired'],
            );
        return view('home',compact(['data']));
    }
}
