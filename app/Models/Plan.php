<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Plan extends Model
{
    use HasFactory;
    protected $table = 'plans';
    function site(){
        return $this->belongsToMany(User::class,'plan_user','plan_id','site_id');
    }
    function plan_site(){
        return $this->hasMany(PlanUser::class,'plan_id','id');
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