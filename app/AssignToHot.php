<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssignToHot extends Model
{
    protected $fillable=['cbp_id','cbp_subtask_id','project_id','hot_id','deadline','status','hot_report'];
    public function hot(){
        return $this->belongsTo(Employee::class,'hot_id');
    }
}
