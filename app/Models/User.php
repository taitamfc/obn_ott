<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Traits\HasPermissions;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasPermissions;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'users';
    protected $fillable = [
        'name',
        'email',
        'password',
        'group_id',
        'parent_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    //Relationship
    public function site(){
        return $this->hasMany(Site::class, 'user_id', 'id');
    }
    public function sites(){
        return $this->belongsToMany(Site::class, 'user_manage_site', 'user_id', 'site_id');
    }
    public function userbank(){
        return $this->hasMany(UserBank::class, 'user_id', 'id');
    }
    public function groupsite(){
        return $this->hasMany(GroupSite::class, 'user_id', 'id');
    }
    public function groups(){
        return $this->belongsToMany(Group::class, 'group_site', 'user_id', 'group_id');
    }
    function plan_order(){
        return $this->hasMany(PlanOrder::class);
    }
    public function group(){
        return $this->belongsTo(Group::class);
    }
    //Feature
    public function getGroupNamesAttribute()
    {
        return $this->group ? $this->group->name : '';
    }
    public function getImageUrlFmAttribute()
    {
        return $this->image_url ? $this->image_url : asset('assets/images/default.png');
    }
    public function defaultsite(){
        return $this->belongsTo(Site::class,'site_id','id');
    }
}