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
        'site_id',
        'position',
        'status',
        'image_url',
        'createt_at',
        'updated_at',
    ];

    // Relationship
    public function site(){
        $this->belongsTo(Site::class, 'site_id', 'id');
    }
    public function subscriptionscourse(){
        $this->hasMany(SubscriptionsCourse::class, 'course_id', 'id');
    }
    public function subscriptions(){
        $this->belongsToMany(Subscription::class, 'subscriptions_course', 'subscription_id', 'course_id');
    }
    public function lessoncourse(){
        $this->hasMany(LessonCourse::class, 'course_id', 'id');
    }
    public function lessons(){
        $this->belongsToMany(Lessons::class, 'lesson_course', 'lesson_id', 'course_id');
    }
    public function lesson(){
        $this->belongsTo(Lesson::class);
    }
    public function studentcourse(){
        $this->hasMany(StudentCourse::class, 'course_id', 'id');
    }
    public function students(){
        $this->belongsToMany(Student::class, 'student_course', 'student_id', 'course_id');
    }
    public function lessonstudent(){
        $this->hasMany(LessonStudent::class, 'course_id', 'id');
    }
    public function transaction(){
        $this->hasMany(Transaction::class, 'course_id', 'id');
    }

    // Feature
    const ACTIVE = 1;
    const INACTIVE = 0;

    public static function getActiveItems($site_id){
        return self::where('site_id',$site_id)->where('status',self::ACTIVE)->get();
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