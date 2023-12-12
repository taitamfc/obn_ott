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

use App\Models\Student;
use App\Models\Visitor;
use App\Models\Impression;
use App\Models\Order;
use App\Models\Course;

class HomeController extends AdminController
{
    public function index(Request $request)
    {
        $grade_id = $request->grade;

        $grades = Grade::where('site_id',$this->site_id)
        ->where('status',Grade::ACTIVE)
        ->get();
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
            $data = Event::whereDate('start', '>=', $start)->whereDate('end','<=', $end)->get(['id','title','start', 'end']);
            return Response::json($data);
        }
        $params = [
            'qas'               => $qas,
            'grades'            => $grades,
            'totalVisistor'     => $totalVisistor,
            'totalImpression'   => $totalImpression,
            'totalSales'        => $totalSales,
            'totalStudents'     => $totalStudents,
            'totalClasses'      => $totalClasses
        ];
        return view('admin.homes.index',$params);
    }
    // Create event
    public function store(Request $request)
    {  
        $insertArr = [ 'title' => $request->title,
                       'start' => $request->start,
                       'end' => $request->end,
                       'site_id' => $this->site_id,
                    ];
        $event = Event::insert($insertArr);   
        return Response::json($event);
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