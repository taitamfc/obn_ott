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
        // $query = DB::table('student_course')
        //     ->leftJoin('lesson_student', function ($join) {
        //         $join->on('student_course.student_id', '=', 'lesson_student.student_id')
        //             ->on('student_course.course_id', '=', 'lesson_student.course_id')
        //             ->where('lesson_student.is_complete', '=', 1);
        //     })
        //     ->select('student_course.student_id', 'student_course.course_id', DB::raw('SUM(IF(lesson_student.is_complete = 1, 1, 0)) as count'))
        //     ->groupBy('student_course.student_id', 'student_course.course_id')
        //     ->join('students','students.id','=','student_course.student_id')
        //     ->join('courses','courses.id','=','student_course.student_id')
        //     ->select('students.id','students.name as student_name', 'courses.name as course_name', DB::raw('SUM(IF(lesson_student.is_complete = 1, 1, 0)) as count'));
        if ($request->ajax()) {
            $query = StudentCourse::with('student','course')->where('site_id',$this->site_id);
            $items = $query->get();
            foreach($items as $item) {
                $item->view_count = $item->course->lessonstudent()->where('is_complete',1)->count(); 
            }
            if ($request->course) {
                $query->where('course_id',$request->course);
            }
            $query->where('lesson_student.site_id',$this->site_id);
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