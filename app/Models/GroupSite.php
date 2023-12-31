<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupSite extends Model
{
    use HasFactory;
    protected $table = 'group_site';
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function site(){
        return $this->belongsTo(Site::class);
    }
    public function group(){
        return $this->belongsTo(Group::class);
    }
}