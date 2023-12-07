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
        'duration_id',
        'site_id',
        'createt_at',
        'updated_at',
    ];

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'subscription_course', 'subscription_id', 'course_id');
    }
    public function subscriptioncourse()
    {
        return $this->hasMany(SubscriptionCourse::class);
    }
    public function site()
    {
        return $this->belongsTo(Site::class);
    }
    public function transaction()
    {
        return $this->hasMany(Transaction::class);
    }
    function orders(){
        return $this->hasMany(Order::class, 'item_id','id');
    }
    function duration(){
        return $this->belongsTo(Duration::class);
    }

    //Feature 
    function getDurationNameAttribute(){
        return isset($this->duration)? $this->duration->name : '';
    }
}