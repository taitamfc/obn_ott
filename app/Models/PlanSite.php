<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanSite extends Model
{
    use HasFactory;
    protected $table = 'plan_site';
    function site(){
        return $this->belongsTo(Site::class,'site_id','id');
    }
    function plan(){
        return $this->belongsTo(Plan::class,'plan_id','id');
    }
    public function user(){
        return $this->hasMany(User::class);
    }
}