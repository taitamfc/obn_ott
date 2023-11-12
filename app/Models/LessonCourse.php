<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LessonCourse extends Model
{
    use HasFactory;
    protected $table='lesson_course';
    function course_lesson(){
        return $this->belongsTo(Course::class,'course_id','id');
    }
    function lesson_course(){
        return $this->belongsTo(Lesson::class,'lesson_id','id');
    }
}