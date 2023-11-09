<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;
    protected $table = 'lessons';
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
    public function grade()
    {
        return $this->belongsTo(Grade::class, 'grade_id', 'id');
    }
    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id', 'id');
    }
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
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
        return isset($this->status) ? ($this->status==0? 'Active' : 'Inactive' ) : '';
    }
}