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

        $student = Auth::guard('students')->user();
        $incomplete_lessons = $student->incomplete_lessons;
        $lessons = Lesson::orderBy('id', 'desc')->limit(6)->get();
        $grades = Grade::getActiveItems($this->site_id);
        $params = [
            'grades' => $grades,
            'new_lessons' => $lessons,
            'incomplete_lessons' => $incomplete_lessons
        ];
        return view('website.homes.index',$params);
    }
}
