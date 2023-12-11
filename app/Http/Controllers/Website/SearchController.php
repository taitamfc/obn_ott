<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\MainController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Lesson;
use App\Models\Course;
use App\Models\Subject;
use App\Models\Grade;
use App\Models\Subscription;

class SearchController extends MainController
{
    public function index(Request $request){
        $student = Auth::guard('students')->user();
        $s = $request->search;

        $lessons = Lesson::where('site_id', $this->site_id)->where('status',Lesson::ACTIVE)->where('name','LIKE','%'.$s.'%')->get();
        $courses = Course::where('site_id', $this->site_id)->where('status',Course::ACTIVE)->where('name','LIKE','%'.$s.'%')->get();
        $subjects = Subject::where('site_id', $this->site_id)->where('status',Subject::ACTIVE)->where('name','LIKE','%'.$s.'%')->get();
        $params = [
            'lessons'  => $lessons,
            'courses' => $courses,
            'subjects' => $subjects,
        ];

        return view('website.searchs.index',$params);
    }
}
