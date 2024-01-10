<?php

namespace App\Policies;

use App\Models\User;
use App\Models\QuranTranslation;
use Illuminate\Auth\Access\HandlesAuthorization;

class QuranTranslationPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the quranTranslation can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the quranTranslation can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\QuranTranslation  $model
     * @return mixed
     */
    public function view(User $user, QuranTranslation $model)
    {
        return true;
    }

    /**
     * Determine whether the quranTranslation can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the quranTranslation can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\QuranTranslation  $model
     * @return mixed
     */
    public function update(User $user, QuranTranslation $model)
    {
        return true;
    }

    /**
     * Determine whether the quranTranslation can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\QuranTranslation  $model
     * @return mixed
     */
    public function delete(User $user, QuranTranslation $model)
    {
        return true;
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\QuranTranslation  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the quranTranslation can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\QuranTranslation  $model
     * @return mixed
     */
    public function restore(User $user, QuranTranslation $model)
    {
        return false;
    }

    /**
     * Determine whether the quranTranslation can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\QuranTranslation  $model
     * @return mixed
     */
    public function forceDelete(User $user, QuranTranslation $model)
    {
        return false;
    }
}
