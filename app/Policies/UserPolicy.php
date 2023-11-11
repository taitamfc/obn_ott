<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    /**
     * Create a new policy instance.
     */
    public function User(User $user)
    {
       return $user->hasPermission('User');
       //
    }
}
