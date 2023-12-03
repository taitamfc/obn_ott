<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Grade extends Model
{
    use HasFactory;
    protected $table = 'grades';
    
    const ACTIVE = 1;
    const INACTIVE = 0;

    protected $fillable = [
        'name',
        'description',
        'site_id',
        'position',
        'status',
        'img',
        'created_at',
        'updated_at',
    ];

    //Relationship
    public function site(){
        return $this->belongsTo(Site::class);
    }

    // Feature
    public static function getActiveItems($site_id){
        return self::where('site_id',$site_id)->where('status',self::ACTIVE)->get();
    }
    // status_fm 
    function getStatusFmAttribute(){
        if($this->status == self::INACTIVE){
            return '<span class="badge badge-warning">In Active</span>';
        }else{
            return '<span class="badge badge-success">Active</span>';
        }
    }

    // date_created_fm 
    function getDateCreatedFmAttribute(){
        return $this->created_at ? date('d-m-Y',strtotime($this->created_at)) : '';
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