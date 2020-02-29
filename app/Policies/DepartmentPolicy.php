<?php

namespace App\Policies;

use App\Department;
use App\User;
use App\Role;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class DepartmentPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any departments.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the department.
     *
     * @param  \App\User  $user
     * @param  \App\Department  $department
     * @return mixed
     */
    public function view(User $user, Department $department)
    {
        //
    }

    /**
     * Determine whether the user can create departments.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->role->id == Role::where("role","Chairman")->first()->id ?
            Response::allow()
            : Response::deny('You need Chairman access to create Department.');
    }

    /**
     * Determine whether the user can update the department.
     *
     * @param  \App\User  $user
     * @param  \App\Department  $department
     * @return mixed
     */
    public function update(User $user, Department $department)
    {
        return $user->role->id === Role::where("role","Chairman")->first()->id ?
            Response::allow()
            : Response::deny('You need Chairman access to update Department.');
    }

    /**
     * Determine whether the user can delete the department.
     *
     * @param  \App\User  $user
     * @param  \App\Department  $department
     * @return mixed
     */
    public function delete(User $user, Department $department)
    {
        //
    }

    /**
     * Determine whether the user can restore the department.
     *
     * @param  \App\User  $user
     * @param  \App\Department  $department
     * @return mixed
     */
    public function restore(User $user, Department $department)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the department.
     *
     * @param  \App\User  $user
     * @param  \App\Department  $department
     * @return mixed
     */
    public function forceDelete(User $user, Department $department)
    {
        //
    }
}
