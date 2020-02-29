<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $primaryKey = 'team_id';

    protected $fillable = ['team_name','dept_id','subdept_id','group_id'];
    public function employee(){
        return $this->hasMany(Employee::class,"group_id");
    }
    public function department(){
        return $this->belongsTo(Department::class,'dept_id');
    }
    public function subdepartment(){
        return $this->belongsTo(SubDepartment::class,'subdept_id');
    }
    public function group(){
        return $this->belongsTo(Group::class,'group_id');
    }
    public function getAllGroupsAttribute(){
       return Group::select('group_id','group_name')->get();
    }
}
