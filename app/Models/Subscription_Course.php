<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription_Course extends Model
{
    use HasFactory;
    protected $table = 'subscription_course';
    protected $fillable = [
        'course_id',
        'subscription_id',
        'createt_at',
        'updated_at',
    ];
}
