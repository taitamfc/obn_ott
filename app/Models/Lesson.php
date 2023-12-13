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

    function getImageUrlFmAttribute(){
        if ($this->image_url) {
            return asset($this->image_url);
        } else {
            return asset('assets/images/default.png');
        }
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
        if( $this->videoId && $this->encodeProgress == 100 ){
            $image_url = 'https://vz-7c456383-6b4.b-cdn.net/';
            $image_url .= $this->videoId;
            $image_url .= '/thumbnail.jpg';
            return '<img src="'.$image_url.'" alt="">';
        } elseif ($this->image_url) {
            return '<img class="avatar-md" src="'.asset($this->image_url).'" alt="">';
        } else {
            return '<img src="'.asset('images/default.jpg').'" alt="">';
        }
    }
    function getVideoFmAttribute()
    {  
        /*
        <iframe src="https://iframe.mediadelivery.net/embed/91253/b4f2ec3e-bfd3-4e22-8c14-bdb09c7903f8?&preload=true&responsive=true" allowfullscreen="true"></iframe>
        */
        if( $this->videoId && $this->encodeProgress == 100 ){
            $videoId        = $this->videoId;
            $videoLibraryId = $this->videoLibraryId;
            return '
            <iframe 
                src="https://iframe.mediadelivery.net/embed/'.$videoLibraryId.'/'.$videoId.'?&preload=true&responsive=true" 
                allowfullscreen="true">
            </iframe>
            ';
        }
        if ($this->video_url) {
            return 
            '<video controls>
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