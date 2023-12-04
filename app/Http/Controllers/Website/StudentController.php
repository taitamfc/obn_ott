<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateStudentRequest;
use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;
class StudentController extends Controller
{
    public function index(Request $request)
    {
        $item = Auth::guard('students')->user();
        return view('website.dashboards.accounts.index', compact('item'));
    }

    public function edit(Request $request)
    {
        $student = Auth::guard('students')->user();
        return view('website.dashboards.accounts.edit', compact('student'));
    }

// Trong file StudentController.php
    public function update(UpdateStudentRequest $request)
    {
        try {
            $student = Auth::guard('students')->user();
            // dd($request);
            $student->name = $request->input('name');
            $student->email = $request->input('email');
            $student->phone = $request->input('phone');
            if($request->input('password')){
                $student->password = bcrypt($request->input('password'));
            }
            $student->address = $request->input('address');
            $student->city = $request->input('city');
            $student->status = $request->input('status');
            $student->code = $request->input('code');
            $student->save();

            return redirect()->route('website.accounts', ['site_name' => $this->site_name])->with('success', 'Profile updated successfully');
        } catch (QueryException $e) {
            Log::error('Bug occurred: ' . $e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Failed to update profile. Please try again.');
        }
    }
}
