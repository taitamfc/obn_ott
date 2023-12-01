<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscriptionCourse extends Model
{
    use HasFactory;
    protected $table = 'subscription_course';
    protected $fillable = [
        'course_id',
        'subscription_id',
        'createt_at',
        'updated_at',
    ];
    public function site()
    {
        return $this->belongsTo(Site::class);
    }
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
    public function subscription()
    {
        return $this->belongsTo(Subscription::class);
    }
}