<?php
   
namespace App\Http\Controllers\Admin;

   
use App\Models\Event;
use App\Models\Grade;
use Illuminate\Http\Request;
use Redirect,Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use App\Models\QuestionAnswer;
use App\Http\Requests\StoreEventRequest;

use App\Models\Student;
use App\Models\Visitor;
use App\Models\Impression;
use App\Models\Order;
use App\Models\Course;
use App\Models\LessonStudent;
use App\Models\Notice;

class HomeController extends AdminController
{
    public function index(Request $request)
    {
        $grade_id = $request->grade;

        $courses = Course::getActiveItems($this->site_id);
        $grades = Grade::getActiveItems($this->site_id);

        $grade_selected = "";
        foreach ($grades as $grade){
            if($grade->id == $grade_id){
                $grade_selected = $grade->name;
            }
        }
        // Reports
        $queryVisistor      = Visitor::where('site_id',$this->site_id);
        $queryImpression    = Impression::where('site_id',$this->site_id);
        $querySale          = Order::where('site_id',$this->site_id);
        $queryStudent       = Student::where('students.site_id',$this->site_id);
        $queryCourse       = Course::where('site_id',$this->site_id);
        if($grade_id){
            $queryVisistor->where('grade_id',$grade_id);
            $queryImpression->where('grade_id',$grade_id);
            $querySale->whereHas('order_grades', function($query) use ($grade_id) {
                $query->where('grade_id', $grade_id);
            });
            $queryStudent->join('lesson_student', 'students.id', '=', 'lesson_student.student_id')->where('lesson_student.grade_id',$grade_id);
        }
        $totalVisistor      = $queryVisistor->first() ? $queryVisistor->first()->amount : 0;
        $totalImpression    = $queryImpression->first() ? $queryImpression->first()->amount : 0;
        $totalSales         = number_format($querySale->sum('price'));
        $totalStudents      = $queryStudent->count();
        $totalClasses       = $queryCourse->count();

        // Qas

        /* --------------------
        Data question */
        $qas = QuestionAnswer::where('site_id',$this->site_id)->with('student');
        $qas = $qas->limit(5)->get();
        /* End data question*/
        // Data calender
        if(request()->ajax()) 
        {
            $start = (!empty($_GET["start"])) ? ($_GET["start"]) : ('');
            $end = (!empty($_GET["end"])) ? ($_GET["end"]) : ('');
            $data = Event::whereDate('start', '>=', $start)
            ->whereDate('end','<=', $end)
            ->where('site_id',$this->site_id)
            ->get(['id','title','start', 'end']);
            return Response::json($data);
        }
        $params = [
            'qas'               => $qas,
            'grades'            => $grades,
            'grade_selected'    => $grade_selected,
            'totalVisistor'     => $totalVisistor,
            'totalImpression'   => $totalImpression,
            'totalSales'        => $totalSales,
            'totalStudents'     => $totalStudents,
            'totalClasses'      => $totalClasses,
            'courses'           => $courses,
        ];
        return view('admin.homes.index',$params);
    }
    // Create event
    public function store(StoreEventRequest $request)
    {  
        DB::beginTransaction();
        try {
            $event              = new Event();
            $event->title       = $request->title;
            $event->content     = $request->content;
            $event->start       = $request->start;
            $event->end         = $request->end;
            $event->course_id   = $request->course_id;
            $event->site_id     = $this->site_id;
            if($event->save()){
                // Send to all students
                $students = LessonStudent::where('site_id',$this->site_id);
                if($event->course_id){
                    $students->where('course_id',$event->course_id);
                }
                $students = $students->get();
                if( $students ){
                    $student_ids = $students->unique('student_id')->pluck('student_id')->toArray();
                    foreach($student_ids as $student_id){
                        $notice = new Notice();
                        $notice->title       = $request->title;
                        $notice->content     = $request->content;
                        $notice->student_id  = $student_id;
                        $notice->start       = $request->start;
                        $notice->end         = $request->end;
                        $notice->site_id     = $this->site_id;
                        $notice->save();
                    }
                }
            } 
            DB::commit();
            return response()->json([
                'success'=>true,
                'data' => $event,
                'message'=> __('sys.store_item_success'),
            ],200);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([
                'success'=>true,
                'data' => $event,
                'message'=> __('sys.store_item_error'),
            ],200);
        }
         
        
    }

    // Update Event
    public function update(Request $request)
    {   
        $where = array('id' => $request->id);
        $updateArr = ['title' => $request->title,'start' => $request->start, 'end' => $request->end];
        $event  = Event::where($where)->update($updateArr);
        return Response::json($event);
    } 

    //Delete event
    public function destroy(Request $request)
    {
        $event = Event::where('id',$request->id)->delete();
        return Response::json($event);
    }    
}