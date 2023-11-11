<?php

namespace App\Policies;

use App\Models\User;

class GradePolicy
{
    /**
     * Create a new policy instance.
     */
    public function Grade(User $user)
    {
       return $user->hasPermission('Grade');
       //
    }
}
