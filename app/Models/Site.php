<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasPermissions;

class Site extends Model
{
    use HasFactory, HasPermissions;
    protected $table = 'sites';
    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function course(){
        return $this->hasMany(Course::class, 'site_id', 'id');
    }
    public function users(){
        return $this->belongsToMany(User::class, 'user_manage_site', 'user_id', 'site_id');
    }
    public function event(){
        return $this->hasMany(Event::class, 'site_id', 'id');
    }
    public function grade(){
        return $this->hasMany(Grade::class, 'site_id', 'id');
    }
    public function subscription(){
        return $this->hasMany(Subscription::class, 'site_id', 'id');
    }
    public function subject(){
        return $this->hasMany(Subject::class, 'site_id', 'id');
    }
    public function lesson(){
        return $this->hasMany(Lesson::class, 'site_id', 'id');
    }
    public function plan(){
        return $this->hasMany(Plan::class, 'site_id', 'id');
    }
    public function groups(){
        return $this->belongsToMany(Group::class, 'group_user', 'group_id', 'site_id');
    }
    public function group(){
        return $this->hasMany(Group::class, 'site_id', 'id');
    }
    public function page(){
        return $this->hasMany(Page::class, 'site_id', 'id');
    }
    public function qas(){
        return $this->hasMany(Qas::class, 'site_id', 'id');
    }
    public function banner(){
        return $this->hasMany(Banner::class, 'site_id', 'id');
    }
    public function setting(){
        return $this->hasMany(Setting::class, 'site_id', 'id');
    }  
    public function transaction(){
        return $this->hasMany(Transaction::class, 'site_id', 'id');
    }
    public function studentcourse(){
        return $this->hasMany(StudentCourse::class, 'site_id', 'id');
    }
    public function lessoncourse(){
        return $this->hasMany(LessonCourse::class, 'site_id', 'id');
    }
    public function lessonstudent(){
        return $this->hasMany(LessonStudent::class, 'site_id', 'id');
    }
    public function subscriptioncourse(){
        return $this->hasMany(SubscriptionCourse::class, 'site_id', 'id');
    }
}