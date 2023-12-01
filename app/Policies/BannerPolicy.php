<?php

namespace App\Policies;

use App\Models\User;

class BannerPolicy
{
    /**
     * Create a new policy instance.
     */
    public function Banner(User $user)
    {
       return $user->hasPermission('Banner');
       //
    }
}