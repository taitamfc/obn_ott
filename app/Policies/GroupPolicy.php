<?php

namespace App\Policies;

use App\Models\User;

class GroupPolicy
{
    /**
     * Create a new policy instance.
     */
    public function Group(User $user)
    {
       return $user->hasPermission('Group');
       //
    }
}
