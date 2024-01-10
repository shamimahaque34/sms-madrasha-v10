<?php

namespace App\Policies;

use App\Models\User;
use App\Models\QuranTranslationProvider;
use Illuminate\Auth\Access\HandlesAuthorization;

class QuranTranslationProviderPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the quranTranslationProvider can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the quranTranslationProvider can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\QuranTranslationProvider  $model
     * @return mixed
     */
    public function view(User $user, QuranTranslationProvider $model)
    {
        return true;
    }

    /**
     * Determine whether the quranTranslationProvider can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the quranTranslationProvider can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\QuranTranslationProvider  $model
     * @return mixed
     */
    public function update(User $user, QuranTranslationProvider $model)
    {
        return true;
    }

    /**
     * Determine whether the quranTranslationProvider can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\QuranTranslationProvider  $model
     * @return mixed
     */
    public function delete(User $user, QuranTranslationProvider $model)
    {
        return true;
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\QuranTranslationProvider  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the quranTranslationProvider can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\QuranTranslationProvider  $model
     * @return mixed
     */
    public function restore(User $user, QuranTranslationProvider $model)
    {
        return false;
    }

    /**
     * Determine whether the quranTranslationProvider can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\QuranTranslationProvider  $model
     * @return mixed
     */
    public function forceDelete(User $user, QuranTranslationProvider $model)
    {
        return false;
    }
}
