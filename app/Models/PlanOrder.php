<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanOrder extends Model
{
    use HasFactory;
    protected $table = "plan_order";
    function site()
    {
        return $this->belongsTo(Site::class);
    }
    function user()
    {
        return $this->belongsTo(Site::class);
    }
    function plan()
    {
        return $this->belongsTo(Plan::class);
    }
}