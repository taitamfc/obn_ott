<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentSubscription extends Model
{
    use HasFactory;
    protected $table = 'student_subscription';
    function site(){
        return $this->belongsTo(Site::class);
    }
    function student(){
        return $this->belongsTo(Student::class);
    }
    function subscription(){
        return $this->belongsTo(Subscription::class);
    }
}