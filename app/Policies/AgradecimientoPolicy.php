<?php

namespace App\Policies;

use App\Models\Agradecimiento;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class AgradecimientoPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return True;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Agradecimiento $agradecimiento): bool
    {
        if ($user->hasRole(['capitan','almirante','vigia'])) {
            return True;
        } else {
            return $user->id === $agradecimiento->user_id;
        }
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return True;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Agradecimiento $agradecimiento): bool
    {
        if ($user->hasRole(['capitan','almirante','vigia'])) {
            return True;
        } else {
            return $user->id === $agradecimiento->user_id;
        }
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Agradecimiento $agradecimiento): bool
    {
        if ($user->hasRole(['capitan','almirante'])) {
            return True;
        } else {
            return $user->id === $agradecimiento->user_id;
        }
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Agradecimiento $agradecimiento): bool
    {
        if ($user->hasRole('capitan')) {
            return True;
        }
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Agradecimiento $agradecimiento): bool
    {
        if ($user->hasRole('capitan')) {
            return True;
        }
    }
}
