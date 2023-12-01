<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;
    protected $table = 'pages';
    protected $fillable = [
        'title',
        'slug',
        'description',
        'site_id',
        'status'
    ];
    //Relationship
    public function site(){
        return $this->belongsTo(Site::class);
    }
    
    // Feature
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
}