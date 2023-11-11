<?php

namespace App\Policies;

use App\Models\User;

class SubjectPolicy
{
    /**
     * Create a new policy instance.
     */
    public function Subject(User $user)
    {
       return $user->hasPermission('Subject');
       //
    }
}
