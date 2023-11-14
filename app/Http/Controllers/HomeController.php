<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\QuestionAnswer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\GradeResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Redirect,Response;

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

    public function index(Request $request){
        $currentMonth = Carbon::now()->format('m');
        $currentYear = Carbon::now()->format('Y');

        // New user on month
        $newUsersCount = DB::table('students')
            ->where(DB::raw('MONTH(created_at)'), $currentMonth)
            ->where(DB::raw('YEAR(created_at)'), $currentYear)
            ->count();

        // Course sold on month
        $soldCoursesCount = DB::table('student_course')
            ->where(DB::raw('MONTH(created_at)'), $currentMonth)
            ->where(DB::raw('YEAR(created_at)'), $currentYear)
            ->count();

        // Count view lesson 
        $viewCount = DB::table('lesson_student')
            ->where(DB::raw('MONTH(last_view)'), $currentMonth)
            ->where(DB::raw('YEAR(last_view)'), $currentYear)
            ->count();

        // Count course complete
        $completedLessonsCount = DB::table('student_course')
            ->where(DB::raw('MONTH(created_at)'), $currentMonth)
            ->where(DB::raw('YEAR(created_at)'), $currentYear)
            ->where('is_complete', 1)
            ->count();
        // Data question 
        $qas = QuestionAnswer::where('user_id',$this->user_id)->with('student')->paginate(5);
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
        ];
        return view('homes.index',$param);
    }
}