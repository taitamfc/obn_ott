<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'duration',
        'number_days'
    ];

    protected $table = 'plans';
    function site(){
        return $this->belongsToMany(Site::class,'plan_site');
    }
    function plan_site(){
        return $this->hasMany(PlanSite::class);
    }
    function plan_order(){
        return $this->hasMany(PlanOrder::class);
    }
    function duration(){
        return $this->belongsTo(Duration::class);
    }
    function getKeyByValue($array, $value)
    {
        foreach ($array as $key => $val) {
            if ($val === $value) {
                return Carbon::parse($key);
            }
        }
        return null;
    }
}