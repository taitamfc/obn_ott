<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserBank extends Model
{
    use HasFactory;
    protected $table = 'user_banks';
    protected $fillable = [
        'user_id',
        'bank_name',
        'bank_number',
        'bank_owner',
        'address',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}