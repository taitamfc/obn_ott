<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\StudentCourse;
use App\Models\Course;
use App\Models\Subscription;
use App\Models\Student;
use App\Models\Order;
use App\Models\LessonStudent;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class ClassController extends AdminController
{

    function index(Request $request){
        $courses = Course::where('site_id',$this->site_id)->get();
        if ($request->ajax()) {
            $query = DB::table('lesson_student')
            ->join('students', 'students.id', '=', 'lesson_student.student_id')
            ->select('students.id', 'students.name', DB::raw('COUNT(DISTINCT CONCAT(lesson_id, "-", course_id)) as total_lessons'), DB::raw('MAX(last_view) as last_view'))
            ->groupBy('students.id','students.name');
            if ($request->course) {
                $query->where('course_id',$request->course);
            }
            $query->where('lesson_student.site_id',$this->site_id);
            $items = $query->get();
            return view('admin.class.ajax-index',compact('courses','items'));
        }
        return view('admin.class.index',compact('courses'));
    }

    function students(Request $request){
        try {
            if ($request->ajax()) {
                $query = StudentCourse::where('site_id',$this->site_id)->with('student','course');
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
        // $transactionHistory = DB::table('transactions')
        // ->join('courses', 'courses.id', '=', 'transactions.course_id')
        // ->select('courses.name', DB::raw('DATE(transactions.created_at) as date'), DB::raw('COUNT(*) as total_sales'))
        // ->where('transactions.site_id', '=', $this->site_id)
        // ->where('student_id', '=',$id)
        // ->groupBy('course_id', 'date')
        // ->get();
        $transactionHistory = Order::where('site_id',$this->site_id)->where('student_id',$id)->get();
        foreach($transactionHistory as $transactionHis){
            if($transactionHis->type == 'course'){
                $transactionHis->name = Course::find($transactionHis->item_id)->name;
            }else{
                $transactionHis->name = Subscription::find($transactionHis->item_id)->name;
            }
        }
        
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