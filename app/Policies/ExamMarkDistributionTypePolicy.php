<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Backend\Exam\ExamMarkDistributionType;
use Illuminate\Auth\Access\HandlesAuthorization;

class ExamMarkDistributionTypePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the examMarkDistributionType can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the examMarkDistributionType can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Backend\Exam\ExamMarkDistributionType  $model
     * @return mixed
     */
    public function view(User $user, ExamMarkDistributionType $model)
    {
        return true;
    }

    /**
     * Determine whether the examMarkDistributionType can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the examMarkDistributionType can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Backend\Exam\ExamMarkDistributionType  $model
     * @return mixed
     */
    public function update(User $user, ExamMarkDistributionType $model)
    {
        return true;
    }

    /**
     * Determine whether the examMarkDistributionType can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Backend\Exam\ExamMarkDistributionType  $model
     * @return mixed
     */
    public function delete(User $user, ExamMarkDistributionType $model)
    {
        return true;
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Backend\Exam\ExamMarkDistributionType  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the examMarkDistributionType can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Backend\Exam\ExamMarkDistributionType  $model
     * @return mixed
     */
    public function restore(User $user, ExamMarkDistributionType $model)
    {
        return false;
    }

    /**
     * Determine whether the examMarkDistributionType can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Backend\Exam\ExamMarkDistributionType  $model
     * @return mixed
     */
    public function forceDelete(User $user, ExamMarkDistributionType $model)
    {
        return false;
    }
}
