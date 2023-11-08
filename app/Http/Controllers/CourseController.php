<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\StoreCourseRequest;

class CourseController extends Controller
{
    function index(Request $request){
        $items = Course::orderBy('position','ASC')->get();
        return view('contents.setting.courses.course',compact('items'));
    }
    function store(StoreCourseRequest $request){
        $item = new Course();
        $item->name = $request->name;
        $item->status = $request->status;
        try {
            $fieldName = 'image';
            if ($request->hasFile($fieldName)) {
                $get_img = $request->file($fieldName);
                $path = 'storage/courses/';
                $new_name_img = rand(1,100).$get_img->getClientOriginalName();
                $get_img->move($path,$new_name_img);
                $item->image_url = $path.$new_name_img;
            } 
            $item->save();
            return redirect()->route('courses.index')->with('success','Thêm course thành công');
        } catch (QueryException  $e) {
            Log::error('Bug occurred: ' . $e->getMessage());
            return redirect()->route('courses.index')->with('error','Có lỗi xảy ra');
        }
    }
    function destroy($id){
        try {
            Course::destroy($id);
            return response()->json(['success'=>'delete success'],200);
        } catch (QueryException $e) {
            Log::error('Bug occurred: ' . $e->getMessage());
            return redirect()->route('courses.index')->with('error','Có lỗi xảy ra');
        }
    }
    function position(Request $request){
        try {
            foreach ($_REQUEST['item'] as $key => $value) {
                $item = Course::findOrfail($value);
                $item->position = $key;
                $item->save();
            }
        } catch (QueryException $e) {
            Log::error('Bug occurred: ' . $e->getMessage());
        }
    }
}