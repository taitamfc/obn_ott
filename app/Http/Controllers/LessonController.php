<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lesson;
use App\Models\Grade;
use App\Models\Subject;
use App\Models\Course;
use App\Models\LessonCourse;
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
        $items = Lesson::with('grade','course','subject')->paginate(10);
        return view('lessons.index', compact('items'));
    }
    public function create()
    {
        $grades = Grade::all();
        $subjects = Subject::all();
        $courses = Course::all();
        return view('lessons.create',compact('grades','subjects','courses'));
    }
    public function store(StoreLessonRequest $request)
    {
        $item = new Lesson();
        $lessoncourse = new LessonCourse();
        $item->name = $request->name;
        $item->subject_id = $request->subject_id;
        $item->grade_id = $request->grade_id;
        $item->description = $request->description;
        $item->status = $request->status;
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
            $lessoncourse->lesson_id = $item->id;
            $lessoncourse->course_id = $request->course_id;
            $lessoncourse->save();
            return response([
                'success' => true,
                'message' => 'Create lesson success',
                'redirect' => route('lessons.index')
            ],200);
        } catch (QueryException $e) {
            Log::error($e->getMessage());
            return response([
                'success' => false,
                'message' => 'Create lesson fail',
            ],200);
        }
    }
    function edit($id){
        try{
            $item = Lesson::findOrfail($id);
            $grades = Grade::all();
            $subjects = Subject::all();
            $courses = Course::all();
            return view('lessons.edit',compact('item','grades','subjects','courses'));
        } catch (QueryException $e) {
            Log::error($e->getMessage());
            return response([
                'success' => false,
                'message' => 'Have problem, Try again late!',
            ],200);
        }
    }
    function update(UpdateLessonRequest $request,$id){
        try {
            $item = Lesson::findOrfail($id);
            $item->name = $request->name;
            $item->subject_id = $request->subject_id;
            $item->grade_id = $request->grade_id;
            $item->course_id = $request->course_id;
            $item->description = $request->description;
            $item->status = $request->status;
            if (!empty(Auth::user())) {
                $item->user_id = Auth::user()->id;
            }
            if ($request->hasFile('video')) {
                $item->video_url = $this->uploadFile($request->file('video'), 'uploads/lessons/video');
            }
            if ($request->hasFile('image')) {
                $item->image_url = $this->uploadFile($request->file('image'), 'uploads/lessons/image');
            } 
            $item->save();
            return response([
                'success' => true,
                'message' => 'Update lesson success',
                'redirect' => route('lessons.index')
            ],200);
        } catch (QueryException $e) {
            Log::error($e->getMessage());
            return response([
                'success' => false,
                'message' => 'Have problem, Try again late!',
            ],200);
        }
    }
    function position(Request $request){
        try {
            foreach ($_REQUEST['item'] as $key => $value) {
                $item = Lesson::findOrfail($value);
                $item->position = $key;
                $item->save();
            }
        } catch (QueryException $e) {
            Log::error('Bug occurred: ' . $e->getMessage());
            return redirect()->route('lessons.index')->with('error','Có lỗi xảy ra');
        }
    }
    public function destroy(string $id)
    {
        try {
            Lesson::destroy($id);
            return redirect()->route('lessons.index')->with('success','Xóa lesson thành công');
        } catch (QueryException $e) {
            Log::error('Bug occurred: ' . $e->getMessage());
            return redirect()->route('lessons.index')->with('error','Xóa lesson thất bại');
        }
    }
}