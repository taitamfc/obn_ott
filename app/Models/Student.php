<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Traits\HasPermissions;

class Student extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasPermissions;
    protected $table = 'students';
    const ACTIVE = 1;
    const INACTIVE = 0;

    function getStatusFmAttribute(){
        if($this->status == self::INACTIVE){
            return 'In Active';
        }else{
            return 'Active';
        }

    }
    
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'code',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    public function lessons()
    {
        return $this->belongsToMany(Lesson::class, 'lesson_student', 'student_id', 'lesson_id');
    }
    public function incomplete_lessons()
    {
        return $this->belongsToMany(Lesson::class, 'lesson_student', 'student_id', 'lesson_id')->where('is_complete',0);
    }
    public function complete_lessons()
    {
        return $this->belongsToMany(Lesson::class, 'lesson_student', 'student_id', 'lesson_id')->where('is_complete',1);
    }

    function course(){
        return $this->belongsToMany(Course::class,'student_course','student_id','course_id');
    }
    function user(){
        return $this->belongsToMany(User::class,'student_course','student_id','user_id');
    }
    public function student_course()
    {
        return $this->hasMany(StudentCourse::class, 'student_id', 'id');
    }
    function lesson_student(){
        return $this->hasMany(LessonStudent::class,'student_id','id');
    }
    function qas(){
        return $this->hasMany(QuestionAnswer::class,'student_id','id');
    }
}
