<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $table = 'settings';
    protected $fillable = [
        'setting_name',
        'description',
        'setting_group',
        'createt_at',
        'updated_at',
    ];

    function getImgFmAttribute()
    {  
        if ($this->img) {
            return '<img class="avatar-md" src="'.asset($this->img).'" alt="">';
        } else {
            return '<img src="'.asset('images/default.jpg').'" alt="">';
        }
    }
}
