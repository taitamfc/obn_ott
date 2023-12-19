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
            $query = StudentCourse::with('student','course')->where('site_id',$this->site_id);
            $items = $query->get();
            foreach($items as $item) {
                $item->view_count = $item->course->lessonstudent()->where('is_complete',1)->count(); 
            }
            if ($request->course) {
                $query->where('course_id',$request->course);
            }
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
        $lessonHistory = LessonStudent::with('lesson','course')->where('student_id',$id)->orderBy('last_view','DESC')->paginate(5);
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