<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\MainController;
use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Course;
use App\Models\Lesson;

class SubjectController extends MainController
{
    public function show($site_name,$id){
        $item = Subject::find($id);
        $params = [
            'item' => $item
        ];
        return view('website.subjects.show',$params);
    }
}
