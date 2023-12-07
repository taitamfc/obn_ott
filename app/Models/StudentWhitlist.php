<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Traits\HasPermissions;
class StudentWhitlist extends Model
{
    use HasApiTokens, HasFactory, Notifiable, HasPermissions;


    protected $table = 'student_whitlist';
}
