<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $primaryKey = 'emp_id';
    protected $casts = [
        'emp_id' => 'string',
    ];
    protected $fillable = ['emp_name','emp_id','emp_jobdesp','emp_position','group_id','dept_id','subdept_id','team_id'];
    public function user(){
        return $this->hasOne(User::class,'emp_id');
    }
    public function group(){
        return $this->belongsTo(Group::class,'group_id');
    }
    public function department(){
        return $this->belongsTo(Department::class,'dept_id');
    }
    public function subDepartment(){
        return $this->belongsTo(SubDepartment::class,'subdept_id');
    }
    public function team(){
        return $this->belongsTo(Team::class,'team_id');
    }
    public function assignOtherTasks(){
        return $this->hasMany(Task::class,'assignor_person');
    }
    public function assignedTasks(){
        return $this->hasMany(Task::class,'assignee_person');
    }
    public function shareToOtherTasks(){
        return $this->hasMany(ShareInformation::class,'share_by');
    }
    public function sharedTasks(){
        return $this->hasMany(ShareInformation::class,'share_to');
    }
    public function missions(){
        return $this->hasMany(Mission::class,'emp_id');
    }
    public function getAllGroupsAttribute(){
        return Group::select('group_id','group_name')->get();
     }
    public function getAllRolesAttribute(){
        return Role::where('role', '!=', 'Chairman')->select('role')->get();
     }
     public function cbplist(){
        return $this->hasMany(ProjectConfig::class,'assign_person');
    }
    public function hodpersons(){
        return $this->belongsTo(HodReport::class,'hod_person');
    }
   
}
