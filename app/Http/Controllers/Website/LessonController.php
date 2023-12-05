<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\MainController;
use Illuminate\Http\Request;
use App\Models\Lesson;
use App\Models\LessonStudent;
use Illuminate\Support\Facades\Auth;

class LessonController extends MainController
{
    public function show($site_name,$id){

        $student_id = Auth::guard('students')->id();
        $check = LessonStudent::where('lesson_id',$id)->where('student_id',$student_id)->first();
        if(!$check){
            return redirect()->route('cms',$this->site_name);
        }
        $item = Lesson::find($id);
        $params = [
            'item' => $item
        ];
        return view('website.lessons.show',$params);
    }
}
