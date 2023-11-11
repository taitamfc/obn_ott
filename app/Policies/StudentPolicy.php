<?php

namespace App\Policies;

use App\Models\User;

class StudentPolicy
{
    /**
     * Create a new policy instance.
     */
    public function Student(User $user)
    {
       return $user->hasPermission('Student');
       //
    }
}
