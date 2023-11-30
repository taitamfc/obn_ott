<?php

namespace App\Policies;

use App\Models\Site;

class BannerPolicy
{
    /**
     * Create a new policy instance.
     */
    public function Banner(Site $site)
    {
       return $site->hasPermission('Banner');
       //
    }
}