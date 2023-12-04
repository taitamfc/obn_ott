<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Group extends Model
{
    use HasFactory;
    protected $table = 'groups';

    const ACTIVE = 1;
    const INACTIVE = 0;
    
    protected $fillable = [
        'name',
        'status',
        'created_at',
        'updated_at',
    ];

    //Relationship
    public function users()
    {
        return $this->belongsToMany(User::class,'group_site','user_id','group_id');
    }

    public function sites()
    {
        return $this->belongsToMany(Site::class,'group_site');
    }

    public function site()
    {
        return $this->belongsTo(Site::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'group_role', 'group_id', 'role_id');
    }

    //Feature
    public static function getActiveItems(){
        return self::where('user_id',Auth::id())->where('status',self::ACTIVE)->get();
    }
}