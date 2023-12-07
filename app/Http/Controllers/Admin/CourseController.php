<?php

namespace App\Http\Controllers\Admin;


use App\Traits\UploadFileTrait;
use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\CourseResource;
use Illuminate\Support\Facades\Auth;

class CourseController extends AdminController
{
    use UploadFileTrait;

    function index(Request $request){
        // $this->authorize('Course',Course::class);
        if( $request->ajax() ){
            $items = Course::where('site_id',$this->site_id)->orderBy('position','ASC')->paginate(20);
            return view('admin.contents.setting.courses.ajax-index',compact('items'));
        } 
        return view('admin.contents.setting.courses.index');
    }

    function store(StoreCourseRequest $request){
        $item = new Course();
        $item->site_id = $this->site_id;
        $item->name = $request->name;
        $item->price = $request->price;
        $item->status = $request->status;
        try {
            if ($request->hasFile('image')) {
                $item->image_url = $this->uploadFile($request->file('image'), 'uploads/'.$this->site_id.'/courses');
            } 
            $item->save();
            return response()->json([
                'success'=>true,
                'message'=> __('sys.store_item_success'),
                'data'=> $item
            ],200);
        } catch (QueryException  $e) {
            Log::error('Bug occurred: ' . $e->getMessage());
            return response()->json([
                'success'=>false,
                'message'=> __('sys.store_item_error'),
            ],200);
        }
    }
    public function show(string $id)
    {
        $item = Course::where('site_id',$this->site_id)->findOrfail($id);
        return new CourseResource($item);
    }
    public function update(UpdateCourseRequest $request, string $id)
    {
        $item = Course::where('site_id',$this->site_id)->find($id);
        $item->name = $request->name;
        $item->price = $request->price;
        $item->status = $request->status;
        try {
            if ($request->hasFile('image')) {
                // Delete old file
                $this->deleteFile([$item->image_url]);

                // Upload new file
                $item->image_url = $this->uploadFile($request->file('image'), 'uploads/'.$this->site_id.'/courses');
            }
            $item->save();
            return response()->json([
                'success'=>true,
                'message'=> __('sys.update_item_success'),
                'data'=> $item
            ],200);
        } catch (QueryException  $e) {
            Log::error('Bug occurred: ' . $e->getMessage());
            return response()->json([
                'success'=>false,
                'message'=> __('sys.update_item_error'),
            ],200);
        }
    }
    public function destroy(string $id)
    {
        try {
            $item =  Course::where('site_id',$this->site_id)->find($id);
            // Delete old file
            $this->deleteFile([$item->image_url]);

            $item->delete();

            return response()->json([
                'success'=>true,
                'message'=> __('sys.destroy_item_success'),
            ],200);
        } catch (QueryException $e) {
            Log::error('Bug occurred: ' . $e->getMessage());
            return response()->json([
                'success'=>false,
                'message'=> __('sys.destroy_item_error'),
            ],200);
        }
    }
    function position(Request $request)
    {
        try {
            foreach ($_REQUEST['item'] as $key => $value) {
                $item = Course::where('site_id',$this->site_id)->findOrfail($value);
                $item->position = $key;
                $item->save();
            }
        } catch (QueryException $e) {
            Log::error('Bug occurred: ' . $e->getMessage());
        }
    }
    function products(Request $request)
    {
        // $this->authorize('Course',Course::class);
        if( $request->ajax() ){
            $items = Course::where('site_id',$this->site_id)->where('status',Course::ACTIVE)->paginate(20);
            return view('admin.stores.productmanagement.ajax-index',compact('items'));
        }
        return view('admin.stores.productmanagement.index');
    }
    function editProduct(UpdateProductRequest $request)
    {
        // $this->authorize('Course',Course::class);
        try {  
            $item = Course::where('site_id',$this->site_id)->findOrfail($request->id);
            $item->price = $request->price;
            $item->save();
            return response()->json([
                'success'=>true,
                'message'=> __('sys.update_item_success'),
            ],200);
        } catch (QueryException  $e) {
            Log::error('Bug occurred: ' . $e->getMessage());
            return response()->json([
                'success'=>false,
                'message'=> _('sys.update_item_error')
            ],200);
        }
    }
}