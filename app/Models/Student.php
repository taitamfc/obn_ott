<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table = 'students';#
    function course(){
        return $this->belongsToMany(Course::class);
    }
    public function student_course()
    {
        return $this->hasMany(StudentCourse::class, 'student_id', 'id');
    }
}
