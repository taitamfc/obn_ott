<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table = 'students';
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
    public function students(){
        return $this->hasMany(UserBank::class);
    }
}