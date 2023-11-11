<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grade;
use App\Http\Requests\StoreGradeRequest;
use App\Http\Requests\UpdateGradeRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\GradeResource;
use Yajra\Datatables\Datatables;
use App\Traits\UploadFileTrait;
use Illuminate\Support\Facades\Auth;

class GradeController extends Controller
{
    use UploadFileTrait;
    function index(Request $request){
        $this->authorize('Grade',Grade::class);
        $user_id = Auth::id();
        if( $request->ajax() ){
            $items = Grade::where('user_id',$user_id)->orderBy('position','ASC')->paginate(4);
            return view('contents.setting.grades.ajax-index',compact('items'));
        }
        return view('contents.setting.grades.index');
    }

    function store(StoreGradeRequest $request){
        $user_id = Auth::id();
        $item = new Grade();
        $item->user_id = $user_id;
        $item->name = $request->name;
        $item->status = $request->status;
        try {
            if ($request->hasFile('image')) {
                $item->img = $this->uploadFile($request->file('image'), 'uploads/'.$user_id.'/grades');
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
        $user_id = Auth::id();
        $item = Grade::where('user_id',$user_id)->find($id);
        return new GradeResource($item);

    }

    public function update(UpdateGradeRequest $request, string $id)
    {
        $user_id = Auth::id();
        $item = Grade::where('user_id',$user_id)->find($id);
        $item->name = $request->name;
        $item->status = $request->status;
        try {
            if ($request->hasFile('image')) {
                // Delete old file
                $this->deleteFile([$item->img]);

                // Upload new file
                $item->img = $this->uploadFile($request->file('image'), 'uploads/'.$this->user_id.'/grades');
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
        $user_id = Auth::id();
        try {
            $item =  Grade::where('user_id',$user_id)->find($id);
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
                $item = Grade::findOrfail($value);
                $item->position = $key;
                $item->save();
            }
        } catch (QueryException $e) {
            Log::error('Bug occurred: ' . $e->getMessage());
            return redirect()->route('grades.index')->with('error','Có lỗi xảy ra');
        }
    }
}
