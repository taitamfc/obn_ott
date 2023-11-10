<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $table = 'courses';
    public function lesson()
    {
        return $this->hasMany(Lesson::class, 'course_id', 'id');
    }
    function student(){
        return $this->belongsToMany(Student::class);
    }
    public function student_course()
    {
        return $this->hasMany(StudentCourse::class, 'course_id', 'id');
    }
    function lesson_student(){
        return $this->hasMany(LessonStudent::class,'course_id','id');
    }
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

    const ACTIVE = 1;
    const INACTIVE = 0;

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
        if ($this->img) {
            return '<img class="avatar-md" src="'.asset($this->img).'" alt="">';
        } else {
            return '<img src="'.asset('images/default.jpg').'" alt="">';
        }
    }
}