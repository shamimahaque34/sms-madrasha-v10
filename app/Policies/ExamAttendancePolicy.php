<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Backend\Exam\ExamAttendance;
use Illuminate\Auth\Access\HandlesAuthorization;

class ExamAttendancePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the examAttendance can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the examAttendance can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Backend\Exam\ExamAttendance  $model
     * @return mixed
     */
    public function view(User $user, ExamAttendance $model)
    {
        return true;
    }

    /**
     * Determine whether the examAttendance can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the examAttendance can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Backend\Exam\ExamAttendance  $model
     * @return mixed
     */
    public function update(User $user, ExamAttendance $model)
    {
        return true;
    }

    /**
     * Determine whether the examAttendance can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Backend\Exam\ExamAttendance  $model
     * @return mixed
     */
    public function delete(User $user, ExamAttendance $model)
    {
        return true;
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Backend\Exam\ExamAttendance  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the examAttendance can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Backend\Exam\ExamAttendance  $model
     * @return mixed
     */
    public function restore(User $user, ExamAttendance $model)
    {
        return false;
    }

    /**
     * Determine whether the examAttendance can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Backend\Exam\ExamAttendance  $model
     * @return mixed
     */
    public function forceDelete(User $user, ExamAttendance $model)
    {
        return false;
    }
}
