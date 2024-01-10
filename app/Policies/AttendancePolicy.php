<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Backend\Academic\Attendance;
use Illuminate\Auth\Access\HandlesAuthorization;

class AttendancePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the attendance can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the attendance can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Backend\Academic\Attendance  $model
     * @return mixed
     */
    public function view(User $user, Attendance $model)
    {
        return true;
    }

    /**
     * Determine whether the attendance can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the attendance can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Backend\Academic\Attendance  $model
     * @return mixed
     */
    public function update(User $user, Attendance $model)
    {
        return true;
    }

    /**
     * Determine whether the attendance can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Backend\Academic\Attendance  $model
     * @return mixed
     */
    public function delete(User $user, Attendance $model)
    {
        return true;
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Backend\Academic\Attendance  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the attendance can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Backend\Academic\Attendance  $model
     * @return mixed
     */
    public function restore(User $user, Attendance $model)
    {
        return false;
    }

    /**
     * Determine whether the attendance can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Backend\Academic\Attendance  $model
     * @return mixed
     */
    public function forceDelete(User $user, Attendance $model)
    {
        return false;
    }
}
