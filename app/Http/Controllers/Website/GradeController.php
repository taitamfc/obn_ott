<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\MainController;
use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Grade;

class GradeController extends MainController
{
    public function show($site_id,$id){
        $item =  Grade::find($id);
        $items = Subject::where('site_id',$this->site_id)
                            ->where('grade_id',$id)
                            ->where('status',Subject::ACTIVE)
                            ->get();
        $params = [
            'item'  => $item,
            'items' => $items,
        ];
        return view('website.grades.show',$params);
    }
}
