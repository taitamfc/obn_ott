<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\StudentCourse;
use App\Models\Course;
use App\Models\Student;
use App\Models\LessonStudent;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class ClassController extends Controller
{
    function index(Request $request){
        $courses = Course::where('user_id',Auth::user()->id)->get();
        $query = DB::table('lesson_student')
        ->join('students', 'students.id', '=', 'lesson_student.student_id')
        ->select('students.name', DB::raw('COUNT(DISTINCT CONCAT(lesson_id, "-", course_id)) as total_lessons'), DB::raw('MAX(last_view) as last_view'))
        ->groupBy('students.name');
        if ($request->course) {
            $query->where('course_id',$request->course);
        }
        $items = $query->get();
        return view('class.index',compact('courses','items'));
    }

    function students(Request $request){
        try {
            $query = StudentCourse::where('user_id',Auth::user()->id)->with('student','course');
            if ($request->searchName) {
                $query->whereHas('student', function ($query) use ($request) {
                    $query->where('name', 'LIKE', '%' . $request->searchName . '%');
                });
            }
            $items = $query->paginate(5);
            return view('class.student',compact('items'));
        } catch (QueryException  $e) {
            Log::error('Bug occurred: ' . $e->getMessage());
            return response()->json([
                'success'=>false,
                'message'=> 'Save not success'
            ],200);
        }
    }

    function show(String $id){
        $items = LessonStudent::with('lesson','course')->where('student_id',$id)->paginate(5);
        return view('class.show',compact('items'));
    }

    function destroy(String $id){
        try {
            StudentCourse::destroy($id);
            return response([
                'success' => true,
                'message' => 'Delete success '.$id
            ]);
        } catch (QueryException $e) {
            Log::error('Bug occurred: ' . $e->getMessage());
            return response()->json([
                'success'=>false,
                'message'=> 'Save not success'
            ],200);
        }
    }
}