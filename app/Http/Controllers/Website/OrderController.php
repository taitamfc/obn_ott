<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\MainController;
use Illuminate\Http\Request;
use App\Models\Course;

class OrderController extends MainController
{
    public function create($site_id,$course_id){
        $course = Course::find($course_id);
        $params = [
            'item' => $course
        ];
        return view('website.orders.create',$params);
    }
}
