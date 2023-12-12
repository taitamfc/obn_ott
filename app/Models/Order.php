<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    function site()
    {
        return $this->belongsTo(Site::class);
    }
    function course()
    {
        return $this->belongsTo(Course::class,'item_id','id');
    }
    function subscription()
    {
        return $this->belongsTo(Subscription::class,'item_id','id');
    }
    function Transaction(){
        $this->hasMany(Transactions::class);
    }
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function getItemNameAttribute()
    {
        $name = null;
        switch ($this->type) {
            case 'course':
                $name = $this->course ? $this->course->name : '';
                break;
            case 'subscription':
                $name = $this->subscription ? $this->subscription->name : '';
                break;
        }
        return $name;
    }
    function order_grades(){
        return $this->hasMany(OrderGrade::class);
    }
}