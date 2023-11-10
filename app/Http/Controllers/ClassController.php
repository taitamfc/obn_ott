<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\StudentCourse;
use App\Models\Course;
use App\Models\Student;
use App\Models\LessonStudent;
use Illuminate\Database\QueryException;

class ClassController extends Controller
{
    function index(Request $request){
        $courses = Course::where('user_id',Auth::user()->id)->get();
        $query = LessonStudent::with('student','lesson')->whereHas('course', function ($query){
            $query->where('user_id', Auth::user()->id);
        });
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
            $items = $query->get();
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