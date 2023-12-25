<?php

namespace App\Http\Controllers\Adminsystem;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notice;
use App\Http\Resources\NoticeResource;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\UpdateNoticeRequest;
use App\Http\Requests\StoreNoticeRequest;

class NoticeController extends Controller
{
    function index(Request $request){
        if ($request->ajax()) {
            $items = Notice::latest('created_at')->paginate(5);
            $param = [
                'items' => $items
            ];
            return view('adminsystems.notices.ajax-index',$param);
        }
        return view('adminsystems.notices.index');
    }
    function store(StoreNoticeRequest $request){
        $item = new Notice();
        $item->title = $request->title;
        $item->content = $request->content;
        $item->site_id = 0;
        $item->student_id = 0;
        $item->is_read = 0;
        try {
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
        $item = Notice::find($id);
        return new NoticeResource($item);
    }

    public function update(UpdateNoticeRequest $request, string $id)
    {
        $item = Notice::find($id);
        $item->title = $request->title;
        $item->content = $request->content;
        $item->site_id = 0;
        $item->student_id = 0;
        $item->is_read = 0;
        try {
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
            $item =  Notice::find($id);
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
}