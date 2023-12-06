<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\MainController;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Lesson;
use Auth;

class CourseController extends MainController
{
    public function index($site_name){
        $items = Course::where('site_id',$this->site_id)->where('status',Course::ACTIVE)->get();
        
        $params = [
            'items' => $items
        ];
        return view('website.courses.index',$params);
    }

    public function show($site_name,$id){
        $item = Course::find($id);
        $items = Lesson::where('course_id',$id)->where('site_id',$this->site_id)->get();
        $params = [
            'item' => $item,
            'items' => $items
        ];
        return view('website.courses.show',$params);
    }
}
