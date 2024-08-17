<?php

namespace App\Policies;

use App\Models\AdditionalInfo;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class AdditionalInfoPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->isVendor() || $user->isClinic() || $user->isNgo();
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, AdditionalInfo $additionalInfo): bool
    {
        return $user->isVendor() || $user->isClinic() || $user->isNgo();
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->isVendor() || $user->isClinic() || $user->isNgo();
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, AdditionalInfo $additionalInfo): bool
    {
        return $user->isVendor() || $user->isClinic() || $user->isNgo();
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, AdditionalInfo $additionalInfo): bool
    {
        return $user->isVendor() || $user->isClinic() || $user->isNgo();
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, AdditionalInfo $additionalInfo): bool
    {
        return $user->isVendor() || $user->isClinic() || $user->isNgo();
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, AdditionalInfo $additionalInfo): bool
    {
        return $user->isVendor() || $user->isClinic() || $user->isNgo();
    }


    public function deleteAny(User $user): bool
    {
        return $user->isVendor() || $user->isClinic() || $user->isNgo();
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restoreAny(User $user): bool
    {
        return $user->isVendor() || $user->isClinic() || $user->isNgo();
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->isVendor() || $user->isClinic() || $user->isNgo();
    }
}
