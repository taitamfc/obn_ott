<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grade;
use App\Http\Requests\StoreGradeRequest;
use App\Http\Requests\UpdateGradeRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;
class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    function index(Request $request){
        $items = Grade::orderBy('position','ASC')->get();
        return view('contents.setting.grades.index',compact('items'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    function store(StoreGradeRequest $request){
        $item = new Grade();
        $item->name = $request->name;
        if ($request->status == 'active') {
            $item->status = 0;
        }else {
            $item->status = 1;
        }
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
            return redirect()->route('grades.index')->with('success','Thêm thành công');
        } catch (QueryException  $e) {
            Log::error('Bug occurred: ' . $e->getMessage());
            return redirect()->route('grades.index')->with('error','Có lỗi xảy ra');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
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
