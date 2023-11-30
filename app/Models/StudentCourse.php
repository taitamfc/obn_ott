<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentCourse extends Model
{
    use HasFactory;
    protected $table='student_course';
    // Relationship
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }
    public function site()
    {
        return $this->belongsTo(Site::class);
    }

    // Feature
    function statusDisplay()
    {  
        return isset($this->student->status) ? ($this->student->status==0? '<span class="badge badge-warning">In Active</span>' : '<span class="badge badge-success">Active</span>' ) : '';
    }
    function studentName()
    {
        return isset($this->student)? $this->student->name : '';
    }
    function studentCode()
    {
        return isset($this->student)? $this->student->code : '';
    }
    function studentEmail()
    {
        return isset($this->student)? $this->student->email : '';
    }
    function studentCourse()
    {
        return isset($this->course)? $this->course->name : '';
    }
    function studentDate()
    {
        return isset($this->student)? $this->student->created_at : '';
    }
}