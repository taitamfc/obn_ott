<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\MainController;
use App\Http\Requests\StoreQasRequest;
use Illuminate\Http\Request;
use App\Models\QuestionAnswer;
use App\Models\Notification;
use DB;
use Illuminate\Support\Facades\Auth;

class QuestionAnswerController extends MainController
{
    public function index()
    {
        $student = Auth::guard('students')->user();
        $items = QuestionAnswer::where('student_id', $student->id)
            ->where('site_id', $this->site_id)
            ->orderBy('created_at', 'desc')->get();
        return view('website.dashboards.qas.index', ['items' => $items]);
    }

    public function create()
    {
        return view('website.dashboards.qas.create');
    }

    // public function store(StoreQasRequest $request) {
    //     $student = Auth::guard('students')->user();
    //     $items = new QuestionAnswer();
    //     $items->title = $request->input('title');
    //     $items->question = $request->input('question');
    //     $items->student_id = $student->id;
    //     $items->site_id = $this->site_id;
    //     $items->save();
    //     return redirect()->route('website.q-a',['site_name'=>$this->site_name])->with('success', 'Question-Answer created successfully');
    // }

    public function store(StoreQasRequest $request) {
        DB::beginTransaction();
        try {
    
            $student = Auth::guard('students')->user();
    
            // Bảng qas
            $qa = new QuestionAnswer();
            $qa->title = $request->input('title');
            $qa->question = $request->input('question');
            $qa->student_id = $student->id;
            $qa->site_id = $this->site_id;
            if($qa->save()){
                $notice = new Notification();
                $notice->student_id = $student->id;
                $notice->site_id = $this->site_id;
                $notice->type = 'new_faq';
                $notice->action = 'student_to_site';
                $notice->is_read = 0;
                $notice->item_id = $qa->id;
                $notice->save();
            }
            DB::commit();
    
            return redirect()->route('website.q-a',['site_name'=>$this->site_name])->with('success', 'Question-Answer created successfully');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Something went wrong.');
        }
    }

    public function reply(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $user = Auth::user();
            $qa = QuestionAnswer::find($id);
            $qa->answer = $request->input('answer');
            if($qa->save()){
                $replyNotice = new Notice();
                $replyNotice->student_id = $qa->student_id;
                $replyNotice->site_id = $this->site_id;
                $replyNotice->type = 'reply_faq';
                $replyNotice->action = 'site_to_student';
                $replyNotice->is_read = 0;
                $replyNotice->item_id = $qa->id;
                $replyNotice->save();
            }
            DB::commit();
    
            return redirect()->route('website.q-a',['site_name'=>$this->site_name])->with('success', 'Question-Answer created successfully');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Something went wrong.');
        }
    }

    public function show($site_name, $id,Request $request)
    {
        $notiid = $request->notiid;
        if($notiid){
            Notification::deleteNotification($notiid);
        }
        $item = QuestionAnswer::find($id);

        if (!$item->is_read) {
            $item->is_read = 1;
            $item->save();
        }

        return view('website.dashboards.qas.show', ['item' => $item]);
    }

    public function unreadCount()
{
    $unreadCount = QuestionAnswer::where('student_id', auth()->guard('students')->id())
        ->whereNotNull('answer')
        ->where('is_read', false)
        ->count();

    return $unreadCount;
}

}