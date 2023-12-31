<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LessonCourse extends Model
{
    use HasFactory;
    protected $table='lesson_course';
    protected $fillable = [
        'lesson_id',
        'subject_id',
        'grade_id',
        'course_id',
        'site_id',
    ];
    function site(){
        return $this->belongsTo(Site::class);
    }
    function course(){
        return $this->belongsTo(Course::class);
    }
    function lesson(){
        return $this->belongsTo(Lesson::class);
    }
}