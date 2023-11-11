<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;
    protected $table = 'subscriptions';
    protected $fillable = [
        'name',
        'price',
        'duration',
        'createt_at',
        'updated_at',
    ];

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'subscription_course', 'subscription_id', 'course_id');
    }
}
