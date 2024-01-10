<?php

namespace App\Policies;

use App\Models\User;
use App\Models\StudentGroup;
use Illuminate\Auth\Access\HandlesAuthorization;

class StudentGroupPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the studentGroup can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the studentGroup can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\StudentGroup  $model
     * @return mixed
     */
    public function view(User $user, StudentGroup $model)
    {
        return true;
    }

    /**
     * Determine whether the studentGroup can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the studentGroup can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\StudentGroup  $model
     * @return mixed
     */
    public function update(User $user, StudentGroup $model)
    {
        return true;
    }

    /**
     * Determine whether the studentGroup can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\StudentGroup  $model
     * @return mixed
     */
    public function delete(User $user, StudentGroup $model)
    {
        return true;
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\StudentGroup  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the studentGroup can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\StudentGroup  $model
     * @return mixed
     */
    public function restore(User $user, StudentGroup $model)
    {
        return false;
    }

    /**
     * Determine whether the studentGroup can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\StudentGroup  $model
     * @return mixed
     */
    public function forceDelete(User $user, StudentGroup $model)
    {
        return false;
    }
}
