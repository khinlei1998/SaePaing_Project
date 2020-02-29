<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Group;
use App\Department;
use App\Team;
use App\Http\Requests\TeamRequest;


class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = team::paginate(6);
        return view('team.index',compact(['teams']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $this->authorize('create',Team::class);
        $team = new Team();
        return view("team.create",compact('team'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $team=Team::create($request->all());
       return redirect()->route("team.show",$team->team_id)->with('success',"team Created");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $team = Team::find($id);
        return view("team.detail",compact('team'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        $this->authorize('update',$team);
        return view('team.edit',compact('team'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TeamRequest $teamRequest,Team $team)
    {
        $team->update($teamRequest->all());
        return redirect('/team')->with("success","team updated successfully.");
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
    public function getdepartment(Request $request)
    {
        $group = Group::find($request->group);
        return response()->json($group->department);
    }

    public function getsubdepartment(Request $request)
    {
        $department= Department::find($request->department);
        return response()->json($department->subdepartment);
    }
}
