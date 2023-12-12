<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    use HasFactory;
    protected $table = 'transactions';
    const ACTIVE = 1;
    const INACTIVE = 0;
    function order(){
        $this->belongsTo(Order::class);
    }
}