<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\MainController;
use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Grade;
use App\Models\Visitor;
use App\Models\Impression;

class GradeController extends MainController
{
    public function show($site_id,$id){
        try {
            $item =  Grade::findOrfail($id);
            Impression::increase($this->site_id,$id);
            Visitor::increase($this->site_id,$id);

            $items = Subject::where('site_id',$this->site_id)
                                ->where('grade_id',$id)
                                ->where('status',Subject::ACTIVE)
                                ->orderBy('position')
                                ->get();
            $params = [
                'item'  => $item,
                'items' => $items,
            ];
            return view('website.grades.show',$params);
        } catch (ModelNotFoundExeption $e) {
            abort(404);
        } catch (Exception $e){
            Log::error("Bug error : ". $e->getMessage());
        }
    }
}