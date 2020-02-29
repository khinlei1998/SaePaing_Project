<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShareInformation extends Model
{
    protected $primaryKey = 'share_id';

    protected $fillable = ['share_description','share_by','share_to','mission_id','task_id'];

    public function sharedTo(){
        return $this->belongsTo(Employee::class,'share_to');
    }
    public function sharedBy(){
        return $this->belongsTo(Employee::class,'share_by');
    }
    public function task(){
        return $this->belongsTo(Task::class,'task_id') ?? null;
    }
}
