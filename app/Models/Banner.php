<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
    protected $table = 'banners';
    protected $fillable = [
        'name',
        'description',
        'user_id',
        'img', 
        'video_url', 
        'link',
        'status',
        'createt_at',
        'updated_at',
    ];
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

    function getVideoFmAttribute()
    {  
        if ($this->video_url) {
            return 
            '<video class="col-9" controls>
                <source src="'.asset($this->video_url).'"  type="video/mp4">
            </video>';
        } else {
            return '';
        }
    }
}