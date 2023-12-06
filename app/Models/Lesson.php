<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Lesson extends Model
{
    use HasFactory;
    protected $table = 'lessons';

    const ACTIVE = 1;
    const INACTIVE = 0;

    protected $fillable = [
        'name',
        'description',
        'site_id',
        'subject_id',
        'grade_id',
        'position',
        'status',
        'img',
        'createt_at',
        'updated_at',
    ];

    public function students()
    {
        return $this->belongsToMany(Student::class, 'lesson_student', 'lesson_id', 'student_id');
    
    }
    // Relationship
    public function course(){
        return $this->belongsTo(Course::class);
    }
    public function subject(){
        return $this->belongsTo(Subject::class);
    }
    public function grade(){
        return $this->belongsTo(Grade::class);
    }
    public function site(){
        return $this->belongsTo(Site::class);
    }
    public function lessoncourse(){
        return $this->hasMany(LessonCourse::class);
    }
    public function courses(){
        return $this->belongsToMany(Course::class, 'lesson_course');
    }
    public function lessonstudent(){
        return $this->hasMany(LessonStudent::class);
    }
   
    function qas(){
        return $this->hasMany(QuestionAnswer::class);
    }

    //is_added_whitlist
    function getIsAddedWhitlistAttribute(){
        $student_id = Auth::guard('students')->id();
        if($student_id){
            return StudentWhitlist::where('lesson_id',$this->id)->where('student_id', $student_id)->exists();
        }
        return false;
    } 
    //is_bought
    function getIsBoughtAttribute(){
        $student_id = Auth::guard('students')->id();
        if($student_id){
            return LessonStudent::where('lesson_id',$this->id)->where('student_id', $student_id)->exists();
        }
        return false;
    } 

    // Feature
    function getGrade(){
        return isset($this->grade) ? $this->grade->name : '';
    }
    function getSubject(){
        return isset($this->subject) ? $this->subject->name : '';
    }
    function getCourse(){
        return isset($this->course) ? $this->course->name : '';
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