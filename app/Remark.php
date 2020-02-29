<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Remark extends Model
{
    protected $primaryKey = 'remark_id';

    protected $fillable = ['remark_description','task_id'];
    public function taskRemark(){
        return $this->belongsTo(Task::class,'task_id');
    }
}
