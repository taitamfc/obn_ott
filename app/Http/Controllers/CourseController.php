<?php

namespace App\Http\Controllers;

use App\Traits\UploadFileTrait;
use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Http\Resources\CourseResource;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            $this->user_id = Auth::id();
            return $next($request);
        });
    }
    function index(Request $request){
        $this->authorize('Course',Course::class);
        if( $request->ajax() ){
            $items = Course::where('user_id',Auth::id())->orderBy('position','ASC')->paginate(20);
            return view('contents.setting.courses.ajax-index',compact('items'));
        } 
        return view('contents.setting.courses.index');
    }

    function store(StoreCourseRequest $request){
        $item = new Course();
        $item->user_id = Auth::id();
        $item->name = $request->name;
        $item->price = $request->price;
        $item->status = $request->status;
        try {
            if ($request->hasFile('image')) {
                $item->img = $this->uploadFile($request->file('image'), 'uploads/'.Auth::id().'/courses');
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
        $item = Course::where('user_id',Auth::id())->findOrfail($id);
        return new CourseResource($item);
    }


    public function update(UpdateCourseRequest $request, string $id)
    {
        $item = Course::where('user_id',Auth::id())->find($id);
        $item->name = $request->name;
        $item->price = $request->price;
        $item->status = $request->status;
        try {
            if ($request->hasFile('image')) {
                // Delete old file
                $this->deleteFile([$item->img]);

                // Upload new file
                $item->img = $this->uploadFile($request->file('image'), 'uploads/'.Auth::id().'/courses');
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
            $item =  Course::where('user_id',Auth::id())->find($id);
            // Delete old file
            $this->deleteFile([$item->img]);

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
    function position(Request $request){
        try {
            foreach ($_REQUEST['item'] as $key => $value) {
                $item = Course::where('user_id',Auth::id())->findOrfail($value);
                $item->position = $key;
                $item->save();
            }
        } catch (QueryException $e) {
            Log::error('Bug occurred: ' . $e->getMessage());
        }
    }
    function products(Request $request){
        $this->authorize('Course',Course::class);
        if( $request->ajax() ){
            $items = Course::where('user_id',Auth::id())->paginate(20);
            return view('stores.productmanagement.ajax-index',compact('items'));
        }
        return view('stores.productmanagement.index');
    }
    function editProduct(Request $request){
        $this->authorize('Course',Grade::class);
        try {  
            $item = Course::where('user_id',Auth::id())->findOrfail($request->id);
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