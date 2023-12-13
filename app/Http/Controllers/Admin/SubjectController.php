<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Grade;
use App\Http\Requests\StoreSubjectRequest;
use App\Http\Requests\UpdateSubjectRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\SubjectResource;
use Illuminate\Support\Facades\Auth;
use App\Traits\UploadFileTrait;
use DB;

class SubjectController extends AdminController
{
    use UploadFileTrait;

    function index(Request $request){
        // $this->authorize('Subject',Subject::class);
        $grades = Grade::where('site_id',$this->site_id)->get();
        $items = Subject::with('grade')->where('site_id',$this->site_id)->orderBy('name', 'ASC')->paginate(20);
        if( $request->ajax() )
        {
            return view('admin.contents.setting.subjects.ajax-index',compact('items','grades'));
        }
        return view('admin.contents.setting.subjects.index');
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
        $item->site_id = $this->site_id;
        $item->name = $request->name;
        $item->grade_id = $request->grade_id;
        $item->status = $request->status;
        try {
            if ($request->hasFile('image')) {
                $item->img = $this->uploadFile($request->file('image'), 'uploads/'.$this->site_id.'/subjects');
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

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $item = Subject::where('site_id',$this->site_id)->find($id);
        return new SubjectResource($item);
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
    public function update(UpdateSubjectRequest $request, string $id)
    {
        $item = Subject::where('site_id',$this->site_id)->find($id);
        $item->name = $request->name;
        $item->grade_id = $request->grade_id;
        $item->status = $request->status;
        try {
            if ($request->hasFile('image')) {
                // Delete old file
                $this->deleteFile([$item->img]);

                // Upload new file
                $item->img = $this->uploadFile($request->file('image'), 'uploads/'.$this->site_id.'/subjects');
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $item =  Subject::where('site_id',$this->site_id)->find($id);
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