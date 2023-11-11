<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $table = 'roles';
    protected $fillable = [
        'name',
        'group_name',
        'created_at',
        'updated_at',
    ];
    public function groups()
    {
        return $this->belongsToMany(Group::class, 'group_role', 'role_id', 'group_id');
    }
}
