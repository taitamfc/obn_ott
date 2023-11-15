<?php
   
namespace App\Http\Controllers;
   
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

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            $this->user_id = Auth::id();
            return $next($request);
        });
    }  

    public function index(Request $request)
    
    {
        /* --------------------
        Data question */
        $qas = QuestionAnswer::where('user_id',$this->user_id)->with('student');
        if ($request->fromDate && $request->toDate) {
            $qas->whereBetween('created_at', [$request->fromDate, $request->toDate]);
        }
        $qas = $qas->paginate(5);
        /* End data question
        --------------------*/

        /* --------------------
        Report on month */
        $month = Carbon::now()->format('m');
        $year = Carbon::now()->format('Y');

        //If user want search report on month 
        if ($request->month) {
            $parts = explode(" ", $request->month);
            $month = $parts[0];
            $year = $parts[1];
            // New student on month
        }
        /* End report on month  
        --------------------*/

        if ($request->grade) {
            /* --------------------
            Report for grade */
            $reports = DB::table('grades')
                ->where('grades.id', $request->grade)
                ->where('grades.status', 1)
                ->where('grades.user_id', $this->user_id)
                ->join('users', 'grades.user_id', '=', 'users.id')
                ->join('student_course', 'users.id', '=', 'student_course.user_id')
                ->join('lesson_student', 'student_course.course_id', '=', 'lesson_student.course_id')
                ->select('student_course.course_id', DB::raw('COUNT(lesson_student.lesson_id) AS lesson_views'))
                ->where(DB::raw('MONTH(student_course.created_at)'), $month)
                ->where(DB::raw('YEAR(student_course.created_at)'), $year)
                ->groupBy('student_course.course_id');
            // new student
            $newUsersCount = $reports->get()->count();
            // Sold course
            $soldCoursesCount = $reports->get()->count();
            // Count view lesson
            $viewCounts = $reports->get();
            $totalLessonViews = 0;
            foreach ($viewCounts as $viewCount) {
                $totalLessonViews += $viewCount->lesson_views;
            }
            // Complete lesson
            $completedLessonsCount = $reports->where('student_course.is_complete', 1)->get()->count();
            $param = [
                'reports' => [
                    'newUsersCount' => [
                        'content' => 'New Users',
                        'data' => $newUsersCount,
                    ],
                    'soldCoursesCount' => [
                        'content' => 'Course Sold',
                        'data' => $soldCoursesCount,
                    ],
                    'viewCount' => [
                        'content' => 'Count View Lesson',
                        'data' => $totalLessonViews,
                    ],
                    'completedLessonsCount' => [
                        'content' => 'Count Course Complete',
                        'data' => $completedLessonsCount,
                    ],
                ],
                'qas' => $qas,
                'grades' => Grade::where('user_id',$this->user_id)->get(),
            ];
            /* End report for grade
            --------------------*/
        }else {
            $newUsersCount = DB::table('student_course')
                ->where(DB::raw('MONTH(created_at)'), $month)
                ->where(DB::raw('YEAR(created_at)'), $year)
            ->count();
            
            // Course sold on month
            $soldCoursesCount = DB::table('student_course')
                ->where(DB::raw('MONTH(created_at)'), $month)
                ->where(DB::raw('YEAR(created_at)'), $year)
            ->count();
            
            // Count view lesson 
            $viewCount = DB::table('lesson_student')
                ->where(DB::raw('MONTH(last_view)'), $month)
                ->where(DB::raw('YEAR(last_view)'), $year)
            ->count();
            
            // Count course complete
            $completedLessonsCount = DB::table('student_course')
                ->where(DB::raw('MONTH(created_at)'), $month)
                ->where(DB::raw('YEAR(created_at)'), $year)
                ->where('is_complete', 1)
            ->count();
    
            $param = [
                'reports' => [
                    'newUsersCount' => [
                        'content' => 'New Users',
                        'data' => $newUsersCount,
                    ],
                    'soldCoursesCount' => [
                        'content' => 'Course Sold',
                        'data' => $soldCoursesCount,
                    ],
                    'viewCount' => [
                        'content' => 'Count View Lesson',
                        'data' => $viewCount,
                    ],
                    'completedLessonsCount' => [
                        'content' => 'Count Course Complete',
                        'data' => $completedLessonsCount,
                    ],
                ],
                'qas' => $qas,
                'grades' => Grade::where('user_id',$this->user_id)->get(),
            ];
        }

        // Data calender
        if(request()->ajax()) 
        {
            $start = (!empty($_GET["start"])) ? ($_GET["start"]) : ('');
            $end = (!empty($_GET["end"])) ? ($_GET["end"]) : ('');
            $data = Event::whereDate('start', '>=', $start)->whereDate('end','<=', $end)->get(['id','title','start', 'end']);
            return Response::json($data);
        }
        return view('homes.index',$param);
    }
    // Create event
    public function store(Request $request)
    {  
        $insertArr = [ 'title' => $request->title,
                       'start' => $request->start,
                       'end' => $request->end,
                       'user_id' => $this->user_id,
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