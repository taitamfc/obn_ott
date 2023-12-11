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
        return $this->belongsTo(Site::class, 'site_id', 'id');
    }
    public function subscriptionscourse(){
        return $this->hasMany(SubscriptionsCourse::class, 'course_id', 'id');
    }
    public function subscriptions(){
        return $this->belongsToMany(Subscription::class, 'subscriptions_course', 'subscription_id', 'course_id');
    }
    public function lessoncourse(){
        return $this->hasMany(LessonCourse::class, 'course_id', 'id');
    }
    public function lessons(){
        return  $this->belongsToMany(Lesson::class, 'lesson_course', 'lesson_id', 'course_id');
    }
    public function lesson(){
        return $this->belongsTo(Lesson::class);
    }
    public function studentcourse(){
        return $this->hasMany(StudentCourse::class, 'course_id', 'id');
    }
    public function students(){
        return  $this->belongsToMany(Student::class, 'student_course', 'student_id', 'course_id');
    }
    public function lessonstudent(){
        return $this->hasMany(LessonStudent::class, 'course_id', 'id');
    }
    public function transaction(){
        return $this->hasMany(Transaction::class, 'course_id', 'id');
    }
    function orders(){
        return $this->hasMany(Order::class, 'item_id','id');
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

    function getPriceFmAttribute()
    {  
        $formattedPrice = '$' . number_format($this->price);
        return $formattedPrice;
    }

    function getIsBoughtAttribute(){
        $student_id = Auth::guard('students')->id();
        if($student_id){
            return StudentCourse::where('course_id',$this->id)->where('student_id', $student_id)->exists();
        }
        return false;
    } 
    public function getLessonsCountAttribute()
    {
        return $this->lessons()->count();
    }
}