<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Backend\Academic\Syllabus;
use Illuminate\Auth\Access\HandlesAuthorization;

class SyllabusPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the syllabus can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the syllabus can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Backend\Academic\Syllabus  $model
     * @return mixed
     */
    public function view(User $user, Syllabus $model)
    {
        return true;
    }

    /**
     * Determine whether the syllabus can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the syllabus can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Backend\Academic\Syllabus  $model
     * @return mixed
     */
    public function update(User $user, Syllabus $model)
    {
        return true;
    }

    /**
     * Determine whether the syllabus can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Backend\Academic\Syllabus  $model
     * @return mixed
     */
    public function delete(User $user, Syllabus $model)
    {
        return true;
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Backend\Academic\Syllabus  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the syllabus can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Backend\Academic\Syllabus  $model
     * @return mixed
     */
    public function restore(User $user, Syllabus $model)
    {
        return false;
    }

    /**
     * Determine whether the syllabus can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Backend\Academic\Syllabus  $model
     * @return mixed
     */
    public function forceDelete(User $user, Syllabus $model)
    {
        return false;
    }
}
