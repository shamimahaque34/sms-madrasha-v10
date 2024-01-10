<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Backend\Exam\ExamGrade;
use Illuminate\Auth\Access\HandlesAuthorization;

class ExamGradePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the examGrade can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the examGrade can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Exam\ExamGrade  $model
     * @return mixed
     */
    public function view(User $user, ExamGrade $model)
    {
        return true;
    }

    /**
     * Determine whether the examGrade can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the examGrade can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Exam\ExamGrade  $model
     * @return mixed
     */
    public function update(User $user, ExamGrade $model)
    {
        return true;
    }

    /**
     * Determine whether the examGrade can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Exam\ExamGrade  $model
     * @return mixed
     */
    public function delete(User $user, ExamGrade $model)
    {
        return true;
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Exam\ExamGrade  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the examGrade can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Exam\ExamGrade  $model
     * @return mixed
     */
    public function restore(User $user, ExamGrade $model)
    {
        return false;
    }

    /**
     * Determine whether the examGrade can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Exam\ExamGrade  $model
     * @return mixed
     */
    public function forceDelete(User $user, ExamGrade $model)
    {
        return false;
    }
}
