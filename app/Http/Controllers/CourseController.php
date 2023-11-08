<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Http\Resources\CourseResource;
class CourseController extends Controller
{
    function index(Request $request){
        $items = Course::orderBy('position','ASC')->get();
        return view('contents.setting.courses.index',compact('items'));
    }
    function store(StoreCourseRequest $request){
        $item = new Course();
        $item->name = $request->name;
        $item->price = $request->price;
        $item->status = $request->status;
        try {
            $fieldName = 'image';
            if ($request->hasFile($fieldName)) {
                $get_img = $request->file($fieldName);
                $path = 'storage/courses/';
                $new_name_img = rand(1,100).$get_img->getClientOriginalName();
                $get_img->move($path,$new_name_img);
                $item->img = $path.$new_name_img;
            } 
            $item->save();
            return response()->json([
                'success'=>true,
                'message'=> 'Saved ' . $item->id,
                'data'=> $item
            ],200);
        } catch (QueryException  $e) {
            Log::error('Bug occurred: ' . $e->getMessage());
            return response()->json([
                'success'=>false,
                'message'=> 'Save not success'
            ],200);
        }
    }

    public function show(string $id)
    {
        $item = Course::find($id);
        return new CourseResource($item);

    }

    public function update(UpdateCourseRequest $request, string $id)
    {
        $item = Course::find($id);
        $item->name = $request->name;
        $item->price = $request->price;
        $item->status = $request->status;
        try {
            $fieldName = 'image';
            if ($request->hasFile($fieldName)) {
                $get_img = $request->file($fieldName);
                $path = 'storage/courses/';
                $new_name_img = rand(1,100).$get_img->getClientOriginalName();
                $get_img->move($path,$new_name_img);
                $item->img = $path.$new_name_img;
            } 
            $item->save();
            return response()->json([
                'success'=>true,
                'message'=> 'Updated ' . $id,
                'data'=> $item
            ],200);
        } catch (QueryException  $e) {
            Log::error('Bug occurred: ' . $e->getMessage());
            return response()->json([
                'success'=>false,
                'message'=> 'Update not success ' . $id
            ],200);
        }
    }

    function destroy($id){
        try {
            Course::destroy($id);
            return response()->json([
                'success'=>true,
                'message'=> 'Deleted ' . $id
            ],200);
        } catch (QueryException $e) {
            Log::error('Bug occurred: ' . $e->getMessage());
            return response()->json([
                'success'=>false,
                'message'=> 'Deleted not success ' . $id
            ],200);
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