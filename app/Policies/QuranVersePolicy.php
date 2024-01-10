<?php

namespace App\Policies;

use App\Models\User;
use App\Models\QuranVerse;
use Illuminate\Auth\Access\HandlesAuthorization;

class QuranVersePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the quranVerse can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the quranVerse can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\QuranVerse  $model
     * @return mixed
     */
    public function view(User $user, QuranVerse $model)
    {
        return true;
    }

    /**
     * Determine whether the quranVerse can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the quranVerse can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\QuranVerse  $model
     * @return mixed
     */
    public function update(User $user, QuranVerse $model)
    {
        return true;
    }

    /**
     * Determine whether the quranVerse can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\QuranVerse  $model
     * @return mixed
     */
    public function delete(User $user, QuranVerse $model)
    {
        return true;
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\QuranVerse  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the quranVerse can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\QuranVerse  $model
     * @return mixed
     */
    public function restore(User $user, QuranVerse $model)
    {
        return false;
    }

    /**
     * Determine whether the quranVerse can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\QuranVerse  $model
     * @return mixed
     */
    public function forceDelete(User $user, QuranVerse $model)
    {
        return false;
    }
}
