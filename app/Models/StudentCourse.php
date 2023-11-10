<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentCourse extends Model
{
    use HasFactory;
    protected $table='student_course';
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }
    function statusDisplay()
    {  
        return isset($this->student->status) ? ($this->student->status==0? '<span class="badge badge-warning">In Active</span>' : '<span class="badge badge-success">Active</span>' ) : '';
    }
}