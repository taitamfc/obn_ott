<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;
    protected $table = 'groups';
    protected $fillable = [
        'name',
        'status',
        'created_at',
        'updated_at',
    ];
    public function users()
    {
        return $this->hasMany(User::class, 'group_id');
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'group_role', 'group_id', 'role_id');
    }
    const ACTIVE = 1;
    const INACTIVE = 0;
}
