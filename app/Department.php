<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $primaryKey = 'dept_id';

    protected $fillable = ['dept_name','group_id'];
    public function employee(){
        return $this->hasMany(Employee::class,"dept_id");
    }
    public function group(){
        return $this->belongsTo(Group::class,'group_id');
    }
    public function subdepartment(){
        return $this->hasMany(SubDepartment::class,'dept_id');
    }

    public function getAllGroupsAttribute(){
        return Group::select('group_id','group_name')->get();
    }
   

    public function cbplist(){
        return $this->hasMany(CbpList::class,'dept_id');
    }
}
