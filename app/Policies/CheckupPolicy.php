<?php

namespace App\Policies;

use App\User;
use App\Checkup;
use Illuminate\Auth\Access\HandlesAuthorization;

class CheckupPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the checkup.
     *
     * @param  \App\User  $user
     * @param  \App\Checkup  $checkup
     * @return mixed
     */
    public function report(User $user, Checkup $checkup)
    {
        return $checkup->store_id == $user->store_id || $user->store_id == 1;
    }

    /**
     * Determine whether the user can create checkups.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the checkup.
     *
     * @param  \App\User  $user
     * @param  \App\Checkup  $checkup
     * @return mixed
     */
    public function update(User $user, Checkup $checkup)
    {
        //
    }

    /**
     * Determine whether the user can delete the checkup.
     *
     * @param  \App\User  $user
     * @param  \App\Checkup  $checkup
     * @return mixed
     */
    public function delete(User $user, Checkup $checkup)
    {
        //
    }

    /**
     * Determine whether the user can restore the checkup.
     *
     * @param  \App\User  $user
     * @param  \App\Checkup  $checkup
     * @return mixed
     */
    public function restore(User $user, Checkup $checkup)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the checkup.
     *
     * @param  \App\User  $user
     * @param  \App\Checkup  $checkup
     * @return mixed
     */
    public function forceDelete(User $user, Checkup $checkup)
    {
        //
    }
}
