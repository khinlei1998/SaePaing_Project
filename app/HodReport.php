<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HodReport extends Model
{
    protected $fillable = [
        'projConfig_id', 'status','feedback','hod_person','percentage','report_desc','report_attached_file'
    ];
    public function hodperson(){
        return $this->belongsTo(Employee::class,'hod_person');
    }
    public function getAssignorFileAttribute(){
        return strlen($this->report_attached_file)>0?explode(':',$this->report_attached_file):[];
    }
}
