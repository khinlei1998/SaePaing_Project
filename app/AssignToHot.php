<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssignToHot extends Model
{
    protected $fillable=['cbp_id','cbp_subtask_id','project_id','hot_id','deadline','status','hot_report'];
    public function hot(){
        return $this->belongsTo(Employee::class,'hot_id');
    }
    public function cbplistforhot(){
        return $this->hasmany(CbpList::class,'cbp_id');
    }
    public function projectconfigs(){
        return $this->belongsTo(AssignToHot::class,'cbp_id');
    }
}
