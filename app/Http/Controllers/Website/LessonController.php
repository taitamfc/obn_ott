<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\MainController;
use Illuminate\Http\Request;
use App\Models\Lesson;

class LessonController extends MainController
{
    public function show($site_name,$id){
        $item = Lesson::find($id);
        $params = [
            'item' => $item
        ];
        return view('website.lessons.show',$params);
    }
}
