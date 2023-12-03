<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\MainController;
use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends MainController
{
    public function index($site_name){
        $items = Course::where('site_id',$this->site_id)->where('status',Course::ACTIVE)->get();
        $params = [
            'items' => $items
        ];
        return view('website.courses.index',$params);
    }
}
