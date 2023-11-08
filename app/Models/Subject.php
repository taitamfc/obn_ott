<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $table = 'subjects';
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
        return $this->hasMany(Lesson::class, 'subject_id', 'id');
    }
}
