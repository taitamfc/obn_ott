<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionAnswer extends Model
{
    use HasFactory;
    protected $table = 'qas';
    function student(){
        return $this->belongsTo(Student::class,'student_id','id');
    }
    function site(){
        return $this->belongsTo(Site::class);
    }
}