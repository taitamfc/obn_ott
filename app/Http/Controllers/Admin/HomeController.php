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
use App\Models\Student;
use Illuminate\Support\Facades\Log;
use App\Models\QuestionAnswer;

class HomeController extends AdminController
{
    public function index(Request $request)
    {
        $grade_id = $request->grade;

        $grades = Grade::where('site_id',$this->site_id)
        ->where('status',Grade::ACTIVE)
        ->get();
        // Reports
        // $queryVisistor      = Visitor::where('site_id',$this->site_id);
        // $queryImpression    = Impression::where('site_id',$this->site_id);
        // $querySale          = Sale::where('site_id',$this->site_id);
        // $queryStudent       = Student::where('site_id',$this->site_id);
        // if($grade_id){
        //     $queryVisistor->where('grade_id',$grade_id);
        //     $queryImpression->where('grade_id',$grade_id);
        //     $querySale->where('grade_id',$grade_id);
        //     $queryStudent->where('grade_id',$grade_id);
        // }
        // $totalVisistor      = $queryVisistor->sum('amount');
        // $totalImpression    = $queryImpression->sum('amount');
        // $totalSales         = $querySale->sum('total');
        // $totalStudents      = $queryStudent->count();
        // $totalClasses       = 0;

        $totalVisistor      = 0;
        $totalImpression    = 0;
        $totalSales         = 0;
        $totalStudents      = 0;
        $totalClasses       = 0;
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