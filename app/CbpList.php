<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CbpList extends Model
{
    protected $primaryKey = 'cbp_id';

    protected $fillable = ['cbp_name','dept_id','status'];

    public function cbpsubtasks(){
        return $this->hasMany(CbpSubtask::class,"cbp_id");
    }

    public function getAllDeptsAttribute(){
        return Department::select('dept_id','dept_name')->get();
    }

    public function department(){
        return $this->belongsTo(Department::class,'dept_id');
    }
}
