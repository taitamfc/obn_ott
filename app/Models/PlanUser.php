<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanUser extends Model
{
    use HasFactory;
    protected $table = 'plan_user';
    function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
    function plan(){
        return $this->belongsTo(Plan::class,'plan_id','id');
    }
}
