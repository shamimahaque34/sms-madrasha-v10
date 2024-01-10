<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Backend\Exam\ExamSchedule;
use Illuminate\Auth\Access\HandlesAuthorization;

class ExamSchedulePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the examSchedule can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the examSchedule can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Backend\Exam\ExamSchedule  $model
     * @return mixed
     */
    public function view(User $user, ExamSchedule $model)
    {
        return true;
    }

    /**
     * Determine whether the examSchedule can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the examSchedule can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Backend\Exam\ExamSchedule  $model
     * @return mixed
     */
    public function update(User $user, ExamSchedule $model)
    {
        return true;
    }

    /**
     * Determine whether the examSchedule can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Backend\Exam\ExamSchedule  $model
     * @return mixed
     */
    public function delete(User $user, ExamSchedule $model)
    {
        return true;
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Backend\Exam\ExamSchedule  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the examSchedule can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Backend\Exam\ExamSchedule  $model
     * @return mixed
     */
    public function restore(User $user, ExamSchedule $model)
    {
        return false;
    }

    /**
     * Determine whether the examSchedule can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Backend\Exam\ExamSchedule  $model
     * @return mixed
     */
    public function forceDelete(User $user, ExamSchedule $model)
    {
        return false;
    }
}
