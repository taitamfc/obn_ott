<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Course extends Model
{
    use HasFactory;
    protected $table = 'courses';
    protected $fillable = [
        'name',
        'price',
        'user_id',
        'position',
        'status',
        'image_url',
        'createt_at',
        'updated_at',
    ];

    // Relationship
    function student(){
        return $this->belongsToMany(Student::class);
    }
    public function course_student()
    {
        return $this->hasMany(StudentCourse::class, 'course_id', 'id');
    }
    function lesson_student()
    {
        return $this->hasMany(LessonStudent::class,'course_id','id');
    }
    function course_lesson()
    {
        return $this->hasMany(LessonCourse::class,'course_id','id');
    }
    function lesson(){
        return $this->belongsToMany(Lesson::class,'lesson_course','lesson_id','course_id');
    }
    public function subscriptions()
    {
        return $this->belongsToMany(Subscription::class, 'subscription_course', 'course_id', 'subscription_id');
    }
    
    // Feature
    const ACTIVE = 1;
    const INACTIVE = 0;

    public static function getActiveItems(){
        return self::where('user_id',Auth::id())->where('status',self::ACTIVE)->get();
    }

    // status_fm 
    function getStatusFmAttribute(){
        if($this->status == self::INACTIVE){
            return '<span class="badge badge-warning">In Active</span>';
        }else{
            return '<span class="badge badge-success">Active</span>';
        }
    }

    function getImgFmAttribute()
    {  
        if (!empty($this->image_url)) {
            return '<img class="avatar-md" src="'.asset($this->image_url).'" alt="">';
        } else {
            return '<img class="avatar-md" src="'.asset('assets/images/default.png').'" alt="">';
        }
    }
}