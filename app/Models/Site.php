<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    use HasFactory;
    protected $table = 'sites';
    function plan(){
        return $this->belongsToMany(Plan::class,'plan_site','plan_id','site_id');
    }
    function site_plan(){
        return $this->hasMany(PlanUser::class,'site_id','id');
    }
}