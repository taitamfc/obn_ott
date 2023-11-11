<?php

namespace App\Policies;

use App\Models\User;

class CoursePolicy
{
    /**
     * Create a new policy instance.
     */
    public function Course(User $user)
    {
       return $user->hasPermission('Course');
       //
    }
}
