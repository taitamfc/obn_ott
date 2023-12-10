<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\MainController;
use Illuminate\Http\Request;
use App\Models\Grade;
use App\Models\Lesson;
use Illuminate\Support\Facades\Auth;
class HomeController extends MainController
{
    public function index(){

        if(Auth::guard('students')->user()){
            $student = Auth::guard('students')->user();
            $incomplete_lessons = $student->incomplete_lessons()
            ->where('lesson_student.site_id', $this->site_id) 
            ->get();

            $new_lessons = Lesson::where('site_id', $this->site_id)->orderBy('id', 'desc')->limit(6)->get();
        }else{
            $incomplete_lessons =[];
            $new_lessons =[];
        }
       
        $grades = Grade::getActiveItems($this->site_id);
        $params = [
            'grades' => $grades,
            'new_lessons' => $new_lessons,
            'incomplete_lessons' => $incomplete_lessons
        ];
        return view('website.homes.index',$params);
    }
}
