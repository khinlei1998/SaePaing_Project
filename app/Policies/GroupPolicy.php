<?php

namespace App\Policies;

use App\Group;
use App\Role;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class GroupPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any groups.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the group.
     *
     * @param  \App\User  $user
     * @param  \App\Group  $group
     * @return mixed
     */
    public function view(User $user, Group $group)
    {
        //
    }

    /**
     * Determine whether the user can create groups.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->role->id == Role::where("role","Chairman")->first()->id ?
            Response::allow()
            : Response::deny('You need Chairman access to create Group.');
    }

    /**
     * Determine whether the user can update the group.
     *
     * @param  \App\User  $user
     * @param  \App\Group  $group
     * @return mixed
     */
    public function update(User $user, Group $group)
    {
        return $user->role->id === Role::where("role","Chairman")->first()->id ?
            Response::allow()
            : Response::deny('You need Chairman access to update Group.');
    }

    /**
     * Determine whether the user can delete the group.
     *
     * @param  \App\User  $user
     * @param  \App\Group  $group
     * @return mixed
     */
    public function delete(User $user, Group $group)
    {
        //
    }

    /**
     * Determine whether the user can restore the group.
     *
     * @param  \App\User  $user
     * @param  \App\Group  $group
     * @return mixed
     */
    public function restore(User $user, Group $group)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the group.
     *
     * @param  \App\User  $user
     * @param  \App\Group  $group
     * @return mixed
     */
    public function forceDelete(User $user, Group $group)
    {
        //
    }
}
