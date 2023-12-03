<?php

namespace App\Http\Controllers\Admin;


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
use Illuminate\Support\Facades\DB;
use App\Traits\UploadFileTrait;
use Illuminate\Support\Facades\Auth;
use stdClass;

class LessonController extends AdminController
{
    use UploadFileTrait;
    public function index(Request $request)
    {
        // $this->authorize('Lesson',Lesson::class);
        if( $request->ajax() ){
            $items = Lesson::with('grade','course','subject')->where('site_id',$this->site_id)->paginate(20);
            return view('admin.lessons.ajax-index',compact('items'));
        }
        return view('admin.lessons.index');

    }
    public function create()
    {
        // $this->authorize('Lesson',Lesson::class);
        $grades = Grade::getActiveItems($this->site_id);
        $subjects = Subject::getActiveItems($this->site_id);
        $courses = Course::getActiveItems($this->site_id);
        $item = new Lesson();
        
        return view('admin.lessons.create',compact('grades','subjects','courses','item'));
    }
    public function store(StoreLessonRequest $request)
    {
        $item = new Lesson();
        $item->name = $request->name;
        $item->subject_id = $request->subject_id;
        $item->grade_id = $request->grade_id;
        $item->course_id = $request->course_id;
        $item->description = $request->description;
        $item->status = $request->status;
        $item->site_id = $this->site_id;
        try {
            DB::beginTransaction();

            if ($request->hasFile('video')) {
                $item->video_url = $this->uploadFile($request->file('video'), 'uploads/'.Auth::id().'/lessons/video');
            }
            if ($request->hasFile('image')) {
                $item->image_url = $this->uploadFile($request->file('image'), 'uploads/'.Auth::id().'/lessons/image');
            } 
            
            if($item->save()){
                $lessoncourse = new LessonCourse();
                $lessoncourse->lesson_id = $item->id;
                $lessoncourse->subject_id = $request->subject_id;
                $lessoncourse->grade_id = $request->grade_id;
                $lessoncourse->course_id = $request->course_id;
                $lessoncourse->site_id = $this->site_id;
                $lessoncourse->save();
            }
            DB::commit();

            return response([
                'success' => true,
                'message' => __('sys.store_item_success'),
                'redirect' => route('admin.lessons.index')
            ],200);
        } catch (QueryException $e) {
            DB::rollback();
            Log::error($e->getMessage());
            return response([
                'success' => false,
                'message' => __('sys.store_item_error'),
            ],200);
        }
    }
    function edit($id){

        // $this->authorize('Lesson',Lesson::class);
        try{
            $item = Lesson::where('site_id',$this->site_id)->findOrfail($id);
            
            $grades = Grade::getActiveItems($this->site_id);
            $subjects = Subject::getActiveItems($this->site_id);
            $courses = Course::getActiveItems($this->site_id);

            return view('admin.lessons.edit',compact('item','grades','subjects','courses'));
        } catch (QueryException $e) {
            Log::error($e->getMessage());
            return response([
                'success' => false,
                'message' => __('sys.update_item_error'),
            ],200);
        }
    }
    function update(UpdateLessonRequest $request,$id){
        try {
            DB::beginTransaction();
            $item = Lesson::findOrfail($id);
            // Get old value
            $old_course_id = $item->course_id;
            $old_subject_id = $item->subject_id;
            $old_grade_id = $item->grade_id;
            // Push new value
            $item->name = $request->name;
            $item->subject_id = $request->subject_id;
            $item->grade_id = $request->grade_id;
            $item->course_id = $request->course_id;
            $item->description = $request->description;
            $item->status = $request->status;
            $item->site_id = $this->site_id;            
            if ($request->hasFile('video')) {
                $this->deleteFile([$item->video_url]);
                $item->video_url = $this->uploadFile($request->file('video'), 'uploads/'.Auth::id().'/lessons/video');
            }
            if ($request->hasFile('image')) {
                $this->deleteFile([$item->image_url]);
                $item->image_url = $this->uploadFile($request->file('image'), 'uploads/'.Auth::id().'/lessons/image');
            } 
            if($item->save()){
                LessonCourse::where('lesson_id',$item->id)->where('course_id',$old_course_id)->where('subject_id',$old_subject_id)->where('grade_id',$old_grade_id)->delete();
                $lessoncourse = new LessonCourse();
                $lessoncourse->lesson_id = $item->id;
                $lessoncourse->subject_id = $request->subject_id;
                $lessoncourse->grade_id = $request->grade_id;
                $lessoncourse->course_id = $request->course_id;
                $lessoncourse->site_id = $this->site_id;
                $lessoncourse->save();
            }
            DB::commit();
            return response([
                'success' => true,
                'message' => __('sys.update_item_success'),
                'redirect' => route('admin.lessons.index')
            ],200);
        } catch (QueryException $e) {
            DB::rollback();
            Log::error($e->getMessage());
            return response([
                'success' => false,
                'message' => __('sys.update_item_error')
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
            return redirect()->route('admin.lessons.index')->with('error',__('sys.update_item_error'));
        }
    }
    public function destroy(string $id)
    {
        try {
            $item = Lesson::where('site_id',$this->site_id)->findOrfail($id);
            LessonCourse::where('site_id',$this->site_id)
            ->where('lesson_id',$item->id)
            ->where('grade_id',$item->grade_id)
            ->where('subject_id',$item->subject_id)
            ->where('course_id',$item->course_id)
            ->delete();
            $item->delete();
            return response([
                'success' => true,
                'message' => __('sys.destroy_item_success'),
                'redirect' => route('admin.lessons.index')
            ],200);
        } catch (QueryException $e) {
            return response([
                'success' => false,
                'message' => __('sys.destroy_item_error'),
            ],200);
            Log::error('Bug occurred: ' . $e->getMessage());
        }
    }
}