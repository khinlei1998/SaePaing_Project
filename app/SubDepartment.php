<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubDepartment extends Model
{
    protected $primaryKey = 'subdept_id';

    protected $fillable = ['subdept_name','dept_id'];
    public function employee(){
        return $this->hasMany(Employee::class,"subdept_id");
    }
    public function department(){
        return $this->belongsTo(Department::class,'dept_id');
    }
    public function team(){
        return $this->hasMany(Team::class,'subdept_id');
    }
}
