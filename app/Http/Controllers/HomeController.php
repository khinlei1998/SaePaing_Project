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
            ['name'=>'Employee','count'=>$emp_count,'icon'=>'fa fa-user','link'=>'employee'],
            ['name'=>'Group','count'=>$group_count,'icon'=>'fa fa-users','link'=>'group'],
            ['name'=>'team','count'=>$team_count,'icon'=>'fa fa-chalkboard-teacher','link'=>'team'],
            ['name'=>'Department','count'=>$department_count,'icon'=>'fa fa-building','link'=>'department'],
            ['name'=>'Organization Chart','count'=>'0','icon'=>'fa fa-network-wired','link'=>'orgchart'],
            );
        return view('home',compact(['data']));
    }
    public function orgchart()
    {
        return view('orgchart.index-main');
    }

    public function OC_group($id)
    {

        $oc_group = $id ;

        switch ($oc_group) {
            case "1":
            return view('orgchart.index-group1');
                break;
            case "2":
            return view('orgchart.index-group2');
                break;
            case "3":
            return view('orgchart.index-group3');
                break;
            case "4":
            return view('orgchart.index-group4');
                break;
            case "5":
            return view('orgchart.index-group5');
                break;
            default:
                echo "The Group is not Defined";
        }
 
    }
}
