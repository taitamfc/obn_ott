<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    use HasFactory;
    public static function increase($site_id,$grade_id = 0){
        $query = self::where('site_id',$site_id);
        if($grade_id){
            $query->where('grade_id',$grade_id);
        }
        $item = $query->first();
        if($item){
            $item->increment('amount', 1);
        }else{
            $item = new self;
            $item->site_id = $site_id;
            $item->grade_id = $grade_id;
            $item->amount = 1;
            $item->save();
        }
    }
    public static function decrease($site_id,$grade_id = 0){
        $query = self::where('site_id',$site_id);
        if($grade_id){
            $query->where('grade_id',$grade_id);
        }
        $query->decrement('amount', 1);
    }
}
