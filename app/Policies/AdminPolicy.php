<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdminPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the admin can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the admin can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Admin  $model
     * @return mixed
     */
    public function view(User $user, Admin $model)
    {
        return true;
    }

    /**
     * Determine whether the admin can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the admin can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Admin  $model
     * @return mixed
     */
    public function update(User $user, Admin $model)
    {
        return true;
    }

    /**
     * Determine whether the admin can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Admin  $model
     * @return mixed
     */
    public function delete(User $user, Admin $model)
    {
        return true;
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Admin  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the admin can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Admin  $model
     * @return mixed
     */
    public function restore(User $user, Admin $model)
    {
        return false;
    }

    /**
     * Determine whether the admin can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Admin  $model
     * @return mixed
     */
    public function forceDelete(User $user, Admin $model)
    {
        return false;
    }
}
