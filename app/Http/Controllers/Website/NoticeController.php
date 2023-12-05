<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notice;
use Illuminate\Support\Facades\Auth;
class NoticeController extends Controller
{
    public function index()
    {
        $student = Auth::guard('students')->user();
        $items = Notice::where('student_id', $student->id)->orderBy('id', 'desc')->get();
        return view('website.dashboards.notices.index', ['items' => $items]);
    }

    public function show($site_name,$id)
    {
        $item = Notice::find($id);

        if(!$item->is_read){
            $item->is_read = 1;
            $item->save();
        }
        return view('website.dashboards.notices.show', ['item' => $item]);
    }
}
