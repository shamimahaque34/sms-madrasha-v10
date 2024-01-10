<?php

namespace App\Policies;

use App\Models\User;
use App\Models\AcademicStuff;
use Illuminate\Auth\Access\HandlesAuthorization;

class AcademicStuffPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the academicStuff can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the academicStuff can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\AcademicStuff  $model
     * @return mixed
     */
    public function view(User $user, AcademicStuff $model)
    {
        return true;
    }

    /**
     * Determine whether the academicStuff can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the academicStuff can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\AcademicStuff  $model
     * @return mixed
     */
    public function update(User $user, AcademicStuff $model)
    {
        return true;
    }

    /**
     * Determine whether the academicStuff can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\AcademicStuff  $model
     * @return mixed
     */
    public function delete(User $user, AcademicStuff $model)
    {
        return true;
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\AcademicStuff  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the academicStuff can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\AcademicStuff  $model
     * @return mixed
     */
    public function restore(User $user, AcademicStuff $model)
    {
        return false;
    }

    /**
     * Determine whether the academicStuff can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\AcademicStuff  $model
     * @return mixed
     */
    public function forceDelete(User $user, AcademicStuff $model)
    {
        return false;
    }
}
