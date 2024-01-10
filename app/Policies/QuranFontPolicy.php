<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Backend\Quran\QuranFont;
use Illuminate\Auth\Access\HandlesAuthorization;

class QuranFontPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the quranFont can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the quranFont can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Backend\Quran\QuranFont  $model
     * @return mixed
     */
    public function view(User $user, QuranFont $model)
    {
        return true;
    }

    /**
     * Determine whether the quranFont can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the quranFont can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Backend\Quran\QuranFont  $model
     * @return mixed
     */
    public function update(User $user, QuranFont $model)
    {
        return true;
    }

    /**
     * Determine whether the quranFont can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Backend\Quran\QuranFont  $model
     * @return mixed
     */
    public function delete(User $user, QuranFont $model)
    {
        return true;
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Backend\Quran\QuranFont  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the quranFont can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Backend\Quran\QuranFont  $model
     * @return mixed
     */
    public function restore(User $user, QuranFont $model)
    {
        return false;
    }

    /**
     * Determine whether the quranFont can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Backend\Quran\QuranFont  $model
     * @return mixed
     */
    public function forceDelete(User $user, QuranFont $model)
    {
        return false;
    }
}
