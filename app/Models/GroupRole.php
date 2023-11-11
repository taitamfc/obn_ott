<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupRole extends Model
{
    use HasFactory;
    protected $table = 'group_role';
    protected $fillable = [
        'gruop_id',
        'role_id',
        'created_at',
        'updated_at',
    ];
}
