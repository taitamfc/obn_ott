<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\MainController;
use App\Http\Requests\StoreQasRequest;
use Illuminate\Http\Request;
use App\Models\QuestionAnswer;
use Illuminate\Support\Facades\Auth;

class QuestionAnswerController extends MainController
{
    public function index()
    {
        $student = Auth::guard('students')->user();
        $items = QuestionAnswer::where('student_id', $student->id)->orderBy('created_at', 'desc')->get();
        return view('website.dashboards.qas.index', ['items' => $items]);
    }

    public function create()
    {
        return view('website.dashboards.qas.create');
    }

    public function store(StoreQasRequest $request) {
        $student = Auth::guard('students')->user();
        $items = new QuestionAnswer();
        $items->title = $request->input('title');
        $items->question = $request->input('question');
        $items->student_id = $student->id;
        $items->site_id = $this->site_id;
        $items->save();
        return redirect()->route('website.q-a',['site_name'=>$this->site_name])->with('success', 'Question-Answer created successfully');
    }

    public function show($site_name,$id)
    {
        $item = QuestionAnswer::find($id);
        return view('website.dashboards.qas.show', ['item' => $item]);
    }
}
