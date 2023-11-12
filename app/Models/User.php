<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Traits\HasPermissions;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasPermissions;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'users';
    protected $fillable = [
        'name',
        'email',
        'password',
        'group_id',
        'parent_id',
    ];
    // Trong model User
    public function group()
    {
        return $this->belongsTo(Group::class, 'group_id');
    }


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    public function lesson()
    {
        return $this->hasMany(Lesson::class, 'use_id', 'id');
    }
    function student(){
        return $this->belongsToMany(Student::class,'student_course','student_id','user_id');
    }
    function plan(){
        return $this->belongsToMany(Plan::class,'plan_user','plan_id','user_id');
    }
    function user_plan(){
        return $this->hasMany(PlanUser::class,'user_id','id');
    }
}