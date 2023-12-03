<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\QuestionAnswer;
use App\Http\Resources\QuestionResource;
use App\Http\Requests\UpdateQuestionRequest;
class QuestionController extends AdminController
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $this->authorize('Lesson',Lesson::class);
        $items = QuestionAnswer::with('user','student', 'lesson', 'subject')->where('site_id',$this->site_id)->paginate(20);
        if( $request->ajax() ){
            return view('admin.questionanswer.ajax-index',compact('items'));
        }
        return view('admin.questionanswer.index');

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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $item = QuestionAnswer::where('site_id',$this->site_id)->findOrfail($id);
        return new QuestionResource($item);
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
    public function update(UpdateQuestionRequest $request, string $id)
    {
        try {
            $item = QuestionAnswer::findOrfail($id);
            $item->answer = $request->answer;
            $item->user_id = $this->user_id;
            $item->save();
            return response([
                'success' => true,
                'message' => 'Update Answer Success'
            ]);
        } catch (\Exception $e) {
            return response([
                'success' => false,
                'message' => 'Update Answer Fail'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}