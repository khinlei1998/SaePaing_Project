<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $primaryKey = 'group_id';

    protected $fillable = ['group_name'];
    public function employee(){
        return $this->hasMany(Employee::class,"group_id");
    }
    public function department(){
        return $this->hasMany(Department::class,'group_id');
    }
}
