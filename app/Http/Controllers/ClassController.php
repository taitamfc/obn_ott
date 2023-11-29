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
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            $this->user_id = Auth::id();
            $this->parent_id = Auth::user()->parent_id;
            return $next($request);
        });
    }

    function index(Request $request){
        $courses = Course::where('user_id',$this->user_id)->get();
        if ($request->ajax()) {
            $query = DB::table('lesson_student')
            ->join('students', 'students.id', '=', 'lesson_student.student_id')
            ->select('students.name', DB::raw('COUNT(DISTINCT CONCAT(lesson_id, "-", course_id)) as total_lessons'), DB::raw('MAX(last_view) as last_view'))
            ->groupBy('students.name');
            if ($request->course) {
                $query->where('course_id',$request->course);
            }
            $items = $query->get();
            return view('admin.class.ajax-index',compact('courses','items'));
        }
        return view('admin.class.index',compact('courses'));
    }

    function students(Request $request){
        try {
            if ($request->ajax()) {
                $query = StudentCourse::where('user_id',$this->user_id)->orWhere('user_id',$this->parent_id)->with('student','course');
                if ($request->searchName) {
                    $query->whereHas('student', function ($query) use ($request) {
                        $query->where('name', 'LIKE', '%' . $request->searchName . '%');
                    });
                }
                $items = $query->paginate(5);
                return view('admin.class.students.ajax-index',compact('items'));
            }
            return view('admin.class.students.index');
        } catch (QueryException  $e) {
            Log::error('Bug occurred: ' . $e->getMessage());
            return response()->json([
                'success'=>false,
                'message'=> 'Save not success'
            ],200);
        }
    }

    function show(String $id){
        $lessonHistory = LessonStudent::with('lesson','course')->where('student_id',$id)->paginate(5);
        $transactionHistory = DB::table('transactions')
        ->join('courses', 'courses.id', '=', 'transactions.course_id')
        ->select('courses.name', DB::raw('DATE(transactions.created_at) as date'), DB::raw('COUNT(*) as total_sales'))
        ->where('transactions.user_id', '=', Auth::id())
        ->where('student_id', '=',$id)
        ->groupBy('course_id', 'date')
        ->get();
        $informationStudent = Student::findOrfail($id);
        $items = [
            'lessonHistory' => $lessonHistory,
            'transactionHistory' =>$transactionHistory,
            'informationStudent' => $informationStudent
        ];
        return view('admin.class.students.show',compact('items'));
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