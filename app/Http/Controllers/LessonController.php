<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lesson;
use App\Models\Grade;
use App\Models\Subject;
use App\Models\Course;
use App\Http\Requests\StoreLessonRequest;
use App\Http\Requests\UpdateLessonRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;
use App\Traits\UploadFileTrait;
use Illuminate\Support\Facades\Auth;

class LessonController extends Controller
{
    use UploadFileTrait;
    public function index(Request $request)
    {
        $items = Lesson::with('grade','course','subject')->orderBy('position','ASC')->paginate(5);
        return view('lessonlists.index', compact('items'));
    }
    public function create()
    {
        $grades = Grade::all();
        $subjects = Subject::all();
        $courses = Course::all();
        return view('contents.lessons.index',compact('grades','subjects','courses'));
    }
    public function store(StoreLessonRequest $request)
    {
        $item = new Lesson();
        $item->name = $request->name;
        $item->subject_id = $request->subject_id;
        $item->grade_id = $request->grade_id;
        $item->course_id = $request->course_id;
        $item->description = $request->description;
        if (!empty(Auth::user())) {
            $item->user_id = Auth::user()->id;
        }
        try {
            if ($request->hasFile('video')) {
                $item->video_url = $this->uploadFile($request->file('video'), 'uploads/lessons/video');
            }
            if ($request->hasFile('image')) {
                $item->image_url = $this->uploadFile($request->file('image'), 'uploads/lessons/image');
            } 
            $item->save();
            $item->position = $item->id;
            $item->save();
            return response([
                'success' => true,
                'message' => 'Create lesson success',
                'data' => $item
            ],200);
        } catch (QueryException $e) {
            Log::error($e->getMessage());
            return response([
                'success' => false,
                'message' => 'Create lesson fail',
            ],404);
        }
    }
}