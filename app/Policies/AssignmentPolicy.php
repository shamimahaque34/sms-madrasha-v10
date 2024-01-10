<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Assignment;
use Illuminate\Auth\Access\HandlesAuthorization;

class AssignmentPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the assignment can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the assignment can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Assignment  $model
     * @return mixed
     */
    public function view(User $user, Assignment $model)
    {
        return true;
    }

    /**
     * Determine whether the assignment can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the assignment can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Assignment  $model
     * @return mixed
     */
    public function update(User $user, Assignment $model)
    {
        return true;
    }

    /**
     * Determine whether the assignment can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Assignment  $model
     * @return mixed
     */
    public function delete(User $user, Assignment $model)
    {
        return true;
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Assignment  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the assignment can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Assignment  $model
     * @return mixed
     */
    public function restore(User $user, Assignment $model)
    {
        return false;
    }

    /**
     * Determine whether the assignment can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Assignment  $model
     * @return mixed
     */
    public function forceDelete(User $user, Assignment $model)
    {
        return false;
    }
}
