<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\MainController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\StudentWhitlist;
use App\Models\StudentCourse;
use App\Models\LessonStudent;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;
class StudentLessonController extends MainController
{
    public function index()
    {
        $student = Auth::guard('students')->user();

        $lessons = $student->lessons()->where('lessons.site_id', $this->site_id)->get();
        return view('website.dashboards.lessons.index', compact('student', 'lessons'));
    }

    public function watching()
    {
        $student = Auth::guard('students')->user();
        $lessons = $student->incomplete_lessons()->where('lessons.site_id', $this->site_id)->get();
        // dd($lessons);
        return view('website.dashboards.currently-watching.index', compact('student', 'lessons'));
    }

    public function whitlist()
    {
        $student = Auth::guard('students')->user();

        $lessons = $student->whitlist_lessons()->where('lessons.site_id', $this->site_id)->get();
        return view('website.dashboards.saved.index', compact('student', 'lessons'));
    }

    public function saved_whitlist($site_id,$id)
    {
        try {
            $student_id = Auth::guard('students')->id();
            $item = StudentWhitlist::where('student_id', $student_id)
                ->where('site_id', $site_id)
                ->where('lesson_id', $id)->first();
            if (!$item) {
                $item = new StudentWhitlist();
                $item->student_id = $student_id;
                $item->lesson_id = $id;
                $item->save();
                $type = 'add';
            }else{
                $item->delete();
                $type = 'remove';
            }    
            return response()->json([
                'success'=>true,
                'message'=> __('sys.update_item_success'),
                'type'=> $type
            ],200);
        } catch (QueryException $e) {
            Log::error('Bug occurred while adding to whitlist: ' . $e->getMessage());
            return response()->json([
                'success'=>false,
                'message'=> __('sys.update_item_error'),
            ],200);
        }
    }

    public function progress(){ 
        $student_id = Auth::guard('students')->id();
        $student_courses = StudentCourse::where('site_id',$this->site_id)
        ->where('student_id',$student_id)
        ->get();
        $courses = [];
        foreach($student_courses as $key => $student_course){
            //course_id
            $complete_lessons = LessonStudent::where('site_id',$this->site_id)
            ->where('student_id',$student_id)
            ->where('course_id',$student_course->course_id)
            ->where('is_complete',1)
            ->count();

            $total_lessons = LessonStudent::where('site_id',$this->site_id)
            ->where('student_id',$student_id)
            ->where('course_id',$student_course->course_id)
            ->count();

            $courses[$key]['course'] = $student_course;
            $courses[$key]['complete'] = $complete_lessons;
            $courses[$key]['total'] = $total_lessons;
        }

        return view('website.dashboards.progress.index',['courses'=>$courses]);
    }

}