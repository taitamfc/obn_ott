<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Subject extends Model
{
    use HasFactory;
    protected $table = 'subjects';
    protected $fillable = [
        'name',
        'description',
        'site_id',
        'position',
        'status',
        'img',
        'createt_at',
        'updated_at',
    ];

    // Relationship    
    public function lesson()
    {
        return $this->hasMany(Lesson::class, 'subject_id', 'id');
    }
    public function lessons()
    {
        return $this->hasMany(Lesson::class, 'subject_id', 'id')->where('status',Lesson::ACTIVE);
    }
    public function site()
    {
        return $this->belongsTo(Site::class);
    }
    // Feature method
    public static function getActiveItems($site_id){
        return self::where('site_id',$site_id)->where('status',self::ACTIVE)->get();
    }
    const ACTIVE = 1;
    const INACTIVE = 0;
    
    // status_fm 
    function getStatusFmAttribute(){
        if($this->status == self::INACTIVE){
            return '<span class="badge badge-warning">In Active</span>';
        }else{
            return '<span class="badge badge-success">Active</span>';
        }
    }
    function getImgFmAttribute()
    {  
        if (!empty($this->img)) {
            return '<img class="avatar-md" src="'.asset($this->img).'" alt="">';
        } else {
            return '<img class="avatar-md" src="'.asset('assets/images/default.png').'" alt="">';
        }
    }
}