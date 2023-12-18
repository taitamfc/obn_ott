<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\MainController;
use Illuminate\Http\Request;
use App\Models\Lesson;
use App\Models\LessonStudent;
use Illuminate\Support\Facades\Auth;

class LessonController extends MainController
{
    public function show($site_name,$id, Request $request){

        $preview_token = $request->preview_token;
        $item = Lesson::find($id);
        $complete_lessonIds = [];
        if($preview_token && $preview_token == $item->preview_token){
        }else{
            $student_id = Auth::guard('students')->id();
            $check = LessonStudent::where('lesson_id',$id)->where('student_id',$student_id)->first();
            if(!$check){
                return redirect()->route('cms',$this->site_name);
            }

            $complete_lessons =  LessonStudent::where('course_id',$item->course->id)
            ->where('student_id',$student_id)
            ->where('site_id',$this->site_id)
            ->where('is_complete',1)
            ->get();
            if($complete_lessons){
                $complete_lessonIds = $complete_lessons->pluck('lesson_id')->toArray();
            }
            // dd($complete_lessonIds);
        }
        $params = [
            'item' => $item,
            'complete_lessonIds' => $complete_lessonIds
        ];
        return view('website.lessons.show',$params);
    }
}
