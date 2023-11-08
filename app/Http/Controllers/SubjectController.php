<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Http\Requests\StoreSubjectRequest;
use App\Http\Requests\UpdateSubjectRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    function index(Request $request){
        $items = Subject::orderBy('position','ASC')->get();
        return view('contents.setting.subjects.index',compact('items'));
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
    function store(StoreSubjectRequest $request){
        $item = new Subject();
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
                $path = 'storage/subjects/';
                $new_name_img = rand(1,100).$get_img->getClientOriginalName();
                $get_img->move($path,$new_name_img);
                $item->img = $path.$new_name_img;
            } 
            $item->save();
            return redirect()->route('subjects.index')->with('success','Thêm thành công');
        } catch (QueryException  $e) {
            Log::error('Bug occurred: ' . $e->getMessage());
            return redirect()->route('subjects.index')->with('error','Có lỗi xảy ra');
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
            Subject::destroy($id);
            return redirect()->route('subjects.index')->with('success','Xóa course thành công');
        } catch (QueryException $e) {
            Log::error('Bug occurred: ' . $e->getMessage());
            return redirect()->route('subjects.index')->with('error','Xóa course thất bại');
        }
    }
    function position(Request $request){
        try {
            foreach ($_REQUEST['item'] as $key => $value) {
                $item = Subject::findOrfail($value);
                $item->position = $key;
                $item->save();
            }
        } catch (QueryException $e) {
            Log::error('Bug occurred: ' . $e->getMessage());
            return redirect()->route('subjects.index')->with('error','Có lỗi xảy ra');
        }
    }
}