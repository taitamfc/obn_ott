<?php

namespace App\Policies;

use App\Models\Site;

class HomePolicy
{
    /**
     * Create a new policy instance.
     */
    public function Home(Site $site)
    {
       return $site->hasPermission('Home');
       //
    }
}