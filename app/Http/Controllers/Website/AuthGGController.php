<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\Student;

class AuthGGController extends Controller
{
    function loginbyGG(){
        return Socialite::driver('google')->redirect();
    }
    function loginGGCallBack(){
        $user = Socialite::driver('google')->user();
        $student = Student::updateOrCreate([
            'email' => $user->email,
        ],[
            'name' => $user->name,
            'email' => $user->email,
            // 'image' => $user->avatar,
            'email_token' => $user->token,
            'email_refresh_token' => $user->refreshToken,
        ]);
        if(Auth::guard('students')->loginUsingId($student->id)){
            return redirect()->route('cms',['site_name'=>$this->site_name])->with('success', 'Logged in successfully');
        }
    }
}