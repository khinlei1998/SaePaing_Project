<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mission extends Model
{
    protected $primaryKey = 'mission_id';

    protected $casts = [
        'emp_id' => 'string',
    ];

    protected $fillable = ['job_type','job_target','job_obj','jobfinished_date','doing_methods','attach_files','issue_resolve_ways','status','remark','emp_id'];
    public function employee(){
        return $this->belongsTo(Employee::class,'emp_id');
    }
    public function getMissionStatusAttribute(){
        switch ($this->status){
            case "0":return "assign";break;
            case "1":return "start";break;
            case "2":return "complete";break;
        }
    }
    public function getMissionAttachFilesAttribute(){
        return strlen($this->attach_files)>0?explode(':',$this->attach_files):[];
    }

}
