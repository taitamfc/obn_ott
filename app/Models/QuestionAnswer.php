<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionAnswer extends Model
{
    use HasFactory;
    protected $table = 'qas';
    // RelationShip
    function student(){
        return $this->belongsTo(Student::class,'student_id','id');
    }
    function site(){
        return $this->belongsTo(Site::class);
    }
    function user(){
        return $this->belongsTo(User::class);
    }
    function lesson(){
        return $this->belongsTo(Lesson::class);
    }
    function subject(){
        return $this->belongsTo(Subject::class);
    }

    //Feature 
    function GetUserNameAttribute(){
        return isset($this->user) ? $this->user->name : '';
    }
    function GetLessonNameAttribute(){
        return isset($this->lesson) ? $this->lesson->name : '';
    }
    function GetSubjectNameAttribute(){
        return isset($this->subject) ? $this->subject->name : '';
    }
}