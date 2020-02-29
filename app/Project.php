<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{   protected $primaryKey = 'project_id';

    protected $fillable = [
        'project_code', 'project_title', 'project_description','project_region','project_startDate','project_endDate'
    ];

    public function task(){
        return $this->hasMany(Task::class,'task_id');
    }
    public function getProjectConfigAttribute(){
        return ProjectConfig::where('project_id',$this->project_id)->get();
    }
}
