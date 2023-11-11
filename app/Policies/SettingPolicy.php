<?php

namespace App\Policies;

use App\Models\User;

class SettingPolicy
{
    /**
     * Create a new policy instance.
     */
    public function Setting(User $user)
    {
       return $user->hasPermission('Setting');
       //
    }
}
