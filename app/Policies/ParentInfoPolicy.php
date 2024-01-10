<?php

namespace App\Policies;

use App\Models\User;
use App\Models\ParentInfo;
use Illuminate\Auth\Access\HandlesAuthorization;

class ParentInfoPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the parentInfo can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the parentInfo can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ParentInfo  $model
     * @return mixed
     */
    public function view(User $user, ParentInfo $model)
    {
        return true;
    }

    /**
     * Determine whether the parentInfo can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the parentInfo can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ParentInfo  $model
     * @return mixed
     */
    public function update(User $user, ParentInfo $model)
    {
        return true;
    }

    /**
     * Determine whether the parentInfo can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ParentInfo  $model
     * @return mixed
     */
    public function delete(User $user, ParentInfo $model)
    {
        return true;
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ParentInfo  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the parentInfo can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ParentInfo  $model
     * @return mixed
     */
    public function restore(User $user, ParentInfo $model)
    {
        return false;
    }

    /**
     * Determine whether the parentInfo can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ParentInfo  $model
     * @return mixed
     */
    public function forceDelete(User $user, ParentInfo $model)
    {
        return false;
    }
}
