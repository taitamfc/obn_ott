<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LessonStudent extends Model
{
    use HasFactory;
    protected $fillable = [
        'is_complete',
    ];
    protected $table = 'lesson_student';
    function lesson(){
        return $this->belongsTo(Lesson::class,'lesson_id','id');
    }
    function course(){
        return $this->belongsTo(Course::class,'course_id','id');  
    }
    function student(){
        return $this->belongsTo(Student::class,'student_id','id');
    }
    function grade(){
        return $this->belongsTo(Grade::class,'grade_id','id');
    }
    function site(){
        return $this->belongsTo(Site::class);
    }
    function is_complete(){
        return isset($this->is_complete) ? ($this->is_complete==0? "<span class='badge badge-warning'>NO</span>" : "<span class='badge badge-success'>YES</span>" ) : '';
    }
}