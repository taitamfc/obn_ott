<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;
    protected $table = 'lessons';

    const ACTIVE = 1;
    const INACTIVE = 0;

    protected $fillable = [
        'name',
        'description',
        'user_id',
        'position',
        'status',
        'img',
        'createt_at',
        'updated_at',
    ];
    // Relationship
    public function grade()
    {
        return $this->belongsTo(Grade::class, 'grade_id', 'id');
    }
    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id', 'id');
    }
    function course(){
        return $this->belongsToMany(Course::class,'lesson_course','lesson_id','course_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    function lesson_student(){
        return $this->hasMany(LessonStudent::class,'lesson_id','id');
    }
    function lesson_course(){
        return $this->hasMany(LessonCourse::class,'lesson_id','id');
    }

    // Feature
    function getGrade(){
        return isset($this->grade) ? $this->grade->name : '';
    }
    function getSubject(){
        return isset($this->subject) ? $this->subject->name : '';
    }
    function getCourse(){
        return isset($this->course) ? $this->course->first()->name : '';
    }
    function getImgFmAttribute()
    {  
        if ($this->image_url) {
            return '<img class="avatar-md" src="'.asset($this->image_url).'" alt="">';
        } else {
            return '<img src="'.asset('images/default.jpg').'" alt="">';
        }
    }
    
    function getVideoFmAttribute()
    {  
        if ($this->video_url) {
            return 
            '<video class="col-9" controls>
                <source src="'.asset($this->video_url).'"  type="video/mp4">
            </video>';
        } else {
            return '';
        }
    }
    function statusDisplay()
    {  
        return isset($this->status) ? ($this->status==0? '<span class="badge badge-warning">In Active</span>' : '<span class="badge badge-success">Active</span>' ) : '';
    }
}