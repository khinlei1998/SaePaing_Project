<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','emp_id','role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function employee(){
        return $this->belongsTo(Employee::class,'emp_id');
    }
    public function role(){
        return $this->belongsTo(Role::class,'role_id');
    }
    //this function return department base on user role (used in task create.blade.php)
    public function getAccessibleDepartmentsAttribute(){
        return $this->role->id==Role::where("role","HOD")->first()->id ? $this->employee->department()->select('dept_id','dept_name')->get() : Department::select('dept_id','dept_name')->get();
    }

    
    //normal assignable person
    public function getAssignablePersonsAttribute(){
        return $this->role->id==Role::where("role","HOD")->first()->id ? $this->hodAssignablePersons() : $this->higherRoleAssignablePersons();
    }
    public function hodAssignablePersons(){
        return $this->employee->department->employee()->where("emp_id","!=",$this->emp_id)->select('emp_name as name','emp_id')->get();
    }
    public function higherRoleAssignablePersons(){
        return User::where('role_id',">",$this->role->id)->select('name','emp_id')->get();
    }
    //get responsible person for Mission Create
    public function getResponsiblePersonsAttribute(){
        return User::where('role_id',Role::where("role","D")->first()->id)->select('name','emp_id')->get();
    }


}