<?php

namespace App\Policies;

use App\Models\User;

class StorePolicy
{
    /**
     * Create a new policy instance.
     */
    public function Store(User $user)
    {
       return $user->hasPermission('Store');
       //
    }
}
