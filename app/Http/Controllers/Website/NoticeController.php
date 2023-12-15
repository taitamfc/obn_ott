<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\MainController;
use Illuminate\Http\Request;
use App\Models\Notice;
use App\Models\QuestionAnswer;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
class NoticeController extends MainController
{
    public function index()
    {
        $student = Auth::guard('students')->user();
        $items = Notice::where('student_id', $student->id)
            ->where('site_id', $this->site_id)
            ->orderBy('id', 'desc')->get();
        return view('website.dashboards.notices.index', ['items' => $items]);
    }

    public function show($site_name,$id)
    {
        // dd($id);
        $item = Notice::find($id);

        if(!$item->is_read){
            $item->is_read = 1;
            $item->save();
        }
        return view('website.dashboards.notices.show', ['item' => $item]);
    }

    public function unreadCount()
    {
        $unreadCount = Notice::where('student_id', auth()->guard('students')->id())
            ->where('is_read', false)
            ->count();

        return $unreadCount;
    }
    // public function createNewFaqNotice($qaId)
    // {
    //     $qa = QuestionAnswer::find($qaId);

    //     if ($qa) {
    //         $notice = new Notice([
    //             'student_id' => $qa->student_id,
    //             'site_id' => $this->site_id,
    //             'type' => 'new_faq',
    //             'action' => 'student_to_site',
    //             'is_read' => 0,
    //             'item_id' => $qa->id,
    //         ]);

    //         $notice->save();
    //     }
    // }

    // public function createReplyFaqNotice($qaId)
    // {
    //     $qa = QuestionAnswer::find($qaId);

    //     if ($qa) {
    //         $notice = new Notice([
    //             'student_id' => $qa->user_id,
    //             'site_id' => $this->site_id,
    //             'type' => 'reply_faq',
    //             'action' => 'site_to_student',
    //             'is_read' => 0,
    //             'item_id' => $qa->id,
    //         ]);

    //         $notice->save();
    //     }
    // }

    // public function createNewOrderNotice($orderId)
    // {
    //     $order = Order::find($orderId);

    //     if ($order) {
    //         $notice = new Notice([
    //             'student_id' => Auth::guard('students')->id(),
    //             'site_id' => $this->site_id,
    //             'type' => 'new_order',
    //             'action' => 'system_to_site',
    //             'is_read' => 0,
    //             'item_id' => $order->id,
    //         ]);

    //         $notice->save();
    //     }
    // }

    
}