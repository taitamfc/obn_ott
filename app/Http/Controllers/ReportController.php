<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentCourse;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    function users(Request $request){
        $query = DB::table('student_course');
        if ($request->fromDate && $request->toDate) {
            $query->select(DB::raw('DATE(created_at) AS time'), DB::raw('COUNT(DISTINCT student_id) as student_count'))
            ->whereBetween('created_at', [$request->fromDate, $request->toDate])
            ->groupBy('created_at');
        }
        if ($request->monthly || !empty($request)) {
            $query->select(DB::raw('MONTH(created_at) AS time'), DB::raw('COUNT(student_id) AS student_count'))
            ->groupBy(DB::raw('MONTH(created_at)'));
        }
        if ($request->weekly) {
            $query->select(DB::raw('WEEK(created_at) AS time'), DB::raw('COUNT(student_id) AS student_count'))
            ->groupBy(DB::raw('WEEK(created_at)'));
        }
        if ($request->daily) {
            $query->select(DB::raw('DATE(created_at) AS time'), DB::raw('COUNT(student_id) AS student_count'))
            ->groupBy(DB::raw('DATE(created_at)'));
        }
        $items = $query->orderBy('time','ASC')->get();
        $items = json_encode($items);
        return view('admin.reports.user',compact('items'));
    }
    function sales(Request $request){
        $query = DB::table('transactions')
        ->join('courses', 'transactions.course_id', '=', 'courses.id');
        if ($request->fromDate && $request->toDate && $request->toDate < now()) {
            $query->select(DB::raw('DATE(created_at) AS time'), DB::raw('COUNT(DISTINCT student_id) as student_count'))
            ->whereBetween('created_at', [$request->fromDate, $request->toDate])
            ->groupBy(DB::raw('DATE(created_at)'));
        }
        if ($request->monthly || !empty($request)) {
            $query->select(DB::raw('MONTH(transactions.created_at) AS time'), 'courses.name', DB::raw('COUNT(*) AS sold'), DB::raw('SUM(transactions.price) AS price'))
            ->groupBy(DB::raw('MONTH(transactions.created_at)'), 'transactions.course_id', 'courses.name');
        }
        if ($request->weekly) {
            $query->select(DB::raw('WEEK(transactions.created_at) AS time'), 'courses.name', DB::raw('COUNT(*) AS sold'), DB::raw('SUM(transactions.price) AS price'))
            ->groupBy(DB::raw('WEEK(transactions.created_at)'), 'transactions.course_id', 'courses.name');
        }
        if ($request->daily) {
            $query->select(DB::raw('DATE(transactions.created_at) AS time'), 'courses.name', DB::raw('COUNT(*) AS sold'), DB::raw('SUM(transactions.price) AS price'))
            ->groupBy(DB::raw('DATE(transactions.created_at)'), 'transactions.course_id', 'courses.name');
        }
        $items = $query->orderBy('time','ASC')->get();
        $items = json_encode($items);
        return view('admin.reports.sale',compact('items'));
    }
    function contents(Request $request){
        $query = DB::table('lesson_student')
            ->join('lessons', 'lesson_student.lesson_id', '=', 'lessons.id')
            ->join('courses', 'lesson_student.course_id', '=', 'courses.id');
        if ($request->fromDate && $request->toDate && $request->toDate < now()) {
            $query->select(DB::raw('DATE(lesson_student.last_view) AS time'), 'lessons.name AS lessonName', 'courses.name AS courseName', DB::raw('COUNT(*) AS view_count'))
            ->whereBetween('last_view', [$request->fromDate, $request->toDate])
            ->groupBy(DB::raw('DATE(lesson_student.last_view)'), 'lessons.id', 'lessons.name', 'courses.name');
        }
        if ($request->monthly || !empty($request)) {
            $query->select(DB::raw('MONTH(lesson_student.last_view) AS time'), 'lessons.name AS lessonName', 'courses.name AS courseName', DB::raw('COUNT(*) AS view_count'))
            ->groupBy(DB::raw('MONTH(lesson_student.last_view)'), 'lessons.id', 'lessons.name', 'courses.name');
        }
        if ($request->weekly) {
            $query->select(DB::raw('WEEK(lesson_student.last_view) AS time'), 'lessons.name AS lessonName', 'courses.name AS courseName', DB::raw('COUNT(*) AS view_count'))
            ->groupBy(DB::raw('WEEK(lesson_student.last_view)'), 'lessons.id', 'lessons.name', 'courses.name');
        }
        if ($request->daily) {
            $query->select(DB::raw('DATE(lesson_student.last_view) AS time'), 'lessons.name AS lessonName', 'courses.name AS courseName', DB::raw('COUNT(*) AS view_count'))
            ->groupBy(DB::raw('DATE(lesson_student.last_view)'), 'lessons.id', 'lessons.name', 'courses.name');
        }
        $items = $query->orderBy('time','ASC')->get();
        $items = json_encode($items);
        return view('admin.reports.content',compact('items'));
    }
}