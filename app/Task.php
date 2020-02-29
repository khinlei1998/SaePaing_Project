<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $primaryKey = 'task_id';

    protected $fillable = ['task_title','task_unique_id','project_code','description','assignee_person','assignor_person','assignee_attach_file','assignor_attach_file','start_time','end_time','status','feedback','dept_id','subdept_id','team_id'];
    public function assignedByEmployee(){
        return $this->belongsTo(Employee::class,'assignor_person','emp_id');
    }
    public function assignedToEmployee(){
        return $this->belongsTo(Employee::class,'assignee_person','emp_id');
    }
    public function remark(){
        return $this->hasMany(Remark::class,'task_id');
    }
    public function getFinishDateAttribute(){
        return Carbon::parse($this->end_time)->diffForHumans();
    }
    public function getStartedAtAttribute(){
        return Carbon::parse($this->start_time)->diffForHumans();
    }
    public function getTaskStatusAttribute(){
        switch ($this->status){
            case "0":return "assign";break;
            case "1":return "start";break;
            case "2":return "report";break;
            case "3":return "complete";break;
            case "4":return "reject";break;
        }
    }
    public function getAssignedToAttribute(){
        return $this->assignor_person;
    }

    public function getAssignedByAttribute(){
        return $this->assignee_person;
    }
    public function shareInformation(){
        return $this->hasOne(ShareInformation::class,'task_id')??null;
    }
    public function getAssignorFileAttribute(){
        return strlen($this->assignor_attach_file)>0?explode(':',$this->assignor_attach_file):[];
    }
    public function getAssigneeFileAttribute(){
        return strlen($this->assignee_attach_file)>0?explode(':',$this->assignee_attach_file):[];
    }
    public function getAllProjectsAttribute(){
        return Project::select('project_title','project_code')->get();
     }
    public function project(){
        return $this->belongsTo(Project::class,'project_code');
    }
    
}
