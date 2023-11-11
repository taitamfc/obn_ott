<?php

namespace App\Policies;

use App\Models\User;

class LessonPolicy
{
    public function Lesson(User $user)
    {
       return $user->hasPermission('Lesson');
       //
    }
}
