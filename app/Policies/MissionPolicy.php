<?php

namespace App\Policies;

use App\Mission;
use App\Role;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class MissionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any missions.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->role_id === Role::where('role','Chairman')->first()->id ;
    }

    /**
     * Determine whether the user can view the mission.
     *
     * @param  \App\User  $user
     * @param  \App\Mission  $mission
     * @return mixed
     */
    public function view(User $user, Mission $mission)
    {
        return $user->role_id === Role::where('role','HOD')->first()->id || $user->emp_id === $mission->emp_id ;
    }

    /**
     * Determine whether the user can create missions.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->role_id === Role::where('role','Chairman')->first()->id?
            Response::allow()
            : Response::deny('You need Chairman access to create Missions.') ;
    }

    /**
     * Determine whether the user can update the mission.
     *
     * @param  \App\User  $user
     * @param  \App\Mission  $mission
     * @return mixed
     */
    public function update(User $user, Mission $mission)
    {
        return $user->role_id == Role::where('role','Chairman')->first()->id || $user->emp_id == $mission->emp_id ?
            Response::allow()
            : Response::deny('Sorry ,You do not have access to update.');
    }

    /**
     * Determine whether the user can delete the mission.
     *
     * @param  \App\User  $user
     * @param  \App\Mission  $mission
     * @return mixed
     */
    public function delete(User $user, Mission $mission)
    {
        //
    }

    /**
     * Determine whether the user can restore the mission.
     *
     * @param  \App\User  $user
     * @param  \App\Mission  $mission
     * @return mixed
     */
    public function restore(User $user, Mission $mission)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the mission.
     *
     * @param  \App\User  $user
     * @param  \App\Mission  $mission
     * @return mixed
     */
    public function forceDelete(User $user, Mission $mission)
    {
        //
    }
}
