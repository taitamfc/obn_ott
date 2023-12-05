<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    function site()
    {
        return $this->belongsTo(Site::class);
    }
    function course()
    {
        return $this->belongsTo(Course::class,'item_id','id');
    }
    function subscription()
    {
        return $this->belongsTo(Subscription::class,'item_id','id');
    }
    function Transaction(){
        $this->hasMany(Transactions::class);
    }
}