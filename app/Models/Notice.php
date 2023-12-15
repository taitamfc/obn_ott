<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    use HasFactory;
    protected $table = 'notices';
    protected $fillable = ['student_id', 'site_id', 'type', 'action', 'is_read', 'item_id'];
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
    function getItemNameAttribute(){
        $item_name = '';
        switch ($this->type) {
            case 'new_faq':
                $item_name = 'New faq';
                break;
            case 'new_order':
                $item_name = 'New order';
                break;
            
            default:
                # code...
                break;
        }
        return $item_name;
    }
}