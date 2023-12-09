<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

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

    // Feature
    const ACTIVE = 1;
    const INACTIVE = 0;

    public static function getActiveItems($site_id){
        return self::where('site_id',$site_id)->where('status',self::ACTIVE)->get();
    }

    // status_fm 
    function getStatusFmAttribute(){
        if($this->status == self::INACTIVE){
            return '<span class="badge badge-warning">In Active</span>';
        }else{
            return '<span class="badge badge-success">Active</span>';
        }
    }

    function getPriceFmAttribute()
    {  
        $formattedPrice = '$' . number_format($this->price);
        return $formattedPrice;
    }
    function getImageUrlAttribute()
    {  
        return asset('assets/images/default.png');
    }

    function getIsBoughtAttribute(){
        $student_id = Auth::guard('students')->id();
        if($student_id){
            return StudentSubscription::where('subscription_id',$this->id)->where('student_id', $student_id)->exists();
        }
        return false;
    } 
}