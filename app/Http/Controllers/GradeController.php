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

class GradeController extends Controller
{
    function index(Request $request){
        if( $request->ajax() ){
            $items = Grade::orderBy('position','ASC')->paginate(20);
            return view('contents.setting.grades.ajax-index',compact('items'));
        }
        return view('contents.setting.grades.index');
    }

    function store(StoreGradeRequest $request){
        $item = new Grade();
        $item->name = $request->name;
        $item->status = $request->status;
       
        try {
            $fieldName = 'image';
            if ($request->hasFile($fieldName)) {
                $get_img = $request->file($fieldName);
                $path = 'storage/grades/';
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
        $item = Grade::find($id);
        return new GradeResource($item);

    }

    public function update(UpdateGradeRequest $request, string $id)
    {
        $item = Grade::find($id);
        $item->name = $request->name;
        $item->status = $request->status;
        try {
            $fieldName = 'image';
            if ($request->hasFile($fieldName)) {
                $get_img = $request->file($fieldName);
                $path = 'storage/grades/';
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

    public function destroy(string $id)
    {
        try {
            Grade::destroy($id);
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
