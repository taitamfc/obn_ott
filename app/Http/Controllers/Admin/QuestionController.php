<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\QuestionAnswer;
use App\Models\Notification;
use DB;
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
        $items = QuestionAnswer::with('user','student', 'lesson', 'subject')->where('site_id',$this->site_id)->orderByDesc('updated_at')->paginate(20);
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
    function edit(String $id, Request $request){
        $notiid = $request->notiid;
        if($notiid){
            Notification::deleteNotification($notiid);
        }
        $item = QuestionAnswer::findOrfail($id);
        return view('admin.questionanswer.edit',compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
            DB::beginTransaction();
        try {
            $item = QuestionAnswer::findOrFail($id);
            $item->answer = $request->input('answer');
            $item->user_id = $this->user_id;
            if($item->save()){
                $replyNotice = new Notification();
                $replyNotice->student_id = $item->student_id;
                $replyNotice->site_id = $this->site_id;
                $replyNotice->type = 'reply_faq';
                $replyNotice->action = 'site_to_student';
                $replyNotice->is_read = 0;
                $replyNotice->item_id = $item->id;
                $replyNotice->save();
            }
            DB::commit();

            return redirect()->route('admin.questionanswer.index')->with([
                'success' => true,
                'message' => 'Update Answer Success',
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with([
                'success' => false,
                'message' => 'Update Answer Fail',
            ])->withErrors(['error' => $e->getMessage()]);
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