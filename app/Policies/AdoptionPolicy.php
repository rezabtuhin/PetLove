<?php

namespace App\Policies;

use App\Models\Adoption;
use App\Models\User;

class AdoptionPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->isNgo();
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Adoption $adoption): bool
    {
        return $user->isNgo();
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->isNgo();
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Adoption $adoption): bool
    {
        return $user->isNgo();
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Adoption $adoption): bool
    {
        return $user->isNgo();
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Adoption $adoption): bool
    {
        return $user->isNgo();
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Adoption $adoption): bool
    {
        return $user->isNgo();
    }


    public function deleteAny(User $user): bool
    {
        return $user->isNgo();
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restoreAny(User $user): bool
    {
        return $user->isNgo();
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->isNgo();
    }
}
