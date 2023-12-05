<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentLessonController extends Controller
{
    public function index()
    {
        $student = Auth::guard('students')->user();

        $lessons = $student->lessons;
        return view('website.dashboards.lessons.index', compact('student', 'lessons'));
    }

    public function watching()
    {
        $student = Auth::guard('students')->user();

        $lessons = $student->incomplete_lessons;
        return view('website.dashboards.currently-watching.index', compact('student', 'lessons'));
    }

    public function whitlist()
    {
        $student = Auth::guard('students')->user();

        $lessons = $student->whitlist_lessons;
        return view('website.dashboards.saved.index', compact('student', 'lessons'));
    }
}
