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
    public function subscriptions()
    {
        return $this->belongsToMany(Subscription::class, 'subscription_course', 'course_id', 'subscription_id');
    }
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
