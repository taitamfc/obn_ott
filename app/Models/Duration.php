<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Duration extends Model
{
    use HasFactory;
    protected $table = 'durations';
    protected $fillable = [
        'name',
        'number_days',
        'site_id'
    ];
    function site(){
        return $this->belongsTo(Site::class);
    }
    function subscriptions(){
        return $this->hasMany(Subscription::class);
    }
}