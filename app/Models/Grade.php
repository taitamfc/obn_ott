<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;
    protected $table = 'grades';
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
    public function lesson()
    {
        return $this->hasMany(Lesson::class, 'grade_id', 'id');
    }
}
