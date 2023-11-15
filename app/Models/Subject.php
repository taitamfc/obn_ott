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
        'user_id',
        'position',
        'status',
        'img',
        'createt_at',
        'updated_at',
    ];
    public static function getActiveItems(){
        return self::where('user_id',Auth::id())->where('status',self::ACTIVE)->get();
    }
    
    public function lesson()
    {
        return $this->hasMany(Lesson::class, 'subject_id', 'id');
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
        if ($this->img) {
            return '<img class="avatar-md" src="'.asset($this->img).'" alt="">';
        } else {
            return '<img src="'.asset('images/default.jpg').'" alt="">';
        }
    }
}
